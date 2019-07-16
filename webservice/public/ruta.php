<?php

include_once "../config/connection.php";

require "../vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ( !isset($conn) ){
    $conn = mysqli_connect($server, $user, $password, $bd);
    mysqli_set_charset($conn,"utf8");
    if (!$conn){
        http_response_code(500);
        echo json_encode(array("message", "Can't connect to database."));
        die();
    }
}

$data = json_decode(file_get_contents("php://input"));

$jwt = $_GET["jwt"];


if($jwt){
    try {
        $decoded = JWT::decode($jwt, $secret, array('HS256'));
        // Access is granted. Add code of the operation here 
        $query = "select * from ruta join chofer on ruta.rutChofer = chofer.rutChofer where chofer.rutChofer = " . $decoded->data->id;
        $resultado = mysqli_query($conn, $query);

        if (!$resultado){
            http_response_code(404);
            echo json_encode(array(
                "message" => "No hay rutas para el chofer con id " . $decoded->data->id,
                "data" => $decoded->data->id,
            ));
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
                
                $query_documentos = "" .
                    "SELECT cr.estado, cr.fechaComentario, cr.motivo, cr.receptor, c.nombreCliente, d.tipoDocumento, d.folio, d.monto, c.rutCliente " .
                    "FROM documento_en_ruta AS dr JOIN documento AS d ON dr.documento = iddocumento " .
                    "JOIN cliente c on c.rutCliente = d.rutReceptor " .
                    "LEFT JOIN comentarioRecepcion AS cr ON cr.idcomentario = dr.comentario " .
                    "WHERE dr.ruta = '$id_ruta'"
                ;

                $res_documentos = mysqli_query($conn, $query_documentos);

                $clientes = array();
                while($data_documento = mysqli_fetch_assoc($res_documentos)){
                    $documento = array(
                        'tipo' => (int) $data_documento['tipoDocumento'],
                        'folio' => (int) $data_documento['folio'],
                        'monto' => (int) $data_documento['monto'],
                        'state' => $data_documento['estado'],
                        'receivedAt' => $data_documento['fechaComentario'],
                        'reason' => $data_documento['motivo'],
                        'receivedBy' => $data_documento['receptor'],
                    );
                    if (!isset($clientes[$data_documento['rutCliente']])){
                        $resLocation = mysqli_query($conn, "SELECT * FROM geoPoint WHERE rutCliente = '".$data_documento['rutCliente']."'");
                        $data_cliente = mysqli_fetch_assoc($resLocation);

                        $clientes[$data_documento['rutCliente']] = array(
                            'rut' => $data_documento['rutCliente'],
                            'nombre' => $data_documento['nombreCliente'],
                            'requireLocation' => $resLocation->num_rows == 0,
                            'documentos' => array(),
                        );
                        if ($resLocation->num_rows > 0){
                            $clientes[$data_documento['rutCliente']]["latitude"] = floatval($data_cliente["latitude"]);
                            $clientes[$data_documento['rutCliente']]["longitude"] = floatval($data_cliente["longitude"]);
                        }
                    }
                    $clientes[$data_documento['rutCliente']]['documentos'][] = $documento;
                }
                $ruta["clientes"] = array_values($clientes);
                $response[] = $ruta;
            }

            mysqli_free_result($resultado);

            http_response_code(200);
            header('Content-Type: application/json');

            echo json_encode(array(
                "rutas" => $response
            ));
        }
    }
    catch (Exception $e){
        http_response_code(401);

        echo json_encode(array(
            "message" => "Access denied.",
            "error" => $e->getMessage()
        ));
    }
}
else{
    http_response_code(400);
    echo json_encode(array(
        "message" => "Debe iniciar sesión antes de utilizar el servicio.",
    ));
}

mysqli_close($conn);
?>