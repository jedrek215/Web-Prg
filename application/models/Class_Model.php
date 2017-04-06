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
					FROM classes, user_acct, thread
					LEFT JOIN comments ON comments.comment_threadid = thread.thread_id and comments.status = "A"
					where class_id ="'.$classid.'" and class_id = thread.thread_classid
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
	   	$code ='SELECT *, count(thread_id) AS post_count
				FROM  department, classes
				LEFT JOIN thread ON thread.thread_classid = classes.class_id AND thread.status = "A"
				WHERE dept_id = class_deptid and
				dept_id ="'.$deptid.'"
				GROUP BY class_id';

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

   function getClassFollowers($classid){
   		$code = 'Select count(follow_acctid) AS follower_count
   				FROM classes c
   				LEFT JOIN followedclass f ON f.follow_classid = c.class_id
   				WHERE c.class_id = "'.$classid.'"
   				GROUP BY c.class_id'; 
   		$query = $this->db->query($code);

	    if($query -> num_rows() == 1)
	    {
	    	$res = $query->result();
	       	return $res[0]->follower_count;
	    }
	    else
	    {
	       return NULL;
	    }
   }
}
?>