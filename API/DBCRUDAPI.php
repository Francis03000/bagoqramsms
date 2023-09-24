<?php
class DBCRUDAPI
{

    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'bago';



    private $result = array();
    private $mysqli = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    // public function insert($table, $para = array())
    // {
    //     $table_columns = implode(',', array_keys($para));
    //     $table_value = implode("','", $para);

    //     $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";

    //     $result = $this->mysqli->query($sql);
    // }

    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_values = array_values($para);

        $value_placeholders = implode(',', array_fill(0, count($table_values), '?'));

        $sql = "INSERT INTO $table ($table_columns) VALUES ($value_placeholders)";

        $stmt = $this->mysqli->prepare($sql);

        if ($stmt === false) {
            throw new Exception($this->mysqli->error);
        }

        $types = str_repeat('s', count($table_values));
        $stmt->bind_param($types, ...$table_values);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception($this->mysqli->error);
        }
    }

    public function update($table, $para = array(), $id)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '" . $this->mysqli->real_escape_string($value) . "'";
        }

        $sql = "UPDATE $table SET " . implode(',', $args);

        $sql .= " WHERE $id";

        $result = $this->mysqli->query($sql);
        if ($this->mysqli->errno) {
            throw new Exception($this->mysqli->error);
        }
    }

    // public function update($table, $para = array(), $id)
    // {
    //     $args = array();

    //     foreach ($para as $key => $value) {
    //         $args[] = "$key = '$value'";
    //     }

    //     $sql = "UPDATE  $table SET " . implode(',', $args);

    //     $sql .= " WHERE $id";

    //     $result = $this->mysqli->query($sql);
    // }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";
        $sql;
        $result = $this->mysqli->query($sql);
    }

    public $sql;

    public function select($table, $rows = "*", $where = null, $logic = null)
    {
        if ($where != null) {
            if ($logic != null) {
                $sql = "SELECT $rows FROM $table WHERE $where ORDER BY $logic";

            } else {
                $sql = "SELECT $rows FROM $table WHERE $where";
            }

        } else {
            if ($logic != null) {
                $sql = "SELECT $rows FROM $table ORDER BY $logic";

            } else {
                $sql = "SELECT $rows FROM $table  ";
            }
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function select_date()
    {
        $sql = "SELECT CURDATE() as cur_date ";

        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function select2($table, $rows = "*", $where = null, $logic = null)
    {
        // $rows = implode(',', $rows);

        if ($where != null) {
            if ($logic != null) {
                $sql = "SELECT $rows FROM $table WHERE $where ORDER BY $logic";

            } else {
                $sql = "SELECT $rows FROM $table WHERE $where";
            }

        } else {
            if ($logic != null) {
                $sql = "SELECT $rows FROM $table ORDER BY $logic";

            } else {
                $sql = "SELECT $rows FROM $table  ";
            }
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectSub($attr = null, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT DISTINCT subject_name FROM subjects $where";
        } else {
            $sql = "SELECT DISTINCT subject_name FROM subjects";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function checkSchedAvail($table, $teacher_id, $yearlevels_id, $rooms_id, $subject_id, $sample_time_id)
    {
        $sql = "SELECT * FROM $table WHERE teacher_id = $teacher_id AND yearlevels_id = $yearlevels_id AND rooms_id = $rooms_id AND subject_id = $subject_id AND sample_time_id = $sample_time_id";
        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function selectleftrooms($attr, $where = null)
    {
        $attributess = implode(',', $attr);
        $sql = "SELECT $attributess FROM yearlevels LEFT JOIN rooms ON rooms.id = yearlevels.designated_room_id LEFT JOIN sections ON sections.id = yearlevels.section_id WHERE $where";
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectleftjoins_logs_users($attr = null, $where = null)
    {
        // $attributess = implode(',', $attr);
        if ($where != null) {

            $sql = "SELECT * FROM users WHERE id NOT IN (SELECT user_id FROM attendance_log WHERE $where)";

        } else {
            $sql = "SELECT * FROM users WHERE status = 'active' AND id NOT IN (SELECT user_id FROM attendance_log WHERE attendance_date = CURDATE() ) ";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectAttendanceDays($attr = null, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT DISTINCT attendance_date FROM attendance_log WHERE $where ORDER BY attendance_date ASC";
        } else {
            $sql = "SELECT DISTINCT attendance_date FROM attendance_log ORDER BY attendance_date ASC";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectAttendanceDate($attr = null, $where = null)
    {
        // $attributess = implode(',', $attr);
        if ($where != null) {

            $sql = "SELECT DISTINCT YEAR(attendance_date) AS attendance_year FROM attendance_log ORDER BY attendance_year DESC $where)";

        } else {
            $sql = "SELECT DISTINCT YEAR(attendance_date) AS attendance_year FROM attendance_log ORDER BY attendance_year DESC ";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectleftjoinsss($attr = null, $where = null)
    {
        // $attributess = implode(',', $attr);
        if ($where != null) {
            if ($attr != null) {
                $sql = "SELECT  class_schedules.id AS class_schedules_id, class_schedules.*, users.*, yearlevels.*, subjects.*, sections.* FROM class_schedules LEFT JOIN users ON users.id = class_schedules.teacher_id LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id LEFT JOIN subjects ON subjects.id = class_schedules.subject_id   LEFT JOIN sections ON sections.id = yearlevels.section_id WHERE $where ORDER BY
                fname ,
                CAST(SUBSTRING_INDEX(time_start, ':', 1) AS UNSIGNED),  
                CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(time_start, ':', -1), ' ', 1) AS UNSIGNED) ";
            } else {
                $sql = "SELECT  class_schedules.id AS class_schedules_id, class_schedules.*, users.*, yearlevels.*, subjects.*, sections.* FROM class_schedules LEFT JOIN users ON users.id = class_schedules.teacher_id LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id LEFT JOIN subjects ON subjects.id = class_schedules.subject_id   LEFT JOIN sections ON sections.id = yearlevels.section_id WHERE $where ORDER BY
                fname ,
                CAST(SUBSTRING_INDEX(time_start, ':', 1) AS UNSIGNED),  
                CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(time_start, ':', -1), ' ', 1) AS UNSIGNED) ";
            }
        } else {
            // $sql = "SELECT class_schedules.id AS class_schedules_id, class_schedules.*, users.*, yearlevels.*, subjects.*, sections.* FROM class_schedules LEFT JOIN users ON users.id = class_schedules.teacher_id LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id LEFT JOIN subjects ON subjects.id = class_schedules.subject_id  LEFT JOIN sections ON sections.id = yearlevels.section_id ";
            $sql = "SELECT  class_schedules.id AS class_schedules_id, class_schedules.*, users.*, yearlevels.*, subjects.*, sections.* FROM class_schedules LEFT JOIN users ON users.id = class_schedules.teacher_id LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id LEFT JOIN subjects ON subjects.id = class_schedules.subject_id   LEFT JOIN sections ON sections.id = yearlevels.section_id WHERE status = 'active' AND (class_schedules.school_year_val, class_schedules.sem) = (SELECT school_year_val, MAX(sem) AS max_sem FROM class_schedules  WHERE school_year_val = (SELECT MAX(school_year_val) FROM class_schedules) )  ORDER BY
            fname ,
            CAST(SUBSTRING_INDEX(time_start, ':', 1) AS UNSIGNED),  
            CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(time_start, ':', -1), ' ', 1) AS UNSIGNED) ";

        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectleftjoinsss2($where = null)
    {

        if ($where != null) {

            $sql = "SELECT  class_schedules.id AS class_schedules_id, class_schedules.*, users.*, yearlevels.*, subjects.*, sections.* FROM class_schedules LEFT JOIN users ON users.id = class_schedules.teacher_id LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id LEFT JOIN subjects ON subjects.id = class_schedules.subject_id   LEFT JOIN sections ON sections.id = yearlevels.section_id WHERE $where  ORDER BY time_start ASC";

        } else {
            $sql = "SELECT  class_schedules.id AS class_schedules_id, class_schedules.*, users.*, yearlevels.*, subjects.*, sections.* FROM class_schedules LEFT JOIN users ON users.id = class_schedules.teacher_id LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id LEFT JOIN subjects ON subjects.id = class_schedules.subject_id   LEFT JOIN sections ON sections.id = yearlevels.section_id WHERE (class_schedules.school_year_val, class_schedules.sem) = (SELECT school_year_val, MAX(sem) AS max_sem FROM class_schedules  WHERE school_year_val = (SELECT MAX(school_year_val) FROM class_schedules) )  ORDER BY time_start ASC";
        }

        $this->sql = $result = $this->mysqli->query($sql);

    }
    public function selectleftjoinAttLog($where = null)
    {

        if ($where != null) {

            $sql = "SELECT
            DATE_FORMAT(attendance_date, '%Y-%m') AS month,
            SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) AS present_count,
            SUM(CASE WHEN status = 'Incomplete' THEN 1 ELSE 0 END) AS incomplete_count,
            SUM(CASE WHEN status = 'Absent' THEN 1 ELSE 0 END) AS absent_count
          FROM attendance_log WHERE $where  GROUP BY month
           ORDER BY month;";

        } else {
            $sql = "SELECT
            DATE_FORMAT(attendance_date, '%Y-%m') AS month,
            SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) AS present_count,
            SUM(CASE WHEN status = 'Incomplete' THEN 1 ELSE 0 END) AS incomplete_count,
            SUM(CASE WHEN status = 'Absent' THEN 1 ELSE 0 END) AS absent_count
          FROM attendance_log
          GROUP BY month
          ORDER BY month";
        }

        $this->sql = $result = $this->mysqli->query($sql);

    }
    public function selectleftjoin($table, $table1, $attributename1, $attributename, $attributes, $where = null)
    {
        $attributess = implode(',', $attributes);
        if ($where != null) {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename WHERE $where";
        } else {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectDistinctLeftJoin($attr = null, $where = null)
    {
        // $attributess = implode(',', $attr);
        if ($where != null) {

            $sql = "SELECT DISTINCT YEAR(attendance_date) AS attendance_year FROM attendance_log ORDER BY attendance_year DESC $where)";

        } else {
            $sql = "SELECT DISTINCT YEAR(attendance_date) AS attendance_year FROM attendance_log ORDER BY attendance_year DESC ";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectDistinctLog($where = null)
    {
        // $attributess = implode(',', $attr);
        if ($where != null) {

            $sql = "SELECT DISTINCT YEAR(attendance_date) AS year, LPAD(MONTH(attendance_date), 2, '0') AS month FROM attendance_log ORDER BY year DESC, month DESC $where)";

        } else {
            $sql = "SELECT DISTINCT YEAR(attendance_date) AS year, LPAD(MONTH(attendance_date), 2, '0') AS month FROM attendance_log ORDER BY year DESC, month DESC";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function selectleftjoin3($table, $table1, $table2, $table3, $attributename1, $attributename2, $attributename3, $attribute1, $attribute2, $attribute3, $attributes, $where = null)
    {
        $attributess = implode(',', $attributes);
        if ($where != null) {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3 WHERE $where";
        } else {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectleftjoinssssssss($attr = null, $where = null)
    {
        if ($where != null) {
            if ($attr != null) {
                $sql = "SELECT yearlevels.*, sections.section_name,  rooms.room_number FROM `yearlevels` LEFT JOIN sections on sections.id = yearlevels.section_id  LEFT JOIN rooms ON rooms.id = yearlevels.designated_room_id WHERE $where ORDER BY time_start ASC";
            } else {
                $sql = "SELECT yearlevels.*, sections.section_name,  rooms.room_number FROM `yearlevels` LEFT JOIN sections on sections.id = yearlevels.section_id  LEFT JOIN rooms ON rooms.id = yearlevels.designated_room_id WHERE $where";
            }
        } else {
            $sql = "SELECT yearlevels.*, sections.section_name,  rooms.room_number FROM `yearlevels` LEFT JOIN sections on sections.id = yearlevels.section_id  LEFT JOIN rooms ON rooms.id = yearlevels.designated_room_id ";
            // $sql = "SELECT class_schedules.id AS class_schedules_id, class_schedules.*, users.*, yearlevels.*, subjects.*, schoolyears.*, sections.* FROM class_schedules LEFT JOIN users ON users.id = class_schedules.teacher_id LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id LEFT JOIN subjects ON subjects.id = class_schedules.subject_id   LEFT JOIN sections ON sections.id = yearlevels.section_id WHERE sem = (SELECT MAX(sem) FROM `class_schedules`) AND school_year = (SELECT MAX(school_year) FROM `schoolyears`)  ";

        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectleftjoin4($table, $table1, $table2, $table3, $table4, $attributename1, $attributename2, $attributename3, $attributename4, $attribute1, $attribute2, $attribute3, $attribute4, $attributes, $where = null)
    {
        $attributess = implode(',', $attributes);
        if ($where != null) {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3 LEFT JOIN $table4 ON $table4.$attributename4=$table.$attribute4 WHERE $where";
        } else {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3 LEFT JOIN $table4 ON $table4.$attributename4=$table.$attribute4 ";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectleftjoin6special($table, $table1, $table2, $table3, $table4, $table5, $table6, $attributename1, $attributename2, $attributename3, $attributename4, $attributename5, $attributename6, $attribute1, $attribute2, $attribute3, $attribute4, $attribute5, $attribute6, $attributes, $where = null)
    {
        $attributess = implode(',', $attributes);
        if ($where != null) {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3 LEFT JOIN $table4 ON $table4.$attributename4=$table3.$attribute4 LEFT JOIN $table5 ON $table5.$attributename5=$table3.$attribute5 LEFT JOIN $table6 ON $table6.$attributename6=$table3.$attribute6 WHERE $where";
        } else {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3 LEFT JOIN $table4 ON $table4.$attributename4=$table3.$attribute4 LEFT JOIN $table5 ON $table5.$attributename5=$table3.$attribute5 LEFT JOIN $table6 ON $table6.$attributename6=$table3.$attribute6";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    // public function selectleftjoin4($table, $table1, $table2, $table3, $table4, $attributename1, $attributename2, $attributename3, $attributename4, $attribute1, $attribute2, $attribute3, $attribute4, $attributes, $where = null) {
    //     $attributess = implode(',', $attributes);
    //     if ($where != null) {
    //         $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3 LEFT JOIN $table4 ON $table4.$attributename4=$table.$attribute4 WHERE $where";
    //     } else {
    //         $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attribute1 LEFT JOIN $table2 ON $table2.$attributename2=$table.$attribute2 LEFT JOIN $table3 ON $table3.$attributename3=$table.$attribute3 LEFT JOIN $table4 ON $table4.$attributename4=$table.$attribute4";
    //     }
    //     $this->sql = $result = $this->mysqli->query($sql);
    // }


    public function sched()
    {
        $sql = "SELECT schedules.*,teacher_schedules.*,rooms.*,subjects.*,yearlevels.* FROM `schedules` LEFT JOIN teacher_schedules ON schedules.teacher_sched_id = teacher_schedules.id LEFT JOIN rooms ON schedules.rooms_id = rooms.id LEFT JOIN yearlevels ON schedules.yearlevels_id = yearlevels.id LEFT JOIN subjects ON schedules.subject_id = subjects.id";
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function sched2($where)
    {
        $sql = "SELECT * FROM `class_schedules` LEFT JOIN yearlevels ON yearlevels.id = class_schedules.yearlevels_id WHERE $where";
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function sched3($where)
    {
        $sql = "SELECT * FROM `class_schedules` WHERE $where";
        $this->sql = $result = $this->mysqli->query($sql);
    }



    public function selectleftjoinauth($where)
    {
        // $attributess = implode(',', $attributes);
        $sql = "SELECT users.*,roles.display_name FROM users LEFT JOIN roles ON roles.id = users.role_id WHERE $where";
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectDocuments($attributes, $where = null)
    {
        $attributess = implode(',', $attributes);
        if ($where != null) {
            $sql = "SELECT $attributess FROM documents LEFT JOIN categories ON documents.category_id = categories.id left JOIN users ON documents.user_id=users.id WHERE $where";
        } else {
            $sql = "SELECT $attributess FROM documents LEFT JOIN categories ON documents.category_id = categories.id left JOIN users ON documents.user_id=users.id";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function selectleftjoin100($table, $table1, $attributename1, $attributename, $attributesName, $where = null)
    {
        $attributes = implode(',', $attributesName);
        if ($where != null) {
            $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename $where";
        } else {
            $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectleftjoin1($table, $table1, $attributename1, $attributename, $att, $whereClause)
    {
        $atts = implode(',', $att);
        $sql = "SELECT $atts FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename where $whereClause";

        $this->sql = $result = $this->mysqli->query($sql);
    }

    // public function selectleftjoin3($table,$table1,$attributename1,$table2,$attributename3,$attributesName=array()){
    //     $attributes = implode(',', $attributesName);
    //     $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.id = $table.$attributename1 LEFT JOIN $table2 ON $table2.id=$attributename3";

    //     $this->sql = $result = $this->mysqli->query($sql);
    // }

}
?>