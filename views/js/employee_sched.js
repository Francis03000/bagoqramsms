$(document).ready(function () {
  var user_id = $("#user_id").val();
  // var user_id = 25;
  putTimeTable();
  function putTimeTable() {
    function getTimeString(hours, minutes) {
      const meridiem = hours >= 12 ? "PM" : "AM";
      const displayHours = hours % 12 || 12;
      const displayMinutes = String(minutes).padStart(2, "0");
      return `${displayHours}:${displayMinutes} ${meridiem}`;
    }

    // Get the table body element by its id
    const tableBody = document.getElementById("schedTime");

    // Initialize the start time to 6:00 AM
    let startTimeHour = 6;
    let startTimeMinute = 0;

    // Loop to generate rows for each 30-minute interval until 11:00 PM
    while (
      startTimeHour < 18 ||
      (startTimeHour === 18 && startTimeMinute === 0)
    ) {
      // Calculate the end time for the interval
      let endTimeHour = startTimeHour;
      let endTimeMinute = startTimeMinute + 30;
      if (endTimeMinute === 60) {
        endTimeHour++;
        endTimeMinute = 0;
      }

      // Create a new row and cells
      const row = document.createElement("tr");
      const timeCell = document.createElement("td");
      const dataCell1 = document.createElement("td");
      const dataCell2 = document.createElement("td");
      const dataCell3 = document.createElement("td");
      const dataCell4 = document.createElement("td");
      const dataCell5 = document.createElement("td");
      const dataCell6 = document.createElement("td");

      // Set the text content of the time cell
      const startTime = getTimeString(startTimeHour, startTimeMinute);
      const endTime = getTimeString(endTimeHour, endTimeMinute);
      timeCell.textContent = `${startTime} - ${endTime}`;

      // Append the cells to the row
      row.appendChild(timeCell);
      row.appendChild(dataCell1);
      row.appendChild(dataCell2);
      row.appendChild(dataCell3);
      row.appendChild(dataCell4);
      row.appendChild(dataCell5);
      row.appendChild(dataCell6);

      // Set the data-time attribute for the row
      const dataTime = startTimeHour + startTimeMinute / 60;
      row.setAttribute("data-time", dataTime);

      // Append the row to the table body
      tableBody.appendChild(row);

      // Update the start time for the next interval
      startTimeHour = endTimeHour;
      startTimeMinute = endTimeMinute;
    }
  }

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

  function populateTable(data) {
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
  }
  $.get({
    url: "../controllers/schedules/schedulesCrud.php",
    data: { getDataEmployee: "getDataEmployee", user_id: user_id },
    success: function (data) {
      populateTable(data);
    },
  });

  $.get({
    url: "../controllers/schedules/schedulesCrud.php",
    data: {
      getDataYearSem: "getDataYearSem",
      user_id: user_id,
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

    $.get({
      url: "../controllers/schedules/schedulesCrud.php",
      data: {
        getData3: "getData3",
        school_year_val: year,
        sem: sem,
        user_id: user_id,
      },
      contentType: "application/json",
      success: function (data) {
        $("#schedTime").empty();
        putTimeTable();
        populateTable(data);
      },
    });
  });

  $("#printSched").click(function () {
    const printContents = document.getElementById("printR").innerHTML;
    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    window.location.reload();
  });
});
