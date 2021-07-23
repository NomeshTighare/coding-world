-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 08:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `con_id` int(11) NOT NULL,
  `profile_img` varchar(250) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `blood` varchar(50) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`con_id`, `profile_img`, `fullname`, `email`, `dob`, `mobile`, `address`, `gender`, `blood`, `auth_id`, `created`, `updated`) VALUES
(15, 'img/profile/ani.jpg', 'Aniket Vairagade', 'Aniketvairagade2000@gmail.com', '2000-11-06', 7887776471, 'khat road bhandara', 'male', 'A+', 3, '2021-07-18 18:42:37', NULL),
(16, 'img/profile/nomesh.jpg', 'Nomesh Tighare', 'nomeshtighare@gmail.com', '2000-01-04', 8956579244, 'Plot No 13. Chakrapani Nagar\r\nPipla Road Nagpur', 'male', 'B+', 3, '2021-07-18 19:08:14', NULL),
(19, 'img/profile/girlllll.png', 'Ritu Patel', 'rituupatel@yahoo.in', '2002-02-03', 6589456575, 'Canada', 'female', 'A+', 3, '2021-07-18 19:14:05', '2021-07-18 19:17:01'),
(20, 'img/profile/gir.jpg', 'Prajakta Nagrale', 'Prajunagrale@gmail.com', '2001-03-06', 7511255353, 'warora', 'female', 'O-', 3, '2021-07-18 19:15:28', NULL),
(21, 'img/profile/boy.png', 'Sarvesh panhekar', 'Svh@gmail.com', '2003-04-05', 9801353520, 'Bridgetown Pulgaon', 'male', 'O-', 3, '2021-07-18 19:19:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `auth_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`auth_id`, `name`, `username`, `pass`, `email`, `created`, `updated`) VALUES
(3, 'abc', 'abc', '900150983cd24fb0d6963f7d28e17f72', 'abcd@gmail.com', '2021-07-15 04:13:27', NULL),
(4, 'Nomesh', 'Nomesh', '114e871caeb1e6f13abcfac8e7dbfb5f', 'Nomeshtighare@gmail.com', '2021-07-18 00:16:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tcon_id` int(11) NOT NULL,
  `tprofile_img` varchar(250) DEFAULT NULL,
  `tfullname` varchar(100) DEFAULT NULL,
  `temail` varchar(100) DEFAULT NULL,
  `tdob` date DEFAULT NULL,
  `tmobile` bigint(10) DEFAULT NULL,
  `taddress` varchar(1000) DEFAULT NULL,
  `tgender` varchar(50) DEFAULT NULL,
  `tcourse` varchar(50) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL,
  `tcreated` timestamp NULL DEFAULT NULL,
  `tupdated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tcon_id`, `tprofile_img`, `tfullname`, `temail`, `tdob`, `tmobile`, `taddress`, `tgender`, `tcourse`, `auth_id`, `tcreated`, `tupdated`) VALUES
(6, 'img/profile/profile.png', 'Ritesh J', 'mrritesh@gmail.com', '1998-06-17', 9856320147, 'Bgas', 'male', 'MERN Stack', 8, '2021-07-16 18:30:31', NULL),
(12, 'img/profile/suraj.jpg', 'Suraj Shende', 'surajshende79@gmail.com', '2000-02-18', 9875642134, 'Orange City Nagpur', 'male', 'Android Development', 3, '2021-07-18 18:53:04', NULL),
(13, 'img/profile/ritesh.jpg', 'Mr. Ritesh Jangir', 'mrriteshjangir@gmail.com', '1998-06-05', 8506509453, 'Sahakar Nagar, Bhandara', 'male', 'MERN Stack', 3, '2021-07-18 18:55:05', NULL),
(15, 'img/profile/gir.jpg', 'Kalyani Lanjewar', 'kalyanilanjewar@gmail.com', '1998-06-02', 7565498565, 'Ganeshpur Bhandara', 'female', 'C++', 3, '2021-07-18 19:03:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tcon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tcon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
