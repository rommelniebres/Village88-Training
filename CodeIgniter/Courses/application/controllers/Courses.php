<?php
class Courses extends CI_Controller {
	public function index()
	{
        $this->output->enable_profiler(TRUE);
		$this->load->model("Course");
        $course = $this->Course->get_all_courses();
		$this->session->set_userdata('courses', $course);
		$this->load->view('courses/index');
	}
	public function add()
	{	
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Name", "required|min_length[5]");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
		}
		else
		{
			$this->session->set_flashdata('success', "Course Added");
			$course['title'] = $this->input->post('title'); 
			$course['description'] = $this->input->post('description');
			$this->load->model("Course");
			$add_course = $this->Course->add_course($course);
			
		}
		redirect('/');
	}
	public function destroy($id)
	{
		$this->load->model("Course");
        $toDelete = $this->Course->get_course_by_id($id);
		$this->load->view('courses/destroy', $toDelete);
	}
	public function delete($id)
	{
		$this->load->model("Course");
        $this->Course->delete_course_by_id($id);
		redirect('/');
	}
}