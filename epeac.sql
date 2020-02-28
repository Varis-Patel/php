-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 03:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epeac`
--

-- --------------------------------------------------------

--
-- Table structure for table `epeac_addemployee`
--

CREATE TABLE `epeac_addemployee` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_address` varchar(500) NOT NULL,
  `e_contact` varchar(100) NOT NULL,
  `e_email` varchar(100) NOT NULL,
  `e_dob` varchar(100) NOT NULL,
  `e_manager_assign` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epeac_addemployee`
--

INSERT INTO `epeac_addemployee` (`e_id`, `e_name`, `e_address`, `e_contact`, `e_email`, `e_dob`, `e_manager_assign`) VALUES
(9, 'Employee1', 'line1,\r\nline2,\r\nline1', 'e1111111', 'employee1@gmail.com', '1111-11-11', '7'),
(10, 'employee2', 'line1,line2,line2', 'e22222', 'employee2@gmail.com', '2222-02-22', '7'),
(11, 'employee3', 'line1,\r\nline2,\r\nline3', 'e3333333', 'employee3@gmail.com', '3333-03-03', '8'),
(12, 'employee4', 'line1,\r\nline2,\r\nline4', 'e4444444', 'employee4@gmail.com', '4444-04-04', '8'),
(13, 'employee5', 'address line1,\r\naddress line2,\r\naddress line3\r\n\r\n', '55555', 'employee5@gmail.com', '5555-05-05', '7'),
(14, 'employee6', 'address line1,\r\naddress line2,\r\naddress line3', '666666', 'employee6@gmail.com', '6666-06-06', '8'),
(15, 'employee7', 'address line1,\r\naddress line2,\r\naddress line3', '777777', 'employee7@gmail.com', '7777-07-07', '7'),
(16, 'employee8', 'address line1,\r\naddress line2,\r\naddress line3', '888888', 'employee8@gmail.com', '8888-08-08', '8');

-- --------------------------------------------------------

--
-- Table structure for table `epeac_addmanager`
--

CREATE TABLE `epeac_addmanager` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_address` varchar(500) NOT NULL,
  `m_contact` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_dob` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epeac_addmanager`
--

INSERT INTO `epeac_addmanager` (`m_id`, `m_name`, `m_address`, `m_contact`, `m_email`, `m_dob`) VALUES
(7, 'manager1', 'line1,\r\nline2,\r\nline3\r\n', '1111111', 'manager1@gmail.com', '1111-11-11'),
(8, 'manager2', 'line1,\r\nline2,\r\nline3', '22222', 'manager2@gmail.com', '2222-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `epeac_admin`
--

CREATE TABLE `epeac_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epeac_admin`
--

INSERT INTO `epeac_admin` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `epeac_employee`
--

CREATE TABLE `epeac_employee` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epeac_employee`
--

INSERT INTO `epeac_employee` (`id`, `fullname`, `email`, `password`) VALUES
(5, 'employee1', 'employee1@gmail.com', '11111'),
(7, 'employee2', 'employee2@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `epeac_manager`
--

CREATE TABLE `epeac_manager` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epeac_manager`
--

INSERT INTO `epeac_manager` (`id`, `fullname`, `email`, `password`) VALUES
(2, 'manager1', 'manager1@gmail.com', '11111'),
(3, 'manager2', 'manager2@gmail.com', '22222');

-- --------------------------------------------------------

--
-- Table structure for table `epeac_review`
--

CREATE TABLE `epeac_review` (
  `r_id` int(11) NOT NULL,
  `r_employee` varchar(100) NOT NULL,
  `r_review` varchar(500) NOT NULL,
  `r_rating` varchar(50) NOT NULL,
  `r_from` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epeac_task`
--

CREATE TABLE `epeac_task` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_stages` varchar(500) NOT NULL,
  `t_duedate` varchar(50) NOT NULL,
  `t_status` varchar(100) NOT NULL,
  `t_bonus` varchar(100) NOT NULL,
  `t_manager` varchar(100) NOT NULL,
  `t_employee` varchar(100) NOT NULL,
  `t_submit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epeac_task`
--

INSERT INTO `epeac_task` (`t_id`, `t_name`, `t_stages`, `t_duedate`, `t_status`, `t_bonus`, `t_manager`, `t_employee`, `t_submit`) VALUES
(8, 'task1', 'stage1,\r\nstage2', '2019-11-10', 'Completed', '1111', '7', '9', '2019-11-10'),
(9, 'task2', 'stage1,\r\nstage2', '2222-02-22', 'Pending', '2222', '7', '10', ''),
(10, 'task3', 'stage1,\r\nstage2', '3333-03-03', 'Pending', '3333', '8', '', ''),
(11, 'task4', 'stage1,\r\nstage2', '4444-04-04', 'Pending', '4444', '8', '', ''),
(12, 'task5', 'stage1,\r\nstage2', '2019-05-05', 'Completed', '55555', '7', '9', '2019-10-30'),
(13, 'task6', 'stage1,\r\nstage2', '6666-06-06', 'Pending', '6666', '8', '', ''),
(14, 'task7', 'stage1,\r\nstage2', '7777-07-07', 'Pending', '7777', '7', '10', ''),
(15, 'task8', 'stage1,\r\nstage2', '8888-08-08', 'Pending', '8888', '8', '', ''),
(16, 'task9', 'stage1,\r\nstage2', '9999-09-09', 'Pending', '9999', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `epeac_token`
--

CREATE TABLE `epeac_token` (
  `id` int(11) NOT NULL,
  `token` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `epeac_addemployee`
--
ALTER TABLE `epeac_addemployee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `epeac_addmanager`
--
ALTER TABLE `epeac_addmanager`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `epeac_admin`
--
ALTER TABLE `epeac_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epeac_employee`
--
ALTER TABLE `epeac_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epeac_manager`
--
ALTER TABLE `epeac_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epeac_review`
--
ALTER TABLE `epeac_review`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `epeac_task`
--
ALTER TABLE `epeac_task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `epeac_token`
--
ALTER TABLE `epeac_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `epeac_addemployee`
--
ALTER TABLE `epeac_addemployee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `epeac_addmanager`
--
ALTER TABLE `epeac_addmanager`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `epeac_admin`
--
ALTER TABLE `epeac_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `epeac_employee`
--
ALTER TABLE `epeac_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `epeac_manager`
--
ALTER TABLE `epeac_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `epeac_review`
--
ALTER TABLE `epeac_review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `epeac_task`
--
ALTER TABLE `epeac_task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `epeac_token`
--
ALTER TABLE `epeac_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
