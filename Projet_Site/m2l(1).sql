-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 14 Mai 2015 à 12:15
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `msg_chat`
--

INSERT INTO `msg_chat` (`message_id`, `auteur_id`, `contenu`, `date`, `heure`) VALUES
(1, 1, 'Bienvenue sur le chat de la M2L, veuillez respecter les règles de courtoisies.', '2015-05-12', '09:20:40'),
(2, 1, 'Test on va voir tavu', '2015-05-12', '09:21:02'),
(3, 1, 'Test', '2015-05-13', '10:57:15'),
(4, 1, 'blablabla', '2015-05-13', '10:57:24'),
(5, 1, 'dfd', '2015-05-13', '11:14:43'),
(6, 1, 'TibAULT EST UN COTOREP', '2015-05-13', '11:21:41'),
(7, 1, '+1', '2015-05-13', '11:21:56'),
(8, 1, '+1', '2015-05-13', '11:23:31'),
(9, 1, 'blabla', '2015-05-13', '11:23:41'),
(10, 1, 'blabla', '2015-05-13', '11:24:15'),
(11, 1, 'dfeazedazed', '2015-05-13', '11:24:29'),
(12, 1, 'dfeazedazed', '2015-05-13', '11:24:51'),
(13, 1, 'dfeazedazed', '2015-05-13', '11:25:07'),
(14, 1, 'srezrarzr', '2015-05-13', '11:25:16'),
(15, 1, 'srezrarzr', '2015-05-13', '11:26:13'),
(16, 1, '123', '2015-05-13', '11:26:21'),
(17, 1, '&lt;script&gt;alert(''DOOMSDAY'');&lt;/script&gt;', '2015-05-13', '11:26:58'),
(18, 1, '''&lt;script&gt; alert(\\''test\\'');&lt;/script&gt;''', '2015-05-13', '11:36:11'),
(19, 1, '''tite''', '2015-05-13', '11:36:24'),
(20, 1, '''COTOREP''', '2015-05-13', '11:36:38'),
(21, 1, '''&lt;script&gt; alert(\\''TA MERE SUCE DES BITES EN ENFER !!\\'');&lt;/script&gt;''', '2015-05-13', '11:37:18'),
(22, 1, '''&lt;script&gt;alert(&quot;test&quot;);&lt;/script&gt;''', '2015-05-13', '11:37:54'),
(23, 1, NULL, '2015-05-13', '11:41:02'),
(24, 1, '&amp;lt;script&amp;gt;alert(&amp;quot;test&amp;quot;);&amp;lt;/script&amp;gt;', '2015-05-13', '11:47:09'),
(25, 1, '&amp;lt;script&amp;gt; alert(''DOOMSDAY'');&amp;lt;/script&amp;gt;', '2015-05-13', '11:48:05'),
(26, 1, 'blabla', '2015-05-13', '11:48:51'),
(27, 1, 'qsdqsd', '2015-05-13', '11:49:01'),
(28, 1, 'qsdqsd', '2015-05-13', '11:54:34'),
(29, 1, 'blablblablabla', '2015-05-13', '16:23:50'),
(30, 1, 'c''est bon les patates', '2015-05-13', '16:24:08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`session_id`, `date`, `utilisateur_id`) VALUES
(1, '2015-04-08', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`photo_id`, `url`, `id_produit`) VALUES
(1, 'http://static3.kikietgalou.com/19280/sweat-zippe-lacoste-lve-a-capuche-sh8241-marine-166.jpg', 1),
(2, 'http://img2.calle-ocho.eu/boutique/61-thickbox/sweat-gris-clair.jpg', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`produit_id`, `designation`, `description`, `prix_unitaire`, `tva_id`, `date_parution`, `categorie_id`) VALUES
(1, 'Sweat shirt lacoste', 'Sweat  Homme Lacoste en coton de couleur bleue unie', '13.00', 1, '2015-04-08', 1),
(2, 'Sweat shirt Horizon', 'Sweat  Homme Horizon en laine de couleur grise unie', '13.00', 1, '2015-04-08', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

CREATE TABLE IF NOT EXISTS `quantite` (
  `quantite_id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `nombre` int(11) NOT NULL,
  PRIMARY KEY (`quantite_id`),
  KEY `produit_id` (`produit_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `onlinetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `onlineheure` time DEFAULT NULL,
  `onlinedate` date DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT '0',
  `genre` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `Nom`, `Prenom`, `mail`, `age`, `pseudo`, `mdp`, `adresse`, `ligue_id`, `onlinetime`, `onlineheure`, `onlinedate`, `isAdmin`, `genre`) VALUES
(1, NULL, NULL, 'azerty@azerty.com', NULL, 'azerty', 'azerty', NULL, NULL, '2015-05-14 10:02:40', '12:02:40', '2015-05-14', 1, ''),
(2, 'azerty', 'azerty', 'azerty1@aze.com', NULL, 'Linkyz', 'azerty', '12 rzdickb 85858 ufed', NULL, '2015-05-13 15:28:20', '17:28:20', '2015-05-13', 0, 'femme');

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
  ADD CONSTRAINT `msg_forum_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`utilisateur_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `msg_forum_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`produit_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`tva_id`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`categorie_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD CONSTRAINT `quantite_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`produit_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quantite_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `panier` (`session_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`utilisateur_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
