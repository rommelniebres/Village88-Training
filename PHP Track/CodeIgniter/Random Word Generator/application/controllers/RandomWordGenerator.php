<?php
class RandomWordGenerator extends CI_Controller {
    public function main()
	{
		$this->load->view('index');
        if($counter = $this->session->userdata('counter') == NULL) {
            $this->session->set_userdata('counter', 1);
        }
	}

    public function randomWord()
    {   
        $this->load->helper('string');
        $random = strtoupper(random_string('alnum', 14));
        $this->session->set_userdata('random', $random);
        $this->counter();
        redirect('/');
    }

    public function counter()
    {
        $counter = $this->session->userdata('counter');
        $counter++;
        $this->session->set_userdata('counter', $counter);
    }
}
?>