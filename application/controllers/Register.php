<?php
class Register extends CI_Controller {
 

 
 function index(){
 $this->load->model('login_model');

    $datestring = '%Y-%m-%d %H:%i:%s';
    $time = time();
    $timestamp = mdate($datestring, $time); 
    $this->form_validation->set_rules('firstName', 'First Name', 'required|xss_clean');
    $this->form_validation->set_rules('lastName', 'Last Name', 'required|xss_clean');
    $this->form_validation->set_rules('email', 'Email Address', 'xss_clean|callback_check_if_exists');  
    $this->form_validation->set_rules('regPass', 'Password', 'required|matches[confirmPass]');
    $this->form_validation->set_rules('confirmPass', 'Confirm Password', 'required');

    $this->form_validation->set_rules('idNumber', 'ID Number', 'required');
    $this->form_validation->set_rules('college', 'College', 'xss_clean');
    $this->form_validation->set_rules('degree', 'Degree', 'required|xss_clean');

    if($this->form_validation->run() == TRUE)
   {
     $data = array(
        'email'       => $this->input->post('email'),
        'password'    => $this->input->post('regPass'),
        'idnumber'    => $this->input->post('idNumber') ,
        'degree'     => $this->input->post('degree'),
        'college'     => $this->input->post('college'),
        'lastlogin'   => $timestamp,
        'fullname'    => $this->input->post('firstName') . ' ' . $this->input->post('lastName')
      );
     $this->login_model->register($data); 

     redirect('Home_Cont','refresh');
   }
   else
   {
     //Go to private area
      $this->load->view('login');
  
   }
}

  function check_if_exists($username){
    $this->load->model('login_model');
   //query the database
   $result = $this->login_model->check_email($username);
 
   if(!$result)
   {
     $sess_array = array();
    
       $sess_array = array(
         'username' => $this->input->post('username'));
       $this->session->set_userdata('logged_in', $sess_array);
    
       return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_if_exists', 'Email Address is taken');
     return false;
   }
  }

  function updateinfo(){
    $this->load->model('Login_model');
    $this->Login_model->updateInfo($this->input->post('useremail'),$this->input->post('newpass')); 
     redirect('Home_Cont','refresh');
  
  }
}
?>

