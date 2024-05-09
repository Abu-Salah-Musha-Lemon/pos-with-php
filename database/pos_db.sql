-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 07:13 AM
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
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `amount` decimal(10,0) NOT NULL DEFAULT 0,
  `image` varchar(500) NOT NULL,
  `user_id` int(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `description`, `qty`, `amount`, `image`, `user_id`, `views`, `date`) VALUES
(9, '842685', 'cookie', 123, 3, 'uploads/ASML660272189.jpeg', 0, 0, '2023-12-23 17:23:31'),
(10, '586744', 'cookie03', 10, 10, 'uploads/ASML218400008.jpeg', 0, 0, '2023-12-23 17:30:32'),
(11, '98885', 'cookie04', 100, 12, 'uploads/ASML211466088.jpeg', 0, 0, '2023-12-23 17:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `selse`
--

CREATE TABLE `selse` (
  `id` int(11) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `recipt_no` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `role`) VALUES
(63, 'lemon', 'lemon@gmail.com', '$2y$10$TwZ4HYXid.RuoxySkZp5zuvIxAEICnDp0uS8NWvT5zdNeaqyvPY1y', '2023-12-21 14:52:36', 'user'),
(64, 'leon', 'leon@gmail.com', '$2y$10$JvIBb75lOplotHRimu5Lm.D059uk3poMBZ4IyvxSQIyxsIu80iMk.', '2023-12-21 16:25:43', 'user'),
(65, 'leon', 'lemon@gmail.com', '$2y$10$TKe/PHJ6n.uIWwAVFl5ZHuE37FUgwRbICycnVi0Unpq91ipPbsk5K', '2023-12-21 16:26:28', 'user'),
(66, 'lemon@gmail.com', 'redoy@gmail.com', '$2y$10$gzB75EGKnRIVXQQKMI8W2eFPJM3yoDykvOs72pxOoZmrWNXRbjo02', '2023-12-23 05:16:00', 'user'),
(67, 'redoy', 'redoy123@gmail.com', '$2y$10$HWlMHGD5lV4fQJTwSDACmuAzBgPIAgqJ7UQ78/yseSjG5aCEDaGFu', '2023-12-23 05:31:40', 'user'),
(68, 'lemon@gmail.com', 'lemon@gmail.com', '$2y$10$0NdOtfu9ogOyZs63XcSKVe78TIOdAAuLT8L3z58tfygj5Vfh/DFj6', '2024-01-17 17:59:23', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `description` (`description`),
  ADD KEY `qty` (`qty`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `views` (`views`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `selse`
--
ALTER TABLE `selse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `recipt_no` (`recipt_no`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `selse`
--
ALTER TABLE `selse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
