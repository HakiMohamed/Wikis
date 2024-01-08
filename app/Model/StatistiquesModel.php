<?php 


namespace App\Model;
use App\Database\Database;

class StatistiquesModel {
    private $connexion;

    public function __construct(Database $db) {
        $this->connexion = $db->getConnection();
    }

    public function getCount($Count) {
        $query = "SELECT COUNT(*) as user_count FROM $Count";
        $statement = $this->connexion->prepare($query);
        $statement->execute();
    
        return $statement->fetchColumn();
    }
    

}