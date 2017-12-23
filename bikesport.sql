-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5186
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour bikesport
CREATE DATABASE IF NOT EXISTS `bikesport` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bikesport`;

-- Export de la structure de la table bikesport. addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `addressLine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_foreign` (`user_id`),
  CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.addresses : ~4 rows (environ)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` (`id`, `addressLine`, `city`, `state`, `zip`, `country`, `phone`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Sdgdfgbfdgb', 'Ffdgfdgd', 'Fdgfdgfd', 14070, 'Azerbaijan', '+212608554910', 1, '2017-12-07 18:07:21', '2017-12-07 18:07:21'),
	(2, 'Drhhdhhd', 'Dfhsfgh', 'Dfhdhfh', 14070, 'Burundi', '+212608554910', 1, '2017-12-07 18:23:12', '2017-12-07 18:23:12'),
	(3, 'Sdgdfgdf', 'Dfdf', 'Dfbdbf', 14070, 'Austria', '+212608554910', 1, '2017-12-07 18:35:53', '2017-12-07 18:35:53'),
	(4, 'Cbcvncxn', 'Xbwcbx', 'Fdwbwdbf', 14070, 'Albania', '+212608554910', 1, '2017-12-07 18:49:28', '2017-12-07 18:49:28'),
	(5, 'Skhfebseiukjb', 'Nksldvndkv:ds', 'Jbkvf;bnslk', 14070, 'Jamaica', '+212608554910', 1, '2017-12-11 18:10:57', '2017-12-11 18:10:57');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

-- Export de la structure de la table bikesport. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.categories : ~2 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(2, 'Trek', '2017-12-07 17:22:18', '2017-12-07 17:22:18'),
	(3, 'Decathlon', '2017-12-07 17:22:28', '2017-12-07 17:22:28'),
	(4, 'Bike', '2017-12-07 17:22:34', '2017-12-07 17:22:34');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Export de la structure de la table bikesport. categoryws
CREATE TABLE IF NOT EXISTS `categoryws` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.categoryws : ~2 rows (environ)
/*!40000 ALTER TABLE `categoryws` DISABLE KEYS */;
INSERT INTO `categoryws` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(2, 'Trekwidg', '2017-12-07 17:23:09', '2017-12-07 17:23:09'),
	(3, 'Decathlonwedg', '2017-12-07 17:23:17', '2017-12-07 17:23:17'),
	(4, 'Something', '2017-12-07 17:23:23', '2017-12-07 17:23:23');
/*!40000 ALTER TABLE `categoryws` ENABLE KEYS */;

-- Export de la structure de la table bikesport. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.migrations : ~14 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_11_18_185646_create_subsriptions_table', 1),
	(4, '2017_11_18_185718_create_products_table', 1),
	(5, '2017_11_18_185751_create_addresses_table', 1),
	(6, '2017_11_18_185806_create_rates_table', 1),
	(7, '2017_11_18_185820_create_categories_table', 1),
	(8, '2017_11_18_185834_create_orders_table', 1),
	(9, '2017_11_18_185915_create_order_product_table', 1),
	(10, '2017_11_19_111020_create_wishlists_table', 1),
	(11, '2017_11_19_113148_create_product_wishlists_table', 1),
	(12, '2017_11_21_235453_create_widgets_table', 1),
	(13, '2017_11_28_131217_create_categoryws_table', 1),
	(14, '2017_12_07_163543_create_order_widget_table', 1),
	(15, '2017_12_07_184535_create_ratewidgets_table', 2),
	(16, '2017_12_11_172100_create_notifications_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Export de la structure de la table bikesport. notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.notifications : ~1 rows (environ)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('1dfbe668-3737-4dcb-8116-a926183f9cde', 'App\\Notifications\\NewOrder', 1, 'App\\User', '{"message":"A new order was shipped.","order":"http:\\/\\/bikesport.dev\\/11"}', NULL, '2017-12-11 18:14:47', '2017-12-11 18:14:47'),
	('fdg5468g4s6eg135s4gs5dg5s3d1g35sd1h', 'App\\Notifications\\NewOrder', 2, 'App\\User', '{"message":"A new order was shipped.","order":"http:\\/\\/bikesport.dev\\/12"}', NULL, '2017-12-11 18:14:47', '2017-12-11 18:14:47');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Export de la structure de la table bikesport. orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `total` int(11) NOT NULL,
  `delivered` tinyint(4) NOT NULL,
  `status` int(10) unsigned DEFAULT '20',
  `hash` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.orders : ~13 rows (environ)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `total`, `delivered`, `status`, `hash`, `created_at`, `updated_at`) VALUES
	(1, 1, 222, 1, 100, 'YhX4X47IEhfVB9ngddKtMIpXDWGsNVUTX0KAhfVhtojF9vjUlQNfOrELRKA5', '2017-12-07 18:38:28', '2017-12-18 12:42:44'),
	(2, 1, 222, 0, 50, 'eox9r1i85MKivqmnD4o8uSulUSmcVxU2K1PfRZ53I3fU4ZzsgKRsU9fqGJhQ', '2017-12-07 18:39:12', '2017-12-20 12:50:53'),
	(3, 1, 222, 1, 20, 'X6cFOgeaFTVyx2LkbFGIm4P2TQLnOh4JgT5SHzLYzWOSqgf1b8UP5UYh5aoz', '2017-12-07 18:39:45', '2017-12-07 18:39:45'),
	(4, 1, 222, 1, 20, 'IPCKhHQlaVg6gmXFzBopemDx2wymrgGJYYcP6VTohBHgrUbTMp7EMCRXMDxt', '2017-12-07 18:39:46', '2017-12-09 15:09:28'),
	(5, 1, 2702, 1, 80, '32468hGWWik7SzuE5OvsgydUfx1cISbRdb3lduVYqjiST7Naz1gsBBebiKLW', '2017-12-07 18:49:42', '2017-12-09 15:11:31'),
	(6, 1, 2702, 1, 100, 'KW5IcPdVukTRaNDq7NhdY5JmuV1oiPJGT8Os7p4GXaSA8SJ6DLK9YpVC30gZ', '2017-12-07 18:49:43', '2017-12-09 20:19:52'),
	(7, 1, 222, 1, 50, 'eox9r1i85MKivqmnD4o8uSulUSmcVxU2K1PfRZ53I3fU4ZzsgKRsU9fqGJhQ', '2017-12-07 18:39:12', '2017-12-09 15:12:55'),
	(8, 1, 2702, 0, 50, 'dIwwgeotlIQc9kpPA00TRYqGj8EG8CDsZh0YGeGmpviiLMmoiJsuUHFjfuVg', '2017-12-11 18:11:12', '2017-12-17 23:36:31'),
	(9, 1, 2702, 0, 20, 'qU5mLQ5IANkch2coGglymPMfSdXCvsGjOneBlJ7tNRnx6x2pGqodDmMNdXDV', '2017-12-11 18:12:02', '2017-12-11 18:12:02'),
	(10, 1, 2702, 0, 20, 'QsRfTTDvPTdoQ4mpmiTHhTzvGVvj3gVCdN7Lt4Iug250JlGGV7eulvkLHeij', '2017-12-11 18:13:40', '2017-12-11 18:13:40'),
	(11, 1, 2702, 0, 20, 'OGPuFLMKIQIhcQSWYncALh8F3uuKh9vWxvWFpRzvOH6ONLBLMeZhrVcM78Rl', '2017-12-11 18:14:43', '2017-12-11 18:14:43'),
	(12, 1, 2702, 0, 20, 'JFQUNq6X08i0k6cszgUulLlMk5bKATVLLUBCe5BW3KbAfIGo6gy9Sa7pr6GX', '2017-12-11 18:14:44', '2017-12-11 18:14:44'),
	(15, 1, 2702, 0, 20, 'JFQUNq6X08i0k6cszgUulLlMk5bKATVLLUBCe5BW3KbAfIGo6gy9Sa7pr6GX', '2017-12-11 18:14:44', '2017-12-11 18:14:44');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Export de la structure de la table bikesport. order_product
CREATE TABLE IF NOT EXISTS `order_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_product_id_foreign` (`product_id`),
  KEY `order_product_order_id_foreign` (`order_id`),
  CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.order_product : ~2 rows (environ)
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` (`id`, `product_id`, `order_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
	(1, 2, 3, 2, 202.00, NULL, NULL),
	(2, 2, 4, 2, 202.00, NULL, NULL),
	(3, 6, 6, 2, 202.00, NULL, NULL);
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;

-- Export de la structure de la table bikesport. order_widget
CREATE TABLE IF NOT EXISTS `order_widget` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `widget_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_widget_widget_id_foreign` (`widget_id`),
  KEY `order_widget_order_id_foreign` (`order_id`),
  CONSTRAINT `order_widget_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_widget_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.order_widget : ~6 rows (environ)
/*!40000 ALTER TABLE `order_widget` DISABLE KEYS */;
INSERT INTO `order_widget` (`id`, `widget_id`, `order_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
	(1, 2, 5, 1, 2456.00, NULL, NULL),
	(2, 3, 6, 1, 2456.00, NULL, NULL),
	(3, 1, 8, 1, 2456.00, NULL, NULL),
	(4, 1, 9, 1, 2456.00, NULL, NULL),
	(5, 1, 10, 1, 2456.00, NULL, NULL),
	(6, 1, 11, 1, 2456.00, NULL, NULL),
	(7, 1, 12, 1, 2456.00, NULL, NULL);
/*!40000 ALTER TABLE `order_widget` ENABLE KEYS */;

-- Export de la structure de la table bikesport. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Export de la structure de la table bikesport. products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `information` text COLLATE utf8_unicode_ci NOT NULL,
  `color` text COLLATE utf8_unicode_ci NOT NULL,
  `overview` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `size` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `onSale` tinyint(1) NOT NULL DEFAULT '0',
  `discount` double(8,2) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.products : ~9 rows (environ)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `brand`, `description`, `information`, `color`, `overview`, `size`, `price`, `image`, `availability`, `onSale`, `discount`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'Trek 101', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(2, 'Trek 102', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 1000.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(3, 'Trek 103', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(4, 'Trek 104', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(5, 'Trek 105', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(6, 'Trek 106', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(7, 'Trek 107', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(8, 'Trek 108', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(9, 'Trek 109', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(10, 'Trek 110', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40'),
	(11, 'Trek 111', 'Trek', 'TERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKTERKV', 'TERKTERK INFORMATION', 'black, White', 'Trek overview', 'M', 101.00, 'product_img\\Torrance Hartmann-Test Admin-mosters_13.png', 1, 0, NULL, 2, '2017-12-07 17:29:40', '2017-12-07 17:29:40');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Export de la structure de la table bikesport. rates
CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `widget_id` int(10) unsigned DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rates_product_id_foreign` (`product_id`),
  KEY `rates_user_id_foreign` (`user_id`),
  KEY `FK_rates_widgets` (`widget_id`),
  CONSTRAINT `FK_rates_widgets` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`),
  CONSTRAINT `rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.rates : ~5 rows (environ)
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` (`id`, `user_id`, `product_id`, `widget_id`, `rate`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, NULL, 5, '2017-12-07 18:40:33', '2017-12-07 18:40:33'),
	(5, 1, 7, NULL, 2, '2017-12-07 21:25:25', '2017-12-07 21:25:25'),
	(6, 1, NULL, 3, 4, '2017-12-07 21:26:37', '2017-12-07 21:26:37'),
	(7, 1, 3, NULL, 4, '2017-12-07 18:56:11', '2017-12-07 18:56:11'),
	(8, 1, 6, NULL, 3, '2017-12-07 18:56:11', '2017-12-07 18:56:11');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;

-- Export de la structure de la table bikesport. subsriptions
CREATE TABLE IF NOT EXISTS `subsriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subsriptions_user_id_foreign` (`user_id`),
  CONSTRAINT `subsriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.subsriptions : ~0 rows (environ)
/*!40000 ALTER TABLE `subsriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subsriptions` ENABLE KEYS */;

-- Export de la structure de la table bikesport. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `subscriber` tinyint(4) NOT NULL DEFAULT '0',
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `token` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `birthDate`, `gender`, `address`, `phone`, `role`, `subscriber`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `last_login_at`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Torrance Hartmann', 'admin@gmail.com', '$2y$10$VLpv0s2qDtPkV7spOw/B0ufoC53yzKrPckblxpUFs6c21PyD8ZllO', 'user_img\\Torrance Hartmann-user1.jpg', '1995-03-02', 'Male', '42640 Rosanna Walks Suite 285Hagenesport, WV 40557-7729', '+212608554910', 'super_admin', 1, NULL, NULL, NULL, NULL, '2017-12-20 12:34:25', NULL, 'ZKpjPnhLQk', '2017-12-07 17:20:53', '2017-12-20 12:34:25'),
	(2, 'Test', 'test@gmail.com', '$2y$10$VLpv0s2qDtPkV7spOw/B0ufoC53yzKrPckblxpUFs6c21PyD8ZllO', 'user_img\\Torrance Hartmann-user1.jpg', '1995-03-02', 'Male', '42640 Rosanna Walks Suite 285Hagenesport, WV 40557-7729', '+212608554910', 'super_admin', 1, NULL, NULL, NULL, NULL, '2017-12-18 12:29:02', NULL, 'ZKpjPnhLQk', '2017-12-07 17:20:53', '2017-12-18 12:29:02'),
	(8, 'Anas Bajjouk', 'anas@gmail.com', '$2y$10$bTzgoFjiHfD2qbwShu/ku.6eDkZjn4UZlEP6snT.FPsCYiSht7GHm', NULL, NULL, NULL, NULL, NULL, 'user', 0, NULL, NULL, NULL, NULL, '2017-12-19 18:50:20', 'dsdfdsfdsfdsf\r\n', NULL, '2017-12-19 15:22:43', '2017-12-19 18:50:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Export de la structure de la table bikesport. widgets
CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `information` text COLLATE utf8_unicode_ci NOT NULL,
  `color` text COLLATE utf8_unicode_ci NOT NULL,
  `overview` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `size` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `onSale` tinyint(1) NOT NULL DEFAULT '0',
  `discount` double(8,2) DEFAULT NULL,
  `categoryw_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_widgets_categoryws` (`categoryw_id`),
  CONSTRAINT `FK_widgets_categoryws` FOREIGN KEY (`categoryw_id`) REFERENCES `categoryws` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table bikesport.widgets : ~11 rows (environ)
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
INSERT INTO `widgets` (`id`, `name`, `brand`, `description`, `information`, `color`, `overview`, `size`, `price`, `image`, `availability`, `onSale`, `discount`, `categoryw_id`, `created_at`, `updated_at`) VALUES
	(1, 'Widget 1', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(2, 'Widget 2', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(3, 'Widget 3', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(4, 'Widget 4', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(5, 'Widget 5', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(6, 'Widget 6', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(7, 'Widget 7', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(8, 'Widget 8', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(9, 'Widget 9', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(10, 'Widget 10', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17'),
	(11, 'Widget 11', 'dfgfdg', 'dfgfdgdfgf', 'gdfgdfg', 'White, Blue', 'fdgfdgdf', 'M', 2456.00, 'widget_img\\Torrance Hartmann-Test Admin-0003.png', 1, 0, NULL, 3, '2017-12-07 18:01:17', '2017-12-07 18:01:17');
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
