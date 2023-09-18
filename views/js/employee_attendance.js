$(document).ready(function () {
  var user_id = $("#user_id").val();
  const currentDate = new Date().toISOString().slice(0, 7); // "YYYY-MM"

  // var user_id = 25;
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

  $.get({
    url: "../controllers/attendance_log/attendance_logCrud.php",
    data: {
      getDataEmployee: "getDataEmployee",
      user_id: user_id,
      attendance_date: currentDate,
    },
    contentType: "application/json",
    success: function (data) {
      populateAttendance(data);
    },
  });

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
        user_id: user_id,
        attendance_date: log_year_month,
      },
      contentType: "application/json",
      success: function (data) {
        populateAttendance(data);
      },
    });
  });
});
