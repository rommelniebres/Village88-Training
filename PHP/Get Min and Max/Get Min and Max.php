<?php

function get_max_and_min($array) {
    $max = $array[0];
    $min = $array[0];
    foreach ($array as $value){
        if ($value > $max){
            $max = $value;
        }
        elseif ($value < $min){
            $min = $value;
        }
    }
    return array('max' => $max, 'min' => $min);
}
$sample = array( 135, 2.4, 2.67, 1.23, 332, 2, 1.02); 
$output = get_max_and_min($sample); 
var_dump($output); 
//$output should be equal to array('max' => 332, 'min' => 1.02);

?>