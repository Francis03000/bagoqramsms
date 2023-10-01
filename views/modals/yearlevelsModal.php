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
                    <input type="hidden" name="id" id="id">

                    <div class="row">


                        <div class="form-group col-6">
                            <label class="col-form-label">Section</label>
                            <select class="form-control" name="section_id" id="section_id"
                                style="border-color: #606060">
                                <option value="">Choose Section</option>
                                <?php
                                include_once('../API/DBCRUDAPI.php');
                                $newAPIFunctions = new DBCRUDAPI();
                                $newAPIFunctions->select("sections", "*");
                                $sectionList = $newAPIFunctions->sql;

                                $index = 1;
                                while ($sections = mysqli_fetch_assoc($sectionList)) {
                                    ?>

                                    <option value="<?php echo $sections['id']; ?>">
                                        <?php echo $sections['section_name']; ?>
                                    </option>

                                <?php } ?>
                            </select>

                        </div>


                        <div class="form-group col-6">
                            <label class="col-form-label">Grade/Year Name</label>
                            <select class="form-control" name="yearlevel_name" id="yearlevel_name"
                                style="border-color: #606060">
                                <option value="">Select Grade</option>


                            </select>
                        </div>





                    </div>

                    <div class="row">


                        <div class="form-group col-6">
                            <label class="col-form-label">Room</label>
                            <select class="form-control" name="designated_room_id" id="designated_room_id"
                                style="border-color: #606060">
                                <option value="">Choose Room</option>
                                <?php
                                include_once('../API/DBCRUDAPI.php');
                                $newAPIFunctions = new DBCRUDAPI();
                                $newAPIFunctions->select("rooms", "*");
                                $roomsList = $newAPIFunctions->sql;

                                $index = 1;
                                while ($rooms = mysqli_fetch_assoc($roomsList)) {
                                    ?>

                                    <option value="<?php echo $rooms['id']; ?>">
                                        <?php echo $rooms['room_number'] . "  " . $rooms['room_name']; ?>
                                    </option>

                                <?php } ?>
                            </select>

                        </div>
                    </div>

                    <div class="row">



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