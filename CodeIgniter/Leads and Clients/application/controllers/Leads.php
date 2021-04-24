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
		$leads['count'] = count($leads['leads']);
		$this->load->view('index', $leads);
	}
	/* 
	Set the date then pass it on the model to query and 
	return the range of date that has been set.
    */
	public function search()
	{
		$search = array(
			'name' => $this->input->post('name'),
			'date_from' => $this->input->post('date_from'),
			'date_to' => $this->input->post('date_to')
		);
		$leads['leads']  = $this->lead->search_data($search);
		$leads['count'] = count($leads['leads']);
		$this->load->view('index', $leads);
	}
	
}