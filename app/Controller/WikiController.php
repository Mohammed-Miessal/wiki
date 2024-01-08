<?php

namespace App\Controller;

class WikiController
{
    public function index()
    {
        include("../app/View/dashboard/wiki/wiki.php");
    }
}
