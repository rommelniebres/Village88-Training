<?php
class Car
{
    public $price;
    public $speed;
    public $fuel;
    public $mileage;
    public $tax;
    public function __construct($price, $speed, $fuel, $mileage)
    {
        $this->price = $price;
        $this->speed = $speed;
        $this->fuel = $fuel;
        if($this->price > 10000) {
            $this->tax = 0.15;
        }
        else {
            $this->tax = 0.12;
        }
        $this->mileage = $mileage;
        $this->display_all();
    }
    public function display_all() {
        echo "Price: ".$this->price."<br>";
        echo "Speed: ".$this->speed."mph<br>";
        echo "Fuel: ".$this->fuel."<br>";
        echo "Mileage: ".$this->mileage."mpg<br>";
        echo "Tax: ".$this->tax."<br><br>";
        
    }
}
// ( price, speed, fuel, mileage)
$car1 = new Car(1000, 110, 'Full', 1000);
$car2 = new Car(2000, 120, 'Half Full', 2000);
$car3 = new Car(3000, 130, 'Not Full', 3000);
$car4 = new Car(4000, 140, 'Empty', 4000);
$car5 = new Car(50000, 150, 'Kind of Full', 5000);
?>