<section class="order-details-view">

<style>
.order-details-view {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 100px;
    font-family: Arial, sans-serif;
    color: #333;
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.order-header h2 {
    font-size: 36px;
    color: #000;
    margin: 0;
}

.order-header a {
    padding: 12px 30px;
    background-color: #000;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.order-header a:hover {
    opacity: 0.8;
}

.order-info-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.order-info-card div > span.status-badge {
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    display: inline-block;
}

.status-validee {
    background-color: #28a745;
    color: white;
}

.status-en_attente {
    background-color: #ffc107;
    color: #212529;
}

.status-annulee {
    background-color: #dc3545;
    color: white;
}

.status-autre {
    background-color: #007bff;
    color: white;
}

.order-info-card div {
    font-size: 14px;
    color: #666;
}

.order-info-card div strong {
    color: #000;
    font-weight: bold;
}

.order-info-card div .total-price {
    font-size: 28px;
    font-weight: bold;
    color: #000;
}

.order-products-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 25px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.order-products-card h3 {
    margin: 0 0 20px 0;
    font-size: 20px;
    color: #000;
}

.order-product-item {
    display: flex;
    gap: 20px;
    align-items: center;
    border: 1px solid #eee;
    border-radius: 4px;
    padding: 15px;
    margin-bottom: 15px;
    background-color: #fefefe;
}

.order-product-item img {
    width: 80px;
    height: 80px;
    object-fit: contain;
    border-radius: 4px;
    border: 1px solid #eee;
}

.order-product-info {
    flex: 1;
}

.order-product-info h4 {
    margin: 0 0 5px 0;
    color: #000;
    font-size: 16px;
}

.order-product-info .category {
    font-size: 12px; color: #666;
    margin-bottom: 5px;
}

.order-product-info .quantity {
    font-size: 14px;
    color: #666;
}

.order-product-price {
    text-align: right;
}

.order-product-price .unit-price {
    font-size: 18px;
    font-weight: bold;
    color: #000;
}

.order-product-price .subtotal {
    font-size: 12px;
    color: #666;
    margin-top: 5px;
}

.order-message {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    color: #fff;
}

.order-message.success {
    background-color: #28a745;
}

.order-message.error {
    background-color: #dc3545;
}

/* footer */ 
.order-footer {
    margin-top: 50px;
    text-align: center;
}

.order-footer a {
    color: #000;
    text-decoration: none;
}

.order-footer a:hover {
    opacity: 0.8;
}

</style>

<?php if (!$order): ?>
    <div class="order-not-found">
        <div class="order-not-found-icon">❌</div>
        <h2>Commande introuvable</h2>
        <p>La commande que vous recherchez n'existe pas ou a été supprimée.</p>
        <div>
            <a href="/orders?user_id=<?= $order['user_id'] ?? 1 ?>">📋 Mes commandes</a>
            <a href="/products">← Retour aux produits</a>
        </div>
    </div>
<?php else: ?>
    <div class="order-header">
        <h2>Détails de la commande #<?= htmlspecialchars($order['id']) ?></h2>
        <a href="/orders?user_id=<?= htmlspecialchars($order['user_id']) ?>">← Retour à mes commandes</a>
    </div>

    <?php if (isset($message) && $message): ?>
        <div class="order-message <?= $messageType === 'success' ? 'success' : 'error' ?>">
            <?= $messageType === 'success' ? '✅ ' : '❌ ' ?><?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="order-info-card">
        <div>
            Statut<br>
            <?php 
            $statusClass = 'status-autre';
            $statusLabel = htmlspecialchars($order['statut']);
            if ($order['statut'] === 'validee') { $statusClass = 'status-validee'; $statusLabel = '✅ Validée'; }
            elseif ($order['statut'] === 'en_attente') { $statusClass = 'status-en_attente'; $statusLabel = '⏳ En attente'; }
            elseif ($order['statut'] === 'annulee') { $statusClass = 'status-annulee'; $statusLabel = '❌ Annulée'; }
            ?>
            <span class="status-badge <?= $statusClass ?>"><?= $statusLabel ?></span>
        </div>
        <div>Date de commande<br><strong><?= date('d/m/Y à H:i', strtotime($order['created_at'])) ?></strong></div>
        <div>Client<br><strong><?= htmlspecialchars($order['user_nom'] ?? 'Utilisateur #' . $order['user_id']) ?></strong><br><span style="font-size:12px;color:#666"><?= htmlspecialchars($order['user_email'] ?? '') ?></span></div>
        <div>Total<br><strong class="total-price"><?= number_format((float)$order['total'], 2, ',', ' ') ?> €</strong></div>
    </div>

    <div class="order-products-card">
        <h3>Produits commandés</h3>
        <?php if (empty($order['products'])): ?>
            <p style="color: #666;">Aucun produit dans cette commande.</p>
        <?php else: ?>
            <?php foreach ($order['products'] as $product): ?>
                <div class="order-product-item">
                    <div>
                        <?php if (!empty($product['image_url'])): ?>
                            <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['product_nom']) ?>" onerror="this.style.display='none'">
                        <?php else: ?>
                            <div style="width:80px;height:80px;background-color:#f2f2f2;border-radius:4px;display:flex;align-items:center;justify-content:center;border:1px solid #eee;color:#999;font-size:10px;">Pas d'image</div>
                        <?php endif; ?>
                    </div>
                    <div class="order-product-info">
                        <h4><?= htmlspecialchars($product['product_nom']) ?></h4>
                        <?php if (!empty($product['categorie_nom'])): ?>
                            <div class="category">📁 <?= htmlspecialchars($product['categorie_nom']) ?></div>
                        <?php endif; ?>
                        <div class="quantity">Quantité : <strong><?= htmlspecialchars($product['quantite']) ?></strong></div>
                    </div>
                    <div class="order-product-price">
                        <div class="unit-price"><?= number_format((float)$product['prix_unitaire'],2,',',' ') ?> €</div>
                        <div class="subtotal">Sous-total : <?= number_format((float)$product['prix_unitaire']*(int)$product['quantite'],2,',',' ') ?> €</div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<div class="order-footer">
    <a href="/">← Retour à l'accueil</a>
</div>

</section>
