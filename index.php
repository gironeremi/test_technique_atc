<?php
require 'vendor/autoload.php';
use App\Controller\Controller;
use App\Controller\ErrorsController;
use App\Controller\UsersController;
use \App\Controller\AdminController;
use App\Controller\PointsController;

session_start();
$action = "";
$controller = new Controller();
$usersController = new UsersController();
$adminController = new AdminController();
$pointsController = new PointsController();
if (isset($_GET['action'])) {
    $action = $controller->cleanVar($_GET['action']);
}
try {
    switch ($action) {
    /* POINTS */
        case 'addPoint':
            $pointsController->addPoint();
            break;
    /* USERS */
        case 'register':
            $usersController->register();
            break;
        case 'login':
            $usersController->login();
            break;
        case 'userDashboard':
            $usersController->userDashboard();
            break;
        case 'logout':
            $usersController->logout();
            break;
    /* ADMIN */
        case 'adminDashboard':
            $adminController->adminDashboard();
            break;
        default:
        $usersController->login();
    }
}
catch(Exception $e) {
    $error = new ErrorsController();
    $error->error($e);
}