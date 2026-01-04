<?php 

namespace Mini\Controllers;

use Mini\Models\User;

class AuthController
{
    // clé secrete pour créer un compte admin
    private const ADMIN_SECRET_KEY = 'SECRET_ADMIN';

    // Affiche le formulaire de connexion / inscription
    
    public function show()
    {
        // capturer le contenu 
        ob_start();
        require __DIR__ . '/../Views/auth/login.php';
        $content = ob_get_clean();

        // Définition du titre de la page
        $title = 'Connexion / Inscription';
        // Chargement du layout avec le contenu
        require __DIR__ . '/../Views/layout.php';
    }

    // Inqcription d'un nouvel utilisateur
    public function register()
    {
        // Vérifie que tous les champs requis sont remplis
        if (empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['password'])) {
            die('Champs manquants');
        }

        // Création d'un nouveau user
        $user = new User();
        $user->setNom($_POST['nom']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        // Définition du rôle
        if (!empty($_POST['admin_key']) && $_POST['admin_key'] === self::ADMIN_SECRET_KEY) {
            $user->setRole('admin');
        } else {
            $user->setRole('user');
        }

        $user->save();


        // Stocke les info du user dans la session
        $_SESSION['user'] = [
            'id'    => $user->getId(),
            'nom'   => $_POST['nom'],
            'email' => $_POST['email'],
            'role'  => $user->getRole()
        ];

        ob_start();
        require __DIR__ . '/../Views/auth/register-success.php';
        $content = ob_get_clean();

        $title = 'Inscription validée';
        require __DIR__ . '/../Views/layout.php';
    }

    // Connexion d'un user existant

    public function login()
    {
        // Vérifie que champs email et mot de passe
        if (empty($_POST['email']) || empty($_POST['password'])) {
            die('Champs manquants');
        }

        // Recherche du user
        $user = User::findByEmail($_POST['email']);

        // Vérifie que le user existe et que le mot de passe est correct
        if (!$user || !password_verify($_POST['password'], $user['password'])) {
            die('Identifiants invalides');
        }

        // Stocke les info du user dans la session
        $_SESSION['user'] = [
            'id'    => $user['id'],
            'nom'   => $user['nom'],
            'email' => $user['email'],
            'role'  => $user['role']
        ];

        // vue de succès de connexion
        ob_start();
        require __DIR__ . '/../Views/auth/login-success.php';
        $content = ob_get_clean();

        $title = 'Connexion validée';
        require __DIR__ . '/../Views/layout.php';
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        // Détruit la session pour déconnecter le user
        session_destroy();
        // Redirection vers la page d'accueil
        header('Location: /');
        exit;
    }
}
