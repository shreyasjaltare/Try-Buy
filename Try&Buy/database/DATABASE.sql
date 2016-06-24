
-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2015 at 03:48 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try&buy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `CartInfo`
--

CREATE TABLE `CartInfo` (
  `BillId` int(11) DEFAULT NULL,
  `ProductId` varchar(100) NOT NULL DEFAULT '',
  `Count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CartInfo`
--

INSERT INTO `CartInfo` (`BillId`, `ProductId`, `Count`) VALUES
(NULL, '001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `CustomerShoppingInfo`
--

CREATE TABLE `CustomerShoppingInfo` (
  `BillId` int(11) NOT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `ProductId` varchar(100) DEFAULT NULL,
  `Quantity` int(100) DEFAULT '0',
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Total` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CustomerShoppingInfo`
--

INSERT INTO `CustomerShoppingInfo` (`BillId`, `CustomerId`, `ProductId`, `Quantity`, `Date`, `Total`) VALUES
(100, 10, '002', 2, '2015-12-02 04:00:21', 8),
(101, 10, '032', 2, '2015-12-02 04:00:21', 10),
(102, 10, '002', 2, '2015-12-02 04:05:30', 8),
(103, 10, '032', 2, '2015-12-02 04:05:30', 10),
(104, 10, '001', 0, '2015-12-02 04:05:30', 0),
(105, 10, '002', 2, '2015-12-02 04:05:59', 8),
(106, 10, '032', 2, '2015-12-02 04:05:59', 10),
(107, 10, '001', 0, '2015-12-02 04:05:59', 0),
(108, 10, '001', 0, '2015-12-02 04:09:18', 0),
(109, 75, '001', 2, '2015-12-02 09:04:25', 10),
(110, 75, '001', 2, '2015-12-02 09:05:53', 10),
(111, 75, '002', 0, '2015-12-02 18:00:30', 0),
(112, 75, '001', 2, '2015-12-02 18:00:30', 10),
(113, 75, '003', 3, '2015-12-02 18:00:30', 18),
(114, 75, '001', 0, '2015-12-02 18:22:55', 0),
(115, 75, '001', 2, '2015-12-02 19:21:50', 10),
(116, 75, '001', 3, '2015-12-02 19:29:20', 15),
(117, 105, '001', 4, '2015-12-02 21:56:50', 20),
(118, 107, '002', 3, '2015-12-02 22:35:53', 12),
(119, 107, '004', 3, '2015-12-02 22:35:53', 18),
(120, 107, '005', 3, '2015-12-02 22:35:53', 36),
(121, 108, '001', 2, '2015-12-02 22:37:16', 10),
(122, 108, '001', 3, '2015-12-02 22:42:04', 15),
(123, 108, '001', 0, '2015-12-02 22:42:27', 0),
(124, 108, '001', 0, '2015-12-02 22:44:30', 0),
(125, 108, '001', 0, '2015-12-02 22:48:12', 0),
(126, 108, '001', 0, '2015-12-02 22:53:55', 0),
(127, 107, '002', 0, '2015-12-02 23:15:43', 0),
(128, 107, '005', 3, '2015-12-02 23:15:43', 36),
(129, 107, '001', 4, '2015-12-02 23:50:20', 20),
(141, 107, '001', 2, '2015-12-03 01:30:56', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ProductId` varchar(100) NOT NULL DEFAULT '',
  `ProductName` varchar(255) NOT NULL,
  `ProductType` varchar(100) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `ProductReview` int(11) DEFAULT NULL,
  `src` varchar(50) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductId`, `ProductName`, `ProductType`, `Price`, `Stock`, `ProductReview`, `src`, `Quantity`) VALUES
('001', 'Moringa Soap', 'Body Cleaner', 5, 5, NULL, '../images/soapBars/soap1.jpg', 0),
('002', 'Irish Spring', 'Body Cleaner', 4, 10, NULL, '../images/soapBars/soap2.jpg', 0),
('003', 'Pangea Organic Soap', 'Body Cleaner', 6, 10, NULL, '../images/soapBars/soap3.jpg', 0),
('004', 'Dead Sea Mineral Soap', 'Body Cleaner', 6, 10, NULL, '../images/soapBars/soap4.jpg', 0),
('005', 'Rainforest Moisture', 'Hair Care', 12, 10, NULL, '../images/hair/hair1.jpg', NULL),
('006', 'Rainforest Balance Shampoo', 'Hair Care', 10, 10, NULL, '../images/hair/hair2.jpg', NULL),
('007', 'Wild Agran Oil', 'Hair Care', 25, 10, NULL, '../images/hair/hair3.jpg', NULL),
('008', 'Rainforest Moisture Shampoo', 'Hair Cair', 10, 10, NULL, '../images/hair/hair4.jpg', NULL),
('009', 'Vitamin C Glow Boosting Moisturizer', 'Moisturizer', 30, 10, NULL, '../images/moisturizer/moisturizer1.jpg', NULL),
('010', 'Vitamin C Daly Moisturizer', 'Moisturizer', 2, 10, NULL, '../images/moisturizer/moisturizer2.jpg', NULL),
('011', 'Green Deodorant', 'Deodorant', 10, 10, NULL, '../images/Deodorant/deo1.jpg', NULL),
('012', 'Lotus Bamboo', 'Deodorant', 12, 10, NULL, '../images/Deodorant/deo2.jpg', NULL),
('013', 'The Venus', 'Deodorant', 15, 10, NULL, '../images/Deodorant/deo3.jpg', NULL),
('014', 'Aorelle', 'Deodorant', 8, 10, NULL, '../images/Deodorant/deo5.jpg', NULL),
('015', 'Wholearth', 'Deorant', 18, 10, NULL, '../images/Deodorant/deo6.jpg', NULL),
('016', 'Red Flower', 'Deodorant', 26, 10, NULL, '../images/Deodorant/deo7.jpg', NULL),
('017', 'Red Flower', 'Perfume', 36, 10, NULL, '../images/perfume/perfume2.jpg', NULL),
('018', 'Vered', 'Perfume', 20, 10, NULL, '../images/perfume/perfume4.jpg', NULL),
('019', 'Juice Mist', 'Mist', 10, 10, NULL, '../images/mist/mist1.jpg', NULL),
('020', 'Rose Water Mist', 'Mist', 19, 10, NULL, '../images/mist/mist2.jpg', NULL),
('021', 'Organic Body Mist', 'Mist', 16, 10, NULL, '../images/mist/mist3.jpg', NULL),
('022', 'Sea Mist', 'Mist', 12, 10, NULL, '../images/mist/mist5.jpg', NULL),
('023', 'Lip Balm', 'Lip', 8, 10, NULL, '../images/lipcare/lip1.jpg', NULL),
('024', 'Lip Loks', 'Lip', 10, 10, NULL, '../images/lipcare/lip2.jpg', NULL),
('025', 'Organic 4 Nature', 'Lip', 10, 10, NULL, '../images/lipcare/lip3.jpg', NULL),
('026', 'Bio-LipPen', 'Lip', 12, NULL, NULL, '../images/lipcare/lip4.jpg', NULL),
('027', 'Eye Serum', 'Eye Care', 15, NULL, NULL, '../images/eyecare/eye1.jpg', NULL),
('028', 'Parsley Seed Serum', 'Eye Care', 12, NULL, NULL, '../images/eyecare/eye5.jpg', NULL),
('029', 'SPA Fit Body Massager', 'SPA', 5, NULL, NULL, '../images/SPA/spa1.jpg', NULL),
('030', 'Dead Sea Salt Scrub ', 'SPA', 32, NULL, NULL, '../images/SPA/spa2.jpg', NULL),
('031', 'Nail Butter', 'Nail', 10, NULL, NULL, '../images/nail/nail1.jpg', NULL),
('032', 'Nail Pen', 'Nail', 5, 0, NULL, '../images/nail/nail2.jpg', NULL),
('033', 'LA Fresh', 'Remover', 10, NULL, NULL, '../images/makeup/access5.jpg', NULL),
('034', 'Camomile Waterproof Eye Makeup Remover', 'Remover', 8, NULL, NULL, '../images/makeup/remover1.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `TryCount`
--

CREATE TABLE `TryCount` (
  `BillId` int(11) DEFAULT NULL,
  `ProductId` varchar(100) DEFAULT NULL,
  `Count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserInfo`
--

CREATE TABLE `UserInfo` (
  `UserId` int(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `RewardPoints` int(255) DEFAULT '3',
  `Street` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Zip` varchar(255) DEFAULT NULL,
  `Type` int(100) DEFAULT NULL,
  `Flag` tinyint(1) DEFAULT NULL,
  `IssueDate` date DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `VisaCompanyName` varchar(255) DEFAULT NULL,
  `cardNumber` int(255) DEFAULT NULL,
  `TypeOfCard` char(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserInfo`
--

INSERT INTO `UserInfo` (`UserId`, `FirstName`, `LastName`, `email`, `password`, `RewardPoints`, `Street`, `City`, `State`, `Zip`, `Type`, `Flag`, `IssueDate`, `ExpiryDate`, `VisaCompanyName`, `cardNumber`, `TypeOfCard`) VALUES
(10, 'jingbo', NULL, 'jbai@scu.edu', '123', 9991, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Student', 'Stu  ', 'student@scu.edu', '1234', 0, 'Santa Clara', 'Cacalifornia', 'Us', '44098', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '123', NULL, '123@124.com', '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '123', NULL, '1223@124.com', '123', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'college', NULL, 'college@scu.edyu', '123', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CartInfo`
--
ALTER TABLE `CartInfo`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `CustomerShoppingInfo`
--
ALTER TABLE `CustomerShoppingInfo`
  ADD UNIQUE KEY `BillId` (`BillId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `UserInfo`
--
ALTER TABLE `UserInfo`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cardNumber` (`cardNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CustomerShoppingInfo`
--
ALTER TABLE `CustomerShoppingInfo`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `UserInfo`
--
ALTER TABLE `UserInfo`
  MODIFY `UserId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
