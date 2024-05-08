-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 08:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpayroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`admin_id`, `admin_name`, `password`) VALUES
(5001, 'Shan Pym', 'admin'),
(5002, 'Robo Grey', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `RFID_no` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `time_arrival` varchar(255) NOT NULL,
  `time_departure` varchar(255) NOT NULL,
  `e_date` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `overtime` varchar(255) NOT NULL,
  `e_department` varchar(255) NOT NULL,
  `e_hourlyrates` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `employee_id`, `RFID_no`, `employee_name`, `time_arrival`, `time_departure`, `e_date`, `total_hours`, `overtime`, `e_department`, `e_hourlyrates`) VALUES
(351, '7012', '0011693903', 'Khristian Limpin', '06:33:22', '18:35:21', '2024-01-20', '12', '4', 'Web Developer', '200'),
(357, '7003', '0011640296', 'Shan Pym', '06:36:53', '15:38:32', '2024-01-20', '9', '1', 'IT Support', '500');

-- --------------------------------------------------------

--
-- Table structure for table `companyrecords`
--

CREATE TABLE `companyrecords` (
  `reference_no` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_hourlyrates` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `overtime` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `netpay` varchar(255) NOT NULL,
  `date_paid` varchar(255) NOT NULL,
  `total_earn` varchar(255) NOT NULL,
  `total_deduct` varchar(255) NOT NULL,
  `e_department` varchar(255) NOT NULL,
  `tgrosspay` varchar(255) NOT NULL,
  `tovertime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeedata`
--

CREATE TABLE `employeedata` (
  `id_number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `RFID_no` varchar(255) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_contactno` varchar(255) NOT NULL,
  `e_gender` varchar(255) NOT NULL,
  `e_dob` varchar(255) NOT NULL,
  `e_datehired` varchar(255) NOT NULL,
  `e_hourlyrates` varchar(255) NOT NULL,
  `e_department` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `overtime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeedata`
--

INSERT INTO `employeedata` (`id_number`, `password`, `RFID_no`, `e_name`, `e_contactno`, `e_gender`, `e_dob`, `e_datehired`, `e_hourlyrates`, `e_department`, `status`, `total_hours`, `overtime`) VALUES
(7003, 'employee', '0011640296', 'Shan Pym', '09652983819', 'Female', '2024-01-05', '2024-01-20', '500', 'IT Support', 'Intern', '', ''),
(7012, 'employee', '0011693903', 'Khristian Limpin', '09182748264', 'Male', '2024-01-04', '2024-01-19', '200', 'Web Developer', 'Intern', '', ''),
(7013, 'employee', '0011888712', 'Jenicole', '09652871625', 'Female', '2024-01-06', '2024-01-19', '500', 'IT Support', 'Contractual', '', ''),
(7014, 'employee', '0011778618', 'Shenna Baladjay', '09762837461', 'Male', '2024-01-03', '2024-01-12', '500', 'IT Support', 'Intern', '', ''),
(7015, 'employee', '0011907713', 'Ivan James Lacsamana', '09762837162', 'Male', '2024-01-13', '2024-01-20', '500', 'Web Developer', 'Intern', '', ''),
(7016, 'employee', '0011886418', 'Shainalyn Estrada', '09652736182', 'Male', '2024-01-05', '2024-01-19', '500', 'IT Support', 'Intern', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `companyrecords`
--
ALTER TABLE `companyrecords`
  ADD PRIMARY KEY (`reference_no`);

--
-- Indexes for table `employeedata`
--
ALTER TABLE `employeedata`
  ADD PRIMARY KEY (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5001003;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `companyrecords`
--
ALTER TABLE `companyrecords`
  MODIFY `reference_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000047;

--
-- AUTO_INCREMENT for table `employeedata`
--
ALTER TABLE `employeedata`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7017;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
