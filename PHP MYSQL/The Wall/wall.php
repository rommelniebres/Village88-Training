<?php
    session_start();
    require('new-connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wall</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body * {
            font-family: sans-serif;
            color: white;
        }
        #container {
            width: 100%;
            min-height: 1000px;
            background-color: #1a4645;
        }
        header {
            width: 100%;
            padding: 20px;
            background-color: #051821;
        }
        header h1, p, a{
            display: inline-block;
        }
        header h1 {
            width: 85%;
        }
        header a {
            margin-left: 20px;
        }
        .post-message {
            padding: 50px;
        }
        .post-message textarea {
            color: #051821;
            font-size: 20px;
            min-height: 200px;
            width: 100%;
        }
        input[type="submit"]{
            background-color: white;
            border-radius:5px;
            color: #051821;
            display: block;
            font-size: 20px;
            font-weight: bold;
            margin-left: 90%;
            margin-top: 10px;
            padding: 5px;
        }
        .error{
            background-color: #266867;
            border-radius:8px;
            color: #f58800;
            font-size:20px;
            margin-left: 45%;
            padding: 10px;
            text-align: center;
        }
        .success{
            background-color: #f58800;
            border-radius:8px;
            color: #266867;
            font-size:20px;
            margin-left: 45%;
            padding: 10px;
            text-align: center;
        }
        .show-message {
            padding: 0px 50px 50px 50px;
            color: white;
        }
        .show-message h3{
            border-top: 5px solid #f58800;
            display: block;
            padding: 20px 40px 0px 40px;
            margin-bottom: 20px;
        }
        .show-message p{
            display: block;
            font-size: 25px;
            margin-bottom: 20px;
            padding: 0px 40px 20px 60px;
        }
        .show-comment {
            padding: 0px 50px 50px 50px;
            color: white;
        }
        .show-comment textarea{
            color: #051821;
            font-size: 15px;
            height: 100px;
            padding: 20px;
            width: 100%;
        }
        .show-comment p{
            display: block;
            font-size: 20px;
            margin-bottom: 20px;
            padding: 0px 40px 20px 60px;
        }
        .show-comment h3{
            border-top: 5px solid #f8bc24;
            display: block;
            padding: 20px 40px 0px 40px;
            margin-bottom: 20px;
        }
        .delete-btn input[type="submit"]{
            background-color: red;
            border-radius:5px;
            color: white;
            display: block;
            font-size: 20px;
            font-weight: bold;
            margin-left: 90%;
            margin-top: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div id="container">
        <header>
            <h1>CodingDojo Wall</h1>
            <p>Welcome <?= $_SESSION['first_name']?></p>
            <a href='process.php'>LOG OFF!</a>
        </header>
        <section class="post-message">
            <div class="status">
            <?php
            if(isset($_SESSION['errors'])) {
                foreach($_SESSION['errors'] as $error) {
                    echo "<p class='error'>{$error} </p>";
                }
                unset($_SESSION['errors']);
            }
            if(isset($_SESSION['success_message'])) {
                echo "<p class='success'>{$_SESSION['success_message']} </p>";
                unset($_SESSION['success_message']);
            }
            ?>
            </div>
            <h2>Post a Message</h2>
            <form action="process.php" method="post">
                <input type="hidden" name='action' value='post-message'>
                <textarea name='message' placeholder="Type your message here..."></textarea>
                <input type="submit" value="Post a message">
            </form>
        </section>
        <section class="show-message">
<?php   foreach($_SESSION['messages'] as $message) { ?> 
            <h3><?= $message['first_name']?> <?= $message['last_name']?> - <?= $message['created_at'];?></h3>
            <p><?= $message['message'];?></p>
<?php       if($message['user_id'] == $_SESSION['user_id']) { ?>
                <form action="process.php" class="delete-btn" method="post">
                    <input type="hidden" name='action' value='delete-message'>
                    <input type="hidden" name='message_id' value='<?= $message['id']?>'>
                    <input type="submit" value="DELETE!">
                </form>
<?php       } ?>
            <section class="show-comment">
<?php           $comments = fetch_all("SELECT comments.*, users.first_name , users.last_name 
                    FROM comments 
                    LEFT JOIN users ON comments.user_id = users.id 
                    WHERE comments.message_id = {$message['id']} 
                    ORDER BY created_at ASC");
        ?>
<?php           foreach($comments as $comment) { ?> 
                <h4><?= $comment['first_name']?> <?= $comment['last_name']?> - <?= $comment['created_at'];?></h4>
                <p><?= $comment['comment'];?></p>
<?php           } ?>
                <h3>Post a Comment</h3>
                <form action="process.php" method="post">
                    <input type="hidden" name='action' value='post-comment'>
                    <input type="hidden" name='message_id' value='<?= $message['id']?>'>
                    <textarea name='comment' placeholder="Type your comment here..."></textarea>
                    <input type="submit" value="Post a comment">
                </form>
            </section>
<?php   } ?>
        </section>
</body>
</html>