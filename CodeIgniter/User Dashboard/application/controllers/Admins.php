<?php
/*  DOCU: This class is only accessible by the admin.
    Owner: Rommel
    */
defined('BASEPATH') OR exit('No direct script access allowed');
class Admins extends CI_Controller {
    /*  DOCU: This load the view file to add user
        Owner: Rommel
    */
    public function add_user() 
    {
        $this->load->view('admin/new_user');
    }
    /*  DOCU: This process validates the input whether the user input is valid
        If the input is valid, process it on the user model
        Owner: Rommel
    */
    public function add_user_process()
    {
        $result = $this->user->validate_register($this->input->post());
        if($result) 
        {
            $this->session->set_flashdata('status', $result);
        } 
        else 
        {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'created_at' => date("Y-m-d, H:i:s")
            );
            $this->security->xss_clean($data);
            $this->user->add_user($data);
            $this->session->set_flashdata('status', "User Added!");
            redirect('/dashboards');
        }
        redirect('/admins/add_user');
    }
    /*  DOCU: This load the view file for editing the user
        Owner: Rommel
    */
    public function edit_user($id) 
    {
        $result = $this->user->get_user_by_id($id);
        $this->load->view('admin/edit_user', $result);
    }
    /*  DOCU: This process and validates the editing of the user 
        then pass it on the model
        Owner: Rommel
    */
    public function edit_user_process($id) 
    {
        $result = $this->user->validate_edit_info($this->input->post(), $id);
        if($result) 
		{
            $this->session->set_flashdata('status', $result);
		}
		else 
		{
			$data = array(
                'id' => $id,
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'user_level' => $this->input->post('user_level'),
                'updated_at' => date("Y-m-d, H:i:s")
			);
			$this->security->xss_clean($data);
			$this->user->edit_user_info($data);
			$this->session->set_flashdata('status', "User info updated!");
            redirect('/dashboards');
		}
        redirect('/admins/edit_user/'. $id);
    }
    /*  DOCU: This function validates then process the updating of password
        Owner: Rommel
    */
    public function edit_password_process($id)
    {
        $result = $this->user->validate_edit_password($this->input->post());
        if($result) 
		{
            $this->session->set_flashdata('status_password', $result);
		} 
		else 
		{
			$data = array(
                'id' => $id,
				'password' => $this->input->post('password'),
                'updated_at' => date("Y-m-d, H:i:s")
			);
			$this->security->xss_clean($data);
			$this->user->edit_user_password($data);
			$this->session->set_flashdata('status', "Password updated!");
            redirect('/dashboards');
		}
        redirect('/admins/edit_user/'. $id);
    }
    /*  DOCU: This function load the delete page prompt
        Owner: Rommel
    */
    public function delete_page($id)
    {
        $result['user'] = $this->user->get_user_by_id($id);
        $this->load->view('dashboard/delete', $result);
    }
    /*  DOCU: This function process the deletion of user
        Owner: Rommel
    */
    public function delete_user($id) 
    {
        $this->user->delete_user_by_id($id);
        $this->session->set_flashdata('status', "User Deleted!");
        redirect('/dashboards');
    }
}