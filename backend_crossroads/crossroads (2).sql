-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 08:26 AM
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
-- Database: `crossroads`
--
CREATE DATABASE IF NOT EXISTS `crossroads` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crossroads`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--
-- Creation: May 05, 2023 at 05:34 AM
-- Last update: May 05, 2023 at 05:59 AM
--

CREATE TABLE `account` (
  `account_id` int(12) NOT NULL COMMENT 'Account ID',
  `account_fname` varchar(100) NOT NULL,
  `account_lname` varchar(100) NOT NULL,
  `account_email` varchar(100) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `account_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_fname`, `account_lname`, `account_email`, `account_password`, `account_type`) VALUES
(1, 'Robbie', 'Root', 'rr@me.com', 'rr', 0),
(2, 'Bobby', 'Buyer', 'bb@me.com', 'bb', 1),
(3, 'Selena', 'Seller', 'ss@me.com', 'ss', 2),
(4, 'Ryan', 'Kafka', 'rkafka@tamu.edu', 'rjk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--
-- Creation: May 04, 2023 at 08:38 PM
-- Last update: May 04, 2023 at 10:26 PM
--

CREATE TABLE `address` (
  `address_id` int(12) NOT NULL,
  `addr_street_name` varchar(50) NOT NULL,
  `addr_unit_num` int(15) DEFAULT NULL,
  `addr_state` varchar(2) NOT NULL,
  `addr_zipcode` int(5) NOT NULL,
  `addr_street_num` int(7) NOT NULL,
  `addr_unit_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `addr_street_name`, `addr_unit_num`, `addr_state`, `addr_zipcode`, `addr_street_num`, `addr_unit_type`) VALUES
(1, 'Salt Street', 3, 'TX', 75093, 333, 'APT.');

-- --------------------------------------------------------

--
-- Table structure for table `address_label`
--
-- Creation: May 04, 2023 at 08:57 PM
-- Last update: May 04, 2023 at 10:27 PM
--

CREATE TABLE `address_label` (
  `address_id` int(12) NOT NULL,
  `account_id` int(12) NOT NULL,
  `address_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_label`
--

INSERT INTO `address_label` (`address_id`, `account_id`, `address_title`) VALUES
(1, 3, 'Seller Home');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--
-- Creation: May 04, 2023 at 08:54 PM
-- Last update: May 04, 2023 at 10:23 PM
--

CREATE TABLE `item` (
  `item_id` int(12) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `account_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_title`, `item_price`, `item_desc`, `account_id`) VALUES
(1, 'SuperWorks Scissors', 12, 'A pair of scissors intended for cutting through paper and other thin sheets.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--
-- Creation: May 04, 2023 at 09:18 PM
--

CREATE TABLE `item_list` (
  `order_id` int(12) NOT NULL,
  `item_id` int(12) NOT NULL,
  `item_quantity` int(12) NOT NULL,
  `list_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
-- Creation: May 04, 2023 at 08:48 PM
--

CREATE TABLE `orders` (
  `order_id` int(12) NOT NULL,
  `account_id` int(12) NOT NULL,
  `delivery_date` date NOT NULL,
  `address_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `account_id`, `delivery_date`, `address_id`) VALUES
(1, 3, '2023-05-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--
-- Creation: May 04, 2023 at 09:23 PM
--

CREATE TABLE `reviews` (
  `review_id` int(12) NOT NULL,
  `account_id_seller` int(12) NOT NULL,
  `account_id_buyer` int(12) NOT NULL,
  `item_id` int(11) NOT NULL,
  `review_score` int(2) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `address_id` (`address_id`);

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
  ADD KEY `FK_OrderBuyer` (`account_id`),
  ADD KEY `FK_OrderDeliveryAddress` (`address_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK_ReviewBuyer` (`account_id_buyer`),
  ADD KEY `FK_ReviewSeller` (`account_id_seller`),
  ADD KEY `FK_ReviewItem` (`item_id`);

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
  ADD CONSTRAINT `FK_OrderBuyer` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `FK_OrderDeliveryAddress` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_ReviewBuyer` FOREIGN KEY (`account_id_buyer`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `FK_ReviewItem` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `FK_ReviewSeller` FOREIGN KEY (`account_id_seller`) REFERENCES `account` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
