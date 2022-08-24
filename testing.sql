-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 02:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`) VALUES
(4, 'Takunda Robson Chaduka', 'tchaduka3@yahoo.com', '$2y$10$PDM1WFvlw3FsNIFH/zoD9elOWOv1bRVI.qQekv7iE1coo5SNEKBVO'),
(7, 'Takunda Robson Chaduka', 'tchaduka3@gmail.com', '$2y$10$w/i0hhMJF5MhfZbaOfUcSu8hFNxqL5h.LnymHTVy3pOfe7.6icbWO'),
(8, 'Benson', 't@z.com', '$2y$10$XVoJ8AwLHHJCzJHgspJO3.CTq9K2u0ARZ13XM28vA2mXjbrNfO6Y2'),
(9, 'Tazy', 't@z.com2', '$2y$10$1J/RD3OZDMMaXt1RU/r6ceo8qoUiZa.IjQd0HNYAw4RdNFS7aZQSS');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'open',
  `date_submited` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `description`, `status`, `date_submited`) VALUES
(16, 'Benson', 'Trial Request', 'How do i requets for trials papa', 'closed', '2022-08-24 00:00:00'),
(17, 'Benson', 'Get Equity', 'What is requiered to get equity', 'open', '2022-08-24 14:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
