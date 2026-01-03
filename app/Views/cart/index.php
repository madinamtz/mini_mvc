<section class="cart-view">

<style>
.cart-view {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 100px;
    font-family: Arial, sans-serif;
    color: #333;
}

/* Header */
.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
}

.cart-header h2 {
    font-size: 36px;
    font-weight: 400;
    color: #000;
}

.cart-back-products {
    padding: 12px 30px;
    background-color: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.cart-back-products:hover {
    opacity: 0.8;
}

/* Bloc vide */
.cart-empty {
    text-align: center;
    padding: 80px;
    background-color: #f8f8f8;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.cart-empty-icon {
    font-size: 64px;
    margin-bottom: 20px;
    color: #999;
}

.cart-empty h3 {
    margin-bottom: 10px;
    font-weight: 400;
    color: #000;
}

.cart-empty p {
    margin-bottom: 30px;
    color: #666;
}

.cart-empty a {
    padding: 12px 30px;
    background-color: #000;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.cart-empty a:hover {
    opacity: 0.8;
}

/* Bloc articles */
.cart-items {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.cart-item {
    display: flex;
    gap: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    align-items: center;
}

.cart-item-image {
    width: 150px;
    height: 150px;
    border-radius: 8px;
    border: 1px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f2f2f2;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 8px;
}

.cart-item-info {
    flex: 1;
}

.cart-item-info h4 {
    margin: 0 0 10px 0;
    font-size: 20px;
    color: #000;
}

.cart-item-info h4 a {
    color: #000;
    text-decoration: none;
}

.cart-item-info p,
.cart-item-info span {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

.cart-item-price {
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin-bottom: 15px;
}

.cart-item-quantity {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.cart-item-quantity input {
    width: 80px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.cart-item-quantity button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
}

.btn-update {
    background-color: #000;
    color: white;
}

.btn-remove {
    background-color: #dc3545;
    color: white;
}

/* Résumé de commande */
.cart-summary {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    position: sticky;
    top: 20px;
}

.cart-summary h3 {
    margin-bottom: 20px;
    color: #000;
    font-size: 20px;
}

.cart-summary .summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    color: #666;
}

.cart-summary .total-row {
    display: flex;
    justify-content: space-between;
    font-size: 24px;
    font-weight: bold;
    color: #000;
    border-top: 2px solid #000;
    padding-top: 20px;
}

.cart-summary button {
    width: 100%;
    padding: 12px 20px;
    background-color: #000;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
}

.cart-summary a {
    display: block;
    margin-top: 15px;
    text-align: center;
    color: #000;
    text-decoration: none;
    font-size: 14px;
}

.cart-summary button:hover,
.cart-item-quantity button:hover,
.cart-back-products:hover,
.cart-empty a:hover {
    opacity: 0.8;
}

/* Footer */
.cart-footer {
    margin-top: 50px;
    text-align: center;
}

.cart-footer a {
    color: #000;
    text-decoration: none;
}

.cart-footer a:hover {
    opacity: 0.8;
}
</style>

<div class="cart-header">
    <h2>Mon panier</h2>
    <a href="/products" class="cart-back-products">← Continuer les achats</a>
</div>

<?php if (empty($cartItems)): ?>
    <div class="cart-empty">
        <div class="cart-empty-icon">🛒</div>
        <h3>Votre panier est vide</h3>
        <p>Ajoutez des produits à votre panier pour commencer vos achats.</p>
        <a href="/products">Voir les produits</a>
    </div>
<?php else: ?>
    <div class="cart-items">
        <?php foreach ($cartItems as $item): ?>
            <div class="cart-item">
                <div class="cart-item-image">
                    <?php if (!empty($item['image_url'])): ?>
                        <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['nom']) ?>" onerror="this.style.display='none'">
                    <?php else: ?>
                        <span>Pas d'image</span>
                    <?php endif; ?>
                </div>
                
                <div class="cart-item-info">
                    <h4><a href="/products/show?id=<?= htmlspecialchars($item['id']) ?>"><?= htmlspecialchars($item['nom']) ?></a></h4>
                    <?php if (!empty($item['categorie_nom'])): ?>
                        <span>📁 <?= htmlspecialchars($item['categorie_nom']) ?></span>
                    <?php endif; ?>
                    <div class="cart-item-price"><?= number_format((float)$item['prix'],2,',',' ') ?> €</div>
                    
                    <div class="cart-item-quantity">
                        <form method="POST" action="/cart/update">
                            <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['panier_id']) ?>">
                            <label for="quantite_<?= htmlspecialchars($item['panier_id']) ?>">Quantité :</label>
                            <input type="number" id="quantite_<?= htmlspecialchars($item['panier_id']) ?>" name="quantite" value="<?= htmlspecialchars($item['quantite']) ?>" min="1" max="<?= htmlspecialchars($item['stock']) ?>" required>
                            <button type="submit" class="btn-update">Mettre à jour</button>
                        </form>
                        
                        <form method="POST" action="/cart/remove">
                            <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['panier_id']) ?>">
                            <button type="submit" class="btn-remove" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">🗑️ Supprimer</button>
                        </form>
                    </div>
                    
                    <div class="summary-row">Sous-total : <strong><?= number_format((float)$item['prix'] * (int)$item['quantite'],2,',',' ') ?> €</strong></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="cart-summary">
        <h3>Résumé de la commande</h3>
        <div class="summary-row">Sous-total : <span><?= number_format((float)$total,2,',',' ') ?> €</span></div>
        <div class="summary-row">Frais de livraison : <span>Gratuit</span></div>
        <div class="total-row">
            <span>Total :</span>
            <span><?= number_format((float)$total,2,',',' ') ?> €</span>
        </div>
        <form method="POST" action="/orders/create">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
            <button type="submit">✅ Valider la commande</button>
        </form>
        <a href="/products">← Continuer les achats</a>
    </div>
<?php endif; ?>

<div class="cart-footer">
    <a href="/">← Retour à l'accueil</a>
</div>

</section>
