<?php 


namespace App\Model;
use App\Database\Database;
use PDO;

class UserModel {
    private $connexion;

    public function __construct(Database $db) {
        $this->connexion = $db->getConnection();
    }

    public function getUsersWithRoles() {
        $query = "SELECT users.*, roles.role_name 
                  FROM users 
                  LEFT JOIN roles ON users.role_id = roles.id";
        $statement = $this->connexion->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }



    public function supprimerUtilisateur($userId) {
        $query = "DELETE FROM users WHERE id = :user_id";
        $statement = $this->connexion->prepare($query);
        $statement->bindParam(':user_id', $userId);
        $statement->execute();
    }




    
    
    public function modifierUtilisateur($userId, $nouveauRoleId) {
        $query = "UPDATE users SET role_id = $nouveauRoleId WHERE users.id = $userId";
        $statement = $this->connexion->prepare($query);
        $statement->execute();
    }


    public function SearchUtilisateur($key_search) {
        $query = "SELECT * 
        FROM users
        LEFT JOIN roles ON users.role_id = roles.id
        WHERE last_name LIKE $key_search.'%' OR first_name LIKE $key_search.'%';";
        $statement = $this->connexion->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    
    
    
    

}











?>