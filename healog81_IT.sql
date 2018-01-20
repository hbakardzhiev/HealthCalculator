-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2018 at 08:34 PM
-- Server version: 5.5.58-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healog81_IT`
--

-- --------------------------------------------------------

--
-- Table structure for table `caloricfood`
--

CREATE TABLE `caloricfood` (
  `id` int(11) NOT NULL,
  `product` varchar(50) COLLATE utf8_bin NOT NULL,
  `amountOfProduct` double NOT NULL,
  `amountOfCalories` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `caloricfood`
--

INSERT INTO `caloricfood` (`id`, `product`, `amountOfProduct`, `amountOfCalories`) VALUES
(1, 'Honey', 0, 304),
(2, 'Macadamia', 0, 718),
(3, 'PeanutButter', 0, 590),
(6, 'Chocolate', 0, 598),
(7, 'Avocados', 0, 160),
(8, 'Pasta', 0, 124);

-- --------------------------------------------------------

--
-- Table structure for table `dataofuser1`
--

CREATE TABLE `dataofuser1` (
  `id` int(11) NOT NULL,
  `weight` double NOT NULL,
  `idealWeight` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dataofuser1`
--

INSERT INTO `dataofuser1` (`id`, `weight`, `idealWeight`, `time`) VALUES
(1, 75, 80, '2018-01-13 20:55:00'),
(2, 78, 0, '2018-01-13 21:05:51'),
(3, 89, 0, '2018-01-13 21:05:51'),
(4, 79, 75, '2018-01-13 21:06:13'),
(5, 89, 83, '2018-01-13 21:06:13'),
(6, 80, 75, '2018-01-13 21:06:33'),
(7, 81, 75.2, '2018-01-13 21:06:33'),
(8, 99, 85, '2018-01-13 21:07:04'),
(9, 110, 90, '2018-01-13 21:07:04'),
(10, 75, 75.3, '2018-01-13 22:34:00'),
(11, 80, 85.3, '2018-01-14 08:21:15'),
(12, 100, 121.7, '2018-01-14 08:21:47'),
(13, 100, 121.7, '2018-01-14 08:23:22'),
(14, 49, 35.1, '2018-01-14 19:09:56'),
(15, 35, 7.1, '2018-01-14 19:10:34'),
(16, 50, 37.1, '2018-01-14 19:11:21'),
(17, 55, 47.1, '2018-01-14 19:11:28'),
(18, 60, 57.1, '2018-01-14 19:11:38'),
(19, 70, 77.1, '2018-01-14 19:11:51'),
(20, 63.1, 63.3, '2018-01-14 19:12:19'),
(21, 75, 71.7, '2018-01-14 19:16:27'),
(22, 100, 125.3, '2018-01-17 21:11:47'),
(23, 75, 75, '2018-01-20 17:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `exercise` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `exercise`) VALUES
(3, 'cycling'),
(2, 'jogging'),
(1, 'walking');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user1', 'user1'),
(2, 'user2', 'user2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caloricfood`
--
ALTER TABLE `caloricfood`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product` (`product`);

--
-- Indexes for table `dataofuser1`
--
ALTER TABLE `dataofuser1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exercise` (`exercise`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caloricfood`
--
ALTER TABLE `caloricfood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dataofuser1`
--
ALTER TABLE `dataofuser1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
