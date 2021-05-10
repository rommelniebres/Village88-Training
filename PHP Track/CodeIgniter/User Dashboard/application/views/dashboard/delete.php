<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav2') ?>
    <!-- This contains all the information for the user to be deleted, only if you are an admin you can access this -->
    <table class="table table-bordered">
        <h2 class="display-6">Delete this user?</h2>
        <h6 class="success"><?= $this->session->flashdata('status'); ?></h6>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
                <th scope="col">User_level</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?= $user['id'] ?></th>
                <td><a href=""><?= $user['first_name']. " " .$user['last_name']?></a></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['created_at'] ?></td>
<?php           if($user['user_level'] !== '9') { ?>
                    <td>Normal</td>
<?php           } 
                else { ?>
                    <td>Admin</td>
<?php           } ?>
            <tr>
        </tbody>
    </table>
    <a class="btn btn-danger mx-auto" id="return-dashboard" href="/admins/delete_user/<?=$user['id']?>">Delete</a>
</body>
</html>