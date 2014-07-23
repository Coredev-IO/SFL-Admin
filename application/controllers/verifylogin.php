<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {


   if($this->session->userdata('logged_in'))
   {
     redirect('home', 'refresh');
   }
   else
   {
     //This method will have the credentials validation
     $this->load->library('form_validation');

     $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
     $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

     if($this->form_validation->run() == FALSE)
     {
       //Field validation failed.&nbsp; User redirected to login page
      $data['main_cont'] = 'login';
      $this->load->view('includes/template_login', $data);
     }
     else
     {
       //Go to private area
       redirect('home', 'refresh');
     }

   }




 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', '<div class="alert alert-danger alert-dismissible animated fadeInDown" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Usuario y/o Contraseña incorrectos</div>');
     return false;
   }
 }




}
?>
