-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 09:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternative_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternative_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `alternative_code`, `alternative_name`, `created_at`, `updated_at`) VALUES
(2, 'A1', 'jhon', '2023-04-01 12:13:55', '2023-04-01 12:13:55'),
(3, 'A2', 'adad', '2023-04-01 12:13:59', '2023-04-01 12:13:59'),
(4, 'A3', 'Zakaria', '2023-05-17 01:42:44', '2023-05-17 01:42:44'),
(5, 'A4', 'Ria', '2023-05-17 01:42:49', '2023-05-17 01:42:49'),
(6, 'A5', 'Muhammad', '2023-05-22 23:35:50', '2023-05-22 23:35:50'),
(7, 'A6', 'Zakaria', '2023-05-22 23:36:44', '2023-05-22 23:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `tabungan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggungan` int(11) NOT NULL,
  `jumlah_kepala_keluarga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `nik`, `name`, `penghasilan`, `tabungan`, `tanggungan`, `jumlah_kepala_keluarga`, `created_at`, `updated_at`) VALUES
(767, '3507135205680003', 'Sunarsih', 500000, 'tidak mempunyai', 2, 2, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(768, '3507134204580003', 'Ruminah', 1350000, 'tidak mempunyai', 2, 1, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(769, '3507134606740002', 'Maria Ulfa', 800000, 'tidak mempunyai', 1, 2, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(770, '350713050771007', 'Ranu', 1000000, 'sepeda motor', 4, 1, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(771, '3507132401700002', 'Edi Kusworo', 900000, 'tidak mempunyai', 1, 1, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(772, '3507134304620002', 'Jumi\'ati', 750000, 'tidak mempunyai', 1, 1, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(773, '1807032209840005', 'Hariri', 1500000, 'sepeda motor', 5, 2, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(774, '3507130912910002', 'Muliadi', 400000, 'tidak mempunyai', 0, 1, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(775, '3507131811840003', 'Rudianto Tri Widodo', 2000000, 'sepeda motor', 7, 2, '2023-08-08 02:13:52', '2023-08-08 02:13:52'),
(776, '3507011805700001', 'Supani', 950000, 'sepeda motor', 2, 1, '2023-08-08 02:13:52', '2023-08-08 02:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `criteria_code`, `criteria_name`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Penghasilan', '2023-08-06 07:21:32', '2023-08-06 07:21:32'),
(2, 'C2', 'Tanggungan', '2023-08-06 07:21:37', '2023-08-06 07:21:37'),
(3, 'C3', 'Jumlah Kepala Keluarga Dalam Satu Rumah', '2023-08-06 07:21:49', '2023-08-06 07:21:49'),
(4, 'C4', 'Tabungan / Barang Yang Bisa Digadaikan', '2023-08-06 07:22:02', '2023-08-06 07:22:02');

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
-- Table structure for table `matrix`
--

CREATE TABLE `matrix` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c1` tinyint(1) NOT NULL,
  `c2` tinyint(1) NOT NULL,
  `c3` tinyint(1) NOT NULL,
  `c4` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2023_03_13_140954_create_candidates_table', 2),
(6, '2023_04_01_180316_criterias_table', 3),
(7, '2023_04_01_185953_create_alternatives_table', 4),
(10, '2023_05_08_092006_create_roles_table', 5),
(11, '2023_05_08_092032_create_user_roles_table', 5),
(12, '2023_05_24_085456_create_matrix_table', 6),
(13, '2023_05_27_103348_add_nik_to_candidates_table', 7),
(14, '2023_05_27_104238_drop_candidates_table', 8),
(15, '2023_05_27_104714_create_candidates_table', 9),
(17, '2023_07_26_152639_create_sub_criterias_table', 10);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-05-08 09:34:44', NULL),
(2, 'Operator', '2023-05-08 09:34:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_criterias`
--

CREATE TABLE `sub_criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `subcriteria_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_criterias`
--

INSERT INTO `sub_criterias` (`id`, `criteria_id`, `subcriteria_code`, `start`, `end`, `created_at`, `updated_at`) VALUES
(19, 1, 'C11', '0', '450000', '2023-08-06 07:22:17', '2023-08-06 07:22:17'),
(20, 1, 'C12', '450000', '750000', '2023-08-06 07:22:35', '2023-08-06 07:22:35'),
(22, 1, 'C13', '750000', '1050000', '2023-08-06 07:23:42', '2023-08-06 07:23:42'),
(23, 1, 'C14', '1050000', '1350000', '2023-08-06 07:23:54', '2023-08-06 07:23:54'),
(24, 1, 'C15', '>', '1350000', '2023-08-06 07:24:05', '2023-08-06 07:24:05'),
(25, 2, 'C21', '>', '4', '2023-08-06 07:24:24', '2023-08-06 07:24:24'),
(26, 2, 'C22', '2', '4', '2023-08-06 07:24:42', '2023-08-06 07:24:42'),
(27, 2, 'C23', '0', '2', '2023-08-06 07:24:53', '2023-08-06 07:24:53'),
(28, 3, 'C31', '>', '3', '2023-08-06 07:26:27', '2023-08-06 07:26:27'),
(29, 3, 'C32', '2', '3', '2023-08-06 07:26:38', '2023-08-06 07:26:38'),
(30, 3, 'C33', '1', '2', '2023-08-06 07:26:46', '2023-08-06 07:26:46'),
(31, 4, 'C41', 'Tidak', 'Mempunyai', '2023-08-06 07:27:05', '2023-08-06 07:27:05'),
(32, 4, 'C42', 'Mempunyai', 'Alat elektronik (mesin cuci atau kulkas)', '2023-08-06 07:27:34', '2023-08-06 07:27:34'),
(33, 4, 'C43', 'Mempunyai', 'Sepeda Motor', '2023-08-06 07:27:49', '2023-08-06 07:27:49'),
(34, 4, 'C44', 'Mempunyai', 'Sepeda motor dan alat elektronik', '2023-08-06 07:28:06', '2023-08-06 07:28:06'),
(35, 4, 'C45', 'Mempunyai', 'Mobil', '2023-08-06 07:28:20', '2023-08-06 07:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'jhon', 'jhon@email.com', NULL, '$2y$10$74Ilgzg5Z.HtMmGa/b3mYOEjQ7X3Yblf6NLYfWXoZeNdZN0hQKXrG', NULL, '2023-05-10 02:26:05', '2023-05-10 02:26:05'),
(4, 'Operator', 'operator@email.com', NULL, '$2y$10$wnRdczsAG9kz33JYlSkVruvMCR7qwJH9GrfuD5mhjhhiVg4ZtUapG', NULL, '2023-05-10 02:34:02', '2023-05-10 02:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 3, 1, '2023-05-10 02:26:05', '2023-05-10 02:26:05'),
(4, 4, 2, '2023-05-10 02:34:02', '2023-05-10 02:34:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `matrix`
--
ALTER TABLE `matrix`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_criterias_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=807;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matrix`
--
ALTER TABLE `matrix`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD CONSTRAINT `sub_criterias_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
