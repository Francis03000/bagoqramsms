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
        $logo = $_FILES['file']['name'];
        if (empty($logo)) {
            $logo = $_POST['update_img'];
        }





        if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
            $newFilename = $_FILES['file']['name'];

            $newLocation = "../../views/assets/img/" . $newFilename;
            $newImageFileType = pathinfo($newLocation, PATHINFO_EXTENSION);
            $newImageFileType = strtolower($newImageFileType);

            $valid_extensions = array("jpg", "jpeg", "png", "gif");

            if (in_array(strtolower($newImageFileType), $valid_extensions)) {

                $oldLocation = "../../views/assets/img/" . $logo;
                if (file_exists($oldLocation)) {
                    unlink($oldLocation);
                }

                if (move_uploaded_file($_FILES['file']['tmp_name'], $newLocation)) {
                    $logo = $newFilename;
                }
            }
        }




        $id = 1;
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