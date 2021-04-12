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
    <link rel="stylesheet" href="style2.css">
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