<?php

use App\Controller\PointsController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // On récupère les informations envoyées
    $data = json_decode(file_get_contents("php://input"));
    //appel de PointsController()
    print_r('allo php?');
    $pointsController = new PointsController();
    $pointsController->addPoint($data);
    print_r('php, t\'as réussi?');
} else {
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}