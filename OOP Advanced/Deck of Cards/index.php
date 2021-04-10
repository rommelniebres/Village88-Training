<?php
// Still not finish the instruction said don't spend more than 5hrs
// I spent 7hrs still cant finish
class Deck {
    public $deck = array();
    public $cards = array("1","2","3","4","5","6","7","8","9","10","J","Q","K");
    public $suits = array("d","h","s","c");

    public function __construct() {
        $this->createDeck();
    }

	private function createDeck() {
		for ($i = 0; $i < 13; $i++) {
			for($j = 0; $j < 4; $j++) {
				array_push($this->deck,$this->suits[$j].$this->cards[$i]);
			}
		}
        $this->shuffle();
	}

    public function shuffle() {
        $keys = array_keys($this->deck);
        shuffle($keys);
        foreach($keys as $key) {
            $new[$key] = $this->deck[$key];
        }
        $this->deck = $new;
    }

    public function reset() {
        $this->deck = array();
        $this->__construct();
    }

    public function dealPlayer() {
		$this->player[] = array_pop($this->deck);
		$this->player[] = array_pop($this->deck);
	}
}
class Player extends Deck{
    public $name;
    public $player = array();

    public function __construct($name) {
        parent::__construct();
        $this->name = $name;
        $this->dealPlayer();
    }

    public function draw() {
        $this->player[] = array_pop($this->deck);
        return $this;
	}

    public function getHandValue() {
		$value = 0;
		foreach ($this->player as $values)
		{
			$value += $this->getCardValue($values);
		}
		return $value;
	}
	
	public function getCardValue($card) {
		$face = substr($card,-1);
		$suit = substr($card,0,1);
		$number_pattern = '/[1-9]/';
		$face_pattern = '/[JQK0]/';
		if (preg_match($number_pattern,$face))
		{
			return $face;
		}
		else if (preg_match($face_pattern,$face))
		{
			return 10;
		}
	}

}

$i = new Deck();
$player = new Player('Player 1');

$score = 0;
$_POST['hit'] = 0;
if(!isset($_POST['hit']) && isset($_POST['hit']) !== FALSE) {
}
else {
    $player->draw();
}
$total = $player->getHandValue();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deck of Cards</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .container {
            background-image: url('/img/bg.jpg');
            background-repeat: no-repeat;
            background-size: auto;
            color: white;
            min-height: 950px;
            text-align: center;
            width: 100%;
        }
        h1 {
            font-size: 50px;
            margin-bottom: 50px;
            padding-top: 20px;
        }
        button {
            background-color: #4bc3b5;
            color: black;
            font-size: 20px;
            font-weight: bold;
            height: 100px;
            margin: 20px 10px 20px 10px;
            width: 100px;
        }
        .dealer-hand img, .player-hand img{
            width: 100px;
        }
        .score {
            font-size: 40px;
            text-shadow: -1px -1px 0 #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Black Jack</h1>
        
        <div class="player-hand">
<?php
        foreach($player->player as $player){ ?>
            <img src="/img/<?=$player?>.png" alt="decks">
            
<?php   }
?>
        </div>
        <h2 class="score"><?= $total ?></h2>
        <h2>Player 1</h2>
        <form method="post" action="index.php">
            <input type="submit" name="hit" value="HIT">
        </form>
        <h2 class="score">Cash: <?=$score?></h2>
    </div>
</body>
</html>