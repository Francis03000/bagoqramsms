<?php include('layouts/head.php'); ?>
<?php
$role_id = $_SESSION["userRoleId"];

if ($role_id == 0 || $role_id == 1) {
    // header('location: 404');


}
?>
<div class="main-wrapper">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <?php
    $userName = $_SESSION["userFullname"];
    $userId = $_SESSION["user_active_id"];

    $roleName = $_SESSION["userRoleName"];
    $address = $_SESSION["userAddress"];
    $email = $_SESSION["userEmail"];
    $mobile = $_SESSION["userMobile"];
    $user_img = $_SESSION["userImage"];




    ?>


    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">
                            Employee:
                            <?php echo $userName ?>
                        </h3>
                    </div>

                </div>
            </div>
            <input type="hidden" id="user_id" value="<?php echo $userId ?>">
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <h5 class="table-header-color">
                        Attendance
                    </h5>

                </div>
                <div class="card-body">




                    <div id="printR">


                        <div class="row">
                            <div class=" col-6 ">
                                <p class="form-control" name="">Employee Name: <span>
                                        <?php echo $userName ?>
                                    </span></p>

                            </div>

                            <div class="col-6 text-center">
                                <select class="form-control" name="" id="log_year_month">
                                    <option value="">Select Date</option>
                                </select>

                            </div>


                        </div>

                        <!-- Your existing table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-success" id="excel_table">

                                <thead class="bg-light">
                                    <tr>
                                        <th>Time In</th>
                                        <th>Remarks In</th>
                                        <th>Time Out</th>
                                        <th>Remarks Out </th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody id="attendance">
                                </tbody>

                            </table>

                        </div>





                    </div>
                    <hr>
                    <div class="row">


                        <div class="col">
                            <button class="btn btn-primary btn-sm" id="download_excel">Download Data</button>


                        </div>



                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script src="js/employee_attendance.js"></script>
<script>

    // Function to generate the time string in the format "H:MM AM/PM"







</script>
<?php include('layouts/footer.php'); ?>