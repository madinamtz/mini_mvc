<section class="product-view">

<style>
.product-view {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 100px;
    font-family: Arial, sans-serif;
    color: #333;
}

.product-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 30px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.product-container h2 {
    text-align: center;
    font-size: 36px;
    font-weight: 400;
    color: #000;
    margin-bottom: 30px;
}

.product-container form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 30px;
}

.product-container label {
    font-size: 14px;
    color: #000;
    font-weight: 500;
    margin-bottom: 5px;
}

.product-container input,
.product-container textarea,
.product-container select {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: inherit;
    font-size: 15px;
    color: #333;
}

.product-container textarea {
    resize: vertical;
}

.product-container small {
    display: block;
    margin-top: 5px;
    font-size: 13px;
    color: #666;
}

.product-container .message {
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 14px;
    border: 1px solid;
}

.product-container .message.success {
    background-color: #d4edda;
    color: #155724;
    border-color: #c3e6cb;
}

.product-container .message.error {
    background-color: #f8d7da;
    color: #721c24;
    border-color: #f5c6cb;
}

.product-container .image-preview {
    margin-top: 10px;
}

.product-container .image-preview img {
    max-width: 100%;
    max-height: 300px;
    border: 1px solid #ddd;
    border-radius: 4px;
    object-fit: contain;
}

.product-container button {
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

.product-container button:hover {
    opacity: 0.8;
}

.product-container .links {
    margin-top: 25px;
    display: flex;
    gap: 20px;
    font-size: 15px;
    justify-content: center;
}

.product-container .links a {
    color: #000;
    text-decoration: none;
    font-weight: 500;
}

.product-container .links .separator {
    color: #ccc;
}
</style>

<div class="product-container">
    <h2>Ajouter un nouveau produit</h2>

    <!-- Message de succès ou d'erreur -->
    <?php if (isset($message)): ?>
        <div class="message <?= isset($success) && $success ? 'success' : 'error' ?>">
            <?= isset($success) && $success ? '✅ ' : '❌ ' ?>
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/products">
        <div>
            <label for="nom">Nom du produit :</label>
            <input
                type="text"
                id="nom"
                name="nom"
                required
                maxlength="150"
                placeholder="Entrez le nom du produit"
                value="<?= isset($old_values['nom']) ? htmlspecialchars($old_values['nom']) : '' ?>"
            >
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea
                id="description"
                name="description"
                rows="4"
                placeholder="Entrez la description du produit (optionnel)"
            ><?= isset($old_values['description']) ? htmlspecialchars($old_values['description']) : '' ?></textarea>
        </div>

        <div>
            <label for="prix">Prix :</label>
            <input
                type="number"
                id="prix"
                name="prix"
                required
                step="0.01"
                min="0"
                placeholder="0.00"
                value="<?= isset($old_values['prix']) ? htmlspecialchars($old_values['prix']) : '' ?>"
            >
        </div>

        <div>
            <label for="stock">Stock :</label>
            <input
                type="number"
                id="stock"
                name="stock"
                required
                min="0"
                placeholder="0"
                value="<?= isset($old_values['stock']) ? htmlspecialchars($old_values['stock']) : '' ?>"
            >
        </div>

        <div>
            <label for="categorie_id">Catégorie :</label>
            <select id="categorie_id" name="categorie_id">
                <option value="">-- Sélectionnez une catégorie (optionnel) --</option>
                <?php if (isset($categories)): ?>
                    <?php foreach ($categories as $categorie): ?>
                        <option
                            value="<?= $categorie['id'] ?>"
                            <?= (isset($old_values['categorie_id']) && $old_values['categorie_id'] == $categorie['id']) ? 'selected' : '' ?>
                        >
                            <?= htmlspecialchars($categorie['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <small>Sélectionnez la catégorie du produit (optionnel)</small>
        </div>

        <div>
            <label for="image_url">URL de l'image :</label>
            <input
                type="url"
                id="image_url"
                name="image_url"
                placeholder="https://exemple.com/image.jpg"
                value="<?= isset($old_values['image_url']) ? htmlspecialchars($old_values['image_url']) : '' ?>"
            >
            <small>Entrez l'URL complète de l'image (optionnel)</small>
        </div>

        <?php if (!empty($old_values['image_url']) && filter_var($old_values['image_url'], FILTER_VALIDATE_URL)): ?>
            <div class="image-preview">
                <label>Aperçu de l'image :</label>
                <img
                    src="<?= htmlspecialchars($old_values['image_url']) ?>"
                    alt="Aperçu"
                    onerror="this.style.display='none'"
                >
            </div>
        <?php endif; ?>

        <button type="submit">Créer le produit</button>
    </form>

    <div class="links">
        <a href="/products">📋 Voir la liste des produits</a>
        <span class="separator">|</span>
        <a href="/">← Retour à l'accueil</a>
    </div>
</div>
</section>
