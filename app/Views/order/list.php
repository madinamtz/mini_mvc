<section class="orders-list">

<style>
.orders-list {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 100px;
    font-family: Arial, sans-serif;
    color: #333;
}

/* Header */
.orders-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
}

.orders-header h2 {
    font-size: 36px;
    font-weight: 400;
    color: #000;
}

.orders-back-products {
    padding: 12px 30px;
    background-color: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.orders-back-products:hover {
    opacity: 0.8;
}

/* Bloc vide */
.orders-empty {
    text-align: center;
    padding: 80px;
    background-color: #f8f8f8;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.orders-empty-icon {
    font-size: 64px;
    margin-bottom: 20px;
    color: #999;
}

.orders-empty h3 {
    margin-bottom: 10px;
    font-weight: 400;
    color: #000;
}

.orders-empty p {
    margin-bottom: 30px;
    color: #666;
}

.orders-empty a {
    padding: 12px 30px;
    background-color: #000;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.orders-empty a:hover {
    opacity: 0.8;
}

/* Bloc commandes */
.orders-items {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.order-item {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.order-item-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 30px;
    flex-wrap: wrap;
}

.order-info {
    flex: 1;
}

.order-title {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.order-title h3 {
    margin: 0;
    font-size: 20px;
    font-weight: 400;
    color: #000;
}

.order-status {
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    background-color: #000;
    color: #fff;
}

.order-date {
    font-size: 14px;
    margin-bottom: 10px;
    color: #666;
}

.order-total {
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin-bottom: 15px;
}

.order-actions a {
    padding: 12px 20px;
    background-color: #000;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    display: inline-block;
    text-align: center;
}

.order-actions a:hover {
    opacity: 0.8;
}

/* Footer */
.orders-footer {
    margin-top: 50px;
    text-align: center;
}

.orders-footer a {
    color: #000;
    text-decoration: none;
}

.orders-footer a:hover {
    opacity: 0.8;
}
</style>

<div class="orders-header">
    <h2>Mes commandes</h2>
    <a href="/products" class="orders-back-products">← Retour aux produits</a>
</div>

<?php if (empty($orders)): ?>
    <div class="orders-empty">
        <div class="orders-empty-icon">📋</div>
        <h3>Aucune commande</h3>
        <p>Vous n'avez pas encore passé de commande.</p>
        <a href="/products">Voir les produits</a>
    </div>
<?php else: ?>
    <div class="orders-items">
        <?php foreach ($orders as $order): ?>
            <div class="order-item">
                <div class="order-item-top">
                    <div class="order-info">
                        <div class="order-title">
                            <h3>Commande #<?= htmlspecialchars($order['id']) ?></h3>
                            <span class="order-status"><?= ucfirst(str_replace('_', ' ', $order['statut'])) ?></span>
                        </div>
                        <div class="order-date">
                            <strong>Date :</strong> <?= date('d/m/Y à H:i', strtotime($order['created_at'])) ?>
                        </div>
                        <div class="order-total"><?= number_format((float)$order['total'], 2, ',', ' ') ?> €</div>
                    </div>
                    <div class="order-actions">
                        <a href="/orders/show?id=<?= htmlspecialchars($order['id']) ?>">Voir les détails</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="orders-footer">
    <a href="/">← Retour à l'accueil</a>
</div>

</section>
