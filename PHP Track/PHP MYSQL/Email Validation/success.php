<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
<?php
    require 'new-connection.php';
    session_start();
    echo "<h3 >The email address you entered {$_SESSION['email']} is a VALID email address! Thank you!</h3>";
?>
    <h2>Email Addresses Entered: </h2>
    <textarea class="emails" cols="100" rows="10" readonly>
<?php   
        $emails =  fetch_all("SELECT id, email, created_at FROM emails");
        foreach ($emails as $email) {
            echo "\n";
            foreach ($email as $key => $value) {
                if ($key == 'created_at') {
                    $date = date_create($value);
                    echo date_format($date, 'g:ia F jS Y'). "\n";
                }
                else {
                    echo $value." ";
                }
            }
                
        }
?>
    </textarea>
    <h4>Input the ID of the email to be deleted</h4>
    <form action="success.php" method="post">
    <input type="text" name="deleteEmail" placeholder="Delete Email by ID">
    <input type="submit" value="SUBMIT">
    </form>
<?php
    if(isset($_POST['deleteEmail']) && $_POST['deleteEmail'] != NULL) {
        $idToDelete = $_POST['deleteEmail'];
        $query = "DELETE FROM emails WHERE id = $idToDelete";
        if ($query){
            echo "success";
        }
        run_mysql_query($query);
        header('Location: success.php');
        echo "ID " . $_POST['deleteEmail']. " deleted";
    }

?>
    
