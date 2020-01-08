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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
