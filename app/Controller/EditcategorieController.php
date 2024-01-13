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
            $data = [];

            if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
                $image = $_FILES['image'];
                $uploadDirectory =  "C:/laragon/www/wiki/public/assets/uploads/";
                $filename = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['name']);

                // Validate file extension
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif' , 'svg'];
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
                'name' => $_POST['name'],
                'user_id' =>  $_SESSION['id'],
                'image' => $image

            ];

            $categorie = new CategorieModel();
            $categorie->editcategorie($data, $id);

            $redirect = URL_DIR . 'categorie';
            header("Location: $redirect");


            exit();
        }
    }
}
