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
        color: #051821;
    }
    .status {
        background-color: #1a4645;
        border-radius: 8px;
        color: white;
        text-align: center;
    }
    .error{
        color: white;
        padding: 5px;
    }
    .success {
        color: #f58800;
        padding: 5px;
    }
    .login-register {
        border-radius: 8px;
        display: inline-block;
        min-width: 200px;
        padding: 20px;
        vertical-align: top;
    }
    #register {
        background-color: #f58800;
    }
    #login {
        background-color: #f8bc24;
    }
    h2 {
        text-align: center;
    }
    input[type="text"], input[type="password"] {
        background-color: white;
        border-radius:5px;
        height:20px;
        width:200px;
    }
    input[type="submit"]{
        background-color: white;
        border-radius:5px;
        display: block;
        font-weight: bold;
        margin: auto;
        margin-top: 20px;
        padding: 5px;
    }
    
    
    </style>
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