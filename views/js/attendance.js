$(document).ready(function () {
  var currentDate2 = new Date();
  var currentHour = currentDate2.getHours();
  var currentMinute = currentDate2.getMinutes();
  const year = currentDate2.getFullYear();
  const month = String(currentDate2.getMonth() + 1).padStart(2, "0");
  const day = String(currentDate2.getDate()).padStart(2, "0");

  const formattedDate = `${year}-${month}-${day}`;
  // const currentDate23 = new Date().toISOString().slice(0, 10);
  // alert(currentDate23);

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
  $("#hide_qr_code").hide();
  let scanner = new Instascan.Scanner({
    video: document.getElementById("preview"),
  });

  $("#scan_qr_code").on("click", function () {
    Instascan.Camera.getCameras()
      .then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          alert("No cameras found");
        }
      })
      .catch(function (e) {
        console.error(e);
      });

    // $("#hide_qr_code").show();
    $("#scan_qr_code").hide();
  });
  // $("#hide_qr_code").on("click", function () {
  //   scanner.stop();
  //   scanner.video.remove();
  //   $("#scan_qr_code").show();
  //   $("#hide_qr_code").hide();
  // });
  const days = [0, 1, 2, 3, 4, 5];

  scanner.addListener("scan", function (c) {
    $qr_code = c;
    console.log($qr_code);
    if ($qr_code != " ") {
      let sampleArray = [];
      $.get({
        url: "../controllers/attendance/attendanceCrud.php",
        data: { getData: "getData", qr_code: $qr_code },
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

                  if (currentHour >= 11 && currentHour < 14) {
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

  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    showDeleteConfirmation(id);
  });
  $("body").on("click", "#view", (e) => {
    const id = $(e.currentTarget).data("id");
    const year = $(e.currentTarget).data("year");
    const month = $(e.currentTarget).data("month");

    view(id, year, month);
  });

  $("#filesearch").keyup(function () {
    var value = $("#filesearch").val().toLowerCase();
    $("#bamsmsTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  const currentDate = new Date().toISOString().slice(0, 10);
  let sampleArray = [];
  getAllData();
  function getAllData() {
    sampleArray = [];
    $.get({
      url: "../controllers/attendance_log/attendance_logCrud.php",
      data: { getData: "getData", attendance_date: formattedDate },
      success: function (data) {
        pushDatas(data);
      },
    });
  }

  function pushDatas(data) {
    let newData = JSON.parse(data);
    let table = $("#bamsmsTable");
    newData.forEach((attendance_logs, i) => {
      sampleArray.push(attendance_logs);
      let tableRow = $("<tr>", { id: newData.id });
      $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html:
          attendance_logs.fname +
          " " +
          " " +
          attendance_logs.mname +
          " " +
          attendance_logs.lname,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: attendance_logs.time_in,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: attendance_logs.time_out2,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: attendance_logs.time_in2,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: attendance_logs.time_out,
      }).appendTo(tableRow);
      // $("<td>", {
      //   class: "text-wrap",
      //   html: attendance_logs.remarks_in,
      // }).appendTo(tableRow);
      // $("<td>", {
      //   class: "text-wrap",
      //   html: attendance_logs.remarks_out,
      // }).appendTo(tableRow);

      if (attendance_logs.status === "Incomplete") {
        $color = "text-warning";
      } else if (attendance_logs.status === "Present") {
        $color = "text-success";
      } else if (attendance_logs.status === "Absent") {
        $color = "text-danger";
      }

      $("<td>", {
        class: "text-wrap " + $color,
        html: attendance_logs.status,
      }).appendTo(tableRow);
      const dateStr = attendance_logs.attendance_date;

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

      // buttons action
      let tableData = $("<td>", { class: "text-wrap" });
      $("<button>", {
        class: "btn btn-success mx-1 fa fa-eye ",
        "data-id": attendance_logs.user_id,
        "data-year": year,
        "data-month": month,
        id: "view",
        html: "",
      }).appendTo(tableData);
      // $("<button>", {
      //   class: "btn btn-warning mx-1 far fa-edit ",
      //   "data-id": i,
      //   id: "edit",
      //   html: "",
      // }).appendTo(tableData);
      // $("<button>", {
      //   class: "btn btn-danger mx-1 far fa-trash-alt ",
      //   "data-id": attendance_logs.id,
      //   id: "delete",
      //   html: "",
      // }).appendTo(tableData);
      tableData.appendTo(tableRow);
      table.append(tableRow);
    });
  }

  $("#add-new").click(function () {
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Guard");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  $("#btn-mul").click(function () {
    let modalMainForm = $("#modalMainForm").serializeArray();
    $.post({
      url: "../controllers/attendance_log/attendance_logCrud.php",
      data: modalMainForm,
      success: function (data) {
        if (data) {
          $("#modalMainForm").trigger("reset");
          $("#modalMain").modal("hide");
          $("#bamsmsTable").empty();
          // sampleArray.empty();
          getAllData();
        }
      },
    });
  });

  function update(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Guard");
    $("#method").attr("name", "update");
    let models = sampleArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    });
    $("#btn-mul").show();
    $("#btn-mul").attr("id", "updateData");
    $("#updateData").attr("name", "update");
  }

  $("#updateData").click(function () {
    let modalMainForm = $("#modalMainForm").serializeArray();
    $.post({
      url: "../controllers/attendance_log/attendance_logCrud.php",
      data: modalMainForm,
      success: function (data) {
        if (data) {
          $("#modalMainForm").trigger("reset");
          $("#modalMain").modal("hide");
          $("#bamsmsTable").empty();
          // sampleArray.length = 0;
          getAllData();
        }
      },
    });
  });
  function showDeleteConfirmation(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "Cancel",
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        deletes(id);
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Cancelled", "Delete request cancelled:)", "error");
      }
    });
  }
  function deletes(id) {
    $.post({
      url: "../controllers/attendance_log/attendance_logCrud.php",
      data: { id: id, delete: "delete" },
      success: function (data) {
        if (data) {
          Swal.fire("Deleted!", "Deleted successfuly.", "success").then(() => {
            $("#bamsmsTable").empty();
            // sampleArray.length = 0;
            getAllData();
          });
        }
      },
    });
  }

  function populateAttendance(data) {
    $("#attendance").empty();
    let table = $("#attendance");
    let newData = JSON.parse(data);
    newData.forEach((user, i) => {
      if (i == 0) {
        $("#employee").html(user.fname + " " + user.mname + " " + user.lname);
      }
      if (user != 0) {
        let tableRow = $("<tr>", { id: newData.id });
        $("<td>", {
          class: "text-wrap",
          html: user.time_in,
        }).appendTo(tableRow);
        $("<td>", {
          class: "text-wrap",
          html: user.time_out2,
        }).appendTo(tableRow);
        $("<td>", {
          class: "text-wrap",
          html: user.time_in2,
        }).appendTo(tableRow);

        $("<td>", {
          class: "text-wrap",
          html: user.time_out,
        }).appendTo(tableRow);
        // $("<td>", {
        //   class: "text-wrap",
        //   html: user.remarks_in,
        // }).appendTo(tableRow);
        // $("<td>", {
        //   class: "text-wrap",
        //   html: user.remarks_out,
        // }).appendTo(tableRow);
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
  }

  function view(index, year, month) {
    var attendance_date = year + "-" + month;

    $.get({
      url: "../controllers/attendance_log/attendance_logCrud.php",
      data: {
        getDataEmployee: "getDataEmployee",
        user_id: index,
        attendance_date: attendance_date,
      },
      contentType: "application/json",
      success: function (data) {
        populateAttendance(data);
      },
    });

    $("#modalMain2").modal("show");
    $("#modalMainLabel2").html("View Sched");
    $("#btn-mul").hide();

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
          getDataEmployee: "getDataEmployee",
          user_id: index,
          attendance_date: log_year_month,
        },
        contentType: "application/json",
        success: function (data) {
          populateAttendance(data);
        },
      });
    });
  }

  $("#download_excel").click(function () {
    var sheetName = prompt("Enter the sheet name:");

    if (sheetName !== null && sheetName.trim() !== "") {
      var table2excel = new Table2Excel();
      table2excel.export(document.querySelectorAll("#excel_table"), sheetName);
    }

    $("#modalMain2").modal("hide");
  });

  $.get({
    url: "../controllers/attendance_log/attendance_logCrud.php",
    data: {
      getDates: "getDates",
    },
    success: function (data) {
      var options = "";
      var data = JSON.parse(data);
      if (data.length != 0) {
        options = '<option value="">Select Year</option>';
        data.forEach(function (date) {
          options +=
            '<option value="' +
            date.attendance_year +
            '">' +
            date.attendance_year +
            "</option>";
        });
      } else {
        options = '<option value="">No dates available</option>';
      }

      $("#attendance_dates").html(options);
    },
  });

  var selectedYear = "";
  $("#attendance_dates").change(function () {
    $("#bamsmsTable").empty();

    $("#attendance_day").empty();
    selectedYear = $(this).val();

    if (selectedYear) {
      var monthOptions = '<option value="">Select Month</option>';
      var monthNames = [
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
      for (var i = 0; i < monthNames.length; i++) {
        var month = ("0" + (i + 1)).slice(-2);
        monthOptions +=
          '<option value="' + month + '">' + monthNames[i] + "</option>";
      }
      $("#attendance_months").html(monthOptions);
    } else {
      $("#attendance_months").html(
        '<option value="">No year selected</option>'
      );
    }
  });

  // var selectedMonth

  $("#attendance_months").change(function () {
    var selectedMonth = $(this).val();
    var attendance_date = selectedYear + "-" + selectedMonth;
    getDates(attendance_date);
  });

  $.get({
    url: "../controllers/attendance_log/attendance_logCrud.php",
    data: {
      getDates: "getDates",
    },
    success: function (data) {
      var options = "";
      var data = JSON.parse(data);
      if (data.length != 0) {
        options = '<option value="">Select Year</option>';
        data.forEach(function (date) {
          options +=
            '<option value="' +
            date.attendance_year +
            '">' +
            date.attendance_year +
            "</option>";
        });
      } else {
        options = '<option value="">No dates available</option>';
      }

      $("#log_dates").html(options);
    },
  });
  var logYear = "";
  $("#log_dates").change(function () {
    logYear = $(this).val();

    if (logYear) {
      var monthOptions = '<option value="">Select Month</option>';
      var monthNames = [
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
      for (var i = 0; i < monthNames.length; i++) {
        var month = ("0" + (i + 1)).slice(-2);
        monthOptions +=
          '<option value="' + month + '">' + monthNames[i] + "</option>";
      }
      $("#log_months").html(monthOptions);
    } else {
      $("#log_months").html('<option value="">No year selected</option>');
    }
  });
  $("#log_months").change(function () {
    logMonth = $(this).val();
  });
  function getDates(attendance_date) {
    $.get({
      url: "../controllers/attendance_log/attendance_logCrud.php",
      data: {
        getDays: "getDays",
        attendance_date: attendance_date,
      },
      success: function (data) {
        var options = "";
        var data = JSON.parse(data);
        if (data.length != 0) {
          options = '<option value="">Select Date</option>';
          data.forEach(function (date) {
            var year = date.attendance_date;
            var dateObject = new Date(year);

            var day = dateObject.getDate();
            var formattedDay = day < 10 ? "0" + day : day;

            options +=
              '<option value="' +
              date.attendance_date +
              '">' +
              formattedDay +
              "</option>";
          });
        } else {
          options = '<option value="">No dates available</option>';
        }

        $("#attendance_day").html(options);
      },
    });
  }
  $("#attendance_day").change(function () {
    var selectedDate = $(this).val();

    $.get({
      url: "../controllers/attendance_log/attendance_logCrud.php",
      data: {
        getDateClick: "getDateClick",
        attendance_date: selectedDate,
      },
      success: function (data) {
        $("#bamsmsTable").empty();
        pushDatas(data);
      },
    });
  });

  $.get({
    url: "../controllers/customize/customizeCrud.php",
    data: { getData: "getData" },
    success: function (data) {
      let newData = JSON.parse(data);
      newData.forEach((custom, i) => {
        $("#school_logo").attr("src", `../views/assets/img/${custom.logo}`);
        $("#school_logo2").attr("src", `../views/assets/img/${custom.logo}`);

        $("#school_name").html(custom.school_name);
        $("#school_address").html(custom.school_address);
        $("#school_id").html(custom.school_id);
      });
    },
  });
});
