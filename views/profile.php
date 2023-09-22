<?php include('layouts/head.php'); ?>
<div class="main-wrapper">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <?php
    $userName = $_SESSION["userFullname"];
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
                        <h3 class="page-title mb-0">Profile</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Profile</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
            <section style="background-color: #eee;">
                <div class="container py-3">
                    <div class="container-fluid" style="height: 65vh;">
                        <div class="row h-100">
                            <div class="col-lg-4 d-flex align-items-stretch">
                                <div class="card mb-4 w-100">
                                    <div class="card-body text-center" slot="color: black">

                                        <img src="assets/img/profile/<?php echo $email ?>/<?php echo $user_img ?>"
                                            alt="avatar" class="img-thumbnail img-fluid"
                                            style="width: 170px; height: 170px;">
                                        <h4 class="my-3 font-weight-bold ">
                                            <?php echo $userName ?>

                                        </h4>
                                        <p class=" h4 mb-1">
                                            <?php echo $roleName ?>
                                        </p>
                                        <p class=" h4 mb-4 mt-2">
                                            <?php echo $address ?>
                                        </p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <button type="button" class="btn btn-primary">Follow</button>
                                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 d-flex align-items-stretch">
                                <div class="card mb-4 w-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class=" col-sm-3">
                                                <p class="mb-0 font-weight-bold">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class=" h4 mb-0">
                                                    <?php echo $userName ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0 font-weight-bold">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="h4 mb-0">
                                                    <?php echo $email ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0 font-weight-bold">Mobile</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="h4 mb-0">
                                                    <?php echo $mobile ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Mobile</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class=" mb-0">(098) 765-4321</p>
                                            </div>
                                        </div> -->
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3 font-weight-bold">
                                                <p class="mb-0">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="h4 mb-0">
                                                    <?php echo $address ?>
                                                </p>
                                            </div>
                                        </div>
                                        <br><br>

                                        <label
                                            class="h4 font-weight-bold col-form-label d-block mx-auto text-center">Change
                                            Password</label>


                                        <div class="row">

                                            <div class="form-group col-6">
                                                <label class="col-form-label">New Password</label>
                                                <input type="password" class="form-control" id="pass1" name="pass1"
                                                    placeholder="password" style="border-color: #606060">
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="col-form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="pass2" name="pass2"
                                                    placeholder="password" style="border-color: #606060">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<!-- <script src="js/guard.js"></script> -->
<script>
    $(document).ready(function () {
        // Select the password fields by their IDs
        var pass1Field = $('#pass1');
        var pass2Field = $('#pass2');

        // Function to check if passwords match
        function checkPasswordMatch() {
            var pass1 = pass1Field.val();
            var pass2 = pass2Field.val();

            if (pass1 === pass2) {
                pass1Field.css('border-color', 'green');
                pass2Field.css('border-color', 'green');
            } else {
                pass1Field.css('border-color', 'red');
                pass2Field.css('border-color', 'red');
            }
        }

        pass2Field.on('input', checkPasswordMatch);
    });
</script>


<?php include('layouts/footer.php'); ?>