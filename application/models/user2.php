<?php

class User2 extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------

      /**
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{
		$this->db->insert('users', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}


	function SaveFormVacantes($form_data)
	{
		$this->db->insert('vacantes', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

}
?>
