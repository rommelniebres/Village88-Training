<?php
require_once 'new-connection.php';
session_start();
$errors = array();
$_SESSION['quote'] = $_POST['quote'];
$_SESSION['name'] = $_POST['name'];

if(isset($_POST['name']) && isset($_POST['quote']) && $_POST['name'] != NULL && $_POST['quote'] != NULL) {
    $query = "INSERT INTO quotes (name, quote, created_at)
    VALUES('{$_POST['name']}', '{$_POST['quote']}', NOW())";
    run_mysql_query($query);
    unset($_SESSION['errors']);
    header('Location: main.php');
}
else {
    $errors[] = "Name and Quote should not be empty";
}

//DISPLAY ERRORS
if(! empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: index.php');
}
?>