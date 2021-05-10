<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Users</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<!-- DOCU: This count all the current displayed users OWNER: Rommel -->
	<h1><?= count($users) ?> Users</h1>
	<!-- DOCU: This is the form for gender and country search OWNER: Rommel -->
	<form action="/users/search" method="post">
		<input type="checkbox" name="female" value="F"><label for="female">Female</label>
		<input type="checkbox" name="male" value="M"><label for="male">Male</label>
		<select name="country">
			<option value="all" name="country"><label for="all">All countries</label></option>
			<option value="india" name="country"><label for="india">India</label></option>
			<option value="korea" name="country"><label for="korea">Korea</label></option>
			<option value="philippines" name="country"><label for="philippines">Philippines</label></option>
			<option value="u.s.a." name="country"><label for="usa">U.S.A.</label></option>
		</select>
		<input type="submit" value="Update">
	</form>
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
</body>
</html>