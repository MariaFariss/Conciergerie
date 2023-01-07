-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2023 at 08:27 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conciergerie`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(255) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(255) NOT NULL,
  `prix_commande` float NOT NULL,
  `prix_magasin` float NOT NULL,
  `prix_vip` float NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `associassion`
--

DROP TABLE IF EXISTS `associassion`;
CREATE TABLE IF NOT EXISTS `associassion` (
  `id_avantage` int(255) NOT NULL AUTO_INCREMENT,
  `id_membership` int(255) NOT NULL,
  PRIMARY KEY (`id_avantage`,`id_membership`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `id_membership` int(255) NOT NULL,
  `id_avantage` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `avantage`
--

DROP TABLE IF EXISTS `avantage`;
CREATE TABLE IF NOT EXISTS `avantage` (
  `id_avantage` int(255) NOT NULL AUTO_INCREMENT,
  `nom` int(255) NOT NULL,
  `description` int(255) NOT NULL,
  PRIMARY KEY (`id_avantage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `id_membership` int(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(255) NOT NULL AUTO_INCREMENT,
  `date_commande` date NOT NULL,
  `total` int(255) NOT NULL,
  `date_livraison` date NOT NULL,
  `frais_depot` int(255) NOT NULL,
  `statut` enum('acheter','Fini','livré','arrivée','Expédié','emballé','déja acheté') NOT NULL,
  `date_expedition` date NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_client` int(255) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `concerne_art_fact`
--

DROP TABLE IF EXISTS `concerne_art_fact`;
CREATE TABLE IF NOT EXISTS `concerne_art_fact` (
  `id_article` int(255) NOT NULL AUTO_INCREMENT,
  `id_facture` int(255) NOT NULL,
  PRIMARY KEY (`id_article`,`id_facture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `concerne_exp_comm`
--

DROP TABLE IF EXISTS `concerne_exp_comm`;
CREATE TABLE IF NOT EXISTS `concerne_exp_comm` (
  `id_commande` int(255) NOT NULL AUTO_INCREMENT,
  `id_expedition` int(255) NOT NULL,
  PRIMARY KEY (`id_commande`,`id_expedition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contenuartcom`
--

DROP TABLE IF EXISTS `contenuartcom`;
CREATE TABLE IF NOT EXISTS `contenuartcom` (
  `id_article` int(255) NOT NULL AUTO_INCREMENT,
  `id_commande` int(255) NOT NULL,
  `quantite_commande` int(255) NOT NULL,
  PRIMARY KEY (`id_article`,`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contenupayhis`
--

DROP TABLE IF EXISTS `contenupayhis`;
CREATE TABLE IF NOT EXISTS `contenupayhis` (
  `id_historique` int(255) NOT NULL AUTO_INCREMENT,
  `id_paiement` int(255) NOT NULL,
  PRIMARY KEY (`id_historique`,`id_paiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expedition`
--

DROP TABLE IF EXISTS `expedition`;
CREATE TABLE IF NOT EXISTS `expedition` (
  `id_expedition` int(11) NOT NULL AUTO_INCREMENT,
  `date_expedition` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numero_parcelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_expedition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `date_de_mise-a_jour` date NOT NULL,
  `montnat` float NOT NULL,
  `id_commande` int(255) NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id_historique` int(255) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `date_echange` date NOT NULL,
  PRIMARY KEY (`id_historique`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `id_membership` int(255) NOT NULL AUTO_INCREMENT,
  `nom_membership` varchar(255) NOT NULL,
  `solde_min` int(255) NOT NULL,
  `solde_max` int(255) NOT NULL,
  PRIMARY KEY (`id_membership`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int(255) NOT NULL AUTO_INCREMENT,
  `montant` int(255) NOT NULL,
  `date_paiement` date NOT NULL,
  `type` enum('Carte Bancaire(CB)','Chéques','Espéces($)','') NOT NULL,
  PRIMARY KEY (`id_paiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `possession`
--

DROP TABLE IF EXISTS `possession`;
CREATE TABLE IF NOT EXISTS `possession` (
  `id_client` int(255) NOT NULL AUTO_INCREMENT,
  `id_solde` int(255) NOT NULL,
  PRIMARY KEY (`id_client`,`id_solde`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reduction`
--

DROP TABLE IF EXISTS `reduction`;
CREATE TABLE IF NOT EXISTS `reduction` (
  `id_reduction` int(255) NOT NULL AUTO_INCREMENT,
  `quantite` int(255) NOT NULL,
  `type_de_reduction` enum('Carte cadeau($)','Coupons(%)','Coupons($)','Cheques vacances') NOT NULL,
  `montant_de_reduction` int(255) NOT NULL,
  `duree_de_validite` float NOT NULL,
  PRIMARY KEY (`id_reduction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `solde_de_points`
--

DROP TABLE IF EXISTS `solde_de_points`;
CREATE TABLE IF NOT EXISTS `solde_de_points` (
  `id_solde` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_points` int(255) NOT NULL,
  `date_expiration` date NOT NULL,
  `ultimate` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_solde`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(255) NOT NULL AUTO_INCREMENT,
  `statut_article` enum('En stock','Disponible','Indisponible','Hors stock','Cadeau gratuit','Emballé','Expédié','Arrivé','Livré','autre') NOT NULL,
  `quantite_produit` int(255) NOT NULL,
  `id_article` int(255) NOT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suivie_red_his`
--

DROP TABLE IF EXISTS `suivie_red_his`;
CREATE TABLE IF NOT EXISTS `suivie_red_his` (
  `id_historique` int(255) NOT NULL AUTO_INCREMENT,
  `id_reduction` int(255) NOT NULL,
  PRIMARY KEY (`id_historique`,`id_reduction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
