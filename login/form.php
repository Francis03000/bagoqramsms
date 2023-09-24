<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="../views/assets/img/finger_logo.png">
  <link href="../views/assets/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"> -->

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="../views/assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../views/assets/plugins/fontawesome/css/fontawesome.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>QRAMSMS</title>


  <?php session_start(); ?>
  <?php
  if (isset($_SESSION["userRoleId"])) {
    header('location: ../views/index.php');
    exit();
  }
  ?>
</head>

<body style="background-color: cyan;">


  <section class="">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block text-center">
                <div class="d-flex  align-items-center justify-content-center"
                  style="height: 100%; margin-left: 10px ; ">
                  <img alt="login logo" id="myImage" class=" rounded-circle img-fluid"
                    style="max-width: 100%; height: auto;" />
                </div>
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="#" method="post">
                    <div class="dflex align-items-center mb-3 pb-1 ">

                      <i><img src="../views/assets/img/finger_logo.png" width="40" height="40" alt=""></i>
                      <span class="h2 fw-bold mb-0 text-center">QCAMSMS</span>
                    </div>
                    <h5 class="fw-normal  mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                    <div class="form-group mb-4">
                      <div class="input-group">
                        <input type="text" class="form-control form-control-lg" id="email" name="email" />
                        <label class="input-group-text bg-warning" for="email"><i class="fas fa-envelope"></i></label>
                      </div>
                      <label class="form-label" for="email">Email address</label>
                    </div>
                    <div class="form-group mb-4">
                      <div class="input-group">
                        <input type="password" class="form-control form-control-lg" id="password" name="password" />
                        <label class="input-group-text bg-success" for="email"><i class="fas fa-key"></i></label>
                      </div>
                      <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="text-center mt-3 ">
                      <p class="text-danger" id="countdown-timer"></p>
                    </div>
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="button" id="loginUser">Login</button>
                    </div>
                    <a class="small text-muted" href="#!">Forgot password?</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!-- <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('../img/bg.JPG');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
                <h3>Login to <strong>LPBNHS</strong></h3>
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="user_username">Username</label>
                  <input type="text" class="form-control" placeholder="your-email@gmail.com" id="emali"
                    name="user_username">
                </div>
                <div class="form-group last mb-3">
                  <label for="user_password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="user_password"
                    name="user_password">
                </div>
              </form>
              <button id="loginUser" class="btn btn-block btn-primary">Login</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="../views/assets/js/sweetalert2.all.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script type="module" src="authentication/auth.js"></script>
</body>

</html>