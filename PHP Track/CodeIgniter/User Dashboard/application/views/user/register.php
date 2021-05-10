<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav1') ?>
    <!-- This contain all the informations and form required to register on to the user dashboard -->
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Register</h3>
                            <h6><?= $this->session->flashdata('status'); ?></h6>
                            <form action="/users/register_validate" method="post">
                                <div class="form-label-group">
                                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
                                    <label for="inputEmail">Email:</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="first_name" id="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
                                    <label for="inputFirstName">First Name:</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="last_name"id="inputLastName" class="form-control" placeholder="Last Name" required autofocus>
                                    <label for="inputLastName">Last Name:</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
                                    <label for="inputPassword">Password:</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="password" name="confirm_password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required autofocus>
                                    <label for="inputConfirmPassword">Confirm Password:</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                                </div>
                                <input class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" value="Register"></input>
                                <div class="text-center">
                                    <a class="small" href="/users/sign_in_page">Already have an account? Click here to Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>