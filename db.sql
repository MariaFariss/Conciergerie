-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 08 jan. 2023 à 17:12
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conciergerie`
--
CREATE DATABASE IF NOT EXISTS `conciergerie` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `conciergerie`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(255) NOT NULL,
  `prix_commande` float NOT NULL,
  `prix_magasin` float NOT NULL,
  `prix_vip` float DEFAULT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_commande`
--

DROP TABLE IF EXISTS `article_commande`;
CREATE TABLE IF NOT EXISTS `article_commande` (
  `id_article` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantite_commande` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_article`,`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_facture`
--

DROP TABLE IF EXISTS `article_facture`;
CREATE TABLE IF NOT EXISTS `article_facture` (
  `id_article` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  PRIMARY KEY (`id_article`,`id_facture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avantage`
--

DROP TABLE IF EXISTS `avantage`;
CREATE TABLE IF NOT EXISTS `avantage` (
  `id_avantage` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_avantage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avantage_membership`
--

DROP TABLE IF EXISTS `avantage_membership`;
CREATE TABLE IF NOT EXISTS `avantage_membership` (
  `id_avantage` int(255) NOT NULL,
  `id_membership` int(255) NOT NULL,
  PRIMARY KEY (`id_avantage`,`id_membership`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `id_membership` int(11) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client_solde`
--

DROP TABLE IF EXISTS `client_solde`;
CREATE TABLE IF NOT EXISTS `client_solde` (
  `id_client` int(11) NOT NULL,
  `id_solde` int(11) NOT NULL,
  PRIMARY KEY (`id_client`,`id_solde`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float NOT NULL,
  `date_livraison` timestamp NOT NULL,
  `frais_depot` float NOT NULL,
  `restant_a_payer` float NOT NULL,
  `frais_livraison` float NOT NULL,
  `statut` enum('Acheté','Fini','Livré','Arrivé','Expédié','Emballé','Déja acheté') NOT NULL,
  `date_expedition` timestamp NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande_expedition`
--

DROP TABLE IF EXISTS `commande_expedition`;
CREATE TABLE IF NOT EXISTS `commande_expedition` (
  `id_commande` int(11) NOT NULL,
  `id_expedition` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`,`id_expedition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `expedition`
--

DROP TABLE IF EXISTS `expedition`;
CREATE TABLE IF NOT EXISTS `expedition` (
  `id_expedition` int(11) NOT NULL AUTO_INCREMENT,
  `date_expedition` timestamp NOT NULL,
  `numero_parcelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_expedition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(255) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_de_mise-a_jour` timestamp NOT NULL,
  `montant` float NOT NULL,
  `id_commande` int(255) NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id_historique` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `date_echange` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_historique`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membership`
--

DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `id_membership` int(11) NOT NULL AUTO_INCREMENT,
  `nom_membership` varchar(255) NOT NULL,
  `solde_min` int(11) NOT NULL,
  `solde_max` int(11) NOT NULL,
  PRIMARY KEY (`id_membership`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL,
  `date_paiement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('Carte Bancaire','Chèques','Espèces') NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_paiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiement_historique`
--

DROP TABLE IF EXISTS `paiement_historique`;
CREATE TABLE IF NOT EXISTS `paiement_historique` (
  `id_historique` int(11) NOT NULL,
  `id_paiement` int(11) NOT NULL,
  PRIMARY KEY (`id_historique`,`id_paiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--

DROP TABLE IF EXISTS `reduction`;
CREATE TABLE IF NOT EXISTS `reduction` (
  `id_reduction` int(11) NOT NULL AUTO_INCREMENT,
  `quantite_points` int(11) NOT NULL,
  `type_de_reduction` enum('Carte cadeau($)','Coupon(%)','Coupon($)','Cheques vacances') NOT NULL,
  `montant_de_reduction` float NOT NULL,
  `duree_de_validite` float NOT NULL,
  PRIMARY KEY (`id_reduction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reduction_historique`
--

DROP TABLE IF EXISTS `reduction_historique`;
CREATE TABLE IF NOT EXISTS `reduction_historique` (
  `id_historique` int(11) NOT NULL,
  `id_reduction` int(11) NOT NULL,
  PRIMARY KEY (`id_historique`,`id_reduction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `solde_de_points`
--

DROP TABLE IF EXISTS `solde_de_points`;
CREATE TABLE IF NOT EXISTS `solde_de_points` (
  `id_solde` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_points` int(11) NOT NULL,
  `date_expiration` date DEFAULT NULL,
  PRIMARY KEY (`id_solde`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `statut_article` enum('En stock','Disponible','Indisponible','Hors stock','Cadeau gratuit','Emballé','Expédié','Arrivé','Livré','Autre') NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
