<?php

$A = array(2,3,'hello');
function print_lists($array)
    {
        echo"<ul>";
        foreach ($array as $value)
        {
            echo '<li>' . $value . '</li>';
        }
        echo"</ul>";
    }
print_lists($A)

?>