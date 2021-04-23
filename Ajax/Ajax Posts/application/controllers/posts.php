<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Posts extends CI_Controller {
	public function index_json()
	{
		$data = array();
		$data["posts"] = $this->post->all();
		echo json_encode($data);
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function index_html()
	{
		$data["posts"] = $this->post->all();
		$this->load->view("partial", $data);
	}
	public function create()
	{
		$new_posts = $this->input->post();
		$this->post->create($new_posts);

		$data["posts"] = $this->post->all();

		$this->load->view("partial", $data);
	}
}
