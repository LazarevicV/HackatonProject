-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2023 at 12:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookies`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `id_parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prodavnice', NULL, '2023-03-18 23:33:56', NULL, NULL),
(2, 'Drzavne ustanove', NULL, '2023-03-18 23:34:15', NULL, NULL),
(3, 'Prehrambene', 1, '2023-03-18 23:34:48', NULL, NULL),
(4, 'Prodavnica hemije', 1, '2023-03-18 23:35:04', NULL, NULL),
(5, 'Pet Shop', 1, '2023-03-18 23:35:20', NULL, NULL),
(6, 'Sportske opreme', 1, '2023-03-18 23:35:52', NULL, NULL),
(7, 'Life style', 1, '2023-03-18 23:36:08', NULL, NULL),
(8, 'Bela tehnika', 1, '2023-03-18 23:36:40', NULL, NULL),
(9, 'MUP', 2, '2023-03-18 23:36:52', NULL, NULL),
(10, 'Bolnice', 2, '2023-03-18 23:37:04', NULL, NULL),
(11, 'Fakulteti', 2, '2023-03-18 23:37:20', NULL, NULL),
(12, 'Posta', 2, '2023-03-18 23:37:36', NULL, NULL),
(13, 'Dom zdravlja', 2, '2023-03-18 23:37:50', NULL, NULL),
(14, 'Skola', 2, '2023-03-18 23:38:04', NULL, NULL),
(15, 'Sud', 2, '2023-03-18 23:38:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beograd', '2023-03-18 22:15:07', NULL, NULL),
(2, 'Novi Sad', '2023-03-18 22:15:07', NULL, NULL),
(3, 'Niš', '2023-03-18 22:15:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `user_suggested` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `src` varchar(255) DEFAULT NULL,
  `alt` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `x_cordinate` decimal(10,0) DEFAULT NULL,
  `y_cordinate` decimal(10,0) DEFAULT NULL,
  `description` varchar(5000) NOT NULL,
  `discount` tinyint(1) DEFAULT NULL,
  `parking` tinyint(4) NOT NULL,
  `wc` tinyint(4) NOT NULL,
  `elevator` tinyint(4) NOT NULL,
  `ground_level` tinyint(4) NOT NULL,
  `professional_staff` tinyint(4) NOT NULL,
  `wheelchair_entrance` tinyint(4) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `id_category`, `id_city`, `user_suggested`, `name`, `src`, `alt`, `address`, `x_cordinate`, `y_cordinate`, `description`, `discount`, `parking`, `wc`, `elevator`, `ground_level`, `professional_staff`, `wheelchair_entrance`, `is_verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 2, 2, 'David Stević', '', '', 'Gavrila Principa 7 Leštane', NULL, NULL, 'aklsdlkasfhlsdhflksdhfklhslkdfhslkdfhsdhflkdshfldshflfksdhls', 0, 1, 0, 0, 0, 0, 1, 1, '2023-03-19 00:02:46', '2023-03-19 05:55:34', NULL),
(3, 3, 2, 2, 'David Stević', '', '', 'Gavrila Principa 7 Leštane', NULL, NULL, 'cxkj;dfk;lgkl;dfv;ldkf;kfd', 1, 1, 0, 0, 1, 1, 1, 1, '2023-03-19 00:05:12', '2023-03-19 05:55:42', NULL),
(4, 4, 1, 2, 'David Stević', '64168cc456c7e_1679199428.png', 'David Stević', 'Gavrila Principa 7 Leštane', NULL, NULL, 'asdasdasdasasdasdasd', 1, 1, 0, 0, 1, 0, 1, 1, '2023-03-19 04:17:08', '2023-03-19 05:55:48', NULL),
(5, 6, 1, 2, 'David Stevias', '6416b99e451dd_1679210910.png', 'David Stevias', 'Gavrila Principa 7', NULL, NULL, 'gfddfgfddfgdfhftdgd', 0, 0, 0, 0, 0, 0, 1, 0, '2023-03-19 07:28:30', NULL, NULL),
(6, 6, 1, 2, 'David Stevias', '6416b9ef70c9a_1679210991.png', 'David Stevias', 'Gavrila Principa 7', NULL, NULL, 'gfddfgfddfgdfhftdgd', 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-19 07:29:51', NULL, NULL),
(7, 6, 1, 2, 'David Stevias', '6416b9f0a6c7c_1679210992.png', 'David Stevias', 'Gavrila Principa 7', NULL, NULL, 'gfddfgfddfgdfhftdgd', 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-19 07:29:52', NULL, NULL),
(8, 6, 1, 2, 'David Stevias', '6416b9f9ea1ed_1679211001.png', 'David Stevias', 'Gavrila Principa 7', NULL, NULL, 'gfddfgfddfgdfhftdgd', 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-19 07:30:01', NULL, NULL),
(9, 6, 1, 2, 'David Stevias', '6416ba461f899_1679211078.png', 'David Stevias', 'Gavrila Principa 7', NULL, NULL, 'gfddfgfddfgdfhftdgd', 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-19 07:31:18', NULL, NULL),
(10, 6, 1, 2, 'Lmao', '6416ba6e9bf2b_1679211118.png', 'David Stevias', 'Gavrila Principa 7', NULL, NULL, 'gfddfgfddfgdfhftdgd', 0, 1, 0, 1, 0, 0, 1, 1, '2023-03-19 07:31:58', NULL, NULL),
(11, 3, 1, 2, 'Maxi', '6416e591c4605_1679222161.jpg', 'Maxi', 'Brace Grim 20', NULL, NULL, 'Maxi je skroz pristupacan i ima gore navedeno.', 0, 1, 1, 0, 0, 0, 1, 0, '2023-03-19 10:36:01', NULL, NULL),
(12, 4, 2, 2, 'Hemija NS', '6416e6d9ee0d0_1679222489.webp', 'Hemija NS', 'Milenka Pajica 18', NULL, NULL, 'Vrhunka usluga', 1, 0, 0, 0, 0, 0, 1, 0, '2023-03-19 10:41:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `place_comment`
--

CREATE TABLE `place_comment` (
  `id` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place_comment`
--

INSERT INTO `place_comment` (`id`, `id_place`, `id_user`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 2, 'hhahahaha', '2023-03-19 08:23:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2023-03-18 19:06:17', NULL, NULL),
(2, 'Korisnik', '2023-03-18 19:06:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` tinyint(10) NOT NULL DEFAULT 0,
  `is_banned` tinyint(1) NOT NULL,
  `id_role` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `active`, `is_banned`, `id_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'David', 'Stevic', 'dacha', 'dacha@gmail.com', '4f1b975ec7c35c20e901e8a1064a8980', 0, 0, 2, '2023-03-18 19:07:06', NULL, NULL),
(3, 'Marko', 'Dasic', 'mare', 'marko@gmail.com', '217d507d2d68adda57f6d0a68a4ebd1e', 1, 1, 2, '2023-03-19 00:26:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_shop_rate`
--

CREATE TABLE `user_shop_rate` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_shop` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_shop_rate`
--

INSERT INTO `user_shop_rate` (`id`, `id_user`, `id_shop`, `rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 3, 2, 4, '2023-03-19 10:29:01', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `user_suggested` (`user_suggested`);

--
-- Indexes for table `place_comment`
--
ALTER TABLE `place_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shop` (`id_place`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_shop_rate`
--
ALTER TABLE `user_shop_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shop` (`id_shop`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `place_comment`
--
ALTER TABLE `place_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_shop_rate`
--
ALTER TABLE `user_shop_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `category` (`id`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `place_ibfk_3` FOREIGN KEY (`user_suggested`) REFERENCES `user` (`id`);

--
-- Constraints for table `place_comment`
--
ALTER TABLE `place_comment`
  ADD CONSTRAINT `place_comment_ibfk_1` FOREIGN KEY (`id_place`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `place_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_shop_rate`
--
ALTER TABLE `user_shop_rate`
  ADD CONSTRAINT `user_shop_rate_ibfk_1` FOREIGN KEY (`id_shop`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `user_shop_rate_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
