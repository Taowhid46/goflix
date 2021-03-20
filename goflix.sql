-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 10:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorySlug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `categorySlug`, `categoryDescription`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Netflix', 'netflix', 'Netflix, Inc. is an American technology and media services provider and production company headquartered in Los Gatos, California. Netflix was founded in 1997 by Reed Hastings and Marc Randolph in Scotts Valley, California.', 1, '2020-11-01 13:07:26', '2020-11-01 13:07:26'),
(7, 'Prime Video', 'prime-video', 'Prime Video, also marketed as Amazon Prime Video, is an American Internet video on demand service that is developed, owned, and operated by Amazon.', 1, NULL, NULL),
(8, 'Hulu', 'hulu', 'Hulu is an American subscription video on demand service fully controlled and majority-owned by The Walt Disney Company, with NBCUniversal, owned by Comcast, as an equity stakeholder.', 1, NULL, NULL),
(9, 'Others', 'others', 'Other streaming services.', 1, NULL, NULL),
(10, 'Gift Cards', 'gift-cards', 'Gift Cards', 1, '2020-11-01 14:12:13', '2020-11-01 14:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `colorId` int(11) NOT NULL,
  `colorName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`colorId`, `colorName`, `created_at`, `updated_at`) VALUES
(1, 'Red', '2018-05-19 07:55:13', '2018-05-19 07:55:13'),
(2, 'Green', '2018-05-19 07:55:20', '2018-05-19 07:55:20'),
(3, 'Blue', '2018-05-19 07:55:26', '2018-05-19 07:55:26'),
(4, 'Black', '2018-06-01 05:04:34', '2018-06-01 05:04:34'),
(5, 'Gray', '2018-06-01 05:04:40', '2018-06-01 05:04:40'),
(6, 'White', '2018-06-01 05:04:47', '2018-06-01 05:04:47'),
(7, 'Sky Blue', '2018-06-11 00:17:15', '2018-06-11 00:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` text,
  `number` varchar(55) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `number`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(19, 'shuvo', 'demo@gmail.com', 'Sylhet,companigonj', '01931312859', '$2y$10$oiGPPmdQ5///p/NsxuUkceUoY5viB6BJRkEhYmDHowWJp7Zy4z8Me', NULL, '2020-11-01 15:27:29', '2020-11-02 04:18:54', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufactureName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufactureDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `manufactureName`, `manufactureDescription`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Netflix', 'hjgh', 1, 0, '2018-05-24 09:41:28', '2018-05-24 09:41:28'),
(2, 'Prime video', 'do', 1, 1, '2018-05-24 09:41:37', '2018-06-08 02:21:19'),
(3, 'Hulu', 'doghjgj', 1, 1, '2018-05-24 09:41:53', '2018-06-08 02:21:24'),
(4, 'Others', 'hyht', 1, 1, '2018-05-24 09:46:45', '2018-06-08 02:21:30'),
(18, 'Prime video', 'Prime video', 1, 0, '2020-11-01 14:08:37', '2020-11-01 14:08:37'),
(19, 'Hulu', 'Hulu', 1, 0, '2020-11-01 14:08:50', '2020-11-01 14:08:50'),
(20, 'Hoichoi', 'Hoichoi', 1, 0, '2020-11-01 14:09:08', '2020-11-01 14:09:08'),
(21, 'Others', 'Others', 1, 0, '2020-11-01 14:09:19', '2020-11-01 14:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `media_id` int(11) NOT NULL,
  `media_src` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`media_id`, `media_src`, `created_at`, `updated_at`) VALUES
(1, '1527113712Watch 245.JPG', '2018-05-23 16:15:12', '2018-05-23 16:15:12'),
(2, '1527113869Queen Sharee.jpg', '2018-05-23 16:17:50', '2018-05-23 16:17:50'),
(3, '1527114210Queen Sharee.jpg', '2018-05-23 16:23:30', '2018-05-23 16:23:30'),
(7, '5146Queen Sharee.png', '2018-05-24 05:54:03', '2018-05-24 05:54:03'),
(8, '7481Queen Sharee.png', '2018-05-24 05:54:04', '2018-05-24 05:54:04'),
(9, '3012Queen Sharee.png', '2018-05-24 05:54:04', '2018-05-24 05:54:04'),
(10, '1527162843Queen Sharee.png', '2018-05-24 05:54:04', '2018-05-24 05:54:04'),
(11, '1527177074Queen Sharee.png', '2018-05-24 09:51:14', '2018-05-24 09:51:14'),
(12, '1527177154Watch 245.jpg', '2018-05-24 09:52:35', '2018-05-24 09:52:35'),
(13, '1527177250Watch 245.jpg', '2018-05-24 09:54:10', '2018-05-24 09:54:10'),
(14, '1527177283Watch 245.jpg', '2018-05-24 09:54:44', '2018-05-24 09:54:44'),
(15, '1527177328Watch 245.jpg', '2018-05-24 09:55:28', '2018-05-24 09:55:28'),
(16, '1527177487Watch 245.jpg', '2018-05-24 09:58:08', '2018-05-24 09:58:08'),
(17, '1527177689Watch 245.jpg', '2018-05-24 10:01:29', '2018-05-24 10:01:29'),
(18, '1527178078Watch 245.jpg', '2018-05-24 10:07:58', '2018-05-24 10:07:58'),
(19, '1527178088Watch 245.jpg', '2018-05-24 10:08:08', '2018-05-24 10:08:08'),
(20, '8187Watch 245.png', '2018-05-24 10:08:08', '2018-05-24 10:08:08'),
(21, '4796Watch 245.png', '2018-05-24 10:08:08', '2018-05-24 10:08:08'),
(22, '1527178243Watch 245.jpg', '2018-05-24 10:10:43', '2018-05-24 10:10:43'),
(23, '3050Watch 245.png', '2018-05-24 10:10:43', '2018-05-24 10:10:43'),
(24, '8766Watch 245.png', '2018-05-24 10:10:43', '2018-05-24 10:10:43'),
(25, '1527178536Watch 245.jpg', '2018-05-24 10:15:36', '2018-05-24 10:15:36'),
(26, '6123Watch 245.png', '2018-05-24 10:15:36', '2018-05-24 10:15:36'),
(27, '7799Watch 245.png', '2018-05-24 10:15:37', '2018-05-24 10:15:37'),
(28, '1527178729Queen Sharee.jpg', '2018-05-24 10:18:49', '2018-05-24 10:18:49'),
(29, '1527181295Queen.png', '2018-05-24 11:01:35', '2018-05-24 11:01:35'),
(30, '3493Queen.png', '2018-05-24 11:01:35', '2018-05-24 11:01:35'),
(31, '1318Queen.png', '2018-05-24 11:01:35', '2018-05-24 11:01:35'),
(32, '1527496241Queen.jpg', '2018-05-28 02:30:41', '2018-05-28 02:30:41'),
(33, '1527498454Queen Farha.jpg', '2018-05-28 03:07:34', '2018-05-28 03:07:34'),
(34, '4334Queen Farha.jpg', '2018-05-28 03:08:02', '2018-05-28 03:08:02'),
(35, '7369Queen Farha.jpg', '2018-05-28 03:08:32', '2018-05-28 03:08:32'),
(36, '525Queen Farha.png', '2018-05-28 03:08:32', '2018-05-28 03:08:32'),
(37, '1527499420Queen Farha.jpg', '2018-05-28 03:23:40', '2018-05-28 03:23:40'),
(38, '4896Queen Farha.jpg', '2018-05-28 03:23:40', '2018-05-28 03:23:40'),
(39, '1527850389t-SHIRTS.png', '2018-06-01 04:53:10', '2018-06-01 04:53:10'),
(40, '1527851000Next Blue Blazer.png', '2018-06-01 05:03:21', '2018-06-01 05:03:21'),
(41, '4442Next Blue Blazer.jpg', '2018-06-01 05:03:21', '2018-06-01 05:03:21'),
(42, '1527851264Air Tshirt Black.png', '2018-06-01 05:07:44', '2018-06-01 05:07:44'),
(43, '3662Air Tshirt Black.png', '2018-06-01 05:07:44', '2018-06-01 05:07:44'),
(44, '5684Air Tshirt Black.png', '2018-06-01 05:07:44', '2018-06-01 05:07:44'),
(45, '1527851584Shirts.png', '2018-06-01 05:13:04', '2018-06-01 05:13:04'),
(46, '1527852915Anarkoli Hand Bag.png', '2018-06-01 05:35:15', '2018-06-01 05:35:15'),
(47, '1527853043Short Description of hand bag kuai.png', '2018-06-01 05:37:23', '2018-06-01 05:37:23'),
(48, '1527853317T-shirt.png', '2018-06-01 05:41:57', '2018-06-01 05:41:57'),
(49, '1527853516Watch Li12.png', '2018-06-01 05:45:16', '2018-06-01 05:45:16'),
(50, '359Watch Li12.png', '2018-06-01 05:45:16', '2018-06-01 05:45:16'),
(51, '6883Watch Li12.png', '2018-06-01 05:45:16', '2018-06-01 05:45:16'),
(52, '4064I-phone 7.jpg', '2018-06-01 05:45:47', '2018-06-01 05:45:47'),
(53, '1088I-phone 7.jpg', '2018-06-01 05:45:48', '2018-06-01 05:45:48'),
(54, '1527853792Ro-watch 15.jpg', '2018-06-01 05:49:52', '2018-06-01 05:49:52'),
(55, '6573Ro-watch 15.jpg', '2018-06-01 05:49:52', '2018-06-01 05:49:52'),
(56, '7399Ro-watch 15.png', '2018-06-01 05:49:52', '2018-06-01 05:49:52'),
(57, '1527853963Sport Shoes.png', '2018-06-01 05:52:44', '2018-06-01 05:52:44'),
(58, '972Sport Shoes.jpg', '2018-06-01 05:52:44', '2018-06-01 05:52:44'),
(59, '2181Sport Shoes.jpg', '2018-06-01 05:52:44', '2018-06-01 05:52:44'),
(60, '1527854210Samsung s7.png', '2018-06-01 05:56:50', '2018-06-01 05:56:50'),
(61, '294Samsung s7.png', '2018-06-01 05:56:50', '2018-06-01 05:56:50'),
(62, '1829Samsung s7.png', '2018-06-01 05:56:50', '2018-06-01 05:56:50'),
(63, '1528445351Test Product.png', '2018-06-08 02:09:12', '2018-06-08 02:09:12'),
(64, '8678Test Product.png', '2018-06-08 02:09:12', '2018-06-08 02:09:12'),
(65, '6982Test Product.png', '2018-06-13 03:26:19', '2018-06-13 03:26:19'),
(66, '1471Test Product.png', '2018-06-13 03:26:19', '2018-06-13 03:26:19'),
(67, '1530682846Test Pro.jpg', '2018-07-03 23:40:47', '2018-07-03 23:40:47'),
(68, '1530685724.jpg', '2018-07-04 00:28:44', '2018-07-04 00:28:44'),
(69, '1530685748.jpg', '2018-07-04 00:29:08', '2018-07-04 00:29:08'),
(70, '1530686591.jpg', '2018-07-04 00:43:11', '2018-07-04 00:43:11'),
(71, '1530689548.jpg', '2018-07-04 01:32:28', '2018-07-04 01:32:28'),
(72, '1533354540.jpg', '2018-08-03 21:49:00', '2018-08-03 21:49:00'),
(73, '1533354581.jpg', '2018-08-03 21:49:41', '2018-08-03 21:49:41'),
(74, '1604255829Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 12:37:10', '2020-11-01 12:37:10'),
(75, '1604256303Netflix 30 Days 1 Screen (Renewable and Shared).png', '2020-11-01 12:45:03', '2020-11-01 12:45:03'),
(76, '1604256457Netflix 30 Days 1 Screen (Renewable and Shared).png', '2020-11-01 12:47:37', '2020-11-01 12:47:37'),
(77, '1604256517Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 12:48:37', '2020-11-01 12:48:37'),
(78, '1604256824Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 12:53:44', '2020-11-01 12:53:44'),
(79, '1604257042Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 12:57:22', '2020-11-01 12:57:22'),
(80, '1604257057Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 12:57:37', '2020-11-01 12:57:37'),
(81, '1604257135Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 12:58:55', '2020-11-01 12:58:55'),
(82, '1604257167Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 12:59:27', '2020-11-01 12:59:27'),
(83, '1604257489Netflix 30 Days 1 Screen (Renewable and Shared).jpg', '2020-11-01 13:04:50', '2020-11-01 13:04:50'),
(84, '1604257660Netflix 30 Days 1 Screen (Renewable and Shared).png', '2020-11-01 13:07:40', '2020-11-01 13:07:40'),
(85, '1604257765Netflix 2.5 Month 1 Screen (Shared).png', '2020-11-01 13:09:25', '2020-11-01 13:09:25'),
(86, '8997Netflix 30 Days 1 Screen (Renewable and Shared).png', '2020-11-01 13:13:41', '2020-11-01 13:13:41'),
(87, '1604259265Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:34:25', '2020-11-01 13:34:25'),
(88, '1604259301Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:35:01', '2020-11-01 13:35:01'),
(89, '1604259353Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:35:53', '2020-11-01 13:35:53'),
(90, '1604259413Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:36:53', '2020-11-01 13:36:53'),
(91, '1604259446Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:37:26', '2020-11-01 13:37:26'),
(92, '1604259488Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:38:08', '2020-11-01 13:38:08'),
(93, '1604259499Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:38:19', '2020-11-01 13:38:19'),
(94, '1604259508Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:38:28', '2020-11-01 13:38:28'),
(95, '1604259566Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:39:26', '2020-11-01 13:39:26'),
(96, '1604260229Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:50:30', '2020-11-01 13:50:30'),
(97, '1604260344Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:52:25', '2020-11-01 13:52:25'),
(98, '1604260379Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:52:59', '2020-11-01 13:52:59'),
(99, '1604260453Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:54:13', '2020-11-01 13:54:13'),
(100, '1604260476Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:54:36', '2020-11-01 13:54:36'),
(101, '1604260509Netflix 6 month 1 Screen (Shared).png', '2020-11-01 13:55:09', '2020-11-01 13:55:09'),
(102, '1604260570Netflix 6 month 1 Screen (Shared).png', '2020-11-01 13:56:10', '2020-11-01 13:56:10'),
(103, '1604260609Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:56:50', '2020-11-01 13:56:50'),
(104, '1604260691Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 13:58:11', '2020-11-01 13:58:11'),
(105, '1604260948Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 14:02:28', '2020-11-01 14:02:28'),
(106, '1604261211Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 14:06:51', '2020-11-01 14:06:51'),
(107, '1604261405Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 14:10:05', '2020-11-01 14:10:05'),
(108, '1604261435Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 14:10:35', '2020-11-01 14:10:35'),
(109, '8345Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 14:10:35', '2020-11-01 14:10:35'),
(110, '1604261677Netflix Full Account (Private).png', '2020-11-01 14:14:37', '2020-11-01 14:14:37'),
(111, '1604261696Netflix Full Account (Private).png', '2020-11-01 14:14:56', '2020-11-01 14:14:56'),
(112, '1604261726Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 14:15:26', '2020-11-01 14:15:26'),
(113, '1604261733Netflix 6 month 1 Screen (Shared).jpg', '2020-11-01 14:15:33', '2020-11-01 14:15:33'),
(114, '1604261758Netflix 6 month 1 Screen (Shared).png', '2020-11-01 14:15:58', '2020-11-01 14:15:58'),
(115, '1604261782Netflix Full Account (Private).png', '2020-11-01 14:16:22', '2020-11-01 14:16:22'),
(116, '1604261824.jpg', '2020-11-01 14:17:04', '2020-11-01 14:17:04'),
(117, '1604261833.jpg', '2020-11-01 14:17:13', '2020-11-01 14:17:13'),
(118, '1604261839.jpg', '2020-11-01 14:17:19', '2020-11-01 14:17:19'),
(119, '1604261996Netflix Full Account (Private).png', '2020-11-01 14:19:56', '2020-11-01 14:19:56'),
(120, '1604262191Netflix Full Account (Private).png', '2020-11-01 14:23:11', '2020-11-01 14:23:11'),
(121, '1604262413Netflix Full Account (Private).png', '2020-11-01 14:26:53', '2020-11-01 14:26:53'),
(122, '1604262510Netflix Full Account (Private).png', '2020-11-01 14:28:30', '2020-11-01 14:28:30'),
(123, '5166Netflix Full Account (Private).png', '2020-11-01 14:28:30', '2020-11-01 14:28:30'),
(124, '1604262664Netflix 1 year 1 Screen (Shared).png', '2020-11-01 14:31:04', '2020-11-01 14:31:04'),
(125, '326Netflix 1 year 1 Screen (Shared).png', '2020-11-01 14:31:04', '2020-11-01 14:31:04'),
(126, '1604262827Netflix 1 year 1 Screen (Shared).png', '2020-11-01 14:33:48', '2020-11-01 14:33:48'),
(127, '6035Netflix 1 year 1 Screen (Shared).png', '2020-11-01 14:33:48', '2020-11-01 14:33:48'),
(128, '1604263001Banana Prime ( Personal ).jpg', '2020-11-01 14:36:41', '2020-11-01 14:36:41'),
(129, '3332Banana Prime ( Personal ).jpg', '2020-11-01 14:36:41', '2020-11-01 14:36:41');

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
(55, '2014_10_12_000000_create_users_table', 1),
(56, '2014_10_12_100000_create_password_resets_table', 1),
(57, '2018_05_10_034357_create_categories_table', 1),
(58, '2018_05_11_121902_create_manufactures_table', 1),
(59, '2018_05_13_110528_create_tags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_data` text NOT NULL,
  `payment_type` varchar(64) NOT NULL,
  `bkashNumber` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_data`, `payment_type`, `bkashNumber`, `status`, `seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '{\"1480b2d809d6ae14be0fb92e06608d69\":{\"rowId\":\"1480b2d809d6ae14be0fb92e06608d69\",\"id\":13,\"name\":\"Air Tshirt Black\",\"qty\":\"4\",\"price\":100,\"options\":{\"image\":\"1527851264Air Tshirt Black.png\"},\"tax\":21,\"subtotal\":400},\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":\"6\",\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":600}}', 'cash_on_delivery', NULL, 1, 0, '2020-11-01 20:25:25', '2020-11-01 14:25:25', '2020-11-01 14:25:25'),
(2, 1, '{\"1480b2d809d6ae14be0fb92e06608d69\":{\"rowId\":\"1480b2d809d6ae14be0fb92e06608d69\",\"id\":13,\"name\":\"Air Tshirt Black\",\"qty\":\"4\",\"price\":100,\"options\":{\"image\":\"1527851264Air Tshirt Black.png\"},\"tax\":21,\"subtotal\":400},\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":\"6\",\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":600}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:27', '2020-11-01 14:25:27', '2020-11-01 14:25:27'),
(3, 1, '[]', 'cash_on_delivery', NULL, 0, 1, '2020-11-01 20:25:29', '2020-11-01 14:25:29', '2020-11-01 14:25:29'),
(4, 1, '{\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":1,\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":120}}', 'bkash', '01746150145', 0, 1, '2020-11-01 20:25:30', '2020-11-01 14:25:30', '2020-11-01 14:25:30'),
(5, 4, '{\"6f506e7f0ca4c1d7d55530af2eb088ab\":{\"rowId\":\"6f506e7f0ca4c1d7d55530af2eb088ab\",\"id\":\"14\",\"name\":\"Next Blue Blazer\",\"qty\":\"2\",\"price\":90,\"options\":{\"image\":\"1527851000Next Blue Blazer.png\",\"size\":\"XL\",\"color\":\"Red.\",\"code\":\"bla7rf5rw\"},\"tax\":18.9,\"subtotal\":180},\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":1,\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":120}}', 'cash_on_delivery', NULL, 1, 1, '2020-11-01 20:25:31', '2020-11-01 14:25:31', '2020-11-01 14:25:31'),
(6, 4, '{\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":\"2\",\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":240},\"f83baab45f9d3b17b9c868cf6e43d61c\":{\"rowId\":\"f83baab45f9d3b17b9c868cf6e43d61c\",\"id\":18,\"name\":\"Samsung s7\",\"qty\":\"2\",\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\"},\"tax\":105,\"subtotal\":1000}}', 'bkash', '01746152147', 0, 1, '2020-11-01 20:25:32', '2020-11-01 14:25:32', '2020-11-01 14:25:32'),
(7, 4, '{\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":\"2\",\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":200},\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":\"2\",\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":240},\"f83baab45f9d3b17b9c868cf6e43d61c\":{\"rowId\":\"f83baab45f9d3b17b9c868cf6e43d61c\",\"id\":18,\"name\":\"Samsung s7\",\"qty\":\"3\",\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\"},\"tax\":105,\"subtotal\":1500}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:33', '2020-11-01 14:25:33', '2020-11-01 14:25:33'),
(8, 1, '{\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":\"3\",\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":300}}', 'bkash', '0178457845', 0, 0, '2020-11-01 20:25:34', '2020-11-01 14:25:34', '2020-11-01 14:25:34'),
(9, 1, '{\"20fb01bc06ee1e005c09fc732ab51a25\":{\"rowId\":\"20fb01bc06ee1e005c09fc732ab51a25\",\"id\":\"15\",\"name\":\"t-SHIRTS\",\"qty\":\"4\",\"price\":110,\"options\":{\"image\":\"1527850389t-SHIRTS.png\",\"size\":\"Double XL\",\"color\":\"Green.10\",\"code\":\"s1h45e\"},\"tax\":23.1,\"subtotal\":440},\"116dd028d255ce1b50185c049a096bcf\":{\"rowId\":\"116dd028d255ce1b50185c049a096bcf\",\"id\":\"18\",\"name\":\"Samsung s7\",\"qty\":\"3\",\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\",\"size\":\"XL\",\"color\":\"Green.\",\"code\":\"s!e#j43@$\"},\"tax\":105,\"subtotal\":1500},\"ff5e9c01aa09c6d75d53421d307f7b7b\":{\"rowId\":\"ff5e9c01aa09c6d75d53421d307f7b7b\",\"id\":\"14\",\"name\":\"Next Blue Blazer\",\"qty\":\"3\",\"price\":90,\"options\":{\"image\":\"1527851000Next Blue Blazer.png\",\"size\":\"Double XL\",\"color\":\"Red.\",\"code\":\"bla7rf5rw\"},\"tax\":18.9,\"subtotal\":270}}', 'bkash', '01746152147', 0, 0, '2020-11-01 20:25:36', '2020-11-01 14:25:36', '2020-11-01 14:25:36'),
(10, 1, '{\"8fc6d311b544787348d1e7f0b7409414\":{\"rowId\":\"8fc6d311b544787348d1e7f0b7409414\",\"id\":16,\"name\":\"I-phone 7\",\"qty\":\"2\",\"price\":120,\"options\":{\"image\":\"1527178729Queen Sharee.jpg\"},\"tax\":25.2,\"subtotal\":240}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:38', '2020-11-01 14:25:38', '2020-11-01 14:25:38'),
(11, 1, '{\"f83baab45f9d3b17b9c868cf6e43d61c\":{\"rowId\":\"f83baab45f9d3b17b9c868cf6e43d61c\",\"id\":18,\"name\":\"Samsung s7\",\"qty\":\"3\",\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\"},\"tax\":105,\"subtotal\":1500}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:40', '2020-11-01 14:25:40', '2020-11-01 14:25:40'),
(12, 1, '{\"b6ebf7c3a0cb85adb93a54959b5c5967\":{\"rowId\":\"b6ebf7c3a0cb85adb93a54959b5c5967\",\"id\":\"19\",\"name\":\"Test Product\",\"qty\":\"1\",\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\",\"size\":\"X\",\"color\":\"Red.\",\"code\":\"!22ef#!wd\"},\"tax\":25.2,\"subtotal\":120}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:42', '2020-11-01 14:25:42', '2020-11-01 14:25:42'),
(13, 1, '{\"7b06b11eb848bc80dfb73b38c0e1e17f\":{\"rowId\":\"7b06b11eb848bc80dfb73b38c0e1e17f\",\"id\":\"19\",\"name\":\"Test Product\",\"qty\":\"2\",\"price\":122,\"options\":{\"image\":\"1528445351Test Product.png\",\"size\":\"X\",\"color\":\"Black.2\",\"code\":\"!22ef#!wd\"},\"tax\":25.62,\"subtotal\":244}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:44', '2020-11-01 14:25:44', '2020-11-01 14:25:44'),
(14, 1, '{\"f83baab45f9d3b17b9c868cf6e43d61c\":{\"rowId\":\"f83baab45f9d3b17b9c868cf6e43d61c\",\"id\":18,\"name\":\"Samsung s7\",\"qty\":\"5\",\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\"},\"tax\":105,\"subtotal\":2500},\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":\"7\",\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":700},\"5d61547f575f29e699a53d9ed43aa997\":{\"rowId\":\"5d61547f575f29e699a53d9ed43aa997\",\"id\":15,\"name\":\"t-SHIRTS\",\"qty\":\"5\",\"price\":100,\"options\":{\"image\":\"1527850389t-SHIRTS.png\"},\"tax\":21,\"subtotal\":500},\"49eb1c2e01a310bec71308eb0d721cab\":{\"rowId\":\"49eb1c2e01a310bec71308eb0d721cab\",\"id\":12,\"name\":\"Shirts\",\"qty\":\"3\",\"price\":120,\"options\":{\"image\":\"1527851584Shirts.png\"},\"tax\":25.2,\"subtotal\":360},\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":\"3\",\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":360}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:45', '2020-11-01 14:25:45', '2020-11-01 14:25:45'),
(15, 1, '{\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":\"2\",\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":240}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:47', '2020-11-01 14:25:47', '2020-11-01 14:25:47'),
(16, 1, '{\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":\"3\",\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":300},\"1480b2d809d6ae14be0fb92e06608d69\":{\"rowId\":\"1480b2d809d6ae14be0fb92e06608d69\",\"id\":13,\"name\":\"Air Tshirt Black\",\"qty\":1,\"price\":100,\"options\":{\"image\":\"1527851264Air Tshirt Black.png\"},\"tax\":21,\"subtotal\":100}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:49', '2020-11-01 14:25:49', '2020-11-01 14:25:49'),
(17, 4, '{\"f305f30803f02297153daaa078bb7f68\":{\"rowId\":\"f305f30803f02297153daaa078bb7f68\",\"id\":\"19\",\"name\":\"Test Product\",\"qty\":\"3\",\"price\":122,\"options\":{\"image\":\"1528445351Test Product.png\",\"size\":\"M\",\"color\":\"Black.2\",\"code\":\"!22ef#!wd\"},\"tax\":25.62,\"subtotal\":366}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:50', '2020-11-01 14:25:50', '2020-11-01 14:25:50'),
(18, 1, '{\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":1,\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":100},\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":1,\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":120}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:52', '2020-11-01 14:25:52', '2020-11-01 14:25:52'),
(19, 1, '{\"77aa8808a24c9ac58dc9f91f9c3ec2dd\":{\"rowId\":\"77aa8808a24c9ac58dc9f91f9c3ec2dd\",\"id\":14,\"name\":\"Next Blue Blazer\",\"qty\":\"3\",\"price\":90,\"options\":{\"image\":\"1527851000Next Blue Blazer.png\"},\"tax\":18.9,\"subtotal\":270}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:53', '2020-11-01 14:25:53', '2020-11-01 14:25:53'),
(20, 1, '{\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":1,\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":100}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:55', '2020-11-01 14:25:55', '2020-11-01 14:25:55'),
(21, 18, '{\"cb3263ebb5612f9c3e65bd7884b6b03c\":{\"rowId\":\"cb3263ebb5612f9c3e65bd7884b6b03c\",\"id\":20,\"name\":\"Test Pro\",\"qty\":\"1\",\"price\":100,\"options\":{\"image\":\"1530682846Test Pro.jpg\"},\"tax\":21,\"subtotal\":100},\"b087a22c6c9b887bb3e64958c6f95b6a\":{\"rowId\":\"b087a22c6c9b887bb3e64958c6f95b6a\",\"id\":19,\"name\":\"Test Product\",\"qty\":\"1\",\"price\":120,\"options\":{\"image\":\"1528445351Test Product.png\"},\"tax\":25.2,\"subtotal\":120},\"f83baab45f9d3b17b9c868cf6e43d61c\":{\"rowId\":\"f83baab45f9d3b17b9c868cf6e43d61c\",\"id\":18,\"name\":\"Samsung s7\",\"qty\":1,\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\"},\"tax\":105,\"subtotal\":500},\"09fd0b6b1c8c10052d77dccf52e4714f\":{\"rowId\":\"09fd0b6b1c8c10052d77dccf52e4714f\",\"id\":8,\"name\":\"T-shirt\",\"qty\":1,\"price\":30,\"options\":{\"image\":\"1527853317T-shirt.png\"},\"tax\":6.3,\"subtotal\":30},\"1480b2d809d6ae14be0fb92e06608d69\":{\"rowId\":\"1480b2d809d6ae14be0fb92e06608d69\",\"id\":13,\"name\":\"Air Tshirt Black\",\"qty\":2,\"price\":100,\"options\":{\"image\":\"1527851264Air Tshirt Black.png\"},\"tax\":21,\"subtotal\":200},\"77aa8808a24c9ac58dc9f91f9c3ec2dd\":{\"rowId\":\"77aa8808a24c9ac58dc9f91f9c3ec2dd\",\"id\":14,\"name\":\"Next Blue Blazer\",\"qty\":1,\"price\":90,\"options\":{\"image\":\"1527851000Next Blue Blazer.png\"},\"tax\":18.9,\"subtotal\":90},\"5d61547f575f29e699a53d9ed43aa997\":{\"rowId\":\"5d61547f575f29e699a53d9ed43aa997\",\"id\":15,\"name\":\"t-SHIRTS\",\"qty\":1,\"price\":100,\"options\":{\"image\":\"1527850389t-SHIRTS.png\"},\"tax\":21,\"subtotal\":100},\"8fc6d311b544787348d1e7f0b7409414\":{\"rowId\":\"8fc6d311b544787348d1e7f0b7409414\",\"id\":16,\"name\":\"I-phone 7\",\"qty\":1,\"price\":120,\"options\":{\"image\":\"1527178729Queen Sharee.jpg\"},\"tax\":25.2,\"subtotal\":120}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:56', '2020-11-01 14:25:56', '2020-11-01 14:25:56'),
(22, 18, '{\"09fd0b6b1c8c10052d77dccf52e4714f\":{\"rowId\":\"09fd0b6b1c8c10052d77dccf52e4714f\",\"id\":8,\"name\":\"T-shirt\",\"qty\":1,\"price\":30,\"options\":{\"image\":\"1527853317T-shirt.png\"},\"tax\":6.3,\"subtotal\":30},\"1480b2d809d6ae14be0fb92e06608d69\":{\"rowId\":\"1480b2d809d6ae14be0fb92e06608d69\",\"id\":13,\"name\":\"Air Tshirt Black\",\"qty\":1,\"price\":100,\"options\":{\"image\":\"1527851264Air Tshirt Black.png\"},\"tax\":21,\"subtotal\":100},\"f83baab45f9d3b17b9c868cf6e43d61c\":{\"rowId\":\"f83baab45f9d3b17b9c868cf6e43d61c\",\"id\":18,\"name\":\"Samsung s7\",\"qty\":1,\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\"},\"tax\":105,\"subtotal\":500},\"116dd028d255ce1b50185c049a096bcf\":{\"rowId\":\"116dd028d255ce1b50185c049a096bcf\",\"id\":\"18\",\"name\":\"Samsung s7\",\"qty\":\"1\",\"price\":500,\"options\":{\"image\":\"1527854210Samsung s7.png\",\"size\":\"XL\",\"color\":\"Green.\",\"code\":\"s!e#j43@$\"},\"tax\":105,\"subtotal\":500}}', 'cash_on_delivery', NULL, 0, 0, '2020-11-01 20:25:57', '2020-11-01 14:25:57', '2020-11-01 14:25:57'),
(23, 19, '{\"ba6537d6d39813842bb46d2ea107cdd5\":{\"rowId\":\"ba6537d6d39813842bb46d2ea107cdd5\",\"id\":28,\"name\":\"Banana Prime ( Personal )\",\"qty\":\"2\",\"price\":499,\"options\":{\"image\":\"1604263001Banana Prime ( Personal ).jpg\"},\"tax\":104.78999999999999,\"subtotal\":998}}', 'cash_on_delivery', NULL, 0, 1, '2020-11-02 17:35:20', '2020-11-02 11:35:20', NULL),
(24, 19, '{\"5fca6fd850eb4ee3555e6c53ab086c3d\":{\"rowId\":\"5fca6fd850eb4ee3555e6c53ab086c3d\",\"id\":26,\"name\":\"Netflix 1 year 1 Screen (Shared)\",\"qty\":1,\"price\":1300,\"options\":{\"image\":\"1604262664Netflix 1 year 1 Screen (Shared).png\"},\"tax\":273,\"subtotal\":1300}}', 'bkash', '0178996445', 1, 1, '2020-11-02 08:19:25', '2020-11-02 02:19:25', NULL),
(25, 19, '{\"6427ac2a1b823061971e189969f76c57\":{\"rowId\":\"6427ac2a1b823061971e189969f76c57\",\"id\":22,\"name\":\"Netflix 30 Days 1 Screen (Renewable and Shared)\",\"qty\":1,\"price\":290,\"options\":{\"image\":\"1604257660Netflix 30 Days 1 Screen (Renewable and Shared).png\"},\"tax\":60.9,\"subtotal\":290}}', 'cash_on_delivery', NULL, 1, 1, '2020-11-02 08:19:45', '2020-11-02 02:19:45', NULL),
(26, 19, '{\"8c3a8a9d4dddb29494f715484c167c27\":{\"rowId\":\"8c3a8a9d4dddb29494f715484c167c27\",\"id\":\"22\",\"name\":\"Netflix 30 Days 1 Screen (Renewable and Shared)\",\"qty\":\"1\",\"price\":290,\"options\":{\"image\":\"1604257660Netflix 30 Days 1 Screen (Renewable and Shared).png\",\"size\":null,\"color\":null,\"code\":\"123\"},\"tax\":60.9,\"subtotal\":290}}', 'cash_on_delivery', NULL, 1, 0, '2020-11-02 08:19:54', '2020-11-02 02:19:54', NULL),
(27, 19, '{\"8c3a8a9d4dddb29494f715484c167c27\":{\"rowId\":\"8c3a8a9d4dddb29494f715484c167c27\",\"id\":\"22\",\"name\":\"Netflix 30 Days 1 Screen (Renewable and Shared)\",\"qty\":\"1\",\"price\":290,\"options\":{\"image\":\"1604257660Netflix 30 Days 1 Screen (Renewable and Shared).png\",\"size\":null,\"color\":null,\"code\":\"123\"},\"tax\":60.9,\"subtotal\":290}}', 'bkash', '0178996445', 0, 0, '2020-11-02 02:38:37', '2020-11-02 02:38:37', NULL),
(28, 19, '{\"6427ac2a1b823061971e189969f76c57\":{\"rowId\":\"6427ac2a1b823061971e189969f76c57\",\"id\":22,\"name\":\"Netflix 30 Days 1 Screen (Renewable and Shared)\",\"qty\":\"3\",\"price\":290,\"options\":{\"image\":\"1604257660Netflix 30 Days 1 Screen (Renewable and Shared).png\"},\"tax\":60.9,\"subtotal\":870}}', 'bkash', '01931312859', 0, 0, '2020-11-02 04:18:54', '2020-11-02 04:18:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productSlug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productShortDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productLongDescription` text COLLATE utf8mb4_unicode_ci,
  `productRegularPrice` double(10,2) NOT NULL,
  `productSalePrice` double(10,2) DEFAULT NULL,
  `productQuantity` int(11) NOT NULL,
  `productImage` int(11) DEFAULT NULL,
  `tagIds` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufactureId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productSlug`, `productCode`, `productShortDescription`, `productLongDescription`, `productRegularPrice`, `productSalePrice`, `productQuantity`, `productImage`, `tagIds`, `manufactureId`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Netflix 30 Days 1 Screen (Renewable and Shared)', 'netflix-30-days-1-screen-renewable-and-shared', '123', '1 month renewable id ata so ai id nite hole condition holo at least 2-3 month continue korte e hobe. Account meyad sesh hoar 2-3 din agey amader k knock dite hobe facebook page or whatsapp a. knock deoar por apnar order number and amra netflix ar jnnw j email id ta dibo oi ta amder k dite hobe. [Asole amra knock deoar kotha but website hoar karone akto problem hoye jay maintain korte tai 1st month kosto kore knock diben ar por thake ar lagbe na tokhn amra e knock dibo]\r\nশুধুমাত্র একটি ডিভাইসে ব্যবহার করতে পারবেন।\r\nআপনাকে যেই প্রোফাইল শুধু মাত্র সেই প্রোফাইল ব্যবহার করতে হবে অন্যদের প্রোফাইলে ঢুকা যাবে না।\r\nইমেইল চেঞ্জ/পাসওয়ার্ড চেঞ্জ করা যাবে না কারন এটি শেয়ার্ড একাউন্ট (যদি চেঞ্জ করেন তাহলে আপনার একাউন্ট হারাবেন)\r\nপাসওয়ার্ড চেঞ্জ পেলে আমাদের FB Page a মেসেজ দিন OR call:- 01521516803 OR message us on whatapp:- 01521516803.\r\nour page name and link :- Premium BD Streaming (64k like) – https://www.facebook.com/PremiumBDStreaming/', NULL, 350.00, 290.00, 1, 84, '', 1, 1, '2020-11-01 13:07:40', '2020-11-01 13:07:40'),
(23, 'Netflix 2.5 Month 1 Screen (Shared)', 'netflix-25-month-1-screen-shared', '124', 'শুধুমাত্র একটি ডিভাইসে ব্যবহার করতে পারবেন। ২ টি ডিভাইসে লগইন রাখতে পারেন কিন্তু একই সময়ে একটি ব্যবহার করতে হবে।\r\nআপনাকে যেই প্রোফাইল শুধু মাত্র সেই প্রোফাইল ব্যবহার করতে হবে অন্যদের প্রোফাইলে ঢুকা যাবে না।\r\nইমেইল চেঞ্জ/পাসওয়ার্ড চেঞ্জ করা যাবে না কারন এটি শেয়ার্ড একাউন্ট (যদি চেঞ্জ করেন তাহলে আপনার একাউন্ট হারাবেন)\r\nপাসওয়ার্ড চেঞ্জ পেলে আমাদের Whatsapp নাম্বারে মেসেজ দিন : 01521516803', NULL, 750.00, 550.00, 1, 85, '', 1, 1, '2020-11-01 13:09:25', '2020-11-01 13:09:25'),
(24, 'Netflix 6 month 1 Screen (Shared)', 'netflix-6-month-1-screen-shared', '128', 'Hulu is an American subscription video on demand service fully controlled and majority-owned by The Walt Disney Company, with NBCUniversal, owned by Comcast, as an equity stakeholder.', NULL, 1500.00, 1300.00, 1, 108, '', 1, 1, '2020-11-01 14:10:35', '2020-11-01 14:10:35'),
(25, 'Netflix Full Account (Private)', 'netflix-full-account-private', '130', 'Hulu is an American subscription video on demand service fully controlled and majority-owned by The Walt Disney Company, with NBCUniversal, owned by Comcast, as an equity stakeholder.', NULL, 1500.00, 1300.00, 1, 122, '', 1, 1, '2020-11-01 14:28:30', '2020-11-01 14:28:30'),
(26, 'Netflix 1 year 1 Screen (Shared)', 'netflix-1-year-1-screen-shared', '131', 'Hulu is an American subscription video on demand service fully controlled and majority-owned by The Walt Disney Company, with NBCUniversal, owned by Comcast, as an equity stakeholder.', NULL, 1500.00, 1300.00, 1, 124, '', 1, 1, '2020-11-01 14:31:04', '2020-11-01 14:31:04'),
(28, 'Banana Prime ( Personal )', 'banana-prime-personal', '133', 'Full Personal ID !!!\r\nYou Can Use 4 devices !!!\r\nGive me your new Gmail and Gmail password (Don’t Give us another Email, Only Gmail Account ) !!!\r\nUser Must be 18+', NULL, 600.00, 499.00, 1, 128, '', 21, 1, '2020-11-01 14:36:41', '2020-11-01 14:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `media_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `media_id`, `created_at`, `updated_at`) VALUES
(34, 22, 86, '2020-11-01 13:13:41', '2020-11-01 13:13:41'),
(35, 24, 109, '2020-11-01 14:10:35', '2020-11-01 14:10:35'),
(36, 25, 123, '2020-11-01 14:28:30', '2020-11-01 14:28:30'),
(37, 26, 125, '2020-11-01 14:31:04', '2020-11-01 14:31:04'),
(39, 28, 129, '2020-11-01 14:36:41', '2020-11-01 14:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `categoryId` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `productId`, `categoryId`, `created_at`, `updated_at`) VALUES
(89, 23, 6, '2020-11-01 13:09:25', '2020-11-01 13:09:25'),
(90, 22, 2, '2020-11-01 13:13:41', '2020-11-01 13:13:41'),
(91, 22, 6, '2020-11-01 13:13:41', '2020-11-01 13:13:41'),
(92, 24, 6, '2020-11-01 14:10:35', '2020-11-01 14:10:35'),
(93, 25, 6, '2020-11-01 14:28:30', '2020-11-01 14:28:30'),
(94, 26, 6, '2020-11-01 14:31:04', '2020-11-01 14:31:04'),
(96, 28, 9, '2020-11-01 14:36:41', '2020-11-01 14:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `productId` int(10) NOT NULL,
  `sizeId` int(10) DEFAULT NULL,
  `colorId` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `extraPrice` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `sizeId` int(11) NOT NULL,
  `sizeName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`sizeId`, `sizeName`, `created_at`, `updated_at`) VALUES
(1, 'X', '2018-05-19 07:53:00', '2018-05-31 15:45:24'),
(2, 'XL', '2018-05-19 07:53:08', '2018-05-19 07:53:08'),
(3, 'L', '2018-05-19 07:53:13', '2018-05-19 07:53:13'),
(4, 'M', '2018-05-19 07:53:18', '2018-05-19 07:53:18'),
(5, 'Double XL', '2018-05-19 07:53:28', '2018-05-19 07:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `sliderImg` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `sliderImg`, `status`, `created_at`, `updated_at`) VALUES
(5, '116', 1, '2020-11-01 14:17:04', '2020-11-01 14:17:04'),
(6, '117', 1, '2020-11-01 14:17:13', '2020-11-01 14:17:13'),
(7, '118', 1, '2020-11-01 14:17:19', '2020-11-01 14:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tagName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_options`
--

CREATE TABLE `theme_options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'Theme Name',
  `title` varchar(100) NOT NULL DEFAULT 'Theme Title',
  `logo` varchar(255) DEFAULT NULL,
  `numberOne` varchar(24) NOT NULL DEFAULT '+880',
  `numberTwo` varchar(24) DEFAULT NULL,
  `telephone` varchar(24) DEFAULT NULL,
  `fax` varchar(24) DEFAULT NULL,
  `addressOne` varchar(500) NOT NULL DEFAULT 'Address',
  `addressTwo` varchar(500) DEFAULT NULL,
  `emailOne` varchar(25) NOT NULL DEFAULT 'example@example.com',
  `emailTwo` varchar(25) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `snapchat` varchar(100) DEFAULT NULL,
  `googlePlus` varchar(100) DEFAULT NULL,
  `linkedIn` varchar(100) DEFAULT NULL,
  `pinterest` varchar(100) DEFAULT NULL,
  `copyright` varchar(500) NOT NULL DEFAULT 'copyright',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme_options`
--

INSERT INTO `theme_options` (`id`, `name`, `title`, `logo`, `numberOne`, `numberTwo`, `telephone`, `fax`, `addressOne`, `addressTwo`, `emailOne`, `emailTwo`, `facebook`, `twitter`, `snapchat`, `googlePlus`, `linkedIn`, `pinterest`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'GoFlix', 'GoFlix', '1604305067.png', '+880170000000', '+880160000000', NULL, NULL, 'Sylhet', 'Sylhet , Bangladesh', 'goflix@gmail.com', 'goflix@gmail.com', 'https://m.me/premiumgamingbd', 'http://www.twitter.com', 'http://www.snapchat.com', 'http://www.google-plus.com', 'http://www.linkedin.com', NULL, 'copyright@emon&mahbuhba-2020', '2020-11-02 08:17:48', '2020-11-02 02:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `number`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Sylhet', '01746150145', 'admin@gmail.com', '$2y$10$ZtISij43xLOzW8nLGUeVluMMhqx.atjP5CN5hUlhkxPfAdZyVds1O', '4R8fbmbDT25cX4lxcBN3n7DenUnwO0mStwu5IlHGwxnCPIJ52xsdHuqRyX9d', '2018-05-24 09:39:05', '2018-05-24 09:39:05'),
(6, 'Luz Cummings', '2399 Welch Springs\nMadelineport, TX 79682', '+1-501-377-2673', 'bailey.christelle@example.com', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'bzF4kg8LNE', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(7, 'Soledad Bartell II', '4220 Witting Greens\nLake Florinebury, WY 59716-3493', '764-568-7476 x7314', 'keeling.eladio@example.net', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'YZpiGCsFMV', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(8, 'Dr. Orie Gislason', '981 Cremin Parkways Suite 061\nNew Kelsi, ID 23788', '701-205-4272', 'thoppe@example.net', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'it8Bp9yAwm', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(9, 'Jesse Spinka', '680 Dickinson Dam Suite 288\nDomenickland, OH 95599', '1-823-893-1423 x2103', 'jbrekke@example.org', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'lPnToGSpHv', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(10, 'Dr. Nat Wyman IV', '9527 Wilkinson Crest\nBotsfordland, TX 80871', '+1-875-220-5338', 'rosalind93@example.net', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'hr6GwYfM87', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(11, 'Hermina Mayer', '9248 Tobin Park Apt. 231\nCrystaltown, MS 00490-6625', '835-664-3340 x99998', 'brody.crona@example.net', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'G1Cir1BCaZ', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(12, 'Mr. Dejuan Conroy IV', '94925 Gorczany Coves Suite 467\nPort Clydeshire, TX 12491-3366', '1-612-697-5491', 'hrath@example.com', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'lyOo9QJknx', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(13, 'Aiden Wolff DDS', '833 Makenna Path Suite 691\nBriabury, ME 15545-6985', '545-536-3495', 'monserrate.trantow@example.org', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'oNuPV7OulW', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(14, 'Rosalinda Gorczany', '4269 Brown Center Suite 923\nGreenfelderville, MD 72576', '901-997-8530 x00046', 'harley.funk@example.org', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'zBlbXt2lOV', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(15, 'Mr. Bernhard Stark PhD', '7300 Ophelia Spur\nNicolatown, ID 89359-9092', '951.769.8363', 'ernser.liam@example.com', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'Pcs9aPbn6j', '2018-06-11 02:08:58', '2018-06-11 02:08:58'),
(16, 'Adaline Cruickshank', '95963 Jalon Track Apt. 705\nChristianachester, NH 78383', '308-627-3914 x29311', 'quitzon.sincere@example.org', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'OA4ds5EtqV', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(17, 'Gennaro Sawayn', '853 Considine Trace Suite 088\nLake Marvinburgh, PA 69357-4780', '+1 (573) 523-8924', 'pmaggio@example.net', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'BFRDBa1mu6', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(18, 'Mrs. Allie Macejkovic', '1848 Simone Camp Apt. 794\nLonzoland, MD 02690-4994', '+1-350-986-3173', 'kamille.haley@example.org', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'zRZSXc4lmp', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(19, 'Kendall Balistreri', '78347 Weber Port\nWest Mattieville, SD 45796-8309', '(357) 455-3664 x370', 'hermann21@example.org', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'TARZKGl7hH', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(20, 'Clifton Carroll', '3363 Elijah Mission Apt. 100\nSouth Nelletown, VA 80752', '+17832465644', 'ahmad.lesch@example.com', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'Cafw8mxQiZ', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(21, 'Prof. Jay Batz', '443 Cynthia Common Apt. 980\nDavisborough, AL 61963', '435.567.6199 x11280', 'lewis.turner@example.com', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'Fdxz3vATQ3', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(22, 'Ms. Alivia Murphy DDS', '1356 Maggio Trafficway Suite 338\nNew Hyman, OH 17488', '661-544-5080', 'eliezer.hamill@example.com', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'yixbxhhF0A', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(23, 'Delia Stokes', '82785 Clemens Run Suite 340\nWest Obiefort, MO 69399-4632', '1-969-659-3701', 'maribel.turner@example.org', '$2y$10$k6L6IMQXGqtcNsHXxoCPR.BxPJKcmAhNkBe56xxAiKtb8a6CQtYCG', 'JQHPFWRWba', '2018-06-11 02:08:59', '2018-06-11 02:08:59'),
(24, 'Immanuel Kovacek', '43102 Corwin Estates Apt. 840\nNew Margiefurt, DE 17041-2738', '240-608-0061 x591', 'parker.layla@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'j9LWLMbDSI', '2018-07-06 04:56:31', '2018-07-06 04:56:31'),
(25, 'Clotilde Greenfelder', '9572 Schmitt Hills\nKuhnstad, SC 38255-4969', '1-659-908-1318 x080', 'cassin.frank@example.org', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'ay2E7NwMDM', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(26, 'Prof. Grayce Wehner DVM', '6485 Alanna Crescent Suite 948\nNorth Cristinastad, IA 35534', '(984) 812-2392 x7162', 'oconner.jamar@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'hapca28mfL', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(27, 'Brandi Kuhlman', '30166 Collins Passage\nGleasonland, NV 10694-6159', '+13015984642', 'ihane@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'Id7wiuvHl8', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(28, 'Delta Paucek', '475 Green Plains\nArmstrongmouth, NY 96615', '339.464.5843 x9390', 'blick.elton@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'KfrLNJ02Fl', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(29, 'Catharine Orn', '30449 Garret Flat\nSamantaborough, AZ 06472', '230-393-8970 x1213', 'qbarrows@example.org', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'Z2EERPDIkE', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(30, 'Miss Kristy Schumm III', '325 Tromp Walks Apt. 025\nKochhaven, CT 93128', '719.577.1088 x11104', 'zstreich@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'Y1TFzoTyx6', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(31, 'Astrid Carter', '747 Hettinger Station Suite 288\nHayesborough, WA 82212-0560', '830.598.9064 x294', 'marianne72@example.org', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'RoWU3RHHOp', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(32, 'Prof. Mackenzie Olson', '205 Prohaska Isle\nSouth Rupertfort, GA 47236', '+1-345-245-7223', 'sunny.nitzsche@example.net', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'XtjLcJODwR', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(33, 'Kenna Schmitt', '5888 Mueller Turnpike\nArjunstad, MO 14556-8529', '1-628-264-6939', 'malvina34@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'LFoTRWfHGa', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(34, 'Hal Harvey', '4556 Sheila Shoals Apt. 285\nNorth Nicoletteland, IL 33662', '798.624.8129', 'corwin.mike@example.net', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'SLYjCLB21s', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(35, 'Marilie Quigley', '155 Hickle Alley\nEast Narcisoshire, NJ 31002', '+1-537-989-2842', 'antoinette87@example.org', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', '6VZMpxqf4s', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(36, 'Meta Abbott', '7535 Hermann Fork\nCristalfort, MI 02829', '+12469656182', 'luther95@example.org', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'jscjjuAjOo', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(37, 'Summer Walker', '881 Herzog Passage\nNew Abagail, MN 52480', '568.742.9747 x1889', 'dax.nader@example.net', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'MWwXt5mcQT', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(38, 'Arturo Prosacco DVM', '423 Okuneva Port Suite 790\nSouth Annabelle, IN 03144-4898', '(803) 565-6937', 'vivianne.mclaughlin@example.org', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'ghHzX3ca9W', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(39, 'Liliane Medhurst', '5144 Green Haven\nPollichtown, ND 77367-1847', '(751) 215-0616 x852', 'ulises.klocko@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'vMz5rCheaP', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(40, 'Dr. Melvin White', '678 Randy Trafficway\nSteuberville, NY 13666', '+1 (838) 816-1522', 'boyle.judge@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'GxmhBJ2Jdt', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(41, 'Prof. Otilia Schneider PhD', '358 Bryon Track\nFramimouth, OH 88139-8684', '1-540-488-5719', 'flakin@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'tzWIbTWHCc', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(42, 'Raymond Witting', '921 Harvey Valleys\nEbertside, WI 80185', '(754) 226-7025 x106', 'helena65@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', '978R1IVKtA', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(43, 'Colten Grant Sr.', '6409 Mable Divide\nLake Margarettberg, AL 67397-8160', '+17584052890', 'considine.belle@example.com', '$2y$10$OhHaqkgyyIDqtCpllbsSuu859h.UYALtiM9iOhCFWSbs/osBbn3N.', 'zAqOst1z8l', '2018-07-06 04:56:32', '2018-07-06 04:56:32'),
(44, 'Prof. Karelle Gislason', '110 Santos Squares Suite 967\nHansenmouth, AR 16159-2617', '(223) 732-0415', 'hhackett@example.com', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'xk4B3VnHYd', '2018-07-06 04:59:52', '2018-07-06 04:59:52'),
(45, 'Polly Wunsch', '18165 Hane Streets\nCorwinland, RI 89375', '575-475-0493 x249', 'bauch.destiney@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'xnpwAwG5ob', '2018-07-06 04:59:52', '2018-07-06 04:59:52'),
(46, 'Ava Quigley', '74045 Eryn Bridge\nLake Alftown, SC 76877-8019', '(732) 515-9673', 'hcarroll@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'LXheOx0L8h', '2018-07-06 04:59:52', '2018-07-06 04:59:52'),
(47, 'Ms. Frederique Harber', '550 Deckow Fields Suite 840\nPort Kenyattamouth, AR 63704-6233', '(762) 388-2563 x51639', 'pmitchell@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'teTU1Enaza', '2018-07-06 04:59:52', '2018-07-06 04:59:52'),
(48, 'Dariana Senger IV', '77518 White Circles Apt. 036\nDonnellhaven, NJ 97169-1524', '836.478.3125', 'zwindler@example.com', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'F6QC0FSBM3', '2018-07-06 04:59:52', '2018-07-06 04:59:52'),
(49, 'Mrs. Kiana Hilll II', '1530 Sandy Harbors Suite 010\nLindgrenfurt, MA 86657', '929.688.5193', 'kkovacek@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'ckk5hjXbEn', '2018-07-06 04:59:52', '2018-07-06 04:59:52'),
(50, 'Juston Kunze', '7423 Meghan Village\nPort Rahulview, MO 21842', '816.552.0211 x3628', 'batz.violet@example.com', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'Upq0u6hnYm', '2018-07-06 04:59:52', '2018-07-06 04:59:52'),
(51, 'Jean Prosacco', '82735 Russel Mission\nKautzerhaven, OK 12720', '+1 (349) 871-9028', 'stoltenberg.lionel@example.net', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'VUHyMyHvPw', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(52, 'Birdie Bode', '424 Athena Divide\nNorth Stephania, MI 30540-3577', '(527) 915-0902', 'bkeeling@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', '9aumHE2dSD', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(53, 'Ruthe Smitham', '39514 Santino Prairie\nNew Jacey, VA 15422-4890', '690.429.4397 x54967', 'rogers.cummings@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'Xp9t4oNcE7', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(54, 'Vivian Hahn', '489 Cade Summit Apt. 170\nHilariomouth, TN 20429-7958', '1-280-412-3108 x7180', 'conroy.carmelo@example.com', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'sofgfqwVMu', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(55, 'Dr. Emanuel Romaguera', '384 Walsh Pines Suite 995\nGradyhaven, WY 79268-9686', '+1.328.688.2258', 'delilah.mueller@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'hCgxnxQKQq', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(56, 'Fanny Abbott II', '99838 Olson Squares Apt. 996\nBlandabury, NE 72365-7705', '823.880.6772', 'marian17@example.net', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'Ul3zAPpTR8', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(57, 'Ms. Lina Kihn', '5112 Edison Dale\nCeceliaport, DC 63897-1351', '(423) 954-3990', 'modesta10@example.net', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'jAF4Gen722', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(58, 'Pierce Koch', '9539 Wellington Brook Suite 612\nFilibertoview, AL 58679', '1-542-560-5516 x68355', 'sipes.mathias@example.com', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'mY6e4PWNKK', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(59, 'Jacinthe Beer', '903 Aliyah Pine Apt. 230\nMabelleshire, MD 41261-4548', '(762) 207-9507', 'greta23@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'SzujSiOhpf', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(60, 'Eryn Breitenberg', '2673 Jenkins Greens Suite 279\nWest Bridgetburgh, ND 03251', '998-835-9641', 'wilkinson.sherwood@example.net', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'JLUYwu6cj3', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(61, 'Alanna Luettgen', '2719 Ziemann Inlet\nEast Darrick, IL 56568-5424', '620-713-5956 x371', 'williamson.baby@example.net', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'zjYA2z3Rre', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(62, 'Constance Zulauf', '347 Darrell Estate Suite 329\nPort Julioton, TX 66702', '1-242-674-1488 x2152', 'gottlieb.bradley@example.org', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', 'Io0RymRa4t', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(63, 'Dr. Torrey Brekke', '79281 Carolyn Harbors\nStrosinport, AL 08561-1830', '1-376-945-4366', 'harber.sandrine@example.net', '$2y$10$zMaLP2iTxKyeN/BXRywDGeSysX2yBC6xZGuuIOzhXCpJZKIqQa/5q', '9jjxfoXn4N', '2018-07-06 04:59:53', '2018-07-06 04:59:53'),
(64, 'Diamond Feil MD', '61456 Rodolfo Landing Suite 174\nKenyattaside, RI 39957', '442.484.3097 x92277', 'ocasper@example.net', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'yOwcSNgC3I', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(65, 'Herta Kulas', '9730 Fredrick Lane\nLloydmouth, WI 37830', '467.535.3802 x9332', 'hyatt.alvis@example.org', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'C3WornYV3E', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(66, 'Immanuel Beier', '9709 Donnell Spring\nNorth Alfredo, PA 94109', '357.941.7941 x67852', 'maverick78@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'IJWqxDpIba', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(67, 'Ms. Anika Denesik II', '2881 Edwina Forge Suite 886\nSouth Simeon, IL 79322-9514', '1-482-969-0048', 'stracke.dax@example.net', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'PQJrkM790x', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(68, 'Russ Lockman', '36373 Yasmeen Shoals\nAdrielfort, OK 74973-6977', '1-684-808-6303 x36112', 'halvorson.nina@example.org', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'zdjQhkeBsg', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(69, 'Prof. Darryl Rodriguez', '4862 Strosin Lights\nNew Kristina, PA 27824-6438', '987.854.5076 x30581', 'auer.aaliyah@example.net', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'eGKfFW79yO', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(70, 'Hiram Rau', '99216 Shaylee Fort\nPort Maxstad, AK 35815', '1-597-737-4183', 'cornell.williamson@example.net', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'x85zZsnmIW', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(71, 'Mr. Kayley Champlin', '91889 Rachael Bypass\nHirthemouth, MN 42213-8759', '518-829-6460 x70064', 'shayne.mcglynn@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'MMInnBIbCJ', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(72, 'Genesis Zieme DDS', '40313 Roob Drives\nEast Sabryna, TN 90631', '1-704-293-2322', 'gerlach.jaunita@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'CY8f79gvP0', '2018-07-06 05:00:56', '2018-07-06 05:00:56'),
(73, 'Mohammad DuBuque', '6500 Rosendo Common\nEast Delphaville, UT 68938', '1-543-562-7500 x3330', 'dashawn.hermann@example.org', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'Y3w63eImJz', '2018-07-06 05:00:57', '2018-07-06 05:00:57'),
(74, 'Lillie Leffler', '30902 Gulgowski Ports Apt. 805\nEast Daisy, OH 52779', '394-947-4245 x823', 'mann.marquise@example.org', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', '0mUDS3V3Q9', '2018-07-06 05:00:57', '2018-07-06 05:00:57'),
(75, 'Olaf Quigley', '3994 Kuhic Rapids\nNorth Eulaliaview, SC 68419-4196', '540.870.2550', 'jena.lindgren@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', '0egAOlizX7', '2018-07-06 05:00:57', '2018-07-06 05:00:57'),
(76, 'Megane Fay', '4173 Janae Mill Suite 299\nShieldsburgh, ID 78720-7867', '439-470-0374', 'maryam75@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'cJfieWcupQ', '2018-07-06 05:00:57', '2018-07-06 05:00:57'),
(77, 'Jazmin Schowalter', '8671 Jerel Mill Apt. 984\nWehnerfurt, VA 92571', '(251) 376-4579 x8071', 'armstrong.ebba@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'Ey2NLbhJHr', '2018-07-06 05:00:58', '2018-07-06 05:00:58'),
(78, 'Mr. Henry Yundt', '6707 Angeline Gateway Apt. 803\nSkylaberg, NH 82583-4876', '(267) 858-1157', 'vkub@example.org', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'gacYpDN0r0', '2018-07-06 05:00:58', '2018-07-06 05:00:58'),
(79, 'Lindsay Krajcik', '9097 Madeline Key Apt. 940\nNew Pearlfurt, ID 50850', '363-657-8403 x7236', 'beaulah.kuhlman@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'abffGipUcv', '2018-07-06 05:00:58', '2018-07-06 05:00:58'),
(80, 'Roberta Doyle', '2996 Alicia Well Apt. 897\nEast Carmela, CO 04689-2111', '903.899.0521 x48727', 'anais.huels@example.net', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'gY0cnMKVff', '2018-07-06 05:00:58', '2018-07-06 05:00:58'),
(81, 'Miss Tiffany Kassulke', '384 Kamren Point Apt. 628\nNew Ezramouth, HI 90519', '1-489-873-9991 x26577', 'hettinger.jonathon@example.org', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'ixuu6rYgQX', '2018-07-06 05:00:58', '2018-07-06 05:00:58'),
(82, 'Mrs. Ellen Ritchie PhD', '4122 Runolfsson Drive\nNorth Lorenzmouth, HI 20370', '(649) 375-9868 x48760', 'bernard03@example.org', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'G6L1Jgc7nj', '2018-07-06 05:00:58', '2018-07-06 05:00:58'),
(83, 'Nick Schneider', '545 Elijah Rue Apt. 746\nSchultzfort, LA 54411', '1-386-846-2155 x0970', 'brennon.mertz@example.com', '$2y$10$3rtpF8SyK9f081OL44gvLu.NvK.WubAE8uR1WP.sG7zxRZVKFaLrW', 'w9olbmPCG9', '2018-07-06 05:00:58', '2018-07-06 05:00:58'),
(84, 'Kaylah Murazik', '96099 Elisa Inlet\nTadborough, AL 13788-8433', '(924) 742-8321 x52957', 'nickolas.ruecker@example.org', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'LYkWj0EOdg', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(85, 'Allan Runolfsdottir', '80611 Marjolaine Valleys Suite 813\nLake Stanton, LA 72944-7756', '1-808-689-4021 x430', 'ward.lily@example.com', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'qF1GpMATjr', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(86, 'Mr. Ashton Dibbert III', '7902 Wilderman Avenue\nEast Agustinachester, CT 30141-6273', '620-889-6984', 'nkrajcik@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'BUaBiwKa9f', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(87, 'Morris Gottlieb', '8630 Bartoletti Mountains Suite 530\nLake Cleoraview, HI 30996-0696', '1-635-843-9371 x86544', 'zieme.orville@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'W9vXK8XWSL', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(88, 'Mara Schumm', '27071 Walker Shores\nAnnamarieland, IL 62925', '1-586-945-3738 x43459', 'eve.swift@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'JhD0sHJTtC', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(89, 'Darwin Runolfsdottir II', '92277 Everett Circles\nAbernathyfurt, DC 91285-6824', '930.466.6750 x06240', 'ibrahim32@example.org', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'HzwAcvkprk', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(90, 'Gerald Lockman', '1359 Adams Green\nPort Emmanuel, MI 41320-9133', '1-945-325-5816', 'lucius.langworth@example.com', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', '6GKcyOkN6V', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(91, 'Dale Schiller', '32683 Nia Hollow\nIsabellefurt, AK 21482', '+1-817-752-6925', 'jeanne85@example.org', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'mvoCsxni0N', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(92, 'Roxane Kris', '34514 Uriah River\nPort Kip, DE 14717-5743', '+12423976522', 'jgoldner@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', '3aqq16nwdG', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(93, 'Elmer Dietrich', '825 Larkin Canyon Apt. 415\nMonserratebury, AL 82146', '(984) 914-5993', 'bdubuque@example.org', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'jwLs0kvDGY', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(94, 'Blaze Gulgowski DDS', '83301 Abshire Lodge\nGrimestown, TN 27580-8167', '248.406.8379 x5980', 'anastasia84@example.com', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'VVLWqWGXJu', '2018-07-06 05:07:05', '2018-07-06 05:07:05'),
(95, 'Mayra Rohan', '145 Octavia Alley\nLetitiaberg, UT 73030', '928.956.6649 x5742', 'laurence.trantow@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', '7PacMEwwGk', '2018-07-06 05:07:06', '2018-07-06 05:07:06'),
(96, 'Garret McGlynn', '9790 Gennaro Island Suite 965\nNew Bradleyhaven, VT 39322', '(902) 774-7851', 'ibarrows@example.com', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'iuOVRxe9x1', '2018-07-06 05:07:06', '2018-07-06 05:07:06'),
(97, 'Mikel Skiles', '7495 Kariane Walks\nEast Ginafort, OK 71972', '1-596-522-2902 x039', 'wglover@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'JVDg2BhvDx', '2018-07-06 05:07:06', '2018-07-06 05:07:06'),
(98, 'Kacie Gaylord', '9282 Freida Forest\nLindaville, IN 01564-8221', '1-478-828-2120', 'keenan95@example.com', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'zWlyLX9OQe', '2018-07-06 05:07:06', '2018-07-06 05:07:06'),
(99, 'Roberto Lakin', '6737 Ritchie Cape Apt. 946\nEast Alfonzohaven, UT 25465', '1-735-415-6392 x70142', 'loyal23@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'Mq0aks7slz', '2018-07-06 05:07:06', '2018-07-06 05:07:06'),
(100, 'Dr. Elbert Denesik I', '741 Carleton Street\nKendrickborough, DE 45285-9511', '+1.916.655.8655', 'qlarson@example.org', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'TtdwIDOn4m', '2018-07-06 05:07:06', '2018-07-06 05:07:06'),
(101, 'Mohamed Trantow', '68277 Delta Park\nSouth Ashleigh, VA 63930', '427-917-4345', 'rhagenes@example.org', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'JN2D1Cezo0', '2018-07-06 05:07:06', '2018-07-06 05:07:06'),
(102, 'Gloria Davis V', '52810 Bahringer Pine Apt. 839\nEast Kaydenfort, NM 17847', '204.462.3780 x0468', 'xhagenes@example.com', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'w1Cximsha6', '2018-07-06 05:07:07', '2018-07-06 05:07:07'),
(103, 'Lempi Block', '5521 Darrin Port Apt. 633\nBeerview, TX 29515-3392', '+16243409429', 'franz66@example.net', '$2y$10$Qg5TCL/ehPsv8r1TNBTyY.9usv3o1YpFL55Xaw9BGeQlvS1qgyC/m', 'ozADFX4kak', '2018-07-06 05:07:07', '2018-07-06 05:07:07'),
(104, 'Emon Ahmed', 'UK\r\nLuton', '014785584587', 'emonxp@gmail.com', '$2y$10$jjKYQxCYM2y7/rERztl8huYplGm7zXvjX/XcJKzk.r3qZ5RIUr.tW', NULL, '2018-07-16 21:43:11', '2018-07-16 21:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `verify_customers`
--

CREATE TABLE `verify_customers` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verify_customers`
--

INSERT INTO `verify_customers` (`id`, `customer_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 1, 'iXP2P2TMqidHFNkbKRrC7z5NFbAaMdhIWEQVhAGt', '2018-07-29 23:49:23', '2018-07-29 23:49:23'),
(2, 2, 'S6PHTqsVXZ4gJ5eUdk3a9MQiEjRhjUW3LWme5kqz', '2018-07-29 23:49:51', '2018-07-29 23:49:51'),
(3, 3, 'avY16ufo1Pf6TqinGHxRavrQFh6HJz4uYGXk2fIe', '2018-07-29 23:50:24', '2018-07-29 23:50:24'),
(4, 4, 'lI1JilhzysXSkOdOjo4fC34ANqbbrcxrOZxq4JON', '2018-07-30 00:56:48', '2018-07-30 00:56:48'),
(5, 8, 'zlvwSh0KAstCywLQI8LGn7kXGPJ2D8U77FyLMRZ3', '2018-08-07 00:30:25', '2018-08-07 00:30:25'),
(6, 9, 'DGehhHAWnOyjJq5vIkUPMj02uOKCx75rvJt9Ylnj', '2018-08-07 00:34:11', '2018-08-07 00:34:11'),
(7, 10, 'CBtqMDwlQkGuActpk35x2EtLialkomX5OQXraoCI', '2018-08-14 23:10:55', '2018-08-14 23:10:55'),
(8, 11, 'l8KMfAi2JfCfsn3WQklIp8IKEQfKhpZoxDYdjs2F', '2018-08-24 23:06:12', '2018-08-24 23:06:12'),
(9, 12, 'scbCpr3Z4U6PiIybgTi6Agn3tWa1iWYYTjMnnzaB', '2018-08-24 23:18:31', '2018-08-24 23:18:31'),
(10, 13, 'pUbpPSS6s02LGspXAqUoPL0V35kHO1BtxBf1TJ9U', '2018-08-24 23:23:26', '2018-08-24 23:23:26'),
(11, 14, '5nRTVXpYp2TDYTUxD5vARgmYbeyZDCuG3wCsFryK', '2020-11-01 09:04:06', '2020-11-01 09:04:06'),
(12, 15, 'SyzMn4wKoIBFWiwz8UKoNyG9YwZ4tlYskFwtkkNw', '2020-11-01 09:04:47', '2020-11-01 09:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 16, '2018-08-02 05:29:20', '2018-08-01 23:29:20', '2018-08-01 23:29:20'),
(2, 1, 15, '2018-08-07 09:36:32', '2018-08-07 03:36:32', '2018-08-07 03:36:32'),
(3, 1, 14, '2018-08-07 09:36:35', '2018-08-07 03:36:35', '2018-08-07 03:36:35'),
(4, 1, 11, '2018-08-07 09:36:37', '2018-08-07 03:36:37', '2018-08-07 03:36:37'),
(5, 1, 20, '2018-08-07 09:36:40', '2018-08-07 03:36:40', '2018-08-07 03:36:40'),
(6, 1, 19, '2018-07-30 12:01:22', '2018-07-30 12:01:22', NULL),
(7, 1, 8, '2018-07-30 12:18:22', '2018-07-30 12:18:22', NULL),
(8, 1, 18, '2018-08-08 05:58:42', '2018-08-07 23:58:42', '2018-08-07 23:58:42'),
(9, 4, 13, '2018-07-31 05:05:38', '2018-07-30 23:05:38', '2018-07-30 23:05:38'),
(10, 4, 14, '2018-07-30 12:27:22', '2018-07-30 12:27:22', NULL),
(11, 4, 2, '2018-07-30 12:27:38', '2018-07-30 12:27:38', NULL),
(12, 4, 18, '2018-07-30 12:33:51', '2018-07-30 12:33:51', NULL),
(13, 4, 19, '2018-07-30 12:33:54', '2018-07-30 12:33:54', NULL),
(14, 4, 15, '2018-07-30 12:34:34', '2018-07-30 12:34:34', NULL),
(15, 4, 15, '2018-07-31 05:05:12', '2018-07-30 23:05:12', '2018-07-30 23:05:12'),
(16, 18, 18, '2020-11-01 09:16:19', '2020-11-01 09:16:19', NULL),
(17, 18, 8, '2020-11-01 09:16:44', '2020-11-01 09:16:44', NULL),
(18, 18, 13, '2020-11-01 09:17:08', '2020-11-01 09:17:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`colorId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeId`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_options`
--
ALTER TABLE `theme_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_customers`
--
ALTER TABLE `verify_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `colorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `sizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_options`
--
ALTER TABLE `theme_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `verify_customers`
--
ALTER TABLE `verify_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
