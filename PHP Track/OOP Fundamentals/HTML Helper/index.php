<?php
class HTML_Helper {
    function print_table($array) { ?>
        <table>
            <tr>
<?php       $headers = array_keys($array[0]);
            foreach($headers as $header) { ?>
                <td><?= strtoupper($header) ?></td>
<?php       } ?>
            </tr>
            <tr>
<?php       foreach($array as $key => $values) { 
                foreach($values as $value) { ?>
                    <td><?= $value ?></td>
<?php           } ?>
            </tr>
<?php       } ?>
        <table>
<?php }
    function print_select($name, $array) { ?>
        <select name="<?= $name ?>">
<?php   foreach($array as $value) { ?>
            <option value="<?= $value ?>"><?= $value ?></option>
<?php       } ?>
        </select>
<?php
    }
}
$users = array( 
    array('first_name' => 'Michael', 'last_name' => 'Choi'),
    array('first_name' => 'John', 'last_name' => 'Supsupin'),
    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
    array('first_name' => 'KB', 'last_name' => 'Tonel') 
);
$name = 'state';
$sample_array = array("CA", "WA", "UT", "TX", "AZ", "NY", "SA", "CH");
$print_table = new HTML_Helper();
$print_select = new HTML_Helper();
$print_table->print_table($users);
$print_select->print_select($name, $sample_array);
?>