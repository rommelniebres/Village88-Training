<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav2') ?>
    <!-- This contains all the form for creating a new user only if you are an admin -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Add a new user</h3>
                <h6 class="error" ><?= $this->session->flashdata('status'); ?></h6>
                <form action="/admins/add_user_process" method="post">
                    <div class="form-label-group">
                        <input type="email" name="email" id="inputEmail" class="form-control" 
                            placeholder="Email" required>
                        <label for="inputEmail">Email:</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="first_name" id="inputFirstName" class="form-control" 
                            placeholder="First Name" required autofocus>
                        <label for="inputFirstName">First Name:</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="last_name" id="inputLastName" class="form-control" 
                            placeholder="Last Name" required autofocus>
                        <label for="inputLastName">Last Name:</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" name="password" id="inputPassword" class="form-control" 
                            placeholder="Password" required autofocus>
                        <label for="inputPassword">Password:</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" name="confirm_password" id="inputConfirmPassword" class="form-control" 
                            placeholder="Confirm Password" required autofocus>
                        <label for="inputConfirmPassword">Confirm Password:</label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" 
                        type="submit" value="Create"></input>
                    <a class="btn btn-info mx-auto" id="return-dashboard" href="/dashboards">Return to Dashboard</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>