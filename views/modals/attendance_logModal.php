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
                        <img id="school_logo" alt="school_logo" src="assets/img/school_logo.jpg" class="img-thumbnail"
                            style="width:100px;">
                        <center>
                            <p class="font-weight-bold h4" id="school_name"></p>
                            <p class="font-weight-bold h5" id="school_address"></p>
                            <p class="font-weight-bold h5" id="school_id"></p>
                        </center>
                        <img id="school_logo2" alt="school_logo" src="assets/img/school_logo.jpg" class="img-thumbnail"
                            style="width:100px;">
                    </div>
                    <hr>
                    <div class="row">
                        <div class=" col-6 text-center">
                            <p class="form-control" name="">Employee Name: <span id="employee"></span></p>

                        </div>

                        <div class="col-6 text-center">
                            <select class="form-control" name="" id="log_year_month">
                                <option value="">Select Date</option>
                            </select>

                        </div>


                    </div>

                    <table class="table table-bordered table-striped table-success" id="excel_table">

                        <thead class="bg-light">
                            <tr>
                                <th>Time In</th>
                                <th>Remarks In</th>
                                <th>Time Out</th>
                                <th>Remarks Out </th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody id="attendance">
                        </tbody>

                    </table>
                </div>
                <hr>
                <div class="row">
                    <!-- <div class="col">
                        <button class="btn btn-primary btn-sm" id="printSched">PRINT SCHEDULE</button>


                    </div> -->

                    <div class="col">
                        <button class="btn btn-primary btn-sm" id="download_excel"><i class="fas fa-file-csv"></i>
                            Download Data</button>


                    </div>



                </div>


            </div>
        </div>
    </div>