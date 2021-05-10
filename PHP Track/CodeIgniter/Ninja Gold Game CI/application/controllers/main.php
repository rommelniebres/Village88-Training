<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public function index()
	{
		$this->load->view('index');
	}

	public function process_money()
	{	
		$building = $this->input->post('building');
		$date = date("F j, Y, g:i a");
		$gold = $this->session->userdata('gold');
		$old_session =  $this->session->userdata('activities');
		$log = array();
		if($building == 'farm')
		{
			$farm = rand(10, 20);
			$gold += $farm;
			$log['added_gold'] = $farm;
		}
		else if($building == 'cave')
		{
			$cave = rand(5, 10);
			$gold += $cave;
			$log['added_gold'] = $cave;
		}
		else if($building == 'house')
		{
			$house = rand(2, 5);
			$gold += $house;
			$log['added_gold'] = $house;
		}
		else if($building == 'casino')
		{
			$casino = rand(-50, 50);
			$gold += $casino;
			$log['added_gold'] = $casino;
		}
		$log['building'] = $building;
		$log['date'] = $date;
		
		$this->session->set_userdata('gold', $gold);
		array_push($old_session, $log);
		if(!isset($old_session) && $old_session == NULL)
		{
			$old_session[0] = $log;
			$this->session->set_userdata('activities', $old_session);
		}
		else
		{
			$this->session->set_userdata('activities', $old_session);
		}
		redirect('/');
	}
}