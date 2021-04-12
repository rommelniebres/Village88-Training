<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1 class="thanks">Thanks for submitting this form! You have submitted this form <?= $this->session->userdata('counter'); ?> times now.</h1>
    <h1>Submitted Information</h1>
    <p>Name: <?= $this->session->userdata('name'); ?></p>
    <p>Dojo Location: <?= $this->session->userdata('dojo_location'); ?></p>
    <p>Favorite Language: <?= $this->session->userdata('favorite_language'); ?></p>
    <p>Comment: <?= $this->session->userdata('comment'); ?></p>
    <a href="/">Go back</a>
</body>
</html>
