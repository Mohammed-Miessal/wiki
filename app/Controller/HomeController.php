<?php

namespace App\Controller;
use App\Model\CategorieModel;

// session_start();
class HomeController
{
    public function index()
    {
        $categories = new CategorieModel();
        $categories = $categories->readcategories();
        // var_dump($categories);
        // exit;
        Controller::render("home", ["categories"=> $categories]);
    }

 
}
