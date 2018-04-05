-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Avril 2018 à 21:37
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mybiblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `titre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `couverture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resume` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `donation` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `user_id`, `titre`, `couverture`, `resume`, `commentaire`, `etat`, `donation`) VALUES
(1, NULL, 'Star Wars 01 - Episode 1 - La menace fantôme', 'images/stars_wars.jpg', 'Les habitants de la planète Naboo mènent une vie paisible. Comme leur reine, Amidala, ce sont des gens gentils et pacifiques. Pourtant, un jour, des marchands  décident de s\'en prendre à eux...', 'Super!', 0, 'ange'),
(2, NULL, 'Le Seigneur des Anneaux (Tome 1-La Communauté de l\'Anneau)', 'images/seigneur_anneaux.jpg', 'Dans les vertes prairies de la Comté, les Hobbits, ou Semi-hommes, vivaient en paix… Jusqu\'au jour fatal où l\'un d\'entre eux, au cours de ses voyages, entra en possession de l\'Anneau Unique aux immens', 'Magique !', 0, 'mickael'),
(3, NULL, 'Harry Potter, I : Harry Potter à l\'école des sorciers', 'images/harry_potter.jpg', 'Harry Potter est un garçon ordinaire. Mais le jour de ses onze ans, son existence bascule : un géant vient le chercher pour l\'emmener dans une école de sorciers. Quel mystère entoure donc sa naissance', 'Un classique!', 0, 'nathalie'),
(4, NULL, 'Le Grand Meaulnes', 'images/grand_maulnes.jpg', 'Présent depuis près de cinquante ans au catalogue du Livre de Poche - avec le numéro 1000 -, Le Grand Meaulnes a fait rêver plus de cinq millions de lecteurs de tous âges. Parce qu\'il exprime d\'une f ', 'Belle histoire !', 0, 'ange'),
(5, NULL, 'Trotro a trop chaud', 'images/ane_trotto.jpg', 'Ce jour-là, le soleil brille très fort et Trotro a tellement chaud qu\'il ne sait plus que faire... Il boit un verre d\'eau, se met en maillot, se rafraîchit sous un jet d\'eau et enfin déguste à l\'ombre', 'Pour les tout petit.', 0, 'mickael'),
(6, NULL, 'Martine, numéro 3 : Martine à la mer', 'images/martine.jpg', 'Une comédie aquatique qui bascule dans la cruauté extrême. Sirène hallucinée, Martine va plonger sous la ligne de flottaison qui sépare la fantaisie du délire.\r\nLe roman illustré Martine à la plage ', 'Un classique !', 0, 'nathalie');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `photo`) VALUES
(1, 'ange', 'ab4f63f9ac65152575886860dde480a1', 'images/ange.jpg'),
(2, 'mickael', 'ab4f63f9ac65152575886860dde480a1', 'images/mickael.jpg'),
(3, 'nathalie', 'ab4f63f9ac65152575886860dde480a1', 'images/nathalie.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AC634F99A76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_AC634F99A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
