-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 03:19 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos_lict_batch4_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(55) NOT NULL,
  `c_dis` text NOT NULL,
  `c_slug` varchar(55) NOT NULL,
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `c_name`, `c_dis`, `c_slug`, `c_date`) VALUES
(1, 'Tv', 'Tv', 'Tv', '2017-11-17 00:00:00'),
(2, 'Smart Phone', 'Smart Phone', 'Smart Phone', '1970-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_code` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `customer_code`, `customer_name`, `customer_address`, `country`, `customer_email`, `customer_image`, `status`, `created_at`, `updated_at`) VALUES
(3, 1002, 'Imran', 'Dhaka', 'usa', 'md.imran@mail.com', 'upload/dc7f3a2c93.png', 1, '2017-11-07 17:51:37', '2017-11-07 17:51:37'),
(4, 1003, 'Saim', 'India', 'en', 'salim@yahoo.com', 'upload/7c0d8b8ffc.png', 1, '2017-11-07 17:52:59', '2017-11-07 17:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parmanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `employee_name`, `email`, `father_name`, `mother_name`, `present_address`, `parmanent_address`, `designation`, `department`, `mobile_number`, `joining_date`, `created_at`, `updated_at`) VALUES
(7, 'IMRAN', 'md.imran100@yahoo.com', 'Murad Ahmed', 'Halima Khatun', 'Dhaka', 'Rangpur', 'Hr', 'It', 454545, '2017-11-23 00:00:00', NULL, NULL),
(20, 'Imran', 'admin@gmail.com', 'abc', 'ABC', 'DHAKA', 'DDD', 'ddd', 'hr', 125445, '2017-11-09 14:32:46', '2017-11-09 08:31:10', '2017-11-09 08:31:10'),
(21, 'Rayhan Islam', 'abc@yahoo.com', 'Rayhan Ahmed', 'Hurram', 'Dhaka', 'Rangpur', 'Managing Director', 'HR', 4454899, '1970-01-01 00:00:00', '2017-11-09 09:00:04', '2017-11-09 09:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gift`
--

CREATE TABLE `tbl_gift` (
  `id` int(11) NOT NULL,
  `card_no` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `card_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gift`
--

INSERT INTO `tbl_gift` (`id`, `card_no`, `value`, `card_date`) VALUES
(1, 303045, '4598', '1970-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_code` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_dis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_order_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_code`, `product_name`, `product_dis`, `product_image`, `product_price`, `product_order_level`, `product_status`, `created_at`, `updated_at`) VALUES
(3, 1003, 'Walton Tv', 'Walton Tv', 'upload/fe8bbb7fba.jpg', '25000', '30', 1, '2017-11-08 10:55:56', '2017-11-08 10:55:56'),
(2, 1005, 'Galaxy7', 'Galaxy7 Samuns Product', 'upload/7e658be733.jpg', '700', '800', 1, NULL, NULL),
(4, 1009, 'Computer', 'Computer Core i7 1446', 'upload/dfef8d5a84.jpg', '8000', '90', 1, '2017-11-10 12:45:08', '2017-11-10 12:45:08'),
(5, 1101, 'tv', 'tv', 'upload/d05203ac42.png', '150', '50', 1, '2017-11-11 03:21:40', '2017-11-11 03:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `p_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `purchase_price_unit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id`, `purchase_no`, `product_id`, `supplier_id`, `purchase_qty`, `p_date`, `purchase_price_unit`, `created_at`, `updated_at`) VALUES
(1, 1002, 1, 2, 15, '2017-11-08 13:42:35', 15, '2017-11-09 18:00:00', NULL),
(2, 1003, 1, 1, 15, '2017-11-08 13:42:35', 1500, '2017-11-09 18:00:00', NULL),
(3, 1002, 2, 4, 15, '2017-11-18 00:00:00', 15, NULL, NULL),
(4, 1005, 2, 2, 100, '2017-11-30 00:00:00', 700, NULL, NULL),
(5, 10045, 5, 4, 50, '2017-11-16 00:00:00', 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_no` int(11) NOT NULL,
  `sale_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `sale_no`, `sale_qty`, `sale_unit_price`, `product_id`, `customer_id`, `sale_note`, `sale_date`, `created_at`, `updated_at`) VALUES
(1, 1002, '50', '50', 1, 1, 'Note', '2017-11-03 00:00:00', NULL, NULL),
(2, 1003, '10', '15', 1, 1, 'Text', '2017-11-25 00:00:00', NULL, NULL),
(3, 1009, '78', '456', 3, 4, 'Walton Tv', '2017-12-28 00:00:00', NULL, NULL),
(4, 1008, '50', '60', 4, 3, 'Computer Desktop', '2017-11-10 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_code` int(11) NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` int(11) NOT NULL,
  `supplier_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`id`, `supplier_code`, `supplier_name`, `supplier_address`, `supplier_contact_person`, `supplier_phone`, `supplier_status`, `created_at`, `updated_at`) VALUES
(1, 1002, 'imran', 'dhaka', 'imran', 4002, '1', NULL, NULL),
(2, 1003, 'Walton BD', 'India', 'Rayhan', 4004, '1', NULL, NULL),
(3, 1004, 'Imran', 'Dhaka', 'Imran', 1456798, '1', '2017-11-08 06:18:10', '2017-11-08 06:18:10'),
(4, 1005, 'Ashrafullah', 'Chittagong', 'Ashraf', 44578798, '1', '2017-11-08 06:33:12', '2017-11-08 06:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `urole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `cell`, `address`, `urole`, `image`, `created_at`, `updated_at`) VALUES
(1, 'imran789', 'md.imran100@yahoo.com', '$2y$10$DUullyvjIK.4fDqp0ev/muu/N4mTU3j71mIcIm9tzeHqD7iGA2bUC', 4548795, 'Dhanmondi', '2', NULL, '2017-10-31 12:35:09', '2017-10-31 12:35:09'),
(2, 'Rayhan Islam', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4548795, 'Dhaka', 'Select User Level', NULL, NULL, NULL),
(3, 'rayhan', 'rayhan@yahoo.com', '123456', 4548795, 'Dhanmondi', 'Select User Level', 'upload/c8b7e5edbe.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gift`
--
ALTER TABLE `tbl_gift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_gift`
--
ALTER TABLE `tbl_gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
