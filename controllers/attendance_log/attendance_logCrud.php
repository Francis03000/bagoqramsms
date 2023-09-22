<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $attendance_date = $_GET['attendance_date'];
    $DBCRUDAPI->selectleftjoin("attendance_log", "users", "id", "user_id", ["attendance_log.*", "users.fname", "users.mname", "users.lname"], "attendance_date = '$attendance_date'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}
if (isset($_GET['getData2'])) {
    $DBCRUDAPI->selectleftjoinAttLog();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataLogs'])) {
    $user_id = $_GET['user_id'];
    $attendance_date = $_GET['attendance_date'];
    $DBCRUDAPI->select("attendance_log", "*", "user_id = '$user_id' AND attendance_date = '$attendance_date' ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getDistinctLog'])) {

    $DBCRUDAPI->selectDistinctLog();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getDataEmployee'])) {
    $user_id = $_GET['user_id'];
    $attendance_date = $_GET['attendance_date'];

    $DBCRUDAPI->selectleftjoin("attendance_log", "users", "id", "user_id", ["attendance_log.*", "users.fname", "users.mname", "users.lname"], "users.id = '$user_id' AND attendance_date LIKE '%$attendance_date%'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getDataEmployee2'])) {
    $attendance_date = $_GET['attendance_date'];

    $DBCRUDAPI->selectleftjoin("attendance_log", "users", "id", "user_id", ["attendance_log.*", "users.fname", "users.mname", "users.lname"], " attendance_date LIKE '%$attendance_date%'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getDataEmployee2'])) {
    $user_id = $_GET['user_id'];
    $attendance_date = $_GET['attendance_date'];

    $DBCRUDAPI->selectleftjoin("attendance_log", "users", "id", "user_id", ["attendance_log.*", "users.fname", "users.mname", "users.lname"], "users.id = '$user_id' AND attendance_date LIKE '%$attendance_date%'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getDates'])) {

    $DBCRUDAPI->selectAttendanceDate();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getDays'])) {
    $attendance_date = $_GET['attendance_date'];
    $where = "attendance_date LIKE '%$attendance_date%'";
    $attr = "*";
    $DBCRUDAPI->selectAttendanceDays($attr, $where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getDateClick'])) {

    $attendance_date = $_GET['attendance_date'];
    $DBCRUDAPI->selectleftjoin("attendance_log", "users", "id", "user_id", ["attendance_log.*", "users.fname", "users.mname", "users.lname"], "attendance_date = '$attendance_date'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);



} else {
    if (isset($_POST['addNew'])) {
        $user_id = $_POST["user_id"];
        $time_in = $_POST["time_in"];
        $remarks_in = $_POST["remarks_in"];
        $attendance_date = $_POST["attendance_date"];

        $DBCRUDAPI->insert('attendance_log', ['user_id' => $user_id, 'time_in' => $time_in, 'remarks_in' => $remarks_in, 'attendance_date' => $attendance_date]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $time_out = $_POST["time_out"];
        $remarks_out = $_POST["remarks_out"];
        $user_id = $_POST["user_id"];
        $attendance_date = $_POST["attendance_date"];


        $DBCRUDAPI->update('attendance_log', ['time_out' => $time_out, 'remarks_out' => $remarks_out], "user_id = '$user_id' AND attendance_date = '$attendance_date' ");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('attendance_log', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>