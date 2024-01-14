<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Model\WikiModel;
use App\Model\TagModel;
use App\Model\CategorieModel;

session_start();

class DashboardController
{
    public function index()
    {
        $usersModel = new UserModel;
        $users = $usersModel->totalUsers();

        $wikisModel = new WikiModel;
        $wikis = $wikisModel->totalWikis();
        $wikiPending = $wikisModel->totalwikisPending();

        $tagModel = new TagModel;
        $tags = $tagModel->totalTags();

        $categorieModel = new CategorieModel;
        $categories =  $categorieModel->totalCategories();


        if (isset($_SESSION['id']) && $_SESSION['role_id'] == 2) {
            Controller::renderDash(["users" => $users, "wikis" => $wikis, "wikiPending" => $wikiPending,  "tags" => $tags , "categories" => $categories]);
        } else {
            Controller::render("login");
        }
    }
}
