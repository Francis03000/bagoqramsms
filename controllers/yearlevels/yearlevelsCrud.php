<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectleftjoinssssssss();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData2'])) {
    $DBCRUDAPI->select("yearlevels", "COUNT(*) AS total_g_s ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDatas'])) {

    $department_id = $_GET['department_id'];
    $school_year = $_GET['school_year'];

    $whereC = "department_id = '$department_id'";
    $attr = ["yearlevels.id", "yearlevels.yearlevel_name", "sections.section_name", "rooms.room_number"];
    $DBCRUDAPI->selectleftrooms($attr, $whereC);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $section_id = $_POST["section_id"];

        $yearlevel_name = $_POST["yearlevel_name"];
        $designated_room_id = $_POST["designated_room_id"];

        $DBCRUDAPI->insert('yearlevels', ['section_id' => $section_id, 'yearlevel_name' => $yearlevel_name, 'designated_room_id' => $designated_room_id,]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $section_id = $_POST["section_id"];

        $yearlevel_name = $_POST["yearlevel_name"];
        $designated_room_id = $_POST["designated_room_id"];

        $DBCRUDAPI->update('yearlevels', ['section_id' => $section_id, 'yearlevel_name' => $yearlevel_name, 'designated_room_id' => $designated_room_id,], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('yearlevels', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>