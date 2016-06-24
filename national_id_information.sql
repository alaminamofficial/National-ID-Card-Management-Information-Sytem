-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2016 at 09:05 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `national_id_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `Fathers_Name` varchar(50) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `Mothers_Name` varchar(50) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `Date_of_Birth` varchar(15) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `Blood_Group` varchar(3) CHARACTER SET utf32 COLLATE utf32_croatian_ci NOT NULL,
  `Age` int(2) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Nid` bigint(100) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Fathers_Name`, `Mothers_Name`, `Date_of_Birth`, `Blood_Group`, `Age`, `Gender`, `Nid`, `Image`) VALUES
(54, 'Nova', 'fwse', 'efws', '08 MAY 1992', '3', 24, '2', 34567890178234672, 'images2.jpg'),
(55, 'wfdsaf', 'edfs', 'fvsd', '18 JUN 1974', '5', 42, '1', 23456789123456789, 'images1.jpg'),
(56, 'Tanzila', 'ege', 'ewgtews', '14 MAR 1993', '1', 23, '2', 63729347584929028, 'images2.jpg'),
(57, 'Nova', 'dgds', 'rgege', '08 MAY 1992', '3', 24, '2', 24325673257434732, 'images1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `Nid` (`Nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
