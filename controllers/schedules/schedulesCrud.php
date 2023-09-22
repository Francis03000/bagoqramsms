<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {

    $DBCRUDAPI->selectleftjoinsss();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData2'])) {
    $sem = $_GET["sem"];
    $school_year_val = $_GET["school_year_val"];
    $DBCRUDAPI->selectleftjoinsss(NULL, "school_year_val = '$school_year_val' AND sem = '$sem' AND status = 'active' ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData3'])) {
    $user_id = $_GET["user_id"];
    $sem = $_GET["sem"];
    $school_year_val = $_GET["school_year_val"];
    $DBCRUDAPI->selectleftjoinsss(NULL, "school_year_val = '$school_year_val' AND sem = '$sem' AND teacher_id = '$user_id'");

    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataEmployee'])) {
    $user_id = $_GET["user_id"];
    $where = "(class_schedules.school_year_val, class_schedules.sem) = (SELECT school_year_val, MAX(sem) AS max_sem FROM class_schedules  WHERE school_year_val = (SELECT MAX(school_year_val) FROM class_schedules) ) AND teacher_id = '$user_id' ";
    $DBCRUDAPI->selectleftjoinsss2($where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataYearSem'])) {
    $user_id = $_GET["user_id"];

    $DBCRUDAPI->select2("class_schedules", "DISTINCT school_year_val AS year, sem", "teacher_id = '$user_id'", "year DESC, sem DESC ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataYearSem2'])) {

    $DBCRUDAPI->select2("class_schedules", "DISTINCT school_year_val AS year, sem", "", "year DESC, sem DESC ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getMaxSem'])) {

    $DBCRUDAPI->select("class_schedules", "MAX(sem) AS latest_sem");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getSelectedTime'])) {
    $wherec = "teacher_id = " . $_GET["teacher_id"] . " AND " . "yearlevels.designated_session_id = " . $_GET["session_id"];
    $DBCRUDAPI->sched2($wherec);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataSched'])) {
    $teacher_id = $_GET['teacher_id'];
    $sem = $_GET['sem'];
    $schoolYear = $_GET['schoolYear'];
    $where = "teacher_id = '$teacher_id' AND sem = '$sem' AND school_year_val = '$schoolYear' ";
    $attr = "*";
    $DBCRUDAPI->selectleftjoinsss($attr, $where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getSelectedTeacherData'])) {
    $wherec = "teacher_id = " . $_GET["teacher_id"];
    $DBCRUDAPI->select("class_schedules", "*", $wherec);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getSelectedDay'])) {
    $wherec = "sample_day = " . $_GET["sample_day"];
    $DBCRUDAPI->select("class_schedules", "*", $wherec);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getSelectedRoom'])) {
    $wherec = "rooms_id = " . $_GET["rooms_id"];
    $DBCRUDAPI->select("class_schedules", "*", $wherec);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['checkYearLevel'])) {
    $wherec = "yearlevels_id = " . $_GET["yearlevels_id"];
    $DBCRUDAPI->sched3($wherec);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['checkSched'])) {
    $teacher_id = $_GET["teacher_id"];
    $sem = $_GET["sem"];
    $school_year = $_GET["school_year"];
    $yearlevels_id = $_GET["yearlevels_id"];
    $sample_day = json_decode($_GET["sample_day"]); // Decode the JSON string into an array
    $time_start = $_GET["time_start"];
    $time_end = $_GET["time_end"];

    // Build the SQL query with a dynamic WHERE clause based on the sample days
    $sampleDayConditions = implode(' OR ', array_map(function ($day) {
        return "sample_day = '$day'";
    }, $sample_day));

    $wherec = " (
        teacher_id = '$teacher_id' OR yearlevels_id = '$yearlevels_id'
    )
    AND school_year_val = '$school_year'
    AND sem = '$sem'
    AND (
        (time_start >= '$time_start' AND time_start < '$time_end') OR
        (time_end > '$time_start' AND time_end <= '$time_end') OR
        (time_start <= '$time_start' AND time_end >= '$time_end')
    )
    AND ($sampleDayConditions)";

    $DBCRUDAPI->select("class_schedules", "*", $wherec);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $type = $_POST["type"];

        $teacher_id = $_POST["teacher_id"];
        $yearlevels_id = $_POST["yearlevels_id"];
        $sem = $_POST["sem"];
        $school_year = $_POST["school_year"];

        $subject_id = $_POST["subject_id"];
        $sample_day = $_POST["sample_day"];
        $time_start = $_POST["time_start"];
        $time_end = $_POST["time_end"];

        if ($type === 'yes') {
            $selectedDays = $_POST["sample_day"];

            foreach ($selectedDays as $value) {
                $DBCRUDAPI->insert('class_schedules', ['teacher_id' => $teacher_id, 'yearlevels_id' => $yearlevels_id, 'subject_id' => $subject_id, 'sem' => $sem, 'school_year_val' => $school_year, 'sample_day' => $value, 'time_start' => $time_start, 'time_end' => $time_end]);

            }

            if ($DBCRUDAPI) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
        } else if ($type === 'no') {
            $selectedDays = $_POST["sample_day"];

            foreach ($selectedDays as $value) {
                $DBCRUDAPI->insert('class_schedules', ['teacher_id' => $teacher_id, 'sem' => $sem, 'school_year_val' => $school_year, 'sample_day' => $value, 'time_start' => $time_start, 'time_end' => $time_end]);

            }

            if ($DBCRUDAPI) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
        }


    } else if (isset($_POST['update'])) {

        $id = $_POST["class_schedules_id"];
        $teacher_id = $_POST["teacher_id"];
        $yearlevels_id = $_POST["yearlevels_id"];
        $sem = $_POST["sem"];
        $school_year = $_POST["school_year"];

        // $rooms_id = $_POST["rooms_id"];
        $subject_id = $_POST["subject_id"];
        $sample_day = $_POST["sample_day"];
        $time_start = $_POST["time_start"];
        $time_end = $_POST["time_end"];

        $DBCRUDAPI->update('class_schedules', ['teacher_id' => $teacher_id, 'yearlevels_id' => $yearlevels_id, 'subject_id' => $subject_id, 'sem' => $sem, 'school_year_val' => $school_year, 'sample_day' => $sample_day, 'time_start' => $time_start, 'time_end' => $time_end], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('class_schedules', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>