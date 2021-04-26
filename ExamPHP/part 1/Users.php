<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session and database autoloaded
class Users extends CI_Controller {
	/* 	DOCU: Initially load the page with 5 users, when the show more is
		clicked from the view page the user numbers will change also.
		OWNER: Rommel
	*/
	public function index($user_num=5)
	{
		$this->session->set_userdata('limit', $user_num);
		$this->load->model('user');
		$users['users'] = $this->user->get_user($this->session->userdata('limit'));
		$this->load->view('index', $users);
	}

}