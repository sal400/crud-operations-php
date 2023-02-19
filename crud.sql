-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 04:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`) VALUES
(1, 'Abdus', 'abdus@gmail.com', '3434'),
(2, 'Salam', 'salam@gmail.com', '3434'),
(3, 'Abc', 'abc@gmail.com', '3434'),
(12, 'Momin', 'momin@gmail.com', '7689'),
(13, 'Gomin', 'gomin@gmail.com', '234234'),
(14, 'Domin', 'domin@gmail.com', '83689'),
(20, 'Ramin', 'ramin@gmail.com', '3292394'),
(21, 'Kamin', 'kamin@gmail.com', '233242345'),
(23, 'jamin', 'jamin@gmail.com', '23423553'),
(37, 'Zomin', 'zomin@gmail.com', '98472783'),
(39, 'm&m', 'm&m@gmail.com', '8374647'),
(45, 'Mukles', 'mukles@gmail.com', '387497'),
(47, 'Hopeless', 'hopeless@gmail.com', '00387497'),
(48, 'Mufiz', 'mufiz@gmail.com', '736532'),
(53, 'Paglu', 'paglu@gmail.com', '243234'),
(54, 'Taklu', 'taklu@gmail.com', '3242352');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
