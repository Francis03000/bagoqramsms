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
                        <label class="col-form-label">Employee</label>
                        <select class="form-control" name="user_id" id="user_id" style="border-color: #606060">
                            <option val="">Choose Employee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Time In</label>
                        <input type="time" class="form-control" id="time_in" name="time_in"
                            style="border-color: #606060">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Afternoon Time Out</label>
                        <input type="time" class="form-control" id="time_out2" name="time_out2"
                            style="border-color: #606060">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Afternoon Time Out</label>
                        <input type="time" class="form-control" id="time_in2" name="time_in2"
                            style="border-color: #606060">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Time Out</label>
                        <input type="time" class="form-control" id="time_out" name="time_out"
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