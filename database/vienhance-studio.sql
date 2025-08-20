-- -------------------------------------------------------------
-- TablePlus 6.6.8(632)
--
-- https://tableplus.com/
--
-- Database: vienhancestudio
-- Generation Time: 2025-08-21 01:30:40.6320
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_data` json DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_galleries`;
CREATE TABLE `portfolio_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint unsigned NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_galleries_portfolio_id_foreign` (`portfolio_id`),
  CONSTRAINT `portfolio_galleries_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE `portfolios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_project` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_card` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_creator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_markup` json DEFAULT NULL,
  `priority` decimal(3,2) DEFAULT NULL,
  `change_frequency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('live','in-development','recurring') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in-development',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolios_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `service_descriptions`;
CREATE TABLE `service_descriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint unsigned NOT NULL,
  `section_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefits` json NOT NULL,
  `process` json NOT NULL,
  `faqs` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_descriptions_service_id_index` (`service_id`),
  CONSTRAINT `service_descriptions_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0s',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`),
  KEY `services_is_active_index` (`is_active`),
  KEY `services_sort_order_index` (`sort_order`),
  KEY `services_is_active_sort_order_index` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `static_pages`;
CREATE TABLE `static_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'website',
  `og_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_card` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'summary_large_image',
  `twitter_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_creator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_markup` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `priority` int NOT NULL DEFAULT '0',
  `change_frequency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'weekly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `static_pages_page_name_unique` (`page_name`),
  UNIQUE KEY `static_pages_route_name_unique` (`route_name`),
  KEY `static_pages_page_name_is_active_index` (`page_name`,`is_active`),
  KEY `static_pages_route_name_is_active_index` (`route_name`,`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:2;', 1755541451),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1755541451;', 1755541451),
('livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1755715816),
('livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1755715816;', 1755715816);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_17_144932_create_services_table', 2),
(5, '2025_08_17_144941_create_service_descriptions_table', 2),
(6, '2025_08_17_150707_add_soft_deletes_and_indexes_to_services_tables', 3),
(7, '2025_08_17_165909_create_static_pages_table', 4),
(8, '2025_08_17_184959_create_portfolios_table', 5),
(10, '2025_08_17_185008_create_portfolio_galleries_table', 6),
(11, '2025_08_20_184522_create_contacts_table', 7),
(12, '2025_08_20_190726_add_location_data_to_contacts_table', 8);

INSERT INTO `portfolio_galleries` (`id`, `portfolio_id`, `image`, `alt_text`, `caption`, `sort_order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/portfolio-gallery/01K2Z46VVHTK9456QAKDC0JBQ1.png', 'Stellar Tech Solutions Homepage', 'Homepage Design', 1, NULL, '2025-08-17 18:59:37', '2025-08-18 17:39:07'),
(2, 1, 'post-4.jpg', 'Stellar Tech Solutions Dashboard', 'Dashboard Interface', 2, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(3, 1, 'post-4.jpg', 'Stellar Tech Solutions Mobile', 'Mobile Responsive Design', 3, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(4, 1, 'post-4.jpg', 'Stellar Tech Solutions Admin', 'Admin Panel', 4, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(5, 1, 'post-4.jpg', 'Stellar Tech Solutions Analytics', 'Analytics Dashboard', 5, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(6, 1, 'post-4.jpg', 'Stellar Tech Solutions Features', 'Key Features', 6, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(7, 1, 'post-4.jpg', 'Stellar Tech Solutions Integration', 'System Integration', 7, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(8, 1, 'post-4.jpg', 'Stellar Tech Solutions Final', 'Final Implementation', 8, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(9, 2, 'post-4.jpg', 'Green Wave Foods Homepage', 'Homepage Design', 1, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(10, 2, 'post-4.jpg', 'Green Wave Foods Products', 'Product Catalog', 2, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(11, 2, 'post-4.jpg', 'Green Wave Foods Cart', 'Shopping Cart', 3, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(12, 2, 'post-4.jpg', 'Green Wave Foods Checkout', 'Checkout Process', 4, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(13, 2, 'post-4.jpg', 'Green Wave Foods Mobile', 'Mobile Experience', 5, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(14, 2, 'post-4.jpg', 'Green Wave Foods Admin', 'Admin Dashboard', 6, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(15, 2, 'post-4.jpg', 'Green Wave Foods Analytics', 'Sales Analytics', 7, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(16, 2, 'post-4.jpg', 'Green Wave Foods Final', 'Final Platform', 8, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(17, 3, 'post-4.jpg', 'Horizon Real Estate Logo', 'Logo Design', 1, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(18, 3, 'post-4.jpg', 'Horizon Real Estate Brand', 'Brand Guidelines', 2, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(19, 3, 'post-4.jpg', 'Horizon Real Estate Business Cards', 'Business Cards', 3, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(20, 3, 'post-4.jpg', 'Horizon Real Estate Brochures', 'Marketing Brochures', 4, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(21, 3, 'post-4.jpg', 'Horizon Real Estate Website', 'Website Design', 5, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(22, 3, 'post-4.jpg', 'Horizon Real Estate Social Media', 'Social Media Assets', 6, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(23, 3, 'post-4.jpg', 'Horizon Real Estate Signage', 'Office Signage', 7, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(24, 3, 'post-4.jpg', 'Horizon Real Estate Final', 'Final Brand Package', 8, NULL, '2025-08-17 18:59:37', '2025-08-17 18:59:37'),
(25, 4, 'uploads/portfolio-gallery/01K2Z4SDK50H1JAWY140MKEZR4.png', 'Hylnfluencer', NULL, 0, NULL, '2025-08-18 17:49:15', '2025-08-18 17:49:15'),
(26, 4, 'uploads/portfolio-gallery/01K2Z4STY9FBBKBXY1PAPPE5PE.png', 'Hylnfluencer', NULL, 1, NULL, '2025-08-18 17:49:28', '2025-08-18 17:49:28'),
(27, 4, 'uploads/portfolio-gallery/01K2Z4T78Y8G9DEX20456DWN7Z.png', 'Hylnfluencer', NULL, 3, NULL, '2025-08-18 17:49:41', '2025-08-18 17:49:41'),
(28, 4, 'uploads/portfolio-gallery/01K2Z4TJF93SPJ14QTPME23G22.png', 'Hylnfluencer', NULL, 4, NULL, '2025-08-18 17:49:53', '2025-08-18 17:50:47'),
(29, 4, 'uploads/portfolio-gallery/01K2Z4TY67Z32JQADQA1HMAWD1.png', 'Hylnfluencer', NULL, 5, NULL, '2025-08-18 17:50:05', '2025-08-18 17:50:05'),
(30, 4, 'uploads/portfolio-gallery/01K2Z4VBR9BGW28D6ZWYG3D4JY.png', 'Hylnfluencer', NULL, 6, NULL, '2025-08-18 17:50:18', '2025-08-18 17:50:18'),
(31, 5, 'uploads/portfolio-gallery/01K2Z5AS8T5RGDS88E2AZT2FCE.png', 'EV Charging Station App Design', 'EV Charging Station App Design', 0, NULL, '2025-08-18 17:58:44', '2025-08-18 17:58:44'),
(32, 5, 'uploads/portfolio-gallery/01K2Z5B7FD7FCRKC5ETPDD94TV.png', 'EV Charging Station App Design', 'EV Charging Station App Design', 2, NULL, '2025-08-18 17:58:58', '2025-08-18 17:58:58'),
(33, 5, 'uploads/portfolio-gallery/01K2Z5BHXPQTP36GDRH6N78PX6.png', 'EV Charging Station App Design', 'EV Charging Station App Design', 3, NULL, '2025-08-18 17:59:09', '2025-08-18 17:59:09'),
(34, 5, 'uploads/portfolio-gallery/01K2Z5C2QQ9WFE0KGKQAPGMXFF.png', 'EV Charging Station App Design', 'EV Charging Station App Design', 4, NULL, '2025-08-18 17:59:26', '2025-08-18 17:59:26'),
(35, 5, 'uploads/portfolio-gallery/01K2Z5CG6A9ACAX8JFRJS9B50C.png', 'EV Charging Station App Design', 'EV Charging Station App Design', 1, NULL, '2025-08-18 17:59:40', '2025-08-18 18:00:01'),
(36, 6, 'uploads/portfolio-gallery/01K2Z5R43QHH2FH5YH48T60JSR.jpg', 'SI Industries', 'SI Industries', 0, NULL, '2025-08-18 18:06:01', '2025-08-18 18:06:01'),
(37, 6, 'uploads/portfolio-gallery/01K2Z5RFJKQ57C3JVWYZJK683Z.jpg', 'SI Industries', 'SI Industries', 1, NULL, '2025-08-18 18:06:13', '2025-08-18 18:06:13'),
(38, 6, 'uploads/portfolio-gallery/01K2Z5RRTY6GZADJNV6CAC7889.jpg', 'SI Industries', 'SI Industries', 2, NULL, '2025-08-18 18:06:22', '2025-08-18 18:06:22'),
(39, 6, 'uploads/portfolio-gallery/01K2Z5S2JT2VKGQRS9YQFV9XKM.jpg', 'SI Industries', 'SI Industries', 3, NULL, '2025-08-18 18:06:32', '2025-08-18 18:06:32'),
(40, 6, 'uploads/portfolio-gallery/01K2Z5SCK3T9JDTWD80BMFV3XM.jpg', 'SI Industries', 'SI Industries', 4, NULL, '2025-08-18 18:06:42', '2025-08-18 18:06:42'),
(41, 6, 'uploads/portfolio-gallery/01K2Z5TB5179EWDF8TX6SGMRYY.jpg', 'SI Industries', 'SI Industries', 5, NULL, '2025-08-18 18:07:14', '2025-08-18 18:07:14'),
(42, 6, 'uploads/portfolio-gallery/01K2Z5TN0D9EP73A22QAR59HD3.jpg', 'SI Industries', 'SI Industries', 6, NULL, '2025-08-18 18:07:24', '2025-08-18 18:07:24'),
(43, 6, 'uploads/portfolio-gallery/01K2Z5V3SW3MDF145JBB23EY3A.jpg', 'SI Industries', 'SI Industries', 7, NULL, '2025-08-18 18:07:39', '2025-08-18 18:07:39'),
(44, 6, 'uploads/portfolio-gallery/01K2Z5VFEZ42PS4W3KFGH2S1WC.jpg', 'SI Industries', 'SI Industries', 8, NULL, '2025-08-18 18:07:51', '2025-08-18 18:07:51'),
(45, 6, 'uploads/portfolio-gallery/01K2Z5VSRHSPQCMR1BA05QA077.jpg', 'SI Industries', 'SI Industries', 9, NULL, '2025-08-18 18:08:01', '2025-08-18 18:08:01'),
(46, 6, 'uploads/portfolio-gallery/01K2Z5W6N1BABZHMFSCBHM2M40.jpg', 'SI Industries', 'SI Industries', 10, NULL, '2025-08-18 18:08:15', '2025-08-18 18:08:15'),
(47, 6, 'uploads/portfolio-gallery/01K2Z5WHQ7JZK707PMFRAZ1A03.jpg', 'SI Industries', 'SI Industries', 11, NULL, '2025-08-18 18:08:26', '2025-08-18 18:08:26'),
(48, 6, 'uploads/portfolio-gallery/01K2Z5WXDH93F2RWPA4W4CY8QJ.jpg', 'SI Industries', 'SI Industries', 12, NULL, '2025-08-18 18:08:38', '2025-08-18 18:08:38'),
(49, 7, 'uploads/portfolio-gallery/01K2Z6A5GS0Y2CGJ1XPAHTV0B3.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 0, NULL, '2025-08-18 18:15:52', '2025-08-18 18:15:52'),
(50, 7, 'uploads/portfolio-gallery/01K2Z6AGP2QTRKQBKW191J58A3.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 1, NULL, '2025-08-18 18:16:04', '2025-08-18 18:16:04'),
(51, 7, 'uploads/portfolio-gallery/01K2Z6AW5BD60T1HGTCYD0RRSK.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 2, NULL, '2025-08-18 18:16:15', '2025-08-18 18:16:15'),
(52, 7, 'uploads/portfolio-gallery/01K2Z6B6H8MTKY8B6D1VFEMM9F.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 3, NULL, '2025-08-18 18:16:26', '2025-08-18 18:16:26'),
(53, 7, 'uploads/portfolio-gallery/01K2Z6BHV1371XG6W8M1YRQ6N8.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 4, NULL, '2025-08-18 18:16:37', '2025-08-18 18:16:37'),
(54, 7, 'uploads/portfolio-gallery/01K2Z6BXB7C8H1SY1WXKTNHJ6V.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 5, NULL, '2025-08-18 18:16:49', '2025-08-18 18:16:49'),
(55, 7, 'uploads/portfolio-gallery/01K2Z6C7JC5Q0XY6F5S34P4EW1.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 6, NULL, '2025-08-18 18:17:00', '2025-08-18 18:17:00'),
(56, 7, 'uploads/portfolio-gallery/01K2Z6CH4D7D75VWM9DTS8KB8Q.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 7, NULL, '2025-08-18 18:17:10', '2025-08-18 18:17:10'),
(57, 7, 'uploads/portfolio-gallery/01K2Z6CVA6NK9NRBBQZMFSZ3PV.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 8, NULL, '2025-08-18 18:17:20', '2025-08-18 18:17:20'),
(58, 7, 'uploads/portfolio-gallery/01K2Z6D6C14A8KMPT7HNP5N0EG.png', 'Ramdhan jewellers', 'Ramdhan jewellers', 9, NULL, '2025-08-18 18:17:31', '2025-08-18 18:17:31'),
(59, 8, 'uploads/portfolio-gallery/01K2Z6JRDRJRWHSPTTS31QMM4C.jpg', 'Layali ', 'Layali ', 0, NULL, '2025-08-18 18:20:34', '2025-08-18 18:20:34'),
(60, 8, 'uploads/portfolio-gallery/01K2Z6K26Q5CRDE0TBPBP7SAF7.jpg', 'Layali ', 'Layali ', 1, NULL, '2025-08-18 18:20:44', '2025-08-18 18:20:44'),
(61, 8, 'uploads/portfolio-gallery/01K2Z6KC5S542RX8EW14Z3S6JY.jpg', 'Layali ', 'Layali ', 2, NULL, '2025-08-18 18:20:54', '2025-08-18 18:20:54'),
(62, 8, 'uploads/portfolio-gallery/01K2Z6KP2FJGGENCZC8WCHG6XG.jpg', 'Layali ', 'Layali ', 3, NULL, '2025-08-18 18:21:04', '2025-08-18 18:21:04'),
(63, 8, 'uploads/portfolio-gallery/01K2Z6M1MYSSVY163V2T39ED0K.jpg', 'Layali ', 'Layali ', 4, NULL, '2025-08-18 18:21:16', '2025-08-18 18:21:16'),
(64, 8, 'uploads/portfolio-gallery/01K2Z6N0RTKZDH8KGMCEQ2R9WR.jpg', 'Layali ', 'Layali ', 5, NULL, '2025-08-18 18:21:48', '2025-08-18 18:21:48'),
(65, 8, 'uploads/portfolio-gallery/01K2Z6NB1ZPNW1EFP7JVJASSB7.jpg', 'Layali ', 'Layali ', 6, NULL, '2025-08-18 18:21:58', '2025-08-18 18:21:58'),
(66, 8, 'uploads/portfolio-gallery/01K2Z6NNNNW5SYNNCDWXR83HBH.jpg', 'Layali ', 'Layali ', 7, NULL, '2025-08-18 18:22:09', '2025-08-18 18:22:09'),
(67, 8, 'uploads/portfolio-gallery/01K2Z6P1C2KNQX0VEV50RA49SA.jpg', 'Layali ', 'Layali ', 8, NULL, '2025-08-18 18:22:21', '2025-08-18 18:22:21'),
(68, 8, 'uploads/portfolio-gallery/01K2Z6PWKRMYZR510QVZERBCV7.jpg', 'Layali ', 'Layali ', 9, NULL, '2025-08-18 18:22:49', '2025-08-18 18:22:49'),
(69, 8, 'uploads/portfolio-gallery/01K2Z6Q82CBSXDDNY78S7STW0R.jpg', 'Layali ', 'Layali ', 10, NULL, '2025-08-18 18:23:01', '2025-08-18 18:23:01'),
(70, 8, 'uploads/portfolio-gallery/01K2Z6QNARHCPBRMGXV57X6XHW.jpg', 'Layali ', 'Layali ', 12, NULL, '2025-08-18 18:23:14', '2025-08-18 18:23:14'),
(71, 8, 'uploads/portfolio-gallery/01K2Z6RM5GGK2YX9WX24J3NFW1.jpg', 'Layali ', 'Layali ', 11, NULL, '2025-08-18 18:23:46', '2025-08-18 18:23:46');

INSERT INTO `portfolios` (`id`, `title`, `client`, `industry`, `overview`, `about_project`, `image`, `slug`, `short_description`, `testimonial`, `meta_title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`, `og_image`, `og_type`, `og_url`, `og_site_name`, `twitter_card`, `twitter_title`, `twitter_description`, `twitter_image`, `twitter_site`, `twitter_creator`, `canonical_url`, `schema_markup`, `priority`, `change_frequency`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Stellar Tech Solutions', 'Cameron Williamson', 'Technology', 'Stellar Tech Solutions is a leading provider of innovative technology services designed to empower businesses in today\'s fast-paced digital landscape. We specialize in crafting customized IT solutions, integrating cutting-edge technologies, and delivering robust cybersecurity strategies to ensure your organization\'s growth, efficiency, and security.', 'Our team of experienced professionals is dedicated to understanding your unique challenges and goals, offering tailored services that align with your vision. From seamless system integration and managed IT services to advanced cloud solutions and proactive cybersecurity measures, we help businesses streamline operations, enhance productivity, and safeguard critical data.', 'uploads/portfolios/01K2Z3DEAK6RVSHC9R3VS5HXQJ.png', 'stellar-tech-solutions', 'We redesigned Stellar Tech\'s website to enhance their digital presence and improve user experience.', 'The team at Vienhance Studio delivered an exceptional website that perfectly captures our brand identity and exceeds our expectations. The attention to detail and user experience is outstanding.', 'Stellar Tech Solutions - Web Design Project | Vienhance Studio', 'See how we redesigned Stellar Tech Solutions\' website to enhance their digital presence and improve user experience.', 'web design, branding, tech company, responsive design, user experience', 'Stellar Tech Solutions - Web Design Project', 'See how we redesigned Stellar Tech Solutions\' website to enhance their digital presence and improve user experience.', NULL, 'website', 'https://vienhancestudio.com/portfolio/stellar-tech-solutions', 'Vienhance Studio', 'summary_large_image', 'Stellar Tech Solutions - Web Design Project', 'See how we redesigned Stellar Tech Solutions\' website to enhance their digital presence and improve user experience.', NULL, '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com/portfolio/stellar-tech-solutions', '{\"url\": \"https://vienhancestudio.com/portfolio/stellar-tech-solutions\", \"name\": \"Stellar Tech Solutions Website\", \"@type\": \"CreativeWork\", \"creator\": {\"name\": \"Vienhance Studio\", \"@type\": \"Organization\"}, \"@context\": \"https://schema.org\", \"dateCreated\": \"2023-01-25\", \"description\": \"Professional web design and development for Stellar Tech Solutions\"}', 0.80, 'monthly', 'live', '2025-08-18 17:43:10', '2025-08-17 18:59:37', '2025-08-18 17:43:10'),
(2, 'Green Wave Foods', 'Sarah Johnson', 'Food & Beverage', 'Green Wave Foods needed a modern, user-friendly e-commerce platform that could handle their growing customer base while maintaining the organic, sustainable brand image they\'ve built.', 'Creating an intuitive shopping experience that reflects the company\'s commitment to sustainability while ensuring fast loading times and mobile responsiveness. The platform needed to showcase their organic products effectively while providing a seamless checkout process.', 'work-image-2.jpg', 'green-wave-foods', 'We built a user-friendly Shopping platform for Green Wave Foods.', 'The e-commerce platform Vienhance Studio created for us has significantly increased our online sales. The user experience is intuitive and the mobile responsiveness is perfect.', 'Green Wave Foods - E-commerce Platform | Vienhance Studio', 'Modern e-commerce platform for Green Wave Foods with mobile-first design and sustainable branding.', 'e-commerce, food platform, mobile design, sustainable branding, online shopping', 'Green Wave Foods - E-commerce Platform', 'Modern e-commerce platform for Green Wave Foods with mobile-first design and sustainable branding.', 'work-image-2.jpg', 'website', 'https://vienhancestudio.com/portfolio/green-wave-foods', 'Vienhance Studio', 'summary_large_image', 'Green Wave Foods - E-commerce Platform', 'Modern e-commerce platform for Green Wave Foods with mobile-first design and sustainable branding.', 'work-image-2.jpg', '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com/portfolio/green-wave-foods', '{\"url\": \"https://vienhancestudio.com/portfolio/green-wave-foods\", \"name\": \"Green Wave Foods E-commerce Platform\", \"@type\": \"CreativeWork\", \"creator\": {\"name\": \"Vienhance Studio\", \"@type\": \"Organization\"}, \"@context\": \"https://schema.org\", \"dateCreated\": \"2023-03-15\", \"description\": \"Modern e-commerce platform for organic food products\"}', 0.80, 'monthly', 'live', '2025-08-18 17:43:10', '2025-08-17 18:59:37', '2025-08-18 17:43:10'),
(3, 'Horizon Real Estate', 'Michael Chen', 'Real Estate', 'Horizon Real Estate required a complete brand identity overhaul to establish themselves as a trusted name in the competitive real estate market.', 'Developing a brand identity that conveys trust, professionalism, and local expertise while standing out in a crowded market. The project included logo design, brand guidelines, and marketing materials.', 'work-image-3.jpg', 'horizon-real-estate', 'We helped Horizon Real Estate establish a trusted brand identity.', 'Vienhance Studio transformed our brand identity completely. The new logo and design system perfectly represents our values and has helped us stand out in the competitive real estate market.', 'Horizon Real Estate - Brand Identity Design | Vienhance Studio', 'Complete brand identity overhaul for Horizon Real Estate including logo design and marketing materials.', 'brand identity, logo design, real estate, marketing materials, brand guidelines', 'Horizon Real Estate - Brand Identity Design', 'Complete brand identity overhaul for Horizon Real Estate including logo design and marketing materials.', 'work-image-3.jpg', 'website', 'https://vienhancestudio.com/portfolio/horizon-real-estate', 'Vienhance Studio', 'summary_large_image', 'Horizon Real Estate - Brand Identity Design', 'Complete brand identity overhaul for Horizon Real Estate including logo design and marketing materials.', 'work-image-3.jpg', '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com/portfolio/horizon-real-estate', '{\"url\": \"https://vienhancestudio.com/portfolio/horizon-real-estate\", \"name\": \"Horizon Real Estate Brand Identity\", \"@type\": \"CreativeWork\", \"creator\": {\"name\": \"Vienhance Studio\", \"@type\": \"Organization\"}, \"@context\": \"https://schema.org\", \"dateCreated\": \"2023-02-10\", \"description\": \"Complete brand identity design for real estate company\"}', 0.80, 'monthly', 'live', '2025-08-18 17:43:10', '2025-08-17 18:59:37', '2025-08-18 17:43:10'),
(4, 'Hylnfluencer', 'Hylnfluencer', 'Marketing', 'Hylnfluencer, is redefining affiliate marketing with a brand-first philosophy. Their primary goal is to empower affiliates for unparalleled success. Through innovation, cutting-edge technologies, and revolutionary commission structures, Hylnfluncer lead the industry.', ' Transparent, lasting partnerships and high-converting traffic drive exceptional value for their clients. Maximized affiliate earnings, a dynamic global community, and unwavering brand integrity set us apart as the go-to platform, shaping the future of affiliate marketing.', 'uploads/portfolios/01K2Z4PRAYG8HFHPH1XMAR7WA0.png', 'hylnfluencer', 'Hylnfluencer, is redefining affiliate marketing with a brand-first philosophy. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'live', NULL, '2025-08-18 17:47:47', '2025-08-18 17:55:45'),
(5, 'EV Charging Station App Design', 'EV Charging Station App Design', 'Technology', 'EV Charging Station App Design', '       .', 'uploads/portfolios/01K2Z59KZWYCJ58A9WS03634K2.png', 'ev-charging-station-app-design', 'EV Charging Station App Design', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'live', NULL, '2025-08-18 17:58:06', '2025-08-18 18:01:49'),
(6, 'SI Industries Branding ', 'SI Industries Branding ', 'Manufacturing', 'SI Industries Branding ', 'SI Industries Branding of a Plywood manufacturing Company ', 'uploads/portfolios/01K2Z5Q38NZPGSYHDG82K27J7Z.jpg', 'si-industries-branding ', 'SI Industries Branding of a Plywood manufacturing Company ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'live', NULL, '2025-08-18 18:05:27', '2025-08-18 18:05:27'),
(7, 'Ramdhan jewellers', 'Ramdhan jewellers', 'Jewellers', 'Ramdhan jewellers', 'Ramdhan jewellers', 'uploads/portfolios/01K2Z69JRXSGR6YHEC96W7C5WK.png', 'ramdhan-jewellers', 'Ramdhan jewellers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'live', NULL, '2025-08-18 18:15:33', '2025-08-18 18:15:33'),
(8, 'Layali Arts', 'Layali Arts', 'Manufacturer', 'Layali Arts', 'Layali Arts', 'uploads/portfolios/01K2Z6J8HKZW3E0NA1NDVTC74Q.jpg', 'layali-arts', 'Layali Arts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'live', NULL, '2025-08-18 18:20:17', '2025-08-18 18:20:17');

INSERT INTO `service_descriptions` (`id`, `service_id`, `section_1`, `section_2`, `section_3`, `benefits`, `process`, `faqs`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'At Vienhance Studio, we design intuitive, interactive, and visually appealing digital experiences that are both functional and beautiful. Our UI/UX design process is centered on simplicity, usability, and intuitive navigation—making sure that every product we build increases user satisfaction. Whether it\'s a website, mobile application, or digital platform, we design experiences that not only look beautiful but are also easy to use.', 'We think good design is more than looks—it\'s how people experience your product. That\'s why we make sure every interface is accessible, user-friendly, and purposefully planned to achieve business objectives while meeting users where they are.', 'The design process is an organized method of solution creation that incorporates research, creativity, and iterative development to provide functional and effective outcomes. Our systematic step-by-step process guarantees that each product we create is well-designed, user-centric, and aligns with business objectives.', '[\"Enhanced User Satisfaction\", \"Higher Conversion Rates\", \"Improved Brand Loyalty\", \"Reduced Development Costs\", \"Increased User Retention\", \"Accessible & Inclusive Designs\"]', '[{\"icon\": \"images/icon-design-process-1.svg\", \"title\": \"Research & Strategy\", \"description\": \"We start by learning about user requirements, business objectives, and market trends to develop a design strategy that is in sync with your vision.\"}, {\"icon\": \"images/icon-design-process-2.svg\", \"title\": \"Wireframing & Prototyping\", \"description\": \"We make wireframes and interactive prototypes to plan out the user experience, providing a smooth ride before final development.\"}, {\"icon\": \"images/icon-design-process-3.svg\", \"title\": \"Design & Testing\", \"description\": \"Our experts create a beautifully designed, fully functional design and then conduct vigorous usability testing to optimize and complete the user experience.\"}]', '[{\"answer\": \"User research is fundamental as it provides insights into your target audience\'s needs, behaviors, and pain points. This data informs our design decisions, ensuring the final product genuinely solves user problems and meets their expectations, leading to higher engagement and satisfaction.\", \"question\": \"Why is user research important in UI/UX projects?\"}, {\"answer\": \"We achieve user-friendliness through a human-centric approach, starting with user research, creating clear information architecture, and rigorous usability testing. We focus on natural navigation flows, accessible design principles, and consistent visual patterns that users find familiar and easy to understand.\", \"question\": \"How do you ensure the design is user-friendly and intuitive?\"}, {\"answer\": \"Absolutely. We specialize in redesigning and optimizing existing digital products. Our process involves auditing the current experience, identifying pain points, and then strategically redesigning elements to improve usability, aesthetics, and overall performance, ultimately enhancing your ROI.\", \"question\": \"Can you redesign an existing digital product or website?\"}, {\"answer\": \"Accessibility is a core consideration from the outset of every project. We adhere to WCAG (Web Content Accessibility Guidelines) best practices, focusing on elements like color contrast, scalable typography, keyboard usability, and proper alt-text for images to ensure your digital experiences are usable and enjoyable for everyone, including those with disabilities.\", \"question\": \"How do you incorporate accessibility into your UI/UX designs?\"}]', '2025-08-17 15:02:48', '2025-08-17 15:02:48', NULL),
(2, 2, 'A brand is more than just a logo—it\'s the embodiment of a company\'s personality, promise, and narrative. We assist companies in creating a unique and identifiable brand identity by developing engaging logos, consistent visual languages, and narrative brand stories. Our method achieves consistency in every touch point, enabling companies to gain trust and leave an enduring impression.', 'A strong brand identity is crucial for recognition, trust, and market positioning, ensuring long-term success. It transforms your brand into a deeply connecting experience, captivating audiences and driving sustained business growth.', 'Branding is not all about looks—it\'s about building a strategic foundation that honors your company\'s values and speaks to your audience. Our process ensures each piece of your brand identity is intentional, effective, and geared towards your business objectives.', '[\"Stronger Brand Recognition\", \"Builds Trust & Credibility\", \"Consistent Brand Messaging\", \"Increases Customer Loyalty\", \"Increases Market Differentiation\", \"Enhances Business Development\"]', '[{\"icon\": \"images/icon-design-process-1.svg\", \"title\": \"Discovery & Strategy\", \"description\": \"We delve deep into your business, audience, and industry to define your brand\'s core values, unique positioning, and distinct voice.\"}, {\"icon\": \"images/icon-design-process-2.svg\", \"title\": \"Design & Development\", \"description\": \"From strategic insights, we craft distinctive logos, harmonious typography, compelling color palettes, and comprehensive brand elements.\"}, {\"icon\": \"images/icon-design-process-3.svg\", \"title\": \"Implementation & Consistency\", \"description\": \"We create detailed brand guidelines and essential assets, ensuring your new identity is seamlessly integrated and consistent across all platforms.\"}]', '[{\"answer\": \"A professional brand identity is vital because it establishes immediate recognition, builds trust with your audience, and clearly communicates your company\'s values and unique promise. It sets you apart from competitors, fosters loyalty, and creates a consistent impression across all customer touchpoints, driving long-term success.\", \"question\": \"Why is professional brand identity crucial for my business?\"}, {\"answer\": \"Our service typically includes comprehensive brand strategy, logo design, development of a full visual identity system (color palettes, typography, imagery style), brand guidelines, and assistance in crafting your brand\'s core messaging and narrative. The exact deliverables are tailored to your specific needs.\", \"question\": \"What is included in your Brand Identity & Branding service?\"}, {\"answer\": \"The timeline for a branding project can vary based on complexity and scope. Generally, a complete brand identity project, from discovery to final guidelines, can take anywhere from 2 to 3 weeks. We\'ll provide a detailed project schedule during our initial consultation.\", \"question\": \"How long does a typical branding project take?\"}, {\"answer\": \"Yes, absolutely. We specialize in both creating new brand identities and strategically rebranding existing businesses. Our rebranding process involves an in-depth analysis of your current brand, market position, and future goals to ensure the new identity effectively revitalizes your presence and resonates with your evolving audience.\", \"question\": \"Can you help us with rebranding an existing business?\"}]', '2025-08-17 15:02:48', '2025-08-17 15:02:48', NULL),
(3, 3, 'At Vienhance Studio, we believe visual communication transcends words. We breathe life into your brand\'s story through customized illustrations, bespoke icons, and strong visuals that elevate your message. Our designs don\'t just complement your brand; they provide it with a distinct face, an authentic voice, and an emotional appeal that deeply resonates with your audience.', 'A strong visual identity, reinforced by impactful graphic design and illustration, simplifies communication and ensures continuous interaction with your audience, creating lasting impressions.', 'Good design is a combination of creativity, strategy, and functionality. Our systematic process ensures all visual elements perfectly fit your brand identity, engaging your audience and making your communication more impactful.', '[\"Greater Visual Storytelling\", \"Memorable Brand Presence\", \"Enhanced User Engagement\", \"Versatility Across Platforms\", \"Boosts Brand Personality\", \"Increases Marketing Impact\"]', '[{\"icon\": \"images/icon-design-process-1.svg\", \"title\": \"Concept & Ideation\", \"description\": \"We begin by dissecting your brand\'s personality and objectives, developing innovative directions and sketching preliminary ideas to build a solid visual foundation.\"}, {\"icon\": \"images/icon-design-process-2.svg\", \"title\": \"Design & Refinement\", \"description\": \"We craft high-end illustrations, graphics, and iconography using digital tools and fine art techniques, tailored precisely to your brand\'s narrative and visual identity.\"}, {\"icon\": \"images/icon-design-process-3.svg\", \"title\": \"Implementation & Consistency\", \"description\": \"We optimize and adjust designs across various platforms to ensure seamless consistency for print, digital, and social media, providing a smooth brand experience.\"}]', '[{\"answer\": \"Graphic design is fundamental to branding as it visually communicates your brand\'s message, personality, and values. It creates the visual assets—like logos, color palettes, and imagery—that build recognition, establish trust, and form the foundation of your brand\'s unique identity.\", \"question\": \"What is the role of graphic design in branding?\"}, {\"answer\": \"We create a wide range of custom illustrations, including editorial illustrations, spot illustrations, character designs, infographics, conceptual art, and technical illustrations. Our style is adaptable to best suit your brand\'s aesthetic and message.\", \"question\": \"What types of illustrations do you create?\"}, {\"answer\": \"Custom graphics make your marketing materials more unique, memorable, and impactful. They help your content stand out in a crowded market, convey complex information clearly, evoke emotions, and ultimately increase engagement and recall with your target audience across all channels.\", \"question\": \"How do custom graphics benefit my marketing efforts?\"}, {\"answer\": \"Absolutely. A core part of our process is ensuring consistency. We develop comprehensive brand guidelines and meticulously adapt designs for various platforms, ensuring your visuals maintain integrity and recognition whether they appear in print, on your website, or across social media channels.\", \"question\": \"Can you ensure design consistency across different platforms (print, web, social)?\"}, {\"answer\": \"Project timelines vary based on complexity and deliverables. A simple icon set might take a few weeks, while a comprehensive illustration project or a full suite of marketing graphics could take longer. We\'ll provide a clear timeline once we understand your specific project scope and needs.\", \"question\": \"What\'s the typical timeline for a graphic design project?\"}]', '2025-08-17 15:02:48', '2025-08-17 15:02:48', NULL),
(4, 4, 'At Vienhance Studio, we believe excellent design isn\'t just about looks—it\'s about getting your message across and making a lasting impression. From attention-grabbing brochures and dramatic packaging to compelling flyers and publications, we produce print and marketing materials that don\'t just get noticed but also meet your brand\'s communication objectives. Every design is carefully crafted to engage your audience and deliver meaningful interaction, ensuring your brand shines and connects with your audience.', 'Effective marketing and print design increases brand visibility, builds trust, and makes a strong, lasting impression in a competitive marketplace.', 'Each marketing material must be visually engaging, strategically crafted, and in line with your brand. Our process guarantees that every print and digital product provides maximum impact and consistent brand messaging.', '[\"Boosts Brand Awareness\", \"Grabs Audience Attention\", \"Improves Communication\", \"Aids Marketing Objectives\", \"Flexible Across Platforms\", \"Makes Lasting Impressions\"]', '[{\"icon\": \"images/icon-design-process-1.svg\", \"title\": \"Understanding Goals & Audience\", \"description\": \"We start by deeply understanding your brand, target audience, and specific marketing goals to lay a strong foundation for your materials.\"}, {\"icon\": \"images/icon-design-process-2.svg\", \"title\": \"Design & Layout\", \"description\": \"Applying strategic design principles, we create compelling layouts that maximize readability, captivate your audience, and communicate your brand\'s message effectively.\"}, {\"icon\": \"images/icon-design-process-3.svg\", \"title\": \"Finalization & Production\", \"description\": \"We meticulously finalize designs for print media and digital displays, ensuring high-quality outputs, smooth brand continuity, and clear communication across all platforms.\"}]', '[{\"answer\": \"Professional marketing and print materials are crucial for establishing credibility, building brand recognition, and making a tangible connection with your audience. They enhance your message\'s impact, distinguish you from competitors, and serve as powerful tools for sales and communication.\", \"question\": \"Why are professional marketing and print materials important for my business?\"}, {\"answer\": \"We design a wide range of print materials including brochures, flyers, business cards, packaging, posters, publications, direct mailers, event collateral, and more. Our expertise covers both small-scale runs and large-scale campaigns.\", \"question\": \"What types of print materials do you design?\"}, {\"answer\": \"We ensure consistency by developing strong brand guidelines that govern all visual elements—colors, fonts, logos, imagery style—across both print and digital mediums. Our designers meticulously adapt artwork for different platforms, maintaining a cohesive and recognizable brand experience.\", \"question\": \"How do you ensure consistency between print and digital marketing?\"}, {\"answer\": \"We primarily provide print-ready design files, ensuring they meet all specifications for high-quality production. However, we can also offer guidance on selecting reputable printers and, for certain projects, can manage the print production process to ensure optimal results and a seamless experience for you.\", \"question\": \"Can you help with print production or do you only provide the design files?\"}, {\"answer\": \"Our marketing and print designs are strategically crafted to align with your broader marketing objectives. They amplify your campaigns by providing visually compelling content, supporting lead generation, enhancing event presence, and reinforcing your brand\'s message across various touchpoints, driving engagement and conversions.\", \"question\": \"How do these materials contribute to my overall marketing strategy?\"}]', '2025-08-17 15:02:48', '2025-08-17 15:02:48', NULL),
(5, 5, 'At Vienhance Studio, we transform static concepts into dynamic, immersive visual experiences through cutting-edge 3D and motion graphics. We specialize in creating captivating animations, lifelike product visualizations, and compelling motion-based storytelling that not only grab attention but also communicate complex ideas with clarity and impact. Our expertise helps your brand stand out in a crowded digital landscape, offering memorable and engaging interactions across all platforms.', 'Leveraging 3D and motion graphics provides unparalleled opportunities to captivate your audience, enhance brand recall, and deliver your message with dynamic visual flair.', 'Our process for 3D and motion graphics combines creative vision with technical precision, ensuring every animation and visual effect is meticulously crafted to meet your objectives and captivate your audience.', '[\"Enhanced Storytelling & Engagement\", \"Increased Brand Memorability\", \"Superior Product Visualization\", \"Explains Complex Ideas Easily\", \"Stands Out in Digital Media\", \"Boosts Social Media Impact\"]', '[{\"icon\": \"images/icon-design-process-1.svg\", \"title\": \"Concept & Storyboarding\", \"description\": \"Defining objectives, developing creative concepts, scripting, and visualizing the narrative through detailed storyboards and animatics.\"}, {\"icon\": \"images/icon-design-process-2.svg\", \"title\": \"3D Modeling & Animation\", \"description\": \"Creating detailed 3D models, applying textures and lighting, then animating elements to bring scenes and characters to life with fluid motion.\"}, {\"icon\": \"images/icon-design-process-3.svg\", \"title\": \"Rendering & Post-Production\", \"description\": \"Rendering high-quality visuals, adding sound design, voiceovers, and final polish to deliver a captivating and impactful motion graphic.\"}]', '[{\"answer\": \"3D & motion graphics are ideal for explainer videos, product demonstrations, architectural visualizations, immersive brand intros, dynamic social media content, animated logos, and even complex data visualizations. They excel at bringing abstract or detailed concepts to life.\", \"question\": \"What types of projects are best suited for 3D & Motion Graphics?\"}, {\"answer\": \"The timeline for 3D and motion graphics projects varies widely based on complexity, duration, and required level of detail. A short animated logo might take a few weeks, while a comprehensive explainer video could range from 6–12 weeks or more. We\'ll provide a custom timeline with your proposal.\", \"question\": \"How long does it take to create a typical motion graphics video?\"}, {\"answer\": \"While not strictly necessary, providing a script, brand guidelines, existing 3D models, or even a rough concept can significantly expedite the process. We can also assist with scriptwriting, voiceover talent sourcing, and asset creation as part of our comprehensive service.\", \"question\": \"Do I need to provide a script or specific assets?\"}, {\"answer\": \"Absolutely. Our goal is to ensure all 3D and motion graphics seamlessly integrate with and enhance your existing brand identity. We meticulously match colors, typography, and visual styles to maintain consistency and reinforce your brand\'s unique presence.\", \"question\": \"Can 3D & Motion Graphics be integrated with existing branding?\"}]', '2025-08-17 15:02:48', '2025-08-17 15:02:48', NULL);

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `image`, `link`, `delay`, `is_active`, `sort_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'UI/UX & Digital Experience Design', 'ui-ux-digital-experience-design', 'Developing seamless, intuitive digital experiences that engage and convert.', 'uploads/services/01K2Z2Z0CHSGZ0KQ3E49DFG77H.png', '/services/ui-ux-digital-experience-design', '0s', 1, 1, '2025-08-17 15:02:48', '2025-08-18 17:17:21', NULL),
(2, 'Branding & Identity Design', 'branding-identity-design', 'Developing bold, memorable brand identities that leave a lasting impression.', 'uploads/services/01K2Z2ZPR3PB5CP9DNZ1VCMHM6.png', '/services/branding-identity-design', '0.2s', 1, 2, '2025-08-17 15:02:48', '2025-08-18 17:17:44', NULL),
(3, 'Illustration & Graphic Design', 'illustration-graphic-design', 'Bringing simplicity and artistry to ideas with visually striking illustrations and graphics that tell your story.', 'uploads/services/01K2Z30XEFXVHAKVFN6RGCFBYZ.png', '/services/illustration-graphic-design', '0.4s', 1, 3, '2025-08-17 15:02:48', '2025-08-18 17:18:23', NULL),
(4, 'Print & Marketing Collateral', 'print-marketing-collateral', 'Creating high-impact print materials that make a lasting, strong impression.', 'uploads/services/01K2Z31HHH9V7EQ6VG3ZMJWZ4Q.png', '/services/print-marketing-collateral', '0.6s', 1, 4, '2025-08-17 15:02:48', '2025-08-18 17:18:44', NULL),
(5, '3D & Motion Graphics', '3d-motion-graphics', 'Transforming static concepts into dynamic, immersive visual experiences with motion and 3D design.', 'uploads/services/01K2Z328Z95CAT0GQZVNGHWR72.png', '/services/3d-motion-graphics', '0.8s', 1, 5, '2025-08-17 15:02:48', '2025-08-18 17:19:08', NULL);

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bg86DAhiogwAtTw4pGWDbgyUpx6ak4TjOV9YyiBv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWFBTQVVmZ3FLR3E5TU1lMzlhQ3RvNUVadkVsYkVYNUZwVlBxdVhOWSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvdmllbmhhbmNlLXN0dWRpby9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755714156),
('DmvOMqcihAf1iPKnhxHqrT20oWgcvGfeUiKDnp1B', 3, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiMTBNVlI1bkp0dEY0M3F1VjZpbFh3RjNHUURLbndwc0Z0a1d6ZlBkUCI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkWm02RWkyWVZ0Q3diRHFWdS5uU1FRT2xFY28xVDNnUHlSTC5COG9wSXFGR0d0YkNtL1hpL3kiO3M6NjoidGFibGVzIjthOjU6e3M6NDA6ImY1NjNhMTg2MjVhZmU3MTkzMjQ5ZDhlMGU2YTMzYjc5X2NvbHVtbnMiO2E6Nzp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6ImZ1bGxfbmFtZSI7czo1OiJsYWJlbCI7czo0OiJOYW1lIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJlbWFpbCI7czo1OiJsYWJlbCI7czo1OiJFbWFpbCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NToicGhvbmUiO3M6NToibGFiZWwiO3M6NToiUGhvbmUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6Im1lc3NhZ2UiO3M6NToibGFiZWwiO3M6NzoiTWVzc2FnZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTg6ImZvcm1hdHRlZF9sb2NhdGlvbiI7czo1OiJsYWJlbCI7czo4OiJMb2NhdGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo3OiJpc19yZWFkIjtzOjU6ImxhYmVsIjtzOjQ6IlJlYWQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjg6IlJlY2VpdmVkIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fX1zOjQwOiIyNmQxZTJhMTM2ZjZiNDJjYThkY2RlZTE3Mzc3MjNhM19jb2x1bW5zIjthOjE5OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToicGFnZV9uYW1lIjtzOjU6ImxhYmVsIjtzOjk6IlBhZ2UgbmFtZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InJvdXRlX25hbWUiO3M6NToibGFiZWwiO3M6MTA6IlJvdXRlIG5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6InRpdGxlIjtzOjU6ImxhYmVsIjtzOjU6IlRpdGxlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo4OiJvZ190aXRsZSI7czo1OiJsYWJlbCI7czo4OiJPZyB0aXRsZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6ODoib2dfaW1hZ2UiO3M6NToibGFiZWwiO3M6ODoiT2cgaW1hZ2UiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6Im9nX3R5cGUiO3M6NToibGFiZWwiO3M6NzoiT2cgdHlwZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Njoib2dfdXJsIjtzOjU6ImxhYmVsIjtzOjY6Ik9nIHVybCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6Im9nX3NpdGVfbmFtZSI7czo1OiJsYWJlbCI7czoxMjoiT2cgc2l0ZSBuYW1lIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6ODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMjoidHdpdHRlcl9jYXJkIjtzOjU6ImxhYmVsIjtzOjEyOiJUd2l0dGVyIGNhcmQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo5O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJ0d2l0dGVyX3RpdGxlIjtzOjU6ImxhYmVsIjtzOjEzOiJUd2l0dGVyIHRpdGxlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTM6InR3aXR0ZXJfaW1hZ2UiO3M6NToibGFiZWwiO3M6MTM6IlR3aXR0ZXIgaW1hZ2UiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMjoidHdpdHRlcl9zaXRlIjtzOjU6ImxhYmVsIjtzOjEyOiJUd2l0dGVyIHNpdGUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxNToidHdpdHRlcl9jcmVhdG9yIjtzOjU6ImxhYmVsIjtzOjE1OiJUd2l0dGVyIGNyZWF0b3IiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoiY2Fub25pY2FsX3VybCI7czo1OiJsYWJlbCI7czoxMzoiQ2Fub25pY2FsIHVybCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6ImlzX2FjdGl2ZSI7czo1OiJsYWJlbCI7czo5OiJJcyBhY3RpdmUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxNTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo4OiJwcmlvcml0eSI7czo1OiJsYWJlbCI7czo4OiJQcmlvcml0eSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE2OiJjaGFuZ2VfZnJlcXVlbmN5IjtzOjU6ImxhYmVsIjtzOjE2OiJDaGFuZ2UgZnJlcXVlbmN5IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjE4O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6IjE1YzFhMjNiODY2ZjQ1MDQyNTg4MTFjYzIyMmZiOWIwX2NvbHVtbnMiO2E6MTA6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJ0aXRsZSI7czo1OiJsYWJlbCI7czo1OiJUaXRsZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoic2x1ZyI7czo1OiJsYWJlbCI7czo0OiJTbHVnIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJpbWFnZSI7czo1OiJsYWJlbCI7czo1OiJJbWFnZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoibGluayI7czo1OiJsYWJlbCI7czo0OiJMaW5rIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJkZWxheSI7czo1OiJsYWJlbCI7czo1OiJEZWxheSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToiaXNfYWN0aXZlIjtzOjU6ImxhYmVsIjtzOjk6IklzIGFjdGl2ZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InNvcnRfb3JkZXIiO3M6NToibGFiZWwiO3M6MTA6IlNvcnQgb3JkZXIiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJDcmVhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo4O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo5O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJkZWxldGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJEZWxldGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6IjNhZmI1M2NjNDBlZTBkNmVlZjYwMWZkNGIwMDM2YmNlX2NvbHVtbnMiO2E6ODp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJzZXJ2aWNlLnRpdGxlIjtzOjU6ImxhYmVsIjtzOjc6IlNlcnZpY2UiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6InNlY3Rpb25fMSI7czo1OiJsYWJlbCI7czo5OiJTZWN0aW9uIDEiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjowO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTQ6ImJlbmVmaXRzX2NvdW50IjtzOjU6ImxhYmVsIjtzOjg6IkJlbmVmaXRzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoicHJvY2Vzc19jb3VudCI7czo1OiJsYWJlbCI7czoxMzoiUHJvY2VzcyBTdGVwcyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImZhcXNfY291bnQiO3M6NToibGFiZWwiO3M6NDoiRkFRcyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IlVwZGF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImRlbGV0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkRlbGV0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319czo0MDoiZTdjMjc3OTZiMGYyMmZjNWViMzk0NzNiYTRiNTEzYmRfY29sdW1ucyI7YTo4OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6InBvcnRmb2xpb19pZCI7czo1OiJsYWJlbCI7czoxMjoiUG9ydGZvbGlvIGlkIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJpbWFnZSI7czo1OiJsYWJlbCI7czo1OiJJbWFnZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6ODoiYWx0X3RleHQiO3M6NToibGFiZWwiO3M6ODoiQWx0IHRleHQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6ImNhcHRpb24iO3M6NToibGFiZWwiO3M6NzoiQ2FwdGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InNvcnRfb3JkZXIiO3M6NToibGFiZWwiO3M6MTA6IlNvcnQgb3JkZXIiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJkZWxldGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJEZWxldGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJDcmVhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fX1zOjg6ImZpbGFtZW50IjthOjA6e319', 1755719515),
('o0HlnTkQyo2phbB5Dl5ElSRM0hkBmZdWSsnlEzVS', NULL, '127.0.0.1', 'curl/8.7.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmpUcFdvVXNqNzlEUDYzWEZBRmxUc2h6aUFsNHVvMlVFZnFCSTlMUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zaXRlbWFwLnhtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755719252),
('qzZ02WjOjqrsQkXPJrJiEoViu7sHhFHBnRpH5WX9', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiazRqNGJxZUZHTjB4QWVsNlYwbXB2bDZGSE9ONFpMVGhvNDBaVEFGMiI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvdmllbmhhbmNlLXN0dWRpby9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755714120),
('s8OTOa1HwtEZ5mEXex129VrLuloT4MXsqP814MVz', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMTZINjNuSm5Mc0pMYmFvYk56YnZBT1ZzbnpieXNmNzNNZ3owS3djeSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9sb2NhbGhvc3QvdmllbmhhbmNlLXN0dWRpby9wdWJsaWMvaW5kZXgucGhwL3NlcnZpY2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755714216);

INSERT INTO `static_pages` (`id`, `page_name`, `route_name`, `title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`, `og_image`, `og_type`, `og_url`, `og_site_name`, `twitter_card`, `twitter_title`, `twitter_description`, `twitter_image`, `twitter_site`, `twitter_creator`, `canonical_url`, `schema_markup`, `is_active`, `priority`, `change_frequency`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', 'Vienhance Studio - Professional Web Design & Development Services', 'Vienhance Studio offers professional web design, development, and digital marketing services. We create stunning, responsive websites that drive results for your business.', 'web design, web development, digital marketing, responsive design, SEO, Laravel, PHP, modern websites', 'Vienhance Studio - Professional Web Design & Development', 'Transform your business with our professional web design and development services. We create stunning, responsive websites that drive results.', '/images/logo.svg', 'website', 'https://vienhancestudio.com', 'Vienhance Studio', 'summary_large_image', 'Vienhance Studio - Professional Web Design & Development', 'Transform your business with our professional web design and development services. We create stunning, responsive websites that drive results.', '/images/logo.svg', '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com', '{\"@context\":\"https:\\/\\/schema.org\",\"@type\":\"Organization\",\"name\":\"Vienhance Studio\",\"url\":\"https:\\/\\/vienhancestudio.com\",\"logo\":\"https:\\/\\/vienhancestudio.com\\/images\\/logo.svg\",\"description\":\"Professional web design and development services\",\"sameAs\":[\"https:\\/\\/twitter.com\\/vienhancestudio\",\"https:\\/\\/facebook.com\\/vienhancestudio\",\"https:\\/\\/linkedin.com\\/company\\/vienhancestudio\"]}', 1, 1, 'weekly', '2025-08-17 17:18:39', '2025-08-17 17:18:39'),
(2, 'about', 'about', 'About Us - Vienhance Studio | Our Story & Mission', 'Learn about Vienhance Studio\'s journey, our team of experts, and our mission to deliver exceptional web design and development solutions.', 'about us, web design company, development team, digital agency, our story, mission', 'About Vienhance Studio - Our Story & Mission', 'Discover our journey and mission to deliver exceptional web design and development solutions that transform businesses.', '/images/about-img.jpg', 'website', 'https://vienhancestudio.com/about', 'Vienhance Studio', 'summary_large_image', 'About Vienhance Studio - Our Story & Mission', 'Discover our journey and mission to deliver exceptional web design and development solutions that transform businesses.', '/images/about-img.jpg', '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com/about', '{\"@context\":\"https:\\/\\/schema.org\",\"@type\":\"AboutPage\",\"name\":\"About Vienhance Studio\",\"description\":\"Learn about our journey and mission to deliver exceptional web design and development solutions.\",\"url\":\"https:\\/\\/vienhancestudio.com\\/about\"}', 1, 1, 'monthly', '2025-08-17 17:18:39', '2025-08-17 17:18:39'),
(3, 'services', 'services', 'Our Services - Web Design, Development & Digital Marketing | Vienhance Studio', 'Explore our comprehensive range of digital services including web design, development, SEO, and digital marketing solutions tailored for your business.', 'web design services, web development, SEO services, digital marketing, e-commerce, custom websites', 'Our Services - Web Design, Development & Digital Marketing', 'Comprehensive digital services including web design, development, SEO, and digital marketing solutions for your business.', '/images/service-image-1.jpg', 'website', 'https://vienhancestudio.com/services', 'Vienhance Studio', 'summary_large_image', 'Our Services - Web Design, Development & Digital Marketing', 'Comprehensive digital services including web design, development, SEO, and digital marketing solutions for your business.', '/images/service-image-1.jpg', '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com/services', '{\"@context\":\"https:\\/\\/schema.org\",\"@type\":\"Service\",\"name\":\"Web Design and Development Services\",\"description\":\"Comprehensive digital services including web design, development, SEO, and digital marketing solutions.\",\"provider\":{\"@type\":\"Organization\",\"name\":\"Vienhance Studio\"},\"areaServed\":\"Worldwide\",\"url\":\"https:\\/\\/vienhancestudio.com\\/services\"}', 1, 1, 'weekly', '2025-08-17 17:18:39', '2025-08-17 17:18:39'),
(4, 'portfolio', 'portfolio', 'Our Portfolio - Web Design & Development Projects | Vienhance Studio', 'Browse our impressive portfolio of web design and development projects. See how we\'ve helped businesses achieve their digital goals.', 'portfolio, web design projects, development projects, case studies, client work, examples', 'Our Portfolio - Web Design & Development Projects', 'Browse our impressive portfolio of web design and development projects. See how we\'ve helped businesses achieve their digital goals.', '/images/work-image-1.jpg', 'website', 'https://vienhancestudio.com/portfolio', 'Vienhance Studio', 'summary_large_image', 'Our Portfolio - Web Design & Development Projects', 'Browse our impressive portfolio of web design and development projects. See how we\'ve helped businesses achieve their digital goals.', '/images/work-image-1.jpg', '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com/portfolio', '{\"@context\":\"https:\\/\\/schema.org\",\"@type\":\"CreativeWork\",\"name\":\"Portfolio\",\"description\":\"Our collection of web design and development projects\",\"creator\":{\"@type\":\"Organization\",\"name\":\"Vienhance Studio\"},\"url\":\"https:\\/\\/vienhancestudio.com\\/portfolio\"}', 1, 1, 'weekly', '2025-08-17 17:18:39', '2025-08-17 17:18:39'),
(5, 'contact', 'contact', 'Contact Us - Get In Touch | Vienhance Studio', 'Ready to start your project? Contact Vienhance Studio today. We\'re here to discuss your web design and development needs.', 'contact us, get quote, web design quote, development services, consultation', 'Contact Us - Get In Touch | Vienhance Studio', 'Ready to start your project? Contact us today to discuss your web design and development needs.', '/images/contact-circle.png', 'website', 'https://vienhancestudio.com/contact', 'Vienhance Studio', 'summary_large_image', 'Contact Us - Get In Touch | Vienhance Studio', 'Ready to start your project? Contact us today to discuss your web design and development needs.', '/images/contact-circle.png', '@vienhancestudio', '@vienhancestudio', 'https://vienhancestudio.com/contact', '{\"@context\":\"https:\\/\\/schema.org\",\"@type\":\"ContactPage\",\"name\":\"Contact Vienhance Studio\",\"description\":\"Get in touch with us to discuss your web design and development needs\",\"url\":\"https:\\/\\/vienhancestudio.com\\/contact\",\"mainEntity\":{\"@type\":\"Organization\",\"name\":\"Vienhance Studio\",\"contactPoint\":{\"@type\":\"ContactPoint\",\"contactType\":\"customer service\",\"availableLanguage\":\"English\"}}}', 1, 1, 'monthly', '2025-08-17 17:18:39', '2025-08-17 17:18:39');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-08-17 15:02:47', '$2y$12$A9o8jswcIrEYA2b9xiUaMeOAlICIN8z8/CHtlq/jbt4b6rx0VFgIe', 'WuuE6TU1vJ', '2025-08-17 15:02:48', '2025-08-17 15:02:48'),
(3, 'Aditya NS', 'adityanamansingh@gmail.com', NULL, '$2y$12$Zm6Ei2YVtCwbDqVu.nSQQOlEco1T3gPyRL.B8opIqFGGtbCm/Xi/y', NULL, '2025-08-18 13:52:50', '2025-08-18 13:52:50');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;