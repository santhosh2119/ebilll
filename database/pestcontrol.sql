-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 09:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebils`
--

-- --------------------------------------------------------

--
-- Table structure for table `pestcontrol`
--

CREATE TABLE IF NOT EXISTS `pestcontrol` (
`sno` int(255) NOT NULL,
  `ownerid` int(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `cps` varchar(255) NOT NULL,
  `cpe` varchar(255) NOT NULL,
  `tamount` varchar(255) NOT NULL,
  `paidamount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pestcontrol`
--
ALTER TABLE `pestcontrol`
 ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pestcontrol`
--
ALTER TABLE `pestcontrol`
MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
