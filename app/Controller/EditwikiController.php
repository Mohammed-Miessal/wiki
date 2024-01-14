<?php

namespace App\Controller;

use App\Model\CategorieModel;
use App\Model\WikiModel;

session_start();

class EditwikiController
{

    public function index($id)
    {

        if (isset($_SESSION['id'])) {

            $categories = new CategorieModel();
            $categories = $categories->readcategories();

            $data = [
                'id' => htmlspecialchars($id, ENT_QUOTES, 'UTF-8')
            ];

            Controller::rendereditwikiViews("editwiki", $data, ["categories" => $categories]);
        } else {
            Controller::render("login");
        }
    }


    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data

            $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
            $categorie_id = htmlspecialchars($_POST['categorie'], ENT_QUOTES, 'UTF-8');
         

            $data = [
                'title' => $title,
                'description' => $description,
                'categorie_id' => $categorie_id,
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
