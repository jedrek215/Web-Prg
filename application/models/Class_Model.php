<?php
	class Class_Model extends CI_model{

	function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function getCollege()
   {
	   	$code ='SELECT * 
				FROM college ;';
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

   function getDepartment($collegeid)
   {
	   	$code ='SELECT * 
				FROM department
				where dept_collegeid ="'.$collegeid.'"';
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

   function getThread_Class($classid){
   		$code = 'SELECT *, count(comment_id) AS comment_count
					FROM followedclass, classes, user_acct, thread
					LEFT JOIN comments ON comments.comment_threadid = thread.thread_id
					where followedclass.follow_classid = classes.class_id
					and class_id ="'.$classid.'" and class_id = thread.thread_classid
					and user_id = thread_acctid and thread.status ="A"
					GROUP BY thread_id
					order by thread_datesub DESC';
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

   function getDeptName($deptid){
   		$code ='SELECT*
		FROM department
		where dept_id ="'.$deptid.'"';
   			$query = $this->db->query($code);

	     if($query -> num_rows() == 1)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return NULL;
	     }
   }

    function getClassCode($classid){
   		$code ='SELECT*
		FROM classes
		where class_id ="'.$classid.'"';
   			$query = $this->db->query($code);

	     if($query -> num_rows() == 1)
	     {
	       return $query->result();
	     }
	     else
	     {
	       return NULL;
	     }
   }

   function getClasses($deptid){
	   	$code ='SELECT *
				FROM classes, department
				where dept_id = class_deptid and
				dept_id ="'.$deptid.'"';
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