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
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `english_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned DEFAULT NULL,
  `contact_id` int(10) unsigned DEFAULT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `quick_way` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disable',
  `posting_way` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disable',
  `person_way` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disable',
  `icon` text COLLATE utf8_unicode_ci,
  `logo` text COLLATE utf8_unicode_ci,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `english_name`, `user_id`, `cat_id`, `contact_id`, `status`, `quick_way`, `posting_way`, `person_way`, `icon`, `logo`, `description`, `created_at`, `updated_at`) VALUES
(16, 'دیجی کالا', 'digikala', 2, NULL, NULL, 0, 'disable', 'disable', 'disable', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569240267_Digikala-En-LimooGraphic.png","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569240267_Digikala-En-LimooGraphic.png","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569240267_Digikala-En-LimooGraphic.png","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569240267_Digikala-En-LimooGraphic.png","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569240267_Digikala-En-LimooGraphic.png","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569240267_Digikala-En-LimooGraphic.png","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569240267_Digikala-En-LimooGraphic.png","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569240267_Digikala-En-LimooGraphic.png"}', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569240267_Digikala-En-LimooGraphic.png","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569240267_Digikala-En-LimooGraphic.png","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569240267_Digikala-En-LimooGraphic.png","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569240267_Digikala-En-LimooGraphic.png","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569240267_Digikala-En-LimooGraphic.png","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569240267_Digikala-En-LimooGraphic.png","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569240267_Digikala-En-LimooGraphic.png","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569240267_Digikala-En-LimooGraphic.png"}', 'فروشگاهی با تنوع محصولات بالا و بهترین قیمت از انواع برندهای جهانی', '2019-09-23 11:53:14', '2019-09-23 12:04:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `english_name` (`english_name`),
  ADD KEY `name_2` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
