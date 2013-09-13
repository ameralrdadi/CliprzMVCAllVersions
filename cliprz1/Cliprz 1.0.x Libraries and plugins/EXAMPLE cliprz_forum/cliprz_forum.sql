-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2013 at 08:31 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cliprz_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_forum` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_forum` tinyint(4) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `title_forum`, `description`, `status_forum`, `id_parent`) VALUES
(1, 'Forum Parent One', 'Description Forum Parent', 1, 0),
(2, 'Forum Sub One', 'Description Forum Sub', 1, 1),
(3, 'Forum Sub Two', 'Description Forum Sub Two', 1, 1),
(4, 'Forum Parent Two', 'Description Forum Parent Two', 1, 0),
(5, 'Forum Sub Three', 'Description Forum Sub Three', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_thread` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content_thread` text COLLATE utf8_unicode_ci NOT NULL,
  `date_thread` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status_thread` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `title_thread`, `content_thread`, `date_thread`, `status_thread`, `id_user`, `id_forum`) VALUES
(1, 'Hello World', 'Hello World\r\nTest Cliprz Forum', '2013/1/1', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `useremail`, `password`, `status_user`, `id_group`) VALUES
(1, 'Amer Alrdadi', 'ameralrdadi@gmail.com', '123123', 1, 1),
(2, 'Cliprz', 'cliprz@gmail.com', '123123', 1, 1),
(3, 'Fars Alrdadi', 'fars@gmail.com', '123123', 1, 2);
