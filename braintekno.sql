-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 06:07 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `braintekno`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('yudha', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `data_login`
--

CREATE TABLE `data_login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_login`
--

INSERT INTO `data_login` (`username`, `password`) VALUES
('niaokta', '456789'),
('RINANDA', '123'),
('yudha', '123');

-- --------------------------------------------------------

--
-- Table structure for table `soal_1`
--

CREATE TABLE `soal_1` (
  `a` varchar(1) NOT NULL,
  `b` varchar(1) NOT NULL,
  `c` varchar(1) NOT NULL,
  `d` varchar(1) NOT NULL,
  `e` varchar(1) NOT NULL,
  `f` varchar(1) NOT NULL,
  `g` varchar(1) NOT NULL,
  `h` varchar(1) NOT NULL,
  `i` varchar(1) NOT NULL,
  `j` varchar(1) NOT NULL,
  `k` varchar(1) NOT NULL,
  `l` varchar(1) NOT NULL,
  `m` varchar(1) NOT NULL,
  `n` varchar(1) NOT NULL,
  `o` varchar(1) NOT NULL,
  `p` varchar(1) NOT NULL,
  `q` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal_1`
--

INSERT INTO `soal_1` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`) VALUES
('C', 'S', 'S', 'J', 'A', 'V', 'A', 'C', 'R', 'I', 'P', 'T', 'H', 'M', 'L', 'S', 'Q');

-- --------------------------------------------------------

--
-- Table structure for table `soal_2`
--

CREATE TABLE `soal_2` (
  `a` varchar(1) NOT NULL,
  `b` varchar(1) NOT NULL,
  `c` varchar(1) NOT NULL,
  `d` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal_2`
--

INSERT INTO `soal_2` (`a`, `b`, `c`, `d`) VALUES
('H', 'T', 'M', 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `soal_1`
--
ALTER TABLE `soal_1`
  ADD PRIMARY KEY (`a`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
