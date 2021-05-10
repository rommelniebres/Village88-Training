<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products 1 | Semi Restful Route Demo</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php
    $product = $this->session->userdata('product');
?>
    <div id="show">
        <h1>Products <?= $product['id'] ?></h1>
        <p>Name: <?= $product['name'] ?></p>
        <p>Description: <?= $product['description'] ?></p>
        <p>Price: $<?= $product['price'] ?></p>
        <p><a class="edit-show"href="/products/edit/<?= $product['id'] ?>">Edit</a><a class="back" href="/products">Back</a></p>
    </div>
    

    
</body>
</html>