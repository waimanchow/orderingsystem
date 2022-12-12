-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 08:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) UNSIGNED NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(21, 'WaiMan', 'Chow', 'waiman12008@yahoo.com.hk', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `food_id` int(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `invoice_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `food_id`, `food_name`, `qty`, `id`, `invoice_id`) VALUES
(189, 10, 'Fired Chicken', 1, 21, 61),
(190, 19, 'Spicy Tonkotsu Ramen', 2, 21, 61),
(191, 23, 'Egg', 1, 21, 61);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Appetizers'),
(2, 'Ramen'),
(3, 'Sushi'),
(4, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(100) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `product_name`, `description`, `price`, `image_name`, `category_id`) VALUES
(2, 'Dumpling', 'Japanese Style Dumpling', '7.00', 'A-dumping.jpg', 1),
(10, 'Fired Chicken', 'Crispy Fired Chicken', '11.00', 'A-firedchicken.jpg', 1),
(11, 'Okonomiyaki', 'Pancake with seafood', '18.00', 'A-okonomiyaki.jpg', 1),
(12, 'Salad', 'Healthy salad', '7.00', 'A-salad.jpg', 1),
(13, 'Takoyaki', 'Ball-shaped snack', '11.00', 'A-takoyaki.jpg', 1),
(14, 'Tempura', 'Fired Shrimp', '8.00', 'A-tempura.jpg', 1),
(15, 'Coke', 'Coca-Cola', '2.00', 'D-coca-cola.png', 4),
(16, 'Fanta', 'Orange drink', '2.00', 'D-fanta_orange.png', 4),
(17, 'Sprite', 'Sprite', '2.00', 'D-sprite.png', 4),
(18, 'Tonkotsu Ramen', '**************', '18.00', 'ramen1.jpg', 2),
(19, 'Spicy Tonkotsu Ramen', '**************', '19.00', 'ramen2.jpg', 2),
(20, 'Seafood Ramen', '**************', '21.00', 'ramen3.jpg', 2),
(21, 'Special Ramen', '**************', '23.00', 'ramen4.jpg', 2),
(22, 'Chicken Ramen', '**************', '18.00', 'ramen5.jpg', 2),
(23, 'Egg', 'sushi', '1.00', 'S-egg.png', 3),
(25, 'Grilled Eel', 'sushi', '2.00', 'S-grilled_eel.png', 3),
(26, 'Salmon', 'sushi', '2.00', 'S-salmon.png', 3),
(27, 'Sashimi', 'Salmon,shrimp, and tuna', '23.00', 'S-sashimi.jpg', 3),
(28, 'Shrimp', 'sushi', '1.00', 'S-shrimp.png', 3),
(29, 'Cheese Cake', 'baked cheese cake', '12.00', 'A-cheesecake.webp', 1),
(30, 'Fired Crab', '2 pieces of Fired Crab', '6.00', 'A-crab.jpeg', 1),
(31, 'Otokoyama ', 'Sake', '23.00', 'D-Otokoyama.jpg', 4),
(32, 'Egg Udon', 'thick noodle with egg', '15.00', 'ramen6.jpg', 2),
(33, 'Beer', 'Alcohol', '7.00', 'D-beer.png', 4),
(34, 'Corn', 'corn, mayonnaise', '1.00', 'S-corn.png', 3),
(35, 'Crab', 'fake crab', '1.00', 'S-crab.png', 3),
(36, 'Smoke salmon', 'smoke salmon with cheese', '1.00', 'S-smokesalmon.png', 3),
(37, 'Green Tea Latte', 'Milk with Matcha', '7.00', 'D-greentea.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(255) NOT NULL,
  `total` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `total`, `date`, `time`, `id`) VALUES
(61, 50.00, '2022-12-12', '13:50:35', 21);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cardname` varchar(100) NOT NULL,
  `cardnum` int(20) NOT NULL,
  `expmth` int(11) NOT NULL,
  `expyear` int(11) NOT NULL,
  `cvc` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cardname`, `cardnum`, `expmth`, `expyear`, `cvc`, `id`, `invoice_id`) VALUES
(33, 'Waiman Chow', 12345678, 1, 2021, 123, 21, 61);

-- --------------------------------------------------------

--
-- Table structure for table `saveforlater`
--

CREATE TABLE `saveforlater` (
  `saveid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `saveforlater`
--
ALTER TABLE `saveforlater`
  ADD PRIMARY KEY (`saveid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `saveforlater`
--
ALTER TABLE `saveforlater`
  MODIFY `saveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
