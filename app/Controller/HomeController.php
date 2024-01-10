<?php

namespace App\Controller;
use App\Database\Database;
use App\Model\WikiModel;

 class HomeController {
        public function index() {
            $db = (new Database())->getConnection();
            $wikiModel = new WikiModel($db);
            $wikis = $wikiModel->getAllWikis();
    
            include_once('../app/View/home.php');
        }
    }
    
