<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("school", "*", );
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    // if (isset($_POST['addNew'])) {
    // $display_name = $_POST["display_name"];
    // $display_name = $_POST["display_name"];
    // $display_name = $_POST["display_name"];
    // $display_name = $_POST["display_name"];
    // $display_name = $_POST["display_name"];


    //     $DBCRUDAPI->insert('school', ['display_name' => $display_name]);

    //     if ($DBCRUDAPI) {
    //         echo json_encode(array("success" => true));
    //     } else {
    //         echo json_encode(array("success" => false));
    //     }

    // } else
    if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $school_logo = $_POST["school_logo"];
        $school_name = $_POST["school_name"];
        $school_address = $_POST["school_address"];
        $school_id = $_POST["school_id"];
        $school_email = $_POST["school_email"];
        $password = $_POST["password"];

        $DBCRUDAPI->update('school', ['school_logo' => $school_logo, 'school_name' => $school_name, 'school_address' => $school_address, 'school_id' => $school_id, 'school_email' => $school_email, 'password' => $password], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }
    // else if (isset($_POST['delete'])) {

    //     $id = $_POST["id"];

    //     $DBCRUDAPI->delete('school', "id='$id'");
    //     if ($DBCRUDAPI) {
    //         echo json_encode(array("success" => true));
    //     } else {
    //         echo json_encode(array("success" => false));
    //     }

    // }
}


?>