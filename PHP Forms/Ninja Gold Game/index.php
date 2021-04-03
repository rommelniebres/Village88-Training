<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Money!!!</title>
    <style>
        body {
        text-align: center;
        background-color: #222222;
        color: white;
        }
        form {
            padding: 20px;
            background-color: #555555;
            display: inline-block;
        }
        input[type=submit] {
            background-color: #767676;
            color: white;
        }
        textarea {
            width: 600px;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Your Gold:
<?php   if(isset($_SESSION['gold'])) { ?>
            <?=$_SESSION['gold'];?>
<?php   } ?>
    </h2>
    <form action="process.php" method="post">
        <input type="hidden" name="building" value="farm" />
        <h3>Farm</h3>
        <p>(earns 10-20 golds)</p>
        <input type="submit" value="Find Gold!"/>
    </form>
    <form action="process.php" method="post">
        <input type="hidden" name="building" value="cave" />
        <h3>Cave</h3>
        <p>earns (5-10 golds)</p>
        <input type="submit" value="Find Gold!"/>
    </form>
    <form action="process.php" method="post">
        <input type="hidden" name="building" value="house" />
        <h3>House</h3>
        <p>(earns 2-5 golds)</p>
        <input type="submit" value="Find Gold!"/>
    </form>
    <form action="process.php" method="post">
        <input type="hidden" name="building" value="casino" />
        <h3>Casino!</h3>
        <p>(earns/takes 0-50 golds)</p>
        <input type="submit" value="Find Gold!"/>
    </form>
    <h5>Activities:</h5>
    <textarea readonly rows="6" cols="50" id="text_bottom">
<?php 
    if(isset($_SESSION['activities'])) { 
        foreach($_SESSION['activities'] as $activity) {
            echo $activity. "\n";
        }
    }
?>
    </textarea> 
</body>
<script>
        var textarea = document.getElementById('text_bottom');
        textarea.scrollTop = textarea.scrollHeight;
    </script>
</html>
