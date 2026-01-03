<section class="auth-view">

<style>
.auth-view {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 100px;
    font-family: Arial, sans-serif;
    color: #333;
}

/* Container principal */
.auth-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 30px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

/* Titres */
.auth-container h2 {
    text-align: center;
    font-size: 36px;
    font-weight: 400;
    color: #000;
    margin-bottom: 30px;
}

.auth-container h3 {
    font-size: 20px;
    font-weight: 400;
    margin-bottom: 15px;
    color: #000;
}

/* Formulaire */
.auth-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 30px;
}

.auth-container input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: inherit;
    font-size: 15px;
    color: #333;
}

.auth-container input:focus {
    outline: none;
    border-color: #000;
    box-shadow: 0 0 0 2px rgba(0,0,0,0.1);
}

/* Boutons */
.auth-container button {
    padding: 12px 0;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: opacity 0.2s ease;
}

.auth-container button:hover {
    opacity: 0.8;
}

/* Séparateur */
.auth-container hr {
    margin: 30px 0;
    border: none;
    border-top: 1px solid #ddd;
}

/* Footer */
.auth-footer {
    margin-top: 50px;
    text-align: center;
}

.auth-footer a {
    color: #000;
    text-decoration: none;
    font-weight: 500;
}

.auth-footer a:hover {
    opacity: 0.8;
}
</style>

<div class="auth-container">
    <h2>Connexion / Inscription</h2>

    <!-- CONNEXION -->
    <h3>Se connecter</h3>
    <form method="POST" action="/login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Connexion</button>
    </form>

    <hr>

    <!-- INSCRIPTION -->
    <h3>S’inscrire</h3>
    <form method="POST" action="/register">
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Créer un compte</button>
    </form>
</div>

<div class="auth-footer">
    <a href="/">← Retour à l'accueil</a>
</div>

</section>
