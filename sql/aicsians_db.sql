-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 10:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aicsians_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation_tb`
--

CREATE TABLE `conversation_tb` (
  `id` int(255) NOT NULL,
  `fld_user_id_1` varchar(255) NOT NULL,
  `fld_user_id_2` varchar(255) NOT NULL,
  `fld_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation_tb`
--

INSERT INTO `conversation_tb` (`id`, `fld_user_id_1`, `fld_user_id_2`, `fld_status`) VALUES
(7, '19', '21', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `message_tb`
--

CREATE TABLE `message_tb` (
  `id` int(255) NOT NULL,
  `fld_conversation_id` varchar(255) NOT NULL,
  `fld_sender_user_id` varchar(255) NOT NULL,
  `fld_receiver_user_id` varchar(255) NOT NULL,
  `fld_message_content` text NOT NULL,
  `fld_date` varchar(100) NOT NULL,
  `fld_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_tb`
--

INSERT INTO `message_tb` (`id`, `fld_conversation_id`, `fld_sender_user_id`, `fld_receiver_user_id`, `fld_message_content`, `fld_date`, `fld_status`) VALUES
(52, '7', '19', '21', 'asdasda', 'June 9, 2020, 10:29 pm', 'Unread'),
(53, '7', '19', '21', 'asdasd', 'June 9, 2020, 10:34 pm', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `post_tb`
--

CREATE TABLE `post_tb` (
  `id` int(255) NOT NULL,
  `fld_user_id` int(50) NOT NULL,
  `fld_post_desc` varchar(255) NOT NULL,
  `fld_post_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tb`
--

INSERT INTO `post_tb` (`id`, `fld_user_id`, `fld_post_desc`, `fld_post_date`) VALUES
(15, 19, 'Have a great day!', '06 08,2020 10:01 pm'),
(16, 19, 'Good Morning', '06 08,2020 10:20 pm'),
(17, 19, 'Good Day!', '06 08,2020 11:09 pm'),
(18, 21, 'Hello! Have a nice day', '06 09,2020 10:41 pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(255) NOT NULL,
  `fld_access_type` varchar(20) NOT NULL,
  `fld_Student_No` varchar(20) NOT NULL,
  `fld_first_name` varchar(20) NOT NULL,
  `fld_middle_name` varchar(20) NOT NULL,
  `fld_last_name` varchar(20) NOT NULL,
  `fld_bio` text NOT NULL,
  `fld_sex` varchar(50) NOT NULL,
  `fld_birth_date` varchar(50) NOT NULL,
  `fld_track_id` varchar(50) NOT NULL,
  `fld_strand_id` varchar(50) NOT NULL,
  `fld_contact_no` varchar(20) NOT NULL,
  `fld_email` varchar(20) NOT NULL,
  `fld_block` varchar(20) NOT NULL,
  `fld_username` varchar(20) NOT NULL,
  `fld_password` varchar(50) NOT NULL,
  `fld_image_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id`, `fld_access_type`, `fld_Student_No`, `fld_first_name`, `fld_middle_name`, `fld_last_name`, `fld_bio`, `fld_sex`, `fld_birth_date`, `fld_track_id`, `fld_strand_id`, `fld_contact_no`, `fld_email`, `fld_block`, `fld_username`, `fld_password`, `fld_image_path`) VALUES
(19, 'Student', '2012120', 'Renjen Missy', '', 'Bautista', 'Happy Lang a', 'Female', '', 'Technical Vocational', 'Infomation And Communications Technology', '09502312312', 'missybautista@gmail.', 'IC2MB', 'missybautista', '41baabba2c6b56d64bbe6a2afb871c612037b2ae', '../assets/img/default_female.png'),
(21, 'Student', '10000120', 'Lovejoy', 'Bucat', 'Villaflores', '', 'Female', '', '', '', '', 'vasda@', '', 'taptap', '9f2feb0f1ef425b292f2f94bc8482494df430413', '../assets/img/default_female.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation_tb`
--
ALTER TABLE `conversation_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_tb`
--
ALTER TABLE `message_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tb`
--
ALTER TABLE `post_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation_tb`
--
ALTER TABLE `conversation_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message_tb`
--
ALTER TABLE `message_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `post_tb`
--
ALTER TABLE `post_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
