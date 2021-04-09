<?php
namespace App\Model;
class UsersManager extends Manager
{
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
}