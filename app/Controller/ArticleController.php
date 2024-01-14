<?php

namespace App\Controller;

use App\Model\WikiModel;

session_start();
class ArticleController
{

    public function show($id)
    {
        if (isset($_SESSION['id'])) {
            $data['id'] = $_SESSION['id'];
        }

        $wikis = new WikiModel();
        $wikiContent = $wikis->showcontent($id);
        Controller::render("article", ["wikiContent" => $wikiContent]);
    }
}
