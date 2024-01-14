<?php

namespace App\Controller;

use App\Model\UserModel;

session_start();

class LoginController
{
    public function index()
    {
      
        if (isset($_SESSION['id'])) {
            Controller::render("home");
        } else {
            Controller::render("login");
        }
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new UserModel();
            $user = $user->login($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role_id'] = $user['role_id'];

                // if ($_SESSION['role_id'] == 2) {

                //     $redirect = URL_DIR . 'dashboard';
                //     header("Location: $redirect");
                //     exit();
                // } else {

                //     $redirect = URL_DIR . 'wiki';
                //     header("Location: $redirect");
                //     exit();
                // }
                $redirect = ($_SESSION['role_id'] == 2) ? URL_DIR . 'dashboard' : URL_DIR . 'wiki';
                header("Location: $redirect");
                exit();
            } else {

                $redirect = URL_DIR . 'login';
                header("Location: $redirect");
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
            session_start();
            session_unset();
            session_destroy();
            $redirect = URL_DIR . 'login';
            header("Location: $redirect");
            exit();
        }
    }
}
