<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuotingDojo</title>
    <style>
    body {
        background-color: #222222;
        color: white;
        text-align: center;
    }
    form {
        background-color: #555555;
        display: inline-block;
        padding: 20px;
        margin-bottom: 20px;
    }
    form input {
        display: block;
        margin-bottom: 5px;
        padding: 10px;
        width: 300px;
    }
    input[type=submit] {
        background-color: #767676;
        color: white;
        margin: 10px 10px 15px 13px;
    }
    a {
        border: 2px solid gray;
        padding: 5px 100px 5px 100px;
        background-color: #767676;
        color: white;
        text-decoration: none;
    }
    .errors {
        border: 2px solid red;
        background-color: #555555;
        padding: 20px;
        min-height: 30px;
        margin: auto;
        width: 300px;
    }

    </style>
</head>
<body>
    <h2>Welcome to Quoting Dojo</h2>
    <form action="process.php" method="post">
        <h3>Your Name:</h3>
        <input type="text" name="name" placeholder="Name">
        <h3>Your Quote:</h3>
        <textarea name="quote" id="" cols="40" rows="10" placeholder="Quote"></textarea>
        <input type="submit" value="Add my quote!">
        <a href="main.php">Skip to quotes!</a>
    </form>
    <div class="errors">
    <?php
        if(isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "{$error}<br>";
            }
        }
    ?>
    </div>
</body>
</html>