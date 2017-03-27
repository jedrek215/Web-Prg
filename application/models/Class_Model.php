<?php
	class Class_Model extends CI_model{


	function __construct() {
        parent::__construct();
        $this->load->database();
    }


	    function getCollege()
	   {
	   	$code ='SELECT * 
				FROM college, department
				where dept_collegeid = college_id;';
	   			$query = $this->db->query($code);

	     if($query -> num_rows() > 0)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return NULL;
	     }
	   }

	   function getDepartment()
	   {
	   	$code ='SELECT * 
				FROM department';
	   			$query = $this->db->query($code);

	     if($query -> num_rows() > 0)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return NULL;
	     }
	   }

}
?>