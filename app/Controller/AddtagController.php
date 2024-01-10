<?php

namespace App\Controller;

use App\Model\TagModel;

session_start();
class AddtagController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            Controller::rendertagViews("addtag");
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

            $tag = new TagModel();
            $tag->createtags($data);


            $redirect = URL_DIR . 'tag';
            header("Location: $redirect");


            exit();
        }
    }
}
