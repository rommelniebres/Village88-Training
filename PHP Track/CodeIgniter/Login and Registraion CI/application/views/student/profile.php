<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1 id="header">Welcome <?= $this->session->userdata('student_name') ?></h1>
    <a href="/students/logout">Log Off</a>
    <div id="profile">
        <p>First Name: <?= $this->session->userdata('student_first_name') ?></p>
        <p>Last Name: <?= $this->session->userdata('student_last_name') ?></p>
        <p>Email Address: <?= $this->session->userdata('student_email') ?></p>
    </div>
</body>
</html>