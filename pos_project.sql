-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 07:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(20) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_address`, `admin_password`) VALUES
(1, 'admin', '02349234', 'admin@gmail.com', 'address_admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `operator_id` int(20) NOT NULL,
  `operator_name` varchar(255) NOT NULL,
  `operator_phone` varchar(20) NOT NULL,
  `operator_email` varchar(255) NOT NULL,
  `operator_address` varchar(255) NOT NULL,
  `operator_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`operator_id`, `operator_name`, `operator_phone`, `operator_email`, `operator_address`, `operator_password`) VALUES
(1, 'fahim', '017730313456', 'fahim@gmail.com', 'address_opt', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'samia', '354673567', 'samia@gmail.com', 'ssdd', '25f9e794323b453885f5181f1b624d0b'),
(3, 'Afridi2222', '0145366', 'mia@gmail.com', 'hjuglph', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'aabbcc', '1234567890', 'aabbcc@gmail.com', 'asdf', '71b3b26aaa319e0cdf6fdb8429c112b0');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_qyt` int(20) NOT NULL,
  `order_date` date NOT NULL,
  `products_id` int(11) NOT NULL,
  `pinv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `products_cost` int(20) NOT NULL,
  `products_price` int(20) NOT NULL,
  `products_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `brand_name`, `products_cost`, `products_price`, `products_details`) VALUES
(1, 'Fountain Pen', 'parker', 1600, 1800, 'Good one '),
(2, 'Mug', 'RFL', 350, 500, 'Durable'),
(3, 'chair', 'bangle', 1600, 2000, 'strong'),
(4, 'biscute', 'sss', 40, 50, 'sdfhgsdfh');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_qyt` int(20) NOT NULL,
  `purchase_date` date NOT NULL,
  `operator_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `pinv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_qyt`, `purchase_date`, `operator_id`, `products_id`, `sup_id`, `pinv_id`) VALUES
(1, 600, '2021-09-03', 1, 1, 1, 1),
(2, 1000, '2021-09-02', 1, 2, 1, 2),
(3, 500, '2021-09-03', 1, 4, 2, 1),
(7, 999, '2021-09-05', NULL, 3, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE `purchase_invoice` (
  `pinv_id` int(20) NOT NULL,
  `pinv_no` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_invoice`
--

INSERT INTO `purchase_invoice` (`pinv_id`, `pinv_no`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplires`
--

CREATE TABLE `supplires` (
  `sup_id` int(20) NOT NULL,
  `sup_name` varchar(255) NOT NULL,
  `sup_phn` int(20) NOT NULL,
  `sup_email` varchar(255) NOT NULL,
  `sup_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplires`
--

INSERT INTO `supplires` (`sup_id`, `sup_name`, `sup_phn`, `sup_email`, `sup_address`) VALUES
(1, 'sup1', 23452345, 'sup1@gmail.com', 'address_sup1'),
(2, 'fahim', 3243423, 'fahim@gmail.com', 'dfmdfgm'),
(3, 'asdfas', 1234567890, 'aabbcc@gmail.com', 'asdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `operator_id` (`operator_id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `pinv_id` (`pinv_id`);

--
-- Indexes for table `purchase_invoice`
--
ALTER TABLE `purchase_invoice`
  ADD PRIMARY KEY (`pinv_id`);

--
-- Indexes for table `supplires`
--
ALTER TABLE `supplires`
  ADD PRIMARY KEY (`sup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `operator_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_invoice`
--
ALTER TABLE `purchase_invoice`
  MODIFY `pinv_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplires`
--
ALTER TABLE `supplires`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pC_idsdfg`) REFERENCES `products_category` (`pC_id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`operator_id`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`),
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`sup_id`) REFERENCES `supplires` (`sup_id`),
  ADD CONSTRAINT `purchase_ibfk_4` FOREIGN KEY (`pinv_id`) REFERENCES `purchase_invoice` (`pinv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
