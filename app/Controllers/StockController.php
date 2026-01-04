<?php
namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Core\Auth;
use Mini\Models\Product;

class StockController extends Controller
{
    public function manage()
    {
        session_start();
        Auth::checkAdmin(); // accès réservé aux admins

        $products = Product::getAll();

        $this->render('stock/manage', [
            'title' => 'Gestion du stock',
            'products' => $products
        ]);
    }

    public function update()
    {
        session_start();
        Auth::checkAdmin();

        $id = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? null;

        if ($id !== null && $quantity !== null) {
            $product = Product::findById($id);
            if ($product) {
                $newStock = max(0, $product['stock'] + intval($quantity));

                $p = new Product();
                $p->setId($id);
                $p->setStock($newStock);
                $p->update();
            }
        }

        header('Location: /stock/manage');
        exit;
    }
}
