<?php

	$server = "localhost";
	$user = "root";
	$password = "desarrollo.toexpress.2019";//poner tu propia contraseña, si tienes una.
	$bd = "dbLogistica";

	$conexion = mysqli_connect($server, $user, $password, $bd);
	if (!$conexion){
		die('Error de Conexión: ' . mysqli_connect_errno());
	}
?>
