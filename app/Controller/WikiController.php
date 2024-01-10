<?php

namespace App\Controller;

use App\Model\WikiModel;

session_start();

class WikiController
{

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $wikis = new WikiModel();
            $wikis = $wikis->readwikis();
            // include("../app/View/dashboard/wiki/wiki.php");
            Controller::renderwikiViews("wiki", ["wikis" => $wikis]);
        } else {
            Controller::render("login");
        }
    }

    public function delete($id)
    {
        $wikis = new WikiModel();
        $wikis->deletewikis($id);

        $redirect = URL_DIR . 'wiki';
        header("Location: $redirect");

        exit();
    }

}
