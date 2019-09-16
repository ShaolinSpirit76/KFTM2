-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 13 Septembre 2019 à 16:18
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

CREATE TABLE `Booking` (
  `ID` int(11) NOT NULL,
  `ID_KFTM_USERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Checking`
--

CREATE TABLE `Checking` (
  `ID` int(11) NOT NULL,
  `ID_KFTM_USERS` int(11) NOT NULL,
  `ID_KFTM_COURSES` int(11) NOT NULL,
  `CHECKED` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_ARTICLES`
--

CREATE TABLE `KFTM_ARTICLES` (
  `id` int(11) NOT NULL,
  `articleName` varchar(50) NOT NULL,
  `articlePicture` blob,
  `articleQuantity` int(11) DEFAULT NULL,
  `articleDescription` varchar(255) DEFAULT NULL,
  `articlePrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_COURSES`
--

CREATE TABLE `KFTM_COURSES` (
  `ID` int(11) NOT NULL,
  `courseType` varchar(50) NOT NULL,
  `courseHours` varchar(50) NOT NULL,
  `courseDay` varchar(50) NOT NULL,
  `courseStart` date DEFAULT NULL,
  `courseEnd` date DEFAULT NULL,
  `courseHolidayStart` date DEFAULT NULL,
  `courseHolidayEnd` date DEFAULT NULL,
  `teachers` varchar(50) DEFAULT NULL,
  `assistants` varchar(50) DEFAULT NULL,
  `ID_KFTM_EVENTS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_EVENTS`
--

CREATE TABLE `KFTM_EVENTS` (
  `ID` int(11) NOT NULL,
  `eventType` varchar(50) NOT NULL,
  `eventCourse` varchar(50) DEFAULT NULL,
  `eventDate` date NOT NULL,
  `eventHour` varchar(50) NOT NULL,
  `eventMaxUser` int(11) DEFAULT NULL,
  `eventDescription` text,
  `eventPicture` varchar(50) DEFAULT NULL,
  `registeredPicture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `KFTM_EVENTS`
--

INSERT INTO `KFTM_EVENTS` (`ID`, `eventType`, `eventCourse`, `eventDate`, `eventHour`, `eventMaxUser`, `eventDescription`, `eventPicture`, `registeredPicture`) VALUES
(82, 'Passage de grade', 'Kung-Fu', '2019-09-18', '12:30', 2, NULL, NULL, 'passagedegrade02.jpg'),
(83, 'Barbecue de fin d\'année', 'Tout le monde', '2019-09-07', '16:30', 10, '                Venez nombreux !', NULL, 'barbecue03.jpg'),
(85, 'Déjeuner', 'Tout le monde', '2019-09-14', '12:00', 9, NULL, NULL, 'barbecue01.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_MESSAGING`
--

CREATE TABLE `KFTM_MESSAGING` (
  `ID` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `mail` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_PARTICIPATING`
--

CREATE TABLE `KFTM_PARTICIPATING` (
  `ID` int(11) NOT NULL,
  `ID_USERS` int(11) NOT NULL,
  `ID_EVENTS` int(11) NOT NULL,
  `CHECKED` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `KFTM_PARTICIPATING`
--

INSERT INTO `KFTM_PARTICIPATING` (`ID`, `ID_USERS`, `ID_EVENTS`, `CHECKED`) VALUES
(7, 153, 83, 1),
(9, 157, 85, 1);

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_SHOPCART`
--

CREATE TABLE `KFTM_SHOPCART` (
  `ID` int(11) NOT NULL,
  `id_KFTM_ARTICLES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `KFTM_USERS`
--

CREATE TABLE `KFTM_USERS` (
  `ID` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
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
  `rankNumber` int(11) NOT NULL,
  `groupAge` varchar(50) DEFAULT NULL,
  `presentation` text,
  `verification` tinyint(4) DEFAULT NULL,
  `showProfil` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `KFTM_USERS`
--

INSERT INTO `KFTM_USERS` (`ID`, `gender`, `lastName`, `firstName`, `birthDate`, `phoneNumber`, `mail`, `picture`, `userLog`, `password`, `status`, `studentCourse`, `studentYear`, `childBelt`, `studentBelt`, `teacherCourse`, `teacherRank`, `rankNumber`, `groupAge`, `presentation`, `verification`, `showProfil`, `admin`) VALUES
(1, 'Homme', 'Levray', 'Jean-Marie', '2019-08-06', '06.22.16.71.80', 'levray.jm@wanadoo.fr', '19064836233e6cb0ae63f15.jpg', 'sifu76', '$2y$10$zL3yFlUMVutP8oNzRnzileclOwFgeXybsYqtI0cQ3hgC..xKi6LKa', 'Grand Maître', NULL, 'Vétéran', NULL, NULL, NULL, 'Sifu', 1, NULL, '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           \r\n                ', NULL, 1, 1),
(131, 'Homme', 'Leroux', 'François', NULL, NULL, 'francois.leroux@gmail.com', NULL, 'françois', '$2y$10$EnqFo1PbxrddL33kFZn7XO4qcIo3MgVYL0nyWVJL0vzd1Z5HHG4t2', 'maître', NULL, NULL, NULL, 'Ceinture noire', 'Kung-Fu', 'Sibak', 6, NULL, '\r\n                ', NULL, 1, 0),
(150, 'Homme', 'Hamard', 'Jean', NULL, NULL, 'jean.hamard@gmail.com', '10014403.jpg', 'lala', '$2y$10$0IyO3pn5SkgEcYpTiAQ.ZuPmAegCXf7ZPTmRd2srbDn2T21Tp.YWW', 'maître', NULL, NULL, NULL, 'Ceinture noire', 'Sanda & Shoubo', 'Tailaoshe', 2, NULL, '\r\n                ', NULL, 1, 1),
(152, 'Femme', 'Levray', 'Catherine', NULL, NULL, 'catherine.levray@gmail.com', '1964858829405710038dfe5.jpg', 'catherine', '$2y$10$Ft3sB8AzoDYDxiu5QSd2sOzqUBaIRvDaMi5hSROwufpG2/MMmBpVu', 'maître', NULL, NULL, NULL, 'Ceinture noire', 'Taïchi Chuan & Qi Gong', 'Simui', 7, NULL, '\r\n                ', NULL, 1, 0),
(153, 'Homme', 'Compère', 'Paul', '1991-03-12', '0675879432', 'paul.compere76@gmail.com', 'Scan0006.jpg', 'paul76', '$2y$10$aWvy/ZSqeO8JvsTew9LV/ODQzbs070xCDUvj7wCiINd8CIsn/zKm6', 'élève', 'Kung-Fu', '2ème année', NULL, 'Ceinture blanche 1ère barrette', NULL, NULL, 9, 'Adultes', ' N\'avoir aucune limite pour limite.        ', NULL, 1, 0),
(155, 'Femme', 'Bidois', 'Laura', NULL, NULL, 'laura.bidois@gmail.com', NULL, 'laura.bidois@gmail.com', '$2y$10$YaJ7EZB6MGFf8z8THNyyIuunv4.9e2FkxOcbk1NwsUZkTM18DRXhG', 'élève', NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 1, 0),
(157, 'Homme', 'Mounivongs', 'Anousone', '1979-05-23', NULL, 'anousone@mounivongs.com', NULL, 'anou', '$2y$10$F3blHhQOg.grdWQkLdb9bOwXRYW2JEPwD5UE5212Apprlzxzc.qV6', 'élève', NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 1, 0);

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
-- Index pour la table `KFTM_PARTICIPATING`
--
ALTER TABLE `KFTM_PARTICIPATING`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_USERS` (`ID_USERS`),
  ADD KEY `ID_EVENTS` (`ID_EVENTS`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT pour la table `KFTM_PARTICIPATING`
--
ALTER TABLE `KFTM_PARTICIPATING`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `KFTM_SHOPCART`
--
ALTER TABLE `KFTM_SHOPCART`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `KFTM_USERS`
--
ALTER TABLE `KFTM_USERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
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
-- Contraintes pour la table `KFTM_PARTICIPATING`
--
ALTER TABLE `KFTM_PARTICIPATING`
  ADD CONSTRAINT `KFTM_PARTICIPATING_ibfk_1` FOREIGN KEY (`ID_USERS`) REFERENCES `KFTM_USERS` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `KFTM_PARTICIPATING_ibfk_2` FOREIGN KEY (`ID_EVENTS`) REFERENCES `KFTM_EVENTS` (`ID`);

--
-- Contraintes pour la table `KFTM_SHOPCART`
--
ALTER TABLE `KFTM_SHOPCART`
  ADD CONSTRAINT `KFTM_SHOPCART_KFTM_ARTICLES_FK` FOREIGN KEY (`id_KFTM_ARTICLES`) REFERENCES `KFTM_ARTICLES` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
