<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Weathers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
	}
	public function index()
	{
		$this->load->view('index');
	}
	/*	DOCU: This function is used to prepare the url including post data
		and converting it to json format to be used by the index.php(views)
		OWNER: Rommel
	*/
	public function weather_check()
	{
		$location = urlencode($this->input->post("location"));
		$url = "https://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=886705b4c1182eb1c69f28eb8c520e20";
		$this->output->set_content_type('application/json')->set_output(json_encode($url));
	}
}
