<?php
class Surveys extends CI_Controller {
    public $counter;
    public function main()
    {
        $this->load->view('main');
    }
    public function process_form()
    {   
        $this->counter();
        $postData = $this->input->post();
        $this->session->set_userdata($postData);
        redirect('/result');
    }
    public function result()
    {
        $this->load->view('result');
    }
    public function counter()
    {
        $counter = $this->session->userdata('counter');
        $counter++;
        $this->session->set_userdata('counter', $counter);
    }

}
?>