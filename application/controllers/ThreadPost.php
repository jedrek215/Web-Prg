<?php
class ThreadPost extends CI_Controller {
   

   
   function index(){
     $this->load->model('login_model');

     $this->form_validation->set_rules('collabTitle', 'Collaborate Title', 'required');
     $this->form_validation->set_rules('collabDesc', 'Collaborate Description', 'required');
     $this->form_validation->set_rules('collabSelect', 'Collaborate Subjects', 'required');  
     
     $this->load->model('thread_model');
     $this->load->model('Home_model');
     $query = $this->Home_model->get_userId($this->input->post('username'));
     if($query){
        foreach($query as $row){
          $id = $row->user_id;
      }
  }

  if($this->form_validation->run() == TRUE)
  {
     $data = array(
        'thread_classid' => $this->input->post('collabSelect'),
        'thread_title'    =>$this->input->post('collabTitle'),
        'thread_desc'    =>$this->input->post('collabDesc'),
        'thread_datesub' =>$this->input->post('dateSub'),
        'thread_acctid' =>$id,
        'status' => "A"
        );
     $this->thread_model->postThread($data);
     redirect('/Home_Cont', 'refresh'); 
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
}
?>

