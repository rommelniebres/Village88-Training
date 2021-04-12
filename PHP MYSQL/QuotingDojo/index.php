<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuotingDojo</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Welcome to Quoting Dojo</h2>
    <form action="process.php" method="post">
        <h3>Your Name:</h3>
        <input type="text" name="name" placeholder="Name">
        <h3>Your Quote:</h3>
        <textarea name="quote" id="" cols="40" rows="10" placeholder="Quote"></textarea>
        <input type="submit" value="Add my quote!">
        <a href="main.php">Skip to quotes!</a>
    </form>
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
</body>
</html>