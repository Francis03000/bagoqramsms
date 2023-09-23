<!DOCTYPE html>
<html>

<head>
    <title>Multiple Selection Example</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo '<h2>Selected Values:</h2>';
        echo '<ul>';
        if (isset($_POST['selections'])) {
            $selectedValues = $_POST['selections'];
            foreach ($selectedValues as $value) {
                echo "<li>$value</li>";
            }
        } else {
            echo '<li>No values selected.</li>';
        }
        echo '</ul>';
    }
    ?>

    <form method="post" action="">
        <label for="selections">Select multiple items:</label>
        <select name="selections[]" id="selections" multiple>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
            <option value="4">Option 4</option>
            <option value="5">Option 5</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>

</html>