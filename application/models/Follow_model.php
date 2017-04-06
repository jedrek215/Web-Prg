<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follow_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function follow_thread($data){
		$this->db->insert('followedthread', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE; 
	}

	public function follow_class($data){
		$this->db->insert('followedclass', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE; 
	}

	public function unfollow_thread($thread_id, $user_id){
		$query = $this->db->query('DELETE FROM followedthread
			WHERE follow_threadid = "'.$thread_id. '" and follow_acctid = "' .$user_id. '"');
	}

	public function unfollow_class($class_id, $user_id){
		$query = $this->db->query('DELETE FROM followedclass
			WHERE follow_classid = "'.$class_id. '" and follow_acctid = "' .$user_id. '"');
	}

	public function isFollowing_thread($thread_id, $user_id){
		$query = $this->db->query('SELECT *
			FROM followedthread
			WHERE follow_threadid = "'.$thread_id. '" and follow_acctid = "' .$user_id. '"');

		if($query->num_rows()==1) {
			return TRUE;
			
		}else {
			return FALSE;
		}
	}

	public function isFollowing_class($class_id, $user_id){
		$query = $this->db->query('SELECT *
			FROM followedclass
			WHERE follow_classid = "'.$class_id. '" and follow_acctid = "' .$user_id. '"');

		if($query->num_rows()==1) {
			return TRUE;
			
		}else {
			return FALSE;
		}
	}
}
?>