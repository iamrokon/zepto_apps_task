-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 05:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zepto_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` int(11) NOT NULL,
  `font_name` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `font_name`, `location`) VALUES
(1, 'BurtonScratch-Regular', 'fonts/BurtonScratch-Regular.ttf'),
(2, 'Yaahowu', 'fonts/Yaahowu.ttf'),
(3, 'Zadosc', 'fonts/Zadosc.ttf'),
(4, 'NITEMARE', 'fonts/NITEMARE.TTF'),
(5, 'yayusa', 'fonts/yayusa.ttf'),
(6, 'YeOldeOak', 'fonts/YeOldeOak.ttf'),
(7, 'ZakirahsHandB', 'fonts/ZakirahsHandB.ttf');

-- --------------------------------------------------------

--
-- Table structure for table `font_groups`
--

CREATE TABLE `font_groups` (
  `id` int(11) NOT NULL,
  `group_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `font_groups`
--

INSERT INTO `font_groups` (`id`, `group_title`) VALUES
(7, 'Example 1'),
(8, 'Example 2'),
(9, 'Example 3'),
(10, 'abc'),
(11, 'Tanu');

-- --------------------------------------------------------

--
-- Table structure for table `font_group_details`
--

CREATE TABLE `font_group_details` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `font_name` varchar(100) NOT NULL,
  `font_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `font_group_details`
--

INSERT INTO `font_group_details` (`id`, `group_id`, `font_name`, `font_id`) VALUES
(11, 7, 'BurtonScratch', 1),
(12, 7, 'Yaahow', 2),
(16, 8, 'BurtonScratch', 1),
(17, 8, 'Yaahow', 2),
(18, 8, 'Nitemare', 4),
(19, 9, 'Zados', 3),
(20, 9, 'Burton', 1),
(21, 10, 'sss', 1),
(22, 10, 'ddd', 3),
(23, 11, 'www', 3),
(24, 11, 'ddd', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `font_groups`
--
ALTER TABLE `font_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `font_group_details`
--
ALTER TABLE `font_group_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `font_groups`
--
ALTER TABLE `font_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `font_group_details`
--
ALTER TABLE `font_group_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
