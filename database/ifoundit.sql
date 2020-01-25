-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 05:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifoundit`
--

-- --------------------------------------------------------

--
-- Table structure for table `iadmin`
--

CREATE TABLE `iadmin` (
  `id` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iadmin`
--

INSERT INTO `iadmin` (`id`, `Username`, `Password`, `Email`, `Date`) VALUES
(1, 'Hemal', 'hemal10', 'buhahemal10@gmailcom', '2019-11-07 04:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `icategory`
--

CREATE TABLE `icategory` (
  `Id` int(11) NOT NULL,
  `Category_Name` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL,
  `Admin_Id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icategory`
--

INSERT INTO `icategory` (`Id`, `Category_Name`, `Status`, `Admin_Id`, `created_at`, `updated_at`) VALUES
(3, 'Wallet', 1, 1, '2019-11-07 20:50:09', '2019-11-18 06:46:50'),
(4, 'Books', 1, 1, '2019-11-14 08:32:28', '2019-11-18 06:46:38'),
(5, 'Watch', 1, 1, '2019-11-14 08:33:56', '2019-11-18 06:46:11'),
(6, 'Phones', 1, 1, '2019-11-15 07:14:06', '2019-11-18 06:45:54'),
(7, 'Identity Cards', 1, 1, '2019-11-18 06:47:14', '2019-11-18 06:47:14'),
(8, 'Laptops', 1, 1, '2019-11-18 06:47:46', '2019-11-18 06:47:46'),
(9, 'Keys', 1, 1, '2019-11-18 06:48:24', '2019-11-18 06:48:24'),
(10, 'Paper Works', 1, 1, '2019-11-18 06:48:41', '2019-11-18 06:48:41'),
(11, 'Glasses', 1, 1, '2019-11-18 06:49:58', '2019-11-18 06:49:58'),
(12, 'Others', 1, 1, '2019-11-18 06:52:29', '2019-11-18 06:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `iitemcliam`
--

CREATE TABLE `iitemcliam` (
  `Id` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `PostUserId` int(11) NOT NULL,
  `ClaimUserId` int(11) NOT NULL,
  `CliamDescription` text NOT NULL,
  `Status` int(11) NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iitems`
--

CREATE TABLE `iitems` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Status` int(11) NOT NULL,
  `ClaimUserId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `verifed` int(11) NOT NULL COMMENT '0 No,1 Yes',
  `Image` varchar(100) DEFAULT NULL,
  `URNNO` varchar(20) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Email`, `verifed`, `Image`, `URNNO`, `Status`, `Date`) VALUES
(1, 'Admin', '12', 'buhahemal10@gmail.com', 1, 'defaultuser.png', '0', 1, '2020-01-09 16:48:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iadmin`
--
ALTER TABLE `iadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icategory`
--
ALTER TABLE `icategory`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `AdminID` (`Admin_Id`);

--
-- Indexes for table `iitemcliam`
--
ALTER TABLE `iitemcliam`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UseriD2` (`PostUserId`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `iitems`
--
ALTER TABLE `iitems`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category` (`Cat_id`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iadmin`
--
ALTER TABLE `iadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `icategory`
--
ALTER TABLE `icategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `iitemcliam`
--
ALTER TABLE `iitemcliam`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iitems`
--
ALTER TABLE `iitems`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `icategory`
--
ALTER TABLE `icategory`
  ADD CONSTRAINT `AdminID` FOREIGN KEY (`Admin_Id`) REFERENCES `iadmin` (`id`);

--
-- Constraints for table `iitemcliam`
--
ALTER TABLE `iitemcliam`
  ADD CONSTRAINT `ItemId` FOREIGN KEY (`ItemId`) REFERENCES `iitems` (`Id`),
  ADD CONSTRAINT `UseriD2` FOREIGN KEY (`PostUserId`) REFERENCES `users` (`Id`);

--
-- Constraints for table `iitems`
--
ALTER TABLE `iitems`
  ADD CONSTRAINT `Category` FOREIGN KEY (`Cat_id`) REFERENCES `icategory` (`id`),
  ADD CONSTRAINT `UserId` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
