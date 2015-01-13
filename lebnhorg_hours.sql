-- phpMyAdmin SQL Dump
-- version 4.3.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2015 at 04:40 PM
-- Server version: 5.5.40-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lebnhorg_hours`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `idEmployee` int(11) NOT NULL,
  `first_name` varchar(256) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(256) COLLATE utf8_bin NOT NULL,
  `default_type` varchar(4) COLLATE utf8_bin NOT NULL DEFAULT 'circ'
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `idShift` int(11) NOT NULL,
  `idEmployee` int(11) NOT NULL,
  `pay_period` int(11) NOT NULL,
  `wages` decimal(10,2) NOT NULL,
  `Hours` decimal(10,2) NOT NULL,
  `type` varchar(4) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=925 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`idEmployee`), ADD KEY `idEmployee` (`idEmployee`), ADD KEY `idEmployee_2` (`idEmployee`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`idShift`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `idEmployee` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `idShift` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=925;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
