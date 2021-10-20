-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2021 at 05:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detikcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `merchant_id` int(11) NOT NULL,
  `merchant_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`merchant_id`, `merchant_name`) VALUES
(1, 'TOKOPEDIA'),
(2, 'SHOPEE'),
(3, 'LAZADA'),
(4, 'ALIBABA'),
(5, 'ALI ONCOM'),
(6, 'TOKO GEHU');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `invoice_id` text NOT NULL,
  `item_name` text NOT NULL,
  `amount` text NOT NULL,
  `payment_type` enum('credit_card','virtual_account') NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `references_id` text NOT NULL,
  `number_va` text DEFAULT NULL,
  `status` enum('Pending','Paid','Failed') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `invoice_id`, `item_name`, `amount`, `payment_type`, `merchant_id`, `references_id`, `number_va`, `status`) VALUES
(24, '32122', 'bolobolo', '10000', 'credit_card', 5, '4', '30', 'Paid');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaction`
-- (See below for the actual view)
--
CREATE TABLE `v_transaction` (
`references_id` text
,`invoice_id` text
,`merchant_name` text
,`status` enum('Pending','Paid','Failed')
,`merchantid` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_transaction`
--
DROP TABLE IF EXISTS `v_transaction`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaction`  AS  select `tr`.`references_id` AS `references_id`,`tr`.`invoice_id` AS `invoice_id`,`mr`.`merchant_name` AS `merchant_name`,`tr`.`status` AS `status`,`mr`.`merchant_id` AS `merchantid` from (`transaction` `tr` join `merchants` `mr` on(`tr`.`merchant_id` = `mr`.`merchant_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `merchant_id` (`merchant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`merchant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
