-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2022 at 10:15 AM
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
);

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `authoritymessage`
--

DROP TABLE IF EXISTS `authoritymessage`;
CREATE TABLE IF NOT EXISTS `authoritymessage` (
  `msgID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `seen` varchar(20) NOT NULL,
  `msgFrom` varchar(20) NOT NULL,
  `dateTime` datetime(6) NOT NULL,
  PRIMARY KEY (`msgID`)
);

--
-- Dumping data for table `authoritymessage`
--

INSERT INTO `authoritymessage` (`msgID`, `username`, `message`, `seen`, `msgFrom`, `dateTime`) VALUES
(1, 'rafi', 'how r u', 'not', 'Admin', '2022-10-10 00:00:00.000000'),
(6, 'arif', 'Congratulation... Your hotel Booikng Confirmed By Tour And Travel Authority', 'not', 'Admin', '2024-05-22 11:49:13.000000'),
(16, 'arif', 'Congratulation... Your hotel Booikng Confirmed By Tour And Travel Authority', 'not', '', '2024-05-22 11:55:05.000000'),
(19, 'rafi', 'Congratulation... Your train Booikng Confirmed By Tour And Travel Authority', 'not', '', '2024-05-22 12:58:41.000000'),
(20, 'arif', 'Congratulation... Your hotel Booikng Confirmed By Tour And Travel Authority', 'not', '', '2024-05-22 06:13:42.000000'),
(21, 'arif', 'Congratulation... Your hotel Booikng Confirmed By Tour And Travel Authority', 'not', 'Admin', '2025-05-22 08:30:21.000000');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `bookingID` int NOT NULL,
  `hotelbookID` int NOT NULL,
  `busbookID` int NOT NULL,
  `cabbookID` int NOT NULL,
  `flightbookID` int NOT NULL,
  `trainbookID` int NOT NULL,
  `guidebookid` int NOT NULL
)  ;

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
);

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busID`, `operator`, `type`, `origin`, `destination`, `departure`, `arrival`, `seats`, `fare`, `seatsAvailable`) VALUES
(2, 'Hanif Paribahan', 'Hanif Paribahan', 'Chattogram', 'Chattogram', '02:52', '16:52', 600, '30', NULL),
(4, 'Hanif Paribahan', 'Hanif Paribahan', 'Chattogram', 'Chattogram', '02:52', '16:52', 600, '30', NULL),
(7, 'Hanif Paribahan', 'Hanif Paribahan', 'Chattogram', 'Chattogram', '02:52', '16:52', 600, '30', NULL),
(10, 'Hanif Paribahan', 'Hanif Paribahan', 'Chattogram', 'Chattogram', '02:52', '16:52', 600, '30', NULL),
(11, 'Eagle Paribahan', 'Chair (AC)', 'Chattogram', 'Dhaka', '02:30', '11:30', 30, '500', NULL),
(12, 'Hanif Paribahan', 'Chair (Non AC)', 'Chattogram', 'Dhaka', '01:09', '13:09', 20, '2000', NULL);

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
  PRIMARY KEY (`bookingID`),
  KEY `username` (`username`),
  KEY `username_2` (`username`)
);

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
  PRIMARY KEY (`bookingID`),
  KEY `username` (`username`),
  KEY `carID` (`carID`),
  KEY `carID_2` (`carID`)
);

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
  `available` varchar(20) NOT NULL,
  PRIMARY KEY (`carID`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `cabs`
--

DROP TABLE IF EXISTS `cabs`;
CREATE TABLE IF NOT EXISTS `cabs` (
  `cabID` int NOT NULL AUTO_INCREMENT,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `distance` float NOT NULL,
  `time` time NOT NULL,
  `originCode` varchar(10) NOT NULL,
  `destinationCode` varchar(10) NOT NULL,
  `fare` varchar(20) NOT NULL,
  PRIMARY KEY (`cabID`)
);

--
-- Dumping data for table `cabs`
--

INSERT INTO `cabs` (`cabID`, `origin`, `destination`, `distance`, `time`, `originCode`, `destinationCode`, `fare`) VALUES
(2, 'Chattogram', 'Chattogram', 500, '17:00:00', 'DAC', 'DAC', ''),
(3, 'Chattogram', 'Dhaka', 500, '17:00:00', 'CGP', 'DAC', 'DAC'),
(4, 'Chattogram', 'Dhaka', 500, '17:00:00', 'CGP', 'DAC', 'DAC');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `email`, `message`) VALUES
(1, 'chad', 'abc@c.com', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `districtID` int NOT NULL AUTO_INCREMENT,
  `districtName` varchar(30) NOT NULL,
  `regID` int NOT NULL,
  PRIMARY KEY (`districtID`),
  KEY `regID` (`regID`)
);

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtID`, `districtName`, `regID`) VALUES
(1, ' Chattogram  ', 1),
(2, ' Brahmanbaria ', 1),
(3, ' Cumilla ', 1),
(4, ' Feni ', 1),
(5, ' Noakhali ', 1),
(6, 'Cox\'s Bazar', 1),
(7, ' Dhaka ', 2),
(8, ' Faridpur ', 2),
(9, ' Gazipur ', 2),
(10, ' Gopalganj ', 2),
(11, ' Kishoreganj ', 2),
(12, ' Narayanganj ', 2),
(13, ' Rajbari ', 2),
(14, ' Tangail ', 2),
(15, ' Chuadanga ', 3),
(16, ' Jashore ', 3),
(17, ' Jhenaidah ', 3),
(18, ' Kushtia ', 3),
(19, ' Mymenshingh ', 4),
(20, ' Jamalpur ', 4),
(21, ' Netrokona ', 4),
(22, ' Rajhshahi ', 5),
(23, ' Bogra ', 5),
(24, ' Chapai Nawabganj ', 5),
(25, ' Joypurhat ', 5),
(26, ' Naogaon ', 5),
(27, ' Natore ', 5),
(28, ' Pabna ', 5),
(29, ' Sirajganj ', 5),
(30, ' Rangpur ', 6),
(31, ' Gaibandha ', 6),
(32, ' Dinajpur ', 6),
(33, ' Kurigram ', 6),
(34, ' Lalmonirhat ', 6),
(35, ' Nilphamari ', 6),
(36, ' Panchagarh ', 6),
(37, ' Thakurgaon ', 6),
(38, ' Sylhet ', 7),
(39, ' Habiganj ', 7),
(40, ' Moulvibazar ', 7),
(41, ' Sunamganj ', 7);

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
  `status` varchar(20) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `passengers` int NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `username` (`username`)
);

--
-- Dumping data for table `flightbookings`
--

INSERT INTO `flightbookings` (`bookingID`, `username`, `date`, `cancelled`, `status`, `origin`, `destination`, `passengers`, `type`) VALUES
(114, 'rafi', '30-04-2022', 'no', 'accepted', 'Jashore', 'Barishal', 2, 'OneWayFlight'),
(115, 'rafi', '30-04-2022', 'no', 'accepted', 'Barishal', 'Jashore', 1, 'ReturnTripFlight'),
(116, 'rafi', '2022-5-26', 'no', 'pending', 'chittagong', 'dhaka', 2, 'OneWayFlight'),
(117, 'rafi', '2022-5-26', 'no', 'pending', 'chittagong', 'dhaka', 2, 'OneWayFlight');

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
);

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_no`, `origin`, `destination`, `distance`, `fare`, `class`, `seats_available`, `departs`, `arrives`, `operator`, `origin_code`, `destination_code`, `refundable`, `noOfBookings`, `date`) VALUES
(7, 'Dhaka', 'Dhaka', 200, 2900, 'Economy', 39, '03:04', '15:04', 'Novoair', 'DAC', 'DAC', 'Refundable', 13, '2022-05-25'),
(8, 'Barishal', 'Jashore', 200, 2900, 'Economy', 40, '03:04', '15:04', 'Novoair', 'BZL', 'JSR', 'Refundable', 12, '2022-05-01'),
(9, 'Dhaka', 'Dhaka', 300, 2900, 'Economy', 40, '03:04', '15:04', 'Novoair', 'DAC', 'DAC', 'Refundable', 12, '2022-05-02'),
(10, 'Dhaka', 'Dhaka', 200, 2900, 'Economy', 40, '03:04', '15:04', 'Novoair', 'DAC', 'DAC', 'Refundable', 12, '2022-05-02'),
(11, 'Sylhet', 'Barishal', 400, 4000, 'Economy', 30, '05:28', '17:28', 'Biman', 'ZYL', 'BZL', 'Refundable', 30, '2022-05-01'),
(12, 'Jashore', 'Barishal', 300, 2900, 'Economy', 27, '13:35', '01:35', 'Novoair', 'JSR', 'BZL', 'Refundable', 17, '2022-05-04'),
(13, 'Dhaka', 'Jashore', 300, 2000, 'Economy', 20, '20:24', '22:25', 'Abu', 'DAC', 'JSR', 'Refundable', 8, '2022-05-30'),
(14, 'Dhaka', 'Coxs Bazar', 800, 2000, 'Economy', 50, '02:30', '03:30', 'Bangladesh Airlines', 'DAC', 'CXB', 'Refundable', 50, '2022-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

DROP TABLE IF EXISTS `guides`;
CREATE TABLE IF NOT EXISTS `guides` (
  `guideID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `region` int NOT NULL,
  `district` int NOT NULL,
  `map` varchar(1000) NOT NULL,
  `age` int NOT NULL,
  `nidNo` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `available` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `hiring` varchar(20) DEFAULT NULL,
  `guideRequest` varchar(20) NOT NULL,
  PRIMARY KEY (`guideID`),
  KEY `username` (`username`),
  KEY `username_2` (`username`),
  KEY `username_3` (`username`),
  KEY `district` (`district`),
  KEY `region` (`region`)
);

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`guideID`, `name`, `region`, `district`, `map`, `age`, `nidNo`, `phone`, `available`, `username`, `hiring`, `guideRequest`) VALUES
(1, 'Md Fahim', 1, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116653.6264887362!2d91.04189594599181!3d23.98073563038983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375405bd30bb4f23%3A0x1b3b2e1fce26f623!2sBrahmanbaria!5e0!3m2!1sen!2sbd!4v1653574633722!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 26, '1234567890', '0182229999', 'yes', NULL, NULL, ''),
(2, 'MD jewel', 2, 8, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116994.69276522659!2d89.77132768779967!3d23.60131487067542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe2534aaa4fc7f%3A0x4daf43ffdb19a28e!2sFaridpur!5e0!3m2!1sen!2sbd!4v1653576099966!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 30, '1234567890', '0182229999', 'no', 'rafi', 'yes', ''),
(3, 'Md Allama ', 1, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29163.35472947378!2d91.08764459384741!3d23.980964822015217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375405bd30bb4f23%3A0x1b3b2e1fce26f623!2sBrahmanbaria!5e0!3m2!1sen!2sbd!4v1653578598923!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 32, '1234567811', '0182229777', 'no', NULL, NULL, ''),
(4, 'chad', 1, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116653.6264887362!2d91.04189594599181!3d23.98073563038983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375405bd30bb4f23%3A0x1b3b2e1fce26f623!2sBrahmanbaria!5e0!3m2!1sen!2sbd!4v1653574633722!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 26, '1234567890', '87987938172931', 'yes', NULL, NULL, ' pending'),
(7, 'Md. Robiul Bashar', 1, 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116653.6264887362!2d91.04189594599181!3d23.98073563038983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375405bd30bb4f23%3A0x1b3b2e1fce26f623!2sBrahmanbaria!5e0!3m2!1sen!2sbd!4v1653574633722!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 26, '1234567890', '87987938172931', 'yes', NULL, NULL, ' pending');

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
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `username` (`username`)
);

--
-- Dumping data for table `hotelbookings`
--

INSERT INTO `hotelbookings` (`bookingID`, `hotelName`, `date`, `username`, `cancelled`, `status`) VALUES
(47, 'Hotel Abc, tiger, Chattogram', '26-04-2022', 'arif', 'yes', 'pending'),
(48, 'Hotel Abc, tiger, Chattogram', '26-04-2022', 'arif', 'yes', 'accepted'),
(49, 'Hotel Abc, tiger, Chattogram', '26-04-2022', 'arif', 'yes', 'pending'),
(50, 'aca, Laboni, Coxs Bazar', '26-04-2022', 'arif', 'no', 'accepted');

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
);

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelID`, `hotelName`, `city`, `locality`, `stars`, `rating`, `hotelDesc`, `checkIn`, `checkOut`, `price`, `roomsAvailable`, `wifi`, `swimmingPool`, `parking`, `restaurant`, `laundry`, `cafe`, `mainImage`) VALUES
(1, 'aca', 'Coxs Bazar', 'Laboni', 5, '5', 'asa sas a', '05:14', '17:14', 13232, 14, 'no', 'non', 'no', 'no', 'no', 'no', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYWFRgVFRUYGRgYGBgaGBgaGBgYGBgaGBgaGRgYG'),
(2, 'ac', 'Coxs Bazar', 'Laboni', 5, '5', 'asa sas a', '05:14', '17:14', 13232, 14, 'no', 'non', 'no', 'no', 'no', 'no', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYWFRgVFRUYGRgYGBgaGBgaGBgYGBgaGBgaGRgYG'),
(3, 'ABC', 'Chattogram', 'ctg', 2, '3', 'abc', '10:26', '10:26', 500, 5, 'abc', '2', 'no', 'no', 'no', 'no', 'zbc');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `regID` int NOT NULL AUTO_INCREMENT,
  `regionName` varchar(20) NOT NULL,
  PRIMARY KEY (`regID`)
);

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`regID`, `regionName`) VALUES
(1, 'Chittagong'),
(2, 'Dhaka'),
(3, 'Khulna'),
(4, 'Mymenshingh'),
(5, 'Rajhshahi'),
(6, 'Rangpur'),
(7, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `touristpolice`
--

DROP TABLE IF EXISTS `touristpolice`;
CREATE TABLE IF NOT EXISTS `touristpolice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `region` int NOT NULL,
  `district` int NOT NULL,
  `map` varchar(1000) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `district` (`district`),
  KEY `region` (`region`)
);

--
-- Dumping data for table `touristpolice`
--

INSERT INTO `touristpolice` (`id`, `name`, `region`, `district`, `map`, `designation`, `phone`) VALUES
(1, 'Asraful Alam Nadim', 1, 1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d281066.5294429714!2d91.61602965486472!3d22.242546618022292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8fbe7ee8051%3A0xb97dc0766ed3fb75!2sChittagong%20District!5e0!3m2!1sen!2sbd!4v1653582289535!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'SI', '0182229777');

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
  `status` varchar(20) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `passengers` int NOT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `username` (`username`)
);

--
-- Dumping data for table `trainbookings`
--

INSERT INTO `trainbookings` (`bookingID`, `username`, `date`, `cancelled`, `status`, `origin`, `destination`, `passengers`) VALUES
(15, 'rafi', '29-04-2022', 'no', 'accepted', 'Chattogram', 'Gazipur', 4);

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
);

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`trainNo`, `region`, `returnTrainNo`, `trainName`, `origin`, `destination`, `originCode`, `destinationCode`, `originTime`, `destinationTime`, `originPlatform`, `destinationPlatform`, `duration`, `classes`, `seats1AC`, `seats2AC`, `seats3AC`, `seatsSL`, `seatsChairCar`, `seatsChairCarAC`, `price1AC`, `price2AC`, `price3AC`, `priceSL`, `priceChairCar`, `priceChairCarAC`, `runsOn`, `noOfBookings`) VALUES
(14, 'Central', 1210, 'Bijoy', 'Narayanganj', 'Chuadanga', 'NYG', 'CDG', '12:36', '12:36', 'Cumilla', 'Kishoregan', '12', '1AC, 2AC', 100, 90, 80, 150, 0, 100, '120', '110', '100', '200', '0', '170', 'only Friday', 19),
(15, 'Central', 3, 'Bijoy', 'Chattogram', 'Dhaka', 'NYG', '123', '14:38', '05:38', 'chittagong', 'dhaka', '12', '1AC', 12, 12, 20, 20, 20, 20, '1200', '800', '500', '700', '500', '1000', '2', 20),
(16, 'Central', 4, 'Bijoy', 'Dhaka', 'Chattogram', 'DAC', 'CGP', '02:36', '15:30', 'Dhaka', 'Chittagong', '12', '1AC', 5, 10, 12, 20, 20, 20, '1000', '800', '200', '500', '300', '600', '1', 30),
(17, 'Eastern', 20, 'Bijoy', 'Brahmanbaria', 'Faridpur', 'CGP', 'DAC', '00:00', '13:00', 'chittagong', 'dhaka', '12', '1AC', 50, 50, 50, 50, 40, 50, '1000', '800', '500', '1200', '400', '800', '1', 100);

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
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `EMail`, `Phone`, `Username`, `Password`, `AddressLine1`, `AddressLine2`, `City`, `State`, `Date`) VALUES
(19, 'Moeller', 'tawshiq.rafi02@gmail.com', '01313226193', 'arif', '$2a$08$2xRB22OAw1NXBkkPv5/Bv.L3q9jDwetn7GWtJy0F.mFpOEp15uY6m', 'House no 5, 5 no Siddheswari lane,', 'Shantinagar, Dhaka 1217.', 'Shantinagar', 'Dhaka', 'Monday 25th of April 2022 at 06:47:35 PM'),
(20, 'Tawshiqul Islam Rafi', 'tawshiq.rafi02@gmail.com', '01839462106', 'rafi', '$2a$08$tOrGHimnZFVDtFOuwIzqfOtc4HIiWUjMVjWMjahR2WXD3BtJbYNde', 'Islam Mansion, Navy Hospital Gate, EPZ, Chittagong', 'a', 'Chittagong', 'Chattogram', 'Friday 29th of April 2022 at 12:20:27 AM'),
(21, 'chad', 'abc@c.com', '22222111', 'chad', '$2a$08$zwQj5CeelQt.Kuw.LzCbhO66Fo95CVwJHj0l/u61AdC.9xdXN5/Me', 'Miriam Asrom Deyoung, Karnafuli Chittagong', 'asdnbasdnbasdnas', 'Chittagong', 'boropool', 'Sunday 22nd of May 2022 at 12:49:48 AM');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `busbookings`
--
ALTER TABLE `busbookings`
  ADD CONSTRAINT `busbookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`Username`);

--
-- Constraints for table `cabbookings`
--
ALTER TABLE `cabbookings`
  ADD CONSTRAINT `cabbookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`Username`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`regID`) REFERENCES `region` (`regID`);

--
-- Constraints for table `flightbookings`
--
ALTER TABLE `flightbookings`
  ADD CONSTRAINT `flightbookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`Username`);

--
-- Constraints for table `guides`
--
ALTER TABLE `guides`
  ADD CONSTRAINT `guides_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`districtID`),
  ADD CONSTRAINT `guides_ibfk_2` FOREIGN KEY (`region`) REFERENCES `region` (`regID`);

--
-- Constraints for table `hotelbookings`
--
ALTER TABLE `hotelbookings`
  ADD CONSTRAINT `hotelbookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`Username`);

--
-- Constraints for table `touristpolice`
--
ALTER TABLE `touristpolice`
  ADD CONSTRAINT `touristpolice_ibfk_1` FOREIGN KEY (`region`) REFERENCES `region` (`regID`),
  ADD CONSTRAINT `touristpolice_ibfk_2` FOREIGN KEY (`district`) REFERENCES `district` (`districtID`);

--
-- Constraints for table `trainbookings`
--
ALTER TABLE `trainbookings`
  ADD CONSTRAINT `trainbookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
