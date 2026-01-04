<div class="container">
    <h2>Gestion du stock des produits</h2>

    <?php if (empty($products)): ?>
        <p>Aucun produit disponible.</p>
    <?php else: ?>
        <form method="POST" action="/stock/update">
            <table class="stock-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Stock actuel</th>
                        <th>Modifier stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['id']) ?></td>
                            <td><?= htmlspecialchars($product['nom']) ?></td>
                            <td><?= $product['stock'] ?></td>
                            <td>
                                <input type="number" name="stock[<?= $product['id'] ?>]" value="<?= $product['stock'] ?>" min="0">
                            </td>
                            <td>
                                <button type="submit" name="update_id" value="<?= $product['id'] ?>">Mettre à jour</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    <?php endif; ?>

    <div class="stock-footer">
        <a href="/">← Retour à l'accueil</a>
        <a href="/products">Voir les produits</a>
    </div>
</div>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
    font-family: Arial, sans-serif;
    color: #000;
}

h2 {
    font-size: 32px;
    font-weight: 400;
    margin-bottom: 30px;
}

.stock-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 40px;
}

.stock-table th,
.stock-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.stock-table th {
    background-color: #000;
    color: #fff;
}

.stock-table tr:nth-child(even) {
    background-color: #fafafa;
}

.stock-table input[type="number"] {
    width: 80px;
    padding: 6px 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.stock-table button {
    padding: 6px 12px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: opacity 0.2s ease;
}

.stock-table button:hover {
    opacity: 0.8;
}

.stock-footer {
    margin-top: 30px;
}

.stock-footer a {
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 500;
    margin-right: 10px;
}

.stock-footer a:hover {
    opacity: 0.8;
}
</style>
