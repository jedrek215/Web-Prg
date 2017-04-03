<?php

class Thread_Cont extends CI_Controller{

	public function index()
	{
		$this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->model('Home_model');
        $this->load->model('Thread_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->home();
	}

	public function home(){
		if ($this->session->userdata('logged_in')){
	      $session_data = $this->session->userdata('logged_in');
	      $data['username'] = $session_data['username'];
	    }
	    
		$thread_id = $this->uri->segment(3);
		$datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $data['timestamp'] = mdate($datestring, $time);	
		$data['thread_details'] = $this->Home_model->fetch_thread($thread_id);
        $data['comments'] = $this->Thread_model->fetch_comments($thread_id);
        $data['ds_id'] = $thread_id;

        $this->form_validation->set_rules('thread_id', 'required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('commentmessage', 'required|min_length[1]|max_length[300]');
		
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('include/comment_head');
			$this->load->view('include/top_nav');
			$this->load->view('comment', $data);
			$this->load->view('include/modal',$data);
        } 
		
    }
		//$this->load->view('include/comment_head');
		//$this->load->view('include/top_nav');
		//$this->load->view('comment', $data);

}

?>