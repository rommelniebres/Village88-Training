<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
    //loads the login view
    public function index()
    {
        $this->load->view('student/login');
    }
    //processes the student login
	public function register()
    {
		$firstName = $this->input->post('first_name');
		$lastName = $this->input->post('last_name');
		$email = $this->input->post('email');
        $password = md5($this->input->post('password'));
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[students.email]');
		$this->form_validation->set_rules("password", "Password", "min_length[8]|required");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "matches[password]|required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/");
		}
		else
		{
			$user = array(
				'first_name' => $firstName,
				'last_name' => $lastName,
				'email' => $email,
				'password' => $password,
				'created_at' => date("Y-m-d, H:i:s")
			);
			$this->session->set_flashdata("register_success", "Registration Successful!");
			$this->student->register_student($user);
			redirect("/");
		}
		
    }
    public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $student = $this->student->get_student_by_email($email);
		echo "$password<br>";
		echo $student['password'];
        if($student['email'] !== $email || $student['password'] !== $password)
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect("/");
        }
        else
        {
			$user = array(
				'student_id' => $student['id'],
				'student_email' => $student['email'],
				'student_first_name' => $student['first_name'],
				'student_last_name' => $student['last_name'],
				'student_name' => $student['first_name'].' '.$student['last_name'],
				'is_logged_in' => true
            );
            $this->session->set_userdata($user);
            redirect("/students/profile");
        }
    }
    //simple profile page of a student
    public function profile()
    {
        if($this->session->userdata('is_logged_in') === TRUE)
        {
            $this->load->view('student/profile');
        }
        else
        {
            redirect("/");
        }
    }
    //logout the student
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/");   
	}
}