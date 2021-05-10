<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function world()
	{
		$this->load->view('/main/world');
	}

	public function ninjas()
	{
		$this->load->view('/main/ninjas');
		$this->session->set_userdata('times', 5);
	}
	
	public function ninjas2($number)
	{
		$this->load->view('/main/ninjas', $number);
		$this->session->set_userdata('times', $number);
	}
}