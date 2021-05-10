<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav2') ?>
    <!-- This contain all the informations and form for editing the profile of the current user -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-12 mx-auto">
                <form class="form-label-group" action="/dashboards/edit_profile_info/<?= $id ?>" method="post">
                    <h2>Edit Profile</h2>
                    <h6><?= $this->session->flashdata('status'); ?></h6>
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>
                        <label for="inputEmail">Email: <?= $email ?></label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First Name" required autofocus>
                        <label for="inputFirstName">First Name: <?= $first_name ?></label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Last Name" required autofocus>
                        <label for="inputLastName">Last Name: <?= $last_name ?></label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mx-auto mt-3 p-2" type="submit" value="Save"></input>
                </form>
                <form class="form-label-group" action="/dashboards/edit_profile_password/<?= $id ?>" method="post">
                    <h4>Change Password</h4>
                    <h6><?= $this->session->flashdata('status_password'); ?></h6>
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required autofocus>
                        <label for="inputPassword">Password:</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" id="inputConfirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required autofocus>
                        <label for="inputConfirmPassword">Confirm Password:</label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mx-auto mb-2 p-2" type="submit" value="Update Password"></input>
                </form>
                <form class="form-group" action="/dashboards/edit_profile_description/<?= $id ?>" method="post">
                    <div class="form-group">
                        <h4>Change Description</h4>
                        <h6><?= $this->session->flashdata('status_description'); ?></h6>
                        <input type="text" class="form-control" id="input-description" name="description"></textarea>
                        <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mx-auto mb-2 p-2" type="submit" value="Save"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>