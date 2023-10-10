$(document).ready(function () {
  var currentDate2 = new Date();
  var currentHour = currentDate2.getHours();
  var currentMinute = currentDate2.getMinutes();
  const year = currentDate2.getFullYear();
  const month = String(currentDate2.getMonth() + 1).padStart(2, "0");
  const day = String(currentDate2.getDate()).padStart(2, "0");

  const formattedDate = `${year}-${month}-${day}`;

  $("#done").click(function () {
    Swal.fire({
      title: "Are you sure?",
      text: "The attendance today will be finished!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, end it!",
      cancelButtonText: "Cancel",
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        done();
        window.location.reload();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Cancelled", "Action cancelled:)", "error");
      }
    });
  });

  function done() {
    $.get({
      url: "../controllers/attendance/attendanceCrud.php",
      data: {
        getIncompleteData: "getIncompleteData",
        attendance_date: formattedDate,
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.length != 0) {
          data.forEach(function (user) {
            $.post({
              url: "../controllers/attendance/attendanceCrud.php",
              data: {
                insertAbsent: "insertAbsent",
                user_id: user.id,
                attendance_date: formattedDate,
                stats: "Absent",
              },
              success: function (response) {},
            });
          });
        }
      },
    });
  }

  if (currentHour >= 18) {
    done();
  }
  $("#preview").hide();
  $("#done").hide();

  let scanner = new Instascan.Scanner({
    video: document.getElementById("preview"),
  });
  $("#scan_qr_code").on("click", function () {
    $("#preview").show();
    $("#myImage").hide();
    $("#done").show();

    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        alert("No cameras found");
      }
    });
    $("#hide_qr_code").show();

    $("#scan_qr_code").hide();
  });
  $("#hide_qr_code").hide();

  $("#hide_qr_code").on("click", function () {
    $("#myImage").show();
    $("#done").hide();

    $("#preview").hide();
    // scanner.video.hide();
    $("#scan_qr_code").show();
    $("#hide_qr_code").hide();
  });

  scanner.addListener("scan", function (c) {
    var qr = c;
    console.log(qr);
    if (qr != " ") {
      let sampleArray = [];
      $.get({
        url: "../controllers/attendance/attendanceCrud.php",
        data: { getData: "getData", qr_code: qr },
        success: function (data) {
          var datas = JSON.parse(data);
          if (datas.length == 0) {
            swal.fire({
              icon: "warning",
              title: "Not Employee",
              showConfirmButton: false,
              timer: 1000,
            });
          } else {
            datas.forEach((user) => {
              $full_name = user.fname + " " + user.mname + " " + user.lname;
              $user_id = user.id;
            });
            const currentDate = new Date().toISOString().slice(0, 10);
            $.get({
              url: "../controllers/attendance/attendanceCrud.php",
              data: {
                getDataLogs: "getDataLogs",
                user_id: $user_id,
                attendance_date: formattedDate,
              },
              success: function (data) {
                var data = JSON.parse(data);
                if (data.length == 0) {
                  const timeIn = new Date().toLocaleTimeString();
                  const currentDayIndex = (new Date().getDay() + 6) % 7;

                  $.get({
                    url: "../controllers/attendance/attendanceCrud.php",
                    data: {
                      getDataDayTime: "getDataDayTime",
                      user_id: $user_id,
                      sample_day: currentDayIndex,
                    },
                    contentType: "application/json",
                    success: function (data) {
                      var newData = JSON.parse(data);

                      newData.forEach((data_time_day) => {
                        $lowest_time_start = data_time_day.lowest_time_start;

                        if ($lowest_time_start !== null) {
                          const currentTime = new Date().toLocaleTimeString(
                            "en-US",
                            { hour12: false }
                          );
                          // Function to convert time string to minutes
                          function timeToMinutes(time) {
                            const [hours, minutes] = time
                              .split(":")
                              .map(Number);
                            return hours * 60 + minutes;
                          }

                          // Calculate time difference in minutes
                          const currentTimeMinutes = timeToMinutes(currentTime);

                          const lowestTimeStartMinutes =
                            timeToMinutes($lowest_time_start);

                          const timeDifferenceInMinutes =
                            currentTimeMinutes - lowestTimeStartMinutes;

                          if (timeDifferenceInMinutes < 0) {
                            $remarksIn = "Early Comer";
                          } else if (timeDifferenceInMinutes <= 1) {
                            $remarksIn = "On time";
                          } else {
                            $remarksIn = "Late";
                          }
                        } else {
                          $remarksIn = "Time-in";
                        }
                      });

                      setTimeout(() => {
                        swal
                          .fire({
                            icon: "success",
                            title: "Attendance In",
                            text: "Name " + $full_name,
                            showConfirmButton: false,
                            timer: 3000,
                          })
                          .then(
                            $.post({
                              url: "../controllers/attendance/attendanceCrud.php",
                              data: {
                                addNew: "addNew",
                                user_id: $user_id,
                                time_in: timeIn,
                                remarks_in: $remarksIn,
                                attendance_date: formattedDate,
                              },
                              success: function (data) {
                                $("#bamsmsTable").empty();
                                getAllData();

                                $("#qr_code").val("");
                              },
                            })
                          );
                      }, 100);
                    },
                  });
                } else {
                  data.forEach((logs) => {
                    $time_out = logs.time_out;
                    $time_outa = logs.time_out2;

                    $time_in = logs.time_in;
                    $time_ina = logs.time_in2;
                  });
                  const timeOut = new Date().toLocaleTimeString();

                  if (currentHour >= 11 && currentHour <= 14) {
                    if ($time_outa == "") {
                      setTimeout(() => {
                        swal
                          .fire({
                            icon: "success",
                            title: "Afternoon Out",
                            text: "Name " + $full_name,
                            showConfirmButton: false,
                            timer: 3000,
                          })
                          .then(
                            $.post({
                              url: "../controllers/attendance/attendanceCrud.php",
                              data: {
                                update2: "update2",
                                user_id: $user_id,
                                time_out: timeOut,
                                attendance_date: formattedDate,
                              },
                              success: function (data) {
                                $("#bamsmsTable").empty();

                                getAllData();

                                $("#qr_code").val("");
                              },
                            })
                          );
                      }, 100);
                    } else {
                      if ($time_ina == "") {
                        setTimeout(() => {
                          swal
                            .fire({
                              icon: "success",
                              title: "Afternoon In",
                              text: "Name " + $full_name,
                              showConfirmButton: false,
                              timer: 3000,
                            })
                            .then(
                              $.post({
                                url: "../controllers/attendance/attendanceCrud.php",
                                data: {
                                  update3: "update3",
                                  user_id: $user_id,
                                  time_in: timeOut,
                                  attendance_date: formattedDate,
                                },
                                success: function (data) {
                                  $("#bamsmsTable").empty();

                                  getAllData();

                                  $("#qr_code").val("");
                                },
                              })
                            );
                        }, 100);
                      }
                    }
                  }

                  if (currentHour > 14 || $time_ina != "") {
                    if ($time_out == "") {
                      const currentTime = new Date();
                      const [
                        timeInHours,
                        timeInMinutes,
                        timeInSeconds,
                        timeInPeriod,
                      ] = $time_in.split(/:| /);

                      let hoursOffset = 0;
                      if (
                        timeInPeriod === "PM" &&
                        parseInt(timeInHours) !== 12
                      ) {
                        hoursOffset = 12;
                      } else if (
                        timeInPeriod === "AM" &&
                        parseInt(timeInHours) === 12
                      ) {
                        hoursOffset = -12;
                      }
                      const currentDayIndex = (new Date().getDay() + 6) % 7;

                      const timeInDate = new Date();
                      timeInDate.setHours(parseInt(timeInHours) + hoursOffset);
                      timeInDate.setMinutes(parseInt(timeInMinutes));
                      timeInDate.setSeconds(parseInt(timeInSeconds));

                      const timeDifferenceMillis = currentTime - timeInDate;
                      const timeDifferenceMinutes =
                        timeDifferenceMillis / 1000 / 60;

                      if (timeDifferenceMinutes > 0.5) {
                        const status = "Present";

                        $.get({
                          url: "../controllers/attendance/attendanceCrud.php",
                          data: {
                            getDataDayTime: "getDataDayTime",
                            user_id: $user_id,
                            sample_day: currentDayIndex,
                          },
                          contentType: "application/json",
                          success: function (data) {
                            var newData = JSON.parse(data);

                            newData.forEach((data_time_day) => {
                              $highest_time_end =
                                data_time_day.highest_time_end;

                              if ($highest_time_end !== null) {
                                const currentTime =
                                  new Date().toLocaleTimeString("en-US", {
                                    hour12: false,
                                  });
                                function timeToMinutes(time) {
                                  const [hours, minutes] = time
                                    .split(":")
                                    .map(Number);
                                  return hours * 60 + minutes;
                                }

                                const currentTimeMinutes =
                                  timeToMinutes(currentTime);

                                const highestEndMinutes =
                                  timeToMinutes($highest_time_end);

                                const timeDifferenceInMinutes =
                                  currentTimeMinutes - highestEndMinutes;

                                if (timeDifferenceInMinutes < -1) {
                                  $remarksOut = "Early Time out ";
                                } else if (timeDifferenceInMinutes < 0) {
                                  $remarksOut = "On time time out";
                                } else {
                                  $remarksOut = "Right Time out";
                                }
                              } else {
                                $remarksOut = "Time-out";
                              }
                            });

                            setTimeout(() => {
                              swal
                                .fire({
                                  icon: "success",
                                  title: "Attendance Out",
                                  text: "Name " + $full_name,
                                  showConfirmButton: false,
                                  timer: 3000,
                                })
                                .then(
                                  $.post({
                                    url: "../controllers/attendance/attendanceCrud.php",
                                    data: {
                                      update: "update",
                                      user_id: $user_id,
                                      time_out: timeOut,
                                      remarks_out: $remarksOut,
                                      stats: status,
                                      attendance_date: formattedDate,
                                    },
                                    success: function (data) {
                                      $("#bamsmsTable").empty();

                                      getAllData();

                                      $("#qr_code").val("");
                                    },
                                  })
                                );
                            }, 100);
                          },
                        });
                      } else {
                        swal.fire({
                          icon: "warning",
                          title: "Too Early to timeout",
                          text: "You Need to stay in the school atleast 30 minutes before you time out ",
                          timer: 3000,
                        });
                      }
                    } else {
                      setTimeout(() => {
                        swal
                          .fire({
                            icon: "warning",
                            title:
                              "You have already timed-in and timed-out today",
                            showConfirmButton: false,
                            timer: 3000,
                          })
                          .then($("#qr_code").val(""));
                      }, 100);
                    }
                  }
                }
              },
            });
          }
        },
      });
    }
  });
});
