<?php

namespace App\Controller;

use App\Model\TagModel;

session_start();
class TagController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $tags = new TagModel();
            $tags = $tags->readtags();

            Controller::rendertagViews("tag", ["tags" => $tags]);
        } else {
            Controller::render("login");
        }
    }

    public function delete($id)
    {
        $tag = new TagModel();
        $tag->deletetags($id);

        $redirect = URL_DIR . 'tag';
        header("Location: $redirect");

        exit();
    }
}
