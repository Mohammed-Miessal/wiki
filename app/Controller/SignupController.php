<?php

namespace App\Controller;

use App\Model\UserModel;

class SignupController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $redirect = URL_DIR . 'home';
            header("Location: $redirect");
        } else {
            Controller::render("signup");
        }
    }



    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

            $role_id = 1;

            $errors = [];

            if (empty($name) || empty($email) || empty($password)) {

                $errors[] = "All fields are required";
            }

            if (!empty($errors)) {
                // Afficher les erreurs à l'utilisateur plutôt que de simplement rediriger
                Controller::render("signup", ['errors' => $errors]);
                return;
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role_id' => $role_id
            ];



            $user = new UserModel();
            $redirect = URL_DIR . 'login';

            $user = $user->createUser($data);

            if ($user) {
                header("Location: $redirect");
            } else {
                $_SESSION['error'] = "Error creating user";
                header("Location: $redirect");
            }
        }
    }
}
