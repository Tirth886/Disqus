-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 08:30 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disquspro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `phone`) VALUES
(1, 'tirth_jain', 'tirthjain', '8866802619');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `q_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `q_id`, `user_id`, `q_code`) VALUES
(22, 18, 38, 'sm1hF'),
(23, 19, 38, 'NpzM9'),
(24, 21, 38, 'IYnq7');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `sent_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `sent_id`, `receive_id`, `time`) VALUES
(1, 29, 28, '2019-11-19 21:10:21'),
(5, 29, 31, '2019-11-28 20:48:10'),
(8, 28, 29, '2019-11-29 19:18:27'),
(10, 28, 36, '2019-12-11 16:33:05'),
(11, 28, 37, '2019-12-11 16:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `q_code` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `q_code`, `status`) VALUES
(3, 1, 29, '1OgK5', 1),
(4, 4, 29, '4AR4I', 1),
(5, 4, 28, '4AR4I', 1),
(10, 14, 28, 'GD55a', 1),
(11, 21, 38, 'IYnq7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail_history`
--

CREATE TABLE `mail_history` (
  `id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_history`
--

INSERT INTO `mail_history` (`id`, `recipient`, `reason`, `time`) VALUES
(1, 28, 'FP', '2019-11-29 23:03:40'),
(3, 28, 'FP', '2019-11-29 23:07:37'),
(4, 28, 'FP', '2019-11-29 23:12:00'),
(5, 28, 'FP', '2019-11-29 23:15:26'),
(6, 28, 'FP', '2019-12-11 16:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `profilepicture`
--

CREATE TABLE `profilepicture` (
  `u_id` int(11) NOT NULL,
  `picture` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilepicture`
--

INSERT INTO `profilepicture` (`u_id`, `picture`) VALUES
(28, 'IMG_20170520_105002.jpg'),
(29, 'IMG_20170409_150646.jpg'),
(30, 'profile.png'),
(31, 'profile.png'),
(32, 'profile.png'),
(33, 'profile.png'),
(34, 'profile.png'),
(35, 'profile.png'),
(36, 'profile.png'),
(37, 'profile.png'),
(38, 'profile.png'),
(39, 'profile.png'),
(40, 'profile.png'),
(41, 'profile.png'),
(42, 'profile.png'),
(43, 'profile.png'),
(44, 'profile.png'),
(45, 'profile.png'),
(46, 'profile.png'),
(47, 'profile.png'),
(48, 'profile.png'),
(49, 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(16000) NOT NULL,
  `catagory` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `catagory`, `user_id`, `date`, `code`) VALUES
(21, 'hui', 'other', 38, '2019-12-31 00:39:13', 'IYnq7');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `answers` varchar(16000) NOT NULL,
  `question_code` varchar(11) NOT NULL,
  `reply_user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `answers`, `question_code`, `reply_user_id`, `date`) VALUES
(23, 'df', 'IYnq7', 38, '2019-12-31 00:42:53'),
(24, 'sdf', 'IYnq7', 38, '2019-12-31 00:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `useremail` varchar(30) NOT NULL,
  `usercontact` varchar(15) NOT NULL,
  `userpassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `useremail`, `usercontact`, `userpassword`) VALUES
(38, 'Jayant', 'jayant@gmail.com', '7536514569', 'jayant@123'),
(40, 'prem', 'prem78@gmail.com', '7865412369', '789456'),
(41, 'prem', 'prem@gmail.com', '2356589741', '2351'),
(42, 'vaibhav', 'vaibhav@gmail.com', '4567894561', '1532'),
(43, 'prakash', 'prakash@gmail.com', '7894561231', '2369'),
(44, 'xyz', 'xyz@gmail.com', '5647894123', '2356'),
(45, 'zyx', 'zyx@gmail.com', '4568852123', '520250'),
(46, 'Tirth', 'tirth8jai@gmail.com', '7894561234', '1532'),
(47, 'sunil', 'sunil@gmail.com', '7535214554', '754'),
(48, 'jain', 'jan@gmail.com', '1234567891', '123'),
(49, 'mahendar', 'mahendar885@gmail.com', '1593265201', '1231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_code` (`q_code`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receive_id` (`receive_id`),
  ADD KEY `sent_id` (`sent_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mail_history`
--
ALTER TABLE `mail_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepicture`
--
ALTER TABLE `profilepicture`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mail_history`
--
ALTER TABLE `mail_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
