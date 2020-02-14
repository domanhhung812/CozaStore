-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 05:44 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

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
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `avatar` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
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
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
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
  `status` tinyint(4) NOT NULL DEFAULT '1',
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
(16, '2019_04_11_210358_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `infoPd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `view_product` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_product`, `categories_id`, `colors_id`, `sizes_id`, `brands_id`, `price`, `qty`, `description`, `image_product`, `sale_off`, `status`, `view_product`, `created_at`, `updated_at`) VALUES
(2, 'Classic Trench Coat', '[\"3\"]', '[\"7\"]', '[\"4\"]', 4, 1000, 10, 'Classic Trench Coat', '[\"product-04.jpg\"]', '0', 1, 0, '2019-08-11 03:43:24', NULL),
(3, 'Shirt in Stretch Cotton', '[\"3\"]', '[\"11\"]', '[\"3\"]', 7, 800, 0, 'Shirt in Stretch Cotton', '[\"product-07.jpg\"]', '0', 1, 0, '2019-08-11 03:46:36', NULL),
(4, 'Stripped Shirt', '[\"1\"]', '[\"3\",\"4\",\"7\",\"9\"]', '[\"2\",\"3\",\"4\",\"5\"]', 4, 950, 10, 'Stripped Shirt', '[\"product-03.jpg\"]', '0', 1, 0, '2019-08-11 03:57:43', NULL),
(5, 'Espirit Ruffle Shirt', '[\"3\"]', '[\"3\",\"4\",\"5\",\"7\",\"8\",\"11\"]', '[\"2\",\"3\",\"4\"]', 2, 600, 10, 'Espirit Ruffle Shirt', '[\"product-01.jpg\"]', '0', 1, 0, '2019-08-11 09:14:58', NULL),
(6, 'Front Pocket Jumper', '[\"3\"]', '[\"3\",\"4\",\"8\",\"11\"]', '[\"2\",\"3\",\"4\",\"5\"]', 7, 700, 10, 'Front Pocket Jumper', '[\"product-05.jpg\"]', '0', 1, 0, '2019-08-11 09:15:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2019-08-13 04:24:54', '2019-08-13 04:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles_admin`
--

CREATE TABLE `roles_admin` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_admin`
--

INSERT INTO `roles_admin` (`role_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-13 04:27:04', '2019-08-13 04:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `letter_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_size` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
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
(6, 'XXL', 40, 1, 'Size 40', '2019-08-11 03:35:19', '2019-08-11 03:35:19');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'hungdo@gmail.com', NULL, '123456', NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_product_unique` (`name_product`),
  ADD KEY `products_id_brand_foreign` (`brands_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_letter_size_unique` (`letter_size`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_brand_foreign` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
