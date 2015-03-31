-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2015 at 11:26 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
-- Table structure for table `ms_aid_holder`
--

CREATE TABLE IF NOT EXISTS `ms_aid_holder` (
  `aid_holder_id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(150) NOT NULL,
  `title` varchar(20) NOT NULL,
  `initials` varchar(20) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `address3` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cc_email` varchar(150) NOT NULL,
  `tariff_rate` varchar(100) NOT NULL,
  `bill_at` double NOT NULL,
  `iod_claim_number` varchar(150) DEFAULT NULL,
  `iod_employer` varchar(200) DEFAULT NULL,
  `iod_emp_reg_num` varchar(100) DEFAULT NULL,
  `iod_date_of_injury` date DEFAULT NULL,
  `supress_statement` tinyint(1) NOT NULL,
  `account_closed` tinyint(1) NOT NULL,
  `allow_email_statements` tinyint(1) NOT NULL,
  `print_patient_liability` tinyint(1) NOT NULL,
  `medical_aid` varchar(250) NOT NULL,
  `medical_aid_number` varchar(150) NOT NULL,
  `member_id` varchar(150) NOT NULL,
  `authorisation_code` varchar(150) NOT NULL,
  PRIMARY KEY (`aid_holder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
