-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 07:15 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `use_id`) VALUES
(1, 'fruits', 39),
(3, 'car', 32),
(13, 'nokia', 32),
(15, 'samsung', 32),
(17, 'vivo', 39),
(18, 'ASHIK CHAUDHARY', 40);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `pass`, `mobile`, `address`, `filename`) VALUES
(27, 'dinesh', 'dinesh@gmail.com', 'dinesh@123', '9630215487', 'vastral ahmedabad', '3_(1).jpg'),
(29, 'vikram', 'vikram@gmail.com', 'vikram@123', '7485690213', 'vasadva dhrangdhra s', 'image_10.jpg'),
(30, 'ashok', 'ashok@gmail.com', 'ashok@123', '3625140987', 'rajkot gujarat', 'Living-Room1-300x146.jpg'),
(31, 'chetan', 'chetan@gmail.com', 'chetan@123', '7485693021', 'dhrangdha ', 'images.png'),
(32, 'Mitesh', 'mitesh.kadivar@overseasits.com', 'mitesh@123', '9723507562', 'vasadva dhrangadhra', 'photo.jpg'),
(38, 'Testing', 'vasadva@yopmail.com', 'testing@123', '9977448822', 'memnagar ahmedabad ', 'Desert.jpg'),
(39, 'Social TEst', 'socialdevp786@gmail.com', 'test@123', '1236549870', 'mehsansa gujarat', 'Jellyfish.jpg'),
(40, 'Ashish', 'ashik.patel@overseasits.com', 'ashik@123', '9988771122', 'memnagar gurukul', 'Hydrangeas.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `use_id` (`use_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`use_id`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
