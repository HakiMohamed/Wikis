<?php
namespace App\Controller;
use App\Database\Database;
use App\Model\UserModel;

class LoginController {
    
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel($this->db);

            $loggedIn = $userModel->login($email, $password);

            if ($loggedIn) {
                $user = $userModel->login($email, $password);
                $_SESSION['id']=$user->user_id;
                $_SESSION['first_name']=$user->first_name;
                $_SESSION['last_name']=$user->last_name;
                $_SESSION['role']=$user->role;
                $_SESSION['profilPic']=$user->profilPic;
              
                if ($_SESSION['role'] === 'auteur') {
                    header('Location: Home'); 
                    exit();
                } elseif ($_SESSION['role'] === 'admin') {
                    header('location:http://localhost/wikis/dachboard');
                    exit();
                }


                
            } else {
                $errors ='Mot de passe ou Email inccorect';
                include_once('../app/View/login.php');

                
            }
        } else {
            include_once('../app/View/login.php');
        }
    }
}
?>
