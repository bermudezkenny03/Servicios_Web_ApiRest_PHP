<?php
require_once 'clases/respuestas.class.php';
require_once 'clases/citas.class.php';

$_respuestas = new respuestas;
$_citas = new citas;

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET["page"])) {
        $pagina = $_GET["page"];
        $listaCitas = $_citas->listaCitas($pagina);
        header("Content-Type: application/json");
        echo json_encode($listaCitas);
        http_response_code(200);

    }elseif (isset($_GET['id'])) {
        $citaid = $_GET['id'];
        $datosCita = $_citas->obtenerCitas($citaid);
        header("Content-Type: application/json");
        echo json_encode($datosCita);
        http_response_code(200);
    }
}elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    // Enviamos los datos al manejador
    $datosArray = $_citas->post($postBody);
    // Devolvemos una respuesta
    header("Content-Type: application/json");
    if(isset($datosArray["result"]["error_id"])){
        $responseCode = $datosArray["result"]["error_id"];
        http_response_code($responseCode);
    }else {
        http_response_code(200);
    }
    echo json_encode($datosArray);

}elseif ($_SERVER['REQUEST_METHOD'] == "PUT") {
    // Recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    // Enviamos datos al manejador
    $datosArray = $_citas->put($postBody);
    // Devolvemos una respuesta
    header('Content-Type: application/json');

     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
        http_response_code(200);
     }
     echo json_encode($datosArray);
}elseif ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    $headers = getallheaders();

    if (isset($headers["token"]) && isset($headers["citaId"])) {
        // Recibimos los datos enviados por el header

        $send = [
            "token" => $headers["token"],
            "citaId" => $headers["citaId"]
        ];

        $postBody = json_encode($send);

    }else {
        // Recibimos los datos enviados
        $postBody = file_get_contents("php://input");
    }

    // Enviamos datos al manejador
    $datosArray = $_citas->delete($postBody);
    // Devolvemos una respuesta
    header('Content-Type: application/json');
        if(isset($datosArray["result"]["error_id"])){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
        
}else{
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}
?>