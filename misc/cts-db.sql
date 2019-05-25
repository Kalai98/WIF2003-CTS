-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2019 at 08:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cts-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `Answer_Id` int(11) NOT NULL,
  `Result_Id` int(11) NOT NULL,
  `Ans_1` varchar(255) NOT NULL,
  `Ans_2` varchar(255) NOT NULL,
  `Ans_31` varchar(255) NOT NULL,
  `Ans_32` varchar(255) NOT NULL,
  `Ans_4` varchar(255) NOT NULL,
  `Ans_5` varchar(255) NOT NULL,
  `Ans_6` varchar(255) NOT NULL,
  `Ans_7` text NOT NULL,
  `Ans_81` varchar(255) NOT NULL,
  `Ans_82` varchar(255) NOT NULL,
  `Ans_83` varchar(255) NOT NULL,
  `Ans_84` varchar(255) NOT NULL,
  `Ans_85` varchar(255) NOT NULL,
  `Ans_91` varchar(255) NOT NULL,
  `Ans_92` varchar(255) NOT NULL,
  `Ans_10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Result_Id` int(11) NOT NULL,
  `Matric_No` varchar(255) NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `Start_Time` varchar(255) NOT NULL,
  `Stop_Time` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Matric_No` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `CGPA` float NOT NULL,
  `Year_Of_Study` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age Group` varchar(255) NOT NULL,
  `Ethnic` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`Answer_Id`),
  ADD KEY `Foreign Key` (`Result_Id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Result_Id`),
  ADD KEY `Foreign Key` (`Matric_No`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Matric_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `Answer_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Result_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`Result_Id`) REFERENCES `results` (`Result_Id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`Matric_No`) REFERENCES `users` (`Matric_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
