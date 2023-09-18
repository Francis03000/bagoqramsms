<style>
    .hover-pointer:hover {
        cursor: pointer;
    }
</style>

<div class="modal fade" id="modalMain" tabindex="-1" aria-labelledby="modalMainLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMainLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalMainForm">
                    <input type="hidden" id="method" name="update">
                    <input type="hidden" name="class_schedules_id" id="class_schedules_id">
                    <div class="form-group col-6 mx-auto d-block">
                        <label class="col-form-label ">Sched_Type</label>
                        <select class="form-control" name="type" id="type" style="border-color: #606060">
                            <option value="">Choose Type</option>
                            <option value="yes">Teaching Employee</option>
                            <option value="no">Non-teaching Employee</option>

                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Teacher</label>
                            <select class="form-control" name="teacher_id" id="teacher_id"
                                style="border-color: #606060">
                                <option val="">Choose Employee</option>
                            </select>

                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">School Year</label>
                            <select class="form-control" name="school_year" id="school_year"
                                style="border-color: #606060">
                                <option>Choose School Year</option>
                            </select>

                        </div>






                    </div>
                    <div class="row">



                        <div class="form-group col-6">
                            <label class="col-form-label" id="yearlevels_label">Grade And Section</label>
                            <select class="form-control" name="yearlevels_id" id="yearlevels_id"
                                style="border-color: #606060">
                                <option value="">Choose Grade/Section</option>
                            </select>

                        </div>


                        <div class="form-group col-6">
                            <label class="col-form-label ">Semester/Grading</label>
                            <select class="form-control  " name="sem" id="sem" style="border-color: #606060">
                                <option value="">Choose Semester/Grading</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>

                            </select>
                        </div>
                    </div>




                    <div class="form-group col-12 mx-auto d-block">

                        <label class="col-form-label" style="padding-right:100px">Select Day</label>
                        <div class="form-check form-check-inline">

                            <?php
                            $days = [
                                0 => 'Monday',
                                1 => 'Tuesday',
                                2 => 'Wednesday',
                                3 => 'Thursday',
                                4 => 'Friday',
                            ];

                            foreach ($days as $value => $day) {
                                echo "<input class='form-check-input' type='checkbox' name='sample_day[]' value='$value' id='sample_day$value'>";
                                echo "<label class='form-check-label' for='sample_day$value'>$day</label>";
                            }
                            ?>
                        </div>




                        <!-- <label class="col-form-label">Day</label>
                            <select class="form-control" name="sample_day" id="sample_day"
                                style="border-color: #606060">
                                <option value="">Choose Day</option>
                                <option value="0">Monday</option>
                                <option value="1">Tuesday</option>
                                <option value="2">Wednesday</option>
                                <option value="3">Thursday</option>
                                <option value="4">Friday</option>
                                <option value="5">Saturday</option>


                            </select> -->
                    </div>

                    <div class="form-group col-6 mx-auto d-block">
                        <label class="col-form-label " id="subject_label">Subjects</label>
                        <select class="form-control" name="subject_id" id="subject_id" style="border-color: #606060">
                        </select>
                    </div>
                    <div class="row">

                        <div class="form-group col-6" id="sched_time">
                            <label class="col-form-label">Start Time</label>
                            <select class="form-control" id="time_start" name="time_start"
                                style="border-color: #404040">
                            </select>
                        </div>

                        <div class="form-group col-6" id="sched_time">
                            <label class="col-form-label">End Time</label>
                            <select class="form-control" id="time_end" name="time_end" style="border-color: #404040">
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn-mul" name="addNew" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script>
    var startTimeSelect = document.getElementById("time_start");
    var endTimeSelect = document.getElementById("time_end");

    for (var hours = 6; hours <= 21; hours++) {
        for (var minutes = 0; minutes < 60; minutes += 30) {
            var formattedHour = hours < 10 ? "0" + hours : hours;
            var formattedMinutes = minutes === 0 ? "00" : minutes;
            var formattedSeconds = "00";
            var time12HourFormat = (hours > 12 ? hours - 12 : hours) + ":" + formattedMinutes + (hours >= 12 ? " PM" : " AM");
            var time24HourFormat = formattedHour + ":" + formattedMinutes + ":" + formattedSeconds;;

            var option = document.createElement("option");
            option.value = time24HourFormat;
            option.text = time12HourFormat;

            startTimeSelect.appendChild(option);
            endTimeSelect.appendChild(option.cloneNode(true));
        }
    }

    $("#time_start").change(function () {
        $("#time_end").empty();
        var selectedStartTime = $(this).val();
        var selectedStartHour = parseInt(selectedStartTime.split(':')[0]);
        var selectedStartMinute = parseInt(selectedStartTime.split(':')[1]);

        var endTimeSelect2 = document.getElementById("time_end");

        for (var hours = selectedStartHour; hours <= selectedStartHour + 8; hours++) {
            for (var minutes = 0; minutes < 60; minutes += 30) {
                var formattedHour = hours < 10 ? "0" + hours : hours;
                var formattedMinutes = minutes === 0 ? "00" : minutes;
                var formattedSeconds = "00";
                var time12HourFormat = (hours > 12 ? hours - 12 : hours) + ":" + formattedMinutes + (hours >= 12 ? " PM" : " AM");
                var time24HourFormat = formattedHour + ":" + formattedMinutes + ":" + formattedSeconds;

                if (hours === selectedStartHour && minutes <= selectedStartMinute) {
                    continue;
                }

                // Check if the calculated time exceeds 11:00 PM (23:00)
                if (hours > 23 || (hours === 23 && minutes > 0)) {
                    break;
                }

                var option = document.createElement("option");
                option.value = time24HourFormat;
                option.text = time12HourFormat;

                endTimeSelect2.appendChild(option);
            }
        }

    });

</script>