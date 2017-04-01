<?php

class Class_Cont extends CI_Controller{

	function __construct(){

        parent::__construct();
        $this->load->model('Class_Model', 'menu');
        $this->load->model('Thread_model');
        $this->load->model('Home_model');
       //$this->load->model('Arts_Model');
		//$this->load->model('dash_model', 'model');
    }

	public function index()
	{
			$this->home();
	}

	public function home(){
		if ($this->session->userdata('logged_in')){
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];

		$data['college'] = $this->menu->getCollege();
		$data['followed_class'] = $this->Thread_model->getFollowedClass($data['username']);
		$data['userinfo'] = $this->Home_model->get_userId($data['username']);
		$datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $data['timestamp'] = mdate($datestring, $time);	
		$this->load->view('include/classes_head');
		$this->load->view('include/top_nav',$data);
		$this->load->view('include/department_nav', $data);
		$this->load->view('classesfollowing',$data);
		$this->load->view('include/modal',$data);
		}
	}

	

	
}
?>