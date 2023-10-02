<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $qr_code = $_GET['qr_code'];

    $DBCRUDAPI->select("users", "*", "qr_code = '$qr_code' AND status = 'active'");
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


} else if (isset($_GET['getDataDayTime'])) {
    $teacher_id = $_GET['user_id'];
    $sample_day = $_GET['sample_day'];
    $DBCRUDAPI->select("class_schedules", "MIN(time_start) AS lowest_time_start,
    MAX(time_end) AS highest_time_end", "teacher_id = '$teacher_id' AND sample_day = '$sample_day' AND (school_year_val, sem) = ( SELECT school_year_val, MAX(sem) AS max_sem FROM class_schedules WHERE school_year_val = ( SELECT MAX(school_year_val) FROM class_schedules )) ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);


} else if (isset($_GET['getIncompleteData'])) {

    $attendance_date = $_GET['attendance_date'];
    // $wherec = "attendance_date = '$attendance_date'"; 
    $DBCRUDAPI->selectleftjoins_logs_users();
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

        $DBCRUDAPI->insert('attendance_log', ['user_id' => $user_id, 'time_in' => $time_in, 'remarks_in' => $remarks_in, 'status' => 'Incomplete', 'attendance_date' => $attendance_date]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $time_out = $_POST["time_out"];
        $remarks_out = $_POST["remarks_out"];
        $user_id = $_POST["user_id"];
        $status = $_POST["stats"];
        $attendance_date = $_POST["attendance_date"];


        $DBCRUDAPI->update('attendance_log', ['time_out' => $time_out, 'remarks_out' => $remarks_out, 'status' => $status], "user_id = '$user_id' AND attendance_date = '$attendance_date' ");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['update2'])) {

        $time_out = $_POST["time_out"];
        $user_id = $_POST["user_id"];
        $attendance_date = $_POST["attendance_date"];


        $DBCRUDAPI->update('attendance_log', ['time_out2' => $time_out], "user_id = '$user_id' AND attendance_date = '$attendance_date' ");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['update3'])) {

        $time_in = $_POST["time_in"];
        $user_id = $_POST["user_id"];
        $attendance_date = $_POST["attendance_date"];


        $DBCRUDAPI->update('attendance_log', ['time_in2' => $time_in], "user_id = '$user_id' AND attendance_date = '$attendance_date' ");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['insertAbsent'])) {


        $user_id = $_POST["user_id"];
        $attendance_date = $_POST["attendance_date"];
        $status = $_POST["stats"];


        $DBCRUDAPI->insert('attendance_log', ['user_id' => $user_id, 'status' => $status, 'attendance_date' => $attendance_date]);
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('departments', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>