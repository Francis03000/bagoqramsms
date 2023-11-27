$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    showDeleteConfirmation(id);
  });
  $("body").on("click", "#view", (e) => view($(e.currentTarget).data("id")));

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
      url: "../controllers/schoolyears/schoolyearsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let table = $("#bamsmsTable");
        newData.forEach((schoolyears, i) => {
          sampleArray.push(schoolyears);
          let tableRow = $("<tr>", { id: newData.id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: schoolyears.school_year,
          }).appendTo(tableRow);
          // $("<td>", {
          //   class: "text-wrap",
          //   html: schoolyears.batch_name,
          // }).appendTo(tableRow);

          // buttons action
          let tableData = $("<td>", { class: "text-wrap" });
          // $("<button>", {
          //   class: "btn btn-success mx-1 fa fa-eye ",
          //   "data-id": i,
          //   id: "view",
          //   html: "",
          // }).appendTo(tableData);
          $("<button>", {
            class: "btn btn-warning mx-1 far fa-edit ",
            "data-id": i,
            id: "edit",
            html: "",
          }).appendTo(tableData);
          $("<button>", {
            class: "btn btn-danger mx-1 far fa-trash-alt ",
            "data-id": schoolyears.id,
            id: "delete",
            html: "",
          }).appendTo(tableData);
          tableData.appendTo(tableRow);
          table.append(tableRow);
        });

        $("#data_table").DataTable();
      },
    });
  }

  $("#add-new").click(function () {
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Schoolyear");
    $("#modalMain").modal("show");
    $("#school_year_to").removeAttr("readonly");

    $("#method").attr("name", "addNew");
  });

  $("#btn-mul").click(function () {
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
    let modalMainForm = $("#modalMainForm").serializeArray();
    $.post({
      url: "../controllers/schoolyears/schoolyearsCrud.php",
      data: modalMainForm,
      dataType: "json",
      success: function (data) {
        if (data.success === true) {
          $("#modalMainForm").trigger("reset");
          $("#modalMain").modal("hide");
          $("#bamsmsTable").empty();
          Swal.fire({
            position: "text-center",
            icon: "success",
            title: "Data Added Successfuly",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else if (data.success === false) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Schoolyear already exist",
          });
        }
      },
    });
  });

  function update(index) {
    $("#school_year_to").attr("readonly", "readonly");
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Schoolyear");
    $("#method").attr("name", "update");
    let models = sampleArray[index];
    $school_year = sampleArray[index]?.school_year;
    const [school_year_from, school_year_to] = $school_year.split("-");
    $("#school_year_from").val(school_year_from);
    $("#school_year_to").val(school_year_to);

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
      url: "../controllers/schoolyears/schoolyearsCrud.php",
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
      url: "../controllers/schoolyears/schoolyearsCrud.php",
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

  function view(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("View Schoolyear");
    let models = sampleArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-mul").hide();
  }
});
