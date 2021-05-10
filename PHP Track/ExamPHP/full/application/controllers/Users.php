<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session and database autoloaded
class Users extends CI_Controller {
	/* 	DOCU: This function loads the view page index
		with only form on it
		OWNER: Rommel
	*/
	public function index()
	{
		$this->load->view('index');
	}
	/* 	DOCU: This function loads all the user without filter or search
		pass the variable 'users' to the view file to render all users
		OWNER: Rommel
	*/
	public function index_html()
	{
		$this->load->model('user');
		$users['users'] = $this->user->get_all_user();
		$this->load->view('partials/list', $users);
	}
	/* 	DOCU: This function loads filtered user without based on search 
		settings pass the variable 'users' to the view file to render
		filtered list
		OWNER: Rommel
	*/
	public function search()
	{
		$data = array(
		'male' => $this->input->post('male'),
		'female' => $this->input->post('female'),
		'country' => $this->input->post('country')
		);
		$this->load->model('user');
		$users['users'] = $this->user->search_user($data);
		$this->load->view("partials/list", $users);
	}
}