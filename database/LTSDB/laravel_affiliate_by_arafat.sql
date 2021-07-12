-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2020 at 09:40 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.2.34-8+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_affiliate_by_arafat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_role_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `admin_role_id`, `phone`, `img`, `address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Yeasir', 'Arafat', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '000000000', 'public/storage/AdminImg/1608729130.png', 'Saudi Arabia, Riad', '4NhGH83Qiuf55Q6O2KHfO877PBEYmBBWNBjbbDFG2Honk9pkhrdadASrNQww', '2020-12-13 21:08:16', '2020-12-30 15:19:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `permission`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 'all', '2020-12-22 18:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_groups`
--

CREATE TABLE `affiliate_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `affiliate_type_id` int UNSIGNED NOT NULL,
  `price` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_time_limit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'date_range or forever',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_groups`
--

INSERT INTO `affiliate_groups` (`id`, `affiliate_type_id`, `price`, `valid_time_limit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '{"client_commision_basic":"1111","guest_discount_basic":"1111","client_commision_business":"111","guest_discount_business":"111","client_commision_premium":"111","guest_discount_premium":"111"}', '2020-11-09 to 2020-12-31', '2020-11-07 11:50:18', '2020-11-09 10:12:58', '2020-11-09 10:12:58'),
(2, 2, '{"client_commision_basic":"20","guest_discount_basic":"10","client_commision_business":null,"guest_discount_business":null,"client_commision_premium":"40","guest_discount_premium":"20"}', 'forever', '2020-11-07 12:22:28', '2020-11-27 10:15:28', NULL),
(3, 3, '{"client_commision_basic":"20","guest_discount_basic":"10","client_commision_business":"30","guest_discount_business":"15","client_commision_premium":"40","guest_discount_premium":"20"}', '2020-11-01 to 2020-12-29', '2020-11-07 12:22:54', '2020-11-09 10:12:04', NULL),
(4, 3, '{"client_commision_basic":"200","guest_discount_basic":"10","client_commision_business":"30","guest_discount_business":"15","client_commision_premium":"40","guest_discount_premium":"20"}', 'forever', '2020-11-07 13:14:15', '2020-11-09 10:13:06', '2020-11-09 10:13:06'),
(5, 1, '{"client_commision_basic":"10","guest_discount_basic":"5","client_commision_business":"20","guest_discount_business":"10","client_commision_premium":"40","guest_discount_premium":"21"}', 'forever', '2020-11-07 13:48:35', '2020-11-09 15:28:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_people`
--

CREATE TABLE `affiliate_people` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_num` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `valid_time_limit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'date_range or forever',
  `total_client_commission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_affiliate_num` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_people`
--

INSERT INTO `affiliate_people` (`id`, `name`, `email`, `identity_num`, `price`, `affiliate_link`, `valid_time_limit`, `total_client_commission`, `total_affiliate_num`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'shuvo update', 'arafat.dml@gmail.com', 'jtbiVWEb', '{"client_commision_basic":"33","guest_discount_basic":"11","client_commision_business":"44","guest_discount_business":"12","client_commision_premium":"55","guest_discount_premium":"38"}', 'shuvoupdate_jtbiVWEb', 'forever', '165', '4', '2020-11-07 14:41:30', '2020-12-04 12:08:56', NULL),
(3, 'jon doe', NULL, 'ZptlwJOi', '{"client_commision_basic":"12","guest_discount_basic":"6","client_commision_business":"16","guest_discount_business":"8","client_commision_premium":"20","guest_discount_premium":"10"}', 'jondoe_ZptlwJOi', '2020-11-01 to 2020-12-31', '16', '1', '2020-11-07 14:52:40', '2020-11-09 14:15:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_trackings`
--

CREATE TABLE `affiliate_trackings` (
  `id` bigint UNSIGNED NOT NULL,
  `affiliate_belong_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client_group_or_person',
  `client_id` int UNSIGNED DEFAULT NULL,
  `guest_id` int UNSIGNED DEFAULT NULL,
  `guest_select_package_id` int UNSIGNED DEFAULT NULL,
  `affiliate_group_id` int UNSIGNED DEFAULT NULL,
  `affiliate_person_id` int UNSIGNED DEFAULT NULL,
  `client_commision` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `guest_discount` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_trackings`
--

INSERT INTO `affiliate_trackings` (`id`, `affiliate_belong_to`, `client_id`, `guest_id`, `guest_select_package_id`, `affiliate_group_id`, `affiliate_person_id`, `client_commision`, `guest_discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'client', 10, 45, 1, 5, NULL, '10', '5', '2020-11-09 11:57:03', '2020-11-09 11:57:03', NULL),
(2, 'client', 10, 47, 2, 5, NULL, '20', '10', '2020-11-09 11:58:19', '2020-11-09 11:58:19', NULL),
(3, 'client', 10, 48, 3, 5, NULL, '40', '20', '2020-11-09 11:58:55', '2020-11-09 11:58:55', NULL),
(4, 'person', NULL, 49, 1, NULL, 1, '33', '11', '2020-11-09 13:19:13', '2020-11-09 13:19:13', NULL),
(5, 'person', NULL, 50, 2, NULL, 1, '44', '12', '2020-11-09 13:20:01', '2020-11-09 13:20:01', NULL),
(6, 'person', NULL, 51, 3, NULL, 1, '55', '38', '2020-11-09 13:20:23', '2020-11-09 13:20:23', NULL),
(7, 'person', NULL, 52, 2, NULL, 3, '16', '8', '2020-11-09 14:15:34', '2020-11-09 14:15:34', NULL),
(8, 'client', 19, 53, 3, 3, NULL, '40', '20', '2020-11-09 14:18:27', '2020-11-09 14:18:27', NULL),
(9, 'person', NULL, 59, 1, NULL, 1, '33', '11', '2020-12-04 12:08:56', '2020-12-04 12:08:56', NULL),
(10, 'client', 58, 61, 1, 3, NULL, '20', '10', '2020-12-04 13:09:35', '2020-12-04 13:09:35', NULL),
(11, 'client', 63, 64, 1, 5, NULL, '10', '5', '2020-12-04 13:23:24', '2020-12-04 13:23:24', NULL),
(12, 'client', 63, 69, 1, 5, NULL, '10', '5', '2020-12-04 13:43:41', '2020-12-04 13:43:41', NULL),
(13, 'client', 63, 70, 1, 5, NULL, '10', '5', '2020-12-04 13:48:51', '2020-12-04 13:48:51', NULL),
(14, 'client', 63, 72, 1, 5, NULL, '10', '5', '2020-12-04 13:49:50', '2020-12-04 13:49:50', NULL),
(15, 'client', 72, 73, 1, 5, NULL, '10', '5', '2020-12-04 13:52:38', '2020-12-04 13:52:38', NULL),
(16, 'client', 73, 74, 1, 5, NULL, '10', '5', '2020-12-04 14:05:54', '2020-12-04 14:05:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_types`
--

CREATE TABLE `affiliate_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_types`
--

INSERT INTO `affiliate_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Basic', '2020-11-07 00:26:56', NULL, NULL),
(2, 'Merchant', '2020-11-07 02:27:37', NULL, NULL),
(3, 'Premium', '2020-11-06 18:00:00', NULL, NULL),
(4, 'Person', '2020-11-06 18:00:00', NULL, '2020-11-06 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_passwords`
--

CREATE TABLE `forgot_passwords` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `verify_code` varchar(255) NOT NULL,
  `verify_time_limit` varchar(255) NOT NULL,
  `verify` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_04_224418_create_affiliate_types_table', 1),
(5, '2020_11_04_225458_create_affiliate_groups_table', 1),
(6, '2020_11_04_231915_create_affiliate_people_table', 1),
(8, '2020_11_04_232546_create_affiliate_trackings_table', 2),
(9, '2020_11_14_134511_create_paypal_payments_table', 3),
(10, '2020_12_14_135909_create_admin_roles_table', 4),
(11, '2020_12_14_135933_create_admins_table', 4),
(12, '2020_12_28_163508_create_subscriber_package_names_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arafat.dml@gmail.com', '$2y$10$mf7KeWKOxvMp390pTLluoeRAB/nZNSgRbYuqDIgKIBJ.ec4B6/sVO', '2020-11-26 10:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `user_select_package_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `package_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_valid_till` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payer_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `invoice_number` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_payments`
--

INSERT INTO `paypal_payments` (`id`, `user_id`, `user_select_package_name`, `package_price`, `payment_valid_till`, `payment_id`, `payer_id`, `invoice_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Merchant', '104', '2021-07-02 11:00:20', 'PAYID-L7SHJEI5J173951TE103880H', 'G2TXJDUKKAWB8', '5fe4748c46b6c', '2020-12-24 05:00:20', '2020-12-24 05:00:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_package_names`
--

CREATE TABLE `subscriber_package_names` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arabic_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_in_dolar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_in_saudi_riyal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriber_package_names`
--

INSERT INTO `subscriber_package_names` (`id`, `name`, `arabic_name`, `price_in_dolar`, `price_in_saudi_riyal`, `number_of_days`, `display_position`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 'الأساسية', '0', '0', 'Unlimited', '1', '2020-12-28 11:20:31', '2020-12-30 13:41:32'),
(3, 'Distinctive', 'المميزة', '13.06', '49', '190', '2', '2020-12-30 13:42:55', '2020-12-30 13:42:55'),
(4, 'Merchants', 'التجار', '190', '50.64', '104', '3', '2020-12-30 13:44:21', '2020-12-30 13:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `tap_payment_datas`
--

CREATE TABLE `tap_payment_datas` (
  `id` int NOT NULL,
  `charge_id` varchar(255) DEFAULT NULL,
  `tap_reference` text,
  `payment_valid_till` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tap_payment_datas`
--

INSERT INTO `tap_payment_datas` (`id`, `charge_id`, `tap_reference`, `payment_valid_till`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'chg_TS013420200844Re172412280', '{"track":"tck_TS063420200844Kt2w2412489","payment":"3424200844124896125","gateway":"123456789012345","acquirer":"035905033358","transaction":"txn_","order":"ord_"}', '2021-07-02 05:40:29', '3', '2020-12-23 23:40:29', '2020-12-23 23:40:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_add_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ship_add_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ship_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_another_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_same_as_shipping` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_add_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bill_add_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bill_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_another_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_time_limit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agree_on_term_condition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer' COMMENT 'user/customer',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subscriber_package_name_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_package` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mem_fee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_with` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paypal/tappayment',
  `tap_payment_option` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_payment_done` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_valid_till` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_client_commission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `me_as_a_guest_discount` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_affiliate_num` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_register_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'website' COMMENT 'website/oauthApi/admin',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `ship_add_1`, `ship_add_2`, `ship_country`, `ship_region`, `ship_city`, `ship_phone`, `ship_postal_code`, `ship_another_number`, `bill_same_as_shipping`, `bill_add_1`, `bill_add_2`, `bill_country`, `bill_region`, `bill_city`, `bill_phone`, `bill_postal_code`, `bill_another_number`, `hash`, `verify_code`, `verify_time_limit`, `verify`, `status`, `agree_on_term_condition`, `user_type`, `email`, `affiliate_link`, `subscriber_package_name_id`, `mem_package`, `mem_fee`, `pay_with`, `tap_payment_option`, `is_payment_done`, `payment_valid_till`, `total_client_commission`, `me_as_a_guest_discount`, `total_affiliate_num`, `email_verified_at`, `password`, `user_register_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Capt Price', 'Capt', 'Price', 'london, 321', 'test', 'BD', 'VA', 'London', '4123124124', '1211', '04123124124', 'yes', 'london, 321', 'test', 'BD', 'VA', 'London', '4123124124', '1211', '04123124124', '20201223134617alWKnq', 'alWKnq', '2020-12-23 14:16:17', '1', '1', 'agree', 'customer', 'api.arafat@gmail.com', 'Capt_Price_bauYWMni', '1', 'Basic', '0', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '7d99e44509f2f34dab31f7253db0e54b', 'website', NULL, '2020-12-23 07:46:17', '2020-12-30 15:16:59', NULL),
(3, 'Yeasir Arafat', 'Yeasir', 'Arafat', 'london', 'arafat arafat', 'BD', 'virginia', 'arafat arafat', '04123124124', 'arafat arafat', '4123124124', 'yes', 'london', 'arafat arafat', 'BD', 'virginia', 'arafat arafat', '04123124124', 'arafat arafat', '4123124124', NULL, NULL, NULL, '1', '0', 'agree', 'customer', 'arafat.dml3333@gmail.com', 'Yeasir_Arafat_tCmuByKR', NULL, 'Premium', '49', 'tappayment', 'credit_debit_card', '1', '2021-07-02 05:40:29', NULL, NULL, NULL, NULL, '54b6e1a36e2da40f1184367596bd3122', 'oauthApi', 'xA3jRHc79vrObD9xcPipeQptRRZ1BriYHd5n5ig5joFPKYoeXYcuKK0UXIT3', '2020-12-23 23:38:15', '2020-12-30 15:15:46', NULL),
(4, 'Yeasir Arafat', 'Yeasir', 'Arafat', 'london, 321', 'arafat arafat', 'AW', 'VA', 'arafat arafat', '4123124124', 'arafat arafat', '4123124124', 'yes', 'london, 321', 'arafat arafat', 'AW', 'VA', 'arafat arafat', '4123124124', 'arafat arafat', '4123124124', NULL, NULL, NULL, '1', '0', 'agree', 'customer', 'arafat.dml33@gmail.com', 'Yeasir_Arafat_eCyAnn8s', NULL, 'Merchant', '104', 'paypal', NULL, '1', '2021-07-02 11:00:20', NULL, NULL, NULL, NULL, '48bb557344b56f292b280f769f147198', 'oauthApi', NULL, '2020-12-24 04:59:17', '2020-12-30 15:15:52', NULL),
(5, 'Yeasir 001 arafat', 'Yeasir 001', 'arafat', 'london', '321', 'VA', 'dhaka', 'test', '04123124124', 'test', '252525234', 'yes', 'london', 'london', 'VA', 'dhaka', 'Newyork', '04123124124', 'test', '252525234', '20201230202100PfES7o', 'PfES7o', '2020-12-30 20:51:00', '1', '0', 'agree', 'customer', 'arafat.dml@gmail.com', 'Yeasir001_arafat_6CswlzeZ', '1', 'Basic', '0', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '005f47cddf568dacb8d03e20ba682cf9', 'admin', NULL, '2020-12-30 14:21:00', '2020-12-30 15:17:54', NULL),
(6, 'Jahid Al Hasan', 'Jahid', 'Al Hasan', 'london, 321', '321', 'VA', 'new jercy', 'test', '4123124124', 'test', '423425325', 'yes', 'london, 321', 'london, 321', 'VA', 'new jercy', 'test', '4123124124', 'test', '423425325', '20201230211921LlmLol', 'LlmLol', '2020-12-30 21:49:21', '1', '1', 'agree', 'customer', 'jahid.dml@gmail.com', 'Jahid_AlHasan_aErxQSIK', '4', 'Merchants', '50.64', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '005f47cddf568dacb8d03e20ba682cf9', 'admin', NULL, '2020-12-30 15:19:21', '2020-12-30 15:19:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliate_groups`
--
ALTER TABLE `affiliate_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affiliate_groups_affiliate_type_id_index` (`affiliate_type_id`);

--
-- Indexes for table `affiliate_people`
--
ALTER TABLE `affiliate_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliate_trackings`
--
ALTER TABLE `affiliate_trackings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affiliate_trackings_client_id_index` (`client_id`),
  ADD KEY `affiliate_trackings_guest_id_index` (`guest_id`),
  ADD KEY `affiliate_trackings_guest_select_package_id_index` (`guest_select_package_id`),
  ADD KEY `affiliate_trackings_affiliate_group_id_index` (`affiliate_group_id`),
  ADD KEY `affiliate_trackings_affiliate_person_id_index` (`affiliate_person_id`);

--
-- Indexes for table `affiliate_types`
--
ALTER TABLE `affiliate_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_passwords`
--
ALTER TABLE `forgot_passwords`
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
-- Indexes for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paypal_payments_client_id_index` (`user_id`);

--
-- Indexes for table `subscriber_package_names`
--
ALTER TABLE `subscriber_package_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tap_payment_datas`
--
ALTER TABLE `tap_payment_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `affiliate_groups`
--
ALTER TABLE `affiliate_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `affiliate_people`
--
ALTER TABLE `affiliate_people`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `affiliate_trackings`
--
ALTER TABLE `affiliate_trackings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `affiliate_types`
--
ALTER TABLE `affiliate_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forgot_passwords`
--
ALTER TABLE `forgot_passwords`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscriber_package_names`
--
ALTER TABLE `subscriber_package_names`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tap_payment_datas`
--
ALTER TABLE `tap_payment_datas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
