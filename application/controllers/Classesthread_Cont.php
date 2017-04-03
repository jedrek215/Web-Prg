<?php

class Classesthread_Cont extends CI_Controller{

	
	public function index()
	{
		$this->load->model('Thread_model');
		$this->load->model('Class_model');
		$this->load->model('Home_model');
		$this->home();
	}

	public function home(){

		if ($this->session->userdata('logged_in')){
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	      $user = $data['username'];
	   	  $data['followed_class'] = $this->Thread_model->getFollowedClass($user);
	    
	    $follow_classid = $this->uri->segment(3);
	    $data['class_threads'] = $this->Class_model->getThread_Class($follow_classid);
	    $data['userinfo'] = $this->Home_model->get_userId($data['username']);
	    $query = $this->Class_model->getClassCode($follow_classid);
	    if($query){
	    	foreach($query as $row){
         	 $data['classcode'] = $row->class_code;
        	}
	    }
	    $datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $data['timestamp'] = mdate($datestring, $time);	

		$this->load->view('include/classesthread_head');
		$this->load->view('include/top_nav',$data);
		$this->load->view('include/left_nav',$data);
		$this->load->view('classesthread',$data);
		$this->load->view('include/modal',$data);
	}
	}


	

	
}
?>