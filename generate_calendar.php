<?php
// Assuming the month and year are set to the current month and year for simplicity
$year = date('Y');
$month = date('m');

// Get the first day of the month
$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

// Get the number of days in the month
$numDays = date('t', $firstDayOfMonth);

// Get the name of the month
$monthName = date('F', $firstDayOfMonth);

// Get the first day of the week for the first day of the month
$firstDayOfWeek = date('N', $firstDayOfMonth);

// Print blank days until the first day of the week
for ($i = 1; $i < $firstDayOfWeek; $i++) {
    echo '<li class="blank"></li>';
}

// Print the days of the month with prices
for ($day = 1; $day <= $numDays; $day++) {
    // For simplicity, assign a base price and then add a random amount to each day
    $basePrice = 374;
    $additionalPrice = rand(0, 50); // Random additional price
    $price = $basePrice + $additionalPrice;

    // Highlight the current day
    $todayClass = ($day == date('j') && $month == date('m') && $year == date('Y')) ? 'today' : '';
    $bestPriceClass = ($additionalPrice == 0) ? 'best-price' : ''; // Simplified best price logic

    echo "<li class='day $todayClass $bestPriceClass'>";
    echo "<span class='date'>$day</span>";
    echo "<span class='price'>£$price</span>";
    if ($bestPriceClass) {
        echo "<span class='best-price-tag'>Best Price!</span>";
    }
    echo "</li>";
}

// Print blank days until the end of the week
$lastDayOfMonth = mktime(0, 0, 0, $month, $numDays, $year);
$lastDayOfWeek = date('N', $lastDayOfMonth);
if ($lastDayOfWeek < 7) {
    for ($i = $lastDayOfWeek; $i < 7; $i++) {
        echo '<li class="blank"></li>';
    }
}
?>
