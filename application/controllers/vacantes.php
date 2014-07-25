<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Vacantes extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
        $session_data = $this->session->userdata('logged_in');
        $this->load->model('user');
        $result = $this->user->vacantes_full();
        $data['vacantes'] = $result;

        $data['main_cont'] = 'vacantes_view';
        $data['username'] = $session_data['username'];
        $data['tipo_user'] = $session_data['tipo_user'];
        $this->load->view('includes/template', $data);
     }else{
        $this->load->helper(array('form'));//Carga las sesiones
      $data['main_cont'] = 'login';
      $this->load->view('includes/template_login', $data);
     }
   }



}
