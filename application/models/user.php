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



//Obtiene sesion
function usuario_login($user, $pass)
{

 /*Funcion para validar informacón de inicio de sesión*/
   $this -> db -> select('id_cuenta, email');
   $this -> db -> from('cat_cuenta');
   $this -> db -> where('email', $user);
   $this -> db -> where('passw', MD5($pass));
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


function sfl_cv_02($id){
  $this -> db -> select('id_aspirante, id_cuenta, paterno, materno, nombre, fec_nac');
   $this -> db -> from('cat_aspirante');
   $this -> db -> where('id_cuenta', $id);
   $this-> db ->order_by('id_aspirante', 'DESC'); 
  $this-> db ->limit(1);


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


function Usfl_cv_02($id, $paterno, $materno, $nombre, $fec_nac){
        $data = array(
            'paterno' => $paterno,
            'materno' => $materno,
            'nombre' => $nombre,
            'fec_nac' => $fec_nac
        );
        $this->db->where('id_cuenta', $id);
        return $this->db->update('cat_aspirante', $data);
}


function sfl_cv_02a($id){
  $this -> db -> select('id_aspirante, id_cuenta, id_estado, id_del_mun, zona, calle, num_ext, num_int, colonia, cp');
   $this -> db -> from('cat_aspirante');
   $this -> db -> where('id_cuenta', $id);
   $this-> db ->order_by('id_aspirante', 'DESC'); 
  $this-> db ->limit(1);


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



function Usfl_cv_02a($id, $id_estado, $id_del_mun, $zona, $calle, $num_ext, $num_int, $colonia, $cp){
        $data = array(
           'id_estado' =>$id_estado, 
            'id_del_mun'=>$id_del_mun, 
           'zona' =>$zona, 
           'calle' =>$calle, 
           'num_ext' =>$num_ext, 
           'num_int' =>$num_int, 
           'colonia' =>$colonia, 
           'cp' =>$cp
        );
        $this->db->where('id_cuenta', $id);
        return $this->db->update('cat_aspirante', $data);
}




function sfl_cv_03($id){
  $this -> db -> select('id_aspirante, id_cuenta, tel_particular, tel_movil, tel_oficina, tel_rec, twitter, facebook, linkedin, rfc, curp, no_imss, no_clinica');

   $this -> db -> from('cat_aspirante');
   $this -> db -> where('id_cuenta', $id);
   $this-> db ->order_by('id_aspirante', 'DESC'); 
  $this-> db ->limit(1);


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



function Usfl_cv_03($id, $tel_particular, $tel_movil, $tel_oficina, $tel_rec, $twitter, $facebook, $linkedin, $rfc, $curp, $no_imss, $no_clinica){
        $data = array(
           'tel_particular' =>$tel_particular,
           'tel_movil'=>$tel_movil, 
           'tel_oficina'=>$tel_oficina, 
           'tel_rec' =>$tel_rec, 
           'twitter' =>$twitter, 
           'facebook' =>$facebook, 
           'linkedin' =>$linkedin, 
           'rfc' =>$rfc, 
           'curp' =>$curp, 
           'no_imss' =>$no_imss, 
           'no_clinica' =>$no_clinica
        );
        $this->db->where('id_cuenta', $id);
        return $this->db->update('cat_aspirante', $data);
}




// function sfl_cv_02a($id){
//   $this -> db -> select('id_aspirante, id_cuenta, id_estado, id_del_mun, zona, calle, num_ext, num_int, colonia, cp, tel_particular, tel_movil, tel_oficina, tel_rec, twitter, facebook, linkedin, rfc, curp, no_imss, no_clinica');
//    $this -> db -> from('cat_aspirante');
//    $this -> db -> where('id_cuenta', $id);
//    $this-> db ->order_by('id_aspirante', 'DESC'); 
//   $this-> db ->limit(1);


//    $query = $this -> db -> get();

//    if($query -> num_rows() == 1)
//    {
//      return $query->result();
//    }
//    else
//    {
//      return false;
//    }

// }


// //Obtiene datos de usuario
// function usuarioInfo($id)
// {

//   Tablas de informacion
//   cat_cuenta select('id_cuenta, email, passw');
//   cat_aspirante '$id_cuenta',
//                 '$paterno',
//                 '$materno',
//                 '$nombre',
//                 '$fec_nac',
//                 
//                 
//                 
//                 
//                 id_estado ='" . $id_estado . "',
//                 id_del_mun ='" . $id_del_mun . "',
//                 zona='" . $id_cat_zonas ."',
//                 calle ='" . $calle . "',
//                 num_ext ='" . $num_ext . "',
//                 num_int ='" . $num_int . "',
//                 colonia ='" . $colonia. "',
//                 cp ='" . $cp
//                 tel_particular ='" . $tel_particular . "',
//                 tel_movil ='" . $tel_movil . "',
//                 tel_oficina ='" . $tel_oficina . "',
//                   tel_rec ='" . $tel_reca . "',
//                     twitter ='" . $twitter . "',
//                 facebook ='" . $facebook . "',
//                   linkedin ='" . $linkedin . "',
//                 rfc ='" . $rfc . "',
//                 curp ='" . $curp . "',
//                 no_imss ='" . $no_imss . "',
//                 no_clinica ='" . $no_clinica . "'
//                 
//                 
//                 
//   cat_ref_persona 
//                 id_ref,
//               id_cuenta,
//                 ref_nom,
//                 ref_dom,
//                 ref_tel,
//                 ref_ocu,
//                 time_con
//   perf_exp
//             id_per_exp,
//                 id_cuenta,
//                 lug_nac,
//                 genero,
//                 edo_civil,
//                 auto_prop,
//                 auto_esta,
//                 mane_carre,
//                 dispo_viaj,
//                 dispo_res
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




//  /*Funcion para validar informacón de inicio de sesión*/
//    $this -> db -> select('id_cuenta, email');
//    $this -> db -> from('cat_cuenta');
//    $this -> db -> where('email', $user);
//    $this -> db -> where('passw', MD5($pass));
//    $this -> db -> limit(1);

//    $query = $this -> db -> get();

//    if($query -> num_rows() == 1)
//    {
//      return $query->result();
//    }
//    else
//    {
//      return false;
//    }

// }




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
