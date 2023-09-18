$(document).ready(function () {
  $("body").on("click", "#monday", async (e) =>
    mondaySchedBtn($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#tuesday", async (e) =>
    tuesdaySchedBtn($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#wednesday", async (e) =>
    wednesdaySchedBtn($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#thursday", async (e) =>
    thursdaySchedBtn($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#friday", async (e) =>
    fridaySchedBtn($(e.currentTarget).data("id"))
  );

  $("body").on("click", "#view", (e) => view($(e.currentTarget).data("id")));

  $("#filesearch").keyup(function () {
    var value = $("#filesearch").val().toLowerCase();
    $("#bamsmsTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  let sampleArray = [];
  getDataTwo();
  function getDataTwo() {
    $.get({
      url: "../controllers/time/timeCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((schedules, i) => {
          let sched_time_am = $("#sched_time_am");
          let sched_time_pm = $("#sched_time_pm");
          if (i <= 4 && schedules.time_start !== "09:30:00") {
            if (i == 0) {
              sched_time_am.append(
                '<div class="input-group mb-3">' +
                  '<div class="input-group-prepend">' +
                  "</div>" +
                  '<input type="text" class="form-control" value="Morning Time Schedule">' +
                  '<div class="input-group-text">' +
                  "M" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "T" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "W" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "TH" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "F" +
                  "</div>" +
                  "</div>"
              );
            }
            sched_time_am.append(
              '<div class="input-group mb-3">' +
                '<div class="input-group-prepend">' +
                "</div>" +
                '<input type="text" class="form-control" value=' +
                schedules.time_start +
                "--" +
                schedules.time_end +
                ">" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input" id="monday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="tuesday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="wednesday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="thursday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="friday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                "</div>"
            );
          } else if (
            i > 4 &&
            i <= 10 &&
            schedules.time_start !== "11:10:00" &&
            schedules.time_start !== "02:10:00"
          ) {
            if (i == 6) {
              sched_time_pm.append(
                '<div class="input-group mb-3">' +
                  '<div class="input-group-prepend">' +
                  "</div>" +
                  '<input type="text" class="form-control" value="Afternoon Time Schedule">' +
                  '<div class="input-group-text">' +
                  "M" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "T" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "W" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "TH" +
                  "</div>" +
                  '<div class="input-group-text">' +
                  "F" +
                  "</div>" +
                  "</div>"
              );
            }
            sched_time_pm.append(
              '<div class="input-group mb-3">' +
                '<div class="input-group-prepend">' +
                "</div>" +
                '<input type="text" class="form-control" value=' +
                schedules.time_start +
                "--" +
                schedules.time_end +
                ">" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input" id="monday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="tuesday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="wednesday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="thursday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                '<div class="input-group-text">' +
                '<input type="checkbox" aria-label="Checkbox for following text input"  id="friday" data-id=' +
                schedules.id +
                ">" +
                "</div>" +
                "</div>"
            );
          }
        });
      },
    });
  }

  function mondaySchedBtn(id) {
    alert(id);
  }
  function tuesdaySchedBtn(id) {
    alert(id);
  }
  function wednesdaySchedBtn(id) {
    alert(id);
  }
  function thursdaySchedBtn(id) {
    alert(id);
  }
  function fridaySchedBtn(id) {
    alert(id);
  }

  $("#btn-mul").click(function () {
    let formData = $("#modalMainForm").serializeArray();

    $.post({
      url: "../controllers/schedules/schedulesCrud.php",
      data: formData,
      success: function (data) {
        if (data) {
          window.reload();
        }
      },
    });
  });
});
