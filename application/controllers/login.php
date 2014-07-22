<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct(){
      parent::__construct();
  }


  public function index()
  {
    $this->load->helper(array('form'));//Carga las sesiones 
    $data['main_cont'] = 'login';
    $this->load->view('includes/template_login', $data);
  }
}
