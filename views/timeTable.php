<?php include('layouts/head.php'); ?>
<?php

header('location: 404');
?>
<div class="main-wrapper">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Time</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Time</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <h5 class="table-header-color">Time</h5>
                    <!-- <input class="form-control mr-sm-2 my-2" type="search" placeholder="Search" aria-label="Search"
                        id="filesearch"> -->
                    <button style="float:right;" type="button" class="btn btn-primary " id="add-new"><i
                            class="fas fa-plus"></i> Add
                        Rooms</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="bamsmsTable"></tbody>
                        </table>
                    </div>
                    <?php include('modals/timeModal.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/time.js"></script>
<?php include('layouts/footer.php'); ?>