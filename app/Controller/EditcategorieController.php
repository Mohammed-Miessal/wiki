<?php

namespace App\Controller;

use App\Model\CategorieModel;


session_start();
class EditcategorieController
{

    public function index($id)
    {

        if (isset($_SESSION['id'])) {

            $data = [
                'id' => htmlspecialchars($id, ENT_QUOTES, 'UTF-8')
            ];

            Controller::rendercategorieViews("editcategorie", $data);
        } else {
            Controller::render("login");
        }
    }



    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $data = [
                'name' => $name,
                'user_id' =>  $_SESSION['id']
            ];

            $categorie = new CategorieModel();
            $categorie->editcategorie($data, $id);

            $redirect = URL_DIR . 'categorie';
            header("Location: $redirect");


            exit();
        }
    }
}
