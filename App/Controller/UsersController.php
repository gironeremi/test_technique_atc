<?php
namespace App\Controller;
use App\Model\UsersManager;
class UsersController extends Controller
{
    public function register()
    {
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])) {
            $errors = array();
            $usersManager = new UsersManager();
            $username = $this->cleanVar($_POST['username']);
            $password = $this->cleanVar($_POST['password']);
            $passwordConfirm = $this->cleanVar($_POST['passwordConfirm']);
            if(empty($username) || !preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                $errors['username'] = "Ce pseudonyme n'est pas valide (alphanumérique)";
            }
            $userExists = $usersManager->getUserByName($username);
            if ($userExists) {
                $errors['username'] = 'Ce pseudonyme est dejà pris';
            }
            if (empty($password) || empty($passwordConfirm)) {
                $errors['password'] = "Un mot de passe est manquant";
            }
            if ($password != $passwordConfirm) {
                $errors['passwordMatch'] = "Les mots de passe ne sont pas identiques";
            }
            if (empty($errors)) {
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                $usersManager->addUser($username, $passwordHashed);
                $successMessage = 'Vous êtes à présent inscrit. Bienvenue !';
                require('View/template.php');
                die();
            }
        }
        require('View/registerView.php');
    }
    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $usersManager = new UsersManager();
            $username = $this->cleanVar($_POST['username']);
            $password = $this->cleanVar($_POST['password']);
            $userExists = $usersManager->getUserByName($username);
            if (!$userExists) {
                $errors['username'] = "Ce nom d'utilisateur n'existe pas.";
            } elseif (!password_verify($password, $userExists['password'])) {
                $errors['password'] = "Mot de passe incorrect!";
            }
            if (empty($errors)) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $userExists['user_id'];
                $_SESSION['role_id'] = $userExists['role_id'];
                //$pointsController = new PointsController();
                //$pointsController->addPoint();
                if ($_SESSION['role_id'] == 1) {
                    $adminController = new AdminController();
                    $adminController->adminDashboard();
                    die();
                } else {
                    $this->userDashboard();
                    die();
                }
            }
        }
        require('View/loginView.php');
    }
    public function logout()
    {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        $successMessage = "Vous êtes bien déconnecté. À bientôt!";
        require('View/template.php');
    }
    public function userDashboard()
    {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $usersManager = new UsersManager();
            if ($_SESSION['role_id'] == 2) {
                $listUsers = $usersManager->listUsersByManager($userId);
                $users = array_column($listUsers, 'username');
            }
            require('View/userDashboardView.php');
        } else {
            throw new \Exception('Problème de connexion au tableau de bord');
        }
    }
}