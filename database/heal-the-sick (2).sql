-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2024 at 05:27 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heal-the-sick`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_coins`
--

CREATE TABLE `about_coins` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin_types` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1' COMMENT '0 => Inactive, 1 => Active, 2 => Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_coins`
--

INSERT INTO `about_coins` (`id`, `title`, `description`, `image`, `coin_types`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Welcome to Heal Coins: Revolutionizing Health through Digital Currency', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In cupiditate recusandae</p>', '2024022909541615.jpg', '[{\"Empowering Health with\":\"Welcome to the forefront of health and technology convergence. Heal Coins is not just a digital currency; it\'s a revolutionary approach to transforming the healthcare landscape. Through the power of blockchain, Heal Coins is ushering in a new era where health transactions are seamless, secure, and accessible to all.\"},{\"What are Heal Coins?\":\"Heal Coins is a digital currency specifically designed for the health sector. Built on the blockchain, it ensures transparency, security, and efficiency in health-related transactions. Whether you\'re a patient, healthcare provider, or researcher, Heal Coins simplifies processes, making healthcare accessible and user-friendly\"}]', 1, '2024-02-29 04:24:16', '2024-03-02 01:33:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1' COMMENT '0 => Inactive, 1 => Active, 2 => Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `banner_image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'open our Current  Account Online', '2024022906195337.jpg', '<p>This statistic is based on our average personal current account online opening time from</p>', 1, '2024-02-29 00:49:53', '2024-03-11 05:27:52', NULL),
(2, 'new testing baneer', '2024022906202099.jpg', '<p>This statistic is based on our average personal current account online opening time from</p>', 1, '2024-02-29 00:50:20', '2024-03-08 06:07:13', NULL),
(3, 'wrapper testing banner', '2024022906204568.jpg', '<p>This statistic is based on our average personal current account online opening time from</p>', 1, '2024-02-29 00:50:45', '2024-03-08 06:07:18', NULL),
(4, 'new banner testing', '2024022906212431.jpg', '<p>This statistic is based on our average personal current account online opening time from</p>', 2, '2024-02-29 00:51:24', '2024-03-11 02:00:27', NULL),
(6, 'dsfsfssf', '2024031406474602.jpg', '<p>sdfsfsfsfsfsfsfsfds</p>', 2, '2024-03-14 01:17:46', '2024-03-14 01:18:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1' COMMENT '0 => Inactive, 1 => Active, 2 => Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Secure International Transaction', '<p>Tortor neque sed tellus estian eget dui id ante tristique more tristique dolor.</p>', 1, '2024-03-14 01:06:35', NULL, NULL),
(2, '24/7 Support from the Expert Team', '<p>Tortor neque sed tellus estian eget dui id ante tristique more tristique dolor.</p>', 1, '2024-03-14 01:07:36', NULL, NULL),
(3, 'Lowest Processing Fee than Other Banks', '<p>Tortor neque sed tellus estian eget dui id ante tristique more tristique dolor.</p>', 1, '2024-03-14 01:09:27', NULL, NULL),
(4, 'Less Time in any Loans Approval', '<p>Tortor neque sed tellus estian eget dui id ante tristique more tristique dolor.</p>', 1, '2024-03-14 01:10:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_manages`
--

CREATE TABLE `cms_manages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_points` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1' COMMENT '0 => Inactive, 1 => Active, 2 => Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_manages`
--

INSERT INTO `cms_manages` (`id`, `title`, `title_points`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Key Features', '[{\"Decentralization\":\"Heal Coins operates on a decentralized network, eliminating the need for intermediaries and reducing transaction costs\"},{\"Security\":\"Built on robust blockchain technology, Heal Coins prioritizes the security and privacy of health data, ensuring confidentiality and integrity.\"},{\"Interoperability\":\"Compatible with various healthcare systems, Heal Coins promotes interoperability, allowing seamless sharing of health information across platforms.\"},{\"Decentralization update\":\"Compatible with various healthcare\"}]', 1, '2024-02-29 06:39:06', '2024-02-29 07:29:54', NULL),
(2, 'Benefits', '[{\"Patient Empowerment\":\"Patients have greater control over their health data and transactions, fostering a sense of empowerment and ownership.\"},{\"Streamlined Processes\":\"Healthcare providers experience streamlined administrative processes, reducing paperwork and improving overall efficiency.\"},{\"Research Advancements\":\"Researchers can access a secure and comprehensive database, accelerating medical research and advancements.\"},{\"Decentralization\":\"Patients have greater control over their health data and transactions, fostering a\"}]', 1, '2024-02-29 06:40:59', '2024-02-29 07:32:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `username`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ravi kumar', 'pravishi@mailinator.com', '9540839349', 'please support', 'please support urgent', '2024-03-02 03:37:37', NULL, NULL),
(4, 'new design', 'manish.gupta@techsaga.co.in', '9549949499', 'please support', 'testing mail', '2024-03-02 05:08:04', NULL, NULL),
(5, 'manjs', 'admin@gmail.com', '33333 33333', 'eeeeeeeeee', 'eeeeeeeeeeeee', '2024-03-02 06:56:41', NULL, NULL),
(7, 'rahul roya', 'admin123@gmail.com', '34242 42442', 'please support', 'retetetettetetetetetetetetetetetretetretet', '2024-03-04 00:13:04', NULL, NULL),
(8, 'apple', 'apple@gmail.com', '45555 55555', 'hfuryyrr', 'fdsfsfdsfsfsf', '2024-03-07 00:15:21', NULL, NULL),
(9, 'rttt', 'manish123.gupta@techsaga.co.in', '45353 53535', 'please support', '43353535343', '2024-03-11 04:21:51', NULL, NULL),
(10, 'anx', 'adminaqwr@gmail.com', '43333 33333', 'support', 'rteeeeeeeetetet', '2024-03-11 04:24:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency_to_euros`
--

CREATE TABLE `currency_to_euros` (
  `id` bigint UNSIGNED NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_rate` decimal(10,6) NOT NULL DEFAULT '0.000000' COMMENT '1 EUR = Currency Rate',
  `heal_coin` decimal(10,6) NOT NULL DEFAULT '0.000000' COMMENT '1 Currency Rate	= HC',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_to_euros`
--

INSERT INTO `currency_to_euros` (`id`, `country_name`, `currency_name`, `code`, `symbol`, `currency_rate`, `heal_coin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AFGHANISTAN', 'Afghani', 'AFN', '؋', '665.000000', '0.009774', '0', NULL, '2024-02-23 20:45:49'),
(3, 'ALBANIA', 'Lek', 'ALL', 'Lek', '103.950000', '0.062530', '0', NULL, '2024-02-23 20:45:49'),
(10, 'ARGENTINA', 'Argentine Peso', 'ARS', '$', '900.830000', '0.007216', '0', NULL, '2024-02-23 20:45:49'),
(12, 'ARUBA', 'Aruban Florin', 'AWG', 'ƒ', '20.000000', '0.325000', '0', NULL, '2024-02-23 20:45:49'),
(15, 'AZERBAIJAN', 'Azerbaijan Manat', 'AZN', 'ман', '1.830000', '3.551913', '0', NULL, '2024-02-23 20:45:49'),
(16, 'BAHAMAS (THE)', 'Bahamian Dollar', 'BSD', '$', '1.080000', '6.018519', '0', NULL, '2024-02-23 20:45:49'),
(19, 'BARBADOS', 'Barbados Dollar', 'BBD', '$', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(22, 'BELIZE', 'Belize Dollar', 'BZD', 'BZ$', '2.170000', '2.995392', '0', NULL, '2024-02-23 20:45:49'),
(24, 'BERMUDA', 'Bermudian Dollar', 'BMD', '$', '100.000000', '0.065000', '0', NULL, '2024-02-23 20:45:49'),
(27, 'BOLIVIA (PLURINATIONAL STATE OF)', 'Boliviano', 'BOB', '$b', '7.450000', '0.872483', '0', NULL, '2024-02-23 20:45:49'),
(30, 'BOSNIA AND HERZEGOVINA', 'Convertible Mark', 'BAM', 'KM', '1.960000', '3.316327', '0', NULL, '2024-02-23 20:45:49'),
(31, 'BOTSWANA', 'Pula', 'BWP', 'P', '14.750000', '0.440678', '0', NULL, '2024-02-23 20:45:49'),
(33, 'BRAZIL', 'Brazilian Real', 'BRL', 'R$', '5.350000', '1.214953', '0', NULL, '2024-02-23 20:45:49'),
(35, 'BRUNEI DARUSSALAM', 'Brunei Dollar', 'BND', '$', '1.450000', '4.482759', '0', NULL, '2024-02-23 20:45:49'),
(36, 'BULGARIA', 'Bulgarian Lev', 'BGN', 'лв', '1.960000', '3.316327', '0', NULL, '2024-02-23 20:45:49'),
(40, 'CAMBODIA', 'Riel', 'KHR', '៛', '4391.310000', '0.001480', '0', NULL, '2024-02-23 20:45:49'),
(42, 'CANADA', 'Canadian Dollar', 'CAD', '$', '1.450000', '4.482759', '0', NULL, '2024-02-23 20:45:49'),
(43, 'CAYMAN ISLANDS (THE)', 'Cayman Islands Dollar', 'KYD', '$', '0.900000', '7.222222', '0', NULL, '2024-02-23 20:45:49'),
(46, 'CHILE', 'Chilean Peso', 'CLP', '$', '1046.880000', '0.006209', '0', NULL, '2024-02-23 20:45:49'),
(48, 'CHINA', 'Yuan Renminbi', 'CNY', '¥', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(51, 'COLOMBIA', 'Colombian Peso', 'COP', '$', '4212.340000', '0.001543', '0', NULL, '2024-02-23 20:45:49'),
(57, 'COSTA RICA', 'Costa Rican Colon', 'CRC', '₡', '556.390000', '0.011682', '0', NULL, '2024-02-23 20:45:49'),
(60, 'CUBA', 'Cuban Peso', 'CUP', '₱', '25.860000', '0.251353', '0', NULL, '2024-02-23 20:45:49'),
(64, 'CZECHIA', 'Czech Koruna', 'CZK', 'Kč', '25.450000', '0.255403', '0', NULL, '2024-02-23 20:45:49'),
(68, 'DOMINICAN REPUBLIC (THE)', 'Dominican Peso', 'DOP', 'RD$', '63.160000', '0.102913', '0', NULL, '2024-02-23 20:45:49'),
(70, 'EGYPT', 'Egyptian Pound', 'EGP', '£', '33.300000', '0.195195', '0', NULL, '2024-02-23 20:45:49'),
(71, 'EL SALVADOR', 'El Salvador Colon', 'SVC', '$', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(79, 'FALKLAND ISLANDS (THE) [MALVINAS]', 'Falkland Islands Pound', 'FKP', '£', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(81, 'FIJI', 'Fiji Dollar', 'FJD', '$', '2.420000', '2.685950', '0', NULL, '2024-02-23 20:45:49'),
(92, 'GIBRALTAR', 'Gibraltar Pound', 'GIP', '£', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(94, 'GREENLAND', 'Danish Krone', 'DKK', 'kr', '0.550000', '11.818182', '0', NULL, '2024-02-23 20:45:49'),
(98, 'GUATEMALA', 'Quetzal', 'GTQ', 'Q', '7.820000', '0.831202', '0', NULL, '2024-02-23 20:45:49'),
(102, 'GUYANA', 'Guyana Dollar', 'GYD', '$', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(107, 'HONDURAS', 'Lempira', 'HNL', 'L', '24.710000', '0.263051', '0', NULL, '2024-02-23 20:45:49'),
(108, 'HONG KONG', 'Hong Kong Dollar', 'HKD', '$', '7.820000', '0.831202', '0', NULL, '2024-02-23 20:45:49'),
(109, 'HUNGARY', 'Forint', 'HUF', 'Ft', '361.590000', '0.017976', '0', NULL, '2024-02-23 20:45:49'),
(110, 'ICELAND', 'Iceland Krona', 'ISK', 'kr', '138.130000', '0.047057', '0', NULL, '2024-02-23 20:45:49'),
(111, 'INDIA', 'Indian Rupee', 'INR', '₹', '91.000000', '0.071429', '0', NULL, '2024-02-23 20:45:49'),
(114, 'IRAN (ISLAMIC REPUBLIC OF)', 'Iranian Rial', 'IRR', '﷼', '9999.999999', '0.000650', '0', NULL, '2024-02-23 20:45:49'),
(118, 'ISRAEL', 'New Israeli Sheqel', 'ILS', '₪', '3.630000', '1.790634', '0', NULL, '2024-02-23 20:45:49'),
(120, 'JAMAICA', 'Jamaican Dollar', 'JMD', 'J$', '156.850000', '0.041441', '0', NULL, '2024-02-23 20:45:49'),
(121, 'JAPAN', 'Yen', 'JPY', '¥', '150.410000', '0.043215', '0', NULL, '2024-02-23 20:45:49'),
(124, 'KAZAKHSTAN', 'Tenge', 'KZT', 'лв', '451.680000', '0.014391', '0', NULL, '2024-02-23 20:45:49'),
(127, 'KOREA (THE DEMOCRATIC PEOPLE\'S REPUBLIC OF)', 'North Korean Won', 'KPW', '₩', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(128, 'KOREA (THE REPUBLIC OF)', 'Won', 'KRW', '₩', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(130, 'KYRGYZSTAN', 'Som', 'KGS', 'лв', '89.430000', '0.072683', '0', NULL, '2024-02-23 20:45:49'),
(131, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC (THE)', 'Lao Kip', 'LAK', '₭', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(133, 'LEBANON', 'Lebanese Pound', 'LBP', '£', '9999.999999', '0.000650', '0', NULL, '2024-02-23 20:45:49'),
(136, 'LIBERIA', 'Liberian Dollar', 'LRD', '$', '190.500000', '0.034121', '0', NULL, '2024-02-23 20:45:49'),
(142, 'NORTH MACEDONIA', 'Denar', 'MKD', 'ден', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(145, 'MALAYSIA', 'Malaysian Ringgit', 'MYR', 'RM', '4.790000', '1.356994', '0', NULL, '2024-02-23 20:45:49'),
(152, 'MAURITIUS', 'Mauritius Rupee', 'MUR', '₨', '45.800000', '0.141921', '0', NULL, '2024-02-23 20:45:49'),
(155, 'MEXICO', 'Mexican Peso', 'MXN', '$', '17.060000', '0.381008', '0', NULL, '2024-02-23 20:45:49'),
(160, 'MONGOLIA', 'Tugrik', 'MNT', '₮', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(164, 'MOZAMBIQUE', 'Mozambique Metical', 'MZN', 'MT', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(166, 'NAMIBIA', 'Namibia Dollar', 'NAD', '$', '18.880000', '0.344280', '0', NULL, '2024-02-23 20:45:49'),
(169, 'NEPAL', 'Nepalese Rupee', 'NPR', '₨', '132.990000', '0.048876', '0', NULL, '2024-02-23 20:45:49'),
(173, 'NICARAGUA', 'Cordoba Oro', 'NIO', 'C$', '36.850000', '0.176391', '0', NULL, '2024-02-23 20:45:50'),
(175, 'NIGERIA', 'Naira', 'NGN', '₦', '1493.730000', '0.004352', '0', NULL, '2024-02-23 20:45:50'),
(180, 'OMAN', 'Rial Omani', 'OMR', '﷼', '0.380000', '17.105263', '0', NULL, '2024-02-23 20:45:50'),
(181, 'PAKISTAN', 'Pakistan Rupee', 'PKR', '₨', '277.140000', '0.023454', '0', NULL, '2024-02-23 20:45:50'),
(183, 'PANAMA', 'Balboa', 'PAB', 'B/.', '1.000000', '6.500000', '0', NULL, '2024-02-23 20:45:50'),
(186, 'PARAGUAY', 'Guarani', 'PYG', 'Gs', '7302.760000', '0.000890', '0', NULL, '2024-02-23 20:45:50'),
(188, 'PHILIPPINES (THE)', 'Philippine Peso', 'PHP', 'Php', '56.070000', '0.115927', '0', NULL, '2024-02-23 20:45:50'),
(190, 'POLAND', 'Zloty', 'PLN', 'zł', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(193, 'QATAR', 'Qatari Rial', 'QAR', '﷼', '3.640000', '1.785714', '0', NULL, '2024-02-23 20:45:50'),
(196, 'RUSSIAN FEDERATION (THE)', 'Russian Ruble', 'RUB', 'руб', '92.500000', '0.070270', '0', NULL, '2024-02-23 20:45:50'),
(199, 'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA', 'Saint Helena Pound', 'SHP', '£', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(204, 'SAINT VINCENT AND THE GRENADINES', 'East Caribbean Dollar', 'XCD', '$', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(208, 'SAUDI ARABIA', 'Saudi Riyal', 'SAR', '﷼', '3.750000', '1.733333', '0', NULL, '2024-02-23 20:45:50'),
(210, 'SERBIA', 'Serbian Dinar', 'RSD', 'Дин.', '108.790000', '0.059748', '0', NULL, '2024-02-23 20:45:50'),
(211, 'SEYCHELLES', 'Seychelles Rupee', 'SCR', '₨', '13.370000', '0.486163', '0', NULL, '2024-02-23 20:45:50'),
(213, 'SINGAPORE', 'Singapore Dollar', 'SGD', '$', '1.350000', '4.814815', '0', NULL, '2024-02-23 20:45:50'),
(218, 'SOLOMON ISLANDS', 'Solomon Islands Dollar', 'SBD', '$', '8.430000', '0.771056', '0', NULL, '2024-02-23 20:45:50'),
(219, 'SOMALIA', 'Somali Shilling', 'SOS', 'S', '571.500000', '0.011374', '0', NULL, '2024-02-23 20:45:50'),
(220, 'SOUTH AFRICA', 'Rand', 'ZAR', 'R', '18.990000', '0.342285', '0', NULL, '2024-02-23 20:45:50'),
(223, 'SRI LANKA', 'Sri Lanka Rupee', 'LKR', '₨', '312.940000', '0.020771', '0', NULL, '2024-02-23 20:45:50'),
(225, 'SURINAME', 'Surinam Dollar', 'SRD', '$', '36.150000', '0.179806', '0', NULL, '2024-02-23 20:45:50'),
(226, 'SVALBARD AND JAN MAYEN', 'Norwegian Krone', 'NOK', 'kr', '10.500000', '0.619048', '0', NULL, '2024-02-23 20:45:50'),
(227, 'SWEDEN', 'Swedish Krona', 'SEK', 'kr', '10.400000', '0.625000', '0', NULL, '2024-02-23 20:45:50'),
(228, 'SWITZERLAND', 'Swiss Franc', 'CHF', 'CHF', '0.880000', '7.386364', '0', NULL, '2024-02-23 20:45:50'),
(231, 'SYRIAN ARAB REPUBLIC', 'Syrian Pound', 'SYP', '£', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(232, 'TAIWAN (PROVINCE OF CHINA)', 'New Taiwan Dollar', 'TWD', 'NT$', '31.490000', '0.206415', '0', NULL, '2024-02-23 20:45:50'),
(235, 'THAILAND', 'Baht', 'THB', '฿', '36.160000', '0.179757', '0', NULL, '2024-02-23 20:45:50'),
(238, 'TOKELAU', 'New Zealand Dollar', 'NZD', '$', '1.630000', '3.987730', '0', NULL, '2024-02-23 20:45:50'),
(240, 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago Dollar', 'TTD', 'TT$', '6.790000', '0.957290', '0', NULL, '2024-02-23 20:45:50'),
(245, 'TUVALU', 'Australian Dollar', 'AUD', '$', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:12'),
(247, 'UKRAINE', 'Hryvnia', 'UAH', '₴', '30.890000', '0.210424', '0', NULL, '2024-02-23 20:45:50'),
(249, 'UNITED KINGDOM OF GREAT BRITAIN AND NORTHERN IRELAND (THE)', 'Pound Sterling', 'GBP', '£', '0.790000', '8.227848', '0', NULL, '2024-02-23 20:45:50'),
(253, 'URUGUAY', 'Peso Uruguayo', 'UYU', '$U', '39.160000', '0.165986', '0', NULL, '2024-02-23 20:45:50'),
(256, 'UZBEKISTAN', 'Uzbekistan Sum', 'UZS', 'лв', '9999.999999', '0.000650', '0', NULL, '2024-02-23 20:45:50'),
(259, 'VIET NAM', 'Dong', 'VND', '₫', '9999.999999', '0.000650', '0', NULL, '2024-02-23 20:45:50'),
(261, 'VIRGIN ISLANDS (U.S.)', 'US Dollar', 'USD', '$', '1.000000', '6.500000', '0', NULL, '2024-02-23 20:45:50'),
(264, 'YEMEN', 'Yemeni Rial', 'YER', '﷼', '250.350000', '0.025964', '0', NULL, '2024-02-23 20:45:50'),
(285, 'BELARUS', 'Belarusian Ruble', 'BYR', 'p.', '3.530000', '1.841360', '0', NULL, '2024-02-23 20:45:50'),
(302, 'CROATIA', 'Croatian Kuna', 'HRK', 'kn', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(319, 'GHANA', 'Cedi', 'GHC', '¢', '0.180000', '36.111111', '0', NULL, '2024-02-23 20:45:50'),
(336, 'LATVIA', 'Latvian Lats', 'LVL', 'Ls', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(340, 'LITHUANIA', 'Lithuanian Litas', 'LTL', 'Lt', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(360, 'NETHERLANDS ANTILLES', 'Netherlands Antillean Guilder', 'ANG', 'ƒ', '1.800000', '3.611111', '0', NULL, '2024-02-23 20:45:50'),
(364, 'PERU', 'Nuevo Sol', 'PEN', 'S/.', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(371, 'ROMANIA', 'New Romanian Leu', 'RON', 'lei', '4.620000', '1.406926', '0', NULL, '2024-02-23 20:45:50'),
(379, 'SERBIA AND MONTENEGRO', 'Euro', 'EUR', '€', '0.930000', '6.989247', '0', NULL, '2024-02-23 20:45:50'),
(395, 'TIMOR-LESTE', 'Rupiah', 'IDR', 'Rp', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(397, 'TURKEY', 'Old Turkish Lira', 'TRL', '£', '30.890000', '0.210424', '0', NULL, '2024-02-23 20:45:50'),
(398, 'TURKEY', 'New Turkish Lira', 'TRY', '₺', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(412, 'VENEZUELA (BOLIVARIAN REPUBLIC OF)', 'Bolívar', 'VEF', 'Bs', '0.000000', '0.000000', '0', NULL, '2024-01-22 11:32:13'),
(423, 'ZIMBABWE', 'Zimbabwe Dollar', 'ZWD', 'Z$', '22.900000', '0.283843', '0', NULL, '2024-02-23 20:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `empowerings`
--

CREATE TABLE `empowerings` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1' COMMENT '0 => Inactive, 1 => Active, 2 => Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empowerings`
--

INSERT INTO `empowerings` (`id`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p>Secure Online Donations: Make contributions securely through our user-friendly platform.</p>', 1, '2024-03-01 06:26:26', '2024-03-01 06:27:20', NULL),
(2, '<p>Support Healthcare Projects: Contribute to specific healthcare projects, helping those in need</p>', 1, '2024-03-01 06:27:03', NULL, NULL),
(3, '<p>Transparent Fund Utilization: Track how your donations are making a positive impact on patients and healthcare initiatives</p>', 1, '2024-03-01 06:27:39', NULL, NULL);

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
-- Table structure for table `health_cares`
--

CREATE TABLE `health_cares` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `appointments` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '0 => Inactive, 1 => Active, 2 => Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_cares`
--

INSERT INTO `health_cares` (`id`, `title`, `description`, `appointments`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Simplified Healthcare Management', '<p>Manage Your Health, Anytime, Anywhere Say goodbye to long waiting times and complicated health management. With [Your App/Portal Name], you have the power to:</p>', '[\"Book Appointments with Ease: Schedule and manage healthcare appointments at your fingertips.\",\"Access Personal Health Records: Your health information is securely stored and accessible whenever you need it.\",\"Telemedicine Services: Connect with healthcare professionals remotely for consultations and advice.\"]', '03052024060721-b.jpg,03052024060721-a.jpg', 1, '2024-03-01 04:18:55', '2024-03-05 00:37:21', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_28_130326_create_banners_table', 2),
(6, '2024_02_29_063659_create_cards_table', 3),
(7, '2024_02_29_073817_create_about_coins_table', 4),
(8, '2024_02_29_103929_create_cms_manages_table', 5),
(9, '2024_02_29_131740_create_health_cares_table', 6),
(10, '2024_03_01_104239_create_empowerings_table', 7),
(11, '2024_03_02_050733_create_testimonials_table', 8),
(12, '2024_03_02_074625_create_contacts_table', 9);

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
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1' COMMENT '0 => Inactive, 1 => Active, 2 => Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shubham', 'Tester', '2024030210185361.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, deserunt doloremque</p>', 1, '2024-03-02 01:08:20', '2024-03-02 04:48:53', NULL),
(2, 'Manish Kumar', 'web developer', '2024030210194535.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, deserunt doloremque</p>', 1, '2024-03-02 01:11:14', '2024-03-02 04:49:45', NULL),
(3, 'Rahul sen', 'Production', '2024030210195952.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, deserunt doloremque</p>', 1, '2024-03-02 01:11:47', '2024-03-11 01:09:54', NULL),
(4, 'Nancy', 'Android Developer', '2024030210201350.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, deserunt doloremque</p>', 1, '2024-03-02 01:12:21', '2024-03-02 04:50:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$JbXCqladSzbOjYgX.u8GjO7BLEBPB5nS5PnhSOHzHK0X5UmJdXK.W', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_coins`
--
ALTER TABLE `about_coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_manages`
--
ALTER TABLE `cms_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_to_euros`
--
ALTER TABLE `currency_to_euros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_to_euros_code_unique` (`code`);

--
-- Indexes for table `empowerings`
--
ALTER TABLE `empowerings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `health_cares`
--
ALTER TABLE `health_cares`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `about_coins`
--
ALTER TABLE `about_coins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_manages`
--
ALTER TABLE `cms_manages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `currency_to_euros`
--
ALTER TABLE `currency_to_euros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

--
-- AUTO_INCREMENT for table `empowerings`
--
ALTER TABLE `empowerings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_cares`
--
ALTER TABLE `health_cares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
