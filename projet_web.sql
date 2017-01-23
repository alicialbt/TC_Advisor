-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 24 Mai 2016 à 18:09
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(4) NOT NULL,
  `nom_entreprise` varchar(20) NOT NULL,
  `duree_stage` text NOT NULL,
  `annee_stage` int(4) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_ville` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `duree_stage`, `annee_stage`, `id_utilisateur`, `id_ville`) VALUES
(1, 'Total', '', 0, 1, 2),
(3, 'CapGemini', '8', 2016, 9, 5),
(4, 'Atos', '3', 2015, 10, 7);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(4) NOT NULL,
  `nom_pays` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_utilisateur` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom_pays`, `id_utilisateur`) VALUES
(1, 'Angleterre', 1),
(2, 'Canada', 1),
(4, 'Etats-Unis', 10),
(5, 'Argentine', 10),
(6, 'Mexique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

CREATE TABLE `universite` (
  `id_universite` int(4) NOT NULL,
  `nom_universite` varchar(20) NOT NULL,
  `contrat_etude` text NOT NULL,
  `cours_interessants` text NOT NULL,
  `duree_echange` int(4) NOT NULL,
  `langue_cours` varchar(10) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_ville` int(4) NOT NULL,
  `annee_echange` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `universite`
--

INSERT INTO `universite` (`id_universite`, `nom_universite`, `contrat_etude`, `cours_interessants`, `duree_echange`, `langue_cours`, `id_utilisateur`, `id_ville`, `annee_echange`) VALUES
(1, 'Coucou', '', '', 0, '', 1, 1, 0),
(2, 'Illinois Institue of', '', '', 4, 'Anglais', 10, 6, 2007),
(3, 'UniversitÃ© de Mexic', '', '', 10, 'Espagnol', 1, 8, 2007);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(4) NOT NULL,
  `nom_utilisateur` varchar(20) NOT NULL,
  `prenom_utilisateur` varchar(20) NOT NULL,
  `promo_utilisateur` int(4) NOT NULL,
  `numero_telephone_utilisateur` varchar(10) NOT NULL,
  `adresse_mail_utilisateur` varchar(30) NOT NULL,
  `mot_de_passe_utilisateur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `promo_utilisateur`, `numero_telephone_utilisateur`, `adresse_mail_utilisateur`, `mot_de_passe_utilisateur`) VALUES
(1, 'Astus', 'Superastus', 2015, '123456789', 'tc.astus@insa-lyon.fr', 'asTus2ouf'),
(2, 'aa', 'aa', 2017, '0', 'coucou', 'azerty'),
(7, 'Trump', 'Donald', 2016, '0', 'donaldtrum@hotmail.us', 'lalala'),
(9, 'Paul', 'Pau', 2015, '767875643', 'PauPaul@gmail.com', 'lalala'),
(10, 'Lebreton', 'Alicia', 2017, '0608722437', 'alicialebreton@hotmail.fr', 'lalala');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(4) NOT NULL,
  `nom_ville` varchar(20) NOT NULL,
  `sortir` text NOT NULL,
  `manger` text NOT NULL,
  `dormir` text NOT NULL,
  `voyager` text NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_pays` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom_ville`, `sortir`, `manger`, `dormir`, `voyager`, `id_utilisateur`, `id_pays`) VALUES
(1, 'Londres', 'sortir Londres c coolos', 'manger Londres cccccc', 'dormir ici c trop cool', 'voyager Londres c fat', 1, 1),
(2, 'Toronto', 'jaooz', 'manger Toronto', 'dormir Toronto', 'voyager Toronto', 1, 2),
(3, 'Montreal', '', 'manger Montreal', '', '', 1, 2),
(5, 'Mississauga', '', '', '', '', 9, 2),
(6, 'Chicago', 'Boston', 'Resto', 'Tu dors pas ', 'LALALA', 10, 4),
(7, 'Buenos Aires', '', '', '', '', 10, 5),
(8, 'Mexico', 'Au sÃ©nÃ©gal', 'En Colombie', 'Au lit', '', 1, 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`),
  ADD KEY `entreprise` (`id_utilisateur`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`),
  ADD KEY `pays` (`id_utilisateur`);

--
-- Index pour la table `universite`
--
ALTER TABLE `universite`
  ADD PRIMARY KEY (`id_universite`),
  ADD KEY `universite` (`id_ville`),
  ADD KEY `univ` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`),
  ADD KEY `ville` (`id_utilisateur`),
  ADD KEY `ville_idpays` (`id_pays`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `universite`
--
ALTER TABLE `universite`
  MODIFY `id_universite` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `entreprise` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `universite`
--
ALTER TABLE `universite`
  ADD CONSTRAINT `univ` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `universite_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
