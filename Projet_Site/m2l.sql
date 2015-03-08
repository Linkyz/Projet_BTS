-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 08 Mars 2015 à 14:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `categorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`categorie_id`, `label`) VALUES
(1, 'Sweat Shirts'),
(2, 'T-Shirts'),
(3, 'Polos'),
(4, 'Pulls'),
(5, 'Chaussures'),
(6, 'Pantalons'),
(7, 'Survêtements'),
(8, 'Accessoires'),
(9, 'Equipements sportifs'),
(10, 'Journaux');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`forum_id`, `titre`, `description`) VALUES
(1, 'Autres ', NULL),
(2, 'Présentation', NULL),
(3, 'Ligues', NULL),
(4, 'Regions Lorraine', NULL),
(5, 'Foire Aux Questions ', NULL),
(6, 'Les evenements ', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE IF NOT EXISTS `ligue` (
  `ligue_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ligue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `msg_chat`
--

CREATE TABLE IF NOT EXISTS `msg_chat` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur_id` int(11) DEFAULT NULL,
  `contenu` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `auteur_id` (`auteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `msg_forum`
--

CREATE TABLE IF NOT EXISTS `msg_forum` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `contenu` varchar(2048) CHARACTER SET utf8 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `auteur_id` (`auteur_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`photo_id`, `url`, `id_produit`) VALUES
(1, 'http://static3.kikietgalou.com/19280/sweat-zippe-lacoste-lve-a-capuche-sh8241-marine-166.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `produit_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `prix_unitaire` decimal(5,2) DEFAULT NULL,
  `tva_id` int(11) DEFAULT NULL,
  `date_parution` date DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`produit_id`),
  KEY `tva_id` (`tva_id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`produit_id`, `designation`, `description`, `prix_unitaire`, `tva_id`, `date_parution`, `categorie_id`) VALUES
(1, 'Sweat shirt lacoste', 'Sweat  Homme Lacoste en coton de couleur bleue unie', '13.00', 1, '2015-03-08', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

CREATE TABLE IF NOT EXISTS `quantite` (
  `produit_id` int(11) NOT NULL DEFAULT '0',
  `session_id` int(11) NOT NULL DEFAULT '0',
  `nombre` int(11) NOT NULL,
  PRIMARY KEY (`produit_id`,`session_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  `contenu` varchar(2048) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `auteur_id` (`auteur_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`topic_id`, `titre`, `auteur_id`, `forum_id`, `contenu`, `date`) VALUES
(1, 'La consanguinité chez les Hamster du Paraguay', 1, 1, 'C''est triste non? ', '2015-03-08');

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE IF NOT EXISTS `tva` (
  `tva_id` int(11) NOT NULL AUTO_INCREMENT,
  `taux` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`tva_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tva`
--

INSERT INTO `tva` (`tva_id`, `taux`) VALUES
(1, '10.50'),
(2, '19.90'),
(3, '12.70'),
(4, '6.50'),
(5, '5.50'),
(6, '22.50');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Prenom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `pseudo` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `mdp` varchar(30) DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ligue_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `Nom`, `Prenom`, `mail`, `age`, `pseudo`, `mdp`, `adresse`, `ligue_id`) VALUES
(1, NULL, NULL, 'azerty@azerty.com', NULL, 'azerty', 'azerty', NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `msg_chat`
--
ALTER TABLE `msg_chat`
  ADD CONSTRAINT `msg_chat_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `msg_forum`
--
ALTER TABLE `msg_forum`
  ADD CONSTRAINT `msg_forum_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `msg_forum_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`produit_id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`tva_id`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`categorie_id`);

--
-- Contraintes pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD CONSTRAINT `quantite_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`produit_id`),
  ADD CONSTRAINT `quantite_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `panier` (`session_id`);

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
