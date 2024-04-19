-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 11:59 AM
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
-- Database: `try4`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `Photo`, `file`, `description`) VALUES
(7, 'Haunting Adeline', 'huntingadeline.jpg', 'Haunting_Adeline.pdf', 'haunting adeline'),
(8, 'Thousand boy kisses', 'thousandboykisses.jpg', 'thousandboy.pdf', 'thousand boy'),
(9, 'Song of Achilles', 'songofachilles.jpg', 'The_song_of_achilles.pdf', 'achilles patroculus'),
(10, '48 laws of power', '48lawsofpower.jpg', '48_laws_of_power.pdf', 'laws of power'),
(11, 'You can heal yourself', 'youcanhealyourlife.jpg', 'You_Can_Heal_Your_Life.pdf', 'You can heal yourself'),
(12, 'Time management for creative peolpe', 'themgmtofcreativepeo.jpg', '65d3d91379fe0-time-management-for-creative-people.pdf', 'Time management for creative peolpe'),
(13, 'The power of self', 'thepowerofself.jpg', '65df046d09c57-power-of-self-discipline.pdf', 'The power of self'),
(14, 'Guide to self', 'guidetoself.jpg', '65f7376de3845-nuttatiello-guide-to-self-sufficiency-food.pdf', 'Guide to self'),
(15, 'Survive the drive', 'survivethedive.jpg', 'survive-the-drive.pdf', 'Survive the drive'),
(16, 'oneeeeecha', '1.png', 'ass222.pdf', 'asssssseeeeee1'),
(17, 'alu', 'cs.png', 'assinment2.pdf', 'shit'),
(18, 'dedede', '3.png', 'CHAPTER 1.pdf', 'edededdd'),
(19, 'sesese', 'Screenshot(1).png', 'GRP Corrected Report Sample.pdf', 'deedede'),
(20, 'fefefefefef', 'Screenshot 2024-04-18172044.png', 'print.pdf', 'gttgtgtgtg'),
(21, 'hyhyhy', '96586D2245D245BF9C23FEB96895A50F.png', '65d3d91379fe0-time-management-for-creative-people.pdf', 'hyhyhyhyhy'),
(22, 'gtgtgt', '96586D2245D245BF9C23FEB96895A50F.png', 'Scripting Language.pdf', 'tgtgtgtg'),
(23, 'olololol', 'thepowerofself.jpg', '659fbce6a082c-the-psychology-of-motivation.pdf', 'ololl'),
(24, 'huny', '5.png', 'final-version.pdf', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhh'),
(25, 'sdf', 'Screenshot 2023-07-09 083651.png', 'lab78.pdf', 'sdf'),
(26, 'asd', '2.png', '4.pdf', 'pic try');

-- --------------------------------------------------------

--
-- Table structure for table `bookm`
--

CREATE TABLE `bookm` (
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookm`
--

INSERT INTO `bookm` (`bid`, `uid`) VALUES
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prac`
--

CREATE TABLE `prac` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prac`
--

INSERT INTO `prac` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin123@gmail.com', '413b483076832cb36e29c6a8de54ae1e', 'admin'),
(2, 'moon', 'moon123@gmail.com', '3370750e2cb52a954dcd65e0a6d07744', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookm`
--
ALTER TABLE `bookm`
  ADD PRIMARY KEY (`bid`,`uid`),
  ADD KEY `fk_uid` (`uid`);

--
-- Indexes for table `prac`
--
ALTER TABLE `prac`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `prac`
--
ALTER TABLE `prac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookm`
--
ALTER TABLE `bookm`
  ADD CONSTRAINT `fk_bid` FOREIGN KEY (`bid`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`uid`) REFERENCES `prac` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
