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
                        <label class="col-form-label">Role</label>
                        <input type="text" class="form-control" id="display_name" name="display_name"
                            placeholder="Add Role" style="border-color: #404040">
                    </div>

                    <div class="form-group ">
                        <label class="col-form-label">Job Description</label>

                        <select class="form-control" name="role_type" id="role_type" style="border-color: #606060">
                            <option value="">Select Job type</option>
                            <option value="yes">Teaching </option>
                            <option value="no">Non teaching </option>


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