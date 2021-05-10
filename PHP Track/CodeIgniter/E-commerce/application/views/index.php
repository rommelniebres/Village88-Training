<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Products Listing</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<h1>Products</h1>
	<a id="cart"href="/products/cart">Your Cart (<?= $count ?>)</a>
	<p><?= $this->session->flashdata('status'); ?></p>
	<table id="items">
		<tr>
			<th>Description</th>
			<th>Price</th>
			<th>Qty</th>
		</tr>
<?php	foreach($products as $product)
		{ ?>
		<tr>
			<td><?= $product['description'] ?></td>
			<td><?= $product['price'] ?></td>
			<td>
				<form class="list" action="/products/add/<?= $product['id'] ?>" method="post">
					<input type="number" min="0" name="quantity">
					<input type="submit" value="Buy">
				</form>
			</td>
		</tr>
<?php	} ?>
	</table>
</body>
</html>