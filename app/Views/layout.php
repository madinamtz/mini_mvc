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
    margin: 0;
    flex: 1 0 auto; 
    position: relative;
}

html, body {
        min-height: 100vh;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
}

.site-header {
    border-bottom: 2px solid #000;
    background: #fff;
}

.header-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-left,
.header-right {
    display: flex;
    align-items: center;
    gap: 25px;
}

.logo {
    height: 60px;
    width: auto;
}

/* Liens du header */
.header-link {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #000;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
}

/* menus burger */
.dropdown {
    position: relative;
}

.dropdown > span {
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
}

.header-link,
.dropdown > span {
    font-size: 18px;
    font-weight: 500;
    line-height: 1.1;
}


.dropdown-menu {
    display: none;
    position: absolute;
    top: 120%;
    left: 0;
    background: #fff;
    border: 1px solid #000;
    list-style: none;
    min-width: 200px;
    padding: 8px 0;
    z-index: 1000;
}

.dropdown-menu li {
    padding: 10px 18px;
}

.dropdown-menu li a {
    color: #000;
    text-decoration: none;
}

.dropdown-menu li:hover {
    background: #f2f2f2;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

/* page d'accueil */
.home {
    display: flex;
    gap: 10px;
    padding: 10px 10px 10px 100px;
    align-items: stretch;
}

.home-left {
    position: relative;
    width: 45%;
    display: flex;
    flex-direction: column;
    padding-right: 0;
}

.home::after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: calc(45% + 100px + 10px); 
    width: 2px;
    background-color: #000;
}



.home-left h1 {
    margin-top: 40px;
    font-size: 72px;
    font-weight: 400;
    line-height: 1.05;
    margin-bottom: 40px;
}

.home-left h1 em {
    font-style: italic;
    font-weight: 300;
}

.home-left p {
    max-width: 520px;
    font-size: 16px;
    line-height: 1.7;
    text-align: justify;
    margin-bottom: auto;
}


.home-products {
    display: flex;
    gap: 80px;
    align-items: center;
    margin-top: 40px;

}

.home-products img {
    width: 240px;
    height: auto;
}

.home-right {
    width: 55%;
    display: flex;
    justify-content: flex-end;
}

.home-right img {
    width: 100%;
    max-width: 700px;
    height: auto;
}


.menu-icon,
.account {
    position: relative;
    cursor: pointer;
}

.footer {
        flex-shrink: 0;
        padding: 20px 0;
        background-color: #fff;
        color: #000;
        text-align: center;
        font-size: 14px;
        border-top: 2px solid #000;
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

<header class="site-header">
    <div class="header-inner">

        <div class="header-left">
            <a href="/">
                <img class="logo" 
                     src="https://i.pinimg.com/736x/1c/8d/da/1c8dda0d0e6284cc9c451064f4f7e8ef.jpg" 
                     alt="Fallen Angel">
            </a>

            <!-- Menu burger -->
            <div class="dropdown">
                <span>☰</span>
                <ul class="dropdown-menu">
                    <li><a href="/products?category=2">Pulls & sweat-shirts</a></li>
                    <li><a href="/products?category=1">T-shirts</a></li>
                    <li><a href="/products?category=3">Bas & pantalons</a></li>
                    <li><a href="/products?category=4">Chaussures</a></li>
                </ul>
            </div>
        </div>

        <div class="header-right">

            <!-- Panier -->
            <a href="/cart?user_id=<?= $user_id ?>" class="header-link">
                panier
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 
                    1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 
                    8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 
                    3.607 1.61 2H.5a.5.5 0 0 1-.5-.5"/>
                </svg>
            </a>

            <!-- Compte -->
            <div class="dropdown">
                <span class="header-link">
                    <?php if (!empty($_SESSION['user'])): ?>
                        Bonjour <?= htmlspecialchars($_SESSION['user']['nom']) ?>
                    <?php else: ?>
                        compte
                    <?php endif; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 
                        3 0 0 0 0 6m4 8c0 
                        1-1 1-1 1H3s-1 
                        0-1-1 1-4 6-4 
                        6 3 6 4"/>
                    </svg>
                </span>
                <ul class="dropdown-menu">
                    <?php if (!empty($_SESSION['user'])): ?>
                        <li>
                            <a href="/orders?user_id=<?= !empty($_SESSION['user']['id']) ? htmlspecialchars($_SESSION['user']['id']) : 0 ?>">
                                Commandes
                            </a>
                        </li>

                        <!-- Lien admin uniquement -->
                        <?php if (!empty($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                            <li><a href="/stock/manage">Gestion du stock</a></li>
                        <?php endif; ?>

                        <li><a href="/logout">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="/login">Connexion / Inscription</a></li>
                    <?php endif; ?>
                </ul>

            </div>


        </div>
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

