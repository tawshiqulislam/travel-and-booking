-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2022 at 05:39 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourntravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `busID` int NOT NULL AUTO_INCREMENT,
  `operator` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `origin` varchar(25) NOT NULL,
  `destination` varchar(25) NOT NULL,
  `departure` varchar(10) NOT NULL,
  `arrival` varchar(10) NOT NULL,
  `seats` int NOT NULL,
  `fare` varchar(6) NOT NULL,
  `seatsAvailable` int DEFAULT NULL,
  PRIMARY KEY (`busID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busID`, `operator`, `type`, `origin`, `destination`, `departure`, `arrival`, `seats`, `fare`, `seatsAvailable`) VALUES
(1, 'Eagle Paribahan', 'Eagle Paribahan', 'Chattogram', 'Dhaka', '02:52', '16:52', 30, '500', NULL),
(2, 'Eagle Paribahan', 'Eagle Paribahan', 'Chattogram', 'Dhaka', '02:53', '14:53', 200, '500', NULL),
(4, 'Eagle Paribahan', 'Dhaka Express', 'Brahmanbaria', 'Faridpur', '04:54', '04:54', 40, '800', NULL),
(7, 'Dhaka Express', 'Eagle Paribahan', 'Jashore', 'Dhaka', '03:56', '16:56', 60, '800', NULL),
(10, 'Dhaka Express', 'Eagle Paribahan', 'Jashore', 'Dhaka', '03:56', '16:56', 60, '800', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `busbookings`
--

DROP TABLE IF EXISTS `busbookings`;
CREATE TABLE IF NOT EXISTS `busbookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `cancelled` varchar(50) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `passengers` int NOT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cabbookings`
--

DROP TABLE IF EXISTS `cabbookings`;
CREATE TABLE IF NOT EXISTS `cabbookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `date` varchar(20) NOT NULL,
  `cancelled` varchar(10) NOT NULL,
  `origin` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `carID` int NOT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cabdrivers`
--

DROP TABLE IF EXISTS `cabdrivers`;
CREATE TABLE IF NOT EXISTS `cabdrivers` (
  `carID` int NOT NULL AUTO_INCREMENT,
  `carType` varchar(30) NOT NULL,
  `carModel` varchar(30) NOT NULL,
  `carNo` varchar(20) NOT NULL,
  `driverName` varchar(50) NOT NULL,
  `driverPhone` varchar(20) NOT NULL,
  `driverRating` varchar(10) NOT NULL,
  PRIMARY KEY (`carID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cabs`
--

DROP TABLE IF EXISTS `cabs`;
CREATE TABLE IF NOT EXISTS `cabs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `distance` float NOT NULL,
  `time` int NOT NULL,
  `originCode` varchar(10) NOT NULL,
  `destinationCode` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flightbookings`
--

DROP TABLE IF EXISTS `flightbookings`;
CREATE TABLE IF NOT EXISTS `flightbookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `cancelled` varchar(20) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `passengers` int NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flightbookings`
--

INSERT INTO `flightbookings` (`bookingID`, `username`, `date`, `cancelled`, `origin`, `destination`, `passengers`, `type`) VALUES
(114, 'rafi', '30-04-2022', 'no', 'Jashore', 'Barishal', 2, 'OneWayFlight'),
(115, 'rafi', '30-04-2022', 'no', 'Barishal', 'Jashore', 1, 'ReturnTripFlight');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `flight_no` int NOT NULL AUTO_INCREMENT,
  `origin` varchar(25) NOT NULL,
  `destination` varchar(25) NOT NULL,
  `distance` int NOT NULL,
  `fare` float NOT NULL,
  `class` varchar(10) NOT NULL,
  `seats_available` int NOT NULL,
  `departs` varchar(10) NOT NULL,
  `arrives` varchar(10) NOT NULL,
  `operator` varchar(25) NOT NULL,
  `origin_code` varchar(10) NOT NULL,
  `destination_code` varchar(10) NOT NULL,
  `refundable` varchar(20) NOT NULL,
  `noOfBookings` int NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`flight_no`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_no`, `origin`, `destination`, `distance`, `fare`, `class`, `seats_available`, `departs`, `arrives`, `operator`, `origin_code`, `destination_code`, `refundable`, `noOfBookings`, `date`) VALUES
(7, 'Barishal', 'Jashore', 200, 2900, 'Economy', 39, '03:04', '15:04', 'Novoair', 'BZL', 'JSR', 'Refundable', 13, '2022-05-01'),
(8, 'Barishal', 'Jashore', 200, 2900, 'Economy', 40, '03:04', '15:04', 'Novoair', 'BZL', 'JSR', 'Refundable', 12, '2022-05-01'),
(9, 'Barishal', 'Jashore', 200, 2900, 'Economy', 40, '03:04', '15:04', 'Novoair', 'BZL', 'JSR', 'Refundable', 12, '2022-05-02'),
(10, 'Dhaka', 'Dhaka', 200, 2900, 'Economy', 40, '03:04', '15:04', 'Novoair', 'DAC', 'DAC', 'Refundable', 12, '2022-05-02'),
(11, 'Sylhet', 'Barishal', 400, 4000, 'Economy', 30, '05:28', '17:28', 'Biman', 'ZYL', 'BZL', 'Refundable', 30, '2022-05-01'),
(12, 'Jashore', 'Barishal', 300, 2900, 'Economy', 27, '13:35', '01:35', 'Novoair', 'JSR', 'BZL', 'Refundable', 17, '2022-05-04'),
(13, 'Dhaka', 'Jashore', 300, 2000, 'Economy', 20, '20:24', '22:25', 'Abu', 'DAC', 'JSR', 'Refundable', 8, '2022-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `hotelbookings`
--

DROP TABLE IF EXISTS `hotelbookings`;
CREATE TABLE IF NOT EXISTS `hotelbookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `hotelName` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cancelled` varchar(10) NOT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelbookings`
--

INSERT INTO `hotelbookings` (`bookingID`, `hotelName`, `date`, `username`, `cancelled`) VALUES
(44, 'Hotel Abc, tiger, Chattogram', '26-04-2022', 'arif', 'yes'),
(47, 'Hotel Abc, tiger, Chattogram', '26-04-2022', 'arif', 'yes'),
(48, 'Hotel Abc, tiger, Chattogram', '26-04-2022', 'arif', 'yes'),
(49, 'Hotel Abc, tiger, Chattogram', '26-04-2022', 'arif', 'yes'),
(50, 'aca, Laboni, Coxs Bazar', '26-04-2022', 'arif', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `hotelID` int NOT NULL AUTO_INCREMENT,
  `hotelName` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `stars` int NOT NULL,
  `rating` varchar(5) NOT NULL,
  `hotelDesc` varchar(1000) NOT NULL,
  `checkIn` varchar(6) NOT NULL,
  `checkOut` varchar(6) NOT NULL,
  `price` int NOT NULL,
  `roomsAvailable` int NOT NULL,
  `wifi` varchar(5) NOT NULL,
  `swimmingPool` varchar(5) NOT NULL,
  `parking` varchar(5) NOT NULL,
  `restaurant` varchar(5) NOT NULL,
  `laundry` varchar(5) NOT NULL,
  `cafe` varchar(5) NOT NULL,
  `mainImage` varchar(100) NOT NULL,
  PRIMARY KEY (`hotelID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelID`, `hotelName`, `city`, `locality`, `stars`, `rating`, `hotelDesc`, `checkIn`, `checkOut`, `price`, `roomsAvailable`, `wifi`, `swimmingPool`, `parking`, `restaurant`, `laundry`, `cafe`, `mainImage`) VALUES
(1, 'aca', 'Coxs Bazar', 'Laboni', 5, '5', 'asa sas a', '05:14', '17:14', 13232, 14, 'no', 'non', 'no', 'no', 'no', 'no', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYWFRgVFRUYGRgYGBgaGBgaGBgYGBgaGBgaGRgYG'),
(2, 'ac', 'Coxs Bazar', 'Laboni', 5, '5', 'asa sas a', '05:14', '17:14', 13232, 14, 'no', 'non', 'no', 'no', 'no', 'no', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYWFRgVFRUYGRgYGBgaGBgaGBgYGBgaGBgaGRgYG'),
(3, 'ABC', 'Chattogram', 'ctg', 2, '3', 'abc', '10:26', '10:26', 500, 5, 'abc', '2', 'no', 'no', 'no', 'no', 'zbc');

-- --------------------------------------------------------

--
-- Table structure for table `trainbookings`
--

DROP TABLE IF EXISTS `trainbookings`;
CREATE TABLE IF NOT EXISTS `trainbookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `date` varchar(60) NOT NULL,
  `cancelled` varchar(20) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `passengers` int NOT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainbookings`
--

INSERT INTO `trainbookings` (`bookingID`, `username`, `date`, `cancelled`, `origin`, `destination`, `passengers`) VALUES
(15, 'rafi', '29-04-2022', 'no', 'Chattogram', 'Gazipur', 4);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

DROP TABLE IF EXISTS `trains`;
CREATE TABLE IF NOT EXISTS `trains` (
  `trainNo` int NOT NULL AUTO_INCREMENT,
  `region` varchar(10) NOT NULL,
  `returnTrainNo` int NOT NULL,
  `trainName` varchar(100) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `originCode` varchar(20) NOT NULL,
  `destinationCode` varchar(20) NOT NULL,
  `originTime` varchar(20) NOT NULL,
  `destinationTime` varchar(20) NOT NULL,
  `originPlatform` varchar(10) NOT NULL,
  `destinationPlatform` varchar(10) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `classes` varchar(50) NOT NULL,
  `seats1AC` int NOT NULL,
  `seats2AC` int NOT NULL,
  `seats3AC` int NOT NULL,
  `seatsSL` int NOT NULL,
  `seatsChairCar` int NOT NULL,
  `seatsChairCarAC` int NOT NULL,
  `price1AC` varchar(20) NOT NULL,
  `price2AC` varchar(20) NOT NULL,
  `price3AC` varchar(20) NOT NULL,
  `priceSL` varchar(20) NOT NULL,
  `priceChairCar` varchar(20) NOT NULL,
  `priceChairCarAC` varchar(20) NOT NULL,
  `runsOn` varchar(50) NOT NULL,
  `noOfBookings` int NOT NULL,
  PRIMARY KEY (`trainNo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`trainNo`, `region`, `returnTrainNo`, `trainName`, `origin`, `destination`, `originCode`, `destinationCode`, `originTime`, `destinationTime`, `originPlatform`, `destinationPlatform`, `duration`, `classes`, `seats1AC`, `seats2AC`, `seats3AC`, `seatsSL`, `seatsChairCar`, `seatsChairCarAC`, `price1AC`, `price2AC`, `price3AC`, `priceSL`, `priceChairCar`, `priceChairCarAC`, `runsOn`, `noOfBookings`) VALUES
(14, 'Central', 1210, 'Bijoy', 'Narayanganj', 'Chuadanga', 'NYG', 'CDG', '12:36', '12:36', 'Cumilla', 'Kishoregan', '12', '1AC, 2AC', 100, 90, 80, 150, 0, 100, '120', '110', '100', '200', '0', '170', 'only Friday', 19),
(15, 'Central', 3, 'Bijoy', 'Chattogram', 'Dhaka', 'NYG', '123', '14:38', '05:38', 'chittagong', 'dhaka', '12', '1AC', 12, 12, 20, 20, 20, 20, '1200', '800', '500', '700', '500', '1000', '2', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(50) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `AddressLine1` varchar(50) NOT NULL,
  `AddressLine2` varchar(50) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Date` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `EMail`, `Phone`, `Username`, `Password`, `AddressLine1`, `AddressLine2`, `City`, `State`, `Date`) VALUES
(19, 'Moeller', 'tawshiq.rafi02@gmail.com', '01313226193', 'arif', '$2a$08$2xRB22OAw1NXBkkPv5/Bv.L3q9jDwetn7GWtJy0F.mFpOEp15uY6m', 'House no 5, 5 no Siddheswari lane,', 'Shantinagar, Dhaka 1217.', 'Shantinagar', 'Dhaka', 'Monday 25th of April 2022 at 06:47:35 PM'),
(20, 'Tawshiqul Islam Rafi', 'tawshiq.rafi02@gmail.com', '01839462106', 'rafi', '$2a$08$tOrGHimnZFVDtFOuwIzqfOtc4HIiWUjMVjWMjahR2WXD3BtJbYNde', 'Islam Mansion, Navy Hospital Gate, EPZ, Chittagong', 'a', 'Chittagong', 'Chattogram', 'Friday 29th of April 2022 at 12:20:27 AM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
