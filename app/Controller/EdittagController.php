<?php

namespace App\Controller;

use App\Model\TagModel;

session_start();

class EdittagController
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

            Controller::rendertagViews("edittag", $data);
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
            ];

            $categorie = new TagModel();
            $categorie->edittags($data, $id);

            $redirect = URL_DIR . 'tag';
            header("Location: $redirect");


            exit();
        }
    }

}
