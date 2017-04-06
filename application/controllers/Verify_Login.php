<?php
class Verify_Login extends CI_Controller {


   function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->model('login_model');
  }

  function index()
  {
   //This method will have the credentials validation
      $datestring = '%Y-%m-%d %H:%i:%s';
      $time = time();
      $timestamp = mdate($datestring, $time); 
      $this->form_validation->set_rules('username', 'Username');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

      if($this->form_validation->run() == TRUE)
      {
     //Field validation failed.  User redirected to login page
        $this->login_model->updateLogin($this->input->post('username'),$timestamp);
        redirect('Home_Cont', 'refresh');
    }
    else
    {
     //Go to private area
        $this->load->view('login');

    }

}

function check_database($password)
{
  $username = $this->input->post('username');
   //query the database
  $result = $this->login_model->login($username, $password);

  if($result)
  {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->email
         );
       $this->session->set_userdata('logged_in', $sess_array);
   }
   return TRUE;
}
else
{
 $this->form_validation->set_message('check_database', 'Invalid username or password');
 return false;
}
}
}




?>
