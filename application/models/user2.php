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


	function UpForm($form_data, $id)
	{	
		$this->db->where('id', $id);
		$this->db->update('users', $form_data);
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

	 function eliminarReclutador($id)
    {
        $this->db->where('id',$id);

        if($this->db->delete('users')==TRUE){
        	return TRUE;
        }
        else{
        	return FALSE;
        }
    }


    function consulta_reclutador($id)
    {
    	$this -> db -> select('*');
   		$this -> db -> from('users');
        $this->db->where('id',$id);

        $query = $this -> db -> get();        	
        return $query->result();
       
    }


}
?>
