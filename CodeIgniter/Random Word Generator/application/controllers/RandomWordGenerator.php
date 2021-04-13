<?php
class RandomWordGenerator extends CI_Controller {
    public function main()
	{
		$this->load->view('index');
        // $counter = $this->session->unset_userdata('counter');
        if(!isset($counter)){
            $this->counter();
        }
	}

    public function randomWord()
    {   
        $this->load->helper('string');
        $random = strtoupper(random_string('alnum', 14));
        $this->session->set_userdata('random', $random);
        $this->main();
    }

    public function counter()
    {
        $counter = $this->session->userdata('counter');
        $counter++;
        $this->session->set_userdata('counter', $counter);
    }
}
?>