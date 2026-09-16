-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 07:03 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nashty_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_name`) VALUES
(1, 'footbal'),
(2, 'volleyball'),
(4, 'aaaaa'),
(5, 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `admin_requests`
--

CREATE TABLE `admin_requests` (
  `request_id` int(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_requests`
--

INSERT INTO `admin_requests` (`request_id`, `user_id`, `request_type`, `details`, `time`) VALUES
(9, '2', 'account', 'ssqdwdrd', '2022-06-28 08:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `number_of_students` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `activity`, `status`, `number_of_students`, `start_date`, `end_date`) VALUES
(9, 'ccccccc', 'footbal', 'ended', 5, '2022-06-30', '2022-06-28'),
(10, 'ddddd', 'aaaaa', 'active', 0, '2022-06-08', '2022-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `competition_students`
--

CREATE TABLE `competition_students` (
  `id` int(10) NOT NULL,
  `competition_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition_students`
--

INSERT INTO `competition_students` (`id`, `competition_id`, `student_id`) VALUES
(2, 9, 2),
(3, 9, 2),
(4, 9, 2),
(5, 9, 2),
(6, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(11) NOT NULL,
  `election` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `election`, `level`, `start`, `end`, `status`) VALUES
(5, 'new election', 'All', '2022-06-27 06:01:00', '2022-06-24 09:56:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `election_positions`
--

CREATE TABLE `election_positions` (
  `id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `election_positions`
--

INSERT INTO `election_positions` (`id`, `position`) VALUES
(4, 'Precident');

-- --------------------------------------------------------

--
-- Table structure for table `election_student`
--

CREATE TABLE `election_student` (
  `id` int(10) NOT NULL,
  `election_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `election_student`
--

INSERT INTO `election_student` (`id`, `election_id`, `student_id`, `position_id`) VALUES
(24, 5, 2, 4),
(25, 5, 9, 4),
(26, 5, 10, 4),
(27, 5, 11, 4),
(28, 5, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `election_votes`
--

CREATE TABLE `election_votes` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `cand_id` int(10) NOT NULL,
  `pos_id` int(10) NOT NULL,
  `elec_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `election_votes`
--

INSERT INTO `election_votes` (`id`, `user_id`, `cand_id`, `pos_id`, `elec_id`) VALUES
(15, 2, 2, 4, 5),
(18, 8, 2, 4, 5),
(19, 8, 9, 4, 5),
(20, 8, 9, 4, 5),
(21, 9, 9, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `writer_name` varchar(100) NOT NULL,
  `post_level` varchar(50) DEFAULT NULL,
  `post_about` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `writer_name`, `post_level`, `post_about`, `content`, `picture`, `created_at`) VALUES
(118, 2, 'Mina', '1', 'Inquiry', 'dddd', '', '2022-06-26 07:15:26'),
(120, 1, 'Admin', '3', 'Anouncment', 'ssssqddd', '', '2022-06-26 09:10:13'),
(121, 2, 'Mina', '1', 'Question', 'msnknkiJWUWHUH NJSNFI', '', '2022-06-26 10:24:42'),
(124, 1, 'Admin', 'All', 'News', 'kmklojiciosiuh kjs', '', '2022-06-26 10:31:09'),
(125, 1, 'Admin', 'All', 'Anouncment', 'Competition here ', '', '2022-06-26 10:35:47'),
(126, 1, 'Admin', '2', 'Anouncment', 'dddd', '', '2022-06-26 19:04:30'),
(127, 1, 'Admin', 'All', 'News', 'dddddddddd', 'Screenshot 2022-06-19 085944.jpg', '2022-06-27 07:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `com_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `comment_writer` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`com_id`, `post_id`, `user_id`, `comment_writer`, `content`, `created_at`) VALUES
(22, 33, 2, 'Yasser Maher', 'sssss', '2021-06-01 08:42:43'),
(23, 33, 2, 'Yasser Maher', 'qqqqq', '2021-06-01 08:47:49'),
(24, 33, 2, 'Yasser Maher', 'sddffddsa', '2021-06-01 09:04:42'),
(25, 33, 2, 'Yasser Maher', 'ddssaaa', '2021-06-01 09:14:27'),
(26, 40, 2, 'Yasser Maher', 'ddddsss', '2021-06-01 09:25:56'),
(27, 44, 1003, 'ssss', 'im sss who writes comment', '2021-06-01 12:21:48'),
(28, 46, 1000, 'Zxad', 'i comnmented on my post', '2021-06-02 10:38:28'),
(29, 47, 1000, 'Zxad', 'test', '2021-06-03 08:52:29'),
(30, 45, 1006, 'Samuel Gamil', 'hi , mina , awesome', '2021-06-08 08:21:49'),
(31, 44, 1007, 'Abanoub Youssif', 'abanoub youssif', '2021-06-08 12:34:50'),
(32, 33, 1, 'hassan shabaan', 'hassan', '2021-06-10 10:58:25'),
(33, 48, 1003, 'ssss', 'asssaas', '2021-06-13 11:04:58'),
(34, 48, 1, 'hassan shabaan', 'watch this tutorail on youtube https:www.youtube.com/watch?w=mmmmmm123', '2021-06-13 11:41:10'),
(35, 49, 1007, 'Abanoub Youssif', 'hhhhh', '2021-06-27 18:25:20'),
(36, 51, 1002, 'ssss', 'mmmmm', '2021-07-01 17:45:20'),
(37, 51, 1002, 'ssss', 'mmmmmbbb', '2021-07-01 17:45:32'),
(38, 52, 2, 'Yasser Maher', 'mmmm', '2021-07-02 16:42:14'),
(39, 53, 1003, 'ssss', 'sssddsd', '2021-07-03 18:21:30'),
(40, 55, 1007, 'Abanoub Youssif', 'njnujwdw', '2021-07-05 12:37:28'),
(41, 65, 1000, 'Abanoub Youssif', 'fvvv', '2022-06-24 08:47:01'),
(42, 65, 1000, 'Abanoub Youssif', 'vvvv', '2022-06-24 08:47:05'),
(43, 65, 1000, 'Abanoub Youssif', 'vvvv', '2022-06-24 08:47:09'),
(44, 67, 1000, 'Abanoub Youssif', 'ssss', '2022-06-25 08:32:40'),
(45, 67, 1000, 'Abanoub Youssif', 'asswdwd', '2022-06-25 08:32:47'),
(46, 69, 1000, 'Abanoub Youssif', 'ssss', '2022-06-25 08:32:52'),
(58, 116, 1, 'Admin', 'aaaaaa', '2022-06-26 05:31:14'),
(60, 126, 1, 'Admin', 'fff', '2022-06-26 19:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `post_react`
--

CREATE TABLE `post_react` (
  `id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_react`
--

INSERT INTO `post_react` (`id`, `post_id`, `user_id`, `created_at`) VALUES
(1, 33, 1003, '2021-06-01 08:58:33'),
(2, 40, 1002, '2021-06-01 08:58:33'),
(3, 33, 1004, '2021-06-01 08:58:48'),
(25, 44, 0, '2021-06-01 12:19:21'),
(39, 45, 1004, '2021-06-02 10:32:19'),
(52, 49, 1003, '2021-06-23 22:22:59'),
(56, 46, 1002, '2021-06-23 22:57:19'),
(59, 44, 1007, '2021-06-27 18:26:33'),
(75, 56, 1, '2021-07-30 12:54:40'),
(76, 55, 1, '2021-07-30 12:54:40'),
(77, 54, 1, '2021-07-30 12:54:40'),
(78, 53, 1, '2021-07-30 12:54:40'),
(79, 52, 1, '2021-07-30 12:54:40'),
(80, 51, 1, '2021-07-30 12:54:40'),
(81, 49, 1, '2021-07-30 12:54:40'),
(82, 48, 1, '2021-07-30 12:54:40'),
(83, 47, 1, '2021-07-30 12:54:40'),
(84, 46, 1, '2021-07-30 12:54:40'),
(85, 45, 1, '2021-07-30 12:54:40'),
(86, 44, 1, '2021-07-30 12:54:40'),
(87, 43, 1, '2021-07-30 12:54:40'),
(88, 40, 1, '2021-07-30 12:54:40'),
(89, 33, 1, '2021-07-30 12:54:40'),
(97, 47, 1000, '2022-06-24 08:46:58'),
(98, 46, 1000, '2022-06-24 08:46:58'),
(114, 69, 1000, '2022-06-25 08:40:37'),
(115, 68, 1000, '2022-06-25 08:40:37'),
(116, 67, 1000, '2022-06-25 08:40:37'),
(117, 114, 0, '2022-06-26 04:06:54'),
(118, 114, 2, '2022-06-26 04:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) NOT NULL,
  `msg_id` int(10) NOT NULL,
  `replay` varchar(200) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `msg_id`, `replay`, `time`) VALUES
(10, 9, '                                             sddefefefsfk jk vksdjnjk kmlk kmk mkmskd lknmjdnkmlk jf                           ', '2022-06-28 05:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `role_id` enum('0','1') NOT NULL DEFAULT '0',
  `full_name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `adress` varchar(150) DEFAULT NULL,
  `profile_picture` varchar(150) DEFAULT 'admin.png',
  `national_id` varchar(255) NOT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `phone` int(140) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_activated` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `full_name`, `gender`, `date_of_birth`, `level`, `adress`, `profile_picture`, `national_id`, `activity`, `phone`, `email`, `password`, `account_activated`) VALUES
(1, '1', 'Admin', 'male', NULL, NULL, NULL, 'admin.png', '29912012454', '', 1007979368, 'admin@admin.com', '12345', '0'),
(2, '0', 'Ramez', 'male', '2000-06-01', 1, 'Cairo , Egypt', 'student.webp', '2919283892344', 'volleyball', 1007979368, 'user@user.com', '12345', '1'),
(9, '0', 'Mina', 'male', NULL, 1, NULL, 'admin.png', '', 'volleyball', 1007979368, 'user2@user2.com', '12345', '1'),
(10, '0', 'kero', 'male', NULL, 1, NULL, 'admin.png', '', 'aaaaa', 1007979368, 'user3@user3.com', '12345', '1'),
(11, '0', 'Fady', 'male', NULL, 1, NULL, 'admin.png', '', '', 1007979368, 'user4@user4.com', '12345', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_requests`
--
ALTER TABLE `admin_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competition_students`
--
ALTER TABLE `competition_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_positions`
--
ALTER TABLE `election_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_student`
--
ALTER TABLE `election_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_votes`
--
ALTER TABLE `election_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `post_react`
--
ALTER TABLE `post_react`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_requests`
--
ALTER TABLE `admin_requests`
  MODIFY `request_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `competition_students`
--
ALTER TABLE `competition_students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `election_positions`
--
ALTER TABLE `election_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `election_student`
--
ALTER TABLE `election_student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `election_votes`
--
ALTER TABLE `election_votes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `com_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `post_react`
--
ALTER TABLE `post_react`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
