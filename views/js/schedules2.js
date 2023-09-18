$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#view", (e) => {
    const id = $(e.currentTarget).data("id");
    const sem = $(e.currentTarget).data("sem");
    const schoolYear = $(e.currentTarget).data("school-year");

    view(id, sem, schoolYear);
  });
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    showDeleteConfirmation(id);
  });

  $("#filesearch").keyup(function () {
    var value = $("#filesearch").val().toLowerCase();
    $("#bamsmsTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  let sampleArray = [];

  let sampleArray1 = [];
  let sampleArray2 = [];
  let sampleArray3 = [];
  let sampleArray4 = [];
  $("#type").change(function () {
    $teaching = $(this).val();
    if (parseInt($("#type").val) !== 0) {
      $("#teacher_id").removeAttr("disabled");
      $("#teacher_id").empty();
      let opts1 = $("#teacher_id");
      opts1.append("<option value='0'>Choose Employee</option>");
      $.get({
        url: "../controllers/teachers/teachersCrud.php",
        data: { getData: "getData", teaching: $teaching },
        contentType: "application/json",
        success: function (data) {
          let newdatadp = JSON.parse(data);
          newdatadp.forEach((teacher) => {
            opts1.append(
              "<option value=" +
                teacher.id +
                ">" +
                teacher.fname +
                " " +
                teacher.mname +
                " " +
                teacher.lname +
                "</option>"
            );
          });
        },
      });

      if ($teaching == "no") {
        $("#yearlevels_id").hide();
        $("#subject_id").hide();
        $("#department_id").empty();
        $("#yearlevels_id").empty();
        $("#subject_id").empty();
        $("#department_label").hide();
        $("#yearlevels_label").hide();
        $("#subject_label").hide();
        $("#school_year").removeAttr("disabled");
        $("#sample_day").removeAttr("disabled");
      } else {
        $("#yearlevels_id").show();
        $("#subject_id").show();
        $("#department_label").show();
        $("#yearlevels_label").show();
        $("#subject_label").show();
      }
    }
  });
  $("#teacher_id").change(function () {
    if (parseInt($("#teacher_id").val) !== 0) {
      $("#yearlevels_id").empty();

      $("#sample_day").val(null);
      $("#school_year").removeAttr("disabled");
      $("#school_year").empty();
      populateSchoolYear();
    }
  });

  function populateGradeAndSection() {}

  $("#school_year").change(function () {
    $("#sample_day").val(null);
    if (parseInt($("#department_id").val) !== 0) {
      sampleArray2 = [];
      $("#yearlevels_id").removeAttr("disabled");
      $("#yearlevels_id").empty();
      let opts2 = $("#yearlevels_id");
      opts2.append("<option value='0'>Choose YearLevel and Section</option>");

      $.get({
        url: "../controllers/yearlevels/yearlevelsCrud.php",
        data: {
          getData: "getData",
        },
        contentType: "application/json",
        success: function (data) {
          let newdatadp = JSON.parse(data);
          newdatadp.forEach((yearlevel) => {
            sampleArray2.push(yearlevel);
            opts2.append(
              "<option value=" +
                yearlevel.id +
                ">" +
                yearlevel.yearlevel_name +
                " " +
                yearlevel.section_name +
                "</option>"
            );
          });
        },
      });
    }
  });

  $("#yearlevels_id").change(function () {
    if (parseInt($("#yearlevels_id").val) !== 0) {
      $("#sample_day").val(null);
      $("input[name='sample_day[]']").removeAttr("disabled");
      $("#sample_day").removeAttr("disabled");
    }
  });

  $("#subject_id").change(function () {
    setTimeout(() => {
      hello();
    }, 2000);
  });

  let availTimeams = [];
  let availSched = [];
  let availsc = [];

  // $("#sample_day").change(function () {
  //   $("#subject_id").removeAttr("disabled");
  //   $("#sample_time_id").removeAttr("disabled");
  //   if (parseInt($("#sample_day").val) !== 0) {
  $("input[name='sample_day[]']").on("change", function () {
    // Check if at least one checkbox is checked
    if ($("input[name='sample_day[]']:checked").length > 0) {
      $("#subject_id").removeAttr("disabled");
      $department_id = parseInt($("#department_id").val());
      $("#subject_id").empty();
      let sample_day = parseInt($("#sample_day").val());
      let sem = parseInt($("#sem").val());

      let school_year = parseInt($("#school_year").val());

      let opts3 = $("#subject_id");
      opts3.append("<option value='0'>Choose Subject</option>");
      $.get({
        url: "../controllers/subjects/subjectsCrud.php",
        data: { getDataSched: "getDataSched", department_id: $department_id },
        contentType: "application/json",
        success: function (data) {
          let newdatadp = JSON.parse(data);
          let selectedDays = $("input[name='sample_day[]']:checked")
            .map(function () {
              return parseInt($(this).val());
            })
            .get();

          for (let index = 0; index < sampleArray.length; index++) {
            for (let index1 = 0; index1 < newdatadp.length; index1++) {
              if (
                newdatadp[index1].id === sampleArray[index].subject_id &&
                parseInt($("#yearlevels_id").val()) ===
                  parseInt(sampleArray[index].yearlevels_id) &&
                selectedDays.includes(
                  parseInt(sampleArray[index].sample_day)
                ) &&
                sem === parseInt(sampleArray[index].sem) &&
                school_year === parseInt(sampleArray[index].school_year_val)
              ) {
                newdatadp.splice(index1, 1);
                index1--; // Decrement the index to account for the removed element
              }
            }
          }

          newdatadp.forEach((subject) => {
            opts3.append(
              "<option value=" +
                subject.id +
                ">" +
                subject.subject_name +
                "</option>"
            );
          });
        },
      });
    }
  });

  function hello() {
    let sample_day = $("#sample_day").val();
    let yearlevels_id = $("#yearlevels_id").val();
    let rooms_id = $("#rooms_id").val();
    let ops = $("#sample_time_id").empty();

    if (availSched.length != 0) {
      for (let index = 0; index < availSched.length; index++) {
        for (let index1 = 0; index1 < availTimeams.length; index1++) {
          if (
            (availSched[index].sample_time_id == availTimeams[index1].id &&
              availSched[index].yearlevels_id == yearlevels_id &&
              availSched[index].sample_day == sample_day) ||
            (availSched[index].sample_time_id == availTimeams[index1].id &&
              availSched[index].yearlevels_id != yearlevels_id &&
              availSched[index].sample_day == sample_day)
          ) {
            {
              availTimeams.splice(index1, 1);
            }
          }
        }
      }
    } else {
      $.get({
        url: "../controllers/schedules/schedulesCrud.php",
        data: {
          checkYearLevel: "checkYearLevel",
          yearlevels_id: yearlevels_id,
        },
        contentType: "application/json",
        success: function (datas) {
          availsc = JSON.parse(datas);
        },
      });
    }

    for (let index = 0; index < availsc.length; index++) {
      for (let index1 = 0; index1 < availTimeams.length; index1++) {
        if (availsc[index].sample_time_id == availTimeams[index1].id) {
          availTimeams.splice(index1, 1);
          console.log(availTimeams);
        }
      }
    }

    availTimeams.forEach((times) => {
      if (parseInt($("#session_id").val()) === 0) {
        if (times.sched_index >= 0 && times.sched_index <= 5) {
          if (times.sched_index != 2 && times.sched_index != 5) {
            ops.append(
              "<option value=" +
                times.id +
                ">" +
                times.time_start +
                "-" +
                times.time_end +
                "</option>"
            );
          }
        }
      } else if (parseInt($("#session_id").val()) === 1) {
        if (times.sched_index >= 6 && times.sched_index <= 10) {
          if (times.sched_index != 8) {
            ops.append(
              "<option value=" +
                times.id +
                ">" +
                times.time_start +
                "-" +
                times.time_end +
                "</option>"
            );
          }
        }
      }
    });
  }

  // $.get({
  //   url: "../controllers/schedules/schedulesCrud.php",
  //   data: { getMaxSem: "getMaxSem" },
  //   success: function (data) {
  //     let newData = JSON.parse(data);

  //     newData.forEach((sem, i) => {
  //       var latest_sem = sem.latest_sem;
  //     });
  //   },
  // });

  const days = [
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];
  getAllData();

  function populateSchoolYear() {
    $("#school_year").empty();
    let optsschool = $("#school_year");
    optsschool.append("<option value='0'>Choose School Year</option>");
    $.get({
      url: "../controllers/schoolyears/schoolyearsCrud.php",
      data: { getData: "getData" },
      contentType: "application/json",
      success: function (data) {
        let newdatadp = JSON.parse(data);
        newdatadp.forEach((schoolyear) => {
          optsschool.append(
            "<option value=" +
              schoolyear.school_year +
              ">" +
              schoolyear.school_year +
              "</option>"
          );
        });
      },
    });
  }

  var displayId = [];
  function populateTable(data, data2) {
    $("#back_btn").hide();
    $("#back_btn2").hide();

    let newData = JSON.parse(data);
    let table = $("#bamsmsTable");
    newData.forEach((schedules, i) => {
      sampleArray.push(schedules);
      var teacherId = schedules.teacher_id;

      if (!displayId.includes(teacherId)) {
        let tableRow = $("<tr>", { id: newData.id });
        $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
        let schoolYear = schedules.school_year_val;
        let sem = schedules.sem;

        if (teacherId !== null) {
          displayId.push(teacherId);

          let nameData = $("<td>", {
            class: "text-wrap hover-pointer  far fa-arrow-alt-circle-right",
            html: (
              schedules.fname +
              " " +
              schedules.mname +
              " " +
              schedules.lname
            ).toUpperCase(),
          });
          $("<u>", {}).appendTo(nameData);

          nameData.appendTo(tableRow);
          if (data2 == "") {
            nameData.click(function () {
              showFullDetails(teacherId);
            });
          } else if (data2 == "yes") {
            nameData.click(function () {
              showFullDetails2(teacherId, schoolYear, sem);
            });
          }
        } else {
          let nameData = $("<td>", {
            class: "text-wrap text-warning",
            html: "NULL",
          });
          nameData.appendTo(tableRow);
          nameData.click(function () {
            showFullDetails(teacherId);
          });
        }

        $("<td>", {
          class: "text-wrap",
          html: schedules.school_year_val,
        }).appendTo(tableRow);
        var yearLevelId = schedules.yearlevels_id;

        if (yearLevelId !== null) {
          $("<td>", {
            class: "text-wrap",
            html: schedules.yearlevel_name + " " + schedules.section_name,
          }).appendTo(tableRow);
        } else {
          $("<td>", {
            class: "text-wrap text-warning",
            html: "NULL",
          }).appendTo(tableRow);
        }

        var subjectName = schedules.subject_name;
        if (subjectName !== null) {
          // alert("tite");
          $("<td>", {
            class: "text-wrap",
            html: schedules.subject_name.toUpperCase(),
          }).appendTo(tableRow);
        } else {
          $("<td>", {
            class: "text-wrap text-warning",
            html: "NULL",
          }).appendTo(tableRow);
        }

        const timeString12hr1 = new Date(
          "1970-01-01T" + schedules.time_start + "Z"
        ).toLocaleTimeString("en-US", {
          timeZone: "UTC",
          hour12: true,
          hour: "numeric",
          minute: "numeric",
        });

        const timeString12hr2 = new Date(
          "1970-01-01T" + schedules.time_end + "Z"
        ).toLocaleTimeString("en-US", {
          timeZone: "UTC",
          hour12: true,
          hour: "numeric",
          minute: "numeric",
        });

        $("<td>", {
          class: "text-wrap",
          html: timeString12hr1 + " - " + timeString12hr2,
        }).appendTo(tableRow);
        $("<td>", {
          class: "text-wrap",
          html: days[schedules.sample_day],
        }).appendTo(tableRow);

        // buttons action

        let tableData = $("<td>", { class: "text-wrap" });
        $("<button>", {
          class: "btn btn-success mx-1 fa fa-eye ",
          "data-id": schedules.teacher_id,
          "data-sem": sem,
          "data-school-year": schoolYear,
          id: "view",
          html: "",
        }).appendTo(tableData);
        // $("<button>", {
        //   class: "btn btn-warning mx-1 far fa-edit ",
        //   "data-id": i,
        //   id: "edit",
        //   html: "",
        // }).appendTo(tableData);
        $("<button>", {
          class: "btn btn-danger mx-1 far fa-trash-alt ",
          "data-id": schedules.class_schedules_id,
          id: "delete",
          html: "",
        }).appendTo(tableData);
        tableData.appendTo(tableRow);
        table.append(tableRow);
      }
    });
  }
  $("#back_btn").click(function () {
    $("#bamsmsTable").empty();
    getAllData();
  });

  var sy = "";
  var ss = "";
  $("#back_btn2").click(function () {
    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: {
        getData2: "getData2",
        school_year_val: sy,
        sem: ss,
      },
      contentType: "application/json",
      success: function (data) {
        $("#bamsmsTable").empty();
        displayId = [];
        var data2 = "yes";
        populateTable(data, data2);
      },
    });
  });

  function showFullDetails(teacherId) {
    $("#back_btn").show();
    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        $("#bamsmsTable").empty();
        let newData = JSON.parse(data);
        let table = $("#bamsmsTable");
        newData.forEach((schedules, i) => {
          sampleArray.push(schedules);
          var teacherId1 = schedules.teacher_id;
          if (teacherId1 == teacherId) {
            let tableRow = $("<tr>", {
              id: `main-row-${teacherId}`,
              "data-teacher-id": teacherId,
            });
            $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);

            if (teacherId !== null) {
              displayId.push(teacherId);

              let nameData = $("<td>", {
                class: "text-wrap ",
                html: (
                  schedules.fname +
                  " " +
                  schedules.mname +
                  " " +
                  schedules.lname
                ).toUpperCase(),
              }).appendTo(tableRow);
            } else {
              $("<td>", {
                class: "text-wrap text-warning",
                html: "NULL",
              }).appendTo(tableRow);
            }

            $("<td>", {
              class: "text-wrap",
              html: schedules.school_year_val,
            }).appendTo(tableRow);
            var yearLevelId = schedules.yearlevels_id;

            if (yearLevelId !== null) {
              $("<td>", {
                class: "text-wrap",
                html: schedules.yearlevel_name + " " + schedules.section_name,
              }).appendTo(tableRow);
            } else {
              $("<td>", {
                class: "text-wrap text-warning",
                html: "NULL",
              }).appendTo(tableRow);
            }

            var subjectName = schedules.subject_name;
            if (subjectName !== null) {
              // alert("tite");
              $("<td>", {
                class: "text-wrap",
                html: schedules.subject_name.toUpperCase(),
              }).appendTo(tableRow);
            } else {
              $("<td>", {
                class: "text-wrap text-warning",
                html: "NULL",
              }).appendTo(tableRow);
            }

            const timeString12hr1 = new Date(
              "1970-01-01T" + schedules.time_start + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });

            const timeString12hr2 = new Date(
              "1970-01-01T" + schedules.time_end + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });

            $("<td>", {
              class: "text-wrap",
              html: timeString12hr1 + " - " + timeString12hr2,
            }).appendTo(tableRow);
            $("<td>", {
              class: "text-wrap",
              html: days[schedules.sample_day],
            }).appendTo(tableRow);

            // buttons action
            let sem = schedules.sem;
            let schoolYear = schedules.school_year_val;

            let tableData = $("<td>", { class: "text-wrap" });
            $("<button>", {
              class: "btn btn-success mx-1 fa fa-eye ",
              "data-id": schedules.teacher_id,
              "data-sem": sem,
              "data-school-year": schoolYear,
              id: "view",
              html: "",
            }).appendTo(tableData);
            // $("<button>", {
            //   class: "btn btn-warning mx-1 far fa-edit ",
            //   "data-id": i,
            //   id: "edit",
            //   html: "",
            // }).appendTo(tableData);
            $("<button>", {
              class: "btn btn-danger mx-1 far fa-trash-alt ",
              "data-id": schedules.class_schedules_id,
              id: "delete",
              html: "",
            }).appendTo(tableData);
            tableData.appendTo(tableRow);
            table.append(tableRow);
          }
        });
      },
    });
  }

  function showFullDetails2(teacherId, schoolYear, sem) {
    $("#back_btn2").show();
    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: {
        getData2: "getData2",
        school_year_val: schoolYear,
        sem: sem,
      },
      contentType: "application/json",
      success: function (data) {
        $("#bamsmsTable").empty();
        let newData = JSON.parse(data);
        let table = $("#bamsmsTable");
        newData.forEach((schedules, i) => {
          sampleArray.push(schedules);
          var teacherId1 = schedules.teacher_id;
          if (teacherId1 == teacherId) {
            let tableRow = $("<tr>", {
              id: `main-row-${teacherId}`,
              "data-teacher-id": teacherId,
            });
            $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);

            if (teacherId !== null) {
              displayId.push(teacherId);

              let nameData = $("<td>", {
                class: "text-wrap ",
                html: (
                  schedules.fname +
                  " " +
                  schedules.mname +
                  " " +
                  schedules.lname
                ).toUpperCase(),
              }).appendTo(tableRow);
            } else {
              $("<td>", {
                class: "text-wrap text-warning",
                html: "NULL",
              }).appendTo(tableRow);
            }

            $("<td>", {
              class: "text-wrap",
              html: schedules.school_year_val,
            }).appendTo(tableRow);
            var yearLevelId = schedules.yearlevels_id;

            if (yearLevelId !== null) {
              $("<td>", {
                class: "text-wrap",
                html: schedules.yearlevel_name + " " + schedules.section_name,
              }).appendTo(tableRow);
            } else {
              $("<td>", {
                class: "text-wrap text-warning",
                html: "NULL",
              }).appendTo(tableRow);
            }

            var subjectName = schedules.subject_name;
            if (subjectName !== null) {
              // alert("tite");
              $("<td>", {
                class: "text-wrap",
                html: schedules.subject_name.toUpperCase(),
              }).appendTo(tableRow);
            } else {
              $("<td>", {
                class: "text-wrap text-warning",
                html: "NULL",
              }).appendTo(tableRow);
            }

            const timeString12hr1 = new Date(
              "1970-01-01T" + schedules.time_start + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });

            const timeString12hr2 = new Date(
              "1970-01-01T" + schedules.time_end + "Z"
            ).toLocaleTimeString("en-US", {
              timeZone: "UTC",
              hour12: true,
              hour: "numeric",
              minute: "numeric",
            });

            $("<td>", {
              class: "text-wrap",
              html: timeString12hr1 + " - " + timeString12hr2,
            }).appendTo(tableRow);
            $("<td>", {
              class: "text-wrap",
              html: days[schedules.sample_day],
            }).appendTo(tableRow);

            // buttons action
            let sem = schedules.sem;
            let schoolYear = schedules.school_year_val;

            let tableData = $("<td>", { class: "text-wrap" });
            $("<button>", {
              class: "btn btn-success mx-1 fa fa-eye ",
              "data-id": schedules.teacher_id,
              "data-sem": sem,
              "data-school-year": schoolYear,
              id: "view",
              html: "",
            }).appendTo(tableData);
            // $("<button>", {
            //   class: "btn btn-warning mx-1 far fa-edit ",
            //   "data-id": i,
            //   id: "edit",
            //   html: "",
            // }).appendTo(tableData);
            $("<button>", {
              class: "btn btn-danger mx-1 far fa-trash-alt ",
              "data-id": schedules.class_schedules_id,
              id: "delete",
              html: "",
            }).appendTo(tableData);
            tableData.appendTo(tableRow);
            table.append(tableRow);
          }
        });
      },
    });
  }

  function getAllData() {
    displayId = [];

    sampleArray = [];
    sampleArray1 = [];
    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        populateTable(data, "");
      },
    });

    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: {
        getDataYearSem2: "getDataYearSem2",
      },
      success: function (data) {
        var options = "";
        var data = JSON.parse(data);
        if (data.length != 0) {
          options = '<option value="">Select School Year</option>';
          data.forEach(function (date) {
            options +=
              '<option value="' +
              date.year +
              "," +
              date.sem +
              '">' +
              date.year +
              " " +
              date.sem +
              " period/sem" +
              "";
            ("</option>");
          });
        } else {
          options = '<option value="">No dates available</option>';
        }

        $("#year_sem").html(options);
      },
    });

    $("#year_sem").change(function () {
      var year_sem = $(this).val();
      var year = year_sem.split(",")[0];
      var sem = year_sem.split(",")[1];
      sy = year_sem.split(",")[0];
      ss = year_sem.split(",")[1];

      $.get({
        url: "../controllers/schedules/schedulesCrud.php",
        data: {
          getData2: "getData2",
          school_year_val: year,
          sem: sem,
        },
        contentType: "application/json",
        success: function (data) {
          $("#bamsmsTable").empty();
          displayId = [];
          var data2 = "yes";
          populateTable(data, data2);
        },
      });
    });

    $("#department_id").empty();
    let opts = $("#department_id");
    opts.append("<option value='0'>Choose Department</option>");
    $.get({
      url: "../controllers/departments/departmentsCrud.php",
      data: { getData: "getData" },
      contentType: "application/json",
      success: function (data) {
        let newdatadp = JSON.parse(data);
        newdatadp.forEach((department) => {
          opts.append(
            "<option value=" +
              department.id +
              ">" +
              department.department_name +
              "</option>"
          );
        });
      },
    });
    populateSchoolYear();
  }

  $("#add-new").click(function () {
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Schedule");
    $("input[name='sample_day[]']").attr("disabled", "disabled");
    $("#department_id").attr("disabled", "disabled");
    $("#school_year").attr("disabled", "disabled");
    $("#yearlevels_id").attr("disabled", "disabled");
    $("#rooms_id").attr("disabled", "disabled");
    $("#subject_id").attr("disabled", "disabled");
    $("#sample_day").attr("disabled", "disabled");
    $("#session_id").attr("disabled", "disabled");
    $("#sample_time_id").attr("disabled", "disabled");
    $("#teacher_id").attr("disabled", "disabled");
    $("#department_id").show();
    $("#yearlevels_id").show();
    $("#subject_id").show();
    $("#department_label").show();
    $("#yearlevels_label").show();
    $("#subject_label").show();
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });
  function addSched() {
    let formData = $("#modalMainForm").serializeArray();
    $.post({
      url: "../controllers/schedules/schedulesCrud.php",
      data: formData,
      success: function (data) {
        if (data) {
          $("#modalMainForm").trigger("reset");

          $("#modalMain").modal("hide");
          $("#bamsmsTable").empty();
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Data Added Successfuly",
            showConfirmButton: false,
            timer: 1500,
          });
          // sampleArray.length = 0;
          getAllData();
        }
      },
    });
  }
  $("#btn-mul").click(function () {
    var type = $("#type").val();
    if (type == "") {
      if (!isValid) {
        Swal.fire({
          position: "text-center",
          icon: "warning",
          title: "Please fill in all required fields.",
          showConfirmButton: false,
          timer: 1500,
        });
        return;
      }
    }
    if (type == "yes") {
      var isValid = true;
      $("#modalMainForm")
        .find("input:not(:hidden), select")
        .each(function () {
          if ($(this).val() === "") {
            isValid = false;
            return false;
          }
        });

      if (!isValid) {
        Swal.fire({
          position: "text-center",
          icon: "warning",
          title: "Please fill in all required fields.",
          showConfirmButton: false,
          timer: 1500,
        });
        return;
      }
    }

    // Get an array of selected sample days
    var selectedSampleDays = $("input[name='sample_day[]']:checked")
      .map(function () {
        return parseInt($(this).val());
      })
      .get();

    // Convert the array to a JSON string
    var sampleDayJSON = JSON.stringify(selectedSampleDays);

    var timeStartStr = $("#time_start").val();
    var timeStart = new Date("1970-01-01T" + timeStartStr);
    timeStart.setSeconds(timeStart.getSeconds() + 1);
    var updatedTimeStr = timeStart.toTimeString().split(" ")[0];

    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: {
        teacher_id: $("#teacher_id").val(),
        sem: $("#sem").val(),
        school_year: $("#school_year").val(),
        yearlevels_id: $("#yearlevels_id").val(),
        sample_day: sampleDayJSON, // Pass the JSON string here
        time_start: updatedTimeStr,
        time_end: $("#time_end").val(),
        checkSched: "check",
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.length != 0) {
          Swal.fire({
            title: "Overlapping Schedule!?",
            text: "The time you choose is already given to the employee or the grade that you choose!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Add it!",
            cancelButtonText: "Cancel",
            reverseButtons: true,
          }).then((result) => {
            if (result.isConfirmed) {
              addSched();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire("Cancelled", "Adding Schedule Cancelled:)", "error");
            }
          });
        } else {
          addSched();
        }
      },
    });

    // var timeStartStr = $("#time_start").val();

    // var timeStart = new Date("1970-01-01T" + timeStartStr);

    // timeStart.setSeconds(timeStart.getSeconds() + 1);

    // var updatedTimeStr = timeStart.toTimeString().split(" ")[0];
    // $.get({
    //   url: "../controllers/schedules/schedulesCrud.php",
    //   data: {
    //     teacher_id: $("#teacher_id").val(),
    //     sem: $("#sem").val(),
    //     school_year: $("#school_year").val(),
    //     yearlevels_id: $("#yearlevels_id").val(),
    //     sample_day: $("#sample_day").val(),
    //     time_start: updatedTimeStr,
    //     time_end: $("#time_end").val(),
    //     checkSched: "check",
    //   },
    //   success: function (data) {
    //     var data = JSON.parse(data);
    //     if (data.length != 0) {
    //       Swal.fire({
    //         title: "Overlapping Schedule!?",
    //         text: "The time you choose is already given to the employee or the grade that you choose!",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Yes, Add it!",
    //         cancelButtonText: "Cancel",
    //         reverseButtons: true,
    //       }).then((result) => {
    //         if (result.isConfirmed) {
    //           addSched();
    //         } else if (result.dismiss === Swal.DismissReason.cancel) {
    //           Swal.fire("Cancelled", "Adding Schedule Cancelled:)", "error");
    //         }
    //       });
    //     } else {
    //       addSched();
    //     }
    //   },
    // });
  });

  function update(index) {
    $("#yearlevels_id").empty();
    $("#subjects_id").empty();

    var selectedSubjectName = sampleArray[index]?.subject_name;
    var selectedYearLevelName = sampleArray[index]?.yearlevel_name;
    var selectedSectionName = sampleArray[index]?.section_name;

    let opts2 = $("#yearlevels_id");
    opts2.append("<option value='0'>Choose YearLevel and Section</option>");

    $.get({
      url: "../controllers/yearlevels/yearlevelsCrud.php",
      data: {
        getDatas: "getData",
        department_id: sampleArray[index]?.department_id,

        school_year: $("#school_year").val(),
      },
      contentType: "application/json",
      success: function (data) {
        let newdatadp = JSON.parse(data);
        newdatadp.forEach((yearlevel) => {
          sampleArray2.push(yearlevel);
          opts2.append(
            "<option value=" +
              yearlevel.id +
              (yearlevel.yearlevel_name === selectedYearLevelName &&
              yearlevel.section_name === selectedSectionName
                ? " selected"
                : "") +
              ">" +
              yearlevel.yearlevel_name +
              " " +
              yearlevel.section_name +
              "</option>"
          );
        });
      },
    });

    $department_id = sampleArray[index]?.department_id;
    $("#subject_id").empty();
    let sample_day = sampleArray[index]?.sample_day;
    let sem = sampleArray[index]?.sem;

    let school_year = parseInt($("#school_year").val());

    let opts3 = $("#subject_id");
    opts3.append("<option value='0'>Choose Subject</option>");
    $.get({
      url: "../controllers/subjects/subjectsCrud.php",
      data: { getDataSched: "getDataSched" },
      contentType: "application/json",
      success: function (data) {
        let newdatadp = JSON.parse(data);
        for (let index = 0; index < sampleArray.length; index++) {
          for (let index1 = 0; index1 < newdatadp.length; index1++) {
            if (
              parseInt($("#department_id").val()) ===
              parseInt(newdatadp[index1].department_id)
            ) {
              if (
                newdatadp[index1].id === sampleArray[index].subject_id &&
                parseInt($("#yearlevels_id").val()) ===
                  parseInt(sampleArray[index].yearlevels_id) &&
                sample_day === parseInt(sampleArray[index].sample_day) &&
                sem === parseInt(sampleArray[index].sem) &&
                school_year === parseInt(sampleArray[index].school_year_val)
              ) {
                newdatadp.splice(index1, 1);
              }
            }
          }
        }

        newdatadp.forEach((subject) => {
          opts3.append(
            "<option value=" +
              subject.id +
              (subject.subject_name === selectedSubjectName
                ? " selected"
                : "") +
              ">" +
              subject.subject_name +
              "</option>"
          );
        });
      },
    });

    $(
      "#school_year option[value=" + sampleArray[index]?.school_year_val + "]"
    ).attr("selected", "selected");

    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Schedules");
    $("#method").attr("name", "update");
    let models = sampleArray[index];

    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    });

    $("#school_year").removeAttr("disabled");

    $("#btn-mul").show();
    $("#btn-mul").attr("id", "updateData");
    $("#updateData").attr("name", "update");
  }

  $("#updateData").click(function () {
    let modalMainForm = $("#modalMainForm").serializeArray();

    $.post({
      url: "../controllers/schedules/schedulesCrud.php",
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
      url: "../controllers/schedules/schedulesCrud.php",
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

  // $.get({
  //   url: "../controllers/subjects/subjectsCrud.php",
  //   data: {
  //     getSubs: "getSubs",
  //   },
  //   success: function (data) {
  //     let newData = JSON.parse(data);
  //     newData.forEach((subject) => {
  //       let courseCode = subject.subject_name;
  //       let color = getColorForCourse(courseCode);
  //     });
  //   },
  // });

  function getRandomColor() {
    // Generate random RGB values with higher values for light colors
    const red = Math.floor(Math.random() * 128) + 128;
    const green = Math.floor(Math.random() * 128) + 128;
    const blue = Math.floor(Math.random() * 128) + 128;

    // Convert RGB to hexadecimal format
    const color =
      "#" + componentToHex(red) + componentToHex(green) + componentToHex(blue);
    return color;
  }

  function componentToHex(component) {
    const hex = component.toString(16);
    return hex.length === 1 ? "0" + hex : hex;
  }

  function resetColorForCourse(courseCode, yearLevelName) {
    const storageKey = `${courseCode}_${yearLevelName}`;
    localStorage.removeItem(storageKey);
  }

  function getColorForCourse(courseCode, yearLevelName) {
    // Create a unique storage key by combining courseCode and yearLevelName
    const storageKey = `${courseCode}_${yearLevelName}`;

    // Check if the color is already stored in local storage
    let storedColor = localStorage.getItem(storageKey);

    if (storedColor) {
      return storedColor; // Return the stored color
    } else {
      // Generate a new random color
      let newColor = getRandomColor();
      // Store the color in local storage for future use
      localStorage.setItem(storageKey, newColor);
      return newColor;
    }
  }

  function setRandomColorAndContentForDay(
    dayColumnIndex,
    startHour,
    endHour,
    courseCode,
    yearLevelName,
    sectionName
    // departmentName
  ) {
    const timeRows = document.querySelectorAll("#schedTime tr");
    const randomColor = getColorForCourse(courseCode, yearLevelName);

    timeRows.forEach((row) => {
      const time = parseFloat(row.dataset.time);
      if (time >= startHour && time < endHour) {
        const cell = row.cells[dayColumnIndex];

        const existingColor = cell.style.backgroundColor;
        if (existingColor) {
          if (time == startHour) {
            cell.style.background = `linear-gradient(to bottom, ${randomColor}, ${existingColor})`;
            // cell.style.backgroundColor = randomColor;
          }
        } else {
          // Set the random color as the background color for the cell
          cell.style.backgroundColor = randomColor;
        }
        // const timeRows = document.querySelectorAll("#schedTime tr");
        // const randomColor = getRandomColor();

        // timeRows.forEach((row) => {
        //   const time = parseFloat(row.dataset.time);
        //   if (time >= startHour && time < endHour) {
        //     const cell = row.cells[dayColumnIndex];
        //     const existingColor = cell.style.backgroundColor;
        //     if (existingColor) {
        //       if (time === startHour) {
        //         cell.style.backgroundColor = randomColor;
        //       }
        //     } else {
        //       // Set the random color as the background color for the cell
        //       cell.style.backgroundColor = randomColor;
        //     } // Add the course code only once for the given time slot
        if (time === startHour) {
          const courseCodeDiv = document.createElement("div");
          courseCodeDiv.classList.add("subject_name");
          courseCodeDiv.textContent = courseCode;
          cell.appendChild(courseCodeDiv);

          const yearLevelNameDiv = document.createElement("div");
          yearLevelNameDiv.classList.add("grade_and_section");
          yearLevelNameDiv.textContent = yearLevelName;
          cell.appendChild(yearLevelNameDiv);

          const sectionNameDiv = document.createElement("div");
          sectionNameDiv.classList.add("grade_and_section");
          sectionNameDiv.textContent = sectionName;
          cell.appendChild(sectionNameDiv);

          // const departmentNameDiv = document.createElement("div");
          // departmentNameDiv.classList.add("grade_and_section");
          // departmentNameDiv.textContent = departmentName;
          // cell.appendChild(departmentNameDiv);
        }
      }
    });

    return randomColor;
  }

  function timeToDecimal(time) {
    const [hoursStr, minutesStr] = time.split(":");
    let hours = parseInt(hoursStr);
    const minutes = parseInt(minutesStr);
    const amPm = time.slice(-2);

    if (amPm.toLowerCase() === "pm") {
      if (hours !== 12) {
        hours += 12;
      }
    } else if (amPm.toLowerCase() === "am" && hours === 12) {
      hours = 0;
    }

    const totalHours = hours + minutes / 60;
    const roundedDecimal = totalHours.toFixed(1);
    return parseFloat(roundedDecimal);
  }

  function resetModal() {
    const timeRows = document.querySelectorAll("#schedTime tr");

    timeRows.forEach((row) => {
      const cells = row.cells;
      for (let i = 1; i < cells.length; i++) {
        const cell = cells[i];
        cell.style.backgroundColor = "";
        cell.textContent = "";
      }
    });

    addedRows.forEach((row) => {
      row.remove();
    });
  }
  let addedRows = [];
  function addTimeRow(time) {
    const tbody = document.getElementById("schedTime");

    // Check if the row with the given time already exists
    if (!doesRowExist(time)) {
      const newRow = document.createElement("tr");
      const dataTime = convertTimeToDataTime(time);
      newRow.setAttribute("data-time", dataTime);
      newRow.innerHTML = `
        <td>${time}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    `;

      // Find the correct position to insert the new row
      let inserted = false;
      const rows = tbody.getElementsByTagName("tr");
      for (let i = 0; i < rows.length; i++) {
        const rowDataTime = parseFloat(rows[i].getAttribute("data-time"));
        if (dataTime < rowDataTime) {
          tbody.insertBefore(newRow, rows[i]);
          addedRows.push(newRow);
          inserted = true;
          break;
        }
      }

      if (!inserted) {
        tbody.appendChild(newRow);
      }
    }
  }

  function doesRowExist(time) {
    const tbody = document.getElementById("schedTime");
    const rows = tbody.getElementsByTagName("tr");
    const dataTimeToCompare = convertTimeToDataTime(time);

    for (const row of rows) {
      const rowDataTime = parseFloat(row.getAttribute("data-time"));
      if (rowDataTime === dataTimeToCompare) {
        return true;
      }
    }
    return false;
  }

  function convertTimeToDataTime(time) {
    const [hoursStr, minutesStr] = time.split(":");
    let hours = parseInt(hoursStr);
    const minutes = parseInt(minutesStr);
    const amPm = time.slice(-2);

    if (amPm.toLowerCase() === "pm") {
      if (hours !== 12) {
        hours += 12;
      }
    } else if (amPm.toLowerCase() === "am" && hours === 12) {
      hours = 0;
    }

    const totalHours = hours + minutes / 60;
    const roundedDecimal = totalHours.toFixed(1);

    return parseFloat(roundedDecimal);
  }

  $("#modalMain3").on("show.bs.modal", function () {
    resetModal();
  });
  function view(index, sem, schoolYear) {
    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: {
        getDataSched: "getDataSched",
        teacher_id: index,
        sem: sem,
        schoolYear: schoolYear,
      },
      contentType: "application/json",
      success: function (data) {
        let newData = JSON.parse(data);

        const days = [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ];
        const schedulesByDay = {};

        newData.forEach((teachersched, i) => {
          $("#reset_color").click(function () {
            resetColorForCourse(
              teachersched.subject_name,
              teachersched.yearlevel_name
            );
            window.location.reload();
          });
          if (i === 0) {
            $("#nameTeacher").html(
              teachersched.fname +
                " " +
                teachersched.mname +
                " " +
                teachersched.lname
            );
          }

          const timeString12hr1 = new Date(
            "1970-01-01T" + teachersched.time_start + "Z"
          ).toLocaleTimeString("en-US", {
            timeZone: "UTC",
            hour12: true,
            hour: "numeric",
            minute: "numeric",
          });

          const timeString12hr2 = new Date(
            "1970-01-01T" + teachersched.time_end + "Z"
          ).toLocaleTimeString("en-US", {
            timeZone: "UTC",
            hour12: true,
            hour: "numeric",
            minute: "numeric",
          });
          addTimeRow(timeString12hr1);
          addTimeRow(timeString12hr2);

          const dayOfWeek = days[teachersched.sample_day];

          if (!schedulesByDay[dayOfWeek]) {
            schedulesByDay[dayOfWeek] = [];
          }

          schedulesByDay[dayOfWeek].push({
            startHour: timeToDecimal(timeString12hr1),
            endHour: timeToDecimal(timeString12hr2),
            courseCode: teachersched.subject_name,
            sectionName: teachersched.section_name,
            yearLevelName: teachersched.yearlevel_name,
            // departmentName: "( " + teachersched.department_name + " )",
          });
        });

        days.forEach((day, index) => {
          const daySchedules = schedulesByDay[day];
          if (daySchedules) {
            daySchedules.forEach((schedule) => {
              const {
                startHour,
                endHour,
                courseCode,
                yearLevelName,
                sectionName,
                // departmentName,
              } = schedule;
              setRandomColorAndContentForDay(
                index + 1,
                startHour,
                endHour,
                courseCode,
                yearLevelName,
                sectionName
                // departmentName
              );
            });
          }
        });
      },
    });
    $("#modalMain3").modal("show");
    $("#modalMainLabel3").html("View Sched");
    // $("#btn-mul").hide();
  }

  $("#printSched").click(function () {
    const printContents = document.getElementById("printR").innerHTML;
    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    window.location.reload();
  });
});
