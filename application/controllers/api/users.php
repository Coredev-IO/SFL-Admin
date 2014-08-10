<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller
{

  /*Iniciar Sesion*/
  function login_post(){
     //Se crea ina sesion Temporal 
    $this->load->model('user','',TRUE);

    $email = $this->post('email');
    $pass = $this->post('pass');

    $result = $this->user->usuario_login($email, $pass);
    if($result){$this->response(array('success' => true, 'usuario' => $result), 200);}
    else{$this->response(array('message' => 'Usuario y/o contraseña incorrectos'), 200);}
    
  }

  /*Cerrar Sesion*/
  function logout_post(){
     //Se crea ina sesion Temporal 
    $this->load->model('user','',TRUE);

    $session = $this->post('session');
    $id = $this->post('id');


    $result = $this->user->usuario_logout($session, $id);
    if($result){$this->response(array('success' => true), 200);}
    else{$this->response(array('message' => 'Usuario y/o contraseña incorrectos'), 200);}
    
  }



  /*Ver taabla cat_aspirante*/
  function cat_aspirante_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);
      $id = $this->post('id');
      $session = $this->post('session');

      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);

      if ($sess){
        $result = $this->user->cat_aspirante($id);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
      }else{
        $this->response(array('message' => 'Inicie Session'), 200);
      }
    }


    /*Ver taabla cat_aspirante*/
  function session_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);
      $id = $this->post('id');
      $session = $this->post('session');

      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);


        if($sess){$this->response(array('success' => true), 200);}
        else{$this->response(array('message' => 'No sesion'), 200);}
    
    }



  /*Actualizar taabla cat_aspirante*/
  function u_cat_aspirante_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);

      $data = array(
            'paterno' => $this->post('paterno'),
            'materno' => $this->post('materno'),
            'nombre' => $this->post('nombre'),
            'fec_nac' => $this->post('fec_nac'),
            'id_estado' => $this->post('id_estado'),
            'id_del_mun' => $this->post('id_del_mun'),
            'zona' => $this->post('zona'),
            'calle' => $this->post('calle'),
            'num_ext' => $this->post('num_ext'),
            'num_int' => $this->post('num_int'),
            'colonia' => $this->post('colonia'),
            'cp' => $this->post('cp'),
            'tel_particular' => $this->post('tel_particular'),
            'tel_movil' => $this->post('tel_movil'),
            'tel_oficina' => $this->post('tel_oficina'),
            'tel_rec' => $this->post('tel_rec'),
            'twitter' => $this->post('twitter'),
            'facebook' => $this->post('facebook'),
            'linkedin' => $this->post('linkedin'),
            'rfc' => $this->post('rfc'),
            'curp' => $this->post('curp'),
            'no_imss' => $this->post('no_imss'),
            'no_clinica' => $this->post('no_clinica')
        );
      $id = $this->post('id');
      $session= $this->post('session');
      
      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);

      if ($sess){
        $result = $this->user->Ucat_aspirante($id, $data);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
      }else{
        $this->response(array('message' => 'Inicie Session'), 200);
      }
    }


  /*Ver taabla cat_ref_persona*/
  function cat_ref_persona_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);
      $id = $this->post('id');
      $session = $this->post('session');

      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);

      if ($sess){
        $result = $this->user->cat_ref_persona($id);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
      }else{
        $this->response(array('message' => 'Inicie Session'), 200);
      }
    }



     /*Actualizar taabla cat_ref_persona*/
  function u_cat_ref_persona_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);

      $data = array(
            'id_ref' => $this->post('id_ref'),
            'ref_nom' => $this->post('ref_nom'),
            'ref_dom' => $this->post('ref_dom'),
            'ref_tel' => $this->post('ref_tel'),
            'ref_ocu' => $this->post('ref_ocu'),
            'time_con' => $this->post('time_con')
        );
      $id = $this->post('id');
      $session= $this->post('session');
      $id_ref= $this->post('id_ref');
      
      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);

      if ($sess){
        $result = $this->user->Ucat_ref_persona($id, $id_ref, $data);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
      }else{
        $this->response(array('message' => 'Inicie Session'), 200);
      }
    }


  /*Inserta tabla cat_ref_persona*/
  function i_cat_ref_persona_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);

      $data = array(
            'id_cuenta' => $this->post('id'),
            'ref_nom' => $this->post('ref_nom'),
            'ref_dom' => $this->post('ref_dom'),
            'ref_tel' => $this->post('ref_tel'),
            'ref_ocu' => $this->post('ref_ocu'),
            'time_con' => $this->post('time_con')
        );
      $id = $this->post('id');
      $session= $this->post('session');
      
      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);

      if ($sess){
        $result = $this->user->Icat_ref_persona($data);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
      }else{
        $this->response(array('message' => 'Inicie Session'), 200);
      }
    }




    /*Ver taabla cat_ref_persona*/
  function perf_exp_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);
      $id = $this->post('id');
      $session = $this->post('session');

      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);

      if ($sess){
        $result = $this->user->perf_exp($id);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
      }else{
        $this->response(array('message' => 'Inicie Session'), 200);
      }
    }

       /*Actualizar taabla cat_ref_persona*/
  function u_perf_exp_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);

      $data = array(
            'lug_nac' => $this->post('lug_nac'),
            'genero' => $this->post('genero'),
            'edo_civil' => $this->post('edo_civil'),
            'auto_prop' => $this->post('auto_prop'),
            'auto_esta' => $this->post('auto_esta'),
            'mane_carre' => $this->post('mane_carre'),
            'dispo_viaj' => $this->post('dispo_viaj'),
            'dispo_res' => $this->post('dispo_res')
        );
      $id = $this->post('id');
      $session= $this->post('session');
      
      /*Se revisa seision*/
      $sess = $this->user->session($id, $session);

      if ($sess){
        $result = $this->user->Uperf_exp($id, $data);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
      }else{
        $this->response(array('message' => 'Inicie Session'), 200);
      }
    }





  /*Ver taabla estados*/
  function estados_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);


      $result = $this->user->estados();
        
        if($result){$this->response(array('success' => true,'estados' => $result), 200);}
        else{$this->response(array('message' => 'No estados'), 200);}
   
    }

    /*Ver taabla estados*/
  function delegaciones_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);

      $id_estado=$this->post('id_estado');

      $result = $this->user->delegaciones($id_estado);
        
        if($result){$this->response(array('success' => true,'delegaciones' => $result), 200);}
        else{$this->response(array('message' => 'No delegaciones'), 200);}
   
    }


      /*Ver taabla zona*/
  function zona_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);


      $result = $this->user->zona();
        
        if($result){$this->response(array('success' => true,'zona' => $result), 200);}
        else{$this->response(array('message' => 'No zona'), 200);}
   
    }


}
