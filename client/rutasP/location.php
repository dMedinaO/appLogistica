<?php

include_once "connection.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// se inicializa la conexion a la base de datos
if ( !isset($conn) ){
    $conn = mysqli_connect($server, $user, $password, $bd);
    mysqli_set_charset($conn,"utf8");
    if (!$conn){
        http_response_code(500);
        echo json_encode(array("message", "Can't connect to database."));
        die();
    }
}

/*
* Esta variable define que cliente esta realizando la consultda.
* Se debe setear al rut correcto.
* El rut del cliente debe coincidir con el del rutReceptor de la tabla "documento".
*/
$rutCliente = $_GET["rutCliente"];

$query =<<<'QUERY'
select chofer.rutChofer as rut, chofer.nombre, chofer.latitud, chofer.longitud, chofer.ultimaActualizacion
from ruta
join documento_en_ruta dr on dr.ruta = ruta.idrutas 
join documento d on dr.documento = d.iddocumento
join cliente c on c.rutCliente = d.rutReceptor
join chofer on ruta.rutChofer = chofer.rutChofer
where c.rutCliente = "%s" 
AND chofer.ultimaActualizacion IS NOT NULL
AND ruta.estado = "INICIADO"
limit 1
QUERY;

$query = sprintf($query, $rutCliente);
$resultado = mysqli_query($conn, $query);



$list = array();
while($row = mysqli_fetch_assoc($resultado))
{
    $list[] = $row;
}

mysqli_free_result($resultado);

echo json_encode($list);

http_response_code(200);
header('Content-Type: application/json');

mysqli_close($conn);
?>
