-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 01, 2021 at 09:38 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(255) NOT NULL,
  `usr_active` tinyint(1) NOT NULL DEFAULT '1',
  `usr_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_active`, `usr_created`) VALUES
(1, 'Signal Gift Stores', 1, '2021-06-28 18:35:16'),
(2, 'La Rochelle Gifts', 1, '2021-06-28 18:35:16'),
(3, 'Baane Mini Imports', 1, '2021-06-28 18:35:16'),
(4, 'Euro+ Shopping Channel', 1, '2021-06-28 18:35:16'),
(5, 'Danish Wholesale Imports', 1, '2021-06-28 18:35:16'),
(6, 'Herkku Gifts', 1, '2021-06-28 18:35:16'),
(7, 'Toys of Finland, Co.', 1, '2021-06-28 18:35:16'),
(8, 'Gift Depot Inc.', 1, '2021-06-28 18:35:16'),
(9, 'Technics Stores Inc.', 1, '2021-06-28 18:35:16'),
(10, 'Land of Toys Inc.', 1, '2021-06-28 18:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
