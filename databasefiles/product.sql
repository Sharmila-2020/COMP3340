-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2022 at 12:57 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`itemid`, `itemname`, `price`, `description`, `itemtype`, `onsale`, `img`) VALUES
(1, 'Soccer clothes', '1.00', 'Our 1st database item!', 'clothing', 0, '..\\productimages\\1-folded-shirtpng.png'),
(2, 'Soccer shoes', '2.00', 'Our 2nd database item!', 'footwear', 0, '..\\productimages\\2-blue-trainers.jpg'),
(3, 'Soccer equipment', '3.00', 'Our 3rd database item!', 'equipment', 1, '..\\productimages\\3-ball-icon.png'),
(4, 'Soccer jersey', '4.00', 'Our 4th database item!', 'fanclothing', 0, '..\\productimages\\4-oldschool-jersey.png'),
(5, 'Pants', '5.00', 'Our 5th database item!', 'clothing', 0, '..\\productimages\\5-folded-shirtpng.png'),
(6, 'Football cleats', '6.00', 'Our 6th database item!', 'footwear', 1, '..\\productimages\\6-sneaker.png'),
(7, 'Sporting cones', '7.00', 'Our 7th database item!', 'equipment', 0, '..\\productimages\\7-ball-icon.png'),
(8, 'Football jersey', '8.00', 'Our 8th database item!', 'fanclothing', 1, '..\\productimages\\8-oldschool-jersey.png'),
(9, 'Shoe', '9.00', 'Our 9th database item!', 'footwear', 1, '..\\productimages\\9-sneaker.png'),
(10, 'Soccer ball', '10.00', 'Our 10th database item!', 'equipment', 1, '..\\productimages\\10-ball-icon.png'),
(11, 'Rugby jersey', '11.00', 'Our 11th database item!', 'fanclothing', 1, '..\\productimages\\11-oldschool-jersey.png'),
(12, 'Football shirt', '12.00', 'Our 12th database item!', 'clothing', 0, '..\\productimages\\12-oldschool-jersey.png'),
(13, 'Soccer footwear', '13.00', 'Our 13th database item!', 'footwear', 0, '..\\productimages\\13-blue-trainers.jpg'),
(14, 'Football equipment', '14.00', 'Our 14th database item!', 'equipment', 0, '..\\productimages\\14-ball-icon.png'),
(15, 'Sporting fan clothing', '15.00', 'Our 15th database item!', 'fanclothing', 1, '..\\productimages\\15-folded-shirtpng.png'),
(16, 'Collar shirt', '16.00', 'Our 16th database item!', 'clothing', 0, '..\\productimages\\16-folded-shirtpng.png'),
(17, 'Sporting shoes', '17.00', 'Our 17th database item!', 'footwear', 0, '..\\productimages\\17-sneaker.png'),
(18, 'Golf tees', '18.00', 'Our 18th database item!', 'equipment', 0, '..\\productimages\\18-ball-icon.png'),
(19, 'Football fan scarf', '19.00', 'Our 19th database item!', 'fanclothing', 0, '..\\productimages\\19-folded-shirtpng.png'),
(20, 'Rugby clothing', '20.00', 'Our 20th database item!', 'clothing', 0, '..\\productimages\\20-oldschool-jersey.png'),
(21, 'Golf footwear', '21.00', 'Our 21th database item!', 'footwear', 1, '..\\productimages\\21-sneaker.png'),
(22, 'Sporting balls', '22.00', 'Our 22th database item!', 'equipment', 0, '..\\productimages\\22-ball-icon.png'),
(23, 'Football tees', '23.00', 'Our 23th database item!', 'equipment', 0, '..\\productimages\\23-ball-icon.png'),
(24, 'New fan clothing', '24.00', 'Our 24th database item!', 'fanclothing', 0, '..\\productimages\\24-oldschool-jersey.png'),
(25, 'Shirts', '25.00', 'Our 25th database item!', 'clothing', 0, '..\\productimages\\25-folded-shirtpng.png'),
(26, 'Training shoes', '26.00', 'Our 26th database item!', 'footwear', 0, '..\\productimages\\26-blue-trainers.jpg'),
(27, 'Baseball bat', '27.00', 'Our 27th database item!', 'equipment', 0, '..\\productimages\\27-ball-icon.png'),
(28, 'Sporting hat', '28.00', 'Our 28th database item!', 'fanclothing', 0, '..\\productimages\\28-oldschool-jersey.png'),
(29, 'Baseball jersey', '29.00', 'Our 29th database item!', 'clothing', 0, '..\\productimages\\29-oldschool-jersey.png'),
(30, 'Baseball cleats', '30.00', 'Our 30th database item!', 'footwear', 1, '..\\productimages\\30-sneaker.png'),
(31, 'Baseball bag', '31.00', 'Our 31th database item!', 'equipment', 0, '..\\productimages\\31-ball-icon.png'),
(32, 'Baseball jersey', '34.00', 'Our 34th database item!', 'fanclothing', 0, '..\\productimages\\32-oldschool-jersey.png'),
(33, 'Baseball undershirt', '33.00', 'Our 33th database item!', 'clothing', 0, '..\\productimages\\33-oldschool-jersey.png'),
(34, 'Ice skates', '34.00', 'Our 34th database item!', 'footwear', 0, '..\\productimages\\34-blue-trainers.jpg'),
(35, 'Mouth guard', '35.00', 'Our 35th database item!', 'equipment', 0, '..\\productimages\\35-ball-icon.png'),
(36, 'Ice hockey jersey', '36.00', 'Our 36th database item!', 'fanclothing', 0, '..\\productimages\\36-oldschool-jersey.png'),
(37, 'Basketball shirt', '37.00', 'Our 37th database item!', 'clothing', 0, '..\\productimages\\37-folded-shirtpng.png'),
(38, 'Basketball shoes', '38.00', 'Our 38th database item!', 'footwear', 0, '..\\productimages\\38-sneaker.png'),
(39, 'Basketball net', '39.00', 'Our 39th database item!', 'equipment', 0, '..\\productimages\\39-ball-icon.png'),
(40, 'Basketball team jersey', '40.00', 'Our 40th database item!', 'fanclothing', 0, '..\\productimages\\40-folded-shirtpng.png'),
(41, 'Golf shirt', '41.00', 'Our 41th database item!', 'clothing', 0, '..\\productimages\\41-folded-shirtpng.png'),
(42, 'Golf shoes', '42.00', 'Our 42th database item!', 'footwear', 1, '..\\productimages\\42-blue-trainers.jpg'),
(43, 'Golf clubs', '43.00', 'Our 43th database item!', 'equipment', 0, '..\\productimages\\43-ball-icon.png'),
(44, 'Golf fan clothing shirt', '44.00', 'Our 44th database item!', 'fanclothing', 1, '..\\productimages\\44-folded-shirtpng.png'),
(45, 'Rugby clothing', '45.00', 'Our 45th database item!', 'clothing', 0, '..\\productimages\\45-oldschool-jersey.png'),
(46, 'Rugby shoes', '46.00', 'Our 46th database item!', 'footwear', 1, '..\\productimages\\46-blue-trainers.jpg'),
(47, 'Rugby ball', '47.00', 'Our 47th database item!', 'equipment', 0, '..\\productimages\\47-ball-icon.png'),
(48, 'Fan clothing shirt', '48.00', 'Our 48th database item!', 'fanclothing', 0, '..\\productimages\\48-folded-shirtpng.png'),
(49, 'Tournament size soccer ball', '49.00', 'Our 49th database item!', 'equipment', 1, '..\\productimages\\49-ball-icon.png'),
(50, 'Kids size soccer ball', '50.00', 'Our 50th database item!', 'equipment', 0, '..\\productimages\\50-ball-icon.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
