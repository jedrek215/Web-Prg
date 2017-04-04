<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
  
	function fetch_all_threads(){
		$query = $this->db->query('SELECT *, count(com.comment_id) AS comment_count
									FROM classes C, user_acct U, thread T
									LEFT JOIN comments com ON COM.comment_threadid = T.thread_id
									WHERE U.user_id = T.thread_acctid and C.class_id = T.thread_classid
									GROUP BY thread_id
									order by thread_datesub DESC');
		
		if($query->num_rows()>0){
			return $query->result();
			
		}else {
			return NULL;
		}
	}
	
	function fetch_following_threads(){

	}
	function fetch_thread($thread_id){
		$query = $this->db->query('SELECT *, count(com.comment_id) AS comment_count
									FROM classes C, user_acct U, thread T
									LEFT JOIN comments com ON COM.comment_threadid = T.thread_id
									WHERE T.thread_id = "'.$thread_id.'" and U.user_id = T.thread_acctid and C.class_id = T.thread_classid');
				
		if($query->num_rows()>0){
			return $query->result();
			
		}else {
			return NULL;
		}
	}
	
	function post_thread($thread_data){
		if ($this->db->insert('thread',$thread_data) ) {
            return $this->db->insert_id();
			
        }else {
            return false;
			
        }
    }
	
	function get_classId($class_code){
		$query = $this->db->query('SELECT class_id
									FROM classes
									WHERE class_code = "' .$class_code. '"');
									
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
									
		if($query->num_rows()>0){
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

				