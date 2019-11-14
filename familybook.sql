-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 08:16 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `familybook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `post_id` int(30) NOT NULL,
  `comment_description` varchar(250) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment_description`, `user_id`) VALUES
(90, 13, 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 13),
(91, 13, 'sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga y', 13),
(92, 13, 'kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kha yam kh', 13),
(93, 1, 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(94, 14, 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 14),
(95, 14, '3333', 14),
(96, 12, 'sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga ye sanga y', 12);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `p_photo` varchar(500) NOT NULL,
  `textarea` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `p_photo`, `textarea`) VALUES
(1, 'kkakaka', '1749_260327484298681_4415284935805995359_n.jpg', ' hhhhhhhhhhhhhhhhhhh       	\r\n        '),
(2, 'Saqib', '1898114_10206065801871733_7333718126266011770_n.jpg', 'sanga ye        	\r\n        '),
(12, 'bilal', '10411793_744878385647925_6332626790571695545_n.jpg', 'khiguyfydyst        	\r\n        '),
(13, 'Rameez Khan', '11887831_108971399454896_785413116461625154_n.jpg', 'ffffffff        	\r\n        '),
(14, 'salman', '13010911_1172092612851010_6078598528056723926_n.jpg', 'qqqqqqq        	\r\n        '),
(15, 'Saqib Khan', '735033_206138089741704_3594223860176794200_n.jpg', '        	\r\n        ');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `f_name` varchar(45) NOT NULL,
  `l_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `number` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `f_name`, `l_name`, `email`, `password`, `photo`, `address`, `number`, `dob`) VALUES
(42, 'bilal', 'khan', 'khan@gmail.com', '555', '1898114_10206065801871733_7333718126266011770_n.jpg', 'swat', '1234567', '2019-07-10'),
(43, 'Saqib', 'Khan', 'saqib@gmail.com', '555', '12821490_560169130812746_4930659447124348320_n.jpg', 'swat', '755755512345', '2019-07-05'),
(44, 'rameez', 'khan', 'rameez@gmail.com', '555', '1749_260327484298681_4415284935805995359_n.jpg', 'swat', '1234567', '2019-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `post_id` int(30) NOT NULL,
  `comment_id` int(30) NOT NULL,
  `reply` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `post_id`, `comment_id`, `reply`, `user_id`) VALUES
(31, 13, 92, 'ssssssssss', 13),
(33, 1, 0, 'dddd', 1),
(34, 1, 0, 'sssssssssskkkkkkkkkkkkkkkkkkkk', 0),
(35, 14, 14, 'sssssssssskkkkkkkkkkkkkkkkkkkk', 14),
(36, 14, 14, 'mmmmmmmmmmmm', 14),
(37, 12, 12, 'sssssssssskkkkkkkkkkkkkkkkkkkk', 12),
(38, 1, 0, 'mmmmmmmmmmmm', 1),
(39, 12, 12, 'mmmmmmmmmmmm', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
