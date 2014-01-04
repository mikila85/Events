-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2014 at 01:08 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventsdb`
--
CREATE DATABASE IF NOT EXISTS `eventsdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eventsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `related_to_ID` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` int(11) NOT NULL,
  `lang_ID` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `place_ID` bigint(20) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `event_type_ID` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_ID` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`),
  KEY `place_ID` (`place_ID`),
  KEY `start_date` (`start_date`),
  KEY `event_type_ID` (`event_type_ID`),
  KEY `start_date_2` (`start_date`,`event_type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `place_ID`, `start_date`, `end_date`, `name`, `description`, `event_type_ID`, `image`, `user_ID`, `created_at`, `updated_at`) VALUES
(1, 1, '2014-01-04 22:00:00', '2014-01-07 22:00:00', 'tttttt', '', 0, '', 28, '2014-01-04 10:06:23', '2014-01-04 10:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender_ID` bigint(20) NOT NULL,
  `getter_ID` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('unread','read','spam') COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_by_sender` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `deleted_by_getter` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`ID`),
  KEY `sender_ID` (`sender_ID`,`deleted_by_sender`),
  KEY `getter_ID` (`getter_ID`,`deleted_by_getter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map_cords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formatted_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='10000000000' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`ID`, `name`, `country`, `city`, `street`, `house_num`, `description`, `map_cords`, `logo_img`, `full_address`, `formatted_address`, `updated_at`, `created_at`) VALUES
(1, 'tttttt', 'ישראל', 'אופקים', 'פרי מגדים', '', '', '31.3113767/34.61212679999994', '', '', 'פרי מגדים, אופקים, ישראל', '2014-01-04 10:06:23', '2014-01-04 10:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ticket_ID` bigint(20) NOT NULL,
  `user_ID` bigint(20) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `payment_method` enum('paypal','tranzila') COLLATE utf8_unicode_ci NOT NULL,
  `transaction_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE IF NOT EXISTS `socials` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `related_to_ID` bigint(20) NOT NULL,
  `type` enum('facebook','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `related_to_ID` (`related_to_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `event_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `how_many_for_sale` int(11) NOT NULL,
  `price` float NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ID`, `event_ID`, `name`, `how_many_for_sale`, `price`, `currency`, `description`, `expiry_date`, `updated_at`, `created_at`) VALUES
(1, '1', 'rtrt', 23, 33, '', '', '2014-01-14 22:00:00', '2014-01-04 10:06:23', '2014-01-04 10:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE IF NOT EXISTS `translations` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lang_ID` tinyint(3) unsigned NOT NULL,
  `phrase` text COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secretkey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fb_id` (`fb_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `secretkey`, `fb_id`, `birthday`, `join_date`) VALUES
(28, 'test@miki.com', 'asdfsadf', 'sadfsagd', '$2y$08$wvJ4GY9Xk/foyPu7TIPmwuTNPfLnGqc8pTvVEAMNEw3mPBouWJS1y', '', NULL, NULL, '2013-10-29 05:10:10'),
(31, 'mikila85@gmail.com', 'Miki', 'Lallouz ஜ', '', '', '617937983', NULL, '2013-10-29 16:21:20'),
(32, 'testddwd@miki.com', 'asdfsadf', 'sadfsagd', '$2y$08$3NUsOL.JBZFOFe2wF1kVsefHuwiKQtnUeOjTlMc6Rbf7StqGEq7nq', '', NULL, NULL, '2013-10-29 16:29:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
