-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 05:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work_golf`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `act_slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `act_price` decimal(9,2) NOT NULL,
  `act_detail` text COLLATE utf8_unicode_ci,
  `act_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `act_start_date` date NOT NULL,
  `act_end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `act_name`, `act_slug`, `act_price`, `act_detail`, `act_image`, `act_start_date`, `act_end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'โปรโมชั่น เทศกาลสงกรานต์ ปี ๒๕๖๒', 'โปรโมชั่น-เทศกาลสงกรานต์-ปี-๒๕๖๒', '1299.00', 'สวัสปีใหม่ไทยปี 2562 !!!! \r\nGDO Thailand ร่วมฉลองปีใหม่ไทยกับโปรโมชั่นราคาสนามสุดพิเศษ เฉพาะเดือนเมษายนนี้เท่านั้น', '108b44ea8edea7ea82a17ac9f770e1d7.jpg', '2019-04-13', '2019-04-15', '2019-04-08 20:03:09', '2019-04-14 18:13:40', NULL),
(17, 'The Callaway Cup in Thailand 2019', 'The-Callaway-Cup-in-Thailand-2019', '1499.00', 'ลุ้นรับรางวัลใหญ่! “The Callaway Cup in Thailand 2019” – สนาม อัลไพน์ กอล์ฟ คลับ\r\nCallaway แฟชั่นเครื่องแต่งกาย สนับสนุนนักอล์ฟทุกท่านที่รักการเล่นกอล์ฟ ได้จัดกิจกรรมการแข่งขัน\r\nกอล์ฟขึ้นที่ สนาม อัลไพน์ กอล์ฟ คลับ เดินทางโดยรถยนต์เพียง 1 ชั่วโมงจากกรุงเทพฯ \r\nในวันเสาร์ที่ 18 พฤษภาคม 2562\r\n\r\nเป็นการแข่งขันที่เหมาะสำหรับนักกอล์ฟทุกท่าน ตั้งแต่นักกอล์ฟทั่วไปไปจนถึงนักกอล์ฟฝีมือดี \r\nที่สามารถร่วมแข่งขัน พร้อมสนุกกับกิจกรรม เรามีรางวัลมากมายจาก Callaway \r\nอาธิเช่น เครื่องแต่งกาย และไดรเวอร์ ยังมีกิจกรรม hole-in-one และ hit-the-green challenge! \r\nที่ท่านสามารถร่วมสนุกอีกด้วย', '153e8317f91c520d2fbb34973b253c09.jpg', '2019-04-20', '2019-04-21', '2019-04-08 20:05:09', '2019-04-16 09:11:28', NULL),
(18, 'โปรโมชั่น GDO ชวนออกรอบ จอง 4 จ่ายแค่ 3 High Season!', 'โปรโมชั่น-GDO-ชวนออกรอบ-จอง-4-จ่ายแค่-3-High-Season', '1999.00', 'GDO Thailand – เว็บไซต์จองสนามกอล์ฟออนไลน์จากญี่ปุ่น ค้นหาสนามกอล์ฟไว จองง่าย จ่ายน้อยกว่า  ยืดเวลาความคุ้ม โปรโมชั่น ฮอต ฮอต รับลมหนาว ส่วนลดค่ากรีนฟี จอง 4 ท่านจ่ายแค่ 3 ท่าน จองสนามไหนก็ได้ เวลาไหนก็ได้', 'c13e7f6361005915218f53b3251a994c.jpg', '2019-04-26', '2019-04-26', '2019-04-08 20:06:56', '2019-04-14 18:13:24', NULL),
(19, 'Big Driving Lesson', 'Big-Driving-Lesson', '1400.00', 'เรียนลูกไดร์ฟ โดย กัญจน์ เจริญกุล -อัลไพน์ กอล์ฟ คลับ', '8addf4755a36eaeb729f79914c0dd3b4.jpg', '2019-05-02', '2019-05-03', '2019-04-08 20:08:07', '2019-04-14 18:12:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_orders`
--

CREATE TABLE `activity_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `order_status` enum('new','playment','confirm','not_confirm') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `message` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_amount` decimal(9,2) DEFAULT NULL,
  `payment_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_orders`
--

INSERT INTO `activity_orders` (`id`, `user_id`, `activity_id`, `amount`, `start_date`, `end_date`, `order_status`, `message`, `bank_id`, `payment_date`, `payment_time`, `payment_amount`, `payment_image`, `created_at`, `updated_at`) VALUES
(1, 2, 17, '1499.00', '2019-04-20', '2019-04-21', 'confirm', 'สวัสดี', 1, '2019-04-20', '04:08', '1200.00', 'd8ddda68c612d46943caad3c5295b53e.jpg', '2019-04-16 11:14:49', '2019-04-22 19:42:39'),
(2, 2, 18, '1999.00', '2019-04-26', '2019-04-26', 'new', NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-17 18:16:07', '2019-04-17 18:16:07'),
(6, 2, 18, '1999.00', '2019-04-26', '2019-04-26', 'playment', NULL, 4, '2019-04-17', '18:14', '1200.00', '1c5f04ac03f35be38ef04d8e5942246b.jpg', '2019-04-17 19:25:27', '2019-04-18 23:08:13'),
(7, 2, 16, '1299.00', '2019-04-13', '2019-04-15', 'new', NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-20 18:39:24', '2019-04-20 18:39:24'),
(8, 2, 16, '1299.00', '2019-04-13', '2019-04-15', 'new', NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-20 18:40:00', '2019-04-20 18:40:00'),
(9, 2, 16, '1299.00', '2019-04-13', '2019-04-15', 'playment', NULL, 1, '2019-04-22', '04:06', '12000.00', 'd2f2b4c6e6d4b3e5160cd4121002114e.jpg', '2019-04-20 18:40:34', '2019-04-20 18:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `bank_branch` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `promptpay_qr` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `promptpay_number` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `bank_branch`, `account_name`, `account_number`, `promptpay_qr`, `promptpay_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ไทยพาณิช', 'มหาสารคาม', 'นาย ธีรยุทธ คูณสุข', '1232343445', '42cccb7b393256aa208466fdcd52dc58.png', '0902168726', '2019-04-02 11:24:35', '2019-04-02 12:00:51', NULL),
(2, 'กรุงไทย', 'มหาสารคาม', 'นาย ธีรยุทธ คูณสุข', '404-1234-134', '338fa1beb47434d53c7058575a18780e.png', '0833808938', '2019-04-02 11:26:41', '2019-04-02 11:47:05', '2019-04-02 11:47:05'),
(3, 'ออมสิน', 'มหาสารคาม', 'นาย ธีรยุทธ คูณสุข', '404-1234-222', 'bbbb3f50dd6866353ad8116f43e80824.png', NULL, '2019-04-02 11:28:14', '2019-04-02 11:46:39', '2019-04-02 11:46:39'),
(4, 'ไทยพาณิช', 'มหาสารคาม', 'นาย ธีรยุทธ คูณสุข', '1232343445', '', '0902168726', '2019-04-02 11:53:25', '2019-04-02 11:53:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_30_085458_add_verified_to_users_table', 1),
(4, '2019_03_31_063718_create_banks_table', 1),
(6, '2019_04_02_122831_create_activities_table', 2),
(7, '2019_04_02_190644_create_promotions_table', 3),
(10, '2019_04_08_031922_add_phone_to_users_table', 4),
(11, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(12, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(13, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(14, '2016_06_01_000004_create_oauth_clients_table', 5),
(15, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(16, '2019_04_15_004849_add_price_to_activities_table', 6),
(18, '2019_04_16_165354_create_activity_orders_table', 7),
(19, '2019_04_20_235355_create_promotion_orders_table', 8),
(20, '2019_04_24_012558_create_notifications_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0a1c9ccc-d28d-4dbb-bc94-f0bab8ad3893', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:46:10', '2019-04-23 20:45:55', '2019-04-23 20:46:10'),
('172d2422-ac9a-43ae-8483-95946b3b846b', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:46:30', '2019-04-23 20:46:25', '2019-04-23 20:46:30'),
('186fda1d-16a6-4d34-ad10-3e1a842b7934', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:46:10', '2019-04-23 20:45:53', '2019-04-23 20:46:10'),
('4e66b108-8644-4cbe-8277-6d44838b64e4', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:44:20', '2019-04-23 20:43:44', '2019-04-23 20:44:20'),
('71e94690-d100-4ab9-a62d-00368105e9e8', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:44:20', '2019-04-23 20:43:40', '2019-04-23 20:44:20'),
('84d90f84-0077-4fac-a931-d70e8a5f34b7', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:42:52', '2019-04-23 19:52:14', '2019-04-23 20:42:52'),
('d25a1a33-7520-4550-8045-dcb8d560ab1c', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:42:52', '2019-04-23 20:03:39', '2019-04-23 20:42:52'),
('e5b2dd74-5185-4a67-82d5-eb400eca2cdb', 'App\\Notifications\\PromotionOrderNotify', 'App\\User', 1, '{\"order_id\":16,\"promotion_name\":\"\\u0e2a\\u0e19\\u0e32\\u0e21\\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e40\\u0e14\\u0e2d\\u0e30 \\u0e23\\u0e2d\\u0e22\\u0e31\\u0e25 \\u0e01\\u0e2d\\u0e25\\u0e4c\\u0e1f \\u0e41\\u0e2d\\u0e19\\u0e14\\u0e4c \\u0e04\\u0e31\\u0e19\\u0e17\\u0e23\\u0e35 \\u0e04\\u0e25\\u0e31\\u0e1a: \\u0e17\\u0e35\\u0e44\\u0e17\\u0e21\\u0e4c\",\"user\":\"\\u0e18\\u0e35\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18 \\u0e04\\u0e39\\u0e13\\u0e2a\\u0e38\\u0e02\"}', '2019-04-23 20:42:52', '2019-04-23 19:27:27', '2019-04-23 20:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('03de6f39c4240669cb702e7b93f9f4a5d6e0b9072bc27d2f851ad3a406671bbf6d85c506ada6f119', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:09:30', '2019-04-16 07:09:30', '2020-04-16 14:09:30'),
('06cfe5747a3cbba6858779e4a00a65efbe266f06d9a28b17b41f03aae82690075e1ea510c56cecc4', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:45:45', '2019-04-16 07:45:45', '2020-04-16 14:45:45'),
('0a7f7fdd46d84271a56780dde84fb182ad2c49d2c41fe83f34732a43007b2b7472d44d7eb7eaa5f7', 2, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-16 09:43:51', '2019-04-16 09:43:51', '2020-04-16 16:43:51'),
('0ddd681e4f973038b1832a9cb7a2f14b7c9df68ee5e89fabd1cbbaeb14d55dbcdb43fe890ca776e7', 2, 2, NULL, '[\"*\"]', 0, '2019-04-07 21:30:02', '2019-04-07 21:30:02', '2020-04-08 04:30:02'),
('1c2526bc7f65d207d82570468aa1363469d019b1da5962f0f2d73f3fc8e3805e40efc93845487344', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 06:36:03', '2019-04-16 06:36:03', '2020-04-16 13:36:03'),
('21288cd50836fd024bd0d922fc069c8f43ed00883625e98e9d808b1887f5f059ddad67c1b4a17fa6', 10, 2, NULL, '[\"*\"]', 0, '2019-04-08 18:06:32', '2019-04-08 18:06:32', '2020-04-09 01:06:32'),
('2ad320549fe1cd1b2aed45e24a888158441a56fa5ae452dbfb12f372ad753d6aa6e81246d9a952c9', 10, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-08 18:51:17', '2019-04-08 18:51:17', '2020-04-09 01:51:17'),
('2b558dc992c40825602d176971c51dba2bde16a71f5093c13c5560556dec0e0fb485542613f77e46', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-08 19:15:27', '2019-04-08 19:15:27', '2020-04-09 02:15:27'),
('2e92c833b6f81e1f72beb8dd3f6ccdea8b1fc425f56e798d88bb5fda01445feb67b213979dab6b82', 10, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-08 18:00:56', '2019-04-08 18:00:56', '2020-04-09 01:00:56'),
('2faf1d45ee91ffc61cf6ec445262d727a41b2c0a4fd0008b14a23d8d03ab117f88654242e11955d6', 2, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-07 21:40:46', '2019-04-07 21:40:46', '2020-04-08 04:40:46'),
('39fc994cb5eeecd42ca4a515505af79dafd6d41f6c0fcbdd5b73138ad3e9cd09546cb372975c422f', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:43:19', '2019-04-16 07:43:19', '2020-04-16 14:43:19'),
('45e7ddbefd944a18a981363dabc4ccc32c1949bc5cfb26c24e7e55461a6304945cd7bca068d1bcd4', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:52:44', '2019-04-16 07:52:44', '2020-04-16 14:52:44'),
('47b6ea89347bfa846b0dd717c8dbda9abc003e44e8b9f08dc2c02271ab62fde27168643c4e031613', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 06:48:18', '2019-04-16 06:48:18', '2020-04-16 13:48:18'),
('5478372864141131d3f1b1f16837558d5a1199c42e76b87b59dcbf78eec259caa1a3526332270069', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 06:51:27', '2019-04-16 06:51:27', '2020-04-16 13:51:27'),
('5e8c449daab19fcf15e847eb39ed2a909c12b5c7e4a9be19191ad17b73e0d415bd8d187835ac752e', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 06:50:22', '2019-04-16 06:50:22', '2020-04-16 13:50:22'),
('5f1338e6d82c65bf8929ec4ec7ca965187fa70ff50bd789709aebb155da34e3a2d093913f21007f1', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:03:59', '2019-04-16 07:03:59', '2020-04-16 14:03:59'),
('5fce133356fa05e50c89e2ccc1bcc62da3ebe537ad6e3b76aea254b47f03081e931666af721c4906', 10, 2, NULL, '[\"*\"]', 0, '2019-04-08 18:12:49', '2019-04-08 18:12:49', '2020-04-09 01:12:49'),
('6386bcc5b68d45e2b65771796dd8d0cb9aea52e0ccdf56b209f891e583ba9bfcdf7ad665408e5f95', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-14 15:56:54', '2019-04-14 15:56:54', '2020-04-14 22:56:54'),
('6572ac96a6ee28d939ab7112edce722be2ff8bae126c918c7d2e491179b65c37bc4be1abd0c37aa8', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-23 08:05:40', '2019-04-23 08:05:40', '2020-04-23 15:05:40'),
('6898d8d0d2175eb54ea3776d1522de322c10000276ddce09dd77e2cb43db7b594541eaa4ff1c2fe7', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:08:55', '2019-04-16 07:08:55', '2020-04-16 14:08:55'),
('6d930a129591765b7515baa301c39d30ab9907b57a391bf12475bfe225b3593d91cfe770c600c4a9', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:16:08', '2019-04-16 07:16:08', '2020-04-16 14:16:08'),
('6e2b4a25c87878194653eb0d2de3d025317d81ca89fa5d8bb9565d3602a3f944b718dcecafd04052', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:03:30', '2019-04-16 07:03:30', '2020-04-16 14:03:30'),
('6f95e6e03795cdf25b6dcb235932ce2789b6b6af9e289daa4c4dea77a35ff760d74da045e2032969', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:42:08', '2019-04-16 07:42:08', '2020-04-16 14:42:08'),
('7a94e4ff5af2c9828efd9a43f1025f402a26349f6cca1e9a031a7b492854263d0913a120364a4881', 10, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-08 18:30:48', '2019-04-08 18:30:48', '2020-04-09 01:30:48'),
('892104324b354c0f265a4998c0f6e22d0f6e9d050752d89601cf28b5d5736ecba0fa57d74f163e1a', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 06:21:39', '2019-04-16 06:21:39', '2020-04-16 13:21:39'),
('8b7d48b26ded6c695856132b6171dcccf8d0261be68d2323e96d1e9743f6ce72fb4f76642b448acb', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:56:46', '2019-04-16 07:56:46', '2020-04-16 14:56:46'),
('a67e92d708f2488c34c172b62d709841a2b369a19579f85d33f28f3fbfa6a3c61e11a5528883b1cd', 10, 2, NULL, '[\"*\"]', 0, '2019-04-08 18:09:04', '2019-04-08 18:09:04', '2020-04-09 01:09:04'),
('adaeb3f48fa3fe4ce3460ffb4cf86b12e7d885d5f6394a01a759d636449ec6d106c74f41fe18c1cf', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:53:58', '2019-04-16 07:53:58', '2020-04-16 14:53:58'),
('b192ccbcbbef83cc8bd2d54b955408a524ecb0363750ef4df8044cfda74487ce015e2c3d78dde318', 2, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-07 21:38:44', '2019-04-07 21:38:44', '2020-04-08 04:38:44'),
('b3df4a03dd65ce657bf983e2cbdc858ac7e30d202026eff706258c034dfa125a00526e336b64c094', 10, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-08 19:29:36', '2019-04-08 19:29:36', '2020-04-09 02:29:36'),
('b57593d223ef68c8b1035b9b57c56f6f349e4e50cae23e81ed45954986b2c2c9eeae2ac2e5f798b7', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:46:39', '2019-04-16 07:46:39', '2020-04-16 14:46:39'),
('c165a1c9acf429faef799e73d5f513a8a96f88b616e923325780785965ea85897f76d6777128b711', 10, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-08 19:29:36', '2019-04-08 19:29:36', '2020-04-09 02:29:36'),
('c2426d4a1d2af2f440b72df883d3285a4489a80a551c663edd186fa0a5d2a0fa1e6b46d8ec6b9dbf', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 06:43:34', '2019-04-16 06:43:34', '2020-04-16 13:43:34'),
('c6722e88f016d7597b096e682adeee90b4647dbfe96517fc9ee7b0797cc8e9a4a6634a374f18e229', 1, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-24 13:20:05', '2019-04-24 13:20:05', '2020-04-24 20:20:05'),
('d28138c4c19f4fb9505a3e7f9a1a3d57d6aa751f6f4917c9559b9684d48e388e9d151f0d54a57a8b', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:19:22', '2019-04-16 07:19:22', '2020-04-16 14:19:22'),
('dea8daf450ac861543ff059a6f7625d2bc59ee2f15718bb7c18f6cef7a3b85b42666ebf85a6b9c26', 1, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-09 13:22:49', '2019-04-09 13:22:49', '2020-04-09 20:22:49'),
('df055b3f75def2a5188ef7d1d7a579a7fb1b6c7d13fb9fc8b8b82b80dbf478578f8f0462dfbd670b', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:11:47', '2019-04-16 07:11:47', '2020-04-16 14:11:47'),
('e0a970bec52e5b0bc98606ed9291849ec9ac4d6559301d1fe73993b10135d1e745c740f63d9dc96b', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:57:54', '2019-04-16 07:57:54', '2020-04-16 14:57:54'),
('e6b0a01470977a017e5b3f6cd8019d99895f302ad781514d550114af26b16c9e6f96592dfbb550cd', 10, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-09 07:33:54', '2019-04-09 07:33:54', '2020-04-09 14:33:54'),
('e83ca8b710e1cb09654d6ba5ac92a9edba17cc40f57015798090314ec10afd6b94a129c8bf46d5a9', 10, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-08 18:41:50', '2019-04-08 18:41:50', '2020-04-09 01:41:50'),
('e890c861010c4a5ae054c028884c065050cd3aadc8c6b7a033eba0796ac886152ecba81002c5805c', 2, 1, 'Movies Personal Access Client', '[]', 0, '2019-04-24 11:10:20', '2019-04-24 11:10:20', '2020-04-24 18:10:20'),
('eabaf961298ce4d89ae82954245abe61aede53d0d099da66d956376164cdb1f0b2c5e3bb2e393ca1', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:58:27', '2019-04-16 07:58:27', '2020-04-16 14:58:27'),
('eccf47f00e4b0df045d390a1ce4cbd2fa76012c9c0f0a960963a2b4ffa4a7a88cd8cadce279288f0', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:52:28', '2019-04-16 07:52:28', '2020-04-16 14:52:28'),
('f4a21762698e043de1046b1bcdff3e4ecd263e6eb428fb73a5ae11d9176edb9d08dffbd134bf479c', 10, 2, NULL, '[\"*\"]', 0, '2019-04-08 18:13:25', '2019-04-08 18:13:25', '2020-04-09 01:13:25'),
('f6888be8f61a01301dc58add186a8de49bdb8eba1f5523beaca57e31a198f7221ba986cb783d3850', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:14:29', '2019-04-16 07:14:29', '2020-04-16 14:14:29'),
('f6ecca2a8fe6cebfb5ffe22a4ad3b14cdbfb914618bed49eace1965f938f7f3c76839e58f8d5a982', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-20 10:54:20', '2019-04-20 10:54:20', '2020-04-20 17:54:20'),
('f9c7add9b9515e09cf502e72b25eb4c95503f3a735f6baffcdc23fe5a38a6e40dc7ff7add357615d', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-24 12:27:22', '2019-04-24 12:27:22', '2020-04-24 19:27:22'),
('fd7d97279f7f382ad798e984afba00f66ff02a25b4c9b195d30df6c61acb759f667fa7cf83a8c934', 1, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 06:00:48', '2019-04-16 06:00:48', '2020-04-16 13:00:48'),
('ff19272029c2e1d5c9683506914fc4a7e5612beda9572c84f557b0a0ec40a88f0eef8f5a01fc4743', 2, 1, 'Movies Personal Access Client', '[]', 1, '2019-04-16 07:47:04', '2019-04-16 07:47:04', '2020-04-16 14:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'GOLF Personal Access Client', 'h652sMcRX1pvOSvQ4ivuzrBLOObrf4BdFe8xwitA', 'http://localhost', 1, 0, 0, '2019-04-07 21:12:01', '2019-04-07 21:12:01'),
(2, NULL, 'GOLF Password Grant Client', 'RGrBwwYUP2cY1yGedviA5Ghx9V6jjztpTVDQdkRf', 'http://localhost', 0, 1, 0, '2019-04-07 21:12:01', '2019-04-07 21:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-07 21:12:01', '2019-04-07 21:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('0b576ba0970a032bbc48e82611ec38bcbf693b73fdd12701a10af5946be46c3f593ec694c903a857', 'f4a21762698e043de1046b1bcdff3e4ecd263e6eb428fb73a5ae11d9176edb9d08dffbd134bf479c', 0, '2020-04-09 01:13:25'),
('269a3b082847093ac0cea55da83e8d1394f25cddff50c66512df6f256586640f635532eed10027d7', '5fce133356fa05e50c89e2ccc1bcc62da3ebe537ad6e3b76aea254b47f03081e931666af721c4906', 0, '2020-04-09 01:12:49'),
('282b53afe91c3a4d2c52a53ff7d6267ec67b94834126792e6309792d5bb0778d9e37be2949745b9b', '21288cd50836fd024bd0d922fc069c8f43ed00883625e98e9d808b1887f5f059ddad67c1b4a17fa6', 0, '2020-04-09 01:06:32'),
('842b45e2ae1209832669ce79dad679934684405a0e867a46f6a7f075714dee8f4b827e841f9338f5', 'a67e92d708f2488c34c172b62d709841a2b369a19579f85d33f28f3fbfa6a3c61e11a5528883b1cd', 0, '2020-04-09 01:09:04'),
('8f106995a7176cf391ddc183edc975c1b1977e3e3b3836ae6d8a858685ab53662a4cd3ffdb77fb5f', '0ddd681e4f973038b1832a9cb7a2f14b7c9df68ee5e89fabd1cbbaeb14d55dbcdb43fe890ca776e7', 0, '2020-04-08 04:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pro_slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pro_price` decimal(9,2) NOT NULL,
  `pro_detail` longtext COLLATE utf8_unicode_ci,
  `pro_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_start_date` date NOT NULL,
  `pro_end_date` date NOT NULL,
  `pro_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `pro_name`, `pro_slug`, `pro_price`, `pro_detail`, `pro_image`, `pro_start_date`, `pro_end_date`, `pro_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'วันศุกร์ สุขใจ ไปพัทยาคันทรี่คลับ', 'วันศุกร์-สุขใจ-ไปพัทยาคันทรี่คลับ', '1500.00', '<p>Pattaya Country Club สนามกอล์ฟสุดโมเดิร์นบนพื้นที่กว้างใหญ่กว่า 1,800 ไร่ มาตรฐาน 18 หลุม ท้าทายความสามารถของนักกอล์ฟทุกระดับด้วยทะเลสาบและต้นไม้ใหญ่ ใช้เวลาเดินทางหนีรถติดจากกรุงเทพฯ เพียง 1 ชั่วโมงเศษ ไม่ไกลจากแหล่งท่องเที่ยวชื่อดังอย่างพัทยา และแหล่งธุรกิจอย่างนิคมอุตสาหกรรมอมตะนคร พร้อมโปรโมชั่นพิเศษมากมาย</p>', '56c90550cf9782fcdb5a94450b82c446.jpg', '2019-04-10', '2019-04-13', '0', '2019-04-05 07:36:39', '2019-04-05 07:36:39', NULL),
(4, 'โปรโมชั่นพิเศษ ช่วงซัมเมอร์กับ Mountain Creek ลำตะคอง', 'ewefef', '1750.00', '<p>Mountain Creek Golf Resort and Residences สนามกอล์ฟ 27 หลุม บนหุบเขาที่มีลำธารหินเป็นเอกลักษณ์ของลำตะคอง นครราชสีมา สนามท้าทายด้วยเนินเขาที่เป็นระลอกคลื่น ต้นไม้ธรรมชาติที่ล้อมรอบและก้อนหินที่ประดับไว้เป็นแลนด์มาร์ค การเดินทางแสนสะดวกบนถนนมิตรภาพ ใช้เวลาในการเดินทางจากกรุงเทพฯ ไม่นานนัก</p>\r\n\r\n<p>โปรโมชั่น</p>\r\n\r\n<ul>\r\n	<li>วันธรรมดา เช้า กรีนฟี 1,750 บาท</li>\r\n	<li>วันหยุด เช้า กรีนฟี 2,150 บาท</li>\r\n	<li>วันธรรมดา บ่าย กรีนฟี 1,650 บาท</li>\r\n	<li>วันหยุด บ่าย กรีนฟี 1,950 บาท</li>\r\n</ul>', '611f0707ef565e9395658fc158c45aac.jpg', '2019-04-03', '2019-04-09', '0', '2019-04-05 08:05:03', '2019-04-05 15:50:14', NULL),
(5, 'One of the best value for money around Pattaya area.', 'One-of-the-best-value-for-money-around-Pattaya-area', '900.00', '<p>ความสวยงามที่ซ่อนอยู่ในหุบเขา ชลบุรี-พัทยา ออกแบบโดย Robert McFarland เป็นสนามกอล์ฟ 18 หลุม พาร์ 72 เป็นสนามภูเขา แฟร์เวย์มีขึ้นมีลง และกรีนสโลป กรีนเร็วเฉลี่ย 9.5 ซึ่งท้ายทายความสามารถมากๆ และสามารถมองเห็น ทิวทัศน์รอบๆ ได้อย่างสวยงาม ทุกหลุมจะมีฉากหลังเป็นภูเขา เป็นอีกหนึ่งสนามกอล์ฟใกล้กรุงเทพ ที่ชวนให้เหล่านักกอล์ฟพิสูจน์ไปท้าทาย จากกรุงเทพ เพียง 1.30 ชั่วโมง เท่านั้น</p>', '73bb32891c7d5bd3adef2ffe90caf1b5.jpg', '2019-04-01', '2019-04-30', '0', '2019-04-08 19:46:18', '2019-04-08 19:46:18', NULL),
(6, 'สนามกอล์ฟ ยูนิโก้ กรองเด้ กอล์ฟ คอร์ส', 'สนามกอล์ฟ-ยูนิโก้-กรองเด้-กอล์ฟ-คอร์ส-เป็นสนามกอล์ฟระดับสากล', '750.00', '<p>เป็นสนามกอล์ฟที่รู้จักกันมาช้านาน ตั้งอยู่บนถนนกรุงเทพกรีฑาโครงสร้างของสนามดี แล้วทำเลที่ตั้งของสนามดีมาก ดึงดูดนักกอล์ฟมาเล่นได้มากและทางสนามได้มีการปรับปรุงในส่วนของคลับเฮาส์ และภายในสนาม เพื่อสะดวกแก่ผู้ที่มาใช้บริการ เปิดให้บริการทุกวัน</p>\r\n\r\n<p>ที่อยู่ 2 Krungthepkreetha Road Saphansung ,Bangkok,Thailand</p>\r\n\r\n<p>ติดต่อ 021388319</p>\r\n\r\n<p>เวลาทำการ 05:30 - 18:00</p>\r\n\r\n<p>บัตรเครดิต VISA, MasterCard, JCB, Amex,</p>\r\n\r\n<p>ค่าธรรมเนียมรถเข็น 600THB</p>\r\n\r\n<p>ค่าแคดดี้ 300THB</p>\r\n\r\n<p>นโยบายยกเลิกการจอง เรากำหนดให้ต้องมีการแจ้งยกเลิกล่วงหน้าก่อนวันเล่นจริงเป็นเวลา 4 วัน มิเช่นนั้น เราอาจต้องชาร์จค่ายกเลิกตามรายละเอียดด้านล่างนี้&nbsp;<br />\r\n100 % จากยอดทั้งหมดที่ชำระหากท่านยกเลิกล่วงหน้า 3 วัน ก่อนการเล่นจริง</p>', '400c5618ff943292f315fcb98e850711.jpg', '2019-04-01', '2019-04-30', '0', '2019-04-08 19:48:47', '2019-04-13 16:30:13', NULL),
(7, 'สนามกอล์ฟ เดอะ รอยัล กอล์ฟ แอนด์ คันทรี คลับ: ทีไทม์', 'สนามกอล์ฟ-เดอะ-รอยัล-กอล์ฟ-แอนด์-คันทรี-คลับ-ทีไทม์', '2000.00', '<p>สนามเดอะรอยัลกอล์ฟ แอนด์ คันทรี คลับ(สุวรรณภูมิ)สนามกอล์ฟระดับมาตรฐานสากล 18 หลุม พาร์ 72 ตั้งอยู่ระหว่าง ทางด่วนกรุงเทพ-ชลบุรีสายใหม่(Motorway) และถนนอ่อนนุช-ลาดกระบัง ใกล้สนามบินสุวรรณภูมิที่สุด ใช้เวลาเดินทางเพียง 15 นาทีเท่านั้น สภาพสนามสวยสมบูรณ์ การเดินทางสะดวกสบาย เพียบพร้อมด้วยสิ่งอำนวยความสะดวก และคลับเอ้าท์ที่สวยงาม ออกแบบโดย มร.โชเฮอิ มิยาซาวา ที่มีผลงานด้านการออกแบบสนามกอล์ฟมากมายในญี่ปุ่น ที่นี่เป็นสนามกอล์ฟแห่งเดียวในประเทศไทยที่มีน้ำล้อมรอบ คุณจะได้ร่วมสนุกและแสวงหาความท้าทายจากสนามกอล์ฟ 18 หลุม ซึ่งแต่ละหลุมมีความท้าทายและความสวยงามไม่ซ้ำกันเลย&nbsp;<br />\r\n<br />\r\nเดอะ รอยัล กอล์ฟ แอนด์ คันทรี คลับ แวดล้อมไปด้วย แมกไม้น้อยใหญ่เขียวขจี ร่มรื่น ให้ความสดชื่นสำหรับวันพักผ่อนของคุณ ทะเลสาบและบังเกอร์ถูกจัดวางไว้อย่างลงตัวให้คุณออกรอบได้อย่างตื่นเต้นขึ้น แวะมาที่นี่แล้วคุณจะรู้ว่าอาณาจักรแห่งความท้าทาย ผสมผสานกับความสวย สงบ ร่มรื่น เป็นอย่างไร และทำไมจึงเป็นที่ชื่นชอบของนักกอล์ฟทุกระดับฝีมือรวมถึงนักกอล์ฟระดับมืออาชีพ เลือกให้ เดอะ รอยัล กอล์ฟ แอนด์ คันทรี คลับ เป็นสนามน่าเล่นที่สุดสนามหนึ่งของเมืองไทย</p>', 'cba96ddc3aa4deff36a21f19d9f4636d.jpg', '2019-04-01', '2019-04-30', '0', '2019-04-08 19:51:03', '2019-04-13 15:46:49', NULL),
(8, 'สนามกอล์ฟ บูรพากอล์ฟ แอนด์ รีสอร์ท', 'สนามกอล์ฟ-บูรพากอล์ฟ-แอนด์-รีสอร์ท', '1350.00', '<p>The two 18-holes championship golf course were designed by the international respected architect Gary Panks and the world touring professional David Graham (winner of the US Open and PGA). Their mission, now achieved with remarkable dedication , was to build a golf complex that would be recognized for its exceptional standards in the most discerning golfing circles both here in Thailand and throughout the South East Asia region.</p>', 'c808a89fe6854554ba6841299d8a028b.jpg', '2019-04-01', '2019-04-30', '0', '2019-04-08 19:52:10', '2019-04-13 15:44:32', NULL),
(9, 'สนามกอล์ฟ พัฒนา กอล์ฟ คลับ แอนด์ รีสอร์ท', 'สนามกอล์ฟ-พัฒนา-กอล์ฟ-คลับ-แอนด์-รีสอร์ท', '1200.00', '<p>Undulating fairways, panoramic views of rolling hills afar, friendly wind conditions and scenic signature holes including a 663 yard par 6 can make each golfing experience a memorable one.</p>', '742f6b83fc6c9e85338b0807fbff2707.jpg', '2019-04-01', '2019-04-30', '0', '2019-04-08 19:54:13', '2019-04-13 15:44:57', NULL),
(10, 'สนามกอล์ฟ ฟีนิกซ์ โกลด์ แอนด์ คันทรี คลับ พัทยา', 'สนามกอล์ฟ-ฟีนิกซ์-โกลด์-แอนด์-คันทรี-คลับ-พัทยา', '1200.00', '<p>สนามฟีนิกซ์โกลด์ กอล์ฟ แอนด์ คันทรี คลับ พัทยา เป็นสนามกอล์ฟ 27 หลุม ออกแบบโดย Mr.Dennis Griffiths ในปี 1993 มีหลุมทั้ง 27 หลุมแบ่งออกเป็น คอร์ส Ocean, Lakes และ Mountain ซึ่งแต่ละคอร์สก็จะมีจุดเด่นแตกต่างกันไป โดยเฉพาะโอเชียนคอร์สซึ่งจะสามารถมองเห็นวิวทะเลพัทยา และเมาน์เทนคอร์ส ที่สามารถมองเห็นพระพุทธรูปแกะสลักบนหน้าผาเขาชีจรรย์ ตัวคลับเฮาส์ตั้งอยู่บนยอดเขาและมีสนามกอล์ฟทั้ง 3 คอร์สล้อมรอบอยู่ ถือว่าเป็นโลเคชั่นที่สวยงามมากสนามหนึ่งเลย และสนามยังเป็นสังเวียนดวลวงสวิง &quot;เลดี้ส์ ยูโรเปี้ยน ไทยแลนด์ แชมเปี้ยนชิพ 2017&quot; การเดินทางง่ายมากใช้เวลาขับรถไม่ถึง 10 นาทีจากพัทยา และยังสามารถเข้าได้จากทางถนนสุขุมวิท และสาย 331 มุ่งหน้าสัตหีบก็ได้</p>', '39cc4c8e3e710990b97d191a3447fc27.jpg', '2019-04-01', '2019-04-30', '0', '2019-04-08 19:55:24', '2019-04-13 15:45:16', NULL),
(11, 'สนามกอล์ฟเมืองแก้ว', 'สนามกอล์ฟเมืองแก้ว', '1400.00', '<p>สนามกอล์ฟเมืองแก้วเป็นสนามระดับแชมเปี้ยนชิพ มี 18 หลุม พาร์ 72 ด้วยสภาพแวดล้อมของสนาม ที่ปกคลุมไปด้วยต้นไม้ใหญ่และเลาะเลี้ยวตามลำคลอง ทำให้สนามแห่งนี้ มีบรรยากาศที่ร่มรื่น พร้อมเลย์เอาท์ของสนามที่ได้รับการออกแบบให้มีความท้าทาย<br />\r\nในปี 2546 สนามกอล์ฟเมืองแก้ว ได้ทำการปรับปรุงสภาพสนามและกรีน โดยบริษัท Schmidt-Curley Design จำกัด ซึ่งได้ออกแบบสถาปัตยกรรม โดยคำนึงถึงสภาพแวดล้อมของธรรมชาติและความเขียวชะอุ่มของแมกไม้ พร้อมกับความท้าทายได้อย่างลงตัว</p>', 'e50e0ee8ad47cae98405697e0d31f265.jpg', '2019-04-01', '2019-04-30', '0', '2019-04-08 19:57:54', '2019-04-13 15:47:13', NULL),
(12, 'สนามกอล์ฟ สุภาพฤกษ์', 'สนามกอล์ฟ-สุภาพฤกษ์', '1550.00', '<p>Welcome to Subhapruek Golf Club. Opened in 1993 and formerly known as Bangna Country Club, HRH Princess Maha Chakri Sirindhorn in 1995 graciously bestowed the name Subhapruek which literally means beautiful plants.<br />\r\n<br />\r\nOccupying an area of 500 rais (1600 sqm/rai) of flat marshy rice field Subhapruek golf course is now a startling place of rolling and undulating turf framed by beautifully shaped bunkers, big lakes, mature trees, lush gardens with different tropical floral vegetation and spectacular waterfalls with glistening brooks, all aesthetically and strategically shaped into the finest golfing terrain in greater Bangkok.</p>', '3f77ddc191c1003fed260fa9f825cb74.jpg', '2019-04-15', '2019-05-15', '0', '2019-04-08 19:59:39', '2019-04-13 15:46:27', NULL),
(13, 'สนามกอล์ฟ เดอะ รอยัล กอล์ฟ แอนด์ คันทรี คลับ', 'สนามกอล์ฟ-เดอะ-รอยัล-กอล์ฟ-แอนด์-คันทรี-คลับ', '1250.00', '<p>สนามเดอะรอยัลกอล์ฟ แอนด์ คันทรี คลับ(สุวรรณภูมิ)สนามกอล์ฟระดับมาตรฐานสากล 18 หลุม พาร์ 72 ตั้งอยู่ระหว่าง ทางด่วนกรุงเทพ-ชลบุรีสายใหม่(Motorway) และถนนอ่อนนุช-ลาดกระบัง ใกล้สนามบินสุวรรณภูมิที่สุด ใช้เวลาเดินทางเพียง 15 นาทีเท่านั้น สภาพสนามสวยสมบูรณ์ การเดินทางสะดวกสบาย เพียบพร้อมด้วยสิ่งอำนวยความสะดวก และคลับเอ้าท์ที่สวยงาม ออกแบบโดย มร.โชเฮอิ มิยาซาวา ที่มีผลงานด้านการออกแบบสนามกอล์ฟมากมายในญี่ปุ่น ที่นี่เป็นสนามกอล์ฟแห่งเดียวในประเทศไทยที่มีน้ำล้อมรอบ คุณจะได้ร่วมสนุกและแสวงหาความท้าทายจากสนามกอล์ฟ 18 หลุม ซึ่งแต่ละหลุมมีความท้าทายและความสวยงามไม่ซ้ำกันเลย&nbsp;<br />\r\n<br />\r\nเดอะ รอยัล กอล์ฟ แอนด์ คันทรี คลับ แวดล้อมไปด้วย แมกไม้น้อยใหญ่เขียวขจี ร่มรื่น ให้ความสดชื่นสำหรับวันพักผ่อนของคุณ ทะเลสาบและบังเกอร์ถูกจัดวางไว้อย่างลงตัวให้คุณออกรอบได้อย่างตื่นเต้นขึ้น แวะมาที่นี่แล้วคุณจะรู้ว่าอาณาจักรแห่งความท้าทาย ผสมผสานกับความสวย สงบ ร่มรื่น เป็นอย่างไร และทำไมจึงเป็นที่ชื่นชอบของนักกอล์ฟทุกระดับฝีมือรวมถึงนักกอล์ฟระดับมืออาชีพ เลือกให้ เดอะ รอยัล กอล์ฟ แอนด์ คันทรี คลับ เป็นสนามน่าเล่นที่สุดสนามหนึ่งของเมืองไทย</p>', 'eddbb45ef33a4bcfaa88b38469a3555d.jpg', '2019-05-01', '2019-05-31', '0', '2019-04-08 20:01:38', '2019-04-13 15:48:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_orders`
--

CREATE TABLE `promotion_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `promotion_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `service_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `order_status` enum('new','playment','confirm','not_confirm','cancle') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `message` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_amount` decimal(9,2) DEFAULT NULL,
  `payment_image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion_orders`
--

INSERT INTO `promotion_orders` (`id`, `user_id`, `promotion_id`, `amount`, `service_date`, `start_date`, `end_date`, `order_status`, `message`, `bank_id`, `payment_date`, `payment_time`, `payment_amount`, `payment_image`, `created_at`, `updated_at`) VALUES
(16, 2, 7, '2000.00', '2019-04-21', '2019-04-01', '2019-04-30', 'confirm', 'สวัสดี', 1, '2019-04-21', '16:18', '1200.00', '35e16092daebaf8fda566af9a66909d9.jpg', '2019-04-21 05:57:27', '2019-04-22 19:16:56'),
(17, 2, 6, '750.00', '2019-04-24', '2019-04-01', '2019-04-30', 'playment', NULL, 1, '2019-04-23', '18:19', '12899.00', '860d9d96f866062a91296616bf04bb4c.jpg', '2019-04-21 06:48:10', '2019-04-23 08:12:46'),
(18, 2, 5, '900.00', '2019-04-23', '2019-04-01', '2019-04-30', 'new', NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 08:06:25', '2019-04-23 08:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `email`, `verified`, `email_verified_at`, `profile_picture`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Teerayut Khunsuk', 'teerayut041995', '$2y$10$2sO8BQS/dV9OBHA29ro6C.Qn73O16shGxhPsFpBHgiFu3doRu7H7u', '0902168726', 'teerayut041995@gmail.com', '1', '2019-04-02 02:28:39', NULL, 'true', 'Jibk9bCEhJkj4J9DRFCPZ0cmpAB4P4ApoCdiIo2s265oZ77hrUpKHdiV9z1w', '2019-04-02 02:28:39', '2019-04-02 02:28:39', NULL),
(2, 'ธีรยุทธ คูณสุข', 'teerayut', '$2y$10$bylBwRLBNMvKNUmrP0CNE.H.GQXpxNe74K1GrCQepbuzpxfG8NL.G', '0908383736', 'mike@hotmail.com', '0', NULL, NULL, 'false', NULL, '2019-04-07 21:04:59', '2019-04-07 21:04:59', NULL),
(3, 'Teerayut Khunsuk', 'teerayut0419951', '$2y$10$YpuosodTnn82ZrhXIo.UPOHJ9Dkr6tc9sAOHQ./gS3hF/OG2UWT0G', '0833808938', 'mike_04@hotmail.com', '0', NULL, NULL, 'false', NULL, '2019-04-08 12:00:23', '2019-04-08 12:00:23', NULL),
(4, 'Teerayut Khunsuk', 'teerayut0419952', '$2y$10$lMYBHvCKBxYiYUXmj8LSYeA8tOYbGcftCvFVCjtx3nyVb6HWTVvxe', '0833808938', 'mike_04-1195@hotmail.com', '0', NULL, NULL, 'false', NULL, '2019-04-08 12:01:51', '2019-04-08 12:01:51', NULL),
(5, 'Teerayut Khunsuk', 'teerayut0419957', '$2y$10$TsVFvtToGagqRn0ZymnQmOiKmmE.ssFYddRokMexBRfoIb9uEUZMO', '0833808938', 'teerayut041995@gmail.com', '0', NULL, NULL, 'false', NULL, '2019-04-08 15:41:58', '2019-04-08 15:41:58', NULL),
(6, 'teerayut khunsuk', 'teerayut1', '$2y$10$gudPnylJt15ScvVdhrD5D.t5k/9TeTFsrabvx2hiISKVlroxNeFn.', '0908383736', NULL, '0', NULL, NULL, 'false', NULL, '2019-04-08 15:44:32', '2019-04-08 15:44:32', NULL),
(7, 'Teerayut Khunsuk', 'teerayut04', '$2y$10$0Q.oz1TsmEh6H/FwwU4WI.e5Ox9cL2SCGhCgfCfozwJyb5PQMjuhi', '0833808938', NULL, '0', NULL, NULL, 'false', NULL, '2019-04-08 15:45:13', '2019-04-08 15:45:13', NULL),
(8, 'Teerayut Khunsuk', 'teerayut05', '$2y$10$oiuPUM2h35p2d7qI8o4gwuhw.5hBenTS.vSWHmFJjLxnBGcDY5BO2', '0833808938', NULL, '0', NULL, NULL, 'false', NULL, '2019-04-08 15:46:20', '2019-04-08 15:46:20', NULL),
(9, 'Teerayut Khunsuk', 'teerayut07', '$2y$10$sNqIkwysHB.SqsKvASr/Vea41lio6VIFKxA3Q.ybY4bJhMphN8X.S', '0833808938', NULL, '0', NULL, NULL, 'false', NULL, '2019-04-08 15:47:41', '2019-04-08 15:47:41', NULL),
(10, 'ธีรยุทธ คูณสุข', 'miketeerayut', '$2y$10$0mDQdBNVpDeTfDuwa8Xm.OGpor7olpOxHmi1EtIbQHpfIMClBbbeu', '0902168726', 'mike_04-1995@hotmail.com', '0', NULL, NULL, 'false', NULL, '2019-04-08 17:57:50', '2019-04-08 17:57:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `activities_act_slug_unique` (`act_slug`);

--
-- Indexes for table `activity_orders`
--
ALTER TABLE `activity_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_orders_user_id_foreign` (`user_id`),
  ADD KEY `activity_orders_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotions_pro_slug_unique` (`pro_slug`);

--
-- Indexes for table `promotion_orders`
--
ALTER TABLE `promotion_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotion_orders_user_id_foreign` (`user_id`),
  ADD KEY `promotion_orders_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `activity_orders`
--
ALTER TABLE `activity_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `promotion_orders`
--
ALTER TABLE `promotion_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_orders`
--
ALTER TABLE `activity_orders`
  ADD CONSTRAINT `activity_orders_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotion_orders`
--
ALTER TABLE `promotion_orders`
  ADD CONSTRAINT `promotion_orders_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotion_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
