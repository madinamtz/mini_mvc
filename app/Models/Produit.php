<?php
// Classe Produit pour interagir avec la table 'produits'
class Produit extends Model { 
    public function getAll() {
        return $this->query('SELECT * FROM produits')->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->prepare('SELECT * FROM produits WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>