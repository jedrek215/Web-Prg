<?php

class Notif_Cont extends CI_Controller{

	
	public function index()
	{
		$this->home();
	}

	public function home(){
		$this->load->view('include/notifications_head');
		$this->load->view('include/top_nav');
		$this->load->view('include/left_nav');
		$this->load->view('notifications');
		$this->load->view('include/modal');

	}


	

	
}
?>