-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 08:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eas`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time_management` int(11) DEFAULT NULL,
  `quality_of_work` int(11) DEFAULT NULL,
  `creativity` int(11) DEFAULT NULL,
  `team_work` int(11) DEFAULT NULL,
  `discipline` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quarter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_07_14_131054_create_assessments_table', 2),
(8, '2020_07_14_131109_create_requests_table', 2),
(11, '2020_07_16_181727_create_requests_table', 3),
(14, '2020_07_17_094603_create_quarters_table', 4),
(16, '2020_07_17_164223_add_quarters_id_to_assessments_table', 5),
(17, '2020_07_17_190201_add_quarter_id_to_requests_table', 6),
(19, '2020_07_17_214254_add_column_to_requests_table', 7);

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
-- Table structure for table `quarters`
--

CREATE TABLE `quarters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quarter` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `success` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quarter_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `time_manage` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `creativity` int(11) DEFAULT NULL,
  `discipline` int(11) DEFAULT NULL,
  `team_work` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `type`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Manager', 'manager@eas.com', NULL, '$2y$10$OMZ35lyK4F5XRgbKxmPd3uezLpqi9a5zGl7gCqIBmsISCDehkew3y', NULL, '2020-07-13 13:42:22', '2020-07-13 13:42:22'),
(2, 1, 'Director', 'director@eas.com', NULL, '$2y$10$Qw0dfXOLFdaIudja34Qkw.aaIF0ppAQ/JJ9nrWaGsCiIPvfwzxVVK', NULL, '2020-07-13 13:42:42', '2020-07-13 13:42:42'),
(3, 0, 'Employee', 'employee@eas.com', NULL, '$2y$10$3e9.atiSE9n1xhpwIiFm7uGQ1z6IFMf5cQJ06Fpf6HQ4CoyklMw36', NULL, '2020-07-13 13:43:23', '2020-07-13 13:43:23'),
(4, 0, 'employee2', 'employee2@eas.com', NULL, '$2y$10$L/LazPVDdwUXgEZWRzR5y.iy/of0ubZ9BK8NQ.zBeVsSgy4tSoGr6', NULL, '2020-07-15 11:26:56', '2020-07-15 11:26:56'),
(5, 0, 'employee3', 'employee3@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22'),
(6, 0, 'employee4', 'employee4@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22'),
(7, 0, 'employee5', 'employee5@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22'),
(9, 0, 'employee7', 'employee7@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22'),
(10, 0, 'employee8', 'employee8@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22'),
(11, 0, 'employee9', 'employee9@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22'),
(12, 0, 'employee10', 'employee10@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22'),
(13, 0, 'employee6', 'employee6@eas.com', NULL, '$2y$10$VjAFLXRFv7mB5tgptDL8wOlBwLvnCpx8zT8jeGZ/mSSVJhVpIF46i', NULL, '2020-07-15 11:27:22', '2020-07-15 11:27:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `quarters`
--
ALTER TABLE `quarters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quarters`
--
ALTER TABLE `quarters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
