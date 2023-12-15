$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    const qr_code = $(e.currentTarget).data("qr_code");
    showDeleteConfirmation(id, qr_code);
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

  $("#user_img").on("change", function () {
    var fileInput = this;
    // var filename = fileInput.value.split("\\").pop();
    var imagePreview = $("#image_preview");

    var reader = new FileReader();
    reader.onload = function (e) {
      imagePreview.attr("src", e.target.result);
    };

    if (fileInput.files.length > 0) {
      reader.readAsDataURL(fileInput.files[0]);
    } else {
      imagePreview.attr("src", "assets/img/user.jpg"); // Set the default image
    }
  });

  const cipher = (salt) => {
    const textToChars = (text) => text.split("").map((c) => c.charCodeAt(0));
    const byteHex = (n) => ("0" + Number(n).toString(16)).substr(-2);
    const applySaltToChar = (code) =>
      textToChars(salt).reduce((a, b) => a ^ b, code);

    return (text) =>
      text
        .split("")
        .map(textToChars)
        .map(applySaltToChar)
        .map(byteHex)
        .join("");
  };

  const decipher = (salt) => {
    const textToChars = (text) => text.split("").map((c) => c.charCodeAt(0));
    const applySaltToChar = (code) =>
      textToChars(salt).reduce((a, b) => a ^ b, code);
    return (encoded) =>
      encoded
        .match(/.{1,2}/g)
        .map((hex) => parseInt(hex, 16))
        .map(applySaltToChar)
        .map((charCode) => String.fromCharCode(charCode))
        .join("");
  };
  const myCipher = cipher("BAMSMS");

  let sampleArray = [];
  getAllData();
  function getAllData() {
    sampleArray = [];
    $.get({
      url: "../controllers/user/userCrud.php",
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
      $("<img>", {
        class: "rounded-circle img-fluid border border-secondary",
        style: "width: 120px; height: 120px; overflow: hidden;",
        alt: "profile pic",
        src: `assets/img/profile/${teachers.email}/${teachers.user_img}`,
        onerror: "this.onerror=null;this.src='assets/img/user.jpg';",
      }).appendTo(tableRow);
      $("<td>", {
        class: "text-wrap",
        html: teachers.fname,
        hidden: "",
      }).appendTo(tableRow);
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
      // $("<td>", {
      //   class: "text-break",
      //   html: teachers.email,
      // }).appendTo(tableRow);
      $("<td>", {
        class: "text-break",
        html: teachers.display_name,
      }).appendTo(tableRow);

      // buttons action
      let tableData = $("<td>", { class: "text-wrap" });

      $("<button>", {
        class: "btn btn-success mx-1 fas fa-qrcode ",
        "data-id": i,
        id: "view",
        html: "",
      }).appendTo(tableData);
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
        "data-qr_code": teachers.qr_code,
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

    $("#data_table").DataTable();
  }

  function populateUnarchiveTable() {
    $.get({
      url: "../controllers/user/userCrud.php",
      data: { getDataInac: "getDataInac" },
      success: function (data) {
        $("#bamsmsTable").empty();
        let newData = JSON.parse(data);
        let table = $("#bamsmsTable");
        newData.forEach((teachers, i) => {
          let tableRow = $("<tr>", { id: newData.id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<img>", {
            class: "rounded-circle img-fluid border border-secondary",
            style: "width: 120px; height: 120px; overflow: hidden;",

            src: `assets/img/profile/${teachers.email}/${teachers.user_img}`,
            onerror: "this.onerror=null;this.src='assets/img/user.jpg';",
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: teachers.fname,
            hidden: "",
          }).appendTo(tableRow);
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
          // $("<td>", {
          //   class: "text-break",
          //   html: teachers.email,
          // }).appendTo(tableRow);
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

        $("#data_table").DataTable();
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

  function generateRandomString(length) {
    const characters =
      "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    let randomString = "";

    if (length < 8) {
      length = 8;
    }

    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      randomString += characters.charAt(randomIndex);
    }

    return randomString;
  }

  $("#add-new").click(function () {
    $("#modalMainForm").trigger("reset");
    $("#modalMainLabel").html("Add Personnel");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  $("#btn-mul").click(function () {
    const randomString = generateRandomString(8);
    $password = myCipher(randomString);
    $("#password").val($password);
    $("#dec_password").val(randomString);

    var isValid = true;
    $("#modalMainForm")
      .find("input:not(:hidden), select")
      .each(function () {
        if ($(this).is(":file")) {
          if ($(this)[0].files.length === 0) {
            isValid = false;
            return false;
          }
        } else if ($(this).attr("id") !== "mname") {
          if ($(this).val() === "") {
            isValid = false;
            return false;
          }
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
    var fd = new FormData();
    modalMainForm.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#user_img")[0].files[0]);
    $.post({
      url: "../controllers/user/userCrud.php",
      data: fd,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        if (data.success === true) {
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
          getAllData();
        } else if (data.success === false) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Email already exist",
          });
        }
      },
    });
  });

  function update(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Personnel");
    $("#method").attr("name", "update");
    let models = sampleArray[index];
    var user_image = sampleArray[index]?.user_img;

    var email = sampleArray[index]?.email;
    var role_type = sampleArray[index]?.teaching;
    var role_id = sampleArray[index]?.role_id;

    $.get({
      url: "../controllers/roles/rolesCrud.php",
      data: {
        getData2: "getData2",
        role_type: role_type,
      },
      success: function (data) {
        var options = "";
        var data = JSON.parse(data);
        if (data.length != 0) {
          options = '<option value="">Select Role</option>';
          data.forEach(function (role) {
            options +=
              // '<option value="' +
              // role.id +
              // '">' +
              // role.display_name +
              // "</option>";

              "<option value=" +
              role.id +
              (role.id === role_id ? " selected" : "") +
              ">" +
              role.display_name +
              "</option>";
          });
        } else {
          options = '<option value="">No roles available</option>';
        }

        $("#role_id").html(options);
      },
    });

    // $("#role_id option[value=" + sampleArray[index]?.role_id + "]").attr(
    //   "selected",
    //   "selected"
    // );

    if (user_image != "") {
      $("#image_preview").attr(
        "src",
        "assets/img/profile/" + email + "/" + user_image
      );
    } else if (user_image == "") {
      $("#image_preview").attr("src", "assets/img/user.jpg");
    }

    models.user_img = null;

    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    });

    $("#teaching option[value=" + sampleArray[index]?.teaching + "]").attr(
      "selected",
      "selected"
    );

    $("#update_img").val(user_image);

    $("#btn-mul").show();
    $("#btn-mul").attr("id", "updateData");
    $("#updateData").attr("name", "update");
  }

  $("#updateData").click(function () {
    let modalMainForm = $("#modalMainForm").serializeArray();
    var fd = new FormData();
    modalMainForm.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#user_img")[0].files[0]);
    $.post({
      url: "../controllers/user/userCrud.php",
      data: fd,
      contentType: false,
      processData: false,
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

  $("#save-photo").click(function () {
    var imageName = prompt("Enter the image name");

    if (!imageName) {
      return;
    }

    var imageSrc = document.getElementById("qr_image_modal").src;

    var anchor = document.createElement("a");
    anchor.href = imageSrc;
    anchor.download = imageName + ".png";

    anchor.click();
    $("#modalMain2").modal("hide");
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
      url: "../controllers/user/userCrud.php",
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
      url: "../controllers/user/userCrud.php",
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

  function showDeleteConfirmation(id, qr_code) {
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
        deletes(id, qr_code);
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Cancelled", "Delete request cancelled:)", "error");
      }
    });
  }
  function deletes(id, qr_code) {
    $.post({
      url: "../controllers/user/userCrud.php",
      data: { id: id, qr_code: qr_code, delete: "delete" },
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

  $("#modalMain").on("hidden.bs.modal", function () {
    $("#bamsmsTable").empty();
    // sampleArray.length = 0;
    getAllData();
    $("#image_preview").attr("src", "assets/img/user.jpg");
  });

  $("#teaching").change(function () {
    $role_type = $(this).val();

    $.get({
      url: "../controllers/roles/rolesCrud.php",
      data: {
        getData2: "getData2",
        role_type: $role_type,
      },
      success: function (data) {
        var options = "";
        var data = JSON.parse(data);
        if (data.length != 0) {
          options = '<option value="">Select Role</option>';
          data.forEach(function (role) {
            options +=
              '<option value="' +
              role.id +
              '">' +
              role.display_name +
              "</option>";
          });
        } else {
          options = '<option value="">No roles available</option>';
        }

        $("#role_id").html(options);
      },
    });
  });

  function view(index) {
    $("#modalMain2").modal("show");
    $("#modalMainLabel2").html("QR CODE");
    let models = sampleArray[index];
    // Object.keys(models).map((key) => {
    //   $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    // });
    let qr_code = sampleArray[index]?.qr_code;
    let qr_image = "assets/qr_code/" + qr_code + ".png";
    $("#qr_image_modal").attr("src", qr_image);
    $("#btn-mul").hide();
  }

  $("#download_excel").click(function () {
    var sheetName = prompt("Enter the sheet name:");

    if (sheetName !== null && sheetName.trim() !== "") {
      var table2excel = new Table2Excel();
      table2excel.export(document.querySelectorAll("#excel_table"), sheetName);
    }

    $("#modalMain2").modal("hide");
  });
});
