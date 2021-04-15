<?php

class Student extends CI_Model {
    function get_student_by_email($email)
    { 
        $query = 'SELECT * FROM students WHERE email = ?';
        $values = array($email);
        return $this->db->query($query, $values)->row_array();
    }
    function register_student($user)
    {
        $query = "INSERT INTO students (first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)";
        $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['created_at']);
        return $this->db->query($query, $values);
    }
}


?>