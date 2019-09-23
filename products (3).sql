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
  `amount` int(11) DEFAULT '0',
  `refund` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `buyCount` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `shop_id`, `title`, `productCat_id`, `status`, `fast_sending`, `money_back`, `support`, `secure_payment`, `type`, `description`, `image`, `color_1`, `color_2`, `color_3`, `color_4`, `color_5`, `feature_1`, `feature_2`, `feature_3`, `feature_4`, `viewCount`, `amount`, `refund`, `weight`, `file_size`, `buyCount`, `price`, `attachment`, `created_at`, `updated_at`) VALUES
(7, 16, 'توپ فوتبال', 4, 1, 1, 1, 1, 1, 'product', 'توپ فوتبال', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569241889_img-7.png","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569241889_img-7.png","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569241889_img-7.png","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569241889_img-7.png","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569241889_img-7.png","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569241889_img-7.png","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569241889_img-7.png","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569241889_img-7.png"}', '#ffffff', '#fec238', '#7341f5', NULL, NULL, 'کاهش فشارهای وارده', 'مقاوم در برابر سایش', 'بدون فشار مضاعف به مفاصل پا', NULL, 0, 100, 0, 50, NULL, 0, 325000, NULL, '2019-09-23 12:10:01', '2019-09-23 12:31:29'),
(8, 16, 'هدفون', 5, 1, 1, 1, 1, 1, 'product', 'هدفون', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569241951_img-3.png","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569241951_img-3.png","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569241951_img-3.png","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569241951_img-3.png","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569241951_img-3.png","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569241951_img-3.png","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569241951_img-3.png","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569241951_img-3.png"}', '#004040', '#800000', '#2f13b3', NULL, NULL, 'کیفیت بالا', 'صدای شفاف', 'ضد آب', 'جنس الومینیوم', 0, 100, 0, 50, NULL, 0, 410000, NULL, '2019-09-23 12:13:13', '2019-09-23 12:32:31'),
(9, 16, 'ساعت هوشمند', 5, 1, 1, 1, 1, 1, 'product', 'ساعت هوشمند', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569242006_img-2.png","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569242006_img-2.png","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569242006_img-2.png","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569242006_img-2.png","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569242006_img-2.png","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569242006_img-2.png","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569242006_img-2.png","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569242006_img-2.png"}', '#2600ff', '#800080', '#f9ff04', NULL, NULL, 'چرم طبیعی', 'پلیمرهایی نرم و انعطاف پذیر', 'طول عمر و مقاومت زیاد، وزن کم', 'شفافیت بالا', 0, 100, 0, 50, NULL, 0, 650000, NULL, '2019-09-23 12:24:22', '2019-09-23 12:33:26'),
(10, 16, 'صندلی راحتی', 6, 1, 1, 1, 1, 1, 'product', 'صندلی راحتی', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569242083_1.jpg","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569242083_1.jpg","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569242083_1.jpg","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569242083_1.jpg","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569242083_1.jpg","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569242083_1.jpg","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569242083_1.jpg","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569242083_1.jpg"}', '#00ff00', '#fe6038', '#6a49ed', NULL, NULL, 'راحت', 'قابلیت حمل آسان', 'پایه های محکم و فلزی', NULL, 0, 5, 0, 50, NULL, 0, 25000, NULL, '2019-09-23 12:34:44', '2019-09-23 12:34:44'),
(11, 16, 'کیف زنانه', 7, 1, 1, 1, 1, 1, 'product', 'کیف زنانه', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569242198_img-4.png","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569242198_img-4.png","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569242198_img-4.png","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569242198_img-4.png","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569242198_img-4.png","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569242198_img-4.png","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569242198_img-4.png","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569242198_img-4.png"}', '#0000a0', '#400000', '#008080', NULL, NULL, 'مقاوم', 'بسیار جا دار', 'بسیار سبک', NULL, 0, 100, 0, 50, NULL, 0, 325000, NULL, '2019-09-23 12:36:38', '2019-09-23 12:36:38'),
(12, 16, 'کیف رودوشی', 7, 1, 1, 1, 1, 1, 'product', 'کیف رودوشی', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569242312_img-1.png","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569242312_img-1.png","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569242312_img-1.png","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569242312_img-1.png","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569242312_img-1.png","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569242312_img-1.png","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569242312_img-1.png","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569242312_img-1.png"}', '#b00004', '#008000', NULL, NULL, NULL, 'چرم طبیعی', 'مقاوم در برابر سایش', 'بسیار سبک', 'جنس پارچه', 0, 5, 0, 50, NULL, 0, 987000, NULL, '2019-09-23 12:38:33', '2019-09-23 12:38:33'),
(13, 16, 'کتاب از تعقیب تا زندان', 8, 1, 1, 1, 1, 1, 'file', 'کتاب از تعقیب تا زندان', '{"original":"\\/storage\\/upload\\/2019\\/9\\/23\\/1569242933_az-taghibta-zendan-fooji.ir_.jpg","80,80":"\\/storage\\/upload\\/2019\\/9\\/23\\/80,80_1569242933_az-taghibta-zendan-fooji.ir_.jpg","400,400":"\\/storage\\/upload\\/2019\\/9\\/23\\/400,400_1569242933_az-taghibta-zendan-fooji.ir_.jpg","250,250":"\\/storage\\/upload\\/2019\\/9\\/23\\/250,250_1569242933_az-taghibta-zendan-fooji.ir_.jpg","200,100":"\\/storage\\/upload\\/2019\\/9\\/23\\/200,100_1569242933_az-taghibta-zendan-fooji.ir_.jpg","410,270":"\\/storage\\/upload\\/2019\\/9\\/23\\/410,270_1569242933_az-taghibta-zendan-fooji.ir_.jpg","120,50":"\\/storage\\/upload\\/2019\\/9\\/23\\/120,50_1569242933_az-taghibta-zendan-fooji.ir_.jpg","16,16":"\\/storage\\/upload\\/2019\\/9\\/23\\/16,16_1569242933_az-taghibta-zendan-fooji.ir_.jpg"}', NULL, NULL, NULL, NULL, NULL, 'داستان جذاب', 'محتوای کاربر پسند', 'ترجمه روان', NULL, 0, NULL, 0, NULL, 898458, 0, 70000, '/storage/upload/2019/9/23/1569242933_az-taghibta-zendan-fooji.ir_.pdf', '2019-09-23 12:48:53', '2019-09-23 12:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_productcat_id_index` (`productCat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
