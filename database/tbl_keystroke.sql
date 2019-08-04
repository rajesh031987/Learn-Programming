-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2019 at 11:08 AM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lksproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keystroke`
--

CREATE TABLE `tbl_keystroke` (
  `id` int(11) NOT NULL,
  `program_id` varchar(200) NOT NULL,
  `count_keystroke` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keystroke`
--

INSERT INTO `tbl_keystroke` (`id`, `program_id`, `count_keystroke`, `created_at`) VALUES
(1, '1', 471, '2019-07-27 13:27:54'),
(2, '1', 504, '2019-07-27 13:30:05'),
(3, '1', 508, '2019-07-27 13:30:39'),
(4, '2', 146, '2019-07-27 13:33:25'),
(5, '2', 150, '2019-07-27 13:33:51'),
(6, '3', 456, '2019-07-27 14:08:09'),
(7, '2', 156, '2019-07-27 14:14:44'),
(8, '2', 150, '2019-07-27 14:15:53'),
(9, '2', 154, '2019-07-27 14:18:58'),
(10, '1', 509, '2019-07-27 14:20:44'),
(11, '4', 282, '2019-07-28 10:05:44'),
(12, '2', 154, '2019-07-28 10:14:09'),
(13, '2', 150, '2019-07-28 10:16:08'),
(14, '4', 284, '2019-07-28 10:16:47'),
(15, '4', 294, '2019-07-28 10:17:45'),
(16, '1', 509, '2019-07-28 10:18:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_keystroke`
--
ALTER TABLE `tbl_keystroke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_keystroke`
--
ALTER TABLE `tbl_keystroke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
