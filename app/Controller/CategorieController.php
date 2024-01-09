<?php

namespace App\Controller;
session_start();

class CategorieController
{

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            include "../app/View/dashboard/categorie/categorie.php";
        } else {
            Controller::render("login");
        }
    }
}
