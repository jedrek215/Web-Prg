<?php

class Thread_Cont extends CI_Controller{

	public function index()
	{
		$this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->model('Home_model');
        $this->load->model('Thread_model');
        $this->load->model('Follow_model');
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
       $this->Thread_model->add_views($thread_id);
       $data['thread_details'] = $this->Home_model->fetch_thread($thread_id);
       $data['comments'] = $this->Thread_model->fetch_comments($thread_id);
       $data['ds_id'] = $thread_id;
       $data['userinfo'] = $this->Home_model->get_userId($data['username']);
       $this->form_validation->set_rules('thread_id', 'required|min_length[1]|max_length[11]');
       $this->form_validation->set_rules('commentmessage', 'required|min_length[1]|max_length[300]');

       if ($this->form_validation->run() == FALSE) { 
        $this->load->view('include/comment_head');
        $this->load->view('include/top_nav',$data);
        $this->load->view('comment', $data);
        $this->load->view('include/modal',$data);
        $this->load->view('include/jqueries');
    } 

}

public function add_comment(){
   $this->form_validation->set_rules('commentmessage', 'Comment Message', 'required|min_length[1]|max_length[300]');

   $thread_id = $this->input->post('thread_id');
   $query = $this->Thread_model->getAcctID($this->input->post('username'));
   if($query){
     foreach($query as $row){
        $id = $row->user_id;
    }
}

if($this->form_validation->run() == TRUE){
  $data = array(
     'comment_threadid'  => $this->input->post('thread_id'),
     'comment_desc'		=> $this->input->post('commentmessage'),
     'comment_datesub'	=> $this->input->post('dateSub'),
     'comment_acctid'	=> $id,
     'status'			=> 'A'
     );
  $this->Thread_model->add_comment($data);
  $this->Thread_model->decrease_views($thread_id);
  redirect('Thread_Cont/index/'.$thread_id, 'refresh'); 
}

}
		//$this->load->view('include/comment_head');
		//$this->load->view('include/top_nav');
		//$this->load->view('comment', $data);

}

?>