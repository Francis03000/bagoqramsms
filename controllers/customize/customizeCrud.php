<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("customize", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['update'])) {

        $id = 1;
        $logo = $_POST["logo"];
        $school_name = $_POST["school_name"];
        $school_address = $_POST["school_address"];
        $school_id = $_POST["school_id"];
        $main_color = $_POST["main_color"];


        $DBCRUDAPI->update('customize', ['logo' => $logo, 'school_name' => $school_name, 'school_address' => $school_address, 'school_id' => $school_id, 'main_color' => $main_color], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('customize', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>