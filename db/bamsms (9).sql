-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 09:22 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `user_id`, `time_in`, `time_out`, `remarks_in`, `remarks_out`, `status`, `attendance_date`) VALUES
(703, 38, '7:22:36 PM', '7:23:11 PM', 'Time-in', 'Time-out', 'Present', '2023-09-16'),
(704, 40, '7:22:49 PM', '7:23:33 PM', 'Late', 'Right Time out', 'Present', '2023-09-16'),
(705, 1, '7:23:20 PM', '', 'Time-in', '', 'Incomplete', '2023-09-16'),
(728, 17, '', '', '', '', 'Absent', '2023-09-16'),
(729, 20, '', '', '', '', 'Absent', '2023-09-16'),
(730, 14, '', '', '', '', 'Absent', '2023-09-16'),
(731, 23, '', '', '', '', 'Absent', '2023-09-16'),
(732, 25, '', '', '', '', 'Absent', '2023-09-16'),
(733, 26, '', '', '', '', 'Absent', '2023-09-16'),
(734, 27, '', '', '', '', 'Absent', '2023-09-16'),
(735, 28, '', '', '', '', 'Absent', '2023-09-16'),
(736, 29, '', '', '', '', 'Absent', '2023-09-16'),
(737, 30, '', '', '', '', 'Absent', '2023-09-16'),
(738, 31, '', '', '', '', 'Absent', '2023-09-16'),
(739, 32, '', '', '', '', 'Absent', '2023-09-16'),
(740, 33, '', '', '', '', 'Absent', '2023-09-16'),
(741, 52, '', '', '', '', 'Absent', '2023-09-16'),
(742, 68, '', '', '', '', 'Absent', '2023-09-16'),
(743, 69, '', '', '', '', 'Absent', '2023-09-16'),
(744, 71, '', '', '', '', 'Absent', '2023-09-16'),
(745, 73, '', '', '', '', 'Absent', '2023-09-16'),
(746, 74, '', '', '', '', 'Absent', '2023-09-16'),
(747, 77, '', '', '', '', 'Absent', '2023-09-16'),
(748, 83, '', '', '', '', 'Absent', '2023-09-16'),
(749, 82, '', '', '', '', 'Absent', '2023-09-16');

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
(57, 25, 30, 109, '2022-2023', '1st', 0, '07:30:00', '09:00:00'),
(60, 25, 19, 65, '2021-2022', '1st', 0, '09:30:00', '10:30:00'),
(72, 25, 30, 81, '2022-2023', '1st', 0, '06:30:00', '07:30:00'),
(79, 26, 32, 120, '2021-2022', '1st', 0, '10:30:00', '11:30:00'),
(81, 25, 30, 85, '2022-2023', '1st', 0, '08:30:00', '10:30:00'),
(82, 25, 30, 79, '2022-2023', '1st', 0, '13:00:00', '14:00:00'),
(84, 25, 30, 74, '2022-2023', '1st', 0, '14:00:00', '15:30:00'),
(86, 23, 30, 83, '2022-2023', '1st', 0, '15:00:00', '16:30:00'),
(91, 69, NULL, NULL, '2022-2023', '1st', 0, '08:00:00', '16:30:00'),
(95, 52, NULL, NULL, '2022-2023', '1st', 0, '08:00:00', '16:30:00'),
(96, 25, 30, 123, '2022-2023', '1st', 0, '11:00:00', '13:00:00'),
(98, 40, NULL, NULL, '2022-2023', '1st', 5, '08:00:00', '16:30:00'),
(99, 14, NULL, NULL, '2022-2023', '1st', 1, '15:00:00', '23:00:00'),
(101, 23, 30, 72, '2022-2023', '1st', 0, '16:00:00', '17:30:00'),
(103, 14, NULL, NULL, '2022-2023', '1st', 0, '06:00:00', '13:00:00'),
(104, 25, 30, 73, '2022-2023', '1st', 0, '15:00:00', '16:30:00');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `display_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Developer', NULL, NULL, NULL),
(1, 'Admin', NULL, NULL, NULL),
(2, 'Principal', NULL, NULL, NULL),
(3, 'Teacher', NULL, NULL, NULL),
(4, 'Security Guard', NULL, NULL, NULL),
(5, 'Staff', NULL, NULL, NULL),
(8, 'Utility', NULL, NULL, NULL),
(11, 'Seller', NULL, NULL, NULL),
(12, 'Teacher 3', NULL, NULL, NULL);

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
  `batch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolyears`
--

INSERT INTO `schoolyears` (`id`, `school_year`, `batch_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-2023', 'MALAKAS', NULL, NULL, NULL),
(6, '2021-2022', 'asdfsa', NULL, NULL, NULL);

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
(56, 'San Lorenzo Ruiz', NULL, NULL, NULL),
(57, 'New Section', NULL, NULL, NULL);

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
  `subject_name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `department_id`) VALUES
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
(104, 'HOPE', 15),
(106, 'Computer', 15),
(109, 'English', 3),
(115, 'Math', 15),
(116, 'English', 15),
(120, 'Dear Bible', 1),
(122, 'TLE', 3),
(123, 'Morning Break', 3),
(124, 'Afternoon Break', 3),
(125, 'Morning Break', 2),
(126, 'Morning Break', 1),
(127, 'Afternoon Break', 2),
(128, 'Afternoon Break', 1);

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
(1, 'ako.jpg', 0, 'FrancisDe LeonCaraangfrancisdeleon872@gmail.com', 'Francis', 'De Leon', 'Caraang', 'Brgy. Concepcion, General Tinio, Nueva Ecija', '09777514483', 'francisdeleon872@gmail.com', 'active', 'no', '73627070746c7167', NULL, NULL, NULL, NULL),
(7, '', 4, '1234', 'Ralph', 'Dojo', 'Villanueva', 'asdfa', 'afds', 'asdfsa@g', 'inactive', 'no', '', NULL, NULL, NULL, NULL),
(13, '', 4, 'Jerome', 'jEROME', 'fad', 'DGS', 'SFD', '234', 'GSDF@', 'inactive', 'no', '', NULL, NULL, NULL, NULL),
(14, 'img-4.jpg', 5, 'Joshua', 'Joshua', 'asfas', 'fsadfa', 'afds', '1231', 'fasd@', 'active', 'no', '', NULL, NULL, NULL, NULL),
(17, '', 4, 'Jonas', 'Jonas', 'asdf', 'Delos Santos', 'asdfas', '214131', 'adfasd@gm', 'active', 'no', '', NULL, NULL, NULL, NULL),
(20, '', 5, 'Ronna', 'Ronna', 'adsfs', 'Mag-isa', 'asfds', '213131', 'afdsasfas@gma', 'active', 'no', '', NULL, NULL, NULL, NULL),
(23, '', 3, 'NJohn', 'Nhor John', '', 'EGONIO', '', '', 'sampleemail@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(25, '', 3, 'Reynald', ' REYNALD ', '', 'SALAZAR', '', '', 'sampleemail@gmail2.com', 'active', 'yes', '73627070746c7167', NULL, NULL, NULL, NULL),
(26, '', 3, 'John', 'JOHN KENNETH ', '', 'QUIZANA', '', '', 'sampleemail3@gmail.com', 'active', 'yes', '73627070746c7167', NULL, NULL, NULL, NULL),
(27, '', 3, 'Cyrille', 'CYRILLE ', '', 'PAJARILLAGA', '', '', 'sampleemail4@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(28, '', 3, 'Rhea', 'RHEA ', '', 'TABANGCORA', '', '', 'sampleemail5@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(29, '', 3, 'Euvelyn', 'EUVELYN', ' D. ', 'SANTIAGO', '', '', 'sampleemail6@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(30, '', 3, 'Liezel', 'LIEZEL ', 'A. ', 'ESTAREZ', '', '', 'sampleemail7@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(31, '', 3, 'Denell', 'DENELL ', '', 'AGNO', '', '', 'sampleemail8@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(32, '', 3, 'Rosemarie', 'ROSEMARIE ', '', 'MANABAT', '', '', 'sampleemail9@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(33, '', 4, 'NULL', 'Daniel', 'IDK', 'Apan', 'sadasa', '1231', 'asdfas@gmail.com', 'active', 'no', '', NULL, NULL, NULL, NULL),
(34, '', 5, NULL, 'Chiara Alyssa', 'Tapang', 'Abesamis', 'Brgy. Concepcion, General Tinio, Nueva Ecija', '0909090909090', 'chiaratapang@gmail.com', 'inactive', 'teaching', '', NULL, NULL, NULL, NULL),
(38, '', 4, 'asfdsafafdsafsafsadfasqweqw@gmail.com', 'asfdsafa', 'fdsafsa', 'fsadfas', 'fdsafafa', '2132131', 'qweqw@gmail.com', 'active', 'no', '', NULL, NULL, NULL, NULL),
(40, '', 4, 'RafaelDojoVillanuevarafael@gmail.com', 'Rafael', 'Dojo', 'Villanueva', 'adfa', '1231312', 'rafael@gmail.com', 'active', 'no', '', NULL, NULL, NULL, NULL),
(52, '', 4, 'May LogoNa EmloyeeAndito afdsas@gmail.com', 'May Logo', 'Na Emloyee', 'Andito ', 'Na', 'asfda', 'afdsas@gmail.com', 'active', 'no', '', NULL, NULL, NULL, NULL),
(68, 'room.png', 4, '11001010011110100011001101110110111111011111000010titssadfafadsfa2131@gmail.com', 'tits', 'sadfa', 'fadsfa', 'fadsfa', 'fdasfa21312', '2131@gmail.com', 'active', 'no', '', NULL, NULL, NULL, NULL),
(69, 'team.png', 2, '11101110100100101010100000001100111000110101111101AKo ito guysadfa', 'AKo ', 'ito s', 'guys', 'asdfa', 'f21321', 'adfa', 'active', 'no', '', NULL, NULL, NULL, NULL),
(71, 'home.png', 2, '00001010101101011100101110111000100011010100001000asdfadsfafds', 'asdf', '', 'adsf', 'afds', '231', 'afds', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(73, 'fc.png', 11, '10010111010110111010011010010001011001011010101000afdsfdasasfddasfas@gmail.com', 'afds', 'fdas', 'asfd', 'fdsa', '21313', 'dasfas@gmail.com', 'active', 'yes', '', NULL, NULL, NULL, NULL),
(74, 'asdfa.png', 1, '00100101101011101011000000110110000011011001111001gagokabahayopfadfas', 'gago', 'kaba', 'hayop', 'ka ', '1231', 'fadfas', 'active', 'no', '', NULL, NULL, NULL, NULL),
(77, 'p.png', 1, '10100011110110101101101011001100000100101110001010taekasafdaasdfsa', 'tae', 'ka', 'safda', 'fdasf', '2131', 'asdfsa', 'active', 'no', '', NULL, NULL, NULL, NULL),
(82, '1-Angels-Burger-success-story-1068x601.jpeg', 2, '10001101110110010110011000000001001000010011010001gagifafdfsadffrancisdeleon3000@gmail.com', 'gagi', 'fafd', 'fsadf', 'fasfds', '2131', 'francisdeleon3000@gmail.com', 'active', 'no', '417a57757365767b', NULL, NULL, NULL, NULL),
(83, 'angels-burger-buy-1-take-1.jpeg', 2, '10011000011111100010100110011111001001100001110100taefasdffsadfsafrancisdeleon2021@gmail.com', 'tae', 'fasdf', 'fsadfsa', 'fsadfas', '2131', 'francisdeleon2021@gmail.com', 'active', 'no', '70413161526d455a', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearlevels`
--

CREATE TABLE `yearlevels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yearlevel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designated_room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yearlevels`
--

INSERT INTO `yearlevels` (`id`, `section_id`, `department_id`, `yearlevel_name`, `designated_room_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 34, 3, 'Grade 3', 2, NULL, NULL, NULL),
(17, 35, 3, 'Grade 4', 2, NULL, NULL, NULL),
(18, 40, 3, 'Grade 5', 3, NULL, NULL, NULL),
(19, 43, 3, 'Grade 6', 3, NULL, NULL, NULL),
(21, 44, 2, 'Grade 7', 6, NULL, NULL, NULL),
(22, 45, 2, 'Grade 8', 6, NULL, NULL, NULL),
(23, 46, 2, 'Grade 9', 7, NULL, NULL, NULL),
(24, 48, 2, 'Grade 9', 7, NULL, NULL, NULL),
(25, 52, 2, 'Grade 10', 8, NULL, NULL, NULL),
(26, 53, 2, 'Grade 10', 8, NULL, NULL, NULL),
(29, 31, 3, 'Grade 2', 1, NULL, NULL, NULL),
(30, 30, 3, 'Grade 1', 2, NULL, NULL, NULL),
(31, 54, 1, 'Grade 11 - ICT', 11, NULL, NULL, NULL),
(32, 56, 1, 'Grade 12 - ABM', 12, NULL, NULL, NULL),
(49, 57, 1, 'Grade 11 - ABM ', 11, NULL, NULL, NULL);

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
  ADD KEY `yearlevels_department_id_foreign` (`department_id`),
  ADD KEY `f_r_id` (`designated_room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750;

--
-- AUTO_INCREMENT for table `class_schedules`
--
ALTER TABLE `class_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `yearlevels`
--
ALTER TABLE `yearlevels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  ADD CONSTRAINT `yearlevels_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `yearlevels_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
