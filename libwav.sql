-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 avr. 2019 à 18:52
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `libwav`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `date_publi` date NOT NULL,
  `nb_like` int(11) NOT NULL,
  `id_article_categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article_categorie`
--

DROP TABLE IF EXISTS `article_categorie`;
CREATE TABLE IF NOT EXISTS `article_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `nb_like` int(11) NOT NULL,
  `date_publi` date NOT NULL,
  `id_Post` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_articles`
--

DROP TABLE IF EXISTS `commentaires_articles`;
CREATE TABLE IF NOT EXISTS `commentaires_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `nb_like` int(11) NOT NULL,
  `date_publi` date NOT NULL,
  `id_Post` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `humeur`
--

DROP TABLE IF EXISTS `humeur`;
CREATE TABLE IF NOT EXISTS `humeur` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lien_commentaire`
--

DROP TABLE IF EXISTS `lien_commentaire`;
CREATE TABLE IF NOT EXISTS `lien_commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPost` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_contenu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_contenu`) VALUES
(1, 1, 2),
(2, 1, 5),
(3, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  `idHumeur` int(11) NOT NULL,
  `nb_like` int(11) NOT NULL,
  `date_publi` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reportage`
--

DROP TABLE IF EXISTS `reportage`;
CREATE TABLE IF NOT EXISTS `reportage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `idReportage` int(11) NOT NULL,
  `nb_like` int(11) NOT NULL,
  `date_publi` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reportage_categorie`
--

DROP TABLE IF EXISTS `reportage_categorie`;
CREATE TABLE IF NOT EXISTS `reportage_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `signalements_posts`
--

DROP TABLE IF EXISTS `signalements_posts`;
CREATE TABLE IF NOT EXISTS `signalements_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_demandeur` int(11) NOT NULL,
  `raison` text NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalements_posts`
--

INSERT INTO `signalements_posts` (`id`, `id_post`, `id_demandeur`, `raison`, `date`, `etat`) VALUES
(1, 4, 1, 'Ceci est un test', '2004-04-20', 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `signalements_users`
--

DROP TABLE IF EXISTS `signalements_users`;
CREATE TABLE IF NOT EXISTS `signalements_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_demandeur` int(11) NOT NULL,
  `raison` text NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `son`
--

DROP TABLE IF EXISTS `son`;
CREATE TABLE IF NOT EXISTS `son` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien_upload` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `date_publi` date NOT NULL,
  `id_son_categorie` int(11) NOT NULL,
  `nb_telechargements` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `son`
--

INSERT INTO `son` (`id`, `lien_upload`, `titre`, `description`, `idCreateur`, `date_publi`, `id_son_categorie`, `nb_telechargements`) VALUES
(1, 'buissons.mp3', 'Buissons', '', 1, '2003-04-20', 3, 0),
(2, 'fermeture porte + verouillage.mp3', 'Fermeture portière intérieur', '', 1, '2003-04-20', 4, 0),
(3, 'moteur c3 ext.mp3', 'Démarrage voiture extérieur', '', 1, '2003-04-20', 4, 0),
(4, 'frein megane int.mp3', 'Frein à main', '', 1, '2003-04-20', 4, 0),
(5, 'pas branches.mp3', 'Pas branchages', '', 1, '2003-04-20', 5, 0),
(6, 'pas herbe.mp3', 'Pas herbe', '', 1, '2003-04-20', 5, 0),
(7, 'aboiement chien ext.mp3', 'Chien aboiements', '', 1, '2003-04-20', 6, 0),
(8, 'dans les bois ext.mp3', 'Pas feuillage', '', 1, '2003-04-20', 5, 0),
(9, 'oiseau ext.mp3', 'Oiseaux extérieur', '', 1, '2003-04-20', 1, 0),
(10, 'ruisseau.mp3', 'Ruisseau', '', 1, '2003-04-20', 3, 0),
(11, 'verrouilage porte.mp3', 'Vérouillage intérieur', '', 1, '2003-04-20', 4, 0),
(12, 'arroisoir.mp3', 'Arrosoir ', '', 1, '2004-04-20', 1, 0),
(13, 'klaxon c3 ext.mp3', 'Klaxon', '', 1, '2004-04-20', 4, 0),
(14, 'oiseau seul.mp3', 'Oiseau seul', '', 1, '2004-04-20', 1, 0),
(15, 'marche metallique rapide.mp3', 'Marche bois rapide', '', 1, '2004-04-20', 5, 0),
(16, 'porte fermeture c3 ext.mp3', 'Fermeture portière extérieur', '', 1, '2004-04-20', 4, 0),
(17, 'papiers.mp3', 'Papiers', '', 1, '2004-04-20', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `son_categorie`
--

DROP TABLE IF EXISTS `son_categorie`;
CREATE TABLE IF NOT EXISTS `son_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `son_categorie`
--

INSERT INTO `son_categorie` (`id`, `categorie_name`) VALUES
(1, 'environnement'),
(2, 'instruments'),
(3, 'nature'),
(4, 'véhicules'),
(5, 'humains'),
(6, 'animaux');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tutos`
--

DROP TABLE IF EXISTS `tutos`;
CREATE TABLE IF NOT EXISTS `tutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video_lien` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `date_publi` date NOT NULL,
  `nb_like` int(11) NOT NULL,
  `id_article_categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'avatar_default.JPG',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `anniversaire` date DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `statut` varchar(255) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `temps_connexion` time DEFAULT '00:00:00',
  `nb_telechargements` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `nom`, `prenom`, `avatar`, `email`, `password`, `sexe`, `anniversaire`, `region`, `pays`, `statut`, `created_at`, `temps_connexion`, `nb_telechargements`, `points`) VALUES
(1, 'Taneino', 'Vdb', 'Antoine', 'IMG_2862.JPG', 'antoinevdb15@gmail.com', '123456789', 'Homme', '1999-01-15', 'Hauts-De-France', 'France', '5', '2019-01-17', '00:00:03', 29, 1040),
(2, 'Antonio', NULL, NULL, NULL, 'azuivgfdfbhgfd@fgmai.com', '*CC67043C7BCFF5EEA5566BD9B1F3C74FD9A5CF5D', NULL, NULL, NULL, NULL, '3', '2019-03-13', '00:00:00', 0, 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
