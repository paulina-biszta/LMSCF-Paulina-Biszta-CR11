-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 04:07 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_paulina_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_paulina_petadoption` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr11_paulina_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `type` enum('kitten','adult') NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `status` enum('waiting for a new home','has just found a new home','','') NOT NULL DEFAULT 'waiting for a new home',
  `img` blob DEFAULT NULL,
  `fk_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `name`, `age`, `description`, `type`, `hobby`, `status`, `img`, `fk_location_id`) VALUES
(1, 'Bruno', 9, 'Tabby, loving but independent', 'adult', 'Sleeping and hiding', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f313534333739332f706578656c732d70686f746f2d313534333739332e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3126773d353030, 2),
(2, 'Melody', 3, 'Fluffy Ragdoll cat', 'adult', 'Sleeping, eating', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f3136313030352f6361742d6b697474656e2d706574732d746f6d2d6361742d3136313030352e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3126773d353030, 2),
(3, 'Lucy', 0, 'Little, loving baby', 'kitten', 'Sleeping, sleeping, sleeping', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f323535383630352f706578656c732d70686f746f2d323535383630352e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3226683d36353026773d393430, 1),
(4, 'Ron', 10, 'Active, friendly', 'adult', 'Playing, exploring new hiding places', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f3631353336392f706578656c732d70686f746f2d3631353336392e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3226683d36353026773d393430, 3),
(5, 'Eva', 4, 'Extraordinary, friendly ', 'adult', 'Scratching the cat tree', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f323837303335332f706578656c732d70686f746f2d323837303335332e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3126773d353030, 3),
(6, 'Black Panter', 1, 'Independent', 'adult', 'Watching through a window', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f313531303534332f706578656c732d70686f746f2d313531303534332e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3226683d36353026773d393430, 1),
(7, 'Grizzy', 8, 'Tabby, loving but independent', 'adult', 'Scratching the cat tree', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f313536303432342f706578656c732d70686f746f2d313536303432342e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3226683d36353026773d393430, 1),
(8, 'Micy', 5, 'Active, loves to cuddle', 'adult', 'Sleeping, eating and playing', 'has just found a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f333731323039352f706578656c732d70686f746f2d333731323039352e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3226683d36353026773d393430, 1),
(9, 'Helga', 11, 'Calm, friendly', 'adult', 'Sleeping, sleeping, sleeping', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f313534333830312f706578656c732d70686f746f2d313534333830312e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3126773d353030, 2),
(10, 'Maki', 0, 'Active, friendly and sweet', 'kitten', 'Playing!', 'has just found a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f3539363539302f706578656c732d70686f746f2d3539363539302e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3126773d353030, 2),
(11, 'Rory', 0, 'Little, loving baby', 'kitten', 'Scratching the cat tree', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f323635333735322f706578656c732d70686f746f2d323635333735322e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3126773d353030, 3),
(12, 'Jenny', 0, 'Little, sweet and loves to cuddle', 'kitten', 'Sleeping and cuddling', 'waiting for a new home', 0x68747470733a2f2f696d616765732e706578656c732e636f6d2f70686f746f732f313938313131312f706578656c732d70686f746f2d313938313131312e6a7065673f6175746f3d636f6d70726573732663733d74696e7973726762266470723d3126773d353030, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pet_location`
--

CREATE TABLE `pet_location` (
  `location_id` int(11) NOT NULL,
  `city` varchar(25) NOT NULL,
  `street` varchar(25) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet_location`
--

INSERT INTO `pet_location` (`location_id`, `city`, `street`, `code`) VALUES
(1, 'Vienna', 'Kettenbruckengasse 99', 1020),
(2, 'Vienna', 'Mariahilferstrasse 44', 1070),
(3, 'Vienna', 'Arbeitergasse 10', 1050);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin','superadmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'Paulina', 'paulina@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'superadmin'),
(2, 'Lucy', 'lucy@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(4, 'Robin', 'robin@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(5, 'Michel', 'mike@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(9, 'Bruno', 'bruno@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(10, 'Elisabeth', 'eli@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(11, 'Tom', 'tom@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(12, 'Eva', 'ev@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_location_id` (`fk_location_id`);

--
-- Indexes for table `pet_location`
--
ALTER TABLE `pet_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`fk_location_id`) REFERENCES `pet_location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
