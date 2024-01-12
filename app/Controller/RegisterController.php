<?php
namespace App\Controller;
use App\Database\Database;
use App\Model\UserModel;

class RegisterController {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
        
            $required_fields = ['first_name', 'last_name', 'email', 'passwordd', 'role'];
            foreach ($required_fields as $field) {
                if (empty($_POST[$field])) {
                    $errors[] = "Le champ $field est requis.";
                }
            }

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'adresse email n'est pas valide.";
            }

            $image = $_FILES['profilPic']['name'];
            $tmp_image = $_FILES['profilPic']['tmp_name'];
            $target_directory = "./asset/images/";
            $target_file = $target_directory . basename($image);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


            
            $check = getimagesize($tmp_image);
            if ($check === false) {
                $errors[] = "Le fichier n'est pas une image.";
            }

            

            $allowed_types = ['jpg', 'jpeg', 'png'];
            if (!in_array($imageFileType, $allowed_types)) {
                $errors[] = "Seuls les fichiers JPG, JPEG, PNG sont autorisés.";
            }

            if (empty($errors)) {
                move_uploaded_file($tmp_image, $target_file);

                $userModel = new UserModel($this->db);
                $prenom=$_POST['first_name'];
                $nom=$_POST['last_name'];
                $email=$_POST['email'];
                $password = $_POST['passwordd'];
                $password = password_hash($password,PASSWORD_DEFAULT);
                $role = $_POST['role'];

                $userModel->createUser($prenom, $nom, $email, $image, $password, $role);
                
                header("Location: http://localhost/wikis/login");
                exit();
            } else {
                include_once('../app/View/register.php');

                    return $errors;


                    


                
            }
        } else {
            include_once('../app/View/register.php');
        }
    }
}
?>






















