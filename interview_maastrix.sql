-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 03:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_maastrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `name`, `designation`, `dob`, `doj`, `blood_group`, `email`, `mobile`, `address`) VALUES
(1, 'david john', 'Administration', '1987-06-17', '1994-12-07', 'B+', 'stevenking@sqltutori', '5151234567', '2014 Jabberwocky Rd'),
(2, 'gers paul', 'Marketing', '1997-09-30', '1997-09-30', 'AB', 'neenakochhar@sqltuto', '5151234568', '8204 Arthur St'),
(3, 'david john', 'Marketing', '1991-05-21', '1999-02-07', 'A+', 'bruceernst@sqltutori', '5904234568', '2004 Charade Rd'),
(4, 'ria sanders', 'Marketing', '1999-12-07', '1999-12-07', 'B+', 'dianalorentz@sqltuto', '5904235567', '2011 Interiors Blvd'),
(5, 'rris miller', 'Administration', '1999-02-07', '1991-05-21', '0+', 'danielfaviet@sqltuto', '5151244169', '2014 Jabberwocky Rd'),
(6, 'aniel michael', 'Administration', '1994-12-07', '1998-11-15', 'B-', 'stevenking@sqltutori', '5151234567', '8204 Arthur St'),
(7, 'anders paul', 'Administration', '1998-11-15', '1998-11-15', 'A-', 'neenakochhar@sqltuto', '5151234568', '2011 Interiors Blvd'),
(8, 'mark mike', 'Marketing', '1987-06-17', '1997-09-30', 'B+', 'bruceernst@sqltutori', '5904234568', '2004 Charade Rd'),
(9, 'morgan maria', 'Administration', '1997-09-30', '1991-05-21', 'A-', 'dianalorentz@sqltuto', '5904235567', '2014 Jabberwocky Rd'),
(10, 'paul miller', 'Administration', '1999-12-07', '1999-12-07', 'B+', 'danielfaviet@sqltuto', '5151244169', '2011 Interiors Blvd'),
(11, 'david miller', 'Administration', '1998-11-15', '1987-06-17', 'A-', 'stevenking@sqltutori', '5151234567', '8204 Arthur St'),
(12, 'chrishaydon bell', 'Administration', '1991-05-21', '1999-02-07', 'B+', 'neenakochhar@sqltuto', '5151234568', '2004 Charade Rd'),
(13, 'michael brown', 'Marketing', '1997-09-30', '1994-12-07', 'B+', 'bruceernst@sqltutori', '5904234568', '2014 Jabberwocky Rd'),
(14, 'morgan james', 'Marketing', '1999-02-07', '1997-09-30', 'B+', 'dianalorentz@sqltuto', '5904235567', '2011 Interiors Blvd'),
(15, 'rogers chrishaydon', 'Administration', '1987-06-17', '1998-11-15', 'B-', 'stevenking@sqltutori', '5151234567', '2004 Charade Rd'),
(16, 'organ wright', 'Marketing', '1997-09-30', '1998-11-15', 'B-', 'neenakochhar@sqltuto', '5151234568', '8204 Arthur St'),
(17, 'morgan wright', 'Marketing', '1999-12-07', '1999-12-07', 'B+', 'bruceernst@sqltutori', '5904234568', '2014 Jabberwocky Rd'),
(18, 'avid ross', 'Administration', '1998-11-15', '1987-06-17', 'A-', 'dianalorentz@sqltuto', '5904235567', '2011 Interiors Blvd'),
(19, 'maria morgan', 'Administration', '1994-12-07', '1994-12-07', 'B+', 'danielfaviet@sqltuto', '5151244169', '8204 Arthur St'),
(20, 'ike bell', 'Marketing', '1991-05-21', '1998-11-15', 'B+', 'stevenking@sqltutori', '5151234567', '2014 Jabberwocky Rd'),
(21, 'miller michael', 'Marketing', '1997-09-30', '1999-02-07', 'B+', 'neenakochhar@sqltuto', '5151234568', '2004 Charade Rd'),
(22, 'ross rogers', 'Administration', '1999-02-07', '1998-11-15', 'B-', 'bruceernst@sqltutori', '5904234568', '8204 Arthur St'),
(23, 'rooks mike', 'Marketing', '1987-06-17', '1998-11-15', 'B-', 'dianalorentz@sqltuto', '5904235567', '2011 Interiors Blvd'),
(24, 'miller daniel', 'Marketing', '1999-12-07', '1991-05-21', 'B+', 'danielfaviet@sqltuto', '5151244169', '2014 Jabberwocky Rd'),
(25, 'ike wright', 'Marketing', '1997-09-30', '1994-12-07', 'B+', 'stevenking@sqltutori', '5151234567', '2004 Charade Rd'),
(26, 'wright smith', 'Administration', '1991-05-21', '1987-06-17', 'A-', 'neenakochhar@sqltuto', '5151234568', '8204 Arthur St'),
(27, 'david morgan', 'Marketing', '1998-11-15', '1999-02-07', 'B+', 'bruceernst@sqltutori', '5904234568', '2011 Interiors Blvd'),
(28, 'smith bell', 'Administration', '1994-12-07', '1999-12-07', 'B+', 'dianalorentz@sqltuto', '5904235567', '2014 Jabberwocky Rd'),
(29, 'aul wright', 'Administration', '1987-06-17', '1997-09-30', 'AB+', 'danielfaviet@sqltuto', '5151244169', '8204 Arthur St'),
(30, 'ichael james', 'Administration', '1999-02-07', '1991-05-21', 'B+', 'stevenking@sqltutori', '5151234567', '2004 Charade Rd');

-- --------------------------------------------------------

--
-- Table structure for table `emp_file`
--

CREATE TABLE `emp_file` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL DEFAULT 0,
  `upload_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_file`
--

INSERT INTO `emp_file` (`id`, `emp_id`, `upload_file`) VALUES
(1, 7, 'uploads/amazon.jpg,uploads/americanexpress.jpg,uploads/google.jpg,uploads/instagram.jpg,');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 0 COMMENT '1: Super Admin \r\n2: Admin\r\n3: User',
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `role`, `mobile`, `email`, `password`, `address`, `gender`, `dob`, `profile_pic`, `signature`, `status`) VALUES
(1, 'Super Admin', 1, '12345', 'superadmin@gmail.com', '123456', 'testing', 'Female', '2023-08-31 00:00:00', '903184638_1024x1024bb.png', '', 1),
(2, 'Admin', 2, '123456', 'admin@gmail.com', 'admin@123', 'Testing', 'Male', '2023-08-27 00:00:00', '', '2100205589_1024x1024bb.png', 1),
(3, 'User1', 3, '1234567890', 'user1@gmail.com', 'user1@123', 'Testing', 'Male', '2023-08-27 00:00:00', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_file`
--
ALTER TABLE `emp_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `emp_file`
--
ALTER TABLE `emp_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
