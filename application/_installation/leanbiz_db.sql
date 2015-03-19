-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2015 at 02:35 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leanbiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lb_action_log`
--

CREATE TABLE IF NOT EXISTS `lb_action_log` (
  `action_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(200) NOT NULL,
  `category` varchar(150) NOT NULL,
  `action_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(60) DEFAULT NULL,
  `session_id` varchar(20) NOT NULL,
  `test_label` varchar(10) NOT NULL,
  PRIMARY KEY (`action_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=329 ;

--
-- Dumping data for table `lb_action_log`
--

INSERT INTO `lb_action_log` (`action_log_id`, `action`, `category`, `action_date`, `user_id`, `user_ip`, `session_id`, `test_label`) VALUES
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
(107, 'Logout Successful', 'Login', '2015-02-23 20:53:21', -1, '::1', 'gvOUpIYbiWa7ucw', 'A'),
(108, 'Registration Successful', 'Register', '2015-02-23 23:14:27', 1, '::1', 's5xkNomGzcBbVrt', 'A'),
(109, 'Login Successful', 'Login', '2015-02-23 23:54:32', 1, '::1', 's5xkNomGzcBbVrt', 'A'),
(110, 'Entered Home Page', 'Navigation', '2015-02-26 20:01:34', -1, '::1', 'GDj53yPVUuzkQ6N', 'A'),
(111, 'Login Successful', 'Login', '2015-02-26 20:02:27', 1, '::1', 'GDj53yPVUuzkQ6N', 'A'),
(112, 'Entered Home Page', 'Navigation', '2015-02-26 20:02:27', 1, '::1', 'T07ChOjIELvkufo', 'A'),
(113, 'Logout Successful', 'Login', '2015-02-26 20:02:46', 1, '::1', 'T07ChOjIELvkufo', 'A'),
(114, 'Entered Home Page', 'Navigation', '2015-02-26 20:02:46', -1, '::1', 'HYzW6quSCR8AmtX', 'A'),
(115, 'Login Successful', 'Login', '2015-02-26 20:05:04', 1, '::1', 'HYzW6quSCR8AmtX', 'A'),
(116, 'Entered Home Page', 'Navigation', '2015-02-26 20:05:04', 1, '::1', '3NqfZ89QR7gywKS', 'A'),
(117, 'Entered Home Page', 'Navigation', '2015-02-26 21:00:36', 1, '::1', 'D6jbwUygtCe18Zo', 'A'),
(118, 'Entered Home Page', 'Navigation', '2015-02-26 21:27:03', 1, '::1', 'v6nO7dblN1Paq5T', 'A'),
(119, 'Entered Home Page', 'Navigation', '2015-02-26 21:29:27', 1, '::1', 'Kg0atRFYd5Z2nmr', 'A'),
(120, 'Entered Home Page', 'Navigation', '2015-02-27 20:49:17', -1, '::1', '7C0Zl9MhVR4IvUd', 'A'),
(121, 'Logout Successful', 'Login', '2015-02-28 20:04:18', 13, '::1', '7C0Zl9MhVR4IvUd', 'A'),
(122, 'Logout Successful', 'Login', '2015-02-28 20:04:18', -1, '::1', 'RWk7rH6EsfzQPLh', 'A'),
(123, 'Logout Successful', 'Login', '2015-02-28 20:04:19', -1, '::1', 'VLeXzF6S2DWigGH', 'A'),
(124, 'Logout Successful', 'Login', '2015-02-28 20:04:20', -1, '::1', 'MaoQLJz0w42PiAd', 'A'),
(125, 'Logout Successful', 'Login', '2015-02-28 20:04:20', -1, '::1', 'MaoQLJz0w42PiAd', 'A'),
(126, 'Logout Successful', 'Login', '2015-02-28 20:04:21', -1, '::1', 'Q6fYBPphTl8cwm9', 'A'),
(127, 'Login Successful', 'Login', '2015-02-28 20:05:00', 1, '::1', 'NsMf1B8Tilqz5hI', 'A'),
(128, 'Entered Home Page', 'Navigation', '2015-02-28 20:05:00', 1, '::1', 'dVEjPh5sSvwK21x', 'A'),
(129, 'Entered Home Page', 'Navigation', '2015-03-01 13:33:27', -1, '::1', 'HYOF7aGyAKnXr9q', 'A'),
(130, 'Entered Home Page', 'Navigation', '2015-03-01 13:36:01', -1, '::1', 'pxE3chXovS2VRr6', 'A'),
(131, 'Entered Home Page', 'Navigation', '2015-03-01 13:41:01', -1, '::1', 'Sco6aCYNlpdKOmB', 'A'),
(132, 'Entered Home Page', 'Navigation', '2015-03-01 13:41:08', -1, '::1', 'NyOdVLTwE9X0SWv', 'A'),
(133, 'Entered Home Page', 'Navigation', '2015-03-01 13:41:46', -1, '::1', 'rU7eYvWgMLG9K1h', 'A'),
(134, 'Entered Home Page', 'Navigation', '2015-03-01 13:41:51', -1, '::1', 'E0pxyZtfYh4jelP', 'A'),
(135, 'Entered Home Page', 'Navigation', '2015-03-01 13:52:33', -1, '::1', 'CN8KiMlFR6zYaUW', 'A'),
(136, 'Entered Home Page', 'Navigation', '2015-03-01 13:55:19', -1, '::1', '31zct9jGOJlVWrX', 'A'),
(137, 'Entered Home Page', 'Navigation', '2015-03-01 13:56:08', -1, '::1', 'q9ws0zBuy5IanUH', 'A'),
(138, 'Entered Home Page', 'Navigation', '2015-03-01 13:57:14', -1, '::1', 'bxLQX9nPh0KfwuM', 'A'),
(139, 'Entered Home Page', 'Navigation', '2015-03-01 13:57:57', -1, '::1', 'TEr9gOPD0t12yXw', 'A'),
(140, 'Entered Home Page', 'Navigation', '2015-03-01 13:59:21', -1, '::1', '4eUrm5RgZlhbOP8', 'A'),
(141, 'Entered Home Page', 'Navigation', '2015-03-01 13:59:31', -1, '::1', '01WAglEdbmrF3wI', 'A'),
(142, 'Entered Home Page', 'Navigation', '2015-03-01 13:59:45', -1, '::1', 'At7oEx9Zh6XyTWQ', 'A'),
(143, 'Entered Home Page', 'Navigation', '2015-03-01 13:59:53', -1, '::1', '1rxAToU3sQ0hGS2', 'A'),
(144, 'Entered Home Page', 'Navigation', '2015-03-01 14:00:00', -1, '::1', 'B3gFlJ2WcUumskL', 'A'),
(145, 'Entered Home Page', 'Navigation', '2015-03-01 14:00:17', -1, '::1', 'OlFrjtx3w7BdJc5', 'A'),
(146, 'Entered Home Page', 'Navigation', '2015-03-01 14:00:21', -1, '::1', 'jgdyzkpRX72iLNf', 'A'),
(147, 'Entered Home Page', 'Navigation', '2015-03-01 14:00:48', -1, '::1', 'eLUJSfwWRpvcACX', 'A'),
(148, 'Entered Home Page', 'Navigation', '2015-03-01 14:01:12', -1, '::1', '9ohJWrE7DibYa6y', 'A'),
(149, 'Entered Home Page', 'Navigation', '2015-03-01 14:01:48', -1, '::1', 'S0viV8lakRTtNHp', 'A'),
(150, 'Entered Home Page', 'Navigation', '2015-03-01 14:01:55', -1, '::1', '5gvhPi9zCqKYpyQ', 'A'),
(151, 'Entered Home Page', 'Navigation', '2015-03-01 14:02:08', -1, '::1', 'glkGF0uX57czT1Z', 'A'),
(152, 'Entered Home Page', 'Navigation', '2015-03-01 14:03:54', -1, '::1', 'GryEHaWiuR6qP0V', 'A'),
(153, 'Entered Home Page', 'Navigation', '2015-03-01 14:09:39', -1, '::1', '0IGCs3e9dZQb5t4', 'A'),
(154, 'Entered Home Page', 'Navigation', '2015-03-01 14:11:38', -1, '::1', '8p3iTCNqMBXvn5j', 'A'),
(155, 'Entered Home Page', 'Navigation', '2015-03-01 14:12:45', -1, '::1', 'xoJtr3pXwcv9QS6', 'A'),
(156, 'Entered Home Page', 'Navigation', '2015-03-01 14:14:27', -1, '::1', 'URt0NMhlqHePG6k', 'A'),
(157, 'Entered Home Page', 'Navigation', '2015-03-01 14:14:34', -1, '::1', 'uYx8qr7tP2NgVAG', 'A'),
(158, 'Login Successful', 'Login', '2015-03-01 14:16:05', 1, '::1', 'uYx8qr7tP2NgVAG', 'A'),
(159, 'Entered Home Page', 'Navigation', '2015-03-01 14:16:06', 1, '::1', 'qzEuw35mYLDgGBI', 'A'),
(160, 'Entered Home Page', 'Navigation', '2015-03-01 21:27:25', 1, '::1', 'CcghZzDa8t6nEYS', 'A'),
(161, 'Entered Home Page', 'Navigation', '2015-03-02 18:41:06', -1, '::1', 'K7z54OtxAHZLRNM', 'A'),
(162, 'Login Successful', 'Login', '2015-03-02 18:42:22', 1, '::1', 'K7z54OtxAHZLRNM', 'A'),
(163, 'Entered Home Page', 'Navigation', '2015-03-02 18:42:23', 1, '::1', 'DZyrUdJmtx6M3TK', 'A'),
(164, 'Entered Home Page', 'Navigation', '2015-03-02 18:51:00', 1, '::1', 'cxH7MauCSy3NQ0e', 'A'),
(165, 'Entered Home Page', 'Navigation', '2015-03-03 19:08:31', -1, '::1', 'W9zNHFaVCxuXDgl', 'A'),
(166, 'Entered Home Page', 'Navigation', '2015-03-03 19:11:22', -1, '::1', 'X5h3F4DbvnSrU7g', 'A'),
(167, 'Entered Home Page', 'Navigation', '2015-03-03 19:23:38', -1, '::1', 'NT6gzlfH9iaXcMO', 'A'),
(168, 'Entered Home Page', 'Navigation', '2015-03-03 19:28:09', -1, '::1', 'nuJysHPaALr0M8Q', 'A'),
(169, 'Entered Home Page', 'Navigation', '2015-03-03 19:28:54', -1, '::1', 'YKCkmQcGhySRutf', 'A'),
(170, 'Entered Home Page', 'Navigation', '2015-03-03 19:29:04', -1, '::1', 'zwdO1RQUmHnJo6Z', 'A'),
(171, 'Entered Home Page', 'Navigation', '2015-03-03 19:31:05', -1, '::1', 'hRolOErgUm1IGKQ', 'A'),
(172, 'Entered Home Page', 'Navigation', '2015-03-03 19:31:07', -1, '::1', 'RB5vfkEU1omNIdj', 'A'),
(173, 'Entered Home Page', 'Navigation', '2015-03-03 19:31:08', -1, '::1', '7DUWvpVFij8mKS2', 'A'),
(174, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:18', -1, '::1', 'ZA5jxT86i27KbIL', 'A'),
(175, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:19', -1, '::1', '9lENwWyod42YAju', 'A'),
(176, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:20', -1, '::1', 'TZFaNK2UHxs1rom', 'A'),
(177, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:22', -1, '::1', 'KYdrxQ9SE2UvHWh', 'A'),
(178, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:22', -1, '::1', 'muwVSaMivQX8ogJ', 'A'),
(179, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:23', -1, '::1', '6pilZYHRPoAOJyq', 'A'),
(180, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:24', -1, '::1', 'xmv5SDRNp0zi6h3', 'A'),
(181, 'Entered Home Page', 'Navigation', '2015-03-03 19:33:24', -1, '::1', 'z7xWfSDLFIr59At', 'A'),
(182, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:24', -1, '::1', 'qaQ7iEIM25lc6yN', 'A'),
(183, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:25', -1, '::1', 'GFtzU9Lwa6OPpHI', 'A'),
(184, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:26', -1, '::1', 'HufGvNrT9oJzPj0', 'A'),
(185, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:27', -1, '::1', 'phsq76c9wXobxTZ', 'A'),
(186, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:27', -1, '::1', '5zX2ZmYoRJBkvW1', 'A'),
(187, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:28', -1, '::1', 'ZB4i8UTM0pqGCzL', 'A'),
(188, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:29', -1, '::1', 'POGYt1aVErQyscA', 'A'),
(189, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:30', -1, '::1', '9tXSRj1zqF325hJ', 'A'),
(190, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:31', -1, '::1', 'yWLeYzogapHthIC', 'A'),
(191, 'Entered Home Page', 'Navigation', '2015-03-03 19:34:32', -1, '::1', 'AYo4ylgMixGK5DZ', 'A'),
(192, 'Entered Home Page', 'Navigation', '2015-03-03 19:36:38', -1, '::1', 'Jim6UtyuQZnD7F0', 'A'),
(193, 'Entered Home Page', 'Navigation', '2015-03-03 19:39:36', -1, '::1', '2Y0Dolmtws6CVxI', 'A'),
(194, 'Entered Home Page', 'Navigation', '2015-03-03 19:41:07', -1, '::1', 'NIcJG3Z0moTB1zt', 'A'),
(195, 'Entered Home Page', 'Navigation', '2015-03-03 19:41:09', -1, '::1', 'rtLFAsPxwHz45fQ', 'A'),
(196, 'Entered Home Page', 'Navigation', '2015-03-03 19:42:41', -1, '::1', 'KYdrxQ9SE2UvHWh', 'A'),
(197, 'Entered Home Page', 'Navigation', '2015-03-03 19:43:49', -1, '::1', 'LNijB5xHIhS4ae2', 'A'),
(198, 'Entered Home Page', 'Navigation', '2015-03-03 19:46:01', -1, '::1', 'eofJq0DG9kwYbrV', 'A'),
(199, 'Entered Home Page', 'Navigation', '2015-03-03 19:46:02', -1, '::1', 'VvQ8MRb9TkdU73f', 'A'),
(200, 'Entered Home Page', 'Navigation', '2015-03-03 19:50:56', -1, '::1', 'pUjL08nT6dqIYrt', 'A'),
(201, 'Entered Home Page', 'Navigation', '2015-03-03 19:50:57', -1, '::1', 'RLvyTJeOjzZuNCB', 'A'),
(202, 'Entered Home Page', 'Navigation', '2015-03-03 20:06:06', -1, '::1', 'SI8FCps0xtB7RGX', 'A'),
(203, 'Entered Home Page', 'Navigation', '2015-03-03 20:06:07', -1, '::1', 'AiFjrlw2xd1TLJc', 'A'),
(204, 'Entered Home Page', 'Navigation', '2015-03-03 20:06:10', -1, '::1', '9AiIvR6m1Da8SHV', 'A'),
(205, 'Entered Home Page', 'Navigation', '2015-03-03 20:06:11', -1, '::1', 'V9UoJIkE7pHbxdf', 'A'),
(206, 'Entered Home Page', 'Navigation', '2015-03-03 20:06:13', -1, '::1', 'x9zvDJ6CnpKN3W5', 'A'),
(207, 'Entered Home Page', 'Navigation', '2015-03-03 20:06:14', -1, '::1', 'OPuFeKL1Xzp7Bkr', 'A'),
(208, 'Entered Home Page', 'Navigation', '2015-03-04 17:23:39', -1, '::1', 'KPvTgtQzUdONLV3', 'A'),
(209, 'Entered Home Page', 'Navigation', '2015-03-04 17:23:39', -1, '::1', 'KPvTgtQzUdONLV3', 'A'),
(210, 'Entered Home Page', 'Navigation', '2015-03-05 11:38:11', 16, '::1', 'lim7e2ftH36EGCN', 'A'),
(211, 'Entered Home Page', 'Navigation', '2015-03-05 18:55:29', -1, '::1', 'IdqaENsg296olA8', 'A'),
(212, 'Login Successful', 'Login', '2015-03-05 18:59:15', 1, '::1', 'IdqaENsg296olA8', 'A'),
(213, 'Entered Home Page', 'Navigation', '2015-03-05 18:59:15', 1, '::1', 'EtmsdOfnKXVaNpQ', 'A'),
(214, 'Entered Home Page', 'Navigation', '2015-03-05 21:24:05', -1, '::1', 'QhUFR3cpNPl5W8Z', 'A'),
(215, 'Login Successful', 'Login', '2015-03-05 21:24:23', 1, '::1', 'QhUFR3cpNPl5W8Z', 'A'),
(216, 'Entered Home Page', 'Navigation', '2015-03-05 21:24:23', 1, '::1', 'SFeCynZE5utflHb', 'A'),
(217, 'Entered Home Page', 'Navigation', '2015-03-06 13:59:33', -1, '::1', 'komZn3LxWTXBv1y', 'A'),
(218, 'Login Successful', 'Login', '2015-03-06 14:01:19', 1, '::1', 'komZn3LxWTXBv1y', 'A'),
(219, 'Entered Home Page', 'Navigation', '2015-03-06 14:01:19', 1, '::1', 'Xw6ePOkRbUc82gN', 'A'),
(220, 'Entered Home Page', 'Navigation', '2015-03-06 19:31:14', -1, '::1', 'Uxk2gmrLh1wlWOY', 'A'),
(221, 'Entered Home Page', 'Navigation', '2015-03-06 19:31:29', -1, '::1', 'JgF4XlYcUenWKtx', 'A'),
(222, 'Entered Home Page', 'Navigation', '2015-03-06 19:31:29', -1, '::1', 'JgF4XlYcUenWKtx', 'A'),
(223, 'Entered Home Page', 'Navigation', '2015-03-06 21:51:16', -1, '::1', 'b2WoIkTMPUjvsFu', 'A'),
(224, 'Entered Home Page', 'Navigation', '2015-03-06 21:51:16', -1, '::1', 'U4wfOR3XkQdmEs6', 'A'),
(225, 'Login Successful', 'Login', '2015-03-06 22:29:39', 1, '::1', 'U4wfOR3XkQdmEs6', 'A'),
(226, 'Entered Home Page', 'Navigation', '2015-03-06 22:29:39', 1, '::1', '4aJxkbC7DUYluRn', 'A'),
(227, 'Entered Home Page', 'Navigation', '2015-03-06 22:32:34', 1, '::1', 'ZkHNcifeW0D2Slr', 'A'),
(228, 'Entered Home Page', 'Navigation', '2015-03-06 22:32:34', 1, '::1', 'DbOIgoEdtpJHX17', 'A'),
(229, 'Logout Successful', 'Login', '2015-03-06 22:32:44', 1, '::1', 'DbOIgoEdtpJHX17', 'A'),
(230, 'Entered Home Page', 'Navigation', '2015-03-06 22:32:45', -1, '::1', 'aueVOGUYN1h8Mnx', 'A'),
(231, 'Logout Successful', 'Login', '2015-03-06 22:41:47', -1, '::1', 'aueVOGUYN1h8Mnx', 'A'),
(232, 'Entered Home Page', 'Navigation', '2015-03-06 22:41:48', -1, '::1', 'lguxGMvRm29HODq', 'A'),
(233, 'Entered Home Page', 'Navigation', '2015-03-06 22:48:31', -1, '::1', 'rAPl6t5yQZ82L0M', 'A'),
(234, 'Entered Home Page', 'Navigation', '2015-03-06 22:48:32', -1, '::1', 'QfAUDp5mId79jBO', 'A'),
(235, 'Entered Home Page', 'Navigation', '2015-03-06 22:48:46', -1, '::1', 'FIQXkA1H7b8t9Pa', 'A'),
(236, 'Entered Home Page', 'Navigation', '2015-03-06 22:48:46', -1, '::1', 'XErgvKOs9iWFM1a', 'A'),
(237, 'Entered Home Page', 'Navigation', '2015-03-06 22:48:54', -1, '::1', 'UWvJnyP4m92HexR', 'A'),
(238, 'Entered Home Page', 'Navigation', '2015-03-06 22:48:54', -1, '::1', 'nLyseRox4iVQEcw', 'A'),
(239, 'Entered Home Page', 'Navigation', '2015-03-06 22:49:10', -1, '::1', 'tU5zqTXmCiabpAs', 'A'),
(240, 'Entered Home Page', 'Navigation', '2015-03-06 22:49:11', -1, '::1', 'jxS49zHTp7ChEUG', 'A'),
(241, 'Entered Home Page', 'Navigation', '2015-03-06 22:49:20', -1, '::1', 'p3RKzNh7vPcX2OL', 'A'),
(242, 'Entered Home Page', 'Navigation', '2015-03-06 22:49:20', -1, '::1', '4hDN2u5qWZHOKij', 'A'),
(243, 'Login Failed', 'Login', '2015-03-06 22:49:56', -1, '::1', '4hDN2u5qWZHOKij', 'A'),
(244, 'Login Failed', 'Login', '2015-03-06 22:51:04', -1, '::1', '4hDN2u5qWZHOKij', 'A'),
(245, 'Entered Home Page', 'Navigation', '2015-03-06 23:05:28', -1, '::1', '3slZ48EgNpkKSRT', 'A'),
(246, 'Entered Home Page', 'Navigation', '2015-03-06 23:05:34', -1, '::1', 'Tt80WJaY4roLVKg', 'A'),
(247, 'Entered Home Page', 'Navigation', '2015-03-06 23:05:34', -1, '::1', 'CX0IF4Vekhpdz6K', 'A'),
(248, 'Login Successful', 'Login', '2015-03-06 23:05:53', 1, '::1', 'CX0IF4Vekhpdz6K', 'A'),
(249, 'Entered Home Page', 'Navigation', '2015-03-06 23:05:53', 1, '::1', 'ACXxwLcnOsGZJFt', 'A'),
(250, 'Entered Home Page', 'Navigation', '2015-03-06 23:06:02', -1, '::1', 'sknJcOwKXAMNB3D', 'A'),
(251, 'Entered Home Page', 'Navigation', '2015-03-06 23:06:03', 1, '::1', 'FO2GfEbmq45vL3S', 'A'),
(252, 'Entered Home Page', 'Navigation', '2015-03-07 00:08:14', 1, '::1', 'LXlRafVwJi361x8', 'A'),
(253, 'Logout Successful', 'Login', '2015-03-07 00:08:23', 1, '::1', 'LXlRafVwJi361x8', 'A'),
(254, 'Entered Home Page', 'Navigation', '2015-03-07 00:08:23', -1, '::1', 'yLtEa1KMuRbVix7', 'A'),
(255, 'Entered Home Page', 'Navigation', '2015-03-07 00:08:29', -1, '::1', 'cMW5szVoAykaXgH', 'A'),
(256, 'Entered Home Page', 'Navigation', '2015-03-07 15:35:07', -1, '::1', '30yOVgiJB8cZCE2', 'A'),
(257, 'Login Successful', 'Login', '2015-03-07 15:35:13', 1, '::1', '30yOVgiJB8cZCE2', 'A'),
(258, 'Entered Home Page', 'Navigation', '2015-03-07 15:35:13', 1, '::1', 'UT3F5BNVi1tzqYf', 'A'),
(259, 'Logout Successful', 'Login', '2015-03-07 15:57:52', 1, '::1', 'UT3F5BNVi1tzqYf', 'A'),
(260, 'Entered Home Page', 'Navigation', '2015-03-07 15:57:52', -1, '::1', 'fLjaxvAEJ6gclTu', 'A'),
(261, 'Login Failed', 'Login', '2015-03-07 15:58:02', -1, '::1', 'fLjaxvAEJ6gclTu', 'A'),
(262, 'Login Failed', 'Login', '2015-03-07 16:00:40', -1, '::1', 'fLjaxvAEJ6gclTu', 'A'),
(263, 'Entered Home Page', 'Navigation', '2015-03-07 16:02:58', -1, '::1', 'gjqw32ySKMmhDoF', 'A'),
(264, 'Login Failed', 'Login', '2015-03-07 16:03:08', -1, '::1', 'gjqw32ySKMmhDoF', 'A'),
(265, 'Entered Home Page', 'Navigation', '2015-03-08 11:00:48', -1, '::1', 'cMW5szVoAykaXgH', 'A'),
(266, 'Entered Home Page', 'Navigation', '2015-03-08 11:01:27', -1, '::1', '8lno4bzH1tFQuvs', 'A'),
(267, 'Login Failed', 'Login', '2015-03-08 11:01:41', -1, '::1', '8lno4bzH1tFQuvs', 'A'),
(268, 'Login Successful', 'Login', '2015-03-08 11:02:19', 1, '::1', '8lno4bzH1tFQuvs', 'A'),
(269, 'Entered Home Page', 'Navigation', '2015-03-08 11:02:19', 1, '::1', 'LrfQ23buqh9GtcH', 'A'),
(270, 'Entered Home Page', 'Navigation', '2015-03-09 09:11:19', 1, '::1', 'EHqUfxvWhpQVaMJ', 'A'),
(271, 'Entered Home Page', 'Navigation', '2015-03-09 10:38:18', -1, '::1', 'XfzMCdQ6xqstDen', 'A'),
(272, 'Entered Home Page', 'Navigation', '2015-03-09 10:39:20', -1, '::1', 'Lft69IKQNcV8XqO', 'A'),
(273, 'Login Successful', 'Login', '2015-03-09 10:39:26', 1, '::1', 'Lft69IKQNcV8XqO', 'A'),
(274, 'Entered Home Page', 'Navigation', '2015-03-09 10:39:27', 1, '::1', '4Q2vFAgV5ScJimr', 'A'),
(275, 'Entered Home Page', 'Navigation', '2015-03-09 10:39:33', -1, '::1', '1XZCAp9eLPb2fzk', 'A'),
(276, 'Login Successful', 'Login', '2015-03-09 10:40:11', 1, '::1', '1XZCAp9eLPb2fzk', 'A'),
(277, 'Entered Home Page', 'Navigation', '2015-03-09 10:40:12', 1, '::1', 'hsdgAfnXo73MqVR', 'A'),
(278, 'Entered Home Page', 'Navigation', '2015-03-09 10:40:28', -1, '::1', 'iWaoClRL74QXGwY', 'A'),
(279, 'Login Successful', 'Login', '2015-03-09 10:40:36', 1, '::1', 'iWaoClRL74QXGwY', 'A'),
(280, 'Entered Home Page', 'Navigation', '2015-03-09 10:40:36', 1, '::1', 'OcoMhrsevVimg3R', 'A'),
(281, 'Entered Home Page', 'Navigation', '2015-03-09 10:41:42', -1, '::1', 'J2k1lVqMDUidYgC', 'A'),
(282, 'Entered Home Page', 'Navigation', '2015-03-09 10:41:46', -1, '::1', 'Pwcbl2XBTdIeuGZ', 'A'),
(283, 'Login Successful', 'Login', '2015-03-09 10:42:09', 1, '::1', 'Pwcbl2XBTdIeuGZ', 'A'),
(284, 'Entered Home Page', 'Navigation', '2015-03-09 10:42:09', 1, '::1', 'kwr0P9t5Tuqxyog', 'A'),
(285, 'Entered Home Page', 'Navigation', '2015-03-09 10:42:44', -1, '::1', 'XLkdzsHgVM2jv7G', 'A'),
(286, 'Login Successful', 'Login', '2015-03-09 10:42:59', 1, '::1', 'XLkdzsHgVM2jv7G', 'A'),
(287, 'Entered Home Page', 'Navigation', '2015-03-09 10:43:00', 1, '::1', 'uAI9dTwapLQ1V3h', 'A'),
(288, 'Entered Home Page', 'Navigation', '2015-03-09 10:43:11', 1, '::1', 'TVqAXxgCUcv9ZKh', 'A'),
(289, 'Entered Home Page', 'Navigation', '2015-03-09 10:43:32', -1, '::1', 'wapcF2Gjhg5I9L0', 'A'),
(290, 'Login Successful', 'Login', '2015-03-09 10:43:35', 1, '::1', 'wapcF2Gjhg5I9L0', 'A'),
(291, 'Entered Home Page', 'Navigation', '2015-03-09 10:43:36', 1, '::1', 'kSq2yQR1ZIvtXGF', 'A'),
(292, 'Entered Home Page', 'Navigation', '2015-03-09 19:49:11', -1, '::1', 'OnxquWjZrIclhMe', 'A'),
(293, 'Entered Home Page', 'Navigation', '2015-03-11 15:34:55', -1, '::1', 'uPKiWblM6OmgDy1', 'A'),
(294, 'Entered Home Page', 'Navigation', '2015-03-12 21:21:14', -1, '::1', 'rEnDqoAdyU3g2tO', 'A'),
(295, 'Login Successful', 'Login', '2015-03-12 21:21:19', 1, '::1', 'rEnDqoAdyU3g2tO', 'A'),
(296, 'Entered Home Page', 'Navigation', '2015-03-12 21:21:20', 1, '::1', 'q2XTm6S1lPK4thZ', 'A'),
(297, 'Entered Home Page', 'Navigation', '2015-03-13 17:21:23', -1, '::1', 'Pre2OCMwEL7xmBI', 'A'),
(298, 'Login Successful', 'Login', '2015-03-13 17:22:11', 1, '::1', 'Pre2OCMwEL7xmBI', 'A'),
(299, 'Entered Home Page', 'Navigation', '2015-03-13 17:22:11', 1, '::1', 'vK8BlLSGotiMRYA', 'A'),
(300, 'Entered Home Page', 'Navigation', '2015-03-13 17:22:24', -1, '::1', 'GF3qZuvAaKpJTi8', 'A'),
(301, 'Login Successful', 'Login', '2015-03-13 17:23:07', 1, '::1', 'GF3qZuvAaKpJTi8', 'A'),
(302, 'Entered Home Page', 'Navigation', '2015-03-13 17:23:07', 1, '::1', 'MvARxPiZaYpSdwt', 'A'),
(303, 'Entered Home Page', 'Navigation', '2015-03-13 17:23:30', -1, '::1', 'yMiPrt0oQRxOIqk', 'A'),
(304, 'Login Successful', 'Login', '2015-03-13 18:01:11', 1, '::1', 'yMiPrt0oQRxOIqk', 'A'),
(305, 'Entered Home Page', 'Navigation', '2015-03-13 18:01:11', 1, '::1', 'TtY5SMpNaOJi0lw', 'A'),
(306, 'Entered Home Page', 'Navigation', '2015-03-14 21:02:54', 1, '::1', 'ndaholDAFI91KHk', 'A'),
(307, 'Entered Home Page', 'Navigation', '2015-03-16 20:29:34', -1, '::1', 'Z2mp0OGvjJalNnD', 'A'),
(308, 'Login Successful', 'Login', '2015-03-16 20:31:23', 1, '::1', 'Z2mp0OGvjJalNnD', 'A'),
(309, 'Entered Home Page', 'Navigation', '2015-03-16 20:31:23', 1, '::1', 'DQ4jbuzBy0EsrM8', 'A'),
(310, 'Entered Home Page', 'Navigation', '2015-03-17 16:39:36', -1, '::1', 'vsFViA7hMXeaWQZ', 'A'),
(311, 'Login Successful', 'Login', '2015-03-17 16:39:51', 1, '::1', 'vsFViA7hMXeaWQZ', 'A'),
(312, 'Entered Home Page', 'Navigation', '2015-03-17 16:39:52', 1, '::1', 'wkRm18Y6TdCfoys', 'A'),
(313, 'Entered Home Page', 'Navigation', '2015-03-17 19:45:57', 1, '::1', 'bal1Gdxz29wZoJM', 'A'),
(314, 'Entered Home Page', 'Navigation', '2015-03-18 00:11:06', 1, '::1', 'siztyVhnZHLlGek', 'A'),
(315, 'Entered Home Page', 'Navigation', '2015-03-18 00:11:26', 1, '::1', 'H9p6v2thFlyT3UJ', 'A'),
(316, 'Entered Home Page', 'Navigation', '2015-03-18 00:20:16', 1, '::1', 'Ed5cUeMhNlWjvFy', 'A'),
(317, 'Entered Home Page', 'Navigation', '2015-03-18 00:22:21', 1, '::1', 'rfe2ERDbgzklAQI', 'A'),
(318, 'Entered Home Page', 'Navigation', '2015-03-18 00:23:46', 1, '::1', 'avSJBcsoDFRhLGX', 'A'),
(319, 'Entered Home Page', 'Navigation', '2015-03-18 00:24:07', 1, '::1', 'PDG9yN3vncdSJiC', 'A'),
(320, 'Entered Home Page', 'Navigation', '2015-03-18 00:26:14', 1, '::1', 'xlPBAHjoTCUqDd9', 'A'),
(321, 'Entered Home Page', 'Navigation', '2015-03-18 00:28:23', 1, '::1', '187nVq3uJs9ZkjC', 'A'),
(322, 'Entered Home Page', 'Navigation', '2015-03-18 00:28:39', 1, '::1', 'VEfZ50JjzthkgMq', 'A'),
(323, 'Logout Successful', 'Login', '2015-03-18 00:29:05', 1, '::1', 'VEfZ50JjzthkgMq', 'A'),
(324, 'Entered Home Page', 'Navigation', '2015-03-18 00:29:40', -1, '::1', 'Mf5IkYO7deVhFoD', 'A'),
(325, 'Entered Home Page', 'Navigation', '2015-03-18 00:30:17', -1, '::1', 'P6mYI8aKDE0Xx4U', 'A'),
(326, 'Login Successful', 'Login', '2015-03-18 00:32:42', 1, '::1', 'P6mYI8aKDE0Xx4U', 'A'),
(327, 'Entered Home Page', 'Navigation', '2015-03-18 00:32:42', 1, '::1', 'RtUdHwzSAlkOQBg', 'A'),
(328, 'Entered Home Page', 'Navigation', '2015-03-18 00:33:34', 1, '::1', '5ifzNd8bOS9yAeU', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `lb_canvas`
--

CREATE TABLE IF NOT EXISTS `lb_canvas` (
  `canvas_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`canvas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lb_canvas`
--

INSERT INTO `lb_canvas` (`canvas_id`, `title`, `user_id`, `team_id`) VALUES
(1, 'LeanBiz', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lb_canvas_version`
--

CREATE TABLE IF NOT EXISTS `lb_canvas_version` (
  `canvas_version_id` int(11) NOT NULL AUTO_INCREMENT,
  `canvas_id` int(11) NOT NULL,
  `canvas_version` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`canvas_version_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lb_canvas_version`
--

INSERT INTO `lb_canvas_version` (`canvas_version_id`, `canvas_id`, `canvas_version`, `creation_date`) VALUES
(1, 1, 1, '2015-03-17 20:01:23'),
(2, 1, 2, '2015-03-17 21:29:31'),
(3, 1, 3, '2015-03-17 22:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `lb_comment`
--

CREATE TABLE IF NOT EXISTS `lb_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `item_id` int(11) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `downvotes` int(11) NOT NULL DEFAULT '0',
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lb_customer_interview`
--

CREATE TABLE IF NOT EXISTS `lb_customer_interview` (
  `customer_interview_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hypotheses_ids` varchar(100) NOT NULL,
  `customer_segment` varchar(150) NOT NULL DEFAULT 'None',
  `customer_names` varchar(200) NOT NULL,
  `customer_contact` varchar(150) NOT NULL,
  `interview_type` varchar(150) NOT NULL,
  `interview_date` date NOT NULL,
  `interview_notes` text NOT NULL,
  `key_insights` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_interview_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lb_hypothesis`
--

CREATE TABLE IF NOT EXISTS `lb_hypothesis` (
  `hypothesis_id` int(11) NOT NULL AUTO_INCREMENT,
  `hypothesis` varchar(300) NOT NULL,
  `category` varchar(150) NOT NULL,
  `priority` varchar(20) NOT NULL DEFAULT 'Medium',
  `canvas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hypothesis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `lb_hypothesis`
--

INSERT INTO `lb_hypothesis` (`hypothesis_id`, `hypothesis`, `category`, `priority`, `canvas_id`, `user_id`, `creation_date`) VALUES
(1, 'High Failure rate of New Ventures', 'Problem', 'Medium', 1, 1, '2015-03-17 20:52:19'),
(2, 'Inefficient ways to track a Startup''s Progress', 'Problem', 'Medium', 1, 1, '2015-03-17 20:55:14'),
(3, 'Customer Development Facilitating Software', 'Solution', 'Medium', 1, 1, '2015-03-17 21:05:35'),
(4, 'Number of new customers per month', 'Key Matrics', 'Medium', 1, 1, '2015-03-17 21:06:50'),
(5, 'Mobile Friendly Customer Development System', 'Unique Value Proposition', 'Medium', 1, 1, '2015-03-17 21:10:20'),
(6, 'Fast Prototyping for Minimum Viable Products', 'Unfair Advantage', 'Medium', 1, 1, '2015-03-17 21:13:26'),
(7, 'Start-Ups', 'Customer Segments', 'Medium', 1, 1, '2015-03-17 21:14:31'),
(8, 'Investors', 'Customer Segments', 'Medium', 1, 1, '2015-03-17 21:16:06'),
(9, 'Web Application', 'Channels', 'Medium', 1, 1, '2015-03-17 21:17:12'),
(10, 'Hosting', 'Cost Structure', 'Medium', 1, 1, '2015-03-17 21:17:51'),
(11, 'Monthly Subscriptions', 'Revenue Streams', 'Medium', 1, 1, '2015-03-17 21:18:35'),
(12, 'Yearly Subscriptions ', 'Revenue Streams', 'Medium', 1, 1, '2015-03-17 21:19:56'),
(13, 'Mobile Application', 'Channels', 'Medium', 1, 1, '2015-03-17 22:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `lb_hypothesis_version`
--

CREATE TABLE IF NOT EXISTS `lb_hypothesis_version` (
  `hypothesis_version_id` int(11) NOT NULL AUTO_INCREMENT,
  `hypothesis_id` int(11) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `status` varchar(150) NOT NULL DEFAULT 'Pending',
  `canvas_id` int(11) NOT NULL,
  `canvas_version_id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hypothesis_version_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `lb_hypothesis_version`
--

INSERT INTO `lb_hypothesis_version` (`hypothesis_version_id`, `hypothesis_id`, `version`, `status`, `canvas_id`, `canvas_version_id`, `creation_date`) VALUES
(1, 1, 1, 'Validated', 1, 1, '2015-03-17 20:52:19'),
(2, 2, 1, 'Pending', 1, 1, '2015-03-17 20:55:14'),
(3, 3, 1, 'Pending', 1, 1, '2015-03-17 21:05:35'),
(4, 4, 1, 'Pending', 1, 1, '2015-03-17 21:06:50'),
(5, 5, 1, 'Pending', 1, 1, '2015-03-17 21:10:20'),
(6, 6, 1, 'Pending', 1, 1, '2015-03-17 21:13:26'),
(7, 7, 1, 'Pending', 1, 1, '2015-03-17 21:14:31'),
(8, 8, 1, 'Pending', 1, 1, '2015-03-17 21:16:06'),
(9, 9, 1, 'Pending', 1, 1, '2015-03-17 21:17:12'),
(10, 10, 1, 'Validated', 1, 1, '2015-03-17 21:17:51'),
(11, 11, 1, 'Pending', 1, 1, '2015-03-17 21:18:35'),
(12, 12, 1, 'Pending', 1, 1, '2015-03-17 21:19:56'),
(13, 1, 1, 'Validated', 1, 2, '2015-03-17 21:29:31'),
(14, 2, 1, 'Pending', 1, 2, '2015-03-17 21:29:31'),
(15, 3, 1, 'Pending', 1, 2, '2015-03-17 21:29:31'),
(16, 4, 1, 'Validated', 1, 2, '2015-03-17 21:29:32'),
(17, 5, 1, 'Pending', 1, 2, '2015-03-17 21:29:32'),
(18, 6, 1, 'Invalidated', 1, 2, '2015-03-17 21:29:32'),
(19, 7, 1, 'Pending', 1, 2, '2015-03-17 21:29:32'),
(20, 8, 1, 'Pending', 1, 2, '2015-03-17 21:29:32'),
(21, 9, 1, 'Validated', 1, 2, '2015-03-17 21:29:32'),
(22, 10, 1, 'Validated', 1, 2, '2015-03-17 21:29:32'),
(23, 11, 1, 'Pending', 1, 2, '2015-03-17 21:29:32'),
(24, 12, 1, 'Pending', 1, 2, '2015-03-17 21:29:32'),
(25, 1, 1, 'Validated', 1, 3, '2015-03-17 22:56:39'),
(26, 2, 1, 'Pending', 1, 3, '2015-03-17 22:56:39'),
(27, 3, 1, 'Pending', 1, 3, '2015-03-17 22:56:39'),
(28, 4, 1, 'Validated', 1, 3, '2015-03-17 22:56:39'),
(29, 5, 1, 'Pending', 1, 3, '2015-03-17 22:56:39'),
(30, 6, 1, 'Invalidated', 1, 3, '2015-03-17 22:56:39'),
(31, 7, 1, 'Pending', 1, 3, '2015-03-17 22:56:39'),
(32, 8, 1, 'Pending', 1, 3, '2015-03-17 22:56:39'),
(33, 9, 1, 'Validated', 1, 3, '2015-03-17 22:56:39'),
(34, 10, 1, 'Validated', 1, 3, '2015-03-17 22:56:39'),
(35, 11, 1, 'Pending', 1, 3, '2015-03-17 22:56:39'),
(36, 12, 1, 'Pending', 1, 3, '2015-03-17 22:56:39'),
(37, 13, 1, 'Pending', 1, 3, '2015-03-17 22:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `lb_team`
--

CREATE TABLE IF NOT EXISTS `lb_team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `ranking` varchar(150) NOT NULL DEFAULT 'Novice',
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lb_team`
--

INSERT INTO `lb_team` (`team_id`, `creator_id`, `ranking`, `creation_date`) VALUES
(1, 1, 'Novice', '2015-03-17 20:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `lb_team_user`
--

CREATE TABLE IF NOT EXISTS `lb_team_user` (
  `team_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Joined',
  `ranking` varchar(150) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`team_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lb_users`
--

CREATE TABLE IF NOT EXISTS `lb_users` (
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
-- Dumping data for table `lb_users`
--

INSERT INTO `lb_users` (`id`, `user_id`, `firstname`, `lastname`, `phone`, `username`, `user_password_hash`, `gender`, `dob`, `email`, `user_active`, `user_account_type`, `user_has_avatar`, `user_rememberme_token`, `user_creation_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`, `user_facebook_uid`) VALUES
(1, 1, 'Kwasi', 'Kgwete', NULL, 'super777', '$2y$10$rn6rdqBmr51w3xJTR22LjuiGhkiW3uSy3cD4qPPegaacpEUrZKsWq', NULL, NULL, 'kabelokwasi@gmail.com', 0, 'Admin', 0, NULL, 1424733267, 1426638762, 0, NULL, '54507', NULL, NULL, 'DEFAULT', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
