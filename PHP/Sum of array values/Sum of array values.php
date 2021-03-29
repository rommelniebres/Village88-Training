<?php
$numbers = array(1, 2, 5, 10, 255, 3);
$sum = 0;
foreach ($numbers as $number) {
    $sum += $number;
}
echo $sum;
?>