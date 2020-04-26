-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 08:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_no` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`bed_no`, `status`, `price`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'available', 5500, 301, '2018-09-09 04:09:02', '2018-09-09 11:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill` double NOT NULL,
  `ckeck_in_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_rooms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `from`, `to`, `room_type`, `no_of_rooms`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '10/02/2018', '10/03/2018', '1', '1', 4, '2018-09-02 16:38:28', '2018-09-02 16:38:28'),
(2, '09/18/2018', '09/06/2018', '1', '1', 4, '2018-09-02 16:39:43', '2018-09-02 16:39:43'),
(3, '09/18/2018', '09/06/2018', '1', '1', 4, '2018-09-02 16:41:23', '2018-09-02 16:41:23'),
(4, '10/03/2018', '10/03/2018', '1', '1', 4, '2018-09-02 16:43:53', '2018-09-02 16:43:53'),
(5, '09/03/2018', '09/05/2018', '2', '2', 4, '2018-09-03 06:22:43', '2018-09-03 06:22:43'),
(6, '09/12/2018', '09/25/2018', '1', '1', 4, '2018-09-03 06:28:47', '2018-09-03 06:28:47'),
(7, '09/12/2018', '09/25/2018', '1', '1', 4, '2018-09-03 06:31:44', '2018-09-03 06:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(2, 'AC', '2018-09-07 01:16:10', '2018-09-07 01:16:10'),
(3, 'Non_AC', '2018-09-07 01:16:24', '2018-09-07 01:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `check_ins`
--

CREATE TABLE `check_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_ins`
--

INSERT INTO `check_ins` (`id`, `cus_id`, `status`, `created_at`, `updated_at`) VALUES
(12, 13, 'checked_out', '2018-09-08 06:37:47', '2018-09-08 14:21:15'),
(13, 14, 'checked_out', '2018-09-08 06:55:43', '2018-09-08 14:20:31'),
(14, 15, 'checked_out', '2018-09-08 14:37:59', '2018-09-08 16:02:43'),
(15, 16, 'checked_in', '2018-09-08 14:38:43', '2018-09-08 14:38:43'),
(16, 17, 'checked_in', '2018-09-08 14:38:56', '2018-09-08 14:38:56'),
(17, 18, 'checked_in', '2018-09-08 14:39:41', '2018-09-08 14:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', 'this is test', 'test', '2018-09-03 04:44:02', '2018-09-03 04:44:02'),
(2, 'qaisar', 'qaisar@gmail.com', 'test', 'test', '2018-09-03 05:31:56', '2018-09-03 05:31:56'),
(3, 'qaisar', 'qaisar@gmail.com', 'test', 'this is test message', '2018-09-03 05:32:31', '2018-09-03 05:32:31'),
(4, 'qaisar', 'qaisar@gmail.com', 'test', 'this is test message', '2018-09-03 05:34:32', '2018-09-03 05:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `fname`, `cnic`, `age`, `created_at`, `updated_at`) VALUES
(12, 'qaisar', 'ansar', '1234512345671', 22, '2018-09-08 06:37:03', '2018-09-08 06:37:03'),
(13, 'qaisar', 'ansar', '1234512345671', 22, '2018-09-08 06:37:47', '2018-09-08 06:37:47'),
(14, 'qaisar', 'ansar', '1234512345671', 22, '2018-09-08 06:55:43', '2018-09-08 06:55:43'),
(15, 'adnan', 'khan', '1234512345671', 22, '2018-09-08 14:37:59', '2018-09-08 14:37:59'),
(16, 'adnan', 'khan', '1234512345671', 22, '2018-09-08 14:38:43', '2018-09-08 14:38:43'),
(17, 'adnan', 'khan', '1234512345671', 22, '2018-09-08 14:38:56', '2018-09-08 14:38:56'),
(18, 'adnan', 'khan', '1234512345671', 22, '2018-09-08 14:39:41', '2018-09-08 14:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_rooms`
--

CREATE TABLE `hostel_rooms` (
  `room_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_rooms`
--

INSERT INTO `hostel_rooms` (`room_no`, `created_at`, `updated_at`) VALUES
(301, '2018-09-09 03:57:03', '2018-09-09 03:57:03'),
(302, '2018-09-09 03:57:19', '2018-09-09 03:57:19'),
(303, '2018-09-09 03:57:24', '2018-09-09 03:57:24'),
(304, '2018-09-09 03:57:30', '2018-09-09 03:57:30');

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
(1, '2018_09_02_135731_create_contact_uses_table', 1),
(2, '2018_09_02_204224_create_bookings_table', 1),
(3, '2018_09_07_053618_create_rooms_table', 2),
(4, '2018_09_07_054251_create_categories_table', 2),
(5, '2018_09_07_053618_create_room_table', 3),
(6, '2018_09_07_130730_create_customers_table', 4),
(7, '2018_09_07_131314_create_check_ins_table', 5),
(8, '2018_09_07_131650_create_bills_table', 6),
(9, '2018_09_09_083338_create_hostel_rooms_table', 7),
(10, '2018_09_09_093130_create_students_table', 8),
(11, '2018_09_09_163118_prev_bed_details', 9);

-- --------------------------------------------------------

--
-- Table structure for table `prev_bed_details`
--

CREATE TABLE `prev_bed_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prev_bed_details`
--

INSERT INTO `prev_bed_details` (`id`, `name`, `fname`, `cnic`, `age`, `bed_no`, `created_at`, `updated_at`) VALUES
(1, 'sami', 'khan', '1234512345671', 20, 1, '2018-09-09 11:40:35', '2018-09-09 11:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_no` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_no`, `status`, `price`, `cat_id`, `created_at`, `updated_at`) VALUES
(201, 'booked', 1500, 2, '2018-09-07 01:41:38', '2018-09-08 16:03:10'),
(202, 'booked', 1500, 3, '2018-09-08 06:35:30', '2018-09-08 14:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `room_check_ins`
--

CREATE TABLE `room_check_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `check_in_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_check_ins`
--

INSERT INTO `room_check_ins` (`id`, `check_in_id`, `room_id`) VALUES
(8, 12, 201),
(9, 12, 202),
(10, 13, 201),
(11, 14, 201),
(12, 15, 201),
(13, 16, 201),
(14, 17, 202),
(15, 17, 201);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `fname`, `cnic`, `age`, `bed_id`, `created_at`, `updated_at`) VALUES
(2, 'adasd', 'asdad', '1234512345671', 22, 1, '2018-09-09 11:26:00', '2018-09-09 11:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `ph`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'xyz', 'test@test.com', '0300-1234567', '$2y$10$bRGCduTPLdIVMIoyoFX4V.p3e8gcqOBmS7lf46LeeIN2BFKD3zuNG', 'ejE3mMzeucfgCqluJhxVxSHpQ8LJ7zuLmmkxRG0WMZOo1pG9empVj6oIOApl', '2018-09-02 15:40:58', '2018-09-02 15:40:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ckeck_in_id_foreign` (`ckeck_in_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_ins`
--
ALTER TABLE `check_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_ins_cus_id_foreign` (`cus_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prev_bed_details`
--
ALTER TABLE `prev_bed_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `rooms_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `room_check_ins`
--
ALTER TABLE `room_check_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `check_in_id` (`check_in_id`) USING BTREE;

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bed_id` (`bed_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `check_ins`
--
ALTER TABLE `check_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prev_bed_details`
--
ALTER TABLE `prev_bed_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_check_ins`
--
ALTER TABLE `room_check_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `hostel_rooms` (`room_no`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ckeck_in_id_foreign` FOREIGN KEY (`ckeck_in_id`) REFERENCES `check_ins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `check_ins`
--
ALTER TABLE `check_ins`
  ADD CONSTRAINT `check_ins_cus_id_foreign` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_check_ins`
--
ALTER TABLE `room_check_ins`
  ADD CONSTRAINT `room_check_ins_ibfk_1` FOREIGN KEY (`check_in_id`) REFERENCES `check_ins` (`id`),
  ADD CONSTRAINT `room_check_ins_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_no`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`bed_id`) REFERENCES `beds` (`bed_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
