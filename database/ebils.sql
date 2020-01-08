-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 11:34 AM
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
-- Table structure for table `busers`
--

CREATE TABLE IF NOT EXISTS `busers` (
`id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL DEFAULT '91',
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `businessname` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `btpye` varchar(255) NOT NULL DEFAULT 'selectb',
  `logo` varchar(255) NOT NULL DEFAULT 'default.png',
  `GST` varchar(255) DEFAULT '-',
  `dateofjoin` varchar(255) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `busers`
--

INSERT INTO `busers` (`id`, `name`, `cc`, `mobile`, `password`, `businessname`, `city`, `district`, `state`, `pincode`, `btpye`, `logo`, `GST`, `dateofjoin`, `expirydate`, `note`) VALUES
(1, 'Santhosh', '91', '9000953970', 'f1134a6d1c4fcfee2132c09223dea961', 'Ramappa', 'Hanamkonda', 'Warangal', 'Telangana', '506001', 'coachingcenters', 'default.png', '-', '07.Jan.2020', '\r\n22.Jan.2020', 'no exchange'),
(2, 'Nagaraj', '91', '7075395739', 'f1134a6d1c4fcfee2132c09223dea961', 'Sky Gym', 'Hanamkonda', 'warangal', 'Telangana', '506001', 'gym', 'default.png', '-', '07.Jan.2020', '22.Jan.2020', 'no exchange');

-- --------------------------------------------------------

--
-- Table structure for table `businessmessages`
--

CREATE TABLE IF NOT EXISTS `businessmessages` (
`id` int(255) NOT NULL,
  `ownerid` varchar(255) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `noofcontacts` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bverify`
--

CREATE TABLE IF NOT EXISTS `bverify` (
`id` int(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `otp_hash` varchar(255) NOT NULL,
  `averify` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bverify`
--

INSERT INTO `bverify` (`id`, `mobile`, `otp_hash`, `averify`) VALUES
(1, '919000953970', '87351', '0'),
(2, '917075395739', '12754', '0');

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

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
`id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'uncleared'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cusers`
--

CREATE TABLE IF NOT EXISTS `cusers` (
`id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL DEFAULT '91',
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `dateofjoin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custbill`
--

CREATE TABLE IF NOT EXISTS `custbill` (
`id` int(255) NOT NULL,
  `businessname` varchar(255) NOT NULL,
  `ownerid` varchar(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `tamount` varchar(255) NOT NULL,
  `unique` varchar(255) NOT NULL,
  `btype` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custbill`
--

INSERT INTO `custbill` (`id`, `businessname`, `ownerid`, `invoiceno`, `mobile`, `tamount`, `unique`, `btype`, `logo`) VALUES
(1, 'Ramappa', '1', '1', '9676973687', '5000', '', 'coachingcenters', 'default.png'),
(2, 'Sky Gym', '2', '1', '9000953970', '5000', '', 'gym', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `forget`
--

CREATE TABLE IF NOT EXISTS `forget` (
`id` int(255) NOT NULL,
  `mobie` varchar(255) NOT NULL,
  `otp_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE IF NOT EXISTS `gym` (
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
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`sno`, `ownerid`, `invoiceno`, `cname`, `mobile`, `course`, `joindate`, `enddate`, `tamount`, `paidamount`, `date`, `time`) VALUES
(1, '2', '1', 'santhosh', '9000953970', 'shoulders', '07/01/2020', '07/03/2020', '5000', '3000', '07.Jan.2020', ' 02:47:42pm');

-- --------------------------------------------------------

--
-- Table structure for table `myinvoice`
--

CREATE TABLE IF NOT EXISTS `myinvoice` (
`id` int(255) NOT NULL,
  `usermobile` varchar(225) NOT NULL,
  `unique` varchar(255) NOT NULL,
  `invoiceno` varchar(225) NOT NULL,
  `transactionid` varchar(225) NOT NULL,
  `totalamount` varchar(225) NOT NULL,
  `paidamount` varchar(225) NOT NULL,
  `businessname` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paidamount`
--

CREATE TABLE IF NOT EXISTS `paidamount` (
`id` int(255) NOT NULL,
  `ownerid` varchar(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `pamount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paidamount`
--

INSERT INTO `paidamount` (`id`, `ownerid`, `invoiceno`, `pamount`, `date`, `time`) VALUES
(1, '1', '1', '3000', '07.Jan.2020', ' 11:23:07am'),
(2, '2', '1', '3000', '07.Jan.2020', ' 02:47:42pm');

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

-- --------------------------------------------------------

--
-- Table structure for table `photostudio`
--

CREATE TABLE IF NOT EXISTS `photostudio` (
`sno` int(255) NOT NULL,
  `ownerid` int(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `eventname` varchar(255) NOT NULL,
  `eventdate` varchar(255) NOT NULL,
  `tamount` varchar(255) NOT NULL,
  `paidamount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
`ids` int(255) NOT NULL,
  `ownerid` varchar(255) NOT NULL,
  `imagename` varchar(1000) NOT NULL,
  `content` mediumtext NOT NULL,
  `postdate` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `totallikes` varchar(255) NOT NULL DEFAULT '0',
  `exiprydate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`id` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pvalue` varchar(255) NOT NULL,
  `picon` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `pname`, `pvalue`, `picon`, `date`, `time`) VALUES
(1, 'Pest Control Services', 'pestcontrol', 'fas fa-bug', '07.Jan.2020', ' 10:51:54am'),
(2, 'Coaching Centers / Institutes', 'coachingcenters', 'fas fa-book-open', '07.Jan.2020', ' 10:54:31am'),
(3, 'Gym / Fitness Center', 'gym', 'fas fa-dumbbell', '07.Jan.2020', ' 10:55:46am'),
(4, 'Photo Studio', 'photostudio', 'fas fa-camera', '07.Jan.2020', ' 10:56:29am'),
(5, 'Car Care / Car Wash', 'carwash', 'fas fa-car', '07.Jan.2020', ' 10:56:49am'),
(6, 'Footware', 'footware', 'fas fa-shoe-prints', '07.Jan.2020', ' 10:58:13am'),
(7, 'Textiles', 'textiles', 'fas fa-tshirt', '07.Jan.2020', ' 11:01:32am'),
(8, 'Furniture', 'furniture', 'fas fa-couch', '07.Jan.2020', ' 11:02:00am'),
(9, 'Bakery', 'bakery', 'fas fa-birthday-cake', '07.Jan.2020', ' 11:02:27am'),
(10, 'Clothing Store / Dress Materials', 'clothing', 'fas fa-shopping-bag', '07.Jan.2020', ' 11:03:24am'),
(11, 'Milk Shakes Lassi Points', 'milkshakes', 'fas fa-wine-glass-alt', '07.Jan.2020', ' 11:04:08am'),
(12, 'Milk Dairy', 'dairy', 'fas fa-wine-bottle', '07.Jan.2020', ' 11:04:37am'),
(13, 'Mobile Store', 'mobilestore', 'fas fa-mobile', '07.Jan.2020', ' 11:04:59am'),
(14, 'Tiles / Marble / Garnet', 'Tiles', 'fas fa-clone', '07.Jan.2020', ' 11:06:30am'),
(15, 'Boutique', 'boutique', 'fas fa-female', '07.Jan.2020', ' 11:06:59am'),
(16, 'Ice Cream Parlour', 'icecreamparlour', 'fas fa-ice-cream', '07.Jan.2020', ' 11:07:21am'),
(17, 'Beauty Parlour / Salon Parlour', 'salon', 'fas fa-cut', '07.Jan.2020', ' 11:07:45am'),
(18, 'Computer Store / Accessories', 'computerstore', 'fas fa-laptop', '07.Jan.2020', ' 11:08:13am'),
(19, 'Computer / Mobile Repairing Centers', 'cmrepairing', 'fas fa-tools', '07.Jan.2020', ' 11:09:12am');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uverify`
--

CREATE TABLE IF NOT EXISTS `uverify` (
`id` int(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `otp_hash` varchar(255) NOT NULL,
  `averify` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busers`
--
ALTER TABLE `busers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businessmessages`
--
ALTER TABLE `businessmessages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bverify`
--
ALTER TABLE `bverify`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coachingcenters`
--
ALTER TABLE `coachingcenters`
 ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cusers`
--
ALTER TABLE `cusers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custbill`
--
ALTER TABLE `custbill`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget`
--
ALTER TABLE `forget`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
 ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `myinvoice`
--
ALTER TABLE `myinvoice`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paidamount`
--
ALTER TABLE `paidamount`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pestcontrol`
--
ALTER TABLE `pestcontrol`
 ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `photostudio`
--
ALTER TABLE `photostudio`
 ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
 ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uverify`
--
ALTER TABLE `uverify`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busers`
--
ALTER TABLE `busers`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `businessmessages`
--
ALTER TABLE `businessmessages`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bverify`
--
ALTER TABLE `bverify`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coachingcenters`
--
ALTER TABLE `coachingcenters`
MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cusers`
--
ALTER TABLE `cusers`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custbill`
--
ALTER TABLE `custbill`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `forget`
--
ALTER TABLE `forget`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `myinvoice`
--
ALTER TABLE `myinvoice`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paidamount`
--
ALTER TABLE `paidamount`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pestcontrol`
--
ALTER TABLE `pestcontrol`
MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photostudio`
--
ALTER TABLE `photostudio`
MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
MODIFY `ids` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uverify`
--
ALTER TABLE `uverify`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
