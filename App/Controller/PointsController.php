<?php
namespace App\Controller;

use App\Controller\ErrorsController;
use App\Model\PointsManager;
use Exception;

class PointsController extends Controller
{
    public function addPoint()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // On récupère les informations envoyées
            $data = json_decode(file_get_contents("php://input"));
            if (!empty($data->location->lat) && !empty($data->location->lng) && !empty($data->date)) {
                $lat = $data->location->lat;
                $lng = $data->location->lng;
                $date = $data->date;
                $userId = $_SESSION['user_id'];
                $pointsManager = new PointsManager();
                $pointsManager->addPoint($userId, $lat, $lng, $date);
            } else {
                    throw new \Exception('Erreur lors de l\'enregistrement des données');
            }
        } else {
            http_response_code(405);
            echo json_encode(["message" => "This method is not authorized."]);
        }
    }
    public function listPointsByUserId()
    {
        $userId = $_SESSION['user_id'];
        $pointsManager = new PointsManager();
        $pointsManager->listPointsByUserId($userId);
    }
}