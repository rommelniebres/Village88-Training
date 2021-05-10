<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
</head>
<body>
    <form action="/users/create" method="post">
        First Name: <input type="text" name="name"/>
        Last Name: <input type="text"/>
        Email Address: <input type="text"/>
        <input type="submit" value="Submit!">  
    </form>
</body>
</html>

