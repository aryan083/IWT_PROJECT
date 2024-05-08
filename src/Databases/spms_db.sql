-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 04:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `commenter_name` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `user_role` enum('student','faculty','parent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_media`
--

CREATE TABLE `post_media` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_collaborators`
--

CREATE TABLE `projects_collaborators` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('Designer','Developer','Tester','Leader','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_external_links`
--

CREATE TABLE `projects_external_links` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_faculty`
--

CREATE TABLE `projects_faculty` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_media_files`
--

CREATE TABLE `projects_media_files` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file_id` varchar(50) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_extension` varchar(50) NOT NULL,
  `source_directory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_faculty`
--

CREATE TABLE `spms_faculty` (
  `name` varchar(255) NOT NULL,
  `faculty_id_Employee_code` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `faculty_password` varchar(255) NOT NULL,
  `profile_pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_parent`
--

CREATE TABLE `spms_parent` (
  `parent_id` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `child_enrollment_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `parent_password` varchar(255) NOT NULL,
  `profile_pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_posts`
--

CREATE TABLE `spms_posts` (
  `id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_projects`
--

CREATE TABLE `spms_projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('Ongoing','Completed','Pending') NOT NULL,
  `instructions` text DEFAULT NULL,
  `outcomes` text DEFAULT NULL,
  `recognitions` text DEFAULT NULL,
  `thumbnail_name` varchar(100) NOT NULL,
  `thumbnail_extension` varchar(5) NOT NULL,
  `thumbnail_path` varchar(150) NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_student`
--

CREATE TABLE `spms_student` (
  `name` varchar(255) NOT NULL,
  `student_enrollment_number` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_password` longtext NOT NULL,
  `profile_pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_ids`
--

CREATE TABLE `user_ids` (
  `user_id` bigint(11) NOT NULL,
  `user_role` enum('student','faculty','parent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`,`user_role`);

--
-- Indexes for table `post_media`
--
ALTER TABLE `post_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `projects_collaborators`
--
ALTER TABLE `projects_collaborators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects_external_links`
--
ALTER TABLE `projects_external_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects_faculty`
--
ALTER TABLE `projects_faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects_media_files`
--
ALTER TABLE `projects_media_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `spms_faculty`
--
ALTER TABLE `spms_faculty`
  ADD PRIMARY KEY (`faculty_id_Employee_code`),
  ADD KEY `idx_faculty_id_Employee_code` (`faculty_id_Employee_code`);

--
-- Indexes for table `spms_parent`
--
ALTER TABLE `spms_parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `spms_posts`
--
ALTER TABLE `spms_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `spms_projects`
--
ALTER TABLE `spms_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spms_student`
--
ALTER TABLE `spms_student`
  ADD PRIMARY KEY (`student_enrollment_number`),
  ADD KEY `idx_student_enrollment_number` (`student_enrollment_number`);

--
-- Indexes for table `user_ids`
--
ALTER TABLE `user_ids`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id_role_index` (`user_id`,`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_media`
--
ALTER TABLE `post_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_collaborators`
--
ALTER TABLE `projects_collaborators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_external_links`
--
ALTER TABLE `projects_external_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_faculty`
--
ALTER TABLE `projects_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_media_files`
--
ALTER TABLE `projects_media_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spms_parent`
--
ALTER TABLE `spms_parent`
  MODIFY `parent_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spms_posts`
--
ALTER TABLE `spms_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spms_projects`
--
ALTER TABLE `spms_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `spms_posts` (`id`),
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`user_id`,`user_role`) REFERENCES `user_ids` (`user_id`, `user_role`);

--
-- Constraints for table `post_media`
--
ALTER TABLE `post_media`
  ADD CONSTRAINT `post_media_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `spms_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_collaborators`
--
ALTER TABLE `projects_collaborators`
  ADD CONSTRAINT `projects_collaborators_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `spms_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_external_links`
--
ALTER TABLE `projects_external_links`
  ADD CONSTRAINT `projects_external_links_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `spms_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_faculty`
--
ALTER TABLE `projects_faculty`
  ADD CONSTRAINT `projects_faculty_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `spms_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_media_files`
--
ALTER TABLE `projects_media_files`
  ADD CONSTRAINT `projects_media_files_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `spms_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spms_posts`
--
ALTER TABLE `spms_posts`
  ADD CONSTRAINT `spms_posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `spms_student` (`student_enrollment_number`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
