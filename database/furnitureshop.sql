-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 03:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnitureshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'gandhia11@yahoo.com', 'nisha12911');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `image`, `username`) VALUES
(1, 'Sofa', 'fshop/catimg/work flow.png', 'abhishekgandhi63@gmail.com'),
(2, 'Chair', 'fshop/catimg/Architecture 2.png', 'abhishekgandhi63@gmail.com'),
(3, 'Table', 'fshop/catimg/Architecture 2.png', 'abhishekgandhi63@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `pincode`) VALUES
(1, 'Nadiad', 789456),
(2, 'Ahmedabad', 758945);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city_id` int(10) NOT NULL,
  `pincode` int(10) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `date_registration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `address`, `city_id`, `pincode`, `phone_number`, `user_name`, `date_registration`) VALUES
(1, 'Nisha', '40', 1, 456123, 1234567891, 'nisha@gmail.com', '0'),
(2, 'Abhishek', '123', 1, 123456, 2147483647, 'abhishekgandhi63@gmail.com', '08-04-19 01:58:35am'),
(7, 'Naresh', '65', 1, 123456, 1234567891, 'n@gmail.com', '08-04-19 02:27:39am'),
(8, 'Ab', '22', 0, 123456, 1234567894, 'ab@gmail.com', '08-04-19 04:25:20am'),
(9, 'Ab', '22', 1, 123456, 1234567894, 'ab@gmail.com', '08-04-19 04:28:01am'),
(10, 'Sa', '12', 1, 123456, 1521521452, 'sa@gmail.com', '08-04-19 04:28:41am'),
(11, 'Sa', '12', 1, 123456, 1521521452, 'sa@gmail.com', '08-04-19 04:34:48am'),
(12, 'Nik', '45', 1, 445456, 1236541234, 'n@gmail.com', '08-04-19 04:35:38am'),
(13, 'Nik', '12', 1, 125463, 1231231231, 'nik@gmail.com', '08-04-19 04:36:55am'),
(14, 'Nik', '12', 1, 125463, 1231231231, 'nik@gmail.com', '08-04-19 04:38:03am');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_shop`
--

CREATE TABLE `furniture_shop` (
  `f_id` int(10) NOT NULL,
  `shop_name` varchar(70) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city_id` int(10) NOT NULL,
  `pincode` int(10) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `registration_date` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture_shop`
--

INSERT INTO `furniture_shop` (`f_id`, `shop_name`, `address`, `city_id`, `pincode`, `phone_number`, `registration_date`, `user_name`, `user_password`) VALUES
(2, 'Nisha Furniture shop', 'jjshuvgsdhvuh', 1, 456789, 789546123, '0', 'abhishekgandhi63@gmail.com', 'nisha12911'),
(3, 'Abc Furniture Shop', '20,jcbxcvxjcj', 2, 145632, 1234567890, '0', 'abhishek1125', 'nisha12911'),
(4, 'Nish Furniture shop', 'jjshuvgsdhvuh', 2, 456789, 789546123, '0', 'abhi', 'nisha12911'),
(5, 'Nikunj Furniture Shop', '40', 1, 0, 0, '10-04-19 12:03:48am', 'nikunj', 'nik123'),
(6, 'Nikunj Furniture Shop', '40', 1, 123456, 1234567891, '10-04-19 12:04:20am', 'nikunj', 'nik123');

-- --------------------------------------------------------

--
-- Table structure for table `main_item`
--

CREATE TABLE `main_item` (
  `item_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_item`
--

INSERT INTO `main_item` (`item_id`, `cat_id`, `item_name`, `price`, `qty`, `image`, `username`) VALUES
(1, 1, 'Single', 1200, 12, 'fshop/itemimg/Architecture 2.png', 'abhishekgandhi63@gmail.com'),
(2, 3, 'Dining', 15000, 13, 'fshop/itemimg/work flow.png', 'abhishekgandhi63@gmail.com'),
(3, 2, 'Dining', 140, 6, 'fshop/itemimg/Architecture Asset Tracking.png', 'abhishekgandhi63@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) NOT NULL,
  `f_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `itemid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `f_id`, `price`, `qty`, `cat_id`, `c_id`, `total_price`, `itemid`) VALUES
(1, 0, 0, 0, 2, 0, 0, 3),
(2, 0, 140, 0, 2, 2, 0, 3),
(3, 0, 140, 2, 2, 10, 280, 3),
(4, 2, 140, 2, 2, 13, 280, 3),
(5, 2, 140, 2, 2, 2, 280, 3),
(6, 2, 140, 1, 2, 2, 140, 3),
(7, 2, 140, 1, 2, 2, 140, 3),
(8, 2, 140, 2, 2, 2, 280, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `furniture_shop`
--
ALTER TABLE `furniture_shop`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `main_item`
--
ALTER TABLE `main_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `furniture_shop`
--
ALTER TABLE `furniture_shop`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `main_item`
--
ALTER TABLE `main_item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
