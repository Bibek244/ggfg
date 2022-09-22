-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2022 at 07:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `location`) VALUES
(1, 'Bhaktapur', 'Bhaktapur-7,Nepal'),
(2, 'faasdf', 'asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employe_Id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `JOB_ID` int(11) NOT NULL,
  `Hired_date` date DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employe_Id`, `fname`, `lname`, `gender`, `email`, `phone`, `JOB_ID`, `Hired_date`, `address`, `branch_id`) VALUES
(1, 'Bibek', 'Gosai', 'Male', 'bibek@bmc.com', '9840607087', 1, NULL, 'Dudhpati -1 , Bhaktapur', 0),
(2, 'JIS', 'sangbo', 'Male', 'JInlap@ag.com', '9879654327', 2, '2021-11-30', 'Nagarkot, bhaktapur', 0),
(3, 'Bibek', 'Gosai', 'Male', 'asdfhk@gmnia.com', '1234567895', 2, '5111-05-06', 'golmdahi', 0),
(4, 'Aashish', 'Rajthala', 'female', 'asdfhk@gmnia.com', '9843808050', 3, '2022-08-12', 'golmadhi', 1),
(6, 'home', 'hari', 'male', 'efghi@his.com', '9843808050', 3, '2022-08-13', 'golmadhi', 1),
(7, 'rupesh', 'Shrestha', 'male', 'bibekgosai555@gmail.com', '9843808050', 3, '2022-08-06', 'golmadhi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `PRODUCT_ID` int(10) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `cprice` int(11) NOT NULL,
  `sprice` int(11) NOT NULL,
  `CATAGORY` varchar(50) NOT NULL,
  `Supplier_id` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `inHand_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`PRODUCT_ID`, `product_code`, `NAME`, `QUANTITY`, `cprice`, `sprice`, `CATAGORY`, `Supplier_id`, `DATE`, `branch_id`, `inHand_stock`) VALUES
(22, 'ball-101', 'ball', 500, 15, 20, 'toy', 1, '2022-08-08', 1, 0),
(23, 'Jumla-apple', 'apple', 500, 200, 300, 'toy', 2, '2022-06-01', 1, 0),
(24, '', 'asdf', 200, 200, 200, 'PETS', 2, '2022-08-12', 1, 0),
(25, '', '123', 212, 7000, 8000, 'Fruits', 2, '2022-08-12', 2, 0),
(26, 'ball-101', 'Bibek Gosai', 500, 3000, 10000, 'Fruits', 2, '2022-08-14', 2, 500),
(27, 'intel-i5-5000', 'intel-i5', 2, 10000, 15000, 'CPU', 5, '2022-08-14', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier'),
(3, 'Branch Manager');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `Employe_Id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `TYPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Employe_Id`, `username`, `password`, `TYPE_ID`) VALUES
(1, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(25, 2, 'home', 'e83249bd3ba79932e16fb1fb5100dafade9954c2', 2),
(28, 3, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2),
(29, 4, 'aashish', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2),
(48, 7, 'rupesh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_id` int(11) NOT NULL,
  `Company_name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_id`, `Company_name`, `Address`, `Phone`) VALUES
(1, 'abc', 'jagiti2,nepal', '984125454'),
(2, 'Nepal Food Supply', 'Kathmadhu,Nepal', '1234567890'),
(3, 'Furit Inc.', 'golmadhi', '9843808050'),
(4, 'Pure Water Ltd ', 'Solukumbhu', '7894561230'),
(5, 'gloabl nepal', 'golmadhi', '9843808050');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tran_id` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `numofitems` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tran_id`, `customer`, `numofitems`, `subtotal`, `vat`, `grandtotal`, `date`, `branch_id`, `TRANS_D_ID`) VALUES
(10, 'asfd', 2, 1200, 156, 1356, '2022-06-08', 0, '0803173355'),
(11, 'sdaf', 1, 750, 98, 848, '2022-08-03', 0, '0803173922'),
(12, 'sadf', 2, 1200, 156, 1356, '2022-08-03', 0, '0803183745'),
(13, 'asdfdf', 1, 1000, 130, 1130, '2022-08-03', 0, '0803183912'),
(14, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803184224'),
(15, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803184239'),
(16, 'adf', 1, 750, 98, 848, '2022-08-03', 0, '0803184329'),
(17, 'sdf', 1, 750, 98, 848, '2022-08-03', 0, '0803184355'),
(18, 'asdf', 1, 1000, 130, 1130, '2022-08-03', 0, '0803184505'),
(19, 'asdf', 1, 1000, 130, 1130, '2022-08-03', 0, '0803184921'),
(20, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803184936'),
(21, 'adsf', 1, 750, 98, 848, '2022-08-03', 0, '0803184949'),
(22, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803185033'),
(23, 'adsf', 1, 750, 98, 848, '2022-08-03', 0, '0803185052'),
(24, 'adsf', 1, 750, 98, 848, '2022-08-03', 0, '0803185147'),
(25, 'adsf', 1, 750, 98, 848, '2022-08-03', 0, '0803185208'),
(26, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803185701'),
(27, 'adsf', 1, 1000, 130, 1130, '2022-08-03', 0, '0803185742'),
(28, 'adf', 1, 500, 65, 565, '2022-08-03', 0, '0803185752'),
(29, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803185815'),
(30, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803185902'),
(31, 'asdf', 1, 500, 65, 565, '2022-08-03', 0, '0803190142'),
(32, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803190153'),
(33, 'asfd', 1, 750, 98, 848, '2022-08-03', 0, '0803190202'),
(34, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803190258'),
(35, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803190350'),
(36, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803191404'),
(37, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803191519'),
(38, 'asdf', 1, 1000, 130, 1130, '2022-08-03', 0, '0803191543'),
(39, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803191705'),
(40, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803191814'),
(41, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803191824'),
(42, 'sadf', 1, 750, 98, 848, '2022-08-03', 0, '0803191913'),
(43, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803192137'),
(44, 'asdf', 1, 1000, 130, 1130, '2022-08-03', 0, '0803194447'),
(45, 'asfd', 1, 1000, 130, 1130, '2022-08-03', 0, '0803194601'),
(46, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803195313'),
(47, 'asdf', 1, 750, 98, 848, '2022-08-03', 0, '0803195403'),
(48, 'sadf', 1, 1000, 130, 1130, '2022-08-05', 0, '0805171745'),
(49, 'sdaf', 1, 1000, 130, 1130, '2022-08-05', 0, '0805171754'),
(50, 'asfd', 1, 1000, 130, 1130, '2022-08-05', 0, '0805171836'),
(51, 'sadf', 1, 750, 98, 848, '2022-08-05', 0, '0805171854'),
(52, 'ASDF', 1, 1250, 163, 1413, '2022-08-06', 0, '080660014'),
(53, 'hosted', 1, 60, 8, 68, '2022-08-09', 0, '0809121703'),
(54, 'asdf', 1, 60, 8, 68, '2022-08-09', 0, '0809121717'),
(55, 'asdf', 1, 80, 10, 90, '2022-08-09', 0, '0809124347'),
(56, 'asdf', 1, 1100, 143, 1243, '2022-08-09', 0, '0809124411'),
(57, 'adsf', 1, 80, 10, 90, '2022-08-09', 0, '0809124429'),
(58, 'adf', 1, 60, 8, 68, '2022-08-09', 0, '0809125512'),
(59, 'adf', 1, 60, 8, 68, '2022-08-09', 0, '0809125613'),
(60, '', 1, 60, 8, 68, '2022-08-09', 0, '0809125710'),
(61, 'adf', 1, 60, 8, 68, '2022-08-09', 0, '0809131052'),
(62, 'adf', 1, 80, 10, 90, '2022-08-09', 0, '0809131208'),
(63, '', 1, 60, 8, 68, '2022-08-09', 0, '0809131243'),
(64, '', 1, 60, 8, 68, '2022-08-09', 0, '0809131253'),
(65, '', 1, 40, 5, 45, '2022-08-09', 0, '0809131305'),
(66, '', 1, 60, 8, 68, '2022-08-09', 0, '0809131431'),
(67, '', 1, 60, 8, 68, '2022-08-09', 0, '0809131501'),
(68, '', 1, 60, 8, 68, '2022-08-09', 0, '0809131512'),
(69, 'adf', 1, 60, 8, 68, '2022-08-09', 0, '0809155721'),
(70, 'home', 1, 60, 8, 68, '2022-08-09', 0, '0809160034'),
(71, 'adf asdf', 2, 136, 18, 154, '2022-08-09', 0, '0809224535'),
(72, 'adf', 1, 100, 13, 113, '2022-08-09', 0, '0809225128'),
(73, 'vidit', 1, 100, 13, 113, '2022-08-10', 0, '081073756'),
(74, 'hari krishna', 1, 100000, 13000, 113000, '2022-08-10', 0, '081073951'),
(76, 'daf', 1, 5000000, 650000, 5650000, '2022-08-14', 0, '0814062422'),
(77, 'nits', 1, 5000000, 650000, 5650000, '2022-08-14', 1, '0814062511'),
(78, 'asdf', 1, 60000, 7800, 67800, '2022-08-14', 1, '0814062708'),
(79, 'Kirshna raj', 1, 15000, 1950, 16950, '2022-08-14', 1, '0814071011'),
(80, 'ttas', 1, 15000, 1950, 16950, '2022-08-14', 0, '0814071840');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCT` varchar(250) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`ID`, `TRANS_D_ID`, `PRODUCT`, `PRICE`, `QTY`, `EMPLOYEE`, `ROLE`) VALUES
(2, '0803171750', 'ball', 250, 4, ' ', ''),
(3, '0803172054', 'ball', 250, 4, ' homie', 'user'),
(4, '0803172943', 'ball', 250, 4, ' homie', 'user'),
(5, '0803172943', 'apple', 50, 4, ' homie', 'user'),
(6, '0803172943', 'ball', 250, 13, ' homie', 'user'),
(7, '0803173125', 'ball', 250, 3, ' homie', 'user'),
(8, '0803173125', 'apple', 50, 3, ' homie', 'user'),
(9, '0803173355', 'ball', 250, 4, ' homie', 'user'),
(10, '0803173355', 'apple', 50, 4, ' homie', 'user'),
(11, '0803173822', 'ball', 250, 3, ' homie', 'user'),
(12, '0803173922', 'ball', 250, 3, ' homie', 'user'),
(13, '0803183745', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(14, '0803183745', 'apple', 50, 4, ' Prince Ly', 'Admin'),
(15, '0803183912', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(16, '0803184224', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(17, '0803184239', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(18, '0803184329', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(19, '0803184355', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(20, '0803184505', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(21, '0803184921', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(22, '0803184936', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(23, '0803184949', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(24, '0803185033', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(25, '0803185052', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(26, '0803185147', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(27, '0803185208', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(28, '0803185701', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(29, '0803185742', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(30, '0803185752', 'ball', 250, 2, ' Prince Ly', 'Admin'),
(31, '0803185815', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(32, '0803185902', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(33, '0803190142', 'ball', 250, 2, ' Prince Ly', 'Admin'),
(34, '0803190153', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(35, '0803190202', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(36, '0803190258', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(37, '0803190350', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(38, '0803191404', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(39, '0803191519', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(40, '0803191543', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(41, '0803191705', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(42, '0803191814', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(43, '0803191824', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(44, '0803191913', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(45, '0803192137', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(46, '0803194447', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(47, '0803194601', 'ball', 250, 4, ' Prince Ly', 'Admin'),
(48, '0803195313', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(49, '0803195403', 'ball', 250, 3, ' Prince Ly', 'Admin'),
(50, '0805171745', 'ball', 250, 4, ' homie', 'user'),
(51, '0805171754', 'ball', 250, 4, ' homie', 'user'),
(52, '0805171836', 'ball', 250, 4, ' homie', 'user'),
(53, '0805171854', 'ball', 250, 3, ' homie', 'user'),
(54, '080660014', 'ball', 250, 5, ' homie homie', 'user'),
(55, '0809121703', 'ball', 20, 3, ' homie homie', 'user'),
(56, '0809121717', 'ball', 20, 3, ' homie homie', 'user'),
(57, '0809124347', 'ball', 20, 4, ' homie homie', 'user'),
(58, '0809124411', 'ball', 20, 55, ' homie homie', 'user'),
(59, '0809124429', 'ball', 20, 4, ' homie homie', 'user'),
(60, '0809125512', 'ball', 20, 3, ' homie homie', 'user'),
(61, '0809125613', 'ball', 20, 3, ' homie homie', 'user'),
(62, '0809125710', 'ball', 20, 3, ' homie homie', 'user'),
(63, '0809131052', 'ball', 20, 3, ' homie homie', 'user'),
(64, '0809131208', 'ball', 20, 4, ' homie homie', 'user'),
(65, '0809131243', 'ball', 20, 3, ' homie homie', 'user'),
(66, '0809131253', 'ball', 20, 3, ' homie homie', 'user'),
(67, '0809131305', 'ball', 20, 2, ' homie homie', 'user'),
(68, '0809131431', 'ball', 20, 3, ' homie homie', 'user'),
(69, '0809131501', 'ball', 20, 3, ' homie homie', 'user'),
(70, '0809131512', 'ball', 20, 3, ' homie homie', 'user'),
(71, '0809155624', 'ball', 20, 4, ' homie homie', 'user'),
(72, '0809155721', 'ball', 20, 3, ' homie homie', 'user'),
(73, '0809160034', 'ball', 20, 3, ' homie homie', 'user'),
(74, '0809224535', 'ball', 20, 4, ' Bibek Bibek', 'admin'),
(75, '0809224535', 'Apple', 4, 14, ' Bibek Bibek', 'admin'),
(76, '0809225128', 'ball', 20, 5, ' Bibek Gosai', 'admin'),
(77, '081073756', 'ball', 20, 5, ' Bibek Gosai', 'admin'),
(78, '081073951', 'ball', 20, 5000, ' Bibek Gosai', ''),
(79, '081074758', 'ball', 20, 5000, ' Bibek Gosai', 'Manager'),
(80, '0812120931', 'ball', 20, 4, ' Bibek Gosai', 'Manager'),
(81, '0812120931', 'apple', 300, 11, ' Bibek Gosai', 'Manager'),
(82, '0812121105', 'ball', 20, 3, ' Bibek Gosai', 'Manager'),
(83, '0812121357', 'ball', 20, 1, ' Bibek Gosai', 'Manager'),
(84, '0812122812', 'ball', 20, 3, ' Bibek Gosai', 'Manager'),
(85, '0812122928', 'ball', 20, 4, ' Bibek Gosai', 'Manager'),
(86, '0812123056', 'apple', 300, 4, ' Bibek Gosai', 'Manager'),
(87, '0813180233', 'ball', 20, 50, ' Bibek Gosai', 'Manager'),
(88, '0813180335', 'ball', 20, 200, ' Bibek Gosai', 'Manager'),
(89, '0813180717', 'ball', 20, 200, ' Bibek Gosai', 'Manager'),
(90, '0813180812', 'ball', 20, 6, ' Bibek Gosai', 'Manager'),
(91, '0813181909', 'apple', 300, 5, ' Bibek Gosai', 'Manager'),
(92, '0813181909', 'asdf', 200, 5, ' Bibek Gosai', 'Manager'),
(93, '0813181909', '123', 8000, 5, ' Bibek Gosai', 'Manager'),
(94, '0813182018', 'ball', 20, 200, ' Bibek Gosai', 'Manager'),
(95, '0813182318', 'ball', 20, 200, ' Bibek Gosai', 'Manager'),
(96, '0813183833', 'ball', 20, 200, ' Bibek Gosai', 'Manager'),
(97, '0813190659', 'ball', 20, 294, ' Bibek Gosai', 'Manager'),
(98, '0814060310', 'Bibek', 10000, 500, ' Bibek Gosai', 'Manager'),
(99, '0814062422', 'Bibek', 10000, 500, ' Bibek Gosai', 'Manager'),
(100, '0814062511', 'Bibek', 10000, 500, ' Aashish Rajthala', 'Branch Manager'),
(101, '0814062708', 'Bibek', 10000, 6, ' Aashish Rajthala', 'Branch Manager'),
(102, '0814071011', 'intel-i5', 15000, 1, ' Aashish Rajthala', 'Branch Manager'),
(103, '0814071840', 'intel-i5', 15000, 1, ' Bibek Gosai', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employe_Id`),
  ADD KEY `Job_Id` (`JOB_ID`),
  ADD KEY `phone` (`phone`),
  ADD KEY `JOB_ID_2` (`JOB_ID`),
  ADD KEY `JOB_ID_3` (`JOB_ID`),
  ADD KEY `JOB_ID_4` (`JOB_ID`),
  ADD KEY `Location_Id` (`address`) USING BTREE;

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `supplier` (`Supplier_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`),
  ADD UNIQUE KEY `JOB_ID` (`JOB_ID`),
  ADD UNIQUE KEY `JOB_ID_2` (`JOB_ID`,`JOB_TITLE`),
  ADD KEY `JOB_ID_3` (`JOB_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `Employe_Id` (`Employe_Id`),
  ADD KEY `usertype` (`TYPE_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tran_id`),
  ADD KEY `transaction_id` (`TRANS_D_ID`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employe_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `PRODUCT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `supplier` FOREIGN KEY (`Supplier_id`) REFERENCES `supplier` (`Supplier_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`Employe_Id`) REFERENCES `employee` (`Employe_Id`),
  ADD CONSTRAINT `usertype` FOREIGN KEY (`TYPE_ID`) REFERENCES `type` (`TYPE_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_id` FOREIGN KEY (`TRANS_D_ID`) REFERENCES `transaction_detail` (`TRANS_D_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
