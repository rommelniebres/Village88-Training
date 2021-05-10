<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav1') ?>
    <div class="jumbotron">
        <h1 class="display-4">Welcome to the Test</h1>
        <p class="lead">
            We're going to build cool application using a MVC framework! 
            This application was built with the village88 folks!</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="users/sign_in_page" role="button">Start</a>
        </p>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <h3>Managers Users</h3>
            <p>Using this application, you'll learn how to add,
                remove, and edit users for the application
            </p>
        </div>
        <div class="col-sm-4">
            <h3>Leave messages</h3>
            <p>Users will be able to leave a message to another
                user using this application
            </p>
        </div>
        <div class="col-sm-4">
            <h3>Edit user Information</h3>
            <p>Admins will be able to edit another user's information 
                (email address, first name, last name, etc).
            </p>
        </div>
    </div>
</body>
</html>