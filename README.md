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

```bash
INSERT INTO users (email, password)
VALUES ('jean@test.com', 'jean123'),
       ('pierre@test.com', 'pierre123');
```

> (Remplacez par des mots de passe hashés si nécessaire avec password_hash().)

## 📁 Architecture du projet

```bash
```

## 🗃️ Structure de la Base de Données

### Tables principales

**user**

Gestion des utilisateurs

```bash
- id (INT, AUTO_INCREMENT)
- prenom (VARCHAR (255))
- nom (VARCHAR(255))
- email (VARCHAR(255))
- password (VARCHAR(255), hashé)
```

**produit**

Produits disponibles

```bash
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

```bash
- id (INT, AUTO_INCREMENT)
- quantite (INT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
- user_id (INT, FK)
- product_id (INT, FK)
```

**categorie**

Catégories de vêtements

```bash
- id (INT, AUTO_INCREMENT)
- nom (VARCHAR(150))
- description (TEXT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

**commande**

Historique de commandes de l'utilisateur

```
- id (INT, AUTO_INCREMENT)
- statut (ENUM('en_attente', 'validee', 'annulee'))
- total (DECIMAL(10,2))
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
- user_id (INT, FK)
```

**commande_produit**

Produits des commandes précédentes

```bash
- id (INT, AUTO_INCREMENT)
- quantite (INT)
- prix_unitaire (DECIMAL(10,2))
- created_at (TIMESTAMP)
- commande_id (INT, FK)
- product_id (INT, FK)
```