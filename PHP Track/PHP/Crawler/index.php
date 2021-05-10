<?php
    /*---------YAHOO------------*/
    include "simple_html_dom.php";
    $ch = curl_init();
    $search_string = "coding+ninjas";
    $url = "https://ph.search.yahoo.com/search?p=$search_string";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    curl_close($ch);

    $html = new simple_html_dom();
    $html->load($response);
    $i = 0;
    foreach($html->find('span .fz-ms, .fw-m, .fc-12th, .wr-bw') as $link) {
        if ($i >= 10) break;
        echo "<li>". $link->plaintext. "</li>";
        $i++;
    }
?>


<?php
    /*-------------BING-------------
    include "simple_html_dom.php";
    $ch = curl_init();
    $search_string = "coding+ninjas";
    $url = "https://www.bing.com/search?q=$search_string&form=QBLH&sp=-1&ghc=1&pq=$search_string";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $html = new simple_html_dom();
    $html->load($response);
    $i = 0;
    foreach($html->find('cite') as $link) {
        if ($i >= 10) break;
        echo "<li>". $link->plaintext. "</li>";
        $i++;
    }
    -------------BING-------------*/
?>