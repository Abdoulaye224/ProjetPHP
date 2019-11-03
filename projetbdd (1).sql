-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 nov. 2019 à 18:20
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'langage impératif orienté objet.'),
(2, 'Framework'),
(3, 'Langage de programmation événementielle'),
(4, 'Langage de programmation exotique'),
(5, 'Langage de programmation compilé'),
(6, 'Langage de programmation de haut niveau'),
(7, 'Langage de programmation orienté 3D'),
(11, 'Langage de programmation dynamique'),
(8, 'Langage de programmation orienté objet'),
(10, 'Langage de balisage');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `idPost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPost` (`idPost`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `idPost`) VALUES
(10, ' Il permet de créer des documents interopérables avec des équipements très variés de manière conforme aux exigences de l’accessibilité du web. ', 10),
(6, 'Langage des vrais gars', 1),
(2, 'bon langage pour bien débuter en programmation', 10),
(3, 'Commmentaire sur le C++', 5),
(11, 'J\'adore ce langage ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagePath` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategory` (`idCategory`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `imagePath`, `title`, `content`, `idCategory`, `idUser`) VALUES
(1, './img/php.jpg', 'PHP', 'Langage de programmation libre', 1, 1),
(2, './img/asp.jpg', 'ASP.NET', 'générer à la demande, des pages web', 2, 2),
(3, './img/vb.png', 'Visual Basic', 'langage de programmation événementielle ', 3, 3),
(4, './img/bootstrap.jpg', 'Bootstrap', 'Framework le plus stylé au monde', 4, 10),
(5, './img/C++.jpg', 'C++', 'langage de programmation compilé ', 5, 5),
(6, './img/clipper.jpg', 'Clipper', 'langage de programmation de haut-niveau', 6, 6),
(7, './img/dark.jpg', 'DarkBasic', 'langage de programmation orienté 3D', 7, 7),
(8, './img/java.jpg', 'Java', 'Langage interprété et compilé comprenez', 8, 10),
(10, './img/html.jpg', 'HTML', 'contenu html', 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Rasmus', 'LerdorfPass'),
(2, 'Microsoft', 'MicrosoftPass'),
(4, 'Pressey', 'PresseyPass'),
(5, 'Stroustrup', 'StroustrupPass'),
(6, 'Nantucket', 'NantucketPass'),
(7, 'Focus', 'FocusPass'),
(8, 'JAVA', 'JavaPass'),
(11, 'abdou', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
