<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "127.0.0.1";    // sera el valor de nuestra BD 
	$basededatos = "ecommerce";    // sera el valor de nuestra BD 
	$usuariodb = "root";    // sera el valor de nuestra BD 
	$clavedb = "";    // sera el valor de nuestra BD 

	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);

	if ($conexion->connect_errno) {
	    echo "Existen problemas en el sitio";
	    exit();
	}
?>