<?php

for ($i=0; $i<=100; $i++){
    $number = rand(50, 100); 
    $score = $number;
    if ($score < 70){
        echo "<h1>Your Score: $score/100</h1>";
        echo "<h2>Your grade is D.</h2>";
    }
    else if ($score >= 70 && $score < 80){
        echo "<h1>Your Score: $score/100</h1>";
        echo "<h2>Your grade is C.</h2>";
    }
    else if ($score >= 80 && $score < 90){
        echo "<h1>Your Score: $score/100</h1>";
        echo "<h2>Your grade is B.</h2>";
    }
    else if ($score >= 90 && $score <= 100){
        echo "<h1>Your Score: $score/100</h1>";
        echo "<h2>Your grade is A.</h2>";
    }
}



?>