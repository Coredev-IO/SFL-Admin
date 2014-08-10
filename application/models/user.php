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


/*******************        FUNCIONES PARA API         *************************/

/*Iniciar Session*/
function usuario_login($user, $pass)
{
  $session = '';
  $pattern = '1234567890abcdefghijklmnopqrstuvwxyz%&#';
  $max = strlen($pattern)-1;
  for($i=0;$i < 25;$i++) $session .= $pattern{mt_rand(0,$max)};

   $data = array('session' => $session);
   $this -> db -> where('email', $user);
   $this -> db -> where('passw', MD5($pass));
   $this->db->update('cat_cuenta', $data);

 /*Funcion para validar informacón de inicio de sesión*/
   $this -> db -> select('id_cuenta, email, session');
   $this -> db -> from('cat_cuenta');
   $this -> db -> where('email', $user);
   $this -> db -> where('passw', MD5($pass));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1) {return $query->result();}
   else{return false;}

}

/*Cerrar Session*/
function usuario_logout($session, $id)
{
   $data = array('session' => "");
   $this -> db -> where('session', $session);
   $this -> db -> where('id_cuenta', $id);
   $this->db->update('cat_cuenta', $data);
   return true;
}

/*Revisar session*/
function session($id, $session){
   $this -> db -> select('*');
   $this -> db -> from('cat_cuenta');
   $this -> db -> where('id_cuenta', $id);
   $this -> db -> where('session', $session);

   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1) {return true;}
   else{return false;}
}

function cat_aspirante($id){
  $this -> db -> select('*');
  $this -> db -> from('cat_aspirante');
  $this -> db -> where('id_cuenta', $id);

  $this-> db ->order_by('id_aspirante', 'DESC'); 
  $this-> db ->limit(1);


  $query = $this -> db -> get();

  if($query -> num_rows() == 1){return $query->result();}
  else{return false;}

}


function Ucat_aspirante($id, $data){
  $this->db->where('id_cuenta', $id);
  return $this->db->update('cat_aspirante', $data);
}


function cat_ref_persona($id){
  $this -> db -> select('*');
  $this -> db -> from('cat_ref_persona');
  $this -> db -> where('id_cuenta', $id);

  $this-> db ->order_by('id_ref', 'DESC'); 



  $query = $this -> db -> get();

  if($query -> num_rows() > 0){return $query->result();}
  else{return false;}

}


//Actualiza  informacion cat_ref_persona
function Ucat_ref_persona($id, $id_ref, $data){
  $this->db->where('id_cuenta', $id);
  $this->db->where('id_ref', $id_ref);
  return $this->db->update('cat_ref_persona', $data);
}

//Inserrtar  informacion cat_ref_persona
function Icat_ref_persona($data){
  return $this->db->insert('cat_ref_persona',$data);
}



function perf_exp($id){
  $this -> db -> select('*');
  $this -> db -> from('perf_exp');
  $this -> db -> where('id_cuenta', $id);

  $this-> db ->order_by('id_per_exp', 'DESC'); 
  $query = $this -> db -> get();

  if($query -> num_rows() > 0){return $query->result();}
  else{return false;}
}

//Actualiza  informacion perf_exp
function Uperf_exp($id, $data){
  $this->db->where('id_cuenta', $id);
  return $this->db->update('perf_exp', $data);
}




function estados(){
  $this -> db -> select('*');
  $this -> db -> from('cat_estados');

  $this-> db ->order_by('estado', 'ASC'); 
  $query = $this -> db -> get();

  if($query -> num_rows() > 0){return $query->result();}
  else{return false;}
}


function delegaciones($id_estado){
  $this -> db -> select('*');
  $this -> db -> from('cat_mun_del');
  $this -> db -> where('id_estado', $id_estado);


  $this-> db ->order_by('del_mun', 'ASC'); 
  $query = $this -> db -> get();

  if($query -> num_rows() > 0){return $query->result();}
  else{return false;}
}

function zona(){
  $this -> db -> select('*');
  $this -> db -> from('cat_zonas');

  $this-> db ->order_by('id_cat_zonas', 'ASC'); 
  $query = $this -> db -> get();

  if($query -> num_rows() > 0){return $query->result();}
  else{return false;}
}

//   app_industria
//             id_industria,
//                 id_cuenta,
//                 id_cat_industria
//   app_posicion
//                id_posicion,
//                 id_cuenta,
//                 id_cat_posicion

//   app_line
//       id_line,
//       id_cuenta,
//       id_cat_line

//   app_canales
//                 id_canales,
//                 id_cuenta,
//                 id_cat_canales

// app_especialidad
//           id_especialidad,
//                 id_cuenta,
//                 id_cat_especialidad

// app_producto
//                 id_producto,
//                 id_cuenta,
//                 id_cat_producto

// app_zona_job
//         id_zona,
//         id_cuenta,
//         id_cat_zona

// app_ciudades_job
//                 id_ciudades,
//                 id_cuenta,
//                 id_cat_ciudades

// area_experiencia
//       id_area_exp,
//                 id_cuenta,
//                 experiencia

// auditorias
//       id_auditoria,
//                 id_cuenta,
//                 auditoria

// canales_job 
//       id_canales_job,
//                 id_cuenta,
//                 canales

// academia
//                 id_academia,
//                 id_cuenta,
//                 nivel,
//                 instituto,
//                 status,
//                 fecha_i,
//                 fecha_f 

// estudios
//     id_estudios,
//                 id_cuenta,
//                 estudios, 
//         status,
//         de,
//         a   

// tecnologia
//       id_tecnologia,
//          id_cuenta,
//           word,
//          powerpoint,
//          acces,
//          excel,
//          otras_tec 

// laboral
//       id_laboral,
//               id_cuenta,
//               empresa,
//               tipo,
//               area,
//               giro,
//               puesto,
//               sueldo,
//                 funciones,
//               logros,
//               jefe,
//               puesto_jefe,
//               e_mail,
//               telefono,
//               fecha_i,
//               fecha_f,
//               actual_job,
//               autorizo_ref,
//               separacion

//   intereses
//       id_interes,
//                 id_cuenta,
//                 puesto,
//                 sueldo,
//                 area_int,
//                 dis_time
//   idiomas
//       id_idiomas,
//                 id_cuenta,
//                 idioma_1,
//                 idioma_2,
//                 idioma_3 
















}
?>
