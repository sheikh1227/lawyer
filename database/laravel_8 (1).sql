-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 11:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_8`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `CaseID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ContactID` int(11) NOT NULL,
  `LaywerID` int(11) NOT NULL,
  `CaseTypeID` int(11) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` enum('Open','Close','Hold') NOT NULL DEFAULT 'Open',
  `CreatedBy` int(11) NOT NULL DEFAULT 0,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`CaseID`, `UserID`, `ContactID`, `LaywerID`, `CaseTypeID`, `Name`, `Date`, `Status`, `CreatedBy`, `CreatedAt`) VALUES
(25, 13, 15, 10, 1, 'New contact', '2021-06-14 00:00:00', 'Open', 1, '2021-06-14 22:08:11'),
(26, 14, 14, 10, 1, 'gtfinstitute Test', '2021-06-15 00:00:00', 'Open', 1, '2021-06-15 22:51:23'),
(28, 13, 17, 10, 2, 'New contact', '2021-06-18 00:00:00', 'Open', 1, '2021-06-18 22:49:40'),
(29, 2, 17, 3, 1, 'New contact', '2021-06-18 00:00:00', 'Hold', 1, '2021-06-18 22:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `case_records`
--

CREATE TABLE `case_records` (
  `RecordID` int(11) NOT NULL,
  `CaseID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `File` varchar(255) DEFAULT NULL,
  `Type` enum('Email','Record') NOT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `ToUserID` int(11) DEFAULT NULL,
  `IsShare` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_records`
--

INSERT INTO `case_records` (`RecordID`, `CaseID`, `UserID`, `Email`, `Subject`, `Content`, `File`, `Type`, `CreatedAt`, `ToUserID`, `IsShare`) VALUES
(11, 25, 0, NULL, 'new custom mail', 'sfdfsdfsdfsdf', '', 'Record', '2021-06-14 22:08:53', 13, 0),
(12, 25, 0, NULL, 'subject', '<p><br></p><p>fdgdfgdfgdfg</p><p><br></p><p><br></p><p><br></p>', '', 'Email', '2021-06-14 22:09:02', 13, 1),
(13, 25, 0, NULL, 'subject', '<p><br></p><p>fdgdfgdfgdfg</p><p><br></p><p><br></p><p><br></p>', '', 'Email', '2021-06-14 22:09:06', 13, 1),
(14, 26, 0, NULL, 'subject', '<p>test email </p><p><br></p><p><br></p><p><br></p><p><br></p>', '1623777707-2926.png', 'Email', '2021-06-15 22:51:47', 14, 1),
(15, 26, 0, NULL, 'new custom mail', 'records', '1623777735-8374.png', 'Record', '2021-06-15 22:52:15', 14, 1),
(17, 25, 0, NULL, 'subject', 'sdfsdfsdf', '1624033705-1793.jpg', 'Record', '2021-06-18 21:58:25', 13, 1),
(18, 25, 0, NULL, 'new custom mail45', '<p><br></p><p><br></p><p>dfgsdfgfdgdfg</p><p><br></p><p><br></p>', '1624034752-3835.jpg', 'Email', '2021-06-18 22:15:52', 13, 1),
(19, 25, 0, NULL, 'new custom mail45', '<p><br></p><p><br></p><p>dfgsdfgfdgdfg</p><p><br></p><p><br></p>', '1624034783-8720.jpg', 'Email', '2021-06-18 22:16:23', 13, 1),
(20, 25, 0, 'testnew3@gmail.com', 'subject', '<p><br></p><p><br></p><p>sdfsdf</p><p><br></p><p><br></p>', '1624034896-5175.png', 'Email', '2021-06-18 22:18:16', 13, 1),
(21, 29, 0, 'testnew3@gmail.com', 'tes', '<p><br></p><p>please ign this documents and send me back</p><p><br></p><p><br></p><p><br></p>', '', 'Email', '2021-06-26 22:35:34', 13, 1),
(22, 29, 1, NULL, 'dfg', 'fdgdfgfdg', '', 'Record', '2021-06-27 21:50:08', 13, 1),
(23, 29, 1, 'testnew3@gmail.com', 'new custom mail', '<p>ghjghjgfhjgh</p><p><br></p><p><br></p><p><br></p><p><br></p>', '', 'Email', '2021-06-27 21:50:36', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `case_type`
--

CREATE TABLE `case_type` (
  `CaseTypeID` int(11) NOT NULL,
  `CaseTypeName` varchar(255) NOT NULL,
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_type`
--

INSERT INTO `case_type` (`CaseTypeID`, `CaseTypeName`, `Status`, `CreatedAt`) VALUES
(1, 'CLAIMS', 'Active', '2021-06-12 21:37:36'),
(2, 'CRIMINAL APPEAL', 'Active', '2021-06-12 21:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `IsCase` int(11) NOT NULL DEFAULT 0,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `Name`, `Email`, `Subject`, `PhoneNo`, `IsCase`, `CreatedAt`) VALUES
(12, 'Test', 'Testcustom@gmail.com', 'Test', '9587962825', 0, '2021-06-07 03:33:27'),
(13, 'New contact', 'Test23@gmail.com', 'issue in Property case', '9587962825', 1, '2021-06-07 03:33:27'),
(14, 'Test', 'testnew@gmail.com', 'Test', '433345678', 1, '2021-06-07 03:33:27'),
(15, 'New contact', 'testnew3@gmail.com', 'issue in Property case', '4545454544', 1, '2021-06-07 03:33:27'),
(16, 'New contact', 'testnew3@gmail.com', 'issue in Property case', '4545454544', 1, '2021-06-07 03:33:27'),
(17, 'New contact', 'testnew3@gmail.com', 'issue in Property case', '4545454544', 1, '2021-06-07 03:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `contactnotes`
--

CREATE TABLE `contactnotes` (
  `ContactNotesID` int(11) NOT NULL,
  `ContactID` int(11) NOT NULL,
  `Notes` text NOT NULL,
  `UserID` int(11) DEFAULT 0,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactnotes`
--

INSERT INTO `contactnotes` (`ContactNotesID`, `ContactID`, `Notes`, `UserID`, `CreatedAt`) VALUES
(9, 12, 'New Case please have a look', 0, '2021-06-07 16:26:14'),
(10, 12, 'i spoke with customer i will call him tomorrow at 14 pm', 0, '2021-06-12 13:44:19'),
(11, 12, 'ttyryrty', 0, '2021-06-12 16:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_17_025639_create_sessions_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL,
  `RoleDescription` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `RoleName`, `RoleDescription`, `IsActive`) VALUES
(10, 'Admin', 'selected user access admin role', 1),
(11, 'Customer', 'Role Description', 1),
(12, 'Partner', 'Role Description', 1),
(14, 'Laywer', 'Role Description', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('23cTvNOUNSRZIsKSNwD5mx1gG1zxoIXQpeuExJoy', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMEZXenEzY0p5Q25rSTgwbGdiRHBjVGFCRFZzbkRqV3hiY0NhRmdRZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2FkbWluL2NvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkanhQY2xaREdQbUFZNDZNaWQ2Ym1qdVVNZHJXQWVuNlBLVWhaTXV3d3V2enU1L3hBelBjUksiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGp4UGNsWkRHUG1BWTQ2TWlkNmJtanVVTWRyV0FlbjZQS1VoWk11d3d1dnp1NS94QXpQY1JLIjt9', 1622692382),
('2969bvwqybMjQkHjNbLqFCS3D328UyttEHDfTsz8', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNlF5RVNXWWV3MWJidDFuOThNbVBuUFpZYzBzNzQ1ZkNwQ1RGWWdBMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1622911394),
('b9NkL9ietVBW3JG7A36ehZELfG1c969hY1VpkiLQ', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiS2M2UWw4bUZBN0ZRY25xdHFEM2QzSnR3eHdEaFpoaVd4THR1R1VkayI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUyOiJodHRwOi8vbG9jYWxob3N0L2xhcmF2ZWxfOF9hdXRoL3B1YmxpYy9hZG1pbi9jb250YWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGp4UGNsWkRHUG1BWTQ2TWlkNmJtanVVTWRyV0FlbjZQS1VoWk11d3d1dnp1NS94QXpQY1JLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRqeFBjbFpER1BtQVk0Nk1pZDZibWp1VU1kcldBZW42UEtVaFpNdXd3dXZ6dTUveEF6UGNSSyI7fQ==', 1622696517),
('BwyarGZOw18dko3zsCi2RfXtnXLHbxfO16GFXhGi', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTTd6NnI0VkZ0Mm1SY0xaamZVZU43S0xRZzZQVENzY2t5NHBtMTUzbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1622696686),
('EDBA2ZCSLenOHyB06A7xHvp5sWUq4iTzfnINpQk8', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicXJyU2Y3dUxOWU03VjFLeE9yekJWenloVVlSZld1Z3liZG16NXV4MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGp4UGNsWkRHUG1BWTQ2TWlkNmJtanVVTWRyV0FlbjZQS1VoWk11d3d1dnp1NS94QXpQY1JLIjt9', 1624802686),
('ljaKRroqOtAVeiPG4FCNBAGkJsIWDfghFX5FGr8t', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicnN0ZDIzdHl0b2FMcjA2elRDUlZiYXMwbGJyNEl2Unh0MkZNdHRzTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2FkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGp4UGNsWkRHUG1BWTQ2TWlkNmJtanVVTWRyV0FlbjZQS1VoWk11d3d1dnp1NS94QXpQY1JLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRqeFBjbFpER1BtQVk0Nk1pZDZibWp1VU1kcldBZW42UEtVaFpNdXd3dXZ6dTUveEF6UGNSSyI7fQ==', 1622606214),
('mVlBfuPxfc1T7m8hEA04tjS0iQULLe4HN3gIEr69', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWEt3bWxIaHlaMWVBZUJHSkpvZU5yT285S3AxTnhNZ3dmR3NSR05MbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGp4UGNsWkRHUG1BWTQ2TWlkNmJtanVVTWRyV0FlbjZQS1VoWk11d3d1dnp1NS94QXpQY1JLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRqeFBjbFpER1BtQVk0Nk1pZDZibWp1VU1kcldBZW42UEtVaFpNdXd3dXZ6dTUveEF6UGNSSyI7fQ==', 1624800982),
('P1MuYAvAErAnW1248Q47xV1ShrXkVRHPvN8gq2rM', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUFlUTlVjSXRPSW1Yc2xkeGJHalZXT3J1WXowSTlacG9ZZEh5cmhMbyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MjoiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsXzhfYXV0aC9wdWJsaWMvYWRtaW4vY29udGFjdCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vbG9jYWxob3N0L2xhcmF2ZWxfOF9hdXRoL3B1YmxpYy9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1622696568),
('THKVoT7X1mdpc1C9atIGkNRmVaWFUl7vveSm40GF', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0RzQnlDNE5wRmRHZkVVVGttYkQxNnVSV1RSSXBCTzZhbkR0VzhOeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1624894000),
('TKUvmGEpUSAEo0fJrYwdZ9An7tipKbYZCWz3ByGB', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidThTMDEzaDN4bkZTOE85dnhwUXJBQnJJd01rcVpBMTBLUVpPczRNQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGp4UGNsWkRHUG1BWTQ2TWlkNmJtanVVTWRyV0FlbjZQS1VoWk11d3d1dnp1NS94QXpQY1JLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRqeFBjbFpER1BtQVk0Nk1pZDZibWp1VU1kcldBZW42UEtVaFpNdXd3dXZ6dTUveEF6UGNSSyI7fQ==', 1622696888),
('v09tUPy2m9SYXCq93zjqDvFOIGtBFP0USBx6VuOm', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMkJaeWtsNkd4ZDVVTjloZlJJSTl6V3k2UWRGVXRmR2w1NWFZT1JLUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1622910870),
('wV6ta8HsOmcAwfbuqUlpUKInmpGz4aSctiM7L6r3', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDNtUEpsZGg1NEc4aFF1ZGVPbkF6VkVpRzdDdzBjS29Va3ZFWHlIVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1624800466),
('ZRYLj6n06ePsKUfUjAB171Hm0LmRYmg3JFnqB343', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMDZ4NDBScTJRTTZpZWwyWlZKYXQ1SUF0ejZyZGRPazl4ZGFvS0RzTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF84X2F1dGgvcHVibGljL2N1c3RvbWVyIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGp4UGNsWkRHUG1BWTQ2TWlkNmJtanVVTWRyV0FlbjZQS1VoWk11d3d1dnp1NS94QXpQY1JLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRqeFBjbFpER1BtQVk0Nk1pZDZibWp1VU1kcldBZW42UEtVaFpNdXd3dXZ6dTUveEF6UGNSSyI7fQ==', 1624802716);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Status` enum('Active','InActive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `Contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Postcode` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `State` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `Status`, `Contact`, `Company`, `DOB`, `Gender`, `Address`, `Address1`, `Postcode`, `City`, `State`, `Country`) VALUES
(1, 10, 'kishan new', 'admin@gmail.com', NULL, '$2y$10$jxPclZDGPmAY46Mid6bmjuUMdrWAen6PKUhZMuwwuvzu5/xAzPcRK', NULL, NULL, 'yDP191AcdYRxtWhZN831QnFr5A8f31cJH2EjOagDugux9FkewyjrdoG9QifY', NULL, '', '2021-05-25 11:07:38', '2021-06-27 11:27:14', 'Active', '09587962825', NULL, NULL, 'Male', 'cvbcvb', NULL, '302018', 'Select', 'Rajasthan', 'India'),
(2, 11, 'customer', 'customer@gmail.com', NULL, '$2y$10$jxPclZDGPmAY46Mid6bmjuUMdrWAen6PKUhZMuwwuvzu5/xAzPcRK', NULL, NULL, NULL, NULL, '1624814179-7000.png', '2021-05-25 11:07:38', '2021-06-27 11:46:19', 'Active', '09587962825', NULL, '2021-06-09', 'Male', 'Jaipur', 'Rajasthan', '302018', 'Select', 'Rajasthan', 'India'),
(3, 12, 'Partner', 'partner@gmail.com', NULL, '$2y$10$jxPclZDGPmAY46Mid6bmjuUMdrWAen6PKUhZMuwwuvzu5/xAzPcRK', NULL, NULL, NULL, NULL, '1624814234-4314.png', '2021-05-25 11:07:38', '2021-06-27 11:47:14', 'Active', '09587962825', NULL, '2021-06-22', 'Male', 'Jaipur', 'Rajasthan', '302018', 'Select', 'Rajasthan', 'India'),
(4, 11, 'Test', 'Test@gmail.com', NULL, '$2y$10$V487Ypgocv.f2GwQrhLdhOlkmXtRoBEr0cGg9pu/Ldcf4ZCCmQFp2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '9587962825', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 11, 'kishan chaurasiya', 'developerkihan@gmail.com', NULL, 'gtf@123!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '54645654', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 10, 'kishan chaurasiya', 'rtyrty@gmail.com', NULL, 'gtf@123!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '5654645654', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 11, 'New contact', 'Test23@gmail.com', NULL, '$2y$10$YupGdJLMZ/VPqZUzz5kJruEdOVn8.vXz/eOsvDtcc9/v9aBmP8Ltq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '9587962825', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 12, 'Laywer 1', 'Laywer@gmail.com', NULL, '$2y$10$YupGdJLMZ/VPqZUzz5kJruEdOVn8.vXz/eOsvDtcc9/v9aBmP8Ltq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '9587962825', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 12, 'Laywer2', 'Laywer2@gmail.com', NULL, '$2y$10$YupGdJLMZ/VPqZUzz5kJruEdOVn8.vXz/eOsvDtcc9/v9aBmP8Ltq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '9587962825', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 11, 'Test', 'Testcustom@gmail.com', NULL, '$2y$10$LOQVw8rtp2b2pzj.rA5JDuCeqoVjR8juOAbL3sLuQ7Yxjkf8GWLmS', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-18 11:44:15', 'Active', '9587962825', NULL, NULL, 'Male', 'ghjfghj', NULL, NULL, 'ghjghjghf', NULL, NULL),
(13, 11, 'New contact', 'testnew3@gmail.com', NULL, '$2y$10$3K7inHmck5FgjHsm5q7nWe4xaKx1HsznAT2Jpuit6cqyb.mg8fPwi', NULL, NULL, NULL, NULL, '', NULL, '2021-06-25 07:18:08', 'Active', '09587962825', NULL, '2021-06-18', 'Male', 'cvbcvbrtret', 'tyutyuytuyuyiytu', '302018', 'Aklera', 'Rajasthan', 'India'),
(14, 11, 'gtfinstitute Test', 'sdfsdfsd@gmail.com', NULL, '$2y$10$KsW0z4GPt8kgxPEeOBZXlu39TkyPCn1XiTAOMU5eXIMT92JFFDbzW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '09587478514', NULL, NULL, NULL, 'test', NULL, '302017', 'Banswara', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`CaseID`);

--
-- Indexes for table `case_records`
--
ALTER TABLE `case_records`
  ADD PRIMARY KEY (`RecordID`);

--
-- Indexes for table `case_type`
--
ALTER TABLE `case_type`
  ADD PRIMARY KEY (`CaseTypeID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `contactnotes`
--
ALTER TABLE `contactnotes`
  ADD PRIMARY KEY (`ContactNotesID`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

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
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `CaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `case_records`
--
ALTER TABLE `case_records`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `case_type`
--
ALTER TABLE `case_type`
  MODIFY `CaseTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contactnotes`
--
ALTER TABLE `contactnotes`
  MODIFY `ContactNotesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
