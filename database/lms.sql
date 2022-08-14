-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 06:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adehyeman_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contact` int(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `voters_id` varchar(20) NOT NULL,
  `amount_needed` float NOT NULL,
  `type_name` varchar(30) NOT NULL,
  `months` int(10) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `meeting_place` varchar(30) NOT NULL,
  `officer_name` varchar(30) NOT NULL,
  `date_created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `name`, `username`, `contact`, `address`, `email`, `voters_id`, `amount_needed`, `type_name`, `months`, `group_name`, `meeting_place`, `officer_name`, `date_created`) VALUES
(11, 'Micheal Osei', 'Osei200', 590485736, 'Akim Aperade', 'Osei200@gmail.com', '2147483647', 3000, 'Group Loan', 4, 'Love', 'Ablagyei', 'Eric Ankrah', '2021-10-02'),
(12, 'Matilda Brown', 'Brown900', 546708572, 'Pawpaw', 'brown900@gmail.com', '1759801804', 2000, 'Group Loan', 4, 'Nyame Nsa', 'Adenta New Town', 'Ahuron Emmanuel', '2021-10-02'),
(14, 'Vivian Teye', 'Teye400', 546774783, 'Adenta', 'teye400@gmail.com', '5643100140', 4000, 'Group Loan', 4, 'Love', 'Ablagyei', 'Eric Ankrah', '2021-10-03'),
(15, 'Ahuron Emmanuel', 'Blakk', 546774876, 'Pawpaw', 'admin@gmail.com', '8776387140', 2000, 'Group Loan', 6, 'Love', 'Ablagyei', 'Eric Ankrah', '2021-10-03'),
(16, 'Ahuron Emmanuel', 'Ahuron29', 245379865, 'Circle', 'ahurone@gmail.com', '2147483647', 1500, 'Group Loan', 4, 'Nyame Nsa', 'Adenta New Town', 'Ahuron Emmanuel', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(50) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `voters_id` int(30) NOT NULL,
  `contact` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_registered` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `username`, `voters_id`, `contact`, `email`, `address`, `password`, `date_registered`) VALUES
(3, 'Ahuron Emmanuel', 'Ahuron29', 2147483647, 245379865, 'ahurone@gmail.com', 'Circle', 'Ahuron29!', '2021-10-02'),
(4, 'Doris Afua', 'Doris5029', 2147483647, 245375885, 'doris@gmail.com', 'Dome', 'Doris5029', '2021-10-02'),
(5, 'Frimpong Manu', 'Manu23', 2147483647, 249034857, 'manu456@gmail.com', 'Ashongman', 'Manu23', '2021-10-02'),
(6, 'Qwaku Oteng', 'Oteng300', 2147483647, 546283940, 'oteng300@gmail.com', 'Accra New Town', 'oteng300', '2021-10-02'),
(7, 'Micheal Osei', 'Osei200', 2147483647, 590485736, 'Osei200@gmail.com', 'Akim Aperade', 'Osei200', '2021-10-02'),
(8, 'Matilda Brown', 'Brown900', 1759801804, 546708572, 'brown900@gmail.com', 'Pawpaw', 'Brown900', '2021-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `meeting_place` text NOT NULL,
  `officer_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `meeting_place`, `officer_name`) VALUES
(32, 'Love', 'Ablagyei', 'Eric Ankrah'),
(33, 'Nyame Nsa', 'Adenta New Town', 'Ahuron Emmanuel');

-- --------------------------------------------------------

--
-- Table structure for table `loan_list`
--

CREATE TABLE `loan_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `loan_type_id` int(30) NOT NULL,
  `borrower_id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `purpose` text NOT NULL,
  `amount` double NOT NULL,
  `plan_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= request, 1= confrimed,2=released,3=complteted,4=denied\r\n',
  `date_released` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_list`
--

INSERT INTO `loan_list` (`id`, `ref_no`, `loan_type_id`, `borrower_id`, `username`, `purpose`, `amount`, `plan_id`, `status`, `date_released`, `date_created`) VALUES
(11, '61147947', 12, 11, 'Ahuron29', 'School', 2000, 8, 2, '2021-10-03 04:32:00', '2021-10-04 12:06:47'),
(12, '74247992', 12, 12, 'Brown900', 'School', 3000, 8, 2, '2021-10-03 09:20:00', '2021-10-04 12:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `loan_plan`
--

CREATE TABLE `loan_plan` (
  `id` int(30) NOT NULL,
  `months` int(11) NOT NULL,
  `interest_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_plan`
--

INSERT INTO `loan_plan` (`id`, `months`, `interest_percentage`) VALUES
(7, 2, 6),
(8, 4, 12),
(10, 6, 18),
(13, 12, 12),
(14, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `loan_schedules`
--

CREATE TABLE `loan_schedules` (
  `id` int(30) NOT NULL,
  `loan_id` int(30) NOT NULL,
  `date_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_schedules`
--

INSERT INTO `loan_schedules` (`id`, `loan_id`, `date_due`) VALUES
(69, 7, '2021-11-25'),
(70, 7, '2021-12-25'),
(71, 7, '2022-01-25'),
(72, 8, '2021-10-26'),
(73, 8, '2021-11-26'),
(74, 8, '2021-12-26'),
(75, 8, '2022-01-26'),
(76, 9, '2021-10-26'),
(77, 9, '2021-11-26'),
(78, 9, '2021-12-26'),
(79, 9, '2022-01-26'),
(80, 10, '2021-10-26'),
(81, 10, '2021-11-26'),
(82, 11, '2021-11-03'),
(83, 11, '2021-12-03'),
(84, 11, '2022-01-03'),
(85, 11, '2022-02-03'),
(86, 12, '2021-11-03'),
(87, 12, '2021-12-03'),
(88, 12, '2022-01-03'),
(89, 12, '2022-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(30) NOT NULL,
  `type_name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `type_name`, `description`) VALUES
(12, 'Group Loan', 'A group of 7 to 30 members in a group'),
(13, 'Salary Loan', 'Loan for Government workers');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `loan_id` int(30) NOT NULL,
  `payee` text NOT NULL,
  `username` varchar(40) NOT NULL,
  `amount` float NOT NULL,
  `savings` float NOT NULL,
  `overdue` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=no , 1 = yes',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `loan_id`, `payee`, `username`, `amount`, `savings`, `overdue`, `date_created`) VALUES
(8, 11, 'Micheal Osei, Osei200', 'Osei200', 140, 50, 0, '2021-10-03 04:20:16'),
(9, 11, 'Micheal Osei, Osei200', 'Osei200', 140, 50, 0, '2021-10-03 04:20:17'),
(12, 12, 'Matilda Brown, Brown900', 'Brown900', 210, 60, 0, '2021-10-03 07:28:31'),
(13, 12, 'Matilda Brown, Brown900', 'Brown900', 210, 60, 0, '2021-10-03 07:28:31'),
(14, 11, 'Micheal Osei, Osei200', 'Osei200', 140, 30, 0, '2021-10-04 16:02:17'),
(15, 11, 'Micheal Osei, Osei200', 'Osei200', 140, 30, 0, '2021-10-04 16:02:17'),
(16, 12, 'Matilda Brown, Brown900', 'Brown900', 210, 40, 0, '2021-10-04 17:29:34'),
(17, 12, 'Matilda Brown, Brown900', 'Brown900', 210, 40, 0, '2021-10-04 17:29:34'),
(18, 12, 'Matilda Brown, Brown900', 'Brown900', 210, 0, 0, '2021-10-04 17:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff',
  `login_time_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `contact`, `username`, `password`, `type`, `login_time_update`) VALUES
(1, 'Administrator', 'Pawpaw', 245789003, 'admin', 'admin123', 1, '2021-09-30'),
(16, 'Ahuron Emmanuel', 'Adenta', 242675029, 'Ahuron29', 'Ahuron29!', 2, '2021-09-30'),
(17, 'Eric Ankrah', 'Achimota', 247839047, 'Ankrah Eric', 'Eric101042', 2, '2021-09-30'),
(18, 'Staphen Tenkorang', 'Pawpaw', 240885952, 'Steve1705', 'Steve123', 2, '2021-09-30'),
(19, 'Naa Maako', 'Madina', 546708572, 'Maako123', 'Maako123', 2, '2021-09-30'),
(21, 'Florence Adjei', 'Circle', 546782839, 'Favor', '024267800827', 2, '2021-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_list`
--
ALTER TABLE `loan_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_plan`
--
ALTER TABLE `loan_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_schedules`
--
ALTER TABLE `loan_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `loan_list`
--
ALTER TABLE `loan_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loan_plan`
--
ALTER TABLE `loan_plan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loan_schedules`
--
ALTER TABLE `loan_schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
