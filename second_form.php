<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection settings
    require_once 'db_config.php'; // Replace with your actual database config file

    // Get the form data
    $item = $_POST['item'] ?? '';
    $pickup_location = $_POST['pickup_location'] ?? '';
    $dropoff_location = $_POST['dropoff_location'] ?? '';

    // Establish a new database connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an INSERT statement
    $stmt = $conn->prepare("INSERT INTO quotes (item, pickup_location, dropoff_location) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $item, $pickup_location, $dropoff_location);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New Record added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Move Details</title>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

<script>
$(document).ready(function() {
    // Initialize datepicker
    $("#move-date").datepicker();

    // Hide the date picker container initially
    $(".date-picker-container").hide();

    // Show the date picker container when the 'specific_date' radio is selected
    $("input[name='move_date']").change(function() {
        if ($("#specific_date").is(":checked")) {
            $(".date-picker-container").show();
        } else {
            $(".date-picker-container").hide();
        }
    });
});
</script>
<div class="container">
    <h1>Where are you moving from and to?</h1>

    <form action="items_form.php" method="post">
        <div class="form-section">
            <h2>Pickup Details</h2>
            <label for="pickup_location">Location</label>
            <input type="text" id="pickup_location" name="pickup_location" readonly value="<?php echo htmlspecialchars($_POST['pickup_location'] ?? ''); ?>">

            <label for="property_type">Property</label>
            <select name="property_type" id="property_type">
                <option value="">Select Property Type</option>
                <option value="house">House</option>
                <option value="apartment">Apartment</option>
                <!-- Add more property types here -->
            </select>
        </div>

        <div class="form-section">
            <h2>Delivery Details</h2>
            <label for="delivery_location">Location</label>
            <input type="text" id="delivery_location" name="delivery_location" readonly value="<?php echo htmlspecialchars($_POST['dropoff_location'] ?? ''); ?>">

            <!-- The property type dropdown would be similar to the pickup details -->
        </div>

        <div class="form-section">
    <h3>Move Date</h3>
    <label>
        <input type="radio" id="specific_date" name="move_date" value="specific_date"> Select a move date
    </label>
    <div class="date-picker-container">
        <input type="text" id="move-date" name="move_date" placeholder="Please select a date">
    </div>
    <label>
        <input type="radio" id="not_yet_decided" name="move_date" value="not_yet_decided"> I don't have a move date yet
    </label>
</div>

        <div class="form-group">
            <button type="submit">Next Step</button>
        </div>
    </form>
</div>
</body>
</html>
