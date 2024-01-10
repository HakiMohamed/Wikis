<?php
namespace App\Model;

use PDO;
use PDOException;

class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createUser($first_name, $last_name, $email,$image, $password, $role) {
        try {
            $query = "INSERT INTO `utilisateur`(`first_name`, `last_name`, `email`, `profilPic`, `password`, `role`)  VALUES (:first_name, :last_name, :email, :profilPic, :password, :role)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':profilPic', $image);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);

            $stmt->execute();
            
            return true; 
        } catch(PDOException $e) {
            return false;
        }
    }




    public function login($email, $password) {
        $query = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return false;
    }

}
?>
