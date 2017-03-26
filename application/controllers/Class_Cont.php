<?php

class Class_Cont extends CI_Controller{

	
	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->view('include/classes_head');
		$this->load->view('include/top_nav');
		$this->load->view('include/department_nav');
		$this->load->view('classes');
		$this->load->view('include/modal');

	}


	

	
}
?>