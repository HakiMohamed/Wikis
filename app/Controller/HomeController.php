<?php

namespace App\Controller;
use App\Database\Database;
use App\Model\CategorieModel;
use App\Model\WikiModel;
use App\Model\TagModel;

 class HomeController {
        public function index() {
            $db = (new Database())->getConnection();
            $wikiModel = new WikiModel($db);
            $wikis = $wikiModel->getLimitWikis();

            $tagModel = new TagModel($db);
            $tags = $tagModel->getAllTags();

            $CategoryModel = new CategorieModel($db);
            $Categories = $CategoryModel->getAllCategories();
            


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = $_POST["title"];
                $content = $_POST["content"];
                $authorId = $_POST["authorId"];
                $categoryId = $_POST["categoryId"];
                

                $image = ''; 

               if (!empty($_FILES['image']['name'])) {
               $uploadDir = './asset/images/'; 
               $uploadedFile = $uploadDir . basename($_FILES['image']['name']);
               move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile);
               $image = $uploadedFile;
            }
            
                
            
                if ($wikiModel->insertWiki($title, $content, $authorId, $categoryId,$image)) {
                    $selectedTags = isset($_POST['tags']) ? $_POST['tags'] : [];
                    $tagModel->addTagsToWiki($title, $selectedTags);

                  $alert = 'votre wiki a été ajouté avec succès';
                  include('../app/View/alert.php');
                } else {
                    $alert="Échec de l'insertion du nouveau wiki";
                }
                
            }


include('../app/View/home.php');

        }




        

    }
    
