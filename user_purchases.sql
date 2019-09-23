-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2019 at 01:28 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_purchases`
--

CREATE TABLE IF NOT EXISTS `user_purchases` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_purchases`
--

INSERT INTO `user_purchases` (`id`, `user_id`, `product_id`, `shop_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 13, 16, '0', '2019-09-23 12:50:33', '2019-09-23 12:50:33'),
(2, 2, 13, 16, '0', '2019-09-23 13:15:14', '2019-09-23 13:15:14'),
(3, 2, 11, 16, '0', '2019-09-23 13:15:30', '2019-09-23 13:15:30'),
(4, 2, 12, 16, '0', '2019-09-23 13:15:33', '2019-09-23 13:15:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_purchases`
--
ALTER TABLE `user_purchases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_purchases`
--
ALTER TABLE `user_purchases`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
