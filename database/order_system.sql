-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 12:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(1, 'บล็อกปูถนน'),
(2, 'ปูนซีเมนต์'),
(3, 'สุขภัณฑ์'),
(4, 'ฉนวนกันความร้อน'),
(6, 'กระดาษ'),
(7, 'สีกระเบื้องหลังคา'),
(8, 'PVC');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`) VALUES
(1, 1, 'บับเบิ้ล บล็อก Bubble Block', 590, 'upload/scg961961(1)_1682837545.jpg'),
(2, 1, 'ร็อกกี้บล็อก Rocky Block', 590, 'upload/ปกRocky(11)_1682837656.jpg'),
(3, 1, 'ศิลาเหลี่ยม La-Linear', 790, 'upload/scg961961(3)_1682837698.jpg'),
(5, 3, 'ฮาโมนี พร้อมฝารองนั่งอัตโนมัติ', 1099, 'upload/product_159939_images_6bc7ebe7-f4d5-473c-87cb-cd34d55afff1_C10347-24072018_1682837785.jpg'),
(6, 4, 'ฉนวนกันความร้อน', 999, 'upload/ZDE1DGR40200011-01_1682837803.jpg'),
(7, 6, 'กระดาษ A4 Idea-Green', 50, 'upload/Idea-Green_1682837836.jpg'),
(8, 7, 'SCG roofing paint', 700, 'upload/scg-roofing-paint-prima-granite-grey-packshot_pd412070_1682837908.jpg'),
(9, 7, 'SCG mortar bed', 1500, 'upload/scg-mortar-bed-paint-concrete-roof-tile-tawny_pd411480_1682837932.jpg'),
(10, 2, 'ทนน้ำทะเล', 999, 'upload/aw_pack_scg_marine_50kg_front_1682837986.jpg'),
(11, 2, 'งานหล่อ', 999, 'upload/ZBAB12112D50L3_1682838004.jpg'),
(12, 2, 'ไฮบริด', 800, 'upload/ZBAB12702D50K3-01_1682838028.jpg'),
(13, 2, 'ทนน้ำเค็มดินเค็ม', 789, 'upload/ZBAB12402D50K3_1682838052.jpg'),
(14, 8, 'ท่อ pvc', 50, 'upload/Tips4_1682845179.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(1, 'Guest', 1380, '2020-04-30 14:05:35'),
(2, 'ธนภพ', 8699, '2022-04-30 14:08:11'),
(3, 'Peter', 2500, '2023-04-30 16:03:50'),
(4, 'New', 9910, '2023-04-30 16:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 1),
(3, 2, 7, 2),
(4, 2, 9, 5),
(5, 2, 5, 1),
(6, 3, 14, 50),
(7, 4, 6, 1),
(8, 4, 14, 1),
(9, 4, 8, 1),
(10, 4, 7, 1),
(11, 4, 5, 1),
(12, 4, 11, 1),
(13, 4, 12, 1),
(14, 4, 13, 1),
(15, 4, 10, 1),
(16, 4, 2, 1),
(17, 4, 1, 1),
(18, 4, 3, 1),
(19, 4, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
