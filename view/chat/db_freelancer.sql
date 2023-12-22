-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 08:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(20) NOT NULL,
  `id_umkm` int(20) NOT NULL,
  `id_freelance` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_umkm`, `id_freelance`, `start_time`) VALUES
(1, 1, 2, '2023-11-25 21:29:04'),
(2, 1, 2, '2023-11-25 21:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `chat_detail`
--

CREATE TABLE `chat_detail` (
  `id_chat_detail` int(20) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_chat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_detail`
--

INSERT INTO `chat_detail` (`id_chat_detail`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `msg_time`, `id_chat`) VALUES
(57, 1177158384, 509722246, 'hai bocil', '2023-11-25 12:48:34', 0),
(58, 509722246, 1177158384, 'hai tengil', '2023-11-25 12:48:44', 0),
(59, 1177158384, 509722246, 'apa??', '2023-11-25 12:48:50', 0),
(60, 509722246, 1177158384, 'gak terima', '2023-11-25 12:48:58', 0),
(61, 1177158384, 509722246, 'iya', '2023-11-25 12:49:02', 0),
(62, 509722246, 1177158384, 'bodo', '2023-11-25 12:49:07', 0),
(63, 1177158384, 509722246, 'apa/', '2023-11-25 12:50:15', 0),
(64, 1177158384, 509722246, 'e', '2023-11-26 02:28:11', 0),
(65, 509722246, 1177158384, 'ta', '2023-11-26 02:28:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(400) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 509722246, 'Coding', 'Sekar', 'kar@gmail.com', '12', '1698545939Screenshot 2023-10-03 130451.png', 'Active now'),
(2, 603326628, 'karisma sekar', 'arum', 'karismasekar20@gmail.com', '1aabac6d068eef6a7bad3fdf50a05cc8', '1698505126Screenshot 2023-10-03 130451.png', 'Offline now'),
(3, 672834933, 'karisma', 'arum', 'karismasekar18@gmail.com', '1aabac6d068eef6a7bad3fdf50a05cc8', '1698505008RAFAEL S.png', 'Offline now'),
(4, 1177158384, 'karisma', 'arum', 'karisma@gmail.com', 'da', '1698505276RAFAEL S.png', 'Active now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `chat_detail`
--
ALTER TABLE `chat_detail`
  ADD PRIMARY KEY (`id_chat_detail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat_detail`
--
ALTER TABLE `chat_detail`
  MODIFY `id_chat_detail` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
