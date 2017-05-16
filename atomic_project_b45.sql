-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 12:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atomic_project_b45`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthdate`
--

CREATE TABLE IF NOT EXISTS `birthdate` (
`id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `birth` date NOT NULL,
  `softdelete` varchar(200) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_title`
--

CREATE TABLE IF NOT EXISTS `book_title` (
`id` int(11) NOT NULL,
  `bookTitle` varchar(2000) CHARACTER SET latin1 NOT NULL,
  `authorName` varchar(2000) CHARACTER SET latin1 NOT NULL,
  `softDelete` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT 'no'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_title`
--

INSERT INTO `book_title` (`id`, `bookTitle`, `authorName`, `softDelete`) VALUES
(20, 'Himu Shomogro', 'Humayun Ahmed', 'No'),
(28, 'Holud Himu Kalo Rab', 'Humayun Ahmed', 'yes'),
(30, 'Bitm', 'shuvo', 'No'),
(31, 'adhuvai2', 'babubabu', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `propic_tab`
--

CREATE TABLE IF NOT EXISTS `propic_tab` (
`id` int(11) NOT NULL,
  `imageName` varchar(2000) NOT NULL,
  `hobbies` varchar(2000) NOT NULL,
  `gender` varchar(2000) NOT NULL,
  `birth` date NOT NULL,
  `city` varchar(2000) NOT NULL,
  `mail` varchar(2000) NOT NULL,
  `summary` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propic_tab`
--

INSERT INTO `propic_tab` (`id`, `imageName`, `hobbies`, `gender`, `birth`, `city`, `mail`, `summary`) VALUES
(38, '', '', '', '0000-00-00', 'Dhaka', '', ''),
(39, '', '', '', '0000-00-00', '', 'shafayet.rabby@gmail.com', ''),
(40, '', '', '', '0000-00-00', '', '', 'summary'),
(41, '', '', '', '0000-00-00', 'Dhaka', '', ''),
(42, '', '', '', '0000-00-00', 'Dhaka', '', ''),
(43, '', '', '', '0000-00-00', 'Khulna', '', ''),
(44, '', '', '', '0000-00-00', 'Dhaka', '', ''),
(45, '', 'Work Out, Reading, Writing, Drawing, Gardenning', '', '0000-00-00', '', '', ''),
(46, '', '', 'Female', '0000-00-00', '', '', ''),
(47, '', 'Work Out, Reading, Writing, Drawing, Gardenning', '', '0000-00-00', '', '', ''),
(48, '', 'Work Out, Reading, Writing, Drawing, Gardenning', '', '0000-00-00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthdate`
--
ALTER TABLE `birthdate`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_title`
--
ALTER TABLE `book_title`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propic_tab`
--
ALTER TABLE `propic_tab`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthdate`
--
ALTER TABLE `birthdate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book_title`
--
ALTER TABLE `book_title`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `propic_tab`
--
ALTER TABLE `propic_tab`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
