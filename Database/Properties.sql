-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2018 at 11:34 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Properties`
--

-- --------------------------------------------------------

--
-- Table structure for table `MyGuests`
--

CREATE TABLE `MyGuests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MyGuests`
--

INSERT INTO `MyGuests` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `comment`, `reg_date`) VALUES
(157, 'nandini', 'prakash', 'nini@gmail.com', '', 'parwana vihar .. any idea ?', '2017-04-18 16:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(200) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `rating`, `review`, `reg_date`) VALUES
(139, 'shelly', 'john', 'sheel.john@yahoo.co.in', '', 2, 'fine experience .Happy with my new home.', '2017-04-17 17:08:43'),
(149, 'shahrukh', 'khan', 'khan@gmail.com', '', 4, 'very good website keep it up.', '2017-04-18 15:36:11'),
(150, 'nidhi', 'bhardwaj', 'bhardwaj@gmail.com', '', 2, 'nice.', '2017-04-18 16:34:15'),
(151, 'nidhi', 'bhardwaj', 'bhardwaj@gmail.com', '', 2, 'nice.', '2017-04-18 16:36:05'),
(152, 'nonu', 'verma', '123@gmail.com', '', 0, 'bad experience.', '2017-04-18 16:36:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MyGuests`
--
ALTER TABLE `MyGuests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MyGuests`
--
ALTER TABLE `MyGuests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
