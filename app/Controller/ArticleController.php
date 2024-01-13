<?php

namespace App\Controller;
use App\Model\WikiModel;

class ArticleController
{
    // public function index()
    // {
    //     Controller::render("article");
    // }

    public function show($id)
    {
        $wikis = new WikiModel();
        $wikiContent = $wikis->showcontent($id); // Capture the result of showcontent
        Controller::render("article", ["wikiContent" => $wikiContent]); // Pass $wikiContent to the view
    }

}
