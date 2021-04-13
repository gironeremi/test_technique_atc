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
    public function listPoints($managerId) {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM `users` INNER JOIN manager_has_users ON users.user_id = manager_has_users.user_id INNER JOIN points ON points.user_id = users.user_id WHERE manager_has_users.manager_id = ?');
        $req->execute(array($managerId));
        return $req->fetchAll();
    }
}