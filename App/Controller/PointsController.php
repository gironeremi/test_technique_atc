<?php
namespace App\Controller;

use App\Controller\ErrorsController;
use App\Model\PointsManager;
use Exception;

class PointsController extends Controller
{
    public function addPoint($data)
    {
        if (!empty($data->location->lat) && !empty($data->location->lng) && !empty($data->date)) {
            $lat = $data->location->lat;
            $lng = $data->location->lng;
            $date = $data->date;
            $userId = $this->cleanVar($_SESSION['user_id']);
            $pointsManager = new PointsManager();
            $pointsManager->addPoint($userId, $lat, $lng, $date);
        } else {
                throw new \Exception('Erreur lors de l\'enregistrement des données');
        }
    }
}