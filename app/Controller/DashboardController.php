<?php

namespace App\Controller;

session_start();

class DashboardController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            include("../app/View/dashboard/main.php");
        } else {
            Controller::render("login");
        }
    }
}
