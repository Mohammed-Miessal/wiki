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




    // public function create()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // $data = [];

    //         if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
    //             $image = $_FILES['image'];
    //             $uploadDirectory =  "C:/laragon/www/wiki/public/assets/uploads/";
    //             $filename = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['title']);

    //             // Validate file extension
    //             $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    //             $originalExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    //             if (!in_array($originalExtension, $allowedExtensions)) {
    //                 echo 'Invalid file extension.';
    //                 return;
    //             }

    //             $targetFileName = $uploadDirectory . $filename . '.' . $originalExtension;

    //             if (move_uploaded_file($image['tmp_name'], $targetFileName)) {
    //                 $image = $filename . '.' . $originalExtension;
    //             } else {
    //                 echo 'File upload failed. Please try again later.';
    //                 return;
    //             }
    //         }

    //         // Get form data

    //         $data = [
    //             'title' => $_POST['title'],
    //             'description' => $_POST['description'],
    //             'content' => $_POST['content'],
    //             'categorie_id' => $_POST['categorie'],
    //             'user_id' => $_SESSION['id'],
    //             'image' => $image,
    //             'status' => 'Pending'
    //         ];


    //         // var_dump($data);
    //         // die();

    //         $wiki = new WikiModel();
    //         $wiki->createwikis($data);


    //         $redirect = URL_DIR . 'wiki';
    //         header("Location: $redirect");


    //         exit();
    //     }
    // }


    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if all form fields are set
            if (isset($_POST['title'], $_POST['description'], $_POST['categorie'], $_FILES['image'], $_POST['content'])) {
                // File Upload Logic
                $image = null;
                if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
                    $imageFile = $_FILES['image'];
                    $uploadDirectory =  "C:/laragon/www/wiki/public/assets/uploads/";
                    $filename = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['title']);

                    // Validate file extension
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                    $originalExtension = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));

                    if (!in_array($originalExtension, $allowedExtensions)) {
                        echo 'Invalid file extension.';
                        return;
                    }

                    $targetFileName = $uploadDirectory . $filename . '.' . $originalExtension;

                    if (move_uploaded_file($imageFile['tmp_name'], $targetFileName)) {
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
                    'content' => $_POST['content'],
                    'categorie_id' => $_POST['categorie'],
                    'user_id' => $_SESSION['id'],
                    'image' => $image,
                    'status' => 'Pending'
                ];

               


                // Instantiate WikiModel and call createwikis method
                $wiki = new WikiModel();
                $wiki->createwikis($data);

                // var_dump($wiki);
                // die();

                // Redirect after successful form processing
                $redirect = URL_DIR . 'wiki';
                header("Location: $redirect");
                exit();
            } else {
                echo 'Incomplete form data.';
            }
        }
    }
}
