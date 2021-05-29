<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboards extends CI_Controller {
    /*  DOCU: This check whether the current user is admin or not
        Loads the appropriate dashboard per user level
        Owner: Rommel
    */
    public function index()
    {
        if(!$this->session->userdata('user_id'))
        {
            redirect("/users");
        }
        else
        {
            $users['users'] = $this->dashboard->display_all_user();
            if($this->session->userdata('admin') == TRUE )
            {
                $this->load->view('admin/dashboard_admin', $users);
            }
            else
            {
                $this->load->view('dashboard/dashboard_normal', $users);
            }
        }
    }
    /*  DOCU: This loads the profile page that lets the user edit his/her own user
        Owner: Rommel
    */
    public function edit_profile() 
    {
        $result = $this->user->get_user_by_id($this->session->userdata('user_id'));
        $this->load->view('dashboard/edit_profile', $result);
    }
    /*  DOCU: This process update the current user profile information
        Owner: Rommel
    */
    public function  edit_profile_info($id) 
    {
        $result = $this->dashboard->validate_edit_profile($this->input->post());
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
                'updated_at' => date("Y-m-d, H:i:s")
			);
			$this->security->xss_clean($data);
			$this->dashboard->update_info($data);
			$this->session->set_flashdata('status', "User info updated!");
		}
        redirect('/dashboards/edit_profile/');
    }
    /*  DOCU: This process update the current user password 
        Owner: Rommel
    */
    public function edit_profile_password($id)
    {
        $result = $this->dashboard->validate_edit_password($this->input->post());
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
			$this->dashboard->update_password($data);
			$this->session->set_flashdata('status_password', "Password updated!");
		}
        redirect('/dashboards/edit_profile/');
    }
    /*  DOCU: This update the current user description
        Owner: Rommel
    */
    public function edit_profile_description($id)
    {
        $result = $this->dashboard->validate_edit_description($this->input->post());
        if($result) 
		{
            $this->session->set_flashdata('status_description', $result);
		} 
		else 
		{
			$data = array(
                'id' => $id,
				'description' => $this->input->post('description'),
                'updated_at' => date("Y-m-d, H:i:s")
			);
			$this->security->xss_clean($data);
			$this->dashboard->update_description($data);
			$this->session->set_flashdata('status_description', "Description updated!");
		}
        redirect('/dashboards/edit_profile/');
    }
    /*  DOCU: This logoff the user and prevent the user for using dashboard
        without logging in first
        Owner: Rommel
    */
    public function log_off() 
    {
        $this->session->sess_destroy();
        redirect("/users");
    }

}