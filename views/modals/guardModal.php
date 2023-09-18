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
                    <input type="hidden" name="role_id" id="role_id" value="4">
                    <div class="row">


                        <div class="form-group col-6">
                            <label class="col-form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"
                                style="border-color: #606060">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Middle Name</label>
                            <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name"
                                style="border-color: #606060">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name"
                                style="border-color: #606060">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                                style="border-color: #606060">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_num" name="contact_num"
                                placeholder="Contact Number" style="border-color: #606060">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Email Add</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Add"
                                style="border-color: #606060">
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