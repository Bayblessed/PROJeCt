-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 02:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'admin', '88', NULL),
(3, 'BLESSED', '333', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `ethnicity` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_phone_number` varchar(20) NOT NULL,
  `father_phone_number` varchar(20) NOT NULL,
  `emergency_contact_name` varchar(255) NOT NULL,
  `emergency_contact_phone_number` varchar(20) NOT NULL,
  `emergency_contact_relationship` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `health` text NOT NULL,
  `passport_picture` varchar(255) NOT NULL,
  `date_of_admission` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `date_of_birth`, `place_of_birth`, `town`, `grade_level`, `address1`, `ethnicity`, `mother_name`, `father_name`, `mother_phone_number`, `father_phone_number`, `emergency_contact_name`, `emergency_contact_phone_number`, `emergency_contact_relationship`, `gender`, `health`, `passport_picture`, `date_of_admission`) VALUES
(1, 'Blessed Adjei Adjei Yeboah', '1944-04-05', 'kumasi', 'Kumasi', 6, NULL, 'accra', 'kkkk', 'kofi ', '+233264817566', '+233264817566', 'Blessed', '+233264817566', 'mother', 'male', 'etwektmtet;ewtdpokgvpowd', 'Screenshot 2023-10-11 121022.png', NULL),
(2, 'Blessed Adjei Adjei Yeboah', '1994-03-02', 'kumasi', 'Kumasi', 5, 'AG0700652', 'Ashanti', 'ama', 'faith', '0350359946', '+233264817566', 'Theresa Adjei Yeboah', '+233244973120', 'mother', 'male', 'eQF\r\nasdintrgirme,l\r\njyihijd; glrktmpw\\', 'Screenshot 2023-10-09 060910.png', NULL),
(3, 'Theresa Adjei Yeboah', '2020-06-16', 'kumasi', 'Kumasi', 5, 'AG0700652', 'accra', 'THERE', 'kofi ', '0203538242', '0203538242', 'Theresa Adjei Yeboah', '+233244973120', 'mother', 'male', '\'fdlbp[feyty5[tg\'pd.ds', 'student_16974413337190.png', '2023-10-16'),
(4, 'Blessed Adjei Adjei Yeboah', '1995-05-06', 'kumasi', 'accra', 6, 'AG0700652', 'Kumasi', 'THERE', 'kofi ', '+233244973120', '+233264817566', 'ama', '+233244973120', 'mother', 'female', 'rbi oxicopfkd[pflc\\d[c/f]pdkfoibiuhfoNODRKA[,.lrRREWJOWIEJTOI', 'student_16974413955643.png', '2023-10-16'),
(5, 'godddd', '2014-06-16', 'kumasi', 'Kumasi', 6, 'AG0700652', 'ADUM', 'THERE', 'kofi ', '+233244973120', '0350359946', 'Blessed Adjei Adjei Yeboah', '+233264817566', 'mother', 'female', 'cjvnvpfg[]v\\;gd', 'student_16974593633095.png', '2023-10-16'),
(6, 'Blessed Adjei Adjei Yeboah', '2020-02-03', 'kumasi', 'kumasi', 5, 'ag0045664', 'accra', 'theresa', 'kwame', '+233244973120', '+233264817566', 'kwame', '0350359946', 'mother', 'male', 'none', 'student_16983250506486.jpg', '1990-02-05'),
(7, 'yaw kofi', '2005-02-03', 'usa', 'Kumasi', 3, 'PLT16 Blk Bb', 'ga', 'ama owusu', 'kawme kofi', '+233264817566', '+233264817566', 'Blessed Adjei Yeboah', '+233264817566', 'friend', 'male', 'no proble,', 'student_16986457872060.png', '2023-10-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
