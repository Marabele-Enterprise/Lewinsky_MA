-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2015 at 09:20 PM
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
-- Table structure for table `ms_action_log`
--

CREATE TABLE IF NOT EXISTS `ms_action_log` (
  `action_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(200) NOT NULL,
  `category` varchar(150) NOT NULL,
  `action_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(60) DEFAULT NULL,
  `session_id` varchar(20) NOT NULL,
  `test_label` varchar(10) NOT NULL,
  PRIMARY KEY (`action_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `ms_action_log`
--

INSERT INTO `ms_action_log` (`action_log_id`, `action`, `category`, `action_date`, `user_id`, `user_ip`, `session_id`, `test_label`) VALUES
(22, 'Entered Home Page', 'Navigation', '2015-02-16 01:59:10', -1, '41.146.74.142', 'Xg1CV4uBMUsFaOb', 'A'),
(23, 'Login Clicked', 'Navigation', '2015-02-16 01:59:54', -1, '41.146.74.142', 'Xg1CV4uBMUsFaOb', 'A'),
(24, 'Login Successful', 'Login', '2015-02-16 02:00:09', 2, '41.146.74.142', 'Xg1CV4uBMUsFaOb', 'A'),
(25, 'Entered Welcome Page', 'Navigation', '2015-02-16 02:00:37', 2, '41.146.74.142', 'Xg1CV4uBMUsFaOb', 'A'),
(26, 'Entered Dashboard Page', 'Navigation', '2015-02-16 02:02:07', 2, '41.146.74.142', 'Xg1CV4uBMUsFaOb', 'A'),
(27, 'Logout Successful', 'Login', '2015-02-16 02:05:59', 2, '41.146.74.142', 'Xg1CV4uBMUsFaOb', 'A'),
(28, 'Entered Home Page', 'Navigation', '2015-02-16 02:06:01', -1, '41.146.74.142', 'ahAkzbPg9wXQ5Nl', 'A'),
(29, 'Login Successful', 'Login', '2015-02-16 09:17:16', 32, '41.13.24.86', 'dJpT2xvqP1b4HyS', 'A'),
(30, 'Entered Home Page', 'Navigation', '2015-02-16 12:15:44', -1, '41.13.60.28', 'QRyzq2n6aOg4vl8', 'A'),
(31, 'Entered Home Page', 'Navigation', '2015-02-16 14:09:24', -1, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(32, 'Login Clicked', 'Navigation', '2015-02-16 16:15:13', -1, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(33, 'Login Successful', 'Login', '2015-02-16 16:15:28', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(34, 'Entered Welcome Page', 'Navigation', '2015-02-16 16:15:29', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(35, 'Entered Dashboard Page', 'Navigation', '2015-02-16 16:15:31', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(36, 'Entered Video Manager Page', 'Navigation', '2015-02-16 16:16:19', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(37, 'Entered Dashboard Page', 'Navigation', '2015-02-16 16:16:28', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(38, 'Entered Dashboard Page', 'Navigation', '2015-02-16 16:17:10', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(39, 'Entered Help Page', 'Navigation', '2015-02-16 16:17:47', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(40, 'Entered Category Select Page for report', 'Navigation', '2015-02-16 16:17:59', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(41, 'Entered Report Page', 'Navigation', '2015-02-16 16:18:01', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(42, 'Entered Welcome Page', 'Navigation', '2015-02-16 16:18:23', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(43, 'Entered Dashboard Page', 'Navigation', '2015-02-16 16:18:33', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(44, 'Logout Successful', 'Login', '2015-02-16 16:19:01', 2, '41.13.16.74', 'GVhijxtKqRY8BkF', 'A'),
(45, 'Entered Home Page', 'Navigation', '2015-02-16 16:19:09', -1, '41.13.16.74', 'eRxLhUACXF26dbG', 'A'),
(46, 'Entered Home Page', 'Navigation', '2015-02-16 16:58:18', -1, '41.13.16.74', 'Jhrf4kqLAgT7RPw', 'A'),
(47, 'Entered Home Page', 'Navigation', '2015-02-16 19:06:20', -1, '41.13.16.74', '9xS1swogj6OJZ7e', 'A'),
(48, 'Login Clicked', 'Navigation', '2015-02-16 19:06:23', -1, '41.13.16.74', '9xS1swogj6OJZ7e', 'A'),
(49, 'Login Successful', 'Login', '2015-02-16 19:06:42', 32, '41.13.16.74', '9xS1swogj6OJZ7e', 'A'),
(50, 'Entered Welcome Page', 'Navigation', '2015-02-16 19:06:43', 32, '41.13.16.74', '9xS1swogj6OJZ7e', 'A'),
(51, 'Entered Category Select Page for newstock', 'Navigation', '2015-02-16 19:06:53', 32, '41.13.16.74', '9xS1swogj6OJZ7e', 'A'),
(52, 'Entered Stock Page for newstock', 'Navigation', '2015-02-16 19:06:57', 32, '41.13.16.74', '9xS1swogj6OJZ7e', 'A'),
(53, 'Entered Home Page', 'Navigation', '2015-02-17 02:41:15', -1, '41.13.16.74', '5KeROvYcWswkAT4', 'A'),
(54, 'Login Clicked', 'Navigation', '2015-02-17 02:41:18', -1, '41.13.16.74', '5KeROvYcWswkAT4', 'A'),
(55, 'Login Successful', 'Login', '2015-02-17 02:41:37', 2, '41.13.16.74', '5KeROvYcWswkAT4', 'A'),
(56, 'Entered Welcome Page', 'Navigation', '2015-02-17 02:41:38', 2, '41.13.16.74', '5KeROvYcWswkAT4', 'A'),
(57, 'Entered Dashboard Page', 'Navigation', '2015-02-17 02:41:40', 2, '41.13.16.74', '5KeROvYcWswkAT4', 'A'),
(58, 'Logout Successful', 'Login', '2015-02-17 02:43:08', 2, '41.13.16.74', '5KeROvYcWswkAT4', 'A'),
(59, 'Entered Home Page', 'Navigation', '2015-02-17 02:43:08', -1, '41.13.16.74', 'xhODnbqc0iNvHm8', 'A'),
(60, 'Entered Home Page', 'Navigation', '2015-02-17 10:39:39', -1, '41.13.32.69', 'dRmziHD8xob7T3G', 'A'),
(61, 'Entered Home Page', 'Navigation', '2015-02-17 12:52:59', -1, '41.13.32.69', 'SdfwVjzR6LkquUE', 'A'),
(62, 'Entered Home Page', 'Navigation', '2015-02-17 13:14:01', -1, '41.13.52.44', 'UC6KJPsiZ5ouHyd', 'A'),
(63, 'Entered Home Page', 'Navigation', '2015-02-18 01:06:13', -1, '41.13.0.173', 'U0eQ3EwusTCzGVa', 'A'),
(64, 'Login Clicked', 'Navigation', '2015-02-18 01:06:27', -1, '41.13.0.173', 'U0eQ3EwusTCzGVa', 'A'),
(65, 'Login Successful', 'Login', '2015-02-18 01:06:49', 2, '41.13.0.173', 'U0eQ3EwusTCzGVa', 'A'),
(66, 'Entered Welcome Page', 'Navigation', '2015-02-18 01:06:50', 2, '41.13.0.173', 'U0eQ3EwusTCzGVa', 'A'),
(67, 'Entered Dashboard Page', 'Navigation', '2015-02-18 01:06:53', 2, '41.13.0.173', 'U0eQ3EwusTCzGVa', 'A'),
(68, 'Logout Successful', 'Login', '2015-02-18 01:07:32', 2, '41.13.0.173', 'U0eQ3EwusTCzGVa', 'A'),
(69, 'Entered Home Page', 'Navigation', '2015-02-18 01:07:35', -1, '41.13.0.173', 'xPChY0eO8oRSDaz', 'A'),
(70, 'Entered Home Page', 'Navigation', '2015-02-18 15:17:14', -1, '41.13.4.140', 'WETVURFM4tm8qa2', 'A'),
(71, 'Entered Home Page', 'Navigation', '2015-02-18 16:48:24', -1, '41.13.0.173', 'HML1aIRxzJsK6Yb', 'A'),
(72, 'Login Clicked', 'Navigation', '2015-02-18 16:48:27', -1, '41.13.0.173', 'HML1aIRxzJsK6Yb', 'A'),
(73, 'Login Successful', 'Login', '2015-02-18 16:48:39', 2, '41.13.0.173', 'HML1aIRxzJsK6Yb', 'A'),
(74, 'Entered Welcome Page', 'Navigation', '2015-02-18 16:48:42', 2, '41.13.0.173', 'HML1aIRxzJsK6Yb', 'A'),
(75, 'Entered Dashboard Page', 'Navigation', '2015-02-18 16:48:46', 2, '41.13.0.173', 'HML1aIRxzJsK6Yb', 'A'),
(76, 'Logout Successful', 'Login', '2015-02-18 16:49:22', 2, '41.13.0.173', 'HML1aIRxzJsK6Yb', 'A'),
(77, 'Entered Home Page', 'Navigation', '2015-02-18 16:49:23', -1, '41.13.0.173', 'SiwkFjgbcH6e1qI', 'A'),
(78, 'Entered Home Page', 'Navigation', '2015-02-18 17:15:33', -1, '41.13.0.173', 'UldR5m1cWjt7Ji2', 'A'),
(79, 'Login Clicked', 'Navigation', '2015-02-18 17:15:35', -1, '41.13.0.173', 'UldR5m1cWjt7Ji2', 'A'),
(80, 'Login Successful', 'Login', '2015-02-18 17:15:53', 32, '41.13.0.173', 'UldR5m1cWjt7Ji2', 'A'),
(81, 'Entered Welcome Page', 'Navigation', '2015-02-18 17:15:54', 32, '41.13.0.173', 'UldR5m1cWjt7Ji2', 'A'),
(82, 'Entered Category Select Page for newstock', 'Navigation', '2015-02-18 17:15:58', 32, '41.13.0.173', 'UldR5m1cWjt7Ji2', 'A'),
(83, 'Entered Stock Page for newstock', 'Navigation', '2015-02-18 17:16:01', 32, '41.13.0.173', 'UldR5m1cWjt7Ji2', 'A'),
(84, 'Entered Home Page', 'Navigation', '2015-02-18 17:49:38', -1, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(85, 'Login Clicked', 'Navigation', '2015-02-18 17:49:47', -1, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(86, 'Login Successful', 'Login', '2015-02-18 17:50:08', 32, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(87, 'Entered Welcome Page', 'Navigation', '2015-02-18 17:50:09', 32, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(88, 'Entered Category Select Page for newstock', 'Navigation', '2015-02-18 17:50:12', 32, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(89, 'Entered Stock Page for newstock', 'Navigation', '2015-02-18 17:50:15', 32, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(90, 'Entered Category Select Page for report', 'Navigation', '2015-02-18 17:55:44', 32, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(91, 'Entered Report Page', 'Navigation', '2015-02-18 17:55:47', 32, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(92, 'Logout Successful', 'Login', '2015-02-18 17:56:47', 32, '41.13.0.173', 'eqF8j9KvJi17pDE', 'A'),
(93, 'Entered Home Page', 'Navigation', '2015-02-18 17:56:49', -1, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(94, 'Login Clicked', 'Navigation', '2015-02-18 23:42:18', -1, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(95, 'Login Successful', 'Login', '2015-02-18 23:43:02', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(96, 'Entered Welcome Page', 'Navigation', '2015-02-18 23:43:04', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(97, 'Entered Category Select Page for newstock', 'Navigation', '2015-02-18 23:43:25', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(98, 'Entered Stock Page for newstock', 'Navigation', '2015-02-18 23:43:28', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(99, 'Entered Category Select Page for newstock', 'Navigation', '2015-02-18 23:43:49', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(100, 'Entered Stock Page for newstock', 'Navigation', '2015-02-18 23:53:11', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(101, 'Entered Profile Page', 'Navigation', '2015-02-18 23:55:29', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(102, 'Logout Successful', 'Login', '2015-02-18 23:56:03', 32, '41.13.0.173', '92FG1dHkhX7vig8', 'A'),
(103, 'Entered Home Page', 'Navigation', '2015-02-18 23:56:09', -1, '41.13.0.173', 'cJzmiMaw67CI1jZ', 'A'),
(104, 'Entered Home Page', 'Navigation', '2015-02-19 04:36:50', -1, '41.13.0.173', 'SpdKkQNWT4Eeufg', 'A'),
(105, 'Entered Home Page', 'Navigation', '2015-02-19 14:03:42', -1, '41.13.0.80', 'r4o0Stsh1lxaPA6', 'A'),
(106, 'Login Clicked', 'Navigation', '2015-02-19 14:03:45', -1, '41.13.0.80', 'r4o0Stsh1lxaPA6', 'A'),
(107, 'Login Successful', 'Login', '2015-03-21 16:38:57', 9, '127.0.0.1', 'VHXERcnOLZJ7jTl', 'A'),
(108, 'Login Successful', 'Login', '2015-03-21 16:39:18', 9, '127.0.0.1', 'g1vn5YSKIiwdNQG', 'A'),
(109, 'Login Successful', 'Login', '2015-03-21 16:40:11', 9, '127.0.0.1', 'w9aE4pAlVqNKHP1', 'A'),
(110, 'Login Successful', 'Login', '2015-03-21 16:41:45', 9, '127.0.0.1', 'CojYaOfm7Z5GdPF', 'A'),
(111, 'Login Successful', 'Login', '2015-03-21 16:41:53', 9, '127.0.0.1', 'TH2rKaR5muw3DIZ', 'A'),
(112, 'Login Successful', 'Login', '2015-03-21 16:44:18', 9, '127.0.0.1', 'IMTUkqjzS1VErWB', 'A'),
(113, 'Login Successful', 'Login', '2015-03-21 16:45:04', 9, '127.0.0.1', 'C381VdJWfULx2vt', 'A'),
(114, 'Login Successful', 'Login', '2015-03-21 16:45:10', 9, '127.0.0.1', 'm8xNpuCtSQhFg6f', 'A'),
(115, 'Login Successful', 'Login', '2015-03-21 16:45:28', 9, '127.0.0.1', 'znU4Nt8XmCqf9HP', 'A'),
(116, 'Login Successful', 'Login', '2015-03-21 16:47:27', 9, '127.0.0.1', 'IRX69udoYVw4Emv', 'A'),
(117, 'Entered Home Page', 'Navigation', '2015-03-21 16:47:27', 9, '127.0.0.1', 'lb2YLP45JymGjec', 'A'),
(118, 'Login Successful', 'Login', '2015-03-21 16:48:24', 9, '127.0.0.1', 'I8JoCOHR5E3kVay', 'A'),
(119, 'Entered Home Page', 'Navigation', '2015-03-21 16:48:25', 9, '127.0.0.1', 'eBvahQCHXSR24AF', 'A'),
(120, 'Login Successful', 'Login', '2015-03-21 23:28:30', 1, '::1', 'P6SQwmTXLRjtfKN', 'A'),
(121, 'Entered Home Page', 'Navigation', '2015-03-21 23:28:30', 1, '::1', 'Xsw14rlqL6dvuCA', 'A'),
(122, 'Entered Home Page', 'Navigation', '2015-03-22 02:43:20', 1, '::1', 'jfcOGr8ZvBaXhbu', 'A'),
(123, 'Login Successful', 'Login', '2015-03-28 18:18:38', 1, '::1', 'MTQiVZlWYrH9zN3', 'A'),
(124, 'Entered Home Page', 'Navigation', '2015-03-28 18:18:38', 1, '::1', 'ADIJihdlzP2U7Wm', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ms_diagnosis`
--

CREATE TABLE IF NOT EXISTS `ms_diagnosis` (
  `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) NOT NULL,
  `icd10` varchar(10) NOT NULL,
  PRIMARY KEY (`diagnosis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_diagnosis`
--

INSERT INTO `ms_diagnosis` (`diagnosis_id`, `description`, `icd10`) VALUES
(1, 'iuyu', 'iuy');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ms_doctor`
--

INSERT INTO `ms_doctor` (`doctor_id`, `title`, `initials`, `surname`, `phone`, `drpr`, `email`) VALUES
(1, 'Mr', 'MP', 'Mello', '0790788189', '0566', 'mp.mello5@gmail.com'),
(2, 'Dr', 'RM', 'Mello', '0825114785', '865', 'mellorm@gmail.com'),
(3, 'Dr', 'P', 'Phil', '0615663381', '630', 'drphil@gmail.com'),
(4, 'Dr', 'D', 'Khumalo', '0816513332', '3969', '16v@gmail.com');

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
  `bill_at` double NOT NULL,
  `round_to` varchar(20) NOT NULL,
  PRIMARY KEY (`medical_aid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_patient`
--

CREATE TABLE IF NOT EXISTS `ms_patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust` varchar(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `initials` varchar(5) NOT NULL,
  `patient` int(150) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `address3` varchar(150) NOT NULL,
  `pc` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
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
  `disorder1` varchar(150) NOT NULL,
  `accbf` double NOT NULL,
  `age1` double NOT NULL,
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
  `noedi` varchar(10) NOT NULL DEFAULT 'false',
  `id_number` varchar(40) NOT NULL,
  `authcode` varchar(40) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_patient`
--

INSERT INTO `ms_patient` (`patient_id`, `cust`, `name`, `surname`, `initials`, `patient`, `address1`, `address2`, `address3`, `pc`, `phone`, `cell`, `email`, `authno`, `patdob`, `patid`, `medcod`, `medaid`, `medno`, `refby`, `drpr`, `diag1`, `disorder1`, `accbf`, `age1`, `patpay`, `amnap`, `stmlangs`, `stmsuppress`, `comment`, `tarif`, `disorder`, `dtad`, `dtlu`, `todue`, `title`, `memid`, `medperc`, `gender`, `closed`, `emailstmsw`, `patliabsw`, `trimmedtitle`, `msgkey`, `emailcc`, `emailpat`, `cellpat`, `depcod`, `noedi`, `id_number`, `authcode`) VALUES
(1, '', '987', '987', '987', 0, '987', '987', '89', '', '', '78', '987', '', '0000-00-00', '', '', '8', '98', '97', '', '987', '987', 0, 0, 0, 0, '', '', '', 0, 0, '0000-00-00', '0000-00-00', 0, '97', 0, 0, '798', 'false', 'true', '', '', '', '', '', '', '', 'false', '789', '87');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ms_users`
--

INSERT INTO `ms_users` (`id`, `user_id`, `firstname`, `lastname`, `phone`, `username`, `user_password_hash`, `gender`, `dob`, `email`, `user_active`, `user_account_type`, `user_has_avatar`, `user_rememberme_token`, `user_creation_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`, `user_facebook_uid`) VALUES
(1, 1, 'Kwasi', 'Kgwete', NULL, 'super777', '$2y$10$rn6rdqBmr51w3xJTR22LjuiGhkiW3uSy3cD4qPPegaacpEUrZKsWq', NULL, NULL, 'kabelokwasi@gmail.com', 0, 'Admin', 0, NULL, 1424733267, 1427566718, 0, NULL, '54507', NULL, NULL, 'DEFAULT', NULL),
(9, 9, 'Mpedi', 'Mello', '0790788189', 'admin', '$2y$10$hlJLX2ut8bLX2Q1EI/ZB6Ou5D3e5uIUcTsPgQb9gWweY.94IzPumO', 'M', '1992-09-19', 'mp.mello5@gmail.com', 1, 'User', 0, NULL, NULL, 1426956504, 0, NULL, NULL, NULL, NULL, 'DEFAULT', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
