<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include_once('../../API/DBCRUDAPI.php');
include('../../libs/phpqrcode/qrlib.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectleftjoin("users", "roles", "id", "role_id", ["users.*", "roles.display_name"], "users.role_id != 0 AND  users.role_id != 0 AND status = 'active'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData2'])) {
    $DBCRUDAPI->select("users", "COUNT(*) AS total_users ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataInac'])) {
    $DBCRUDAPI->selectleftjoin("users", "roles", "id", "role_id", ["users.*", "roles.display_name"], "users.role_id != 1 AND status = 'inactive'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $user_img = $_FILES['file']['name'];

        $role_id = $_POST["role_id"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $contact_num = $_POST["contact_num"];
        $email = $_POST["email"];
        $teaching = $_POST["teaching"];
        $password = $_POST["password"];
        $dec_password = $_POST["dec_password"];

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'francisdeleon872@gmail.com';
        $mail->Password = 'ayeyfgqrsfbvvsde';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('francisdeleon872@gmail.com');

        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);

        $mail->Name = "QRAMSMS Account Password";
        $mail->Subject = "QRAMSMS Account Password";
        $mail->Body = "Your password: " . $_POST["dec_password"];

        $mail->send();


        if (!file_exists("../../views/assets/img/profile/" . $email . "")) {
            mkdir("../../views/assets/img/profile/" . $email . "", 0777, true);
        }

        if (isset($_FILES['file']['name'])) {

            /* Getting file name */
            $filename = $_FILES['file']['name'];

            /* Location */
            $location = "../../views/assets/img/profile/" . $email . "/" . $filename;
            $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);

            /* Valid extensions */
            $valid_extensions = array("jpg", "jpeg", "png", "gif");

            $response = 0;
            /* Check file extension */
            if (in_array(strtolower($imageFileType), $valid_extensions)) {
                /* Upload file */
                if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                    $response = $location;
                }
            }
        }


        function generateRandomBinaryNumber($minLength = 25)
        {
            // Ensure the minimum length is met
            $length = max($minLength, 1);

            $binaryNumber = '';

            // Generate a random binary number
            for ($i = 0; $i < $length; $i++) {
                $binaryNumber .= mt_rand(0, 1);
            }

            return $binaryNumber;
        }

        $randomBinaryNumber = generateRandomBinaryNumber(50);

        $qr_code = $randomBinaryNumber . $_POST['fname'] . $_POST['mname'] . $_POST['lname'] . $_POST['email'];
        $filename = $qr_code . '.png';
        $tempDir = '../../views/assets/qr_code/';
        $codeContents = "$qr_code";
        QRcode::png($codeContents, $tempDir . '' . $filename, QR_ECLEVEL_L, 5);

        // Your logo file
        $logoFile = 'sto-logo.png';

        // Load the QR code image
        $qrImage = imagecreatefrompng($tempDir . $filename);


        $logoImage = imagecreatefrompng($logoFile);

        $desiredWidth = 30;
        $desiredHeight = 30;

        $logoImage = imagescale($logoImage, $desiredWidth, $desiredHeight);

        $qrWidth = imagesx($qrImage);
        $qrHeight = imagesy($qrImage);
        $logoWidth = imagesx($logoImage);
        $logoHeight = imagesy($logoImage);

        $logoX = ($qrWidth - $logoWidth) / 2;
        $logoY = ($qrHeight - $logoHeight) / 2;

        imagecopy($qrImage, $logoImage, $logoX, $logoY, 0, 0, $logoWidth, $logoHeight);

        imagepng($qrImage, $tempDir . $filename);

        imagedestroy($qrImage);
        imagedestroy($logoImage);

        $DBCRUDAPI->insert('users', ['user_img' => $user_img, 'role_id' => $role_id, 'qr_code' => $qr_code, 'fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'address' => $address, 'contact_num' => $contact_num, 'email' => $email, 'status' => 'active', 'teaching' => $teaching, 'password' => $password]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {
        $user_img = $_FILES['file']['name'];
        if (empty($user_img)) {
            $user_img = $_POST['update_img'];
        }


        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $contact_num = $_POST["contact_num"];
        $email = $_POST["email"];
        $teaching = $_POST["teaching"];
        $role_id = $_POST["role_id"];


        if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
            $newFilename = $_FILES['file']['name'];

            $newLocation = "../../views/assets/img/profile/" . $email . "/" . $newFilename;
            $newImageFileType = pathinfo($newLocation, PATHINFO_EXTENSION);
            $newImageFileType = strtolower($newImageFileType);

            $valid_extensions = array("jpg", "jpeg", "png", "gif");

            if (in_array(strtolower($newImageFileType), $valid_extensions)) {

                $oldLocation = "../../views/assets/img/profile/" . $email . "/" . $user_img;
                if (file_exists($oldLocation)) {
                    unlink($oldLocation);
                }

                if (move_uploaded_file($_FILES['file']['tmp_name'], $newLocation)) {
                    $user_img = $newFilename;
                }
            }
        }




        $DBCRUDAPI->update('users', ['user_img' => $user_img, 'role_id' => $role_id, 'fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'address' => $address, 'contact_num' => $contact_num, 'email' => $email, 'teaching' => $teaching], "id='$id'");
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
        $qr_code = $_POST["qr_code"];


        $qr_code_filename = $qr_code . ".png";
        if (!empty($qr_code_filename)) {
            $tempDir = '../../views/assets/qr_code/';
            $qr_code_filepath = $tempDir . $qr_code_filename;

            if (file_exists($qr_code_filepath)) {
                unlink($qr_code_filepath);
            }
        }

        $DBCRUDAPI->delete('users', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>