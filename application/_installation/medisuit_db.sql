-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2015 at 12:13 AM
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
-- Table structure for table `ms_diagnoses`
--

CREATE TABLE IF NOT EXISTS `ms_diagnoses` (
  `diagnoses_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(250) NOT NULL,
  `icd10` varchar(10) NOT NULL,
  PRIMARY KEY (`diagnoses_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_doctor`
--

CREATE TABLE IF NOT EXISTS `ms_doctor` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `initials` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `drpr` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_medical_aid`
--

CREATE TABLE IF NOT EXISTS `ms_medical_aid` (
  `medical_aid_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `code` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `edi` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `admin` varchar(150) NOT NULL,
  `direct` varchar(50) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `address3` varchar(150) NOT NULL,
  `pc` int(11) NOT NULL,
  `medperc` double NOT NULL,
  `tarif` int(11) NOT NULL,
  `dec` int(11) NOT NULL,
  PRIMARY KEY (`medical_aid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_patient`
--

CREATE TABLE IF NOT EXISTS `ms_patient` (
  `patient_id` int(11) NOT NULL,
  `cust` varchar(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `initials` varchar(5) NOT NULL,
  `patient` int(150) NOT NULL,
  `address_id` int(11) NOT NULL,
  `pc` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `authno` varchar(20) NOT NULL,
  `patdob` date NOT NULL,
  `patid` varchar(30) NOT NULL,
  `medcod` varchar(30) NOT NULL,
  `medaid` varchar(150) NOT NULL,
  `medno` varchar(40) NOT NULL,
  `refby` varchar(150) NOT NULL,
  `drpr` varchar(20) NOT NULL,
  `diag1` varchar(150) NOT NULL,
  `diag2` varchar(150) NOT NULL,
  `diag3` varchar(150) NOT NULL,
  `disorder1` varchar(150) NOT NULL,
  `disorder2` varchar(150) NOT NULL,
  `disorder3` varchar(150) NOT NULL,
  `accbf` double NOT NULL,
  `age1` double NOT NULL,
  `age2` double NOT NULL,
  `age3` double NOT NULL,
  `age4` double NOT NULL,
  `patpay` double NOT NULL,
  `amnap` double NOT NULL,
  `stmlangs` varchar(10) NOT NULL,
  `stmsuppress` varchar(10) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `tarif` int(11) NOT NULL,
  `disorder` int(11) NOT NULL,
  `dtad` date NOT NULL,
  `dtlu` date NOT NULL,
  `todue` double NOT NULL,
  `title` varchar(10) NOT NULL,
  `memid` int(11) NOT NULL,
  `medperc` double NOT NULL,
  `gender` varchar(10) NOT NULL,
  `closed` varchar(10) NOT NULL DEFAULT 'false',
  `emailstmsw` varchar(10) NOT NULL DEFAULT 'true',
  `patliabsw` varchar(10) NOT NULL,
  `trimmedtitle` varchar(180) NOT NULL,
  `msgkey` varchar(100) NOT NULL,
  `emailcc` varchar(150) NOT NULL,
  `emailpat` varchar(150) NOT NULL,
  `cellpat` varchar(20) NOT NULL,
  `depcod` varchar(100) NOT NULL,
  `noedi` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_tariff_code`
--

CREATE TABLE IF NOT EXISTS `ms_tariff_code` (
  `tariff_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `private` double NOT NULL,
  `med_aid_2010` double NOT NULL,
  `iod` double NOT NULL,
  `discovery` double NOT NULL,
  `rate_5` double NOT NULL,
  `medscheme` double NOT NULL,
  `rate_7` double NOT NULL,
  `rate_8` double NOT NULL,
  `rate_9` double NOT NULL,
  `material` varchar(150) NOT NULL,
  `modminutes` varchar(100) NOT NULL,
  `matpic` varchar(100) NOT NULL,
  `units` varchar(100) NOT NULL,
  `cf_type` varchar(100) NOT NULL,
  PRIMARY KEY (`tariff_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_users`
--

CREATE TABLE IF NOT EXISTS `ms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email, unique',
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_account_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'User' COMMENT 'user''s account type (basic, premium, etc)',
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  `user_rememberme_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `user_provider_type` text COLLATE utf8_unicode_ci,
  `user_facebook_uid` bigint(20) unsigned DEFAULT NULL COMMENT 'optional - facebook UID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  KEY `user_facebook_uid` (`user_facebook_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_users`
--

INSERT INTO `ms_users` (`id`, `user_id`, `firstname`, `lastname`, `phone`, `username`, `user_password_hash`, `gender`, `dob`, `email`, `user_active`, `user_account_type`, `user_has_avatar`, `user_rememberme_token`, `user_creation_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`, `user_facebook_uid`) VALUES
(1, 1, 'Kwasi', 'Kgwete', NULL, 'super777', '$2y$10$rn6rdqBmr51w3xJTR22LjuiGhkiW3uSy3cD4qPPegaacpEUrZKsWq', NULL, NULL, 'kabelokwasi@gmail.com', 0, 'Admin', 0, NULL, 1424733267, 1425683153, 0, NULL, '54507', NULL, NULL, 'DEFAULT', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
