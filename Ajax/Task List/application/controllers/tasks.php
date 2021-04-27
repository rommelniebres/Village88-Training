<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tasks extends CI_Controller {
	public function index()
	{
		$this->load->view('index');
	}
	public function index_html()
	{
		$data["tasks"] = $this->task->all();
		$this->load->view("partial", $data);
	}
	public function create()
	{
		$new_task = $this->input->post();
		$this->task->create($new_task);
		$data["tasks"] = $this->task->all();
		$this->load->view("partial", $data);
	}
	public function edit()
	{
		$update_task = $this->input->post();
		$this->task->update($update_task);
		$this->index_html();
	}
}
