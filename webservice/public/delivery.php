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
$requiredFields = ['receptor', 'folio', 'estado', 'motivo', 'jwt'];
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
    $query = "SELECT dr.ruta, iddocumento, dr.comentario FROM documento d JOIN documento_en_ruta dr ON d.iddocumento = dr.documento WHERE d.folio = " . $data->folio . " LIMIT 0,1";
    $resultado = mysqli_query($conn, $query);

    if ( !$resultado ){
        http_response_code(404);
        echo json_encode(array(
            "message" => "El documento con el folio " . $data->folio . " no existe.",
            "data" => $data->folio,
        ));
        die();
    }
    else{
        $response = array();
        while( $doc = mysqli_fetch_assoc($resultado) ){
            // si el documento ya tenia un comentario, se elimina
            if ( $doc['comentario'] != null && $doc['comentario'] != ""){
                $query = "DELETE FROM comentarioRecepcion WHERE idcomentario=".$doc["comentario"];
                $delete = mysqli_query($conn, $query);
            }

            $date = new DateTime();
            $date->setTimestamp($data->fecha/1000);
            
            if (property_exists($data, 'imagenes')){
                foreach ($data->imagenes as $image){
                    $name = $image->nombre;
                    $uniqid = uniqid();
                    $realImage = base64_decode($image->imagen);
                    $result = file_put_contents("../images/".$uniqid, $realImage);
                    
                    if ($result != FALSE){
                        $query = "INSERT INTO comprobante(iddocumento, idruta, nombreComprobante, fechaComprobante, path)" .
                            " VALUES (".$doc["iddocumento"].", ".$doc["ruta"].", '".$name."', '".$date->format('Y-m-d H:i:s')."', '".$uniqid."')";

                        $insert = mysqli_query($conn, $query);
                    }
                }
            }

            // se inserta el comentario
            $query = "INSERT INTO comentarioRecepcion(nombreRecepcion, comentarioPedido, fechaComentario, estado, motivo, receptor)" .
                ' VALUES("", "", "'.$date->format('Y-m-d H:i:s').'", "'.$data->estado.'", "'.$data->motivo.'", "'.$data->receptor.'")';

            $insert = mysqli_query($conn, $query);


            if ($insert){
                // se actualiza el documento_en_ruta para indicar su comentario.
                $id = mysqli_insert_id($conn);
                $query = "UPDATE documento_en_ruta SET comentario = $id WHERE documento=".$doc['iddocumento']; 
                $update = mysqli_query($conn, $query);
            }

        }
        mysqli_free_result($resultado);
        http_response_code(200);
        header('Content-Type: application/json');

        echo json_encode(array(
            "message" => "El documento fue actualizado correctamente."
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