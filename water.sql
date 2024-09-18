-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 07:48 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_bill`
--

CREATE TABLE `customer_bill` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product` varchar(20) NOT NULL,
  `hsn_number` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `quantity` int(25) NOT NULL,
  `rate_total` int(20) NOT NULL,
  `gst` int(11) NOT NULL,
  `gst_total` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `pending_amount` int(10) NOT NULL,
  `dateb` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_bill`
--

INSERT INTO `customer_bill` (`id`, `customer_id`, `product`, `hsn_number`, `rate`, `quantity`, `rate_total`, `gst`, `gst_total`, `total`, `pending_amount`, `dateb`) VALUES
(1, 2, 'water', 2202, 40, 20, 800, 18, '144', 944, 0, '2021-12-13'),
(2, 2, 'water', 2202, 40, 30, 1200, 18, '216', 1416, 0, '2021-12-13'),
(3, 6, 'Water', 2202, 45, 5, 225, 18, '41', 266, 0, '2021-12-13'),
(4, 5, 'Water', 2202, 30, 5, 150, 18, '27', 177, 0, '2021-12-13'),
(5, 10, 'Water', 2202, 40, 17, 680, 18, '122', 802, 0, '2021-12-15'),
(6, 11, 'Water', 2202, 40, 17, 680, 18, '122', 802, 0, '2021-12-15'),
(7, 11, 'Water', 2202, 40, 17, 680, 18, '122.4', 802, 0, '2021-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gstno` varchar(20) NOT NULL,
  `product` varchar(20) NOT NULL,
  `rate` int(10) NOT NULL,
  `gst` int(11) NOT NULL,
  `s_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `name`, `mobile`, `address`, `gstno`, `product`, `rate`, `gst`, `s_date`) VALUES
(1, 'Shree Ganesh', '8974561230', 'at-ratandhale', 'lkiju876ty65', 'water', 40, 18, '0000-00-00'),
(2, 'amol Bhoir', '7775252025', 'at-vashind', 'hj76tygrfdertt', 'water', 40, 18, '0000-00-00'),
(3, 'ram', '', '', '', '', 0, 0, '0000-00-00'),
(4, 'ram', '7775989111', 'at ratandhle', 'jhuy765rte4', 'water', 40, 0, '0000-00-00'),
(5, 'anil', '7775989111', 'hygtfr cvfed ffg14 ffgg', '14kjiu8', 'Water', 30, 18, '0000-00-00'),
(6, 'ram mohan', '9226431020', 'Kambare', 'fgrt6543we', 'Water', 45, 18, '0000-00-00'),
(7, 'sa', '', '', '', 'Water', 0, 18, '0000-00-00'),
(8, 'bgf', '1236547890', 'bvgfh', 'nghr586hg7', 'Water', 20, 18, '0000-00-00'),
(9, 'swapnil Mahalunge', '7896201364', '123,gone nagar Shahapur', 'klio980765g7771u', 'Water', 40, 18, '0000-00-00'),
(10, 'A.B.Engineering', '9874563100', '145,oippp,65poiiii', '27bdqb0661j1zzh', 'Water', 40, 18, '0000-00-00'),
(11, 'Ahgyvhhg', '9563145778', 'fdgfghkjluiujljkljkljlklkjuiouyyutresdxc', 'dfd7654rdfg', 'Water', 40, 18, '0000-00-00'),
(12, 'manu', '9874562103', 'at jhaja hjhjas asla-akja=amakn', '27bdqb0661j1zzh', 'Water', 40, 18, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `customer_bill_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `pay_cost` int(10) NOT NULL,
  `pending_amount` int(10) NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_bill`
--
ALTER TABLE `customer_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_bill`
--
ALTER TABLE `customer_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
