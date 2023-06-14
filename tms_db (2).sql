-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 06:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `aid` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `task` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `accepter_username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`aid`, `project`, `task`, `user`, `accepter_username`) VALUES
(16, '14', '20', '6', ''),
(17, '15', '20', '6', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_system`
--

CREATE TABLE `feedback_system` (
  `name` varchar(30) NOT NULL,
  `department` varchar(100) NOT NULL,
  `feedbacktype` varchar(100) NOT NULL,
  `feedbackreason` varchar(100) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `feedbackcomment` varchar(150) NOT NULL,
  `fsid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_system`
--

INSERT INTO `feedback_system` (`name`, `department`, `feedbacktype`, `feedbackreason`, `rating`, `feedbackcomment`, `fsid`) VALUES
('Technology', 'aaa', 'positive', 'positive', '3', 'aaaaaaa', 1),
('Technology', 'aaa', 'positive', 'positive', '3', 'aaaaaaa', 2),
('Prabhat Niroula', '', 'positive', 'positive', '5', 'fine work', 3),
('Prabhat Niroula', '', 'positive', 'positive', '5', 'fine work', 4),
('Prabhat Niroula', '', 'positive', 'positive', '5', 'fine work', 5),
('Prabhat Niroula', '', 'positive', 'positive', '5', 'fine work', 6),
('Prabhat Niroula', '', 'positive', 'positive', '5', 'fine work', 7),
('Technology', 'HR', 'negative', 'negative', '5', 'ok', 8),
('Technology', 'HR', 'negative', 'negative', '5', 'ok', 9);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `dates` datetime NOT NULL,
  `dailytopic` text NOT NULL,
  `dailytopicone` varchar(60) NOT NULL,
  `weeklytopicone` varchar(60) NOT NULL,
  `dailyminutes` varchar(150) NOT NULL,
  `weeklytopic` varchar(100) NOT NULL,
  `weeklyminutes` varchar(100) NOT NULL,
  `mid` int(11) NOT NULL,
  `datesone` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`dates`, `dailytopic`, `dailytopicone`, `weeklytopicone`, `dailyminutes`, `weeklytopic`, `weeklyminutes`, `mid`, `datesone`) VALUES
('2023-06-08 22:14:00', '', '', 'aaaaa', '', 'sss', 'aaaaaaaaaaa', 14, '0000-00-00'),
('0000-00-00 00:00:00', 'heelo', 'A', '', 'A', '', '', 15, '2023-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE `personalinfo` (
  `code` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(30) NOT NULL,
  `joiningdate` date NOT NULL,
  `pid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`code`, `name`, `dob`, `department`, `joiningdate`, `pid`) VALUES
(623112, 'Prabhat Niroula', '2023-06-06', 'IT', '2005-10-19', 6);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectName` varchar(50) NOT NULL,
  `projectID` int(11) NOT NULL,
  `projectPrio` enum('High','Medium','Low') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectName`, `projectID`, `projectPrio`, `user_id`) VALUES
('First task', 39, 'Low', 3),
('Second task', 40, 'Low', 3),
('Third task', 41, 'Medium', 3),
('Prabhat', 43, 'High', 3);

-- --------------------------------------------------------

--
-- Table structure for table `project_list`
--

CREATE TABLE `project_list` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `manager_id` int(30) NOT NULL,
  `user_ids` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_list`
--

INSERT INTO `project_list` (`id`, `name`, `description`, `status`, `start_date`, `end_date`, `manager_id`, `user_ids`, `date_created`) VALUES
(15, 'Prabhat Niroula', 'first project', 4, '2023-06-13', '2023-06-28', 1101010, 'Array', '2023-06-12 12:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `publicdiscussion`
--

CREATE TABLE `publicdiscussion` (
  `pid` int(10) NOT NULL,
  `posttitle` varchar(30) NOT NULL,
  `postcontent` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publicdiscussion`
--

INSERT INTO `publicdiscussion` (`pid`, `posttitle`, `postcontent`) VALUES
(52, 'Here is the post title', 'Here is the post content');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `username`, `email`, `password`, `create_datetime`) VALUES
(2, 'hero', 'priyanka@gmail.com', 'f04af61b3f332afa0ceec786a42cd365', '2023-06-10 05:34:06'),
(3, 'abc', 'admin@admin.com', '900150983cd24fb0d6963f7d28e17f72', '2023-06-11 08:31:08'),
(4, 'manager', 'manager@gmail.com', '1d0258c2440a8d19e716292b231e3190', '2023-06-13 14:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `code` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `uid` int(11) NOT NULL,
  `role` enum('manager','employee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`code`, `username`, `email`, `uid`, `role`) VALUES
(101, 'abc', 'prabhat.niroula@gmail.com', 1, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskID` int(11) NOT NULL,
  `taskName` varchar(50) NOT NULL,
  `taskStartDate` date NOT NULL,
  `taskDueDate` date NOT NULL,
  `taskPriority` enum('High','Medium','Low') NOT NULL,
  `taskDone` enum('yes','no') NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `notes` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskID`, `taskName`, `taskStartDate`, `taskDueDate`, `taskPriority`, `taskDone`, `ProjectID`, `notes`) VALUES
(3, 'here is first task', '2023-06-28', '2023-06-21', 'Low', 'yes', 36, 'aaa'),
(4, 'projectwork', '2023-06-13', '2023-06-29', 'Medium', 'yes', 40, 'its main task'),
(5, 'projectwork', '2023-06-20', '2023-06-20', 'Low', 'yes', 39, ''),
(6, 'third', '2023-05-25', '2023-06-02', 'Medium', 'no', 43, ''),
(7, 'projectwork', '2023-06-01', '2023-06-21', 'High', 'yes', 41, '');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `id` int(30) NOT NULL,
  `project_id` int(30) NOT NULL,
  `task` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`id`, `project_id`, `task`, `description`, `status`, `date_created`) VALUES
(20, 15, 'first task', 'Here is my first task', 3, '2023-06-12 12:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `project` text NOT NULL,
  `task` text NOT NULL,
  `todo` varchar(150) NOT NULL,
  `doing` varchar(150) NOT NULL,
  `done` varchar(150) NOT NULL,
  `importanttask` text NOT NULL,
  `reminder` datetime NOT NULL,
  `priority` text NOT NULL,
  `tid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `avatar`, `date_created`) VALUES
(6, 'Prabhat', 'Niroula', 'admin@admin.com', 'admin123', 2, '', '2023-06-09 23:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_productivity`
--

CREATE TABLE `user_productivity` (
  `id` int(30) NOT NULL,
  `project_id` int(30) NOT NULL,
  `task_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(30) NOT NULL,
  `time_rendered` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_productivity`
--

INSERT INTO `user_productivity` (`id`, `project_id`, `task_id`, `comment`, `subject`, `date`, `start_time`, `end_time`, `user_id`, `time_rendered`, `date_created`) VALUES
(14, 15, 20, 'first project and task', 'group', '2023-06-08', '03:19:00', '19:50:00', 6, 16.5167, '2023-06-12 15:45:49'),
(15, 14, 20, '', '', '0000-00-00', '00:00:00', '00:00:00', 6, 0, '2023-06-12 21:00:02'),
(16, 0, 0, '', '', '0000-00-00', '00:00:00', '00:00:00', 0, 0, '2023-06-13 20:59:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `feedback_system`
--
ALTER TABLE `feedback_system`
  ADD PRIMARY KEY (`fsid`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `idx_name` (`name`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publicdiscussion`
--
ALTER TABLE `publicdiscussion`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `FK_todo_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_productivity`
--
ALTER TABLE `user_productivity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback_system`
--
ALTER TABLE `feedback_system`
  MODIFY `fsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personalinfo`
--
ALTER TABLE `personalinfo`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `project_list`
--
ALTER TABLE `project_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `publicdiscussion`
--
ALTER TABLE `publicdiscussion`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_productivity`
--
ALTER TABLE `user_productivity`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `FK_todo_user_id` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
