<?php

namespace App\Controller;

session_start();

class WikiController
{

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            include("../app/View/dashboard/wiki/wiki.php");
        } else {
            Controller::render("login");
        }
    }
}
