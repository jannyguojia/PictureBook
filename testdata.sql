-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 11:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitybook`
--

CREATE TABLE `activitybook` (
  `imgname` text NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activitybook`
--

INSERT INTO `activitybook` (`imgname`, `year`) VALUES
('book10', '1-2'),
('book11', '1-2'),
('book12', '2-3'),
('book13', '2-3'),
('book14', '3-4'),
('book15', '3-4');

-- --------------------------------------------------------

--
-- Table structure for table `picturebook`
--

CREATE TABLE `picturebook` (
  `imgname` text NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `picturebook`
--

INSERT INTO `picturebook` (`imgname`, `year`) VALUES
('book1', '1-2'),
('book2', '1-2'),
('book3', '1-2'),
('book4', '2-3'),
('book5', '2-3'),
('book6', '2-3'),
('book7', '3-4'),
('book8', '3-4'),
('book9', '3-4');

-- --------------------------------------------------------

--
-- Table structure for table `storybook`
--

CREATE TABLE `storybook` (
  `imgname` text NOT NULL,
  `pdfname` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storybook`
--

INSERT INTO `storybook` (`imgname`, `pdfname`, `price`) VALUES
('book2', '02-Georges Birthday', 9.29),
('book4', '04-Piggy Fun Active Book', 10.29),
('book5', '05-Peppas SPace Trip', 8.29),
('book6', '06-Recycling_Fun', 12.29),
('book7', '07-SUper Sparkly Sticker Book', 11.29),
('book8', '08-School_Bus_Trip', 10.29),
('book1', '01-Daddy Pigs Old Chair', 12.29),
('book3', '03-Nature_Trail', 11.29),
('book9', '09Bible-Quiet-Book', 0),
('book10', '10-Cars-Quiet-Book', 0),
('book11', '11-Counting-Play-Dough-Mats', 0),
('book12', '12-Dot-to-Dot-Quiet-Book', 0),
('book13', '13-Kids-Busy-Bags', 0),
('book14', '14-Play-Dough-Mats', 0),
('book16', '15-Princess-Quiet-Book', 0);

-- --------------------------------------------------------

--
-- Table structure for table `storybookcommit`
--

CREATE TABLE `storybookcommit` (
  `imgname` text NOT NULL,
  `commit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storybookcommit`
--

INSERT INTO `storybookcommit` (`imgname`, `commit`) VALUES
('book8', 'A thought-provoking narrative that delves deep into the human psyche.'),
('book5', 'This delightful picture book is a perfect introduction'),
('book2', 'my boy love it'),
('book7', 'love this book');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `dob` date NOT NULL,
  `sex` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`firstname`, `lastname`, `email`, `password`, `dob`, `sex`) VALUES
('sss', 'Guo', 'jannyguojia@sina.com', '123', '1992-04-24', 'female'),
('EEE', 'QQQ', 'jannyguojia@gmail.com', '123', '1970-01-21', 'male'),
('Emma', 'Tu', 'emma@sina.com', '123', '1970-01-01', 'female'),
('Emma', 'Tu', 'emma@sina.com', '123', '1970-01-01', 'female'),
('Emma', 'Tu', 'fff@sina.com', '123', '1970-01-01', 'female'),
('MMM', 'mmm', 'mmm@sina.com', '123', '1970-01-01', 'male');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
