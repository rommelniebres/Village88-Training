<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
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
            text-align: left;
        }
        a {
            color: white;
            background-color: #777777;
            padding: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Submitted Information</h1>
    <p>Name: <?= $_POST['name']; ?></p>
    <p>Dojo Location: <?= $_POST['dojo_location']; ?></p>
    <p>Favorite Language: <?= $_POST['favorite_language']; ?></p>
    <p>Comment: <?= $_POST['comment']; ?></p>
    <a href="index.php">Go back</a>
</body>
</html>
