-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2020 at 07:25 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publiged`
--

-- --------------------------------------------------------

--
-- Table structure for table `module_reseau`
--

CREATE TABLE `module_reseau` (
  `ref` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `icone` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_reseau`
--

INSERT INTO `module_reseau` (`ref`, `nom`, `url`, `actif`, `icone`) VALUES
(1, 'Facebook', '', 1, 'la la-facebook-square'),
(2, 'Twitter', '', 1, 'fab fa-twitter-square'),
(3, 'Vimeo', '', 1, 'fab fa-vimeo-square'),
(4, 'LinkedIn', '', 1, 'fab fa-linkedin'),
(5, 'Flux RSS', '', 1, 'fas fa-rss-square'),
(6, 'Pinterest', '', 1, 'fab fa-pinterest-square'),
(7, 'Instagram', '', 1, 'fab fa-instagram'),
(8, 'Youtube', '', 1, 'fab fa-youtube-square');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module_reseau`
--
ALTER TABLE `module_reseau`
  ADD PRIMARY KEY (`ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module_reseau`
--
ALTER TABLE `module_reseau`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
