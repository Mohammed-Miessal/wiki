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
            $id = $_SESSION['id'];
            if ($_SESSION['role_id'] == 1) {
                $wikis = new WikiModel();
                $wikis = $wikis->readwikisuser($id);
                // include("../app/View/dashboard/wiki/wiki.php");
                Controller::renderwikiViews("wiki", ["wikis" => $wikis]);
            } else {
                $wikis = new WikiModel();
                $wikis = $wikis->readwikis();
                Controller::renderwikiViews("wiki", ["wikis" => $wikis]);
            }
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

    public function show($id)
    {
        $wikis = new WikiModel();
        $wikiContent = $wikis->showcontent($id); // Capture the result of showcontent
        Controller::renderwikiViews("wikicontent", ["wikiContent" => $wikiContent]); // Pass $wikiContent to the view
    }
}
