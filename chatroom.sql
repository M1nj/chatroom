-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 09 avr. 2018 à 12:35
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

--
-- Déchargement des données de la table `chatroom_base`
--

INSERT INTO `chatroom_base` (`id_chatroom`, `name_chatroom`, `date_create`, `id_creator`, `nom_theme`) VALUES
(6, 'Test', '2018-04-09', 0, 'Design'),
(7, 'Test 2', '2018-04-09', 0, 'Animals');

--
-- Déchargement des données de la table `message_base`
--

INSERT INTO `message_base` (`id_message`, `date_create`, `message`, `nickname`, `id_chatroom`) VALUES
(1, '2018-04-06', 'Raikes', '0', 0),
(2, '2018-04-06', 'Raikes', 'TEST', 0),
(3, '2018-04-06', 'Raikes', 'TEST', 0),
(4, '2018-04-06', 'Hello', 'Raikes', 0),
(5, '2018-04-06', 'Hello', 'Raikes', 0),
(6, '2018-04-09', 'Hello', '', 0),
(7, '2018-04-09', 'Test', '', 7);

--
-- Déchargement des données de la table `theme_base`
--

INSERT INTO `theme_base` (`id_theme`, `name_theme`) VALUES
(1, 'Music'),
(2, 'Cinema'),
(3, 'Animals'),
(4, 'Nature'),
(5, 'Food'),
(6, 'Literature'),
(7, 'Economy'),
(8, 'Design'),
(9, 'Beauty'),
(10, 'Travel'),
(11, 'Kitten');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
