<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {
	/* 
    Get all the leads from the beginning.
    This will load the view file index, this is secured 
	because user cannot do anything other than
	getting the date and displaying it.
    */
	public function index()
	{
		$leads['leads'] = $this->lead->get_all_leads();
		$this->load->view('index', $leads);
	}
	/* 
	Set the date then pass it on the model to query and 
	return the range of date that has been set.
    */
	public function set_date()
	{
		$result = $this->lead->validate($this->input->post());
		if($result == "valid") 
		{
			$date = array(
				'date_from' => $this->input->post('date_from'),
				'date_to' => $this->input->post('date_to')
			);
			$leads['leads']  = $this->lead->get_all_leads_by_date($date);
			$this->load->view('index', $leads);
		}
		else
		{	
			$this->session->set_flashdata('status', validation_errors());
			redirect('/leads');
		}
		
	}
	
}