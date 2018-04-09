-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 09 avr. 2018 à 08:07
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
-- Déchargement des données de la table `theme_base`
--

INSERT INTO `theme_base` (`id_theme`, `name_theme`, `name_chatroom`) VALUES
(1, 'Food', '0'),
(2, 'Cinema', '0'),
(3, 'Animals', '0'),
(4, 'Nature', '0'),
(5, 'Food', '0'),
(6, 'Literature', '0'),
(7, 'Economy', '0'),
(8, 'Design', '0'),
(9, 'Beauty', '0'),
(10, 'Travel', '0'),
(11, 'Kitten', '0');

--
-- Déchargement des données de la table `user_base`
--

INSERT INTO `user_base` (`id_user`, `nickname`, `mail`, `password`, `profile_picture`, `name_theme`) VALUES
(5, 'Raikes', 'benjamincaillet14@gmail.com', 'Test', '0', '0'),
(6, 'Sylvain', 'sylvain.pete@yahoo.fr', 'Test', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
