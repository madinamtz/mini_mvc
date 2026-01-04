<?php

// Espace de noms du noyau
namespace Mini\Core;

// Déclare une classe
class Auth
{
    public static function isAdmin(): bool
    {
        return isset($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin';
    }

    public static function checkAdmin()
    {
        if (!self::isAdmin()) {
            http_response_code(403);
            echo "Accès refusé. Vous devez être admin.";
            exit;
        }
    }
}
