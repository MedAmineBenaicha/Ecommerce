-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 juil. 2020 à 20:41
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecom_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `Description`) VALUES
(1, 'Informatique', 'all items related to informatique'),
(2, 'Camera', ''),
(4, 'Assets', ''),
(8, 'Casque', 'Cette categorie pour les casques ...');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `old_price` float NOT NULL DEFAULT 0,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL DEFAULT 5,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `old_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`, `Rating`) VALUES
(1, 'Pc Hp i5 ', 1, 4999, 6999, 10, 'A good pc with nice kits8 ram gb450 gb Hdd', 'A good pc with nice kits', '5ec2ca874f6f34.21172654.png', 3),
(2, 'Laptop Gamer i7', 1, 9999, 12000, 4, 'A good pc with nice kits8 ram gb450 gb Hdd', 'A good pc with nice kits', '5ec2ca787636c2.34587136.jpg', 5),
(3, 'Gamer Laptop', 1, 4000, 7599, 1, 'A good pc with nice kits8 ram gb450 gb Hdd', 'A good pc with nice kits', '5ec2ca6bb0cf29.91958613.jpg', 5),
(4, 'Acer HDD 8 ram', 1, 7999, 12000, 3, 'A good pc with nice kits8 ram gb450 gb Hdd', 'A good pc with nice kits', '5ec2ca573d68e5.58022965.jpg', 5),
(5, 'Pc Lenovo', 1, 3999, 5999, 5, 'A good pc with nice kits8 ram gb450 gb Hdd', 'A good pc with nice kits', '5ec2ca49ae43d2.31207756.jpg', 5),
(6, 'Laptop Dell', 1, 4000, 5000, 5, 'A good pc with nice kits8 ram gb450 gb Hdd', 'A good pc with nice kits', '5ec2ca3d6f9d29.78516793.jpg', 5),
(11, 'Nikon Camera', 2, 3000, 3500, 20, 'Nikon camera with zoom focus', 'Nikon camera with zoom focus', '5ec2ca30247195.89699417.jpg', 5),
(12, 'Nikom Camera +', 2, 7000, 8000, 2, 'Nikon camera with zoom focus +', 'Nikon camera with zoom focus +', '5ec2ca257eeb26.96255999.jpg', 5),
(13, 'Canon zomm HD', 2, 3000, 4000, 5, 'Canon camera with zoom focus', 'Canon camera with zoom focus', '5ec2ca1bf2d989.29697544.jpg', 5),
(14, 'Camera Canon', 2, 2500, 3000, 7, 'Canon camera with zoom focus ', 'Canon camera with zoom focus', '5ec3f8eee8e2d7.83102093.jpg', 2),
(15, 'Casque 1', 8, 300, 0, 5, 'A good casque', 'A good Casque', '5ec2cc474ff046.10613231.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `GroupID` int(2) NOT NULL DEFAULT 0,
  `RegStatus` int(2) NOT NULL DEFAULT 0,
  `AGE` int(255) NOT NULL,
  `ADRESSE` text NOT NULL,
  `VILLE` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullName`, `email`, `password`, `GroupID`, `RegStatus`, `AGE`, `ADRESSE`, `VILLE`) VALUES
(1, 'Amine', 'Mohamed Amine benaicha', 'amine98ben90@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 0, '', ''),
(3, 'Admin', 'Admin Admin', 'Admin@gmail.com', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', 1, 1, 21, 'Ensa', 'Agadir');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
