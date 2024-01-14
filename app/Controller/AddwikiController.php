<?php

namespace App\Controller;

use App\Model\CategorieModel;
use App\Model\WikiModel;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class AddwikiController
{
    public function index()
    {
        if (isset($_SESSION['id']) && $_SESSION['role_id'] == 1) {
            $categoriesModel = new CategorieModel();
            $categories = $categoriesModel->readcategories();

            // Sanitize category names
            foreach ($categories as &$category) {
                $category['name'] = htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8');
            }
            unset($category); // Unset the reference to the last item

            Controller::renderwikiViews("addwiki", ["categories" => $categories]);
        } else {
            Controller::render("login");
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if all form fields are set
            if (isset($_POST['title'], $_POST['description'], $_POST['categorie'], $_FILES['image'], $_POST['content'])) {
                // File Upload 
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

                $tags = explode(",", $_POST["tags"]);

                // Get and sanitize form data
                $data = [
                    'title' => htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8'),
                    'description' => htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8'),
                    'content' => $_POST['content'],
                    'categorie_id' => $_POST['categorie'],
                    'user_id' => $_SESSION['id'],
                    'image' => $image,
                    'status' => 'Pending'
                ];

                // Instantiate WikiModel and call createwikis method
                $wiki = new WikiModel();
                $wiki->createwikis($data, $tags);

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






// namespace App\Controller;

// use App\Model\CategorieModel;
// use App\Model\WikiModel;

// session_start();
// class AddwikiController
// {
//     public function index()
//     {
//         if (session_status() == PHP_SESSION_NONE) {
//             session_start();
//         }
//         if (isset($_SESSION['id'])) {
//             $categories = new CategorieModel();
//             $categories = $categories->readcategories();
//             Controller::renderwikiViews("addwiki", ["categories" => $categories]);
//         } else {
//             Controller::render("login");
//         }
//     }


//     public function create()
//     {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             // Check if all form fields are set
//             if (isset($_POST['title'], $_POST['description'], $_POST['categorie'], $_FILES['image'], $_POST['content'])) {
//                 // File Upload 
//                 $image = null;
//                 if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
//                     $imageFile = $_FILES['image'];
//                     $uploadDirectory =  "C:/laragon/www/wiki/public/assets/uploads/";
//                     $filename = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['title']);

//                     // Validate file extension
//                     $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
//                     $originalExtension = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));

//                     if (!in_array($originalExtension, $allowedExtensions)) {
//                         echo 'Invalid file extension.';
//                         return;
//                     }

//                     $targetFileName = $uploadDirectory . $filename . '.' . $originalExtension;

//                     if (move_uploaded_file($imageFile['tmp_name'], $targetFileName)) {
//                         $image = $filename . '.' . $originalExtension;
//                     } else {
//                         echo 'File upload failed. Please try again later.';
//                         return;
//                     }
//                 }

//                 // Get form data
//                 $data = [
//                     'title' => $_POST['title'],
//                     'description' => $_POST['description'],
//                     'content' => $_POST['content'],
//                     'categorie_id' => $_POST['categorie'],
//                     'user_id' => $_SESSION['id'],
//                     'image' => $image,
//                     'status' => 'Pending'
//                 ];


//                 // Instantiate WikiModel and call createwikis method
//                 $wiki = new WikiModel();
//                 $wiki->createwikis($data);

//                 // var_dump($wiki);
//                 // die();

//                 // Redirect after successful form processing
//                 $redirect = URL_DIR . 'wiki';
//                 header("Location: $redirect");
//                 exit();
//             } else {
//                 echo 'Incomplete form data.';
//             }
//         }
//     }
// } 
