<?php

namespace App\Controller;

session_start();

class DashboardController
{
    public function index()
    {

        if (isset($_SESSION['id'])) {
            Controller::renderDash();
        } else {
            Controller::render("login");
        }
    }
}
