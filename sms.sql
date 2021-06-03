-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 01:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `s_no` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`s_no`, `name`, `email`, `password`) VALUES
(1, 'abhishek', 'abhishekp2k19@gmail.com', 'ab@123'),
(2, 'payal porwal', 'payal@gmail.com', 'payal@123');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `s_no` int(10) NOT NULL,
  `roll_no` int(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `class` int(3) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(12) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`s_no`, `roll_no`, `name`, `father_name`, `class`, `mobile`, `email`, `password`, `remark`) VALUES
(8, 175125, 'Abhishek', 'Babulal ji porwal', 10, '56874968', 'sabhi@gmail.com', 'dearabhi', 'Very Good Osm'),
(10, 158945, 'rohan', 'Babulal ji porwal', 12, '6887674968', 'new@gmail.com', 'thanks', 'brillient'),
(11, 254366, 'Khusi', 'sunil maeshwari', 12, '4257468563', 'sabhi@gmail.com', 'khushi', 'always available'),
(12, 124315, 'Ram', 'mohan', 12, '5874965823', 'ram@gmail.com', 'ram@123', 'ram is the topper of his class');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_details`
--

CREATE TABLE `teachers_details` (
  `sno` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subjects` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_details`
--

INSERT INTO `teachers_details` (`sno`, `name`, `position`, `mobile`, `email`, `subjects`) VALUES
(1, 'PAYAL Porwal', 'GUEST TEACHER', '7854629321', 'PAYALMEM@gmail.com', 'English, Maths, Sanskrit'),
(2, 'Abhinav dhakad', 'permanent', '7894358125', 'abhinav@gmail.com', 'Science, maths, chemistry'),
(3, 'Rajarammohan', 'Senior teacher', '3565555548', 'guruji@gmail.com', 'sahitya, sanskrit, science, biology, maths, physics, chemistry, modern histroy, english, hindi, computer science'),
(4, 'Rajat singh thakur', 'new teacher', '3565555548', 'siri@gmail.com', 'sahitya, sanskrit, science, biology, maths, physics, chemistry'),
(5, 'Rajarammohan', 'Senior teacher', '3565555548', 'guruji@gmail.com', 'sahitya, sanskrit, science, biology, maths, physics, chemistry, modern histroy, english, hindi, computer science'),
(6, 'Umesh', 'funny teacher', '3556847848', 'ramaswami@gmail.com', 'modern histroy, english, hindi, computer science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `teachers_details`
--
ALTER TABLE `teachers_details`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `s_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `s_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers_details`
--
ALTER TABLE `teachers_details`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
