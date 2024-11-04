-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 08:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `express_engineers_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(10, 'backend/images/banner/66bc9ae68c96f.jpg', '1', '2024-08-14 05:54:14', NULL),
(11, 'backend/images/banner/66bcb0b36bab2.jpg', '1', '2024-08-14 07:27:15', NULL),
(12, 'backend/images/banner/66bcb0c137552.jpg', '1', '2024-08-14 07:27:29', NULL),
(13, 'backend/images/banner/66bcb0cc891c7.jpg', '1', '2024-08-14 07:27:40', NULL),
(14, 'backend/images/banner/66bcb0d660126.jpg', '1', '2024-08-14 07:27:50', NULL),
(15, 'backend/images/banner/66e966f3513c6.jpg', '0', '2024-08-15 02:48:52', '2024-09-17 05:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `constructions`
--

CREATE TABLE `constructions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constructions`
--

INSERT INTO `constructions` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Eligendi omnis sunt veritatis.', 'Fuga in dolorum et iste et culpa. Commodi possimus nesciunt modi voluptatem placeat deleniti adipisci. Cum delectus doloribus non veritatis. Officia temporibus illo magnam. Dolor eos et.', 'backend/images/construction/671b51957d69b.jpg', '1', '2024-10-25 02:06:45', NULL),
(4, 'Possimus ut sed velit assumenda', 'Sunt deserunt maiores voluptatem autem est rerum perferendis rerum blanditiis. Est laboriosam qui iste numquam laboriosam voluptatem architecto. Est laudantium sunt at quas aut hic. Eum dignissimos.', 'backend/images/construction/671b51d4969fc.jpg', '1', '2024-10-25 02:07:48', NULL),
(5, 'Expedita voluptas ut ut nesciunt', 'Aut est quidem doloremque voluptatem magnam quis excepturi vero quia. Eum eos doloremque architecto illo at beatae dolore. Fugiat suscipit et sint ratione dolores. Aut aliquid ea dolores libero nobis.', 'backend/images/construction/671b51f62a995.jpg', '1', '2024-10-25 02:08:22', NULL),
(6, 'Error beatae dolor inventore aut', 'Dicta porro nobis. Velit cum in. Nesciunt dignissimos enim molestiae facilis numquam quae quaerat ipsam omnis. Neque debitis ipsum at architecto officia laboriosam odit. Ut sunt temporibus nulla culpa.', 'backend/images/construction/671b520dab1df.jpg', '1', '2024-10-25 02:08:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(34, 'dsafaf', 'asdfas@gmail.com', 'asdfasfas', 'asdfasfsaf', NULL, NULL),
(35, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', 'gasdfsadf', 'safasdf', '2024-09-21 15:08:29', NULL),
(36, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', 'Bangla 1', 'asdfsaf', '2024-09-21 16:27:47', NULL),
(37, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', 'asdfasfasf', 'asdfsafsafdasdfasd', '2024-09-23 01:38:28', NULL),
(38, 'Md.Afzal Hossen', 'afzalbhola07@gmail.com', 'Bangla 1', 'asdfa', '2024-09-23 01:39:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daly_expense_statement`
--

CREATE TABLE `daly_expense_statement` (
  `id` bigint UNSIGNED NOT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_particulars` text COLLATE utf8mb4_unicode_ci,
  `expense_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daly_expense_statement`
--

INSERT INTO `daly_expense_statement` (`id`, `expense_date`, `expense_particulars`, `expense_reason`, `expense_amount`, `expense_total`, `created_at`, `updated_at`) VALUES
(16, '04-11-2024', 'asdfsad', 'asdfsa', '1200', '1200', '2024-11-03 13:40:50', NULL),
(17, '04-11-2024', 'ghdtsteha', 'aaaaaaaaa', '6000', '7200', '2024-11-03 13:41:44', NULL),
(18, '04-08-2024', 'asdfsad', 'asdfsa', '600', '7800', '2024-11-03 13:42:10', NULL),
(19, '06-11-2024', 'ghdtsteha', 'asdfsa', '6000', '13800', '2024-11-03 13:55:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daly_income_statement`
--

CREATE TABLE `daly_income_statement` (
  `id` bigint UNSIGNED NOT NULL,
  `income_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_particulars` text COLLATE utf8mb4_unicode_ci,
  `income_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daly_income_statement`
--

INSERT INTO `daly_income_statement` (`id`, `income_date`, `income_particulars`, `income_reason`, `income_amount`, `income_total`, `created_at`, `updated_at`) VALUES
(14, '04-11-2024', 'asfd', 'asdfa', '1200', '1200', '2024-11-03 13:40:37', NULL),
(15, '04-11-2024', 'sakil', 'convayance', '600', '1800', '2024-11-03 13:41:34', NULL),
(16, '04-08-2024', 'asfd', 'asdfa', '600', '2400', '2024-11-03 13:41:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(7, '2024_08_02_105716_create_user_role_table', 3),
(8, '2024_08_02_195008_create_notices_table', 4),
(9, '2024_08_02_202949_create_website_settings_table', 5),
(10, '2024_08_02_224607_create_socials_table', 6),
(11, '2024_08_02_231150_create_seos_table', 7),
(13, '2024_08_02_235856_create_pages_table', 8),
(14, '2024_08_12_105827_create_banner_table', 9),
(15, '2024_08_12_110031_create_contact_table', 9),
(16, '2024_08_13_063212_create_project_list_table', 10),
(25, '2024_08_14_120653_create_daly_income_statement_table', 12),
(26, '2024_08_14_120724_create_daly_expense_statement_table', 12),
(29, '2024_09_17_075144_add_to_column_table', 15),
(30, '2024_09_22_152408_create_constructions_table', 16),
(31, '2024_09_23_074740_create_services_table', 17),
(32, '2024_09_23_152658_create_trending_products_table', 18),
(33, '2024_09_23_191428_create_selling_products_table', 19),
(37, '2024_10_23_224250_create_our_team_table', 21),
(38, '2024_10_23_212247_add_to_clumn_project_list', 22),
(41, '2024_08_15_073458_create_monthly_bill_table', 25),
(42, '2024_08_13_100010_create_work_bill_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_bill`
--

CREATE TABLE `monthly_bill` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `billing_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lift_quanitiy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_bill`
--

INSERT INTO `monthly_bill` (`id`, `project_id`, `billing_id`, `date`, `description`, `month_name`, `no_month`, `lift_quanitiy`, `unit_price`, `price`, `debit`, `credit`, `total_price`, `created_at`, `updated_at`) VALUES
(2, 8, 'EEBD/MB/12', '2024-11-04', 'Lift Maintenance & Servicing Charge For', 'August', '1', '2', '1000', '2000', '2000', '0', '2000', '2024-11-03 19:08:47', NULL),
(3, 8, 'EEBD/MB/100', '2024-11-04', 'Lift Maintenance & Servicing Charge For', 'August', '1', '2', '1000', '2000', '2000', '0', '2000', '2024-11-03 19:24:50', NULL),
(4, 8, 'EEBD/MB/12', '2024-11-04', 'Lift Maintenance & Servicing Charge For', 'August', '1', '2', '1000', '2000', '1000', '1000', '2000', '2024-11-04 01:58:32', NULL),
(5, 8, 'EEBD/MB/100', '2024-11-04', 'Lift Maintenance & Servicing Charge For', 'August', '1', '2', '1000', '2000', '0', '2000', '2000', '2024-11-04 01:59:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `notice` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice`, `status`, `created_at`, `updated_at`) VALUES
(2, 'hjfjhfdsuydfjydfyutdycghfduytdfyu', 0, '2024-09-12 06:10:07', '2024-09-12 06:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `name`, `image`, `designation`, `description`, `facebook`, `twitter`, `instagram`, `linkedin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Md.Afzal Hossen', 'backend/images/team/6719960ac52c6.jpg', 'cse', 'Impedit quod quidem ipsa ipsum quidem perspiciatis ullam est.', 'https://www.facebook.com/afzal', 'https://www.twitter.com/a', NULL, 'https://linkedin', '1', '2024-10-23 18:34:18', NULL),
(2, 'afzal-swe', 'backend/images/team/67199687da499.jpg', 'cse', 'Cupiditate facilis quidem debitis minus aspernatur facilis omnis corporis commodi.', 'https://www.facebook.com/codeartist.IT', 'https://www.twitter.com/codeartist.IT', 'https://instagram.com/', 'https://linkedin.com/', '1', '2024-10-23 18:36:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `category_id`, `page_title`, `banner`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(5, 'aaaaaaa', '0', 'aaaaaaaaaaa', 'backend/images/page/66e9560c3b053.png', 'aaaaaaaaaaaa', 'aaaaaaa', '0', '2024-08-02 20:12:40', '2024-09-17 04:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_list`
--

CREATE TABLE `project_list` (
  `id` bigint UNSIGNED NOT NULL,
  `project_sl` int NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lift_quanitiy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `in_word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_list`
--

INSERT INTO `project_list` (`id`, `project_sl`, `project_name`, `address`, `phone`, `lift_quanitiy`, `unit_price`, `monthly_bill`, `status`, `in_word`, `created_at`, `updated_at`) VALUES
(8, 1245, 'Management_System', 'House-215/17, Road-6, Block-E, Banasree, Dhaka', '0121022222', '2', '1000', '2000', '1', 'Two Thousand Taka Only', '2024-10-24 16:51:30', '2024-10-24 17:15:47'),
(9, 1001, 'Neer', 'banasree', '01764130103', '01', '1500', '1500', '1', 'Fifteen hundred taka', '2024-10-25 04:48:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `selling_products`
--

CREATE TABLE `selling_products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selling_products`
--

INSERT INTO `selling_products` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Test Product-10102', 'backend/images/selling_products/6718303a17d85.jpg', 'sadfsaf\r\nsadfasfasf\r\n\r\ndsfasf\r\nas\r\nfasd\r\nfasdf\r\nasdf\r\ndas\r\nfdas\r\ndf\r\nasf\r\ndas\r\ndf', '1', '2024-10-22 17:07:38', NULL),
(4, 'Test Product-201245', 'backend/images/selling_products/6718306e00bcf.jpg', 'sadfasf\r\nadsfsa\r\ndsafasdfasdfasfasdfas fdsafas dasfasf dsafasdf \r\nsadfasdf \r\ndsafasdfasdf\r\n   dsaf\r\nasdfasdf dsafasf sdafasd dsafasd sdafasd dsafasdf sdafasdf asdfasdf sadf\r\ndsaf', '1', '2024-10-22 17:08:30', NULL),
(5, 'Test Product-254251', 'backend/images/selling_products/67183093cc334.jpg', 'asdfas\r\nsdafafasdf sdafasdf sadf sdfafasdf asdfasdfasdfasd dsafasd\r\ndsafasd sdafasdf sdaf sdafads fsdafadsf\r\n dfsaf', '1', '2024-10-22 17:09:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `google_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_analytics` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_author`, `meta_title`, `meta_keyword`, `meta_description`, `google_analytics`, `google_verification`, `alexa_analytics`, `created_at`, `updated_at`) VALUES
(2, 'Express Enginners BD', 'Express Enginners BD', 'lift, elevator, express, service', 'newsportal, online, online news, online newspaper, online news, today, today news,', 'asdsasdadsfdfs', 'dsafsadsaafdsds', 'dsafsafsdafasdf', '2024-10-23 16:04:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `services_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `youtube`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(2, 'https://www.facebook.com/codeartist.IT', 'https://www.twitter.com/codeartist.IT', 'https://youtube.com/', 'https://instagram.com/', 'https://linkedin.com/', '2024-09-12 04:18:34', '2024-09-12 05:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `trending_products`
--

CREATE TABLE `trending_products` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trending_products`
--

INSERT INTO `trending_products` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'backend/images/trending/6718277f9bdfc.jpg', '1', '2024-10-22 16:30:23', NULL),
(4, 'backend/images/trending/6718278f319d4.jpg', '1', '2024-10-22 16:30:39', NULL),
(5, 'backend/images/trending/6718279904a03.jpg', '1', '2024-10-22 16:30:49', NULL),
(6, 'backend/images/trending/671827a0e28d8.jpg', '1', '2024-10-22 16:30:56', NULL),
(7, 'backend/images/trending/671827a80a289.jpg', '1', '2024-10-22 16:31:04', NULL),
(8, 'backend/images/trending/671827b6de768.jpg', '1', '2024-10-22 16:31:18', NULL),
(9, 'backend/images/trending/671827c2404c8.jpg', '0', '2024-10-22 16:31:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parmission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `parmission`, `status`, `slug`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Sakil', 'sakil@gmail.com', '1254874512', 'Banasree Block-B, Road-5, House-21', '1', '1', 'sakil', NULL, '$2y$10$uV6RSxFA4r9TwS4iY3VWFO63pQJE66QKSdapFLd6uYX269o.WwE46', NULL, '2024-08-02 04:15:14', '2024-08-12 03:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '1', NULL, NULL),
(2, 'Supper', 'supper', '1', '2024-08-02 11:52:15', '2024-09-17 15:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `website_name`, `phone_one`, `phone_two`, `main_email`, `support_email`, `logo`, `favicon`, `address`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Express Enginners BD', '01764130103', '01764130103', 'expressenginnersbd@gmail.com', 'express.info@gmail.com', 'backend/images/logo/66e2f0a195df7.jpg', 'backend/images/favicon/66e2f0c1df3ca.jpg', 'House-215/17, Road-6, Block-E, Banasree, Dhaka', '<p>asdfas asdf asdfasf adsfas fasdf dsasd</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_bill`
--

CREATE TABLE `work_bill` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_date` date DEFAULT NULL,
  `equipment_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_bill`
--

INSERT INTO `work_bill` (`id`, `project_id`, `ref`, `billing_date`, `equipment_list`, `quantity`, `unit_price`, `sub_price`, `in_word`, `general_terms`, `supply_date`, `expire_date`, `price`, `debit`, `credit`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 8, 'EEBD/WB/30', '2024-11-04', '[\"adsfsa\",\"adsfsa\"]', '[\"2\",\"2\"]', '[\"1000\",\"1000\"]', '[\"2000\",\"2000\"]', 'Four Thousand Taka Only', '1', '2024-11-04', '2024-11-04', '4000', '4000', '0', '4000', '2024-11-03 19:45:52', NULL),
(2, 8, 'EEBD/WB/73', '2024-11-04', '[\"adsfsa\"]', '[\"2\"]', '[\"1000\"]', '[\"2000\"]', 'Two Thousand Taka Only', '1', '2024-11-04', '2024-11-04', '2000', '2000', '0', '2000', '2024-11-03 19:50:42', NULL),
(3, 8, 'EEBD/WB/30', '2024-11-04', '\"[\\\"adsfsa\\\",\\\"adsfsa\\\"]\"', '\"[\\\"2\\\",\\\"2\\\"]\"', '\"[\\\"1000\\\",\\\"1000\\\"]\"', '\"[\\\"2000\\\",\\\"2000\\\"]\"', 'Four Thousand Taka Only', '1', '2024-11-04', '2024-11-04', '4000', '0', '4000', '4000', '2024-11-04 01:09:43', NULL),
(4, 8, 'EEBD/WB/73', '2024-11-04', '\"[\\\"adsfsa\\\"]\"', '\"[\\\"2\\\"]\"', '\"[\\\"1000\\\"]\"', '\"[\\\"2000\\\"]\"', 'One Thousand Taka Only', '1', '2024-11-04', '2024-11-04', '2000', '1000', '1000', '2000', '2024-11-04 01:11:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constructions`
--
ALTER TABLE `constructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daly_expense_statement`
--
ALTER TABLE `daly_expense_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daly_income_statement`
--
ALTER TABLE `daly_income_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_bill`
--
ALTER TABLE `monthly_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_bill_project_id_foreign` (`project_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_products`
--
ALTER TABLE `selling_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending_products`
--
ALTER TABLE `trending_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_bill`
--
ALTER TABLE `work_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_bill_project_id_foreign` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `constructions`
--
ALTER TABLE `constructions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `daly_expense_statement`
--
ALTER TABLE `daly_expense_statement`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `daly_income_statement`
--
ALTER TABLE `daly_income_statement`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `monthly_bill`
--
ALTER TABLE `monthly_bill`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_list`
--
ALTER TABLE `project_list`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `selling_products`
--
ALTER TABLE `selling_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trending_products`
--
ALTER TABLE `trending_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_bill`
--
ALTER TABLE `work_bill`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monthly_bill`
--
ALTER TABLE `monthly_bill`
  ADD CONSTRAINT `monthly_bill_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_bill`
--
ALTER TABLE `work_bill`
  ADD CONSTRAINT `work_bill_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
