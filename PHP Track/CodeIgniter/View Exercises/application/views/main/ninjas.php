<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ninjas</title>
	<style>
		img {
            border: 2px solid orange;
			display: block;
			margin: auto;
			margin-bottom: 20px;
			width: 500px;
		}
        h2 {
            text-align: center;
        }
	</style>

</head>
<body> 
<?php   $imageNumber = $this->session->userdata('times');
        for($i = 1; $i <= $imageNumber; $i++)
        {   $random = rand(1 ,5) ?>
            <h2><?= $i ?></h2>
            <img src="/assets/img/ninjas/<?= $random ?>.jpg">
<?php   }
?>
</body>
</html>