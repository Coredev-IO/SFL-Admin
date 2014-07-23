<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct(){
      parent::__construct();
  }


  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      redirect('home', 'refresh');
    }
    else
    {
      //If no session, redirect to login page
      $this->load->helper(array('form'));//Carga las sesiones
      $data['main_cont'] = 'home';
      $this->load->view('includes/template', $data);
    }

  }
}
