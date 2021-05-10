<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav2') ?>
    <!-- This contains all the form for editing the user only if you are an admin -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-12 mx-auto">
                <h3 class="login-heading mb-4" id="edit_user_name">Edit user <?= $id ?></h3>
                <form class="form-label-group" action="/admins/edit_user_process/<?= $id ?>" method="post">
                    <h2>Edit Information</h2>
                    <h6 class="error"><?= $this->session->flashdata('status'); ?></h6>
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" name="email" class="form-control" 
                            placeholder="Email" required>
                        <label for="inputEmail">Email: <?= $email ?></label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputFirstName" name="first_name" class="form-control" 
                            placeholder="First Name" required autofocus>
                        <label for="inputFirstName">First Name: <?= $first_name ?></label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputLastName" name="last_name" class="form-control" 
                            placeholder="Last Name" required autofocus>
                        <label for="inputLastName">Last Name: <?= $last_name ?></label>
                    </div>
                    <select class="browser-default custom-select" name="user_level">
                        <option value="normal">Normal</option>
                        <option value="admin">Admin</option>
                    </select>
                    <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mx-auto mt-3 p-2" 
                        type="submit" value="Save"></input>
                </form>
                <form class="form-label-group" action="/admins/edit_password_process/<?= $id ?>" method="post">
                    <h2>Change Password</h2>
                    <h6><?= $this->session->flashdata('status_password'); ?></h6>
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name="password" class="form-control" 
                            placeholder="Password" required autofocus>
                        <label for="inputPassword">Password:</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" id="inputConfirmPassword" name="confirm_password" class="form-control" 
                            placeholder="Confirm Password" required autofocus>
                        <label for="inputConfirmPassword">Confirm Password:</label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mx-auto mb-2 p-2" 
                        type="submit" value="Update Password"></input>
                    <a class="btn btn-info mx-auto" id="return-dashboard" href="/dashboards">Return to Dashboard</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>