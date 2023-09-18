-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 05:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bamsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
--

CREATE TABLE `attendance_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL,
  `remarks_in` varchar(255) NOT NULL,
  `remarks_out` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `user_id`, `time_in`, `time_out`, `remarks_in`, `remarks_out`, `status`, `attendance_date`) VALUES
(1, 1, '2:31:09 AM', '2:45:51 AM', 'Time-in recorded', 'Time-out recorded', 'Present', '2022-06-28'),
(130, 7, '5:37:04 AM', '', '', '', 'Present', '2023-07-03'),
(222, 1, '', '', '', '', 'Absent', '2023-07-04'),
(223, 11, '', '', '', '', 'Absent', '2023-07-04'),
(224, 13, '', '', '', '', 'Absent', '2023-07-04'),
(225, 7, '', '', '', '', 'Absent', '2023-07-04'),
(226, 14, '', '', '', '', 'Absent', '2023-07-04'),
(227, 17, '', '', '', '', 'Absent', '2023-07-04'),
(229, 20, '', '', '', '', 'Absent', '2023-07-04'),
(230, 23, '', '', '', '', 'Absent', '2023-07-04'),
(231, 25, '', '', '', '', 'Absent', '2023-07-04'),
(232, 26, '', '', '', '', 'Absent', '2023-07-04'),
(233, 27, '', '', '', '', 'Absent', '2023-07-04'),
(234, 28, '', '', '', '', 'Absent', '2023-07-04'),
(235, 29, '', '', '', '', 'Absent', '2023-07-04'),
(236, 30, '', '', '', '', 'Absent', '2023-07-04'),
(237, 32, '', '', '', '', 'Absent', '2023-07-04'),
(238, 31, '', '', '', '', 'Absent', '2023-07-04'),
(240, 1, '', '', '', '', 'Absent', '2023-07-07'),
(241, 7, '', '', '', '', 'Absent', '2023-07-07'),
(243, 20, '', '', '', '', 'Absent', '2023-07-07'),
(244, 11, '', '', '', '', 'Absent', '2023-07-07'),
(245, 25, '', '', '', '', 'Absent', '2023-07-07'),
(246, 23, '', '', '', '', 'Absent', '2023-07-07'),
(247, 26, '', '', '', '', 'Absent', '2023-07-07'),
(248, 27, '', '', '', '', 'Absent', '2023-07-07'),
(249, 13, '', '', '', '', 'Absent', '2023-07-07'),
(250, 17, '', '', '', '', 'Absent', '2023-07-07'),
(251, 28, '', '', '', '', 'Absent', '2023-07-07'),
(252, 29, '', '', '', '', 'Absent', '2023-07-07'),
(253, 14, '', '', '', '', 'Absent', '2023-07-07'),
(254, 30, '', '', '', '', 'Absent', '2023-07-07'),
(255, 31, '', '', '', '', 'Absent', '2023-07-07'),
(256, 32, '', '', '', '', 'Absent', '2023-07-07'),
(291, 1, '', '', '', '', 'Absent', '2023-07-10'),
(292, 7, '', '', '', '', 'Absent', '2023-07-10'),
(293, 13, '', '', '', '', 'Absent', '2023-07-10'),
(294, 14, '', '', '', '', 'Absent', '2023-07-10'),
(295, 17, '', '', '', '', 'Absent', '2023-07-10'),
(297, 20, '', '', '', '', 'Absent', '2023-07-10'),
(298, 11, '', '', '', '', 'Absent', '2023-07-10'),
(299, 23, '', '', '', '', 'Absent', '2023-07-10'),
(300, 25, '', '', '', '', 'Absent', '2023-07-10'),
(301, 26, '', '', '', '', 'Absent', '2023-07-10'),
(302, 27, '', '', '', '', 'Absent', '2023-07-10'),
(303, 28, '', '', '', '', 'Absent', '2023-07-10'),
(304, 29, '', '', '', '', 'Absent', '2023-07-10'),
(305, 30, '', '', '', '', 'Absent', '2023-07-10'),
(306, 31, '', '', '', '', 'Absent', '2023-07-10'),
(307, 32, '', '', '', '', 'Absent', '2023-07-10'),
(371, 1, '', '', '', '', 'Absent', '2023-07-13'),
(372, 7, '', '', '', '', 'Absent', '2023-07-13'),
(373, 14, '', '', '', '', 'Absent', '2023-07-13'),
(374, 13, '', '', '', '', 'Absent', '2023-07-13'),
(375, 11, '', '', '', '', 'Absent', '2023-07-13'),
(376, 17, '', '', '', '', 'Absent', '2023-07-13'),
(377, 20, '', '', '', '', 'Absent', '2023-07-13'),
(378, 23, '', '', '', '', 'Absent', '2023-07-13'),
(379, 25, '', '', '', '', 'Absent', '2023-07-13'),
(380, 26, '', '', '', '', 'Absent', '2023-07-13'),
(382, 27, '', '', '', '', 'Absent', '2023-07-13'),
(383, 28, '', '', '', '', 'Absent', '2023-07-13'),
(384, 29, '', '', '', '', 'Absent', '2023-07-13'),
(385, 30, '', '', '', '', 'Absent', '2023-07-13'),
(396, 31, '', '', '', '', 'Absent', '2023-07-13'),
(397, 32, '', '', '', '', 'Absent', '2023-07-13'),
(401, 1, '6:00:35 PM', '6:55:38 PM', 'Time-in recorded', 'Time-out recorded', 'Present', '2023-07-15'),
(402, 7, '', '', '', '', 'Absent', '2023-07-15'),
(403, 11, '', '', '', '', 'Absent', '2023-07-15'),
(404, 13, '', '', '', '', 'Absent', '2023-07-15'),
(407, 20, '', '', '', '', 'Absent', '2023-07-15'),
(408, 23, '', '', '', '', 'Absent', '2023-07-15'),
(409, 25, '', '', '', '', 'Absent', '2023-07-15'),
(410, 26, '', '', '', '', 'Absent', '2023-07-15'),
(411, 27, '', '', '', '', 'Absent', '2023-07-15'),
(412, 28, '', '', '', '', 'Absent', '2023-07-15'),
(413, 29, '', '', '', '', 'Absent', '2023-07-15'),
(414, 30, '', '', '', '', 'Absent', '2023-07-15'),
(415, 31, '', '', '', '', 'Absent', '2023-07-15'),
(416, 32, '', '', '', '', 'Absent', '2023-07-15'),
(417, 17, '', '', '', '', 'Absent', '2023-07-15'),
(419, 14, '7:46:57 PM', '', 'Time-in recorded', '', '', '2023-07-15'),
(420, 1, '', '', '', '', 'Absent', '2023-07-17'),
(421, 11, '', '', '', '', 'Absent', '2023-07-17'),
(422, 13, '', '', '', '', 'Absent', '2023-07-17'),
(423, 14, '', '', '', '', 'Absent', '2023-07-17'),
(424, 7, '', '', '', '', 'Absent', '2023-07-17'),
(425, 17, '', '', '', '', 'Absent', '2023-07-17'),
(426, 20, '', '', '', '', 'Absent', '2023-07-17'),
(427, 23, '', '', '', '', 'Absent', '2023-07-17'),
(428, 26, '', '', '', '', 'Absent', '2023-07-17'),
(429, 28, '', '', '', '', 'Absent', '2023-07-17'),
(430, 27, '', '', '', '', 'Absent', '2023-07-17'),
(431, 29, '', '', '', '', 'Absent', '2023-07-17'),
(432, 25, '', '', '', '', 'Absent', '2023-07-17'),
(433, 30, '', '', '', '', 'Absent', '2023-07-17'),
(434, 31, '', '', '', '', 'Absent', '2023-07-17'),
(435, 32, '', '', '', '', 'Absent', '2023-07-17'),
(454, 1, '8:25:50 PM', '8:26:35 PM', 'Time-in recorded', 'Time-out recorded', 'Present', '2023-07-19'),
(455, 7, '', '', '', '', 'Absent', '2023-07-19'),
(456, 11, '', '', '', '', 'Absent', '2023-07-19'),
(457, 13, '', '', '', '', 'Absent', '2023-07-19'),
(458, 14, '', '', '', '', 'Absent', '2023-07-19'),
(459, 17, '', '', '', '', 'Absent', '2023-07-19'),
(460, 20, '', '', '', '', 'Absent', '2023-07-19'),
(461, 23, '', '', '', '', 'Absent', '2023-07-19'),
(462, 25, '', '', '', '', 'Absent', '2023-07-19'),
(463, 26, '', '', '', '', 'Absent', '2023-07-19'),
(464, 27, '', '', '', '', 'Absent', '2023-07-19'),
(465, 28, '', '', '', '', 'Absent', '2023-07-19'),
(466, 29, '', '', '', '', 'Absent', '2023-07-19'),
(467, 30, '', '', '', '', 'Absent', '2023-07-19'),
(468, 32, '', '', '', '', 'Absent', '2023-07-19'),
(469, 31, '', '', '', '', 'Absent', '2023-07-19'),
(470, 7, '', '', '', '', 'Absent', '2023-07-23'),
(471, 1, '', '', '', '', 'Absent', '2023-07-23'),
(472, 11, '', '', '', '', 'Absent', '2023-07-23'),
(473, 17, '', '', '', '', 'Absent', '2023-07-23'),
(474, 13, '', '', '', '', 'Absent', '2023-07-23'),
(475, 20, '', '', '', '', 'Absent', '2023-07-23'),
(476, 23, '', '', '', '', 'Absent', '2023-07-23'),
(477, 25, '', '', '', '', 'Absent', '2023-07-23'),
(478, 26, '', '', '', '', 'Absent', '2023-07-23'),
(479, 14, '', '', '', '', 'Absent', '2023-07-23'),
(480, 27, '', '', '', '', 'Absent', '2023-07-23'),
(481, 31, '', '', '', '', 'Absent', '2023-07-23'),
(482, 30, '', '', '', '', 'Absent', '2023-07-23'),
(483, 28, '', '', '', '', 'Absent', '2023-07-23'),
(484, 32, '', '', '', '', 'Absent', '2023-07-23'),
(485, 29, '', '', '', '', 'Absent', '2023-07-23'),
(486, 1, '', '', '', '', 'Absent', '2023-07-24'),
(487, 7, '', '', '', '', 'Absent', '2023-07-24'),
(488, 17, '', '', '', '', 'Absent', '2023-07-24'),
(489, 11, '', '', '', '', 'Absent', '2023-07-24'),
(490, 13, '', '', '', '', 'Absent', '2023-07-24'),
(491, 20, '', '', '', '', 'Absent', '2023-07-24'),
(492, 14, '', '', '', '', 'Absent', '2023-07-24'),
(493, 23, '', '', '', '', 'Absent', '2023-07-24'),
(494, 25, '', '', '', '', 'Absent', '2023-07-24'),
(495, 26, '', '', '', '', 'Absent', '2023-07-24'),
(496, 27, '', '', '', '', 'Absent', '2023-07-24'),
(497, 28, '', '', '', '', 'Absent', '2023-07-24'),
(498, 29, '', '', '', '', 'Absent', '2023-07-24'),
(499, 30, '', '', '', '', 'Absent', '2023-07-24'),
(500, 31, '', '', '', '', 'Absent', '2023-07-24'),
(501, 32, '', '', '', '', 'Absent', '2023-07-24'),
(502, 14, '', '', '', '', 'Absent', '2023-08-04'),
(503, 13, '', '', '', '', 'Absent', '2023-08-04'),
(504, 1, '', '', '', '', 'Absent', '2023-08-04'),
(505, 7, '', '', '', '', 'Absent', '2023-08-04'),
(506, 23, '', '', '', '', 'Absent', '2023-08-04'),
(507, 11, '', '', '', '', 'Absent', '2023-08-04'),
(508, 17, '', '', '', '', 'Absent', '2023-08-04'),
(509, 25, '', '', '', '', 'Absent', '2023-08-04'),
(510, 26, '', '', '', '', 'Absent', '2023-08-04'),
(511, 28, '', '', '', '', 'Absent', '2023-08-04'),
(512, 27, '', '', '', '', 'Absent', '2023-08-04'),
(513, 29, '', '', '', '', 'Absent', '2023-08-04'),
(514, 30, '', '', '', '', 'Absent', '2023-08-04'),
(515, 31, '', '', '', '', 'Absent', '2023-08-04'),
(516, 32, '', '', '', '', 'Absent', '2023-08-04'),
(517, 20, '', '', '', '', 'Absent', '2023-08-04'),
(518, 1, '1:37:54 PM', '1:39:44 PM', 'Time-in recorded', 'Time-out recorded', 'Present', '2023-08-06'),
(519, 13, '1:39:00 PM', '', 'Time-in recorded', '', '', '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `class_schedules`
--

CREATE TABLE `class_schedules` (
  `id` int(11) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `yearlevels_id` bigint(11) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `sample_day` int(11) DEFAULT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acronym` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `acronym`, `department_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'JHS', 'Junior High School', NULL, NULL, NULL),
(3, 'Elem', 'Elementary', NULL, NULL, NULL),
(15, 'SHS', 'Senior High School', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `display_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Developer', NULL, NULL, NULL),
(2, 'Principal', NULL, NULL, NULL),
(3, 'Teacher', NULL, NULL, NULL),
(4, 'Security Guard', NULL, NULL, NULL),
(5, 'Staff', NULL, NULL, NULL),
(6, 'Admin', NULL, NULL, NULL),
(8, 'Utility', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(25) NOT NULL,
  `room_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(12, '110', '');

-- --------------------------------------------------------

--
-- Table structure for table `sample_time`
--

CREATE TABLE `sample_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `sched_index` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schoolyears`
--

CREATE TABLE `schoolyears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolyears`
--

INSERT INTO `schoolyears` (`id`, `school_year`, `batch_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-2023', 'MALAKAS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LRN` varchar(255) NOT NULL,
  `yearlevel_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `extname` varchar(255) DEFAULT NULL,
  `stud_contact_num` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `gender` int(11) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `baranggay` varchar(255) NOT NULL,
  `housenum` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `pog_fname` varchar(255) NOT NULL,
  `pog_mname` varchar(255) DEFAULT NULL,
  `pog_lname` varchar(255) DEFAULT NULL,
  `pog_extname` varchar(255) DEFAULT NULL,
  `pog_contact_num` varchar(255) NOT NULL,
  `pog_baranggay` varchar(255) NOT NULL,
  `pog_housenum` varchar(255) NOT NULL,
  `pog_purok` varchar(255) NOT NULL,
  `pog_municipality` varchar(255) NOT NULL,
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
  `subject_name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `department_id`) VALUES
(64, 'English ', 3),
(65, 'ArPan ', 3),
(66, 'MAPEH ', 3),
(67, 'CL', 3),
(68, 'Remediation/Reading and Writing Time ', 3),
(69, 'Science ', 3),
(70, 'Homeroom ', 3),
(71, 'Dear Bible', 3),
(72, 'Computer ', 3),
(73, 'PLC ', 3),
(74, 'ESP ', 3),
(76, 'TLE ', 2),
(79, 'Remediation ', 3),
(81, 'Math ', 3),
(83, 'Filipino ', 3),
(85, 'HOPE ', 3),
(88, 'CL', 2),
(90, 'Computer', 2),
(92, 'English ', 2),
(93, 'ESP ', 2),
(94, 'Filipino ', 2),
(95, 'Homeroom ', 2),
(97, 'MAPEH ', 2),
(98, 'Remediation ', 2),
(99, 'Science ', 2),
(103, 'Math', 2),
(104, 'HOPE', 15);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `bio_data` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `bio_data`, `fname`, `mname`, `lname`, `address`, `contact_num`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '123', 'Francis', 'De Leon', 'Caraang', '', '', '', '', NULL, NULL, NULL, NULL),
(7, 4, '1234', 'Ralph', 'Dojo', 'Villanueva', 'asdfa', 'afds', 'asdfsa@g', '', NULL, NULL, NULL, NULL),
(11, 5, 'Dandan', 'Dandan', 'Angelo', 'Apan', 'asdfsa', '1231', 'dfas@g', '', NULL, NULL, NULL, NULL),
(13, 4, 'Jerome', 'jEROME', 'fad', 'DGS', 'SFD', '234', 'GSDF@', '', NULL, NULL, NULL, NULL),
(14, 5, 'Joshua', 'Joshua', 'asfas', 'fsadfa', 'afds', '1231', 'fasd@', '', NULL, NULL, NULL, NULL),
(17, 4, 'Jonas', 'Jonas', 'asdf', 'Delos Santos', 'asdfas', '214131', 'adfasd@gm', '', NULL, NULL, NULL, NULL),
(20, 5, 'Ronna', 'Ronna', 'adsfs', 'Mag-isa', 'asfds', '213131', 'afdsasfas@gma', '', NULL, NULL, NULL, NULL),
(23, 3, 'NJohn', 'N John', '', 'EGONIO', '', '', 'sampleemail@gmail.com', '', NULL, NULL, NULL, NULL),
(25, 3, 'Reynald', ' REYNALD ', '', 'SALAZAR', '', '', 'sampleemail@gmail2.com', '', NULL, NULL, NULL, NULL),
(26, 3, 'John', 'JOHN KENNETH ', '', 'QUIZANA', '', '', 'sampleemail3@gmail.com', '', NULL, NULL, NULL, NULL),
(27, 3, 'Cyrille', 'CYRILLE ', '', 'PAJARILLAGA', '', '', 'sampleemail4@gmail.com', '', NULL, NULL, NULL, NULL),
(28, 3, 'Rhea', 'RHEA ', '', 'TABANGCORA', '', '', 'sampleemail5@gmail.com', '', NULL, NULL, NULL, NULL),
(29, 3, 'Euvelyn', 'EUVELYN', ' D. ', 'SANTIAGO', '', '', 'sampleemail6@gmail.com', '', NULL, NULL, NULL, NULL),
(30, 3, 'Liezel', 'LIEZEL ', 'A. ', 'ESTAREZ', '', '', 'sampleemail7@gmail.com', '', NULL, NULL, NULL, NULL),
(31, 3, 'Denell', 'DENELL ', '', 'AGNO', '', '', 'sampleemail8@gmail.com', '', NULL, NULL, NULL, NULL),
(32, 3, 'Rosemarie', 'ROSEMARIE ', '', 'MANABAT', '', '', 'sampleemail9@gmail.com', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearlevels`
--

CREATE TABLE `yearlevels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `schoolyear_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yearlevel_name` varchar(255) NOT NULL,
  `designated_room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designated_session_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yearlevels`
--

INSERT INTO `yearlevels` (`id`, `section_id`, `schoolyear_id`, `department_id`, `yearlevel_name`, `designated_room_id`, `designated_session_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 34, 1, 3, 'Grade 3', 2, 0, NULL, NULL, NULL),
(17, 35, 1, 3, 'Grade 4', 2, 1, NULL, NULL, NULL),
(18, 40, 1, 3, 'Grade 5', 3, 0, NULL, NULL, NULL),
(19, 43, 1, 3, 'Grade 6', 3, 1, NULL, NULL, NULL),
(21, 44, 1, 2, 'Grade 7', 6, 0, NULL, NULL, NULL),
(22, 45, 1, 2, 'Grade 8', 6, 1, NULL, NULL, NULL),
(23, 46, 1, 2, 'Grade 9', 7, 0, NULL, NULL, NULL),
(24, 48, 1, 2, 'Grade 9', 7, 1, NULL, NULL, NULL),
(25, 52, 1, 2, 'Grade 10', 8, 0, NULL, NULL, NULL),
(26, 53, 1, 2, 'Grade 10', 8, 1, NULL, NULL, NULL),
(29, 31, 1, 3, 'Grade 2', 1, 1, NULL, NULL, NULL),
(30, 30, 1, 3, 'Grade 1', 1, 0, NULL, NULL, NULL);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_yearlevel_id_foreign` (`yearlevel_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `yearlevels_section_id_foreign` (`section_id`),
  ADD KEY `yearlevels_schoolyear_id_foreign` (`schoolyear_id`),
  ADD KEY `yearlevels_department_id_foreign` (`department_id`),
  ADD KEY `f_r_id` (`designated_room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `class_schedules`
--
ALTER TABLE `class_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `yearlevels`
--
ALTER TABLE `yearlevels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD CONSTRAINT `attendance_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule2`
--
ALTER TABLE `schedule2`
  ADD CONSTRAINT `schedule2_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule2_ibfk_2` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule2_ibfk_3` FOREIGN KEY (`yearlevels_id`) REFERENCES `yearlevels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
