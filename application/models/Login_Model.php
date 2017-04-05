<?php 
Class Login_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    
    function login($username,$password)
   {
   
    $code = 'Select email, password
            FROM user_acct
            WHERE email ="'.$username.'" and
                  password="'.$password.'"';

    $query = $this->db->query($code);
     if($query -> num_rows() == 1)
     {
       return $query->result();
     }
     else
     {
       return false;
     }
   }

   function check_email($username)
   {
   
    $code = 'Select email, password
            FROM user_acct
            WHERE email ="'.$username.'"';

    $query = $this->db->query($code);
     if($query -> num_rows() == 1)
     {
       return true;
     }
     else
     {
       return false;
     }
   }
   
   public function register($data)
  {
    $this->db->insert('user_acct', $data);

    $id = $this->db->insert_id();
    
    return (isset($id)) ? $id : FALSE;    
  }

   function __destruct() {
        $this->db->close();
    }

  function updateLogin($username, $login){
    $code = 'UPDATE collab.user_acct
         SET
        lastlogin = '.'"'.$login.'"'.'
        WHERE email = '.'"'.$username.'"'.';';
    $this->db->query($code);
  }

  function updateUserInfo($username, $pass){
    $code = 'UPDATE collab.user_acct
         SET
        password = '.'"'.$pass.'"'.'
        WHERE email = '.'"'.$username.'"'.';';
    $this->db->query($code);
  }
}