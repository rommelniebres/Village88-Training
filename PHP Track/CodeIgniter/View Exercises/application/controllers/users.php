<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index()
	{
		$this->load->view('/users/index');
	}

	public function new()
	{
		$this->load->view('/users/new');
	}

	public function create()
	{
		$postData['name']= $this->input->post('name');
		if(!isset($postData['name']))
		{
			redirect('/users');
		}
		else
		{
			$this->load->view('/users/created');
		}
		
	}

	public function count()
	{
		$counter = $this->session->userdata('counter');
        $counter++;
        $this->session->set_userdata('counter', $counter);
		echo $this->session->userdata('counter');
	}

	public function reset()
	{
		$this->session->unset_userdata('counter');
		$this->load->view('reset');
	}

    public function say($say)
	{
        $this->session->unset_userdata('say_times');
        $this->session->set_userdata('say', $say);
		$this->load->view('/users/say');
	}

    public function say2($first, $second)
	{
        $this->session->set_userdata('say', $first);
        $this->session->set_userdata('say_times', $second);
		$this->load->view('/users/say');
	}

    public function mprep()
    {
        $view_data = array(
            'name' => "Michael Choi",
            'age'  => 23,
            'location' => "Seattle, WA",
            'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas", "Being an Awesome Sensei", "Making Students Level Up")
        );
        $this->load->view('users/mprep', $view_data);
    }
}