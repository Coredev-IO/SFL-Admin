<?php
session_start(); //we need to call PHP's session object to access it through CI
class Reclutadores2 extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('user2');
	}
	function index()
	{


    if($this->session->userdata('logged_in'))
    {
			$session_data = $this->session->userdata('logged_in');
			if($session_data['tipo_user']==='A'){


			        $this->form_validation->set_rules('username', 'username', 'required|max_length[100]');

			        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			        $this->form_validation->set_rules('password', 'password', 'required|max_length[200]');
			        $this->form_validation->set_rules('tipo_user', 'tipo_user', 'required|max_length[1]');
			        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]');
			        $this->form_validation->set_rules('apellidop', 'ApellidoP', 'required|max_length[100]');
			        $this->form_validation->set_rules('apellidom', 'ApellidoM', 'required|max_length[100]');
			        $this->form_validation->set_rules('mail', 'mail', 'required|valid_email|max_length[300]');
			        $this->form_validation->set_rules('telefono', 'telefono', 'required|is_numeric|max_length[11]');
			        $this->form_validation->set_rules('celular', 'celular', 'required|is_numeric|max_length[11]');

			        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			        {

								if($session_data['tipo_user']==='A'){
									$data['main_cont'] = 'newReclutador2_view';
								}else{
									$data['main_cont'] = 'home2';
								}


			          $data['main_cont'] = 'newReclutador2_view';
			          $data['username'] = $session_data['username'];
								$data['tipo_user'] = $session_data['tipo_user'];
			          $this->load->view('includes/template', $data);
			        }
			        else // passed validation proceed to post success logic
			        {
			           // build array for the model

			          $form_data = array(
			                       'username' => set_value('username'),
			                       'password' => MD5(set_value('password')),
			                       'tipo_user' => set_value('tipo_user'),
			                       'nombre' => set_value('nombre'),
			                       'apellidop' => set_value('apellidop'),
			                       'apellidom' => set_value('apellidom'),
			                       'mail' => set_value('mail'),
			                       'telefono' => set_value('telefono'),
			                       'celular' => set_value('celular')
			                );

			          // run insert model to write data to db

			          if ($this->user2->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			          {
			            redirect('reclutadores');   // or whatever logic needs to occur

			          }
			          else
			          {
			          echo 'An error occurred saving your information. Please try again later';
			          // Or whatever error handling is necessary
			          }
			        }
						}else{
							redirect('home');
						}

			     }else{
			        $this->load->helper(array('form'));//Carga las sesiones
			      $data['main_cont'] = 'login';
			      $this->load->view('includes/template_login', $data);
			     }



	}







	function actualizar($id_usuario)
	{


    if($this->session->userdata('logged_in'))
    {
			$session_data = $this->session->userdata('logged_in');
			if($session_data['tipo_user']==='A'){


			        $this->form_validation->set_rules('username', 'username', 'required|max_length[100]');

			        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
			        $this->form_validation->set_rules('password', 'password', 'required|max_length[200]');
			        $this->form_validation->set_rules('tipo_user', 'tipo_user', 'required|max_length[1]');
			        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]');
			        $this->form_validation->set_rules('apellidop', 'ApellidoP', 'required|max_length[100]');
			        $this->form_validation->set_rules('apellidom', 'ApellidoM', 'required|max_length[100]');
			        $this->form_validation->set_rules('mail', 'mail', 'required|valid_email|max_length[300]');
			        $this->form_validation->set_rules('telefono', 'telefono', 'required|is_numeric|max_length[11]');
			        $this->form_validation->set_rules('celular', 'celular', 'required|is_numeric|max_length[11]');

			        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			        {

								if($session_data['tipo_user']==='A'){
									$data['main_cont'] = 'upReclutador2_view';
								}else{
									$data['main_cont'] = 'home2';
								}

					$result = $this->user2->consulta_reclutador($id_usuario);
					
					 if ($result) // the information has therefore been successfully saved in the db
			          {
			             $data['reclutador'] =$result;

			          }
			          else
			          {
			          	redirect('reclutadores'); 
			          }


			          // $data['main_cont'] = 'upReclutador2_view';
			          $data['id_usuario'] = $id_usuario;
			          $data['username'] = $session_data['username'];
								$data['tipo_user'] = $session_data['tipo_user'];
			          $this->load->view('includes/template', $data);
			        }
			        else // passed validation proceed to post success logic
			        {
			           // build array for the model

			          $form_data = array(
			                       'username' => set_value('username'),
			                       'password' => MD5(set_value('password')),
			                       'tipo_user' => set_value('tipo_user'),
			                       'nombre' => set_value('nombre'),
			                       'apellidop' => set_value('apellidop'),
			                       'apellidom' => set_value('apellidom'),
			                       'mail' => set_value('mail'),
			                       'telefono' => set_value('telefono'),
			                       'celular' => set_value('celular')
			                );

			          $result = $this->user2->UpForm($form_data, $id_usuario);
			      
			          	redirect('reclutadores');
			          
			        }
						}else{
							redirect('home');
						}

			     }else{
			        $this->load->helper(array('form'));//Carga las sesiones
			      $data['main_cont'] = 'login';
			      $this->load->view('includes/template_login', $data);
			     }



	}











	function borrar($id_usuario)
	{


    if($this->session->userdata('logged_in'))
    {
			$session_data = $this->session->userdata('logged_in');
			if($session_data['tipo_user']==='A'){
				$data['id_usuario'] = $id_usuario;
			    $data['main_cont'] = 'prueba_delete';
			    $data['username'] = $session_data['username'];
			    $data['id'] = $session_data['id'];
				$data['tipo_user'] = $session_data['tipo_user'];

				if($id_usuario===$session_data['id']){
					$data['mensaje'] = "No puedes borrar el usuario con el que iniciaste sesión";
				}else{
					 if ($this->user2->eliminarReclutador($id_usuario) == TRUE) 
				      {
			            $data['mensaje'] = "Usuario borrado correctamente";

			          }
			          else
			          {
			         	$data['mensaje'] = "Ocurrio un error al tratar de eliminar Usuario";

			          }


			    }
				$this->load->view('includes/template', $data);


			}else{
				redirect('home');
			}

	}else{
	   	$this->load->helper(array('form'));//Carga las sesiones
	  	$data['main_cont'] = 'login';
	  	$this->load->view('includes/template_login', $data);
	}



	}











	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>
