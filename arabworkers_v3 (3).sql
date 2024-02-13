-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 07:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arabworkers_v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_switch_operations`
--

CREATE TABLE `account_switch_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` enum('employer','worker') COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` enum('employer','worker') COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `isTransferWalletBalance` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `transferred_amount` double NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_switch_operations`
--

INSERT INTO `account_switch_operations` (`id`, `from`, `to`, `employer_id`, `worker_id`, `isTransferWalletBalance`, `transferred_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'employer', 'worker', 13, 4, 'false', 0, NULL, '2023-12-11 14:14:03', '2023-12-11 14:14:03'),
(2, 'employer', 'worker', 13, 4, 'false', 0, NULL, '2023-12-12 17:34:04', '2023-12-12 17:34:04'),
(3, 'employer', 'worker', 13, 4, 'false', 0, NULL, '2023-12-13 18:57:39', '2023-12-13 18:57:39'),
(4, 'employer', 'worker', 13, 4, 'false', 0, NULL, '2023-12-18 20:02:52', '2023-12-18 20:02:52'),
(5, 'employer', 'worker', 13, 4, 'false', 0, NULL, '2023-12-18 22:45:19', '2023-12-18 22:45:19'),
(6, 'worker', 'employer', 13, 4, 'false', 0, NULL, '2023-12-18 22:49:48', '2023-12-18 22:49:48'),
(7, 'employer', 'worker', 13, 4, 'false', 0, NULL, '2023-12-26 01:37:18', '2023-12-26 01:37:18'),
(8, 'employer', 'worker', 18, 10, 'true', 10, NULL, '2024-01-14 15:04:02', '2024-01-14 15:04:02'),
(9, 'employer', 'worker', 18, 10, 'true', 10, NULL, '2024-01-14 15:07:05', '2024-01-14 15:07:05'),
(10, 'employer', 'worker', 18, 10, 'true', 20, NULL, '2024-01-14 15:11:22', '2024-01-14 15:11:22'),
(11, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-16 12:56:57', '2024-01-16 12:56:57'),
(12, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-16 13:36:46', '2024-01-16 13:36:46'),
(13, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-16 14:19:12', '2024-01-16 14:19:12'),
(14, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-16 14:25:22', '2024-01-16 14:25:22'),
(15, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-16 14:37:49', '2024-01-16 14:37:49'),
(16, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-16 15:02:25', '2024-01-16 15:02:25'),
(17, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 16:28:11', '2024-01-19 16:28:11'),
(18, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 17:47:03', '2024-01-19 17:47:03'),
(19, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 17:53:23', '2024-01-19 17:53:23'),
(20, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 17:57:09', '2024-01-19 17:57:09'),
(21, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 18:06:23', '2024-01-19 18:06:23'),
(22, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 18:13:04', '2024-01-19 18:13:04'),
(23, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 18:25:27', '2024-01-19 18:25:27'),
(24, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-19 18:30:32', '2024-01-19 18:30:32'),
(25, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 18:30:42', '2024-01-19 18:30:42'),
(26, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-19 18:30:52', '2024-01-19 18:30:52'),
(27, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 18:32:04', '2024-01-19 18:32:04'),
(28, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-19 18:34:39', '2024-01-19 18:34:39'),
(29, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 18:35:06', '2024-01-19 18:35:06'),
(30, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-19 18:57:35', '2024-01-19 18:57:35'),
(31, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-19 18:57:42', '2024-01-19 18:57:42'),
(32, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-20 10:52:44', '2024-01-20 10:52:44'),
(33, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-20 10:53:29', '2024-01-20 10:53:29'),
(34, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-20 16:10:13', '2024-01-20 16:10:13'),
(35, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-20 16:10:35', '2024-01-20 16:10:35'),
(36, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-20 16:33:36', '2024-01-20 16:33:36'),
(37, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-23 16:26:14', '2024-01-23 16:26:14'),
(38, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-23 16:48:02', '2024-01-23 16:48:02'),
(39, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-23 18:12:46', '2024-01-23 18:12:46'),
(40, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-23 18:17:54', '2024-01-23 18:17:54'),
(41, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-23 18:22:31', '2024-01-23 18:22:31'),
(42, 'worker', 'employer', 18, 10, 'false', 0, NULL, '2024-01-23 18:22:39', '2024-01-23 18:22:39'),
(43, 'employer', 'worker', 18, 10, 'false', 0, NULL, '2024-01-27 18:42:58', '2024-01-27 18:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `title`, `ar_title`, `icon`, `fees`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'pin_task_on_top', 'تثبيت المهمة في الأعلى', NULL, 5.5, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(2, 'only_professional_worker', 'عرض المهمة على العُمّال المحترفين فقط', NULL, 3.5, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(3, 'daily_limit_worker', 'تعيين حد يومي للعمل على المهمة', NULL, 1.5, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrative_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('accepted','rejected','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `avatar`, `administrative_number`, `password`, `role_id`, `status`, `current_currency`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MohammadZam', 'MohammadZam@arabWorkers.com', NULL, 'MZ0001', '$2y$10$8f8yo.42ZBDtY1duBOmYJuuYqL1quQaGDCnykCBO/WfWTnx4B8KK2', 1, 'accepted', 'USD', NULL, '2023-12-10 04:42:07', '2023-12-10 04:42:07'),
(2, 'MohammadGamel', 'MohammadGamel@arabWorkers.com', NULL, 'MG0002', '$2y$10$T6538daffslmX9XU1Po.ReszObis7prnBQQBIiTeBmqWYXLIP8O2e', 1, 'accepted', 'USD', NULL, '2023-12-10 04:42:07', '2023-12-10 04:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name_ar`, `name_en`, `date`, `image`, `description_en`, `description_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'اربح 5 دولار في الساعة بتعليم اللغة العربية\r\n', 'Earn $5 an hour by teaching Arabic', '22-10-2020\r\n', 'default.jpg', 'Via Arab Workers website, can we really earn $500 a month? Actually the answer is yes! We can', 'عبر موقع عرب وركرز هل حقا يمكننا ربح 500 دولارا شهريا ؟ في الحقيقة الإجابة هي نعم! يمكننا\r\n', NULL, NULL, NULL),
(2, 'دورة العمالة الرقمية مجانا\r\n', 'Free digital employment course', '22-10-2020\r\n', 'default.jpg', 'The role of digital labor in developing artificial intelligence programs and its impact on this industry', 'دور العمالة الرقمية في تطوير برامج الذكاء الإصطناعي وتأثيرها على هذه الصناعة\r\n\r\n', NULL, NULL, NULL),
(3, 'العمل علي الانترنت و الربح السريع\r\n', 'Work online and make quick profitsdigital employment course', '22-10-2020\r\n', 'default.jpg', 'Working on the Internet is not the same as before. It has now become one of the most important sources of income spread around the world', 'العمل على الانترنت ليس كالسابق فأصبح الآن من ضمن مصادر الدخل المنتشرة عالميا وهو من أهم\r\n\r\n\r\n', NULL, NULL, NULL),
(4, 'اربح 5 دولار في الساعة بتعليم اللغة العربية\r\n', 'Earn $5 an hour by teaching Arabic', '22-10-2020\r\n', 'default.jpg', 'Via Arab Workers website, can we really earn $500 a month? Actually the answer is yes! We can', 'عبر موقع عرب وركرز هل حقا يمكننا ربح 500 دولارا شهريا ؟ في الحقيقة الإجابة هي نعم! يمكننا\r\n', NULL, NULL, NULL),
(5, 'العمل علي الانترنت و الربح السريع\r\n', 'Work online and make quick profitsdigital employment course', '22-10-2020\r\n', 'default.jpg', 'Working on the Internet is not the same as before. It has now become one of the most important sources of income spread around the world', 'العمل على الانترنت ليس كالسابق فأصبح الآن من ضمن مصادر الدخل المنتشرة عالميا وهو من أهم\r\n\r\n\r\n', NULL, NULL, NULL),
(6, 'دورة العمالة الرقمية مجانا\r\n', 'Free digital employment course', '22-10-2020\r\n', 'default.jpg', 'The role of digital labor in developing artificial intelligence programs and its impact on this industry', 'دور العمالة الرقمية في تطوير برامج الذكاء الإصطناعي وتأثيرها على هذه الصناعة\r\n\r\n', NULL, NULL, NULL),
(7, 'دورة العمالة الرقمية مجانا\r\n', 'Free digital employment course', '22-10-2020\r\n', 'default.jpg', 'The role of digital labor in developing artificial intelligence programs and its impact on this industry', 'دور العمالة الرقمية في تطوير برامج الذكاء الإصطناعي وتأثيرها على هذه الصناعة\r\n\r\n', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `ar_title`, `image`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'فايسبوك', 'Categories/Image/dwt2zjdfq01dBpc1Nkzujme14sJwcH2VxMPEqhXD.png', 'متابعين وتعليقات ومراجعات حقيقية لترويج موقعك', NULL, '2023-12-10 04:42:09', '2023-12-12 17:35:59'),
(2, 'Google search', 'البحث على غوغل', 'Categories/Image/pKY2czUZcbKuWR9b4VAXaCeBTCObb9tkhNyHnSUK.png', 'حسن ترتيب موقعك على محركات البحث', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(3, 'Youtube', 'يوتيوب', 'Categories/Image/iViXbFiFZDwh3qz98q1uPmECj1DkTLXeDduhkmXk.png', 'اشتراكات ومشاهدات وتعليقات وتفعيل للربح', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(4, 'Polls', 'استطلاعات الرأي', 'Categories/Image/nLU3k7k1PLFZqL9o7uhv3GgDNUJaQF7HqfrcCIzx.png', 'احص على إجابات سريعو وحقيقية لإستطلاع الرأي', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(5, 'Test A Application Or Web Site', 'إختيار موقع أو تطبيق', 'Categories/Image/tWMdcyRbJOoY6SxzkZjolKFKfANAMXa7xUOWJL99.png', 'مئات العمال جاهزون لاختيار موقعك الآن', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(6, 'Artificial intelligence test', 'إختبارات الذكاء الاصطناعي', 'Categories/Image/NWBg45FeL1PMBZm77TlXNfOEgmZHmNnR4mTuhHe7.png', 'اختبار مدى مرونة وذكاء روبوتك', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(7, 'Twitter', 'تويتر', 'Categories/Image/WR4EKZxT1AoUQlDJukeQf25TVoJIkmB1m6bM8JA9.png', 'شارك تغرديداتك مع الجميع', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(8, 'Snapchat', 'سناب شات', 'Categories/Image/SFqpkV9xPacINNt6eUzPpAzZtPGgrXBpMswu0wN0.png', 'قم بضم المزيد إلى بثوثك المباشرة', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(9, 'TikTok', 'تيك توك', 'Categories/Image/eri4HXyUiZSav7Z1mcJcjce2X0S69rLDphTEfIO6.png', 'خدمات ممزية للمنصة الأشهر عالمياً', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(10, 'Instagram', 'إنستاغرام', 'Categories/Image/wiFdkbDpmAwjAnYPPvnkTFZxXOBhfBP84jrvrKzZ.png', 'قم بطلب إعجابات وتعليقات لمقطاعك وصفحاتك', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(11, 'Google Maps', 'خرائط غوغل', 'Categories/Image/S9DYf5esykaFftcBYbhFNc8zG3yx6JO4TnQV6frm.png', 'قم بطلب تسجيل نشاطك التجاري', NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `category_actions`
--

CREATE TABLE `category_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_actions`
--

INSERT INTO `category_actions` (`id`, `category_id`, `name`, `ar_name`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comment', 'تعليق', 0.1, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(2, 1, 'Like', 'إعجاب', 0.2, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(3, 1, 'Share', 'مشاركة', 0.25, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(4, 1, 'View', 'مشاهدة', 0.55, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(5, 2, 'Search', 'بحث', 0.14, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(6, 2, 'EnterKeyWork', 'إدخال كلمة مفتاحية', 0.56, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(7, 2, 'OpenWebSite', 'زيارة موقع إلكتروني', 0.29, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(8, 3, 'Comment', 'تعليق', 0.4, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(9, 3, 'Like', 'إعجاب', 0.5, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(10, 3, 'Share', 'مشاركة', 0.6, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(11, 3, 'Subscribe', 'متابعة', 0.7, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(12, 4, 'ParticipateInTheOpinionPoll', 'المشاركة في إستطلاع رأي', 0.66, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(13, 5, 'Download', 'تنزيل', 1.65, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(14, 5, 'Rate', 'تقييم', 0.33, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(15, 5, 'Share', 'مشاركة', 0.23, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(16, 6, 'ParticipateInAnArtificialIntelligenceTest', 'المشاركة في إختبار ذكاء إصطناعي', 2.01, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(17, 7, 'Comment', 'تعليق', 0.56, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(18, 7, 'Like', 'إعجاب', 0.75, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(19, 7, 'ReTwitte', 'إعادة تغريد', 0.57, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(20, 8, 'Comment', 'تعليق', 0.7, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(21, 8, 'Like', 'إعجاب', 0.78, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(22, 8, 'Subscribe', 'متابعة', 0.34, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(23, 8, 'JoinLiveStream', 'الإنضمام إلى البث المباشر', 0.35, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(24, 9, 'Comment', 'تعليق', 0.76, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(25, 9, 'Like', 'إعجاب', 0.37, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(26, 9, 'Subscribe', 'متابعة', 0.96, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(27, 9, 'JoinLiveStream', 'الإنضمام إلى البث المباشر', 0.79, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(28, 10, 'Comment', 'تعليق', 0.23, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(29, 10, 'Like', 'إعجاب', 0.76, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(30, 10, 'Subscribe', 'متابعة', 0.23, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(31, 10, 'JoinLiveStream', 'الإنضمام إلى البث المباشر', 0.756, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(32, 10, 'JoinGroup', 'الإنضمام إلى مجموعة', 0.77, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(33, 11, 'AddAddress', 'إضافة عنوان', 0.54, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(34, 11, 'RateAddress', 'تقييم عنوان', 0.65, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(35, 11, 'EditeAddress', 'تعديل عنوان', 0.84, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(36, 11, 'AddAddressDetails', 'إضافة تفاصيل إلى عنوان', 0.23, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09'),
(37, 11, 'EditeAddressDetails', 'تعديل تفاصيل عنوان', 0.67, NULL, '2023-12-10 04:42:09', '2023-12-10 04:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_city_cost` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `ar_name`, `min_city_cost`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dubai', 'دبي', 0.3, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(2, 1, 'AbuDhabi', 'أبو ظبي', 0.25, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(3, 1, 'Sharjah', 'الشارقة', 0.2, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(4, 2, 'Jedda', 'جدة', 0.6, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(5, 2, 'Mecca', 'مكة المكرمة', 0.65, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(6, 2, 'Medina', 'المدينة المنورة', 0.7, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(7, 3, 'Qayro', 'القاهرة', 0.5, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(8, 3, 'Alexandria', 'الإسكندرية', 0.55, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(9, 3, 'Asyut', 'أسيوط', 0.45, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(10, 4, 'Khartom', 'الخرطوم', 0.1, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(11, 4, 'Omdurman', 'أم درمان', 0.15, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(12, 5, 'Adan', 'عدن', 0.1, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(13, 5, 'Sanaa', 'صنعاء', 0.15, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(14, 5, 'Abyan', 'أبين', 0.25, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(15, 6, 'NewOrlyanz', 'نيو أورلينز', 0.7, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(16, 6, 'NewYork', 'نيويورك', 0.75, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(17, 6, 'Chicago', 'شيكاغو', 0.8, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(18, 6, 'Houston', 'هيوستن', 0.66, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(19, 7, 'Tarablos', 'طرابلس', 0.6, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(20, 7, 'Benghazi', 'بنغازي', 0.65, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(21, 7, 'Misrata', 'مصراتة', 0.15, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(22, 8, 'Sousse', 'سوسة', 0.56, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(23, 8, 'Sfax', 'صفاقص', 0.32, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(24, 8, 'Tunis', 'تونس العاصمة', 0.53, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(25, 9, 'Qouds', 'القدس المحتلة', 0.56, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(26, 9, 'Gaza', 'غزة', 0.76, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(27, 9, 'Nablus', 'نابلس', 0.13, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(28, 9, 'Yafa', 'يافا', 0.98, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(29, 10, 'Aleppo', 'حلب', 0.56, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(30, 10, 'Homs', 'حمص', 0.87, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(31, 10, 'Latakia', 'اللاذقية', 0.45, NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(32, 11, 'Doha', 'الدوحه', 1, NULL, '2023-12-10 23:28:56', '2023-12-10 23:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `message`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asmaa karam abozied', '213213213', 'asdadsadsadad', 0, NULL, '2024-01-10 17:28:16', '2024-01-10 17:28:16'),
(2, 'Cade Clarke', '+1 (129) 962-8348', 'Praesentium id velit', 0, NULL, '2024-01-10 17:31:22', '2024-01-10 17:31:22'),
(3, 'saad', '312313', 'aassssssssssssssssssssssssss', 0, NULL, '2024-01-10 17:31:45', '2024-01-10 17:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calling_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_price` double NOT NULL,
  `is_arabic` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `ar_name`, `calling_code`, `flag`, `min_price`, `is_arabic`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'United Arab Emirates', 'الإمارات العربية المتحدة', '00971', 'Countries/flags/Wcf7XbQVpzYrCQVamiG2m4rEUSiRm4Iffs5Nrfyp.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(2, 'Kingdom Saudi Arabia', 'المملكة العربية السعودية', '00966', 'Countries/flags/fHoBr879A7gkeoxt32PNZARkvth3PgyFtLkmhDwI.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(3, 'Egypt', 'مصر', '0020', 'Countries/flags/l8pL4uCxIMhortdoA6xaqjggQ1VFFvyZlQLI2nIc.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(4, 'Sudan', 'السودان', '00249', 'Countries/flags/dfojt1s3qFxD5mJ40YLoZnTn9ojAFYdwRn4aKBxL.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(5, 'Yemen', 'اليمن', '00967', 'Countries/flags/p1CM8Pio5jabFkirynIc2n4BOH9Ou2I0h3iMV6za.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(6, 'USA', 'الولايات المتحدة الأمريكية', '001', 'Countries/flags/qIc2BgQY9yk69fkomMpAMs7ibQaFLArFokcD8Tuj.png', 0.2, 'false', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(7, 'Libya', 'ليبيا', '00218', 'Countries/flags/FdafTH3ezWrP4GX9iXR2n9QzXpckmen7ujKXs1Wo.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(8, 'Tunisia', 'تونس', '00216', 'Countries/flags/sTEjgz8IH2kYQ4OTvLf1Xlnic1Hg1epeMAKDCk6p.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(9, 'Palestine', 'فلسطين', '00970', 'Countries/flags/oaBm91iiEW4PgrvHv7Omr1uR9I6HNu1sKQoGJtLR.svg', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(10, 'Syria', 'سوريا', '00963', 'Countries/flags/KCGhrkp7b6MhnWiDOdJvCh2wDmSf41UUljR7KFYE.png', 0.2, 'true', NULL, '2023-12-10 04:42:10', '2023-12-10 04:42:10'),
(11, 'Qatar', 'قطر', '00974', NULL, 1, 'true', NULL, '2023-12-10 23:28:56', '2023-12-10 23:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(8,2) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `en_name`, `ar_name`, `rate`, `icon`, `is_default`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'دولار أمريكي', 1.00, 'Currencies/eJKsGNwBpv8FARbUQdxsaFB1exdkV8Mhls5QI7s2.png', 'true', NULL, '2023-12-10 04:42:05', '2023-12-10 04:42:05'),
(2, 'EGP', 'جنيه مصري', 30.89, 'Currencies/D1M5vXzrBEDO2Ro5EcAFdOLTbZBhy8OsUOHMHmNM.png', 'false', NULL, '2023-12-10 04:42:05', '2023-12-10 04:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `deferred_tasks`
--

CREATE TABLE `deferred_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `main_end_date` date NOT NULL,
  `new_end_date` date NOT NULL,
  `main_total_worker_limit` int(11) NOT NULL,
  `new_total_worker_limit` int(11) NOT NULL,
  `reason_of_defer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_of_defer` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('MainCosts','AdditionalCosts','TotalCosts','PayCosts') COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_uses` int(11) NOT NULL,
  `count_of_uses` int(11) NOT NULL DEFAULT 0,
  `discount_amount` int(11) NOT NULL,
  `starts_at` datetime NOT NULL,
  `expires_at` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `type`, `max_uses`, `count_of_uses`, `discount_amount`, `starts_at`, `expires_at`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cnsd74', 'MainCosts', 10, 0, 5, '2022-10-05 00:00:01', '2023-12-31 00:00:01', 'First Discount Code', NULL, '2023-12-10 04:42:18', '2023-12-10 04:42:18'),
(2, 'Mnsh61', 'AdditionalCosts', 5, 0, 2, '2022-12-12 00:00:01', '2023-12-24 00:00:01', 'Tow Discount Code', NULL, '2023-12-10 04:42:18', '2023-12-10 04:42:18'),
(3, 'Xvbb76', 'TotalCosts', 6, 0, 6, '2022-01-15 00:00:01', '2023-01-23 00:00:01', 'Three Discount Code', NULL, '2023-12-10 04:42:18', '2023-12-10 04:42:18'),
(4, 'Obdsg54', 'PayCosts', 15, 0, 10, '2023-07-20 00:45:00', '2024-07-28 15:45:00', 'Four Discount Code', NULL, '2023-12-10 04:42:18', '2023-12-10 04:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `subject`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '0', NULL, '2024-01-10 19:23:05', '2024-01-10 19:23:05'),
(2, 'hgh@dssd.com', '0', NULL, '2024-01-10 19:23:24', '2024-01-10 19:23:24'),
(3, 'asaS@DAd.com', '0', NULL, '2024-01-10 19:23:56', '2024-01-10 19:23:56'),
(4, 'rreew@weqe.com', '0', NULL, '2024-01-10 20:17:06', '2024-01-10 20:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facbook_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_level_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `suspend_days` int(11) NOT NULL DEFAULT 0,
  `suspend_start_date` date DEFAULT NULL,
  `wallet_balance` double NOT NULL DEFAULT 0,
  `total_spends` double NOT NULL DEFAULT 0,
  `current_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `employer_number`, `name`, `email`, `avatar`, `email_verified_at`, `mobile_verified_at`, `google_id`, `facbook_id`, `apple_id`, `password`, `country_id`, `city_id`, `phone`, `employer_level_id`, `gender`, `description`, `address`, `zip_code`, `status`, `suspend_days`, `suspend_start_date`, `wallet_balance`, `total_spends`, `current_currency`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'E-Y-M-S-RCH-RNUM1', 'Maytham Mohammad', 'Maytham@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Azm2NiUmfucUrtVWwOPWjeBSlxLBxs3TRrl/Sb/JPMOWzECBQQ18O', 1, 1, '00963256410', 1, 'male', 'Maytham Description', 'Syria, Aleppo', '5415', 'enable', 0, NULL, 65, 10, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(2, 'E-Y-M-S-RCH-RNUM2', 'Maya Othman', 'Maya@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$zwpoBBTkVHidaRUSG6xUZO1x8F/zHJtw7aCZ12gcK04aTkxM6xS2G', 2, 4, '0025143256410', 1, 'female', 'Maya Description', 'Egypt, Qayro', '5876', 'enable', 0, NULL, 98, 56, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(3, 'E-Y-M-S-RCH-RNUM3', 'Isabelle Cote', 'poulin.yvan@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$RZ656vWZKwXXN.TIyoqb1eGWTxSjVpC48Tifx7nwRAS8QN/dTbjX2', 3, 7, '2221226901338541', 1, 'female', 'Isabelle Description', '40 Route Savard Apt. 612, St-Lucas, QC L1X 2V3', '54', 'enable', 0, NULL, 984, 0, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(4, 'E-Y-M-S-RCH-RNUM4', 'Zoe Scott', 'mathilde70@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tG5b33JixKDbwCKvfDm3k.kJL4/2DI2yeM5Ms3yxkRqnYyGtLblvy', 4, 10, '931-367-4320', 1, 'female', 'Zoe Scott (Female)', '95 Chemin Auguste Bureau 967, Saint-Alexandre-sur-Rivière-du-Sud, QC F6H4P9', '655tg', 'enable', 0, NULL, 122, 5, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(5, 'E-Y-M-S-RCH-RNUM5', 'Isabella Fortin', 'mathieu.mercier@perron.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$TlnIJ3bSVhc/MmjMRkHqUu7RaEiTCgtlrjNCceFNMAjY11BYmGc.S', 5, 12, '1-619-634-9067', 1, 'female', 'Zoe Scott (Female)', '5 Avenue Élodie, Sainte-Roland, AB X1Z7T2', '54vv', 'enable', 0, NULL, 665, 77, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(6, 'E-Y-M-S-RCH-RNUM6', 'Grayson Kelly', 'jeannine16@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$cfntZjC.T84U2Ifow5BNQOb1APXoFiZcwbJV7ioCyHKbXlbXyfyGS', 6, 15, '774435654651138', 1, 'male', 'Grayson Kelly (Male)', '59 Autoroute Demers Bureau 022, Sainte-David, SK K6S3E3', 'dfg54', 'enable', 0, NULL, 58, 2, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(7, 'E-Y-M-S-RCH-RNUM7', 'Sebastian Mitchell', 'lambert.anouk@arsenault.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yVG0uOl/CEz75Yew89uVIuGUVJ76YTKPkyDlI6DtgnYqMgQOACJvW', 7, 19, '77445845751138', 1, 'male', 'Sebastian Mitchell (Male)', '015 Route Bouchard Bureau 793, Ste-Frédéric, AB R1S3A4', 'dfg54', 'enable', 0, NULL, 55, 0, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(8, 'E-Y-M-S-RCH-RNUM8', 'Colton Williams', 'qpelletier@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SuBTRn52Jno9ypyeL8zR5OzIDlEXP1mi7duKVNco/hbFQJX3FlMB.', 8, 22, '(603)474-5872', 1, 'male', 'Colton Williams (Male)', '34 Chemin Dufour, Sainte-Nancy, BC M5F5Y3', 'fd452', 'enable', 0, NULL, 98, 9, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(9, 'E-Y-M-S-RCH-RNUM9', 'Levi Johnston', 'nadeau.corrine@savard.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$x8Djy9CYG/YTZq65lL.Tou3rcKq2Bxu6GM/IxR703x5HI5zBV0Vv6', 9, 25, '210.181.63.27', 1, 'male', 'Levi Johnston (Male)', '7 Autoroute Bouchard, St-Alfred-de-Rioux, BC F8Z0E7', 'mj45', 'enable', 0, NULL, 22, 0, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(10, 'E-Y-M-S-RCH-RNUM10', 'Aiden Reid', 'vgingras@fontaine.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$CHnEBnxhxDIK7P/Cvytpf.ry7CM8svjsdejrLNndiPzGgRhAG5cWy', 10, 30, '1-602-637-6923', 1, 'male', 'Aiden Reid (Male)', '882 Pont Sébastien, St-Susanne, NL D9L3Y1', 'mj3s', 'enable', 0, NULL, 223, 0, 'USD', NULL, NULL, '2023-12-10 04:42:12', '2023-12-10 04:42:12'),
(11, 'E2312629Gv78', 'Mohamed Gamal abdel hamed', 'emarketbank@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$KmnKgbVEyBVaOK3AGAAvJec097RQXqb1JjFSOD7dUqrOj5neq2TE.', 3, 7, '00201555141282', 1, 'male', 'emarketbank@gmail.com', '146 madent elmostaqbal', '31111', 'enable', 0, NULL, 0, 0, 'EGP', NULL, NULL, '2023-12-10 23:10:30', '2023-12-11 00:08:00'),
(12, 'E23120337r13', 'Mos3ab Yousef', 'muss3ab.1994@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocL-My1-5W6vFPdxBJfblo-hs4Q7TG-eeU3MmreyF_y5sDA=s96-c', '2023-12-11 06:31:47', NULL, '100525007502717003070', NULL, NULL, '$2y$10$QDOHIXe7TSnW7rne49ZyiOKb71aX83uwXy0gSvzTYrNePK5LmPyHO', NULL, NULL, NULL, 1, 'male', NULL, NULL, NULL, 'enable', 0, NULL, 0, 0, 'USD', NULL, NULL, '2023-12-11 06:37:33', '2023-12-11 06:37:33'),
(13, 'E2312804U882', 'Mohamed Gamal abdel hamed', 'arabworkerseg@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJwMwNtisEMZBlshBCh8BvM2--CObjjQY1oMrocp8fMJw=s96-c', '2023-12-11 13:55:50', NULL, '106446906177393970869', NULL, NULL, '$2y$10$iOro6Djn5ArfGPq1snRnYOj48ODORbGzlj6YrSVL3bs8Hjl5CJvim', 3, 7, '00201066478278', 1, 'male', 'arabworkerseg@gmail.com', '146 madent elmostaqbal', '31111', 'enable', 0, NULL, 0, 0, 'EGP', NULL, NULL, '2023-12-11 13:56:05', '2023-12-26 01:30:13'),
(16, 'E2312304kg26', 'Monaya Magdy', 'monayax47@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ptX2F2RaZtPRqht1.UCEn.QcHep5gszW4SzYAC60ohjJyY/12TZ56', 3, 9, '00201033389845', 1, 'female', 'monayax47@gmail.com', 'Asyut , Egypt', '71511', 'enable', 0, NULL, 0, 0, 'USD', NULL, NULL, '2023-12-25 19:55:04', '2023-12-25 20:00:48'),
(17, 'E2401p06RL37', 'Savannah Black', 'dylaqu@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yD78j9bcwO4cvZpEkSU9mOP3GmeR8.ZaA1l9eJP4tlKQBumpB7Yvy', 10, 30, '009634324324', 1, 'male', NULL, NULL, '123', 'enable', 0, NULL, 0, 0, 'USD', NULL, NULL, '2024-01-01 21:29:06', '2024-01-01 21:29:06'),
(18, 'E2401E09WJ99', 'aaa44444aaaaaaaaa55', 'admin@admin.comA123', NULL, '2024-01-01 16:32:34', NULL, NULL, NULL, NULL, '$2y$10$l8gFz26aLB1DcdH15ilrvO4puvrVrxAuUMhLZd5w7R4gyHo1ILVj.', 3, 7, '0020001090766553', 1, 'male', '34errewrewr32444', '444444', '4444', 'enable', 0, NULL, 9925, 75, 'USD', NULL, NULL, '2024-01-12 18:01:09', '2024-01-16 12:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `employer_levels`
--

CREATE TABLE `employer_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_spend` double NOT NULL,
  `minimum_task` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_levels`
--

INSERT INTO `employer_levels` (`id`, `name`, `minimum_spend`, `minimum_task`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'New', 0, 0, NULL, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(2, 'medium', 600, 3, NULL, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(3, 'ManyRequests', 1200, 10, NULL, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `employer_privileges`
--

CREATE TABLE `employer_privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `count_of_privileges` int(11) NOT NULL,
  `type` enum('plus','minus') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_privileges`
--

INSERT INTO `employer_privileges` (`id`, `employer_id`, `count_of_privileges`, `type`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2023-12-10 23:10:30', '2023-12-10 23:10:30'),
(2, 12, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2023-12-11 06:37:36', '2023-12-11 06:37:36'),
(3, 13, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2023-12-11 13:56:05', '2023-12-11 13:56:05'),
(4, 13, 4, 'plus', 'Having A Dual Account', NULL, '2023-12-11 14:14:03', '2023-12-11 14:14:03'),
(5, 16, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2023-12-25 19:55:04', '2023-12-25 19:55:04'),
(6, 17, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2024-01-01 21:29:06', '2024-01-01 21:29:06'),
(7, 18, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2024-01-12 18:01:10', '2024-01-12 18:01:10'),
(8, 18, 5, 'plus', 'Create New Task', NULL, '2024-01-16 12:15:57', '2024-01-16 12:15:57'),
(9, 18, 2, 'plus', 'Use Additional Feature', NULL, '2024-01-16 12:15:57', '2024-01-16 12:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `employer_task_discount_codes`
--

CREATE TABLE `employer_task_discount_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `discount_code_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_task_discount_codes`
--

INSERT INTO `employer_task_discount_codes` (`id`, `employer_id`, `task_id`, `discount_code_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 18, 2, 2, NULL, NULL, NULL),
(6, 18, 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_tickets`
--

CREATE TABLE `employer_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `support_section_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_tickets`
--

INSERT INTO `employer_tickets` (`id`, `ticket_number`, `employer_id`, `support_section_id`, `subject`, `description`, `attached_files`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ETik2312c49f862', 13, 2, 'تسسسستتسسسست', 'تسسسستتسسسستتسسسست', NULL, NULL, '2023-12-18 23:07:49', '2023-12-18 23:07:49'),
(2, 'ETik2401b43SI44', 18, 1, 'wwwwwwwwwwww', 'cxcxcxzc', 'Ticket/EmployerFiles/Xw2eC7fTiR87qBGqf83TtGJba1PXUy7aioAoHiby.png', NULL, '2024-01-15 18:16:43', '2024-01-15 18:16:43'),
(3, 'ETik2401t014K60', 18, 2, 'qwqwqwqwfdsfdsf', 'qwqwqwqxzcdsfdsfdafdsfdsfdasf', 'Ticket/EmployerFiles/zfaw02Sy3hJshla5FqP4mJ9koyhaQHgCNQCT5m94.png', NULL, '2024-01-15 18:26:01', '2024-01-15 18:26:01'),
(4, 'ETik2401r21Aa91', 18, 2, 'qwqwqwqwfadsf', 'dsafdsafdfdsfdsfdsfdsdsfafdadsf', 'Ticket/EmployerFiles/Gjcb651K6ljjkyUFxleZJSKzZewty3Zv3laCRrty.png', NULL, '2024-01-15 18:32:21', '2024-01-15 18:32:21'),
(5, 'ETik2401f03tp32', 18, 1, 'dfsdsfgfgsfgfdgfdgsfd', 'sgfdgdgfdsfgsfdgfgfsdgdsgfdgdfgsfdgfdgfd', 'Ticket/EmployerFiles/p7u9Y5F29Nar0F3RWNovfg65qplH9peaQtVGNU7O.jpg', NULL, '2024-01-20 16:20:03', '2024-01-20 16:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `employer_ticket_answers`
--

CREATE TABLE `employer_ticket_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_attached_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_answered_at` timestamp NULL DEFAULT NULL,
  `employer_answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_attached_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_answered_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_ticket_statuses`
--

CREATE TABLE `employer_ticket_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_status_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_ticket_statuses`
--

INSERT INTO `employer_ticket_statuses` (`id`, `employer_ticket_id`, `ticket_status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2023-12-18 23:07:49', '2023-12-18 23:07:49'),
(2, 2, 1, NULL, '2024-01-15 18:16:43', '2024-01-15 18:16:43'),
(3, 3, 1, NULL, '2024-01-15 18:26:01', '2024-01-15 18:26:01'),
(4, 4, 1, NULL, '2024-01-15 18:32:21', '2024-01-15 18:32:21'),
(5, 5, 1, NULL, '2024-01-20 16:20:03', '2024-01-20 16:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `employer_transactions`
--

CREATE TABLE `employer_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_08_31_043637_create_roles_table', 1),
(2, '2023_08_31_042656_create_currencies_table', 2),
(3, '2023_08_31_042803_create_supported_currency_codes_table', 2),
(4, '2023_08_31_042356_create_admins_table', 3),
(5, '2023_08_31_043708_create_settings_table', 4),
(6, '2023_08_31_043732_create_addons_table', 4),
(7, '2023_08_31_043751_create_employer_levels_table', 4),
(8, '2023_08_31_043810_create_statuses_table', 4),
(9, '2023_08_31_043826_create_worker_levels_table', 4),
(10, '2023_08_31_042531_create_categories_table', 5),
(11, '2023_08_31_042559_create_category_actions_table', 5),
(12, '2023_08_31_043443_create_countries_table', 6),
(13, '2023_08_31_043451_create_cities_table', 6),
(14, '2023_09_07_163625_create_temp_google_accounts_table', 7),
(15, '2023_08_31_043028_create_employers_table', 8),
(16, '2023_08_31_045219_create_workers_table', 9),
(17, '2023_08_31_043345_create_privileges_table', 10),
(18, '2023_08_31_043401_create_worker_privileges_table', 10),
(19, '2023_08_31_043408_create_employer_privileges_table', 10),
(20, '2023_08_31_044556_create_tasks_table', 11),
(21, '2023_08_31_044609_create_deferred_tasks_table', 11),
(22, '2023_08_31_044622_create_task_category_actions_table', 11),
(23, '2023_08_31_044638_create_task_cities_table', 11),
(24, '2023_08_31_044650_create_task_countries_table', 11),
(25, '2023_08_31_044704_create_task_proofs_table', 11),
(26, '2023_08_31_044714_create_task_statuses_table', 11),
(27, '2023_08_31_044725_create_task_workers_table', 11),
(28, '2023_08_31_044737_create_task_work_flows_table', 11),
(29, '2023_11_19_001704_create_task_proof_screen_shots_table', 11),
(30, '2023_08_31_045116_create_employer_transactions_table', 12),
(31, '2023_08_31_045139_create_worker_paypal_transactions_table', 12),
(32, '2023_08_31_042849_create_discount_codes_table', 13),
(33, '2023_09_02_131516_create_employer_task_discount_codes_table', 13),
(34, '2023_09_06_111730_create_support_sections_table', 14),
(35, '2023_09_06_111755_create_ticket_statuses_table', 14),
(36, '2023_09_06_111813_create_employer_tickets_table', 14),
(37, '2023_09_06_111824_create_worker_tickets_table', 14),
(38, '2023_09_06_111843_create_employer_ticket_answers_table', 14),
(39, '2023_09_06_111900_create_worker_ticket_answers_table', 14),
(40, '2023_09_06_111921_create_employer_ticket_statuses_table', 14),
(41, '2023_09_06_111931_create_worker_ticket_statuses_table', 14),
(42, '2023_09_02_130214_create_account_switch_operations_table', 15),
(43, '2023_08_31_043139_create_emails_table', 16),
(44, '2023_08_31_043228_create_temporary_employer_tokens_table', 16),
(45, '2023_08_31_043301_create_temporary_worker_tokens_table', 16),
(46, '2024_01_05_181613_create_contacts_table', 17),
(47, '2024_01_05_181613_create_blogs_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('term','privacy','about') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name_ar`, `name_en`, `type`, `description_en`, `description_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'بيان الخصوصية\r\n', 'Privacy Statement\r\n', 'privacy', 'The site administration is obliged, within the limits allowed in accordance with the regulating law, not to disclose any personal information about the user such as address, phone number, e-mail address, and others. Furthermore, none of such information will be exchanged, traded or sold to any third party for as long as it is within the possible capabilities of the site administration, and access to the information will only be allowed to qualified and professional persons who supervise the Khamsat website.\r\n\r\nExclusion of legal liability The user acknowledges that he is solely responsible for the nature of the use determined by him of the Arab and Focus website, and the management of the Arab and Focus website, to the fullest extent permitted by law, disclaims all responsibility for any losses, damages, expenses or expenses incurred by the user or suffered by him or any other party as a result of the use of the Arab and Focus website, or inability to use it.\r\n\r\nService interruptions, omissions and errors The site administration is doing its best to ensure and maintain the continuation of the work of the website without problems, although errors, omissions, service interruptions and delays may occur at any time, and in such cases we will expect users to be patient until the service returns to normal.', 'تلتزم إدارة الموقع في حدود المسموح لها وفق القانون المنظم، بعدم كشف أي معلومات شخصية عن المستخدم مثل العنوان أو رقم الهاتف أو عنوان البريد الإلكتروني وغيرها. علاوة على ذلك، لن يتم تبادل، أو تداول أي من تلك المعلومات أو بيعها لأي طرف آخر طالما كان ذلك في حدود قدرات إدارة الموقع الممكنة، ولن يُسمح بالوصول إلى المعلومات إلا للأشخاص المؤهلين والمحترفين الذين يشرفون على موقع خمسات الإلكتروني.\r\n\r\nنتفاء المسؤولية القانونية يقر المستخدم بأنه المسؤول الوحيد عن طبيعة الاستخدام الذي يحدده للموقع الإلكتروني عرب وركز ، وتخلي إدارة موقع عرب وركز طرفها إلى أقصى مدى يجيزه القانون، من كامل المسؤولية عن أية خسائر أو أضرار أو نفقات أو مصاريف يتكبدها المستخدم أو يتعرض لها هو أو أي طرف آخر من جراء استخدام الموقع الإلكتروني عرب وركز، أو العجز عن استخدامه.\r\n\r\nحالات انقطاع الخدمة والسهو والخطأ تبذل إدارة الموقع قصارى جهدها للحرص والحفاظ على استمرار عمل الموقع الإلكتروني بدون مشاكل، رغم ذلك قد تقع في أي وقت أخطاء وحالات سهو وانقطاع للخدمة وتأخير لها، وفي مثل هذه الحالات سنتوقع من المستخدمين الصبر حتى تعود الخدمة إلى الحالة الطبيعية.', NULL, NULL, NULL),
(2, 'شروط الاستخدام', 'term', 'term', 'The site administration is obliged, within the limits allowed in accordance with the regulating law, not to disclose any personal information about the user such as address, phone number, e-mail address, and others. Furthermore, none of such information will be exchanged, traded or sold to any third party for as long as it is within the possible capabilities of the site administration, and access to the information will only be allowed to qualified and professional persons who supervise the Khamsat website.\r\n\r\nExclusion of legal liability The user acknowledges that he is solely responsible for the nature of the use determined by him of the Arab and Focus website, and the management of the Arab and Focus website, to the fullest extent permitted by law, disclaims all responsibility for any losses, damages, expenses or expenses incurred by the user or suffered by him or any other party as a result of the use of the Arab and Focus website, or inability to use it.\r\n\r\nService interruptions, omissions and errors The site administration is doing its best to ensure and maintain the continuation of the work of the website without problems, although errors, omissions, service interruptions and delays may occur at any time, and in such cases we will expect users to be patient until the service returns to normal.', 'تلتزم إدارة الموقع في حدود المسموح لها وفق القانون المنظم، بعدم كشف أي معلومات شخصية عن المستخدم مثل العنوان أو رقم الهاتف أو عنوان البريد الإلكتروني وغيرها. علاوة على ذلك، لن يتم تبادل، أو تداول أي من تلك المعلومات أو بيعها لأي طرف آخر طالما كان ذلك في حدود قدرات إدارة الموقع الممكنة، ولن يُسمح بالوصول إلى المعلومات إلا للأشخاص المؤهلين والمحترفين الذين يشرفون على موقع خمسات الإلكتروني.\r\n\r\nنتفاء المسؤولية القانونية يقر المستخدم بأنه المسؤول الوحيد عن طبيعة الاستخدام الذي يحدده للموقع الإلكتروني عرب وركز ، وتخلي إدارة موقع عرب وركز طرفها إلى أقصى مدى يجيزه القانون، من كامل المسؤولية عن أية خسائر أو أضرار أو نفقات أو مصاريف يتكبدها المستخدم أو يتعرض لها هو أو أي طرف آخر من جراء استخدام الموقع الإلكتروني عرب وركز، أو العجز عن استخدامه.\r\n\r\nحالات انقطاع الخدمة والسهو والخطأ تبذل إدارة الموقع قصارى جهدها للحرص والحفاظ على استمرار عمل الموقع الإلكتروني بدون مشاكل، رغم ذلك قد تقع في أي وقت أخطاء وحالات سهو وانقطاع للخدمة وتأخير لها، وفي مثل هذه الحالات سنتوقع من المستخدمين الصبر حتى تعود الخدمة إلى الحالة الطبيعية.', NULL, NULL, NULL),
(3, 'من نحن', 'about', 'about', 'The site administration is obliged, within the limits allowed in accordance with the regulating law, not to disclose any personal information about the user such as address, phone number, e-mail address, and others. Furthermore, none of such information will be exchanged, traded or sold to any third party for as long as it is within the possible capabilities of the site administration, and access to the information will only be allowed to qualified and professional persons who supervise the Khamsat website.\r\n\r\nExclusion of legal liability The user acknowledges that he is solely responsible for the nature of the use determined by him of the Arab and Focus website, and the management of the Arab and Focus website, to the fullest extent permitted by law, disclaims all responsibility for any losses, damages, expenses or expenses incurred by the user or suffered by him or any other party as a result of the use of the Arab and Focus website, or inability to use it.\r\n\r\nService interruptions, omissions and errors The site administration is doing its best to ensure and maintain the continuation of the work of the website without problems, although errors, omissions, service interruptions and delays may occur at any time, and in such cases we will expect users to be patient until the service returns to normal.', 'تلتزم إدارة الموقع في حدود المسموح لها وفق القانون المنظم، بعدم كشف أي معلومات شخصية عن المستخدم مثل العنوان أو رقم الهاتف أو عنوان البريد الإلكتروني وغيرها. علاوة على ذلك، لن يتم تبادل، أو تداول أي من تلك المعلومات أو بيعها لأي طرف آخر طالما كان ذلك في حدود قدرات إدارة الموقع الممكنة، ولن يُسمح بالوصول إلى المعلومات إلا للأشخاص المؤهلين والمحترفين الذين يشرفون على موقع خمسات الإلكتروني.\r\n\r\nنتفاء المسؤولية القانونية يقر المستخدم بأنه المسؤول الوحيد عن طبيعة الاستخدام الذي يحدده للموقع الإلكتروني عرب وركز ، وتخلي إدارة موقع عرب وركز طرفها إلى أقصى مدى يجيزه القانون، من كامل المسؤولية عن أية خسائر أو أضرار أو نفقات أو مصاريف يتكبدها المستخدم أو يتعرض لها هو أو أي طرف آخر من جراء استخدام الموقع الإلكتروني عرب وركز، أو العجز عن استخدامه.\r\n\r\nحالات انقطاع الخدمة والسهو والخطأ تبذل إدارة الموقع قصارى جهدها للحرص والحفاظ على استمرار عمل الموقع الإلكتروني بدون مشاكل، رغم ذلك قد تقع في أي وقت أخطاء وحالات سهو وانقطاع للخدمة وتأخير لها، وفي مثل هذه الحالات سنتوقع من المستخدمين الصبر حتى تعود الخدمة إلى الحالة الطبيعية.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privileges` int(11) NOT NULL,
  `type` enum('plus','minus') COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` enum('employer','worker','dual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `title`, `code`, `privileges`, `type`, `for`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Create New Task', 'CNT', 5, 'plus', 'employer', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14'),
(2, 'Charge Wallet Balance', 'CWB', 3, 'plus', 'employer', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14'),
(3, 'Use Additional Feature', 'UAF', 2, 'plus', 'employer', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14'),
(4, 'Having A Dual Account', 'HDA', 4, 'plus', 'dual', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14'),
(5, 'SingUp To ArabWorkers', 'STA', 10, 'plus', 'dual', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14'),
(6, 'Accept Task Proof', 'ATF', 3, 'plus', 'worker', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14'),
(7, 'Reject Task Proof', 'RTF', 5, 'minus', 'worker', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14'),
(8, 'Suspend Activity In Platform', 'SAP', 8, 'minus', 'dual', NULL, '2023-12-10 04:42:14', '2023-12-10 04:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_ar`, `question_en`, `reply_ar`, `reply_en`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'اسياب ايفاف الحساب', 'Frequently Asked Questions', '                                \r\n                                  \r\nمنصة عربية عبر الإنترنت تربط أصحاب العمل والعمال من جميع أنحاء العالم العربي لتقوم بتسهيل وإدارة العمل والتواصل بين جميع الأطراف\r\n\r\nيضمن نظامنا لأصحاب العمل أن المهمة المدفوعة هي مهمة تم إجراؤها بنجاح، بينما يحصل العمال الذين يكملون مهمتهم بنجاح على أرباحهم.\r\n\r\nالمهام الموكلة إلى العمال والتي يدفعها أصحاب العمل بسيطة وسريعة، ويتم إنجازها في الغالب في غضون دقائق قليلة، وبالتالي تسمى “المهام الرقمية الدقيقة”. وتشمل هذه المهام البحث عن البيانات ، تصنيف البيانات ، وصف للبيانات، مساعدة برامج الذكاء الإصطناعي، اجراء محدد على شبكات التواصل الإجتماعي للحملات الترويجية، تقييم المحتوى والإستطلاعات والدراسات البحثية واختبار التطبيقات والمواقع الإلكترونية والعديد من المهام الرقمية التي تتطلب عدد كبير من العمالة الرقمية\r\n                             \r\n                             \r\n             ', 'Arabic online platform that connects employers and workers from all over the Arab world to facilitate and manage work and communication between all parties Our system ensures employers that a paid assignment is a successfully performed task, while workers who successfully complete their assignment receive their earnings. Tasks assigned to workers and paid by employers are simple and fast, and are often completed within a few minutes, hence called \"digital precision tasks\". These tasks include data search, data classification, data description, AI software assistance, specific action on social networks for promotional campaigns, content evaluation, surveys, research studies, testing of applications and websites, and many other digital tasks that require a large number of digital labor.', NULL, NULL, NULL),
(2, '2اسياب ايفاف الحساب', 'Frequently Asked Questions2', '                                \r\n                                  \r\nمنصة عربية عبر الإنترنت تربط أصحاب العمل والعمال من جميع أنحاء العالم العربي لتقوم بتسهيل وإدارة العمل والتواصل بين جميع الأطراف\r\n\r\nيضمن نظامنا لأصحاب العمل أن المهمة المدفوعة هي مهمة تم إجراؤها بنجاح، بينما يحصل العمال الذين يكملون مهمتهم بنجاح على أرباحهم.\r\n\r\nالمهام الموكلة إلى العمال والتي يدفعها أصحاب العمل بسيطة وسريعة، ويتم إنجازها في الغالب في غضون دقائق قليلة، وبالتالي تسمى “المهام الرقمية الدقيقة”. وتشمل هذه المهام البحث عن البيانات ، تصنيف البيانات ، وصف للبيانات، مساعدة برامج الذكاء الإصطناعي، اجراء محدد على شبكات التواصل الإجتماعي للحملات الترويجية، تقييم المحتوى والإستطلاعات والدراسات البحثية واختبار التطبيقات والمواقع الإلكترونية والعديد من المهام الرقمية التي تتطلب عدد كبير من العمالة الرقمية\r\n                             \r\n                             \r\n             ', 'Arabic online platform that connects employers and workers from all over the Arab world to facilitate and manage work and communication between all parties Our system ensures employers that a paid assignment is a successfully performed task, while workers who successfully complete their assignment receive their earnings. Tasks assigned to workers and paid by employers are simple and fast, and are often completed within a few minutes, hence called \"digital precision tasks\". These tasks include data search, data classification, data description, AI software assistance, specific action on social networks for promotional campaigns, content evaluation, surveys, research studies, testing of applications and websites, and many other digital tasks that require a large number of digital labor.', NULL, NULL, NULL),
(3, '3اسياب ايفاف الحساب', 'Frequently Asked Questions3', '                                \r\n                                  \r\nمنصة عربية عبر الإنترنت تربط أصحاب العمل والعمال من جميع أنحاء العالم العربي لتقوم بتسهيل وإدارة العمل والتواصل بين جميع الأطراف\r\n\r\nيضمن نظامنا لأصحاب العمل أن المهمة المدفوعة هي مهمة تم إجراؤها بنجاح، بينما يحصل العمال الذين يكملون مهمتهم بنجاح على أرباحهم.\r\n\r\nالمهام الموكلة إلى العمال والتي يدفعها أصحاب العمل بسيطة وسريعة، ويتم إنجازها في الغالب في غضون دقائق قليلة، وبالتالي تسمى “المهام الرقمية الدقيقة”. وتشمل هذه المهام البحث عن البيانات ، تصنيف البيانات ، وصف للبيانات، مساعدة برامج الذكاء الإصطناعي، اجراء محدد على شبكات التواصل الإجتماعي للحملات الترويجية، تقييم المحتوى والإستطلاعات والدراسات البحثية واختبار التطبيقات والمواقع الإلكترونية والعديد من المهام الرقمية التي تتطلب عدد كبير من العمالة الرقمية\r\n                             \r\n                             \r\n             ', 'Arabic online platform that connects employers and workers from all over the Arab world to facilitate and manage work and communication between all parties Our system ensures employers that a paid assignment is a successfully performed task, while workers who successfully complete their assignment receive their earnings. Tasks assigned to workers and paid by employers are simple and fast, and are often completed within a few minutes, hence called \"digital precision tasks\". These tasks include data search, data classification, data description, AI software assistance, specific action on social networks for promotional campaigns, content evaluation, surveys, research studies, testing of applications and websites, and many other digital tasks that require a large number of digital labor.', NULL, NULL, NULL),
(4, '4اسياب ايفاف الحساب', 'Frequently Asked Questions4', '                                \r\n                                  \r\nمنصة عربية عبر الإنترنت تربط أصحاب العمل والعمال من جميع أنحاء العالم العربي لتقوم بتسهيل وإدارة العمل والتواصل بين جميع الأطراف\r\n\r\nيضمن نظامنا لأصحاب العمل أن المهمة المدفوعة هي مهمة تم إجراؤها بنجاح، بينما يحصل العمال الذين يكملون مهمتهم بنجاح على أرباحهم.\r\n\r\nالمهام الموكلة إلى العمال والتي يدفعها أصحاب العمل بسيطة وسريعة، ويتم إنجازها في الغالب في غضون دقائق قليلة، وبالتالي تسمى “المهام الرقمية الدقيقة”. وتشمل هذه المهام البحث عن البيانات ، تصنيف البيانات ، وصف للبيانات، مساعدة برامج الذكاء الإصطناعي، اجراء محدد على شبكات التواصل الإجتماعي للحملات الترويجية، تقييم المحتوى والإستطلاعات والدراسات البحثية واختبار التطبيقات والمواقع الإلكترونية والعديد من المهام الرقمية التي تتطلب عدد كبير من العمالة الرقمية\r\n                             \r\n                             \r\n             ', 'Arabic online platform that connects employers and workers from all over the Arab world to facilitate and manage work and communication between all parties Our system ensures employers that a paid assignment is a successfully performed task, while workers who successfully complete their assignment receive their earnings. Tasks assigned to workers and paid by employers are simple and fast, and are often completed within a few minutes, hence called \"digital precision tasks\". These tasks include data search, data classification, data description, AI software assistance, specific action on social networks for promotional campaigns, content evaluation, surveys, research studies, testing of applications and websites, and many other digital tasks that require a large number of digital labor.', NULL, NULL, NULL),
(5, '5اسياب ايفاف الحساب', 'Frequently Asked Questions5', '                                \r\n                                  \r\nمنصة عربية عبر الإنترنت تربط أصحاب العمل والعمال من جميع أنحاء العالم العربي لتقوم بتسهيل وإدارة العمل والتواصل بين جميع الأطراف\r\n\r\nيضمن نظامنا لأصحاب العمل أن المهمة المدفوعة هي مهمة تم إجراؤها بنجاح، بينما يحصل العمال الذين يكملون مهمتهم بنجاح على أرباحهم.\r\n\r\nالمهام الموكلة إلى العمال والتي يدفعها أصحاب العمل بسيطة وسريعة، ويتم إنجازها في الغالب في غضون دقائق قليلة، وبالتالي تسمى “المهام الرقمية الدقيقة”. وتشمل هذه المهام البحث عن البيانات ، تصنيف البيانات ، وصف للبيانات، مساعدة برامج الذكاء الإصطناعي، اجراء محدد على شبكات التواصل الإجتماعي للحملات الترويجية، تقييم المحتوى والإستطلاعات والدراسات البحثية واختبار التطبيقات والمواقع الإلكترونية والعديد من المهام الرقمية التي تتطلب عدد كبير من العمالة الرقمية\r\n                             \r\n                             \r\n             ', 'Arabic online platform that connects employers and workers from all over the Arab world to facilitate and manage work and communication between all parties Our system ensures employers that a paid assignment is a successfully performed task, while workers who successfully complete their assignment receive their earnings. Tasks assigned to workers and paid by employers are simple and fast, and are often completed within a few minutes, hence called \"digital precision tasks\". These tasks include data search, data classification, data description, AI software assistance, specific action on social networks for promotional campaigns, content evaluation, surveys, research studies, testing of applications and websites, and many other digital tasks that require a large number of digital labor.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `routes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'GeneralManager', 'all', NULL, '2023-12-10 04:42:04', '2023-12-10 04:42:04'),
(2, 'FinancialManager', 'home|changePassword|Pay', NULL, '2023-12-10 04:42:04', '2023-12-10 04:42:04'),
(3, 'TaskManager', 'tasks|createTask|RemoveTask', NULL, '2023-12-10 04:42:04', '2023-12-10 04:42:04'),
(4, 'SupportManager', 'support|addAnswer|RemoveAnswer|Tickets', NULL, '2023-12-10 04:42:04', '2023-12-10 04:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_site_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dashboard_site_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_withdraw_limit` double NOT NULL,
  `fees_per_transfer_wallet_balance` double NOT NULL,
  `fees_per_withdraw_wallet_using_paypal` double NOT NULL,
  `fees_per_charge_wallet_using_paypal` double NOT NULL,
  `days_added_to_task_end_date_when_reject_task_proof` int(11) NOT NULL,
  `pin_in_top_task_limit_count` int(11) NOT NULL,
  `exchange_rate_api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `home_site_logo`, `dashboard_site_logo`, `min_withdraw_limit`, `fees_per_transfer_wallet_balance`, `fees_per_withdraw_wallet_using_paypal`, `fees_per_charge_wallet_using_paypal`, `days_added_to_task_end_date_when_reject_task_proof`, `pin_in_top_task_limit_count`, `exchange_rate_api_key`, `created_at`, `updated_at`) VALUES
(1, '1667894613logo.png', 'dashboard-logo.png', 10, 0, 20, 2, 1, 2, 'e4f997454b94bf02994238be', '2023-12-10 04:42:08', '2023-12-10 23:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'unPayed', NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(2, 'pending', NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(3, 'active', NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(4, 'completed', NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(5, 'adminRefusalTask', NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `supported_currency_codes`
--

CREATE TABLE `supported_currency_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supported_currency_codes`
--

INSERT INTO `supported_currency_codes` (`id`, `currency_name`, `currency_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'United States Dollar', 'USD', NULL, '2023-12-10 04:42:05', '2023-12-10 04:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `support_sections`
--

CREATE TABLE `support_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_sections`
--

INSERT INTO `support_sections` (`id`, `icon`, `ar_name`, `en_name`, `en_description`, `ar_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'القسم المالي', 'Financial Department', 'In this section, you can communicate with the support team about all problems related to financial matters, such as withdrawals, deposits, payment of task costs, or receipt of them.', 'يمكنك في هذا القسم التواصل مع فريق الدعم بكل ما يخص المشاكل التي تتعلق بالأمور المالية من عمليات سحب وإيداع ودفع تكاليف المهام أو استلامها', NULL, '2023-12-10 04:42:20', '2023-12-10 04:42:20'),
(2, NULL, 'القسم الفني', 'Technical Section', 'In this section, you can contact the support team with everything related to technical problems related to your personal account on the platform, such as forgetting the password or e-mail, inquiring about the reason for stopping your activity, or requesting the lifting of the ban on the account and other technical matters.', 'يمكنك في هذا القسم التواصل مع فريق الدعم بكل ما يتعلق بالمشاكل الفنية الخاصة بحسابك الشخصي على المنصة كنسيان كلمة المرور أو البريد الإلكتروني أو الإستفسار عن سبب إيقاف نشاطك أو المطالبة برفع الحظر عن الحساب وباقي الأمور الفنية الأخرى', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21'),
(3, NULL, 'قسم المهام', 'Task section', 'In this section, you can communicate with the support team regarding all issues related to tasks, their creation, the mechanism for their implementation and display, or even to request the addition of another platform to implement tasks that are not present in the current platforms and the rest of the resources related to creating and executing tasks', 'في هذا القسم يمكنك التواصل مع فريق الدعم بكل ما يخص المشاكل المتعلقة بالمهام وإنشاؤها وآلية تنفيذها وعرضها، أو حتى لطلب إضافة منصة إخرى لتنفيذ المهام غير موجودة في المنصات الحالية وباقي الموارد المتعلقة بإنشاء المهام وتنفيذها', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21'),
(4, NULL, 'قسم الإدارة', 'Administrative section', 'Through this section, you can communicate directly with the administration to inform them of a special problem unless the support team can solve it. You can also provide us with a proposal or point of view that may help us develop our platform for the better, or you may like to raise an issue that may help you become our partner.', 'يمكنك عبر هذا القسم التواصل مع الإدارة بشكل مباشر لإطلاعهم على مشكلة خاصة ما لم يتمكن فريق الدعم من حلها، كما يمكنك تزودينا بمقترح أو وجهة نظر ما قد تسعدنا على تطوير منصتنا للأفضل، أو ربما أحببت طرح مسألة ما قد تساعدك في أن تصبح شريكاً لنا', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `proof_request_ques` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_request_screenShot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_worker_limit` int(11) NOT NULL,
  `approved_workers` int(11) NOT NULL DEFAULT 0,
  `cost_per_worker` double NOT NULL,
  `task_end_date` date NOT NULL,
  `special_access` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `only_professional` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `daily_limit` int(11) DEFAULT NULL,
  `task_cost` double NOT NULL,
  `other_cost` double NOT NULL,
  `total_cost` double NOT NULL,
  `publish_status` enum('NotPublished','Published') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_hidden` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_number`, `category_id`, `title`, `description`, `employer_id`, `proof_request_ques`, `proof_request_screenShot`, `total_worker_limit`, `approved_workers`, `cost_per_worker`, `task_end_date`, `special_access`, `only_professional`, `daily_limit`, `task_cost`, `other_cost`, `total_cost`, `publish_status`, `is_hidden`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'T-Y-M-S-RCH-RNUM1', 1, 'Task number 1', 'eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi crauris in. Interdum consectetur libero id faucibus nisl.', 18, 'Based on your input, get a random alpha numeric string. The random string generator creates a series of numbers ', 'nerate a 16 character output based on your input of numbers and upper and lower case letters.  Random strings can be unique. Used in computing, a random string generator can also be called a random character string generator. This is', 10, 0, 1, '2023-11-10', 'true', 'false', NULL, 10, 25, 35, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2024-01-16 12:15:56'),
(2, 'T-Y-M-S-RCH-RNUM2', 2, 'Task number 2', 'Loremidunt ut labore et dolore magna aliqua Gravida rutrum quisque non tellus orci ac auctor augue.', 18, 'mber of randomized strings are needed as they could be in stat', 'ossible applications for a random string generator co', 5, 0, 5, '2023-12-10', 'false', 'true', 3, 25, 40, 65, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2024-01-16 11:47:46'),
(3, 'T-Y-M-S-RCH-RNUM3', 3, 'Task number 3', 'Lorem ipsum domagna fermentum iaculis eu non diam. Gravida arcu cibus ornare.', 18, 'In statistical theory, randomization is an important principle with one possible application involving survey sampling.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et', 30, 0, 2.166666667, '2023-10-28', 'true', 'false', 4, 65, 76, 141, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(4, 'T-Y-M-S-RCH-RNUM4', 4, 'Task number 4', 'piscing elit, sed do eiusmodeo. Nisl rhoncus mattis  fac pretium.', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci ve', 90, 0, 1.5, '2023-05-05', 'true', 'true', 46, 135, 56, 191, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(5, 'T-Y-M-S-RCH-RNUM5', 5, 'Task number 5', 'lit, sedet dolore magna aliqua. Nec tempor id eu nisl nunc. andit libero volutpat sed.', 5, ' fermentum, augue at blandit d', ' vitae porttitor pretium. Maecenas id facilisis risu', 76, 0, 14.05, '2024-08-02', 'true', 'false', 14, 1102, 59, 1161, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(6, 'T-Y-M-S-RCH-RNUM6', 6, 'Task number 6', ' ut labore et dolore magna aliqua. Vel risus commods est pellentesque elit ullamcorper.', 6, 'rem, nec luctus mi vehicula et. Aenean non enim tortor. Nullam imperdiet qua', ' elit faucibus non. Aliquam era', 23, 0, 6.65, '2023-12-04', 'true', 'false', 12, 152.95, 87, 239.95, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(7, 'T-Y-M-S-RCH-RNUM7', 7, 'Task number 7', ' incididunt ut labore et dolore magna aliqua. Gravida dictum fusce ut plassim enim.', 7, 'cibus. Proin pulvinar efficitur aliquam. F', 'lis arcu. Proin non tempus sem. Nam molestie sapien sed e', 35, 0, 76.23, '2025-12-14', 'true', 'true', 32, 2668.05, 12.23, 2680.28, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(8, 'T-Y-M-S-RCH-RNUM8', 8, 'Task number 8', 'Lorepor incididunt ut labore et dolore magna aliqua. Elit pellentetus et.', 8, ' potenti. Donec id mi mi. Do', 'it, quis placerat erat placerat convallis. Sed elei', 88, 0, 76.67, '2024-12-11', 'false', 'true', 71, 6746.96, 6.35, 6753.31, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(9, 'T-Y-M-S-RCH-RNUM9', 9, 'Task number 9', 'Lorem ips magna aliqua. Dolor sit amet consectetur adipiscing elit duis tristique.', 9, '. Donec id mi mi. Do', ' dignissim tellus dignissim aliquet. Integer ', 60, 0, 5, '2026-08-06', 'false', 'true', 6, 300, 5, 305, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(10, 'T-Y-M-S-RCH-RNUM10', 10, 'Task number 10', 'Lorem ipsum dolor sit amet, cona aliqua.', 10, 'here is no one who loves pain itself, who seeks after it and', 'mply because it is pain..', 78, 0, 4.54, '2026-10-05', 'false', 'true', 32, 354.12, 453.43, 807.55, 'Published', 'false', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(11, 'T2401K15xf12', 1, 'asdsadadasdd', 'sadsadsadsa', 18, 'dsaaaaaaaaaaaaaa', 'sdsasaaaaaaaaaaaaaa', 3, 0, 0.78, '2024-02-02', 'true', 'true', 1, 1.17, 10.5, 11.67, 'Published', 'true', NULL, '2024-01-27 18:28:15', '2024-01-27 19:28:52'),
(12, 'T2401a02yY69', 1, 'Vel maiores atque te', 'Voluptatem error ven', 18, 'Voluptate cum ullamc', 'Consequatur In eos', 3, 0, 0.84, '2024-02-08', 'true', 'true', 1, 1.26, 10.5, 11.76, 'NotPublished', 'false', NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(13, 'T2401z56GD51', 1, 'Vel maiores atque te111111111', 'Voluptatem error ven1111111111111', 18, 'Voluptate cum ullamc', 'Consequatur In eos', 3, 0, 0.84, '2024-02-08', 'true', 'true', 1, 1.26, 10.5, 11.76, 'NotPublished', 'false', NULL, '2024-01-27 18:30:56', '2024-01-27 18:30:56'),
(14, 'T2401Q38hC69', 1, 'dsfdfdasfdsffdas', 'dsfdfdasfdsffdasdsfdfdasfdsffdasdsfdfdasfdsffdasdsfdfdasfdsffdas', 18, 'raeeeeeeeeeeeedsfdfdasfdsffdas', 'raeeeeeeeeeeeedsfdfdasfdsffdas', 1, 0, 0.83, '2024-02-01', 'false', 'true', 1, 0.415, 5, 5.415, 'Published', 'false', NULL, '2024-01-27 19:06:38', '2024-01-27 19:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `task_category_actions`
--

CREATE TABLE `task_category_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `category_action_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_category_actions`
--

INSERT INTO `task_category_actions` (`id`, `task_id`, `category_action_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(2, 1, 2, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(3, 1, 3, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(4, 2, 5, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(5, 2, 6, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(6, 3, 8, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(7, 3, 9, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(8, 4, 12, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(9, 5, 14, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(10, 5, 15, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(11, 6, 16, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(12, 7, 17, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(13, 7, 19, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(14, 8, 20, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(15, 8, 21, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(16, 8, 22, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(17, 8, 23, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(18, 9, 24, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(19, 9, 25, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(20, 10, 28, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(21, 10, 29, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(22, 10, 30, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(23, 10, 32, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(24, 11, 4, NULL, '2024-01-27 18:28:15', '2024-01-27 18:28:15'),
(25, 11, 3, NULL, '2024-01-27 18:28:15', '2024-01-27 18:28:15'),
(26, 11, 2, NULL, '2024-01-27 18:28:15', '2024-01-27 18:28:15'),
(27, 11, 1, NULL, '2024-01-27 18:28:16', '2024-01-27 18:28:16'),
(28, 12, 4, NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(29, 12, 3, NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(30, 12, 2, NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(31, 12, 1, NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(32, 13, 4, NULL, '2024-01-27 18:30:57', '2024-01-27 18:30:57'),
(33, 13, 3, NULL, '2024-01-27 18:30:57', '2024-01-27 18:30:57'),
(34, 13, 2, NULL, '2024-01-27 18:30:57', '2024-01-27 18:30:57'),
(35, 13, 1, NULL, '2024-01-27 18:30:57', '2024-01-27 18:30:57'),
(36, 14, 4, NULL, '2024-01-27 19:06:38', '2024-01-27 19:06:38'),
(37, 14, 3, NULL, '2024-01-27 19:06:38', '2024-01-27 19:06:38'),
(38, 14, 2, NULL, '2024-01-27 19:06:38', '2024-01-27 19:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `task_cities`
--

CREATE TABLE `task_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_cities`
--

INSERT INTO `task_cities` (`id`, `task_id`, `city_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(2, 1, 2, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(3, 1, 3, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(4, 2, 4, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(5, 2, 6, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(6, 3, 8, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(7, 4, 11, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(8, 5, 13, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(9, 5, 14, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(10, 6, 16, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(11, 6, 17, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(12, 7, 19, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(13, 7, 20, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(14, 7, 21, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(15, 8, 22, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(16, 8, 23, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(17, 8, 24, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(18, 9, 25, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(19, 10, 29, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(20, 10, 30, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(21, 10, 31, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(22, 11, 7, NULL, '2024-01-27 18:28:16', '2024-01-27 18:28:16'),
(23, 12, 29, NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(24, 13, 29, NULL, '2024-01-27 18:30:57', '2024-01-27 18:30:57'),
(25, 14, 7, NULL, '2024-01-27 19:06:39', '2024-01-27 19:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `task_countries`
--

CREATE TABLE `task_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_countries`
--

INSERT INTO `task_countries` (`id`, `task_id`, `country_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(2, 2, 2, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(3, 3, 3, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(4, 4, 4, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(5, 5, 5, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(6, 6, 6, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(7, 7, 7, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(8, 8, 8, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(9, 9, 9, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(10, 10, 10, NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(11, 11, 3, NULL, '2024-01-27 18:28:15', '2024-01-27 18:28:15'),
(12, 12, 10, NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(13, 13, 10, NULL, '2024-01-27 18:30:56', '2024-01-27 18:30:56'),
(14, 14, 3, NULL, '2024-01-27 19:06:38', '2024-01-27 19:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `task_proofs`
--

CREATE TABLE `task_proofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `answer_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isEmployerAcceptProof` enum('NotSeenYet','No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NotSeenYet',
  `isAdminAcceptProof` enum('NotSeenYet','No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NotSeenYet',
  `reasonOfEmployerRefuse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reasonOfAdminRefuse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_proof_screen_shots`
--

CREATE TABLE `task_proof_screen_shots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_proof_id` bigint(20) UNSIGNED NOT NULL,
  `screenshot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `task_status_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `task_id`, `task_status_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '2023-01-05 02:13:00', '2023-01-05 02:13:00'),
(2, 11, 3, NULL, '2023-01-05 02:15:08', '2023-01-05 02:15:08'),
(3, 2, 2, NULL, '2023-01-05 02:16:08', '2023-01-05 02:16:08'),
(4, 12, 3, NULL, '2023-01-05 02:18:08', '2023-01-05 02:18:08'),
(5, 3, 2, NULL, '2023-01-05 02:20:08', '2023-01-05 02:20:08'),
(6, 13, 3, NULL, '2023-01-05 02:26:08', '2023-01-05 02:26:08'),
(7, 4, 2, NULL, '2023-01-05 02:44:08', '2023-01-05 02:44:08'),
(8, 5, 2, NULL, '2023-01-05 02:55:08', '2023-01-05 02:55:08'),
(9, 5, 3, NULL, '2023-01-05 02:56:08', '2023-01-05 02:56:08'),
(10, 6, 2, NULL, '2023-01-05 02:39:08', '2023-01-05 02:39:08'),
(11, 7, 2, NULL, '2023-01-05 06:16:08', '2023-01-05 06:16:08'),
(12, 8, 2, NULL, '2023-01-05 08:13:08', '2023-01-05 08:13:08'),
(13, 9, 2, NULL, '2023-01-05 09:13:08', '2023-01-05 09:13:08'),
(14, 9, 3, NULL, '2023-01-05 09:50:08', '2023-01-05 09:50:08'),
(15, 10, 2, NULL, '2023-01-05 10:10:08', '2023-01-05 10:10:08'),
(16, 10, 3, NULL, '2023-01-05 10:20:08', '2023-01-05 10:20:08'),
(17, 1, 2, NULL, '2024-01-16 12:15:56', '2024-01-16 12:15:56'),
(18, 14, 3, NULL, '2024-01-27 19:06:39', '2024-01-27 19:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `task_workers`
--

CREATE TABLE `task_workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `is_proof_uploaded` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_work_flows`
--

CREATE TABLE `task_work_flows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `work_flow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_work_flows`
--

INSERT INTO `task_work_flows` (`id`, `task_id`, `work_flow`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'this first work flow', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(2, 1, 'this second work flow', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(3, 2, 'm ipsum dolor sit amet, no dicant partem verear eum, utinam doming ex eum. Ad ius ceteros fierent luptatum, est idque propriae appellantur at. Id mazi', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(4, 2, ' postulant. Ut rebum meliore ius. Mea munere delicata repudiandae no, in facete iisque invenire sed.', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(5, 3, ', elit aeque omnes mea te, at vix periculis pers', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(6, 3, 'amet, no dicant partem verear eum, utinam doming ex eum. Ad ius ceteros fierent luptatum, est idque propriae appellantur at. Id ma', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(7, 3, ' sed, te pri saepe prompta. Esse ', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(8, 4, 'r eum, utinam doming', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(9, 4, 'ix periculis persequeris consequuntur.No decore fabulas temporibus sed, te pri saepe prompta. Esse sadipscing consequuntur usu at, ubique dissentiunt ei eam. At sea illum laudem accus', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(10, 4, 'olum graeco eu cum. Cu ', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(11, 5, 'ent nonsensical; its not genuine, correct, or comprehensible Latin anymore. While lorem ipsums still resembles classical Latin, it actually has no meaning whatsoever. As Ciceros text do', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(12, 5, 'layout, and printing in place of English to emphasise design elements over content. Its also called placeholder (or filler) text. Its a convenient tool for mock-ups. It helps to outline the visual elements of a docum', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(13, 5, 'explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut ', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(14, 6, ' explain to you how all this mistaken ide', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(15, 6, 's, dislikes, or avoids', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(16, 6, 'The Latin scholar H. Rackham translated the above in 1914:', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(17, 7, 'simple and easy to distinguish. In a free h', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(18, 7, 'm most common today. L', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(19, 7, 'n in lettering catalogs by ', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(20, 8, 'us PageMaker for Apple Macintosh com', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(21, 8, 'every pain avoided. But in certain circumstances a', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(22, 8, 'hich is intended to a', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(23, 9, ' on your face to impress the new boss is y', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(24, 9, 'Consider this: You made all the required mock ups for commissioned layout, got all the approvals, built a tested code base or had them built, you decided on a content mana', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(25, 9, 'not so bad, theres dummy copy to the rescue. But', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(26, 10, 'y required. Its content strategy gone awry right from the s', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(27, 10, 'unning it out of town in shame.', NULL, '2023-12-10 04:42:16', '2023-12-10 04:42:16'),
(28, 11, 'sadsadsadsadsada', NULL, '2024-01-27 18:28:16', '2024-01-27 18:28:16'),
(29, 12, 'Dolore in dolore vol', NULL, '2024-01-27 18:30:02', '2024-01-27 18:30:02'),
(30, 13, 'Dolore in dolore vol1111111111', NULL, '2024-01-27 18:30:57', '2024-01-27 18:30:57'),
(31, 14, 'dsfdfdasfdsffdasdsfdfdasfdsffdasdsfdfdasfdsffdas', NULL, '2024-01-27 19:06:39', '2024-01-27 19:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_employer_tokens`
--

CREATE TABLE `temporary_employer_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_worker_tokens`
--

CREATE TABLE `temporary_worker_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_worker_tokens`
--

INSERT INTO `temporary_worker_tokens` (`id`, `worker_id`, `token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'w3JtVa8PO1jZabfJiHskIThHfQeaSLoecVGij359OiuNi9nGCdWzSXZyInn0Nuy5', NULL, '2023-12-10 23:59:55', '2023-12-10 23:59:55'),
(2, 3, 'RO1WlsGo5vqoIHzpykwffcygmcQUgj4axBH57ba3MLoW0zK9gm0yrBkigNJyLH3s', NULL, '2023-12-11 00:00:18', '2023-12-11 00:00:18'),
(3, 3, 'i1fkhlkjDMKA93B0ODTV068ucQCFLtIFXG9zMeAdHaRqyCKrWarP9vXX0EDRkQCd', NULL, '2023-12-11 00:03:13', '2023-12-11 00:03:13'),
(4, 3, 's9p12AW3XLZrcH5rV0hsBHI2f4HvnSOcLF7PdHPgiTO7cntpICa2lBVmE21wT4VZ', NULL, '2023-12-11 00:03:51', '2023-12-11 00:03:51'),
(5, 3, 'yz9J8mSyda3d3yQE7mfsp5jJE8S3jpOMAC9OTlxG6jzkODo27iCwYnh3fQt0SJkG', NULL, '2023-12-11 00:05:54', '2023-12-11 00:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `temp_google_accounts`
--

CREATE TABLE `temp_google_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_google_accounts`
--

INSERT INTO `temp_google_accounts` (`id`, `name`, `email`, `avatar`, `google_id`, `facebook_id`, `apple_id`, `email_verified_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Mohamed Gamal', 'emarketbank@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJxQjVpknrwzvlk_bJctR7Ke-LXyphAFwYDbPuMkdOFNoE=s96-c', '106893474770100858643', NULL, NULL, '2023-12-11 14:06:28', NULL, '2023-12-11 14:06:29', '2023-12-11 14:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`id`, `name`, `icon`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 'tag', 'warning', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21'),
(2, 'UnderVerification', 'ui-04', 'primary', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21'),
(3, 'AdminAnswered', 'chat-round', 'info', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21'),
(4, 'EmployerAnswered', 'chat-round', 'dark', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21'),
(5, 'WorkerAnswered', 'chat-round', 'dark', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21'),
(6, 'Done', 'check-bold', 'success', NULL, '2023-12-10 04:42:21', '2023-12-10 04:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facbook_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worker_level_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `suspend_days` int(11) NOT NULL DEFAULT 0,
  `suspend_start_date` date DEFAULT NULL,
  `wallet_balance` double NOT NULL DEFAULT 0,
  `total_earns` double NOT NULL DEFAULT 0,
  `paypal_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `worker_number`, `name`, `email`, `avatar`, `email_verified_at`, `mobile_verified_at`, `google_id`, `apple_id`, `facbook_id`, `password`, `country_id`, `city_id`, `phone`, `worker_level_id`, `gender`, `description`, `address`, `zip_code`, `status`, `suspend_days`, `suspend_start_date`, `wallet_balance`, `total_earns`, `paypal_account`, `current_currency`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'W-Y-M-S-RCH-RNUM1', 'Karam Awad', 'Karam@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$KPU2EgHp/vyLP6uNXNs5AO9nV1DQ/6bKfh5k1kQsX/pcLd91pUjwW', 1, 1, '00989644990039', 1, 'male', 'Hi, my name is Karam', 'Qzavin, Norozian Street', '4621', 'enable', 0, NULL, 0, 0, 'Karam@pay.com', 'USD', NULL, NULL, '2023-12-10 04:42:13', '2023-12-10 04:42:13'),
(2, 'W-Y-M-S-RCH-RNUM2', 'majed alkhair', 'majed@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$4vurSZh4S78GtNrNVw74x.ftMyxnFPxu2ZD9MEs8a8sjnPVthZgdK', 2, 6, '0097402115225512', 2, 'male', 'Hi, my name is Majed', 'Qatar, Daoha', '414', 'enable', 0, NULL, 0, 0, 'majed@pay.com', 'USD', NULL, NULL, '2023-12-10 04:42:13', '2023-12-10 04:42:13'),
(3, 'W2312539vi49', 'Mahmoud', 'mahmoudalaa925@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YTysrGeXRVDX4bqLj3k9J.ZohvflzBD6QZTHCZ82eBtnHLAd3fToW', 11, 32, '0097433089070', 1, 'male', 'Mmm', 'الدوحة', '0000', 'enable', 0, NULL, 0, 0, 'Mahmoud fatouh', 'USD', NULL, NULL, '2023-12-10 23:39:39', '2023-12-10 23:57:41'),
(4, 'W2312303pP17', 'Mohamed Gamal abdel hamed', 'arabworkerseg@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJwMwNtisEMZBlshBCh8BvM2--CObjjQY1oMrocp8fMJw=s96-c', '2023-12-11 13:55:50', NULL, '106446906177393970869', NULL, NULL, '$2y$10$iOro6Djn5ArfGPq1snRnYOj48ODORbGzlj6YrSVL3bs8Hjl5CJvim', 3, 7, '00201066478278', 1, 'male', 'arabworkerseg@gmail.com', '146 madent elmostaqbal', '31111', 'enable', 0, NULL, 0, 0, 'MohammadZam@arabWorkers.com', 'EGP', NULL, NULL, '2023-12-11 14:14:03', '2023-12-18 22:46:46'),
(5, 'W2312T23V662', 'Mostafa Adel', 'deshadesha46@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJsaCCS0Sy3byzSuX2_FDCdeX0KYPeJxTk4nvlLQwTxByyu=s96-c', '2023-12-19 21:39:07', NULL, '102645900047005426318', NULL, NULL, '$2y$10$xAi8nQU.o4.sQGhvmXNPheqV08YbFe7l6o8UbrI8nwtHAo.JuUcfy', 3, 7, '00201116906224', 1, 'male', 'مهندس', 'قاهرة', 'deshadesha46@gmail.com', 'enable', 0, NULL, 0, 0, '00201116906224', 'USD', NULL, NULL, '2023-12-19 21:39:23', '2023-12-21 20:17:51'),
(6, 'W2401J479J96', 'Benedict Bright', 'sucex213213ASys@mailinator.com', NULL, '2023-12-19 21:39:07', NULL, NULL, NULL, NULL, '$2y$10$LSzyV.3o6F7DWKy5HQ06M.G274M5sbm59ZoBBTtbQAEM3Jktmd1V.', 5, 12, '0096721312', 1, 'male', NULL, NULL, NULL, 'enable', 0, NULL, 0, 0, NULL, 'USD', NULL, NULL, '2024-01-01 21:30:47', '2024-01-01 21:30:47'),
(7, 'W2401G52Ij16', 'asmaa karam abozied', 'cubex456ASDASyhi@mailinator.com', NULL, '2023-12-19 21:39:07', NULL, NULL, NULL, NULL, '$2y$10$T4e2MsF/Cgt98g1SWINmQOhrr4kbIcxgqBaratyeS0Z33gfSEdEN.', 8, 23, '0021666', 1, 'female', 'cubex456ASDASyhi@mailinator.com', 'cairo', '+2878', 'enable', 0, NULL, 0, 0, 'cubex456ASDASyhi@mailinator.com', 'USD', NULL, NULL, '2024-01-01 22:15:52', '2024-01-01 22:22:58'),
(8, 'W2401510HG59', 'Demetria Neal', 'jymi@mailinator.comASq1232', NULL, '2023-12-19 21:39:07', NULL, NULL, NULL, NULL, '$2y$10$TJF1A0h61jZMjWfVgGmqLOj1rSz.3kLPTyY7BunArXiVapAaaDJNS', 3, 7, '00200100213213', 1, 'male', '1212', 'wqewew', '12', 'enable', 0, NULL, 0, 0, 'cubex456ASDASyhi@mailinator.com', 'USD', NULL, NULL, '2024-01-12 18:12:10', '2024-01-12 18:12:10'),
(9, 'W2401F10Pi14', 'sdsfd', 'mololecab234ASe@mailinator.com', NULL, '2024-01-01 18:52:51', NULL, NULL, NULL, NULL, '$2y$10$TXWykoknzVpJi376HwbR9eSWaFBIzZXVLCE13l3MJy9FI6oCwB7G.', 3, 7, '010907665530020', 1, 'male', 'werwererer', '12121', '1212', 'enable', 0, NULL, 0, 0, 'cubex456ASDASyhi@mailinator.com', 'USD', NULL, NULL, '2024-01-12 20:05:10', '2024-01-12 20:05:10'),
(10, '', 'aaa44444aaaaaaaaa55', 'admin@admin.comA123', NULL, '2024-01-01 12:34:02', NULL, NULL, NULL, NULL, '$2y$10$l8gFz26aLB1DcdH15ilrvO4puvrVrxAuUMhLZd5w7R4gyHo1ILVj.', 3, 7, '0020001090766553', 1, 'male', 'ewererewr', 'cairo', '1234', 'enable', 0, NULL, 40, 40, 'cubex456ASDASyhi@mailinator.com', 'USD', NULL, NULL, NULL, '2024-01-14 15:11:22'),
(11, 'W2401x19O643', 'a666ssaaaaaaaaaaaaa1115599', 'zymivimit@mailinatorqASS1.com1', NULL, '2024-01-01 13:36:47', NULL, NULL, NULL, NULL, '$2y$10$jB4OCBZ.SWjBNb/Ze8dANOXpcNaNsuR0Ixc62C.uC.PmnIrKDlBQa', 3, 7, '002012232321312', 1, 'female', 'dsftrttretsr111222556699', 'cairo111222556999', '6544111225569', 'enable', 0, NULL, 0, 0, 'cubex456ASDASyhi@mailinator.com', 'USD', NULL, NULL, '2024-01-16 15:06:19', '2024-01-19 12:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `worker_levels`
--

CREATE TABLE `worker_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_approved_proof` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_levels`
--

INSERT INTO `worker_levels` (`id`, `name`, `minimum_approved_proof`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'New', 0, NULL, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(2, 'Bronze', 30, NULL, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(3, 'Silver', 50, NULL, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08'),
(4, 'Golden', 70, NULL, NULL, '2023-12-10 04:42:08', '2023-12-10 04:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `worker_paypal_transactions`
--

CREATE TABLE `worker_paypal_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `payout_batch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_batch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_requested` double NOT NULL,
  `amount_payed` double NOT NULL,
  `paypal_fees` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker_privileges`
--

CREATE TABLE `worker_privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `count_of_privileges` int(11) NOT NULL,
  `type` enum('plus','minus') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_privileges`
--

INSERT INTO `worker_privileges` (`id`, `worker_id`, `count_of_privileges`, `type`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2023-12-10 23:39:39', '2023-12-10 23:39:39'),
(2, 5, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2023-12-19 21:39:23', '2023-12-19 21:39:23'),
(3, 6, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2024-01-01 21:30:47', '2024-01-01 21:30:47'),
(4, 7, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2024-01-01 22:15:52', '2024-01-01 22:15:52'),
(5, 8, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2024-01-12 18:12:10', '2024-01-12 18:12:10'),
(6, 9, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2024-01-12 20:05:10', '2024-01-12 20:05:10'),
(7, 11, 10, 'plus', 'SingUp To ArabWorkers', NULL, '2024-01-16 15:06:20', '2024-01-16 15:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `worker_tickets`
--

CREATE TABLE `worker_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `support_section_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_tickets`
--

INSERT INTO `worker_tickets` (`id`, `ticket_number`, `worker_id`, `support_section_id`, `subject`, `description`, `attached_files`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'WTik2401X052o75', 10, 1, 'aaaaaaaaaaaaaaaaa', 'sasasdaadwqwqeewqeewqwe', 'Ticket/WorkerFiles/vAOxg7t0TplncL5WXQ0ynIYWAbHF8aJ7Ctc1ziMY.jpg', NULL, '2024-01-16 14:13:05', '2024-01-16 14:13:05'),
(2, 'WTik2401H37v818', 11, 2, '3432fsdfdsfdsfdsfffsdfd', 'dsffsfsdfdsfsfdsdfsdfsdfsddfsdfsfdsfdsfdsfds', NULL, NULL, '2024-01-18 15:20:37', '2024-01-18 15:20:37'),
(3, 'WTik2401O01nE36', 10, 2, 'qdfdsdfdsfsfwqwqwqwfsdfsfdsfd', 'sdassfdsfdsfdsdfsdasafdsfafdsfdsfadsfd', 'Ticket/WorkerFiles/NgR8RKdTMgY2fJvYvKxZbQXTuvS05hpMeNzKwVHJ.jpg', NULL, '2024-01-19 16:30:01', '2024-01-19 16:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `worker_ticket_answers`
--

CREATE TABLE `worker_ticket_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_attached_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_answered_at` timestamp NULL DEFAULT NULL,
  `worker_answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worker_attached_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worker_answered_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker_ticket_statuses`
--

CREATE TABLE `worker_ticket_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_status_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_ticket_statuses`
--

INSERT INTO `worker_ticket_statuses` (`id`, `worker_ticket_id`, `ticket_status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2024-01-16 14:13:05', '2024-01-16 14:13:05'),
(2, 2, 1, NULL, '2024-01-18 15:20:38', '2024-01-18 15:20:38'),
(3, 3, 1, NULL, '2024-01-19 16:30:02', '2024-01-19 16:30:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_switch_operations`
--
ALTER TABLE `account_switch_operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_switch_operations_employer_id_foreign` (`employer_id`),
  ADD KEY `account_switch_operations_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_administrative_number_unique` (`administrative_number`),
  ADD KEY `admins_role_id_foreign` (`role_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_actions`
--
ALTER TABLE `category_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_actions_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_unique` (`name`),
  ADD UNIQUE KEY `cities_ar_name_unique` (`ar_name`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`),
  ADD UNIQUE KEY `countries_ar_name_unique` (`ar_name`),
  ADD UNIQUE KEY `countries_calling_code_unique` (`calling_code`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deferred_tasks`
--
ALTER TABLE `deferred_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deferred_tasks_task_id_foreign` (`task_id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_codes_code_unique` (`code`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_employer_number_unique` (`employer_number`),
  ADD UNIQUE KEY `employers_email_unique` (`email`),
  ADD UNIQUE KEY `employers_phone_unique` (`phone`),
  ADD KEY `employers_country_id_foreign` (`country_id`),
  ADD KEY `employers_city_id_foreign` (`city_id`),
  ADD KEY `employers_employer_level_id_foreign` (`employer_level_id`);

--
-- Indexes for table `employer_levels`
--
ALTER TABLE `employer_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_privileges`
--
ALTER TABLE `employer_privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_privileges_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `employer_task_discount_codes`
--
ALTER TABLE `employer_task_discount_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_task_discount_codes_employer_id_foreign` (`employer_id`),
  ADD KEY `employer_task_discount_codes_task_id_foreign` (`task_id`),
  ADD KEY `employer_task_discount_codes_discount_code_id_foreign` (`discount_code_id`);

--
-- Indexes for table `employer_tickets`
--
ALTER TABLE `employer_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_tickets_employer_id_foreign` (`employer_id`),
  ADD KEY `employer_tickets_support_section_id_foreign` (`support_section_id`);

--
-- Indexes for table `employer_ticket_answers`
--
ALTER TABLE `employer_ticket_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_ticket_answers_employer_ticket_id_foreign` (`employer_ticket_id`),
  ADD KEY `employer_ticket_answers_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `employer_ticket_statuses`
--
ALTER TABLE `employer_ticket_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_ticket_statuses_employer_ticket_id_foreign` (`employer_ticket_id`),
  ADD KEY `employer_ticket_statuses_ticket_status_id_foreign` (`ticket_status_id`);

--
-- Indexes for table `employer_transactions`
--
ALTER TABLE `employer_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_transactions_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `privileges_title_unique` (`title`),
  ADD UNIQUE KEY `privileges_code_unique` (`code`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supported_currency_codes`
--
ALTER TABLE `supported_currency_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_sections`
--
ALTER TABLE `support_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tasks_task_number_unique` (`task_number`),
  ADD KEY `tasks_category_id_foreign` (`category_id`),
  ADD KEY `tasks_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `task_category_actions`
--
ALTER TABLE `task_category_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_category_actions_task_id_foreign` (`task_id`),
  ADD KEY `task_category_actions_category_action_id_foreign` (`category_action_id`);

--
-- Indexes for table `task_cities`
--
ALTER TABLE `task_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_cities_task_id_foreign` (`task_id`),
  ADD KEY `task_cities_city_id_foreign` (`city_id`);

--
-- Indexes for table `task_countries`
--
ALTER TABLE `task_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_countries_task_id_foreign` (`task_id`),
  ADD KEY `task_countries_country_id_foreign` (`country_id`);

--
-- Indexes for table `task_proofs`
--
ALTER TABLE `task_proofs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_proofs_task_id_foreign` (`task_id`),
  ADD KEY `task_proofs_worker_id_foreign` (`worker_id`),
  ADD KEY `task_proofs_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `task_proof_screen_shots`
--
ALTER TABLE `task_proof_screen_shots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_proof_screen_shots_task_proof_id_foreign` (`task_proof_id`);

--
-- Indexes for table `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_statuses_task_id_foreign` (`task_id`),
  ADD KEY `task_statuses_task_status_id_foreign` (`task_status_id`);

--
-- Indexes for table `task_workers`
--
ALTER TABLE `task_workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_workers_task_id_foreign` (`task_id`),
  ADD KEY `task_workers_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `task_work_flows`
--
ALTER TABLE `task_work_flows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_work_flows_task_id_foreign` (`task_id`);

--
-- Indexes for table `temporary_employer_tokens`
--
ALTER TABLE `temporary_employer_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temporary_employer_tokens_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `temporary_worker_tokens`
--
ALTER TABLE `temporary_worker_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temporary_worker_tokens_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `temp_google_accounts`
--
ALTER TABLE `temp_google_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workers_worker_number_unique` (`worker_number`),
  ADD UNIQUE KEY `workers_email_unique` (`email`),
  ADD UNIQUE KEY `workers_phone_unique` (`phone`),
  ADD KEY `workers_country_id_foreign` (`country_id`),
  ADD KEY `workers_city_id_foreign` (`city_id`),
  ADD KEY `workers_worker_level_id_foreign` (`worker_level_id`);

--
-- Indexes for table `worker_levels`
--
ALTER TABLE `worker_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_paypal_transactions`
--
ALTER TABLE `worker_paypal_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_paypal_transactions_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `worker_privileges`
--
ALTER TABLE `worker_privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_privileges_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `worker_tickets`
--
ALTER TABLE `worker_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_tickets_worker_id_foreign` (`worker_id`),
  ADD KEY `worker_tickets_support_section_id_foreign` (`support_section_id`);

--
-- Indexes for table `worker_ticket_answers`
--
ALTER TABLE `worker_ticket_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_ticket_answers_worker_ticket_id_foreign` (`worker_ticket_id`),
  ADD KEY `worker_ticket_answers_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `worker_ticket_statuses`
--
ALTER TABLE `worker_ticket_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_ticket_statuses_worker_ticket_id_foreign` (`worker_ticket_id`),
  ADD KEY `worker_ticket_statuses_ticket_status_id_foreign` (`ticket_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_switch_operations`
--
ALTER TABLE `account_switch_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_actions`
--
ALTER TABLE `category_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deferred_tasks`
--
ALTER TABLE `deferred_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employer_levels`
--
ALTER TABLE `employer_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employer_privileges`
--
ALTER TABLE `employer_privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employer_task_discount_codes`
--
ALTER TABLE `employer_task_discount_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employer_tickets`
--
ALTER TABLE `employer_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employer_ticket_answers`
--
ALTER TABLE `employer_ticket_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_ticket_statuses`
--
ALTER TABLE `employer_ticket_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employer_transactions`
--
ALTER TABLE `employer_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supported_currency_codes`
--
ALTER TABLE `supported_currency_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support_sections`
--
ALTER TABLE `support_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task_category_actions`
--
ALTER TABLE `task_category_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `task_cities`
--
ALTER TABLE `task_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `task_countries`
--
ALTER TABLE `task_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task_proofs`
--
ALTER TABLE `task_proofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_proof_screen_shots`
--
ALTER TABLE `task_proof_screen_shots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `task_workers`
--
ALTER TABLE `task_workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_work_flows`
--
ALTER TABLE `task_work_flows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `temporary_employer_tokens`
--
ALTER TABLE `temporary_employer_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temporary_worker_tokens`
--
ALTER TABLE `temporary_worker_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `temp_google_accounts`
--
ALTER TABLE `temp_google_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `worker_levels`
--
ALTER TABLE `worker_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `worker_paypal_transactions`
--
ALTER TABLE `worker_paypal_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worker_privileges`
--
ALTER TABLE `worker_privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `worker_tickets`
--
ALTER TABLE `worker_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `worker_ticket_answers`
--
ALTER TABLE `worker_ticket_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worker_ticket_statuses`
--
ALTER TABLE `worker_ticket_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_switch_operations`
--
ALTER TABLE `account_switch_operations`
  ADD CONSTRAINT `account_switch_operations_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `account_switch_operations_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `category_actions`
--
ALTER TABLE `category_actions`
  ADD CONSTRAINT `category_actions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `deferred_tasks`
--
ALTER TABLE `deferred_tasks`
  ADD CONSTRAINT `deferred_tasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `employers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `employers_employer_level_id_foreign` FOREIGN KEY (`employer_level_id`) REFERENCES `employer_levels` (`id`);

--
-- Constraints for table `employer_privileges`
--
ALTER TABLE `employer_privileges`
  ADD CONSTRAINT `employer_privileges_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);

--
-- Constraints for table `employer_task_discount_codes`
--
ALTER TABLE `employer_task_discount_codes`
  ADD CONSTRAINT `employer_task_discount_codes_discount_code_id_foreign` FOREIGN KEY (`discount_code_id`) REFERENCES `discount_codes` (`id`),
  ADD CONSTRAINT `employer_task_discount_codes_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `employer_task_discount_codes_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `employer_tickets`
--
ALTER TABLE `employer_tickets`
  ADD CONSTRAINT `employer_tickets_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `employer_tickets_support_section_id_foreign` FOREIGN KEY (`support_section_id`) REFERENCES `support_sections` (`id`);

--
-- Constraints for table `employer_ticket_answers`
--
ALTER TABLE `employer_ticket_answers`
  ADD CONSTRAINT `employer_ticket_answers_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `employer_ticket_answers_employer_ticket_id_foreign` FOREIGN KEY (`employer_ticket_id`) REFERENCES `employer_tickets` (`id`);

--
-- Constraints for table `employer_ticket_statuses`
--
ALTER TABLE `employer_ticket_statuses`
  ADD CONSTRAINT `employer_ticket_statuses_employer_ticket_id_foreign` FOREIGN KEY (`employer_ticket_id`) REFERENCES `employer_tickets` (`id`),
  ADD CONSTRAINT `employer_ticket_statuses_ticket_status_id_foreign` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_statuses` (`id`);

--
-- Constraints for table `employer_transactions`
--
ALTER TABLE `employer_transactions`
  ADD CONSTRAINT `employer_transactions_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `tasks_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);

--
-- Constraints for table `task_category_actions`
--
ALTER TABLE `task_category_actions`
  ADD CONSTRAINT `task_category_actions_category_action_id_foreign` FOREIGN KEY (`category_action_id`) REFERENCES `category_actions` (`id`),
  ADD CONSTRAINT `task_category_actions_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `task_cities`
--
ALTER TABLE `task_cities`
  ADD CONSTRAINT `task_cities_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `task_cities_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `task_countries`
--
ALTER TABLE `task_countries`
  ADD CONSTRAINT `task_countries_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `task_countries_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `task_proofs`
--
ALTER TABLE `task_proofs`
  ADD CONSTRAINT `task_proofs_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`),
  ADD CONSTRAINT `task_proofs_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_proofs_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- Constraints for table `task_proof_screen_shots`
--
ALTER TABLE `task_proof_screen_shots`
  ADD CONSTRAINT `task_proof_screen_shots_task_proof_id_foreign` FOREIGN KEY (`task_proof_id`) REFERENCES `task_proofs` (`id`);

--
-- Constraints for table `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD CONSTRAINT `task_statuses_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_statuses_task_status_id_foreign` FOREIGN KEY (`task_status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `task_workers`
--
ALTER TABLE `task_workers`
  ADD CONSTRAINT `task_workers_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_workers_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- Constraints for table `task_work_flows`
--
ALTER TABLE `task_work_flows`
  ADD CONSTRAINT `task_work_flows_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `temporary_employer_tokens`
--
ALTER TABLE `temporary_employer_tokens`
  ADD CONSTRAINT `temporary_employer_tokens_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);

--
-- Constraints for table `temporary_worker_tokens`
--
ALTER TABLE `temporary_worker_tokens`
  ADD CONSTRAINT `temporary_worker_tokens_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `workers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `workers_worker_level_id_foreign` FOREIGN KEY (`worker_level_id`) REFERENCES `worker_levels` (`id`);

--
-- Constraints for table `worker_paypal_transactions`
--
ALTER TABLE `worker_paypal_transactions`
  ADD CONSTRAINT `worker_paypal_transactions_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- Constraints for table `worker_privileges`
--
ALTER TABLE `worker_privileges`
  ADD CONSTRAINT `worker_privileges_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- Constraints for table `worker_tickets`
--
ALTER TABLE `worker_tickets`
  ADD CONSTRAINT `worker_tickets_support_section_id_foreign` FOREIGN KEY (`support_section_id`) REFERENCES `support_sections` (`id`),
  ADD CONSTRAINT `worker_tickets_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- Constraints for table `worker_ticket_answers`
--
ALTER TABLE `worker_ticket_answers`
  ADD CONSTRAINT `worker_ticket_answers_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `worker_ticket_answers_worker_ticket_id_foreign` FOREIGN KEY (`worker_ticket_id`) REFERENCES `worker_tickets` (`id`);

--
-- Constraints for table `worker_ticket_statuses`
--
ALTER TABLE `worker_ticket_statuses`
  ADD CONSTRAINT `worker_ticket_statuses_ticket_status_id_foreign` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_statuses` (`id`),
  ADD CONSTRAINT `worker_ticket_statuses_worker_ticket_id_foreign` FOREIGN KEY (`worker_ticket_id`) REFERENCES `worker_tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
