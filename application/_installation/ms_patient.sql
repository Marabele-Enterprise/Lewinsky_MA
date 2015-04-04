-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2015 at 06:25 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medisuit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_patient`
--

CREATE TABLE IF NOT EXISTS `ms_patient` (
  `id` int(11) NOT NULL,
  `cell` varchar(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(70) NOT NULL,
  `dependent_code` varchar(30) NOT NULL,
  `referring_doc` varchar(70) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `diagnoses` varchar(100) NOT NULL,
`patient_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ms_patient`
--

INSERT INTO `ms_patient` (`id`, `cell`, `name`, `date_of_birth`, `email`, `dependent_code`, `referring_doc`, `gender`, `diagnoses`, `patient_id`) VALUES
(2147483647, '0723099991', 'KingKong', '1991-08-09', 'kingkong@gmail.com', '22xx33', 'Dr <3', 'Male', 'Very Strong', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_patient`
--
ALTER TABLE `ms_patient`
 ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_patient`
--
ALTER TABLE `ms_patient`
MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
