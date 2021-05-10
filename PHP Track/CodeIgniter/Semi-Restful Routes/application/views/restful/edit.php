<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product 1 | Semi Restful Route Demo</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php
    $product = $this->session->userdata('product');
?>
    <div class="new">
        <span class="error"><?= $this->session->flashdata('error');?></span>
        <h1>Products <?= $product['id'] ?></h1>
        <form action="/products/update/<?= $product['id'] ?>" method="post">
            <label> Name: </label><input type="text" name="name" >
            <label> Description: </label> <input type="text" name="description" >
            <label> Price: </label><input type="text" name="price" >
            <input class="create-update" type="submit" value="Update" >
        </form>
        <a class="edit-show" href="/products/show/<?= $product['id'] ?>">show</a><a class="back" href="/products">Back</a>
    </div>
    
</body>
</html>