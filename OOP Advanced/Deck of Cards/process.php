<?php
	session_start();
	$player = new Player('Player 1');
	$score = 0;
	if(isset($_POST['action']) && $_POST['action'] == 'hit'){
		$player->dealPlayer();
	}
	$_SESSION['player'] = $player->dealPlayer()->dealPlayer();
	$_SESSION['player'] = $player->player;
	$_SESSION['total'] = $player->getHandValue();
?>