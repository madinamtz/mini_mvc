<div class="container">
    <h2>Gestion du stock</h2>

    <table class="stock-table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Stock actuel</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['nom']) ?></td>
                <td><?= $product['stock'] ?></td>
                <td>
                    <form method="POST" action="/stock/update">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="number" name="quantity" value="0" style="width:60px;">
                        <button type="submit">Mettre à jour</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top:20px;">
        <a href="/products">← Retour aux produits</a>
    </div>
</div>

<style>

    .stock-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.stock-table th,
.stock-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: left;
}

.stock-table th {
    background-color: #f2f2f2;
    color: #000;
}

.stock-table tr:nth-child(even) {
    background-color: #fafafa;
}

.stock-table button {
    padding: 6px 12px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.stock-table button:hover {
    opacity: 0.8;
}

</style>