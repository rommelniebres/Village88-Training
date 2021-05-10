<?php   
    header("Content-type: text/javascript"); 
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $product = $number1 * $number2;
?>
    $(document).ready(function(){
        alert('<?= $number1?> * <?=$number2?> = <?=$product?>');
    });

