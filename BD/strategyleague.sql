-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2015 at 04:40 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `strategyleague`
--
CREATE DATABASE IF NOT EXISTS `strategyleague` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `strategyleague`;

-- --------------------------------------------------------

--
-- Table structure for table `atributos`
--

DROP TABLE IF EXISTS `atributos`;
CREATE TABLE IF NOT EXISTS `atributos` (
`code_atr` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `ap` int(11) NOT NULL,
  `ad` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `mr` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `rp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `edificios`
--

DROP TABLE IF EXISTS `edificios`;
CREATE TABLE IF NOT EXISTS `edificios` (
`cod_edf` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `descricao` text NOT NULL,
  `nivel` int(11) NOT NULL,
  `atr` varchar(25) DEFAULT NULL,
  `ap_nec` int(11) NOT NULL,
  `ad_nec` int(11) NOT NULL,
  `speed_nec` int(11) NOT NULL,
  `armor_nec` int(11) NOT NULL,
  `mr_nec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `edificios_users`
--

DROP TABLE IF EXISTS `edificios_users`;
CREATE TABLE IF NOT EXISTS `edificios_users` (
  `cod_edf` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reseaches`
--

DROP TABLE IF EXISTS `reseaches`;
CREATE TABLE IF NOT EXISTS `reseaches` (
`cod_rs` int(11) NOT NULL,
  `cod_tropa` int(11) NOT NULL,
  `custoIP` int(11) NOT NULL,
  `custoRP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `researches_users`
--

DROP TABLE IF EXISTS `researches_users`;
CREATE TABLE IF NOT EXISTS `researches_users` (
  `cod_rs` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tropas`
--

DROP TABLE IF EXISTS `tropas`;
CREATE TABLE IF NOT EXISTS `tropas` (
`cod_tropa` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `descricao` text NOT NULL,
  `custoIP` int(11) NOT NULL,
  `custoRP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tropas_users`
--

DROP TABLE IF EXISTS `tropas_users`;
CREATE TABLE IF NOT EXISTS `tropas_users` (
  `cod_tropa` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`cod_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `enabled` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'utilizador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atributos`
--
ALTER TABLE `atributos`
 ADD PRIMARY KEY (`code_atr`);

--
-- Indexes for table `edificios`
--
ALTER TABLE `edificios`
 ADD PRIMARY KEY (`cod_edf`), ADD UNIQUE KEY `cod_edf` (`cod_edf`);

--
-- Indexes for table `reseaches`
--
ALTER TABLE `reseaches`
 ADD PRIMARY KEY (`cod_rs`);

--
-- Indexes for table `tropas`
--
ALTER TABLE `tropas`
 ADD PRIMARY KEY (`cod_tropa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`cod_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atributos`
--
ALTER TABLE `atributos`
MODIFY `code_atr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `edificios`
--
ALTER TABLE `edificios`
MODIFY `cod_edf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reseaches`
--
ALTER TABLE `reseaches`
MODIFY `cod_rs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tropas`
--
ALTER TABLE `tropas`
MODIFY `cod_tropa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
