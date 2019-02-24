-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 fév. 2019 à 21:55
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pompier`
--

-- DROP TABLE IF EXISTS `vehicule`;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE OR REPLACE TABLE `intervention` (
  `idInter` int(11) NOT NULL,
  `quand` datetime NOT NULL,
  `motif` text NOT NULL,
  `dispo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`idInter`, `quand`, `motif`, `dispo`) VALUES
(1, '0000-00-00 00:00:00', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `remplacement`
--

CREATE OR REPLACE TABLE `remplacement` (
  `idRemp` int(11) NOT NULL,
  `de` datetime NOT NULL,
  `a` datetime NOT NULL,
  `dispo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remplacement`
--

INSERT INTO `remplacement` (`idRemp`, `de`, `a`, `dispo`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, '2019-02-20 00:00:00', '2019-02-28 07:36:08', 1),
(3, '2019-02-03 08:06:31', '2019-02-27 17:32:14', 0);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE OR REPLACE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `role` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `role`) VALUES
(1, 'Chef de centre'),
(2, 'Chef de centre adjoint'),
(3, 'Administrateur'),
(4, 'Chef de section'),
(5, 'Responsable matériel'),
(6, 'responsable véhicule'),
(7, 'responsable habillement'),
(8, 'responsable sport');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE OR REPLACE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `grade` int(11) NOT NULL,
  `numPhone` int(11) NOT NULL,
  `mdp` text NOT NULL,
  `email` text NOT NULL,
  `naissance` date NOT NULL,
  `dispo` int(11) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `role`, `matricule`, `grade`, `numPhone`, `mdp`, `email`, `naissance`, `dispo`, `section`) VALUES
(1, 'etoiledemer', 'patrick', 1, '2ZE2RT1Z', 1, 123456789, 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', 'patrick.star@gmail.com', '1990-02-13', 1, 0);

--
-- Structure de la table `verif`
--

CREATE OR REPLACE TABLE `verif` (
  `idVerif` int(11) NOT NULL,
  `idMatEtr` int(11) NOT NULL,
  `dateVerif` datetime NOT NULL,
  `equipeDeGarde` int(11) NOT NULL,
  `perosnnel1` int(11) NOT NULL,
  `personnel2` int(11) NOT NULL,
  `verifier` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `verif`
--


--
-- Structure de la table `materiel`
--

CREATE OR REPLACE TABLE `materiel` (
  `idMat` int(11) NOT NULL,
  `vehicule` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `localisation` text NOT NULL,
  `qte` int(11) NOT NULL,
  `descrip` text NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`idMat`, `vehicule`, `localisation`, `qte`, `descrip`, `nom`) VALUES 
(1, 'joile camion rouge', 'place passager', '5', '', 'lampe torche'), 
(2, 'ambulance', 'coffre', '1', '', 'défibrillateur'),
(3, 'azea', 'ert', '3', '', 'ghfvhj');

/*INSERT INTO `materiel` (`idMat`, `materiel`, `localisation`, `qte`, `descrip`, `nom`) VALUES
(1, `lolololol`, `quelque part`, 5, 'super beau camion rouge', 'a'),
(2, `aze`, `azeaz`, 5, 'azeaze', 'a'),
(3, `azrtye`, `azeartz`, 5, 'azertyaze', 'a'),
(4, `asdfe`, `azesdfaz`, 5, 'azesdfaze', 'a');*/


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `intervention`
--

ALTER TABLE `intervention`
  ADD PRIMARY KEY (`idInter`);

--
-- Index pour la table `remplacement`
--

ALTER TABLE `remplacement`
  ADD PRIMARY KEY (`idRemp`);

--
-- Index pour la table `role`
--


ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `verif`
--
ALTER TABLE `verif`
  ADD PRIMARY KEY (`idVerif`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`idMat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `idInter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `remplacement`
--
ALTER TABLE `remplacement`
  MODIFY `idRemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `verif`
--

ALTER TABLE `verif`
  MODIFY `idVerif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `materiel`
--

ALTER TABLE `materiel`
  MODIFY `idMat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
