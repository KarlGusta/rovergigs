-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2024 at 08:24 AM
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
  `applicationLinkOrEmail` varchar(255) DEFAULT NULL,
  `jobType` varchar(100) DEFAULT NULL,
  `jobDescription` varchar(255) DEFAULT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  `companyHQ` varchar(100) DEFAULT NULL,
  `companyWebsiteURL` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `companyDescription` varchar(255) DEFAULT NULL,
  `datePosted` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `featured` varchar(100) DEFAULT NULL,
  `valueMemberOnly` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobTitle`, `category`, `isThisRoleOpenWorldwide`, `applicationLinkOrEmail`, `jobType`, `jobDescription`, `companyName`, `companyHQ`, `companyWebsiteURL`, `email`, `companyDescription`, `datePosted`, `status`, `featured`, `valueMemberOnly`) VALUES
(17, 'rgtrg', 'Design', 'No', 'rgtr', 'Contract', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', 'rgtgtr', 'rthrt', 'trhtr', 'rgtrh', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', '2024-09-16', 'Approved', 'Yes', 'Yes'),
(18, 'ergtregrtg', 'Design', 'No', 'gregrt', 'Contract', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', 'regreg', 'ergre', 'ergre', 'regrg', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', '2024-09-16', 'Approved', 'Yes', 'No'),
(19, 'dfgdf', 'Design', 'Yes', 'dfgfd', 'Full-Time', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', 'fgfd', 'dfg', 'dfgf', 'dffdg', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', '2024-09-16', 'Approved', 'Yes', 'No'),
(20, 'fdfg', 'Design', 'Yes', 'fdgdf', 'Full-Time', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', 'dfdfg', 'dfgdf', 'fdgfd', 'dfgdf', '<p>Oh! Come and see the violence inherent in the system! Help, help, I\'m being repressed! We shall say \'Ni\' again to you, if you do not appease us. I\'m not a witch. I\'m not a witch. Camelot!</p>', '2024-09-16', 'Approved', 'Yes', 'No');

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
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`jobId`),
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
