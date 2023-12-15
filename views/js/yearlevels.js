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

  $.get({
    url: "../controllers/customize/customizeCrud.php",
    data: { getData: "getData" },
    success: function (data) {
      let newData = JSON.parse(data);
      newData.forEach((custom, i) => {
        $("#container_color").css("background-color", custom.main_color);
      });
    },
  });

  $.get({
    url: "../controllers/sections/sectionsCrud.php",
    data: {
      getData: "getData",
    },
    success: function (data) {
      // let newdatadp = JSON.parse(data);

      // for (let index = 0; index < sampleArray.length; index++) {
      //   for (let index1 = 0; index1 < newdatadp.length; index1++) {
      //     if (newdatadp[index1].id === sampleArray[index].section_id) {
      //       newdatadp.splice(index1, 1);
      //       index1--;
      //     }
      //   }
      // }
      // options = '<option value="">Select Sections</option>';

      // newdatadp.forEach((section) => {
      //   options +=
      //     '<option value="' +
      //     section.id +
      //     '">' +
      //     section.section_name +
      //     "</option>";
      // });

      // $("#section_id").html(options);

      var options = "";
      var data = JSON.parse(data);
      if (data.length != 0) {
        options = '<option value="">Select Role</option>';
        data.forEach(function (section) {
          options +=
            '<option value="' +
            section.id +
            '">' +
            section.section_name +
            "</option>";
        });
      } else {
        options = '<option value="">No sections available</option>';
      }

      $("#section_id").html(options);
    },
  });

  let sampleArray = [];
  getAllData();
  function getAllData() {
    sampleArray = [];
    $.get({
      url: "../controllers/yearlevels/yearlevelsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let table = $("#bamsmsTable");
        newData.forEach((yearlevels, i) => {
          sampleArray.push(yearlevels);
          let tableRow = $("<tr>", { id: newData.id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: yearlevels.yearlevel_name,
          }).appendTo(tableRow);

          var sectionName = yearlevels.section_name;

          if (sectionName !== null) {
            $("<td>", {
              class: "text-wrap",
              html: yearlevels.section_name,
            }).appendTo(tableRow);
          } else {
            $("<td>", {
              class: "text-wrap",
              html: "DELETED",
              style: "color: red;",
            }).appendTo(tableRow);
          }

          var roomNumber = yearlevels.room_number;

          if (roomNumber !== null) {
            $("<td>", {
              class: "text-wrap",
              html: yearlevels.room_number,
            }).appendTo(tableRow);
          } else {
            $("<td>", {
              class: "text-wrap",
              html: "DELETED",
              style: "color: red;",
            }).appendTo(tableRow);
          }

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
            "data-id": yearlevels.id,
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

  for (let i = 1; i <= 6; i++) {
    $("#yearlevel_name").append(
      "<option value='Grade " + i + "'>Grade " + i + "</option>"
    );
  }

  $("#add-new").click(function () {
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Grade and Section");
    $("#modalMain").modal("show");
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
      url: "../controllers/yearlevels/yearlevelsCrud.php",
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
            text: "Section already exist",
          });
        }
      },
    });
  });

  function update(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Grade and Section");
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
      url: "../controllers/yearlevels/yearlevelsCrud.php",
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
  // $("#modalMain").on("hide.bs.modal", function () {
  // $("#yearlevel_name").empty();
  //   populateYN();
  // });
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
      url: "../controllers/yearlevels/yearlevelsCrud.php",
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
    $("#modalMainLabel").html("View Grade and Section");
    let models = sampleArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-mul").hide();
  }
});
