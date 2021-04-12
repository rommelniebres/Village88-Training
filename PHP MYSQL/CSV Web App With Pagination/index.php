<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Web App</title>
    <style>
        body {
            width: 100%;
        }
        form {
            background-color: #ebebd0;
            margin-bottom: 20px;
            padding: 20px;
            width: 100%;
        }
            form label {
                font-size: 30px;
            }
            form .btn{
                padding: 10px;
            }
        table {
            background-color: #ebebd0;
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }
            table th{
                background-color: #779455;
                color: white;
                padding: 20px 20px;
            }
            table tr{
                background-color: #779455;
                border: 2px solid gray;
            }
            table tr td{
                background-color: #ffffff;
                border: 2px solid gray;
                min-width: 100px;
                padding: 20px 20px;
                text-align: center;
            }
            a{
                background-color: #779455;
                border: 1px solid black;
                color: white;
                font-size: 20px;
                margin-left: 10px;
                padding:15px;
                text-decoration:none;
            }
    </style>
</head>
<body>
    <form action='' method='GET' enctype = "multipart/form-data" >
        <label>Upload Product CSV file Here</label>
        <input class="btn" type='file' name='filename'>
        <input class="btn" type='submit' name='submit' value='Upload-CSV'>
        <input type="hidden" name='page' value='1'>
    </form>
    <table>
        <tr>
<?php
    ini_set('auto_detect_line_endings',TRUE);
    $count = 0;
    $page = 1;
    if(isset($_GET['submit']) && !empty($_GET['filename'])) {
        $handle = fopen($_GET['filename'], "r");
        $headers = fgetcsv($handle, 1000, ",");
        foreach($headers as $header) { ?>
            <th><?= strtoupper($header) ?></th>
<?php   }  ?>
        </tr>
<?php
        $data = array();
        while (($headers2 = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $count++;
            $data[$page][] = $headers2;
            if($count % 50 == 0) {
                $page++;
            }
        }
        for ($i=1; $i<= count($data); $i++) { ?>
            <a href="http://localhost/?filename=<?=$_GET['filename']?>&submit=Upload-CSV&page=<?=$i?>"><?=$i?></a>
<?php   } ?>
        <tr>
<?php
        $pageNumber = (intval($_GET['page']));
        if(isset($_GET['page']) && intval($_GET['page']) > 0) {
            foreach($data[$pageNumber] as $key) {  
                foreach($key as $value) { ?>
                    <td><?= $value ?></td>
<?php           }?>
        </tr>
<?php       }
        }
        fclose($handle); 
    }  
    ?>  
    </table>
</body>
</html>