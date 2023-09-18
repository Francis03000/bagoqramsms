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
      url: "../controllers/staffs/staffsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let table = $("#bamsmsTable");
        newData.forEach((staffs, i) => {
          sampleArray.push(staffs);
          let tableRow = $("<tr>", { id: newData.id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: staffs.fname,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: staffs.mname,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: staffs.lname,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: staffs.address,
          }).appendTo(tableRow);
          // $("<td>", {
          //   class: "text-wrap",
          //   html: staffs.contact_num,
          // }).appendTo(tableRow);
          $("<td>", {
            class: "text-break",
            html: staffs.email,
          }).appendTo(tableRow);
          // $("<td>", {
          //   class: "text-break",
          //   html: staffs.display_name,
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
            "data-id": staffs.id,
            id: "delete",
            html: "",
          }).appendTo(tableData);
          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  function resetFormToZero() {
    var elements = document.querySelectorAll("#modalMainForm input");

    for (var i = 0, element; (element = elements[i++]); ) {
      $(`[name='${element.name}']`).attr("disabled", false);
    }
  }

  $("#add-new").click(function () {
    resetFormToZero();
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Staff");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  $("#btn-mul").click(function () {
    let modalMainForm = $("#modalMainForm").serializeArray();
    $.post({
      url: "../controllers/staffs/staffsCrud.php",
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
    $("#modalMainLabel").html("Update Staff");
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
      url: "../controllers/staffs/staffsCrud.php",
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
      url: "../controllers/staffs/staffsCrud.php",
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
    $("#modalMainLabel").html("View Staff");
    let models = sampleArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-mul").hide();
  }
});
