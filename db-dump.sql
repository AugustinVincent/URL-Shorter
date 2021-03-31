-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 31 mars 2021 à 21:06
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `url-shortener`
--

-- --------------------------------------------------------

--
-- Structure de la table `keyGenerator`
--

CREATE TABLE `keyGenerator` (
  `id` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `urlKey` varchar(255) NOT NULL,
  `urlStatus` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `stats` int(255) NOT NULL,
  `urlName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `keyGenerator`
--

INSERT INTO `keyGenerator` (`id`, `url`, `urlKey`, `urlStatus`, `username`, `stats`, `urlName`) VALUES
(1, 'https://threejs-journey.xyz/lessons/1', 'J3Yv', 1, 'admin', 0, 'threejs-journey'),
(2, 'https://threejs.org/docs/', '8hdQ', 1, 'admin', 0, 'threejs-docs'),
(3, 'https://github.com/AugustinVincent/URL-Shorter', 'EmIU', 1, 'admin', 0, 'github');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `userpassword`) VALUES
(1, 'admin', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `keyGenerator`
--
ALTER TABLE `keyGenerator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `keyGenerator`
--
ALTER TABLE `keyGenerator`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;