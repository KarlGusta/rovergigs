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
-- Database: `rovergigs`
--

-- --------------------------------------------------------

--
-- Table structure for table `earlyaccessclients`
--

CREATE TABLE `earlyaccessclients` (
  `clientId` int(11) NOT NULL,
  `jobTitle` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `openToWorldwideRoles` varchar(100) DEFAULT NULL,
  `jobType` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `joinedOn` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earlyaccessclients`
--

INSERT INTO `earlyaccessclients` (`clientId`, `jobTitle`, `category`, `openToWorldwideRoles`, `jobType`, `name`, `email`, `location`, `joinedOn`, `status`) VALUES
(1, 'rere', 'Design', 'Yes', 'fullTime', 'erger', 'gfhgf@gfgf.com', 'ad', '2023-01-23 12:39:24', 'Pending'),
(2, 'rere', 'Design', 'Yes', 'fullTime', 'dfgfd', 'gfhgf@gfgf.com', 'Andorra', '2023-01-23 14:33:32', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobId` int(11) NOT NULL,
  `jobTitle` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `isThisRoleOpenWorldwide` varchar(100) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `minimum_salary` int(11) NOT NULL,
  `maximum_salary` int(11) NOT NULL,
  `applicationLinkOrEmail` varchar(255) DEFAULT NULL,
  `jobType` varchar(100) DEFAULT NULL,
  `jobDescription` text DEFAULT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  `companyHQ` varchar(100) DEFAULT NULL,
  `companyWebsiteURL` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `companyDescription` text DEFAULT NULL,
  `datePosted` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `featured` varchar(100) DEFAULT NULL,
  `valueMemberOnly` varchar(255) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobTitle`, `category`, `isThisRoleOpenWorldwide`, `location`, `minimum_salary`, `maximum_salary`, `applicationLinkOrEmail`, `jobType`, `jobDescription`, `companyName`, `companyHQ`, `companyWebsiteURL`, `email`, `companyDescription`, `datePosted`, `status`, `featured`, `valueMemberOnly`, `post_date`) VALUES
(24, 'ttrrtrthg', 'Design', 'Yes', 'Worldwide', 10000, 10000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>gtrghrth</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>rttrhrth</p>', '2024-09-26', 'Approved', 'Yes', 'Yes', '2024-09-26 12:00:00'),
(25, 'dfgdf', 'Design', 'Yes', 'Worldwide', 10000, 10000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>ghnjm,</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>rdctfvgbhn</p>', '2024-09-26', 'Approved', 'Yes', 'Yes', '2024-09-26 12:00:00'),
(26, 'dfgdf', 'Design', 'Yes', 'Worldwide', 50000, 110000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>xcfgvhbjnkml</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>gcfvhbjnkml</p>', '2024-09-26', 'Approved', 'Yes', 'No', '2024-09-26 12:00:00'),
(27, 'dfgdf', 'Design', 'Yes', 'Worldwide', 10000, 110000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>gdfgfdg</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>gffgfd</p>', '2024-09-26', 'Approved', 'Yes', 'No', '2024-09-26 12:00:00'),
(28, 'fdgf', 'Design', 'Yes', 'Worldwide', 90000, 150000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>fdgdfg</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>dfgdfgdfg</p>', '2024-09-26', 'Approved', 'Yes', 'No', '2024-09-26 12:00:00'),
(29, 'gfdgfd', 'Design', 'Yes', 'Worldwide', 130000, 170000, 'www.youtube.com/watch?v=4nAcRL-6ujk&t=950s&ab_channel=Dr.DavidSnyder', 'Full-Time', '<p>dfgdfgfd</p>', 'fdgf', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>dfgfdg</p>', '2024-09-27', 'Approved', 'Yes', 'No', '2024-09-27 12:00:00'),
(30, 'dfgdf', 'Design', 'Yes', 'Worldwide', 120000, 90000, 'www.youtube.com/watch?v=4nAcRL-6ujk&t=950s&ab_channel=Dr.DavidSnyder', 'Full-Time', '<p>dfdsfgfgdf</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>dgdfgfdgdfg</p>', '2024-09-27', 'Approved', 'Yes', 'Yes', '2024-09-27 12:00:00'),
(31, 'dfgdf', 'Design', 'Yes', 'Worldwide', 30000, 100000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>rgdfgfdgfd</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>fdgfdgfd</p>', '2024-10-03', 'Approved', 'Yes', 'Yes', '2024-10-03 12:00:00'),
(32, 'Lead dfgdfgd', 'Design', 'Yes', 'Worldwide', 20000, 80000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>fgfdghfhfg</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>fghgfhgf</p>', '2024-10-03', 'Approved', 'Yes', 'Yes', '2024-10-03 12:00:00'),
(33, 'Staff fdgdfgdf', 'Design', 'Yes', 'Worldwide', 30000, 90000, 'karlgustaesimit@gmail.com', 'Full-Time', '<p>fgdfgdf</p>', 'CGL', 'CGL', 'CGL', 'karlgustaesimit@gmail.com', '<p>dfgdfgfdg</p>', '2024-10-03', 'Approved', 'Yes', 'Yes', '2024-10-03 21:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `job_tags`
--

CREATE TABLE `job_tags` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_tags`
--

INSERT INTO `job_tags` (`id`, `job_id`, `tag_name`, `created_at`) VALUES
(2, 24, 'Executive', '2024-09-26 12:13:44'),
(3, 24, 'Finance', '2024-09-26 12:13:45'),
(4, 24, 'JavaScript', '2024-09-26 12:13:45'),
(5, 25, 'SysAdmin', '2024-09-26 12:54:44'),
(6, 25, 'Senior', '2024-09-26 12:54:44'),
(7, 25, 'Medical', '2024-09-26 12:54:44'),
(8, 25, 'Golang', '2024-09-26 12:54:44'),
(9, 25, 'Legal', '2024-09-26 12:54:45'),
(10, 26, 'Senior', '2024-09-26 13:03:32'),
(11, 26, 'JavaScript', '2024-09-26 13:03:32'),
(12, 26, 'SysAdmin', '2024-09-26 13:03:32'),
(13, 27, 'Executive', '2024-09-26 18:48:04'),
(14, 27, 'Golang', '2024-09-26 18:48:05'),
(15, 27, 'Medical', '2024-09-26 18:48:05'),
(16, 28, 'Senior', '2024-09-26 18:55:49'),
(17, 28, 'Golang', '2024-09-26 18:55:49'),
(18, 28, 'JavaScript', '2024-09-26 18:55:49'),
(19, 29, 'Executive', '2024-09-27 07:40:14'),
(20, 29, 'JavaScript', '2024-09-27 07:40:14'),
(21, 30, 'Senior', '2024-09-27 07:41:32'),
(22, 30, 'JavaScript', '2024-09-27 07:41:33'),
(23, 31, 'Senior', '2024-10-03 19:32:28'),
(24, 32, 'Executive', '2024-10-03 19:35:23'),
(25, 33, 'Executive', '2024-10-03 19:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` float(10,2) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `createdtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'Job Ad', 'Skagen 21', 299.00, 1),
(2, 'Early Access', 'Skagen 21', 99.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `job_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `earlyaccessclients`
--
ALTER TABLE `earlyaccessclients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `job_tags`
--
ALTER TABLE `job_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_job_id` (`job_id`),
  ADD KEY `idx_tag_name` (`tag_name`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skill_name` (`skill_name`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`job_id`,`skill_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `earlyaccessclients`
--
ALTER TABLE `earlyaccessclients`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `job_tags`
--
ALTER TABLE `job_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_tags`
--
ALTER TABLE `job_tags`
  ADD CONSTRAINT `job_tags_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`jobId`) ON DELETE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`jobId`),
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
