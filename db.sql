-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 12, 2018 at 03:32 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

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
(5, 'Facebook', '2CV35WShlyV5cyj2o04nf8oBX'),
(6, 'blabla', 'e5b1240f7b0bad434f112b7f56d48a15b18ae908'),
(8, 'jlkjl', '14453e1cc23f35158b259549fc073cf8995060a9'),
(9, 'dcdcd', '8f7f6f2820e934a0b4cd10553ad62d04955bdafb');

-- --------------------------------------------------------

--
-- Table structure for table `endpoints`
--

CREATE TABLE `endpoints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `endpoint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endpoints`
--

INSERT INTO `endpoints` (`id`, `name`, `endpoint`) VALUES
(1, 'tests', 'http://localhost:8888/Pipeline/calls.php?c=tests'),
(2, 'hgvhgvhg', 'http://localhost:8888/Pipeline/calls.php?c=hgvhgvhg'),
(3, 'hgvhgvhg', 'http://localhost:8888/Pipeline/calls.php?c=hgvhgvhg'),
(4, 'testing', 'PIPES_URLcalls.php?c=testing'),
(5, 'bnbvhv', 'http://localhost:8888/Pipeline/calls.php?c=bnbvhv');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `admin`) VALUES
(1, 'uziiuzair', 'Seleena456', 'hayatuzair@gmail.com', 'Uzair Hayat', 1),
(2, '', '', 'business@uziiuzair.com', '', 0),
(3, 'sj_', 'Seleena456', 'uzair@creativelog.org', 'Seleena Jarligo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `webhooks`
--

CREATE TABLE `webhooks` (
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webhooks`
--

INSERT INTO `webhooks` (`date`) VALUES
('0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endpoints`
--
ALTER TABLE `endpoints`
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
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `endpoints`
--
ALTER TABLE `endpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
