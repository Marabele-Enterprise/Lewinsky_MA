-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 05:22 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

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
(106, 'Login Clicked', 'Navigation', '2015-02-19 14:03:45', -1, '41.13.0.80', 'r4o0Stsh1lxaPA6', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
