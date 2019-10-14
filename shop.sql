-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 10:16 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_price` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_user` int(11) NOT NULL,
  `item_img` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `item_name`, `item_price`, `item_user`, `item_img`, `item_id`) VALUES
(107, 'iphone xs', '12000', 96, '355448-9713620058162.jpg', 41),
(108, 'Samsung A10', '2499,99 ', 96, '226317-9973492645938.jpg', 40);

-- --------------------------------------------------------

--
-- Table structure for table `categoris`
--

CREATE TABLE `categoris` (
  `ID` int(6) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `Ordering` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `cat_icon` text CHARACTER SET utf8 NOT NULL,
  `Visibility` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_comment` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_ads` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `categoris`
--

INSERT INTO `categoris` (`ID`, `Name`, `Description`, `Ordering`, `parent`, `cat_icon`, `Visibility`, `Allow_comment`, `Allow_ads`) VALUES
(67, 'Electronics', 'Lorem Ipsum is simply dummy text of the printing and typesetting.', 5, 0, '<i class=\"fas fa-mobile-alt\"></i>', 1, 1, 1),
(69, 'samsung ', 'Lorem Ipsum is simply dummy text of the printing and typesetting.', 7, 67, '<i class=\"fas fa-mobile-alt\"></i>', 1, 1, 1),
(70, 'Giyim & Ayakkabı', 'Lorem Ipsum is simply dummy text of the printing and typesetting.', 12, 0, '<i class=\"fas fa-tshirt\"></i>', 1, 1, 1),
(71, 'Ev & Yaşam', 'Lorem Ipsum is simply dummy text of the printing and typesetting.', 3, 0, '<i class=\"fas fa-home\"></i>', 1, 1, 1),
(72, 'iphone', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 6, 67, '', 1, 1, 1),
(73, 'Erkek', 'Lorem Ipsum is simply dummy text of the printing and typesetting.', 13, 70, '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `comment_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Rating` smallint(6) NOT NULL,
  `Approve` tinyint(4) NOT NULL DEFAULT '0',
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `item_img` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `item_img_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_ID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Image`, `Status`, `Rating`, `Approve`, `Cat_ID`, `Member_ID`, `item_img`, `item_img_2`) VALUES
(40, 'Samsung A10', 'Lorem Ipsum is simply dummy text of the printing and typesetting.', '2499,99 ', '2019-08-25', 'Turkey', '', '1', 0, 1, 69, 96, '226317-9973492645938.jpg', '489259-9973492613170.jpg'),
(41, 'iphone xs', 'Lorem Ipsum is simply dummy text of the printing and typesetting.', '12000', '2019-08-25', 'Turkey', '', '1', 0, 1, 72, 96, '355448-9713620058162.jpg', '471327-9713620090930.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userPhone` int(11) NOT NULL,
  `Fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `GrupID` int(11) NOT NULL DEFAULT '0',
  `TrustStatus` int(11) NOT NULL DEFAULT '0',
  `RegStatus` int(11) NOT NULL DEFAULT '0',
  `Date` date NOT NULL,
  `avater` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `userPhone`, `Fullname`, `GrupID`, `TrustStatus`, `RegStatus`, `Date`, `avater`) VALUES
(96, 'amer', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'amersayed998@gmail.com', 0, 'amer sayed', 1, 0, 1, '2019-08-25', '5343-93747-pp (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `item_id` (`item_user`);

--
-- Indexes for table `categoris`
--
ALTER TABLE `categoris`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `items_comment` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `member_1` (`Member_ID`),
  ADD KEY `cat_1` (`Cat_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `categoris`
--
ALTER TABLE `categoris`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_user`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `items_comment` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`Cat_ID`) REFERENCES `categoris` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`Member_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
