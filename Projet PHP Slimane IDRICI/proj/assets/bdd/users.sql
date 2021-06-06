-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 juin 2021 à 14:42
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `nom` varchar(12) NOT NULL,
  `prenom` varchar(12) NOT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nom`, `prenom`, `admin`) VALUES
(12, 'Slimane', '$2y$10$Zo2W3fdt0d3oDb19UBe.aO8rfDhES3/o/bcrsyYfopkG26CPe9iBu', 'Slimane', 'IDRICI', 1),
(13, 'Ryu', '$2y$10$vBuc2OJm5raSs43bx6RtkuPUOisbgdDHiXMsH0Qs9aUXWIaINOKRu', 'Axel', 'Slim', 0),
(15, 'famass', '$2y$10$PlcCjUbhe2gc3xOLGRChPOdyGZkeIxY7ZXG/rx6kNCBGKOybCa3VO', 'sdg', 'dsg', 0),
(16, 'Ahmad', '$2y$10$e65.m9BiuFZmalmhhKfoQOAK9o8AB8VtMFaZJKf64iuznla77zPPy', 'Cnam', 'Ahmad', 0),
(17, 'User14', '$2y$10$4hBl8kxEAPRJD10DQ8c0culYx4PQZUd6pizRtma6HdGl9SFrd8xC.', '&lt;script&g', 'A**A*', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
