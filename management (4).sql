-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 04:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `country_id`) VALUES
(1, 'Karachi', 1),
(2, 'Lahore', 1),
(3, 'Islamabad', 1),
(4, 'Rawalpindi', 1),
(5, 'UP', 2),
(6, 'APT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(21, 'One'),
(22, 'Two');

-- --------------------------------------------------------

--
-- Table structure for table `class_courses_pivot`
--

CREATE TABLE `class_courses_pivot` (
  `id` int(11) NOT NULL,
  `class_id` bigint(50) NOT NULL,
  `cours_id` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_courses_pivot`
--

INSERT INTO `class_courses_pivot` (`id`, `class_id`, `cours_id`) VALUES
(1, 21, 2),
(2, 21, 1),
(3, 21, 1),
(4, 21, 1),
(5, 21, 2),
(6, 21, 3),
(7, 21, 1),
(8, 21, 2),
(9, 21, 3),
(10, 21, 4),
(11, 21, 5),
(12, 21, 6),
(13, 21, 2),
(14, 21, 6),
(15, 21, 1),
(16, 21, 4),
(17, 21, 9),
(18, 21, 12),
(19, 21, 13),
(20, 22, 1),
(21, 22, 3),
(22, 21, 1),
(23, 21, 3),
(24, 21, 4),
(25, 21, 1),
(26, 21, 3),
(27, 21, 4),
(30, 21, 1),
(31, 21, 4),
(32, 21, 5),
(33, 21, 8),
(51, 21, 2),
(52, 21, 1),
(53, 21, 3),
(54, 21, 4),
(55, 21, 5),
(56, 22, 1),
(57, 22, 3),
(58, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `s_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `c_id`, `s_id`) VALUES
(1, '21', '1'),
(2, '21', '1'),
(3, '22', '2'),
(4, '22', '1'),
(5, '21', '1'),
(6, '21', '3'),
(7, '21', '4'),
(8, '21', '1'),
(9, '21', '3'),
(10, '21', '3'),
(11, '21', '1'),
(12, '21', '3'),
(13, '21', '4'),
(14, '21', '3'),
(15, '21', '4'),
(16, '21', '1'),
(17, '21', '4');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'pakistan'),
(2, 'india');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'English'),
(2, 'Urdu'),
(3, 'Math'),
(4, 'Physics'),
(5, 'ghfdh');

-- --------------------------------------------------------

--
-- Table structure for table `feacture`
--

CREATE TABLE `feacture` (
  `id` int(11) NOT NULL,
  `fea` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feacture`
--

INSERT INTO `feacture` (`id`, `fea`) VALUES
(1, '1'),
(2, '1'),
(3, '1'),
(4, '1'),
(5, '3'),
(6, '1'),
(7, '1'),
(8, '3'),
(9, '1'),
(10, '1'),
(11, '3'),
(12, '1'),
(13, '1'),
(14, '3'),
(15, '1'),
(16, '1'),
(17, '3'),
(18, '1'),
(19, '1'),
(20, '3'),
(21, '1'),
(22, '1'),
(23, '3'),
(24, '1'),
(25, '1'),
(26, '3'),
(27, '1'),
(28, '1'),
(29, '3'),
(30, '1');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state`) VALUES
(1, 1, 'bihar'),
(2, 1, 'delhi'),
(3, 2, 'sindh'),
(4, 2, 'islamabad'),
(5, 3, 'Rapti'),
(6, 3, 'Kamali'),
(7, 4, 'new york'),
(8, 4, 'california');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendence`
--

CREATE TABLE `tbl_attendence` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `attend` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_attendence`
--

INSERT INTO `tbl_attendence` (`id`, `role`, `attend`) VALUES
(1, 1, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `address`, `contact`, `qualification`) VALUES
(6, 'Ahmed', 'street1', '0310254789', 'enter'),
(65, 'arsalan', 'street1', '03105035580', 'enter'),
(66, 'Ahmed', 'street1', '03105035580', 'enter'),
(67, 'Ahmed', 'street1', '03105035580', 'enter'),
(68, 'arsalan', 'street1', '03105035580', 'enter');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL,
  `town` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `town`, `city_id`) VALUES
(1, 'Nazimabad', 1),
(2, 'shah Faisal', 1),
(3, 'Orangi', 2),
(4, 'Buffer Zone', 2),
(5, 'abc', 5),
(6, 'abcd', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `password`, `address`, `city`, `country`, `role`) VALUES
(1, 'Ahmed', 'ahmed@gmail.com', '03105035580', 'ahmed123', 'street1', 'karachi', 'pakistan', 'teacher'),
(2, 'arsalan', 'arsalan@gmail.com', '03105035580', 'arsalan123', 'street1', 'karachi', 'pakistan', 'user'),
(3, 'hammad', 'hammad@gmail.com', '03105035580', 'hammad123', 'street1', 'karachi', 'pakistan', 'admin'),
(4, 'anwar', 'anwar@gmail.com', '03105035580', 'anwar123', 'street1', 'karachi', 'pakistan', 'admin'),
(5, 'hamza', 'hamza@gmail.com', '03102054421', 'hamza123', 'street1', 'karachi', 'pakistan', 'user'),
(6, 'umar', 'umar@gmail.com', '03102054421', 'umar123', 'street1', 'karachi', 'pakistan', 'user'),
(7, 'ali', 'ali@gmail.com', '03102054421', 'ali123', 'street1', 'karachi', 'pakistan', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_courses_pivot`
--
ALTER TABLE `class_courses_pivot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feacture`
--
ALTER TABLE `feacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class_courses_pivot`
--
ALTER TABLE `class_courses_pivot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feacture`
--
ALTER TABLE `feacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
