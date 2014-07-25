<?php
session_start(); //we need to call PHP's session object to access it through CI
class Vacantes2 extends CI_Controller {

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


			      $this->form_validation->set_rules('vacante', 'vacante', 'required|max_length[250]');
						$this->form_validation->set_rules('empresa', 'empresa', 'required|max_length[200]');
						$this->form_validation->set_rules('descripcion', 'descripcion', 'required|max_length[1000]');
						$this->form_validation->set_rules('lugar', 'lugar', 'required|max_length[250]');
						$this->form_validation->set_rules('salario', 'salario', 'required|max_length[20]');
						$this->form_validation->set_rules('horario', 'horario', 'required|max_length[100]');
						$this->form_validation->set_rules('escolaridad', 'escolaridad', 'required|max_length[300]');
						$this->form_validation->set_rules('experiencia', 'experiencia', 'max_length[1000]');
						$this->form_validation->set_rules('contacto', 'contacto', 'max_length[100]');
						$this->form_validation->set_rules('contacto_mail', 'contacto_mail', 'required|max_length[300]|valid_email|');
						$this->form_validation->set_rules('status', 'status', 'required|max_length[1]');

						$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			        {



			          $data['main_cont'] = 'newVacante2_view';
			          $data['username'] = $session_data['username'];
								$data['tipo_user'] = $session_data['tipo_user'];
			          $this->load->view('includes/template', $data);
			        }
			        else // passed validation proceed to post success logic
			        {
			           // build array for the model

			          $form_data = array(
			                      'vacante' => set_value('vacante'),
										       	'empresa' => set_value('empresa'),
										       	'descripcion' => set_value('descripcion'),
										       	'lugar' => set_value('lugar'),
										       	'salario' => set_value('salario'),
										       	'horario' => set_value('horario'),
										       	'escolaridad' => set_value('escolaridad'),
										       	'experiencia' => set_value('experiencia'),
										       	'contacto' => set_value('contacto'),
										       	'contacto_mail' => set_value('contacto_mail'),
										       	'status' => set_value('status'),
														'fecha' => date("Y-m-d")
			                );

			          // run insert model to write data to db

			          if ($this->user2->SaveFormVacantes($form_data) == TRUE) // the information has therefore been successfully saved in the db
			          {
			            redirect('vacantes');   // or whatever logic needs to occur

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

	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>
