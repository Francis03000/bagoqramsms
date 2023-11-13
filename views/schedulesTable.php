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
            <!-- <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Schedules</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Schedules</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div> -->
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Schedule</h5>
                        </div>
                        <div class="col">
                            <button style="float:right;" type="button" class="btn btn-primary" id="add-new"> <i
                                    class="fas fa-plus"></i> Add Schedule</button>
                        </div>

                    </div>

                </div>



                <div class="col-6 text-center col-6 mx-auto d-block">
                    <select class="form-control col-6 mx-auto d-block" name="year_sem" id="year_sem">
                        <option value="">Select Date</option>
                    </select>

                </div>

                <div class=" col-2">
                    <button class="btn fas fa-chevron-circle-left bg-info" id="back_btn">BACK</button>

                </div>
                <div class=" col-2">
                    <button class="btn fas fa-chevron-circle-left bg-warning" id="back_btn2">BACK</button>

                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered  table-striped table-success " id="data_table">
                            <thead class=" bg-green">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Teacher Fullname</th>
                                    <th scope="col">School Year</th>
                                    <th scope="col">Year Level</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="bamsmsTable"></tbody>
                        </table>
                    </div>
                    <?php include('modals/schedulesModal.php'); ?>
                    <?php include('modals/scheduleTableModal.php'); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/schedules2.js"></script>
<?php include('layouts/footer.php'); ?>