<?php include('layouts/head.php'); ?>
<?php
$role_id = $_SESSION["userRoleId"];

if ($role_id == 0 || $role_id == 1) {
    // 


} else {
    header('location: 404');

}
?>
<div class="main-wrapper ">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <div class="page-wrapper ">
        <div class="content container-fluid">
            <div class="page-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0 ">Customization</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="card  " style="margin-top:2%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Sections List</h5>
                        </div>
                        <div class="col">
                            <button style="float:right;" type="button" class="btn btn-primary" id="add-new"> <i
                                    class="fas fa-plus"></i> Add </button>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <form id="modalMainForm">
                        <input type="hidden" id="method" name="update">
                        <div class="row">

                            <div class="form-group col-6">
                                <label class="col-form-label">Logo</label>
                                <input type="text" class="form-control" id="logo" name="logo" placeholder="Address"
                                    style="border-color: #606060">
                            </div>

                            <div class="form-group col-6 ">
                                <label class="col-form-label">Choose Color </label>
                                <input type="color" class=" form-control" id="main_color" name="main_color"
                                    style="border-color: #606060">
                            </div>

                        </div>



                        <div class="row">

                            <div class="form-group col-6">
                                <label class="col-form-label">School Name</label>
                                <input type="text" class="form-control" id="school_name" name="school_name"
                                    placeholder="Address" style="border-color: #606060">
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">School Address</label>
                                <input type="text" class="form-control" id="school_address" name="school_address"
                                    placeholder="Address" style="border-color: #606060">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">School Id</label>
                                <input type="text" class="form-control" id="school_id" name="school_id"
                                    placeholder="Contact Number" style="border-color: #606060">
                            </div>

                        </div>


                        <div class="footer">
                            <button type="button" id="btn-mul" name="addNew"
                                class="form-control col-4 d-block mx-auto btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/customize.js"></script>
<?php include('layouts/footer.php'); ?>