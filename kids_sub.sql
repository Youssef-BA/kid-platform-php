-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 juin 2023 à 23:19
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kids_sub`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande_cadeaux`
--

CREATE TABLE `demande_cadeaux` (
  `id` int(11) NOT NULL,
  `Nom complet` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code postal` int(6) NOT NULL,
  `Numero` int(12) NOT NULL,
  `Cadeau` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_cadeaux`
--

INSERT INTO `demande_cadeaux` (`id`, `Nom complet`, `email`, `adresse`, `code postal`, `Numero`, `Cadeau`) VALUES
(1, 'jkhkh', 'jljioj@gmail.com', 'jiocodjoj', 98488, 90380280, 'Monopoly Classique'),
(2, 'jkhkh', 'jljioj@gmail.com', 'jiocodjoj', 98488, 90380280, 'Monopoly Classique'),
(3, 'jkhkh', 'jljioj@gmail.com', 'jiocodjoj', 98488, 90380280, 'Monopoly Classique'),
(4, 'jkhkh', 'jljioj@gmail.com', 'jiocodjoj', 98488, 90380280, 'Monopoly Classique'),
(5, 'youssef', 'youssef.bacie@gmail.com', 'iojdoj', 394887, 98430940, 'Baby My Little Love');

-- --------------------------------------------------------

--
-- Structure de la table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Sexe` enum('Garçon','Fille') NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Type` enum('Admin','Utilisateur') NOT NULL,
  `Points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `registration`
--

INSERT INTO `registration` (`id`, `Prenom`, `Nom`, `Sexe`, `Email`, `Password`, `Type`, `Points`) VALUES
(1, 'lklsjljlö', 'Admin', 'Garçon', 'admin@gmail.com', 'Youss2002@!!', 'Admin', 19990),
(36, 'noo', 'one', 'Garçon', 'admin@gmail.cpom', 'Youss2002@!!', 'Utilisateur', 0),
(37, 'noo', 'one', 'Garçon', 'admin@gmail.fr', 'Youss2002@!!', 'Utilisateur', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande_cadeaux`
--
ALTER TABLE `demande_cadeaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande_cadeaux`
--
ALTER TABLE `demande_cadeaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
