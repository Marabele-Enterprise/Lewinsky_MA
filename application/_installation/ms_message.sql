-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2015 at 08:42 PM
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
-- Table structure for table `ms_message`
--

CREATE TABLE IF NOT EXISTS `ms_message` (
`Message_id` int(11) NOT NULL,
  `msg_category` varchar(70) NOT NULL,
  `120_day_msg` varchar(180) NOT NULL,
  `90 _day_msg` varchar(180) NOT NULL,
  `60_day_msg` varchar(180) NOT NULL,
  `30_day_msg` varchar(180) NOT NULL,
  `current_day_msg` varchar(180) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ms_message`
--

INSERT INTO `ms_message` (`Message_id`, `msg_category`, `120_day_msg`, `90 _day_msg`, `60_day_msg`, `30_day_msg`, `current_day_msg`) VALUES
(2, 'Public ', '122_day_msg', '', '68_day_msg', '33_nay_msg', 'current_bay_msg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_message`
--
ALTER TABLE `ms_message`
 ADD PRIMARY KEY (`Message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_message`
--
ALTER TABLE `ms_message`
MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
