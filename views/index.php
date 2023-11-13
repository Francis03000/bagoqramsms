<?php include('layouts/head.php') ?>
<div class="main-wrapper">

    <?php include('layouts/header.php') ?>
    <?php include('layouts/sidebar.php') ?>
    <div class="page-wrapper">
        <div class="content container-fluid " id="container_color">

            <div class="page-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0 ">Dashboard</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget dash-widget5">
                        <span class="float-left"><img src="assets/img/sidebar/team.png" alt="" width="80"></span>
                        <div class="dash-widget-info text-right">
                            <span>Personnels</span>
                            <h3 id="person_label"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget dash-widget5">
                        <div class="dash-widget-info text-left d-inline-block">
                            <span>Grade & Sec.</span>
                            <h3 id="g_s_label"></h3>
                        </div>
                        <span class="float-right"><img src="assets/img/dash/dash-2.png" width="80" alt=""></span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget dash-widget5">
                        <span class="float-left"><img src="assets/img/sidebar/subject.png" alt="" width="80"></span>
                        <div class="dash-widget-info text-right">
                            <span>Subjects</span>
                            <h3 id="sub_label"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget dash-widget5">
                        <div class="dash-widget-info d-inline-block text-left">
                            <span>Rooms</span>
                            <h3 id="room_label"></h3>
                        </div>
                        <span class="float-right"><img src="assets/img/sidebar/room.png" alt="" width="80"></span>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="page-title">
                                        Employee Attendance Chart
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>


                <!-- <div class="col-lg-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="page-title">
                                        Employee Attendance Chart
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div> -->








            </div>

            <div class="row">

                <!-- <div class="col-lg-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="page-title">
                                        Employee Attendance Chart
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart3"></div>
                        </div>
                    </div>
                </div> -->


                <div class="col-lg-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <!-- <div class="row align-items-center">
                                <div class="col-auto">


                                </div>

                            </div> -->

                            <div class="row">
                                <div class="col-8 page-title">
                                    Employee Attendance Chart Record
                                </div>
                                <div class="col-4 text-center">
                                    <select class="form-control" name="" id="log_year_month">
                                        <option value="">Select Date</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-striped table-success" id="excel_table">

                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Time In</th>
                                        <th>Remarks In</th>
                                        <th>Time Out</th>
                                        <th>Remarks Out </th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody id="attendance_report">
                                </tbody>



                            </table>

                            <tfoot>
                                <div class="col ">
                                    <button style="float:right;" class="btn btn-primary btn-sm" id="download_excel"><i
                                            class="fas fa-file-csv"></i>
                                        Download Data</button>


                                </div>
                            </tfoot>


                        </div>
                    </div>
                </div>






            </div>





        </div>

    </div>

    <?php include('layouts/footer.php') ?>
    <!-- <script src="js/attendance.js"></script> -->

    <script>
        $(document).ready(function () {
            $.get({
                url: "../controllers/user/userCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_user = user.total_users
                        $("#person_label").append(total_user - 1)



                    });
                },
            });
            $.get({
                url: "../controllers/yearlevels/yearlevelsCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_g_s = user.total_g_s
                        $("#g_s_label").append(total_g_s)



                    });
                },
            });

            $.get({
                url: "../controllers/subjects/subjectsCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_sub = user.total_sub
                        $("#sub_label").append(total_sub)



                    });
                },
            });

            $.get({
                url: "../controllers/rooms/roomsCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_room = user.total_room
                        $("#room_label").append(total_room)



                    });
                },
            });



            const currentDate = new Date().toISOString().slice(0, 10);
            const [year, month] = currentDate.split("-");


            let sampleArray = [];
            getAllData();
            function getAllData() {
                var attendance_date = year + "-" + month;
                // alert(attendance_date);

                $.get({
                    url: "../controllers/attendance_log/attendance_logCrud.php",
                    data: {
                        getDataEmployee2: "getDataEmployee2",
                        attendance_date: attendance_date,
                    },
                    contentType: "application/json",
                    success: function (data) {
                        populateAttendance(data);
                    },
                });
            }

            function populateAttendance(data) {

                $("#attendance_report").empty();
                let table = $("#attendance_report");
                let newData = JSON.parse(data);
                newData.forEach((user, i) => {

                    if (user != 0) {
                        let tableRow = $("<tr>", { id: newData.id });
                        $("<td>", {
                            class: "text-wrap",
                            html: user.fname + " " + user.mname + " " + user.lname
                        }).appendTo(tableRow);
                        $("<td>", {
                            class: "text-wrap",
                            html: user.time_in,
                        }).appendTo(tableRow);
                        $("<td>", {
                            class: "text-wrap",
                            html: user.remarks_in,
                        }).appendTo(tableRow);
                        $("<td>", {
                            class: "text-wrap",
                            html: user.time_out,
                        }).appendTo(tableRow);
                        $("<td>", {
                            class: "text-wrap",
                            html: user.remarks_out,
                        }).appendTo(tableRow);
                        if (user.status === "Incomplete") {
                            $color = "text-warning";
                        } else if (user.status === "Present") {
                            $color = "text-success";
                        } else if (user.status === "Absent") {
                            $color = "text-danger";
                        }

                        $("<td>", {
                            class: "text-wrap " + $color,
                            html: user.status,
                        }).appendTo(tableRow);
                        const dateStr = user.attendance_date;

                        const [datePart, timePart] = dateStr.split(" ");

                        const [year, month, day] = datePart.split("-");

                        const months = [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December",
                        ];

                        const monthWord = months[parseInt(month) - 1];

                        const formattedDate = `${monthWord} ${day}, ${year}`;
                        $("<td>", {
                            class: "text-wrap",
                            html: formattedDate,
                        }).appendTo(tableRow);

                        table.append(tableRow);
                    }
                });
                $("#excel_table").DataTable();

            }


            $.get({
                url: "../controllers/attendance_log/attendance_logCrud.php",
                data: {
                    getDistinctLog: "getDistinctLog",
                },
                success: function (data) {
                    var options = "";
                    var data = JSON.parse(data);
                    if (data.length != 0) {
                        options = '<option value="">Select Date</option>';
                        data.forEach(function (date) {
                            const month = date.month;

                            const months = [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December",
                            ];
                            const year = date.year; // Remove the unnecessary assignment here
                            const monthWord = months[parseInt(month) - 1];

                            const formattedDate = `${monthWord}, ${year}`;
                            options +=
                                '<option value="' +
                                date.year +
                                "-" +
                                date.month +
                                '">' +
                                formattedDate +
                                "";
                            ("</option>");
                        });
                    } else {
                        options = '<option value="">No dates available</option>';
                    }

                    $("#log_year_month").html(options);
                },
            });

            $("#log_year_month").change(function () {
                var log_year_month = $(this).val();

                $.get({
                    url: "../controllers/attendance_log/attendance_logCrud.php",
                    data: {
                        getDataEmployee2: "getDataEmployee2",
                        attendance_date: log_year_month,
                    },
                    contentType: "application/json",
                    success: function (data) {
                        populateAttendance(data);
                    },
                });
            });

            // $("#download_excel").click(function () {
            //     var sheetName = prompt("Enter the sheet name:");

            //     if (sheetName !== null && sheetName.trim() !== "") {
            //         var table2excel = new Table2Excel();
            //         table2excel.export(document.querySelectorAll("#excel_table"), sheetName);
            //     }

            //     $("#modalMain2").modal("hide");
            // });



        });

    </script>