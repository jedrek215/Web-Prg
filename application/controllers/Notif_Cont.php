<?php

class Notif_Cont extends CI_Controller{

	
	public function index()
	{
		$this->load->model('Thread_model');
		$this->load->model('Home_model');
		$this->home();
	}

	public function home(){
		if ($this->session->userdata('logged_in')){
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	     
	   	$data['userinfo'] = $this->Home_model->get_userId($data['username']);
		$data['followed_class'] = $this->Thread_model->getFollowedClass($data['username']);
		$this->load->view('include/notifications_head');
		$this->load->view('include/top_nav',$data);
		$this->load->view('include/left_nav',$data);
		$this->load->view('notifications',$data);
		$this->load->view('include/modal');
	}
	}


	

	
}
?>