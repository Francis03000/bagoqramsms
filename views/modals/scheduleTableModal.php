<style>
    #schedTime td {}



    .subject_name {
        display: block;
        text-align: center;
        font-size: 12px;
        line-height: 1;
        padding: 1px;
        font-family: "Lucida Console", "Courier New", monospace;
    }

    .grade_and_section {
        display: block;
        text-align: center;
        font-size: 12px;
        line-height: 1;
        padding: 1px;
        font-family: "Lucida Console", "Courier New", monospace;
    }

    @media print {
        #printR {
            -webkit-print-color-adjust: exact;
        }

    }
</style>
<div class="modal fade" id="modalMain3" tabindex="-1" aria-labelledby="modalMainLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMainLabel3">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div id="printR">
                    <div class="d-flex justify-content-between">
                        <img id="school_logo" alt="school_logo" class="img-thumbnail" style="width:100px;">
                        <center>
                            <p class="font-weight-bold h4" id="school_name"></p>
                            <p class="font-weight-bold h5" id="school_address"></p>
                            <p class="font-weight-bold h5" id="school_id"></p>
                        </center>
                        <img id="school_logo2" alt="school_logo" class="img-thumbnail" style="width:100px;">
                    </div>
                    <hr>
                    <p>Teache Name: <span id="nameTeacher"></span></p>

                    <!-- Your existing table -->
                    <table class="table table-bordered table-success">
                        <thead class="bg-light">
                            <tr>
                                <th>Time</th>
                                <th data-day="Monday">Monday</th>
                                <th data-day="Tuesday">Tuesday</th>
                                <th data-day="Wednesday">Wednesday</th>
                                <th data-day="Thursday">Thursday</th>
                                <th data-day="Friday">Friday</th>

                            </tr>
                        </thead>
                        <tbody id="schedTime">
                            <!-- Existing table body here -->
                        </tbody>
                    </table>




                </div>
                <button type="button" class="btn btn-info form-control col-6 mx-auto d-block" id="reset_color">Reset
                    Color</button>


                <hr>

                <button class="btn btn-primary btn-sm" id="printSched">PRINT SCHEDULE</button>

            </div>
        </div>
    </div>

    <script>
        // Function to generate the time string in the format "H:MM AM/PM"
        function getTimeString(hours, minutes) {
            const meridiem = hours >= 12 ? 'PM' : 'AM';
            const displayHours = hours % 12 || 12;
            const displayMinutes = String(minutes).padStart(2, '0');
            return `${displayHours}:${displayMinutes} ${meridiem}`;
        }

        // Get the table body element by its id
        const tableBody = document.getElementById('schedTime');

        // Initialize the start time to 6:00 AM
        let startTimeHour = 6;
        let startTimeMinute = 0;

        // Loop to generate rows for each 30-minute interval until 11:00 PM
        while (startTimeHour < 18 || (startTimeHour === 18 && startTimeMinute === 0)) {
            // Calculate the end time for the interval
            let endTimeHour = startTimeHour;
            let endTimeMinute = startTimeMinute + 30;
            if (endTimeMinute === 60) {
                endTimeHour++;
                endTimeMinute = 0;
            }

            // Create a new row and cells
            const row = document.createElement('tr');
            const timeCell = document.createElement('td');
            const dataCell1 = document.createElement('td');
            const dataCell2 = document.createElement('td');
            const dataCell3 = document.createElement('td');
            const dataCell4 = document.createElement('td');
            const dataCell5 = document.createElement('td');
            const dataCell6 = document.createElement('td');

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

            // Set the data-time attribute for the row
            const dataTime = startTimeHour + startTimeMinute / 60;
            row.setAttribute('data-time', dataTime);

            // Append the row to the table body
            tableBody.appendChild(row);

            // Update the start time for the next interval
            startTimeHour = endTimeHour;
            startTimeMinute = endTimeMinute;
        }
    </script>