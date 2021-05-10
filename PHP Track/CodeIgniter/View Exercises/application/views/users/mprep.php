<h1>User Name: <?= $name ?></h1>
<h2>User Age: <?= $age ?>, Location: <?= $location ?></h2>
<h3><?= count($hobbies) ?> Hobbies</h3>
<ul>
<?php   foreach($hobbies as $hobby)
        { ?>
            <li><?= $hobby ?></li>
<?php   } ?>
</ul>
