<?php
require_once 'new-connection.php';
session_start();
$errors = array();
$_SESSION['email'] = $_POST['email'];
//EMAIL
    if(isset($_POST['email']) && $_POST['email'] != NULL) {
        if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "This email is not valid";
        }
        else {
            $query = "INSERT INTO emails (email, created_at)
            VALUES('{$_POST['email']}', NOW())";
            run_mysql_query($query);
            unset($_SESSION['errors']);
            header('Location: success.php');
        }
    }
    else {
        $errors[] = "Email should not be empty";
    }
    //DISPLAY ERRORS
    if(! empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
    }
?>