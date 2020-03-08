-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 08:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royaltours`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `idActivite` int(11) NOT NULL,
  `nomActivite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lieuActivite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `heurDebut` time NOT NULL,
  `heurFin` time NOT NULL,
  `sitewebActivite` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptionActivite` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`idActivite`, `nomActivite`, `lieuActivite`, `heurDebut`, `heurFin`, `sitewebActivite`, `descriptionActivite`) VALUES
(1, 'Hudson Yards', 'Hudson', '14:00:00', '18:00:00', 'https://www.crowneplazahy36.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(2, 'Museum of Natural History', 'Hudson', '14:00:00', '18:00:00', 'https://www.crowneplazahy36.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(3, 'Museum of Natural History', 'Hudson', '14:00:00', '18:00:00', 'https://www.crowneplazahy36.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(4, 'Glisade', 'Montreal', '14:00:00', '18:00:00', 'https://www.voilesenvoiles.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(5, 'Tour helicoptere ', 'Hawaii', '14:00:00', '18:00:00', 'https://meritagecollection.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(6, 'Tour helicoptere ', 'Hawaii', '14:00:00', '18:00:00', 'https://meritagecollection.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(7, 'Plage', 'Hawaii', '14:00:00', '18:00:00', 'https://meritagecollection.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(8, 'Plage', 'Hawaii', '14:00:00', '18:00:00', 'https://meritagecollection.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(9, 'quaerat adii terditom', 'uon orditom', '21:15:00', '22:10:00', 'aiscterditomderico.ma', 'dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam qua'),
(10, 'jdfterditom', 'om', '21:15:00', '22:10:00', 'aiscterditomderico.ma', 'dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam qua'),
(11, 'accusantium ', '365 accusantium ', '09:10:00', '10:30:00', 'www.accusantium.com', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore verita'),
(12, 'accusantium ', '365 accusantium ', '11:10:00', '12:30:00', 'www.accusantium.com', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore verita'),
(13, 'accusantium ', '365 accusantium ', '14:10:00', '16:30:00', 'www.accusantium.com', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore verita'),
(14, 'Thai et Fish SPA', 'RDC Imm. Brise du Lac 1ØŒ Rue du Lac Huron, Tunis,', '00:00:15', '00:00:17', 'http://thaifishspa.com', 'tel : (+216) 71 655 073\r\nemail : thaifishspa@gmail.com\r\n'),
(15, 'Souks et Medina', 'La vielle Medina', '00:00:18', '00:00:20', '', 'Visite a pieds de deux heures dans la mÃ©dina et ses souks\r\n'),
(16, 'Excursion', 'Chefchaouen', '00:00:10', '00:00:20', '', 'Visite des sites historiques de la ville\r\n'),
(17, 'Basilique Notre Dame-de-la-garde', '', '00:00:13', '00:00:18', '', 'Visiter le vieux port, les calanques, la Basilique Notre Dame-de-la-garde'),
(18, 'Culture', '', '00:00:13', '00:00:18', '', 'Visiter le vieux port, les calanques, la Basilique Notre Dame-de-la-garde'),
(19, 'Histoire et civilisations', '', '00:00:11', '00:00:14', '', 'Visiter le chÃ¢teau dâ€™if et  le musÃ©e des civilisations de lâ€™Europe et de la MÃ©diterranÃ©e (Mucem)'),
(20, 'Les incontournables de Venise', '', '00:00:10', '00:00:14', '', 'Visite de Venise d\'une journÃ©e avec la basilique San Marco et le palais des Doges ainsi qu\'une balade en gondole'),
(21, 'L\'opera Venise', '', '00:00:18', '00:00:21', '', 'ReprÃ©sentation de l\'OpÃ©ra nomade au Musica a Palazzo Ã  Venise.'),
(22, 'Yacht', '', '00:00:13', '00:00:18', '', 'Balade en yacht.'),
(23, 'Degustation', '', '00:00:13', '00:00:18', '', 'Demi-journÃ©e de dÃ©gustation de dates de Tunis Ã  Mornag');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(50) NOT NULL,
  `nomAdmin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenomAdmin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `numAdmin` int(50) NOT NULL,
  `motPasseAdmin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idDepartement` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `circuit`
--

CREATE TABLE `circuit` (
  `idCircuit` int(50) NOT NULL,
  `idAdmin` int(50) NOT NULL,
  `nomCircuit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateDebutCircuit` date NOT NULL,
  `duree` int(25) NOT NULL,
  `prixCircuit` double NOT NULL,
  `quantiteCircuit` int(25) NOT NULL,
  `imgPrincipale` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tauxPromo` float DEFAULT NULL,
  `publier` float DEFAULT NULL,
  `iframe` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `circuit`
--

INSERT INTO `circuit` (`idCircuit`, `idAdmin`, `nomCircuit`, `dateDebutCircuit`, `duree`, `prixCircuit`, `quantiteCircuit`, `imgPrincipale`, `tauxPromo`, `publier`, `iframe`) VALUES
(2, 0, 'Amerique du nord', '2020-02-20', 15, 15000, 15, 'hawai123.jpg', 20, 1, NULL),
(3, 0, 'Europe', '2020-01-10', 15, 20000, 20, 'europe123.jpg', 15, 1, NULL),
(4, 0, 'Afrique', '2020-03-14', 15, 20000, 20, 'pondswitzerland123.jpg', 10, 1, NULL),
(5, 0, 'ThaÃƒÂ¯lande', '2020-03-14', 15, 20000, 20, 'europe123.jpg', NULL, 1, NULL),
(6, 0, 'SAHARA', '2020-03-14', 15, 20000, 20, 'fridaynspiration270.jpg', NULL, 1, NULL),
(7, 0, 'Plage', '2020-03-12', 10, 10000, 20, 'hawai123.jpg', NULL, 1, NULL),
(10, 10, 'Montagnes', '2020-12-30', 123, 1099, 300, 'palmier0346.jpg', NULL, 1, NULL),
(15, 0, 'Mediterranee', '2020-04-08', 17, 15000, 50, 'chaouen3.jpg', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` int(50) NOT NULL,
  `idInscrit` int(50) NOT NULL,
  `commentaire` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE `continent` (
  `idContinent` int(11) NOT NULL,
  `nomContinent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `numTransaction` int(50) NOT NULL,
  `idPaiement` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `idDepartement` int(50) NOT NULL,
  `nomDepartement` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`idDepartement`, `nomDepartement`) VALUES
(1, 'Ventes'),
(2, 'Marketing'),
(3, 'Finances'),
(4, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `idEmploye` int(50) NOT NULL,
  `nomEmploye` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenomEmploye` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `numEmploye` int(50) NOT NULL,
  `motPasseEmploye` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ddn` date NOT NULL,
  `sexe` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idDepartement` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`idEmploye`, `nomEmploye`, `prenomEmploye`, `numEmploye`, `motPasseEmploye`, `ddn`, `sexe`, `idDepartement`) VALUES
(3, 'Admin', 'Ad', 1234, '1234', '1919-12-12', 'Homme', 4),
(4, '3', 'Afrique', 2020, '60', '0000-00-00', '60', 0),
(5, '3', 'Afrique', 2020, '60', '0000-00-00', '60', 0),
(6, '3', 'Afrique', 2020, '60', '0000-00-00', '60', 0),
(7, '3', 'Afrique', 2020, '60', '0000-00-00', '60', 0),
(8, 'o', 'o', 202, '$2y$10$LmZ3aXvjnK9QbP5algvIw.kcE2.RfW8jptVTQ7/Er4Okj7N4hSK1e', '2019-12-17', 'Homme', 4),
(9, 'o', 'o', 2525, '$2y$10$CWxXp4c2uHlo.lHelrdSTuRK8mPjbVQXxsdYkW2ez5D8ri0zI.qDW', '2019-12-17', 'Homme', 1),
(10, 'g', 'g', 2520, '$2y$10$mgQLvahFlCitdhA7/9vxZeeZmVoSuTXxfAHQOej5LaN1Yo5.PbgM6', '2019-12-17', 'Homme', 4);

-- --------------------------------------------------------

--
-- Table structure for table `etape`
--

CREATE TABLE `etape` (
  `idEtape` int(11) NOT NULL,
  `idCircuit` int(11) NOT NULL,
  `nomEtape` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateEtape` date NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `imgPrincipale` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `etape`
--

INSERT INTO `etape` (`idEtape`, `idCircuit`, `nomEtape`, `dateEtape`, `description`, `imgPrincipale`) VALUES
(1, 2, 'Canada', '2020-02-20', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"', 'canada.jpg'),
(2, 2, 'Canada', '2020-02-20', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"', 'canada.jpg'),
(4, 2, 'USA', '2020-02-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'usa123.jpg'),
(5, 2, 'USA_Hawaii', '2020-03-02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'hawai123.jpg'),
(6, 3, 'France', '2020-03-02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'chute90611.jpg'),
(7, 3, 'Italie', '2020-03-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'europe123.jpg'),
(8, 3, 'Espagne', '2020-03-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'patagoniachilie123.jpg'),
(9, 4, 'Maroc', '2020-03-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'kyotojapan123.jpg'),
(10, 4, 'Egypte', '2020-03-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'tianzimountainschina.jpg'),
(11, 4, 'Afrique du sud', '2020-03-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.', 'fridaynspiration270.jpg'),
(12, 10, 'test', '2020-12-21', 'askdjlfhaksjdhfk', 'fridayinspiration27099.jpg'),
(13, 10, 'test2', '2020-02-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q', 'iceland9.jpg'),
(14, 15, 'Tunis', '2020-04-09', 'Vol avec TunisAir (TU203)\r\nDuree du vol: 8h15mn\r\nDepart: 15:15 De YUL\r\nArrivee: 17:30 A Carthage', 'tunis1.jpg'),
(15, 15, 'Tanger, Maroc', '2020-04-12', 'Details du vol:\r\nDepart: Tunis (TUN): 11:40\r\nArrivee: Tanger (TNG): 17:55\r\nRoyal Air Maroc AT571\r\nDuration: 6h 15min\r\n', 'tanger3.jpg'),
(16, 15, 'Marseille, France', '2020-04-15', 'Vol\r\n19:45 TNG\r\nBoukhalef Souahel, Tanger (Maroc)\r\n22:50 MRS\r\nMarseille-Provence, Marseille (France)\r\n', 'calanque1.jpg'),
(17, 15, 'Venise, Italie', '2020-04-17', 'Vol 1211        \r\nDuree: 1h 25m\r\nDepart: 2:45pm Marseille (MRS)\r\nArrivee: 4:10pm Venice (VCE)\r\n', 'venise4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `idGuide` int(11) NOT NULL,
  `idDepartement` int(11) NOT NULL,
  `nomGuide` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenomGuide` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `numGuide` int(50) NOT NULL,
  `langue` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guidecircuit`
--

CREATE TABLE `guidecircuit` (
  `idCircuit` int(50) NOT NULL,
  `idGuide` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hebergement`
--

CREATE TABLE `hebergement` (
  `idHebergement` int(11) NOT NULL,
  `typeHebergement` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nomHebergement` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lieuHebergement` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `siteWebHebergement` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptionHebergement` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hebergement`
--

INSERT INTO `hebergement` (`idHebergement`, `typeHebergement`, `nomHebergement`, `lieuHebergement`, `siteWebHebergement`, `descriptionHebergement`) VALUES
(1, 'Hotel', 'Hilton', 'New york', 'https://www.newyorkhiltonmidtown.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(2, 'Hotel', 'Hilton', 'New york', 'https://www.newyorkhiltonmidtown.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(3, 'Hotel', 'Hilton', 'New york', 'https://www.newyorkhiltonmidtown.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(4, 'Hotel', 'Hilton', 'New york', 'https://www.newyorkhiltonmidtown.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(5, 'Hotel', 'Koa Kea', 'Hawaii', 'https://meritagecollection.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(6, 'Hotel', 'Koa Kea', 'Hawaii', 'https://meritagecollection.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(7, 'Hotel', 'Koa Kea', 'Hawaii', 'https://meritagecollection.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.'),
(8, 'Hotel', 'numnos term', 'nosquia terdito', ' terditom.com', 'dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam qua'),
(9, 'Hotel', ' term', 'nosqrdito', ' terditom.com', 'dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam qua'),
(10, 'Hotel', 'incididunt ', '25 dolore st', 'www.dolore.com', 'sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et'),
(11, 'Villa', 'incididunt ', '25 dolore st', 'www.dolore.com', 'sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et'),
(12, 'Hotel', 'Palais Bayram', '6, Rue des Andalous, Bab ', 'https://palaisbayram.com', '5 Ã©toiles '),
(13, 'Hotel', 'Dar eljeld Hotel et spa', '10 Rue Dar El Jeld, Tunis', 'https://www.dareljeld.com/en', '5 Ã©toiles \r\nTel: (+216) 70 01 61 90'),
(14, 'Hotel', 'Dar eljeld Hotel et spa', '10 Rue Dar El Jeld, Tunis', 'https://www.dareljeld.com/en', '5 Ã©toiles \r\nTel: (+216) 70 01 61 90\r\nEmail : Contact@dareljeld.com'),
(15, 'Hotel', 'Palais Bayram ', '6, Rue des Andalous, Bab ', 'https://palaisbayram.com', '5 Ã©toiles \r\nTel: (+216) 31 393 393 \r\nEmail : reservation@palaisbayram.com'),
(16, 'Hotel', 'Palais Bayram ', '6, Rue des Andalous, Bab ', 'https://palaisbayram.com', '5 Ã©toiles \r\nTel: (+216) 31 393 393 \r\nEmail : reservation@palaisbayram.com'),
(17, 'Hotel', 'Palais Bayram ', '6, Rue des Andalous, Bab ', 'https://palaisbayram.com', '5 Ã©toiles \r\nTel: (+216) 31 393 393 \r\nEmail : reservation@palaisbayram.com'),
(18, 'Hotel', 'Hotel Marina bay ', '152 Avenue Mohamed VI, 90', 'https://www.hotelsatlas.com/fr', '5 Ã©toiles \r\nTel: (+212) 5393-49300\r\nEmail : Contact@marinabay.com'),
(19, 'Hotel', 'Hilton Tanger City Center', 'Tanger City Center Place ', 'https://www3.hilton.com', '5 Ã©toiles \r\nTel: (+212) 5393-49300\r\nEmail : Contact@marinabay.com'),
(20, 'Hotel', 'InterContinental Marseill', '1 Place Daviel, 13002 Mar', 'https://www.ihg.com/intercontinental/hotels/us/en/marseille', '5 Ã©toiles \r\nTel: (+33) 4 13 42 42 42'),
(21, 'Hotel', 'InterContinental Marseill', '1 Place Daviel, 13002 Mar', 'https://www.ihg.com', 'Tel: (+33) 4 13 42 42 42'),
(22, 'Hotel', 'Hotel C2', '48 rue Roux de Brignoles ', 'https://www.c2-hotel.com/', '5 Ã©toiles \r\nTel: (+33) 4 95 05 13 13'),
(23, 'Hotel', 'Baglioni Hotel Luna     ', 'San Marco 1243, San Marco', 'https://www.baglionihotels.com/branches/baglioni-hotel-luna-venice/', '5 Ã©toiles \r\nTel: (+39) 041 852 0051'),
(24, 'Hotel', 'Hotel Danieli  ', 'Riva degli Schiavoni 4196', 'https://www.marriott.com/hotels/travel/vcelc-hotel-danieli-a-luxury-collect', '5 Ã©toiles \r\nTel: (+39) 041 522 6480'),
(25, 'Hotel', 'Hotel Danieli  ', 'Riva degli Schiavoni 4196', 'https://www.marriott.com/hotels/travel/vcelc-hotel-danieli-a-luxury-collect', '5 Ã©toiles \r\nTel: (+39) 041 522 6480');

-- --------------------------------------------------------

--
-- Table structure for table `historiqueachat`
--

CREATE TABLE `historiqueachat` (
  `idHistorique` int(50) NOT NULL,
  `idLigneCircuit` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imagecircuit`
--

CREATE TABLE `imagecircuit` (
  `idImage` int(50) NOT NULL,
  `lienImage` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imagecircuit`
--

INSERT INTO `imagecircuit` (`idImage`, `lienImage`) VALUES
(1, 'coucher61616.jpg'),
(2, 'fridaynspiration270.jpg'),
(3, 'niagara123.jfif'),
(4, 'thailand123.jfif'),
(5, 'sahara123.jfif'),
(6, 'pondswitzerland123.jpg'),
(7, 'palmier0346.jpg'),
(8, 'hawai123.jpg'),
(9, 'afrique123.jfif'),
(10, 'canada.jpg'),
(11, 'europe123.jpg'),
(12, '1581040572000chaouen3.jpg'),
(13, '1581040572000chaouen3.jpg'),
(14, '1581040572000chaouen3.jpg'),
(15, '1581040572000chaouen3.jpg'),
(16, 'chaouen3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imageetape`
--

CREATE TABLE `imageetape` (
  `idImage` int(11) NOT NULL,
  `lienImage` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imageetape`
--

INSERT INTO `imageetape` (`idImage`, `lienImage`) VALUES
(1, '1576824229033canada.jpg'),
(2, '1576823973931canada.jpg'),
(3, '1576816980478usa.jfif'),
(4, '1576824041081usa.jpg'),
(5, '1576816980478usa.jfif'),
(6, '1576824041081usa.jpg'),
(7, '1576816980478usa.jfif'),
(8, '1576817495126hawaii1.jfif'),
(9, '1576837549206france.jfif'),
(10, '1576837495906italy.jfif'),
(11, '1576837443250espagne.jfif'),
(12, '1576837985207marra.jfif'),
(13, '1576838021775cairo.jfif'),
(14, '1576838058618af.sud.webp'),
(15, '1576824229033canada.jpg'),
(16, '154705851061616.jpg'),
(17, '15768339181731547058491630Reykjanes Peninsula, Iceland.jpg'),
(18, '15768387774271576824141461hawaii1.jpg'),
(19, '15767301134891547058473695frozen pond Switzerland.jpg'),
(20, 'tunis1.jpg'),
(21, 'tunis2.jpg'),
(22, 'tunis3.jpg'),
(23, 'tunis4.jpg'),
(24, 'tanger3.jpg'),
(25, 'calanque1.jpg'),
(26, 'venise4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imagejour`
--

CREATE TABLE `imagejour` (
  `idImage` int(11) NOT NULL,
  `lienImage` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imagejour`
--

INSERT INTO `imagejour` (`idImage`, `lienImage`) VALUES
(1, '1576819216948ski.jfif'),
(2, '1576820269998patinage.jpg'),
(3, '1576820269998patinage.jpg'),
(4, '15768227260661576822712794hudson.jfif'),
(5, '1576822336107musuem.jpg'),
(6, '1576817134873torontoNewYork.jpg'),
(7, '1576820461345glisade.jfif'),
(8, '15768236389301576823614458hawai3.jpg'),
(9, '1576817476798hawaii.jfif'),
(10, '15768233198231576817495126hawaii1.jfif'),
(11, '1547058473695frozen pond Switzerland.jpg'),
(12, '1576817514854hawaii2.jfif'),
(13, '1576817514854hawaii2.jfif'),
(14, '15766370740691547058442010nordic-landscape-nature-photography-iceland-21.jpg'),
(15, '15768359492851576817134873torontoNewYork.jpg'),
(16, '15780198375151576817514854hawaii2.jfif'),
(17, '15768301607951547058480677Vanuatu volcano Yasur.jpg'),
(18, 'bayram1.jpg'),
(19, 'bayram2.jpg'),
(20, 'eljeld3.jpg'),
(21, 'mornag1.jpg'),
(22, 'restoastragal2.jpg'),
(23, 'restocloserie1.jpg'),
(24, 'taifish1.jpg'),
(25, 'taifish2.jpg'),
(26, 'bayram3.jpg'),
(27, 'eljeld2.jpg'),
(28, 'restocloserie1.jpg'),
(29, 'restocloserie2.jpg'),
(30, 'tanger2.jpg'),
(31, 'tanger1.jpg'),
(32, 'chaouen1.jpg'),
(33, 'chaouen2.jpg'),
(34, 'chaouen3.jpg'),
(35, 'if1.jpg'),
(36, 'galiniere2.jpg'),
(37, 'if1.jpg'),
(38, 'galiniere2.jpg'),
(39, 'continental1.jpg'),
(40, 'mucem1.jpg'),
(41, 'if2.jpg'),
(42, 'if1.jpg'),
(43, 'continental3.jpg'),
(44, 'galiniere1.jpg'),
(45, 'sanmarco1.jpg'),
(46, 'doges2.jpg'),
(47, 'doges1.jpg'),
(48, 'sanmarco3.jpg'),
(49, 'danieli3.jpg'),
(50, 'venise2.jpg'),
(51, 'pallazo1.jpg'),
(52, 'alcorone3.jpg'),
(53, 'tanger2.jpg'),
(54, 'tanger1.jpg'),
(55, 'hilton2.jpg'),
(56, 'mornag1.jpg'),
(57, 'mornag2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inscrit`
--

CREATE TABLE `inscrit` (
  `idInscrit` int(50) NOT NULL,
  `nomInscrit` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenomInscrit` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `genre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `motPasse` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inscrit`
--

INSERT INTO `inscrit` (`idInscrit`, `nomInscrit`, `prenomInscrit`, `date`, `genre`, `email`, `motPasse`) VALUES
(1, 'Aspernatur', 'Odit', '1975-05-22', 'Homme', 'aspernatur@gg.com', '1234'),
(2, 'Adipisci', 'Velit', '1996-11-11', 'Homme', 'adipisci@ym.com', '1234'),
(3, 'Eaque', 'Ipse', '1970-04-09', 'Homme', 'eaque@gg.com', '1234'),
(4, 'Ullam', 'Esse', '1966-03-21', 'Homme', 'ullam@gg.com', '1234'),
(5, 'Neque', 'Quisqam', '1988-01-12', 'Femme', 'neque@gg.com', '1234'),
(6, 'Veniam', 'Quis', '1985-06-15', 'Femme', 'veniam@tm.com', '1234'),
(7, 'Test', 'Test', '1999-12-22', 'Femme', 'adipi@gg.com', '$2y$10$UcIWSph/FjLSW'),
(11, 'setssd', 'testasdf', '2019-12-11', 'Femme', 'o@o.com', '$2y$10$HamHoZD1gC02M'),
(12, 'setssd', 'testasdf', '2019-12-11', 'Femme', 'j@j.com', '$2y$10$mgU/YMi8l63OM'),
(13, 'setssd', 'testasdf', '2019-12-11', 'Femme', 'p@p.com', '$2y$10$fEtPnEjzSqZDH'),
(14, 'setssd', 'testasdf', '2019-12-11', 'Femme', 'h@h.com', '$2y$10$wvsum2Vja.I.9oPlsPttZ.vfL.bussvmc0ms4nh3OSffm88iXhlAi'),
(18, 'Bigboss Driver', 'Bigboss Driver', '0000-00-00', 'NA', 'ilyas82003@gmail.com', '$2y$10$/s/FuEgyoTs8bBvHr4Y55ON3BZQDlIMAVRm6DR2MOVpJXJe4tWKWa'),
(22, 'Othmane', 'Othmane', '0000-00-00', 'NA', 'o.jebbour@gmail.com', '$2y$10$LTIUpZS57hBHO9IiCoXeKeJaRv5uCrjDbUKSzhILoMCXrmVeXPGSy'),
(23, 'Redouan Moatassim', 'Redouan Moatassim', '0000-00-00', 'NA', 'b.cherki@hotmail.com', '$2y$10$obo1Li.QbT3XXUOiY9FFBOWanOcYIFudIa1FB87F4Q1NHNOSiK0v.');

-- --------------------------------------------------------

--
-- Table structure for table `jour`
--

CREATE TABLE `jour` (
  `idJour` int(11) NOT NULL,
  `idEtape` int(11) NOT NULL,
  `nomJour` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateJour` date NOT NULL,
  `descriptionJour` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `imgPrincipale` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jour`
--

INSERT INTO `jour` (`idJour`, `idEtape`, `nomJour`, `dateJour`, `descriptionJour`, `imgPrincipale`) VALUES
(1, 2, 'Montreal', '2020-02-20', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"', 'volcanolightningiceland2674.jpg'),
(3, 2, 'Montreal', '2020-02-21', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"', 'pamukkaleturkey.jpg'),
(4, 4, 'New York', '2020-02-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.', 'patagoniachilie123.jpg'),
(5, 4, 'New York', '2020-02-26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.', 'iceland9.jpg'),
(6, 4, 'New York', '2020-02-26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.', 'fridayinspiration27099.jpg'),
(7, 2, 'New York', '2020-02-26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.', 'cangchairiceterracesvietnam.jpg'),
(8, 5, 'Hawaii', '2020-03-03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.', 'coucher61616.jpg'),
(9, 5, 'Hawaii', '2020-03-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.', 'cangchairiceterracesvietnam.jpg'),
(10, 5, 'Hawaii', '2020-03-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo.', 'tianzimountainschina.jpg'),
(11, 12, 'modifie', '2019-12-28', 'dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam qua', 'pondswitzerland123.jpg'),
(12, 13, 'dolor sit amet', '2020-02-12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, q', 'hawai123.jpg'),
(13, 14, 'Jour Tunis 1', '2020-04-09', 'Jour de repos', 'bayram1.jpg'),
(14, 14, 'Jour Tunis 2', '2020-04-10', 'Jour relaxation', 'taifish1.jpg'),
(15, 15, 'Jour Tanger 1', '2020-04-12', 'Jour Souk et medina', 'tanger2.jpg'),
(16, 15, 'Jour Chefchaouen', '2020-04-13', 'Journee decouverte. excursion d\'une journee avant de retourne a Tanger.', 'chaouen1.jpg'),
(17, 16, 'Jour Marseille 1', '2020-04-15', 'Journee visite', 'if1.jpg'),
(18, 16, 'Jour Marseille 2', '2020-04-16', 'Journee musees', 'mucem1.jpg'),
(19, 17, 'Jour Venise 1', '2020-04-17', 'Journee promenade', 'sanmarco1.jpg'),
(20, 17, 'Jour Venise 2', '2020-04-18', 'Journee Art', 'danieli3.jpg'),
(21, 15, 'Jour Tanger 3', '2020-04-14', 'Journee Mer', 'tanger2.jpg'),
(22, 14, 'Jour Tunis 3', '2020-04-14', 'Journee degustation', 'mornag1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lieu`
--

CREATE TABLE `lieu` (
  `idLieu` int(50) NOT NULL,
  `idContinent` int(11) NOT NULL,
  `idPays` int(11) NOT NULL,
  `idVille` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lieujour`
--

CREATE TABLE `lieujour` (
  `idJour` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligneactivite`
--

CREATE TABLE `ligneactivite` (
  `idLigneActivite` int(11) NOT NULL,
  `idActivite` int(11) NOT NULL,
  `idJour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ligneactivite`
--

INSERT INTO `ligneactivite` (`idLigneActivite`, `idActivite`, `idJour`) VALUES
(1, 0, 1),
(2, 0, 3),
(3, 0, 11),
(4, 1, 4),
(5, 5, 8),
(6, 9, 11),
(7, 10, 11),
(8, 11, 12),
(9, 11, 12),
(10, 11, 12),
(11, 0, 13),
(12, 14, 14),
(13, 15, 15),
(14, 16, 16),
(15, 17, 17),
(16, 17, 17),
(17, 17, 17),
(18, 17, 18),
(19, 17, 19),
(20, 17, 20),
(21, 17, 21),
(22, 17, 13),
(23, 17, 14),
(24, 17, 22);

-- --------------------------------------------------------

--
-- Table structure for table `lignecircuit`
--

CREATE TABLE `lignecircuit` (
  `idLigneCircuit` int(50) NOT NULL,
  `idCircuit` int(50) NOT NULL,
  `idPanier` int(50) NOT NULL,
  `quantite` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lignehebergement`
--

CREATE TABLE `lignehebergement` (
  `idLigneHebergement` int(11) NOT NULL,
  `idHebergement` int(11) NOT NULL,
  `idJour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lignehebergement`
--

INSERT INTO `lignehebergement` (`idLigneHebergement`, `idHebergement`, `idJour`) VALUES
(1, 0, 1),
(2, 0, 3),
(3, 0, 4),
(4, 0, 11),
(5, 1, 4),
(6, 5, 8),
(7, 8, 11),
(8, 9, 11),
(9, 10, 12),
(10, 10, 12),
(11, 14, 13),
(12, 15, 13),
(13, 16, 14),
(14, 17, 14),
(15, 18, 15),
(16, 19, 16),
(17, 20, 17),
(18, 21, 17),
(19, 0, 17),
(20, 0, 18),
(21, 0, 19),
(22, 0, 20),
(23, 0, 21),
(24, 0, 13),
(25, 0, 14),
(26, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `ligneimagecircuit`
--

CREATE TABLE `ligneimagecircuit` (
  `idLigneImgCircuit` int(11) NOT NULL,
  `idCircuit` int(11) NOT NULL,
  `IdImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ligneimagecircuit`
--

INSERT INTO `ligneimagecircuit` (`idLigneImgCircuit`, `idCircuit`, `IdImage`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 2, 1),
(4, 3, 4),
(5, 4, 5),
(6, 5, 6),
(7, 6, 7),
(8, 7, 8),
(9, 8, 0),
(10, 9, 9),
(11, 10, 11),
(12, 2, 0),
(13, 2, 0),
(14, 11, 0),
(15, 12, 0),
(16, 13, 12),
(17, 14, 12),
(18, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `ligneimageetape`
--

CREATE TABLE `ligneimageetape` (
  `idLigneImgEtape` int(11) NOT NULL,
  `idEtape` int(11) NOT NULL,
  `IdImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ligneimageetape`
--

INSERT INTO `ligneimageetape` (`idLigneImgEtape`, `idEtape`, `IdImage`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 0),
(5, 3, 3),
(6, 3, 4),
(7, 4, 3),
(8, 5, 8),
(9, 6, 9),
(10, 7, 10),
(11, 8, 11),
(12, 9, 12),
(13, 10, 13),
(14, 11, 14),
(15, 12, 16),
(16, 13, 17),
(17, 13, 18),
(18, 13, 19),
(19, 14, 20),
(20, 14, 21),
(21, 14, 22),
(22, 14, 23),
(23, 14, 0),
(24, 15, 24),
(25, 16, 25),
(26, 16, 0),
(27, 17, 26);

-- --------------------------------------------------------

--
-- Table structure for table `ligneimagejour`
--

CREATE TABLE `ligneimagejour` (
  `idLigneImgJour` int(11) NOT NULL,
  `idJour` int(11) NOT NULL,
  `idImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ligneimagejour`
--

INSERT INTO `ligneimagejour` (`idLigneImgJour`, `idJour`, `idImage`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 3, 2),
(4, 4, 4),
(5, 8, 8),
(6, 11, 0),
(7, 11, 11),
(8, 12, 12),
(9, 12, 12),
(10, 12, 14),
(11, 12, 15),
(12, 12, 16),
(13, 12, 17),
(14, 13, 18),
(15, 13, 19),
(16, 13, 20),
(17, 13, 21),
(18, 13, 22),
(19, 13, 23),
(20, 14, 24),
(21, 14, 25),
(22, 14, 26),
(23, 14, 27),
(24, 14, 23),
(25, 14, 29),
(26, 15, 30),
(27, 15, 31),
(28, 16, 32),
(29, 16, 33),
(30, 16, 34),
(31, 17, 35),
(32, 17, 36),
(33, 17, 35),
(34, 17, 36),
(35, 17, 39),
(36, 17, 0),
(37, 18, 40),
(38, 18, 41),
(39, 18, 35),
(40, 18, 43),
(41, 18, 44),
(42, 19, 45),
(43, 19, 46),
(44, 19, 47),
(45, 19, 48),
(46, 20, 49),
(47, 20, 50),
(48, 20, 51),
(49, 20, 52),
(50, 21, 30),
(51, 21, 31),
(52, 21, 55),
(53, 13, 0),
(54, 14, 0),
(55, 22, 21),
(56, 22, 57);

-- --------------------------------------------------------

--
-- Table structure for table `lignerestaurant`
--

CREATE TABLE `lignerestaurant` (
  `idLigneRestaurant` int(11) NOT NULL,
  `idRestaurant` int(11) NOT NULL,
  `idJour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lignerestaurant`
--

INSERT INTO `lignerestaurant` (`idLigneRestaurant`, `idRestaurant`, `idJour`) VALUES
(1, 0, 1),
(2, 0, 11),
(3, 1, 1),
(4, 1, 3),
(5, 1, 4),
(6, 8, 8),
(7, 11, 11),
(8, 12, 12),
(9, 12, 12),
(10, 12, 12),
(11, 15, 13),
(12, 15, 13),
(13, 15, 14),
(14, 18, 14),
(15, 19, 15),
(16, 15, 16),
(17, 20, 17),
(18, 20, 17),
(19, 0, 17),
(20, 22, 18),
(21, 23, 19),
(22, 0, 20),
(23, 19, 21),
(24, 0, 13),
(25, 0, 14),
(26, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `messageinscrit`
--

CREATE TABLE `messageinscrit` (
  `idMessage` int(50) NOT NULL,
  `idInscit` int(50) NOT NULL,
  `message` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messagenoninscrit`
--

CREATE TABLE `messagenoninscrit` (
  `idMsg` int(50) NOT NULL,
  `idNonInscrit` int(50) NOT NULL,
  `msg` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `noninscrit`
--

CREATE TABLE `noninscrit` (
  `idNonInscrit` int(50) NOT NULL,
  `nomNonInscrit` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emailNonInscrit` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `idPaiement` int(50) NOT NULL,
  `idPanier` int(50) NOT NULL,
  `typePaiement` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `datePaiement` date NOT NULL,
  `prixHT` double NOT NULL,
  `prixTTC` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int(50) NOT NULL,
  `idInscrit` int(50) NOT NULL,
  `idCircuit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`idPanier`, `idInscrit`, `idCircuit`) VALUES
(12, 14, 15),
(13, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `numTransaction` int(50) NOT NULL,
  `idPaiement` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`numTransaction`, `idPaiement`) VALUES
(1, '77466887GU2227142'),
(2, '3TU70344FD281564N'),
(3, '95A50412CU400103D'),
(4, '9WX17151EP9298412'),
(5, '3D083955GD380151R');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL,
  `nomPays` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prixcircuit`
--

CREATE TABLE `prixcircuit` (
  `idPrixCircuit` int(50) NOT NULL,
  `typeDevise` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `idPromotion` int(50) NOT NULL,
  `debutPromotion` date NOT NULL,
  `finPromotion` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `idRestaurant` int(11) NOT NULL,
  `typeRepas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nomRestaurant` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lieuRestaurant` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sitewebRestaurant` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`idRestaurant`, `typeRepas`, `nomRestaurant`, `lieuRestaurant`, `sitewebRestaurant`) VALUES
(1, 'Diner', 'Marcus', 'Mont-Royal', 'https://www.fourseasons.com/'),
(2, 'Diner', 'Marcus', 'Mont-Royal', 'https://www.fourseasons.com/'),
(3, 'Diner', 'Marcus', 'Mont-Royal', 'https://www.marriott.com/'),
(4, 'Petit dejeuner', 'Dabble', 'New york City', 'https://www.dabblenewyork.com/'),
(5, 'Petit dejeuner', 'Dabble', 'New york City', 'https://www.dabblenewyork.com/'),
(6, 'Petit dejeuner', 'Dabble', 'New york City', 'https://www.dabblenewyork.com/'),
(7, 'Petit dejeuner', 'Marcus', 'Mont-royal', 'https://www.fourseasons.com/fr'),
(8, 'Petit dejeuner', 'Marcus', 'Hawaii', 'https://www.fourseasons.com/fr'),
(9, 'Petit dejeuner', 'Marcus', 'Hawaii', 'https://www.fourseasons.com/fr'),
(10, 'Petit dejeuner', 'Marcus', 'Hawaii', 'https://www.fourseasons.com/fr'),
(11, 'Diner', ' uicetrs', 'eius icm', 'terditomicetrsra.ca'),
(12, 'Petit dejeuner', 'Vienmiam', '99 Vienmiam st', 'www.Vienmiam.com'),
(13, 'Diner', 'Vienmiam', '99 Vienmiam st', 'www.Vienmiam.com'),
(14, 'Souper', 'Vienmiam', '99 Vienmiam st', 'www.Vienmiam.com'),
(15, 'Diner', 'Restaurant Dar El Jeld', '5 Rue Dar El Jeld, Tunis 1006, Tunisie', 'https://www.dareljeld.com/en/'),
(16, 'Diner', 'La Closerie', '5 Rue Dar El Jeld, Tunis 1006, Tunisie', 'http://lacloserie.tn'),
(17, 'Diner', 'La Closerie', '5 Rue Dar El Jeld, Tunis 1006, Tunisie', 'http://lacloserie.tn'),
(18, 'Diner', 'La Closerie', '5 Rue Dar El Jeld, Tunis 1006, Tunisie', 'http://lacloserie.tn'),
(19, 'Diner', 'Tangerino', '186, Avenue Mohamed VI, Corniche de Tanger', 'http://www.eltangerino.com'),
(20, 'Diner', 'La Table du fort ', '8 Rue Fort Notre Dame 13007 Marseille, France', 'https://www.latabledufort.fr/'),
(21, 'Diner', 'La Table du fort  ', '8 Rue Fort Notre Dame 13007 Marseille, France', 'https://www.latabledufort.fr/'),
(22, 'Diner', 'Le Petit Nice Passedat ', 'Corniche JF Kennedy 13007 Marseille, France', 'https://www.passedat.fr'),
(23, 'Diner', 'Ristorante Alle Corone ', 'Campo della Fava 5527, 30122 Venise, Italie', 'restaurant@hotelaireali.com'),
(24, 'Diner', 'Riviera  ', 'fondamenta zattere al ponte longo, 1473, 30123 ven', 'fondamenta zattere al ponte longo, 1473, 30123 venezia, italy  https://www.ristoranteriviera.it/?utm_source=tripadvisor&utm_medium=referral'),
(25, 'Diner', 'Tangerino', '186, Avenue Mohamed VI, Corniche de Tanger', 'http://www.eltangerino.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tranchepmt`
--

CREATE TABLE `tranchepmt` (
  `id` int(11) NOT NULL,
  `nombreTranches` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tranchepmt`
--

INSERT INTO `tranchepmt` (`id`, `nombreTranches`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `idTransport` int(11) NOT NULL,
  `nomTransport` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transportetape`
--

CREATE TABLE `transportetape` (
  `idTransport` int(11) NOT NULL,
  `idEtape` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transportjour`
--

CREATE TABLE `transportjour` (
  `idTransport` int(11) NOT NULL,
  `idJour` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `idVille` int(11) NOT NULL,
  `nomVille` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`idActivite`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `idDepartement` (`idDepartement`);

--
-- Indexes for table `circuit`
--
ALTER TABLE `circuit`
  ADD PRIMARY KEY (`idCircuit`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `idInscrit` (`idInscrit`);

--
-- Indexes for table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`idContinent`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`numTransaction`),
  ADD KEY `idPaiement` (`idPaiement`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`idDepartement`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD KEY `idDepartement` (`idDepartement`);

--
-- Indexes for table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`idEtape`),
  ADD KEY `idCircuit` (`idCircuit`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`idGuide`),
  ADD KEY `idDepartement` (`idDepartement`);

--
-- Indexes for table `guidecircuit`
--
ALTER TABLE `guidecircuit`
  ADD PRIMARY KEY (`idCircuit`,`idGuide`),
  ADD KEY `idCircuit` (`idCircuit`),
  ADD KEY `idGuide` (`idGuide`);

--
-- Indexes for table `hebergement`
--
ALTER TABLE `hebergement`
  ADD PRIMARY KEY (`idHebergement`);

--
-- Indexes for table `historiqueachat`
--
ALTER TABLE `historiqueachat`
  ADD PRIMARY KEY (`idHistorique`),
  ADD KEY `idLigneCircuit` (`idLigneCircuit`);

--
-- Indexes for table `imagecircuit`
--
ALTER TABLE `imagecircuit`
  ADD PRIMARY KEY (`idImage`);

--
-- Indexes for table `imageetape`
--
ALTER TABLE `imageetape`
  ADD PRIMARY KEY (`idImage`);

--
-- Indexes for table `imagejour`
--
ALTER TABLE `imagejour`
  ADD PRIMARY KEY (`idImage`);

--
-- Indexes for table `inscrit`
--
ALTER TABLE `inscrit`
  ADD PRIMARY KEY (`idInscrit`);

--
-- Indexes for table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`idJour`),
  ADD KEY `idEtape` (`idEtape`);

--
-- Indexes for table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`),
  ADD KEY `idContinent` (`idContinent`),
  ADD KEY `idPays` (`idPays`),
  ADD KEY `idVille` (`idVille`);

--
-- Indexes for table `lieujour`
--
ALTER TABLE `lieujour`
  ADD PRIMARY KEY (`idJour`,`idLieu`),
  ADD KEY `idLieu` (`idLieu`),
  ADD KEY `idJour` (`idJour`);

--
-- Indexes for table `ligneactivite`
--
ALTER TABLE `ligneactivite`
  ADD PRIMARY KEY (`idLigneActivite`),
  ADD KEY `idActivite` (`idActivite`),
  ADD KEY `idJour` (`idJour`);

--
-- Indexes for table `lignecircuit`
--
ALTER TABLE `lignecircuit`
  ADD PRIMARY KEY (`idLigneCircuit`),
  ADD KEY `idCircuit` (`idCircuit`),
  ADD KEY `idPanier` (`idPanier`);

--
-- Indexes for table `lignehebergement`
--
ALTER TABLE `lignehebergement`
  ADD PRIMARY KEY (`idLigneHebergement`),
  ADD KEY `idHebergement` (`idHebergement`),
  ADD KEY `idJour` (`idJour`);

--
-- Indexes for table `ligneimagecircuit`
--
ALTER TABLE `ligneimagecircuit`
  ADD PRIMARY KEY (`idLigneImgCircuit`),
  ADD KEY `idCircuit` (`idCircuit`),
  ADD KEY `IdImage` (`IdImage`);

--
-- Indexes for table `ligneimageetape`
--
ALTER TABLE `ligneimageetape`
  ADD PRIMARY KEY (`idLigneImgEtape`),
  ADD KEY `idEtape` (`idEtape`),
  ADD KEY `IdImage` (`IdImage`);

--
-- Indexes for table `ligneimagejour`
--
ALTER TABLE `ligneimagejour`
  ADD PRIMARY KEY (`idLigneImgJour`);

--
-- Indexes for table `lignerestaurant`
--
ALTER TABLE `lignerestaurant`
  ADD PRIMARY KEY (`idLigneRestaurant`),
  ADD KEY `idRestaurant` (`idRestaurant`),
  ADD KEY `idJour` (`idJour`);

--
-- Indexes for table `messageinscrit`
--
ALTER TABLE `messageinscrit`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `idInscit` (`idInscit`);

--
-- Indexes for table `messagenoninscrit`
--
ALTER TABLE `messagenoninscrit`
  ADD PRIMARY KEY (`idMsg`) USING BTREE,
  ADD KEY `idNonInscrit` (`idNonInscrit`);

--
-- Indexes for table `noninscrit`
--
ALTER TABLE `noninscrit`
  ADD PRIMARY KEY (`idNonInscrit`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idPaiement`),
  ADD KEY `idPanier` (`idPanier`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idInscrit` (`idInscrit`),
  ADD KEY `idCircuit` (`idCircuit`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`numTransaction`),
  ADD KEY `idPaiement` (`idPaiement`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPays`);

--
-- Indexes for table `prixcircuit`
--
ALTER TABLE `prixcircuit`
  ADD PRIMARY KEY (`idPrixCircuit`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`idPromotion`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`idRestaurant`);

--
-- Indexes for table `tranchepmt`
--
ALTER TABLE `tranchepmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`idTransport`);

--
-- Indexes for table `transportetape`
--
ALTER TABLE `transportetape`
  ADD PRIMARY KEY (`idTransport`,`idEtape`),
  ADD KEY `idTransport` (`idTransport`,`idEtape`);

--
-- Indexes for table `transportjour`
--
ALTER TABLE `transportjour`
  ADD PRIMARY KEY (`idTransport`,`idJour`),
  ADD KEY `idTransport` (`idTransport`,`idJour`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`idVille`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activite`
--
ALTER TABLE `activite`
  MODIFY `idActivite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circuit`
--
ALTER TABLE `circuit`
  MODIFY `idCircuit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `continent`
--
ALTER TABLE `continent`
  MODIFY `idContinent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `idDepartement` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `idEmploye` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `etape`
--
ALTER TABLE `etape`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `idGuide` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hebergement`
--
ALTER TABLE `hebergement`
  MODIFY `idHebergement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `historiqueachat`
--
ALTER TABLE `historiqueachat`
  MODIFY `idHistorique` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagecircuit`
--
ALTER TABLE `imagecircuit`
  MODIFY `idImage` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `imageetape`
--
ALTER TABLE `imageetape`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `imagejour`
--
ALTER TABLE `imagejour`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `inscrit`
--
ALTER TABLE `inscrit`
  MODIFY `idInscrit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jour`
--
ALTER TABLE `jour`
  MODIFY `idJour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligneactivite`
--
ALTER TABLE `ligneactivite`
  MODIFY `idLigneActivite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lignecircuit`
--
ALTER TABLE `lignecircuit`
  MODIFY `idLigneCircuit` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lignehebergement`
--
ALTER TABLE `lignehebergement`
  MODIFY `idLigneHebergement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ligneimagecircuit`
--
ALTER TABLE `ligneimagecircuit`
  MODIFY `idLigneImgCircuit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ligneimageetape`
--
ALTER TABLE `ligneimageetape`
  MODIFY `idLigneImgEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ligneimagejour`
--
ALTER TABLE `ligneimagejour`
  MODIFY `idLigneImgJour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `lignerestaurant`
--
ALTER TABLE `lignerestaurant`
  MODIFY `idLigneRestaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messageinscrit`
--
ALTER TABLE `messageinscrit`
  MODIFY `idMessage` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messagenoninscrit`
--
ALTER TABLE `messagenoninscrit`
  MODIFY `idMsg` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noninscrit`
--
ALTER TABLE `noninscrit`
  MODIFY `idNonInscrit` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `idPaiement` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `idPanier` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `numTransaction` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `idPays` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prixcircuit`
--
ALTER TABLE `prixcircuit`
  MODIFY `idPrixCircuit` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `idPromotion` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `idRestaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tranchepmt`
--
ALTER TABLE `tranchepmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `idTransport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `idVille` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
