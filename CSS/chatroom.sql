-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 04 avr. 2018 à 12:29
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
CREATE DATABASE IF NOT EXISTS `chatroom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chatroom`;

-- --------------------------------------------------------

--
-- Structure de la table `chatroom_base`
--

CREATE TABLE `chatroom_base` (
  `id_chatroom` int(11) NOT NULL,
  `name_chatroom` varchar(255) NOT NULL,
  `date_create` date NOT NULL,
  `id_creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `chatroom_theme`
--

CREATE TABLE `chatroom_theme` (
  `id_chatroom` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `chatroom_user`
--

CREATE TABLE `chatroom_user` (
  `id_chatroom` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `linked_users`
--

CREATE TABLE `linked_users` (
  `id_user` int(11) NOT NULL,
  `id_chatroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message_base`
--

CREATE TABLE `message_base` (
  `id_message` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `message` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_chatroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `theme_base`
--

CREATE TABLE `theme_base` (
  `id_theme` int(11) NOT NULL,
  `name_theme` varchar(255) NOT NULL,
  `name_chatroom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user_base`
--

CREATE TABLE `user_base` (
  `id_user` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` text NOT NULL,
  `name_theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_base`
--

INSERT INTO `user_base` (`id_user`, `nickname`, `mail`, `password`, `profile_picture`, `name_theme`) VALUES
(5, 'Raikes', 'benjamincaillet14@gmail.com', 'Test', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `user_theme`
--

CREATE TABLE `user_theme` (
  `id_user` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chatroom_base`
--
ALTER TABLE `chatroom_base`
  ADD PRIMARY KEY (`id_chatroom`);

--
-- Index pour la table `message_base`
--
ALTER TABLE `message_base`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `theme_base`
--
ALTER TABLE `theme_base`
  ADD PRIMARY KEY (`id_theme`);

--
-- Index pour la table `user_base`
--
ALTER TABLE `user_base`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chatroom_base`
--
ALTER TABLE `chatroom_base`
  MODIFY `id_chatroom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message_base`
--
ALTER TABLE `message_base`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `theme_base`
--
ALTER TABLE `theme_base`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_base`
--
ALTER TABLE `user_base`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Déchargement des données de la table `user_base`
--

INSERT INTO `user_base` (`id_user`, `nickname`, `mail`, `password`, `profile_picture`, `name_theme`) VALUES
(5, 'Raikes', 'benjamincaillet14@gmail.com', 'Test', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
