-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 08:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crazycricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `batsales`
--

CREATE TABLE `batsales` (
  `ID` int(10) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `itemsold` varchar(255) NOT NULL,
  `Income` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batsales`
--

INSERT INTO `batsales` (`ID`, `Year`, `itemsold`, `Income`) VALUES
(1, '2000', '24500', '1200'),
(2, '2001', '25000', '1000'),
(3, '2002', '5000', '60000'),
(4, '2003', '1500', '25000'),
(5, '2004', '1500', '40000'),
(6, '2005', '50', '3000'),
(7, '2006', '3000', '45000'),
(8, '2007', '10', '10000'),
(9, '2008', '14', '8000'),
(10, '2009', '0', '0'),
(11, '2010', '1', '1500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batsales`
--
ALTER TABLE `batsales`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batsales`
--
ALTER TABLE `batsales`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
