<?php

class Dept_Cont extends CI_Controller{

	
	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->view('include/department_head');
		$this->load->view('include/top_nav');
		$this->load->view('include/department_nav');
		$this->load->view('department');
		$this->load->view('include/modal');

	}


	

	
}
?>