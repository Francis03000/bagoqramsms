<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {

    $DBCRUDAPI->select("subjects", "*");

    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData2'])) {

    $DBCRUDAPI->select("subjects", "COUNT(*) AS total_sub");

    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataDepart'])) {
    $id = $_GET["id"];
    $DBCRUDAPI->select("subjects", "*", "department_id  = '$id'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['checkSub'])) {
    $subject_name = $_GET["subject_name"];
    $department_id = $_GET["department_id"];
    $DBCRUDAPI->select("subjects", "*", "subject_name  = '$subject_name' AND department_id  = '$department_id'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getSubs'])) {

    $DBCRUDAPI->selectSub("");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataSched'])) {
    $DBCRUDAPI->select("subjects", "*");

    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $subject_name = $_POST["subject_name"];


        $DBCRUDAPI->insert('subjects', ['subject_name' => $subject_name]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $subject_name = $_POST["subject_name"];

        $DBCRUDAPI->update('subjects', ['subject_name' => $subject_name,], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];
        $subject_name = $_POST["subject_name"];

        $DBCRUDAPI->delete('subjects', "id='$id' AND subject_name='$subject_name'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>