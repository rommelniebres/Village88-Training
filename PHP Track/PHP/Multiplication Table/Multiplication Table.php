<!DOCTYPE html>
<html>
<head>
<title>Multiplication Table</title>
<style>
    table{
        border: 2px solid black;
        padding: 10px;
    }
    td {
        border: 1px solid #222222;
        font-size: 25px;
        height: 50px;
        text-align: center;
        width: 50px;
    }
    .even, .first_row{
        background-color: #989898;
    }
    .multiplier, .first_row{
        font-weight: bold;
        font-size: 40px;
    }
</style>
</head>
<body>
<table>
<?php   for($i=1; $i<=1; $i++) { ?>
            <tr class = "even">
<?php       for($j=0; $j<=9; $j++) { ?>
                <td class = "first_row"><?= $i * $j ?></td>
<?php       } ?>
<?php   } ?>
<?php   for($i=1; $i<=9; $i++) { ?>
            <tr>
<?php       if($i%2==0) { ?>
            <tr class = "even">
<?php       } ?>
            <td class="multiplier"><?= $i?></td>
<?php       for($j=1; $j<=9; $j++) { ?>
                <td><?= $i * $j ?></td>
<?php       } ?>
        </tr>
<?php   } ?>
</table>
</body>
</html>