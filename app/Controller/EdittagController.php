<?php

namespace App\Controller;

use App\Model\TagModel;

session_start();

class EdittagController
{

    public function index($id)
    {

        if (isset($_SESSION['id']) && $_SESSION['role_id'] == 2) {

            $data = [
                'id' => htmlspecialchars($id, ENT_QUOTES, 'UTF-8')
            ];

            Controller::rendertagViews("edittag", $data);
        } else {
            Controller::render("login");
        }
    }


    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data and sanitize
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

            $data = [
                'name' => $name,
                'user_id' => $_SESSION['id']
            ];

            $tagModel = new TagModel();
            $tagModel->edittags($data, $id);

            $redirect = URL_DIR . 'tag';
            header("Location: $redirect");

            exit();
        }
    }
}
