<?php
$users['first_name'] = "Michael";
$users['last_name'] = "Choi";
function print_user($array) {
    echo"There are " . count($array) . " keys in this array: <br>";
    foreach ($array as $key => $value) {
        echo "{$key}<br>";
    }
    foreach ($array as $key => $value) {
        echo "The value in the key '{$key}' is '{$value}'. <br>";
    }
}
print_user($users)
?>