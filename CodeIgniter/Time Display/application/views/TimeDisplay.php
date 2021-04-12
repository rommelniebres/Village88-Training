<?php
    date_default_timezone_set("Asia/Hong_Kong");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date and time</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/time_display.css">
</head>
<body>
    <p>The Current time and date:</p>
    <h1><?= date("F j, Y g:i a") ?></h1>
</body>
</html>