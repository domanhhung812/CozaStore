-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 11:14 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `role`, `status`, `avatar`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123456', 'MyASk@gmail.com', -1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(2, 'user1', '123456', 'cJTKF@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(3, '7P6Pp', 'tfkt8S6SzD', 'yXJk8@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(4, 'X47tZ', 'zPR9LQDmHq', 'GSXXC@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(5, 'mlw4b', '2e5Gcu2B8J', 'CZS0l@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(6, '4acN1', 'zLR37Nxovg', 'Qhol9@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(7, '1clUy', 'wQxmoFUUVI', 'u6dHz@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(8, '2EiIl', 'nPJ3ZswjMK', 'it07c@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(9, '4eCzV', 'cz9HaSXasq', 'UX2yQ@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(10, 'uC5mH', 'Slqui66ijr', 'S38dp@gmail.com', 1, 1, NULL, '1234567563', 'Ha noi', '2019-07-23 03:53:41', NULL),
(11, 'admin2', '123456', '', 1, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `b_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_image` text CHARACTER SET utf8 NOT NULL,
  `b_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_active` tinyint(4) NOT NULL DEFAULT 1,
  `b_author_id` tinyint(4) NOT NULL DEFAULT 0,
  `b_description_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_title_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `b_name`, `b_slug`, `b_image`, `b_description`, `b_content`, `b_active`, `b_author_id`, `b_description_seo`, `b_title_seo`, `b_view`, `created_at`, `updated_at`) VALUES
(5, 'The Great Big List of Men’s Gifts for the Holidays', 'the-great-big-list-of-mens-gifts-for-the-holidays', '\"blog-01.jpg\"', 'The Great Big List of Men’s Gifts for the Holidays', 'The Great Big List of Men’s Gifts for the Holidays', 1, 0, 'The Great Big List of Men’s Gifts for the Holidays', 'The Great Big List of Men’s Gifts for the Holidays', 0, '2020-02-09 15:00:41', '2020-02-09 16:59:24'),
(7, '8 Inspiring Ways to Wear Dresses in the Winter', '8-inspiring-ways-to-wear-dresses-in-the-winter', '\"blog-02.jpg\"', '8 Inspiring Ways to Wear Dresses in the Winter', '8 Inspiring Ways to Wear Dresses in the Winter', 1, 0, '8 Inspiring Ways to Wear Dresses in the Winter', '8 Inspiring Ways to Wear Dresses in the Winter', 0, '2020-02-09 15:16:32', '2020-02-10 03:30:16'),
(10, '5 Winter-to-Spring Fashion Trends to Try Now', '5-winter-to-spring-fashion-trends-to-try-now', '\"blog-06.jpg\"', '5 Winter-to-Spring Fashion Trends to Try Now', '5 Winter-to-Spring Fashion Trends to Try Now', 1, 0, '5 Winter-to-Spring Fashion Trends to Try Now', '5 Winter-to-Spring Fashion Trends to Try Now', 0, '2020-02-09 16:57:51', '2020-02-09 16:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `address`, `status`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Adidas', 'Germany', 1, 'Thương hiệu Adidas', '2019-08-05 16:36:44', '2019-08-05 16:36:44'),
(3, 'Puma', 'Germany', 1, 'Thương hiệu Puma', '2019-08-11 03:38:08', '2019-08-11 03:38:08'),
(4, 'Louis Vuiton', 'France', 1, 'Thương hiệu Louis Vuiton của Pháp', '2019-08-11 03:39:14', '2019-08-11 03:39:14'),
(5, 'Chanel', 'France', 1, 'Thương hiệu Chanel của Pháp', '2019-08-11 03:40:20', '2019-08-11 03:40:20'),
(6, 'Gucci', 'Italy', 1, 'Thương hiệu Gucci của Pháp', '2019-08-11 03:41:32', '2019-08-11 03:41:32'),
(7, 'Dior', 'France', 1, 'Thương hiệu Dior của Pháp', '2019-08-11 03:42:15', '2019-08-11 03:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, 1, '2019-07-22 17:00:00', '2019-08-11 03:32:21'),
(3, 'Women', 1, 1, '2019-07-27 17:00:00', '2019-08-11 03:32:34'),
(5, 'Shoes', 1, 1, '2019-07-29 04:04:41', '2019-08-11 03:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_color` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name_color`, `status`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Red', 1, 'Màu đỏ', '2019-08-05 15:54:56', '2019-08-05 15:54:56'),
(4, 'Yellow', 1, 'Màu vàng', '2019-08-11 03:35:44', '2019-08-11 03:35:44'),
(5, 'Orange', 1, 'Màu cam', '2019-08-11 03:36:01', '2019-08-11 03:36:01'),
(6, 'Pink', 1, 'Màu hồng', '2019-08-11 03:36:12', '2019-08-11 03:36:12'),
(7, 'Brown', 1, 'Màu nâu', '2019-08-11 03:36:26', '2019-08-11 03:36:26'),
(8, 'Black', 1, 'Màu đen', '2019-08-11 03:36:38', '2019-08-11 03:36:38'),
(9, 'Blue', 1, 'Màu xanh dương', '2019-08-11 03:36:53', '2019-08-11 03:36:53'),
(10, 'Green', 1, 'Màu xanh lá cây', '2019-08-11 03:37:13', '2019-08-11 03:37:13'),
(11, 'Gray', 1, 'Màu xám', '2019-08-11 03:37:30', '2019-08-11 03:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `co_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `co_email`, `co_name`, `co_content`, `co_product_id`, `created_at`, `updated_at`) VALUES
(2, 'hung.test.0812@gmail.com', 'Do Manh Hung', 'Hàng đẹp lắm', 4, '2020-02-10 09:47:58', '2020-02-10 09:47:58'),
(3, 'duchieu@gmail.com', 'Đức Hiếu', 'Giá rẻ hàng chất lượng', 4, '2020-02-10 09:55:51', '2020-02-10 09:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `c_email`, `c_content`, `created_at`, `updated_at`) VALUES
(1, 'kaup3pun45x@gmail.com', 'response', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_28_115313_create_admins_table', 1),
(4, '2019_02_28_125747_create_categories_table', 1),
(5, '2019_02_28_131135_create_sizes_table', 1),
(6, '2019_02_28_132528_create_colors_table', 1),
(7, '2019_02_28_133401_create_brands_table', 1),
(8, '2019_02_28_135418_create_products_table', 1),
(9, '2019_03_04_123706_change_type_id_cat_to_products_table', 1),
(10, '2019_03_04_124250_change_type_id_color_to_products_table', 1),
(11, '2019_03_04_124313_change_type_id_size_to_products_table', 1),
(12, '2019_03_11_194455_rename_id_brands_products_table', 1),
(13, '2019_03_11_195527_rename_id_cat_products_table', 1),
(14, '2019_03_11_195749_rename_id_color_products_table', 1),
(15, '2019_03_11_195809_rename_id_size_products_table', 1),
(16, '2019_04_11_210358_create_orders_table', 1),
(17, '2020_02_05_163755_create_transactions_table', 2),
(18, '2020_02_05_163932_create_orders_table', 2),
(19, '2020_02_08_220220_create_contact_table', 3),
(20, '2020_02_09_111002_create_blogs_table', 4),
(21, '2020_02_10_160955_create_comments_table', 5),
(22, '2020_02_11_135908_alter_column_code_and_time_code_in_table_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `or_transaction_id` int(11) NOT NULL DEFAULT 0,
  `or_product_id` int(11) NOT NULL DEFAULT 0,
  `or_qty` tinyint(4) NOT NULL DEFAULT 0,
  `or_price` int(11) NOT NULL DEFAULT 0,
  `or_sale` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `or_transaction_id`, `or_product_id`, `or_qty`, `or_price`, `or_sale`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 2, 800, 0, NULL, NULL),
(3, 4, 5, 1, 600, 0, NULL, NULL),
(4, 5, 6, 1, 700, 0, NULL, NULL),
(5, 6, 2, 1, 1000, 0, NULL, NULL),
(6, 7, 4, 1, 950, 0, NULL, NULL),
(7, 8, 6, 1, 700, 0, NULL, NULL),
(8, 9, 7, 1, 75, 0, NULL, NULL),
(9, 10, 9, 3, 70, 0, NULL, NULL),
(10, 11, 10, 1, 83, 0, NULL, NULL),
(11, 12, 8, 1, 62, 0, NULL, NULL),
(12, 13, 6, 1, 700, 0, NULL, NULL),
(13, 14, 7, 1, 75, 0, NULL, NULL),
(14, 15, 7, 1, 75, 0, NULL, NULL),
(15, 16, 10, 1, 83, 0, NULL, NULL),
(16, 17, 4, 1, 950, 0, NULL, NULL),
(17, 18, 10, 3, 83, 0, NULL, NULL),
(18, 18, 2, 1, 1000, 0, NULL, NULL),
(19, 19, 12, 1, 79, 0, NULL, NULL),
(20, 19, 12, 1, 79, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hung.test1208@gmail.com', '$2y$10$Ku3VGIIZ3PbIx.OA5dxnZ.K/Ysvs6G4ZdkTA0/IkeODh7XndZKXki', '2020-02-11 03:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sizes_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brands_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_product` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_off` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `view_product` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_product`, `categories_id`, `colors_id`, `sizes_id`, `brands_id`, `price`, `qty`, `description`, `image_product`, `sale_off`, `status`, `view_product`, `created_at`, `updated_at`) VALUES
(2, 'Classic Trench Coat', '[\"3\"]', '[\"7\"]', '[\"4\"]', 4, 1000, 8, 'Classic Trench Coat', '[\"product-04.jpg\"]', '0', 1, 0, '2019-08-11 03:43:24', '2020-02-27 10:02:49'),
(3, 'Shirt in Stretch Cotton', '[\"3\"]', '[\"11\"]', '[\"3\"]', 7, 800, 10, 'Shirt in Stretch Cotton', '[\"product-07.jpg\"]', '0', 1, 0, '2019-08-11 03:46:36', '2020-02-07 10:40:01'),
(4, 'Stripped Shirt', '[\"1\"]', '[\"3\",\"4\",\"7\",\"9\"]', '[\"2\",\"3\",\"4\",\"5\"]', 4, 950, 7, 'Stripped Shirt', '[\"product-03.jpg\"]', '0', 1, 0, '2019-08-11 03:57:43', '2020-02-25 08:40:03'),
(5, 'Espirit Ruffle Shirt', '[\"3\"]', '[\"3\",\"4\",\"5\",\"7\",\"8\",\"11\"]', '[\"2\",\"3\",\"4\"]', 2, 600, 0, 'Espirit Ruffle Shirt', '[\"product-01.jpg\"]', '0', 1, 0, '2019-08-11 09:14:58', '2020-02-07 11:01:06'),
(6, 'Front Pocket Jumper', '[\"3\"]', '[\"3\",\"4\",\"8\",\"11\"]', '[\"2\",\"3\",\"4\",\"5\"]', 7, 700, 8, 'Front Pocket Jumper', '[\"product-05.jpg\"]', '0', 1, 0, '2019-08-11 09:15:50', '2020-02-25 03:51:15'),
(7, 'Converse All Star Hi Plimsolls', '[\"5\"]', '[\"3\",\"7\"]', '[\"2\",\"3\",\"4\",\"5\",\"7\"]', 2, 75, 7, 'Converse All Star Hi Plimsolls', '[\"product-09.jpg\"]', '0', 1, 0, '2020-02-11 10:21:19', '2020-02-25 08:24:12'),
(8, 'Pieces Metallic Printed', '[\"3\"]', '[\"3\",\"5\",\"7\",\"10\"]', '[\"2\",\"3\",\"4\"]', 5, 62, 9, 'Pieces Metallic Printed', '[\"product-08.jpg\"]', '0', 1, 0, '2020-02-11 13:36:02', '2020-02-25 07:12:31'),
(9, 'Femme T-Shirt In Stripe', '[\"3\"]', '[\"3\",\"4\",\"5\",\"7\",\"9\",\"10\"]', '[\"2\",\"3\",\"4\",\"5\"]', 7, 70, 10, 'Femme T-Shirt In Stripe', '[\"product-10.jpg\"]', '0', 1, 0, '2020-02-11 13:37:04', '2020-02-25 07:53:17'),
(10, 'Herschel supply', '[\"1\"]', '[\"3\",\"6\",\"7\",\"8\",\"9\",\"10\"]', '[\"3\",\"4\",\"5\",\"7\"]', 3, 83, 5, 'Herschel supply', '[\"product-11.jpg\"]', '0', 1, 0, '2020-02-11 13:38:25', '2020-02-27 10:02:49'),
(11, 'Adidas Stan Smith', '[\"5\"]', '[\"9\"]', '[\"2\",\"3\",\"4\",\"5\",\"7\"]', 2, 80, 10, 'Adidas Stan Smith', '[\"item-cart-07.jpg\"]', '0', 1, 0, '2020-02-26 01:23:07', NULL),
(12, 'Adidas UltraBoost', '[\"5\"]', '[\"3\",\"8\",\"9\",\"11\"]', '[\"2\",\"3\",\"4\",\"5\",\"7\"]', 2, 79, 8, 'Adidas UltraBoost', '[\"item-cart-08.jpg\"]', '0', 1, 0, '2020-02-26 01:31:05', '2020-02-27 10:09:27'),
(13, 'T-Shirt with Sleeve', '[\"3\"]', '[\"3\",\"8\",\"11\"]', '[\"2\",\"3\",\"4\"]', 4, 120, 10, 'T-Shirt with Sleeve', '[\"product-13.jpg\"]', '0', 1, 0, '2020-02-26 01:36:11', '2020-02-26 01:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `letter_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_size` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `letter_size`, `number_size`, `status`, `description`, `created_at`, `updated_at`) VALUES
(2, 'S', 36, 1, 'Size 36', '2019-08-01 04:58:13', '2019-08-01 04:58:13'),
(3, 'M', 37, 1, 'Size 37', '2019-08-05 04:00:19', '2019-08-05 04:00:19'),
(4, 'L', 38, 1, 'Size 38', '2019-08-11 03:34:39', '2019-08-11 03:34:39'),
(5, 'XL', 39, 1, 'Size 39', '2019-08-11 03:34:59', '2019-08-11 03:34:59'),
(7, 'XXL', 40, 1, 'Size 40', '2020-02-09 15:07:16', '2020-02-09 15:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `tr_user_id` int(11) NOT NULL DEFAULT 0,
  `tr_total` int(11) NOT NULL DEFAULT 0,
  `tr_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tr_user_id`, `tr_total`, `tr_note`, `tr_address`, `tr_phone`, `tr_status`, `created_at`, `updated_at`) VALUES
(8, 3, 700, 'test', 'TH', '0123456789', 1, NULL, '2020-02-25 03:51:15'),
(9, 2, 75, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 03:53:59'),
(10, 2, 210, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 07:04:13'),
(11, 2, 83, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 07:06:14'),
(12, 2, 62, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 07:12:31'),
(14, 2, 75, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 07:24:43'),
(15, 2, 75, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 08:24:12'),
(16, 2, 83, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 08:35:22'),
(17, 2, 950, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-25 08:40:03'),
(18, 2, 1249, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-27 10:02:49'),
(19, 2, 158, 'Giao nhanh trong ngay', 'Hung Yen', '0964387230', 1, NULL, '2020-02-27 10:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`, `code`, `time_code`) VALUES
(1, 'user1', 'hungdo@gmail.com', NULL, '123456', '', '', NULL, NULL, NULL, NULL, NULL),
(2, 'domanhhung', 'kaup3pun45x@gmail.com', NULL, '$2y$10$hJAqv6Id7tdU4UzJ3TqhC.YJ/YBKii88f2xkR94jcoMvdIRmJ/22.', '', '', 'KxFYgH5SHdVXdLHdA6FW1Qa7CXNQzhM4PWYwgJtPuYNCiFTKX1WkryI6X4Cl', '2020-02-04 15:07:39', '2020-02-11 09:57:14', '1c2731e85cadbe9fda675d2597ac2762', '2020-02-11 16:56:05'),
(3, 'Duc Hieu', 'duchieu@gmail.com', NULL, '$2y$10$mBsDMX19LOKn73lgYKVgheTxJSFrCGe0qz4NgykFX1kDNSx1jUUgC', '', '', NULL, '2020-02-05 03:42:09', '2020-02-05 03:42:09', NULL, NULL),
(4, 'Do Manh Hung', 'hung.test1208@gmail.com', NULL, '$2y$10$lR4X4TgWkaxbU90Uc6K6kO.5FDA1PESsykR9.K458kcG9iuznnU2i', NULL, NULL, NULL, '2020-02-11 03:14:08', '2020-02-11 07:18:42', 'ae2dedc920ca73fac8416933bfc10dbe', '2020-02-11 14:18:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_b_name_unique` (`b_name`),
  ADD KEY `blogs_b_slug_index` (`b_slug`),
  ADD KEY `blogs_b_active_index` (`b_active`),
  ADD KEY `blogs_b_author_id_index` (`b_author_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_name_unique` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_color_unique` (`name_color`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_or_transaction_id_index` (`or_transaction_id`),
  ADD KEY `orders_or_product_id_index` (`or_product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_product_unique` (`name_product`),
  ADD KEY `products_id_brand_foreign` (`brands_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_letter_size_unique` (`letter_size`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_tr_user_id_index` (`tr_user_id`),
  ADD KEY `transactions_tr_status_index` (`tr_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_code_index` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
