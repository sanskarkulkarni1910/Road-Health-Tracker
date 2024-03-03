-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 03:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rht`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaintdb`
--

CREATE TABLE `complaintdb` (
  `sr` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `complaint` varchar(500) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `area` varchar(20) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `comfirm` varchar(25) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `mobno` bigint(10) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaintdb`
--

INSERT INTO `complaintdb` (`sr`, `image`, `name`, `complaint`, `datentime`, `area`, `longitude`, `latitude`, `comfirm`, `eid`, `mobno`, `status`) VALUES
(1, 'image_data/complaint_img/natasha-miller-KGlqPl1fXj8-unsplash.jpg', 'Atharv Kolekar', 'Khadde khup aahet mfv dfmwedf', '2024-01-29 09:17:59', 'Rajarampuri', '74.262830', '16.874515', 'Verified', 'kolekar.atharv1812@gmail.com', 9860851121, 'Completed'),
(2, 'image_data/complaint_img/natasha-miller-KGlqPl1fXj8-unsplash.jpg', 'Atharv Kolekar', 'qwertyuisdf sdfv sdf', '2024-02-02 12:47:38', 'Chavare', '74.262837', '16.874496', 'Verified', 'kolekar.atharv1812@gmail.com', 9860851121, 'Completed'),
(3, 'image_data/complaint_img/natasha-miller-KGlqPl1fXj8-unsplash.jpg', 'Atharv Kolekar', 'fghjk fghjk fg  werfgbv sedrfgbmlwertyuiolljhgfdsdfghnm  cfghjkjhgv cfghjk', '2024-02-02 12:48:38', 'Chavare', '74.253135', '16.872871', 'Verified', 'kolekar.atharv1812@gmail.com', 9860851121, 'Completed'),
(4, 'image_data/complaint_img/Webbg.png', 'Atharv Milind Kolekar', 'xcvbnm dfghjnc dfg fcfgbn rtghj', '2024-02-03 09:26:48', 'Chavare', '74.262839', '16.874522', 'Verified', 'kolekar.atharv1812@gmail.com', 9860851121, 'Completed'),
(5, 'image_data/complaint_img/IMG-20230407-WA0001.jpg', 'Atharv Milind Kolekar', 'wedfvb sdfvgbd dfjg sdfgjhfj eefgfew efvbcasdf ffdwsdf sdf', '2024-02-03 09:40:17', 'Amrutnagar', '74.262842', '16.874535', 'Verified', 'roadhealthtracker@gmail.com', 9860851121, 'Completed'),
(6, 'image_data/complaint_img/IMG-20230407-WA0001.jpg', 'Atharv Milind Kolekar', 'wedfvb sdfvgbd dfjg sdfgjhfj eefgfew efvbcasdf ffdwsdf sdf', '2024-02-03 09:40:33', 'Amrutnagar', '74.262842', '16.874535', 'Verified', 'roadhealthtracker@gmail.com', 9860851121, 'Completed'),
(7, 'image_data/complaint_img/IMG-20230407-WA0001.jpg', 'Atharv Milind Kolekar', 'wedfvb sdfvgbd dfjg sdfgjhfj eefgfew efvbcasdf ffdwsdf sdf', '2024-02-03 10:07:15', 'Amrutnagar', '74.262842', '16.874535', 'Verified', 'roadhealthtracker@gmail.com', 9860851121, 'Completed'),
(8, 'image_data/complaint_img/IMG-20230407-WA0001.jpg', 'Atharv Milind Kolekar', 'wedfvb sdfvgbd dfjg sdfgjhfj eefgfew efvbcasdf ffdwsdf sdf', '2024-02-03 10:08:14', 'Amrutnagar', '74.262842', '16.874535', 'Verified', 'roadhealthtracker@gmail.com', 9860851121, 'Completed'),
(9, 'image_data/complaint_img/IMG-20230407-WA0001.jpg', 'Atharv Milind Kolekar', 'Complaint writing here is only for testing purpose', '2024-02-06 19:43:25', 'Nagpur', '79.088155', '21.145800', 'Verified', 'kolekar.atharv1812@gmail.com', 9860851121, 'Completed'),
(10, 'image_data/complaint_img/road1.jpg', 'Atharv Milind Kolekar', 'Asacjdsfjj dck aedfjjaer', '2024-02-09 10:24:01', 'Chavare', '74.252553', '16.872209', 'Verified', 'kolekar.atharv1812@gmail.com', 9860851121, 'Completed'),
(11, 'image_data/complaint_img/natasha-miller-KGlqPl1fXj8-unsplash.jpg', 'Sanskar Kulkarni', 'there are so many pits sd,fgSLKUGSJEBFvkjsdbv', '2024-02-09 12:58:04', 'Kolhpur', '74.262973', '16.875013', 'Verified', 'kolekar.atharv1812@gmail.com', 8766681919, 'Completed'),
(12, 'image_data/complaint_img/complaint_imgezgif.com-video-to-gif (3).gif', 'Jyoti Gurav', 'Test  dfghjkt gyujks tyujkwk wef', '2024-03-01 12:47:54', 'Chavare', '79.129452', '21.097705', 'Verified', 'jyoteegurav88@gmail.com', 9876543210, 'Completed'),
(13, 'image_data/complaint_img/rlog.jpeg', 'Jyoti Gurav', 'Testing Purpose mesage of complaint', '2024-03-01 19:36:44', 'Chavare', '79.088155', '21.145800', 'Not Verified', 'jyoteegurav88@gmail.com', 9876543210, 'Not Completed');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackdb`
--

CREATE TABLE `feedbackdb` (
  `sr` int(11) NOT NULL,
  `image_link` varchar(400) NOT NULL,
  `msg` varchar(400) NOT NULL,
  `name` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `mobno` bigint(10) NOT NULL,
  `area` varchar(20) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `reply` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbackdb`
--

INSERT INTO `feedbackdb` (`sr`, `image_link`, `msg`, `name`, `eid`, `mobno`, `area`, `longitude`, `latitude`, `rating`, `datentime`, `reply`) VALUES
(1, 'image_data/feedback_img/rlog.jpeg', 'Its really good road to see it you made it ', 'Atharv Kolekar', 'kolekar.atharv1812@gmail.com', 9860851121, 'Shahupuri', '79.088155', ' 21.145800', 'Rating: 4 ', '2024-01-27 21:52:55', 'asdertghjk'),
(3, 'image_data/feedback_img/IMG-20230407-WA0001.jpg', 'qwertyuiop werty ewerty', 'Atharv Milind Kolekar', 'kolekar.atharv1812@gmail.com', 9876543210, 'Chavare', '74.262842', ' 16.874535', 'Rating: 4 ', '2024-02-03 10:12:11', 'THank you.'),
(4, 'image_data/feedback_img/feed2.jpg', 'lkufGLESGKes', 'Sanskar Kulkarni', 'sanskarkulkarni1910@gmail.com', 8766681910, 'Kolhpur', '74.262986', ' 16.875030', 'Rating: 5 ', '2024-02-09 12:59:40', 'ydtshjh'),
(5, 'image_data/feedback_img/rlog.jpeg', 'fghjkrtyuifghjkyudfghj', 'Jyoti Gurav', 'jyoteegurav88@gmail.com', 987654321, 'Chavre', '79.129452', ' 21.097705', 'Rating: 5 ', '2024-03-01 12:50:38', 'thank you');

-- --------------------------------------------------------

--
-- Table structure for table `municipledb`
--

CREATE TABLE `municipledb` (
  `sr` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(18) NOT NULL,
  `mobno` bigint(10) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipledb`
--

INSERT INTO `municipledb` (`sr`, `image`, `name`, `password`, `mobno`, `eid`, `address`) VALUES
(1, 'image_data/user_data/municipal logo.png', 'Kolhapur Municiple', 'khpmuniciple@1199', 2312540291, 'roadhealthtracker@gmail.com', 'Chhatrapati Shivaji Maharaj chowk, Main Building, Bhausingji Rd, C Ward, Kolhapur, Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `user_image` varchar(400) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(18) NOT NULL,
  `mobno` bigint(10) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`user_image`, `gender`, `name`, `password`, `mobno`, `eid`, `address`, `datetime`) VALUES
('image_data/user_data/user_default.jpg', 'Female', 'Madhuri Dixit', 'Mad@123', 9685741230, 'dixitmadhuri@gmail.com', 'Mumbai Puna Delhi Satara Maharastra', '2024-01-29 20:36:05'),
('image_data/user_data/user_default.jpg', 'Male', 'James Gosling', 'James@123', 9876543210, 'jamesgosling@gmai.com', 'qwertyuiopasdfghjklzxcvbnm,qwertyuiopasdfghjkl dfghjklxcvbnm,. fghjklrtyui ghjk', '2024-01-23 18:25:14'),
('image_data/user_data/profile_1441298847.jpeg', 'Female', 'Jyoti Gurav', 'Jyoti@1234', 9874563210, 'jyoteegurav88@gmail.com', 'Dist: Kolhapur , State: Maharashtra, India', '2024-03-01 12:41:05'),
('image_data/user_data/profile_1985961273.png', 'Male', 'Atharv Milind Kolekar', 'Atharv@1812', 9860851121, 'kolekar.atharv1812@gmail.com', 'Kolhapur, Sangli, Satara, Mumbai,pune, Thane', '2024-02-26 13:20:25'),
('image_data/user_data/user_default.jpg', 'Male', 'Sanskar Mandar Kulkarni', 'Sanskar@1234', 8766681910, 'sanskarkulkarni1910@gmail.com', 'Kolhapur, Sangli, Satara, Mumbai,pune, Thane', '2024-02-26 13:18:38'),
('image_data/user_data/user_default.jpg', 'Male', 'Shreyash Mulik', 'Shreyash@1234', 9860851121, 'shreyash@gmail.com', 'Amdfv dfvb vjqk dfvkm sdfvfds fi sdf', '2024-01-28 15:28:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaintdb`
--
ALTER TABLE `complaintdb`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `feedbackdb`
--
ALTER TABLE `feedbackdb`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `municipledb`
--
ALTER TABLE `municipledb`
  ADD PRIMARY KEY (`sr`),
  ADD UNIQUE KEY `eid` (`eid`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD UNIQUE KEY `eid` (`eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaintdb`
--
ALTER TABLE `complaintdb`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedbackdb`
--
ALTER TABLE `feedbackdb`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `municipledb`
--
ALTER TABLE `municipledb`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
