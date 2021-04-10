<?php
namespace App\Controller;

use App\Model\UsersManager;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        if ($_SESSION['role_id'] == 1) {
            $usersManager = new UsersManager();
            $listUsers = $usersManager->listUsers();
            $users = array_column($listUsers, 'username');
            require('View/adminDashboardView.php');
        } else {
            throw new \Exception('Accès non autorisé!');
        }
    }
}