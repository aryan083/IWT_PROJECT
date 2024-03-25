-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 05:21 PM
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
-- Database: `spms`
--

-- --------------------------------------------------------

--
-- Table structure for table `spms_faculty`
--

CREATE TABLE `spms_faculty` (
  `faculty_name` varchar(70) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `faculty_email` varchar(120) NOT NULL,
  `faculty_password` varchar(300) NOT NULL,
  `faculty_sign_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_parent`
--

CREATE TABLE `spms_parent` (
  `parent_name` varchar(70) NOT NULL,
  `child_enrollement_number` int(11) NOT NULL,
  `parent_email` varchar(120) DEFAULT NULL,
  `parent_phone_number` int(13) NOT NULL,
  `parent_password` varchar(300) NOT NULL,
  `parent_sing_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_project`
--

CREATE TABLE `spms_project` (
  `project_title` varchar(100) NOT NULL,
  `project_description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_status` varchar(15) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_end_date` date DEFAULT NULL,
  `project_domains` tinytext NOT NULL,
  `project_outcomes` text NOT NULL,
  `project_recognition` text NOT NULL,
  `project_cover_image_or_gif` blob NOT NULL,
  `project_step_to_build` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_project_contributors`
--

CREATE TABLE `spms_project_contributors` (
  `project_id` int(11) NOT NULL,
  `contributor_index` int(11) NOT NULL,
  `contributor_name` varchar(70) NOT NULL,
  `contributor_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_project_faculty`
--

CREATE TABLE `spms_project_faculty` (
  `project_id` int(11) NOT NULL,
  `faculty_index` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_project_links`
--

CREATE TABLE `spms_project_links` (
  `project_id` int(11) NOT NULL,
  `lin_index` int(11) NOT NULL,
  `lin_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_project_media_files`
--

CREATE TABLE `spms_project_media_files` (
  `project_id` int(11) NOT NULL,
  `media_file_index` int(11) NOT NULL,
  `mediafile` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spms_student`
--

CREATE TABLE `spms_student` (
  `student_name` varchar(70) NOT NULL,
  `student_enrollment_number` int(11) NOT NULL,
  `student_email` varchar(120) NOT NULL,
  `student_personal_email` varchar(100) DEFAULT NULL,
  `student_phone_no` int(13) NOT NULL,
  `student_pasword` varchar(300) NOT NULL,
  `student_sign_up_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spms_faculty`
--
ALTER TABLE `spms_faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `faculty_email` (`faculty_email`);

--
-- Indexes for table `spms_parent`
--
ALTER TABLE `spms_parent`
  ADD PRIMARY KEY (`child_enrollement_number`),
  ADD UNIQUE KEY `parent_phone_number` (`parent_phone_number`),
  ADD UNIQUE KEY `parent_email` (`parent_email`);

--
-- Indexes for table `spms_project`
--
ALTER TABLE `spms_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `spms_project_contributors`
--
ALTER TABLE `spms_project_contributors`
  ADD KEY `contributor_index` (`contributor_index`);

--
-- Indexes for table `spms_project_faculty`
--
ALTER TABLE `spms_project_faculty`
  ADD KEY `faculty_index` (`faculty_index`);

--
-- Indexes for table `spms_project_links`
--
ALTER TABLE `spms_project_links`
  ADD KEY `link_index` (`lin_index`);

--
-- Indexes for table `spms_project_media_files`
--
ALTER TABLE `spms_project_media_files`
  ADD KEY `media_file_index` (`media_file_index`);

--
-- Indexes for table `spms_student`
--
ALTER TABLE `spms_student`
  ADD PRIMARY KEY (`student_enrollment_number`),
  ADD UNIQUE KEY `student_phone_no` (`student_phone_no`),
  ADD UNIQUE KEY `student_personal_email` (`student_personal_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spms_project`
--
ALTER TABLE `spms_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spms_project_contributors`
--
ALTER TABLE `spms_project_contributors`
  MODIFY `contributor_index` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spms_project_faculty`
--
ALTER TABLE `spms_project_faculty`
  MODIFY `faculty_index` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spms_project_links`
--
ALTER TABLE `spms_project_links`
  MODIFY `lin_index` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spms_project_media_files`
--
ALTER TABLE `spms_project_media_files`
  MODIFY `media_file_index` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
