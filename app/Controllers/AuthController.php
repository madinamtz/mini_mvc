<?php 

namespace Mini\Controllers;

use Mini\Models\User;

class AuthController
{
    public function show()
    {
        ob_start();
        require __DIR__ . '/../Views/auth/login.php';
        $content = ob_get_clean();

        $title = 'Connexion / Inscription';
        require __DIR__ . '/../Views/layout.php';
    }

    public function register()
    {
        if (
            empty($_POST['nom']) ||
            empty($_POST['email']) ||
            empty($_POST['password'])
        ) {
            die('Champs manquants');
        }

        $user = new User();
        $user->setNom($_POST['nom']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->save();

        $_SESSION['user'] = [
            'nom' => $_POST['nom'],
            'email' => $_POST['email']
        ];

        ob_start();
        require __DIR__ . '/../Views/auth/register-success.php';
        $content = ob_get_clean();

        $title = 'Inscription validée';
        require __DIR__ . '/../Views/layout.php';
    }

    public function login()
    {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            die('Champs manquants');
        }

        $user = User::findByEmail($_POST['email']);

        if (!$user || !password_verify($_POST['password'], $user['password'])) {
            die('Identifiants invalides');
        }

        $_SESSION['user'] = [
            'id'    => $user['id'],
            'nom'   => $user['nom'],
            'email' => $user['email']
        ];

        ob_start();
        require __DIR__ . '/../Views/auth/login-success.php';
        $content = ob_get_clean();

        $title = 'Connexion validée';
        require __DIR__ . '/../Views/layout.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}

?>
