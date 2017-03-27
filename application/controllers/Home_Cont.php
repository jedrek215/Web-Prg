<?php

class Home_Cont extends CI_Controller{

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Home_model');
		$this->home();
	}

	public function home(){
		$data['thread_details'] = $this->Home_model->fetch_all_threads();
		
		$this->load->view('include/homepage_head');
		$this->load->view('include/top_nav');
		$this->load->view('include/left_nav');
		$this->load->view('homepage', $data);
		$this->load->view('include/modal');

	}
}
?>