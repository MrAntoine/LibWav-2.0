-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 20 jan. 2019 à 17:04
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_contenu`) VALUES
(17, 1, 31),
(10, 3, 1),
(15, 1, 1);

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
(1, 1, 1, 'klj,kljkljjlk', '2019-01-14', 'attente');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalements_users`
--

INSERT INTO `signalements_users` (`id`, `id_user`, `id_demandeur`, `raison`, `date`, `etat`) VALUES
(1, 1, 2, 'pour le test', '2019-01-14', 'null'),
(2, 1, 2, 'musique pourrie', '2019-01-14', 'null'),
(3, 1, 2, '21321213213231213', '2019-01-23', 'attente'),
(4, 1, 3, '21321213213231213', '2019-01-23', 'attente');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `son`
--

INSERT INTO `son` (`id`, `lien_upload`, `titre`, `description`, `idCreateur`, `date_publi`, `id_son_categorie`) VALUES
(1, '', 'Mon premier son ', 'voici la description ', 1, '2019-01-01', 1),
(2, '429.mp3', 'Toto', '', 1, '2020-01-20', 0),
(4, '2862.mp3', 'test', '', 1, '2020-01-20', 0),
(5, '2862.mp3', 'test', '', 1, '2020-01-20', 0),
(6, '2862.mp3', ',;;,;,,;;,', '', 1, '2020-01-20', 0),
(7, '7265.mp3', 'Toto', '', 1, '2020-01-20', 0),
(8, 'tati', 'tati', '', 1, '2020-01-20', 0),
(9, '2862.mp3', 'Toto', '', 1, '2020-01-20', 0),
(10, '429.mp3', '1', '', 1, '2020-01-20', 0),
(11, '429.mp3', '2', '', 1, '2020-01-20', 0),
(12, '429.mp3', 'Toto', '', 1, '2020-01-20', 0),
(13, '429.mp3', 'ftytfty', '', 1, '2020-01-20', 0),
(14, 'Toto', '3', '', 1, '2020-01-20', 0),
(15, '424.mp3', '3', '', 1, '2020-01-20', 0),
(16, '429.mp3', '3', '', 1, '2020-01-20', 0),
(17, '424.mp3', 'Toto3', '', 1, '2020-01-20', 0),
(18, '424.mp3', 'Toto3', '', 1, '2020-01-20', 0),
(19, '2862.mp3', 'Toto3', '', 1, '2020-01-20', 0),
(20, '429.mp3', 'Toto6', '', 1, '2020-01-20', 0),
(21, '7266.mp3', 'Toto7', '', 1, '2020-01-20', 0),
(22, '429.mp3', 'test1', '', 1, '2020-01-20', 0),
(23, '2862.mp3', 'yygyuygu', '', 1, '2020-01-20', 0),
(24, '7265.mp3', '45645654', '', 1, '2020-01-20', 0),
(25, '7266.mp3', 'jknjkjnnjknk', '', 1, '2020-01-20', 0),
(26, '424.mp3', 'hijoijojoijoij', '', 1, '2020-01-20', 0),
(27, '429.mp3', '23', '', 1, '2020-01-20', 0),
(28, '2862.mp3', '456456456', '', 1, '2020-01-20', 0),
(29, '424.mp3', 'njknjkjnkjnk', '', 1, '2020-01-20', 0),
(30, '429.mp3', 'bhjbjhbj', '', 1, '2020-01-20', 0),
(31, '2862.mp3', '45645546', '', 1, '2020-01-20', 0),
(32, '7266.mp3', 'opkpok', '', 1, '2020-01-20', 0),
(33, '7274.wav', 'dghn', '', 1, '2020-01-20', 0),
(34, '7265.mp3', ',kl,klk,lk,', '', 1, '2020-01-20', 0);

-- --------------------------------------------------------

--
-- Structure de la table `son_categorie`
--

DROP TABLE IF EXISTS `son_categorie`;
CREATE TABLE IF NOT EXISTS `son_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `idCreateur` int(11) NOT NULL,
  `id_article_categorie` int(11) NOT NULL,
  `nb_like` int(11) NOT NULL,
  `date_publi` date NOT NULL,
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
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `anniversaire` date NOT NULL,
  `region` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `temps_connexion` time NOT NULL,
  `nb_telechargements` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `nom`, `prenom`, `avatar`, `email`, `password`, `sexe`, `anniversaire`, `region`, `pays`, `statut`, `created_at`, `temps_connexion`, `nb_telechargements`, `points`) VALUES
(1, 'Taneino', 'Vdb', 'Antoine', 'jjkjn', 'antoinevdb15@gmail.com', 123456789, 'Homme', '1999-01-15', 'Hauts-De-France', 'France', '5', '2019-01-17', '00:00:03', 0, 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
