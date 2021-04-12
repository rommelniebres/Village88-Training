<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Great Number Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to the Great Number Game!</h1>
    <p>I am thinking of a number between 1 and 100</p>
    <p>take a guess!</p>
    <?php
        if(isset($_SESSION['guess'])){ ?>
        <?=$_SESSION['guess'];?>
<?php   } ?>
    <form action='process.php' method= 'post'>
        <p><input type="text" name= "guess"></p>
        <input type="submit" value= "Submit">
    </form>
</body>
</html>
<?php
session_destroy();
?>