<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a student to all bootcamp courses</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1>Add a new course</h1>
    <form action="/courses/add" method="post">
        <span id="error"><?= $this->session->flashdata('error');?></span>
        <span id="success"><?= $this->session->flashdata('success');?></span>
        <label>Name: </label><input type="text" name="title">
        <label>Description: </label>
            <textarea name="description" ></textarea>
        <input type="submit" value="Add">
    </form>
    <h2>Courses</h2>
    <table id="courses">
        <tr>
            <th>Course Name</th>
            <th>Description</th>
            <th>Date Added</th>
            <th>Actions</th>
        </tr>
<?php
        $courses = $this->session->userdata('courses'); 
        foreach($courses as $course)
        { ?>
        <tr>
            <td><?= $course['title'] ?></td>
            <td><?= $course['description'] ?></td>
            <td><?= date("F j, Y, g:i a",  strtotime($course['created_at'])); ?></td>
            <td><a href="/courses/destroy/<?= $course['id'] ?>">Remove</a></td>
        </tr>
<?php   } ?>
    </table>
</body>
</html>