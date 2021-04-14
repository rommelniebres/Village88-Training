<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		echo 'I am Main Class!';
	}

	public function hello()
	{
		echo 'Hello World!';
	}

	public function say()
	{
		echo 'HI';
	}

	public function say_anything($any)
	{
		echo strtoupper($any);
	}

	public function danger()
	{
		redirect('/main');
	}
}