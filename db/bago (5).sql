-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 07:41 PM
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
-- Database: `bago`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
--

CREATE TABLE `attendance_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `time_out2` varchar(255) NOT NULL,
  `time_in2` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL,
  `remarks_in` varchar(255) NOT NULL,
  `remarks_out` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `user_id`, `time_in`, `time_out2`, `time_in2`, `time_out`, `remarks_in`, `remarks_out`, `status`, `attendance_date`) VALUES
(753, 84, '', '', '', '', '', '', 'Present', '2023-08-18'),
(754, 84, '', '', '', '', '', '', 'Incomplete', '2023-07-21'),
(755, 1, '', '', '', '', '', '', 'Absent', '2023-09-21'),
(756, 92, '', '', '', '', '', '', 'Present', '2023-09-21'),
(757, 94, '', '', '', '', '', '', 'Absent', '2023-09-21'),
(758, 87, '', '', '', '', '', '', 'Absent', '2023-09-21'),
(759, 95, '', '', '', '', '', '', 'Incomplete', '2023-09-21'),
(760, 84, '', '', '', '', '', '', 'Absent', '2023-09-21'),
(818, 1, '4:03:14 AM', '', '', '', 'Time-in', '', 'Incomplete', '2023-09-22'),
(867, 1, '5:00:23 AM', '', '', '5:03:24 AM', 'Time-in', 'Time-out', 'Present', '2023-09-23'),
(877, 84, '', '', '', '', '', '', 'Absent', '2023-09-23'),
(878, 87, '', '', '', '', '', '', 'Absent', '2023-09-23'),
(879, 95, '', '', '', '', '', '', 'Absent', '2023-09-23'),
(880, 94, '', '', '', '', '', '', 'Absent', '2023-09-23'),
(881, 92, '', '', '', '', '', '', 'Absent', '2023-09-23'),
(882, 96, '', '', '', '', '', '', 'Absent', '2023-09-23'),
(890, 87, '', '', '', '', '', '', 'Absent', '2023-09-24'),
(891, 96, '', '', '', '', '', '', 'Absent', '2023-09-24'),
(892, 92, '', '', '', '', '', '', 'Absent', '2023-09-24'),
(893, 94, '', '', '', '', '', '', 'Absent', '2023-09-24'),
(894, 95, '', '', '', '', '', '', 'Absent', '2023-09-24'),
(895, 84, '2:11:58 PM', '', '', '2:47:58 PM', 'Time-in', 'Time-out', 'Present', '2023-09-24'),
(896, 1, '2:16:10 PM', '', '', '2:46:54 PM', 'Time-in', 'Time-out', 'Present', '2023-09-24'),
(897, 1, '2:55:57 PM', '', '', '2:56:45 PM', 'Time-in', 'Time-out', 'Present', '2023-09-25'),
(898, 84, '2:56:03 PM', '', '', '2:56:40 PM', 'Late', 'Right Time out', 'Present', '2023-09-25'),
(899, 87, '', '', '', '', '', '', 'Absent', '2023-09-25'),
(900, 92, '', '', '', '', '', '', 'Absent', '2023-09-25'),
(901, 94, '', '', '', '', '', '', 'Absent', '2023-09-25'),
(902, 95, '', '', '', '', '', '', 'Absent', '2023-09-25'),
(903, 96, '', '', '', '', '', '', 'Absent', '2023-09-25'),
(904, 1, '', '', '', '', '', '', 'Absent', '2023-09-28'),
(905, 96, '', '', '', '', '', '', 'Absent', '2023-09-28'),
(906, 92, '', '', '', '', '', '', 'Absent', '2023-09-28'),
(907, 94, '', '', '', '', '', '', 'Absent', '2023-09-28'),
(908, 95, '', '', '', '', '', '', 'Absent', '2023-09-28'),
(909, 84, '', '', '', '', '', '', 'Absent', '2023-09-28'),
(910, 87, '', '', '', '', '', '', 'Absent', '2023-09-28'),
(926, 84, '4:29:02 PM', '', '', '4:29:40 PM', 'Late', 'Right Time out', 'Present', '2023-10-02'),
(927, 1, '4:30:03 PM', '', '', '4:32:20 PM', 'Time-in', 'Time-out', 'Present', '2023-10-02'),
(928, 92, '', '', '', '', '', '', 'Absent', '2023-10-02'),
(929, 87, '', '', '', '', '', '', 'Absent', '2023-10-02'),
(930, 96, '', '', '', '', '', '', 'Absent', '2023-10-02'),
(931, 94, '', '', '', '', '', '', 'Absent', '2023-10-02'),
(932, 95, '', '', '', '', '', '', 'Absent', '2023-10-02'),
(933, 84, '5:06:59 PM', '', '', '5:07:42 PM', 'Late', 'Right Time out', 'Present', '2023-10-05'),
(935, 1, '5:12:02 PM', '5:12:47 PM', '5:12:55 PM', '5:13:03 PM', 'Time-in', 'Time-out', 'Present', '2023-10-05'),
(938, 1, '10:27:53 PM', '10:27:58 PM', '', '', 'Time-in', '', 'Present', '2023-10-09'),
(939, 84, '10:28:08 PM', '10:28:13 PM', '', '', 'Late', '', 'Present', '2023-10-09'),
(940, 92, '', '', '', '', '', '', 'Absent', '2023-10-09'),
(941, 94, '', '', '', '', '', '', 'Absent', '2023-10-09'),
(942, 96, '', '', '', '', '', '', 'Absent', '2023-10-09'),
(943, 95, '', '', '', '', '', '', 'Absent', '2023-10-09'),
(944, 87, '', '', '', '', '', '', 'Absent', '2023-10-09'),
(945, 99, '', '', '', '', '', '', 'Absent', '2023-10-09'),
(962, 84, '6:38:11 PM', '', '', '6:39:55 PM', 'Late', 'Right Time out', 'Present', '2023-10-10'),
(963, 1, '6:38:26 PM', '', '', '6:39:47 PM', 'Time-in', 'Time-out', 'Present', '2023-10-10'),
(964, 92, '', '', '', '', '', '', 'Absent', '2023-10-10'),
(965, 87, '', '', '', '', '', '', 'Absent', '2023-10-10'),
(966, 95, '', '', '', '', '', '', 'Absent', '2023-10-10'),
(967, 94, '', '', '', '', '', '', 'Absent', '2023-10-10'),
(968, 96, '', '', '', '', '', '', 'Absent', '2023-10-10'),
(969, 99, '', '', '', '', '', '', 'Absent', '2023-10-10'),
(970, 1, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(971, 87, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(972, 84, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(973, 92, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(974, 96, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(975, 99, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(976, 95, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(977, 94, '', '', '', '', '', '', 'Absent', '2023-10-11'),
(978, 84, '2:43:44 PM', '2:44:05 PM', '2:44:10 PM', '2:44:31 PM', 'Late', 'Right Time out', 'Present', '2023-10-13'),
(979, 1, '2:43:52 PM', '2:44:01 PM', '2:44:14 PM', '2:44:37 PM', 'Time-in', 'Time-out', 'Present', '2023-10-13'),
(980, 87, '', '', '', '', '', '', 'Absent', '2023-10-13'),
(981, 99, '', '', '', '', '', '', 'Absent', '2023-10-13'),
(982, 92, '', '', '', '', '', '', 'Absent', '2023-10-13'),
(983, 96, '', '', '', '', '', '', 'Absent', '2023-10-13'),
(984, 95, '', '', '', '', '', '', 'Absent', '2023-10-13'),
(985, 94, '', '', '', '', '', '', 'Absent', '2023-10-13'),
(986, 1, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(987, 84, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(988, 95, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(989, 92, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(990, 94, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(991, 96, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(992, 87, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(993, 99, '', '', '', '', '', '', 'Absent', '2023-10-16'),
(994, 1, '5:50:08 PM', '', '', '5:50:55 PM', 'Time-in', 'Time-out', 'Present', '2023-10-17'),
(995, 84, '5:50:30 PM', '', '', '5:51:03 PM', 'Late', 'Right Time out', 'Present', '2023-10-17'),
(996, 87, '', '', '', '', '', '', 'Absent', '2023-10-17'),
(997, 95, '', '', '', '', '', '', 'Absent', '2023-10-17'),
(998, 92, '', '', '', '', '', '', 'Absent', '2023-10-17'),
(999, 94, '', '', '', '', '', '', 'Absent', '2023-10-17'),
(1000, 96, '', '', '', '', '', '', 'Absent', '2023-10-17'),
(1001, 99, '', '', '', '', '', '', 'Absent', '2023-10-17'),
(1002, 1, '8:58:06 AM', '11:07:12 AM', '11:07:21 AM', '11:07:28 AM', 'Time-in', 'Time-out', 'Present', '2023-10-18'),
(1003, 87, '8:59:13 AM', '', '', '', 'Late', '', 'Incomplete', '2023-10-18'),
(1004, 92, '8:59:20 AM', '', '', '', 'Time-in', '', 'Incomplete', '2023-10-18'),
(1005, 84, '9:00:17 AM', '', '', '', 'Late', '', 'Incomplete', '2023-10-18'),
(1006, 94, '', '', '', '', '', '', 'Absent', '2023-10-18'),
(1007, 95, '', '', '', '', '', '', 'Absent', '2023-10-18'),
(1008, 99, '', '', '', '', '', '', 'Absent', '2023-10-18'),
(1009, 96, '', '', '', '', '', '', 'Absent', '2023-10-18'),
(1010, 1, '1:09:56 PM', '1:10:22 PM', '1:10:27 PM', '1:10:32 PM', 'Time-in', 'Time-out', 'Present', '2023-10-19'),
(1011, 84, '', '', '', '', '', '', 'Absent', '2023-10-19'),
(1012, 96, '', '', '', '', '', '', 'Absent', '2023-10-19'),
(1013, 92, '', '', '', '', '', '', 'Absent', '2023-10-19'),
(1014, 95, '', '', '', '', '', '', 'Absent', '2023-10-19'),
(1015, 87, '', '', '', '', '', '', 'Absent', '2023-10-19'),
(1016, 94, '', '', '', '', '', '', 'Absent', '2023-10-19'),
(1017, 1, '', '', '', '', '', '', 'Absent', '2023-11-02'),
(1018, 92, '', '', '', '', '', '', 'Absent', '2023-11-02'),
(1019, 84, '', '', '', '', '', '', 'Absent', '2023-11-02'),
(1020, 96, '', '', '', '', '', '', 'Absent', '2023-11-02'),
(1021, 87, '', '', '', '', '', '', 'Absent', '2023-11-02'),
(1022, 94, '', '', '', '', '', '', 'Absent', '2023-11-02'),
(1023, 95, '', '', '', '', '', '', 'Absent', '2023-11-02'),
(1025, 84, '', '', '', '', '', '', 'Absent', '2023-11-03'),
(1026, 1, '', '', '', '', '', '', 'Absent', '2023-11-03'),
(1027, 87, '', '', '', '', '', '', 'Absent', '2023-11-03'),
(1028, 92, '', '', '', '', '', '', 'Absent', '2023-11-03'),
(1029, 94, '', '', '', '', '', '', 'Absent', '2023-11-03'),
(1030, 95, '', '', '', '', '', '', 'Absent', '2023-11-03'),
(1032, 84, '', '', '', '', '', '', 'Absent', '2023-11-05'),
(1033, 96, '', '', '', '', '', '', 'Absent', '2023-11-05'),
(1035, 1, '', '', '', '', '', '', 'Absent', '2023-11-05'),
(1036, 95, '', '', '', '', '', '', 'Absent', '2023-11-05'),
(1037, 92, '', '', '', '', '', '', 'Absent', '2023-11-05'),
(1038, 94, '', '', '', '', '', '', 'Absent', '2023-11-05'),
(1039, 87, '', '', '', '', '', '', 'Absent', '2023-11-05'),
(1040, 84, '4:15:55 PM', '', '', '4:17:19 PM', 'Late', 'Right Time out', 'Present', '2023-11-06'),
(1041, 1, '4:16:01 PM', '', '', '4:17:22 PM', 'Time-in', 'Time-out', 'Present', '2023-11-06'),
(1042, 87, '', '', '', '', '', '', 'Absent', '2023-11-06'),
(1043, 94, '', '', '', '', '', '', 'Absent', '2023-11-06'),
(1044, 92, '', '', '', '', '', '', 'Absent', '2023-11-06'),
(1045, 95, '', '', '', '', '', '', 'Absent', '2023-11-06'),
(1047, 96, '', '', '', '', '', '', 'Absent', '2023-11-06'),
(1048, 84, '', '', '', '', '', '', 'Absent', '2023-11-10'),
(1050, 1, '', '', '', '', '', '', 'Absent', '2023-11-10'),
(1051, 87, '', '', '', '', '', '', 'Absent', '2023-11-10'),
(1052, 84, '', '', '', '', '', '', 'Absent', '2023-11-13'),
(1053, 1, '', '', '', '', '', '', 'Absent', '2023-11-13'),
(1054, 87, '', '', '', '', '', '', 'Absent', '2023-11-13'),
(1055, 92, '', '', '', '', '', '', 'Absent', '2023-11-13'),
(1056, 94, '', '', '', '', '', '', 'Absent', '2023-11-13'),
(1057, 95, '', '', '', '', '', '', 'Absent', '2023-11-13'),
(1058, 96, '', '', '', '', '', '', 'Absent', '2023-11-13'),
(1068, 84, '10:31:10 PM', '', '', '10:31:56 PM', 'Late', 'Right Time out', 'Present', '2023-11-16'),
(1069, 1, '10:31:17 PM', '', '', '10:32:10 PM', 'Time-in', 'Time-out', 'Present', '2023-11-16'),
(1070, 84, '8:27:07 PM', '', '', '', 'Late', '', 'Incomplete', '2023-11-20'),
(1071, 1, '8:27:27 PM', '', '', '', 'Time-in', '', 'Incomplete', '2023-11-20'),
(1072, 84, '8:49:57 AM', '', '', '', 'Late', '', 'Incomplete', '2023-11-22'),
(1073, 1, '8:50:05 AM', '', '', '', 'Time-in', '', 'Incomplete', '2023-11-22'),
(1076, 1, '5:43:06 PM', '', '', '', 'Time-in', '', 'Incomplete', '2023-11-23'),
(1077, 1, '1:56:56 PM', '1:57:17 PM', '1:57:27 PM', '', 'Time-in', '', 'Present', '2023-11-25'),
(1078, 84, '1:57:00 PM', '1:57:08 PM', '1:57:21 PM', '', 'Time-in', '', 'Present', '2023-11-25'),
(1079, 84, '1:23:54 PM', '1:24:10 PM', '1:24:19 PM', '1:24:36 PM', 'Late', 'Right Time out', 'Present', '2023-11-27'),
(1080, 1, '1:24:01 PM', '1:24:14 PM', '1:24:22 PM', '1:24:34 PM', 'Time-in', 'Time-out', 'Present', '2023-11-27'),
(1081, 1, '6:27:34 PM', '', '', '6:28:08 PM', 'Time-in', 'Time-out', 'Present', '2023-11-30'),
(1082, 92, '07:56', '10:56', '12:56', '16:56', '', '', 'Present', '2023-12-14'),
(1083, 1, '4:05:48 PM', '', '', '', 'Time-in', '', 'Incomplete', '2023-12-14'),
(1084, 1, '4:21:53 PM', '', '', '', 'Time-in', '', 'Incomplete', '2023-12-15'),
(1085, 84, '', '', '', '', '', '', 'Absent', '2023-12-15'),
(1086, 87, '', '', '', '', '', '', 'Absent', '2023-12-15'),
(1087, 92, '', '', '', '', '', '', 'Absent', '2023-12-15'),
(1088, 94, '', '', '', '', '', '', 'Absent', '2023-12-15'),
(1089, 109, '', '', '', '', '', '', 'Absent', '2023-12-15'),
(1090, 95, '', '', '', '', '', '', 'Absent', '2023-12-15'),
(1091, 96, '', '', '', '', '', '', 'Absent', '2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `class_schedules`
--

CREATE TABLE `class_schedules` (
  `id` int(11) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yearlevels_id` bigint(11) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_year_val` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `sample_day` int(11) DEFAULT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_schedules`
--

INSERT INTO `class_schedules` (`id`, `teacher_id`, `yearlevels_id`, `subject_id`, `school_year_val`, `sem`, `sample_day`, `time_start`, `time_end`) VALUES
(193, 84, 50, 129, '2022-2023', '1st', 0, '08:00:00', '09:30:00'),
(194, 84, 50, 129, '2022-2023', '1st', 1, '08:00:00', '09:30:00'),
(195, 84, 50, 129, '2022-2023', '1st', 2, '08:00:00', '09:30:00'),
(196, 84, 50, 129, '2022-2023', '1st', 3, '08:00:00', '09:30:00'),
(197, 84, 50, 129, '2022-2023', '1st', 4, '08:00:00', '09:30:00'),
(201, 87, 57, 130, '2022-2023', '1st', 0, '08:00:00', '10:00:00'),
(202, 87, 57, 129, '2022-2023', '1st', 0, '10:00:00', '10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `customize`
--

CREATE TABLE `customize` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `main_color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customize`
--

INSERT INTO `customize` (`id`, `logo`, `school_name`, `school_address`, `school_id`, `main_color`) VALUES
(1, 'school.jpg', 'Bago Elementary School', 'Brgy. Bago, General Tinio, Nueva Ecija', '123456', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `acronym`, `department_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SHS', 'Senior High Schools', '2023-09-11 04:55:54', '2023-09-11 04:56:00', NULL),
(2, 'JHS', 'Junior High School', '2023-09-11 04:55:54', '2023-09-11 04:56:00', NULL),
(3, 'Elem', 'Elementary', '2023-09-11 04:55:54', '2023-09-11 04:56:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `display_name`, `role_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Developer', 'no', NULL, NULL, NULL),
(1, 'Admin', 'no', NULL, NULL, NULL),
(2, 'Principal', 'yes', NULL, NULL, NULL),
(3, 'Teacher', 'yes', NULL, NULL, NULL),
(4, 'Security Guard', 'no', NULL, NULL, NULL),
(5, 'Staff', 'no', NULL, NULL, NULL),
(8, 'Utility', 'no', NULL, NULL, NULL),
(12, 'Teacher 3', 'yes', NULL, NULL, NULL),
(16, 'Teacher 2', 'yes', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(25) NOT NULL,
  `room_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_name`) VALUES
(1, '101', 'Matching'),
(2, '102', 'kahit ano'),
(3, '103', ''),
(6, '104', ''),
(7, '105', ''),
(8, '106', ''),
(9, '107', ''),
(10, '108', ''),
(11, '109', ''),
(12, '110', ''),
(19, '111', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `sample_time`
--

CREATE TABLE `sample_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `sched_index` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample_time`
--

INSERT INTO `sample_time` (`id`, `time_start`, `time_end`, `sched_index`) VALUES
(20, '07:30:00', '08:40:00', '0'),
(21, '08:40:00', '09:30:00', '1'),
(22, '09:30:00', '09:50:00', '2'),
(23, '09:50:00', '10:30:00', '3'),
(24, '10:30:00', '11:10:00', '4'),
(25, '11:10:00', '12:30:00', '5'),
(26, '12:30:00', '13:20:00', '6'),
(27, '13:20:00', '14:10:00', '7'),
(28, '14:10:00', '14:30:00', '8'),
(29, '14:30:00', '15:10:00', '9'),
(30, '15:10:00', '15:50:00', '10');

-- --------------------------------------------------------

--
-- Table structure for table `schedule2`
--

CREATE TABLE `schedule2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `rooms_id` bigint(20) UNSIGNED NOT NULL,
  `yearlevels_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_sched_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rooms_id` bigint(20) UNSIGNED NOT NULL,
  `yearlevels_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schoolyears`
--

CREATE TABLE `schoolyears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolyears`
--

INSERT INTO `schoolyears` (`id`, `school_year`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-2023', NULL, NULL, NULL),
(6, '2021-2022', NULL, NULL, NULL),
(16, '2020-2021', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 'St. Joseph', NULL, NULL, NULL),
(31, 'St. Bernadette', NULL, NULL, NULL),
(34, 'St. Catherine', NULL, NULL, NULL),
(35, 'St. Claire', NULL, NULL, NULL),
(40, 'St. Francis', NULL, NULL, NULL),
(43, 'St. Elizabeth', NULL, NULL, NULL),
(44, 'St. Mark', NULL, NULL, NULL),
(45, 'St. John', NULL, NULL, NULL),
(46, 'St. Matthew', NULL, NULL, NULL),
(48, 'St. Peter', NULL, NULL, NULL),
(52, 'St. Luke', NULL, NULL, NULL),
(53, 'St. Benedict', NULL, NULL, NULL),
(54, 'San Pedro Calungsod', NULL, NULL, NULL),
(56, 'San Lorenzo Ruiz', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strands`
--

CREATE TABLE `strands` (
  `id` int(11) NOT NULL,
  `strand_acronym` varchar(255) NOT NULL,
  `strand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strands`
--

INSERT INTO `strands` (`id`, `strand_acronym`, `strand_name`) VALUES
(1, 'ICT', 'Information and Communication Technologies'),
(3, 'ABM', 'Accountancy and Business Management '),
(4, 'GAS', 'General Academic Strand');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LRN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearlevel_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stud_contact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `gender` int(11) NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baranggay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housenum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pog_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pog_mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pog_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pog_extname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pog_contact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pog_baranggay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pog_housenum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pog_purok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pog_municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(149, 'Araling Panlipunan'),
(130, 'English'),
(150, 'ESP'),
(132, 'Filipino'),
(129, 'HOPES'),
(152, 'MAPEH'),
(131, 'Math'),
(133, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_schedules`
--

CREATE TABLE `teacher_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `sched_day` varchar(255) NOT NULL,
  `prefered_time_from` time NOT NULL,
  `prefered_time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaching` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_img`, `role_id`, `qr_code`, `fname`, `mname`, `lname`, `address`, `contact_num`, `email`, `status`, `teaching`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ako.jpg', 0, 'FrancisDe LeonCaraangfrancisdeleon872@gmail.com', 'Francis', 'De Leon', 'Caraang', 'Brgy. Concepcion, General Tinio, Nueva Ecija', '09777514483', 'francisdeleon872@gmail.com', 'active', 'no', '73627070', NULL, NULL, NULL, NULL),
(84, 'chiara_prof.jpg', 3, '10110001010100101011011011110110100011011000000100ChiaraTapangAbesamisfsadfa@gmail.com', 'Chiara', 'Tapang', 'Abesamis', 'Brgy. Concepcion General Tinio Nueva Ecija', 'afda', 'chiara@gmail.com', 'active', 'yes', '73627070746c7167', NULL, NULL, NULL, NULL),
(87, 'mvincent.jpg', 3, '01110101101111101111110010101111001001111010011001Mark VincentPrincipeDelos Santosdelossantosmarkvincent1@gmail.com', 'Mark Vincent', 'Principe', 'Delos Santoss', 'Pulong Matong', '09129312311', 'delossantosmarkvincent1@gmail.com', 'active', 'yes', '483a5359505b3a49', NULL, NULL, NULL, NULL),
(92, 'okii.jpg', 4, '11011010000011111100010010011101000101001001001010OscarPogiRamosram16546@gmail.com', 'Oscar', 'Pogi', 'Ramos', 'Sampaguita', '091231231231a', 'ram16546@gmail.com', 'active', 'no', '656e7b6a49366145', NULL, NULL, NULL, NULL),
(94, 'romarsky.jpg', 4, '00111101001000100110001100001010100110001111101001RomarCabaGallardogallardoromar06@gmail.com', 'Romar', 'Caba', 'Gallardo', 'Rio Chico', '09123123123', 'gallardoromar06@gmail.com', 'active', 'no', '6d676f643a6d3161', NULL, NULL, NULL, NULL),
(95, 'joji.jpg', 2, '01100100010111111000100101010101010101010111101111Mark JonasBandalaDelos Santossantosjonasmark@gmail.com', 'Mark Jonas', 'Bandala', 'Delos Santos', 'Enrica', '0912312312312', 'santosjonasmark@gmail.com', 'active', 'no', '5974696970307b53', NULL, NULL, NULL, NULL),
(96, 'akongayon.jpg', 1, '10011111100111111011111110110001010010001010110011Francis.Deleonfrancisdeleon2021@gmail.com', 'Francis', '.', 'Deleon', 'asdf', '243143', 'francisdeleon2021@gmail.com', 'active', 'no', '73627070746c7167', NULL, NULL, NULL, NULL),
(99, 'bago map.PNG', 3, '00010000000011010111100101101111101001110110011101asdffdsafsfsadfasdfa@gmail.com', 'Pangalan', 'fdsafs', 'fsadf', 'fsadfa', '090909', 'asdfa@gmail.com', 'inactive', 'yes', '77625a6933337336', NULL, NULL, NULL, NULL),
(109, 'Blank board (1).png', 8, '00010100011010111100010000000100001010010011111110adsfsfadsfasfsadfda@gmail.com', 'adsfs', 'fads', 'fas', 'fadsf', '12313', 'fsadfda@gmail.com', 'active', 'no', '556559715b6d714d', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearlevels`
--

CREATE TABLE `yearlevels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yearlevel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designated_room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yearlevels`
--

INSERT INTO `yearlevels` (`id`, `section_id`, `yearlevel_name`, `designated_room_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(50, 30, 'Grade 1', 1, NULL, NULL, NULL),
(57, 31, 'Grade 1', 2, NULL, NULL, NULL),
(61, 35, 'Grade 2', 3, NULL, NULL, NULL),
(63, 40, 'Grade 3', 6, NULL, NULL, NULL),
(64, 43, 'Grade 4', 7, NULL, NULL, NULL),
(68, 44, 'Grade 5', 8, NULL, NULL, NULL),
(69, 45, 'Grade 6', 8, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class_schedules`
--
ALTER TABLE `class_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yearlevels_id` (`yearlevels_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `customize`
--
ALTER TABLE `customize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `sample_time`
--
ALTER TABLE `sample_time`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`sched_index`);

--
-- Indexes for table `schedule2`
--
ALTER TABLE `schedule2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `rooms_id` (`rooms_id`),
  ADD KEY `yearlevels_id` (`yearlevels_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_id` (`rooms_id`),
  ADD KEY `schedules_ibfk_3` (`yearlevels_id`),
  ADD KEY `teacher_sched_id` (`teacher_sched_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `schoolyears`
--
ALTER TABLE `schoolyears`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_year` (`school_year`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_name` (`section_name`);

--
-- Indexes for table `strands`
--
ALTER TABLE `strands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_yearlevel_id_foreign` (`yearlevel_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `yearlevels`
--
ALTER TABLE `yearlevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_id` (`section_id`),
  ADD KEY `yearlevels_section_id_foreign` (`section_id`),
  ADD KEY `f_r_id` (`designated_room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1092;

--
-- AUTO_INCREMENT for table `class_schedules`
--
ALTER TABLE `class_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `customize`
--
ALTER TABLE `customize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sample_time`
--
ALTER TABLE `sample_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedule2`
--
ALTER TABLE `schedule2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schoolyears`
--
ALTER TABLE `schoolyears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `strands`
--
ALTER TABLE `strands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `yearlevels`
--
ALTER TABLE `yearlevels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD CONSTRAINT `attendance_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_schedules`
--
ALTER TABLE `class_schedules`
  ADD CONSTRAINT `f_year_id` FOREIGN KEY (`yearlevels_id`) REFERENCES `yearlevels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `st_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `t_f_id` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `schedule2`
--
ALTER TABLE `schedule2`
  ADD CONSTRAINT `schedule2_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule2_ibfk_2` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule2_ibfk_3` FOREIGN KEY (`yearlevels_id`) REFERENCES `yearlevels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yearlevels`
--
ALTER TABLE `yearlevels`
  ADD CONSTRAINT `f_r_id` FOREIGN KEY (`designated_room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `yearlevels_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
