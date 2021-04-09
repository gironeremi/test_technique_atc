<?php
namespace App\Model;
class PointsManager extends Manager
{
    public function addPoint($userId, $lat, $lng)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('INSERT INTO points SET user_id = ?, latitude = ?, longitude = ?');
        $req->execute(array($userId, $lat, $lng));
    }
}