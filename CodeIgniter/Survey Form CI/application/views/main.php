<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <form action="/surveys/process_form" method="post">
        <p>Your Name:<input type='text' name='name'>
        <p>Dojo Location:
            <select name="dojo_location" id="dojo_location">
                <option value="mountain_view">Mountain View</option>
                <option value="seattle_wa">Seattle, WA</option>
                <option value="launion_philippines">La Union, Philippines</option>
            </select>
        </p>
        <p>Favorite Language:
            <select name="favorite_language" id="favorite_language">
                <option value="javascript">JavaScript</option>
                <option value="node">Node</option>
                <option value="python">Python</option>
                <option value="php">PHP</option>
            </select>
        </p>
        Comment(optional):<textarea name="comment" placeholder="Comment"></textarea>
        <input type='submit' value='Submit'>
    </form>
</body>
</html>