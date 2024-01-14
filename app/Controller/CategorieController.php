<?php

namespace App\Controller;

use App\Model\CategorieModel;

session_start();

class CategorieController
{

    public function index()
    {
        if (isset($_SESSION['id']) && $_SESSION['role_id'] == 2) {
            $categoriesModel = new CategorieModel();
            $categories = $categoriesModel->readcategories();

            // Sanitize category names
            // renforcer la sécurité contre les attaques
            //  XSS lors de l'affichage de ces données dans le HTML.
            foreach ($categories as &$category) {
                $category['name'] = htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8');
            }
            unset($category); // Unset the reference to the last item

            Controller::rendercategorieViews("categorie", ["categories" => $categories]);
        } else {
            Controller::render("login");
        }
    }


    public function delete($id)
    {
        if (isset($_SESSION['id']) && $_SESSION['role_id'] == 2) {
            $categorie = new CategorieModel();
            $categorie->deletecategorie($id);

            $redirect = URL_DIR . 'categorie';
            header("Location: $redirect");

            exit();
        } else {
            Controller::render("login");
        }
    }
}
