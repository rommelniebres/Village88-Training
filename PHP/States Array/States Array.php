<?php

$states = array('CA', 'WA', 'VA', 'UT', 'AZ');

echo "<h1>Choose a states: </h1><br>";
echo "<p>For Loop</p>";
echo "<select>";
for ($i=0; $i<count($states); $i++){
    echo "<option>$states[$i]</option>";
};
echo "</select><br><br>";

echo "<p>For Each</p>";
echo "<select>";
foreach ($states as $state){
    echo "<option>$state</option>";
};
echo "</select><br><br>";

array_push($states, 'NJ', 'NY', 'DE');
echo "<p>For Each (Insert)</p>";
echo "<select>";
foreach ($states as $state){
    echo "<option>$state</option>";
};
echo "</select>";
?>