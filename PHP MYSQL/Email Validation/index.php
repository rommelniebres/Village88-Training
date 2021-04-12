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
    <link rel="stylesheet" href="style.css">

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