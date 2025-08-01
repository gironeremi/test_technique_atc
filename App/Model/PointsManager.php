<?php
namespace App\Model;
class PointsManager extends Manager
{
    public function addPoint($userId, $lat, $lng, $date)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('INSERT INTO points SET user_id = ?, latitude = ?, longitude = ?, datetime = ?');
        $req->execute(array($userId, $lat, $lng, $date));
    }
    public function listPoints() {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM `users` INNER JOIN manager_has_users ON users.user_id = manager_has_users.user_id INNER JOIN points ON points.user_id = users.user_id');
        $req->execute();
        return $req->fetchAll();
    }
    public function listPointsByUserId($userId)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM points WHERE user_id = ?');
        $req->execute(array($userId));
        return $req->fetchAll();
    }
    public function listPointsByManager($managerId) {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM `users` INNER JOIN manager_has_users ON users.user_id = manager_has_users.user_id INNER JOIN points ON points.user_id = users.user_id WHERE manager_has_users.manager_id = ?');
        $req->execute(array($managerId));
        return $req->fetchAll();
    }
}