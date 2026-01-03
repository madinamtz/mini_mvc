<?php

namespace Mini\Controllers;

use Mini\Core\Controller; // ← C’est ici qu’on importe ton Controller existant
use Mini\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        $this->render('auth/login');
    }

    public function register()
    {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Création d'un objet User
        $user = new User();
        $user->setNom($nom);
        $user->setEmail($email);
        $user->setPassword($password);

        // Enregistrement en base
        $user->save();

        header('Location: /login');
        exit;
    }


    public function login()
    {
        $user = User::findByEmail($_POST['email']);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            header('Location: /');
            exit;
        }

        header('Location: /login');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}
