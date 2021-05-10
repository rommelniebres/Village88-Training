<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends CI_Controller {
	/* 
    Get all the athletes from the beginning.
    This will load the view file index.
    */
	public function index()
	{
		$athletes['athletes'] = $this->sport->get_all_athlete();
		$this->load->view('index', $athletes);
	}
	/* 
	search the athletes then pass it on the model to query and 
	return the athletes based on name, gender and sport that has been set.
    */
	public function search()
	{
		$result = $this->sport->validate($this->input->post());
		if($result == "valid") 
		{	
			$data = array(
				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				'sport' => $this->input->post('sport')
			);
			$athletes['athletes']  = $this->sport->search_athlete($data);
			$this->load->view('index', $athletes);
		}
		else
		{	
			$this->session->set_flashdata('status', validation_errors());
			redirect('/');
		}
	}

}