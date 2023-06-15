-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 08:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flutter_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bookmark`
--

CREATE TABLE `Bookmark` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `place_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Bookmark`
--

INSERT INTO `Bookmark` (`id`, `user_id`, `place_id`, `event_id`) VALUES
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describtion` text NOT NULL,
  `cover_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`, `describtion`, `cover_pic`) VALUES
(13, 'addis abeba', 'adiss is a good place and nice place to live and to die', 'huisdfklasjdfkljasl.png');

-- --------------------------------------------------------

--
-- Table structure for table `CategoryPlace`
--

CREATE TABLE `CategoryPlace` (
  `id` int(100) NOT NULL,
  `CategoryId` int(100) NOT NULL,
  `place_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CategoryPlace`
--

INSERT INTO `CategoryPlace` (`id`, `CategoryId`, `place_id`) VALUES
(2, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Description`
--

CREATE TABLE `Description` (
  `id` int(100) NOT NULL,
  `place_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `language` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Description`
--

INSERT INTO `Description` (`id`, `place_id`, `event_id`, `language`, `content`) VALUES
(2, 2, 3, 'English', 'Demo test reqest');

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE `Event` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Event`
--

INSERT INTO `Event` (`id`, `title`, `latitude`, `longitude`, `start_date`, `end_date`, `price`) VALUES
(1, 'gonder', 10, 43, '2023-09-20 00:00:00', '2023-09-12 00:00:00', 300),
(3, 'Dire', 30, 43, '2023-09-01 00:00:00', '2023-09-12 00:00:00', 1000),
(4, 'Dire', 30.21, 43.9, '2023-09-01 00:00:00', '2023-09-12 00:00:00', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `Photo`
--

CREATE TABLE `Photo` (
  `id` int(100) NOT NULL,
  `place_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Place`
--

CREATE TABLE `Place` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `region` int(100) NOT NULL,
  `distance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Place`
--

INSERT INTO `Place` (`id`, `title`, `latitude`, `longitude`, `region`, `distance`) VALUES
(2, 'Dire Dawa', 55, 90, 2, 700);

-- --------------------------------------------------------

--
-- Table structure for table `Recommendation`
--

CREATE TABLE `Recommendation` (
  `id` int(100) NOT NULL,
  `place_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pricing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `place_id` int(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `role` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `password`, `photo_url`, `role`) VALUES
(2, 'kaleb', 'password@gmail.com', 'passworddd', 'klsdjfalksjdfkl', 'Admin'),
(8, 'hel', 'helen@gmail.com', '12344321', 'kasdjflkasjdfkl.url', 'User'),
(9, 'wendmu', 'abel@gmail.com', 'passsss', 'bakkasdjkfas.ule', 'User'),
(13, 'edl123', 'edle@gmail.com', 'passsss', 'bakkasdjkfas.url', 'User'),
(14, 'abelwendmu', 'abelwendmu@gmail.com', '0987890', 'bakkasdjkfas.url', 'User'),
(15, 'a', 'abelwendmu@gmail.com', '0987890', 'bakkasdjkfas.url', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bookmark`
--
ALTER TABLE `Bookmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmark-user` (`user_id`),
  ADD KEY `bookmark-event` (`event_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CategoryPlace`
--
ALTER TABLE `CategoryPlace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category- place` (`place_id`),
  ADD KEY `categoryplace-category` (`CategoryId`);

--
-- Indexes for table `Description`
--
ALTER TABLE `Description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descrition-event` (`event_id`),
  ADD KEY `describition-place` (`place_id`);

--
-- Indexes for table `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Photo`
--
ALTER TABLE `Photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo-event` (`event_id`),
  ADD KEY `photo-place` (`place_id`);

--
-- Indexes for table `Place`
--
ALTER TABLE `Place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Recommendation`
--
ALTER TABLE `Recommendation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendation-place` (`place_id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review-user` (`user_id`),
  ADD KEY `review-place` (`place_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bookmark`
--
ALTER TABLE `Bookmark`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `CategoryPlace`
--
ALTER TABLE `CategoryPlace`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Description`
--
ALTER TABLE `Description`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Event`
--
ALTER TABLE `Event`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Photo`
--
ALTER TABLE `Photo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Place`
--
ALTER TABLE `Place`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Recommendation`
--
ALTER TABLE `Recommendation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bookmark`
--
ALTER TABLE `Bookmark`
  ADD CONSTRAINT `bookmark-event` FOREIGN KEY (`event_id`) REFERENCES `Event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookmark-user` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CategoryPlace`
--
ALTER TABLE `CategoryPlace`
  ADD CONSTRAINT `category- place` FOREIGN KEY (`place_id`) REFERENCES `Place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryplace-category` FOREIGN KEY (`CategoryId`) REFERENCES `Category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Description`
--
ALTER TABLE `Description`
  ADD CONSTRAINT `describition-place` FOREIGN KEY (`place_id`) REFERENCES `Place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `descrition-event` FOREIGN KEY (`event_id`) REFERENCES `Event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Photo`
--
ALTER TABLE `Photo`
  ADD CONSTRAINT `photo-event` FOREIGN KEY (`event_id`) REFERENCES `Event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photo-place` FOREIGN KEY (`place_id`) REFERENCES `Place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Recommendation`
--
ALTER TABLE `Recommendation`
  ADD CONSTRAINT `recommendation-place` FOREIGN KEY (`place_id`) REFERENCES `Place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `review-place` FOREIGN KEY (`place_id`) REFERENCES `Place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review-user` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
