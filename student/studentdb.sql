-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 12:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(5) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `tutorgroupID` int(3) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `firstname`, `lastname`, `tutorgroupID`, `photo`) VALUES
(1, 'Porter', 'Richardson', 1, 'porterrichardson.jpg'),
(3, 'Odysseus', 'Conner', 1, 'odysseusconner.jpg'),
(4, 'Kevin', 'Stafford', 1, 'kevinstafford.jpg'),
(5, 'John', 'Skinner', 1, 'johnskinner.jpg'),
(6, 'Kibo', 'Spears', 2, 'kibospears.jpg'),
(7, 'Tyrone', 'George', 2, 'tyronegeorge.jpg'),
(8, 'Akeem', 'Oneill', 2, 'akeemoneill.jpg'),
(9, 'Holmes', 'Anderson', 2, 'holmesanderson.jpg'),
(10, 'Merritt', 'Russo', 2, 'merrittrusso.jpg'),
(11, 'Beau', 'Wilkerson', 3, 'beauwilkerson.jpg'),
(12, 'Kieran', 'Mills', 3, 'kieranmills.jpg'),
(13, 'Fletcher', 'Morales', 3, 'fletchermorales.jpg'),
(14, 'Cyrus', 'McNeil', 3, 'cyrusmcneil.jpg'),
(15, 'Lavinia', 'Moon', 3, 'laviniamoon.jpg'),
(16, 'Anna', 'Head', 4, 'annahead.jpg'),
(17, 'Simon', 'Barlow', 4, 'simonbarlow.jpg'),
(18, 'Carson', 'Blackburn', 4, 'carsonblackburn.jpg'),
(19, 'Brett', 'Alexander', 4, 'brettalexander.jpg'),
(20, 'Howard', 'Cooley', 4, 'howardcooley.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tutorgroup`
--

CREATE TABLE `tutorgroup` (
  `tutorgroupID` int(3) NOT NULL,
  `tutor` varchar(40) NOT NULL,
  `tutorcode` varchar(3) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorgroup`
--

INSERT INTO `tutorgroup` (`tutorgroupID`, `tutor`, `tutorcode`, `photo`) VALUES
(1, 'Ariel Buck', 'ABC', 'abc.jpg'),
(2, 'Pete Argent', 'PAR', 'par.jpg'),
(3, 'Bob Batton', 'BBT', 'bbt.jpg'),
(4, 'Sarah Edmonds', 'SED', 'sed.jpg'),
(6, 'Me', 'MEE', 'mee.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `tutorgroup`
--
ALTER TABLE `tutorgroup`
  ADD PRIMARY KEY (`tutorgroupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tutorgroup`
--
ALTER TABLE `tutorgroup`
  MODIFY `tutorgroupID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
