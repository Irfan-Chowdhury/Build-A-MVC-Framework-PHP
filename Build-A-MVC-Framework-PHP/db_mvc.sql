-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 10:08 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `title`) VALUES
(2, 'Technology', 'Technology bindValue'),
(3, 'Others Cat', 'Others Cat'),
(4, 'Result', 'Result'),
(12, 'Technology', 'Technology'),
(14, 'Mobile', 'Mobile'),
(18, 'SAMSUNG', 'S4'),
(19, 'WALTON', 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `title`, `content`, `cat`) VALUES
(1, 'Cricket Live stream Will be go here.', '<p>Cricket Live stream Will be go here..First post content will be go here.First post content will be go here.First post content will be go here.</p>\r\n\r\n<p>First post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.</p>', 3),
(2, 'FootballLive stream Will be go here.', '<p>FootballLive stream Will be go here..First post content will be go here.First post content will be go here.</p>\r\n\r\n<p>Second post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.</p>', 3),
(3, 'SSC result will be publish', '<p>SSC result will be publish.First post content will be go here.First post content will be go here.First post content will be go here.</p>\r\n\r\n<p>Third post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.</p>', 2),
(4, 'HSC result will be publish', '<p>HSC result will be publish.First post content will be go here.First post content will be go here.First post content will be go here.</p>\r\n\r\n<p>fourth post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.First post content will be go here.</p>', 2),
(5, 'WALTON', 'this is testing ppppp\r\nthis is testing this is testing \r\nthis is testing this is testing this is testing this is testing this is testing this is testing this is testing this is testing this is testing this is testing', 12),
(6, 'after validation', 'xxxxx\r\nThis is new post after validationThis is new post after validationThis is new post after validation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `username`, `password`, `level`) VALUES
(1, 'admin', '123', 1),
(8, 'Author', '202cb962ac59075b964b07152d234b', 2),
(10, 'Irfan', '123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
