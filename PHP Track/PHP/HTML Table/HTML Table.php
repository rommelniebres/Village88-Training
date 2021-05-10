<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<table>
<?php
$users = array( 
    array('first_name' => 'Michael', 'last_name' => 'Choi'),
    array('first_name' => 'John', 'last_name' => 'Supsupin'),
    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
    array('first_name' => 'KB', 'last_name' => 'Tonel'),
    array('first_name' => 'Jay', 'last_name' => 'Max'),
    array('first_name' => 'Harry', 'last_name' => 'Potter'),
    array('first_name' => 'Rome', 'last_name' => 'Nice'),
    array('first_name' => 'Dilan', 'last_name' => 'Shaver'),
    array('first_name' => 'Mahn', 'last_name' => 'dalika'),
    array('first_name' => 'Sans', 'last_name' => 'Serif'),
    array('first_name' => 'Harvey', 'last_name' => 'Wow'),
    array('first_name' => 'Mike', 'last_name' => 'Wall'),
    array('first_name' => 'James', 'last_name' => 'Carter'),
    array('first_name' => 'Doe', 'last_name' => 'Doe'),
    array('first_name' => 'Harvey', 'last_name' => 'Wow'),
    array('first_name' => 'Mike', 'last_name' => 'Wall'),
    array('first_name' => 'James', 'last_name' => 'Carter')
);
$categories = array('User#', 'First Name', 'Last Name', 'Full Name', 'Full Name in upper case', 'Length of full name');
?>
        <tr class = "category">
<?php   foreach($categories as $category) { ?>
            <td class = "first_row"><?= $category ?></td>
<?php   } ?>
<?php   foreach($users as $key => $user) { ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['first_name']. " " .$user['last_name']?></td>
            <td><?= strtoupper($user['first_name']). " " .strtoupper($user['last_name'])?></td>
            <td><?= strlen($user['first_name']) +  strlen($user['last_name'])?></td>
<?php   } ?>
    </tr>
</table>
</body>
</html>