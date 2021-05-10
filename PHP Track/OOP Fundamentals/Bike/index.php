<?php
class Bike
{
    public $name;
    public $price;
    public $max_speed;
    public $miles;
    public function __construct($instance)
    {
        $this->name = $instance;
        $this->miles = 0;
    }
    public function get_price() {
        return $this->price;
    }
    public function set_price($price) {
        $this->price = $price;
    }
    public function get_max_speed() {
        return $this->max_speed;
    }
    public function set_max_speed($max_speed) {
        $this->max_speed = $max_speed;
    }
    public function displayInfo() { //have this method display the bike's price, maximum speed, and the total miles driven.
        echo "Price: ".$this->price."<br>";
        echo "Max Speed: ".$this->max_speed."<br>";
        echo "Miles: ".$this->miles."<br><br>";
    }
    public function drive() { //have it display "Driving" on the screen and increase the total miles driven by 10.
        $this->miles += 10;
        echo "Driving: ".$this->miles." miles<br><br>";
    }
    public function reverse() { // have it display "Reversing" on the screen and decrease the total miles driven by 5.
        if($this->miles <= 0) {
            $this->miles = $this->miles;
        }
        else {
            $this->miles -= 5;
        }
        echo "Reversing: ".$this->miles." miles<br><br>";
    }
    
}
$obj1 = new Bike('Object 1');
$obj2 = new Bike('Object 2');
$obj3 = new Bike('Object 3');

$obj1->set_price(10);
$obj2->set_price(20);
$obj3->set_price(30);

$obj1->set_max_speed(110);
$obj2->set_max_speed(120);
$obj3->set_max_speed(130);

$obj1->drive();
$obj1->drive();
$obj1->drive();
$obj1->reverse();
$obj1->displayInfo();

$obj2->drive();
$obj2->drive();
$obj2->reverse();
$obj2->reverse();
$obj2->displayInfo();

$obj3->reverse();
$obj3->reverse();
$obj3->reverse();
$obj3->displayInfo();

// i put an if statement to prevent the miles from being negative integer.
?>