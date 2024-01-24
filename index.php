<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quote Form</title>
<link rel="stylesheet" href="style.css">
<!-- Add these lines inside the <head> tag -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function getLocation(element) {
    var postcode = element.value;
    $.ajax({
        url: 'https://api.postcodes.io/postcodes/' + encodeURIComponent(postcode),
        method: 'GET',
        success: function(data) {
            if (data.status === 200) {
                // For example, updating the value of the input field with the location
                element.value = data.result.admin_district;
            } else {
                alert('Location not found for this postcode.');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('An error occurred: ' + textStatus);
        }
    });
}
</script>

</head>
<body>
<div class="container">
    <h1>We save you money moving anything, anywhere</h1>
    <p>The Manchester's favourite delivery, removals and transport marketplace</p>
    
    <form action="second_form.php" method="post">
        <div class="form-group">
            <select name="item" id="item">
                <option value="">What are you moving?</option>
                <option value="furniture">Furniture & Appliances</option>
                <option value="homeremove">Home Removals</option>
                <!-- Add more options here -->
            </select>
        </div>
        
        <div class="form-group">
            <input type="text" name="pickup_location" placeholder="Pick Up Location" onblur="getLocation(this)">
        </div>
        
        <div class="form-group">
            <input type="text" name="dropoff_location" placeholder="Drop Off Location" onblur="getLocation(this)">
        </div>
        
        <div class="form-group">
            <button type="submit">Get Instant Prices</button>
        </div>
    </form>
    
    <div class="quote-link">
        <a href="#">Already received a quote?</a>
    </div>
</div>
</body>
</html>
