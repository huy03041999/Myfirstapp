-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 01:57 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass2webdesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cateid` int(5) NOT NULL,
  `catename` varchar(30) NOT NULL,
  `description` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cateid`, `catename`, `description`) VALUES
(1, 'Keyboard', 'typing thing bruh'),
(2, 'Mouse', 'fps thing bruh'),
(3, 'Headset', 'listening thing bruh');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusid` int(2) NOT NULL,
  `cusname` varchar(40) NOT NULL,
  `cusemail` varchar(40) NOT NULL,
  `cusplace` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusid`, `cusname`, `cusemail`, `cusplace`) VALUES
(1, 'Nguyen Thang Max', 'thangmax@email.com', 'Thanh Hoa'),
(2, 'Nguyen Huy Max', 'huymax@email.com', 'Binh Thuan'),
(3, 'Nguyen Tu Max', 'tumax@email.com', 'Bukkake'),
(4, 'Nguyen Tung Max', 'tungmax@email.com', 'Dick');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proid` int(3) NOT NULL,
  `proname` varchar(50) NOT NULL,
  `proimage` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `prodes` varchar(100) NOT NULL,
  `cateid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proid`, `proname`, `proimage`, `price`, `prodes`, `cateid`) VALUES
(1, 'Corsair K70', 'img/corsairk70.jpg', 165, 'High end Corsair Keyboard', 1),
(2, 'Razer Elite', 'img/razerhuntsman.jpg', 175, 'High end Razer Keyboard', 1),
(3, 'Logitech G810', 'img/logitechg810.jpg', 140, 'High end Logitech keyboard', 1),
(4, 'Steelseries Apex', 'img/steelm750.jpg', 135, 'High end Steelseries keyboard', 1),
(5, 'Corsair Void', 'img/corsairvoid.jpg', 90, 'High end Corsair headset', 3),
(6, 'Razer ManOWar', 'img/razermanowar.jpg', 150, 'High end Razer headset', 3),
(7, 'Logitech G933', 'img/logitechg933.jpg', 100, 'High end Logitech headset', 3),
(8, 'Steelseries Acrtis', 'img/steelarctis7.jpg', 110, 'High end Steelseries headset', 3),
(9, 'Corsair Glaive', 'img/corsairglaive.jpg', 60, 'High end Corsair mouse', 2),
(10, 'Razer DeathAdder', 'img/razeradder.jpg', 70, 'High end Razer mouse', 2),
(11, 'Logitech G502', 'img/logitechg502.jpg', 50, 'High end Logitech mouse', 2),
(12, 'Steelseries 600', 'img/steel600.jpg', 45, 'High end Steelseries mouse', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proid`),
  ADD KEY `cateid` (`cateid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cateid`) REFERENCES `category` (`cateid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
