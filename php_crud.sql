-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 04:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Amos Karugaba', 'amos@gmail.com', 'amos', '76656e0170364cc6c0aa6810093ebaf2'),
(2, 'Amos Karugaba', 'amos2@gmail.com', 'amos2', '0c1675de7c28c28736b0a1edd042c1ca');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `bx` varchar(10) NOT NULL,
  `boxsn` varchar(10) NOT NULL,
  `cat` varchar(20) NOT NULL,
  `icno` varchar(10) NOT NULL,
  `pat` varchar(220) NOT NULL,
  `arise` varchar(25) NOT NULL,
  `claim` varchar(25) NOT NULL,
  `note` varchar(25) NOT NULL,
  `copies` varchar(5) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `bx`, `boxsn`, `cat`, `icno`, `pat`, `arise`, `claim`, `note`, `copies`, `login_id`) VALUES
(15, 'K', 'ic001', 'IHI', '88HH', '9HH', 'BBB', 'B88', '8H8H', 'KK', 2),
(16, 'AB', 'ADD', 'kk', 'GH', 'E', 'KL', 'MN', 'OP', '9', 1),
(17, 'lkl', 'nmbjk', 'ljkbkj', 'mn mn ', 'jbjl', 'jkb', 'loih', 'hih', 'jjbj', 1),
(18, 'lkl', 'nmbjk', 'ljkbkj', 'mn mn ', 'jbjl', 'jkb', 'loih', 'hih', 'jjbj', 1),
(19, 'EDMOND', 'RWG', 'GRGR', 'mn WG ', '4G4G', '24GG', 'G54G', 'EW', '2Q4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_1` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
