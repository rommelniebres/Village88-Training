<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leads and Clients</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<!-- Search manipulation starts here -->
	<form action="/leads/search/" method="post">
		Name: <input type="text" name="name">
		<input type="date" name="date_from">
		<input type="date" name="date_to">
		<input type="submit" value="Update">
		<div>
<?php	for($i=1; $i <= ceil($count/10); $i++) { 
			if($this->session->userdata('searching') == FALSE) { ?>
				<a href="/leads/page/<?= $i ?>"><?= $i ?></a>
<?php		} 
			else { ?>
				<a href="/leads/search/<?= $i ?>"><?= $i ?></a>
<?php		}
		}?>
		</div>
	</form>
	<!-- Search manipulation ends here -->
	<!-- Get the list based on the set date. If it is not set get all the date instead -->
	<section>
		<table>
			<tr>
				<th>Leads ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Registered Datetime</th>
				<th>Email</th>
			</tr>
<?php		foreach($leads as $lead)
			{ ?>
			<tr>
				<td><?= $lead['leads_id'] ?></td>
				<td><?= $lead['first_name'] ?></td>
				<td><?= $lead['last_name'] ?></td>
				<td><?= date("Y-m-d", strtotime($lead['registered_datetime'])) ?></td>
				<td><?= $lead['email'] ?></td>
			</tr>
<?php		} ?>
		</table>
	</section>
	<div id="chartContainer">
	</div>
</body>
</html>