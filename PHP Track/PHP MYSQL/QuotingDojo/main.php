<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>QuotingDojo</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require 'new-connection.php';
    session_start();
?>
	<h2>Here are the awesome quotes!</h2>
	<textarea class="emails" cols="100" rows="20" readonly>
<?php   
	$quotes =  fetch_all("SELECT quote, name, created_at FROM quotes ORDER BY id DESC");
	foreach ($quotes as $quote) {
		for ($i=0; $i<90; $i++) {
			echo "_";
		}
		echo "\n";
		foreach ($quote as $key => $value)
			if ($key == 'quote') { 
				echo "'". $value . "'\n";
			}
			else if ($key == 'name') { 
				echo "          -". $value. " at ";
			}
			else {
				$date = date_create($value);
				echo date_format($date, 'g:ia F jS Y'). "\n";
			}
	}
?>
    </textarea>
</body>
</html>