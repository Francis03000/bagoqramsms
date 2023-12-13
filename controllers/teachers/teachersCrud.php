<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $teaching = $_GET['teaching'];

    $DBCRUDAPI->selectleftjoin("users", "roles", "id", "role_id", ["users.*", "roles.display_name"], "users.role_id != 1 AND users.role_id != 0 AND status = 'active' AND teaching = '$teaching' ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}
if (isset($_GET['getData2'])) {

    $DBCRUDAPI->selectleftjoin("users", "roles", "id", "role_id", ["users.*", "roles.display_name"], "users.role_id != 1 AND users.role_id != 0 AND status = 'active' ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataTeach'])) {
    $id = $_GET['id'];
    $DBCRUDAPI->select("users", "*", "id = '$id'");

    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataInac'])) {
    $DBCRUDAPI->selectleftjoin("users", "roles", "id", "role_id", ["users.*", "roles.display_name"], "users.role_id = 3 AND status = 'inactive'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $role_id = $_POST["role_id"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $contact_num = $_POST["contact_num"];
        $email = $_POST["email"];

        $DBCRUDAPI->insert('users', ['role_id' => $role_id, 'fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'address' => $address, 'contact_num' => $contact_num, 'email' => $email, 'status' => 'active']);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $contact_num = $_POST["contact_num"];
        $email = $_POST["email"];

        $DBCRUDAPI->update('users', ['fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'address' => $address, 'contact_num' => $contact_num, 'email' => $email], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['archive'])) {

        $id = $_POST["id"];
        $status = $_POST["status"];

        $DBCRUDAPI->update('users', ['status' => $status], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('users', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>