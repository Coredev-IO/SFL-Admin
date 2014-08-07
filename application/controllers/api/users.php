<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller
{
  function login_post(){

    $this->load->model('user','',TRUE);

    $email = $this->post('email');
    $pass = $this->post('pass');


    $result = $this->user->usuario_login($email, $pass);


        if($result)
        {
            $this->response(array('success' => true, 'usuario' => $result), 200);
        }

        else
        {
            $this->response(array('message' => 'Usuario y/o contraseña incorrectos'), 200);
        }
    
  }

  function sfl_cv_02_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);
      $id = $this->post('id');
      $result = $this->user->sfl_cv_02($id);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
    }

  function Usfl_cv_02_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);

      $id = $this->post('id');
      $paterno= $this->post('paterno');
      $materno= $this->post('materno');
      $nombre= $this->post('nombre');
      $fec_nac= $this->post('fec_nac');
      
      $result = $this->user->Usfl_cv_02($id, $paterno, $materno, $nombre, $fec_nac);

        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
    }


    function sfl_cv_02a_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);
      $id = $this->post('id');
      $result = $this->user->sfl_cv_02a($id);
        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
    }


    function Usfl_cv_02a_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);

      $id = $this->post('id');
      $id_estado = $this->post('id_estado');
      $id_del_mun = $this->post('id_del_mun'); 
      $zona = $this->post('zona'); 
      $calle = $this->post('calle'); 
      $num_ext = $this->post('num_ext'); 
      $num_int = $this->post('num_int'); 
      $colonia = $this->post('colonia'); 
      $cp = $this->post('cp');

      $result = $this->user->Usfl_cv_02a($id, $id_estado, $id_del_mun, $zona, $calle, $num_ext, $num_int, $colonia, $cp);

        if($result){$this->response(array('success' => true,'usuario' => $result), 200);}
        else{$this->response(array('message' => 'No usuario'), 200);}
    }



}
