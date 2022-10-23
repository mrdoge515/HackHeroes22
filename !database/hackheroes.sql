-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2022 at 06:22 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackheroes`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `districtID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `districtName` varchar(50) NOT NULL,
  PRIMARY KEY (`districtID`)
) ENGINE=MyISAM AUTO_INCREMENT=8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`districtID`, `districtName`) VALUES
(1, 'Sielec, Sosnowiec'),
(2, 'Śródmieście, Sosnowiec'),
(3, 'Niwka, Sosnowiec'),
(4, 'Radocha, Sosnowiec'),
(5, 'Dańdówka, Sosnowiec'),
(6, 'Pogoń, Sosnowiec'),
(7, 'Gołonóg, Dąbrowa Górnicza');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `postContent` varchar(2000) NOT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `districtID` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `districtID` (`districtID`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
