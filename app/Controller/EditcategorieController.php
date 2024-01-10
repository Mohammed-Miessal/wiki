<?php

namespace App\Controller;

use App\Model\CategorieModel;


session_start();
class EditcategorieController
{

    public function index($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {

            $data = [
                'id' => $id
            ];

            Controller::rendercategorieViews("editcategorie", $data);
        } else {
            Controller::render("login");
        }
    }

    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $data = [
                'name' => $_POST['name'],
                'user_id' =>  $_SESSION['id']
                // 'image' => isset($_POST['image']) ? $_POST['image'] : null
            ];

            $categorie = new CategorieModel();
            $categorie->editcategorie($data, $id);

            $redirect = URL_DIR . 'categorie';
            header("Location: $redirect");


            exit();
        }
    }
}
