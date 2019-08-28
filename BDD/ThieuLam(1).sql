-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 27 Août 2019 à 22:53
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ThieuLam`
--

-- --------------------------------------------------------

--
-- Structure de la table `Booking`
--
-- Création :  Mer 31 Juillet 2019 à 17:47
--

CREATE TABLE `Booking` (
  `ID` int(11) NOT NULL,
  `ID_KFTM_USERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `Booking`:
--   `ID`
--       `KFTM_SHOPCART` -> `ID`
--   `ID_KFTM_USERS`
--       `KFTM_USERS` -> `ID`
--

-- --------------------------------------------------------

--
-- Structure de la table `Checking`
--
-- Création :  Mer 31 Juillet 2019 à 17:47
--

CREATE TABLE `Checking` (
  `ID` int(11) NOT NULL,
  `ID_KFTM_USERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `Checking`:
--   `ID`
--       `KFTM_COURSES` -> `ID`
--   `ID_KFTM_USERS`
--       `KFTM_USERS` -> `ID`
--

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_ARTICLES`
--
-- Création :  Dim 18 Août 2019 à 15:54
--

CREATE TABLE `KFTM_ARTICLES` (
  `id` int(11) NOT NULL,
  `articleName` varchar(50) NOT NULL,
  `articlePicture` blob,
  `articleQuantity` int(11) NOT NULL,
  `articleDescription` varchar(255) DEFAULT NULL,
  `articlePrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `KFTM_ARTICLES`:
--

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_COURSES`
--
-- Création :  Dim 18 Août 2019 à 15:50
--

CREATE TABLE `KFTM_COURSES` (
  `ID` int(11) NOT NULL,
  `courseType` varchar(50) NOT NULL,
  `courseHours` varchar(50) NOT NULL,
  `courseDay` varchar(50) NOT NULL,
  `Teacher` varchar(50) DEFAULT NULL,
  `Assistant` varchar(50) DEFAULT NULL,
  `ID_KFTM_EVENTS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `KFTM_COURSES`:
--   `ID_KFTM_EVENTS`
--       `KFTM_EVENTS` -> `ID`
--

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_EVENTS`
--
-- Création :  Mer 31 Juillet 2019 à 17:47
--

CREATE TABLE `KFTM_EVENTS` (
  `ID` int(11) NOT NULL,
  `eventType` varchar(50) NOT NULL,
  `eventDate` datetime NOT NULL,
  `eventMaxUser` int(11) DEFAULT NULL,
  `eventDescription` varchar(255) NOT NULL,
  `eventPicture` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `KFTM_EVENTS`:
--

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_ROLE`
--
-- Création :  Mer 31 Juillet 2019 à 17:47
--

CREATE TABLE `KFTM_ROLE` (
  `ID` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `ID_KFTM_USERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `KFTM_ROLE`:
--   `ID_KFTM_USERS`
--       `KFTM_USERS` -> `ID`
--

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_SHOPCART`
--
-- Création :  Mer 31 Juillet 2019 à 17:47
--

CREATE TABLE `KFTM_SHOPCART` (
  `ID` int(11) NOT NULL,
  `id_KFTM_ARTICLES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `KFTM_SHOPCART`:
--   `id_KFTM_ARTICLES`
--       `KFTM_ARTICLES` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_USERS`
--
-- Création :  Lun 26 Août 2019 à 11:21
--

CREATE TABLE `KFTM_USERS` (
  `ID` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNumber` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `userLog` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `studentCourse` varchar(50) DEFAULT NULL,
  `studentYear` varchar(50) DEFAULT NULL,
  `childBelt` varchar(50) DEFAULT NULL,
  `studentBelt` varchar(50) DEFAULT NULL,
  `teacherCourse` varchar(50) DEFAULT NULL,
  `teacherRank` varchar(50) DEFAULT NULL,
  `groupAge` varchar(50) DEFAULT NULL,
  `presentation` text,
  `verification` tinyint(4) DEFAULT NULL,
  `showProfil` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `KFTM_USERS`:
--

--
-- Contenu de la table `KFTM_USERS`
--

INSERT INTO `KFTM_USERS` (`ID`, `lastName`, `firstName`, `birthDate`, `phoneNumber`, `mail`, `picture`, `userLog`, `password`, `status`, `studentCourse`, `studentYear`, `childBelt`, `studentBelt`, `teacherCourse`, `teacherRank`, `groupAge`, `presentation`, `verification`, `showProfil`) VALUES
(1, 'Levray', 'Jean-Marie', NULL, '06.22.16.71.80', 'levray.jm@wanadoo.fr', '19064836233e6cb0ae63f15.jpg', 'sifu76', '$2y$10$zL3yFlUMVutP8oNzRnzileclOwFgeXybsYqtI0cQ3hgC..xKi6LKa', 'Grand Maître', NULL, 'Vétéran', NULL, NULL, NULL, 'Sifu', NULL, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  \r\n                ', NULL, 1),
(130, 'Levray', 'Benjamin', NULL, NULL, 'benjamin.levray@gmail.com', NULL, 'benjamin', '$2y$10$Y/.JIPRif6Nk8ZOnszGn0eJZF8vuo4YUxwhIPc.5Gffy9DWYMEmfm', 'maître', NULL, NULL, NULL, 'Ceinture noire', 'Kung-Fu', 'Jiaoshe', NULL, '\r\n                ', NULL, 1),
(131, 'Leroux', 'François', NULL, NULL, 'francois.leroux@gmail.com', NULL, 'françois', '$2y$10$EnqFo1PbxrddL33kFZn7XO4qcIo3MgVYL0nyWVJL0vzd1Z5HHG4t2', 'maître', NULL, NULL, NULL, 'Ceinture noire', 'Kung-Fu', 'Sibak', NULL, '\r\n                ', NULL, 1),
(132, 'Krevette', 'krevette', '2019-08-07', '', 'krevette.krevette@gmail.com', 'Scan0006.jpg', 'krevette', '$2y$10$0IyO3pn5SkgEcYpTiAQ.ZuPmAegCXf7ZPTmRd2srbDn2T21Tp.YWW', 'élève', 'Kung-Fu', '1ère année', NULL, 'Ceinture jaune', NULL, NULL, 'Adultes', '                                                                                                   Bonjour !\r\n                ', NULL, 1),
(149, 'biDois', 'laurA', NULL, NULL, 'zev.ojef@gmail.com', NULL, 'pazu', '$2y$10$Ht96ACzt4st.0UrBxGj//OObXxL74uPuXoaRpUCWVpXhon9yznswq', 'élève', 'Taïchi Chuan & Qi Gong', NULL, NULL, NULL, NULL, NULL, NULL, '\r\n                ', NULL, 1),
(150, 'Hamard', 'Jean', NULL, NULL, 'jean.hamard@gmail.com', '10014403.jpg', 'jean', '$2y$10$v3.Uq/B.Lc8jCIlSciiCp.V.4sVXctlWk1/MgcRPoWYnRHIoYYqL.', 'maître', NULL, NULL, NULL, 'Ceinture noire', 'Sanda & Shoubo', 'Tailaoshe', NULL, '\r\n                ', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Participating`
--
-- Création :  Mer 31 Juillet 2019 à 17:47
--

CREATE TABLE `Participating` (
  `ID` int(11) NOT NULL,
  `ID_KFTM_USERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `Participating`:
--   `ID`
--       `KFTM_EVENTS` -> `ID`
--   `ID_KFTM_USERS`
--       `KFTM_USERS` -> `ID`
--

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`ID`,`ID_KFTM_USERS`),
  ADD KEY `Booking_KFTM_USERS0_FK` (`ID_KFTM_USERS`);

--
-- Index pour la table `Checking`
--
ALTER TABLE `Checking`
  ADD PRIMARY KEY (`ID`,`ID_KFTM_USERS`),
  ADD KEY `Checking_KFTM_USERS0_FK` (`ID_KFTM_USERS`);

--
-- Index pour la table `KFTM_ARTICLES`
--
ALTER TABLE `KFTM_ARTICLES`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `KFTM_COURSES`
--
ALTER TABLE `KFTM_COURSES`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KFTM_COURSES_KFTM_EVENTS_FK` (`ID_KFTM_EVENTS`);

--
-- Index pour la table `KFTM_EVENTS`
--
ALTER TABLE `KFTM_EVENTS`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `KFTM_ROLE`
--
ALTER TABLE `KFTM_ROLE`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KFTM_ROLE_KFTM_USERS_FK` (`ID_KFTM_USERS`);

--
-- Index pour la table `KFTM_SHOPCART`
--
ALTER TABLE `KFTM_SHOPCART`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KFTM_SHOPCART_KFTM_ARTICLES_FK` (`id_KFTM_ARTICLES`);

--
-- Index pour la table `KFTM_USERS`
--
ALTER TABLE `KFTM_USERS`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Participating`
--
ALTER TABLE `Participating`
  ADD PRIMARY KEY (`ID`,`ID_KFTM_USERS`),
  ADD KEY `Participating_KFTM_USERS0_FK` (`ID_KFTM_USERS`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `KFTM_ARTICLES`
--
ALTER TABLE `KFTM_ARTICLES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `KFTM_COURSES`
--
ALTER TABLE `KFTM_COURSES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `KFTM_EVENTS`
--
ALTER TABLE `KFTM_EVENTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `KFTM_ROLE`
--
ALTER TABLE `KFTM_ROLE`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `KFTM_SHOPCART`
--
ALTER TABLE `KFTM_SHOPCART`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `KFTM_USERS`
--
ALTER TABLE `KFTM_USERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `Booking_KFTM_SHOPCART_FK` FOREIGN KEY (`ID`) REFERENCES `KFTM_SHOPCART` (`ID`),
  ADD CONSTRAINT `Booking_KFTM_USERS0_FK` FOREIGN KEY (`ID_KFTM_USERS`) REFERENCES `KFTM_USERS` (`ID`);

--
-- Contraintes pour la table `Checking`
--
ALTER TABLE `Checking`
  ADD CONSTRAINT `Checking_KFTM_COURSES_FK` FOREIGN KEY (`ID`) REFERENCES `KFTM_COURSES` (`ID`),
  ADD CONSTRAINT `Checking_KFTM_USERS0_FK` FOREIGN KEY (`ID_KFTM_USERS`) REFERENCES `KFTM_USERS` (`ID`);

--
-- Contraintes pour la table `KFTM_COURSES`
--
ALTER TABLE `KFTM_COURSES`
  ADD CONSTRAINT `KFTM_COURSES_KFTM_EVENTS_FK` FOREIGN KEY (`ID_KFTM_EVENTS`) REFERENCES `KFTM_EVENTS` (`ID`);

--
-- Contraintes pour la table `KFTM_ROLE`
--
ALTER TABLE `KFTM_ROLE`
  ADD CONSTRAINT `KFTM_ROLE_KFTM_USERS_FK` FOREIGN KEY (`ID_KFTM_USERS`) REFERENCES `KFTM_USERS` (`ID`);

--
-- Contraintes pour la table `KFTM_SHOPCART`
--
ALTER TABLE `KFTM_SHOPCART`
  ADD CONSTRAINT `KFTM_SHOPCART_KFTM_ARTICLES_FK` FOREIGN KEY (`id_KFTM_ARTICLES`) REFERENCES `KFTM_ARTICLES` (`id`);

--
-- Contraintes pour la table `Participating`
--
ALTER TABLE `Participating`
  ADD CONSTRAINT `Participating_KFTM_EVENTS_FK` FOREIGN KEY (`ID`) REFERENCES `KFTM_EVENTS` (`ID`),
  ADD CONSTRAINT `Participating_KFTM_USERS0_FK` FOREIGN KEY (`ID_KFTM_USERS`) REFERENCES `KFTM_USERS` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
