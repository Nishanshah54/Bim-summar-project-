-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 06:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminloginf`
--

CREATE TABLE `adminloginf` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminloginf`
--

INSERT INTO `adminloginf` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(0, 'admin ', 'admin1234@gmail.com', '123456', '9876543210', 'city', 'address'),
(0, 'nishan', 'nessanshahi54@gmail.com', '123456', '9873212891', '12341', '12341');

-- --------------------------------------------------------

--
-- Table structure for table `bug`
--

CREATE TABLE `bug` (
  `BugID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SubmissionType` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `Attachments` varchar(255) DEFAULT NULL,
  `AdditionalComments` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bug`
--

INSERT INTO `bug` (`BugID`, `Name`, `Email`, `SubmissionType`, `Description`, `Attachments`, `AdditionalComments`, `CreatedAt`) VALUES
(1, 'nishan', 'nessanshahi54@gmail.com', 'Bug Report', 'sdfa', 'intro-bg_1.jpg', 'adsf', '2024-05-15 05:32:54'),
(2, 'nishan', 'nessanshahi54@gmail.com', 'Bug Report', 'sdfa', 'intro-bg_1.jpg', 'adsf', '2024-05-15 05:33:17'),
(3, 'abc', 'admin1234@gmail.com', 'Bug Report', 'sdhfasfa', 'intro-bg_1.jpg', 'dfdfss', '2024-05-15 05:33:58'),
(4, 'abc', 'admin1234@gmail.com', 'Bug Report', 'sdhfasfa', 'intro-bg_1.jpg', 'dfdfss', '2024-05-15 05:38:26'),
(5, 'abc', 'admin1234@gmail.com', 'Bug Report', 'sdhfasfa', 'intro-bg_1.jpg', 'dfdfss', '2024-05-15 05:39:21'),
(6, 'abc', 'admin1234@gmail.com', 'Bug Report', 'sdhfasfa', 'intro-bg_1.jpg', 'dfdfss', '2024-05-15 05:40:17'),
(7, 'abc', 'admin1234@gmail.com', 'Bug Report', 'sdhfasfa', 'intro-bg_1.jpg', 'dfdfss', '2024-05-15 05:40:27'),
(8, 'ram', 'admin1234@gmail.com', 'Bug Report', 'sdhfasfa', 'intro-bg_1.jpg', 'dfdfss', '2024-05-15 05:42:17'),
(9, 'Nishan shah', 'Test@gmail.com', 'Complaint', 'test complaint', '', 'test', '2024-05-16 07:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` blob DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `image`, `category`) VALUES
(1, 'Cannon EOS', 36000, 0x2e2e2f75706c6f6164732f63616e6e6f6e5f656f732e6a7067, 'cameras'),
(2, 'Sony DSLR', 40000, 0x2e2e2f75706c6f6164732f736f6e795f64736c722e6a706567, 'cameras'),
(3, 'Sony DSLR', 50000, 0x2e2e2f75706c6f6164732f736f6e795f64736c72322e6a706567, 'cameras'),
(4, 'Olympus DSLR', 80000, 0x2e2e2f75706c6f6164732f6f6c796d7075732e6a7067, 'cameras'),
(5, 'Titan Model #301', 13000, 0x2e2e2f75706c6f6164732f746974616e3330312e6a7067, 'watches'),
(6, 'Titan Model #201', 3000, 0x2e2e2f75706c6f6164732f746974616e3230312e6a7067, 'watches'),
(7, 'HMT Milan', 8000, 0x2e2e2f75706c6f6164732f686d742e4a5047, 'watches'),
(8, 'Favre Lueba #111', 18000, 0x2e2e2f75706c6f6164732f66617672656c657562612e6a7067, 'watches'),
(9, 'Raymond', 1500, 0x2e2e2f75706c6f6164732f7261796d6f6e642e6a7067, 'T-shirt'),
(10, 'Charles', 1000, 0x2e2e2f75706c6f6164732f636861726c65732e6a7067, 'T-shirt'),
(11, 'HXR', 900, 0x2e2e2f75706c6f6164732f4858522e6a7067, 'T-shirt'),
(12, 'PINK', 1200, 0x2e2e2f75706c6f6164732f70696e6b2e6a7067, 'T-shirt'),
(13, 'school bag', 1200, 0x2e2e2f75706c6f6164732f626167322e6a7067, 'bags'),
(14, 'key3 rings', 1000, 0x2e2e2f75706c6f6164732f6b6579332e6a7067, 'others'),
(15, 't-shirt', 1500, 0x2e2e2f75706c6f6164732f32742e6a7067, 't-shirt'),
(17, 'Tokyo', 1100, 0x2e2e2f75706c6f6164732f312e6a7067, 't-shirt'),
(18, 'win-ing', 800, 0x2e2e2f75706c6f6164732f372e6a7067, 't-shirt');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `userId` int(11) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `s_id` int(11) NOT NULL,
  `Prouduct_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`userId`, `Name`, `Address`, `City`, `Province`, `Country`, `PhoneNumber`, `Email`, `s_id`, `Prouduct_id`) VALUES
(4, 'nishan shah', 'sera', 'Lalitpur(Patan)', '2', 'Nepal', '9863379414', 'nessanshahi54@gmail.com', 1, NULL),
(7, 'jenisha lamichhani', 'pokhara', 'Pokhara', '4', 'Nepal', '99876543210', 'Jenishalamichhani@gmail.com', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(1, 'Sajal', 'sajal.agrawal1997@gmail.com', '57f231b1ec41dc6641270cb09a56f897', '8899889988', 'Indore', '100 palace colony, Indore'),
(2, 'Ram', 'ram1234@xyz.com', '57f231b1ec41dc6641270cb09a56f897', '8899889989', 'Pune', '100 palace colony, Pune'),
(3, 'Shyam', 'shyam@xyz.com', '57f231b1ec41dc6641270cb09a56f897', '8899889990', 'Bangalore', '100 palace colony, Bangalore'),
(4, 'nishan shah', 'nessanshahi54@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9824113419', 'syangja', 'sera'),
(5, 'sujan', 'kafle@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9812345678', 'pokhara', 'biruta'),
(6, 'Amit ', 'aiamit2060@gmail.com', '4bd331b056e9ed8011e996b2e0353e76', '9806720103', 'pokhara', 'pokhara'),
(7, 'jenisha lamichhani', 'Jenishalamichhani@gmail.com', 'f963b3d7163ecc505f70d3385f4e862e', '9824113419', 'syangja', 'pkr');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`id`, `user_id`, `item_id`, `status`, `created_at`) VALUES
(7, 3, 3, 'Added to cart', '2024-05-17 03:24:56'),
(8, 3, 4, 'Added to cart', '2024-05-17 03:24:56'),
(9, 3, 5, 'Added to cart', '2024-05-17 03:24:56'),
(10, 3, 11, 'Added to cart', '2024-05-17 03:24:56'),
(11, 1, 9, 'Added to cart', '2024-05-17 03:24:56'),
(12, 1, 2, 'Added to cart', '2024-05-17 03:24:56'),
(13, 1, 8, 'Added to cart', '2024-05-17 03:24:56'),
(19, 5, 5, 'Confirmed', '2024-05-17 03:24:56'),
(20, 5, 12, 'Confirmed', '2024-05-17 03:24:56'),
(21, 6, 1, 'Confirmed', '2024-05-17 03:24:56'),
(30, 7, 7, 'Confirmed', '2024-05-22 08:46:05'),
(31, 7, 13, 'Confirmed', '2024-05-22 08:46:12'),
(32, 7, 17, 'Confirmed', '2024-05-22 08:46:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`BugID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `fk_shipping_items` (`Prouduct_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bug`
--
ALTER TABLE `bug`
  MODIFY `BugID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `fk_shipping_items` FOREIGN KEY (`Prouduct_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_items`
--
ALTER TABLE `users_items`
  ADD CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
