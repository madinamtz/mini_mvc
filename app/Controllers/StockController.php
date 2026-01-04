<?php

namespace Mini\Controllers;

use Mini\Models\Product;

class StockController
{
    // Vérifie si l'utilisateur est admin
    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
            header('HTTP/1.1 403 Forbidden');
            echo "Accès refusé : vous n'êtes pas admin.";
            exit;
        }
    }

    // Page de gestion du stock
    public function manage()
    {
        $this->checkAdmin();

        $products = Product::getAll();

        $this->render('stock/manage', [
            'title' => 'Gestion du stock',
            'products' => $products
        ]);
    }

    // Mise à jour du stock
    public function update()
{
    $this->checkAdmin();

    $productId = $_POST['update_id'] ?? null;

    if (!$productId || !isset($_POST['stock'][$productId]) || !is_numeric($_POST['stock'][$productId])) {
        die('Données invalides');
    }

    $newStock = (int)$_POST['stock'][$productId];

    $product = Product::findById($productId);
    if (!$product) {
        die('Produit introuvable');
    }

    $p = new Product();
    $p->setId($productId);
    $p->setNom($product['nom']);
    $p->setDescription($product['description']);
    $p->setPrix($product['prix']);
    $p->setStock($newStock);
    $p->setImageUrl($product['image_url']);
    $p->setCategorieId($product['categorie_id']);

    if ($p->update()) {
        header('Location: /stock/manage');
        exit;
    } else {
        die('Erreur lors de la mise à jour du stock');
    }
}


    private function render(string $view, array $params = []): void
{
    extract($params); // transforme $params en variables locales pour la vue

    // Capture le contenu de la vue
    ob_start();
    require __DIR__ . '/../Views/' . $view . '.php';
    $content = ob_get_clean();

    // Inclut le layout principal, qui utilisera $content
    require __DIR__ . '/../Views/layout.php';
}

}
