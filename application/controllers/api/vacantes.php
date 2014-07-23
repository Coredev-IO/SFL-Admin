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

class Vacantes extends REST_Controller
{
  function todasVacantes_post()
    {
      //Acceso a modelo para obtener datos
      $this->load->model('user','',TRUE);
      $result = $this->user->vacantes();





        if($result)
        {
            $this->response($result, 200);
        }

        else
        {
            $this->response(array('message' => 'No hay vacantes'), 200);
        }
    }








  public function send_post()
  {
    var_dump($this->request->body);
  }


  public function send_put()
  {
    var_dump($this->put('foo'));
  }
}
