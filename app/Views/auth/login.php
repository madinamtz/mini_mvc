<div style="max-width: 500px; margin: 0 auto; padding: 30px;">
    <h2 style="text-align: center;">Connexion / Inscription</h2>

    <!-- CONNEXION -->
    <h3>Se connecter</h3>
    <form method="POST" action="/login">
        <input type="email" name="email" placeholder="Email" required style="width:100%;padding:8px;margin-bottom:10px;">
        <input type="password" name="password" placeholder="Mot de passe" required style="width:100%;padding:8px;margin-bottom:10px;">
        <button type="submit" style="width:100%;padding:10px;">Connexion</button>
    </form>

    <hr style="margin:30px 0;">

    <!-- INSCRIPTION -->
    <h3>S’inscrire</h3>
    <form method="POST" action="/register">
        <input type="text" name="nom" placeholder="Nom" required style="width:100%;padding:8px;margin-bottom:10px;">
        <input type="email" name="email" placeholder="Email" required style="width:100%;padding:8px;margin-bottom:10px;">
        <input type="password" name="password" placeholder="Mot de passe" required style="width:100%;padding:8px;margin-bottom:10px;">
        <button type="submit" style="width:100%;padding:10px;">Créer un compte</button>
    </form>
</div>
