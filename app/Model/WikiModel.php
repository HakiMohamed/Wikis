<?php
namespace App\Model;
use \PDO;

class WikiModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getLimitWikis() {
        $query = "SELECT * from wiki JOIN utilisateur on wiki.author_id = utilisateur.user_id JOIN categorie ON wiki.category_id = categorie.category_id AND archived != 1  ORDER BY wiki.date_created DESC LIMIT 6 ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
   
   
    public function getAllWikis() {
        $query = "SELECT * from wiki JOIN utilisateur on wiki.author_id = utilisateur.user_id JOIN categorie ON wiki.category_id = categorie.category_id  ORDER BY wiki.date_created DESC  ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getNoArchivedWikis() {
        $query = "SELECT * from wiki JOIN utilisateur on wiki.author_id = utilisateur.user_id JOIN categorie ON wiki.category_id = categorie.category_id AND archived != 1  ORDER BY wiki.date_created DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getArchivedWikis() {
        $query = "SELECT * from wiki JOIN utilisateur on wiki.author_id = utilisateur.user_id JOIN categorie ON wiki.category_id = categorie.category_id AND archived = 1  ORDER BY wiki.date_created DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }




    public function insertWiki($title, $content, $authorId, $categoryId,$image) {
        $query = "INSERT INTO wiki (title, content, author_id, category_id, date_created, date_modified, archived,imagewiki) 
                  VALUES (:title, :content, :authorId, :categoryId, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1,:imagewiki)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':authorId', $authorId);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':imagewiki', $image);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    
    
}
?>
