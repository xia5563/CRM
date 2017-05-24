-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2017 at 12:34 PM
-- Server version: 5.7.18-log
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_phone` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `py_enquiry_date` date DEFAULT NULL,
  `pte_enquiry_date` date DEFAULT NULL,
  `rpl_enquiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_name`, `email`, `mobile_phone`, `py_enquiry_date`, `pte_enquiry_date`, `rpl_enquiry_date`) VALUES
('john snow', 'john@example.com', '123456789', '2017-05-01', '2017-05-01', '2017-05-01'),
('johnson brown', 'johnson@mail.com', '00123456789', '2017-03-01', '2017-03-01', '2017-03-01'),
('joy', 'joy@mail.com', '987456321', '2017-02-01', '2017-02-01', '2017-02-01'),
('Pearl', 'pearl@mail.com', '8796363699', '2017-01-01', '2017-01-01', '2017-01-01'),
('peter', 'peter@example.com', '123456789', '2017-05-16', '2017-05-16', '2017-05-16'),
('peterson', 'peterson@mail.com', '8521364789', '2017-01-01', '2017-01-01', '2017-01-01'),
('smith', 'smith@example.com', '123456789', '2017-04-01', '2017-04-01', '2017-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `username` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_privilege` varchar(125) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`username`, `password`, `email`, `employee_privilege`) VALUES
('a', 'a', '', 'a'),
('admin', 'bseducation', 'admin@bseducation.com', 'admin'),
('b', 'b', '', 'b'),
('test', 'test', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_name`,`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
