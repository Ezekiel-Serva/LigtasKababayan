-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2026 at 02:11 PM
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
(17, 'Malaag', 'Head', 10.3415808, 123.9187456, 'eqweqweqw', '21-30', '977-131-7646', 'active', 'uploads/973baccd23c790d2cf8e0b19bd0019dc.jpg', 'WITH_USER', 'Children/Baby');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
