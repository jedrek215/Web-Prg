<?php

class Class_Cont extends CI_Controller{

	function __construct(){

        parent::__construct();
        $this->load->model('Class_Model');
       //$this->load->model('Arts_Model');
		//$this->load->model('dash_model', 'model');
    }

	public function index($department = NULL)
	{
		if(!$department){
			$this->home();
		}
	}

	public function home(){

		$data['nav'] = $this->Class_Model->getCollege();
		$data['dept'] = $this->Class_Model->getDepartment()
		$this->load->view('include/classes_head');
		$this->load->view('include/top_nav');
		$this->load->view('include/department_nav', $data);
		$this->load->view('classes');
		$this->load->view('include/modal');

	}


	

	
}
?>