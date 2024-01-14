<?php

namespace App\Controller;

use App\Model\CategorieModel;
use App\Model\WikiModel;

session_start();
class HomeController
{

    public function index()
    {
        $data = []; 

        if (isset($_SESSION['id'])) {
            $data['id'] = $_SESSION['id'];
        }

        $categoriesModel = new CategorieModel();
        $categories = $categoriesModel->readcategories();

        $wikisModel = new WikiModel();
        $wikis = $wikisModel->home();

        Controller::renderHome("home", ["categories" => $categories],  ["wikis" => $wikis], $data);
    }

   

    public function searchwikis()
    {
        header('Content-Type: application/json; charset=utf-8');
        $title = $_GET["title"];
        $categorie = $_GET["id"];
        $wikisModel2 = new WikiModel();
        $wikis2 = $wikisModel2->search($title, $categorie);
        echo json_encode($wikis2);
    }
}
