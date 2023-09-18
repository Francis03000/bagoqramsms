-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 05:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `class_schedules`
--

CREATE TABLE `class_schedules` (
  `id` int(11) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `yearlevels_id` bigint(11) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `sample_time_id` bigint(20) UNSIGNED NOT NULL,
  `sample_day` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_schedules`
--

INSERT INTO `class_schedules` (`id`, `teacher_id`, `yearlevels_id`, `subject_id`, `sample_time_id`, `sample_day`) VALUES
(23, 25, 14, 64, 23, 0),
(24, 25, 15, 65, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `acronym`, `department_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SHS', 'Senior High School', NULL, NULL, NULL),
(2, 'JHS', 'Junior High School', NULL, NULL, NULL),
(3, 'Elem', 'Elementary', NULL, NULL, NULL);

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
(26, '12:30:00', '01:20:00', '6'),
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
(1, '2022-2023', 'MALAKAS', NULL, NULL, NULL);

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
(55, 'San Lorenzo Ruiz', NULL, NULL, NULL);

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
  `department_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(75, 'Physical Science ', 1),
(76, 'TLE ', 2),
(78, 'EAPP ', 1),
(79, 'Remediation ', 3),
(80, 'Applied Economics', 1),
(81, 'Math ', 3),
(82, 'Stat and Prob', 1),
(83, 'Filipino ', 3),
(84, 'Gen. Physics', 1),
(85, 'HOPE ', 3),
(86, 'Practical Research', 1),
(88, 'CL', 2),
(89, 'CL', 1),
(90, 'Computer', 2),
(91, 'Computer', 1),
(92, 'English ', 2),
(93, 'ESP ', 2),
(94, 'Filipino ', 2),
(95, 'Homeroom ', 2),
(96, 'Homeroom ', 1),
(97, 'MAPEH ', 2),
(98, 'Remediation ', 2),
(99, 'Science ', 2),
(103, 'Math', 2);

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
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `fname`, `mname`, `lname`, `address`, `contact_num`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Francis', 'De Leon', 'Caraang', '', '', '', '', NULL, NULL, NULL, NULL),
(7, 4, 'Ralph', 'Dojo', 'Villanueva', 'asdfa', 'afds', 'asdfsa@g', '', NULL, NULL, NULL, NULL),
(11, 5, 'Dandan', 'Angelo', 'Apan', 'asdfsa', '1231', 'dfas@g', '', NULL, NULL, NULL, NULL),
(13, 4, 'jEROME', 'fad', 'DGS', 'SFD', '234', 'GSDF@', '', NULL, NULL, NULL, NULL),
(14, 5, 'Joshua', 'asfas', 'fsadfa', 'afds', '1231', 'fasd@', '', NULL, NULL, NULL, NULL),
(17, 4, 'Jonas', 'asdf', 'Delos Santos', 'asdfas', '214131', 'adfasd@gm', '', NULL, NULL, NULL, NULL),
(19, 4, 'Mark Vincent', 'ASFD', 'Delos Santos', 'sadfas', '213131', 'asfdas@gma', '', NULL, NULL, NULL, NULL),
(20, 5, 'Ronna', 'adsfs', 'Mag-isa', 'asfds', '213131', 'afdsasfas@gma', '', NULL, NULL, NULL, NULL),
(23, 3, 'N John', '', 'EGONIO', '', '', 'sampleemail@gmail.com', '', NULL, NULL, NULL, NULL),
(25, 3, ' REYNALD ', '', 'SALAZAR', '', '', 'sampleemail@gmail2.com', '', NULL, NULL, NULL, NULL),
(26, 3, 'JOHN KENNETH ', '', 'QUIZANA', '', '', 'sampleemail3@gmail.com', '', NULL, NULL, NULL, NULL),
(27, 3, 'CYRILLE ', '', 'PAJARILLAGA', '', '', 'sampleemail4@gmail.com', '', NULL, NULL, NULL, NULL),
(28, 3, 'RHEA ', '', 'TABANGCORA', '', '', 'sampleemail5@gmail.com', '', NULL, NULL, NULL, NULL),
(29, 3, 'EUVELYN', ' D. ', 'SANTIAGO', '', '', 'sampleemail6@gmail.com', '', NULL, NULL, NULL, NULL),
(30, 3, 'LIEZEL ', 'A. ', 'ESTAREZ', '', '', 'sampleemail7@gmail.com', '', NULL, NULL, NULL, NULL),
(31, 3, 'DENELL ', '', 'AGNO', '', '', 'sampleemail8@gmail.com', '', NULL, NULL, NULL, NULL),
(32, 3, 'ROSEMARIE ', '', 'MANABAT', '', '', 'sampleemail9@gmail.com', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearlevels`
--

CREATE TABLE `yearlevels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `schoolyear_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yearlevel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(14, 30, 1, 3, 'Grade 1', 1, 0, NULL, NULL, NULL),
(15, 31, 1, 3, 'Grade 2', 1, 1, NULL, NULL, NULL),
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
(27, 54, 1, 1, 'Grade 11', 9, 0, NULL, NULL, NULL),
(28, 55, 1, 1, 'Grade 12', 9, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_schedules`
--
ALTER TABLE `class_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yearlevels_id` (`yearlevels_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `s_id` (`sample_time_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

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
-- AUTO_INCREMENT for table `class_schedules`
--
ALTER TABLE `class_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_schedules`
--
ALTER TABLE `class_schedules`
  ADD CONSTRAINT `f_year_id` FOREIGN KEY (`yearlevels_id`) REFERENCES `yearlevels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_id` FOREIGN KEY (`sample_time_id`) REFERENCES `sample_time` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `st_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_f_id` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule2`
--
ALTER TABLE `schedule2`
  ADD CONSTRAINT `schedule2_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule2_ibfk_2` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule2_ibfk_3` FOREIGN KEY (`yearlevels_id`) REFERENCES `yearlevels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `f_sub_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sched_teacher` FOREIGN KEY (`teacher_sched_id`) REFERENCES `teacher_schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_3` FOREIGN KEY (`yearlevels_id`) REFERENCES `yearlevels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_yearlevel_id_foreign` FOREIGN KEY (`yearlevel_id`) REFERENCES `yearlevels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  ADD CONSTRAINT `user_id_f` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `yearlevels`
--
ALTER TABLE `yearlevels`
  ADD CONSTRAINT `f_r_id` FOREIGN KEY (`designated_room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yearlevels_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yearlevels_schoolyear_id_foreign` FOREIGN KEY (`schoolyear_id`) REFERENCES `schoolyears` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yearlevels_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
