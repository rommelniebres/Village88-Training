<?php

$coin = 0;
$head = 0;
$tail = 0;
echo "<h1>Starting the program</h1><br>";
for ($i=1; $i<= 5000; $i++){
    $coin = (rand(0,1));
    if ($coin == 0){
        $head ++;
        echo "Attempt #$i: Throwing a coin... It's a head! ... Got $head head(s) so far and $tail tail(s) so far<br>";
    }
    else {
        $tail ++;
        echo "Attempt #$i: Throwing a coin... It's a tail! ... Got $head head(s) so far and $tail tail(s) so far<br>";
    }
};
echo "<h1>Ending the program - thank you!</h1><br>";
?>