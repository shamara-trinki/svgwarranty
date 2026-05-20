-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2026 at 04:29 PM
-- Server version: 8.0.45-cll-lve
-- PHP Version: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svglk1_warranty`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `cus_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile_no` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cus_name`, `address_line1`, `address_line2`, `mobile_no`) VALUES
(1, 'Jeewn', 'no 345e', 'Colombo 10', 752365589),
(2, 'dr', 'ew', 'ew', 706363639),
(3, 'sdg', '4', 'tru', 2147483647),
(4, 'fdgfd', 'treye', 'eye', 708989890),
(5, 'wyw', 'eye', 'reueu', 789999999),
(6, 'abc', 'no 345', 'Colombo 10', 708989890);

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `id` int NOT NULL,
  `dealer_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id`, `dealer_name`) VALUES
(1, 'ABC'),
(2, 'Green Space'),
(3, 'h'),
(4, 'h'),
(5, 'rty'),
(6, 'Nihan'),
(7, 'da'),
(8, 'rt');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`) VALUES
(1, 'qer'),
(2, 'dd'),
(3, 'hh'),
(4, 'Ginger'),
(5, 'Milk'),
(6, 'jk'),
(7, 'bnm'),
(8, 'ii'),
(9, 'll'),
(10, 'yy'),
(11, 'oo'),
(12, 'mm'),
(13, 'tyy'),
(14, 'ol'),
(15, 'uiouio'),
(16, 'tt'),
(17, 'mmm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$69VZok9bNEb2xkgtW6Y5ieVprzLbleYfjCC.FtoIoYpsmpZ3mFxey');

-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `id` int NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_id` int NOT NULL,
  `item_id` int NOT NULL,
  `warranty_period` int NOT NULL,
  `warranty_expiry_date` date NOT NULL,
  `qty` int NOT NULL,
  `warranty_for` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dealer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warranty`
--

INSERT INTO `warranty` (`id`, `invoice_no`, `invoice_date`, `customer_id`, `item_id`, `warranty_period`, `warranty_expiry_date`, `qty`, `warranty_for`, `dealer_id`) VALUES
(7, 'dsfeeesss', '2025-09-17', 3, 1, 2, '2027-09-17', 1, 'TANK', 2),
(8, '436363', '2025-09-24', 4, 1, 5, '2027-09-24', 1, 'HEATING', 1),
(9, 'rt', '2025-09-24', 4, 1, 0, '2027-09-24', 1, '', 1),
(10, '67969', '2025-09-12', 2, 2, 5, '2025-09-20', 1, 'HEATING', 3),
(11, '110', '2025-09-17', 1, 1, 5, '2030-09-17', 1, 'TANK', 2),
(12, '567', '2025-09-17', 4, 2, 2, '2027-09-17', 3, 'TANK', 1),
(13, '234', '2025-09-19', 4, 1, 2, '2027-09-19', 1, 'TANK', 3),
(14, '002', '2025-09-19', 5, 1, 2, '2027-09-19', 1, 'TANK', 4),
(15, 'reye', '2025-09-19', 4, 1, 2, '2027-09-19', 1, 'TANK', 2);

-- --------------------------------------------------------

--
-- Table structure for table `warranty_serials`
--

CREATE TABLE `warranty_serials` (
  `id` int NOT NULL,
  `warranty_id` int NOT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warranty_serials`
--

INSERT INTO `warranty_serials` (`id`, `warranty_id`, `serial_no`) VALUES
(3, 10, '6796'),
(7, 12, 'rr'),
(8, 12, 'yty'),
(9, 12, 'uu'),
(11, 9, '555'),
(12, 8, '44'),
(13, 7, '77'),
(14, 11, 'safg'),
(24, 14, 'kl'),
(25, 14, 'mn'),
(26, 14, '0001'),
(27, 14, '633'),
(29, 13, '673'),
(32, 15, 'dsfdd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `warranty_serials`
--
ALTER TABLE `warranty_serials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warranty_id` (`warranty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warranty`
--
ALTER TABLE `warranty`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `warranty_serials`
--
ALTER TABLE `warranty_serials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
