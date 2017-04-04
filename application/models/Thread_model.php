<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thread_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function fetch_comments($thread_id) {
		$query = $this->db->query('SELECT *
									FROM comments C, thread T, user_acct U
									WHERE T.thread_id = "'.$thread_id.'" and
									 C.comment_threadid = T.thread_id and
									 C.comment_acctid = U.user_id');
		
		if($query->num_rows()>0){
			return $query->result();
			
		}else {
			return NULL;
		}
	}

	public function add_comment($data){
		$this->db->insert('comments', $data);

	    $id = $this->db->insert_id();
	    
	    return (isset($id)) ? $id : FALSE;    
	}

	public function add_views($thread_id){
		$viewquery = $this->db->query('SELECT views
									FROM thread
									WHERE thread_id = "'.$thread_id.'"');

		$res = $viewquery->result();
		$views = $res[0]->views;
		$views++;
		$query = $this->db->query('UPDATE thread
									SET views = "'.$views.'"
									WHERE thread_id = "'.$thread_id.'"');		
	}

	public function getClassID($classid) {

		$query = $this->db->query('SELECT *
									FROM classes
									WHERE class_code = "'.$classid.'"');
		
		if($query->num_rows()==1){
			return $query->result();
			
		}else {
			return NULL;
		}
	}

	public function getAcctID($username) {
		$query = $this->db->query('SELECT *
									FROM user_acct
									WHERE email = "'.$username.'"');
		
		if($query->num_rows()==1){
			return $query->result();
			
		}else {
			return NULL;
		}
	}

	public function postThread($data) {
	    $this->db->insert('thread', $data);

	    $id = $this->db->insert_id();
	    
	    return (isset($id)) ? $id : FALSE;    
	}

	public function getFollowedClass($username) {
		$query = $this->db->query('Select *
									FROM user_acct, followedclass, classes
									where email = "'.$username.'"
									and follow_classid = class_id');
		
		if($query->num_rows() > 0){
			return $query->result();
			
		}else {
			return NULL;
		}
	}
}	
?>