<?php
ini_set('auto_detect_line_endings',TRUE);
$count = 1;
if (($handle = fopen("us-500.csv", "r")) !== FALSE) {
    $data2 = fgetcsv($handle, 1000, ",");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<h2> Record $count: <br /></h2>\n";
        $count++;
        for ($i=0; $i < $num; $i++) {
            echo "<li>". $data2[$i] . " : " . $data[$i] . "</li>";
        }
    }
    fclose($handle);
}
ini_set('auto_detect_line_endings',FALSE);
?>