-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 03:44 PM
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
-- Database: `employee_service_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `user_id`, `username`, `password`, `user_status`, `user_type`, `created_at`) VALUES
(1, 1, 'tadel', '$2y$10$71mav32diW0OAW6nW36CQODs3m3XAwECb02YdUc4/EfCmTVkjglrS', 'inactive', 'manager', '2024-08-25 12:15:13'),
(2, 2, 'johnsmith', '$2y$10$/6xNCfx/HnQOLtlGm3pj8OcXSFGZnDWBqkHfB9wionq7itul6cSHy', 'active', 'employee', '2024-09-26 12:22:59'),
(3, 3, 'janedoe', '$2y$10$MhZ.viTtd2P8mE92LW6/F.yTbWcwOYug8K.YGUCkrokYh7gR64dtu', 'active', 'employee', '2024-09-26 12:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `personal_info_json` varchar(4000) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`user_id`, `name`, `phone`, `address`, `personal_info_json`, `image_path`) VALUES
(1, 'Le Dat', '0987654321', 'TP.HCM, Vietnam', '{\"id_card\":\"20127459\",\"tax_code\":\"100\",\"bank_account\":\"9380 2210 4230\"}', './uploads/images/tadel.png'),
(2, 'John Smith', '0912345678', 'Hanoi, Vietnam', '{\"id_card\":\"20120001\",\"tax_code\":\"150\",\"bank_account\":\"4380 1210 2230\"}', './uploads/images/johnsmith.png'),
(3, 'Jane Doe', '0935467829', 'Tokyo, Japan', '{\"id_card\":\"20120002\",\"tax_code\":\"80\",\"bank_account\":\"1280 8210 9256\"}', './uploads/images/janedoe.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
