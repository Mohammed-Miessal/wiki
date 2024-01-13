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

    public static function rendereditwikiViews($view, $data = [], $data2 = [])
    {
        $viewPath = "../app/View/dashboard/wiki/$view.php";

        extract($data);  // Extract data array into variables
        extract($data2);
        include $viewPath;
    }


    public static function renderHome($view, $data = [], $data2 = [])
    {
        $viewPath = "../app/View/$view.php";


        extract($data);  // Extract data array into variables

        extract($data2);  // Extract data2 array into variables


        include $viewPath;
    }

    public static function renderHome2($view, $data = [], $data2 = [],  $data3 = [],  $data4 = [])
    {
        $viewPath = "../app/View/$view.php";


        extract($data);  // Extract data array into variables

        extract($data2);  // Extract data2 array into variables

        extract($data3);  // Extract data3 array into variables

        extract($data4);  // Extract data4 array into variables


        include $viewPath;
    }

    // public static function getIdFromUri()
    // {
    //     $id = $_SERVER['REQUEST_URI'] ?? '';
    //     $id = explode('/', trim(strtolower($id), '/'));
    //     $id =  $id[3] ;
    //     return $id;
    // }

}
