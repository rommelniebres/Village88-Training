<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Message extends CI_Model {
    /*  DOCU: Get all the messages from the database
        then return it on the controller
        Owner: Rommel
    */
    public function get_messages($wall_id) {
        $query = 'SELECT messages.id AS message_id,
                    messages.wall_id AS wall_id,
                    message AS message_content, 
                    messages.created_at AS message_date, 
                    CONCAT(first_name," ",last_name) AS message_sender_name
                    FROM messages 
                    LEFT JOIN users on messages.user_id=users.id 
                    WHERE wall_id = ?
                    ORDER BY messages.created_at DESC ';
        $values = array(
            $this->security->xss_clean($wall_id)
        );
        return $this->db->query($query, $values)->result_array();
    }
    /*  DOCU: This validates the message to be posted
        Owner: Rommel
    */
    public function validate_message() {
        $this->form_validation->set_rules('message_input', 'Message', 'required');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return 'success';
        }
    }
    /*  DOCU: This inserts the message input to the database
        Owner: Rommel
    */
    public function add_message($post, $wall_id) {
        $query = 'INSERT INTO Messages(user_id, wall_id,message, created_at) VALUES (?, ?, ?, ?)';
        $values = array(
            $this->security->xss_clean($this->session->userdata('user_id')), 
            $this->security->xss_clean($wall_id),
            $this->security->xss_clean($post['message_input']),
            'created_at' => date("Y-m-d, H:i:s")
        ); 
        
        $this->db->query($query, $values);
    }
}
