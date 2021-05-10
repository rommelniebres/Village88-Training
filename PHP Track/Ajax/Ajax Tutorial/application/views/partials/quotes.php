<?php
foreach($quotes as $quote)
{  ?>
    <div class="quote">
        <h1><?= $quote['author'] ?></h1>
        <p><?= $quote['quote'] ?></p>
    </div>
<?php
}  ?>
