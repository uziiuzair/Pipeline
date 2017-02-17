-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 17, 2017 at 06:55 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pipeline`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `authname` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `authname`, `authKey`) VALUES
(1, 'test', 't5AEYG0rmwAJv58zEOudp6EUw'),
(2, 'testKey', '59UBt7TToOyWOGL7eX9pa2z41'),
(3, 'AnotherKey', 'PIkFFyPS8MAmIMgUPBsVq46te'),
(4, 'Help', 'BzHkkw2EbHd1AmOaIxXYrMzTI'),
(5, 'Facebook', '2CV35WShlyV5cyj2o04nf8oBX');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;