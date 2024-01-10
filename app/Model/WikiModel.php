<?php
namespace App\Model;
use \PDO;

class WikiModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllWikis() {
        $query = "SELECT * from wiki JOIN utilisateur on wiki.author_id = utilisateur.user_id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
