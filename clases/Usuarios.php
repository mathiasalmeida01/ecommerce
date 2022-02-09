<?php
    include("./clases/Conexion.php");

    class Usuarios extends Conexion{

      public function __construct(){
      parent::__construct();
      }

    /*Método que se encarga de hacer la consulta SQL y devuelve un array con los registros  */
      public function get_usuario($email,$pasword){
          $resultado = $this->conexion_db->query("SELECT id,email,nombre,rol from usuarios where email='" . $email . "' and pass='" . $pasword . "';  ");
          $usuario = $resultado->fetch_all(MYSQLI_ASSOC);
          return $usuario;
      }
    }
?>