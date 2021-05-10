<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- DOCU: shows the number of users currently shown -->
	<title>All Users - showing <?= $this->session->userdata('limit') ?></title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<h1>All Users</h1>
	<table id="users">
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Country</th>
		</tr>
		<!-- DOCU: Loop through each users form the variable user that the controller passed -->
<?php	foreach($users as $user){ ?>
		<tr>
			<td><?=$user['name']?></td>
			<td><?=$user['age']?></td>
			<td><?=$user['gender']?></td>
			<td><?=$user['country']?></td>
		</tr>
<?php   } ?>
	</table>
	<a id="show-more"href="/users/<?= intval($this->session->userdata('limit')) + 5; ?>">SHOW MORE</a>
</body>
</html>