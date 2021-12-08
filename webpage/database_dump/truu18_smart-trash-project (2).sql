-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08.12.2021 klo 08:21
-- Palvelimen versio: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roskis_projekti`
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
(1, 'Sekajäte', 105, 'cm', '2021-12-03 11:02:52');

-- --------------------------------------------------------

--
-- Rakenne taululle `sensordata_hist`
--

CREATE TABLE `sensordata_hist` (
  `sensorID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `value` varchar(10) NOT NULL,
  `units` varchar(5) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `sensordata_hist`
--

INSERT INTO `sensordata_hist` (`sensorID`, `type`, `value`, `units`, `time`) VALUES
(1, 'Sekajäte', '100', '0', '2021-12-03 11:01:50'),
(1, 'Sekajäte', '97', '0', '2021-12-03 11:02:40'),
(1, 'Sekajäte', '93', '0', '2021-12-03 11:02:41'),
(1, 'Sekajäte', '98', '0', '2021-12-03 11:02:42'),
(1, 'Sekajäte', '94', '0', '2021-12-03 11:02:43'),
(1, 'Sekajäte', '92', '0', '2021-12-03 11:02:44'),
(1, 'Sekajäte', '60', '0', '2021-12-03 11:02:45'),
(1, 'Sekajäte', '97', '0', '2021-12-03 11:02:46'),
(1, 'Sekajäte', '100', '0', '2021-12-03 11:02:47'),
(1, 'Sekajäte', '101', '0', '2021-12-03 11:02:48'),
(1, 'Sekajäte', '99', '0', '2021-12-03 11:02:49'),
(1, 'Sekajäte', '53', '0', '2021-12-03 11:02:50'),
(1, 'Sekajäte', '93', '0', '2021-12-03 11:02:51');

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
