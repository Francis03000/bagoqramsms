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
        <div class="content container-fluid" id="container_color">
            <!-- <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Personnels</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Personnels</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div> -->
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Employee List</h5>
                        </div>
                        <div class="col">
                            <button style="float:right;" type="button" class="btn btn-primary" id="add-new"> <i
                                    class="fas fa-plus"></i> Add </button>
                        </div>

                    </div>

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

                        <table class=" table  table-striped table-success " id="excel_table">
                            <thead class=" bg-green">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Profile</th>

                                    <th scope="col">Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Address</th>

                                    <!-- <th scope="col">Contact Number</th> -->
                                    <!-- <th scope="col">Email</th> -->
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="bamsmsTable"></tbody>
                        </table>
                        <!-- <tfoot>
                            <div class="col ">
                                <button style="float:right;" class="btn btn-primary btn-sm" id="download_excel"><i
                                        class="fas fa-file-csv"></i>
                                    Download Data</button>


                            </div>
                        </tfoot> -->

                    </div>

                    <?php include('modals/userModal.php'); ?>

                </div>
                <?php include('modals/user_qrModal.php'); ?>

            </div>
        </div>
    </div>
</div>
<script src="js/user.js"></script>
<?php include('layouts/footer.php'); ?>