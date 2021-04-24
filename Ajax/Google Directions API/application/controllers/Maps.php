<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Maps extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function direction()
	{	
		$origin = urlencode($this->input->post("origin"));	
		$destination = urlencode($this->input->post("destination"));
		$url = "http://www.mapquestapi.com/directions/v2/route?key=XSxEPvGEDFcsuAGJxbjYXK32sSaYwnMf&from=". $origin. "&to=".$destination;
		$this->output->set_content_type('application/json')->set_output(json_encode($url));
	}
}
