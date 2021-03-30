<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkerboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<table>
<?php   for($i=1; $i<=8; $i++) { ?>
        <tr>
<?php       for($j=1; $j<=8; $j++) { ?>
<?php           if($j%2==0 && $i%2!= 0) { ?>
                    <td class = "even"></td>
<?php           } 
                else if($j%2!=0 && $i%2!= 0) { ?>
                    <td class = "odd"></td>
<?php           } 
                else if($j%2==0 && $i%2== 0) { ?>
                    <td class = "odd"></td>
<?php           } 
                else if($j%2!=0 && $i%2== 0) { ?>
                    <td class = "even"></td>
<?php           } ?>
<?php       } ?>
        </tr>
<?php   } ?>
</table>
</body>
</html>
