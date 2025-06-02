-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2025 at 11:52 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
CREATE TABLE IF NOT EXISTS `collection` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'saba tahsildar', 'sabatahsildar616@gmail.com', 'jhgus', '2025-05-15 07:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `note` varchar(500) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_name` (`customer_name`),
  UNIQUE KEY `customer_name_2` (`customer_name`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `prod_name`, `note`) VALUES
(19, '001', 'coimbatore', '987654314', 'Arun', ''),
(20, '002', 'Virudhunagar', '9658741230', 'Aravindh', ''),
(21, '003', 'coimbatore', '9514785236', 'Aswin', ''),
(22, '005', 'Coimbatore', '9324785165', 'Amith', ''),
(23, '004', 'Salem', '9547812657', 'Amir', ''),
(24, '006', 'Perur,Coimabtore', '9521503687', 'siva', ''),
(26, '007', 'Mettur,Salem', '9857214685', 'Kiran', ''),
(27, '008', 'nb', '1234567890', 'anushri', 'bh');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `notes` text,
  `order_data` text,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `company`, `address`, `city`, `country`, `postcode`, `mobile`, `email`, `notes`, `order_data`, `order_date`) VALUES
(1, 'manu', 'akkamma', 'karnataka university', 'ikjk', 'dwd', 'India', '54545', '09912341234', 'akkammabatagurki@gmail.com', 'nm,m,', NULL, '2025-06-02 08:28:19'),
(4, 'rashmi', 'Akkamma', 'None', 'savadatti', 'dwd', 'India', '54545', '08147287309', 'akkammabatagurki@gmail.com', 'mn,,', NULL, '2025-06-02 08:43:52'),
(5, 'sakshi', 'rumali', 'yenu', 'rajnagar ', 'hubli', 'india', '897800', '09912341234', 'sakshi@gmail.com', 'sdksjnda', NULL, '2025-06-02 08:51:54'),
(6, 'sakshi', 'rumali', 'yenu', 'rajnagar ', 'hubli', 'india', '897800', '09912341234', 'sakshi@gmail.com', 'sdksjnda', NULL, '2025-06-02 08:58:27'),
(7, 'sakshi', 'rumali', 'yenu', 'rajnagar ', 'hubli', 'india', '897800', '09912341234', 'sakshi@gmail.com', 'mnn ', NULL, '2025-06-02 08:58:57'),
(8, 'ramu', 'jai', 'tji', 'kjfnvj', 'jrnfj', 'erknkje', '0958', '5895499439', 'akkammabatagurki@gmail.com', 'jenfvjn', NULL, '2025-06-02 09:15:34'),
(9, 'surbhi', 'jyoti', 'jklkkl', 'kjnkjkj5', 'hubli', 'india', '897800', '09912341234', 'sakshi@gmail.com', 'jkjnjk', NULL, '2025-06-02 09:29:00'),
(10, 'raju', 'kumar', 'hreiughe', '944hch', 'dharwad', 'india', '67585', '09912341234', 'jbhhi@gmail.com', 'xjnx', NULL, '2025-06-02 09:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `total_price`) VALUES
(1, 123, 0, 'Oranges', '4.99', 1, '4.99'),
(2, 123, 0, 'Grapes', '4.99', 1, '4.99'),
(3, 123, 0, 'Raspberries', '4.99', 1, '4.99'),
(4, 123, 0, 'Grapes', '4.99', 1, '4.99'),
(5, 123, 0, 'Raspberries', '4.99', 1, '4.99'),
(6, 123, 0, 'Grapes', '4.99', 2, '9.98'),
(7, 123, 0, 'Raspberries', '4.99', 2, '9.98'),
(8, 123, 0, 'Grapes', '4.99', 2, '9.98'),
(9, 123, 0, 'Raspberries', '4.99', 2, '9.98'),
(10, 123, 0, 'Banana', '4.99', 1, '4.99'),
(11, 123, 0, 'Grapes', '4.99', 2, '9.98'),
(12, 123, 0, 'Raspberries', '4.99', 2, '9.98'),
(13, 123, 0, 'Banana', '4.99', 1, '4.99'),
(14, 123, 0, 'Grapes', '4.99', 2, '9.98'),
(15, 123, 0, 'Raspberries', '4.99', 3, '14.97'),
(16, 123, 0, 'Banana', '4.99', 2, '9.98');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_sold` int(11) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `product_name`, `o_price`, `price`, `profit`, `supplier`, `qty`, `qty_sold`, `expiry_date`, `date_arrival`) VALUES
(5, 'Sevvallai', 'Banana', 'Fruit ', '110', '120', '10', 'Hariharan', 50, 50, '2017-10-01', '2017-09-25'),
(6, 'Green Apple', 'Apple', 'Fruit  ', '130', '150', '20', 'Sahar', 74, 100, '2017-09-30', '2017-09-25'),
(8, 'Morrish', 'Banana', '  Fruit', '130', '150', '20', 'Kiran', 77, 80, '2017-10-04', '2017-09-25'),
(9, 'Strawberry', 'Berry', 'Fruit ', '190', '200', '10', 'Krishna', 50, 50, '2017-10-01', '2017-09-25'),
(10, 'Watermelon', 'water', ' fruit  ', '200', '220', '20', 'Mohan', 47, 50, '2025-04-25', '2025-04-21'),
(11, 'Rasthaali', 'watermelon', ' mkl ', '999', '989', '-10', 'Krishna', 8, 9, '2025-06-02', '2025-06-01'),
(12, 'Green Apple', 'watermelon', ' hty', '970', '989', '19', 'Sahar', 5, 5, '2025-06-02', '2025-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

DROP TABLE IF EXISTS `purchases_item`;
CREATE TABLE IF NOT EXISTS `purchases_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `balance`) VALUES
(1, 'RS-33822', 'Admin', '10/11/17', 'cash', '300', '40', '300', '', ''),
(2, 'RS-927233', 'Admin', '10/11/17', 'cash', '150', '20', '20', '001', ''),
(3, 'RS-33290', 'Admin            <button class=', '06/02/25', 'cash', '220', '20', '90', '001', '0'),
(4, 'RS-332422', 'Admin            <button class=', '06/02/25', 'cash', '150', '20', '88998', '002', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

DROP TABLE IF EXISTS `sales_order`;
CREATE TABLE IF NOT EXISTS `sales_order` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `date` varchar(500) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(1, 'RS-3872343', '1', '5', '400', '100', 'Green Apple', 'Apple', ' ', '80', '', '09/21/17'),
(2, 'RS-0323502', '2', '8', '480', '80', 'Morish', 'Banana', ' ', '60', '', '09/21/17'),
(3, 'RS-38203322', '3', '8', '640', '160', 'Kamala Orange', 'Orange', ' ', '80', '', '09/21/17'),
(5, 'RS-8900238', '3', '3', '240', '60', 'Kamala Orange', 'Orange', ' ', '80', '', '09/21/17'),
(6, 'RS-203023', '3', '5', '400', '100', 'Kamala Orange', 'Orange', ' ', '80', '', '09/21/17'),
(7, 'RS-0032', '2', '2', '120', '20', 'Morish', 'Banana', ' ', '60', '', '09/21/17'),
(8, 'RS-3250562', '3', '2', '160', '40', 'Kamala Orange', 'Orange', ' ', '80', '', '09/21/17'),
(9, 'RS-73992', '2', '2', '120', '20', 'Morish', 'Banana', ' ', '60', '', '09/25/17'),
(10, 'RS-33343333', '4', '13', '1560', '260', 'Apple', 'Apple-XS', ' Fruit ', '120', '', '09/25/17'),
(11, 'RS-33822', '6', '2', '300', '40', 'Green Apple', 'Apple', 'Fruit  ', '150', '', '10/11/17'),
(12, 'RS-33063266', '6', '1', '150', '20', 'Green Apple', 'Apple', 'Fruit  ', '150', '', '10/11/17'),
(13, 'RS-927233', '8', '1', '150', '20', 'Morrish', 'Banana', '  Fruit', '150', '', '10/11/17'),
(14, 'RS-56220022', '6', '5', '750', '100', 'Green Apple', 'Apple', 'Fruit  ', '150', '', '10/12/17'),
(15, 'RS-40364320', '6', '6', '900', '120', 'Green Apple', 'Apple', 'Fruit  ', '150', '0', '06/02/25'),
(16, 'RS-40364320', '11', '1', '989', '-10', 'Rasthaali', 'watermelon', ' mkl ', '989', '0', '06/02/25'),
(17, 'RS-22322036', '10', '1', '220', '20', 'Watermelon', 'water', ' fruit  ', '220', '0', '06/02/25'),
(18, 'RS-33290', '10', '1', '220', '20', 'Watermelon', 'water', ' fruit  ', '220', '0', '06/02/25'),
(19, 'RS-332422', '8', '1', '150', '20', 'Morrish', 'Banana', '  Fruit', '150', '0', '06/02/25'),
(20, 'RS-72700', '8', '1', '150', '20', 'Morrish', 'Banana', '  Fruit', '150', '0', '06/02/25'),
(21, 'RS-72700', '10', '1', '220', '20', 'Watermelon', 'water', ' fruit  ', '220', '0', '06/02/25');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

DROP TABLE IF EXISTS `supliers`;
CREATE TABLE IF NOT EXISTS `supliers` (
  `suplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL,
  PRIMARY KEY (`suplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(1, 'Manoj', 'Idappadi,Salem', 'Manoj', '98654789', 'Green Apple'),
(2, 'Kiran', 'Thondamuthur,Coimbatore', '9988776655', 'siva', 'Morrish'),
(3, 'Balaji', 'Aathur,Salem', '9632147854', 'Balaji', 'Green Grapes'),
(4, 'Mohan', 'Mettur,Salem', 'Mohan', '9879542078', 'Watermelon'),
(5, 'Krishna', 'Thudiyalur,Coimabtore', 'Krishna', '9572154036', 'Strawberry'),
(6, 'Saamy', 'Perur,Coimbatore', 'Saamy', '8754962150', 'Pomegranate'),
(7, 'Sahar', 'Saravanampatty,Coimab', 'Sahar', '8574298452', 'Apple'),
(8, 'Karan', 'Shathy,Coimbatore', '9201478563', 'Karan', 'Nendharam'),
(9, 'Arjun', 'Thudiyalur,Coimbatore', 'Arjun', '9789879875', 'Orange'),
(10, 'Hariharan', 'Selvapuram,Coimbatore', '7854963152', 'Hariharan', 'Red Banana'),
(11, 'Manoj Siva', 'Kuvandampalayam,Coimbatore', '9587425613', 'Manoj Siva', 'Rasthaali'),
(12, 'Mohan Balaji', 'Peelamedu,Coimbatore', 'Mohan Balaji', '9587426420', 'Karpooravalli'),
(13, 'nagaveni', 'hubli,hubli', 'raju', '2341567', 'banan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(3, 'admin', 'admin123', 'Administrator', 'admin'),
(4, 'manojkiran', 'manojkiran', 'ManojKiran', 'admin'),
(5, 'siva', 'siva', 'kiran', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'manju', '$2y$10$pzK/GhKVlYka7BB2L5kqqeru73hmDNUJE0S4F.EzKFVYNcxjtvbiy'),
(2, 'vaish@gmail.com', '$2y$10$j4rJ7iK.EkshCUIGkbVPzud5b2eEDoVQtfoDIrqejfOEU7mSff.QO'),
(3, 'pallu@gmail.com', '$2y$10$pKq8HXRAqT9T9iAwU28IL.glWrNnRk.edOs0YKjtBoTs.h91hSBDu'),
(4, 'manu', '$2y$10$52yRKp/qDMBfzck51grghO6VWpkbvQ41uL8t4cq8foK/s7Vqj1ApG'),
(5, 'rashmi', '$2y$10$UocHcAlAD7KKMxR5SLCLBOYVsxoVzNCO5rqZype0pEqsAXSvlGZLm'),
(6, 'radha', '$2y$10$6miFH4JVv/NUP6CdJmEb5u1dSqaa/Uh//IHUD7a7mRb92j5zi2oeC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
