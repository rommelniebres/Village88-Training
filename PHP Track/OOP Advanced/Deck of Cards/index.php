<?php
    require 'deck.php';
    require 'process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deck of Cards</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Black Jack</h1>
        
        <div class="player-hand">
<?php
        foreach($_SESSION['player'] as $player){ ?>
            <img src="/img/<?=$player?>.png" alt="decks">
<?php   }
?>
        </div>
        <h2 class="score"><?= $_SESSION['total'] ?></h2>
        <h2>Player 1</h2>
        <form method="post" action="index.php">
            <input type="hidden" name="action" value="hit" />
            <input type="submit" value="SHUFFLE!">
        </form>
        <h2 class="score">Cash: <?=$score?></h2>
    </div>
</body>
</html>