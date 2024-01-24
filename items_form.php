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
    <form id="item-selection-form" action="submit.php" method="post" >
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
