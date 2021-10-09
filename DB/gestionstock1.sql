-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 sep. 2019 à 20:13
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionstock1`
--

-- --------------------------------------------------------

--
-- Structure de la table `artbon`
--

DROP TABLE IF EXISTS `artbon`;
CREATE TABLE IF NOT EXISTS `artbon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(50) NOT NULL,
  `qte` float NOT NULL,
  `prixu` float NOT NULL,
  `vstock` float NOT NULL,
  `bon` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artbon`
--

INSERT INTO `artbon` (`id`, `produit`, `qte`, `prixu`, `vstock`, `bon`) VALUES
(53, 'g5', 180, 300, 54000, '0'),
(52, 'g5', 120, 200, 24000, '0'),
(51, 'GGG', 50, 95, 4750, '4'),
(50, 'GGG', 150, 120, 18000, '3'),
(49, 'd1', 50, 50, 2500, '2'),
(48, 'd1', 100, 120, 12000, '1');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bon` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `avance` float NOT NULL,
  `reste` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `bon`, `date`, `nom`, `total`, `avance`, `reste`) VALUES
(88, '3', '10-09-2019 ', 'hhhh', 18000, 9500, 8500),
(89, '4', '10-09-2019 ', 'hhhh', 4750, 4000, 750),
(90, '0', '10-09-2019 ', 'hhhh', 78000, 2, 77998),
(87, '2', '07-09-2019 ', 'hhhh', 2500, 1500, 1000),
(86, '1', '07-09-2019 ', 'hhhh', 12000, 7500, 4500);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `adrs` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `tele`, `adrs`) VALUES
(6, 'DD', '', ''),
(7, 'jjj', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `passe` varchar(50) NOT NULL,
  `vente` tinyint(1) NOT NULL,
  `Article` tinyint(1) NOT NULL,
  `Client` tinyint(1) NOT NULL,
  `fournisseur` tinyint(1) NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `etatClient` tinyint(1) NOT NULL,
  `etatFournisseur` tinyint(1) NOT NULL,
  `rapport` tinyint(1) NOT NULL,
  `articleg` tinyint(1) NOT NULL,
  `venteg` tinyint(1) NOT NULL,
  `remarqueg` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `user`, `passe`, `vente`, `Article`, `Client`, `fournisseur`, `stock`, `etatClient`, `etatFournisseur`, `rapport`, `articleg`, `venteg`, `remarqueg`) VALUES
(7, 'reda', 'reda', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `adrs` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `tele`, `adrs`) VALUES
(12, 'hhhh', '', ''),
(11, 'DD', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

DROP TABLE IF EXISTS `rapport`;
CREATE TABLE IF NOT EXISTS `rapport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `produit` varchar(50) NOT NULL,
  `qt` float NOT NULL,
  `prixv` float NOT NULL,
  `total` float NOT NULL,
  `bon` text NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `prixm` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rapport`
--

INSERT INTO `rapport` (`id`, `date`, `produit`, `qt`, `prixv`, `total`, `bon`, `nom`, `prix`, `prixm`) VALUES
(127, '2019-09-07', 'd1', 20, 23.33, 466.6, '6', 'DD', 96.67, 120),
(128, '2019-09-08', 'd1', 10, 62.33, 623.3, '7', 'DD', 96.67, 159),
(129, '2019-09-08', 'd5', 10, 11, 110, '8', 'jjj', 3, 14),
(130, '2019-09-08', 'd5', 2, 120, 240, '8', 'jjj', 3, 120),
(131, '2019-09-08', 'd1', 20, 3.33, 66.6, '9', 'DD', 96.67, 100),
(132, '2019-09-08', 'd5', 1, 60, 60, '10', 'jjj', 120, 180),
(133, '2019-09-08', 'd5', 2, 20, 40, '10', '', 120, 140),
(134, '2019-09-08', 'd1', 20, 103.33, 2066.6, '10', 'jjj', 96.67, 200),
(135, '2019-09-08', 'd5', 10, 180, 1800, '10', '', 120, 300),
(136, '2019-09-10', 'GGG', 15, 36.25, 543.75, '10', 'DD', 120, 150),
(137, '2019-09-10', 'GGG', 15, 56.25, 843.75, '10', 'jjj', 113.75, 170),
(138, '2019-09-10', 'GGG', 10, 16.25, 162.5, '10', 'DD', 113.75, 130),
(139, '2019-09-10', 'GGG', 10, 36.25, 362.5, '10', 'DD', 113.75, 150),
(140, '2019-09-10', 'GGG', 120, 66.25, 7950, '10', 'DD', 113.75, 180),
(141, '2019-09-10', 'GGG', 10, 86.25, 862.5, '10', 'DD', 113.75, 200),
(142, '2019-09-10', 'g5', 100, 140, 14000, '10', 'DD', 260, 400);

-- --------------------------------------------------------

--
-- Structure de la table `remarque`
--

DROP TABLE IF EXISTS `remarque`;
CREATE TABLE IF NOT EXISTS `remarque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rem` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remarque`
--

INSERT INTO `remarque` (`id`, `rem`, `date`) VALUES
(9, 'reda<br>\r\njihane<br>\r\nhamade', '2019-09-07');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(50) NOT NULL,
  `qte` float NOT NULL,
  `prixu` float NOT NULL,
  `vstock` float NOT NULL,
  `bon` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `qte`, `prixu`, `vstock`, `bon`) VALUES
(182, 'g5', 200, 260, 52000, '2'),
(179, 'GGG', 20, 113.75, 2275, '2');

-- --------------------------------------------------------

--
-- Structure de la table `temp`
--

DROP TABLE IF EXISTS `temp`;
CREATE TABLE IF NOT EXISTS `temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `temp`
--

INSERT INTO `temp` (`id`, `date`) VALUES
(1, '2019-09-13');

-- --------------------------------------------------------

--
-- Structure de la table `venbon`
--

DROP TABLE IF EXISTS `venbon`;
CREATE TABLE IF NOT EXISTS `venbon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `produit` varchar(50) NOT NULL,
  `qt` float NOT NULL,
  `prixv` float NOT NULL,
  `bon` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `venbon`
--

INSERT INTO `venbon` (`id`, `date`, `produit`, `qt`, `prixv`, `bon`) VALUES
(88, '2019-09-10', 'GGG', 10, 150, '10'),
(87, '2019-09-10', 'GGG', 10, 130, '10'),
(86, '2019-09-10', 'GGG', 15, 170, '10'),
(85, '2019-09-10', 'GGG', 15, 150, '10'),
(84, '2019-09-08', 'd5', 10, 300, '10'),
(73, '2019-09-07', 'd1', 15, 120, '3'),
(74, '2019-09-07', 'd1', 15, 150, '4'),
(75, '2019-09-07', 'd1', 20, 120, '5'),
(76, '2019-09-07', 'd1', 20, 120, '6'),
(77, '2019-09-08', 'd1', 10, 159, '7'),
(78, '2019-09-08', 'd5', 10, 14, '8'),
(79, '2019-09-08', 'd5', 2, 120, '8'),
(80, '2019-09-08', 'd1', 20, 100, '9'),
(81, '2019-09-08', 'd5', 1, 180, '10'),
(82, '2019-09-08', 'd5', 2, 140, '10'),
(83, '2019-09-08', 'd1', 20, 200, '10'),
(91, '2019-09-10', 'g5', 100, 400, '10'),
(90, '2019-09-10', 'GGG', 10, 200, '10'),
(89, '2019-09-10', 'GGG', 120, 180, '10');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bon` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `avance` float NOT NULL,
  `reste` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `bon`, `date`, `nom`, `total`, `avance`, `reste`) VALUES
(158, '8', '08-09-2019 ', 'jjj', 240, 2, 238),
(157, '8', '08-09-2019 ', 'jjj', 140, 2, 138),
(156, '7', '08-09-2019 ', 'DD', 1590, 20, 1570),
(155, '6', '07-09-2019 ', 'DD', 2400, 3, 2397),
(154, '5', '07-09-2019 ', 'DD', 2400, 20, 2380),
(153, '4', '07-09-2019 ', 'jjj', 2250, 2250, 0),
(152, '3', '07-09-2019 ', 'DD', 1800, 1200, 600),
(151, '2', '07-09-2019 ', 'DD', 440, 2, 438),
(149, '1', '07-09-2019 ', 'DD', 400, 2, 398),
(150, '2', '07-09-2019 ', 'DD', 400, 2, 398),
(168, '10', '10-09-2019 ', 'DD', 40000, 2, 39998),
(167, '10', '10-09-2019 ', 'DD', 2000, 10, 1990),
(166, '10', '10-09-2019 ', 'DD', 21600, 22, 21578),
(165, '10', '10-09-2019 ', 'DD', 1500, 2, 1498),
(164, '10', '10-09-2019 ', 'DD', 1300, 1300, 0),
(163, '10', '10-09-2019 ', 'jjj', 2550, 2250, 300),
(162, '10', '10-09-2019 ', 'DD', 2250, 2000, 250),
(161, '10', '08-09-2019 ', 'jjj', 7000, 2, 6998),
(160, '10', '08-09-2019 ', 'jjj', 460, 2, 458),
(159, '9', '08-09-2019 ', 'DD', 2000, 9, 1991);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
