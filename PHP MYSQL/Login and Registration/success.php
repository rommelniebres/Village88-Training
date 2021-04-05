<?php
    session_start();
    echo "Hi {$_SESSION['first_name']}";
    echo "<a href='process.php'>LOG OFF!</a>";

?>