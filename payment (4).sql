-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2019 at 12:06 PM
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
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` bigint(20) unsigned NOT NULL,
  `key` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `bank` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE IF NOT EXISTS `checkouts` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `card_id` int(10) unsigned NOT NULL,
  `wallet_id` int(10) unsigned NOT NULL,
  `amount` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_inquiries`
--

CREATE TABLE IF NOT EXISTS `check_inquiries` (
  `id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE IF NOT EXISTS `dashboards` (
  `id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE IF NOT EXISTS `gateways` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `key` text COLLATE utf8_unicode_ci NOT NULL,
  `wallet_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indices`
--

CREATE TABLE IF NOT EXISTS `indices` (
  `id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_26_143839_create_indices_table', 1),
(4, '2019_08_26_211446_create_dashboards_table', 1),
(5, '2019_08_27_142217_create_check_inquiries_table', 1),
(6, '2019_08_31_161516_create_tickets_table', 1),
(7, '2019_08_31_161635_create_settings_table', 1),
(8, '2019_09_01_040608_create_wallets_table', 1),
(9, '2019_09_01_062635_create_cards_table', 1),
(11, '2019_09_03_120124_create_user_information_table', 1),
(16, '2019_09_03_102731_create_shops_table', 3),
(18, '2019_09_04_083139_create_shop_settings_table', 4),
(19, '2019_09_06_063054_create_shop_categories_table', 4),
(20, '2019_09_06_063357_create_shop_contacts_table', 4),
(22, '2019_09_07_093052_create_gateways_table', 5),
(26, '2019_09_04_050946_create_product_details_table', 6),
(28, '2019_09_08_100853_create_bills_table', 6),
(29, '2019_09_11_115841_create_checkouts_table', 6),
(32, '2019_09_02_055714_create_product_categories_table', 7),
(35, '2019_09_03_131026_create_products_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productCat_id` bigint(20) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `fast_sending` int(10) unsigned NOT NULL DEFAULT '0',
  `money_back` int(10) unsigned NOT NULL DEFAULT '0',
  `support` int(10) unsigned NOT NULL DEFAULT '0',
  `secure_payment` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `color_1` text COLLATE utf8_unicode_ci,
  `color_2` text COLLATE utf8_unicode_ci,
  `color_3` text COLLATE utf8_unicode_ci,
  `color_4` text COLLATE utf8_unicode_ci,
  `color_5` text COLLATE utf8_unicode_ci,
  `feature_1` text COLLATE utf8_unicode_ci,
  `feature_2` text COLLATE utf8_unicode_ci,
  `feature_3` text COLLATE utf8_unicode_ci,
  `feature_4` text COLLATE utf8_unicode_ci,
  `viewCount` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `refund` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `buyCount` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `shop_id`, `title`, `productCat_id`, `status`, `fast_sending`, `money_back`, `support`, `secure_payment`, `type`, `description`, `image`, `color_1`, `color_2`, `color_3`, `color_4`, `color_5`, `feature_1`, `feature_2`, `feature_3`, `feature_4`, `viewCount`, `amount`, `refund`, `weight`, `file_size`, `buyCount`, `price`, `attachment`, `created_at`, `updated_at`) VALUES
(11, 9, 'آمارگیر', 5, 1, 0, 0, 1, 0, 'product', 'توضیحات محصول شماره یک', '/storage/upload/2019/9/17/1568704807_apps-store.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', NULL, NULL, NULL, 0, 5, 0, 10, NULL, 0, 33333, NULL, '2019-09-17 07:20:07', '2019-09-17 07:20:07'),
(12, 9, 'عنوان تست 2', 5, 1, 0, 0, 1, 0, 'service', 'توضیحات محصول شماره یک', '/storage/upload/2019/9/17/1568705244_apps-store.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', NULL, NULL, NULL, 0, 5, 0, NULL, NULL, 0, 25000, NULL, '2019-09-17 07:27:24', '2019-09-17 07:27:24'),
(14, 10, 'محصول شماره یک', 9, 1, 1, 1, 1, 1, 'service', 'توضیحات محصول شماره یک', '/storage/upload/2019/9/17/1568719036_img-3.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', NULL, NULL, NULL, 0, 5, 0, NULL, NULL, 12, 25000, NULL, '2019-09-17 11:17:16', '2019-09-17 11:17:16'),
(15, 10, 'محصول شماره دو', 6, 1, 1, 1, 1, 1, 'service', 'توضیحات محصول شماره دو', '/storage/upload/2019/9/17/1568719085_img-7.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', 'ویژگی دوم', 'ویژگی سوم', NULL, 0, 2, 0, NULL, NULL, 1, 48000, NULL, '2019-09-17 11:18:05', '2019-09-17 11:18:05'),
(16, 10, 'محصول شماره سه', 8, 1, 1, 1, 1, 1, 'service', 'توضیحات محصول شماره سه', '/storage/upload/2019/9/17/1568719154_img-5.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', 'ویژگی ادوم', 'ویژگی سوم', 'ویژگی چهارم', 0, 5, 0, NULL, NULL, 4, 78000, NULL, '2019-09-17 11:19:14', '2019-09-17 11:19:14'),
(17, 10, 'محصول شماره چهار', 8, 1, 1, 1, 1, 0, 'file', 'توضیحات محصول شماره چهار', '/storage/upload/2019/9/17/1568719196_img-4.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', 'ویژگی ادوم', 'ویژگی سوم', NULL, 0, 5, 0, NULL, NULL, 3, 2000000, '/storage/upload/2019/9/19/1568879143_az-taghibta-zendan-fooji.ir_.pdf', '2019-09-17 11:19:56', '2019-09-17 11:19:56'),
(18, 10, 'محصول شماره پنج', 6, 1, 1, 1, 1, 1, 'service', 'توضیحات محصول شماره پنج', '/storage/upload/2019/9/17/1568719992_img-6.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', NULL, NULL, NULL, 0, 5, 0, NULL, NULL, 100, 25000, NULL, '2019-09-17 11:33:12', '2019-09-17 11:33:12'),
(19, 10, 'محصول شماره شش', 9, 1, 1, 1, 0, 0, 'service', 'توضیحات محصول شماره شش', '/storage/upload/2019/9/17/1568720027_img-1.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', 'ویژگی دم', 'ویژگی سوم', NULL, 0, 2, 0, NULL, NULL, 23, 25000, NULL, '2019-09-17 11:33:47', '2019-09-17 11:33:47'),
(20, 9, 'سس', 5, 1, 0, 1, 1, 0, 'service', 'سس', '/storage/upload/2019/9/19/1568872347_apps-store.png', NULL, NULL, NULL, NULL, NULL, '22212', NULL, NULL, NULL, 0, 22, 0, NULL, NULL, 0, 222, NULL, '2019-09-19 05:52:27', '2019-09-19 05:52:27'),
(21, 9, 'کتاب زندگی سخت', 5, 1, 0, 1, 1, 0, 'file', 'کتاب زندگی سخت', '/storage/upload/2019/9/19/1568876644_img-4.png', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', NULL, NULL, NULL, 0, 5, 0, NULL, 20, 0, 25000, '/storage/upload/2019/9/19/1568876644_az-taghibta-zendan-fooji.ir_.pdf', '2019-09-19 07:04:04', '2019-09-19 07:04:04'),
(22, 9, 'آمارگیر', 5, 1, 1, 1, 1, 1, 'file', 'توضیحات محصول شماره یک', '/storage/upload/2019/9/19/1568879143_c.jpg', NULL, NULL, NULL, NULL, NULL, 'ویژگی اول', NULL, NULL, NULL, 0, 5, 0, NULL, 5665, 0, 25000, '/storage/upload/2019/9/19/1568879143_az-taghibta-zendan-fooji.ir_.pdf', '2019-09-19 07:45:43', '2019-09-19 07:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `parent_id`, `shop_id`, `created_at`, `updated_at`) VALUES
(3, 'کفش', 'توضیحات محصول شماره یک', NULL, 1, '2019-09-16 13:30:14', '2019-09-16 13:30:14'),
(4, 'علیرضا', 'توضیحات محصول شماره یک', NULL, 1, '2019-09-17 05:20:19', '2019-09-17 05:20:19'),
(5, 'دسته بندی اول', 'توضیحات محصول شماره یک', NULL, 9, '2019-09-17 06:05:55', '2019-09-17 06:05:55'),
(6, 'ورزشی', 'توضیحات تست 2', NULL, 10, '2019-09-17 09:59:51', '2019-09-17 09:59:51'),
(7, 'خبری', 'توضیحات محصول شماره یک', NULL, 10, '2019-09-17 11:04:18', '2019-09-17 11:04:18'),
(8, 'سیاسی', 'توضیحات تست 2', NULL, 10, '2019-09-17 11:05:07', '2019-09-17 11:05:07'),
(9, 'اقتصادی', 'dd2ewdew', NULL, 10, '2019-09-17 11:05:17', '2019-09-17 11:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE IF NOT EXISTS `product_details` (
  `id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `english_name`, `user_id`, `cat_id`, `contact_id`, `status`, `quick_way`, `posting_way`, `person_way`, `icon`, `logo`, `description`, `created_at`, `updated_at`) VALUES
(9, 'عنوان تست', 'test', 2, NULL, NULL, 0, 'disable', 'disable', 'disable', '/storage/upload/2019/9/17/1568700101_apps-store.png', '/storage/upload/2019/9/17/1568700101_doc-a.png', 'توضیحات تست', '2019-09-17 05:57:59', '2019-09-17 06:01:41'),
(10, 'دیجی کالا', 'digikala', 8, NULL, NULL, 0, 'disable', 'disable', 'disable', '/storage/upload/2019/9/17/1568719342_logo-sm.png', '/storage/upload/2019/9/17/1568719342_logo-sm.png', 'فروشگاهی با تنوع محصولات بالا', '2019-09-17 09:28:52', '2019-09-17 11:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE IF NOT EXISTS `shop_categories` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_contacts`
--

INSERT INTO `shop_contacts` (`id`, `shop_id`, `tel`, `phone`, `shop_email`, `address`, `city`, `province`, `telegram_url`, `instagram_url`, `facebook_url`, `created_at`, `updated_at`) VALUES
(6, 8, NULL, '09390427226', NULL, NULL, 'تهران', 'تهران', NULL, NULL, NULL, '2019-09-17 05:54:38', '2019-09-17 05:54:38'),
(7, 9, NULL, '09390427226', NULL, NULL, 'تهران', 'تهران', NULL, NULL, NULL, '2019-09-17 05:57:59', '2019-09-17 05:57:59'),
(8, 10, NULL, '09390427226', NULL, NULL, 'تهران', 'تهران', NULL, NULL, NULL, '2019-09-17 09:28:52', '2019-09-17 09:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci,
  `doerDescription` text COLLATE utf8_unicode_ci,
  `doer_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `description`, `scope`, `status`, `attachment`, `doerDescription`, `doer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'تست', 'سلام\r\n\r\nتست.', 'فروشگاه ساز', 'بررسی نشده', NULL, NULL, NULL, '2019-09-06 04:13:55', '2019-09-06 04:13:55'),
(4, 2, 'آمارگیر', 'عاالی', 'فروشگاه ساز', 'بررسی نشده', NULL, NULL, NULL, '2019-09-08 06:44:00', '2019-09-08 06:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `email_verified_at`, `password`, `mobile`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'علی', 'رحمانی', 'rahmani@payanpay.ir', NULL, '$2y$10$pvUqW//0mf9UrynQvTPbV.No34rludOIyf9n2qlTlV6CvtVqkNBKq', '09201010328', 'active', NULL, '2019-09-04 02:14:11', '2019-09-04 02:14:11'),
(2, 'حسن', 'خسروجردی', 'hassankhosrojerdi@payanpay.ir', NULL, '$2y$10$raGQ9vFXOR7fBBPR2MAeW.N40XAVaTu4.lXCuUtkt57pAKdfAzeZS', '09390427226', 'active', NULL, '2019-09-04 02:21:20', '2019-09-04 02:21:20'),
(6, 'حسن', 'خسروجردی', 'aliashiyane@gmail.com', NULL, '$2y$10$Zrmu2sONSDp4xsLEBlaXFuhrvkYy5kOwchIa2rF3dac07M5JnZvoW', '09390427226', 'active', NULL, '2019-09-11 02:31:55', '2019-09-11 02:31:55'),
(7, 'نیما', 'کریمی', 'admin@yahoo.com', NULL, '$2y$10$/5gQ5S/2eZQt6yjjLY6BSexYcQc55swXBbAE3qxolrAJO.XA.avPG', '09390427226', 'active', NULL, '2019-09-11 07:34:03', '2019-09-11 07:34:03'),
(8, 'حسن', 'خسروجردی', 'startupadmin@yahoo.com', NULL, '$2y$10$evy7iH5/CAtVitZ95FPfZ.LEQF4HNg4i9QBWzIIMZtAgO8dm7IuhW', '09390427226', 'active', NULL, '2019-09-17 09:27:31', '2019-09-17 09:27:31'),
(9, 'نیما', 'کریمی', 'nima@yahoo.com', NULL, '$2y$10$OCCYI2ssuSwGFZAZuCzFvO78UdqSUi/i3Bu2zcRFQrDw5iOqArx1K', '09202232547', 'active', NULL, '2019-09-19 12:03:23', '2019-09-19 12:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE IF NOT EXISTS `wallets` (
  `id` bigint(20) unsigned NOT NULL,
  `key` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `key`, `name`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'MjU5MjE1Njc1ODQ3MTYy', 'ss', '0.00', 2, '2019-09-04 03:41:56', '2019-09-04 03:41:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_inquiries`
--
ALTER TABLE `check_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indices`
--
ALTER TABLE `indices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_productcat_id_index` (`productCat_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `english_name` (`english_name`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_contacts`
--
ALTER TABLE `shop_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `check_inquiries`
--
ALTER TABLE `check_inquiries`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indices`
--
ALTER TABLE `indices`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_contacts`
--
ALTER TABLE `shop_contacts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_productcat_id_foreign` FOREIGN KEY (`productCat_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
