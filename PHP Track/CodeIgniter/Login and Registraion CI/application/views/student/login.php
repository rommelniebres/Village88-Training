<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1>Login</h1>
    <?= $this->session->flashdata("login_error") ?>
    
    <form action="/students/login" method="post">
        <label>Email Address: </label><input type="text" name="email" >
        <label>Password: </label><input type="password" name="password" >
        <input type="submit" value="Login" >
    </form>
    <h1>Register</h1>
    <?= $this->session->flashdata('errors') ?>
    <?= $this->session->flashdata("register_success") ?>
    <form action="/students/register" method="post">
        <label>First Name: </label><input type="text" name="first_name" >
        <label>Last Name: </label><input type="text" name="last_name" >
        <label>Email Address: </label><input type="text" name="email" >
        <label>Password: </label><input type="password" name="password" >
        <label>Confirm Password: </label><input type="password" name="confirm_password" >
        <input type="submit" value="Register" >
    </form>
</body>
</html>