<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection settings
    require_once 'db_config.php'; // config file

    // Get the form data
    $move_date = $_POST['move_date'] ?? '';
    // Check if the date is valid
    if (DateTime::createFromFormat('m/d/Y', $move_date) !== false) {
        // It's a valid date
        // Establish a new database connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $move_date = DateTime::createFromFormat('m/d/Y', $move_date)->format('Y-m-d');
        // Prepare an INSERT statement
        $stmt = $conn->prepare("INSERT INTO quotes (move_date) VALUES (?)");
        $stmt->bind_param("s", $move_date);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New Record added successfully: " . $move_date;
        } else {
            echo "Error: " . $stmt->error;
        }


        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid date format.". $move_date;;
        // Handle the error, perhaps set a default value or skip the insertion
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Item Selection</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<script>
function updateQuantity(element, change) {
    var input = element.parentElement.querySelector('input');
    var currentValue = parseInt(input.value, 10);
    currentValue += change;
    if (currentValue < 0) currentValue = 0; // Prevent negative values
    input.value = currentValue;
}

function goBack() {
    window.history.back(); // Go back to the previous page
}
</script>

<div class="container">
    <h1>What are you moving?</h1>
    
    <!-- Item Categories -->
    <div class="categories">
        <!-- Add category icons and names here -->
        <button type="button" class="category">Bedrooms</button>
        <button type="button" class="category">Living</button>
        <button type="button" class="category">Kitchen</button>
        <!-- Add other categories -->
    </div>

    <!-- Items List -->
    <form id="item-selection-form" action="prices_calendar.php" method="post" >
        <div class="items">
            <!-- Repeat this block for each item -->
            <div class="item">
                <span class="item-name">Double Bed & Mattress</span>
                <div class="quantity">
                    <button type="button" class="minus" onclick="updateQuantity(this, -1)">-</button>
                    <input type="text" name="double_bed" value="0" readonly>
                    <button type="button" class="plus" onclick="updateQuantity(this, 1)">+</button>
                </div>
            </div>
            <div class="item">
                
                <span class="item-name">Single Wardrobe</span>                     
                <div class="quantity">
                    <button type="button" class="minus" onclick="updateQuantity(this, -1)">-</button>
                    <input type="text" name="singlewardrobe" value="0" readonly>
                    <button type="button" class="plus" onclick="updateQuantity(this, 1)">+</button>
                </div>
            </div>
            <div class="item">
                <span class="item-name">Dressing Table</span>
                <div class="quantity">
                    <button type="button" class="minus" onclick="updateQuantity(this, -1)">-</button>
                    <input type="text" name="dressingtable" value="0" readonly>
                    <button type="button" class="plus" onclick="updateQuantity(this, 1)">+</button>
                </div>
            </div>
            <!-- Add more items -->
        </div>
        
        <div class="form-navigation">
            <button type="button" onclick="goBack()">Back</button>
            <button type="submit">Get Prices</button>
        </div>
    </form>
</div>
</body>
</html>
