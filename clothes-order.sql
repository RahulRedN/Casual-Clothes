-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 06:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(9, 'T-Shirts', 'Category-Tshirt.jpg', 'Yes', 'Yes'),
(10, 'Jeans', 'Category-Jeans.jpg', 'No', 'Yes'),
(11, 'Dresses', 'Category-Dress.jpg', 'Yes', 'Yes'),
(12, 'Jackets', 'Category-Jacket.jpg', 'No', 'Yes'),
(13, 'Shoes', 'Category-Shoes.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clothes`
--

CREATE TABLE `tbl_clothes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` enum('Yes','No') NOT NULL,
  `active` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clothes`
--

INSERT INTO `tbl_clothes` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Casual T-Shirt', 'Comfortable cotton t-shirt available in various colors.', 15.99, 'Clothes-Tshirt-001.jpg', 9, 'Yes', 'Yes'),
(2, 'Jeans', 'Stylish slim-fit jeans made from high-quality denim.', 49.99, 'Clothes-Jeans-002.jpg', 10, 'No', 'Yes'),
(3, 'Summer Dress', 'Lightweight summer dress with floral patterns.', 39.99, 'Clothes-Dress-003.jpg', 11, 'Yes', 'No'),
(4, 'Leather Jacket', 'Genuine leather jacket with a sleek design.', 99.99, 'Clothes-Jacket-004.jpg', 12, 'Yes', 'Yes'),
(5, 'Running Shoes', 'Breathable and durable running shoes for all terrains.', 69.99, 'Clothes-Shoes-005.jpg', 13, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `item`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Casual T-Shirt', 15.99, 2, 31.98, '2023-05-15 14:30:00', 'Completed', 'John Doe', '+1 (123) 456-7890', 'johndoe@example.com', '1234 Elm Street, Springfield, IL'),
(2, 'Jeans', 49.99, 1, 49.99, '2023-05-16 11:00:00', 'Pending', 'Jane Smith', '+1 (234) 567-8901', 'janesmith@example.com', '5678 Oak Avenue, Metropolis, NY'),
(3, 'Summer Dress', 39.99, 3, 119.97, '2023-05-17 09:45:00', 'Cancelled', 'Emily Johnson', '+1 (345) 678-9012', 'emilyjohnson@example.com', '91011 Pine Street, Gotham, NJ'),
(4, 'Leather Jacket', 99.99, 1, 99.99, '2023-05-18 16:20:00', 'Completed', 'Michael Brown', '+1 (456) 789-0123', 'michaelbrown@example.com', '1213 Maple Lane, Star City, CA'),
(5, 'Running Shoes', 69.99, 2, 139.98, '2023-05-19 12:00:00', 'Completed', 'Sarah Davis', '+1 (567) 890-1234', 'sarahdavis@example.com', '1415 Cedar Road, Central City, TX');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
