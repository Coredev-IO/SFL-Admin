<?php
Class User extends CI_Model
{

 function login($username, $password)
 {
  /*Funcion para validar informacón de inicio de sesión*/
   $this -> db -> select('id, username, password, tipo_user');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }



function obtId($username)
{
   /*Obtinene solo el Id de usuario*/
   $this -> db -> select('id');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> limit(1);

   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }

}



function obtTipo($username)
{
   /*Obtinene solo el Id de usuario*/
   $this -> db -> select('tipo_user');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> limit(1);

   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }

}




//Obtiene Todas las vacantes
function vacantes()
{
 /*Funcion para validar informacón de inicio de sesión*/

  $this -> db -> select('id_vacante, vacante, empresa, descripcion, lugar, salario, horario, fecha, escolaridad, experiencia');
  $this->db->order_by("fecha","asc");
  $this -> db -> from('vacantes');


  $query = $this -> db -> get();


    return $query->result();

}


//Obtiene Todas las vacantes Full
function vacantes_full()
{
 /*Funcion para validar informacón de inicio de sesión*/

  $this -> db -> select('*');
  $this->db->order_by("fecha","asc");
  $this -> db -> from('vacantes');


  $query = $this -> db -> get();


    return $query->result();

}








//Obtiene Todas las vacantes
function reclutadores()
{
 /*Funcion para validar informacón de inicio de sesión*/

  $this -> db -> select('*');
  $this->db->order_by("tipo_user","asc");
  $this -> db -> from('users');


  $query = $this -> db -> get();


    return $query->result();

}



function aspirantes()
{
 /*Funcion para validar informacón de inicio de sesión*/

  $this -> db -> select('*');
  $this->db->order_by("paterno","asc");
  $this -> db -> from('cat_aspirante');


  $query = $this -> db -> get();


    return $query->result();

}


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


}
?>
