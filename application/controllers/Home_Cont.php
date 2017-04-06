<?php

class Home_Cont extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('Class_Model');
		$this->load->model('Thread_model');
		$this->load->model('Home_model');
		$this->load->model('Follow_model');
       //$this->load->model('Arts_Model');
		//$this->load->model('dash_model', 'model');
	}
	public function index(){
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
			$this->load->view('include/jqueries');

		}

	}

	public function getUserInfo($id){
		if($this->Home_model->userid($id))
			$data = $this->Home_model->userid($id);
		else
			$data = 'NO INFO';

		echo json_encode($data);
	}

	public function getInfo($threadid){
		if($this->Home_model->fetch_thread($threadid))
			$data = $this->Home_model->fetch_thread($threadid);
		else
			$data = 'NO INFO';

		echo json_encode($data);
	}

	public function mythreads(){
		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$username = $data['username'];
			$data['followed_class'] = $this->Thread_model->getFollowedClass($data['username']);
			$data['thread_details'] = $this->Home_model->fetch_my_threads($data['username']);
			$data['userinfo'] = $this->Home_model->get_userId($data['username']);
			$datestring = '%Y-%m-%d %H:%i:%s';
			$time = time();
			$data['timestamp'] = mdate($datestring, $time);	
			$this->load->view('include/homepage_head');
			$this->load->view('include/top_nav',$data);
			$this->load->view('include/left_nav', $data);
			$this->load->view('mythreads', $data);
			$this->load->view('include/modal',$data);
			$this->load->view('include/jqueries',$data);
		}	
	}

	public function followingthreads(){
		if ($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$username = $data['username'];
			$result = $this->Home_model->get_userId($username);
			if($result){
				foreach($result as $object)
					$data['follow_acctid'] = $object->user_id;
			}

			echo $data['follow_acctid'];
			$data['followed_class'] = $this->Thread_model->getFollowedClass($data['username']);
			$data['thread_details'] = $this->Home_model->fetch_following_threads($data['follow_acctid']);
			$data['userinfo'] = $this->Home_model->get_userId($data['username']);
			$datestring = '%Y-%m-%d %H:%i:%s';
			$time = time();
			$data['timestamp'] = mdate($datestring, $time);	
			$this->load->view('include/homepage_head');
			$this->load->view('include/top_nav',$data);
			$this->load->view('include/left_nav', $data);
			$this->load->view('mythreads', $data);
			$this->load->view('include/modal',$data);
			$this->load->view('include/jqueries',$data);
		}	
	}

	function editThread(){
		$this->Thread_model->editThread($this->input->post('threadid'),$this->input->post('editTitle'),$this->input->post('editDesc')); 
		redirect('Home_Cont/mythreads','refresh');
	}

	function deleteThread(){
		$this->Thread_model->deleteThread($this->input->post('id')); 
		redirect('Home_Cont/mythreads','refresh');
	}

	function editComment(){
		$this->Thread_model->editComment($this->input->post('commentid'),$this->input->post('comment')); 
		redirect('Home_Cont/mythreads','refresh');
	}

	function deleteComment(){
		$this->Thread_model->deleteComment($this->input->post('deleteID')); 
		redirect('Home_Cont/mythreads','refresh');
	}

}
?>