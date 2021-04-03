<?php
    session_start();
    $errors = array();
    //EMAIL NAME
    if(isset($_POST['email']) && $_POST['email'] != NULL) {
        if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "This email is not valid";
        }
    }
    else {
        $errors[] = "Email should not be empty";
    }
    //FIRST NAME
    if(isset($_POST['first_name']) && $_POST['first_name'] != NULL) {
        if (preg_match('~[0-9]~', $_POST['first_name'])) {
            $errors[] = "First name can't have number(s).";
        }
    }
    else {
        $errors[] = "First name should not be empty.";
    }
    //LAST NAME
    if(isset($_POST['last_name']) && $_POST['last_name'] != NULL) {
        if (preg_match('~[0-9]~', $_POST['last_name'])) {
            $errors[] = "Last name can't have number(s).";
        }
    }
    else {
        $errors[] = "Last name should not be empty.";
    }
    //PASSWORD
    if(isset($_POST['password']) && $_POST['password'] != NULL) {
        if (strlen($_POST['password']) < 6) {
            $errors[] = "Password minimum length is 6 characters.";
        }
    }
    else {
        $errors[] = "Password should not be empty.";
    }

    if(isset($_POST['confirm_password']) && $_POST['confirm_password'] != NULL) {
        if ($_POST['confirm_password'] != $_POST['password']) {
            $errors[] = "Confirm Password is not the same as Password";
        }
    }
    else {
        $errors[] = "Confirm Password should not be empty.";
    }
    //BIRTHDAY
    $date = $_POST['birthday'];
    $date_parts = explode( '-', $date);
    if(isset($_POST['birthday']) && $_POST['birthday'] != NULL) {
        if(!checkdate( $date_parts[1], $date_parts[2], $date_parts[0] )) {
            $errors[] = "Invalid date format";
        }
    }
    else {
        $errors[] = "Birth Date should not be empty.";
    }
    //DISPLAY ERRORS
    if(! empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
    }
    echo "<h1>Thanks for submitting your information.</h1>";
?>