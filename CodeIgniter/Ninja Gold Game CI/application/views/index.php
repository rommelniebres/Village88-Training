<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ninja Gold Game (CodeIgniter Version)</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<h1>Your Gold: <?= $this->session->userdata('gold'); ?></h1>
	<form action="/process_money" method="post">
		<h2>Farm</h2>
		<p>(earns 10-20 golds)</p>
		<input type="hidden" name="building" value="farm" />
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="/process_money" method="post">
		<h2>Cave</h2>
		<p>(earns 5-10 golds)</p>
		<input type="hidden" name="building" value="cave" />
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="/process_money" method="post">
		<h2>House</h2>
		<p>(earns 2-5 golds)</p>
		<input type="hidden" name="building" value="house" />
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="/process_money" method="post">
		<h2>Casino</h2>
		<p>(earns/takes 0-50 golds)</p>
		<input type="hidden" name="building" value="casino" />
		<input type="submit" value="Find Gold!"/>
	</form>
	<div contenteditable="true" readonly class="activities" id="text_bottom">
<?php
	$activities = $this->session->userdata('activities');
	
	if(isset($activities) && $activities !== NULL)
	{
		foreach($activities as $key => $activity)
		{ 
			if($activity['added_gold'] > 0 )
			{ ?>
				<p class="good">Earned <?= $activity['added_gold'] ?> golds from the <?= $activity['building'] ?>! <?= $activity['date'] ?></p>	
<?php		}
			else
			{ ?>
				<p class="bad">Entered a <?= $activity['building'] ?> and loss <?= $activity['added_gold'] ?> golds... Ouch.. <?= $activity['date'] ?></p>
<?php		}
		}
	}
?>
		
</div>
	
</body>
<script>
        var textarea = document.getElementById('text_bottom');
        textarea.scrollTop = textarea.scrollHeight;
</script>
</html>

