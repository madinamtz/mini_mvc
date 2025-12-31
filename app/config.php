<?php
$config = parse_ini_file(__DIR__ . '/config.ini');

try {
    $pdo = new PDO(
        "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']};charset=utf8mb4",
        $config['DB_USERNAME'],
        $config['DB_PASSWORD']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base : " . $e->getMessage());
}

// mettre require_once __DIR__ . '/../app/config.php'; dans tous les fichiers qui ont besoin de la db