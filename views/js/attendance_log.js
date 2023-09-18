$(document).ready(function () {
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
      data: { getData: "getData", attendance_date: currentDate },
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
        html: attendance_logs.time_out,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: attendance_logs.remarks_in,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: attendance_logs.remarks_out,
      }).appendTo(tableRow);

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
      $("<td>", {
        class: "text-wrap",
        html: attendance_logs.attendance_date,
      }).appendTo(tableRow);
      const [year, month] = attendance_logs.attendance_date.split("-");

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
      $("<button>", {
        class: "btn btn-warning mx-1 far fa-edit ",
        "data-id": i,
        id: "edit",
        html: "",
      }).appendTo(tableData);
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
      text: "You will not be able to recover this data!",
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
        $("<td>", {
          class: "text-wrap",
          html: user.attendance_date,
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
            options +=
              '<option value="' +
              date.year +
              "-" +
              date.month +
              '">' +
              date.year +
              "-" +
              date.month +
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
  $("#attendance_months").change(function () {
    var selectedMonth = $(this).val();
    var attendance_date = selectedYear + "-" + selectedMonth;
    switch (selectedMonth) {
      case "01":
        getDates(attendance_date);
        break;
      case "02":
        getDates(attendance_date);
        break;
      case "03":
        getDates(attendance_date);
        break;
      case "04":
        getDates(attendance_date);
        break;
      case "05":
        getDates(attendance_date);
        break;
      case "06":
        getDates(attendance_date);
        break;
      case "07":
        getDates(attendance_date);
        break;
      case "08":
        getDates(attendance_date);
        break;
      case "09":
        getDates(attendance_date);
        break;
      case "10":
        getDates(attendance_date);
        break;
      case "11":
        getDates(attendance_date);
        break;
      case "12":
        getDates(attendance_date);
        break;
      default:
        break;
    }
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
            options +=
              '<option value="' +
              date.attendance_date +
              '">' +
              date.attendance_date +
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
});
