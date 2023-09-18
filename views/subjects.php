<?php include('layouts/head.php'); ?>
<?php
$role_id = $_SESSION["userRoleId"];

if ($role_id == 0 || $role_id == 1) {
    // 


} else {
    header('location: 404');

}
?>
<title>List Box Example</title>
<style>
    /* .table-custom {
        border: 2px solid black;
        font-size: 10px;
        max-height: 206px;
        overflow-y: scroll;
        height: 206px;
    }

    .table-custom .table-bordered,
    .table-custom .table-bordered>tbody>tr>th,
    .table-custom .table-bordered>tbody>tr>td {
        border: none;
    }

    .table-custom tbody tr {
        min-height: 20px;
    } */
</style>
<script type="text/javascript">


    var subjectsArray = [];

    window.onload = function () {
        loadSubjects();
    };

    function handleKeyPress(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            addSubject();
        }
    }

    function addSubject() {
        var inputElement = document.getElementById('subjectInput');
        var subject = inputElement.value.trim();

        if (subject !== '') {
            var listA = document.getElementById('listA');

            // Check if the subject is not already in the list
            if (!subjectExists(listA, subject)) {
                var option = document.createElement('option');
                option.value = subject;
                option.text = subject;
                listA.appendChild(option);

                // Add subject to the array
                subjectsArray.push(subject);

                // Store the updated subjects in local storage
                storeSubjects();
            }

            inputElement.value = ''; // Clear the input
        }
    }

    function subjectExists(selectElement, subject) {
        for (var i = 0; i < selectElement.options.length; i++) {
            if (selectElement.options[i].value === subject) {
                return true;
            }
        }
        return false;
    }

    function storeSubjects() {
        localStorage.setItem('subjects', JSON.stringify(subjectsArray));
    }

    function loadSubjects() {
        var storedSubjects = localStorage.getItem('subjects');
        if (storedSubjects) {
            subjectsArray = JSON.parse(storedSubjects);

            var listA = document.getElementById('listA');
            for (var i = 0; i < subjectsArray.length; i++) {
                var option = document.createElement('option');
                option.value = subjectsArray[i];
                option.text = subjectsArray[i];
                listA.appendChild(option);
            }
        }
    }

    function removeItem() {
        var listA = document.getElementById("listA");
        var selectedOption = listA.options[listA.selectedIndex];
        var selectedSubject = selectedOption.value;

        // Remove subject from subjectsArray
        var index = subjectsArray.indexOf(selectedSubject);
        if (index !== -1) {
            subjectsArray.splice(index, 1);

            // Update local storage
            storeSubjects();

            // Remove selected option from the list
            listA.removeChild(selectedOption);

            // Reduce listA size if item count is below threshold
            if (listA.options.length <= 12) {
                listA.size = 12;
            }
        }
    }








</script>
<div class="main-wrapper">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Subjects</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>
                                    Subjects</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="card" style="margin-top:2%;">

                <div class="form-group col-6">
                    <label class="col-form-label">Add Subject</label>
                    <input class=" form-control" type="text" id="subjectInput" onkeydown="handleKeyPress(event)">



                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-control col-form-label">Subjects</label>
                        <select class="form-control" id="listA" size="12"></select>
                        <div class="row">
                            <div class="form-group col-6">
                                <button class="form-control text-light  bg-danger" onclick="removeItem()">Remove
                                    from
                                    List
                                    A</button>

                            </div>
                            <div class="form-group col-6">

                                <select class="form-control text-center text-light bg-success" name=""
                                    id="add_subjects"></select>
                                <!-- <button class="form-control text-light bg-success" onclick="addItem()">Add to List
                                    B</button> -->

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <!-- <label class="form-control col-form-label">DEPARTMENT SUBJECTS</label> -->
                        <select class="form-control" name="" id="select_department"></select>


                        <select class="form-control" id="listB" size="12"></select>


                        <div class="row">
                            <div class="form-group col-6">
                                <button class="form-control text-light  bg-danger" id="remove_sub">Remove
                                    from
                                    List
                                    B</button>

                            </div>
                            <div class="form-group col-6">
                                <button class="form-control text-light  bg-danger" id="edit_sub">Edit
                                    from
                                    List
                                    B</button>

                                <!-- <button class="form-control text-light bg-success" onclick="addItem()">Add to List
                                    B</button> -->

                            </div>
                        </div>

                        <!-- <div class="table-responsive">
                            <table class="table table-custom">

                                <tbody id="bamsmsTable">

                                </tbody>
                            </table>
                        </div> -->


                    </div>
                </div>
                <?php include('modals/subjectsModal.php'); ?>



            </div>
        </div>
    </div>
</div>
<script src="js/subject_new.js"></script>
<?php include('layouts/footer.php'); ?>