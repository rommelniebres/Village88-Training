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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="status">
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
    </div>
    <div id="register" class="login-register" >
        <h2>Register</h2>
        <form action="process.php" id="register" method='post'>
            <input type="hidden" name='action' value='register'>
            <label>First name: </label><input type="text" name='first_name'><br>
            <label>Last name: </label><input type="text" name='last_name'><br>
            <label>Email address: </label><input type="text" name='email'><br>
            <label>Password: </label><input type="password" name='password'><br>
            <label>Confirm Password: </label><input type="password" name='confirm_password'><br>
            <input type="submit" value='REGISTER'>
        </form>
    </div>
    <div id="login" class="login-register">
        <h2>Login</h2>
        <form action="process.php" id="login" method='post'>
            <input type="hidden" name='action' value='login'>
            Email address: <input type="text" name='email'><br>
            Password: <input type="password" name='password'><br>
            <input type="submit" value='LOGIN'>
        </form>
    </div>
</body>
</html>