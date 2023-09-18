<?php include('layouts/head.php'); ?>
<?php

header('location: 404');
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
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Teachers</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Teachers</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <h5 class="table-header-color">Teachers List</h5>
                    <input class="form-control mr-sm-2 my-2" type="search" placeholder="Search" aria-label="Search"
                        id="filesearch">
                    <button style="float:right;" type="button" class="btn btn-primary" id="add-new"> <i
                            class="fas fa-plus"></i> Add</button>
                </div>
                <div class="row">
                    <div class="col-4 mx-auto text-center">
                        <button class="form-control text-light bg-green  active-button active" id="active-list">Active
                            List</button>
                    </div>
                    <div class="col-4 mx-auto text-center">
                        <button class="form-control text-light bg-info fas fa-archive  active-button "
                            id="archived-list">Archived
                            List</button>
                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Address</th>
                                    <!-- <th scope="col">Contact Number</th> -->
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="bamsmsTable"></tbody>
                        </table>
                    </div>
                    <?php include('modals/teachersModal.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/teachers.js"></script>
<?php include('layouts/footer.php'); ?>