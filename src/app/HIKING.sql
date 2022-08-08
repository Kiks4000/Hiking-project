-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : sam. 23 juil. 2022 à 16:54
-- Version du serveur : 8.0.29
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `HIKING`
--

-- --------------------------------------------------------

--
-- Structure de la table `HIKES`
--

CREATE TABLE `HIKES` (
  `id_hikes` int NOT NULL,
  `name_hikes` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `distance` int NOT NULL,
  `duration` int NOT NULL,
  `elevation_gain` int NOT NULL,
  `description` varchar(500) NOT NULL,
  `update_hikes` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `HIKES`
--

INSERT INTO `HIKES` (`id_hikes`, `name_hikes`, `date_creation`, `distance`, `duration`, `elevation_gain`, `description`, `update_hikes`) VALUES
(1, 'D\'une rive à l\'autre d\'un méandre de la Semois', '2022-07-22', 7, 145, 150, 'Une belle approche d\'un méandre de la Semoy et de son relief. Alternance de tronçons tranquilles et de tronçons physiques\r\nAttention : Ce circuit court, mais tonique, ne peut s\'effectuer qu\'en période estivale lorsque la passerelle de Kelhan est en place.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `HIKESTAGS`
--

CREATE TABLE `HIKESTAGS` (
  `id_tag` int NOT NULL,
  `id_hike` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `HIKESTAGS`
--

INSERT INTO `HIKESTAGS` (`id_tag`, `id_hike`) VALUES
(3, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `HIKESUSERS`
--

CREATE TABLE `HIKESUSERS` (
  `id_user` int NOT NULL,
  `id_hike` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TAGS`
--

CREATE TABLE `TAGS` (
  `id_tag` int NOT NULL,
  `name_tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `TAGS`
--

INSERT INTO `TAGS` (`id_tag`, `name_tag`) VALUES
(1, 'Very Easy'),
(2, 'Easy'),
(3, 'Medium'),
(4, 'Hard'),
(5, 'Very Hard'),
(6, 'Forest'),
(7, 'Mountain');

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE `USERS` (
  `id_user` int NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `USERS`
--

INSERT INTO `USERS` (`id_user`, `firstname`, `lastname`, `nickname`, `email`, `password`) VALUES
(7, 'Loïc', 'Motte', 'Poopsino', 'sj@hdhdh.com', '$2y$10$Sjn0a0M1JEHNVlVwIxvhnOJqNw6zVrM8jT5KTygruS2RpIEEvYL1G'),
(11, 'Nico', 'shsh', 'sdfghsdfgh', 'motte.quentin1@gmail.com', '$2y$10$SQ.YHBO9VILWXC30vpsYie9s.wB.lCnE5xujG0Pt9.LbN1GedZ/9y');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `HIKES`
--
ALTER TABLE `HIKES`
  ADD PRIMARY KEY (`id_hikes`);

--
-- Index pour la table `HIKESTAGS`
--
ALTER TABLE `HIKESTAGS`
  ADD KEY `FK_HIKESTAG_ID_HIKES` (`id_hike`),
  ADD KEY `FK_HIKESTAG_ID_TAGS` (`id_tag`);

--
-- Index pour la table `HIKESUSERS`
--
ALTER TABLE `HIKESUSERS`
  ADD KEY `FK_HIKESUSERS_ID_USER` (`id_user`),
  ADD KEY `FK_HIKESUSERS_ID_HIKES` (`id_hike`);

--
-- Index pour la table `TAGS`
--
ALTER TABLE `TAGS`
  ADD PRIMARY KEY (`id_tag`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nickname` (`nickname`,`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `HIKES`
--
ALTER TABLE `HIKES`
  MODIFY `id_hikes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `TAGS`
--
ALTER TABLE `TAGS`
  MODIFY `id_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `HIKESTAGS`
--
ALTER TABLE `HIKESTAGS`
  ADD CONSTRAINT `FK_HIKESTAG_ID_HIKES` FOREIGN KEY (`id_hike`) REFERENCES `HIKES` (`id_hikes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HIKESTAG_ID_TAGS` FOREIGN KEY (`id_tag`) REFERENCES `TAGS` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `HIKESUSERS`
--
ALTER TABLE `HIKESUSERS`
  ADD CONSTRAINT `FK_HIKESUSERS_ID_HIKES` FOREIGN KEY (`id_hike`) REFERENCES `HIKES` (`id_hikes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HIKESUSERS_ID_USER` FOREIGN KEY (`id_user`) REFERENCES `USERS` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
