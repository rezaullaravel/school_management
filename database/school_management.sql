-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 03:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '01719475187', NULL, '$2a$12$AwhqPlIFuZJBZKvpc3ZOF.Qcz3DFCbpd13tDoXvmzgYXej7.L2G.y', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clas`
--

CREATE TABLE `clas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clas`
--

INSERT INTO `clas` (`id`, `class_name`, `created_at`, `updated_at`) VALUES
(7, 'Seven', NULL, NULL),
(8, 'Eight', NULL, NULL),
(9, 'Nine', NULL, NULL),
(10, 'Ten', NULL, NULL),
(11, 'Six', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(4, 'Principal', NULL, '2024-02-27 01:50:38'),
(5, 'Vice principal', NULL, '2024-02-27 01:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `created_at`, `updated_at`) VALUES
(1, '1st terminal exam', NULL, NULL),
(2, '2nd terminal exam', NULL, NULL),
(3, '3rd terminal exam', NULL, NULL);

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
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clas_id` int(11) NOT NULL,
  `section_id` int(100) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_id` int(100) DEFAULT NULL,
  `session_id` int(100) DEFAULT NULL,
  `mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `clas_id`, `section_id`, `student_id`, `subject_id`, `exam_id`, `session_id`, `mark`, `created_at`, `updated_at`) VALUES
(1, 7, NULL, 9, 1, 1, 11, 75, '2024-02-29 06:14:28', '2024-03-01 02:28:30'),
(2, 7, NULL, 10, 1, 1, 11, 78, '2024-02-29 06:14:28', '2024-02-29 06:14:28'),
(3, 7, NULL, 11, 1, 1, 11, 0, '2024-02-29 06:14:28', '2024-03-01 02:08:32'),
(4, 7, NULL, 9, 2, 1, 11, 80, '2024-02-29 06:14:43', '2024-02-29 06:14:43'),
(5, 7, NULL, 10, 2, 1, 11, 75, '2024-02-29 06:14:43', '2024-02-29 06:14:43'),
(6, 7, NULL, 11, 2, 1, 11, 75, '2024-02-29 06:14:43', '2024-02-29 06:14:43'),
(7, 7, NULL, 9, 3, 1, 11, 80, '2024-02-29 06:15:01', '2024-02-29 06:15:01'),
(8, 7, NULL, 10, 3, 1, 11, 85, '2024-02-29 06:15:01', '2024-02-29 06:15:01'),
(9, 7, NULL, 11, 3, 1, 11, 85, '2024-02-29 06:15:01', '2024-02-29 06:15:01'),
(10, 7, NULL, 9, 4, 1, 11, 80, '2024-02-29 06:15:17', '2024-02-29 06:15:17'),
(11, 7, NULL, 10, 4, 1, 11, 65, '2024-02-29 06:15:17', '2024-02-29 06:15:17'),
(12, 7, NULL, 11, 4, 1, 11, 78, '2024-02-29 06:15:17', '2024-02-29 06:15:17'),
(13, 7, NULL, 9, 5, 1, 11, 50, '2024-02-29 06:15:33', '2024-03-01 01:09:34'),
(14, 7, NULL, 10, 5, 1, 11, 75, '2024-02-29 06:15:33', '2024-02-29 06:15:33'),
(15, 7, NULL, 11, 5, 1, 11, 75, '2024-02-29 06:15:33', '2024-02-29 06:15:33'),
(16, 7, NULL, 9, 6, 1, 11, 49, '2024-02-29 06:16:00', '2024-03-01 02:29:33'),
(17, 7, NULL, 10, 6, 1, 11, 35, '2024-02-29 06:16:00', '2024-02-29 23:48:26'),
(18, 7, NULL, 11, 6, 1, 11, 30, '2024-02-29 06:16:00', '2024-03-01 01:02:32'),
(20, 7, NULL, 10, 10, 1, 11, 80, '2024-03-01 00:47:18', '2024-03-01 00:47:18'),
(24, 9, 8, 7, 2, 2, 11, 65, '2024-03-01 08:34:24', '2024-03-01 08:34:24'),
(25, 9, 8, 8, 2, 2, 11, 50, '2024-03-01 08:34:24', '2024-03-01 08:34:24');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_25_091623_create_admins_table', 1),
(7, '2024_02_25_092806_create_teachers_table', 2),
(8, '2024_02_26_083516_create_clas_table', 3),
(10, '2024_02_26_100320_create_sections_table', 4),
(11, '2024_02_27_062502_create_sessions_table', 5),
(12, '2024_02_27_071828_create_designations_table', 6),
(13, '2024_02_27_123823_create_students_table', 7),
(14, '2024_02_28_063309_create_student_attendences_table', 8),
(15, '2024_02_28_165503_create_marks_table', 9),
(17, '2024_02_29_021555_create_subjects_table', 10),
(18, '2024_02_29_085655_create_exams_table', 11);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clas_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `clas_id`, `section_name`, `created_at`, `updated_at`) VALUES
(8, 9, 'Humanity', NULL, NULL),
(9, 9, 'Commerce', NULL, NULL),
(10, 9, 'Science', NULL, NULL),
(11, 11, 'Section Ka', NULL, NULL),
(12, 11, 'Section Kha', NULL, NULL),
(13, 11, 'Section Ga', NULL, NULL),
(14, 10, 'Science', NULL, NULL),
(15, 10, 'Commerce', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session_year`, `created_at`, `updated_at`) VALUES
(5, '2016-17', NULL, '2024-02-27 01:15:06'),
(6, '2017-18', NULL, '2024-02-27 01:15:13'),
(7, '2018-19', NULL, NULL),
(8, '2019-20', NULL, NULL),
(9, '2021-22', NULL, NULL),
(10, '2022-23', NULL, NULL),
(11, '2023-24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clas_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_certificate` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `clas_id`, `section_id`, `session_id`, `name`, `father_name`, `mother_name`, `roll`, `registration`, `image`, `phone`, `email`, `password`, `birth_certificate`, `present_address`, `permanent_address`, `status`, `created_at`, `updated_at`) VALUES
(4, 11, 11, 11, 'karim', 'josim', 'jamila begum', '6677', '2401', 'upload/student_images/1800538276.g1.jpg', '3434', 'karim@gmail.com', '$2y$12$bimntQl3mxOcgsUSr9foAOeKeik46sVpbERfaIqCSY7iCJJVhxxwy', 'upload/student_images/1176954875.pc3.jpg', 'fgfdhfghfj', 'ghgkhkghk', 1, '2024-02-27 11:24:15', '2024-02-27 11:24:15'),
(5, 11, 11, 11, 'mamun', 'lutfor', 'nojeda', '5577', '2402', 'upload/student_images/123923097.g5 - Copy.jpg', '46565', 'mamun@gmail.com', '$2y$12$zUU9W98hzX1PQzpbVLHno.73/Fj2QwjzDaWXNOnlreoXCdfCDD4s2', 'upload/student_images/1176780638.rose1.jpg', 'dfgfdhdf', 'ghjghkgk', 1, '2024-02-27 11:25:58', '2024-02-27 11:25:58'),
(6, 11, 11, 11, 'runa', 'lutfor', 'nojeda', '7766', '2403', 'upload/student_images/294340235.rose4.jpg', '53533', 'runa@gmail.com', '$2y$12$fnbNMlTH/7yHqL68SnMAMOOounQP1qWA7521bx5COWe5pmFUXYtJ6', 'upload/student_images/1109312639.pc.jpg', 'sherkole teligram', 'sherkole teligram', 1, '2024-02-27 11:27:19', '2024-02-27 11:27:19'),
(7, 9, 8, 11, 'harun', 'baser', 'najma', '5689', '4532', 'upload/student_images/785515525.salman (3).jpg', '576768', 'harun@gmail.com', '$2y$12$TeK6c0X2.HgD9UPwrLjDSupxnYgFiv7cKIMx.AO9cp/IGp0ySFTA6', '', 'dgdfhfdh', 'ghjgjgf', 1, '2024-02-28 01:11:19', '2024-02-28 01:11:19'),
(8, 9, 8, 11, 'motin', 'mannan', 'usha', '567', '651', 'upload/student_images/1535973089.g1.jpg', '43434', 'motin@gmail.com', '$2y$12$uTZB2Wg0Ywr3l11wOh5f7.47p5kdjbBDSHAABJ1IdeceuOcO8xjSq', '', 'dgdhfdh', 'ghjhgkghk', 1, '2024-02-28 01:13:00', '2024-02-28 01:13:00'),
(9, 7, NULL, 11, 'ujjol', 'babor', 'baby', '654', '3456', 'upload/student_images/1476948820.salman (3).jpg', '455666', 'ujjol@gmail.com', '$2y$12$iRyJZPaFiBlHo9weTdyeeO/TcGrLxHSczXxqDKUPQ99Ldt9FRM2f6', '', 'dfgfhfgjfj', 'hgjkhjkhjgjlgl', 1, '2024-02-28 23:55:08', '2024-02-28 23:55:08'),
(10, 7, NULL, 11, 'imrul', 'aroj ali', 'monira', '5433', '1456', 'upload/student_images/725753960.jeet.jpg', '67687876', 'imrul@gmail.com', '$2y$12$kXXQexzGj/uytIleIIOt9eu/zqn8RTTQtNeRvy5bCEtrrbZ4IQ2su', '', 'dfgfhfd', 'hgjghfhjf', 1, '2024-02-28 23:56:09', '2024-02-28 23:56:09'),
(11, 7, NULL, 11, 'Rubel', 'Lutfor', 'Nojedas', '5656', '5676', 'upload/student_images/881049909.jeet.jpg', '56764', 'rubel@gmail.com', '$2y$12$KsTBFNjYJUjP/S6fqcIH/e7CMoAEPNZPp09X2.FoDE1IPPjJUvLou', 'upload/student_images/1640610054.pc5.jpg', 'fhfhfgjgj', 'hjkhjllgfhdfhd', 1, '2024-02-29 02:24:29', '2024-02-29 02:24:29'),
(12, 8, NULL, 11, 'student', 'father', 'mother', '1115', '1115', '', '3020', 'student@gmail.com', '$2y$12$vT7ohdLW3oxnwA1FJ4KxFOu0ASaU65ZLli8HBxM6DHRMxS9V8JRNC', 'upload/student_images/172253082.rose2 - Copy.png', 'natore', 'natore', 1, '2024-03-01 06:12:43', '2024-03-01 08:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendences`
--

CREATE TABLE `student_attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clas_id` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendence_type` int(11) NOT NULL DEFAULT 2,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendences`
--

INSERT INTO `student_attendences` (`id`, `clas_id`, `student_id`, `attendence_type`, `date`, `created_at`, `updated_at`) VALUES
(1, '11', 4, 2, '2024-02-28', '2024-02-28 04:03:43', '2024-02-28 06:50:53'),
(2, '11', 5, 1, '2024-02-28', '2024-02-28 04:11:12', '2024-02-28 06:50:27'),
(3, '11', 6, 1, '2024-02-28', '2024-02-28 04:11:16', '2024-02-28 06:50:02'),
(4, '11', 4, 1, '2024-02-27', '2024-02-28 04:25:51', '2024-02-28 04:25:51'),
(5, '11', 5, 2, '2024-02-27', '2024-02-28 04:25:56', '2024-02-28 04:25:56'),
(6, '11', 6, 3, '2024-02-27', '2024-02-28 04:25:58', '2024-02-28 04:25:58'),
(7, '9', 7, 1, '2024-02-28', '2024-02-28 04:28:15', '2024-02-28 04:28:15'),
(8, '9', 8, 1, '2024-02-28', '2024-02-28 04:28:23', '2024-02-28 04:28:23'),
(9, '9', 7, 1, '2024-02-29', '2024-02-29 00:26:35', '2024-02-29 00:29:05'),
(10, '9', 8, 1, '2024-02-29', '2024-02-29 00:26:41', '2024-02-29 00:26:59'),
(11, '7', 9, 1, '2024-03-01', '2024-02-29 23:44:53', '2024-02-29 23:44:53'),
(12, '7', 10, 2, '2024-03-01', '2024-02-29 23:44:59', '2024-02-29 23:44:59'),
(13, '7', 11, 1, '2024-03-01', '2024-02-29 23:45:01', '2024-02-29 23:45:01'),
(14, '11', 4, 2, '2024-03-01', '2024-03-01 08:20:14', '2024-03-01 08:21:32'),
(15, '11', 5, 2, '2024-03-01', '2024-03-01 08:20:18', '2024-03-01 08:20:18'),
(16, '11', 6, 1, '2024-03-01', '2024-03-01 08:20:22', '2024-03-01 08:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', NULL, NULL),
(2, 'English', NULL, NULL),
(3, 'Math', NULL, NULL),
(4, 'General science', NULL, NULL),
(5, 'Religion', NULL, NULL),
(6, 'Agriculture', NULL, NULL),
(10, 'xxx', '2024-03-01 00:38:30', '2024-03-01 00:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'teacher', 'teacher@gmail.com', '77668899', NULL, '$2a$12$AwhqPlIFuZJBZKvpc3ZOF.Qcz3DFCbpd13tDoXvmzgYXej7.L2G.y', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `clas`
--
ALTER TABLE `clas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendences`
--
ALTER TABLE `student_attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clas`
--
ALTER TABLE `clas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_attendences`
--
ALTER TABLE `student_attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
