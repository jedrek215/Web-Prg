<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
  
	function fetch_all_threads(){
		$query = $this->db->query('SELECT *
				FROM classes C, thread T, user_acct U
				WHERE U.user_id = T.thread_acctid and C.class_id = T.thread_classid
				order by thread_datesub DESC');
				
		if($query->num_rows()>0){
			return $query->result();
			
		}else {
			return NULL;
		}
	}
	
	function fetch_my_threads($username){
		$query = $this->db->query('SELECT *
				FROM classes C, thread T, user_acct U
				WHERE U.user_id = T.thread_acctid and C.class_id = T.thread_classid
				and U.email ="'.$username.'"
				order by thread_datesub DESC');
				
		if($query->num_rows()>0){
			return $query->result();
			
		}else {
			return NULL;
		}
	}
	function fetch_thread($thread_id){
		$query = $this->db->query('SELECT *
				FROM classes C, thread T, user_acct U
				WHERE T.thread_id = "'.$thread_id.'" and U.user_id = T.thread_acctid and C.class_id = T.thread_classid');
				
		if($query->num_rows()>0){
			return $query->result();
			
		}else {
			return NULL;
		}
	}
	
	
	function get_userId($email){
		$query = $this->db->query('SELECT *
									FROM user_acct
									WHERE email = "' .$email. '"');
									
		if($query->num_rows() == 1){
			return $query->result();
			
		}else {
			return NULL;
			
		}
	}

	function userid($id){
		$query = $this->db->query('SELECT *
								FROM user_acct
								WHERE user_id = "' .$id. '"');
								
		if($query->num_rows()>0){
			return $query->result();
			
		}else {
			return NULL;
			
		}
	}
	
}	

				