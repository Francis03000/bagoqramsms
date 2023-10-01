<div class="sidebar" id="sidebar">


    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="index" class="logo">
                    <img src="assets/img/finger_logo.png" width="40" height="40" alt="">
                    <span class="text-uppercase">QRAMSMS</span>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li class="menu-title">Menu</li>
                <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'index') {
                    echo 'active';
                } ?>">
                    <a href="index"><img src="assets/img/sidebar/home.png" alt="icon"
                            style="width: 28px"><span>Dashboard</span></a>
                </li>

                <?php
                $role_id = $_SESSION["userRoleId"];

                if ($role_id == 0 || $role_id == 1) { ?>


                    <li class="">
                        <a href="rolesTable"><img src="assets/img/sidebar/businessman.png" alt="icon"
                                style="width: 28px"><span>Roles</span></a>
                    </li>

                    <li class="">
                        <a href="userTable"><img src="assets/img/sidebar/team.png" alt="icon"
                                style="width: 28px"><span>Personnels</span></a>
                    </li>
                    <!-- <li class="submenu">
                    <a href="#"><img src="assets/img/sidebar/icon-4.png" alt="icon"> <span> Personnels</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="teachersTable"><span>Teacher List </span></a></li>
                        <li><a href="guardsTable"><span>Guard List</span></a></li>
                        <li><a href="staffsTable"><span>Staff List </span></a></li>
                    </ul>
                    </li> -->
                    <li class="">
                        <a href="sectionsTable"><img src="assets/img/sidebar/knowledge.png" alt="icon"
                                style="width: 28px"><span>Sections</span></a>
                    </li>
                    <!-- <li class="">
                    <a href="departmentsTable"><img src="assets/img/sidebar/department.png" alt="icon"
                            style="width: 28px"><span>Departments</span></a>
                    </li> -->
                    <!-- <li class="">
                        <a href="strandsTable"><img src="assets/img/sidebar/department.png" alt="icon"
                                style="width: 28px"><span>Strands</span></a>
                    </li> -->
                    <li class="">
                        <a href="schoolyearsTable"><img src="assets/img/sidebar/school_year.png" alt="icon"
                                style="width: 28px"><span>School
                                Year</span></a>
                    </li>
                    <li class="">
                        <a href="roomsTable"><img src="assets/img/sidebar/room.png" alt="icon"
                                style="width: 28px"><span>Rooms</span></a>
                    </li>
                    <li class="">
                        <a href="subjectsTable"><img src="assets/img/sidebar/subject.png" alt="icon"
                                style="width: 28px"><span>Subjects</span></a>
                    </li>
                    <!-- <li class="">
                    <a href="teacherSchedulesTable"><img src="assets/img/sidebar/icon-8.png" alt="icon"><span>Teacher
                            Schedules</span></a>
                    </li> -->
                    <li class="">
                        <a href="yearlevelsTable"><img src="assets/img/dash/dash-2.png" alt="icon"
                                style="width: 28px"><span>Grades &
                                Sections</span></a>
                    </li>
                    <!-- <li class="">
                    <a href="timeTable"><img src="assets/img/sidebar/icon-9.png" alt="icon"><span>Time</span></a>
                    </li> -->
                    <li class="">
                        <a href="schedulesTable"><img src="assets/img/dash/sched.png" alt="icon"
                                style="width: 28px"><span>Generate
                                Schedule</span></a>
                    </li>
                    <li class="">
                        <a href="attendance_view"><img src="assets/img/dash/log.png" alt="icon"
                                style="width: 28px"><span>Attendance
                            </span></a>
                    </li>
                    <?php
                    if ($role_id == 0) {
                        ?>
                        <li class="">
                            <a href="customization"><img src="assets/img/sidebar/settings.png" alt="icon"
                                    style="width: 28px"><span>Customization
                                </span></a>
                        </li>

                        <?php
                    }
                    ?>



                    <?php
                } else { ?>
                    <li class="">
                        <a href="employeeSchedule"><img src="assets/img/dash/sched.png" alt="icon"
                                style="width: 28px"><span>
                                Schedule</span></a>
                    </li>

                    <li class="">
                        <a href="employee_Attendance"><img src="assets/img/dash/log.png" alt="icon"
                                style="width: 28px"><span>Attendance
                            </span></a>
                    </li>


                    <?php

                }
                ?>


                <!-- <li class="">
                    <a href="attendance_log"><img src="assets/img/dash/log.png" alt="icon"
                            style="width: 28px"><span>Attendance
                            Log</span></a>
                </li> -->



            </ul>
        </div>
    </div>
</div>


<script>
    const sidebarUl = document.querySelector('.sidebar-ul');
    const sidebarLinks = sidebarUl.querySelectorAll('a');

    sidebarLinks.forEach(link => {
        if (window.location.href.includes(link.href)) {
            link.parentElement.classList.add('active');
        }

        link.addEventListener('click', () => {
            sidebarLinks.forEach(link => link.parentElement.classList.remove('active'));
            link.parentElement.classList.add('active');
        });
    });
</script>