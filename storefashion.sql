-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 07:48 AM
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
-- Database: `storefashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'nada', 'nada@gmail.com', NULL, '$2y$10$/R79iZhM0eRL0nzMtkD5vO2IZ16GwmFu6dGhO3.RNAdJ.OW2Ic0Bu', NULL, '2022-07-25 09:04:15', '2022-07-25 09:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 'MAN', 'MAN1658777704.jpg', '2022-07-25 16:35:04', '2022-07-25 16:35:04'),
(2, 'WOMAN', 'WOMAN1658777726.jpg', '2022-07-25 16:35:26', '2022-07-25 16:35:26'),
(3, 'KIDS', 'KIDS1658777743.avif', '2022-07-25 16:35:43', '2022-07-25 16:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `title`, `description`, `price`, `size`, `active`, `featured`, `image_name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'LOT BABY ROMPERS SHORT SLEEVE 100%COTTON', 'Baby Rompers Short Sleeve Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color.', '30.00', 'M', 'Yes', 'Yes', '11658778133.avif', 3, '2022-07-25 16:38:34', '2022-07-25 16:42:13'),
(2, 'LONG SLEEVE TOPS FLORAL PRINT PANTS HEADBAND', 'Long Sleeve Tops Floral Print Pants Headband Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '150.00', 'S', 'No', 'Yes', '1658778401.webp', 3, '2022-07-25 16:46:41', '2022-07-25 16:46:41'),
(3, 'SOCKS FOR NEWBORNS', 'Socks For Newborns Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '50.00', 'S', 'Yes', 'Yes', '1658778488.webp', 3, '2022-07-25 16:48:08', '2022-07-25 16:48:08'),
(4, 'BABY SUIT GIRL', 'baby suit girl Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '120.00', 'M', 'Yes', 'Yes', '1658778579.avif', 3, '2022-07-25 16:49:39', '2022-07-25 16:49:39'),
(5, 'FULL OUTFIT FOR WINTER', 'Full outfit for winter Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '400.00', 'L', 'Yes', 'Yes', '1658778637.jpg', 2, '2022-07-25 16:50:37', '2022-07-25 16:50:37'),
(6, 'FULL OUTFIT FOR WINTER', 'Full outfit for winter Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '450.00', 'XL', 'Yes', 'Yes', '1658778750.jpg', 2, '2022-07-25 16:52:30', '2022-07-25 16:52:30'),
(7, 'CASUAL WEAR FOR EVERYDAY WEAR', 'Casual wear for everyday wear Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '500.00', 'M', 'Yes', 'Yes', '1658778816.avif', 2, '2022-07-25 16:53:36', '2022-07-25 16:53:36'),
(8, 'OVERSIZE RECYCLED COTTON BLEND CARDIGAN', 'Oversize Recycled Cotton Blend Cardigan Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '350.00', 'XL', 'Yes', 'Yes', '1658778886.avif', 1, '2022-07-25 16:54:46', '2022-07-25 16:54:46'),
(9, 'CASUAL SUIT', 'casual suit Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '250.00', 'L', 'Yes', 'Yes', '1658778949.jpg', 1, '2022-07-25 16:55:49', '2022-07-25 16:55:49'),
(10, 'CASUAL SUIT FOR EVERY DAY USER', 'casual suit Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '300.00', 'L', 'Yes', 'Yes', '1658778999.jpg', 1, '2022-07-25 16:56:39', '2022-07-25 16:56:39'),
(11, 'LONG SLEEVE T-SHIRT', 'Long Sleeve T-Shirt Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '170.00', 'XL', 'Yes', 'Yes', '1658779059.avif', 1, '2022-07-25 16:57:39', '2022-07-25 16:57:39'),
(12, 'JEANS WITH A T-SHIRT', 'Jeans with a T-shirt Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '100.00', 'S', 'Yes', 'Yes', '1658779127.avif', 3, '2022-07-25 16:58:47', '2022-07-25 16:58:47'),
(13, 'FULL OUTFIT FOR SUMMER', 'Full outfit for summer Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '300.00', 'M', 'Yes', 'Yes', '1658779178.jpg', 2, '2022-07-25 16:59:38', '2022-07-25 16:59:38'),
(14, 'CASUAL SUIT', 'casual suit Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '500.00', 'L', 'Yes', 'Yes', '1658779321.jpg', 1, '2022-07-25 17:02:01', '2022-07-25 17:02:01'),
(15, 'BABY SUIT GIRL', 'baby suit girl Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '600.00', 'M', 'Yes', 'Yes', '1658779402.jpg', 3, '2022-07-25 17:03:22', '2022-07-25 17:03:22'),
(16, 'FULL OUTFIT', 'Full outfit  Available in several colors, comfortable to wear It can be worn on many occasions It can be ordered now from our store in the right size and color .', '500.00', 'L', 'Yes', 'Yes', '1658779489.jpg', 2, '2022-07-25 17:04:49', '2022-07-25 17:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_13_143042_create_admins_table', 1),
(6, '2022_06_13_143220_create_categories_table', 1),
(7, '2022_06_13_143304_create_clothes_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nadaRaid', 'Gaza', '0599467097', 'nada123@gmail.com', NULL, '$2y$10$TN7CjJxJmnazCM/I.pmi1e/Rf5yK.V6Onqw/2jlaTue2F88.B7.Y6', NULL, '2022-07-25 16:32:12', '2022-07-25 16:32:12');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clothes_category_id_foreign` (`category_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
