<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Register</h1>
    <div class="errors">
    <?php
        if(isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "{$error}<br>";
            }
        }
    ?>
    </div>
    <form action="process.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <p>Birth Date</p>
        <input type="date" id="birthday" name="birthday">
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>