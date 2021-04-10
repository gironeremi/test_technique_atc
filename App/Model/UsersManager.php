<?php
namespace App\Model;
class UsersManager extends Manager
{
    public function listUsers()
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT username FROM users');
        $req->execute();
        return $req->fetchAll();
    }
    public function getUserByName($username)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM users WHERE username = ?');
        $req->execute(array($username));
        return $req->fetch();
    }
    public function addUser($username, $passwordHashed)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('INSERT INTO users SET username = ?, password = ?');
        $req->execute(array($username, $passwordHashed));
    }
    public function listUsersByManager($userId) {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT users.username FROM manager_has_users INNER JOIN users ON users.user_id = manager_has_users.user_id WHERE manager_has_users.manager_id = ?');
        $req->execute(array($userId));
        return $req->fetchAll();
    }
}