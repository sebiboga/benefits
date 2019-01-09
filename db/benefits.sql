-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2018 at 11:02 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benefits`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

DROP TABLE IF EXISTS `benefits`;
CREATE TABLE IF NOT EXISTS `benefits` (
  `id` varchar(50) NOT NULL,
  `company` varchar(200) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `url` varchar(300) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `company`, `description`, `url`, `title`, `start_date`, `end_date`) VALUES
('F5F46624-E1F2-4301-A673-DEF3DDF35F57', 'unu', 'doi', 'trei', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `name_pers` varchar(150) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `name_pers`, `mail`, `phone`, `username`, `password`) VALUES
('69227E51-4B8A-4651-A212-6E86EFA75876', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('683576D4-6E5E-43DA-B3EE-FCD3C69ADF90', 'Endava', 'e', 'e', 'e', 'e', 'ale', '81dc9bdb52d04dc20036dbd8313ed055'),
('88770299-2D9A-4D11-91DF-94D378F3D5E3', 'NTT', '', 'sebi', 'sebi@', '0789989', 'sboga', '0a31eceb94775cb4fef65681313895d6'),
('D541A6D7-27D8-4C75-A7A9-0B6560796496', 'bla', '', 'bla', 'nblaa', '', '', 'd41d8cd98f00b204e9800998ecf8427e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
