<?php
require "../../vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$iduser = '';
$password = '';


include ("../../config/connection.php");

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

$iduser = $data->id;
$password = $data->password;

$table_name = 'user';

$query = "SELECT createdUser, iduser, nameUser, password FROM " . $table_name . " JOIN chofer ON iduser = rutChofer WHERE iduser = ? LIMIT 0,1";

$stmt = $conn->prepare( $query );
$stmt->bind_param("i", $iduser);
$stmt->execute();
$stmt->store_result();
$num = $stmt->num_rows;

http_response_code(404);

if($num > 0){
    $row = [];
    $stmt->bind_result($row["createdUser"], $row["iduser"], $row["nameUser"], $row["password"]);
    $stmt->fetch();
    // if(password_verify($password, $realPassword))
    
    if($password == $row["password"])
    {
        $secret_key = $secret;
        $issuer_claim = "toexpress.cl"; // this can be the servername
        $audience_claim = "users";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim; //not before in seconds
        $expire_claim = $issuedat_claim + 60 * 60 * 24 * 365; // token expire in a year
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => $row["iduser"],
                "name" => $row["nameUser"],
        ));

        http_response_code(200);

        $jwt = JWT::encode($token, $secret_key);
        echo json_encode(
            array(
                "message" => "Successful login.",
                "jwt" => $jwt,
                "id" => $row["iduser"],
                "name" => $row["nameUser"],
                "expireAt" => $expire_claim
            ));
    }
    else{
        http_response_code(401);
        echo json_encode(array("message" => "Login failed.", "password" => $password));
    }
}
else{
    echo json_encode(array(
        "message" => "User not found."
    ));
}

?>


