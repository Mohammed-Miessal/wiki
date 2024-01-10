<?php

namespace App\Controller;
use App\Model\CategorieModel;
session_start();

class CategorieController
{

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $categories = new CategorieModel();
            $categories = $categories->readcategories();

            Controller::rendercategorieViews("categorie" ,["categories"=> $categories]);
        } else {
            Controller::render("login");
        }
    }

    public function delete($id)
    {
        $categorie = new CategorieModel();
        $categorie->deletecategorie($id);

        $redirect = URL_DIR . 'categorie';
        header("Location: $redirect");

        exit();
    }

}
