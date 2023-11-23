<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("schoolyears", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $school_year = $_POST["school_year"];
        $batch_name = $_POST["batch_name"];

        try {
            $DBCRUDAPI->insert('schoolyears', ['school_year' => $school_year, 'batch_name' => $batch_name]);
            echo json_encode(array("success" => true));
        } catch (Exception $e) {

            echo json_encode(array("success" => false, "error" => $e->getMessage()));
        }

    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $school_year = $_POST["school_year"];
        $batch_name = $_POST["batch_name"];

        try {
            $DBCRUDAPI->update('schoolyears', ['school_year' => $school_year, 'batch_name' => $batch_name], "id='$id'");
            echo json_encode(array("success" => true));
        } catch (Exception $e) {

            echo json_encode(array("success" => false, "error" => $e->getMessage()));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('schoolyears', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>