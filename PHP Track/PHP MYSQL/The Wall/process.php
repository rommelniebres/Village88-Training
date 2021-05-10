<?php
    session_start();
    require('new-connection.php');

    if(isset($_POST['action']) && $_POST['action'] == 'register') {
        register_user($_POST);
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'login') {
        login_user($_POST);
        show_message($_POST);
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'post-message') {
        post_message($_POST);
        die();
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'post-comment') {
        post_comment($_POST);
        die();
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'delete-message') {
        delete($_POST);
        die();
    }
    else {
        session_destroy();
        header('location: index.php');
        die();
    }

    function register_user($post) {
        ////-----------------START OF VALIDATION------------------////
        $_SESSION['errors'] = array();
        if(empty($post['first_name'])) {
            $_SESSION['errors'][] = "First name can't be blank!";
        }
        if(empty($post['last_name'])) {
            $_SESSION['errors'][] = "Last name can't be blank!";
        }
        if(empty($post['password'])) {
            $_SESSION['errors'][] = "Password field is required!";
        }
        if($post['password'] !== $post['confirm_password']) {
            $_SESSION['errors'][] = "Password must match!";
        }
        if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][] = "Please use a valid email address!";
        }
        ////-----------------END OF VALIDATION------------------////
        if(count($_SESSION['errors']) > 0) {
            header('location: index.php');
            die();
        }
        else {
            $query = "INSERT INTO users (first_name, last_name, password, email, created_at, updated_at)
                        VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$post['password']}', '{$post['email']}', NOW(), NOW())";
            run_mysql_query($query);
            $_SESSION['success_message'] = 'User successfully created!';
            header('location: index.php');
            die();
        }
    }

    function login_user($post) {
        $query = "SELECT * FROM users WHERE users.password = '{$post['password']}' 
                    AND users.email = '{$post['email']}'";
        $user = fetch_all($query);
        if(count($user) > 0) {
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['first_name'] = $user[0]['first_name'];
            $_SESSION['last_name'] = $user[0]['last_name'];
            $_SESSION['logged_in'] = TRUE;
            header('location: wall.php');

        }
        else {
            $_SESSION['errors'][] =  "Can't find user with that credentials";
            header('location: index.php');
            die();
        }
    }

    function post_message($post) {
        if(empty($post['message'])) {
            $_SESSION['errors'][] = "Message can't be blank!";
        }
        if(count($_SESSION['errors']) > 0) {
            header('location: wall.php');
            die();
        }
        else {
            $query = "INSERT INTO messages (user_id, message, created_at, updated_at)
                        VALUES ('{$_SESSION['user_id']}', '{$post['message']}', NOW(), NOW())";
            run_mysql_query($query);
            $_SESSION['success_message'] = 'Message successfully posted!';
            show_message();
            header('location: wall.php');
            die();
        }
    }

    function post_comment($post) {
        if(empty($post['comment'])) {
            $_SESSION['errors'][] = "Comment can't be blank!";
        }
        if(count($_SESSION['errors']) > 0) {
            header('location: wall.php');
            die();
        }
        else {
            $query = "INSERT INTO comments (user_id, comment, message_id, created_at, updated_at)
                        VALUES ('{$_SESSION['user_id']}', '{$post['comment']}', '{$post['message_id']}', NOW(), NOW())";
            run_mysql_query($query);
            $_SESSION['success_message'] = 'Comment successfully posted!';
            header('location: wall.php');
            die();
        }
    }

    function show_message() {
        $query = "SELECT messages.*, users.first_name , users.last_name FROM messages 
                    LEFT JOIN users ON messages.user_id = users.id ORDER BY created_at DESC";
        $messages = fetch_all($query);
        $_SESSION['messages'] = $messages;
    }

    function delete($post) {
        var_dump($post['message_id']);
        $id = $post['message_id'];
        $query = "DELETE FROM comments WHERE message_id = '$id';";
        run_mysql_query($query);
        $query = "DELETE FROM messages WHERE id = '$id';";
        run_mysql_query($query);
        show_message();
        $_SESSION['success_message'] = 'Message successfully deleted!';
        header('location: wall.php');
        die();
    }
?>