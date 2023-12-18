-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 déc. 2023 à 09:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bankofmorroco`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `accountId` int(11) NOT NULL,
  `balance` float DEFAULT NULL,
  `RIB` varchar(50) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`accountId`, `balance`, `RIB`, `userId`) VALUES
(6, 4500, '27899999915', 34),
(7, 0, '27899874115', 35),
(8, 15000, '27899874115', 37);

-- --------------------------------------------------------

--
-- Structure de la table `adress`
--

CREATE TABLE `adress` (
  `adrId` int(11) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `quartier` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `agencyId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adress`
--

INSERT INTO `adress` (`adrId`, `ville`, `quartier`, `rue`, `codePostal`, `email`, `tel`, `userId`, `agencyId`) VALUES
(46, 'Safi', 'PLATEAU', 'kjdhb', 45000, 'nasnas@gmail.com', '0655996022', 34, 17),
(48, 'Safi', 'elmajd', 'qsdfbg', 45000, 'smayka@gmail.com', '0655996022', 35, 17),
(49, 'Safi', 'biada', 'l3giba', 45000, 'asmaw@gmail.com', '065569', 36, 17),
(50, 'Safi', 'zdefrg', '45000', 45000, 'oualidagourd@gmail.com', '0655996022', 35, 17),
(51, 'Safi', 'elmajd', 'eloualidia', 45000, 'oualidagourd@gmail.com', '0655996022', 37, 17),
(52, 'Safi', 'ljhgfc', '45000', 45000, 'oualidagourd@gmail.com', '0655996022', 38, 11),
(53, 'Safi', 'jhuygtf', '45000', 45000, 'oualidagourd@gmail.com', '0655996022', 39, 11),
(54, 'Safi', 'ertg', '45000', 45000, 'oualidagozdefvurd@gmail.com', '0655996022', 40, 11);

-- --------------------------------------------------------

--
-- Structure de la table `agency`
--

CREATE TABLE `agency` (
  `agencyId` int(11) NOT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `bankId` int(11) DEFAULT NULL,
  `agencyname` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `agency`
--

INSERT INTO `agency` (`agencyId`, `longitude`, `latitude`, `bankId`, `agencyname`) VALUES
(11, '55448Jassss', 'HBUJBJH55', 1, 'SIDIRAHAL19'),
(17, 'cz', ',kjh', 1, 'BIADA'),
(20, 'hcihzih', 'HBUJBJH55', 1, 'SIDIRAHAL');

-- --------------------------------------------------------

--
-- Structure de la table `atm`
--

CREATE TABLE `atm` (
  `atmId` int(11) NOT NULL,
  `adress` varchar(50) DEFAULT NULL,
  `bankId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `atm`
--

INSERT INTO `atm` (`atmId`, `adress`, `bankId`) VALUES
(2, 'RUE EL OUALIDIA 40 SAFI ', 1),
(6, 'STATION TOTAL KHAWARIZMI', 1);

-- --------------------------------------------------------

--
-- Structure de la table `bank`
--

CREATE TABLE `bank` (
  `bankId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bank`
--

INSERT INTO `bank` (`bankId`, `name`, `logo`) VALUES
(1, 'CIH BANK', 'images/cihlogo.png'),
(36, 'CIH BANK', 'njba');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id_permissions` int(11) NOT NULL,
  `name_permissions` varchar(50) DEFAULT NULL,
  `decription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissionsrole`
--

CREATE TABLE `permissionsrole` (
  `id_permission_role` int(11) NOT NULL,
  `rolename` varchar(50) DEFAULT NULL,
  `id_permissions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roleofuser`
--

CREATE TABLE `roleofuser` (
  `roleOfUserId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `rolename` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roleofuser`
--

INSERT INTO `roleofuser` (`roleOfUserId`, `userId`, `rolename`) VALUES
(32, 34, 'client'),
(33, 35, 'client'),
(34, 36, 'client'),
(35, 37, 'client'),
(36, 38, 'client'),
(37, 39, 'admin'),
(38, 40, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`rolename`) VALUES
('admin'),
('client');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(11) NOT NULL,
  `trans_type` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `accountId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `trans_type`, `amount`, `accountId`) VALUES
(18, 'Credit', 4580, 6),
(19, 'Credit', 45842, 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `pw` varchar(200) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `familyName` varchar(50) DEFAULT NULL,
  `username` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `pw`, `firstName`, `familyName`, `username`) VALUES
(34, '$2y$10$X2HsMqb3tAYd4pAljap66u/36ZylftYMjp0GJscyYP8ZrKI3cqTNK', 'oualid', 'szdefrg', 'agourd123'),
(35, '$2y$10$GBkhH4nQ0BKSL14vOx3/A.XPMEecVEWpBtcRPuKJl3bK4cGoBXa7q', 'khalid', 'jhszxchzghxc', 'smayka'),
(36, '$2y$10$CdIbisyWs6m4AL7FG1eISOyKUn5xvWCnO/K0AcgOYUjnpTiDEN9Uu', 'asmaa', 'barj', 'asmaw'),
(37, '$2y$10$niBIhXWo7RT.qSeslq7cCewD84kxnQIhvsGg9Ofni3.GKpaAYuv.W', 'mohamed ', 'agourd', 'agourd123'),
(38, '$2y$10$DQ.KD51YLpceNzcSpV21ouisrIw83ImAzfmvxtz.Ku2R30/dAKNkC', 'ayoub', 'a', 'a'),
(39, '$2y$10$WKj5DgoQCig7XKA9Tp9wQe3Lf3Suglm2P.DSslSpX7glHHEmrfXmW', 'abdelhaq', 'b', 'b'),
(40, '$2y$10$cHwJNhXpaB/UMzjijcBaoOInRY4rfMPIG5Zs8kpEzCxef1ocoAMJ.', 'ando', 'daif', 'black beard');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountId`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`adrId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `agencyId` (`agencyId`);

--
-- Index pour la table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`agencyId`),
  ADD KEY `bankId` (`bankId`);

--
-- Index pour la table `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`atmId`),
  ADD KEY `bankId` (`bankId`);

--
-- Index pour la table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankId`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permissions`);

--
-- Index pour la table `permissionsrole`
--
ALTER TABLE `permissionsrole`
  ADD PRIMARY KEY (`id_permission_role`),
  ADD KEY `rolename` (`rolename`),
  ADD KEY `id_permissions` (`id_permissions`);

--
-- Index pour la table `roleofuser`
--
ALTER TABLE `roleofuser`
  ADD PRIMARY KEY (`roleOfUserId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `fk_roleName` (`rolename`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolename`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `accountId` (`accountId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `adress`
--
ALTER TABLE `adress`
  MODIFY `adrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `agency`
--
ALTER TABLE `agency`
  MODIFY `agencyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `atm`
--
ALTER TABLE `atm`
  MODIFY `atmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `bank`
--
ALTER TABLE `bank`
  MODIFY `bankId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permissions` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `permissionsrole`
--
ALTER TABLE `permissionsrole`
  MODIFY `id_permission_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roleofuser`
--
ALTER TABLE `roleofuser`
  MODIFY `roleOfUserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Contraintes pour la table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `adress_ibfk_2` FOREIGN KEY (`agencyId`) REFERENCES `agency` (`agencyId`);

--
-- Contraintes pour la table `agency`
--
ALTER TABLE `agency`
  ADD CONSTRAINT `agency_ibfk_1` FOREIGN KEY (`bankId`) REFERENCES `bank` (`bankId`);

--
-- Contraintes pour la table `atm`
--
ALTER TABLE `atm`
  ADD CONSTRAINT `atm_ibfk_1` FOREIGN KEY (`bankId`) REFERENCES `bank` (`bankId`);

--
-- Contraintes pour la table `permissionsrole`
--
ALTER TABLE `permissionsrole`
  ADD CONSTRAINT `permissionsrole_ibfk_1` FOREIGN KEY (`rolename`) REFERENCES `roles` (`rolename`),
  ADD CONSTRAINT `permissionsrole_ibfk_2` FOREIGN KEY (`id_permissions`) REFERENCES `permissions` (`id_permissions`);

--
-- Contraintes pour la table `roleofuser`
--
ALTER TABLE `roleofuser`
  ADD CONSTRAINT `fk_roleName` FOREIGN KEY (`rolename`) REFERENCES `roles` (`rolename`),
  ADD CONSTRAINT `roleofuser_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `account` (`accountId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
