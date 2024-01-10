<?php

namespace App\Controller;

use App\Model\CategorieModel;
use App\Model\WikiModel;

session_start();

class EditwikiController
{


    public function index($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {

            $categories = new CategorieModel();
            $categories = $categories->readcategories();

            $data = [
                'id' => $id
            ];

            // var_dump($data['id']);
            // die();

            Controller::rendereditwikiViews("editwiki", $data, ["categories" => $categories]);
        } else {
            Controller::render("login");
        }
    }


    public function edit($id)
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

            $categorie = new WikiModel();
            $categorie->editwikis($data, $id);

            $redirect = URL_DIR . 'wiki';
            header("Location: $redirect");


            exit();
        }
    }
}
