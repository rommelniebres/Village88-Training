<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <style type="text/css">
    * {
        font-family: sans-serif;
    }
    .error {
        color: red;
    }
    .success {
        color: green;
    }
    
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION['errors'])) {
            foreach($_SESSION['errors'] as $error) {
                echo "<p class='error'>{$error} </p>";
            }
            unset($_SESSION['errors']);
        }
        if(isset($_SESSION['success_message'])) {
            echo "<p class='success'>{$_SESSION['success_message']} </p>";
            unset($_SESSION['success_message']);
        }
    ?>
    <h2>Register</h2>
    <form action="process.php" method='post'>
        <input type="hidden" name='action' value='register'>
        First name: <input type="text" name='first_name'><br>
        Last name: <input type="text" name='last_name'><br>
        Email address: <input type="text" name='email'><br>
        Password: <input type="password" name='password'><br>
        Confirm Password: <input type="password" name='confirm_password'><br>
        <input type="submit" value='register'>
    </form>
    <h2>Login</h2>
    <form action="process.php" method='post'>
        <input type="hidden" name='action' value='login'>
        Email address: <input type="text" name='email'><br>
        Password: <input type="password" name='password'><br>
        <input type="submit" value='login'>
    </form>
</body>
</html>