-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2022 at 10:17 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_10`
--

-- --------------------------------------------------------

--
-- Table structure for table `academy`
--

DROP TABLE IF EXISTS `academy`;
CREATE TABLE IF NOT EXISTS `academy` (
  `Facility ID` text NOT NULL,
  `Facility Name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academy`
--

INSERT INTO `academy` (`Facility ID`, `Facility Name`) VALUES
('FID01', 'Faculty of the Arts, Social Sciences and Humanities'),
('FID02', 'Faculty of Business and Law'),
('FID03', 'Faculty of Engineering and Information Sciences'),
('FID04', 'Faculty of Science, Medicine and Health');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

DROP TABLE IF EXISTS `enrolled`;
CREATE TABLE IF NOT EXISTS `enrolled` (
  `TID` text NOT NULL,
  `SID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`TID`, `SID`) VALUES
('T6', 'SID01'),
('T1', 'SID01'),
('T4', 'SID02'),
('T4', 'SID02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `SID` text NOT NULL,
  `S_Name` text NOT NULL,
  `password` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`SID`, `S_Name`, `password`) VALUES
('SID01', 'Shoyeb Ahmmed', 'bbb8aae57c104cda40c93843ad5e6db8'),
('SID02', 'Tamim Iqbal', '0d777e9e30b918e9034ab610712c90cf'),
('SID03', 'Lena Smith', '77c9749b451ab8c713c48037ddfbb2c4'),
('SID04', 'Paul Miller', '8792b8cf71d27dc96173b2ac79b96e0d'),
('SID05', 'Alen Lee', '3665a76e271ada5a75368b99f774e404'),
('SID06', 'Lucy White', '9f0863dd5f0256b0f586a7b523f8cfe8'),
('SID07', 'Davide Yang', 'ca94efe2a58c27168edf3d35102dbb6d'),
('SID08', 'Ado Wood', '134fb0bf3bdd54ee9098f4cbc4351b9a');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

DROP TABLE IF EXISTS `temp`;
CREATE TABLE IF NOT EXISTS `temp` (
  `TID` text NOT NULL,
  `T_Name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`TID`, `T_Name`) VALUES
('T8', 'Medical Science');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `Trainer ID` text NOT NULL,
  `Trainer Name` text NOT NULL,
  `Facility ID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`Trainer ID`, `Trainer Name`, `Facility ID`) VALUES
('FTID1', 'John Smith', 'FID01'),
('FTID2', 'Sara Novah', 'FID01'),
('FTID3', 'Shoyeb Ahmmed', 'FID02'),
('FTID4', 'Abbie Rose', 'FID02'),
('FTID5', 'Halina Kai', 'FID03'),
('FTID6', 'Safa Alma', 'FID03'),
('FTID7', 'Ron Weasley', 'FID04'),
('FTID8', 'Hermione Granger', 'FID04');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

DROP TABLE IF EXISTS `trainings`;
CREATE TABLE IF NOT EXISTS `trainings` (
  `TID` text NOT NULL,
  `T_Name` text NOT NULL,
  `FID` text NOT NULL,
  `Tr_ID` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`TID`, `T_Name`, `FID`, `Tr_ID`) VALUES
('T1', 'Communications and Media', 'FID01', 'FTID1'),
('T2', 'Creative and Performing Arts', 'FID01', 'FTID2'),
('T3', 'Accounting, Finance & Economics', 'FID02', 'FTID3'),
('T4', 'Business, Marketing and Management Law', 'FID02', 'FTID4'),
('T5', 'Computer Science and Information Technology', 'FID03', 'FTID5'),
('T6', 'Mathematics and Statistics', 'FID03', 'FTID6'),
('T7', 'Environmental and Biological Sciences', 'FID04', 'FTID7'),
('T8', 'Medical Science', 'FID04', 'FTID8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
