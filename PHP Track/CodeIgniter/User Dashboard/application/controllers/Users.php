<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    /*  DOCU: This load the welcome page
        Owner: Rommel
    */
    public function index()
    {
        $this->load->view('welcome');
    }
    /*  DOCU: This load the sign in page
        Owner: Rommel
    */
    public function sign_in_page() 
    {
        $this->load->view('user/sign_in');
    }
    /*  DOCU: This validate the sign in credentials
        Owner: Rommel
    */
    public function sign_in_validate() 
    {
        $result = $this->user->validate_sign_in($this->input->post());
        if($result != 'success') {
            $this->session->set_flashdata('status', $result);
            redirect("users/sign_in_page");
        } 
        else 
        {
            $email = $this->input->post('email');
            $user = $this->user->get_user_by_email($email);
            $result = $this->user->validate_sign_in_match($user, $this->input->post('password'));
            if($result == "success") 
            {
                $this->session->set_userdata(array('user_id'=>$user['id'], 'first_name'=>$user['first_name']));            
                if($user['user_level'] !== '9')
                {
                    $this->session->set_userdata('admin', FALSE);
                }
                else
                {
                    $this->session->set_userdata('admin', TRUE);
                }
                redirect("/dashboards");
            }
            else 
            {
                $this->session->set_flashdata('status', $result);
                redirect("users/sign_in_page");
            }
        }
    }
    /*  DOCU: This loads the register page
        Owner: Rommel
    */
    public function register_page() 
    {
        $this->load->view('user/register');
    }
    /*  DOCU: This validate the input register whether the fields are valid
        and the email is available
        Process the registration if all valid conditions are met
        Owner: Rommel
    */
    public function register_validate() 
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
			$this->session->set_flashdata('status', "User Created!");
		}
        redirect('/users/register_page');
    }
}