-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 04 jan. 2026 à 13:23
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mini_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'T-shirts', 'hauts légers pour les saisons chaudes.', '2025-12-17 13:26:06', '2025-12-29 14:05:44'),
(2, 'Pulls & sweatshirts', 'Hauts chauds pour les saisons plus froides.', '2025-12-17 13:26:06', '2025-12-29 14:05:44'),
(3, 'Bas & pantalons', 'Pantalons, jeans et jupes qui pourront donner de la cohésion à vos tenues.', '2025-12-17 13:26:06', '2025-12-29 14:05:44'),
(4, 'Chaussures', 'Différents types de chaussures pour finaliser vos tenues.', '2025-12-17 13:26:06', '2025-12-29 14:05:44');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `statut` enum('en_attente','validee','annulee') COLLATE utf8mb4_general_ci DEFAULT 'en_attente',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int NOT NULL,
  `commande_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantite` int NOT NULL DEFAULT '1',
  `prix_unitaire` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantite` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int NOT NULL,
  `nom` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `prix` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `image_url` text COLLATE utf8mb4_general_ci NOT NULL,
  `categorie_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `stock`, `image_url`, `categorie_id`) VALUES
(1, 't-shirt noir féminin', 't-shirt noir coquette avec noeud.', 19.90, 55, 'https://i.pinimg.com/736x/e9/73/54/e9735491f01cd695748e84aba1f0bce1.jpg', 1),
(2, 't-shirt blanc', 't-shirt blanc à imprimé papillon.', 12.90, 60, 'https://i.pinimg.com/1200x/4a/3c/d4/4a3cd4b3e2e3d8a06405f94b7cbe8510.jpg', 1),
(3, 't-shirt noir à motif', 'T-shirt noir en coton avec motifs incrustés.', 14.90, 55, 'https://i.pinimg.com/736x/6b/de/c2/6bdec28bed6ecf9b9db67153dc533ac9.jpg', 1),
(4, 'pull noir', 'Pull tissé noir.', 39.90, 15, 'https://i.pinimg.com/1200x/6c/0e/12/6c0e12ed943909c8a96072153d06c817.jpg', 2),
(5, 'Cardigan gris à noeuds', 'Cardigan gris en laine avec bretelles en noeuds noirs.', 24.90, 55, 'https://i.pinimg.com/736x/20/68/62/2068621d847168a3104459d89b1d56ef.jpg', 2),
(6, 'Pull épaules nues', 'Pull noir en laine, épaules nues.', 34.90, 59, 'https://i.pinimg.com/736x/03/1e/84/031e8425070dcbc357999e9f44030506.jpg', 2),
(7, 'Jupe bleue délavée', 'Jupe bleue avec imprimé argenté', 24.90, 60, 'https://i.pinimg.com/1200x/ab/01/ae/ab01aed51e8b6cd8db600361a7f8e67d.jpg', 3),
(8, 'Jean noir', 'Jean noir délavé', 39.90, 30, 'https://i.pinimg.com/736x/82/e0/26/82e02604f18ebb79ca4db39aa208043f.jpg', 3),
(9, 'Mini jupe bleue', 'Mini jupe bleue délavée à couture plissée.', 24.90, 60, 'https://i.pinimg.com/736x/2b/e4/d4/2be4d4bf5d79b6bfa5a527aa9c20c121.jpg', 3),
(10, 'Bottes basses noires', 'Bottes noires en cuir synthétique', 99.90, 19, 'https://i.pinimg.com/736x/f0/b2/c4/f0b2c45ff2e70c8a32aaacb9ea9b737f.jpg', 4),
(11, 'Baskets noires et blanches', 'Paire de baskets noires et blanches à lacets.', 109.90, 35, 'https://i.pinimg.com/736x/d3/7c/09/d37c091d06f14063b044e296eb897014.jpg', 4),
(12, 'Chaussures de ville', 'Chaussures noire, avec noeuds et détails coeur.', 89.90, 19, 'https://i.pinimg.com/736x/07/7a/b7/077ab777e12e88d329acbaa258aa8fe0.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `password`) VALUES
(1, 'toto', 'toto@toto.toto', ''),
(2, 'user', 'user@test.com', 'user123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commande_user` (`user_id`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commande_produit_commande` (`commande_id`),
  ADD KEY `fk_commande_produit_produit` (`product_id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_product` (`user_id`,`product_id`),
  ADD KEY `fk_panier_produit` (`product_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit_categorie` (`categorie_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `fk_commande_produit_commande` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commande_produit_produit` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_produit` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_panier_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
