-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 01:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopjonstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_login`
--

CREATE TABLE `data_login` (
  `id` int(11) NOT NULL,
  `level` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_login`
--

INSERT INTO `data_login` (`id`, `level`, `username`, `password`, `email`) VALUES
(8, 'admin', 'superadmin', 'admin', 'admin@gmail.com'),
(9, 'user', 'ikhsan1', 'ikhsan1', 'ikhsan1@gmail.com'),
(11, 'user', 'ikhsan3', 'ikhsan3', 'ikhsan3@gmail.com'),
(77, 'user', 'ikhsan4', 'ikhsan4', 'ikhsan4@gmail.com'),
(79, 'user', 'ikhsan5', 'ikhsan5', 'ikhsan5@gmail.com'),
(80, 'user', 'ikhsan6', 'ikhsan6', 'ikhsan6@gmail.com'),
(82, 'user', 'ikhsan7', 'ikhsan7', 'ikhsan7@gmail.com'),
(84, 'user', 'ikhsan8', 'ikhsan8', 'ikhsan8@gmail.com'),
(85, 'user', 'ikhsan9', 'ikhsan9', 'ikhsan9@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_login`
--
ALTER TABLE `data_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
