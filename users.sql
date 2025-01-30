-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 02:05 PM
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
-- Database: `randstad`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `address`, `image`, `password`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Manu Singh', 'kumarmanu@gmail.com', '8521002845', 'Tester', 'Village dumari chhaliya', '1738233236.jpg', '$2y$12$SVulfc3Hcgn5fa2MVnkDlOenhmUO4Nety/Q9oYK3tKWtLT4v6jhfe', 1, '2025-01-30 05:03:56', '2025-01-30 05:04:04', NULL),
(2, 'Rahul Singh', 'rahul@gmail.com', '8888888888', 'Designer', 'BARASAT', '1738233297.png', '$2y$12$A0ohhIrx3aEeQZ2QDl4ggu32eIE94NxkP9rPZvvpHSVPlVfpl3GQ6', 1, '2025-01-30 05:04:57', '2025-01-30 05:04:57', NULL),
(3, 'Rajesh', 'rahul9123@gmail.com', '3333333333', 'Designer', 'ff', '1738233378.png', '$2y$12$q.yJva2EhH2.JNeaMx2x/ui82hR/Jv4SzetLnltIJc4J9cpkYeiUK', 1, '2025-01-30 05:06:18', '2025-01-30 05:06:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
