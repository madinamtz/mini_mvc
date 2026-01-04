<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    font-family: Arial, sans-serif;
    color: #000;
}

.header {
    margin-top: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.header h2 {
    font-size: 32px;
    font-weight: 400;
}

.btn-add {
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
}

.btn-add:hover {
    opacity: 0.8;
}

.no-products {
    text-align: center;
    padding: 60px;
    background-color: #f2f2f2;
    border-radius: 4px;
}

.no-products p {
    color: #666;
    font-size: 18px;
    margin-bottom: 20px;
}

.no-products a {
    color: #000;
    text-decoration: none;
    font-weight: 500;
}

.no-products a:hover {
    opacity: 0.8;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
}

.product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-image {
    margin-bottom: 15px;
    text-align: center;
}

.product-image img {
    max-width: 100%;
    max-height: 200px;
    border-radius: 4px;
    object-fit: contain;
}

.no-image {
    margin-bottom: 15px;
    text-align: center;
    padding: 40px;
    background-color: #f2f2f2;
    border-radius: 4px;
    color: #999;
    font-size: 14px;
}

.product-title {
    margin: 0 0 10px 0;
    font-size: 20px;
    color: #000;
    min-height: 48px;
}

.product-description {
    margin: 0 0 15px 0;
    font-size: 14px;
    color: #666;
    line-height: 1.5;
    min-height: 50px;
}

.product-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.product-price {
    font-size: 20px;
    font-weight: bold;
    color: #28a745;
}

.product-stock {
    font-size: 12px;
    color: #666;
}

.product-category {
    font-size: 12px;
    color: #000;
}

.product-actions {
    margin-top: 15px;
    display: flex;
    gap: 10px;
}

.btn-details {
    flex: 1;
    padding: 8px 12px;
    background-color: #b0b0b0ff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
    font-size: 14px;
    white-space: nowrap;
}

.btn-details:hover {
    opacity: 0.8;
}

.btn-add-cart {
    flex: 1;
    padding: 8px 12px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    white-space: nowrap;
}

.btn-add-cart:hover {
    opacity: 0.8;
}

.btn-add-cart[disabled] {
    background-color: #ccc;
    cursor: not-allowed;
}
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

.product-id {
    margin-top: 5px;
    font-size: 12px;
    color: #b0b0b0ff;
}

/* style pour les filtres */
/* =====================
   Filtres produits
===================== */

.filters-form {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 30px;
    padding: 15px 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    align-items: center;
}

.filters-form select {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    background-color: #fff;
    color: #000;
    min-width: 180px;
    cursor: pointer;
}

.filters-form select:focus {
    outline: none;
    border-color: #000;
}

.filters-form button {
    padding: 9px 18px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    font-weight: 500;
}

.filters-form button:hover {
    opacity: 0.85;
}

.filters-form a {
    font-size: 14px;
    color: #666;
    text-decoration: none;
    margin-left: auto;
}

.filters-form a:hover {
    color: #000;
    text-decoration: underline;
}

</style>

<!-- Liste des produits -->
<div class="container">
    <div class="header">
        <h2>Liste des produits</h2>
        <a href="/products/create" class="btn-add"><strong>+</strong> Ajouter un produit</a>
    </div>

    <!-- Filtres -->
    <form method="GET" action="/products" class="filters-form">
        
        <!-- Filtre catégorie -->
        <select name="category">
            <option value="">Toutes les catégories</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"
                    <?= (isset($_GET['category']) && $_GET['category'] == $cat['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Tri prix -->
        <select name="order_price">
            <option value="">Trier par prix</option>
            <option value="asc" <?= ($_GET['order_price'] ?? '') === 'asc' ? 'selected' : '' ?>>Prix croissant</option>
            <option value="desc" <?= ($_GET['order_price'] ?? '') === 'desc' ? 'selected' : '' ?>>Prix décroissant</option>
        </select>

        <!-- Tri stock -->
        <select name="order_stock">
            <option value="">Trier par stock</option>
            <option value="asc" <?= ($_GET['order_stock'] ?? '') === 'asc' ? 'selected' : '' ?>>Stock croissant</option>
            <option value="desc" <?= ($_GET['order_stock'] ?? '') === 'desc' ? 'selected' : '' ?>>Stock décroissant</option>
        </select>

        <button type="submit">Filtrer</button>

        <a href="/products" style="align-self:center;">Réinitialiser</a>
    </form>


    <?php if (empty($products)): ?>
        <div class="no-products">
            <p>Aucun produit disponible.</p>
            <a href="/products/create">Créer le premier produit</a>
        </div>
    <?php else: ?>
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <!-- Image du produit -->
                    <?php if (!empty($product['image_url'])): ?>
                        <div class="product-image">
                            <img 
                                src="<?= htmlspecialchars($product['image_url']) ?>" 
                                alt="<?= htmlspecialchars($product['nom']) ?>"
                                onerror="this.style.display='none'"
                            >
                        </div>
                    <?php else: ?>
                        <div class="no-image">Aucune image</div>
                    <?php endif; ?>
                    
                    <!-- Informations du produit -->
                    <h3 class="product-title"><?= htmlspecialchars($product['nom']) ?></h3>
                    
                    <?php if (!empty($product['description'])): ?>
                        <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                    <?php endif; ?>
                    
                    <div class="product-info">
                        <div>
                            <div class="product-price">
                                <?= number_format((float)$product['prix'], 2, ',', ' ') ?> €
                            </div>
                            <div class="product-stock">
                                Stock: <?= htmlspecialchars($product['stock']) ?>
                            </div>
                            <?php if (!empty($product['categorie_nom'])): ?>
                                <div class="product-category">📁 <?= htmlspecialchars($product['categorie_nom']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="product-actions">
                        <a href="/products/show?id=<?= htmlspecialchars($product['id']) ?>" class="btn-details">Voir détails</a>
                        <form method="POST" action="/cart/add-from-form" style="flex: 1; margin: 0;">
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                            <input type="hidden" name="quantite" value="1">
                            <input type="hidden" name="user_id" value="1">
                            <button type="submit" class="btn-add-cart"
                                    <?= $product['stock'] <= 0 ? 'disabled title="Stock épuisé"' : '' ?>>
                                Ajouter au panier
                            </button>
                        </form>
                    </div>
                    
                    <div class="product-id">ID: <?= htmlspecialchars($product['id']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <div class="product-footer">
        <a href="/">← Retour à l'accueil</a>
        <a href="/cart?user_id=1" class="cart">🛒 Voir mon panier</a>
    </div>

</div>
