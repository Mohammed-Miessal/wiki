<?php

namespace App\Controller;

use App\Model\CategorieModel;

session_start();

class AddcategorieController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            Controller::rendercategorieViews("addcategorie");
        } else {
            Controller::render("login");
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $data = [
                'name' => $_POST['name'],
                'user_id' =>  $_SESSION['id']
                // 'image' => isset($_POST['image']) ? $_POST['image'] : null
            ];

            $categorie = new CategorieModel();
            $categorie->createcategories($data);


            $redirect = URL_DIR . 'categorie';
            header("Location: $redirect");


            exit();   
        }
    }
}
