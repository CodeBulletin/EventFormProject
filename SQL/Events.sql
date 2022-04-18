-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 01:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegeevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(10) UNSIGNED NOT NULL,
  `Topic` varchar(1023) NOT NULL,
  `Type` varchar(511) NOT NULL,
  `AcademicYear` varchar(256) NOT NULL,
  `DateTime` datetime NOT NULL,
  `NumDays` tinyint(3) UNSIGNED NOT NULL,
  `Mode` enum('Online','Offline','Hybrid') NOT NULL,
  `Department` varchar(1023) NOT NULL,
  `Guests` int(11) UNSIGNED NOT NULL,
  `Participants` int(10) UNSIGNED NOT NULL,
  `Faculty` varchar(1023) NOT NULL,
  `Aegis` enum('IQAC, DBT*','IQAC','DBT*','None') NOT NULL,
  `Poster` text NOT NULL,
  `About` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Topic`, `Type`, `AcademicYear`, `DateTime`, `NumDays`, `Mode`, `Department`, `Guests`, `Participants`, `Faculty`, `Aegis`, `Poster`, `About`) VALUES
(1, 'Bhavesh Malhotra', 'Lecture Series', '2021-2022', '2022-04-19 16:44:00', 5, 'Offline', 'Bhavesh Malhotra', 20, 40, 'Bhavesh Malhotra', 'IQAC, DBT*', '1650280630_B-H Curve experiment-2 (1).pdf', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor ac augue ultrices placerat. Phasellus auctor ante at felis consequat, quis tristique nisi venenatis. Pellentesque nec libero eu urna vehicula rutrum. In vel lacus id justo rhoncus iaculis. Etiam feugiat aliquam viverra. Aenean mattis elit fermentum, dapibus leo non, sagittis.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
