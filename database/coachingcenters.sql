-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 09:45 AM
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
-- Table structure for table `coachingcenters`
--

CREATE TABLE IF NOT EXISTS `coachingcenters` (
`sno` int(255) NOT NULL,
  `ownerid` varchar(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `joindate` varchar(255) NOT NULL,
  `enddate` varchar(255) NOT NULL,
  `tamount` varchar(255) NOT NULL,
  `paidamount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coachingcenters`
--

INSERT INTO `coachingcenters` (`sno`, `ownerid`, `invoiceno`, `cname`, `mobile`, `course`, `joindate`, `enddate`, `tamount`, `paidamount`, `date`, `time`) VALUES
(1, '1', '1', 'Rakesh', '9676973687', 'java', '07/01/2020', '07/03/20120', '5000', '3000', '07.Jan.2020', ' 11:23:07am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coachingcenters`
--
ALTER TABLE `coachingcenters`
 ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coachingcenters`
--
ALTER TABLE `coachingcenters`
MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
