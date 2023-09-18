<div class="modal fade" id="modalMain" tabindex="-1" aria-labelledby="modalMainLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="col-form-label">Teacher</label>
                        <select class="form-control" name="teacher_id" id="teacher_id" style="border-color: #606060">
                            <option>Choose Teacher</option>
                            <?php
                                include_once('../API/DBCRUDAPI.php');
                                $newAPIFunctions = new DBCRUDAPI();
                                $newAPIFunctions->select("users","*","role_id = 3" );
                                $teachersList = $newAPIFunctions->sql;
                            
                                $index = 1;
                                while ($teachers = mysqli_fetch_assoc($teachersList)){
                        ?>

                            <option value="<?php echo $teachers['id']; ?>">
                                <?php echo $teachers['fname']." ".$teachers['mname']." ".$teachers['lname']; ?></option>

                            <?php } ?>
                        </select>

                    </div>


                    <div class="form-group">
                        <label class="col-form-label">Prefered Time From</label>
                        <input type="time" class="form-control" id="prefered_time_from" name="prefered_time_from"
                            style="border-color: #606060">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Prefered Time To</label>
                        <input type="time" class="form-control" id="prefered_time_to" name="prefered_time_to"
                            style="border-color: #606060">
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