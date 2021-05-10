<?php
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
        return $this;
	}
}
class Player extends Deck{
    public $name;
    public $player;

    public function __construct($name) {
        parent::__construct();
        $this->name = $name;
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
?>