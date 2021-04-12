<?php
session_start();
    $result = "";
    $number = rand(1, 100);
    if ($_POST['guess'] < $number) {
        $result =  "<h1 class= 'wrong'>Too low!</h1>";
    }
    else if ($_POST['guess'] > $number) {
        $result =  "<h1 class= 'wrong'>Too high!</h1>";
    }
    else {
        $result =  "<div class= 'correct'><h1>".$number." was the number!</h1>
                    <a href='index.php' >Play Again</a></div>";
    }   
    $_SESSION['guess'] = $result;
    header('Location: index.php');
    
?>
