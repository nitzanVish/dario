-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 01, 2021 at 09:34 AM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `send_log`
--

CREATE TABLE `send_log` (
  `log_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `num_id` int(11) NOT NULL,
  `log_message` mediumtext NOT NULL,
  `log_success` tinyint(1) NOT NULL DEFAULT '1',
  `log_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send_log`
--

INSERT INTO `send_log` (`date`, `usr_id`, `log_success`, `count(*)`) VALUES
(2021-06-19, 3, 0, 9),
(2021-06-19, 5, 0, 11),
(2021-06-19, 7, 0, 29),
(2021-06-19, 8, 0, 10),
(2021-06-24, 2, 0, 10),
(2021-06-24, 3, 0, 19),
(2021-06-26, 2, 0, 2),
(2021-06-26, 2, 1, 7),
(2021-06-28, 1, 1, 24),
(2021-06-28, 2, 1, 1),
(2021-06-28, 3, 0, 1),
(2021-06-28, 9, 1, 71),
(2021-06-29, 1, 0, 21),
(2021-06-29, 9, 0, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `send_log`
--
ALTER TABLE `send_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `send_log`
--
ALTER TABLE `send_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
