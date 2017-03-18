-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 06:05 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_work`
--

CREATE TABLE `register_work` (
  `rwid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `sid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `cid` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `rank` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `map_work` text COLLATE utf8_unicode_ci NOT NULL,
  `status_work` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `dmt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register_work`
--

INSERT INTO `register_work` (`rwid`, `sid`, `cid`, `rank`, `map_work`, `status_work`, `dmt`) VALUES
(002, '001', '001', 'Web Programmer', 'Office ถ.พุทธบูชา บางมด ทุ่งครุ กทม.', '2', 'วันที่ 17 เดือน มีนาคม  2560 เวลา 22:05:56 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_work`
--
ALTER TABLE `register_work`
  ADD PRIMARY KEY (`rwid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_work`
--
ALTER TABLE `register_work`
  MODIFY `rwid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
