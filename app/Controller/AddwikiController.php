<?php

namespace App\Controller;

use App\Model\CategorieModel;
use App\Model\WikiModel;

session_start();
class AddwikiController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $categories = new CategorieModel();
            $categories = $categories->readcategories();
            Controller::renderwikiViews("addwiki", ["categories"=> $categories]);
        } else {
            Controller::render("login");
        }
    }


    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'categorie_id' => $_POST['categorie'],
                'content' => $_POST['content'],
                'user_id' => $_SESSION['id'],
                'status' => 'Pending'
            ];

            $tag = new WikiModel();
            $tag->createwikis($data);


            $redirect = URL_DIR . 'wiki';
            header("Location: $redirect");


            exit();
        }
    }


}
