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
-- Table structure for table `shop_contacts`
--

CREATE TABLE IF NOT EXISTS `shop_contacts` (
  `id` bigint(20) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shop_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telegram_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_contacts`
--

INSERT INTO `shop_contacts` (`id`, `shop_id`, `tel`, `phone`, `shop_email`, `address`, `city`, `province`, `telegram_url`, `instagram_url`, `facebook_url`, `created_at`, `updated_at`) VALUES
(13, 15, '02122654789', '09390427226', 'firelinks@yahoo.com', 'تهران پاسداران میدان حسین آباد خ مژده فرعی دوم پلاک سه', 'تهران', 'تهران', 'tg://msg?text = www.example.com?t=12', 'https://www.instagram.com/john_doe', 'https://www.facebook.com/ZambianWatchdog', '2019-09-23 11:27:41', '2019-09-23 11:31:27'),
(14, 16, NULL, '09390427226', NULL, NULL, 'تهران', 'تهران', NULL, NULL, NULL, '2019-09-23 11:53:14', '2019-09-23 11:53:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_contacts`
--
ALTER TABLE `shop_contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_contacts`
--
ALTER TABLE `shop_contacts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
