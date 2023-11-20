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

        try {
            $DBCRUDAPI->insert('sections', ['section_name' => $section_name]);

            echo json_encode(array("success" => true));
        } catch (Exception $e) {

            echo json_encode(array("success" => false, "error" => $e->getMessage()));
        }
    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $section_name = $_POST["section_name"];

        try {
            $DBCRUDAPI->update('sections', ['section_name' => $section_name], "id='$id'");
            echo json_encode(array("success" => true));
        } catch (Exception $e) {

            echo json_encode(array("success" => false, "error" => $e->getMessage()));
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