-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 07:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_info_sys_db`
--

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
(3, '2018_03_25_173838_create_programs_table', 1),
(4, '2018_03_25_175619_create_semesters_table', 1),
(5, '2018_03_25_180816_create_sections_table', 1),
(6, '2018_03_25_195107_create_pictures_table', 1),
(7, '2018_03_25_201231_create_profiles_table', 1);

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
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_userid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `fk_userid`, `created_at`, `updated_at`) VALUES
(6, '1523222714Lok.jpg', 7, '2018-04-09 01:25:14', '2018-04-09 01:25:14'),
(7, '1523222778favicon.png', 8, '2018-04-09 01:26:18', '2018-04-09 01:26:18'),
(8, '1523395720Celebrating Hindu Dashain Festival at Home.jpg', 9, '2018-04-11 01:28:40', '2018-04-11 01:28:40'),
(9, '1523400022DSC_0732.JPG', 11, '2018-04-11 02:40:22', '2018-04-11 02:40:22'),
(10, '1523400883DSC_0717.JPG', 12, '2018-04-11 02:54:43', '2018-04-11 02:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_userid` int(10) UNSIGNED NOT NULL,
  `fk_programid` int(10) UNSIGNED NOT NULL,
  `fk_semesterid` int(10) UNSIGNED NOT NULL,
  `fk_sectionid` int(10) UNSIGNED NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `fullname`, `gender`, `fk_userid`, `fk_programid`, `fk_semesterid`, `fk_sectionid`, `ip`, `created_at`, `updated_at`) VALUES
(6, 'Lok Prakash Pandey', 'M', 7, 2, 8, 1, '::1', '2018-04-09 01:25:14', '2018-04-09 01:25:14'),
(7, 'Simran Pandey', 'F', 8, 1, 1, 1, '::1', '2018-04-09 01:26:18', '2018-04-09 01:26:18'),
(8, 'Kabita Kumari Bhatt', 'F', 9, 1, 1, 1, '::1', '2018-04-11 01:28:40', '2018-04-11 01:28:40'),
(9, 'Arjun Pandey', 'M', 11, 1, 1, 1, '::1', '2018-04-11 02:40:21', '2018-04-11 02:40:21'),
(10, 'Asha Pandey', 'F', 12, 1, 1, 1, '::1', '2018-04-11 02:54:43', '2018-04-11 02:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `programname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `programname`, `created_at`, `updated_at`) VALUES
(1, 'BIM', NULL, NULL),
(2, 'BSc CSIT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `sectionname` enum('A','B') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionname`, `created_at`, `updated_at`) VALUES
(1, 'A', NULL, NULL),
(2, 'B', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `semestername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semestername`, `created_at`, `updated_at`) VALUES
(1, 'Semester I', NULL, NULL),
(2, 'Semester II', NULL, NULL),
(3, 'Semester III', NULL, NULL),
(4, 'Semester IV', NULL, NULL),
(5, 'Semester V', NULL, NULL),
(6, 'Semester VI', NULL, NULL),
(7, 'Semester VII', NULL, NULL),
(8, 'Semester VIII', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@studentis.com', '$2y$10$4zzyA4I8b5TkRAnPQa2Equ4UnZUFJShG/cFp3IcLVusXWVR3pV0ey', 'Xu7Yt3UCg4Hv2iBW2nsN9YGt5BQcSrg8sGRlzJ1EBMefxt2je2slwH8TzaH8', '2018-04-08 23:44:48', '2018-04-08 23:44:48'),
(7, 'lokprakashpandey', 'lokprakashpandey@gmail.com', '$2y$10$MymmKKGhSTYzdaQbsJ4h4OV5Ke8kuG5JqVTmfFjREaw6p/TrsjHFi', 'GIh1v2bGHAONlFd2uigsgLyzGLpLqwQ9dn324aGKM2BTtVtQRm8wC1T6r76s', '2018-04-09 01:24:39', '2018-04-09 01:24:39'),
(8, 'simranpandey', 'simranpandey@yahoo.com', '$2y$10$YLi0kAc1J3GGOR7U87Yse.U0ODSXXZHXJO3j20MinVE.gPijrKHhi', NULL, '2018-04-09 01:26:18', '2018-04-09 01:26:18'),
(9, 'kabitabhatt', 'kabitabhatt520@gmail.com', '$2y$10$vNKv67VBMcVinc59VOECAOnyi/ddHO4Uad50BAp44lzq1I7BWzS.a', NULL, '2018-04-11 01:28:40', '2018-04-11 01:28:40'),
(11, 'arjunpandey', 'arjunpandey@hawa.com', '$2y$10$xiwsZrzF4uZ0qSus.6b5NOu5qAaY.4/aqBehpSMWezs4wVO0nCge6', NULL, '2018-04-11 02:40:21', '2018-04-11 02:40:21'),
(12, 'ashapandey', 'ashapandey@yahoo.com', '$2y$10$FcRc4gZS0B/.GZt8201h2.oUeuOVR0DJONxhz4wzcR0A0Io1mkcLC', NULL, '2018-04-11 02:54:43', '2018-04-11 02:54:43');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_fk_userid_foreign` (`fk_userid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_fk_userid_foreign` (`fk_userid`),
  ADD KEY `profiles_fk_programid_foreign` (`fk_programid`),
  ADD KEY `profiles_fk_semesterid_foreign` (`fk_semesterid`),
  ADD KEY `profiles_fk_sectionid_foreign` (`fk_sectionid`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_fk_userid_foreign` FOREIGN KEY (`fk_userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_fk_programid_foreign` FOREIGN KEY (`fk_programid`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `profiles_fk_sectionid_foreign` FOREIGN KEY (`fk_sectionid`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `profiles_fk_semesterid_foreign` FOREIGN KEY (`fk_semesterid`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `profiles_fk_userid_foreign` FOREIGN KEY (`fk_userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
