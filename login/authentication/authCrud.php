<?php

session_start();
include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_POST['loginUser'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $whereClause = "email='" . $email . "'AND password='" . $password . "'";
    $DBCRUDAPI->selectleftjoinauth($whereClause);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $_SESSION['userFullname'] = strtoupper($datass['fname'] . " " . $datass['mname'] . " " . $datass['lname']);
        $_SESSION['lName'] = strtoupper($datass['lname']);

        $_SESSION['userRoleName'] = $datass['display_name'];
        $_SESSION['userRoleId'] = $datass['role_id'];
        $_SESSION['user_active_id'] = $datass['id'];
        $_SESSION['userEmail'] = $datass['email'];
        $_SESSION['userAddress'] = $datass['address'];
        $_SESSION['userMobile'] = $datass['contact_num'];
        $_SESSION['userImage'] = $datass['user_img'];
        $_SESSION['password'] = $datass['password'];





        // $_SESSION['userProfile'] = $datass['user_profile'];
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_POST['logoutUser'])) {
    session_destroy();
}

?>