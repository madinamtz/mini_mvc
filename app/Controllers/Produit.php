<?php
class Produit extends Controller {
    public function index() {
        // Appelle la classe Modèle Produit dans le dossier models/
        $model = new Produit(); 
        $produits = $model->getAll();
        $this->render('produit/index', ['products' => $produits]); 
    }

    public function details($id) {
        $model = new Produit();
        $produit = $model->getById($id);
        $this->render('produit/details', ['product' => $produit]);
    }
}
?>