<?php
    include("./clases/Conexion.php");

    class Productos extends Conexion{

      public function __construct(){
      parent::__construct();
      }

    /*Método que se encarga de hacer la consulta SQL y devuelve un array con los registros  */
      public function get_productos(){
          $resultado = $this->conexion_db->query('SELECT * FROM productos');
          $productos = $resultado->fetch_all(MYSQLI_ASSOC);
          return $productos;
      }
    }
?>