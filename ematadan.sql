-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ematadan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `phone`, `pass`) VALUES
('Rajan Subedi', 'subedi1680@gmail.com', '9846001045', 'Rajan123'),
('Sandesh Lamsal', 'sandeshlamsal8@gmail.com', '9741785698', 'Sandesh123'),
('Aayam Ghimire', 'aayamghimire04@gmail.com', '9810117997', 'Aayam123'),
('sandesh', 'sandesh@gmail.com', '9876543210', 'sandesh1');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(30) NOT NULL,
  `candidate_position` varchar(15) NOT NULL,
  `vote_count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `candidate_name`, `candidate_position`, `vote_count`) VALUES
(1, 'Rajan Subedi', 'Project Leader', 2),
(2, 'Sandesh Lamsal', 'Project Leader', 6),
(3, 'Aayam Ghimire', 'Project Leader', 1),
(11, 'Ramesh', 'uuu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_login`
--

CREATE TABLE `register_login` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `citizenship_no` varchar(15) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `pass` varchar(500) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_login`
--

INSERT INTO `register_login` (`id`, `fname`, `lname`, `email`, `citizenship_no`, `phone`, `gender`, `dob`, `pass`, `status`) VALUES
(19, 'Sandesh', 'Lamsal', 'sandeshlamsal8@gmail.com', '5641548', '9741785698', 'Male', '2003-02-12', '$2y$10$4MlV52L45QqyHrZfSeh7iumeDTsOO3rAX3Os3lpoWShAdvxhB7Rlq', 0),
(20, 'sandesh', 'pokhrel', 'sandeshpokharel777@gmail.com', '323232323', '9876543210', 'Male', '2000-06-14', '$2y$10$ndgAH/S/M3N4TVI6u/JE4./S4hAXg7yQSpWIgVKmNX.zF2nviHmjq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_login`
--
ALTER TABLE `register_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `register_login`
--
ALTER TABLE `register_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
