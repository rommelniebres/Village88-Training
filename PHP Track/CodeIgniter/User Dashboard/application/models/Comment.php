<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model {
    /*  DOCU: This get all the comments from a message id then return it to the
        controller
        Owner: Rommel
    */
    public function get_comments_from_message_id($message_id) 
    {
        $safe_message_id = $this->security->xss_clean($message_id);

        $query = "SELECT comments.message_id, 
                        CONCAT(first_name,' ',last_name) AS comment_sender_name, 
                        comment AS comment_content, 
                        comments.created_at AS comment_date 
                    FROM comments LEFT JOIN users on comments.user_id = users.id 
                    WHERE comments.message_id=?";
        
        return $this->db->query($query, $safe_message_id)->result_array();
    }
    /*  DOCU: This validate the comments, then return it to the controller
        Owner: Rommel
    */
    public function validate_comment() 
    {
        $this->form_validation->set_rules('comment_input', 'Comment', 'required');

        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    /*  DOCU: This inserts to the database the input comment with a message id 
        Owner: Rommel
    */
    public function add_comment($post, $message_id) 
    {
        $query = 'INSERT INTO Comments(user_id, message_id, comment, created_at) VALUES (?, ?, ?, ?)';
        $values = array($this->security->xss_clean($this->session->userdata('user_id')),
                    $this->security->xss_clean($message_id), 
                    $this->security->xss_clean($post['comment_input']),
                    'created_at' => date("Y-m-d, H:i:s")); 
        $this->db->query($query, $values);
    }
    
}
