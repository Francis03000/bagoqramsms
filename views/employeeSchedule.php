<?php include('layouts/head.php'); ?>
<?php
$role_id = $_SESSION["userRoleId"];

if ($role_id == 0 || $role_id == 1) {
    header('location: 404');


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

    <style>
        #schedTime td {}



        .subject_name {
            display: block;
            text-align: center;
            font-size: 12px;
            line-height: 1;
            padding: 1px;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        .grade_and_section {
            display: block;
            text-align: center;
            font-size: 12px;
            line-height: 1;
            padding: 1px;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        @media print {
            #printR {
                -webkit-print-color-adjust: exact;
            }

        }
    </style>
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
                    <!-- <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                </a>
                            </li>

                        </ul>
                    </div> -->
                </div>
            </div>
            <input type="hidden" id="user_id" value="<?php echo $userId ?>">
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <h5 class="table-header-color">
                        Schedule
                    </h5>

                </div>
                <div class="card-body">
                    <div class=" text-center">
                        <select class="form-control col-4 mx-auto d-block" name="year_sem" id="year_sem">
                            <option value="">Select Date</option>
                        </select>

                    </div>


                    <div id="printR">


                        <p>Employee Name: <span>
                                <?php echo $userName ?>
                            </span></p>

                        <!-- Your existing table -->
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-success">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Time</th>
                                        <th data-day="Monday">Monday</th>
                                        <th data-day="Tuesday">Tuesday</th>
                                        <th data-day="Wednesday">Wednesday</th>
                                        <th data-day="Thursday">Thursday</th>
                                        <th data-day="Friday">Friday</th>
                                        <th data-day="Saturday">Saturday</th>

                                    </tr>
                                </thead>
                                <tbody id="schedTime">
                                    <!-- Existing table body here -->
                                </tbody>
                            </table>




                        </div>
                    </div>
                    <button type="button" class="btn btn-info form-control col-6 mx-auto d-block" id="reset_color">Reset
                        Color</button>


                    <hr>

                    <!-- <button class="btn btn-primary btn-sm" id="printSched">PRINT SCHEDULE</button> -->

                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/employee_sched.js"></script>
<script>

    // Function to generate the time string in the format "H:MM AM/PM"







</script>
<?php include('layouts/footer.php'); ?>