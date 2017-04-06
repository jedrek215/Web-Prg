<?php

class Follow_Cont extends CI_Controller{

	function __construct(){

        parent::__construct();
        $this->load->model('Follow_Model');
        $this->load->model('Home_model');

       //$this->load->model('Arts_Model');
		//$this->load->model('dash_model', 'model');
    }

    public function follow_thread(){
    	$data['follow_threadid'] = $_POST['thread_id'];
    	$email = $_POST['email'];
    	$result = $this->Home_model->get_userId($email);
    	if($result){
    		foreach($result as $object)
    			$data['follow_acctid'] = $object->user_id;

    		$this->Follow_Model->follow_thread($data);
    	}
    	
    }

    public function follow_class(){

    }

    public function unfollow_thread(){
    	$thread_id = $_POST['thread_id'];
    	$email = $_POST['email'];
    	$result = $this->Home_model->get_userId($email);
    	if($result){
    		foreach($result as $object)
    			$user_id = $object->user_id;

    		$this->Follow_Model->unfollow_thread($thread_id, $user_id);
    	}
    }

    public function unfollow_class(){

    }
}
?>