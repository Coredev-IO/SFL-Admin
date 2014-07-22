<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Becarios extends CI_Controller {


 public function __construct()
  {
    parent::__construct();

    $this->load->database();//cargamos controlador database
    $this->load->helper('url');
    $this->load->library('grocery_CRUD');//carga de libreria del crud
  }

 function index()
 {
   if($this->session->userdata('logged_in'))//Validar usuarios 
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['main_cont'] = 'becarios';
     $this->load->view('includes/template', $data);
     try{
      $crud = new grocery_CRUD();

      $crud->set_theme('datatables');
      $crud->set_table('becarios');
      $crud->set_subject('becario nuevo');
      $crud->required_fields('id','nombre','apellidop','apellidom');
      $crud->columns('nombre','apellidop','apellidom','telefono');

      $output = $crud->render();

      $this->_example_output($output);

    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }

 public function _example_output($output = null)
  {
    $this->load->view('becarios_crud.php',$output);
  }


}

?>