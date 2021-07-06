-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 06, 2021 at 02:09 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magasin`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(60) NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `categorie` enum('tous','ordinateur','telephone','divers') NOT NULL DEFAULT 'tous',
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `designation`, `prix`, `categorie`) VALUES
(19, 'SAMSUNG A70', '3000.00', 'telephone'),
(18, 'JEANS', '5.00', 'divers'),
(20, 'MacOS', '10000.00', 'ordinateur'),
(21, 'Huawei Nova7', '25000.00', 'telephone'),
(22, 'Cahier 100', '10.00', 'divers');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `mail` varchar(50) DEFAULT 'pas de mail',
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `age`, `adresse`, `ville`, `mail`) VALUES
(29, 'irene', 'irene', 22, 'Sidi', 'Sidi', 'irene@gmail.com'),
(30, 'romaric', 'eym', 23, 'Tililia', 'Tililia', 'romaric@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_comm` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_client` mediumint(8) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_comm`,`id_client`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_comm`, `id_client`, `date`) VALUES
(13, 21, '2021-06-22'),
(12, 21, '2021-06-22'),
(11, 21, '2021-06-22'),
(10, 21, '2021-06-22'),
(9, 20, '2021-06-21'),
(8, 20, '2021-06-21'),
(14, 20, '2021-06-22'),
(15, 29, '2021-06-23'),
(16, 29, '2021-06-23'),
(17, 29, '2021-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `ligne`
--

DROP TABLE IF EXISTS `ligne`;
CREATE TABLE IF NOT EXISTS `ligne` (
  `id_comm` mediumint(8) UNSIGNED NOT NULL,
  `id_article` char(5) NOT NULL,
  `quantite` tinyint(3) UNSIGNED NOT NULL,
  `prix_unit` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id_comm`,`id_article`),
  KEY `id_article` (`id_article`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligne`
--

INSERT INTO `ligne` (`id_comm`, `id_article`, `quantite`, `prix_unit`) VALUES
(8, '9', 2, '1250.00'),
(9, '3', 2, '2000.00'),
(10, '9', 3, '1250.00'),
(10, '8', 3, '5.00'),
(11, '3', 2, '2000.00'),
(12, '3', 2, '2000.00'),
(13, '7', 1, '5000.00'),
(14, '4', 3, '5000.00'),
(15, '19', 1, '3000.00'),
(15, '18', 1, '5.00'),
(15, '20', 2, '10000.00'),
(17, '21', 3, '25000.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
