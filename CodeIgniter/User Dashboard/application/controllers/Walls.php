<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Walls extends CI_Controller {
    /*  DOCU: This render all necessary information at the wall page such as:
        all messages, all comments and wall owner page
        Owner: Rommel
    */
    public function show($id) 
    {
        $user = $this->user->get_user_by_id($id);
        $messages = $this->message->get_messages($id);
        foreach($messages as $message) 
        {
            $comments = $this->comment->get_comments_from_message_id($message['message_id']);
            $message["comments"] = $comments;
            $inbox[] = $message;
        }
        if(isset($inbox)){
            $user['messages'] = array("inbox"=>$inbox);
        }
        $this->load->view('dashboard/user_info', $user);
    }
    /*  DOCU: This function allow any user to add message in the chosen wall profile
        This also validates the message, it is required to be field and not to be empty
        Owner: Rommel
    */
    public function add_message($wall_id) 
    {
        $result = $this->message->validate_message();
        
        if($result != 'success') {
            $this->session->set_flashdata('errors', $result);
        } 
        else {
            $this->message->add_message($this->input->post(), $wall_id);
            $this->session->set_flashdata('success', "Message posted!");
        }
        redirect("/walls/show/". $wall_id);
    }
    /*  DOCU: This function allow any user to add comment in the chosen message from a wall profile
        This also validates the comment, it is required to be field and not to be empty
        Owner: Rommel
    */
    public function add_comment($message_id, $wall_id) 
    {
        $result = $this->comment->validate_comment();
        if($result != 'success') {
            $this->session->set_flashdata('errors', $result);
        }
        else {
            $this->comment->add_comment($this->input->post(), $message_id);
            $this->session->set_flashdata('success', "Comment posted!");
        }
        redirect("/walls/show/". $wall_id);
    }
}