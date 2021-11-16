-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.epizy.com
-- Generation Time: Nov 16, 2021 at 11:12 AM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30365769_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `propic` varchar(400) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `fname`, `lname`, `email`, `propic`, `balance`) VALUES
(101, 'apoorv', 'mishra', 'apoorvmishra1000@gmail.com', 'propics/apoorv.png', 109450),
(102, 'elon', 'musk', 'elon@gmail.com', 'propics/elon.png', 14400),
(103, 'arpit', 'mishra', 'arpit@gmail.com', 'propics/arpit.jpg', 91500),
(104, 'mahima', 'mishra', 'mahima@gmail.com', 'propics/mahima.jpg', 100150),
(105, 'neha', 'mishra', 'neha@gmail.com', 'propics/neha.jpg', 89500);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transactionID` int(11) NOT NULL,
  `fromID` int(11) NOT NULL,
  `toID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transactionID`, `fromID`, `toID`, `amount`, `datetime`) VALUES
(10000001, 102, 101, 100, '2021-11-15 18:53:39'),
(10000002, 103, 102, 10000, '2021-11-15 18:56:17'),
(10000003, 105, 101, 10000, '2021-11-15 20:14:01'),
(10000004, 101, 104, 50, '2021-11-15 20:29:22'),
(10000005, 101, 103, 1000, '2021-11-15 20:35:16'),
(10000006, 105, 103, 500, '2021-11-15 21:10:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
