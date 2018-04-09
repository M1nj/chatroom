-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 09 avr. 2018 à 12:54
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chatroom`
--

-- --------------------------------------------------------

--
-- Structure de la table `theme_base`
--

CREATE TABLE `theme_base` (
  `id_theme` int(11) NOT NULL,
  `name_theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `theme_base`
--

INSERT INTO `theme_base` (`id_theme`, `name_theme`) VALUES
(1, 'Cinema'),
(2, 'Music'),
(3, 'Animals'),
(4, 'Nature'),
(5, 'Food'),
(6, 'Literature'),
(7, 'Economy'),
(8, 'Design'),
(9, 'Beauty'),
(10, 'Travel');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `theme_base`
--
ALTER TABLE `theme_base`
  ADD PRIMARY KEY (`id_theme`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `theme_base`
--
ALTER TABLE `theme_base`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
