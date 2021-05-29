<?php
    /* DOCU: This function gets the time lapsed from
    the difference of the creation and current time of
    a message or comment
    OWNER: ROMMEL
    */ 
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php $this->load->view('dashboard/nav2') ?>
    <!-- This load the owner information of the wall  -->
    <h2 class="display-6"><?= $first_name . " " . $last_name ?></h2>
    <div class="ml-4 mt-1">
        <p>Registered at:   <?= $created_at ?></p>
        <p>User ID:         #<?= $id ?></p>
        <p>Email address:   <?= $email ?></p>
        <p>Description:     <?= $description ?></p>
    </div>
    <div class="coment-bottom bg-white p-2 px-4">
        <h3 class="display-7">Leave a message for <?= $first_name ?></h3>
        <form class="d-flex flex-row add-comment-section mt-4 mb-4" action="/walls/add_message/<?= $id ?>" method="post">
            <textarea type="text" class="form-control mr-3 p-3" placeholder="Add message" style="resize: none" 
                name="message_input"></textarea>
            <input class="btn btn-primary m-4" role="button" type="submit" value="Post"></input>
        </form>
        <h6 class="error"><?= $this->session->flashdata('errors');?></h6>
        <h6 class="success"><?= $this->session->flashdata('success');?></h6>
<?php   /*  DOCU: This iterate to all the messages and comments that is posted on this wall
            This also display the textbox for messages and comments
            OWNER: ROMMEL
        */ 
        if(isset($messages['inbox'])){
            foreach($messages['inbox'] as $message)
            { ?>
            <div class="posted-section mt-2">
                <div class="d-flex flex-row align-items-center commented-user">
                    <h5 class="mr-2"><?= $message['message_sender_name']?></h5>
                    <span class="dot mb-1"></span><span class="mb-1 ml-2"><?= time_elapsed_string($message['message_date']);?></span>
                </div>
                <div class="message-text-sm "><p><?= $message['message_content']?></p></div>
                <div class="reply-section">
<?php               foreach($message['comments'] as $comments) { ?>
                    <div class="d-flex flex-row align-items-center commented-user" id="comments">
                        <h5 class="mr-2"><?= $comments['comment_sender_name']?></h5>
                        <span class="dot mb-1"></span><span class="mb-1 ml-2"><?= time_elapsed_string($comments['comment_date']);?></span>
                    </div>
                    <div class="message-text-sm " id="comments"><p><?= $comments['comment_content']?></p></div>
<?php               } ?>
                    <form class="d-flex flex-row add-comment-section mt-4 mb-4" 
                        action="/walls/add_comment/<?= $message['message_id'] ?>/ <?=$message['wall_id'] ?>" method="post">
                        <textarea type="text" id="comments-textarea" class="form-control mr-3 p-3" 
                            placeholder="Add comment" style="resize: none" name="comment_input"></textarea>
                        <input class="btn btn-primary m-4" role="button" type="submit" value="Post"></input>
                    </form>
                </div>
            </div>
<?php       }
        } ?>
    </div>
</body>
</html>