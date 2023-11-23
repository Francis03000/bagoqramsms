import fetch from "../modules/auth.js";
$(document).ready(function () {
  var msg = new SpeechSynthesisUtterance();
  var voices = window.speechSynthesis.getVoices();
  msg.voice = voices[5];
  msg.volume = 1; // From 0 to 1
  msg.rate = 1; // From 0.1 to 10
  msg.pitch = 2; // From 0 to 2
  msg.text = "Welcome to login page";
  window.speechSynthesis.speak(msg);

  let loginAttempts = 0;
  let countdownTimer = localStorage.getItem("countdownTimer");

  function updateTimer(seconds) {
    $("#countdown-timer").text(`Retry in ${seconds} seconds`);
  }

  function resetLoginForm() {
    loginAttempts = 0;
    localStorage.removeItem("countdownTimer");
    $("#countdown-timer").text("");
    $("#loginUser").prop("disabled", false);
  }

  function performLogin() {
    if (loginAttempts >= 3) {
      return;
    }

    const myCipher = fetch.cipher("BAMSMS");
    const myDeCipher = fetch.decipher("BAMSMS");

    let form = {
      email: $("#email").val(),
      password: myCipher($("#password").val()),
      loginUser: "loginUser",
    };

    $.post({
      url: "authentication/authCrud.php",
      data: form,
      success: function (data) {
        var datas = JSON.parse(data);
        if (datas.length > 0) {
          var msg = new SpeechSynthesisUtterance();
          var voices = window.speechSynthesis.getVoices();
          msg.voice = voices[0];
          msg.rate = 1; // From 0.1 to 10
          msg.pitch = 1; // From 0 to 2
          msg.text =
            "Welcome" +
            datas[0].fname +
            " " +
            datas[0].mname +
            " " +
            datas[0].lname;
          window.speechSynthesis.speak(msg);
          if (datas[0].id > 1) {
            Swal.fire({
              icon: "success",
              title: `Welcome Back ${
                datas[0].fname + " " + datas[0].mname + " " + datas[0].lname
              }`,
              showConfirmButton: false,
              timer: 1000,
            });
            setTimeout(() => {
              window.location.href = "../views/employeeSchedule";
            }, 1000);
          } else {
            Swal.fire({
              icon: "success",
              title: `Welcome Back ${
                datas[0].fname + " " + datas[0].mname + " " + datas[0].lname
              }`,
              showConfirmButton: false,
              timer: 1000,
            });
            setTimeout(() => {
              window.location.href = "../views/";
            }, 1000);
          }
        } else {
          loginAttempts++;

          if (loginAttempts >= 3) {
            $("#loginUser").prop("disabled", true);
            countdownTimer = 30;
            localStorage.setItem("countdownTimer", countdownTimer);

            const timerInterval = setInterval(function () {
              if (countdownTimer <= 0) {
                clearInterval(timerInterval);
                resetLoginForm();
              } else {
                updateTimer(countdownTimer);
                countdownTimer--;
                localStorage.setItem("countdownTimer", countdownTimer);
              }
            }, 1000);
          }
          Swal.fire({
            icon: "warning",
            title: `Incorrect email or password `,
            showConfirmButton: false,
            timer: 1000,
          });
        }
      },
    });
  }

  $("#loginUser").click(function () {
    if ($("#email").val() !== "" && $("#password").val() !== "") {
      performLogin();
    }
  });

  $("#email, #password").keypress(function (event) {
    if (
      event.which == 13 &&
      $("#email").val() !== "" &&
      $("#password").val() !== ""
    ) {
      // Enter key is pressed and fields are not empty
      performLogin();
    }
  });

  if (countdownTimer > 0) {
    $("#loginUser").prop("disabled", true);
    const timerInterval = setInterval(function () {
      if (countdownTimer <= 0) {
        clearInterval(timerInterval);
        resetLoginForm();
      } else {
        updateTimer(countdownTimer);
        countdownTimer--;
        localStorage.setItem("countdownTimer", countdownTimer);
      }
    }, 1000);
  }

  $.get({
    url: "../controllers/customize/customizeCrud.php",
    data: { getData: "getData" },
    success: function (data) {
      let newData = JSON.parse(data);
      newData.forEach((custom, i) => {
        $("#myImage").attr("src", `../views/assets/img/${custom.logo}`);
      });
    },
  });
});
