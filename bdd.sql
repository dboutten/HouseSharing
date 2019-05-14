-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 01 Décembre 2014 à 00:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE IF NOT EXISTS `appartement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `taille` int(11) NOT NULL,
  `personne` int(11) NOT NULL,
  `description` text NOT NULL,
  `fumeurs` varchar(10) NOT NULL,
  `animaux` varchar(10) NOT NULL,
  `enfants` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `appartement`
--

INSERT INTO `appartement` (`id`, `adresse`, `ville`, `taille`, `personne`, `description`, `fumeurs`, `animaux`, `enfants`) VALUES
(1, '200 rue de Javel', 'Paris', 90, 4, 'C''est nul !\r\n', 'oui', 'non', 'oui'),
(2, '33 rue Saint Paul', 'Lyon', 33, 2, 'Maison de Wiki\r\n', 'non', 'non', 'non'),
(3, '66 rue de l''Eglise', 'Lille', 30, 13, 'C''est d''enfer !\r\n', 'oui', 'oui', 'oui');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
