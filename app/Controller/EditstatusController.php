<?php

namespace App\Controller;

use App\Model\WikiModel;


session_start();
class EditstatusController 
{
    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $data = [
                'status' => $_POST['status']
            ];

            $categorie = new WikiModel();
            $categorie->editwikis($data, $id);

            $redirect = URL_DIR . 'wiki';
            header("Location: $redirect");


            exit();
        }
    }
}
