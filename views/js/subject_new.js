$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );

  //   $("body").on("click", "#delete", (e) => {
  //     const id = $(e.currentTarget).data("id");
  //     showDeleteConfirmation(id);
  //   });
  //   $("body").on("click", "#view", (e) => view($(e.currentTarget).data("id")));

  $("#filesearch").keyup(function () {
    var value = $("#filesearch").val().toLowerCase();
    $("#bamsmsTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  let sampleArray = [];
  getAllData();
  function getAllData() {
    sampleArray = [];
    $.get({
      url: "../controllers/subjects/subjectsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        pushDatas(data);
      },
    });
  }

  function pushDatas(data) {
    var options = "";
    var data = JSON.parse(data);
    if (data.length != 0) {
      data.forEach(function (subject) {
        sampleArray.push(subject);

        options +=
          '<option value="' +
          subject.id +
          '">' +
          subject.subject_name +
          "</option>";
      });
    } else {
      options = '<option value="">No subject available</option>';
    }

    $("#listB").html(options);
  }

  $("#add-new").click(function () {
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Subject");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  // $("#btn-mul").click(function () {
  //   let modalMainForm = $("#modalMainForm").serializeArray();
  //   $.post({
  //     url: "../controllers/subjects/subjectsCrud.php",
  //     data: modalMainForm,
  //     success: function (data) {
  //       if (data) {
  //         $("#modalMainForm").trigger("reset");
  //         $("#modalMain").modal("hide");
  //         $("#bamsmsTable").empty();
  //         // sampleArray.empty();
  //         getAllData();
  //       }
  //     },
  //   });
  // });

  $("#edit_sub").click(function () {
    var listB = document.getElementById("listB");

    var selectedOption = listB.options[listB.selectedIndex];
    var subject_id = selectedOption.value;
    var subject_name = selectedOption.text;
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Subject");
    $("#method").attr("name", "update");

    $("#subject_name").val(subject_name);

    // $.get({
    //   url: "../controllers/departments/departmentsCrud.php",
    //   data: { id: subject_id, getDataDepart: "getDataDepart" },
    //   success: function (data) {
    //     var options = "";
    //     var data = JSON.parse(data);
    //     if (data.length != 0) {
    //       data.forEach(function (depart) {
    //         options +=
    //           '<option value="' +
    //           depart.department_id +
    //           '">' +
    //           depart.department_name +
    //           "</option>";
    //       });
    //     }

    //     $("#department_id").html(options);
    //   },
    // });
  });

  $("#btn-mul").click(function () {
    var listB = document.getElementById("listB");

    var selectedOption = listB.options[listB.selectedIndex];
    var subject_id = selectedOption.value;
    var subject_name = $("#subject_name").val();
    // var department_id = $("#department_id").val();
    $.post({
      url: "../controllers/subjects/subjectsCrud.php",
      data: {
        update: "update",
        id: subject_id,
        subject_name: subject_name,
        // department_id: department_id,
      },
      success: function (data) {
        if (data) {
          $("#modalMainForm").trigger("reset");
          $("#modalMain").modal("hide");
          $("#listB").empty();
          $("#select_department").empty();
          populateDepart();

          getAllData();
        }
      },
    });
  });

  $("#remove_sub").click(function () {
    var listB = document.getElementById("listB");

    var selectedOption = listB.options[listB.selectedIndex];
    var subject_id = selectedOption.value;
    var subject_name = selectedOption.text;

    if (subject_id != "") {
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
          deletes();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire("Cancelled", "Delete request cancelled:)", "error");
        }
      });
    }
  });

  function deletes() {
    var listB = document.getElementById("listB");

    var selectedOption = listB.options[listB.selectedIndex];
    var subject_id = selectedOption.value;
    var subject_name = selectedOption.text;
    $.post({
      url: "../controllers/subjects/subjectsCrud.php",
      data: { id: subject_id, subject_name: subject_name, delete: "delete" },
      success: function (data) {
        if (data) {
          Swal.fire("Deleted!", "Deleted successfuly.", "success").then(() => {
            $("#listB").empty();
            $("#select_department").empty();
            populateDepart();

            getAllData();
          });
        }
      },
    });
  }

  populateDepart();

  function populateDepart() {
    $.get({
      url: "../controllers/departments/departmentsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        var options = "";
        var data = JSON.parse(data);
        if (data.length != 0) {
          options = '<option value="all">Select Department</option>';
          options += '<option value="all">All</option>';

          data.forEach(function (depart) {
            options +=
              '<option value="' +
              depart.id +
              '">' +
              depart.department_name +
              "</option>";
          });
        } else {
          options = '<option value="">No department available</option>';
        }

        $("#select_department").html(options);
      },
    });
  }

  populateAddTo();
  function populateAddTo() {
    $.get({
      url: "../controllers/departments/departmentsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        var options = "";
        var data = JSON.parse(data);
        if (data.length != 0) {
          options = '<option value="">Add To</option>';
          data.forEach(function (depart) {
            options +=
              '<option value="' +
              depart.id +
              '">' +
              depart.department_name +
              "</option>";
          });
        } else {
          options = '<option value="">No dates available</option>';
        }

        $("#add_subjects").html(options);
      },
    });
  }
  $("#select_department").change(function () {
    var selectedDepart = $(this).val();
    if (selectedDepart == "all") {
      $("#listB").empty();
      getAllData();
    } else {
      $.get({
        url: "../controllers/subjects/subjectsCrud.php",
        data: {
          getDataDepart: "getDataDepart",
          id: selectedDepart,
        },
        success: function (data) {
          $("#listB").empty();
          pushDatas(data);
        },
      });
    }
  });

  $("#add_subjects").change(function () {
    var listA = document.getElementById("listA");

    var selectedOption = listA.options[listA.selectedIndex];
    var selectedValue = selectedOption.value;
    var newOption = document.createElement("option");
    newOption.value = selectedValue;
    var subject_name = newOption.value;
    var add_subjects = $(this).val();

    $("#add_subjects").empty();

    $.get({
      url: "../controllers/subjects/subjectsCrud.php",
      data: {
        subject_name: subject_name,
        department_id: add_subjects,

        checkSub: "checkSub",
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.length != 0) {
          swal.fire({
            icon: "warning",
            title: "Subject Already exist in this department",
            showConfirmButton: false,
            timer: 1000,
          });
        } else {
          $.post({
            url: "../controllers/subjects/subjectsCrud.php",
            data: {
              subject_name: subject_name,
              department_id: add_subjects,

              addNew: "addNew",
            },
            success: function (data) {
              if (data) {
                $("#listB").empty();
                $("#select_department").empty();
                populateDepart();

                getAllData();
              }
            },
          });
        }
      },
    });
    populateAddTo();
  });
  function view(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("View Subject");
    let models = sampleArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-mul").hide();
  }
});
