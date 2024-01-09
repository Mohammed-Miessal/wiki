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
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role_id = 1;

            $errors = [];

            if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
                $errors[] = "All fields are required";
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
