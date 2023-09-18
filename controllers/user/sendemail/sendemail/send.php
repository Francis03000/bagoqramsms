<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'whatscrazy12@gmail.com';
    $mail->Password = 'daphcgcdirmyoebh';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('whatscrazy12@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Name = $_POST["name"];
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"] . '<br>' . "Thank you for Messaging your concern to us!";

    $mail->send();

    echo
        "
    <script>
    document.location.href = '../contact.php';
    </script>
    ";
}



?>