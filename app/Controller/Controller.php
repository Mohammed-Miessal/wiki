<?php

namespace App\Controller;

class Controller
{
    public static function render($view, $data = [])
    {
        $viewPath = "../app/View/$view.php";

        extract($data);  // Extract data array into variables
        include $viewPath;
    }

    public static function rendercategorieViews($view, $data = [])
    {
        $viewPath = "../app/View/dashboard/categorie/$view.php";

        extract($data);  // Extract data array into variables
        include $viewPath;
    }

    public static function rendertagViews($view, $data = [])
    {
        $viewPath = "../app/View/dashboard/tag/$view.php";

        extract($data);  // Extract data array into variables
        include $viewPath;
    }


    public static function renderwikiViews($view, $data = [])
    {
        $viewPath = "../app/View/dashboard/wiki/$view.php";

        extract($data);  // Extract data array into variables
        include $viewPath;
    }


}