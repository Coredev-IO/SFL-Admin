<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class AspirantesView extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		

		$this->load->view('example.php', $output);
	}

	

	public function index()
	{
		try{
			$session_data = $this->session->userdata('logged_in');
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('cat_cuenta');
			$crud->set_relation('cat_cuenta.id_cuenta','cat_aspirante','cat_aspirante.id_cuenta');
			$crud->set_subject('Usuarios');
			 $crud->unset_add();
			 $crud->unset_export();
			 $crud->unset_print();
			$crud->columns('id_cuenta', 'email', 'nombre');
			$crud->set_username($session_data['username']);
			$crud->set_tipo_user($session_data['tipo_user']);


			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	

}