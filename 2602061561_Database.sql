-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 07:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `name`, `avatar`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'default.jpg', 0, '2025-01-04 10:04:43', '2025-01-04 10:04:43'),
(2, 'Bear 1', 'bear_1.jpg', 0, '2025-01-04 10:04:43', '2025-01-04 10:04:43'),
(3, 'Bear 2', 'bear_2.jpg', 0, '2025-01-04 10:04:43', '2025-01-04 10:04:43'),
(4, 'Bear 3', 'bear_3.jpg', 0, '2025-01-04 10:04:43', '2025-01-04 10:04:43'),
(5, 'Snake', 'snake.jpg', 50, '2025-01-04 10:04:43', '2025-01-04 10:04:43'),
(6, 'Lion', 'lion.jpg', 75000, '2025-01-04 10:04:43', '2025-01-04 10:04:43'),
(7, 'Dragon', 'dragon.jpg', 100000, '2025-01-04 10:04:43', '2025-01-04 10:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `friendId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `userId`, `friendId`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(2, 8, 1, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(3, 3, 5, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(4, 5, 3, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(5, 3, 10, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(6, 10, 3, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(7, 5, 9, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(8, 9, 5, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(9, 5, 2, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(10, 2, 5, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(11, 7, 10, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(12, 10, 7, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(13, 7, 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(14, 6, 7, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(15, 7, 4, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(16, 4, 7, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(17, 8, 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(18, 6, 8, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(19, 8, 2, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(20, 2, 8, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(21, 9, 1, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(22, 1, 9, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(23, 10, 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(24, 6, 10, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(25, 11, 2, '2025-01-04 10:58:26', '2025-01-04 10:58:26'),
(26, 2, 11, '2025-01-04 10:58:26', '2025-01-04 10:58:26'),
(27, 11, 3, '2025-01-04 10:58:38', '2025-01-04 10:58:38'),
(28, 3, 11, '2025-01-04 10:58:38', '2025-01-04 10:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `friendId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `userId`, `friendId`, `created_at`, `updated_at`) VALUES
(3, 11, 1, '2025-01-04 10:57:40', '2025-01-04 10:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_30_165954_create_avatars_table', 1),
(5, '2024_12_30_170009_create_works_table', 1),
(6, '2024_12_30_170044_create_user_avatars_table', 1),
(7, '2024_12_30_170108_create_friends_table', 1),
(8, '2024_12_31_135530_create_friend_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VxLW9ACpD01fx0XeuiTAj6HOyzP9XkvHNAX5cTJe', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS3FsUmZtVmoxdHZYWVZxR3pjVDFQWGZ6TXlQV1RTZXVYMVdqenRBOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM2MTg5MTQwO319', 1736189190);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `linkedin_profile` varchar(255) NOT NULL,
  `coin` int(11) NOT NULL,
  `birth_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar_profile` varchar(255) NOT NULL DEFAULT '1',
  `visibility` varchar(255) NOT NULL DEFAULT 'visible',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `mobile_number`, `linkedin_profile`, `coin`, `birth_date`, `email_verified_at`, `password`, `avatar_profile`, `visibility`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakila Bella Hariyah', 'darsirah13@prasasta.go.id', 'Female', '0973 0959 383', 'https://www.linkedin.com/in/hsirait', 406, '2025-01-06 18:45:31', NULL, '$2y$12$pVV1BnGp0mIhs/tzg25ZyuuDxI4Fi0vp4bOMiCpIZp5HUjR6cDK0O', '6', 'visible', NULL, 'bHY88WuDhDnym92Uz8BDrWpbjVkTrdFTjjQDjcS103AiPMldH5ftX2Q1pTcL', '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(2, 'Sarah Ifa Winarsih', 'cici29@gmail.com', 'Male', '(+62) 25 3023 0708', 'https://www.linkedin.com/in/pkurniawan', 392, '2025-01-04 17:57:19', NULL, '$2y$12$ac/BpFBWm3gSl.FDW0jEDu.9/d4deeYFt9ooJxQ1xZncVa0P3O.qW', '7', 'visible', NULL, 'PEnwG1i9TZfrj1eAplbJeENUuqJFnEhRSE657Bl4EtchWAOBlgvhzdojUzUG', '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(3, 'Intan Yolanda M.M.', 'mardhiyah.dalima@nashiruddin.desa.id', 'Female', '(+62) 976 0130 8334', 'https://www.linkedin.com/in/cakrabirawa42', 76, '2025-01-04 18:01:21', NULL, '$2y$12$toUgg3YzsKM0pKfmoufegOaJzdpNOWueZwlKmgb5AgyHO8V4XQdSq', '6', 'visible', NULL, 'PfjSMzZfrZkehdLPzo8A7IOsnkppJ3iEUpQ4gDmI6Spd9VrsDf1VvIbKKUzJ', '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(4, 'Ella Indah Farida S.Pt', 'qpurwanti@gmail.co.id', 'Female', '(+62) 23 9642 158', 'https://www.linkedin.com/in/kuswandari.cecep', 325, '2025-01-04 18:07:50', NULL, '$2y$12$Bex6LmpBIZ0WnUBfCpe6Lu.OO0.mtheG3XPIc9yhQJHfGTX6ZyQgC', '7', 'visible', NULL, 'PNVkmDamTNlwCaXRdA6kIWPPdk6ezrlK3PbDIx6Z8yzSghQTWDSBiBT2zoc1', '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(5, 'Kamal Simbolon S.E.', 'ifarida@yahoo.com', 'Male', '(+62) 287 7506 294', 'https://www.linkedin.com/in/among51', 495, '2025-01-04 17:04:45', NULL, '$2y$12$.O4T3RgkhHuelK1/wl5CEu0KbrRjn1I7ZCeh8I/rsSyukcxtV6WWO', '5', 'visible', NULL, NULL, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(6, 'Oman Prasetya S.Gz', 'garda.yulianti@yahoo.co.id', 'Female', '0849 3951 318', 'https://www.linkedin.com/in/bwastuti', 477, '2025-01-04 17:04:46', NULL, '$2y$12$i3OiuyhTGrnHPsbpefK3ae2lLJdUwO1qk3fMhWgpAQMtS.qAQ1pyS', '6', 'visible', NULL, NULL, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(7, 'Samiah Jasmin Rahimah S.T.', 'zelaya.halim@gmail.co.id', 'Female', '0571 9473 7793', 'https://www.linkedin.com/in/titi15', 2, '2025-01-04 17:04:46', NULL, '$2y$12$ZSiEXc3c9FMCa/.4PQ4dlu/YnJE7I0qEQwzOmsBHOrGhsAnZCa51e', '6', 'visible', NULL, NULL, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(8, 'Wadi Jono Mandala', 'daliman57@purnawati.ac.id', 'Male', '(+62) 22 9241 7061', 'https://www.linkedin.com/in/csudiati', 429, '2025-01-04 17:04:46', NULL, '$2y$12$qmfKHD06dp5ERBarb90tPu2hwnDGnJgos4s60awoVyVUXiJpevcBm', '6', 'visible', NULL, NULL, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(9, 'Yani Wani Susanti', 'nasyiah.intan@yahoo.co.id', 'Male', '0477 4420 8235', 'https://www.linkedin.com/in/winda.tampubolon', 463, '2025-01-04 17:04:46', NULL, '$2y$12$qCd2CeHkMfLC7A5m3b/QpOs2nom7k/nVZvZqaDKd1HUUq1VQx3KKK', '5', 'visible', NULL, NULL, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(10, 'Cawisono Karya Sirait', 'mnovitasari@prastuti.go.id', 'Male', '0240 1957 177', 'https://www.linkedin.com/in/asirwada00', 820, '2025-01-04 17:04:47', NULL, '$2y$12$iB9wm0OrwX2YaZ4Ho528lOOhvUpM8aBplMSeHlLYslGVvZXNqWxgW', '7', 'visible', NULL, NULL, '2025-01-04 10:04:46', '2025-01-04 10:04:47'),
(11, 'Richard Sugiharto', 'richard@gmail.com', 'Male', '081231506069', 'https://www.linkedin.com/in/richard-sugiharto', 90086, '2025-01-06 18:46:17', NULL, '$2y$12$.QvU/v4legyQK4WlemIYnOkfVaJckfzTteYzbmqcHTRutaJnAhxpe', '7', 'visible', NULL, '3xfJoN9UBm99G7iHzgDCmyKpC4kjbVqqRUQ9BEUMvG1P2LSechckiKKEcAOa', '2025-01-04 10:48:57', '2025-01-04 11:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_avatar`
--

CREATE TABLE `user_avatar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `avatarId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_avatar`
--

INSERT INTO `user_avatar` (`id`, `userId`, `avatarId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(2, 1, 5, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(3, 1, 6, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(4, 2, 1, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(5, 2, 5, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(6, 2, 6, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(7, 2, 7, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(8, 3, 1, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(9, 3, 5, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(10, 3, 6, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(11, 4, 1, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(12, 4, 5, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(13, 4, 6, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(14, 4, 7, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(15, 5, 1, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(16, 5, 5, '2025-01-04 10:04:45', '2025-01-04 10:04:45'),
(17, 6, 1, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(18, 6, 5, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(19, 6, 6, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(20, 7, 1, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(21, 7, 5, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(22, 7, 6, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(23, 8, 1, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(24, 8, 5, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(25, 8, 6, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(26, 9, 1, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(27, 9, 5, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(28, 10, 1, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(29, 10, 5, '2025-01-04 10:04:46', '2025-01-04 10:04:46'),
(30, 10, 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(31, 10, 7, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(32, 11, 7, '2025-01-04 11:03:38', '2025-01-04 11:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work` varchar(255) NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `work`, `userId`, `created_at`, `updated_at`) VALUES
(1, 'Tukang Listrik', 1, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(2, 'Karyawan BUMN', 1, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(3, 'Tukang Batu', 1, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(4, 'Pilot', 1, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(5, 'Desainer', 2, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(6, 'Pegawai Negeri Sipil (PNS)', 2, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(7, 'Karyawan Swasta', 2, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(8, 'Pembantu Rumah Tangga', 3, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(9, 'Penyiar Radio', 3, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(10, 'Hakim', 3, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(11, 'Pramugari', 4, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(12, 'Arsitek', 4, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(13, 'Tukang Cukur', 4, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(14, 'Apoteker', 4, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(15, 'Peneliti', 5, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(16, 'Pialang', 5, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(17, 'Pelajar / Mahasiswa', 5, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(18, 'Karyawan BUMN', 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(19, 'Peneliti', 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(20, 'Peneliti', 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(21, 'Pendeta', 6, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(22, 'Tentara Nasional Indonesia (TNI)', 7, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(23, 'Montir', 7, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(24, 'Tukang Sol Sepatu', 7, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(25, 'Tukang Jahit', 8, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(26, 'Transportasi', 8, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(27, 'Dosen', 8, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(28, 'Paraji', 9, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(29, 'Mekanik', 9, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(30, 'Pramugari', 9, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(31, 'Pengacara', 10, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(32, 'Wakil Presiden', 10, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(33, 'Perancang Busana', 10, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(34, 'Wakil Presiden', 10, '2025-01-04 10:04:47', '2025-01-04 10:04:47'),
(35, 'Finance', 11, '2025-01-04 10:48:57', '2025-01-04 10:48:57'),
(36, 'Software Engineer', 11, '2025-01-04 10:48:57', '2025-01-04 10:48:57'),
(37, 'Web Developer', 11, '2025-01-04 10:48:57', '2025-01-04 10:48:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_userid_foreign` (`userId`),
  ADD KEY `friend_friendid_foreign` (`friendId`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_request_userid_foreign` (`userId`),
  ADD KEY `friend_request_friendid_foreign` (`friendId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_number_unique` (`mobile_number`);

--
-- Indexes for table `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_avatar_userid_foreign` (`userId`),
  ADD KEY `user_avatar_avatarid_foreign` (`avatarId`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_userid_foreign` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_avatar`
--
ALTER TABLE `user_avatar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_friendid_foreign` FOREIGN KEY (`friendId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friend_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD CONSTRAINT `friend_request_friendid_foreign` FOREIGN KEY (`friendId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friend_request_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD CONSTRAINT `user_avatar_avatarid_foreign` FOREIGN KEY (`avatarId`) REFERENCES `avatar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_avatar_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
