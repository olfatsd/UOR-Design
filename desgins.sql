-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2022 at 02:27 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desgins`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtoauction`
--

DROP TABLE IF EXISTS `addtoauction`;
CREATE TABLE IF NOT EXISTS `addtoauction` (
  `auctionCode` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `comment` text NOT NULL,
  `size` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `FabricType` varchar(100) NOT NULL,
  `style` varchar(100) NOT NULL,
  `StartingPrice` int(100) NOT NULL,
  `messageStatus` text NOT NULL,
  `day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`auctionCode`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addtoauction`
--

INSERT INTO `addtoauction` (`auctionCode`, `id`, `img`, `comment`, `size`, `color`, `FabricType`, `style`, `StartingPrice`, `messageStatus`, `day`) VALUES
(1, 1, '5.png', 'the first autction', 2, 'black', 'coton', 'sportwear', 1200, 'Reasonable price', '2022-06-05 16:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
CREATE TABLE IF NOT EXISTS `careers` (
  `careerCode` int(11) NOT NULL AUTO_INCREMENT,
  `typeJop` text NOT NULL,
  `advantages` text NOT NULL,
  `bid` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `comanycode` int(100) NOT NULL,
  PRIMARY KEY (`careerCode`),
  KEY `comanycode` (`comanycode`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`careerCode`, `typeJop`, `advantages`, `bid`, `location`, `comanycode`) VALUES
(2, 'fashion desinger', '5 years experience', 9000, 'haifa', 956245);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `saleid` int(100) NOT NULL AUTO_INCREMENT,
  `code` int(100) NOT NULL,
  `comanycode` int(11) NOT NULL,
  `price` bigint(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY (`saleid`),
  KEY `code` (`code`),
  KEY `comanycode` (`comanycode`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`saleid`, `code`, `comanycode`, `price`, `quantity`) VALUES
(114, 54522, 956245, 1200, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

DROP TABLE IF EXISTS `chatroom`;
CREATE TABLE IF NOT EXISTS `chatroom` (
  `chatId` int(11) NOT NULL AUTO_INCREMENT,
  `auctionCode` int(11) NOT NULL,
  `comanycode` int(11) NOT NULL,
  `chat` text NOT NULL,
  `chatTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`chatId`),
  KEY `auctionCode` (`auctionCode`),
  KEY `comanycode` (`comanycode`)
) ENGINE=MyISAM AUTO_INCREMENT=21669 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatId`, `auctionCode`, `comanycode`, `chat`, `chatTime`) VALUES
(21645, 1, 956245, '2400', '2022-05-14 17:19:40'),
(21666, 1, 25648, '3600', '2022-05-17 10:20:52'),
(21668, 1, 956245, '4600', '2022-05-17 10:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `companys`
--

DROP TABLE IF EXISTS `companys`;
CREATE TABLE IF NOT EXISTS `companys` (
  `comanycode` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(20) NOT NULL,
  `password` int(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `style` varchar(100) NOT NULL,
  PRIMARY KEY (`comanycode`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=956247 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companys`
--

INSERT INTO `companys` (`comanycode`, `companyname`, `password`, `address`, `email`, `phone`, `style`) VALUES
(165321, 'FASHION CLUB', 11, 'Haifa', 'CLUB@g.com', 123456, 'casual'),
(59417, 'Givenchy', 333333, 'Italy', 'Givenchy@g.com', 5984562, 'elegant'),
(25648, 'Black Pink\'s', 444444, 'Italy', 'BlackPink\'s@g.com', 694785, 'sportwear'),
(956245, 'Dior', 55555, 'Turky', 'dior@g.com', 954861, 'dress');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `ratingcode` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(100) NOT NULL,
  `comanycode` int(11) NOT NULL,
  `ratenum` int(10) NOT NULL,
  `price` bigint(200) NOT NULL,
  PRIMARY KEY (`ratingcode`),
  KEY `comanycode` (`comanycode`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ratingcode`, `code`, `comanycode`, `ratenum`, `price`) VALUES
(7, 54522, 956245, 8, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

DROP TABLE IF EXISTS `registeration`;
CREATE TABLE IF NOT EXISTS `registeration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(20) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58466 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`id`, `fullname`, `email`, `password`, `address`, `comment`, `gender`, `image`) VALUES
(1, 'olfat saad', 'ulfatsaad97@gmail.com', 'o11lfat11', 'yanouh', '24 years old', 'female', 'olfat.jpeg'),
(58465, 'The Admin  katreen & olfat', 'admin@gmail.com', 'admin', 'haifa', 'we are tow admin in this website', 'female', ''),
(6, 'katreen fadel', 'katreen@gmail.com', 'katreen', 'maghar', '..', 'female', 'katreen.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `thedesigns`
--

DROP TABLE IF EXISTS `thedesigns`;
CREATE TABLE IF NOT EXISTS `thedesigns` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `comanycode` int(11) NOT NULL,
  `image` text NOT NULL,
  `price` int(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`code`),
  KEY `comanycode` (`comanycode`)
) ENGINE=MyISAM AUTO_INCREMENT=522252 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thedesigns`
--

INSERT INTO `thedesigns` (`code`, `comanycode`, `image`, `price`, `type`, `size`, `date`) VALUES
(522245, 956245, '3.jpg', 300, 'dress', 2, '2022-04-14 14:20:15'),
(522248, 956245, '4.jpg', 600, 'dress', 3, '2022-04-14 14:20:20'),
(522249, 956245, '1.jpg', 56, 'dress', 5, '2022-04-14 14:20:23'),
(54154, 956245, 'tommmy.jpg', 1600, 'dress', 1, '2022-04-14 14:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `thedesinger`
--

DROP TABLE IF EXISTS `thedesinger`;
CREATE TABLE IF NOT EXISTS `thedesinger` (
  `desingerid` int(11) NOT NULL AUTO_INCREMENT,
  `comanycode` int(11) NOT NULL,
  `designername` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`desingerid`),
  KEY `code` (`comanycode`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thedesinger`
--

INSERT INTO `thedesinger` (`desingerid`, `comanycode`, `designername`, `phone`, `img`) VALUES
(1, 165321, 'Zuhair Murad', 52525, 'ZuhairMurad.jpg'),
(2, 59417, 'Manish Malhotra', 454988, 'ManishMalhotra.jpg'),
(3, 25648, 'Tarun Tahiliani', 148956, 'TarunTahiliani.jpg'),
(4, 956245, 'Elie Saab', 922563, 'ElieSaab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userdesigns`
--

DROP TABLE IF EXISTS `userdesigns`;
CREATE TABLE IF NOT EXISTS `userdesigns` (
  `code` int(100) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `companyname` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `size` int(11) NOT NULL,
  `style` varchar(100) NOT NULL,
  `FabricType` varchar(100) NOT NULL,
  `hight` int(11) NOT NULL,
  `armLength` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `waist` int(11) NOT NULL,
  `hip` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`code`),
  KEY `id` (`id`),
  KEY `companyname` (`companyname`)
) ENGINE=MyISAM AUTO_INCREMENT=58479 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdesigns`
--

INSERT INTO `userdesigns` (`code`, `id`, `img`, `type`, `companyname`, `comment`, `size`, `style`, `FabricType`, `hight`, `armLength`, `chest`, `waist`, `hip`, `date`) VALUES
(54522, 1, 'design2.jpg', 'derss', 'Dior', 'White dress ', 2, '', 'Cotton', 172, 26, 45, 111, 111, '2022-03-23 09:30:15'),
(58477, 6, 'design3.jpg', 'dress', 'Dior', '....', 2, '.', 'coton', 173, 26, 25, 100, 100, '2022-04-14 19:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `winning`
--

DROP TABLE IF EXISTS `winning`;
CREATE TABLE IF NOT EXISTS `winning` (
  `winningCode` int(11) NOT NULL AUTO_INCREMENT,
  `auctionCode` int(11) NOT NULL,
  `companyname` varchar(11) NOT NULL,
  `img` text NOT NULL,
  `price` int(100) NOT NULL,
  `style` varchar(110) NOT NULL,
  PRIMARY KEY (`winningCode`),
  KEY `auctionCode` (`auctionCode`),
  KEY `comanycode` (`companyname`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winning`
--

INSERT INTO `winning` (`winningCode`, `auctionCode`, `companyname`, `img`, `price`, `style`) VALUES
(1, 1, 'Dior', '5.png', 4600, 'sportwear');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
