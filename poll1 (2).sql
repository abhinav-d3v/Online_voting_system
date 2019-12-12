-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2019 at 12:07 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllData`()
SELECT * from tbpositions$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrators`
--

CREATE TABLE IF NOT EXISTS `tbadministrators` (
  `admin_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadministrators`
--

INSERT INTO `tbadministrators` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Abhinav', 'Singh', 'abhinav.17.becs@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbcandidates`
--

CREATE TABLE IF NOT EXISTS `tbcandidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_position` varchar(45) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcandidates`
--

INSERT INTO `tbcandidates` (`candidate_id`, `candidate_name`, `candidate_position`, `candidate_cvotes`) VALUES
(1, 'Narendra Modi', 'Prime-Ministel', 4667),
(2, 'Rahul Gandhi', 'Prime-Ministel', 2555),
(3, 'Mamta Banerjee', 'Prime-Ministel', 4836),
(4, 'rakesh', 'CM', 0),
(5, 'mahesh', 'CM', 0),
(6, 'sd', 'techer', 1),
(7, 'dds', 'techer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbelection`
--

CREATE TABLE IF NOT EXISTS `tbelection` (
  `election_types` varchar(20) DEFAULT NULL,
  `no_of_seats` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbelection`
--

INSERT INTO `tbelection` (`election_types`, `no_of_seats`) VALUES
('ASSEMBLY', 100),
('CABINET', 20),
('CABINET', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbmembers`
--

CREATE TABLE IF NOT EXISTS `tbmembers` (
  `member_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmembers`
--

INSERT INTO `tbmembers` (`member_id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, 'Abhinav', 'Singh', 'abhinav.17.becs@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'unvoted'),
(3, 'Kaml', 'das', 'das@gmail.com', '202cb962ac59075b964b07152d234b70', 'unvoted'),
(4, 'rohit', 'kumar', 'rohti@gmail.com', '202cb962ac59075b964b07152d234b70', 'unvoted'),
(5, 'kamal', 'thakur', 'kamal@gmail.com', '202cb962ac59075b964b07152d234b70', 'unvoted'),
(6, 'voter1', 'voter1', 'voter1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'unvoted'),
(7, 'cat', 's', 'cat@gmail.com', '202cb962ac59075b964b07152d234b70', 'unvoted'),
(8, 'test', 'tweest', 'test@123', '202cb962ac59075b964b07152d234b70', 'voted');

--
-- Triggers `tbmembers`
--
DELIMITER $$
CREATE TRIGGER `user_trig` BEFORE INSERT ON `tbmembers`
 FOR EACH ROW insert into trigger_time values(now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbpositions`
--

CREATE TABLE IF NOT EXISTS `tbpositions` (
  `position_id` int(5) NOT NULL,
  `position_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpositions`
--

INSERT INTO `tbpositions` (`position_id`, `position_name`) VALUES
(17, 'CM'),
(18, 'Governor'),
(14, 'MLA'),
(15, 'MP'),
(12, 'President'),
(13, 'Prime-Ministel'),
(16, 'Sarpanch'),
(19, 'techer');

-- --------------------------------------------------------

--
-- Table structure for table `trigger_time`
--

CREATE TABLE IF NOT EXISTS `trigger_time` (
  `exec` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trigger_time`
--

INSERT INTO `trigger_time` (`exec`) VALUES
('2019-12-02 08:44:55'),
('2019-12-02 08:45:48'),
('2019-12-02 10:43:00'),
('2019-12-02 12:12:39'),
('2019-12-10 05:10:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD KEY `candidate_position` (`candidate_position`);

--
-- Indexes for table `tbmembers`
--
ALTER TABLE `tbmembers`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbpositions`
--
ALTER TABLE `tbpositions`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `position_name` (`position_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbmembers`
--
ALTER TABLE `tbmembers`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbpositions`
--
ALTER TABLE `tbpositions`
  MODIFY `position_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  ADD CONSTRAINT `tbadministrators_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tbmembers` (`email`);

--
-- Constraints for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  ADD CONSTRAINT `tbcandidates_ibfk_1` FOREIGN KEY (`candidate_position`) REFERENCES `tbpositions` (`position_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
