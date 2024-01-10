<?php
namespace App\Controllers;

use App\Database\Database;
use App\Model\UserModel;

class UserController {
    private $userModel;

    public function __construct() {
        $db = new Database();
        $this->userModel = new UserModel($db->getConnection());
    }

    // public function register($data) {
    //     $first_name = $data['first_name'];
    //     $last_name = $data['last_name'];
    //     $email = $data['email'];
    //     $password = $data['password'];
    //     $profilePic = $data['profilePic'];

    //     // Validation des données
    //     $errors = [];

    //     // ... Effectuez la validation des champs (prénom, nom, email, mot de passe) et de l'image de profil ...

    //     if (!empty($errors)) {
    //         return $errors;
    //     }

    //     // Traitement de l'image de profil (déplacement vers un répertoire sur le serveur, par exemple)
    //     $profilePicPath = 'uploads/profiles/' . uniqid('profile_') . '.' . pathinfo($profilePic['name'], PATHINFO_EXTENSION);
    //     move_uploaded_file($profilePic['tmp_name'], $profilePicPath);

    //     // Enregistrement de l'utilisateur avec le chemin d'accès de l'image dans la base de données
    //     return $this->userModel->saveUser($first_name, $last_name, $email, $password, $profilePicPath);
    // }
}
?>
