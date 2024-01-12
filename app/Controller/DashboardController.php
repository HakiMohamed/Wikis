<?php

namespace App\Controller;
use App\Database\Database;
use App\Model\CategorieModel;
use App\Model\WikiModel;
use App\Model\TagModel;

class DashboardController{


    public function index(){
        $db = (new Database())->getConnection();
            $wikiModel = new WikiModel($db);
            $wikis = $wikiModel->getAllWikis();

            $tagModel = new TagModel($db);
            $tags = $tagModel->getAllTags();

            $CategoryModel = new CategorieModel($db);
            $Categories = $CategoryModel->getAllCategories();







    include ('../app/View/dashboard.php');
    }



}