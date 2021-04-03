<?php
session_start();
$building = $_POST['building'];
$date = date("F j, Y, g:i a");
if (!isset($_SESSION['gold'])){
    $_SESSION['gold'] = 0;
}
if (!isset($_SESSION['activities'])){
    $_SESSION['activities']=array();
}
else {
    if ($building == 'farm') {
        $farm = rand(10, 20);
        $_SESSION['gold'] += $farm;
        $_SESSION['activities'][] = "You have entered a {$building} and earned {$farm} golds. ({$date})";
    }
    if ($building == 'cave') {
        $cave = rand(5, 10);
        $_SESSION['gold'] += $cave;
        $_SESSION['activities'][] = "You have entered a {$building} and earned {$cave} golds. ({$date})";
    }
    if ($building == 'house') {
        $house = rand(2, 5);
        $_SESSION['gold'] += $house;
        $_SESSION['activities'][] = "You have entered a {$building} and earned {$house} golds. ({$date})";
    }
    if ($building == 'casino') {
        $casino = rand(-50, 50);
        $_SESSION['gold'] += $casino;
        $_SESSION['activities'][] = "You have entered a {$building} and earned {$casino} golds. ({$date})";
    }
}
    header('Location: index.php')
?>