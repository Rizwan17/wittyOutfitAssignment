-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 07:06 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wittyoutfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gander` enum('m','f') NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `gander`, `profile_pic`, `register_date`, `last_login`, `status`) VALUES
(1, 'Rizwan', 'Khan', 'rizwan@gmail.com', 'rizwankhan', 'm', '', '2018-04-10 17:32:44', '2018-04-15 08:28:36', '1'),
(2, 'Rizwan', 'Khan', 'rizwankhan@gmail.com', '$2y$08$x4uffNXQuf6xBpD07QcGr.7dZJGj/zlIGuiOCrgOZYSa4qciNFR7m', 'm', '', '2018-04-04 06:56:00', '2018-04-04 06:56:00', '1'),
(3, 'Rizwan', 'Khan', 'rizwan123@gmail.com', '$2y$08$fy0dyKoh3USq8WrGsk4fcuk6RQHeHaq8QZ/3r/JaMNaaqeJ/qCsTS', 'm', '', '2018-04-04 06:59:07', '2018-04-04 06:59:07', '1'),
(4, 'Rizwan', 'Khan', 'rizwan525@gmail.com', '$2y$08$W4koL66DFWY8jA4gEGjq6e43YIT2Pmnrgv3Rd5BdBOLEtGXxg5yti', '', 'eraser.jpg', '2018-04-04 07:09:31', '2018-04-04 01:04:43', '1'),
(5, 'Faizan Hassan', 'Khan', 'faizan@gmail.com', '$2y$08$DbXBp8Zw1IF/2ftFgShG3emchw86vc9YD7acDD0fUxF0MqzC5bVVe', '', 'Rizwan Khan.jpg', '2018-04-04 13:49:32', '2018-04-04 01:04:11', '1'),
(7, 'Raju', 'Kapoor', 'arjun@gmail.com', '$2y$08$gjLC/wMXVbEDwdTqPA2iw.l.yokY9Jg84V9O.ITLzhRmByBfHcnlK', '', 'MiraiTrunkswallpaperbyMitbyMitHydeist.jpg', '2018-04-04 14:06:55', '2018-04-04 02:04:53', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
