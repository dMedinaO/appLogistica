<?php

include_once "../config/connection.php";

require "../vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// se valida el json recibido en la peticion
$data = json_decode(file_get_contents("php://input"));
$validData = true;
$validationError = null;
$requiredFields = ['rut', 'latitude', 'longitude', 'jwt'];
foreach ($requiredFields as $field){
    if (!property_exists($data, $field)){
        $validationError = "El campo '$field' es obligatorio.";
        $validData = false;
        break;
    }
}

if (!$validData){
    http_response_code(400);
    echo json_encode(array("message", $validationError));
    die();
}

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

$jwt = $data->jwt;

try {
    $decoded = JWT::decode($jwt, $secret, array('HS256'));
    // Access is granted. Add code of the operation here 
    $query = "SELECT * FROM chofer WHERE rutChofer = '".$data->rut."' LIMIT 0,1";
    $resultado = mysqli_query($conn, $query);

    if ( !$resultado ){
        http_response_code(404);
        echo json_encode(array(
            "message" => "El chofer con rut " . $data->rut . " no existe.",
            "data" => $data->rut,
        ));
        die();
    }
    else{
        $query = "UPDATE chofer SET latitud=".$data->latitude.", longitud=".$data->longitude.", ultimaActualizacion=NOW() WHERE rutChofer = '".$data->rut."'";

        $insert = mysqli_query($conn, $query);
        
        mysqli_free_result($resultado);
        http_response_code(200);
        header('Content-Type: application/json');

        echo json_encode(array(
            "message" => "La ubicacion fue almacenada."
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

mysqli_close($conn);
?>
