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

            $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

            $data = [
                'status' => $status
            ];

            $categorie = new WikiModel();
            $categorie->editwikis($data, $id);

            $redirect = URL_DIR . 'wiki';
            header("Location: $redirect");


            exit();
        }
    }
}
