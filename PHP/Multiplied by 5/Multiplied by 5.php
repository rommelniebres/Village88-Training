<?php

$A = array(2,4,10,16);
function multiply($array, $factor)
    {
        foreach ($array as $key => $value)
        {
            $array[$key] = $value * $factor;
        }
        return $array;
    }
$B = multiply($A, 2);
var_dump($B);

?>