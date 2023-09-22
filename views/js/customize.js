$(document).ready(function () {
  let sampleArray = [];
  getAllData();
  function getAllData() {
    sampleArray = [];
    $.get({
      url: "../controllers/customize/customizeCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((custom, i) => {
          sampleArray.push(custom);
          // $("#logo").val(custom.logo);
          $("#image_preview").attr("src", "assets/img/" + custom.logo);

          $("#main_color").val(custom.main_color);
          $("#school_name").val(custom.school_name);
          $("#school_address").val(custom.school_address);
          $("#school_id").val(custom.school_id);
          $("#update_img").val(custom.logo);
        });
      },
    });
  }

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
    var fd = new FormData();
    modalMainForm.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#logo")[0].files[0]);
    $.post({
      url: "../controllers/customize/customizeCrud.php",
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        if (data) {
          $("#modalMainForm").trigger("reset");
          Swal.fire({
            position: "text-center",
            icon: "success",
            title: "Data Added Successfuly",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else if (data.message === "1062") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Permission already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });

  //   function deletes(id) {
  //     $.post({
  //       url: "../controllers/sections/sectionsCrud.php",
  //       data: { id: id, delete: "delete" },
  //       success: function (data) {
  //         if (data) {
  //           Swal.fire("Deleted!", "Deleted successfuly.", "success").then(() => {
  //             $("#bamsmsTable").empty();
  //             // sampleArray.length = 0;
  //             getAllData();
  //           });
  //         }
  //       },
  //     });
  //   }

  $("#logo").on("change", function () {
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
});
