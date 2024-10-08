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
        <div class="content container-fluid" id="container_color">
            <!-- <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Roles</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Roles</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div> -->
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Roles List</h5>
                        </div>
                        <div class="col">
                            <button style="float:right;" type="button" class="btn btn-primary" id="add-new"> <i
                                    class="fas fa-plus"></i> Add </button>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-success " id="data_table">
                            <thead class=" bg-green">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Roles</th>

                                    <th scope="col" colspan="3">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="bamsmsTable"></tbody>
                        </table>
                    </div>
                    <?php include('modals/rolesModal.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/roles.js"></script>
<?php include('layouts/footer.php'); ?>