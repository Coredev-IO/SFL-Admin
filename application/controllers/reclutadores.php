<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Reclutadores extends CI_Controller {

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
        $result = $this->user->reclutadores();
        $data['users'] = $result;
        $data['tipo_user'] = $session_data['tipo_user'];

        if($session_data['tipo_user']==='A'){
          $data['main_cont'] = 'reclutadores_view';
       }else{
         $data['main_cont'] = 'home2';
       }

        $data['username'] = $session_data['username'];
        $this->load->view('includes/template', $data);
     }else{
        $this->load->helper(array('form'));//Carga las sesiones
      $data['main_cont'] = 'login';
      $this->load->view('includes/template_login', $data);
     }
   }

   public function nuevo_reclutador()
   {
     if($this->session->userdata('logged_in'))
     {
         $session_data = $this->session->userdata('logged_in');
         $this->load->model('user');
         $result = $this->user->reclutadores();
         $data['users'] = $result;
         $data['tipo_user'] = $session_data['tipo_user'];

         $data['main_cont'] = 'newReclutador';
         $data['username'] = $session_data['username'];
         $this->load->view('includes/template', $data);
      }else{
         $this->load->helper(array('form'));//Carga las sesiones
       $data['main_cont'] = 'login';
       $this->load->view('includes/template_login', $data);
      }
    }




  public function newReclutador()
  {


     if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');
     $this->load->model('user');
     $this->load->helper('form');
     $this->load->library('form_validation');
                      // 'username' => $datos['username'],
                      // 'password' => $datos['password'],
                      // 'tipo_user' => $datos['tipo_user'],
                      // 'Nombre' => $datos['Nombre'],
                      // 'ApellidoP' => $datos['ApellidoP'],
                      // 'ApellidoM' => $datos['ApellidoM'],
                      // 'mail' => $datos['mail'],
                      // 'telefono' => $datos['telefono']

     $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
    //  $this->form_validation->set_rules('password', 'Password', 'required||min_length[6]');
    //  $this->form_validation->set_rules('tipo_user', 'tipo_user', 'required');
    //  $this->form_validation->set_rules('Nombre', 'Nombre', 'required');
    //  $this->form_validation->set_rules('ApellidoP', 'ApellidoP', 'required');
    //  $this->form_validation->set_rules('ApellidoM', 'ApellidoM', 'required');
    //  $this->form_validation->set_rules('mail', 'mail', 'required|valid_email');
    //  $this->form_validation->set_rules('telefono', 'telefono', 'required|min_length[8]');



     /*Datos*/
     $datos = array(

        'username' => $this->input->post('username'),
        // 'password' => $this->input->post('password'),
        // 'tipo_user' => $this->input->post('tipo_user'),
        // 'Nombre' => $this->input->post('Nombre'),
        // 'ApellidoP' => $this->input->post('ApellidoP'),
        // 'ApellidoM' => $this->input->post('ApellidoM'),
        // 'mail' => $this->input->post('mail'),
        // 'telefono' => $this->input->post('telefono')

     );

     if($this->form_validation->run() === true){
         $this->user->insert_reclutador($datos);
         $data['main_cont'] = 'reclutadores_view';
        $data['username'] = $session_data['username'];
        $this->load->view('includes/template', $data);
     }else{
        $data['main_cont'] = 'newReclutador';
        $data['username'] = $session_data['username'];
        $this->load->view('includes/template', $data);
     }
    }
    else
    {
      //If no session, redirect to login page
      $this->load->helper(array('form'));//Carga las sesiones
      $data['main_cont'] = 'login';
      $this->load->view('includes/template_login', $data);
    }
  }





  //   public function actuExpedientes($id)
  // {



  //   if($this->session->userdata('logged_in')){
  //    $session_data = $this->session->userdata('logged_in');
  //    $this->load->model('expedientesVet');
  //    $this->load->helper('form');
  //    $this->load->library('form_validation');

  //    $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');
  //    $this->form_validation->set_rules('responsable', 'Responsable', 'required|valid_email');
  //    $this->form_validation->set_rules('especie', 'Especie', 'required|min_length[0]');
  //    $this->form_validation->set_rules('raza', 'Raza', 'required|min_length[0]');
  //    $this->form_validation->set_rules('sexo', 'Sexo', 'required|min_length[0]');
  //    $this->form_validation->set_rules('edad', 'Edad', 'required|min_length[0]');
  //    $this->form_validation->set_rules('color', 'Color', 'required|min_length[0]');


  //    /*Datos*/
  //    $datos = array(
  //       "id" => $id,
  //       "username" => $session_data['username'],
  //       "nombre" => $this->input->post('nombre'),
  //       "responsable" => $this->input->post('responsable'),
  //       "especie" => $this->input->post('especie'),
  //       "raza" => $this->input->post('raza'),
  //       "sexo" => $this->input->post('sexo'),
  //       "edad" => $this->input->post('edad'),
  //       "color" => $this->input->post('color')
  //    );

  //    if($this->form_validation->run() === true){
  //        $this->expedientesVet->update_expediente($datos);
  //        $data['username'] = $session_data['username'];
  //        //$data['main_cont'] = 'expClinica';
  //        //$this->load->view('includes/template_mascotasApp', $data);
  //        //header('Location:'.base_url().'index.php/home/');
  //        redirect('home/hojaClinica', 'refresh');
  //    }else{
  //        $result = $this->expedientesVet->simpleExpedientes($id);
  //        $data['id'] = $id;
  //        $data['expediente'] = $result;
  //       $data['main_cont'] = 'updateExpClinico';
  //       $data['username'] = $session_data['username'];
  //       $this->load->view('includes/template_mascotasApp', $data);
  //    }


  //  }
  //  else
  //  {
  //   redirect('clientesAppLogin', 'refresh');
  //   // $this->load->helper(array('form'));//Carga las sesiones
  //   // $data['main_cont'] = 'clientesAppLogin';
  //   // $this->load->view('includes/template_mascotasApp', $data);
  //  }
  // }





}
