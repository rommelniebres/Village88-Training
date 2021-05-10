<?php
function draw_stars($array) {
    foreach ($array as $value) {
        $data = gettype($value);
        if ($data == 'integer') {
            echo str_repeat("*", $value);
            echo "<br>";
        }
        else {
            $first_letter = strtolower(substr($value, 0, 1));
            echo str_repeat("$first_letter", strlen($value));
            echo "<br>";
        }
    }
}
$x = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
$output = draw_stars($x);

?>