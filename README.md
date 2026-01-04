# 🪽 Fallen Angel — boutique de vêtements en ligne

**Fallen Angel** est un site e‑commerce de vêtements tendances pour hommes et femmes, développé avec une architecture **MVC en PHP vanilla**.  
Ce projet présente une structure claire de type MVC (Modèle–Vue–Contrôleur) pour faciliter l’apprentissage, l’extension et la maintenance du code.

## ⚙️ Fonctionnalités principales

- Architecture MVC simplifiée
- Routing de base
- Connexion utilisateur
- Pages produits
- Structure prête à être étendue (gestion du stock, administration…)
- Intégration facile avec une base de données MySQL

## 🖥️ Démonstration

Ce README vous guidera étape par étape pour :

1. Installer le projet localement
2. Créer et configurer la base de données
3. Lancer le projet avec MAMP ou PHP
4. Se connecter avec des comptes test

## 🛠️ Prérequis

Avant de commencer, assurez‑vous d’avoir :

✔️ **MAMP** installé (Apache + MySQL)  
✔️ **phpMyAdmin** pour gérer la base de données  
✔️ PHP 7.4 ou supérieur  
✔️ Git  
✔️ Un éditeur de code (Visual Studio Code recommandé)

## 📦 Installation du projet

### 1. Cloner le dépôt

```bash
git clone https://github.com/madinamtz/mini_mvc.git
cd mini_mvc
```

### 2. Placer le projet dans MAMP
Copiez le projet dans le dossier htdocs de MAMP, par exemple :

```bash
/Applications/MAMP/htdocs/mini_mvc
```

## 🗄️ Configuration de la base de données

### 1. Ouvrir phpMyAdmin

Démarrez MAMP, puis ouvrez phpMyAdmin dans votre navigateur :

```bash
http://localhost:8888/phpmyadmin
```

### 2. Créer la base de données

Créez une base de données nommée par exemple :

```bash
fallenangel
```

### 3. Importer le schéma SQL

Utilisez l’onglet Importer pour ajouter le fichier sql fourni (database/mini_mvc.sql).  
Sinon, créez les tables via phpMyAdmin en vous basant sur vos modèles dans app/models/.

### 4. Vérifier la configuration PHP

Ouvrez le fichier app/config/config.php et configurez les identifiants :

``` bash
; Description de la configuration (commentaire)
; Exemple de configuration locale
; Chaîne de connexion PDO (hôte, base, encodage)
; Nom d'utilisateur de la base de données

DB_NAME = ""

DB_HOST="localhost"

DB_USERNAME = ""
; Mot de passe de la base de données
DB_PASSWORD = ""
```
> ⚠️ Les identifiants par défaut de MAMP :  
> Host : localhost | User : root | Password : root | Port MySQL : 8889 (si personnalisé)

## 🚀 Lancer le projet

### Option A — Avec MAMP

1. Démarrez Apache + MySQL dans MAMP
2. Ouvrez dans votre navigateur :

``` bash
http://localhost:8888/mini_mvc/public/
```

### Option B — Serveur PHP intégré

Depuis la racine du projet :

```bash
php -S localhost:8000 -t public/
```

Puis ouvrez :

```bash
http://localhost:8000
```

## 👤 Comptes de test

Pour tester le site, vous pouvez utiliser ces comptes :

| Email | Mot de passe | Rôle |
|:--------------|:-------------|:--------------|
| ```admin@test.com``` | ```admin123``` | Administrateur |
| ```jean@test.com``` | ```jean123``` | Client |
| ```pierre@test.com``` | ```pierre123``` | Client |

> Si ces comptes n’existent pas, ajoutez-les via phpMyAdmin ou SQL, ou alors créez un compte directement sur le site, vous pourrez le réutiliser pour vous connecter.

### Exemple SQL :

```SQL
INSERT INTO users (email, password)
VALUES ('jean@test.com', 'jean123'),
       ('pierre@test.com', 'pierre123');
```

> (Remplacez par des mots de passe hashés si nécessaire avec password_hash().)

## 📁 Architecture du projet

```bash
mini_mvc/
│
├── app/                          # Dossier principal de l'application
│   ├── config.ini                # Configuration de l'application
│   ├── config.php                # Configuration PHP
│   │
│   ├── Controllers/              # Contrôleurs
│   │   ├── AuthController.php
│   │   ├── CartController.php
│   │   ├── HomeController.php
│   │   ├── OrderController.php
│   │   ├── ProductController.php
│   │   ├── Produit.php
│   │   └── StockController.php
│   │
│   ├── Core/                     # Classes de base du framework
│   │   ├── Auth.php              # Gestion de l'authentification
│   │   ├── Controller.php        # Contrôleur de base
│   │   ├── Database.php          # Connexion et gestion BDD
│   │   ├── Model.php             # Modèle de base
│   │   └── Router.php            # Système de routage
│   │
│   ├── Models/                   # Modèles
│   │   ├── Cart.php
│   │   ├── Category.php
│   │   ├── Order.php
│   │   ├── Product.php
│   │   ├── Produit.php
│   │   └── User.php
│   │
│   └── Views/                    # Vues (templates HTML/PHP)
│       ├── layout.php            # Template principal
│       │
│       ├── auth/                 # Vues d'authentification
│       │   ├── login.php
│       │   ├── login-success.php
│       │   └── register-success.php
│       │
│       ├── cart/                 # Vues du panier
│       │   └── index.php
│       │
│       ├── home/                 # Vues de la page d'accueil
│       │   ├── create-user.php
│       │   ├── index.php
│       │   └── users.php
│       │
│       ├── order/                # Vues des commandes
│       │   ├── list.php
│       │   ├── not-found.php
│       │   └── show.php
│       │
│       ├── product/              # Vues des produits
│       │   ├── create-product.php
│       │   ├── list-products.php
│       │   └── show.php
│       │
│       └── stock/                # Vues de gestion du stock
│           └── manage.php
│
├── database/                     # Base de données
│   ├── migrations.sql            # Script de migration
│   └── mini_mvc.sql              # Structure complète de la BDD
│
├── docs/                         # Documentation
│   ├── active-record.md          
│   ├── GUIDE_PANIER.md           
│   ├── PANIER_COMMANDES.md       
│   ├── PRODUCT_CRUD.md           
│   ├── README_INSTALL.md         
│   ├── README_START.md           
│   └── README_STRUCTURE.md       
│
├── public/                       # Point d'entrée web (document root)
│   └── index.php                 # Front controller
│
├── vendor/                       
│   ├── composer/                 
│   └── autoload.php              
│
├── .gitignore                    
├── composer.json                 
├── composer.lock                 
└── README.md                     # Documentation principale
```

- **Controllers** : gèrent la logique et la communication entre modèles et vues
- **Models** : gèrent les données et la connexion à la base
- **Views** : affichent le contenu HTML à l’utilisateur

## 🗃️ Structure de la Base de Données

### Tables principales

**user**

Gestion des utilisateurs

```SQL
- id (INT, AUTO_INCREMENT)
- prenom (VARCHAR (255))
- nom (VARCHAR(255))
- email (VARCHAR(255))
- password (VARCHAR(255), hashé)
```

**produit**

Produits disponibles

```SQL
- id (INT, AUTO_INCREMENT)
- nom (VARCHAR(150))
- description (TEXT)
- prix (DECIMAL(10,2))
- stock (INT)
- image_url (TEXT)
- categorie_id (INT, FK)
```

**panier**

Panier de l'utilisateur

```SQL
- id (INT, AUTO_INCREMENT)
- quantite (INT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
- user_id (INT, FK)
- product_id (INT, FK)
```

**categorie**

Catégories de vêtements

```SQL
- id (INT, AUTO_INCREMENT)
- nom (VARCHAR(150))
- description (TEXT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

**commande**

Historique de commandes de l'utilisateur

```SQL
- id (INT, AUTO_INCREMENT)
- statut (ENUM('en_attente', 'validee', 'annulee'))
- total (DECIMAL(10,2))
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
- user_id (INT, FK)
```

**commande_produit**

Produits des commandes précédentes

```SQL
- id (INT, AUTO_INCREMENT)
- quantite (INT)
- prix_unitaire (DECIMAL(10,2))
- created_at (TIMESTAMP)
- commande_id (INT, FK)
- product_id (INT, FK)
```

## 🗂️ Fonctionnalités

### 🏠 Page d'Accueil

- Bannière principale avec images promotionnelles
- Header avec deux menus dropdown pour accéder aux différentes catégories de vêtements et pour se connecter ou s'inscrire
- Présentation rapide de Fallen Angel

### 📦 Gestion des Produits

- Liste des produits : affichage par catégories avec filtres simples
- Détail produit : fiche complète avec image, description, prix
- Ajout au panier : possible qu'on soit connecté ou non
- Stock : indicateur simple (non dynamique dans cette version)
- Gestion du stock des produits : pour les admins seulement

### 🛒 Panier & Commandes

- Panier : gestion des quantités, suppression d’articles, calcul du total
- Validation : transfert du panier vers commande 
- Historique : page de visualisation des commandes passées

### 🔐 Authentification

- Inscription : création de compte avec validation minimale et demande de clé privée pour une création d'admin
- Connexion : système sécurisé avec mots de passe hashés
- Profil : modification des informations personnelles
- Sécurité : sessions PHP et vérification des routes protégées

### 🔒 Sécurité

Le site intègre plusieurs mesures de sécurité fondamentales :

✅ Mots de passe hashés : utilisation de `password_hash()` et `password_verify()`  
✅ Protection : `htmlspecialchars()` sur toutes les sorties utilisateur  
✅ Validation des données : contrôles côté serveur pour formulaires  
✅ Sessions sécurisées : gestion propre des sessions PHP  

## 📝 Évolutions Futures

Fonctionnalités potentielles à ajouter pour améliorer le site et le code :

* Panel d'administration    
* Système de notation des produits 
* Système de paiement 
* CSS dans un fichier séparé dans public/css/style.css plutôt que directement dans le php

---

## 📖 Licence

Ce projet a été développé dans le cadre d'un **projet scolaire en études supérieures**.  
Il est destiné uniquement à des fins pédagogiques et d’apprentissage. Toute utilisation commerciale ou redistribution n’est pas autorisée.

## 🎨 Crédits

- **Développement** : madinamtz
- **Inspiration & tutoriels** : GitHub / OpenClassrooms / Documentation PHP officielle / Youtube
