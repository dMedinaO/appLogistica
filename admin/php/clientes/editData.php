<?php

	include("../connection.php");#incluimos la base de datos

	$name = $_REQUEST['name'];
	$rut = $_REQUEST['rut'];
	$oldRut = $_REQUEST['oldRut'];

	$query = "update cliente set cliente.rutCliente = '$rut', cliente.nombreCliente = '$name', cliente.modifiedClient = NOW() where cliente.rutCliente='$oldRut'";
	$informacion["query1"] = $query;

	$resultado = mysqli_query($conexion, $query);

	$informacion["response"] = verificar_resultado( $resultado, $informacion);
	echo json_encode($informacion);
	cerrar( $conexion );

	function verificar_resultado($resultado){

		if (!$resultado) $informacion["respuesta"] = "ERROR";
		else $informacion["respuesta"] ="BIEN";
		return $informacion;
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
?>
