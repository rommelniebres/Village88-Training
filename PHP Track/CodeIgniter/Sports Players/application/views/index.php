<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sports Player Lookup</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div id="container">
		<nav id="search_user">
			<form action="/sports/search" method="post">
				<h2>Search User</h2>
				<span><?= $this->session->flashdata('status');?></span>
				<p><input type="text" placeholder="name" name="name"></p>
				<p>Gender</p>
				<input type="checkbox" name="gender[]" value="female"><label for="female">Female</label>
				<input type="checkbox" name="gender[]" value="male"><label for="male">Male</label>
				<p>Sports</p>
				<input type="checkbox" name="sport[]" value="basketball"><label for="basketball">Basketball</label>
				<input type="checkbox" name="sport[]" value="volleyball"><label for="volleyball">Volleyball</label>
				<input type="checkbox" name="sport[]" value="baseball"><label for="baseball">Baseball</label>
				<input type="checkbox" name="sport[]" value="soccer"><label for="soccer">Soccer</label>
				<input type="checkbox" name="sport[]" value="football"><label for="football">Football</label>
				<input type="submit" value="Search">
			</form>
		</nav>
		<section id="pictures">
<?php	foreach($athletes as $athlete)
		{ ?>
			<li>
				<img src='<?= $athlete['picture'] ?>'>
				<p><?= $athlete['name'] ?></p>
			</li>
<?php	} ?>
		</section>
	</div>
</body>
</html>