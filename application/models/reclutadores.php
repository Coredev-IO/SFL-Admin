<?php 

Class Reclutadores extends CI_Model{



  


     function insert_reclutador($datos){
        $data = array(
                      'username' => $datos['username'],
                      'password' => $datos['password'],
                      'tipo_user' => $datos['tipo_user'],
                      'Nombre' => $datos['Nombre'],
                      'ApellidoP' => $datos['ApellidoP'],
                      'ApellidoM' => $datos['ApellidoM'],
                      'mail' => $datos['mail'],
                      'telefono' => $datos['telefono'],
                      'celular' => $datos['celular']
                        );
       $this->db->insert('users',$data);

        }


    function eliminarReclutador($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('users');
    }

    function update_reclutador($datos){
        $data = array(
                      'username' => $datos['username'],
                      'password' => $datos['password'],
                      'tipo_user' => $datos['tipo_user'],
                      'Nombre' => $datos['Nombre'],
                      'ApellidoP' => $datos['ApellidoP'],
                      'ApellidoM' => $datos['ApellidoM'],
                      'mail' => $datos['mail'],
                      'telefono' => $datos['telefono'],
                      'celular' => $datos['celular']
                        );
        $this->db->where('id', $datos['id']);
       $this->db->update('users',$data);

        }


     function consultaReclutadores()
         {
           $this -> db -> select('id');
           $this -> db -> from('users');
           $query = $this -> db -> get();
           return $query->result();
           
         }




    function simpleReclutador($id)
     {
       $this -> db -> select('*');
       $this -> db -> from('users');
       $this->db->where('id',$id);
       $query = $this -> db -> get();
        
       return $query->result();
       
     }






}

/* End of file usuarios_mascotas.php */
/* Location: ./application/models/usuarios_mascotas.php */

