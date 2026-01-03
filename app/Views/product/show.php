<section class="product-view">

<style>
.product-view {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 100px;
    font-family: Arial, sans-serif;
    color: #333;
}

/* Bloc vide */
.product-empty {
    text-align: center;
    padding: 80px;
    background-color: #f8f8f8;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.product-empty h2 {
    font-size: 32px;
    font-weight: 400;
    margin-bottom: 20px;
    color: #000;
}

.product-empty p {
    margin-bottom: 30px;
    color: #666;
}

.product-empty a {
    padding: 12px 30px;
    background-color: #000;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.product-empty a:hover {
    opacity: 0.8;
}

/* Bloc principal */
.product-main {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    margin-bottom: 30px;
}

.product-image img {
    width: 100%;
    max-height: 500px;
    border-radius: 8px;
    object-fit: contain;
    border: 1px solid #ddd;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.product-image .no-image {
    width: 100%;
    height: 400px;
    background-color: #f2f2f2;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ddd;
    color: #999;
    font-size: 18px;
}

.product-info h1 {
    margin: 0 0 20px 0;
    font-size: 36px;
    font-weight: 400;
    color: #000;
}

.product-category {
    margin-bottom: 20px;
}

.product-category span {
    padding: 5px 15px;
    background-color: #f2f2f2;
    color: #000;
    border-radius: 20px;
    font-size: 14px;
}

.product-price {
    font-size: 28px;
    font-weight: bold;
    color: #000;
    margin-bottom: 10px;
}

.product-stock {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 20px;
}

.product-stock.in-stock {
    color: #28a745;
}

.product-stock.out-of-stock {
    color: #dc3545;
}

.product-description {
    margin-bottom: 30px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.product-description h3 {
    margin: 0 0 15px 0;
    font-size: 20px;
    color: #000;
}

.product-description p {
    margin: 0;
    color: #666;
    line-height: 1.6;
    white-space: pre-wrap;
}

/* Formulaire */
.product-form {
    margin-top: 20px;
    display: flex;
    gap: 10px;
    align-items: center;
}

.product-form label {
    font-weight: 500;
    color: #000;
}

.product-form input[type="number"] {
    width: 80px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.product-form button {
    flex: 1;
    padding: 12px 20px;
    background-color: #000;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
}

.product-form button:hover {
    opacity: 0.8;
}

/* Avertissement stock */
.product-warning {
    padding: 15px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #666;
    margin-top: 30px;
}

/* Footer */
.product-footer {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.product-footer a {
    padding: 10px 20px;
    background-color: #000;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.product-footer a.cart {
    background-color: #f2f2f2;
    color: #000;
    border: 1px solid #ddd;
}

.product-footer a:hover {
    opacity: 0.8;
}
</style>

<div>
<?php if (!$product): ?>
    <div class="product-empty">
        <h2>Produit introuvable</h2>
        <p>Le produit que vous recherchez n'existe pas ou a été supprimé.</p>
        <a href="/products">← Retour à la liste des produits</a>
    </div>
<?php else: ?>
    <div class="product-main">
        <div class="product-image">
            <?php if (!empty($product['image_url'])): ?>
                <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['nom']) ?>" onerror="this.style.display='none'">
            <?php else: ?>
                <div class="no-image">Aucune image disponible</div>
            <?php endif; ?>
        </div>

        <div class="product-info">
            <h1><?= htmlspecialchars($product['nom']) ?></h1>

            <?php if (!empty($product['categorie_nom'])): ?>
                <div class="product-category">
                    <span>📁 <?= htmlspecialchars($product['categorie_nom']) ?></span>
                </div>
            <?php endif; ?>

            <div class="product-price"><?= number_format((float)$product['prix'],2,',',' ') ?> €</div>

            <div class="product-stock <?= $product['stock'] > 0 ? 'in-stock' : 'out-of-stock' ?>">
                <?= $product['stock'] > 0 ? "✅ En stock ({$product['stock']} disponible" . ($product['stock']>1?'s':'') . ")" : "❌ Stock épuisé" ?>
            </div>

            <?php if (!empty($product['description'])): ?>
                <div class="product-description">
                    <h3>Description</h3>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                </div>
            <?php endif; ?>

            <?php if ($product['stock'] > 0): ?>
                <form method="POST" action="/cart/add-from-form" class="product-form">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                    <input type="hidden" name="user_id" value="1">
                    <label for="quantite">Quantité :</label>
                    <input type="number" id="quantite" name="quantite" value="1" min="1" max="<?= htmlspecialchars($product['stock']) ?>" required>
                    <button type="submit">🛒 Ajouter au panier</button>
                </form>
            <?php else: ?>
                <div class="product-warning">
                    ⚠️ Ce produit n'est actuellement pas disponible en stock.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="product-footer">
        <a href="/products">← Retour à la liste des produits</a>
        <a href="/cart?user_id=1" class="cart">🛒 Voir mon panier</a>
    </div>
<?php endif; ?>
</div>

</section>
