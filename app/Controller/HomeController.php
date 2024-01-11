<?php

namespace App\Controller;

use App\Model\CategorieModel;

session_start();
class HomeController
{
    public function index()
    {
        $data = []; // Déclaration de $data en dehors de la condition
    
        if (isset($_SESSION['id'])) {
            $data['id'] = $_SESSION['id'];
        }
    
        $categoriesModel = new CategorieModel();
        $categories = $categoriesModel->readcategories();
    
        Controller::renderHome("home", ["categories" => $categories], $data);
    }
    
}
