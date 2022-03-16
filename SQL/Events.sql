-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2022 at 03:00 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CollegeEvents`
--

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `EventID` int UNSIGNED NOT NULL,
  `Topic` varchar(1023) COLLATE utf8mb4_general_ci NOT NULL,
  `Type` varchar(511) COLLATE utf8mb4_general_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `NumDays` tinyint UNSIGNED NOT NULL,
  `Mode` enum('Online','Offline') COLLATE utf8mb4_general_ci NOT NULL,
  `Department` varchar(1023) COLLATE utf8mb4_general_ci NOT NULL,
  `Guests` varchar(1023) COLLATE utf8mb4_general_ci NOT NULL,
  `Host` varchar(1023) COLLATE utf8mb4_general_ci NOT NULL,
  `HostContactNo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Faculty` varchar(1023) COLLATE utf8mb4_general_ci NOT NULL,
  `Aegis` enum('IQAC, DBT*','IQAC','DBT*','None') COLLATE utf8mb4_general_ci NOT NULL,
  `OnYoutube` enum('Yes','No') COLLATE utf8mb4_general_ci NOT NULL,
  `Poster` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `EventID` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
