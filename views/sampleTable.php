<!DOCTYPE html>
<html>

<head>
    <title>Hello World</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <form method="post">
            <div class="form-group">
                <p>Select days of the week:</p>
                <?php
                // Define an associative array to map values to day names
                $days = [
                    0 => 'Monday',
                    1 => 'Tuesday',
                    2 => 'Wednesday',
                    3 => 'Thursday',
                    4 => 'Friday',
                ];

                // Generate checkboxes for days
                foreach ($days as $value => $day) {
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='checkbox' name='days[]' value='$value' id='checkbox$value'>";
                    echo "<label class='form-check-label' for='checkbox$value'>$day</label>";
                    echo "</div>";
                }
                ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Say Hello</button>
        </form>

        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["days"])) {
            // Get the selected days from the form as numbers
            $selectedDays = $_POST["days"];
            foreach ($selectedDays as $value) {
                echo "<p class='alert alert-success mt-2'>Hello, World $value</p>";
            }


        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["days"])) {
            // Get the selected days from the form
            $selectedDays = $_POST["days"];
            if (empty($selectedDays)) {
                echo "<p class='alert alert-danger mt-2'>Please select at least one day.</p>";
            } else {
                echo "<p class='alert alert-success mt-2'>Selected days: ";
                foreach ($selectedDays as $value) {
                    echo $days[$value] . ", ";
                }
                echo "</p>";
            }
        }
        ?>
    </div>

    <!-- Add the Bootstrap JavaScript and jQuery scripts (required for some Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>