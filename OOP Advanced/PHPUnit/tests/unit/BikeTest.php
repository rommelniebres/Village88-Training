<?php

require _DIR_ . "/../app/Bike/index.php";

class BikeTest extends \PHPUnit\Framework\TestCase
{
    public function testThatWeCanGetTheBikePrice() 
    {
        $bikeTest = new \App\Bike\Bike('Bike1');

        $bikeTest->set_price(99);

        $this->assertEquals($bikeTest->get_price(), '99');
    }

    public function testThatWeCanGetTheBikeMaxSpeed() 
    {
        $bikeTest = new \App\Bike\Bike('Bike1');

        $bikeTest->set_max_speed(9999);

        $this->assertEquals($bikeTest->get_max_speed(), '9999');
    }
    
}
?>
