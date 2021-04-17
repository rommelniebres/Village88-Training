<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leads and Clients</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<!-- Canvas Graph starts here -->
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>  
	<script type="text/javascript">
		window.onload = function () {
		var options = {
			title: {
				text: "Customers and number of new leads"
			},
			animationEnabled: true,
			data: [{
				type: "pie",
				startAngle: 40,
				toolTipContent: "<b>{label}</b>: {y} leads",
				showInLegend: "true",
				legendText: "{label}",
				indexLabelFontSize: 16,
				indexLabel: "{label} - {y}",
				dataPoints: [
<?php			foreach($leads as $lead)
				{ ?>
					{ y: <?= $lead['number_of_leads']?>, label: "<?= $lead['client_name']?>"},
<?php			} ?>
				]
			}]
		};
		$("#chartContainer").CanvasJSChart(options);
	}
	</script>
	<!-- Canvas Graph ends here -->
</head>
<body>
	<header>
		<h1>Report Dashboard </h1>
	</header>
	<!-- Date manipulation starts here -->
	<h3><?= $this->session->flashdata('status'); ?></h3>
	<form action="/leads/set_date" method="post">
		<input type="date" name="date_from">
		<input type="date" name="date_to">
		<input type="submit" value="Update">
		<a href="/leads">Reset(Get all records)</a>
	</form>
	<!-- Date manipulation ends here -->
	<!-- Get the list based on the set date. If it is not set get all the date instead -->
	<section>
		<h2>List of all customers and # of leads</h2>
		<table>
			<tr>
				<th>Customer Name</th>
				<th>Number of Leads</th>
			</tr>
<?php		foreach($leads as $lead)
			{ ?>
			<tr>
				<td><?= $lead['client_name'] ?></td>
				<td><?= $lead['number_of_leads'] ?></td>
			</tr>
<?php		} ?>
		</table>
	</section>
	<div id="chartContainer">
	</div>
</body>
</html>