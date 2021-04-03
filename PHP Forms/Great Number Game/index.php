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
    <style>
        h1, p, form {
            text-align:center;
        }
        a {
            background-color: white;
            border-radius: 4px;
            padding: 10px;
            text-decoration: none;
        }
        .wrong {
            background-color: red;
            border: 3px solid black;
            height: 50px;
            margin: auto;
            text-align: center;
            width: 200px;
        }
        .correct {
            background-color: #009E0F;
            border: 3px solid black;
            height: 200px;
            margin: auto;
            text-align: center;
            width: 200px;
        }
        
    </style>
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