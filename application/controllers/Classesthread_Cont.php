<?php

class Classesthread_Cont extends CI_Controller{

	
	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->view('include/classesthread_head');
		$this->load->view('include/top_nav');
		$this->load->view('include/left_nav');
		$this->load->view('classesthread');
		$this->load->view('include/modal');

	}


	

	
}
?>