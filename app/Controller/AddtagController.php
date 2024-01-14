<?php

namespace App\Controller;

use App\Model\TagModel;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class AddtagController
{
    public function index()
    {
        // if (isset($_SESSION['id'])) {
            if (isset($_SESSION['id']) && $_SESSION['role_id'] == 2) {
            Controller::rendertagViews("addtag");
        } else {
            Controller::render("login");
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data and sanitize
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $user_id = $_SESSION['id'];

            // Create data array
            $data = [
                'name' => $name,
                'user_id' =>  $user_id
            ];

            // Create TagModel instance
            $tag = new TagModel();
            $tag->createtags($data);

            // Redirect to tag page
            $redirect = URL_DIR . 'tag';
            header("Location: $redirect");
            exit();
        }
    }
}



// namespace App\Controller;

// use App\Model\TagModel;

// session_start();
// class AddtagController
// {
//     public function index()
//     {
//         if (session_status() == PHP_SESSION_NONE) {
//             session_start();
//         }
//         if (isset($_SESSION['id'])) {
//             Controller::rendertagViews("addtag");
//         } else {
//             Controller::render("login");
//         }
//     }

//     public function create()
//     {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             // Get form data
//             $data = [
//                 'name' => $_POST['name'],
//                 'user_id' =>  $_SESSION['id']
//             ];

//             $tag = new TagModel();
//             $tag->createtags($data);


//             $redirect = URL_DIR . 'tag';
//             header("Location: $redirect");


//             exit();
//         }
//     }
// }
