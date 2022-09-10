-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 04:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_management`
--
CREATE DATABASE IF NOT EXISTS `attendance_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `attendance_management`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_status_table`
--

CREATE TABLE `attendance_status_table` (
  `s_no` int(11) NOT NULL,
  `faculty_reg_no` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `regulation` varchar(5) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `section` varchar(5) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `period` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `cur_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_status_table`
--

INSERT INTO `attendance_status_table` (`s_no`, `faculty_reg_no`, `course`, `regulation`, `branch`, `section`, `subject`, `period`, `insert_date`, `cur_timestamp`) VALUES
(1, '192h1a05g3', 'b.tech', 'r19', 'cse', 'c', 'flat', 0, '2022-08-31', '2022-08-31 13:03:10'),
(2, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'ds', 0, '2022-08-31', '2022-08-31 13:05:37'),
(3, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'bda', 0, '2022-08-31', '2022-08-31 13:06:14'),
(4, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'ds', 0, '2022-09-01', '2022-08-31 18:57:45'),
(5, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'bda', 0, '2022-09-01', '2022-09-01 11:36:42'),
(6, '192h1a05g3', 'b.tech', 'r19', 'cse', 'c', 'flat', 0, '2022-09-01', '2022-09-01 12:59:33'),
(7, '192h1a05f7', 'mba', 'r20', '', 'a', 'test_mba', 0, '2022-09-01', '2022-09-01 15:29:15'),
(8, '192h1a05f7', 'mca', 'r20', '', 'a', 'test_mca', 0, '2022-09-01', '2022-09-01 15:43:32'),
(9, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'psp', 0, '2022-09-01', '2022-09-01 16:34:31'),
(10, '192h1a05f7', 'mca', 'r20', '', 'a', 'test_mca', 0, '2022-09-07', '2022-09-07 05:25:16'),
(11, '192h1a05f7', 'mca', 'r20', '', 'a', 'test_mca', 0, '2022-09-08', '2022-09-08 05:02:39'),
(12, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'ds', 0, '2022-09-08', '2022-09-08 07:21:04'),
(13, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'bda', 0, '2022-09-08', '2022-09-08 07:28:40'),
(14, '192h1a05f7', 'mba', 'r20', '', 'a', 'test_mba', 0, '2022-09-08', '2022-09-08 07:37:27'),
(15, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'psp', 0, '2022-09-08', '2022-09-08 07:38:29'),
(16, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'ds', 0, '2022-09-09', '2022-09-09 08:29:13'),
(17, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'bda', 0, '2022-09-09', '2022-09-09 08:30:34'),
(24, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'ds', 1, '2022-09-10', '2022-09-10 12:26:40'),
(25, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'bda', 2, '2022-09-10', '2022-09-10 12:29:46'),
(26, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'psp', 3, '2022-09-10', '2022-09-10 12:30:35'),
(27, '192h1a05g3', 'b.tech', 'r19', 'cse', 'c', 'flat', 4, '2022-09-10', '2022-09-10 13:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_table`
--

CREATE TABLE `attendance_table` (
  `s_no` int(11) NOT NULL,
  `student_reg_no` varchar(50) NOT NULL,
  `faculty_reg_no` varchar(15) NOT NULL,
  `attendance_status` int(1) NOT NULL,
  `course` varchar(50) NOT NULL,
  `regulation` varchar(5) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `section` varchar(5) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `insert_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_table`
--

INSERT INTO `attendance_table` (`s_no`, `student_reg_no`, `faculty_reg_no`, `attendance_status`, `course`, `regulation`, `branch`, `section`, `subject`, `insert_time`) VALUES
(1, '192h1a05a1', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(2, '192h1a05a2', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(3, '192h1a05d1', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(4, '192h1a05d2', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(5, '192h1a05d3', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(6, '192h1a05d4', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(7, '192h1a05d5', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(8, '192h1a05d6', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(9, '192h1a05d7', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-31'),
(10, '192h1a05a1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(11, '192h1a05a2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(12, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(13, '192h1a05d2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(14, '192h1a05d3', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(15, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(16, '192h1a05d5', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(17, '192h1a05d6', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(18, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-31'),
(19, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(20, '192h1a05a2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(21, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(22, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(23, '192h1a05d3', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(24, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(25, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(26, '192h1a05d6', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(27, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-31'),
(28, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(29, '192h1a05a2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(30, '192h1a05d1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(31, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(32, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(33, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(34, '192h1a05d5', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(35, '192h1a05d6', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(36, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-01'),
(37, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(38, '192h1a05a2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(39, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(40, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(41, '192h1a05d3', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(42, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(43, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(44, '192h1a05d6', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(45, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-01'),
(46, '192h1a05a1', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(47, '192h1a05a2', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(48, '192h1a05d1', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(49, '192h1a05d2', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(50, '192h1a05d3', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(51, '192h1a05d4', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(52, '192h1a05d5', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(53, '192h1a05d6', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(54, '192h1a05d7', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-01'),
(55, '192h1a05a3', '192h1a05f7', 1, 'mba', 'r20', '', 'a', 'test_mba', '2022-09-01'),
(56, '202h1a05a1', '192h1a05f7', 0, 'mca', 'r20', '', 'a', 'test_mca', '2022-09-01'),
(57, '192h1a05a1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(58, '192h1a05a2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(59, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(60, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(61, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(62, '192h1a05d4', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(63, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(64, '192h1a05d6', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(65, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01'),
(66, '202h1a05a1', '192h1a05f7', 1, 'mca', 'r20', '', 'a', 'test_mca', '2022-09-07'),
(67, '202h1a05a1', '192h1a05f7', 1, 'mca', 'r20', '', 'a', 'test_mca', '2022-09-08'),
(68, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(69, '192h1a05a2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(70, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(71, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(72, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(73, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(74, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(75, '192h1a05d6', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(76, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-08'),
(77, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(78, '192h1a05a2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(79, '192h1a05d1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(80, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(81, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(82, '192h1a05d4', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(83, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(84, '192h1a05d6', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(85, '192h1a05d7', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-08'),
(86, '192h1a05a3', '192h1a05f7', 1, 'mba', 'r20', '', 'a', 'test_mba', '2022-09-08'),
(87, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(88, '192h1a05a2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(89, '192h1a05d1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(90, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(91, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(92, '192h1a05d4', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(93, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(94, '192h1a05d6', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(95, '192h1a05d7', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-08'),
(96, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(97, '192h1a05a2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(98, '192h1a05d1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(99, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(100, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(101, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(102, '192h1a05d5', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(103, '192h1a05d6', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(104, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-09'),
(105, '192h1a05a1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(106, '192h1a05a2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(107, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(108, '192h1a05d2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(109, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(110, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(111, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(112, '192h1a05d6', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(113, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-09'),
(161, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(162, '192h1a05a2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(163, '192h1a05d1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(164, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(165, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(166, '192h1a05d4', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(167, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(168, '192h1a05d6', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(169, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-09-10'),
(170, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(171, '192h1a05a2', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(172, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(173, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(174, '192h1a05d3', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(175, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(176, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(177, '192h1a05d6', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(178, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-09-10'),
(179, '192h1a05a1', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(180, '192h1a05a2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(181, '192h1a05d1', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(182, '192h1a05d2', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(183, '192h1a05d3', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(184, '192h1a05d4', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(185, '192h1a05d5', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(186, '192h1a05d6', '192h1a05f7', 1, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(187, '192h1a05d7', '192h1a05f7', 0, 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-10'),
(188, '192h1a05a1', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(189, '192h1a05a2', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(190, '192h1a05d1', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(191, '192h1a05d2', '192h1a05g3', 1, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(192, '192h1a05d3', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(193, '192h1a05d4', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(194, '192h1a05d5', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(195, '192h1a05d6', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10'),
(196, '192h1a05d7', '192h1a05g3', 0, 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `branch_table`
--

CREATE TABLE `branch_table` (
  `branch_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `regulation` varchar(3) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_table`
--

INSERT INTO `branch_table` (`branch_id`, `course_name`, `regulation`, `branch`, `insert_time`) VALUES
(1, 'b.tech', 'r19', 'cse', '2022-08-22 18:35:08'),
(2, 'b.tech', 'r19', 'ece', '2022-08-22 18:35:45'),
(3, 'b.tech', 'r19', 'eee', '2022-08-22 18:35:45'),
(4, 'b.tech', 'r19', 'civil', '2022-08-22 18:36:08'),
(5, 'b.tech', 'r19', 'mech', '2022-08-22 18:36:08'),
(6, 'b.tech', 'r20', 'cse', '2022-08-22 18:37:23'),
(7, 'b.tech', 'r21', 'cse', '2022-08-22 18:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`course_id`, `course_name`, `insert_time`) VALUES
(1, 'mba', '2022-08-22 18:21:00'),
(2, 'mca', '2022-08-22 18:21:43'),
(3, 'b.tech', '2022-08-22 18:21:43'),
(4, 'm.tech', '2022-08-22 18:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_table`
--

CREATE TABLE `faculty_table` (
  `sno` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_table`
--

INSERT INTO `faculty_table` (`sno`, `reg_no`, `name`, `mobile_no`, `email`, `password`, `branch`) VALUES
(1, '192h1a05f7', 'test faculity', '1234567890', 'email@gmail.com', '12345678', 'cse'),
(2, '192h1a05g3', 'test 2', '7667107173', 'email2@gmail.com', '12345678', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `regulation_table`
--

CREATE TABLE `regulation_table` (
  `regulation_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `regulation` varchar(3) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regulation_table`
--

INSERT INTO `regulation_table` (`regulation_id`, `course_name`, `regulation`, `insert_time`) VALUES
(1, 'b.tech', 'r19', '2022-08-22 18:27:59'),
(2, 'b.tech', 'r20', '2022-08-22 18:28:47'),
(3, 'b.tech', 'r21', '2022-08-22 18:28:47'),
(4, 'mba', 'r20', '2022-08-22 18:30:11'),
(5, 'mba', 'r21', '2022-08-22 18:30:11'),
(6, 'mca', 'r20', '2022-08-22 18:31:02'),
(7, 'mca', 'r21', '2022-08-22 18:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `section_table`
--

CREATE TABLE `section_table` (
  `section_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `regulation` varchar(3) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `section` varchar(2) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_table`
--

INSERT INTO `section_table` (`section_id`, `course_name`, `regulation`, `branch`, `section`, `insert_time`) VALUES
(1, 'b.tech', 'r19', 'cse', 'a', '2022-08-22 18:40:50'),
(2, 'b.tech', 'r19', 'cse', 'b', '2022-08-22 18:40:50'),
(4, 'b.tech', 'r19', 'cse', 'c', '2022-08-22 18:41:32'),
(5, 'b.tech', 'r21', 'cse', 'a', '2022-08-22 18:41:32'),
(6, 'mca', 'r20', '', 'a', '2022-08-24 08:54:24'),
(7, 'mba', 'r20', '', 'a', '2022-08-24 08:55:29'),
(8, 'b.tech', 'r19', 'ece', 'a', '2022-08-25 09:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `students_details_table`
--

CREATE TABLE `students_details_table` (
  `s_no` int(11) NOT NULL,
  `reg_no` varchar(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `course` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `section` varchar(5) NOT NULL,
  `regulation` varchar(5) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `p_mobile_no` varchar(10) NOT NULL,
  `p_email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_details_table`
--

INSERT INTO `students_details_table` (`s_no`, `reg_no`, `name`, `gender`, `date_of_birth`, `course`, `branch`, `section`, `regulation`, `mobile_no`, `email_id`, `state`, `district`, `p_mobile_no`, `p_email`, `password`, `insert_time`) VALUES
(1, '192h1a05a1', 'test name', 'male', '2000-05-30', 'b.tech', 'cse', 'c', 'r19', '1234567890', 'test@gmail.com', 'bihar', 'nalanda', '0987654321', 'testParent@gmail.com', '12345', '2022-08-24 12:16:12'),
(2, '192h1a05a2', 'test 2', 'female', '2022-08-18', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'tesy2@gmail.copm', 'andhra', 'tirupati', '3843748933', 'test2Parent@gmail.com', '0987', '2022-08-24 12:39:20'),
(3, '192h1a05a3', 'test mba', 'male', '2013-08-23', 'mba', '', 'a', 'r20', '3424453243', 'testmba@gmail.vom', 'up', 'lucknow', '098709870', 'testmbaparent@gmail.com', '2345', '2022-08-24 12:42:42'),
(4, '192h1a0543', 'test ece', 'female', '2002-08-13', 'b.tech', 'ece', 'a', 'r19', '1234567890', 'testWece@gmail.cin', 'andhra', 'nelloire', '0987654321', 'testeceparent#@gmail.com', '1233435', '2022-08-25 09:32:13'),
(5, '202h1a05a1', 'testmca', 'female', '2022-08-10', 'mca', '', 'a', 'r20', '7667107173', 'tetsmca@gmal.coim', 'bigar', 'jkkajsd', '12342143', '12342412@gmail.com', '121432', '2022-08-25 09:35:06'),
(6, '192h1a05d1', 'test cse', 'male', '2022-08-11', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'test@gmail.com', 'andhra', 'nelorew', '3843748933', 't5est@gmail.co', 'sfsaf', '2022-08-26 09:34:40'),
(7, '192h1a05d2', 'test cse', 'male', '2022-08-11', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'test@gmail.com', 'andhra', 'nelorew', '3843748933', 't5est@gmail.co', 'sfsaf', '2022-08-26 09:35:27'),
(8, '192h1a05d3', 'test cse', 'male', '2022-08-11', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'test@gmail.com', 'andhra', 'nelorew', '3843748933', 't5est@gmail.co', 'sfsaf', '2022-08-26 09:35:39'),
(9, '192h1a05d4', 'test cse', 'male', '2022-08-11', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'test@gmail.com', 'andhra', 'nelorew', '3843748933', 't5est@gmail.co', 'sfsaf', '2022-08-26 09:36:53'),
(10, '192h1a05d5', 'test cse', 'male', '2022-08-11', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'test@gmail.com', 'andhra', 'nelorew', '3843748933', 't5est@gmail.co', 'sfsaf', '2022-08-26 09:36:53'),
(11, '192h1a05d6', 'test cse', 'male', '2022-08-11', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'test@gmail.com', 'andhra', 'nelorew', '3843748933', 't5est@gmail.co', 'sfsaf', '2022-08-26 09:36:53'),
(12, '192h1a05d7', 'test cse', 'male', '2022-08-11', 'b.tech', 'cse', 'c', 'r19', '6202671519', 'test@gmail.com', 'andhra', 'nelorew', '3843748933', 't5est@gmail.co', 'sfsaf', '2022-08-26 09:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

CREATE TABLE `subject_table` (
  `subject_id` int(11) NOT NULL,
  `faculty_reg_no` varchar(50) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `regulation` varchar(5) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `section` varchar(5) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`subject_id`, `faculty_reg_no`, `course_name`, `regulation`, `branch`, `section`, `subject`, `insert_time`) VALUES
(1, '192h1a05g3', 'b.tech', 'r19', 'cse', 'c', 'flat', '2022-08-27 16:17:05'),
(2, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'ds', '2022-08-27 16:17:05'),
(3, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'bda', '2022-08-30 16:12:27'),
(4, '192h1a05f7', 'b.tech', 'r19', 'cse', 'c', 'psp', '2022-09-01 15:26:15'),
(5, '192h1a05f7', 'mba', 'r20', '', 'a', 'test_mba', '2022-09-01 15:28:47'),
(6, '192h1a05f7', 'mca', 'r20', '', 'a', 'test_mca', '2022-09-01 15:43:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_status_table`
--
ALTER TABLE `attendance_status_table`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `branch_table`
--
ALTER TABLE `branch_table`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty_table`
--
ALTER TABLE `faculty_table`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `regulation_table`
--
ALTER TABLE `regulation_table`
  ADD PRIMARY KEY (`regulation_id`);

--
-- Indexes for table `section_table`
--
ALTER TABLE `section_table`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students_details_table`
--
ALTER TABLE `students_details_table`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `subject_table`
--
ALTER TABLE `subject_table`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_status_table`
--
ALTER TABLE `attendance_status_table`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `attendance_table`
--
ALTER TABLE `attendance_table`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `branch_table`
--
ALTER TABLE `branch_table`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_table`
--
ALTER TABLE `faculty_table`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `regulation_table`
--
ALTER TABLE `regulation_table`
  MODIFY `regulation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section_table`
--
ALTER TABLE `section_table`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students_details_table`
--
ALTER TABLE `students_details_table`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject_table`
--
ALTER TABLE `subject_table`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
