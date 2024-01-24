<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    
    // Process the form data, like saving to a database or sending an email
    // For now, we'll just echo the values

    // Initialize an array to hold the item quantities
    $item_quantities = [];

    // Loop through the expected item fields
    $expected_items = ['double_bed', 'king_bed', 'single_wardrobe', 'chest_drawers']; // Add all the item names here
    foreach ($expected_items as $item) {
        // Check if the item quantity was sent in the POST request
        if (isset($_POST[$item])) {
            // Cast the quantity to an integer and store it in the array
            $item_quantities[$item] = (int) $_POST[$item];
        } else {
            // If the item was not in the POST request, default its quantity to 0
            $item_quantities[$item] = 0;
        }
    }

    // At this point, $item_quantities will contain all the quantities for each item
    // You can now process these as needed, such as saving to a database or using them to calculate a quote

    // Redirect or inform the user of successful submission

    echo "You are moving: " . htmlspecialchars($item) . "<br>";
    echo "Pickup location: " . htmlspecialchars($pickup_location) . "<br>";
    echo "Dropoff location: " . htmlspecialchars($dropoff_location) . "<br>";
    

    //header("Location: items_form.php"); // Redirect to the final step or confirmation page
   // exit;
}
?>
