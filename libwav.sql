-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 08 mars 2019 à 19:02
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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `contenu`, `idCreateur`, `nb_like`, `date_publi`, `id_Post`) VALUES
(1, 'Mon commentaire', 1, 0, '2008-03-20', 0),
(2, 'COUCOU', 1, 0, '2008-03-20', 1),
(3, 'COUCOU', 1, 0, '2008-03-20', 1),
(4, 'COUCOU', 1, 0, '2008-03-20', 1),
(5, 'COUCOU', 1, 0, '2008-03-20', 1),
(6, 'COUCOU', 1, 0, '2008-03-20', 1),
(7, 'TOTO', 1, 0, '2008-03-20', 3),
(8, 'TEST', 1, 0, '2008-03-20', 2),
(9, 'TEST', 1, 0, '2008-03-20', 2),
(10, 'entre ton commetaire mdr', 1, 0, '2008-03-20', 5),
(11, 'entre ton commetaire mdr', 1, 0, '2008-03-20', 5),
(12, 'entre ton commetaire mdr', 1, 0, '2008-03-20', 5),
(13, 'entre ton commetaire mdr', 1, 0, '2008-03-20', 5),
(14, 'entre ton commetaire mdr', 1, 0, '2008-03-20', 5),
(15, 'ok lol', 1, 0, '2008-03-20', 5),
(16, 'ok lol', 1, 0, '2008-03-20', 5),
(17, 'ok lol', 1, 0, '2008-03-20', 5),
(18, 'ok lol', 1, 0, '2008-03-20', 5),
(19, 'ok lol', 1, 0, '2008-03-20', 5),
(20, 'ok lol', 1, 0, '2008-03-20', 5),
(21, 'mdr', 1, 0, '2008-03-20', 5),
(22, 'lol', 1, 0, '2008-03-20', 5),
(23, 'lol', 1, 0, '2008-03-20', 5),
(24, 'lol', 1, 0, '2008-03-20', 5),
(25, 'lol', 1, 0, '2008-03-20', 5),
(26, 'ok', 1, 0, '2008-03-20', 5),
(27, 'trololo', 1, 0, '2008-03-20', 5),
(28, 'XD', 1, 0, '2008-03-20', 5),
(29, 'fzfok', 1, 0, '2008-03-20', 5),
(30, 'ml;lm', 1, 0, '2008-03-20', 5),
(31, 'joijoijoi', 1, 0, '2008-03-20', 5),
(32, 'kopkop', 1, 0, '2008-03-20', 5),
(33, 'ANTOINE', 1, 0, '2008-03-20', 5),
(34, 'LE WEB', 1, 0, '2008-03-20', 5),
(35, 'mYSQL', 1, 0, '2008-03-20', 5),
(36, 'CEci est un test <br/> Avec un retrour  a la <b>ligne</b>', 1, 0, '2008-03-20', 5),
(37, '<script> alert(\"coucou\");</script>', 1, 0, '2008-03-20', 5),
(38, 'CC', 1, 0, '2008-03-20', 6),
(39, 'TETEE', 1, 0, '2008-03-20', 6),
(40, 'qetrg', 1, 0, '2008-03-20', 6),
(41, 'AZERTY', 1, 0, '2008-03-20', 6),
(42, 'FRIDAY', 1, 0, '2008-03-20', 6),
(43, 'ARMA III', 1, 0, '2008-03-20', 6),
(44, 'ARMA IV', 1, 0, '2008-03-20', 6),
(45, 'ARMA V', 1, 0, '2008-03-20', 6),
(46, 'VENDREDI', 1, 0, '2008-03-20', 6),
(47, 'SAMEDI', 1, 0, '2008-03-20', 6),
(48, 'DIMANCHE', 1, 0, '2008-03-20', 6),
(49, '^pmlp^lmp^l', 1, 0, '2008-03-20', 6),
(50, 'trololo', 1, 0, '2008-03-20', 6),
(51, 'okpokpok', 1, 0, '2008-03-20', 6),
(52, 'popopo', 1, 0, '2008-03-20', 6),
(53, 'lp^lp^l^pl', 1, 0, '2008-03-20', 6),
(54, 'AMAZING', 1, 0, '2019-03-20', 6),
(55, 'sdf', 1, 0, '2008-03-20', 6),
(56, 'TANEINO', 1, 0, '2008-03-20', 6),
(57, 'TANEINO II', 1, 0, '2008-03-20', 6),
(58, 'BIKINI', 1, 0, '2008-03-20', 6),
(59, 'ON MANGE', 1, 0, '2008-03-20', 6);

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
) ENGINE=MyISAM AUTO_INCREMENT=768 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalements_posts`
--

INSERT INTO `signalements_posts` (`id`, `id_post`, `id_demandeur`, `raison`, `date`, `etat`) VALUES
(1, 1, 1, 'klj,kljkljjlk', '2019-01-14', 'attente'),
(19, 1, 1, 'raison test', '2018-02-20', 'attente'),
(18, 1, 1, 'bhjbhjbj', '2018-02-20', 'attente');

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
  `nb_telechargements` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `son`
--

INSERT INTO `son` (`id`, `lien_upload`, `titre`, `description`, `idCreateur`, `date_publi`, `id_son_categorie`, `nb_telechargements`) VALUES
(1, '429.mp3', 'Mon premier son ', 'voici la description ', 1, '2019-01-01', 1, 10),
(2, '429.mp3', 'Toto', '', 1, '2020-01-20', 15, 12),
(36, 'Un Gars Une Fille en 4K - Reproduction du Générique - Jingle Un Gars Une Fille - UHD - Fictif - 2016.mp3', 'mec', '', 1, '2009-02-20', 0, 0),
(35, '7803.wav', 'Toto2', '', 1, '2009-02-20', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `son_categorie`
--

DROP TABLE IF EXISTS `son_categorie`;
CREATE TABLE IF NOT EXISTS `son_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `son_categorie`
--

INSERT INTO `son_categorie` (`id`, `categorie_name`) VALUES
(1, 'romantique'),
(15, 'nature');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tutos`
--

INSERT INTO `tutos` (`id`, `titre`, `description`, `video_lien`, `contenu`, `idCreateur`, `date_publi`, `nb_like`, `id_article_categorie`) VALUES
(5, 'Test embed', 'Test embedTest embed', 'https://www.youtube.com/watch?v=ugkK6_XmsaQ', 'Test embedTest embed', 1, '2008-03-20', 0, NULL),
(6, 'Test embed', 'Test embedTest embed', 'https://www.youtube.com/embed/ugkK6_XmsaQ', 'Test embedTest embed', 1, '2008-03-20', 0, NULL),
(2, 'kl,k,lkl,,k,', 'k,lk,,,,,,,,,,,,,', 'https://www.youtube.com/embed/ugkK6_XmsaQ', 'k,lk,klkl,,klllllllllllll', 1, '2007-03-20', 0, NULL),
(3, 'gyuioyhgbyuhb', 'bjbjhbjhb', 'http://www.allocine.fr/video/', 'hjbhjbjhbjh', 1, '2007-03-20', 0, NULL),
(4, 'facebook', 'wdgfh vugjlhpol;u,yfnjhbgvfcdss', 'https://www.facebook.com/?ref=tn_tnmn', ':opmpli;,nbvfcdxwqsxzdcfvgbhnj,k;l:m!m:l;ik,jnbvqwszxdcefvrgyhnju,ki;lo:', 1, '2007-03-20', 0, NULL);

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
  `avatar` varchar(255) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `nom`, `prenom`, `avatar`, `email`, `password`, `sexe`, `anniversaire`, `region`, `pays`, `statut`, `created_at`, `temps_connexion`, `nb_telechargements`, `points`) VALUES
(1, 'Taneino', 'Vdb', 'Antoine', 'IMG_2862.JPG', 'antoinevdb15@gmail.com', '123456789', 'Homme', '1999-01-15', 'Hauts-De-France', 'France', '5', '2019-01-17', '00:00:03', 20, 840);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
