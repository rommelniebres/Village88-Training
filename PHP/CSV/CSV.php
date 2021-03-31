<?php
ini_set('auto_detect_line_endings',TRUE);
$row = 1;
if (($handle = fopen("us-500.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<h2> Record $row: <br /></h2>\n";
        $row++;
        for ($i=0; $i < $num; $i++) {
            echo "<li>".$data[$i] . "</li>";
        }
    }
    fclose($handle);
}
ini_set('auto_detect_line_endings',FALSE);
?>