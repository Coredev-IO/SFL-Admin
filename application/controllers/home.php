<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['tipo_user'] = $session_data['tipo_user'];

     if($session_data['tipo_user']==='A'){
       $data['main_cont'] = 'home';
    }else{
      $data['main_cont'] = 'home2';
    }
     $this->load->view('includes/template', $data);
   }
   else
   {
     $this->load->helper(array('form'));//Carga las sesiones
     $data['main_cont'] = 'login';
     $this->load->view('includes/template_login', $data);
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   $this->load->helper(array('form'));//Carga las sesiones
   $data['main_cont'] = 'login';
   $this->load->view('includes/template_login', $data);
 }




}

?>
