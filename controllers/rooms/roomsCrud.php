<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {

    $oder = "room_number asc";
    $DBCRUDAPI->select("rooms", "*", NULL, $oder);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData2'])) {

    $DBCRUDAPI->select("rooms", "COUNT(*) AS total_room");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $room_number = $_POST["room_number"];
        $room_name = $_POST["room_name"];

        $DBCRUDAPI->insert('rooms', ['room_number' => $room_number, 'room_name' => $room_name]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $room_number = $_POST["room_number"];
        $room_name = $_POST["room_name"];

        $DBCRUDAPI->update('rooms', ['room_number' => $room_number, 'room_name' => $room_name], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('rooms', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>