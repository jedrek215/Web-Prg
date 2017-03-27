<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thread_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function fetch_comments($thread_id){
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
}