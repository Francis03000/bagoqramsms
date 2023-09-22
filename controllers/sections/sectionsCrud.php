<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("sections", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}
if (isset($_GET['getData2'])) {
    $DBCRUDAPI->select_date();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $section_name = $_POST["section_name"];

        $DBCRUDAPI->insert('sections', ['section_name' => $section_name]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $section_name = $_POST["section_name"];

        $DBCRUDAPI->update('sections', ['section_name' => $section_name], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('sections', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>