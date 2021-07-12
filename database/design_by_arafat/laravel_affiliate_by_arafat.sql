-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2020 at 03:23 PM
-- Server version: 5.7.32-0ubuntu0.16.04.1
-- PHP Version: 7.2.16-1+ubuntu16.04.1+deb.sury.org+1

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
-- Table structure for table `affiliate_groups`
--

CREATE TABLE `affiliate_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `affiliate_type_id` int(10) UNSIGNED NOT NULL,
  `price` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_time_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'date_range or forever',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_groups`
--

INSERT INTO `affiliate_groups` (`id`, `affiliate_type_id`, `price`, `valid_time_limit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '{"client_commision_basic":"1111","guest_discount_basic":"1111","client_commision_business":"111","guest_discount_business":"111","client_commision_premium":"111","guest_discount_premium":"111"}', '2020-11-09 to 2020-12-31', '2020-11-07 11:50:18', '2020-11-09 10:12:58', '2020-11-09 10:12:58'),
(2, 2, '{"client_commision_basic":"20","guest_discount_basic":"10","client_commision_business":"30","guest_discount_business":"15","client_commision_premium":"40","guest_discount_premium":"20"}', '2020-11-09 to 2020-11-27', '2020-11-07 12:22:28', '2020-11-09 10:12:23', NULL),
(3, 3, '{"client_commision_basic":"20","guest_discount_basic":"10","client_commision_business":"30","guest_discount_business":"15","client_commision_premium":"40","guest_discount_premium":"20"}', '2020-11-01 to 2020-12-29', '2020-11-07 12:22:54', '2020-11-09 10:12:04', NULL),
(4, 3, '{"client_commision_basic":"200","guest_discount_basic":"10","client_commision_business":"30","guest_discount_business":"15","client_commision_premium":"40","guest_discount_premium":"20"}', 'forever', '2020-11-07 13:14:15', '2020-11-09 10:13:06', '2020-11-09 10:13:06'),
(5, 1, '{"client_commision_basic":"10","guest_discount_basic":"5","client_commision_business":"20","guest_discount_business":"10","client_commision_premium":"40","guest_discount_premium":"21"}', 'forever', '2020-11-07 13:48:35', '2020-11-09 15:28:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_people`
--

CREATE TABLE `affiliate_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_link` longtext COLLATE utf8mb4_unicode_ci,
  `valid_time_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'date_range or forever',
  `total_client_commission` longtext COLLATE utf8mb4_unicode_ci,
  `total_affiliate_num` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_people`
--

INSERT INTO `affiliate_people` (`id`, `name`, `email`, `identity_num`, `price`, `affiliate_link`, `valid_time_limit`, `total_client_commission`, `total_affiliate_num`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'shuvo update', 'arafat.dml@gmail.com', 'jtbiVWEb', '{"client_commision_basic":"33","guest_discount_basic":"11","client_commision_business":"44","guest_discount_business":"12","client_commision_premium":"55","guest_discount_premium":"38"}', 'shuvoupdate_jtbiVWEb', 'forever', '132', '3', '2020-11-07 14:41:30', '2020-11-09 13:20:23', NULL),
(3, 'jon doe', NULL, 'ZptlwJOi', '{"client_commision_basic":"12","guest_discount_basic":"6","client_commision_business":"16","guest_discount_business":"8","client_commision_premium":"20","guest_discount_premium":"10"}', 'jondoe_ZptlwJOi', '2020-11-01 to 2020-12-31', '16', '1', '2020-11-07 14:52:40', '2020-11-09 14:15:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_trackings`
--

CREATE TABLE `affiliate_trackings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `affiliate_belong_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client_group_or_person',
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `guest_id` int(10) UNSIGNED DEFAULT NULL,
  `guest_select_package_id` int(10) UNSIGNED DEFAULT NULL,
  `affiliate_group_id` int(10) UNSIGNED DEFAULT NULL,
  `affiliate_person_id` int(10) UNSIGNED DEFAULT NULL,
  `client_commision` longtext COLLATE utf8mb4_unicode_ci,
  `guest_discount` longtext COLLATE utf8mb4_unicode_ci,
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
(8, 'client', 19, 53, 3, 3, NULL, '40', '20', '2020-11-09 14:18:27', '2020-11-09 14:18:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_types`
--

CREATE TABLE `affiliate_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_types`
--

INSERT INTO `affiliate_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Basic', '2020-11-07 00:26:56', NULL, NULL),
(2, 'Business', '2020-11-07 02:27:37', NULL, NULL),
(3, 'Premium', '2020-11-06 18:00:00', NULL, NULL),
(4, 'Person', '2020-11-06 18:00:00', NULL, '2020-11-06 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_passwords`
--

CREATE TABLE `forgot_passwords` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `verify_code` varchar(255) NOT NULL,
  `verify_time_limit` varchar(255) NOT NULL,
  `verify` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forgot_passwords`
--

INSERT INTO `forgot_passwords` (`id`, `email`, `hash`, `verify_code`, `verify_time_limit`, `verify`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'arafat.dml@gmail.com', '3de4c5b93807a6496014748b5af48af1', 'TCQYeI', '2020-11-26 20:59:35', '1', '2020-11-26 14:29:35', '2020-11-26 14:31:54', '2020-11-26 14:31:54'),
(2, 'arafat.dml@gmail.com', '7c194d4dfaa4ab6d74d4a17560984991', '1AG3k9', '2020-11-26 21:01:54', '1', '2020-11-26 14:31:54', '2020-11-26 14:33:28', '2020-11-26 14:33:28'),
(3, 'arafat.dml@gmail.com', '2043b173372a5357e59a2a4c0f751971', 'Phh5Wc', '2020-11-26 21:03:28', '1', '2020-11-26 14:33:28', '2020-11-26 14:36:54', '2020-11-26 14:36:54'),
(4, 'arafat.dml@gmail.com', 'cc5bf1ec53888f349741299825f8431c', 'sju2rD', '2020-11-26 21:06:54', '1', '2020-11-26 14:36:54', '2020-11-26 14:37:30', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_04_224418_create_affiliate_types_table', 1),
(5, '2020_11_04_225458_create_affiliate_groups_table', 1),
(6, '2020_11_04_231915_create_affiliate_people_table', 1),
(8, '2020_11_04_232546_create_affiliate_trackings_table', 2),
(9, '2020_11_14_134511_create_paypal_payments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_select_package_name` longtext COLLATE utf8mb4_unicode_ci,
  `package_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_valid_till` longtext COLLATE utf8mb4_unicode_ci,
  `payment_id` longtext COLLATE utf8mb4_unicode_ci,
  `payer_id` longtext COLLATE utf8mb4_unicode_ci,
  `invoice_number` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_payments`
--

INSERT INTO `paypal_payments` (`id`, `user_id`, `user_select_package_name`, `package_price`, `payment_valid_till`, `payment_id`, `payer_id`, `invoice_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 62, 'Merchant', '104', '2021-06-04 15:01:27', 'PAYID-L674EDA4DB23388010523908', 'G2TXJDUKKAWB8', '5fbfc2047b650', '2020-11-26 09:01:27', '2020-11-26 09:01:27', NULL),
(2, 64, 'Merchant', '104', '2021-06-05 13:12:44', 'PAYID-L7APUUY8DE26827GD0433218', 'G2TXJDUKKAWB8', '5fc0fa4e32824', '2020-11-27 07:12:44', '2020-11-27 07:12:44', NULL),
(3, 65, 'Premium', '49', '2021-06-05 13:15:18', 'PAYID-L7APXRQ66V37883JN7065841', 'G2TXJDUKKAWB8', '5fc0fbc10481e', '2020-11-27 07:15:18', '2020-11-27 07:15:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tap_payment_datas`
--

CREATE TABLE `tap_payment_datas` (
  `id` int(11) NOT NULL,
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
(1, 'chg_TS045420200041Mr572611147', '{"track":"tck_TS015420200041Pg562611459","payment":"5426200041114590672","gateway":"123456789012345","acquirer":"033021019404","transaction":"txn_Oq98bI","order":"ord_Oq98bI"}', NULL, '62', '2020-11-25 15:43:40', '2020-11-25 15:43:40', NULL),
(2, 'chg_TS045420200041Mr572611147', '{"track":"tck_TS015420200041Pg562611459","payment":"5426200041114590672","gateway":"123456789012345","acquirer":"033021019404","transaction":"txn_Oq98bI","order":"ord_Oq98bI"}', NULL, '62', '2020-11-25 15:46:30', '2020-11-25 15:46:30', NULL),
(3, 'chg_TS045420200041Mr572611147', '{"track":"tck_TS015420200041Pg562611459","payment":"5426200041114590672","gateway":"123456789012345","acquirer":"033021019404","transaction":"txn_Oq98bI","order":"ord_Oq98bI"}', NULL, '62', '2020-11-25 15:46:36', '2020-11-25 15:46:36', NULL),
(4, 'chg_TS045420200041Mr572611147', '{"track":"tck_TS015420200041Pg562611459","payment":"5426200041114590672","gateway":"123456789012345","acquirer":"033021019404","transaction":"txn_Oq98bI","order":"ord_Oq98bI"}', NULL, '62', '2020-11-25 15:47:03', '2020-11-25 15:47:03', NULL),
(5, 'chg_TS041120201802Li7p2711957', '{"track":"tck_TS071220201802Ru752711285","payment":"1227201802112853510","gateway":"123456789012345","acquirer":"033214020574","transaction":"txn_","order":"ord_"}', '2021-06-05 14:57:46', '67', '2020-11-27 08:57:46', '2020-11-27 08:57:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_add_1` text COLLATE utf8mb4_unicode_ci,
  `ship_add_2` text COLLATE utf8mb4_unicode_ci,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_another_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_same_as_shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_add_1` text COLLATE utf8mb4_unicode_ci,
  `bill_add_2` text COLLATE utf8mb4_unicode_ci,
  `bill_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_another_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_time_limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agree_on_term_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer' COMMENT 'user/customer',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_link` longtext COLLATE utf8mb4_unicode_ci,
  `mem_package` longtext COLLATE utf8mb4_unicode_ci,
  `mem_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_with` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paypal/tappayment',
  `tap_payment_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_payment_done` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_valid_till` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_client_commission` longtext COLLATE utf8mb4_unicode_ci,
  `me_as_a_guest_discount` longtext COLLATE utf8mb4_unicode_ci,
  `total_affiliate_num` longtext COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_register_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'website' COMMENT 'website/oauthApi',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `ship_add_1`, `ship_add_2`, `ship_country`, `ship_region`, `ship_city`, `ship_phone`, `ship_postal_code`, `ship_another_number`, `bill_same_as_shipping`, `bill_add_1`, `bill_add_2`, `bill_country`, `bill_region`, `bill_city`, `bill_phone`, `bill_postal_code`, `bill_another_number`, `hash`, `verify_code`, `verify_time_limit`, `verify`, `status`, `agree_on_term_condition`, `user_type`, `email`, `affiliate_link`, `mem_package`, `mem_fee`, `pay_with`, `tap_payment_option`, `is_payment_done`, `payment_valid_till`, `total_client_commission`, `me_as_a_guest_discount`, `total_affiliate_num`, `email_verified_at`, `password`, `user_register_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dr. Jamison Farrell DVM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'buster14@hotmail.com', 'RosalynRatke_K9rQywYu', 'Business', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$.qY5uAFF9YiddjeG9edv3OFBKexipGL4zOvw.GQ54It3sTSLQkPOa', NULL, NULL, NULL, NULL, NULL),
(2, 'Adaline Schmidt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'hfahey@hotmail.com', 'AliyaVolkman_UNLoPPRw', 'Premium', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$57.2cM5xMr/wYQyXHrqgTe378lNGE9s1RSt.HR7TD7xRuO5c95xOy', NULL, NULL, NULL, NULL, NULL),
(3, 'Ralph Gottlieb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'sconroy@schoen.info', 'DonavonRunolfsson_IcyEX2On', 'Business', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$7.vMYbp7bZ0PqLFdGP/Ia.uVXQT8XXyTGSBMVmMBBhHJk9bo7AsnS', NULL, NULL, NULL, '2020-11-08 17:50:29', NULL),
(4, 'Bell Gutkowski', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'obeahan@yahoo.com', 'Dr.GlenBruen_1LMqtoSY', 'Basic', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$fKl.jQ.0ks0qnzyeAuZNhOVHE7UExZ/mhybnrfoWdtI6Z8Yyh3nju', NULL, NULL, NULL, NULL, NULL),
(5, 'Matilda Swift', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'nbeatty@leuschke.org', 'Ms.PollyDavis_cdhhRg8K', 'Business', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$B7Kb7GowpfaNZ/s9FeFGDuVNMG5stiDsDkKGYf5fPCX42BXI/f3gi', NULL, NULL, NULL, NULL, NULL),
(6, 'Mr. Kyleigh Koss MD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'joanne55@jacobs.com', 'ZackHowellPhD_02FCcBXD', 'Premium', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$ry8VQ6v5S5PWcyl5jiRCX.Ew5mjVk0eYbf5Wm8uCuZefAZ8bIPhli', NULL, NULL, NULL, NULL, NULL),
(7, 'Miss Thalia Armstrong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'ddicki@nolan.com', 'MaxieSchumm_NiXns0Kx', 'Business', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$FDzcVCcsgCFAf6u/8sEBHuCF6v05ALAbu4i8ea2TrxZ.E3pkmECX2', NULL, NULL, NULL, NULL, NULL),
(8, 'Ernestine Cassin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'abner21@hotmail.com', 'NadiaDavis_enY0HGVz', 'Premium', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$42IH4bB6iyJzLfeFWB7xFOlfLU8AXuYxyfTyhVLQKi4G2gwFG/avy', NULL, NULL, NULL, NULL, NULL),
(9, 'Elisha McDermott', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'mitchell.skyla@yahoo.com', 'GeraldineHuelMD_OMYOMWi7', 'Business', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$JTIwVKxdDYKU8yaG67zeb.MFFB04npVZM3nenYhflmy0rscgQjEZO', NULL, NULL, NULL, NULL, NULL),
(10, 'Jamey Prohaska', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'macejkovic.thora@hotmail.com', 'StuartSporer_ZT9qsGXM', 'Basic', NULL, NULL, NULL, '0', NULL, '70', NULL, '3', NULL, '$2y$10$s214km6e3BdTt7S9jGoRvu2OA7vtaPYfChWcvbstJjuoJoyLMvm9K', NULL, NULL, NULL, '2020-11-09 11:58:55', NULL),
(18, 'arafat arafat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'api.arafat@gmail.com', 'arafatarafat_pmrv4PXA', 'Business', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '$2y$10$xQhh5CTy6WBq6L1su5.kAufkELAqcNs43ex4hlzR3wx8aqD7xMpye', NULL, NULL, '2020-11-08 09:47:21', '2020-11-08 17:53:46', NULL),
(19, 'arafat arafat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'arafat.api@gmail.com', 'arafatarafat_tgU45i8z', 'Premium', NULL, NULL, NULL, '0', NULL, '40', NULL, '1', NULL, '$2y$10$2M/fDWhLiu.vnnM/fRBp2.b06LdER7.e11CCalhv4MwnzgCdDEkhC', NULL, 'z3KAC34rMC4TVZkHXIdamGpImnJOypdwuODRGhrGSuzLt7aCKSILSo5BX403', '2020-11-08 17:53:46', '2020-11-09 14:18:28', NULL),
(45, 'jarif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'jarif.dml@gmail.com', 'jarif_ay9MYRnQ', 'Basic', NULL, NULL, NULL, '0', NULL, NULL, '5', NULL, NULL, '$2y$10$hAOq.X1kvKPNvkcaRt7ZGu2BFSA1mNA9HQVvEqno/Z5TyDPHRaucW', NULL, NULL, '2020-11-09 11:57:03', '2020-11-09 11:57:03', NULL),
(47, 'farif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'farif@gmail.com', 'farif_XBAAm1Ff', 'Business', NULL, NULL, NULL, '0', NULL, NULL, '10', NULL, NULL, '$2y$10$rjGVL2wR/DjGhZPD7Cr8TuAS/G3oxHrW.jFsTUuE73KICmX65Cu72', NULL, NULL, '2020-11-09 11:58:19', '2020-11-09 11:58:19', NULL),
(48, 'raju', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'raju@gmail.com', 'raju_1cghWbfB', 'Premium', NULL, NULL, NULL, '0', NULL, NULL, '20', NULL, NULL, '$2y$10$pFk1eSFAE0MFyrtxiR0pF.z9fFOVC1ESO0TFhTYVFCla/Ondq0NNa', NULL, NULL, '2020-11-09 11:58:55', '2020-11-09 11:58:55', NULL),
(49, 'James', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'james@gmail.com', 'James_EXvaz0Od', 'Basic', NULL, NULL, NULL, '0', NULL, NULL, '11', NULL, NULL, '$2y$10$d8g0ZSk95rsAR1iPfM85dOCChKs55hfBet6Yn8AHaufMDt65m9LSi', NULL, NULL, '2020-11-09 13:19:13', '2020-11-09 13:19:13', NULL),
(50, 'captPrice', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'captPrice@gmail.com', 'captPrice_kJG5Alb1', 'Business', NULL, NULL, NULL, '0', NULL, NULL, '12', NULL, NULL, '$2y$10$QJTHfcj.D.NeufqypRf/oO8/2jsLY6ZpvCJjKxwtdIKr2gELUEUWK', NULL, NULL, '2020-11-09 13:20:01', '2020-11-09 13:20:01', NULL),
(51, 'alasad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'alasad@gmil.com', 'alasad_YC2BRo7L', 'Premium', NULL, NULL, NULL, '0', NULL, NULL, '38', NULL, NULL, '$2y$10$GyrhAniEBnLNMD41kvl3oe7HNnniKb4AkbZAWP8DtrIIdOrHqxAT.', NULL, NULL, '2020-11-09 13:20:23', '2020-11-09 13:20:23', NULL),
(52, 'sajjat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'sajjat.dml@gmail.com', 'sajjat_6zwpPZTC', 'Business', NULL, NULL, NULL, '0', NULL, NULL, '8', NULL, NULL, '$2y$10$l0ybMbRlYvOFXoH/2WB9xuYeApNCt6vMOBnCbuX9.JzSTtg5RJVxG', NULL, NULL, '2020-11-09 14:15:34', '2020-11-09 14:15:34', NULL),
(53, 'oustsider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'customer', 'outsider@gmail.com', 'oustsider_jweiaFeg', 'Premium', NULL, NULL, NULL, '0', NULL, NULL, '20', NULL, NULL, '$2y$10$dNJE02k6m4sV4cRhcD6Lter6EN3kziZR5A5LJdT0FB5e90W04zXgu', NULL, NULL, '2020-11-09 14:18:27', '2020-11-09 14:18:27', NULL),
(67, 'test test', 'test', 'test', 'test', 'test', 'AW', 'test', 'test', '4124324214', '4242', '424242', 'yes', 'test', 'test', 'AW', 'test', 'test', NULL, '4242', '424242', NULL, NULL, NULL, '1', '0', 'agree', 'customer', 'testme2api@gmail.com', NULL, 'Merchant', '104', 'tappayment', 'credit_debit_card', '1', '2021-06-05 14:57:46', NULL, NULL, NULL, NULL, '43a9e82a31c74b01a11c1c2a60e92c83', 'oauthApi', 'Mv7OBYgNpEsvCi1zNfpGnruOPMO7K6C7lpN17ACik0SAthom52iEG0QnD0VM', '2020-11-27 08:56:10', '2020-11-27 08:57:46', NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `affiliate_groups`
--
ALTER TABLE `affiliate_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `affiliate_people`
--
ALTER TABLE `affiliate_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `affiliate_trackings`
--
ALTER TABLE `affiliate_trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `affiliate_types`
--
ALTER TABLE `affiliate_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forgot_passwords`
--
ALTER TABLE `forgot_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tap_payment_datas`
--
ALTER TABLE `tap_payment_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
