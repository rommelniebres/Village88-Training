<?php

require _DIR_ . "/../app/Animal/index.php";

class AnimalTest extends \PHPUnit\Framework\TestCase
{
    public function testThatWeCanDisplayHealth() 
    {
        $animalTest = new \App\Animal\Animal('Monkey');

        $animalTest->displayHealth();

        $this->assertEquals($animalTest->displayHealth(), '');
    }

    public function testThatWeCanCreateDog() 
    {
        $animalTestDog = new \App\Animal\Dog('Doge');

        $animalTestDog->displayHealth();

        $this->assertEquals($animalTestDog->displayHealth(), '');
    }

}
?>
