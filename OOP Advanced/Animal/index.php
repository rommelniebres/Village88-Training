<?php
/*  Animal - name and health
    methods: walk() run() displayHealth()
    new animal have 100 health
    walk - decrease health by 1
    run - decrease health by 5
    displayHealth - display animal name and health

    1st instance called 'animal'- walk 3 times, run 2 times, display
    2nd instance called 'Dog' - inherits everything animal have and does BUT
        default health is 150 and new method called 'pet'. pet - increase health by 5
        when invoke
        DOg - walk 3 times, run 2 times, pet 1 time and display
    3rd instance called 'Dragon' - inherits animal with addition of default health is 170
        method fly - decrease health by 10
        Dragon walk 3 times, run 2 times, fly 2 times, display
        when dragon is display echo 'this is a dragon!' then display the default information
    make sure fly and pet doesn't work on the 1st instance called animal
*/
class Animal {
    public $name;
    public $health;
    public function __construct($name)
    {
        $this->name = $name;
        $this->health = 100;
        return $this;
    }
    public function walk() {
        $this->health -= 1;
        return $this;
    }
    public function run() {
        $this->health -= 5;
        return $this;
    }
    public function displayHealth() {
        echo "Name: ".$this->name."<br>";
        echo "Health: ".$this->health."<br><br>";
        return $this;
    }
}

class Dog extends Animal {
    public function __construct($name)
    {   
        parent::__construct($name);
        $this->health = 150;
    }
    public function pet()
    {   
        $this->health += 5;
        return $this;
    }
}

class Dragon extends Animal {
    public function __construct($name)
    {   
        parent::__construct($name);
        $this->health = 170;
    }
    public function fly()
    {   
        $this->health -= 10;
        return $this;
    }
    public function displayHealth() {
        echo 'this is a dragon!<br>';
        parent::displayHealth();
    }
}

$animal = new Animal('animal');
$dog = new Dog('Dog');
$dragon = new Dragon('Dragon');

$animal->walk()->walk()->walk()->run()->run()->displayHealth();
$dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth();
$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth();
?>