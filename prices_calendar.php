<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Service Prices Calendar</title>
<link rel="stylesheet" href="calendar-style.css">
</head>
<body>

<div class="calendar-container">
    <h1>Service Prices Calendar</h1>
    <div class="month">
        <ul>
            <li class="prev">&#10094;</li>
            <li class="next">&#10095;</li>
            <li>January 2024<br></li>
        </ul>
    </div>

    <ul class="weekdays">
        <li>Mon</li>
        <li>Tue</li>
        <li>Wed</li>
        <li>Thu</li>
        <li>Fri</li>
        <li>Sat</li>
        <li>Sun</li>
    </ul>

    <ul class="days">
        <!-- PHP will generate the days and prices here -->
        <?php include 'generate_calendar.php'; ?>
    </ul>
</div>

<a href="edit_job_info.php" class="edit-job">Edit Job Info</a>
<a href="next_step.php" class="next-step">Next Step</a>

</body>
</html>
