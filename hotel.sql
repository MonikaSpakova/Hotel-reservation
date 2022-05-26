-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1:3306
-- Čas generovania: Út 04.Jan 2022, 12:44
-- Verzia serveru: 5.7.31
-- Verzia PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `hotel`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `host`
--

DROP TABLE IF EXISTS `host`;
CREATE TABLE IF NOT EXISTS `host` (
  `id_hosta` smallint(50) NOT NULL AUTO_INCREMENT,
  `Meno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Priezvisko` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ulica` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cislo_domu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mesto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PSC` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefon` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_hosta`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `host`
--

INSERT INTO `host` (`id_hosta`, `Meno`, `Priezvisko`, `Email`, `Ulica`, `Cislo_domu`, `Mesto`, `PSC`, `Telefon`) VALUES
(1, 'Derek', 'Hughes', 'hudges20@gmail.com', 'Weissnat ', '793', 'Lake Veda', '01146', NULL),
(2, 'Simone', 'Blaese', 'blease60@mueller.com', 'Myles Freeway', '324', 'West Jacky', '98405', NULL),
(3, 'Lily', 'Berry', 'scotty35@wyman.com', 'Rodriguez Parks', '303', 'Port Rhettmouth', '42028', NULL),
(4, 'Giulia', 'Garcia', 'collin84@gmail.com', 'Legros Green', '968', 'Daphneeville', '90857', NULL),
(5, 'Neil ', 'Simonis', 'xking@gmail.com', 'Jacobs Wall', '397', 'Mattview', '82100', NULL),
(6, 'Jacob', 'Chauncey', 'barrows.arely@yahoo.com', 'Kiana Union', '790', 'Donnellyfurt', '23033', NULL),
(7, 'Jemima', 'Ramirez', 'ward.rosalee@hotmail.com', 'Ward Shore', '8693', 'Port Lauretta', '94442', NULL),
(8, 'William', 'Porter', 'fward@gmail.com', 'Miles Bridge', '1523', 'Harberside', '47564', NULL),
(9, 'Isabella', 'Mendoza', 'monicenka3@gmail.com', 'Corwin Springs', ' Apt. 377', 'West Horace', '81476', NULL),
(10, 'Eva', 'Wood', 'grady.grady@yahoo.com', 'Luettgen Oval', '89318', 'East Twilamouth', '25569', NULL),
(11, 'Genesis', 'Wallace', 'greyson31@yahoo.com', 'Shayne View', '3350', 'New Enricoburgh', '46741', NULL),
(12, 'Brianna', 'Griffin', 'ryan.baylee@hotmail.com', 'Kellie Garden', '9227', 'Lake Jared', '54579', NULL),
(13, 'Judith', 'Crawford', 'darrell55@hartmann.com', 'Roel Road', '26229', 'North Leoramouth', '37944', NULL),
(14, 'Shawna', 'Lama', 'rwaters@kreiger.com', 'Makenna Ville', '37673', 'Joshuahchester', '21087', NULL),
(15, 'Anuja', 'Ellis', 'ublanda@yahoo.com', 'Howe Island', '862', 'New Sandrineside', '65754', NULL),
(38, 'Bozenarrrrrrrr', 'Špaková', 'martinaspakinka951@gmail.com', 'Lúčna', '22', '77', '77', NULL),
(39, 'Bozenarrrrrrrr', 'Špaková', 'martinaspakinka951@gmail.com', 'Lúčna', '22', '77', '77', NULL),
(40, 'Bozenarrrrrrrr', 'Špaková', 'martinaspakinka951@gmail.com', 'Lúčna', '22', '77', '77', NULL),
(41, 'Bozenarrrrrrrr', 'Špaková', 'martinaspakinka951@gmail.com', 'Lúčna', '22', '77', '77', NULL),
(42, 'Bozenarrrrrrrr', 'Špaková', 'martinaspakinka951@gmail.com', 'Lúčna', '22', '77', '77', NULL),
(43, 'Monika', 'popopo', 'monicenka3@gmail.com', 'ppp', '777', '44', '97205', NULL),
(44, 'Monika', 'popopo', 'monicenka3@gmail.com', 'ppp', '777', '44', '97205', NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `izby`
--

DROP TABLE IF EXISTS `izby`;
CREATE TABLE IF NOT EXISTS `izby` (
  `id_izby` smallint(5) NOT NULL AUTO_INCREMENT,
  `Cislo_izby` smallint(5) NOT NULL,
  `Poschodie` tinyint(2) NOT NULL,
  `Pocet_posteli` tinyint(2) NOT NULL,
  `Cena_izby` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_izby`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `izby`
--

INSERT INTO `izby` (`id_izby`, `Cislo_izby`, `Poschodie`, `Pocet_posteli`, `Cena_izby`) VALUES
(1, 100, 1, 1, '45.00'),
(2, 101, 1, 1, '45.00'),
(3, 102, 1, 2, '60.00'),
(4, 103, 1, 2, '60.00'),
(5, 104, 1, 2, '60.00'),
(6, 105, 1, 2, '60.00'),
(7, 106, 1, 2, '60.00'),
(8, 107, 1, 2, '60.00'),
(9, 108, 1, 2, '60.00'),
(10, 109, 1, 4, '100.00'),
(11, 110, 1, 4, '100.00'),
(12, 200, 2, 1, '45.00'),
(13, 201, 2, 1, '45.00'),
(14, 202, 2, 2, '60.00'),
(15, 203, 2, 2, '60.00'),
(16, 204, 2, 2, '60.00'),
(17, 205, 2, 2, '60.00'),
(18, 206, 2, 2, '60.00'),
(19, 207, 2, 2, '60.00'),
(20, 208, 2, 2, '60.00'),
(21, 209, 2, 4, '100.00'),
(22, 210, 2, 4, '100.00'),
(23, 300, 3, 1, '45.00'),
(24, 301, 3, 1, '45.00'),
(25, 302, 3, 2, '60.00'),
(26, 303, 3, 2, '60.00'),
(27, 304, 3, 2, '60.00'),
(28, 305, 3, 2, '60.00'),
(29, 306, 3, 2, '60.00'),
(30, 307, 3, 2, '60.00'),
(31, 308, 3, 2, '60.00'),
(32, 309, 3, 4, '100.00'),
(33, 310, 3, 4, '100.00'),
(41, 400, 4, 1, '45.00'),
(42, 401, 4, 1, '45.00');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `rezervacia`
--

DROP TABLE IF EXISTS `rezervacia`;
CREATE TABLE IF NOT EXISTS `rezervacia` (
  `id_rezervacie` int(11) NOT NULL AUTO_INCREMENT,
  `id_izby` smallint(5) NOT NULL,
  `id_hosta` smallint(50) NOT NULL,
  `Pocet_osob` tinyint(3) NOT NULL,
  `Prichod` date NOT NULL,
  `Odchod` date NOT NULL,
  `Cas_rezervacie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rezervacie`),
  KEY `id_hosta` (`id_hosta`),
  KEY `id_izby` (`id_izby`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `rezervacia`
--

INSERT INTO `rezervacia` (`id_rezervacie`, `id_izby`, `id_hosta`, `Pocet_osob`, `Prichod`, `Odchod`, `Cas_rezervacie`) VALUES
(1, 10, 10, 2, '2022-01-16', '2022-01-18', '2022-01-03 22:41:43');

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `rezervacia`
--
ALTER TABLE `rezervacia`
  ADD CONSTRAINT `rezervacia_ibfk_1` FOREIGN KEY (`id_hosta`) REFERENCES `host` (`id_hosta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacia_ibfk_2` FOREIGN KEY (`id_izby`) REFERENCES `izby` (`id_izby`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
