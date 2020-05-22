-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 09:10 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleaningservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`, `ic`, `contact`, `email`) VALUES
(1, 'admin', '123', '991231016969', '161234567', 'A@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bookingservice`
--

CREATE TABLE `bookingservice` (
  `ID` int(255) NOT NULL,
  `ServiceID` varchar(20) NOT NULL,
  `dateAdd` date NOT NULL,
  `dateEnd` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `customerID` varchar(20) NOT NULL,
  `remark` int(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `staffID` varchar(20) NOT NULL,
  `servicetime` varchar(20) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingservice`
--

INSERT INTO `bookingservice` (`ID`, `ServiceID`, `dateAdd`, `dateEnd`, `location`, `customerID`, `remark`, `description`, `staffID`, `servicetime`, `payment`) VALUES
(152, 'B1', '2019-07-09', '0000-00-00', '8,Jalan Kemuliaan 20,Taman Universiti,81300 Skudai,Johor.', 'ABC', 1, '', '14', '330-530', 'Paid'),
(153, 'B5', '2019-07-17', '0000-00-00', '1,Jalan Pendidikan 12,Taman Universiti,81300 Skudai Johor.', 'ONG', 1, '999', '14', '930-1130', 'Paid'),
(154, 'B7', '2019-07-09', '0000-00-00', '1,Jalan Kemuliaan 11,Taman Universiti,81300 Skudai,Johor', 'ABC', 1, '', '15', '930-1130', 'Unpaid'),
(155, 'B2', '2019-07-17', '0000-00-00', '8,Jalan Pendidikan 11,Taman Universiti,81300 skudai', 'Lee', 0, '', '18', '', 'Unpaid'),
(156, 'B5', '2019-07-10', '2019-07-10', '5, Jalan Kemuliaan 3, Taman Universiti,81300 Skudai,Johor', 'Lee', 0, '', '15', '930-1130', 'Unpaid'),
(157, 'B7', '2019-07-10', '0000-00-00', '5, Jalan Kemuliaan 3, Taman Universiti,81300 Skudai,Johor', 'Lee', 1, '', '14', '330-530', 'Unpaid'),
(160, 'B1', '2019-09-11', '0000-00-00', '1, Jalan Pendidikan 6', 'Lim', 0, '', '16', '', 'Unpaid'),
(161, 'B1', '2019-10-01', '0000-00-00', 'wdada', 'D180278B', 0, '', '17', '', 'Unpaid'),
(162, 'B2', '2019-10-01', '0000-00-00', 'wdada', 'D180278B', 0, '', '18', '', 'Unpaid'),
(163, 'B1', '2019-11-12', '0000-00-00', 'Location\r\n', 'Lim', 0, '', '15', '', 'Unpaid'),
(164, 'B2', '2019-11-12', '0000-00-00', 'Location\r\n', 'Lim', 1, '', '14', '', 'Unpaid'),
(170, 'C1', '2019-11-13', '2020-02-13', 'No 1, Jalan Kejayaan 1,Taman Sutera.', 'ONG', 0, '', '', '1230-230', 'Unpaid'),
(171, 'B1', '2019-11-13', '2019-11-13', 'test', 'ONG', 1, '', '', '1230-230', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ic` varchar(14) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phoneNo` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `approveRequest` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`ID`, `username`, `password`, `ic`, `image`, `phoneNo`, `email`, `approveRequest`) VALUES
(1, 'D180278B', '$2y$10$maDyPPKZKb0nWqGHTO/QruqTJ3ca5oVgKc1BPFyotz6oOgp/YdFBK', '0', '', '12', '123@gmail.com', 1),
(2, 'asd', '$2y$10$iqjAzx32VGIqfYoAhn65W.u9DRBMRV9a0ZpqnbfR/vRNJZfgnWnhu', '0', '', '12', '123@gmail.com', 1),
(3, 'ABC', '$2y$10$YjmvO9K/RQR1nzLm1Jc2Uujt6qIxsdn5F2Nj0vRYjXwoyV82EN/l.', '0', '', '121231231', '789@gmail.com', 1),
(4, 'yousheng', '$2y$10$83EesBGkbYPDvj8Q/fTpS.M1.ebBSboKoiHzhxZqDC/Ilr1hCJnK6', '0', '', '12', '123@gmail.com', 1),
(5, 'fgda', '$2y$10$rBBVzVpi3g0ZiJKRxVEvjOd72sciEeWDMCnhV7pVCBrDYBFPG/asS', '2147483647', '', '121231231', '123@gmail.com', 1),
(6, '2r3', '$2y$10$KBz9gJKV4BxRnJ1DxOHRGOwuQgdqJnC9JBSsdXeJtghiKi/VsZQNW', '2147483647', '', '12', '123@gmail.com', 1),
(7, 'A', '$2y$10$LoRR6vCrYd5xY3H0TTrvyOwdjGHFp4HTLcc3HTb/Bq4tCqsnr2eaS', '2147483647', '', '121231231', '123@gmail.com', 1),
(8, 'B', '$2y$10$5WwMK5I0ksFNo4F0Ud4lSOECHA.D6RRfwapBaeMWZ/h0Enr3NQXTG', '2147483647', '', '121231231', '789@gmail.com', 1),
(9, 'AA', '$2y$10$5EGthBoiZxCA2HCfH4ImnOOZCFaF0jdeJGI6/DTOx4f.4clbdC1ti', '1101110110', '', '12', '123@gmail.com', 1),
(10, 'C', '$2y$10$yqju0cQ97Gptah716JWar.hX6.MUSQdeD70JmObOAbpwscN5TVFNq', '000204010202', '', '0121231231', '789@gmail.com', 1),
(11, 'ONG', '$2y$10$R622jeVDNbBFo90XCAnz2eHL2ZTR8lHlAv4oSWaFnaSFfwjkvgQqy', '000210010506', '', '016-7566655', 'ong@gmail.com', 1),
(12, 'Lee', '$2y$10$wRmy34o0abhNWso/ChkFl.adbt37LeBQC71Z.XZFwJqEA7TT6Jphu', '000101051215', '', '016-7566969', 'lee@gmail.com', 1),
(13, 'Lou', '$2y$10$vlJO3sqe/ujUJIcWUiYp3evyARefBlPnCxGrAJNz0PJ7RWQiKnRzS', '980210-01-00', '', '016-5566289', 'Lou@gmail.com', 1),
(14, 'Goh', '$2y$10$O3mgDxxOjn7GppImGYSj8eOBu4MlWxGGyH.3ZmChuonTRVDmSlgzS', '000201-05-6699', '', '012-4560708', 'Goh@gmail.com', 1),
(15, 'Lim', '$2y$10$qTFe7Of7l1l8sqFExNo0FOOvvx1PxFGo4gtu8qHMF6fKxPNfbzyMW', '001231-01-0910', '', '016-7542666', 'Lim1@gmail.com', 1),
(17, 'G', '$2y$10$vDghSOYyiOXir5/MC9033Ov53X5X8I1xArLBup7wzVxZM9ft1y2YW', '1234', '1234.jpg', '0167530429', 'dsa@gaaf', 1),
(18, 'XJ', '$2y$10$je42YUcc7ABjtNWYhkYU5uEzGNu0hWNAb4M3weWVy9NcMnH.VDsyS', '000101-02-0303', '000101-02-0303.jpg', '0123456789', 'Xj@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(50) NOT NULL,
  `CustomerID` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `ServiceItem` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servicepackage`
--

CREATE TABLE `servicepackage` (
  `BookingID` varchar(255) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `ServiceDetails` varchar(250) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `contract` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicepackage`
--

INSERT INTO `servicepackage` (`BookingID`, `serviceName`, `image`, `price`, `ServiceDetails`, `unit`, `contract`) VALUES
('B1', 'Room', 'room.jpg', 100.00, 'D1', '1', 'no'),
('B2', 'Living Room', 'living room.jpg', 150.00, 'D2', '1', 'no'),
('B3', 'Bathroom', 'Bathroom.jpg', 100.00, 'D3', '1', 'no'),
('B4', 'Window', 'window.jpg', 50.00, 'D4', '1', 'no'),
('B5', 'Kitchen', 'kitchen.jpg', 150.00, 'D5', '1', 'no'),
('B7', 'Doors', 'doors.jpg', 50.00, 'D7', '1', 'no'),
('B8', 'Wash floor', 'wash floor.jpg', 50.00, 'D8', '1', 'no'),
('C1', 'Office Cleaning', 'officecleaning.jpg', 500.00, 'D9', '', 'yes'),
('C2', 'Apartment', 'Apartment.jpg', 500.00, 'D10', 'the lowest price', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `service_detail`
--

CREATE TABLE `service_detail` (
  `ID` int(50) NOT NULL,
  `DetailID` varchar(50) NOT NULL,
  `ServiceN` varchar(255) NOT NULL,
  `Detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_detail`
--

INSERT INTO `service_detail` (`ID`, `DetailID`, `ServiceN`, `Detail`) VALUES
(1, 'D1', 'Room', 'Change Bed Sheets'),
(2, 'D1', 'Room', 'Polish tables and other wood furniture surface'),
(3, 'D1', 'Room', 'Vacuum floors and rugs'),
(4, 'D1', 'Room', 'Wet mop bare floors'),
(5, 'D1', 'Room', 'Hand-wiping Light Fixtures(they will not be disassembled)'),
(6, 'D1', 'Room', 'Wipe light switch plates'),
(7, 'D1', 'Room', 'Ceiling fan cleaning'),
(8, 'D2', 'Living Room', '1-2 set Slipcover / 1 L-shape Slipcover (sofa cover)'),
(9, 'D2', 'Living Room', 'Hand-wiping Light Fixtures(they will not be disassembled) & Baseboards'),
(10, 'D2', 'Living Room', 'Polish tables and other wood furniture surface'),
(11, 'D2', 'Living Room', 'Vacuum floors and rugs'),
(12, 'D2', 'Living Room', 'Wet mop bare floors'),
(13, 'D2', 'Living Room', 'Wipe light switch plates,Ceiling fan cleaning'),
(14, 'D3', 'Bathroom', 'Clean the tub'),
(15, 'D3', 'Bathroom', 'Shine the mirror'),
(16, 'D3', 'Bathroom', 'Scrub the sink'),
(17, 'D3', 'Bathroom', 'Disinfect toilet'),
(18, 'D3', 'Bathroom', 'Clean the floors'),
(19, 'D4', 'Window', 'Awning Windows'),
(20, 'D4', 'Window', 'Casement Windows'),
(21, 'D4', 'Window', 'Double-Hung and Single-Hung Windows'),
(22, 'D4', 'Window', 'Picture Windows'),
(23, 'D4', 'Window', 'Bay Windows'),
(24, 'D4', 'Window', 'Jalousie Windows'),
(25, 'D4', 'Window', 'Slider Windows'),
(26, 'D5', 'Kitchen', 'Clean Kitchen Ventilation'),
(27, 'D5', 'Kitchen', 'Clean kitchenware'),
(28, 'D5', 'Kitchen', 'Clean sink'),
(29, 'D5', 'Kitchen', 'Clean countertops'),
(30, 'D5', 'Kitchen', 'Clear clutter piles'),
(31, 'D5', 'Kitchen', 'Wipe down chairs'),
(32, 'D5', 'Kitchen', 'Clean the tableware'),
(33, 'D7', 'Doors', 'Timber/Wood Doors'),
(34, 'D7', 'Doors', 'Glass Doors'),
(35, 'D7', 'Doors', 'Steel Doors'),
(36, 'D7', 'Doors', 'Aluminium Doors'),
(37, 'D7', 'Doors', 'PVC Doors'),
(38, 'D7', 'Doors', 'Framed and Paneled Doors'),
(39, 'D7', 'Doors', 'Auto-Doors/Gates'),
(40, 'D8', 'Wash floor', 'Single storey terrace house'),
(41, 'D8', 'Wash floor', 'Double storey terrace house'),
(42, 'D8', 'Wash floor', 'Balcony Floors'),
(43, 'D8', 'Wash floor', 'Outdoor Floors'),
(44, 'D8', 'Wash floor', 'Detached bungalow'),
(45, 'D8', 'Wash floor', 'Semi-detached bungalow'),
(46, 'D9', 'Office Cleaning', 'Having contact for long term'),
(47, 'D10', 'Apartment', 'Having contract for long term'),
(48, 'D10', 'Apartment', 'Cleaning each floor');

-- --------------------------------------------------------

--
-- Table structure for table `staff_detail`
--

CREATE TABLE `staff_detail` (
  `staffID` int(255) NOT NULL,
  `Staffname` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ic` varchar(14) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jobtime` varchar(20) NOT NULL,
  `salary` double NOT NULL,
  `first_allowance` varchar(50) NOT NULL,
  `second_allowance` varchar(50) NOT NULL,
  `EmployerEPF` int(20) NOT NULL,
  `EmployeeEPF` int(20) NOT NULL,
  `overtime_rate` double NOT NULL,
  `PersonalDeduction` double NOT NULL,
  `BankAccount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_detail`
--

INSERT INTO `staff_detail` (`staffID`, `Staffname`, `position`, `password`, `address`, `ic`, `contact`, `email`, `jobtime`, `salary`, `first_allowance`, `second_allowance`, `EmployerEPF`, `EmployeeEPF`, `overtime_rate`, `PersonalDeduction`, `BankAccount`) VALUES
(12, 'Kaizhi', 'Manager', '123123', 'no1,jalan Kemuliaan 12, Taman Universiti,81300 Skudai Johor', '001234-01-05', '016-4581219', 'kaizhi12345@gmail.com', 'Full Time', 2000, 'Medical Allowance', 'Travel Allowance', 13, 11, 2, 9000, 123456789),
(13, 'xiongjie', 'Cleaner', '123123', 'asd123', '001234-01-05', '016-4581265', 'xiongjie@hotmail.com', 'Full Time', 1600, 'Mobile Phone Allowan', 'Travel Allowance', 13, 11, 2, 9000, 147258369),
(14, 'Ong', 'Supervisor', '123123', 'asd', '001234-01-05', '012-2341256', 'Ong@hotmail.com', 'Full Time', 1800, 'Travel Allowance', 'Medical Allowance', 13, 11, 2, 9000, 659321478),
(15, 'Lee', 'Manager', '123123', 'asd123', '001023-08-05', '012-2341255', 'Lee@gmail.com', 'Full Time', 1800, 'Medical Allowance', 'Mobile Phone Allowan', 13, 11, 1.8, 9000, 516849723),
(16, 'Jeremy', 'Cleaner', '123123', 'asd123', '001234-01-05', '016-45812145', 'Lim@gmail.com', 'Full Time', 1600, 'Medical Allowance', 'Travel Allowance', 13, 11, 1.5, 9000, 2147483647),
(17, 'Goh', 'Cleaner', '123123', 'asd123', '001234-01-0555', '016-1568946', 'Lim@gmail.com', 'Full Time', 1600, 'Travel Allowance', 'Travel Allowance', 13, 11, 1.6, 9000, 2147483647),
(18, 'Lou', 'Cleaner', '123123', 'sadsad', '001234-01-0555', '016-4581265', 'Lou@gmail.com', 'Part Time', 0, 'Travel Allowance', 'Travel Allowance', 0, 0, 1.6, 0, 1578845612),
(19, 'Siti', 'Cleaner', '123123', 'No 1,Jalan Siti 1', '970412-01-0988', '016-9878766', 'siti@gmail.com', 'Part Time', 1600, 'Medical Allowance', 'Travel Allowance', 0, 0, 1.5, 0, 54689213);

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave`
--

CREATE TABLE `staff_leave` (
  `LeaveID` int(255) NOT NULL,
  `StaffID` int(255) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Date` date NOT NULL,
  `TypeLeave` varchar(225) NOT NULL,
  `HalfTime` varchar(20) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Day` int(50) NOT NULL,
  `Reason` varchar(225) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_leave`
--

INSERT INTO `staff_leave` (`LeaveID`, `StaffID`, `Name`, `Date`, `TypeLeave`, `HalfTime`, `Start_Date`, `End_Date`, `Day`, `Reason`, `status`) VALUES
(1, 14, 'Ong', '2019-11-13', 'Unpaid Leave', 'None', '2019-11-13', '2019-11-13', 1, '', 'pending'),
(2, 15, 'Lee', '2019-11-13', 'AnnualLeave', 'None', '2019-11-14', '2019-11-14', 1, '', 'pending'),
(3, 17, 'Goh', '2019-11-13', 'SickLeave', 'None', '2019-11-11', '2019-11-12', 2, '', 'pending'),
(4, 18, 'Lou', '2019-11-13', 'MeternityLeave', 'None', '2019-11-15', '2019-11-15', 1, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary`
--

CREATE TABLE `staff_salary` (
  `ID` int(20) NOT NULL,
  `Staff_ID` int(20) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `basic_salary` varchar(20) NOT NULL,
  `overtime` varchar(20) NOT NULL,
  `AccountNumber` int(50) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `PCB` double NOT NULL,
  `Sosco` double NOT NULL,
  `EPF` double NOT NULL,
  `EIS` double NOT NULL,
  `NetSalary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_salary`
--

INSERT INTO `staff_salary` (`ID`, `Staff_ID`, `StaffName`, `basic_salary`, `overtime`, `AccountNumber`, `Month`, `PCB`, `Sosco`, `EPF`, `EIS`, `NetSalary`) VALUES
(1401, 12, 'Kaizhi', '2000', '', 123456789, '2019-11', 6.13, 9.75, 220, 3.9, 1760.22),
(1402, 13, 'xiongjie', '1600', '', 147258369, '2019-11', 2.57, 7.75, 176, 3.1, 1410.58),
(1403, 14, 'Ong', '1800', '', 659321478, '2019-11', 4.35, 8.75, 198, 3.5, 1585.4),
(1404, 15, 'Lee', '1800', '', 516849723, '2019-11', 4.35, 8.75, 198, 3.5, 1585.4),
(1405, 16, 'Jeremy', '1600', '', 2147483647, '2019-11', 2.57, 7.75, 176, 3.1, 1410.58),
(1406, 17, 'Goh', '1600', '', 2147483647, '2019-11', 2.57, 7.75, 176, 3.1, 1410.58),
(1407, 12, 'Kaizhi', '2000', '', 123456789, '2019-12', 6.13, 9.75, 220, 3.9, 1760.22),
(1408, 13, 'xiongjie', '1600', '', 147258369, '2019-12', 2.57, 7.75, 176, 3.1, 1410.58),
(1409, 14, 'Ong', '1800', '', 659321478, '2019-12', 4.35, 8.75, 198, 3.5, 1585.4),
(1410, 15, 'Lee', '1800', '', 516849723, '2019-12', 4.35, 8.75, 198, 3.5, 1585.4),
(1411, 16, 'Jeremy', '1600', '', 2147483647, '2019-12', 2.57, 7.75, 176, 3.1, 1410.58),
(1412, 17, 'Goh', '1600', '', 2147483647, '2019-12', 2.57, 7.75, 176, 3.1, 1410.58),
(1413, 18, 'Lou', '784', '70', 1578845612, '2019-11', 0, 0, 0, 0, 784);

-- --------------------------------------------------------

--
-- Table structure for table `stock_table`
--

CREATE TABLE `stock_table` (
  `id` int(6) NOT NULL,
  `stock_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `available` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_table`
--

INSERT INTO `stock_table` (`id`, `stock_name`, `description`, `image`, `quantity`, `available`) VALUES
(4, 'Broom and Dust Pan', '', 'Broom and Dust Pan.jpg', 73, 1),
(6, 'Mop', '', 'Mop.jpg', 71, 1),
(7, 'Bucket', '', 'Bucket.jpg', 50, 1),
(8, 'Feather Dust', '', 'Feather Dust.jpg', 50, 1),
(9, 'Rags', '', 'Rags.jpg', 50, 1),
(10, 'Toilet Brush', '', 'Toilet Brush.jpg', 50, 1),
(11, 'Bathroom Cleaning', '', 'Bathroom Cleaning.jpg', 50, 1),
(12, 'Floor Cleaner', '', 'Floor Cleaner.jpg', 50, 1),
(13, 'Disinfecting cleaner', '', 'Disinfecting cleaner.jpg', 50, 1),
(14, 'Scrub brushes', '', 'Scrub brushes.jpg', 50, 1),
(15, 'Glass Cleaner', '', 'Glass Cleaner.jpg', 50, 1),
(16, 'Glass Squeegee', '', 'Glass Squeegee.jpg', 50, 1),
(17, 'Wood furniture polis', '', 'Wood furniture polish.jpg', 50, 1),
(18, 'Stainless steel cleaner', '', 'Stainless steel cleaner.jpg', 50, 1),
(19, 'Carpet cleaner', '', 'Carpet cleaner.jpg', 50, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bookingservice`
--
ALTER TABLE `bookingservice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `servicepackage`
--
ALTER TABLE `servicepackage`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `service_detail`
--
ALTER TABLE `service_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff_detail`
--
ALTER TABLE `staff_detail`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `staff_leave`
--
ALTER TABLE `staff_leave`
  ADD PRIMARY KEY (`LeaveID`);

--
-- Indexes for table `staff_salary`
--
ALTER TABLE `staff_salary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stock_table`
--
ALTER TABLE `stock_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingservice`
--
ALTER TABLE `bookingservice`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_detail`
--
ALTER TABLE `service_detail`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `staff_detail`
--
ALTER TABLE `staff_detail`
  MODIFY `staffID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff_leave`
--
ALTER TABLE `staff_leave`
  MODIFY `LeaveID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_salary`
--
ALTER TABLE `staff_salary`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1414;

--
-- AUTO_INCREMENT for table `stock_table`
--
ALTER TABLE `stock_table`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
