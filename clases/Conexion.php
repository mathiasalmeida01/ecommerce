<?php

require_once('./base-de-datos/config.php');//accedemos a la información que hay dentro de 

/*Creamos una clase que nos va a permitir conectarnos a la base de datos*/
 class Conexion{

   protected $conexion_db;

   public function __construct(){
     $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);
       if( $this->conexion_db->connect_errno) {
         echo "Fallo al conectar a MySQL:" . $this->conexion_db->connect_error;
         return;
       }
      $this->conexion_db->set_charset(DB_CHARSET);
   }
 }
