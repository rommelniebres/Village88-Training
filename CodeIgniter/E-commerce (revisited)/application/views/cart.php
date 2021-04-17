<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<h1>Checkout</h1>
	<table id="items">
		<tr>
            <th>Qty</th>
			<th>Description</th>
			<th>Price</th>
		</tr>
<?php	$total = 0;
        foreach($cart as $item)
		{ 
            $total += (floatval($item['quantity'])*floatval($item['price']));    
        ?>
		<tr>
			<td><?= $item['quantity'] ?></td>
			<td><?= $item['description'] ?></td>
            <td>
				<form class="list" action="/products/delete/<?= $item['id'] ?>" method="post">
                    $<?= $item['price'] ?>
					<input id="delete" type="submit" value="Delete">
				</form>
            </td>
		</tr>
<?php	} ?>
	</table>
    <h2>Total: $<?= $total ?> </h2>

    <h3>Billing Info</h3>
    <p><?= $this->session->flashdata('status'); ?></p>
    <form class="billing" action="/products/billing" method="post">
        <input type="hidden" name="amount" value="<?= $total ?>">
        <label for="name">Name: </label><input type="text" name="name">
        <label for="address">Address: </label><input type="text" name="address">
        <label for="card">Card #: </label><input type="text" name="card">
        <input class="order" type="submit" value="Order">
    </form>
	<a id="back" href="/products">Go back</a>
</body>
</html>