-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2019 at 11:16 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `africand_kentour`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountpayment`
--

CREATE TABLE `accountpayment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `required` double NOT NULL,
  `paid` double NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountpayment`
--

INSERT INTO `accountpayment` (`id`, `userid`, `username`, `required`, `paid`, `balance`) VALUES
(13, 26, 'Jannet', 50000, 50000, 0),
(14, 27, 'Caleb', 50000, 50000, 0),
(15, 28, 'Kelvin', 50000, 50000, 0),
(16, 29, 'Muchemi', 500000, 500000, 0),
(17, 30, 'riungu', 500000, 980000, -480000),
(18, 30, 'riungu', 500000, 980000, -480000),
(19, 31, 'Mike', 500000, 0, 500000),
(20, 32, 'Sam', 500000, 0, 500000),
(22, 33, 'Kennedy', 500000, 0, 500000),
(28, 34, 'Grace', 500000, 0, 500000),
(31, 35, 'Harry', 500000, 0, 500000),
(35, 37, 'Kent', 500000, 0, 500000),
(36, 38, 'Ken', 500000, 0, 500000),
(40, 39, 'Daniel', 500000, 0, 500000),
(41, 40, 'Daniel', 500000, 0, 500000),
(42, 41, 'Dorothy', 500000, 500000, 0),
(44, 42, 'Gabriel', 500000, 0, 500000),
(45, 43, 'Hub', 500000, 0, 500000),
(47, 44, 'Raven', 500000, 12400, 487600),
(48, 45, 'Fidelis', 500000, 450000, 50000),
(49, 46, 'David', 500000, 500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin1', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Table structure for table `cashloanpayments`
--

CREATE TABLE `cashloanpayments` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `loanid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `mode` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashloanpayments`
--

INSERT INTO `cashloanpayments` (`id`, `mid`, `username`, `loanid`, `amount`, `mode`, `date`, `time`, `status`) VALUES
(4, 28, 'user003', 24, 2000, 'Cash', '2019-08-20', '02:59:03', 'APPROVED'),
(5, 28, 'user003', 24, 1, 'Cash', '2019-08-20', '03:02:52', 'REJECTED'),
(6, 28, 'user003', 24, 1, 'Cash', '2019-08-20', '03:05:33', 'REJECTED'),
(7, 28, 'user003', 24, 2121, 'Cash', '2019-08-20', '03:05:44', 'REJECTED'),
(8, 30, 'riungu', 41, 80000, 'Cash', '2019-12-03', '08:29:28', 'APPROVED'),
(9, 30, 'riungu', 41, 30000, 'Cash', '2019-12-03', '08:31:59', 'APPROVED'),
(10, 29, 'Muchemi', 42, 20000, 'Cash', '2019-12-03', '03:52:26', 'APPROVED'),
(11, 29, 'Muchemi', 42, 30000, 'Cash', '2019-12-04', '07:41:00', 'APPROVED'),
(12, 29, 'Muchemi', 31, 5000, 'Cash', '2019-12-04', '06:33:12', 'PENDING '),
(13, 29, 'Muchemi', 27, 2000, 'Cash', '2019-12-04', '08:03:16', 'PENDING '),
(14, 29, 'Muchemi', 35, 2000, 'Cheque', '2019-12-10', '07:52:54', 'PENDING ');

-- --------------------------------------------------------

--
-- Table structure for table `cashloans`
--

CREATE TABLE `cashloans` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dateapplied` date NOT NULL,
  `timeapplied` time NOT NULL,
  `datedue` date NOT NULL,
  `memberid` int(11) NOT NULL,
  `membername` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashloans`
--

INSERT INTO `cashloans` (`id`, `amount`, `dateapplied`, `timeapplied`, `datedue`, `memberid`, `membername`, `purpose`, `status`) VALUES
(24, 0, '2019-08-20', '02:56:40', '2019-09-19', 28, 'user003', 'a quick fix ', 'APPROVED'),
(25, 2000, '2019-09-11', '05:46:48', '2019-10-11', 26, 'user001', 'buying me a wife', 'REJECTED'),
(26, 12121, '2019-09-11', '06:11:51', '2019-10-11', 26, 'user001', 'testing rejection \r\n', 'REJECTED'),
(27, 20000, '2019-09-11', '07:32:50', '2019-10-11', 29, 'Muchemi', 'Buy animal food', 'APPROVED'),
(28, 3000, '2019-09-11', '07:38:17', '2019-10-11', 29, 'Muchemi', 'Emergency', 'REJECTED'),
(29, 40000, '2019-09-11', '08:27:07', '2019-10-11', 29, 'Muchemi', 'Rent', 'REJECTED'),
(30, 23, '2019-09-12', '10:29:14', '2019-10-12', 26, 'user001', 'Trrr', 'APPROVED'),
(31, 5000, '2019-10-15', '06:32:05', '2019-11-14', 29, 'Muchemi', 'Buy animal feeds', 'APPROVED'),
(32, 50000, '2019-11-27', '03:18:42', '2019-12-27', 29, 'Muchemi', 'Hutdv', 'APPROVED'),
(33, 50000, '2019-12-01', '06:16:51', '2019-12-31', 29, 'Muchemi', 'Holiday', 'APPROVED'),
(34, 50000, '2019-12-01', '06:17:01', '2019-12-31', 29, 'Muchemi', 'Holiday', 'APPROVED'),
(35, 2000, '2019-12-01', '07:35:01', '2019-12-31', 29, 'Muchemi', 'Certificate renewal', 'APPROVED'),
(36, 5000, '2019-12-01', '01:28:52', '2019-12-31', 26, 'Jannet', 'Emergency', 'PENDING'),
(37, 5000, '2019-12-01', '04:19:22', '2019-12-31', 29, 'Muchemi', 'Emergency', 'APPROVED'),
(38, 2000, '2019-12-01', '06:44:04', '2019-12-31', 29, 'Muchemi', 'Fees', 'APPROVED'),
(39, 200000, '2019-12-02', '08:20:40', '2020-01-01', 29, 'Muchemi', 'Buy land', 'PENDING'),
(40, 69000, '2019-12-02', '02:34:33', '2020-01-01', 29, 'Muchemi', 'Grazing', 'APPROVED'),
(41, -10000, '2019-12-03', '08:27:57', '2020-01-02', 30, 'riungu', 'Buy land', 'APPROVED'),
(42, 0, '2019-12-03', '03:50:17', '2020-01-02', 29, 'Muchemi', 'Leisure', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `staff` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `subject`, `message`, `feedback`, `staff`, `date`, `status`) VALUES
(2, 'muchemi', 'muchemi@gmail.com', 'debt weiver', 'can a debt be weivered if a user still has arrears to another pre existing loan ?', '', '', '2019-12-10', 'PENDING'),
(3, 'Jannet', 'user001@gmail.com', 'Land buying', 'Can i buy multiple lands at a time', 'not really. but visit our offices at nairobi', '', '2019-12-10', 'ATTENDED');

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `lid` int(11) NOT NULL,
  `landtitle` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `cost` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateadded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`lid`, `landtitle`, `location`, `cost`, `image`, `description`, `status`, `dateadded`) VALUES
(1, 'Gambini Lands', 'Limuru', 300000, 'l1.jpg', 'a masive piece of land located near a town ', 'UNAVAILABLE', '2019-08-15'),
(2, 'sample title', 'kamakwa', 150000, 'l2.jpg', 'sample of land description', 'UNAVAILABLE', '2019-08-15'),
(3, 'third land', 'karen', 600000, 'l3.jpg', 'a huge  vegetation of land ', 'UNAVAILABLE', '2019-08-15'),
(5, 'land 42', 'Nairutia', 80000, 'l4.jpg', 'a 2 acres land located in Nairutia ', 'UNAVAILABLE', '2019-08-15'),
(6, 'umoja', 'Ndia', 500000, 'l1.jpg', 'fertile', 'UNAVAILABLE', '2019-11-19'),
(7, 'graze land', 'kilifi', 450000, 'l2.jpg', 'grazing', 'UNAVAILABLE', '2019-11-19'),
(8, 'plantation', 'Kinangop', 320000, 'l2.jpg', 'fertile', 'UNAVAILABLE', '2019-12-02'),
(10, 'Cultivation Land', 'Eldoret', 200000, 'l5.jpg', 'good with horticulture', 'UNAVAILABLE', '2019-12-02'),
(12, 'Horticultural ', 'Kitale', 1800000, '', 'flat land', 'AVAILABLE', '2019-12-05'),
(14, 'Coffe sector', 'Nyeri', 20000, '', 'coffee well maintained', 'AVAILABLE', '2019-12-05'),
(16, 'Rocky', 'Turkana', 50000, '', 'Tourism site', 'AVAILABLE', '2019-12-07'),
(17, 'Mwembe Tayari', 'Voi, Mombasa', 11400000, 'mwem.jpg', 'A flat and rich fertile land good for planting and building an estate structure ', 'AVAILABLE', '2019-12-07'),
(18, 'Mwangi Lands', 'Kiganjo, Thika', 5000000, 'mwas.jpg', 'located at the urban centers of thik, mwangi lands are best suited  for households that do farming and business as well as building residential properties', 'AVAILABLE', '2019-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `landapplications`
--

CREATE TABLE `landapplications` (
  `id` int(11) NOT NULL,
  `landid` int(11) NOT NULL,
  `landtitle` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `memberid` varchar(255) NOT NULL,
  `dateapplied` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landapplications`
--

INSERT INTO `landapplications` (`id`, `landid`, `landtitle`, `cost`, `memberid`, `dateapplied`, `status`) VALUES
(1, 2, 'sample title', 150000, 'user001', '2019-09-11', 'REJECTED'),
(2, 1, 'Gambini Lands', 0, 'Muchemi', '2019-09-11', 'APPROVED'),
(3, 3, 'third land', 600000, 'Muchemi', '2019-12-01', 'REJECTED'),
(4, 5, 'land 42', 80000, 'Muchemi', '2019-12-01', 'APPROVED'),
(5, 6, 'umoja', 500000, 'muchemi', '2019-12-02', 'REJECTED'),
(6, 7, 'graze land', 450000, 'muchemi', '2019-12-02', 'APPROVED'),
(7, 10, 'Cultivation Land', 0, 'riungu', '2019-12-03', 'APPROVED'),
(8, 3, 'third land', 600000, 'Jannet', '2019-12-05', 'REJECTED'),
(9, 8, 'plantation', 320000, 'Jannet', '2019-12-07', 'REJECTED'),
(10, 18, 'Mwangi Lands', 5000000, 'muchemi', '2019-12-07', 'REJECTED'),
(11, 16, 'Rocky', 50000, 'Mike', '2019-12-07', 'REJECTED');

-- --------------------------------------------------------

--
-- Table structure for table `landpayments`
--

CREATE TABLE `landpayments` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `landid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `mode` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landpayments`
--

INSERT INTO `landpayments` (`id`, `mid`, `username`, `landid`, `amount`, `mode`, `date`, `time`, `status`) VALUES
(1, 29, 'Muchemi', 2, 20000, 'Cash', '2019-09-11', '07:36:59', 'APPROVED'),
(2, 29, 'Muchemi', 2, 52000, 'Cash', '2019-11-27', '03:20:10', 'APPROVED'),
(3, 29, 'Muchemi', 2, 5000, 'Bank Deposit', '2019-12-01', '07:35:29', 'APPROVED'),
(4, 29, 'Muchemi', 2, 5000, 'Cheque', '2019-12-01', '07:36:23', 'APPROVED'),
(5, 29, 'Muchemi', 2, 28000, 'Cash', '2019-12-03', '08:08:48', 'APPROVED'),
(6, 29, 'Muchemi', 2, 2000, 'Cash', '2019-12-03', '08:15:12', 'APPROVED'),
(7, 30, 'riungu', 7, 200000, 'Cash', '2019-12-03', '08:44:27', 'APPROVED'),
(8, 29, 'Muchemi', 2, 188000, 'Cash', '2019-12-05', '11:18:40', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(14) NOT NULL,
  `password` varchar(255) NOT NULL,
  `guarantor1` varchar(255) NOT NULL,
  `g1status` varchar(255) NOT NULL,
  `guarantor2` varchar(255) NOT NULL,
  `g2status` varchar(255) NOT NULL,
  `accountStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `tel`, `password`, `guarantor1`, `g1status`, `guarantor2`, `g2status`, `accountStatus`) VALUES
(26, 'Jannet', 'user001@gmail.com', 714563789, '5f4dcc3b5aa765d61d8327deb882cf99', 'Caleb', 'APPROVED', 'Kelvin', 'APPROVED', 'ACTIVE'),
(27, 'Caleb', 'user002@gmail.com', 745963785, '5f4dcc3b5aa765d61d8327deb882cf99', 'Jannet', 'APPROVED', 'Kelvin', 'APPROVED', 'ACTIVE'),
(28, 'Kelvin', 'user003@gmail.com', 714526398, '5f4dcc3b5aa765d61d8327deb882cf99', 'Jannet', 'APPROVED', 'Caleb', 'APPROVED', 'ACTIVE'),
(29, 'Muchemi', 'muchemi@gmail.com', 736986532, '7331f0ed0564b54704c238ede5ee03ef', 'Caleb', 'APPROVED', 'Kelvin', 'APPROVED', 'ACTIVE'),
(30, 'riungu', 'riungu@gmail.com', 723125896, '827ccb0eea8a706c4c34a16891f84e7b', 'Jannet', 'APPROVED', 'Jannet', 'APPROVED', 'ACTIVE'),
(31, 'Mike', 'mike@gmail.com', 2147483647, '18126e7bd3f84b3f3e4df094def5b7de', 'Dorothy', 'APPROVED', 'Caleb', 'APPROVED', 'ACTIVE'),
(32, 'Sam', 'sam@gmail.com', 2147483647, '332532dcfaa1cbf61e2a266bd723612c', 'Jannet', 'APPROVED', 'Muchemi', 'APPROVED', 'ACTIVE'),
(33, 'Kennedy', 'sonniekigaya@gmail.com', 715610463, '5f4dcc3b5aa765d61d8327deb882cf99', 'Jannet', 'APPROVED', 'Kelvin', 'APPROVED', 'ACTIVE'),
(34, 'Grace', 'grace@ymail.com', 789654123, '15e5c87b18c1289d45bb4a72961b58e8', 'Muchemi', 'APPROVED', 'riungu', 'APPROVED', 'ACTIVE'),
(35, 'Harry', 'harry@gmail.com', 725432145, '3b87c97d15e8eb11e51aa25e9a5770e9', 'Jannet', 'APPROVED', 'Muchemi', 'APPROVED', 'ACTIVE'),
(36, 'Kent', 'kent@gmail.com', 758456321, '564f10260067a9b0c8d8e206ecdb49c6', 'Jannet', 'APPROVED', 'Muchemi', 'APPROVED', 'REJECTED'),
(38, 'Ken', 'ken@yahoo.com', 796385274, 'f632fa6f8c3d5f551c5df867588381ab', 'Kelvin', 'APPROVED', 'riungu', 'APPROVED', 'REJECTED'),
(39, 'Daniel', 'daniel@gmail.com', 714258369, 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'Jannet', 'APPROVED', 'Muchemi', 'APPROVED', 'REJECTED'),
(41, 'Dorothy', 'dorothy@gmail.com', 714258369, 'c5483d8bfb22e65a48099ac0075ed64b', 'Jannet', 'APPROVED', 'Caleb', 'APPROVED', 'ACTIVE'),
(42, 'Gabriel', 'gabriel@ymail.com', 785693214, '647431b5ca55b04fdf3c2fce31ef1915', 'Jannet', 'APPROVED', 'Caleb', 'REJECTED', 'INNACTIVE'),
(43, 'Hub', 'hub@yahoo.com', 718231452, '5261539cab7de0487b6b41415acc7f61', 'Kennedy', 'APPROVED', 'Jannet', 'APPROVED', 'ACTIVE'),
(44, 'Raven', 'raven@gmail.com', 745123786, '907e131eb3bf6f21292fa1ed16e8b60c', 'Jannet', 'APPROVED', 'Kennedy', 'APPROVED', 'ACTIVE'),
(45, 'Fidelis', 'fidelis@gmail', 725836914, '0ed657b253ebbf47691a2b7551bf17b6', 'Caleb', 'APPROVED', 'Jannet', 'APPROVED', 'ACTIVE'),
(46, 'David', 'davidd@kemu.or.ke', 2147483647, '172522ec1028ab781d9dfd17eaca4427', 'Muchemi', 'APPROVED', 'Fidelis', 'APPROVED', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `registrationpayments`
--

CREATE TABLE `registrationpayments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `paidamount` double NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrationpayments`
--

INSERT INTO `registrationpayments` (`id`, `userid`, `username`, `paidamount`, `date`, `time`, `status`, `mode`) VALUES
(11, 26, 'Jannet', 50000, '2019-08-20', '02:47:48', 'APPROVED', 'Cash'),
(12, 27, 'Caleb', 5000, '2019-08-20', '02:53:29', 'APPROVED', 'Cheque'),
(13, 27, 'Caleb', 45000, '2019-08-20', '02:54:16', 'APPROVED', 'Bank Deposit'),
(14, 28, 'Kelvin', 50000, '2019-08-20', '02:55:52', 'APPROVED', 'Cash'),
(15, 29, 'Muchemi', 500000, '2019-09-11', '07:31:38', 'APPROVED', 'Bank Deposit'),
(16, 30, 'riungu', 490000, '2019-11-20', '08:44:18', 'APPROVED', 'Cash'),
(17, 30, 'riungu', 490000, '2019-11-20', '08:45:22', 'APPROVED', 'Cash'),
(18, 30, 'riungu', 490000, '2019-11-20', '08:45:59', 'REJECTED', 'Cash'),
(19, 41, 'Dorothy', 490000, '2019-12-01', '01:47:11', 'APPROVED', 'Cash'),
(20, 41, 'Dorothy', 10000, '2019-12-01', '01:48:34', 'APPROVED', 'Cheque'),
(21, 44, 'Raven', 200, '2019-12-02', '03:47:50', 'APPROVED', 'Bank Deposit'),
(22, 44, 'Raven', 200, '2019-12-02', '03:54:06', 'APPROVED', 'Cash'),
(23, 44, 'Raven', 5000, '2019-12-02', '03:54:31', 'APPROVED', 'Cheque'),
(24, 44, 'Raven', 1800, '2019-12-02', '03:56:00', 'APPROVED', 'Cash'),
(25, 44, 'Raven', 3000, '2019-12-02', '03:57:14', 'APPROVED', 'Cash'),
(26, 44, 'Raven', 1800, '2019-12-02', '03:57:22', 'APPROVED', 'Cash'),
(27, 44, 'Raven', 200, '2019-12-02', '03:57:40', 'APPROVED', 'Cash'),
(28, 44, 'Raven', 200, '2019-12-02', '04:00:55', 'APPROVED', 'Cash'),
(29, 45, 'Fidelis', 50000, '2019-12-02', '02:53:03', 'APPROVED', 'Cheque'),
(30, 45, 'Fidelis', 50000, '2019-12-02', '02:53:23', 'APPROVED', 'Cheque'),
(31, 45, 'Fidelis', 350000, '2019-12-02', '02:55:27', 'APPROVED', 'Cash'),
(32, 46, 'David', 500000, '2019-12-02', '04:47:20', 'APPROVED', 'Bank Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedaccounts`
--

CREATE TABLE `rejectedaccounts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedaccounts`
--

INSERT INTO `rejectedaccounts` (`id`, `userid`, `username`, `reason`, `date`) VALUES
(1, 36, 'Kent', 'application closed', '2019-12-01'),
(2, 38, 'Ken', 'incomplete information', '2019-12-01'),
(3, 39, 'Daniel', 'nationality id not complete', '2019-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedlanreasons`
--

CREATE TABLE `rejectedlanreasons` (
  `id` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedlanreasons`
--

INSERT INTO `rejectedlanreasons` (`id`, `appid`, `memid`, `reason`, `date`) VALUES
(1, 1, 'user001', 'doesnt have enough assets\r\n', '2019-09-11'),
(2, 3, 'Muchemi', 'wert', '2019-12-03'),
(4, 5, 'muchemi', 'Title not ready', '2019-12-04'),
(6, 1, 'user001', 'you have delayed the payments', '2019-12-05'),
(7, 8, 'Jannet', 'you have not paid the other land', '2019-12-05'),
(8, 9, 'Jannet', 'you have pending loan', '2019-12-07'),
(10, 10, 'muchemi', 'test 2 for availability ', '2019-12-07'),
(11, 11, 'Mike', 'Land has court case', '2019-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedloanreasons`
--

CREATE TABLE `rejectedloanreasons` (
  `id` int(11) NOT NULL,
  `loanid` int(11) NOT NULL,
  `memid` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedloanreasons`
--

INSERT INTO `rejectedloanreasons` (`id`, `loanid`, `memid`, `reason`, `date`) VALUES
(2, 25, 26, 'not good enough', '2019-09-11'),
(3, 26, 26, 'No funds at the moment', '2019-09-11'),
(4, 28, 29, 'You have a huge balance', '2019-09-11'),
(5, 29, 29, 'not available', '2019-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateadded` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `email`, `password`, `dateadded`, `status`) VALUES
(1, 'staff001', 'staff001@gmail.com', '1ef85d9969c3e29713566390a2e761b7', '2019-08-15', 'ACTIVE'),
(2, 'staff002', 'staff002@gmail.com', 'be66ba7a1565329e7e2a6727174e9d41', '2019-08-15', 'INNACTIVE'),
(3, 'precious', 'precious@gmail.com', '23f9d50ecd20ccc464f4ad45a3328948', '2019-12-01', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountpayment`
--
ALTER TABLE `accountpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashloanpayments`
--
ALTER TABLE `cashloanpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashloans`
--
ALTER TABLE `cashloans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `landapplications`
--
ALTER TABLE `landapplications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landpayments`
--
ALTER TABLE `landpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrationpayments`
--
ALTER TABLE `registrationpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejectedaccounts`
--
ALTER TABLE `rejectedaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejectedlanreasons`
--
ALTER TABLE `rejectedlanreasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejectedloanreasons`
--
ALTER TABLE `rejectedloanreasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountpayment`
--
ALTER TABLE `accountpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashloanpayments`
--
ALTER TABLE `cashloanpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cashloans`
--
ALTER TABLE `cashloans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `landapplications`
--
ALTER TABLE `landapplications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `landpayments`
--
ALTER TABLE `landpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `registrationpayments`
--
ALTER TABLE `registrationpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rejectedaccounts`
--
ALTER TABLE `rejectedaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rejectedlanreasons`
--
ALTER TABLE `rejectedlanreasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rejectedloanreasons`
--
ALTER TABLE `rejectedloanreasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
