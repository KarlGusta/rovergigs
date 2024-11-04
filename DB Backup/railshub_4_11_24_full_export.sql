-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 06:39 AM
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
(18, 'Alex Johnson', 'Senior Ruby on Rails developer with over 8 years of experience in building scalable web applications. Proficient in backend development, API integration, and agile methodologies. Passionate about clean code and efficient solutions.', 'San Francisco', 'California', 'United States', 'Alex is a dedicated and innovative Ruby on Rails developer with a proven track record in developing high-performance applications. Over the years, Alex has worked with various startups and established companies, leading projects that range from e-commerce platforms to data analytics solutions. Strong believer in continuous learning and regularly contributes to open-source projects. Skilled in both front-end and back-end technologies, with an emphasis on creating user-centric, responsive applications. In addition to technical expertise, Alex brings a collaborative mindset and a commitment to building effective, cross-functional teams.', 'Automated testing, Tailwind CSS, Turbo Native', 'actively_looking', '', 'Senior', '', '', '', '', '', '', '', '', 1, 1, '2024-11-03 16:58:21', 'uploads/man (7).jpg'),
(19, 'Chris Lee', 'Experienced Ruby on Rails developer specializing in API development and integrations. Over 7 years in the industry, building tools for SaaS and health tech applications.', 'London', 'England', 'United Kingdom', 'Chris has a deep understanding of the Rails ecosystem and excels at creating efficient, high-quality APIs for scalable applications. He is skilled at working in agile environments and has a background in both project management and software development. Chris enjoys collaborating with cross-functional teams to solve complex business problems.', 'A/B testing, iOS, Stimulus Reflex', 'actively_looking', '', 'Junior, Mid-level, Senior', '', '', '', '', '', '', '', '', 1, 1, '2024-11-03 18:13:14', 'uploads/man.jpg'),
(20, 'Sarah Kim', 'Ruby on Rails developer with a knack for front-end development and design. Skilled in building web applications from scratch, with 5 years of experience in tech startups.', 'Seattle', 'Washington', 'United States', 'Sarah combines technical skills with a strong design sensibility to create user-friendly applications. She is particularly experienced in Rails and JavaScript frameworks. Sarah is a strong advocate for diversity in tech and often speaks at industry events. She’s passionate about developing products that make a difference.', 'Android, iOS, SQL', 'actively_looking', '', 'Mid-level, Senior,Principal/staff', '', '', '', '', '', '', '', '', 1, 1, '2024-11-03 18:15:34', 'uploads/chinese woman.jpg'),
(21, 'Javier Martinez', 'Senior Rails developer and team lead, focused on scalable, secure applications for enterprise clients. Over 10 years of experience in back-end development.', 'Madrid', 'Madrid', 'Spain', 'Javier is a skilled software engineer and project manager with a rich background in backend development. Known for his technical leadership, he has led teams in building complex applications with an emphasis on performance and security. Javier enjoys optimizing code and believes in continuous improvement, regularly participating in Rails community forums.', 'AI, Jumpstart Pro, Refactoring', 'actively_looking', '', 'C-level', '', '', '', '', '', '', '', '', 1, 1, '2024-11-03 18:23:26', 'uploads/man (5).jpg'),
(22, 'Emily Nguyen', 'Full-stack developer with a primary focus on Ruby on Rails and React. Over 6 years of experience in healthcare tech.', 'Austin', 'Texas', 'United States', 'Emily is passionate about building applications that improve lives. With a solid understanding of both Rails and modern front-end technologies, she creates responsive and robust applications. Emily also values code readability and has mentored several junior developers. In her free time, she volunteers with tech education nonprofits.', 'API Integrations, iOS, React', 'actively_looking', '', 'Junior', '', '', '', '', '', '', '', '', 1, 1, '2024-11-03 18:24:55', 'uploads/woman (4).jpg'),
(23, 'David Chen', 'Ruby on Rails specialist with expertise in performance optimization and database management. Over 8 years of experience in data-intensive applications.', 'Toronto', 'Ontario', 'Canada', 'David is known for his expertise in improving application performance and managing complex databases. He has a background in mathematics and leverages his analytical skills to solve complex technical issues. David is proactive in learning new technologies and often shares his insights on Rails optimization at conferences.', 'Bullet Train, NoSQL, Rails upgrades', 'actively_looking', '', 'Senior', '', '', '', '', '', '', '', '', 1, 1, '2024-11-03 18:26:15', 'uploads/man (4).jpg'),
(24, 'Tomislav Petrovic', 'Backend developer with a focus on Ruby on Rails and PostgreSQL. Experienced in developing complex applications for fintech and logistics sectors over the past 9 years.', 'Zagreb', 'Zagreb', 'Croatia', 'Tomislav has extensive experience in backend development and database management, particularly in data-intensive applications. He is passionate about finding efficient solutions and has a reputation for being meticulous with code quality. Tomislav enjoys mentoring junior developers and participates in local tech meetups to stay connected with the community.', 'A/B testing, Entrepreneur, Stimulus', 'actively_looking', '', 'Senior', '', '', '', '', '', '', '', '', 1, 1, '2024-11-03 18:28:28', 'uploads/man (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT 'default.jpg',
  `role` enum('user','admin','moderator') DEFAULT 'user',
  `status` enum('active','inactive','suspended','deleted') DEFAULT 'active',
  `email_verified` tinyint(1) DEFAULT 0,
  `verification_token` varchar(100) DEFAULT NULL,
  `reset_password_token` varchar(100) DEFAULT NULL,
  `reset_password_expires` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `login_attempts` int(11) DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `profile_picture`, `role`, `status`, `email_verified`, `verification_token`, `reset_password_token`, `reset_password_expires`, `last_login`, `last_logout`, `login_attempts`, `create_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$8KsRfpqPRm8hJ7qyNMwNaubYUPizur9yCG7p8KaMj7qH9KZYilF1m', 'System', 'Administrator', 'default.jpg', 'admin', 'active', 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-10-27 12:08:48', '2024-10-27 12:08:48'),
(2, '', 'test@test.com', '$2y$10$/H9JvG6eZUVu5f6eH6/x/O9nj7vLM9u7aVtJUhCvtHne56C76xp4q', NULL, NULL, 'default.jpg', 'user', 'active', 0, NULL, NULL, NULL, NULL, '2024-11-03 18:35:22', 0, '2024-10-28 10:04:10', '2024-11-03 15:35:22');

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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_username` (`username`);

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
