-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 07 Juin 2017 à 23:09
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `auraynodcap1`
--

-- --------------------------------------------------------

--
-- Structure de la table `central`
--

CREATE TABLE IF NOT EXISTS `central` (
  `idcentral` int(11) NOT NULL,
  `AddIP` varchar(45) DEFAULT NULL,
  `NomCent` varchar(45) DEFAULT NULL,
  `EtatFNC` char(1) DEFAULT NULL,
  `DebMes` time DEFAULT NULL,
  `EndMes` time DEFAULT NULL,
  `AcqMes` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcentral`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `central`
--

INSERT INTO `central` (`idcentral`, `AddIP`, `NomCent`, `EtatFNC`, `DebMes`, `EndMes`, `AcqMes`) VALUES
(110, '192.160.100.123', 'inj01', 'O', '08:00:00', '16:30:00', 15),
(210, '192.160.100.130', 'inj02', 'F', '08:00:00', '20:00:00', 10),
(310, '192.160.100.185', 'inj03', 'F', '08:00:00', '20:00:00', 30),
(410, '192.160.100.127', 'inj04', 'F', '08:00:00', '20:00:00', 45);

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE IF NOT EXISTS `mesures` (
  `idMesures` int(11) NOT NULL AUTO_INCREMENT,
  `DateTimMes` datetime DEFAULT NULL,
  `Mesure` float DEFAULT NULL,
  `NodCap_idNodCap` int(11) NOT NULL,
  `central_idcentral` int(11) NOT NULL,
  PRIMARY KEY (`idMesures`,`NodCap_idNodCap`,`central_idcentral`),
  KEY `fk_Mesures_NodCap` (`NodCap_idNodCap`),
  KEY `fk_Mesures_central1` (`central_idcentral`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `mesures`
--

INSERT INTO `mesures` (`idMesures`, `DateTimMes`, `Mesure`, `NodCap_idNodCap`, `central_idcentral`) VALUES
(25, '2017-03-24 00:45:43', 0, 21, 110),
(26, '2017-03-24 00:45:43', 12.5, 51, 110),
(27, '2017-03-24 00:45:43', 0, 23, 110),
(28, '2017-03-24 00:45:43', 0, 24, 110),
(29, '2017-03-24 00:45:43', 0, 25, 110),
(30, '2017-04-04 14:49:02', 0, 21, 110),
(31, '2017-04-04 14:49:02', 12.5, 51, 110),
(32, '2017-04-04 14:49:02', 0, 23, 110),
(33, '2017-04-04 14:49:02', 0, 24, 110),
(34, '2017-04-04 14:49:02', 0, 25, 110),
(35, '2017-04-04 14:59:11', 0, 21, 110),
(36, '2017-04-04 14:59:11', 12.5, 51, 110),
(37, '2017-04-04 14:59:11', 0, 23, 110),
(38, '2017-04-04 14:59:11', 0, 24, 110),
(39, '2017-04-04 14:59:11', 0, 25, 110),
(40, '2017-04-04 15:00:45', 0, 21, 110),
(41, '2017-04-04 15:00:45', 12.5, 51, 110),
(42, '2017-04-04 15:00:45', 0, 23, 110),
(43, '2017-04-04 15:00:45', 0, 24, 110),
(44, '2017-04-04 15:00:45', 0, 25, 110),
(45, '2017-05-16 21:12:25', 0, 21, 110),
(46, '2017-05-16 21:12:25', 12.5, 51, 110),
(47, '2017-05-16 21:12:25', 0, 23, 110),
(48, '2017-05-16 21:12:25', 0, 24, 110),
(49, '2017-05-16 21:12:25', 0, 25, 110),
(50, '2017-05-16 21:50:21', 0, 21, 110),
(51, '2017-05-16 21:50:21', 12.5, 51, 110),
(52, '2017-05-16 21:50:21', 0, 23, 110),
(53, '2017-05-16 21:50:21', 0, 24, 110),
(54, '2017-05-16 21:50:21', 0, 25, 110);

-- --------------------------------------------------------

--
-- Structure de la table `nodcap`
--

CREATE TABLE IF NOT EXISTS `nodcap` (
  `idNodCap` int(11) NOT NULL,
  `AddNode` int(11) DEFAULT NULL,
  `AddCap` int(11) DEFAULT NULL,
  `TypeCap` varchar(45) DEFAULT NULL,
  `NomCap` varchar(45) DEFAULT NULL,
  `CoeffCap` float DEFAULT NULL,
  `central_idcentral` int(11) NOT NULL,
  PRIMARY KEY (`idNodCap`,`central_idcentral`),
  KEY `fk_NodCap_central1` (`central_idcentral`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nodcap`
--

INSERT INTO `nodcap` (`idNodCap`, `AddNode`, `AddCap`, `TypeCap`, `NomCap`, `CoeffCap`, `central_idcentral`) VALUES
(11, 1, 1, 'TORI', 'TORI03', 0, 110),
(21, 2, 1, 'RELY', 'RELY02', 0, 110),
(23, 2, 3, 'RELY', 'RELY03', 0, 110),
(24, 2, 4, 'RELY', 'RELY04', 0, 110),
(25, 2, 5, 'RELY', 'RELY05', 0, 110),
(51, 5, 1, 'TEMP', 'TEMP01', 0.1, 110),
(52, 5, 2, 'PRES', 'PRES01', 0.01, 110);

-- --------------------------------------------------------

--
-- Structure de la table `senarline`
--

CREATE TABLE IF NOT EXISTS `senarline` (
  `idSenarline` int(11) NOT NULL AUTO_INCREMENT,
  `NumLine` int(11) DEFAULT NULL,
  `Fonction` varchar(45) DEFAULT NULL,
  `nomvar` varchar(45) DEFAULT NULL,
  `valeur` varchar(45) DEFAULT NULL,
  `central_idcentral` int(11) NOT NULL,
  PRIMARY KEY (`idSenarline`,`central_idcentral`),
  KEY `fk_Senarline_central1` (`central_idcentral`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `senarline`
--

INSERT INTO `senarline` (`idSenarline`, `NumLine`, `Fonction`, `nomvar`, `valeur`, `central_idcentral`) VALUES
(31, 1, 'BEGIN', 'None', '', 110),
(32, 2, 'WRBUS', 'RELY04', '1', 110),
(33, 3, 'RDBUS', 'PRES01', '0.1', 110),
(34, 4, 'WRBUS', 'RELY02', '0', 110),
(35, 5, 'PRIDB', 'None', '', 110),
(36, 6, 'ENDIF', 'None', '', 110);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD CONSTRAINT `fk_Mesures_central1` FOREIGN KEY (`central_idcentral`) REFERENCES `central` (`idcentral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mesures_NodCap` FOREIGN KEY (`NodCap_idNodCap`) REFERENCES `nodcap` (`idNodCap`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `nodcap`
--
ALTER TABLE `nodcap`
  ADD CONSTRAINT `fk_NodCap_central1` FOREIGN KEY (`central_idcentral`) REFERENCES `central` (`idcentral`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `senarline`
--
ALTER TABLE `senarline`
  ADD CONSTRAINT `fk_Senarline_central1` FOREIGN KEY (`central_idcentral`) REFERENCES `central` (`idcentral`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
