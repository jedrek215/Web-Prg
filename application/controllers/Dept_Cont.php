<?php

class Dept_Cont extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model("Class_model", "menu");
	}

	public function index()
	{
		$this->home();
	}

	public function home(){	
		
		$data['college'] = $this->menu->getCollege();
		$deptid = $this->uri->segment(3);
		$data['deptname'] = $this->menu->getDeptName($deptid);
		$data['classes'] = $this->menu->getClasses($deptid);
		$data['userinfo'] = $this->Home_model->get_userId($data['username']);
		$datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $data['timestamp'] = mdate($datestring, $time);	
		$this->load->view('include/department_head');
		$this->load->view('include/top_nav',$data);
		$this->load->view('include/department_nav', $data);
		$this->load->view('department',$data);
		$this->load->view('include/modal',$data);

	}


	

	
}
?>