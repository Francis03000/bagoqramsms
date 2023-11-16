<?php include('layouts/head.php'); ?>
<?php
$role_id = $_SESSION["userRoleId"];

if ($role_id == 0 || $role_id == 1) {
    // 


} else {
    header('location: 404');

}
?>
<style>
    .active-button {
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .active-button.active {
        background-color: #2a9fd6;
        /* More noticeable color */
        box-shadow: 0 5px 8px rgba(0, 0, 0, 0.8);
        /* More pronounced shadow */
    }
</style>
<div class="main-wrapper">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Scan QR Code</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Scan QR Code</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div> -->
            <div class="card">

                <div class="card-body">
                    <div class="col-4 mx-auto text-center">
                        <button class="form-control text-light bg-green fas fa-archive  active-button active"
                            id="scan_qr_code">SCAN QR CODE</button>
                    </div>
                    <div class="col-4 mx-auto text-center">
                        <button class="form-control text-light bg-warning fas fa-archive  active-button active"
                            id="hide_qr_code">HIDE QR CODE</button>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">




                        <div class="col-md-6">
                            <video id="preview" class="w-100" style="max-width: 500px;"></video>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title">Attendance Log</h5>
                        </div>
                        <div class="col">
                            <button style="float:right;" type="button" class="btn btn-primary" id="done"> <i
                                    class="fas fa-check"></i>Attendance Completed</button>

                        </div>

                    </div>
                    <!-- <input class="form-control mr-sm-2 my-2" type="search" placeholder="Search" aria-label="Search"
                        id="filesearch"> -->



                </div>
                <div class="card-body">
                    <div class="row">


                        <div class=" col-2 text-center mx-0">
                            <select class="form-control" name="" id="attendance_dates"></select>
                        </div>
                        <div class=" col-2 text-center mx-0">
                            <select class="form-control" name="" id="attendance_months">
                                <option value="">Select Month</option>
                            </select>

                        </div>
                        <div class=" col-2 text-center mx-0">
                            <select class="form-control" name="" id="attendance_day">
                            </select>

                        </div>
                    </div>
                    <audio id="backgroundAudio">
                        <source src="assets/audio/audio.mp4" type="audio/mp3">
                    </audio>

                    <audio id="backgroundAudio2">
                        <source src="assets/audio/Timeout-successful.mp4" type="audio/mp3">
                    </audio>

                    <div class="table-responsive">
                        <table class=" table table-striped table-success " id="data_table">
                            <thead class=" bg-green">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Time In</th>
                                    <th scope="col">Afternoon Out</th>
                                    <th scope="col">Afternoon In</th>
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
                    <?php include('modals/attendance_logModal.php'); ?>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="js/attendance.js"></script>
<?php include('layouts/footer.php'); ?>