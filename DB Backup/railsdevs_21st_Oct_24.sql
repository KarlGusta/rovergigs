-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2024 at 07:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_profiles`
--

CREATE TABLE `business_profiles` (
  `id` int(6) UNSIGNED NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `bio` text DEFAULT NULL,
  `personal_name` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `developer_notifications` tinyint(1) DEFAULT NULL,
  `survey_requests` tinyint(1) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_profiles`
--

INSERT INTO `business_profiles` (`id`, `company_name`, `website`, `bio`, `personal_name`, `job_title`, `developer_notifications`, `survey_requests`, `reg_date`) VALUES
(1, 'test', 'test.com', 'fdghghghjgns.', 'test', 'test', 0, 1, '2024-10-08 06:24:44'),
(2, '', '', 'fdghghghjgns.', '', '', 0, 1, '2024-10-08 12:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `developer_profiles`
--

CREATE TABLE `developer_profiles` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `hero` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `specialties` text DEFAULT NULL,
  `search_status` varchar(30) DEFAULT NULL,
  `role_types` varchar(100) DEFAULT NULL,
  `role_levels` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `gitlab` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `stackoverflow` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `mastodon` varchar(255) DEFAULT NULL,
  `scheduling_link` varchar(255) DEFAULT NULL,
  `profile_reminders` tinyint(1) DEFAULT NULL,
  `feature_announcements` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer_profiles`
--

INSERT INTO `developer_profiles` (`id`, `name`, `hero`, `city`, `state`, `country`, `bio`, `specialties`, `search_status`, `role_types`, `role_levels`, `website`, `github`, `gitlab`, `linkedin`, `stackoverflow`, `twitter`, `mastodon`, `scheduling_link`, `profile_reminders`, `feature_announcements`, `created_at`, `avatar_path`) VALUES
(16, 'Annoh Esimit', 'gfjhfh', 'Nairobi', 'Laikipia', 'Kenya', 'fdghghghjgns.', 'A/B testing, Entrepreneur, SQL', 'actively_looking', 'Part-time contract', 'Junior, Mid-level, Senior, Principal / staff, C-level', 'fdgfgf', 'fdgfgf', 'fdgfgf', 'fdgfgf', 'fdgfgf', 'vfdgfgf', 'fdgfgf', 'fdgfgf', 1, 1, '2024-10-10 06:58:45', 'uploads/Copy of Copy of Job ad.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'test@test.com', '$2y$10$yUr60aE1ml1YZ5lsZNu3XuYKaHFN0AOV.H/5JRuHKb.RvS4CoN3Je', '2024-10-07 06:08:46', '2024-10-07 06:08:46'),
(2, 'test2@test.com', '$2y$10$mxHlun9G5jXqF6.yyFaGK.JGGPOqXrF4h.UxmF/tGboRevec6BvCy', '2024-10-07 06:10:40', '2024-10-07 06:10:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_profiles`
--
ALTER TABLE `business_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer_profiles`
--
ALTER TABLE `developer_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_profiles`
--
ALTER TABLE `business_profiles`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `developer_profiles`
--
ALTER TABLE `developer_profiles`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
