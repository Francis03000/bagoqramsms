<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>QRAMSMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/finger_logo.png">

  <link href="assets/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

  <link rel="stylesheet" href="assets/css/fullcalendar.min.css">

  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">




  <link rel="stylesheet" href="assets/plugins/morris/morris.css">

  <link rel="stylesheet" href="assets/css/style.css">

  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/sweetalert2.all.min.js"></script>
  <script src="assets/js/insta_scan.js"></script>
  <script src="assets/js/table2excel.js"></script>
  <script src="assets/js/datatable.min.js"></script>

  <script src="assets/js/dataTables.bootstrap4.min.js"></script>






  <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
  <![endif]-->
  <style>
    /* @media print {

      .printColor {
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
      }



    } */
  </style>


  <?php session_start(); ?>
  <?php
  if (!isset($_SESSION["userRoleId"])) {
    header('location: ../login/form.php');
    exit();
  }
  ?>
</head>

<body id="body_color">