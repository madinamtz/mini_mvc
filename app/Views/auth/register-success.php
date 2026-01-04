<section class="auth-view">

<style>
.auth-view {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 100px;
    font-family: Arial, sans-serif;
    color: #333;
    text-align: center;
}

.auth-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 30px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.auth-container h2 {
    font-size: 36px;
    font-weight: 400;
    color: #000;
    margin-bottom: 20px;
}

.auth-container p {
    font-size: 16px;
    color: #333;
    margin-bottom: 20px;
}

.cart-back-products {
    padding: 12px 30px;
    background-color: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
    transition: opacity 0.2s ease;
}

/* style reprit du cart/index.php */
.cart-back-products:hover {
    opacity: 0.8;
}
</style>

<div class="auth-container">
    <h2>✅ Inscription validée</h2>

    <p>
        Bienvenue <strong><?= htmlspecialchars($_SESSION['user']['nom']) ?></strong> !
    </p>

    <p>Votre compte a été créé avec succès 🎉</p>

    <a href="/" class="cart-back-products">Accéder au site</a>
</div>

</section>
