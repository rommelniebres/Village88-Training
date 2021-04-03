<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Input</title>
    <style>
    body {
        background-color: #222222;
        color: white;
        text-align: center;
    }
    form {
        background-color: #555555;
        display: inline-block;
        padding: 20px;
        margin-top: 20px;
    }
    form input {
        display: block;
        margin-bottom: 5px;
        padding: 10px;
        width: 300px;
    }
    input[type=submit] {
        background-color: #767676;
        color: white;
        margin-left: 12px;
    }
    .errors {
        border: 2px solid red;
        background-color: #555555;
        padding: 20px;
        min-height: 30px;
        margin: auto;
        width: 300px;
    }
    </style>
</head>
<body>
    <h3>Input a valid Email</h3>
<?php
    if(isset($_SESSION['errors'])) {  ?>
    <div class="errors">
<?php   foreach ($_SESSION['errors'] as $error) {   ?>
            <?="{$error}<br>"; ?>
<?php   }  ?>
    </div>
<?php
    }
?>
    <form action="process.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>