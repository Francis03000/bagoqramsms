<div class="header-outer " style="height: 90px">
    <div class="header">
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars"
                aria-hidden="true"></i></a>
        <a id="toggle_btn" class="float-left" href="javascript:void(0);">
            <img src="assets/img/sidebar/icon-21.png" alt="">
        </a>

        <!-- <ul class="nav float-left">
            <li>
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="search.html">
                        <input class="form-control" id="filesearch" type="text" placeholder="Search here">
                        <span class="btn"><i class="fa fa-search"></i></span>
                    </form>
                </div>
            </li>
            <li>
                <a href="index" class="mobile-logo d-md-block d-lg-none d-block"><img src="assets/img/finger_logo.png"
                        alt="" width="30" height="30"></a>
            </li>
        </ul> -->



        <ul class="nav user-menu float-right">
            <!--  -->
            <?php
            $email = $_SESSION["userEmail"];

            $user_img = $_SESSION["userImage"];

            $name = $_SESSION["lName"];


            ?>

            <li class="nav-item dropdown has-arrow">
                <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle"
                            src="assets/img/profile/<?php echo $email ?>/<?php echo $user_img ?>" width="50" height="45"
                            alt="Admin Picture">
                        <span class="status online"></span></span>
                    <span>
                        <?php echo $name ?>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <a class="dropdown-item" href="../views/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fas fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.php">My Profile</a>

                <a class="dropdown-item" href="../views/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>