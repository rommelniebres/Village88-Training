<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav2') ?>
    <table class="table table-bordered">
        <h2 class="display-6">Manage Users</h2>
        <h6 class="success"><?= $this->session->flashdata('status'); ?></h6>
        <a class="btn btn-primary" href="/admins/add_user" role="button">Add New</a>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
                <th scope="col">User_level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
<?php   
        /*  DOCU: Render all the users and enable to update or delete them
            since this view is for the admin 
            Owner: Rommel
        */
        foreach($users as $user) { ?>
            <tr>
                <th scope="row"><?= $user['id'] ?></th>
                <td><a href="/walls/show/<?= $user['id'] ?>"><?= $user['first_name']. " " .$user['last_name']?></a></td>
                <td><?= $user['email'] ?></td>
                <td><?= date("F j, Y", strtotime($user['created_at'])) ?></td>
<?php           if($user['user_level'] !== '9') { ?>
                    <td>Normal</td>
<?php           } 
                else { ?>
                    <td>Admin</td>
<?php           } ?>
                <td>
                    <a class="btn btn-info" href="/admins/edit_user/<?= $user['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="/admins/delete_page/<?= $user['id'] ?>">Remove</a>
                </td>
            <tr>
<?php   } ?>
        </tbody>
    </table>
</body>
</html>