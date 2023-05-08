-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 10:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_310_final_project`
--
DROP DATABASE `cs_310_final_project`;

CREATE DATABASE IF NOT EXISTS `cs_310_final_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cs_310_final_project`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(12) NOT NULL COMMENT 'Account ID',
  `account_fname` varchar(100) NOT NULL COMMENT 'First Name',
  `account_lname` varchar(100) NOT NULL COMMENT 'Last Name',
  `account_email` varchar(100) NOT NULL COMMENT 'eMail Address',
  `account_password` varchar(255) NOT NULL COMMENT 'Password',
  `account_type` int(1) NOT NULL COMMENT '0 = admin, 1 = seller, 2 = buyer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- RELATIONSHIPS FOR TABLE `account`:
--

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_fname`, `account_lname`, `account_email`, `account_password`, `account_type`) VALUES
(1, 'Robbie', 'Root', 'rr@me.com', 'rr', 0),
(2, 'Bobby', 'Buyer', 'bb@me.com', 'bb', 2),
(3, 'Selena', 'Seller', 'ss@me.com', 'ss', 1),
(4, 'Ryan', 'Kafka', 'rkafka@tamu.edu', 'rjk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(12) NOT NULL,
  `addr_street_num` int(7) NOT NULL,
  `addr_street_name` varchar(50) NOT NULL,
  `addr_unit_type` varchar(20) DEFAULT NULL,
  `addr_unit_num` int(15) DEFAULT NULL,
  `addr_state` varchar(2) NOT NULL,
  `addr_zipcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `address`:
--

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `addr_street_num`, `addr_street_name`, `addr_unit_type`, `addr_unit_num`, `addr_state`, `addr_zipcode`) VALUES
(1, 333, 'Salt Street', 'APT.', 3, 'TX', 75093),
(2, 202, 'Bright Boulevard', 'APT.', 22, 'TN', 22222),
(3, 303, 'Sunny Streams', 'UNIT', 13, 'NY', 33013),
(4, 1520, 'Brophy Ave', NULL, NULL, 'IL', 60646),
(5, 907, 'Cross St', 'APT.', 817, 'TX', 77840),
(6, 23, 'Jordan Cir', NULL, NULL, 'IL', 24086),
(7, 922, 'Uni Dr', NULL, NULL, 'CA', 90837);

-- --------------------------------------------------------

--
-- Table structure for table `address_label`
--

CREATE TABLE `address_label` (
  `address_id` int(12) NOT NULL,
  `account_id` int(12) NOT NULL,
  `address_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `address_label`:
--   `address_id`
--       `address` -> `address_id`
--   `account_id`
--       `account` -> `account_id`
--

--
-- Dumping data for table `address_label`
--

INSERT INTO `address_label` (`address_id`, `account_id`, `address_title`) VALUES
(1, 3, 'Seller Home'),
(2, 2, 'Beef Lounge'),
(3, 3, 'Summer Stay'),
(4, 4, 'Family Home'),
(5, 4, 'UCentre'),
(6, 2, 'Ballers Court'),
(7, 1, 'Dorm');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(12) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `account_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `item`:
--   `account_id`
--       `account` -> `account_id`
--

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_title`, `item_price`, `item_desc`, `account_id`) VALUES
(1, 'SuperWorks Scissors', 2, 'A pair of scissors intended for cutting through paper and other thin sheets.', 3),
(2, 'test item 2', 45, 'fake item for testing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `order_id` int(12) NOT NULL,
  `item_id` int(12) NOT NULL,
  `item_quantity` int(12) NOT NULL,
  `list_price` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `item_list`:
--   `item_id`
--       `item` -> `item_id`
--   `order_id`
--       `orders` -> `order_id`
--

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`order_id`, `item_id`, `item_quantity`, `list_price`) VALUES
(2, 1, 6, 12),
(3, 1, 2, 4),
(4, 2, 2, 90);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(12) NOT NULL,
  `account_id` int(12) NOT NULL,
  `delivery_date` date NOT NULL,
  `address_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--   `account_id`
--       `account` -> `account_id`
--

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `account_id`, `delivery_date`, `address_id`) VALUES
(1, 3, '2023-05-10', 1),
(2, 2, '2023-05-22', 2),
(3, 4, '2023-05-18', 4),
(4, 4, '2023-05-09', 4),
(6, 3, '2023-06-01', 3),
(7, 2, '2023-08-09', 2),
(23, 4, '2023-05-30', 4),
(24, 2, '2025-06-14', 6),
(27, 4, '2023-05-25', 5),
(28, 2, '2023-05-30', 6),
(30, 2, '2023-05-30', 2),
(31, 2, '2023-05-30', 2),
(32, 2, '2023-05-30', 7),
(33, 2, '2023-05-30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(12) NOT NULL,
  `account_id` int(12) NOT NULL,
  `item_id` int(11) NOT NULL,
  `review_score` int(2) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `reviews`:
--   `account_id`
--       `account` -> `account_id`
--   `item_id`
--       `item` -> `item_id`
--

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `account_id`, `item_id`, `review_score`, `review_title`, `review_text`) VALUES
(1, 2, 1, 0, '', 'check it out'),
(2, 1, 1, 0, '', ''),
(3, 2, 2, 0, '', '2'),
(4, 2, 2, 0, '', 'This review has been deleted by the user.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `address_label`
--
ALTER TABLE `address_label`
  ADD PRIMARY KEY (`address_id`,`account_id`),
  ADD KEY `FK_AddressHolder` (`account_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `FK_Seller` (`account_id`);

--
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`order_id`,`item_id`),
  ADD KEY `FK_ItemBeingPurchased` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_orders_account` (`account_id`),
  ADD KEY `FK_orders_address_label` (`address_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK_ReviewBuyer` (`account_id`),
  ADD KEY `FK_ReviewItem` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_label`
--
ALTER TABLE `address_label`
  ADD CONSTRAINT `FK_AddressHeld` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `FK_AddressHolder` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_Seller` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `FK_ItemBeingPurchased` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `FK_OrderOfItem` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_ReviewBuyer` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `FK_ReviewItem` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
