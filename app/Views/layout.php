<!doctype html>
<html lang="fr">

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

main {
    margin-top: 40px;
}

body {
    font-family: Arial, sans-serif;
}

.header {
    display: flex;
    justify-content: space-between;
    padding: 20px 40px;
    border-bottom: 1px solid #ccc;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.logo {
    font-size: 24px;
    font-weight: bold;
}

.logo span {
    font-size: 12px;
    display: block;
}

.header-right {
    display: flex;
    gap: 30px;
}

.home {
    display: flex;
    padding: 60px;
}

.home-left {
    width: 50%;
}

.home-left h1 {
    font-size: 64px;
    margin-bottom: 30px;
}

.home-left p {
    max-width: 500px;
    margin-bottom: 40px;
    text-align: justify;
    line-height: 1.2;
}

.home-products img {
    margin-right: 20px;
    width: 200px;
    height: auto;
}

.home-right {
    display: flex;
    gap: 20px;
}

.home-right img {
    width: 800px;
    height: 650px;
    align: right;
}

.dropdown {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    color: #333;
    list-style: none;
    margin: 0;
    padding: 8px 10px;
    min-width: 220px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    border-radius: 4px;
    z-index: 1000;
    border: 1px solid #ccc;
}

.dropdown-menu li {
    padding: 10px 20px;
}

.dropdown-menu li:hover {
    background-color: #f2f2f2;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.menu-icon,
.account {
    position: relative;
    cursor: pointer;
}

.footer {
    margin-top: auto;
    padding: 20px 0;
    background-color: #343a40;
    color: white;
    text-align: center;
    font-size: 14px;
}

</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Définit le titre de la page avec échappement -->
    <title><?= isset($title) ? htmlspecialchars($title) : 'App' ?></title>
</head>

<body>
<?php
// Détermine la page active pour la navigation
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$isHome = ($currentPath === '/');
$isProducts = ($currentPath === '/products' || strpos($currentPath, '/products/show') === 0);
$isProductsCreate = ($currentPath === '/products/create');
$isUsersCreate = ($currentPath === '/users/create');
$isCart = ($currentPath === '/cart');
$isOrders = (strpos($currentPath, '/orders') === 0);
$user_id = $_GET['user_id'] ?? 1; // Par défaut user_id = 1 pour la démo
?>

<header>
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <!-- Logo/Titre -->
        <h1 style="margin: 0; font-size: 24px;">
            <a href="/" style="color: white; text-decoration: none;">Mini MVC</a>
        </h1>
        
        <nav>
            <ul style="list-style: none; margin: 0; padding: 0; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                <li>
                    <li class="dropdown">
                        <span style="cursor:pointer; padding: 8px 15px;">☰</span>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/products?category=2">Pulls & sweat-shirts</a>
                            </li>
                            <li>
                                <a href="/products?category=1">T-shirts</a>
                            </li>
                            <li>
                                <a href="/products?category=3">Bas & pantalons</a>
                            </li>
                            <li>
                                <a href="/products?category=4">Chaussures</a>
                            </li>
                        </ul>
                    </li>

                    <a href="/" 
                       style="color: <?= $isHome ? '#000000' : 'black' ?>; 
                              text-decoration: none; 
                              padding: 8px 15px; 
                              border-radius: 4px;
                              display: inline-block;
                              transition: background-color 0.3s;"
                       onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
                       onmouseout="this.style.backgroundColor='transparent'">
                        🏠 Accueil
                    </a>
                </li>
                <li>
                    <a href="/products/create" 
                       style="color: <?= $isProductsCreate ? '#000000' : 'black' ?>; 
                              text-decoration: none; 
                              padding: 8px 15px; 
                              border-radius: 4px;
                              display: inline-block;
                              transition: background-color 0.3s;"
                       onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
                       onmouseout="this.style.backgroundColor='transparent'">
                        ➕ Ajouter un produit
                    </a>
                </li>
                <!-- <li>
                    <a href="/users/create" 
                       style="color: <?= $isUsersCreate ? '#000000' : 'black' ?>; 
                              text-decoration: none; 
                              padding: 8px 15px; 
                              border-radius: 4px;
                              display: inline-block;
                              transition: background-color 0.3s;"
                       onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
                       onmouseout="this.style.backgroundColor='transparent'">
                        👤 Ajouter un utilisateur
                    </a>
                </li> -->
                <li>
                    <a href="/cart?user_id=<?= $user_id ?>" 
                       style="color: <?= $isCart ? '#000000' : 'black' ?>; 
                              text-decoration: none; 
                              padding: 8px 15px; 
                              border-radius: 4px;
                              display: inline-block;
                              transition: background-color 0.3s;
                              background-color: <?= $isCart ? 'rgba(255,255,255,0.1)' : 'transparent' ?>;
                              font-weight: <?= $isCart ? 'bold' : 'normal' ?>;"
                       onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
                       onmouseout="this.style.backgroundColor='<?= $isCart ? 'rgba(255,255,255,0.1)' : 'transparent' ?>'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 
                            1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 
                            12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 
                            4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 
                            4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg> Panier
                    </a>
                </li>
                <li class="dropdown">
                    <span style="cursor:pointer; padding: 8px 15px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 
                    4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 
                    10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    </svg> Compte</span>
                    <ul class="dropdown-menu">
                        <li><a href="/login">Connexion / Inscription</a></li>
                        <li><a href="/orders?user_id=<?= $user_id ?>">Commandes</a></li>
                        <li>Déconnexion</li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</header>
<!-- Zone de contenu principal -->
<main>
    <!-- Insère le contenu rendu de la vue -->
    <?= $content ?>
    
</main>
<footer class="footer">
    <p>© <?= date('Y') ?> Fallen Angel — Tous droits réservés</p>
</footer>

</body>
</html>

