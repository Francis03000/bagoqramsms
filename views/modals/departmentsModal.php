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
                        <label class="col-form-label">Department Acronym</label>
                        <input type="text" class="form-control" id="acronym" name="acronym"
                            style="border-color: #606060">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name"
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