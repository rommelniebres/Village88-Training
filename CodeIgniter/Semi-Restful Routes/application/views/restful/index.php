<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Semi Restful Route Demo</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1>Products</h1>
    <table id="products">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
<?php   
        $products = $this->session->userdata('products');
        foreach($products as $product)
        { ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td>$<?= $product['price'] ?></td>
            <td><a href="/products/show/<?= $product['id'] ?>">show</a> | <a href="/products/edit/<?= $product['id'] ?>">edit</a> | <a class="warning" href="/products/destroy/<?= $product['id'] ?>">remove</a></td>
        </tr>
<?php        }  ?>
    </table>
    <a class="back" href="/products/new">Add new Product</a>
</body>
</html>