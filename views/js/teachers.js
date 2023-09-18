$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    showDeleteConfirmation(id);
  });
  $("body").on("click", "#view", (e) => view($(e.currentTarget).data("id")));
  $("body").on("click", "#archive", (e) => {
    const id = $(e.currentTarget).data("id");
    archiveConfirmation(id);
  });
  $("body").on("click", "#unarchive", (e) => {
    const id = $(e.currentTarget).data("id");
    unarchiveConfirmation(id);
  });

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
      url: "../controllers/teachers/teachersCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        $("#bamsmsTable").empty();
        pushDatas(data);
      },
    });
  }

  function pushDatas(data) {
    let newData = JSON.parse(data);
    let table = $("#bamsmsTable");
    newData.forEach((teachers, i) => {
      sampleArray.push(teachers);
      let tableRow = $("<tr>", { id: newData.id });
      $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: teachers.fname,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: teachers.mname,
      }).appendTo(tableRow);

      $("<td>", {
        class: "text-wrap",
        html: teachers.lname,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: teachers.address,
      }).appendTo(tableRow);
      // $("<td>", {
      //   class: "text-wrap",
      //   html: teachers.contact_num,
      // }).appendTo(tableRow);
      $("<td>", {
        class: "text-break",
        html: teachers.email,
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-break",
        html: teachers.display_name,
      }).appendTo(tableRow);

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
        title: "Edit Button",
      }).appendTo(tableData);
      $("<button>", {
        class: "btn btn-danger mx-1 far fa-trash-alt ",
        "data-id": teachers.id,
        id: "delete",
        html: "",
        title: "Delete Button",
      }).appendTo(tableData);
      $("<button>", {
        class: "btn btn-info mx-1 fas fa-archive ",
        "data-id": teachers.id,
        id: "archive",
        html: "",
        title: "Archive Button",
      }).appendTo(tableData);
      tableData.appendTo(tableRow);
      table.append(tableRow);
    });
  }

  function populateUnarchiveTable() {
    $.get({
      url: "../controllers/teachers/teachersCrud.php",
      data: { getDataInac: "getDataInac" },
      success: function (data) {
        $("#bamsmsTable").empty();
        let newData = JSON.parse(data);
        let table = $("#bamsmsTable");
        newData.forEach((teachers, i) => {
          sampleArray.push(teachers);
          let tableRow = $("<tr>", { id: newData.id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: teachers.fname,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: teachers.mname,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: teachers.lname,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: teachers.address,
          }).appendTo(tableRow);
          // $("<td>", {
          //   class: "text-wrap",
          //   html: teachers.contact_num,
          // }).appendTo(tableRow);
          $("<td>", {
            class: "text-break",
            html: teachers.email,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-break",
            html: teachers.display_name,
          }).appendTo(tableRow);

          // buttons action
          let tableData = $("<td>", { class: "text-wrap" });

          $("<button>", {
            class: "btn btn-danger mx-1 far fa-trash-alt ",
            "data-id": teachers.id,
            id: "delete",
            html: "",
            title: "Delete Button",
          }).appendTo(tableData);
          $("<button>", {
            class: "btn btn-success mx-1 fas fa-archive ",
            "data-id": teachers.id,
            id: "unarchive",
            html: "",
            title: "Unarchive Button",
          }).appendTo(tableData);
          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  $("#archived-list").on("click", function () {
    populateUnarchiveTable();
    $("#active-list").removeClass("active");
    $(this).addClass("active");
  });

  $("#active-list").on("click", function () {
    getAllData();

    $("#archived-list").removeClass("active");
    $(this).addClass("active");
  });

  $("#add-new").click(function () {
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Teacher");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  $("#btn-mul").click(function () {
    let modalMainForm = $("#modalMainForm").serializeArray();
    $.post({
      url: "../controllers/teachers/teachersCrud.php",
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
    $("#modalMainLabel").html("Update Teacher");
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
      url: "../controllers/teachers/teachersCrud.php",
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

  function unarchiveConfirmation(id) {
    Swal.fire({
      title: "Unarchive",
      text: "Are you sure you want to unarchive this data?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, unarchive it!",
      cancelButtonText: "Cancel",
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        unarchive(id);
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Cancelled", "Unarchive request cancelled:)", "error");
      }
    });
  }

  function unarchive(id) {
    $.post({
      url: "../controllers/teachers/teachersCrud.php",
      data: { id: id, status: "active", archive: "archive" },
      success: function (data) {
        if (data) {
          Swal.fire("Archived!", "Archived successfuly.", "success").then(
            () => {
              $("#bamsmsTable").empty();
              // sampleArray.length = 0;
              populateUnarchiveTable();
            }
          );
        }
      },
    });
  }
  function archiveConfirmation(id) {
    Swal.fire({
      title: "Archiving",
      text: "Are you sure you want to archive this data?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, archive it!",
      cancelButtonText: "Cancel",
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        archive(id);
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Cancelled", "Archive request cancelled:)", "error");
      }
    });
  }
  function archive(id) {
    $.post({
      url: "../controllers/teachers/teachersCrud.php",
      data: { id: id, status: "inactive", archive: "archive" },
      success: function (data) {
        if (data) {
          Swal.fire("Archived!", "Archived successfuly.", "success").then(
            () => {
              $("#bamsmsTable").empty();
              // sampleArray.length = 0;
              getAllData();
            }
          );
        }
      },
    });
  }

  function showDeleteConfirmation(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "There are data that can be affected if you delete this row?  Are you sure you want to delete this?",
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
      url: "../controllers/teachers/teachersCrud.php",
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
    $("#modalMainLabel").html("View Teacher");
    let models = sampleArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-mul").hide();
  }
});
