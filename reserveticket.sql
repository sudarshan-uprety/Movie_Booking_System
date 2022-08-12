-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 04:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserveticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `adminkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`adminkey`) VALUES
('iamadmin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `screencode` int(11) NOT NULL,
  `showcode` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `time_booking` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `seat_id` varchar(255) NOT NULL,
  `movietitle` varchar(255) NOT NULL,
  `mor_movie_time` varchar(255) NULL,
  `noon_movie_time` varchar(255) NULL,
  `eve_movie_time` varchar(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`screencode`, `showcode`, `booking_id`, `user_id`, `time_booking`, `seat_id`, `movietitle`, `mor_movie_time`, `noon_movie_time`, `eve_movie_time`) VALUES
(2, 1, 157, '19', '2020-05-04 10:54:02', 'A-02', '','','','');


-- --------------------------------------------------------

--
-- Table structure for table `changemovie`
--

CREATE TABLE `changemovie` (
  `screencode` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `more` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `changeID` int(11) NOT NULL,
  `mor_movie_time` varchar(255) NULL,
  `noon_movie_time` varchar(255) NULL,
  `eve_movie_time` varchar(255) NULL,
  `change_date` varchar(255) NULL,
  `status` varchar(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `changemovie`
--

INSERT INTO `changemovie` (`screencode`, `title`, `more`, `trailer`, `poster`, `changeID`, `mor_movie_time`, `noon_movie_time`, `eve_movie_time`, `change_date`, `status`) VALUES
(1, 'Sudarshan', 'erhstr', 'https://youtu.be/6rQWkmEGZYc', '0f888cb6-f9de-4ed8-83d9-d38808501407_khalti_resized.jpg', 1, '', '', '', '',''),
(2, 'Harry Potter', 'Harry Potter is a British-American film series based on the eponymous novels by authJ. K. Rowling. The series is distributed by', 'https://www.youtube.com/embed/VyHV0BRtdxo', 'https://m.media-amazon.com/images/M/MV5BNjQ3NWNlNmQtMTE5ZS00MDdmLTlkZjUtZTBlM2UxMGFiMTU3XkEyXkFqcGdeQXVyNjUwNzk3NDc@._V1_UY1200_CR90,0,630,1200_AL_.jpg', 2, '', '', '', '',''),
(3, 'Avengers : Infinity War', 'The Avengers must stop Thanos, an intergalactic warlord, from getting his hands on all the infinity stones. However, Thanos is prepared to go to any lengths to carry out his insane plan.', 'https://www.youtube.com/embed/6ZfuNTqbHE8', 'https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_.jpg', 3, '', '', '', '','');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackform`
--

CREATE TABLE `feedbackform` (
  `booking_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `feedid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbackform`
--

INSERT INTO `feedbackform` (`booking_id`, `rating`, `feedback`, `feedid`, `username`) VALUES
(136, 5, 'I guess I am Done!', 1, 'Ajay'),
(172, 5, 'Amazing.', 3, 'Vijay'),
(173, 5, 'Great Service', 4, 'Ironman'),
(195, 5, 'Wow, nice service', 5, 'Avengers'),
(209, 5, 'Love it', 6, 'Hodor'),
(215, 5, 'Mind Blowing service and amazing customer support!', 10, 'Iron'),
(216, 5, 'Great experience! And What a customer support! As they say Best in the town!!', 11, 'Spider Man'),
(217, 5, 'Wow, Such a nice platform to book tickets!', 12, 'Iron'),
(226, 5, 'You guys Rock!', 13, 'Iron'),
(228, 5, 'Best service :)', 14, 'Iron'),
(230, 5, 'Best movie ever', 15, 'Sudarshan'),
(231, 2, 'spiderman movie was good', 16, 'Sudarshan');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `credits` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstName`, `lastName`, `email`, `password`, `credits`) VALUES
(18, 'Vinay', 'galagali', 'vinay@asdf.com', 'asdf', '88'),
(19, 'admin', 'admin', 'a@a.a', 'aaa', '-112'),
(20, 'Ajay', 'G', 'ajay@a.a', 'ajay', '0'),
(21, 'Dhanu', 'G', 'dhanu@gmail.com', 'dhanu', '88'),
(22, 'Sainath', 'Biradar', 'sainath@gmail.com', 'asdf', '88'),
(23, 'Vivek', 'Galagali', 'vivek@gmail.com', 'vivek', '88'),
(24, 'Vikram', 'g', 'v@v.v', 'vvv', '88'),
(25, 'Anirudh', 'V', 'anirudh@gmail.com', 'asdf', '88'),
(26, 'Sheldon', 'Shelly', 's@s.s', 'sss', '400'),
(27, 'Iron', 'Man', 'iron@avengers.com', 'iron', '3200'),
(28, 'Amrit', 'Kumar', 'amrit@gmail.com', 'amrit', '8600'),
(29, 'Spider Man', 'Parker', 'spider@avengers.com', 'spider', '9800'),
(30, 'Sudarshan', 'Uprety', 'mr.sudarshanuprety@gmail.com', 'Sud$582652', '6200'),
(32, 'miss', 'roji', 'miss.rojikharel@gmail.com', 'roji123', '10000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `changemovie`
--
ALTER TABLE `changemovie`
  ADD PRIMARY KEY (`changeID`);

--
-- Indexes for table `feedbackform`
--
ALTER TABLE `feedbackform`
  ADD PRIMARY KEY (`feedid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `changemovie`
--
ALTER TABLE `changemovie`
  MODIFY `changeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbackform`
--
ALTER TABLE `feedbackform`
  MODIFY `feedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
