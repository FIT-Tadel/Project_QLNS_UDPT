-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 10:42 AM
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
-- Database: `reward_service_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_point`
--

CREATE TABLE `user_point` (
  `user_id` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_points` int(11) NOT NULL,
  `vouchers` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_point`
--

INSERT INTO `user_point` (`user_id`, `username`, `user_points`, `vouchers`) VALUES
('1', 'tadel', 5000, '[\"1\", \"2\"]'),
('2', 'johnsmith', 8000, '[\"1\", \"2\"]'),
('3', 'janedoe', 3000, '[\"1\"]');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `maVC` varchar(255) NOT NULL,
  `tenVC` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `maVC`, `tenVC`, `cost`) VALUES
(1, '1', 'Lunch Time(50% Off)', 500),
(2, '2', 'Shopping Family', 400),
(3, '3', 'Sport With Us', 300),
(4, '4', 'Travel Mount', 600),
(5, '5', 'Holiday Gift(80% Sales Off)', 1000),
(6, '6', 'Weekend Getaway', 700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
