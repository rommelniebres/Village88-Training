<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {
	/*
    Get all the leads from the beginning.
    This will load the view file index, this is secured 
	because user cannot do anything other than
	getting the date and displaying it.
    */
	public function index($limit=1)
	{
		$this->session->set_userdata('searching', FALSE);
		$this->session->set_userdata('limit', $limit);
		$leads['count'] = count($this->lead->get_all_leads());
		$leads['leads'] = $this->lead->get_all_leads_limit($this->session->userdata('limit'));
		$this->load->view('index', $leads);
	}
	/* 
	Set the date then pass it on the model to query and 
	return the range of date that has been set.
    */
	public function search($limit=1)
	{
		$this->session->set_userdata('searching', TRUE);
		$name = $this->input->post('name');
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		if($name || $date_from || $date_to)
		{	
			$this->session->set_userdata('search',
			$search = array(
				'name' => $this->input->post('name'),
				'date_from' => $this->input->post('date_from'),
				'date_to' => $this->input->post('date_to')
			));
		}
			$this->session->set_userdata('limit', $limit);
			$search = $this->session->userdata('search');
			$leads['count'] = count($this->lead->search_data($search));
			$search['limit'] = $this->session->userdata('limit');
			$leads['leads'] = $this->lead->search_data_limit($search);
			$this->load->view('index', $leads);
	}
	
}