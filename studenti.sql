-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 26, 2019 at 12:23 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citaonica`
--

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

DROP TABLE IF EXISTS `studenti`;
CREATE TABLE IF NOT EXISTS `studenti` (
  `idstudenta` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brojindeksa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vreme` date NOT NULL,
  PRIMARY KEY (`idstudenta`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`idstudenta`, `ime`, `prezime`, `brojindeksa`, `vreme`) VALUES
(23, 'Ana', 'Jacimovic', '1063/16', '2019-12-14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
