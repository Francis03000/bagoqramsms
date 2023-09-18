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
                        <label class="col-form-label">Time Start</label>
                        <input type="time" class="form-control" id="time_start" name="time_start"
                            placeholder="Add Start Time" style="border-color: #404040">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Time End</label>
                        <input type="time" class="form-control" id="time_end" name="time_end" placeholder="Add Time"
                            style="border-color: #404040">

                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Description</label>
                        <select class="form-control" name="sched_index" id="sched_index" style="border-color: #606060">
                            <option value="">Select Description</option>
                            <option value="0">First Subject</option>
                            <option value="1">Second Subject</option>
                            <option value="2">Morning Breaktime</option>
                            <option value="3">Third Subject</option>
                            <option value="4">Fourth Subject</option>
                            <option value="5">Lunch Break</option>
                            <option value="6">First Subject Afternoon</option>
                            <option value="7">Second Subject Afternoon</option>
                            <option value="8">Afternoon Breaktime</option>
                            <option value="9">Third Subject Afternoon</option>
                            <option value="10">Fourth Subject Afternoon</option>

                        </select>
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