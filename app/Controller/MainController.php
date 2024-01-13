<?php

namespace App\Controller;

use App\Model\CategorieModel;
use App\Model\WikiModel;

session_start();
class MainController
{
    public function index()
    {
        $data = []; // Déclaration de $data en dehors de la condition
    
        if (isset($_SESSION['id'])) {
            $data['id'] = $_SESSION['id'];
        }
    
        $categoriesModel = new CategorieModel();
        $categories = $categoriesModel->readcategories();

        $wikisModel = new WikiModel();
        $wikis = $wikisModel->home();

        $wikisModel2 = new WikiModel();
        $wikis2 = $wikisModel2->home2();
    
        Controller::renderHome2("home2", ["categories" => $categories],  ["wikis" => $wikis] ,["wikis2" => $wikis2] , $data );
    }

    
    
}
