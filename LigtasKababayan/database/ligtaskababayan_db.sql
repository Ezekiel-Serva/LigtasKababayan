-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2026 at 04:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ligtaskababayan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apcredentials`
--

CREATE TABLE `apcredentials` (
  `id` int(11) NOT NULL,
  `fullName` varchar(125) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `assignedLoc` varchar(125) NOT NULL,
  `barangayId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evacuationcenters`
--

CREATE TABLE `evacuationcenters` (
  `id` int(11) NOT NULL,
  `centerName` varchar(125) NOT NULL,
  `barangayId` int(11) DEFAULT NULL,
  `maxCapacity` int(11) NOT NULL DEFAULT 100,
  `currentOccupancy` int(11) NOT NULL DEFAULT 0,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evacuationcenters`
--

INSERT INTO `evacuationcenters` (`id`, `centerName`, `barangayId`, `maxCapacity`, `currentOccupancy`, `lastUpdated`, `latitude`, `longitude`) VALUES
(1, 'NwssuvSocio', 1, 100, 81, '2026-09-13 13:23:58', NULL, NULL),
(2, 'Nwssu Gym', NULL, 100, 70, '2026-09-13 13:23:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `purok` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `password`, `phone`, `barangay`, `purok`) VALUES
(1, 'cliveskie', '$2y$10$xTVZkUJY9UoN10NAmKAF9umClAWZW7EdGUTzm9LFg20clfstbh.u.', '977-131-7646', 'Balud', '5'),
(2, 'serva', '$2y$10$qgnRu1tL1.kQk812iLIM2ehgD59cfizFtr9V2dGCkyRqvNTAZ3cJG', '977-131-7646', 'Dagum', '1'),
(3, 'nicello cham', '$2y$10$xUPne5c8u1BbUOTQ6zSrEOn80549RrjngylLsG5GIyPSaji49XAr2', '0912 323 6767', 'Capoocan', '4'),
(5, 'bryne', '$2y$10$ZysIEYZsGv4g0X37ST46WuGLs.K11isHtBE5mlYcrC8kl.Hkv.d1a', '0912 323 6767', 'Hamorawon', '2'),
(6, 'darwin', '$2y$10$eNJriIrSpOzjN3mKZNJ.muP5HIKXZa31AidmrPMjTuM.5UYKEAv5G', '977-131-7646', 'Capoocan', '6'),
(8, 'cham', '$2y$10$ZnBQN8GniTYqGaAF8E5IT.PGsnnAy39Ik/cPjBlOBS/JUwpyzACJC', '0912 323 6767', 'Obrero', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `water_level` varchar(70) DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `lng` decimal(10,7) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `headcount` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `photo` varchar(255) DEFAULT NULL,
  `vulnerable_status` varchar(50) DEFAULT NULL,
  `vulnerable_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `water_level`, `lat`, `lng`, `description`, `headcount`, `phone`, `status`, `photo`, `vulnerable_status`, `vulnerable_type`) VALUES
(1, 'Ezekiel', 'Ankle', 12.0746107, 124.5895306, 'sjsjdjddjsja 11111', '1~10', '+63 993 0369155', 'rescued', NULL, NULL, NULL),
(8, 'momama', 'Head', NULL, NULL, '', '30+', '09999999999', 'rescued', NULL, NULL, NULL),
(16, 'Clive Josh A. delos Reyes', 'Knee', 10.3415808, 123.9187456, 'dsadas', '50+', '977-131-7646', 'active', NULL, NULL, NULL),
(17, 'Malaag', 'Head', 10.3415808, 123.9187456, 'eqweqweqw', '21-30', '977-131-7646', 'rescued', 'uploads/973baccd23c790d2cf8e0b19bd0019dc.jpg', 'WITH_USER', 'Children/Baby'),
(19, 'Clive Josh A. delos Reyes', 'Waist', 10.2957056, 123.8040576, 'jygh', '50+', '0912 323 6767', 'rescued', NULL, 'WITH_USER', 'Senior_Citizen'),
(20, 'cham', 'Head', 10.2957056, 123.8040576, '67', '50+', '0912 323 6767', 'rescued', NULL, 'WITH_USER', 'PWD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apcredentials`
--
ALTER TABLE `apcredentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_phone` (`phoneNumber`);

--
-- Indexes for table `evacuationcenters`
--
ALTER TABLE `evacuationcenters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_center_name` (`centerName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fullname` (`fullname`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apcredentials`
--
ALTER TABLE `apcredentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evacuationcenters`
--
ALTER TABLE `evacuationcenters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
