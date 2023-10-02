<?php include('layouts/head.php'); ?>
<?php
$role_id = $_SESSION["userRoleId"];

if ($role_id == 0 || $role_id == 1) {
    // 


} else {
    header('location: 404');

}
?>

<div class="main-wrapper">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Attendance Log</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Attendance Log</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <h5 class="table-header-color">Attendance Log</h5>
                    <!-- <input class="form-control mr-sm-2 my-2" type="search" placeholder="Search" aria-label="Search"
                        id="filesearch"> -->


                    <button style="float:right;" type="button" class="btn btn-primary" id="add-new"> <i
                            class="fas fa-plus"></i> Add</button>
                </div>
                <div class="card-body">
                    <!-- <div class="row">
                        <div class=" col-3 text-center">
                            <select class="form-control" name="" id="attendance_dates"></select>
                        </div>
                        <div class=" col-3 text-center">
                            <select class="form-control" name="" id="attendance_months">
                                <option value="">Select Month</option>
                            </select>

                        </div>
                        <div class=" col-3 text-center">
                            <select class="form-control" name="" id="attendance_day">
                            </select>

                        </div>
                    </div> -->




                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Time In</th>
                                    <th scope="col">Afternoon In</th>
                                    <th scope="col">Afternoon Out</th>
                                    <th scope="col">Time Out</th>
                                    <!-- <th scope="col">Remarks In</th> -->
                                    <!-- <th scope="col">Remarks Out</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendance Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="bamsmsTable"></tbody>
                        </table>

                    </div>
                    <?php include('modals/attendance_Modal.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/attendance_log.js"></script>
<?php include('layouts/footer.php'); ?>