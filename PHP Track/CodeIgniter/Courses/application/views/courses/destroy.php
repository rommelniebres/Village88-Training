<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destroy</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div id="destroy">
        <h1>Are you sure you want to delete the following course?</h1>
        <p>Name: <?= $title ?> </p>
        <p>Description: <?= $description ?> </p>
        <a href="/">No</a>
        <a id="warning"href="/courses/delete/<?= $id ?>">YES, I want to delete this</a>
    </div>
</body>
</html>