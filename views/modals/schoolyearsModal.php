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
                        <label class="col-form-label">School Year From</label>
                        <input type="text" class="form-control" id="school_year_from" name="school_year_from"
                            oninput="validateInput(this, 'numbers')" pattern="[0-9]*" title="Please input numbers only"
                            style="border-color: #606060">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">School Year To</label>
                        <input type="text" class="form-control" id="school_year_to" name="school_year_to"
                            oninput="validateInput(this, 'numbers')" pattern="[0-9]*" title="Please input numbers only"
                            style="border-color: #606060">
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-form-label">Batch Name</label>
                        <input type="text" class="form-control" id="batch_name" name="batch_name"
                            style="border-color: #606060">
                    </div> -->
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
    function validateInput(input, validationType) {
        if (validationType === 'letters') {
            input.value = input.value.replace(/[^A-Za-z]/g, ''); // Remove any non-letter characters
        } else if (validationType === 'numbers') {
            input.value = input.value.replace(/\D/g, ''); // Remove any non-digit characters
        }
    }




    $("#school_year_from").change(function () {
        $("#school_year_to").empty();
        var school_year_from = $(this).val();

        var school_year_to_val = parseInt(school_year_from) + 1;

        $("#school_year_to").val(school_year_to_val);

        $("#school_year_to").attr("readonly", "readonly");
    });
</script>