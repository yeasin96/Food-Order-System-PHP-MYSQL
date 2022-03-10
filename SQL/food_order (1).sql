-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 04:30 PM
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
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullname`, `username`, `password`) VALUES
(16, 'yeasin Rahman', 'rahman5', '9e2764e7bde9fd0673af6c54e84479ea'),
(17, 'yeasin', 'yeasin', 'd2f2297d6e829cd3493aa7de4416a18f'),
(18, 'rahman', 'rahman', 'd2f2297d6e829cd3493aa7de4416a18f'),
(20, 'yeasin', 'yeasin', '6424e342645d1b22fe5fb7ea83aba23f'),
(21, 'yeasin', 'admin', 'admin'),
(22, 'yeasin', 'admin', 'admin'),
(23, 'yeasin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagori`
--

CREATE TABLE `tbl_catagori` (
  `id` int(10) UNSIGNED NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_catagori`
--

INSERT INTO `tbl_catagori` (`id`, `tittle`, `image_name`, `featured`, `active`) VALUES
(13, 'Burger', 'food_cat310.jpg', 'yes', 'yes'),
(14, 'MoMo', 'food_cat850.jpg', 'yes', 'yes'),
(15, 'Pizza', 'food_cat893.jpg', 'yes', 'yes'),
(16, 'Menu Burger', 'food_cat201.jpg', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `tittle`, `image_name`, `featured`, `active`, `cat_id`, `price`, `description`) VALUES
(28, 'Burger', 'food_cat537.jpg', 'Yes', 'Yes', 13, '9.00', '  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, sit. Molestiae, odio at? Sed accusantium, vitae unde ducimus nemo assumenda.'),
(29, 'Pizza', 'food_cat523.jpg', 'Yes', 'Yes', 15, '10.00', '  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, sit. Molestiae, odio at? Sed accusantium, vitae unde ducimus nemo assumenda.'),
(30, 'Momo', 'food_cat324.jpg', 'no', 'no', 14, '5.00', '  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, sit. Molestiae, odio at? Sed accusantium, vitae unde ducimus nemo assumenda.'),
(31, 'Menu Burger', 'food_cat317.jpg', 'No', 'Yes', 13, '7.00', ' lorem20lorem lorem20 lorem20 lorem20 lorem20 lorem20 lorem20lorem20 lorem20lorem20 lorem20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `food` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `custmer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(155) NOT NULL,
  `customer_adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `price`, `food`, `qty`, `total`, `order_date`, `status`, `custmer_name`, `customer_contact`, `customer_email`, `customer_adress`) VALUES
(1, '10.00', 'Pizza', 2, '20.00', '2022-02-21 03:59:39', 'ordered', 'yeas', '0193333', 'yeasinrahman96@gmail.com', ''),
(2, '9.00', 'Burger', 2, '18.00', '2022-02-21 04:03:56', 'ordered', 'yeas', '0193333', 'yeasinrahman96@gmail.com', 'uyrr'),
(3, '10.00', 'Pizza', 4, '40.00', '2022-02-21 04:05:51', 'ordered', 'yeas', '0193333', 'yeasinrahman96@gmail.com', 'uuuuuuuuuuu'),
(4, '9.00', 'Burger', 2, '18.00', '2022-02-21 04:09:37', 'ordered', 'yeas', '0193333', 'yeasinrahman96@gmail.com', 'uuu'),
(5, '9.00', 'Burger', 11, '99.00', '2022-02-21 04:11:16', 'ordered', 'yeas', '0193333', 'yeasinrahman96@gmail.com', 'yyyyyyyyyyy'),
(6, '9.00', 'Burger', 2, '18.00', '2022-02-21 04:12:16', 'ordered', 'yeas', '0193333', 'yeasinrahman96@gmail.com', 'uuuuuuuu'),
(7, '9.00', 'Burger', 1, '9.00', '2022-02-21 04:16:35', 'confirmed', 'yeas', '0193333', 'yeasinrahman96@gmail.com', 'ttt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_catagori`
--
ALTER TABLE `tbl_catagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_catagori`
--
ALTER TABLE `tbl_catagori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
