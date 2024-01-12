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
            Controller::renderwikiViews("addwiki", ["categories" => $categories]);
        } else {
            Controller::render("login");
        }
    }




    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];

            if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
                $image = $_FILES['image'];
                $uploadDirectory =  "C:/laragon/www/wiki/public/assets/uploads/";
                $filename = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['title']);

                // Validate file extension
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $originalExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

                if (!in_array($originalExtension, $allowedExtensions)) {
                    echo 'Invalid file extension.';
                    return;
                }

                $targetFileName = $uploadDirectory . $filename . '.' . $originalExtension;

                if (move_uploaded_file($image['tmp_name'], $targetFileName)) {
                    $image = $filename . '.' . $originalExtension;
                } else {
                    echo 'File upload failed. Please try again later.';
                    return;
                }
            }

            // Get form data

            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'categorie_id' => $_POST['categorie'],
                'content' => $_POST['content'],
                'user_id' => $_SESSION['id'],
                'image' => $image,
                'status' => 'Pending'
            ];


            // var_dump($data);
            // die();

            $tag = new WikiModel();
            $tag->createwikis($data);


            $redirect = URL_DIR . 'wiki';
            header("Location: $redirect");


            exit();
        }
    }



    // public function create()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Get form data
    //         $data = [
    //             'title' => $_POST['title'],
    //             'description' => $_POST['description'],
    //             'categorie_id' => $_POST['categorie'],
    //             'content' => $_POST['content'],
    //             'user_id' => $_SESSION['id'],
    //             'status' => 'Pending'
    //         ];

    //         $wiki = new WikiModel();
    //         $wiki->createwikis($data);

    //         // var_dump($wiki); die();


    //         $redirect = URL_DIR . 'wiki';
    //         header("Location: $redirect");


    //         exit();
    //     }
    // }
}
