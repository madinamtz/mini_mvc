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

Si un fichier SQL est fourni, utilisez l’onglet Importer pour l’ajouter.
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
| ```jean@test.com``` | ```jean123``` | Client |
| ```pierre@test.com``` | ```pierre123``` | Client |

> Si ces comptes n’existent pas, ajoutez-les via phpMyAdmin ou SQL.

### Exemple SQL :

```SQL
INSERT INTO users (email, password)
VALUES ('jean@test.com', 'jean123'),
       ('pierre@test.com', 'pierre123');
```

> (Remplacez par des mots de passe hashés si nécessaire avec password_hash().)

## 📁 Architecture du projet

```bash
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

### 🛒 Panier & Commandes

- Panier : gestion des quantités, suppression d’articles, calcul du total
- Validation : transfert du panier vers commande 
- Historique : page de visualisation des commandes passées

### 🔐 Authentification

- Inscription : création de compte avec validation minimale
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

Fonctionnalités potentielles à ajouter pour améliorer le site :

 Panel d'administration. 
 Gestion des stocks en temps réel  
 Filtre de produits  
 Système de notation des produits  