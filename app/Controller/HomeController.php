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
        Controller::render("home");
    }

    // public function index()
    // {
    //     if (session_status() == PHP_SESSION_NONE) {
    //         session_start();
    //     }
    //     if (isset($_SESSION['id'])) {
    //         Controller::render("home");
    //     } else {
    //         Controller::render("login");
    //     }
    // }
}
