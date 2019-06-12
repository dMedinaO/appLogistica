<?php

include ("../config/connection.php");

if ( !isset($conexion) ){
    $conexion = mysqli_connect($server, $user, $password, $bd);
    mysqli_set_charset($conexion,"utf8");
    if (!$conexion){
        http_response_code(500);
        echo json_encode(array("message", "Can't connect to database."));
        die();
    }
}

$query = "select * from ruta join chofer on (ruta.rutChofer = chofer.rutChofer)";
$resultado = mysqli_query($conexion, $query);

if (!$resultado){
    http_response_code(404);
    echo json_encode(array("message", "Result not found."));
    die();
}
else{
    $response = array();
    while($data = mysqli_fetch_assoc($resultado)){
        $id_ruta = $data["idrutas"];
        $ruta = array(
            "id" => (int) $id_ruta,
            "nombre" => $data["nombreRuta"],
            "jornada" => $data["jornadaRuta"],
        );
        $query_documentos = "select c.nombreCliente, d.tipoDocumento, d.folio, d.monto, c.rutCliente from documento_en_ruta as dr join documento as d on dr.documento = iddocumento join cliente c on c.rutCliente = d.rutReceptor where dr.ruta = '$id_ruta'";
        $res_documentos = mysqli_query($conexion, $query_documentos);

        $clientes = array();
        while($data_documento = mysqli_fetch_assoc($res_documentos)){
            $documento = array(
                'tipo' => (int) $data_documento['tipoDocumento'],
                'folio' => (int) $data_documento['folio'],
                'monto' => (int) $data_documento['monto'],
            );
            if (!isset($clientes[$data_documento['rutCliente']])){
                $clientes[$data_documento['rutCliente']] = array(
                    'rut' => $data_documento['rutCliente'],
                    'nombre' => $data_documento['nombreCliente'],
                    'documentos' => array(),
                );
            }
            $clientes[$data_documento['rutCliente']]['documentos'][] = $documento;
        }
        $ruta["clientes"] = array_values($clientes);
        $response[] = $ruta;
    }

    http_response_code(200);
    header('Content-Type: application/json');

    echo json_encode(array(
        "rutas" => $response
    ));
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>