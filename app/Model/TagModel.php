<?php

namespace  App\Model;

use PDO;
class TagModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTags() {
        $query = "SELECT * FROM tag";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getWikiIdByTitle($title) {
        $query = "SELECT wiki_id FROM wiki WHERE title = :title";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return ($result) ? $result->wiki_id : null;
    }


    public function insertWikiTags($wikiId, $tagIds) {
        $query = "INSERT INTO wikitag (wiki_id, tag_id) VALUES (:wikiId, :tagId)";
        $stmt = $this->db->prepare($query);
    
        foreach ($tagIds as $tagId) {
            $stmt->bindValue(':wikiId', $wikiId);
            $stmt->bindValue(':tagId', $tagId);
            $stmt->execute();
        }
    }
    
    public function addTagsToWiki($title, $tagIds) {
        $wikiId = $this->getWikiIdByTitle($title);
    
        if ($wikiId) {
            $this->insertWikiTags($wikiId, $tagIds);
            return true;
        } else {
            return false;
        }
    }
}
?>
