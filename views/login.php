<?php include('layouts/head.php') ?>
<?php

header('location: 404.php');
?>
<style>
    .container-bg {
        background: linear-gradient(to right, #6d2d41, #a3525c, #a3525c, #6d2d41);

    }
</style>
<div class="container-fluid ">
    <div class="row justify-content-center align-items-center vh-100 container-bg">

        <div class="col-lg-3 col-md-5 col-sm-7 col-8">
            <img src="assets/img/sto-logo.png" class="rounded-circle border border-danger bg-white img-fluid mb-4"
                style="max-height: 290px;">
        </div>
        <div class="col-lg-5 col-md-5 col-sm-7 col-8 bg-white border border-danger rounded ">
            <form class="login-form p-4 rounded" action="" method="post">
                <h2 class="text-center mb-4">Login</h2>
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" class="form-control rounded-pill" id="username" name="username" required
                        style="border-color: #0d0d0d">
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control rounded-pill" id="password" name="password" required
                        style="border-color: #0d0d0d">
                </div>
                <button class="btn btn-primary rounded-pill w-100" type="submit">Sign In</button>
            </form>
        </div>
    </div>
</div>
<?php include('layouts/footer.php') ?>