-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2020 at 11:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopisop`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`cart_id`, `user_id`, `food_id`, `quantity`) VALUES
(56, 1, 9, 1),
(57, 1, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`category_id`, `category_name`) VALUES
(1, 'hot coffee'),
(2, 'iced coffee'),
(3, 'non coffee'),
(4, 'snack');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`user_id`, `name`, `email`, `password`, `token`, `verified`, `address`, `phone`, `role`) VALUES
(1, 'sample anonymous', 'sampleanonymous@gmail.com', '$2y$10$5pyBG1pxeAYpKG5LrwCa7u8x8Y2NFZ8qvYvqQbhyQ1/0fv8fMfibq', '6abd9091e40803bee61faa5d4146b90ed26099945cd842cf4469891c41304a39e1a6b1ec0d0605c624da3114daf310a1b7b9', 1, 'jalan bundaran No.12', '0812345678890', 0),
(4, 'admin', 'admin@admin.com', '$2y$10$cWFLQqJBvw5oDbTZeAUONOsKgWRzezGxjk/BFxoYmN6Oe/sBoISCe', '6abd9091e40803bee61faa5d4146b90ed26099945cd842cf4469891c41304a39e1a6b1ec0d0605c624da3114daf310a1b7b9', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Food`
--

CREATE TABLE `Food` (
  `food_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `category_id` int(255) NOT NULL,
  `food_pic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Food`
--

INSERT INTO `Food` (`food_id`, `name`, `price`, `category_id`, `food_pic`) VALUES
(7, 'Milky Blue ', 21000, 2, '../controller/Images/Milky Blue.jpg'),
(8, 'French Fries', 17000, 4, '../controller/Images/French Fries.png'),
(9, 'Toast', 24000, 3, '../controller/Images/Toast.jpg'),
(10, 'Iced Matcha Latte', 20000, 2, '../controller/Images/Iced Matcha Latte.jpg'),
(11, 'Sunset Sky', 20000, 2, '../controller/Images/Sunset Sky.jpg'),
(12, 'Strawberry Shortcake', 24000, 3, '../controller/Images/Strawberry Shortcake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `OrderItem`
--

CREATE TABLE `OrderItem` (
  `orderItem_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `OrderItem`
--

INSERT INTO `OrderItem` (`orderItem_id`, `order_id`, `food_id`, `quantity`, `price`, `total`) VALUES
(3, 3, 7, 1, 21000, 21000),
(4, 4, 8, 4, 17000, 68000),
(5, 4, 9, 1, 24000, 24000),
(6, 4, 7, 1, 21000, 21000),
(7, 5, 8, 2, 17000, 34000),
(8, 5, 7, 2, 21000, 42000),
(17, 10, 7, 2, 21000, 42000),
(18, 10, 8, 1, 17000, 17000),
(19, 11, 8, 2, 17000, 34000),
(20, 11, 12, 2, 24000, 48000),
(21, 11, 9, 2, 24000, 48000),
(22, 12, 9, 1, 24000, 24000),
(23, 12, 8, 1, 17000, 17000),
(24, 12, 7, 1, 21000, 21000),
(25, 13, 7, 1, 21000, 21000),
(26, 13, 11, 4, 20000, 80000),
(27, 13, 9, 1, 24000, 24000),
(28, 14, 7, 1, 21000, 21000),
(29, 14, 8, 1, 17000, 17000),
(30, 14, 9, 1, 24000, 24000),
(31, 15, 7, 1, 21000, 21000),
(32, 15, 8, 1, 17000, 17000),
(33, 15, 11, 1, 20000, 20000),
(37, 17, 7, 1, 21000, 21000),
(38, 17, 8, 1, 17000, 17000),
(39, 17, 9, 1, 24000, 24000),
(40, 18, 7, 1, 21000, 21000),
(41, 18, 8, 1, 17000, 17000),
(42, 18, 9, 1, 24000, 24000),
(43, 19, 7, 1, 21000, 21000),
(44, 19, 8, 1, 17000, 17000),
(45, 19, 9, 1, 24000, 24000),
(46, 20, 7, 1, 21000, 21000),
(47, 20, 11, 1, 20000, 20000),
(48, 20, 9, 1, 24000, 24000),
(49, 21, 7, 1, 21000, 21000),
(50, 21, 8, 1, 17000, 17000),
(51, 21, 9, 1, 24000, 24000),
(52, 24, 7, 1, 21000, 21000),
(53, 24, 8, 1, 17000, 17000),
(54, 24, 9, 1, 24000, 24000),
(55, 25, 7, 1, 21000, 21000),
(56, 25, 8, 1, 17000, 17000),
(57, 25, 9, 1, 24000, 24000),
(58, 26, 7, 2, 21000, 42000),
(59, 26, 8, 2, 17000, 34000),
(60, 26, 9, 2, 24000, 48000),
(61, 27, 7, 2, 21000, 42000),
(62, 27, 8, 3, 17000, 51000),
(63, 27, 9, 2, 24000, 48000),
(64, 28, 7, 1, 21000, 21000),
(65, 28, 8, 1, 17000, 17000),
(66, 28, 9, 1, 24000, 24000),
(67, 29, 7, 1, 21000, 21000),
(68, 29, 8, 1, 17000, 17000),
(69, 29, 9, 1, 24000, 24000),
(70, 30, 7, 1, 21000, 21000),
(71, 30, 8, 1, 17000, 17000),
(72, 30, 9, 1, 24000, 24000),
(73, 31, 12, 5, 24000, 120000),
(74, 31, 8, 3, 17000, 51000);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `tax` int(255) NOT NULL,
  `shipping` int(11) NOT NULL,
  `subtotal` int(250) NOT NULL,
  `total` int(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `cust_id`, `tax`, `shipping`, `subtotal`, `total`, `date`) VALUES
(3, 1, 2100, 10000, 21000, 33100, '2020-11-10'),
(4, 1, 11300, 10000, 113000, 134300, '2020-11-10'),
(5, 1, 7600, 10000, 76000, 93600, '2020-11-10'),
(10, 1, 5900, 10000, 59000, 74900, '2020-11-11'),
(11, 1, 13000, 10000, 130000, 153000, '2020-11-11'),
(12, 1, 6200, 10000, 62000, 78200, '2020-11-19'),
(13, 1, 12500, 10000, 125000, 147500, '2020-10-20'),
(14, 1, 6200, 10000, 62000, 78200, '2020-10-20'),
(15, 1, 5800, 10000, 58000, 73800, '2020-08-19'),
(17, 1, 6200, 10000, 62000, 78200, '2020-08-22'),
(18, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(19, 1, 6200, 10000, 62000, 78200, '2020-02-05'),
(20, 1, 6500, 10000, 65000, 81500, '2020-05-27'),
(21, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(22, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(23, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(24, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(25, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(26, 1, 12400, 10000, 124000, 146400, '2020-12-14'),
(27, 1, 14100, 10000, 141000, 165100, '2020-12-14'),
(28, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(29, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(30, 1, 6200, 10000, 62000, 78200, '2020-12-14'),
(31, 1, 17100, 10000, 171000, 198100, '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `shipping` int(11) NOT NULL,
  `tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`shipping`, `tax`) VALUES
(12000, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FKCart_PKFood` (`food_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `Food`
--
ALTER TABLE `Food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `FKFood_PKCategory` (`category_id`);

--
-- Indexes for table `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD PRIMARY KEY (`orderItem_id`),
  ADD KEY `FKOrderItem_PKFood` (`food_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Food`
--
ALTER TABLE `Food`
  MODIFY `food_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `OrderItem`
--
ALTER TABLE `OrderItem`
  MODIFY `orderItem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Customer` (`user_id`),
  ADD CONSTRAINT `FKCart_PKFood` FOREIGN KEY (`food_id`) REFERENCES `Food` (`food_id`);

--
-- Constraints for table `Food`
--
ALTER TABLE `Food`
  ADD CONSTRAINT `FKFood_PKCategory` FOREIGN KEY (`category_id`) REFERENCES `Category` (`category_id`);

--
-- Constraints for table `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD CONSTRAINT `FKOrderItem_PKFood` FOREIGN KEY (`food_id`) REFERENCES `Food` (`food_id`),
  ADD CONSTRAINT `OrderItem_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `Customer` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
