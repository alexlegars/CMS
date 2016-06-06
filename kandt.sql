-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 06 Juin 2016 à 11:05
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kandt`
--

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `span_class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `span_text` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `iframe` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `slug`, `h1`, `title`, `image`, `body`, `span_class`, `span_text`, `iframe`) VALUES
(1, 'teletubbies', 'Les Teletubbies', 'Teletubbies', 'img/teletubbies.jpg', '<p>C''est flippant.</p>', 'label label-danger', 'DANGER', 'https://www.youtube.com/embed/NSQa8THkQ8E'),
(2, 'kittens', 'Les Chatons!', 'Kittens', 'img/three_kittens.jpg', '<p>C''est mignon.</p>', 'label label-primary', 'kawaii', 'https://www.youtube.com/embed/LI7-Cu-9wWM'),
(3, 'swaggman', 'Swagg Man', 'Swagg Man', 'img/swaggman.jpg', '<p>Billeyyyyy.</p>', 'label label-primary', 'tatouey', 'https://www.youtube.com/embed/U9ZMHrsgWaA"');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
