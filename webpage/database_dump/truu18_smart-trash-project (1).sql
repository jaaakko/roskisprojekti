-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 29.11.2021 klo 09:54
-- Palvelimen versio: 10.3.32-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truu18_smart-trash-project`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `sensordata`
--

CREATE TABLE `sensordata` (
  `sensorID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` int(10) NOT NULL,
  `units` varchar(5) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `sensordata`
--

INSERT INTO `sensordata` (`sensorID`, `type`, `value`, `units`, `time`) VALUES
(1, 'Sekajäte', 20, 'cm', '2021-11-29 09:53:05');

-- --------------------------------------------------------

--
-- Rakenne taululle `sensordata_hist`
--

CREATE TABLE `sensordata_hist` (
  `sensorID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `value` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sensordata`
--
ALTER TABLE `sensordata`
  ADD PRIMARY KEY (`sensorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sensordata`
--
ALTER TABLE `sensordata`
  MODIFY `sensorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
