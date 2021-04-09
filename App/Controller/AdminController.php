<?php
namespace App\Controller;
class AdminController extends Controller
{
    public function adminDashboard()
    {
        if ($_SESSION['role_id'] == 1) {
            require('View/adminDashboardView.php');
        } else {
            throw new \Exception('Accès non autorisé!');
        }
    }
}