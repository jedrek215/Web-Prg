<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Follow_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function follow_Thread($data){
		$this->db->insert('followedthread', $data);
	}
}
?>