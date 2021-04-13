<?php
namespace App\Controller;

use App\Controller\ErrorsController;
use App\Model\PointsManager;

class PointsController extends Controller
{
    public function addPoint()
    {
        if (isset($_SESSION['user_id']) && isset($_POST['lat']) && isset($_POST['lng'])) {
            $userId = $this->cleanVar($_SESSION['user_id']);
            $lat = $this->cleanVar($_POST['lat']);
            $lng = $this->cleanVar($_POST['lng']);
            $pointsManager = new PointsManager();
            $pointsManager->addPoint($userId, $lat, $lng);
        } else {
            throw new \Exception('Problème interne lors de l\'enregistrement des coordonnées.');
        } 
            
        
    }
    public function listPoints()
    {
        
    }
}