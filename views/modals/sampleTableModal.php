<div class="modal fade" id="modalMain2" tabindex="-1" aria-labelledby="modalMainLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMainLabel2">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="printR">
                    <div class="d-flex justify-content-between">
                        <input type="hidden" id="newInvoiceCodes">
                        <img src="assets/img/finger_logo.png" class="img-thumbnail" style="width:100px;">
                        <center>
                            <p class="font-weight-bold h4">School Name</p>
                            <p class="font-weight-bold h5">General Tinio, Nueva Ecija</p>
                            <p class="font-weight-bold h5">School ID : 12312345363</p>
                        </center>
                        <img src="assets/img/finger_logo.png" class="img-thumbnail" style="width:100px;">
                    </div>
                    <hr>
                    <p>Teache Name: <span id="nameTeacher"></span></p>

                    <table class="table table-bordered table-striped table-success">

                        <thead class="bg-light">
                            <tr>
                                <th>Subject Code</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Grade Level and Section</th>
                                <th>Department</th>
                                <th>Room Number</th>
                            </tr>
                        </thead>

                        <tbody id="schedTimeSample">
                        </tbody>

                    </table>
                </div>
                <hr>
                <button class="btn btn-primary btn-sm" id="printSched">PRING SCHEDULE</button>

            </div>
        </div>
    </div>