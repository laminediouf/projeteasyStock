-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 18 Septembre 2017 à 09:42
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `easystocklaminediouf`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `codecli` int(11) NOT NULL AUTO_INCREMENT,
  `nomcli` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `prenomcli` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `passeword` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `telephonecli` int(11) NOT NULL,
  `adressecli` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `typecli` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `photocli` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codecli`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`codecli`, `nomcli`, `prenomcli`, `login`, `passeword`, `telephonecli`, `adressecli`, `typecli`, `photocli`) VALUES
(1, 'DIOP   ', 'IBRAHIMA', 'user', '414141', 774089500, 'PIKINE  ', 'entreprise', ''),
(2, 'DIOUF ', 'LAMINE', 'admin', '282828', 774089500, 'GRAND MBAO ', 'personne', ''),
(4, 'ndiaye  ', 'Mame cheikh ibrahima', 'user', '313313', 704598625, 'Baobap Mbao ', 'entreprise  ', ''),
(5, 'diouf', 'asta', 'user', '040516', 775695230, 'Cite djily mbaye', 'pers', ''),
(6, 'diouf', 'astou', 'user', 'astou', 782564315, 'grand medine', 'pers', ''),
(7, 'dieng', 'sala', 'user', 'sala', 765214895, 'Medina', 'pers', '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `numcom` int(11) NOT NULL AUTO_INCREMENT,
  `datecom` date NOT NULL,
  `datelivr` date NOT NULL,
  `codecli` int(11) NOT NULL,
  `etatcmd` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numcom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`numcom`, `datecom`, `datelivr`, `codecli`, `etatcmd`) VALUES
(1, '2017-05-13', '0000-00-00', 1, ''),
(2, '2017-05-13', '0000-00-00', 1, ''),
(3, '2017-05-13', '0000-00-00', 1, ''),
(4, '2017-05-13', '0000-00-00', 1, ''),
(5, '2017-05-13', '0000-00-00', 1, ''),
(6, '2017-05-13', '0000-00-00', 1, ''),
(7, '2017-05-14', '0000-00-00', 1, ''),
(8, '2017-05-14', '0000-00-00', 1, ''),
(9, '2017-05-14', '0000-00-00', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `codefournis` int(11) NOT NULL AUTO_INCREMENT,
  `nomfournis` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenomfournis` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telephonefournis` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adressefournis` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codefournis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`codefournis`, `nomfournis`, `prenomfournis`, `telephonefournis`, `adressefournis`) VALUES
(1, 'diop', 'Semou', '706320564', 'grand mbao cite ndeye marie'),
(2, 'ndiaye', 'Adama ', '765236514 ', 'yoff '),
(3, 'diop', 'pape', '772694153', 'grand mbao'),
(4, 'sow', 'tapha', '775239654', 'Baobab');

-- --------------------------------------------------------

--
-- Structure de la table `fourniture`
--

CREATE TABLE IF NOT EXISTS `fourniture` (
  `idfournitur` int(11) NOT NULL AUTO_INCREMENT,
  `qteprodfournitur` int(11) NOT NULL,
  `datefournitur` date NOT NULL,
  `numproduit` int(11) NOT NULL,
  PRIMARY KEY (`idfournitur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Contenu de la table `fourniture`
--

INSERT INTO `fourniture` (`idfournitur`, `qteprodfournitur`, `datefournitur`, `numproduit`) VALUES
(1, 5, '2017-04-12', 3),
(27, 5, '2017-05-03', 2),
(28, 8, '2017-05-03', 2),
(29, 5, '2017-05-03', 3),
(30, 2, '2017-05-09', 2),
(31, 10, '2017-05-14', 3),
(32, 5, '2017-05-14', 5),
(33, 6, '2017-05-14', 3),
(34, 2, '2017-07-24', 2);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `codeliv` int(11) NOT NULL AUTO_INCREMENT,
  `nomprodcmd` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `quantitelivr` int(11) NOT NULL,
  `numcom` int(11) NOT NULL,
  PRIMARY KEY (`codeliv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `numproduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `numcom` int(11) NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`idp`, `numproduit`, `quantite`, `numcom`) VALUES
(2, 3, 2, 1),
(3, 3, 2, 3),
(6, 3, 1, 1),
(50, 2, 1, 4),
(51, 2, 1, 5),
(52, 2, 1, 5),
(53, 3, 2, 6),
(54, 2, 1, 7),
(55, 3, 1, 8),
(56, 3, 2, 8),
(57, 2, 1, 8),
(58, 3, 1, 9),
(59, 2, 1, 9),
(60, 5, 2, 9),
(61, 5, 2, 9),
(62, 5, 5, 9),
(63, 3, 3, 9),
(64, 2, 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `panierfourniture`
--

CREATE TABLE IF NOT EXISTS `panierfourniture` (
  `idpanfourn` int(11) NOT NULL AUTO_INCREMENT,
  `numproduit` int(11) NOT NULL,
  `restant` int(11) NOT NULL,
  `ajouter` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idpanfourn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `numproduit` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `quantiteproduit` int(11) NOT NULL,
  `qteprodfournitur` int(11) NOT NULL,
  `quantitecom` int(11) NOT NULL,
  `prixUnitaire` int(11) NOT NULL,
  `type` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `codefournis` int(11) NOT NULL,
  PRIMARY KEY (`numproduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`numproduit`, `designation`, `quantiteproduit`, `qteprodfournitur`, `quantitecom`, `prixUnitaire`, `type`, `codefournis`) VALUES
(2, 'clavier', 100, 0, 0, 1500, 'espece', 1),
(3, 'ordinateur', 30, 0, 0, 150000, 'espece', 1),
(5, 'jus', 50, 0, 0, 300, '', 1),
(6, 'fruit', 55, 0, 0, 300, 'espc', 4),
(7, 'jus ananas', 100, 0, 0, 600, 'liq', 2),
(9, 'carotte', 150, 0, 0, 200, 'espc ', 3),
(10, 'oignon', 123, 0, 0, 150, 'espc', 1),
(11, 'Sucre', 120, 0, 0, 600, 'espc', 3),
(12, 'Poudre Magic', 150, 0, 0, 1500, 'espc', 4);

-- --------------------------------------------------------

--
-- Structure de la table `produitablcmd`
--

CREATE TABLE IF NOT EXISTS `produitablcmd` (
  `idprocmd` int(11) NOT NULL AUTO_INCREMENT,
  `numcom` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `numproduit` int(11) NOT NULL,
  PRIMARY KEY (`idprocmd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produitcommande`
--

CREATE TABLE IF NOT EXISTS `produitcommande` (
  `idprodcmd` int(11) NOT NULL AUTO_INCREMENT,
  `numproduit` int(11) NOT NULL,
  `numcom` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idprodcmd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Contenu de la table `produitcommande`
--

INSERT INTO `produitcommande` (`idprodcmd`, `numproduit`, `numcom`, `quantite`) VALUES
(22, 0, 0, 0),
(23, 0, 1, 0),
(24, 0, 0, 0),
(25, 0, 0, 0),
(26, 0, 0, 0),
(27, 0, 0, 0),
(28, 0, 0, 0),
(29, 0, 0, 0),
(30, 0, 0, 0),
(31, 0, 0, 0),
(32, 0, 0, 0),
(33, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
