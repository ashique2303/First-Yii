-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 01:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Level` varchar(11) NOT NULL,
  `ParentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`ID`, `Name`, `UserName`, `Password`, `Level`, `ParentID`) VALUES
(1, 'Admin', 'admin', 'admin', 'Admin', 1),
(2, 'Ashique', 'ashique', '123', 'Agent', 1),
(3, 'Arnob', 'arnob', '123', 'Agent', 1),
(4, 'Pritam', 'pritam', '123', 'Member', 2),
(5, 'Swarna', 'swarna', '123', 'Member', 2),
(6, 'Sutapa', 'sutapa', '123', 'Member', 3),
(7, 'Imran', 'imran', '123', 'Agent', 1),
(8, 'Masum', 'masum', '123', 'Member', 3),
(9, 'Adnan', 'adnan', '123', 'Member', 7),
(10, 'Shawki', 'shawki', '123', 'Agent', 1),
(11, 'Hasnain', 'hasnain', '123', 'Member', 7),
(12, 'Mostain', 'mostain', '123', 'Member', 10),
(13, 'Noman', 'noman', '123', 'Member', 10),
(14, 'Nixon', 'nixon', '123', 'Member', 2),
(15, 'Moral', 'moral', '123', 'Agent', 1),
(16, 'Ashique Rahman', 'rahman', '123', 'Member', 2),
(17, 'Hasan', 'hasan', '123', 'Member', 2),
(18, 'Nayan', 'nayan', '123', 'Member', 15);

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `ImageID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `ParentID` int(11) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Caption` varchar(500) NOT NULL,
  `ShareWith` varchar(500) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`ImageID`, `UserName`, `ParentID`, `Image`, `Caption`, `ShareWith`, `Time`) VALUES
(10, 'ashique', 1, '2303-UBLOGO.PNG', 'Asfsf', '1', '2018-03-08 04:36:22'),
(11, 'pritam', 2, '2703-greenSHot.PNG', 'Green', '1', '2018-03-08 04:55:57'),
(12, 'admin', 1, '1296-blackheart.PNG', 'Black', '5', '2018-03-08 05:23:58'),
(13, 'nixon', 2, '5136-Capture2.PNG', 'HUTJGJg', '5', '2018-03-08 05:38:00'),
(14, 'adnan', 7, '5410-Capture.PNG', 'AA', '8', '2018-03-08 10:07:41'),
(15, 'admin', 1, '7190-Ashique.jpg', 'boka chele', '9', '2018-03-08 10:29:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`ImageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
