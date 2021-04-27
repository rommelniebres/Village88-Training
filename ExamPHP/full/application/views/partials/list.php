        <!-- DOCU: This count all the current displayed users OWNER: Rommel -->
	    <h1><?= count($users) ?> Users</h1>
        <tr>
			<th>Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Country</th>
		</tr>
		<!-- DOCU: Loop through each users form the variable user that the controller passed -->
<?php	foreach($users as $user){ ?>
		<tr>
			<td><?=$user['name']?></td>
			<td><?=$user['age']?></td>
			<td><?=$user['gender']?></td>
			<td><?=$user['country']?></td>
		</tr>
<?php   } ?>