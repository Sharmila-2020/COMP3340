-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2022 at 01:21 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `itemtype` varchar(20) DEFAULT NULL,
  `onsale` int(1) NOT NULL COMMENT '1 means item is onsale',
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`itemid`, `itemname`, `price`, `description`, `itemtype`, `onsale`, `img`) VALUES
(60, 'Soccer Jersey', '19.99', 'Wow! Its a soccer jersey description!', 'clothing', 0, '..\\productimages\\60-oldschool-jersey.png'),
(61, 'Sneakers', '49.95', 'Sneakers! Come and wear them, you will never want to take them off', 'footwear', 0, '..\\productimages\\61-blue-trainers.jpg'),
(62, 'Folded shirt', '24.99', 'A shirt! It does not normally count as equipment but here we are', 'equipment', 1, '..\\productimages\\62-folded-shirtpng.png'),
(63, 'Soccer Team Jersey', '74.94', 'Support your favourite team!', 'fanclothing', 1, '..\\productimages\\63-oldschool-jersey.png'),
(64, 'Soccer Shirt', '12.99', 'A cool soccer shirt! Wicks the sweat right off of you', 'clothing', 0, '..\\productimages\\64-folded-shirtpng.png'),
(65, 'Soccer Shirt Long Sleeve', '12.99', 'A cool soccer shirt! Longer sleeves keep you warm!', 'clothing', 0, '..\\productimages\\65-folded-shirtpng.png'),
(66, 'Soccer pants', '21.99', 'Training pants to keep you wamr!', 'clothing', 0, '..\\productimages\\66-sneaker.png'),
(67, 'Soccer hat', '12.49', 'A hat to keep out the sun!', 'clothing', 0, '..\\productimages\\67-ball-icon.png'),
(68, 'Scarf', '16.99', 'A scarf with a soccer logo on it!', 'clothing', 0, '..\\productimages\\68-ball-icon.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
