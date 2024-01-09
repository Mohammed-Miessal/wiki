<?php

namespace App\Controller;

// session_start();
class HomeController
{
    public function index()
    {
        Controller::render("home");
    }

    // public function index()
    // {
    //     if (session_status() == PHP_SESSION_NONE) {
    //         session_start();
    //     }
    //     if (isset($_SESSION['id'])) {
    //         Controller::render("home");
    //     } else {
    //         Controller::render("login");
    //     }
    // }
}
