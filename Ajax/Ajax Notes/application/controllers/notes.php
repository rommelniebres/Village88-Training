<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notes extends CI_Controller {
	/*
		DOCU: This function is responsible for creating json form
		of the data from the db
		OWNER: Rommel
    */
	public function index_json()
	{
		$data = array();
		$data["notes"] = $this->note->all();
		echo json_encode($data);
	}
	/*
		DOCU: This function renders the index/main page
		OWNER: Rommel
    */
	public function index()
	{
		$this->load->view('index');
	}
	/*
		DOCU: This function renders an html response that
		generates all notes from the db
		OWNER: Rommel
    */
	public function index_html()
	{
		$data["notes"] = $this->note->all();
		$this->load->view("partials/notes", $data);
	}
	/*
		DOCU: This function is responsible for creating
		new notes.
		OWNER: Rommel
    */
	public function create()
	{
		$new_note = $this->input->post();
		$this->note->create($new_note);
		$this->index_html();
	}
	/*
		DOCU: This function is responsible for deleting
		notes.
		OWNER: Rommel
    */
	public function delete()
	{
		$delete_note = $this->input->post();
		$this->note->delete($delete_note);
		$this->index_html();
	}
	/*
		DOCU: This function is responsible for updating
		notes.
		OWNER: Rommel
    */
	public function update()
	{
		$update_note = $this->input->post();
		$this->note->update($update_note);
		$this->index_html();
	}
}
