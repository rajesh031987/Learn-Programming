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
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(2) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `university` longtext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course` varchar(200) NOT NULL,
  `status` enum('Inactive','Active','Blocked','Trash') NOT NULL,
  `browser` varchar(200) NOT NULL,
  `last_login` varchar(200) NOT NULL,
  `last_logout` varchar(200) NOT NULL,
  `count` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `student_id`, `first_name`, `last_name`, `user_name`, `image`, `email`, `password`, `country`, `state`, `city`, `pincode`, `address`, `university`, `phone`, `course`, `status`, `browser`, `last_login`, `last_logout`, `count`, `ip`, `created_date`) VALUES
(10, 'Stud121', 'Manish1', 'sharma', 'Manish1 sharma', 'Desert.jpg', 'ashishmediatrenz@gmail.com', '1234', '10', '492', 'California', '276001', 'Noida  india', 'UPTU', '85108996191', 'MCA', 'Active', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-31 11:55:59', '2019-07-30 03:43:20', 32, '91.129.108.97', '2019-01-13 01:37:11'),
(8, 'Stud122', 'Ashish', 'Sharma', 'Ashish Sharma', '', 'ashishkrsharma1@gmail.com', '1234567', '74', '1166', '16921', '', 'Noida', 'UPTU', '8510899619', '', 'Trash', 'Mozilla/5.0 (Linux; Android 8.1.0; Moto G (5) Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Mobile Safari/537.36', '2019-03-06 09:19:18', '2019-03-06 09:23:27', 0, '47.30.251.71', '2019-01-13 01:25:53'),
(7, 'Stud125', 'sonal', 'sharma', 'sonal sharma', '', 'sonal4032@gmail.com', 'sharma321', '101', '38', '4861', '', 'kanpur', '', '8510899619', '', 'Blocked', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36', '2019-01-13 00:28:51', '', 0, '47.31.81.15', '2019-01-12 23:24:31'),
(12, 'Stud126', 'test', 'test', 'test test', '', 'test@gmail.com', '1234567', '12', '244', '6554', '', 'test', 'test', '851089919', '', 'Active', '', '', '', 0, '', '2019-01-23 10:56:02'),
(14, 'abcd123', 'test', 'test', 'test test', '', 'test123@gmail.com', '123456', '101', '', 'noida', '201301', 'Noida', 'test', '8510899319', '', 'Blocked', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '2019-07-22 00:15:21', '2019-07-22 00:15:05', 2, '47.30.254.130', '2019-07-21 00:31:37'),
(15, 'Stud123', 'ashish', 'sharma', 'ashish sharma', '5d3ca2c542707Tulips.jpg', 'ashishkrsharma1111@gmail.com', '123456', '15', '', 'noida', '201301', 'test', 'UPTU', '8510899319', 'mca', 'Active', '', '', '', 0, '', '2019-07-25 00:59:28'),
(16, 'FI123', 'Jay', 'Smith', 'Jay Smith', 'pic123.png', 'jaysmith@gmail.com', 'asdf', '16', '', '', '', '', '', '', '', 'Active', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '2019-07-26 00:39:17', '2019-07-26 00:41:53', 3, '47.30.152.4', '2019-07-25 18:37:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
