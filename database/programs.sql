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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `language` varchar(200) NOT NULL,
  `code` longtext NOT NULL,
  `input` longtext NOT NULL,
  `keystroke` varchar(200) NOT NULL,
  `output` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `student_id`, `name`, `language`, `code`, `input`, `keystroke`, `output`, `created_date`, `modified_at`, `views`) VALUES
(1, 10, 'Example 1: Program to Swap Number Without Using Temporary Variables', 'c', '#include <stdio.h>\r\nint main()\r\n{\r\n    double firstNumber, secondNumber;\r\n    firstNumber = 100;\r\n   secondNumber = 20;\r\n    // Swapping process\r\n    firstNumber = firstNumber - secondNumber;\r\n    secondNumber = firstNumber + secondNumber;\r\n    firstNumber = secondNumber - firstNumber;\r\n    printf(\"\\nAfter swapping, firstNumber = %.2lf\\n\", firstNumber);\r\n    printf(\"After swapping, secondNumber = %.2lf\", secondNumber);\r\n   printf(\"Thank you wow\");\r\n    return 0;\r\n}\r\n', '', '509', 'After swapping, firstNumber = 20.00\r\nAfter swapping, secondNumber = 10.00', '2019-07-27 13:27:54', '2019-07-28 10:18:44', 7),
(2, 10, 'Program to Display \"Hello, World!', 'c', '#include <stdio.h>\r\nint main()\r\n{\r\n   // printf() displays the string inside quotation\r\n   printf(\"Hello, World!1234\");\r\n   return 0;\r\n}', '', '150', 'Hello, World!1234', '2019-07-27 13:33:25', '2019-07-28 10:16:08', 16),
(3, 10, 'Python Program to find sum of array', 'python2.7', '# Python 3 code to find sum \r\n# of elements in given array \r\ndef _sum(arr,n): \r\n	\r\n	# return sum using sum \r\n	# inbuilt sum() function \r\n	return(sum(arr)) \r\n\r\n# driver function \r\narr=[] \r\n# input values to list \r\narr = [12, 3, 4, 15] \r\n\r\n# calculating length of array \r\nn = len(arr) \r\n\r\nans = _sum(arr,n) \r\n\r\n# display sum \r\nprint (\'Sum of the array is \',ans) \r\n\r\n# This code is contributed by Ashish Sharma \r\n', '', '456', '(\'Sum of the array is \', 34)\r\n', '2019-07-27 14:08:09', '0000-00-00 00:00:00', 0),
(4, 10, 'Sum of digits program', 'c', '#include<stdio.h>  \r\n int main()    \r\n{    \r\nint n,sum=0,m;    \r\nprintf(\"Enter a number:123456789\");  \r\nn=123456789;\r\nscanf(\"%d\",&n);    \r\nwhile(n>0)    \r\n{    \r\nm=n%10;    \r\nsum=sum+m;    \r\nn=n/10;    \r\n}    \r\nprintf(\"Sum is=%d\",sum);    \r\nreturn 0;  \r\n}   ', '', '294', 'Enter a number:123456789Sum is=45', '2019-07-28 10:05:44', '2019-07-28 10:17:45', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
