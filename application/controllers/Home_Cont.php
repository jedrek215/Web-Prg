<?php

class Home_Cont extends CI_Controller{

	public function index()
	{
		$this->load->model('Home_model');
		$this->load->model('Thread_model');
		$this->home();
	}

	public function home(){
		if ($this->session->userdata('logged_in')){
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];

	   	$username = $data['username'];
	   	$data['followed_class'] = $this->Thread_model->getFollowedClass($data['username']);
		$data['thread_details'] = $this->Home_model->fetch_all_threads();
		$data['userinfo'] = $this->Home_model->get_userId($data['username']);
		$datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $data['timestamp'] = mdate($datestring, $time);	
		$this->load->view('include/homepage_head');
		$this->load->view('include/top_nav',$data);
		$this->load->view('include/left_nav', $data);
		$this->load->view('homepage', $data);
		$this->load->view('include/modal',$data);
	   	}

	}

	public function getUserInfo($id){
		 		$this->load->model('Home_model');
		 if($this->Home_model->userid($id))
		   $data = $this->Home_model->userid($id);
		 else
		 	$data = 'NO INFO';
        	echo json_encode($data);
	}
}
?>