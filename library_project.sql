-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 01:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `address`, `contact`, `gender`, `email`, `password`) VALUES
(1, 'Utsav Prasad Sah', 'Malangwa', 9801219695, 'male', 'utsavsah80@gmail.com', '12345'),
(2, 'ranjit', 'Malangwa', 98012345678, 'male', 'ranjit@gmail.com', '123'),
(3, 'utsav', 'Malangwa', 9801219843, 'male', 'utsav@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookauthor`
--

INSERT INTO `bookauthor` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Bjarne Stroustrupm', '2023-12-30 09:31:49', '2024-01-17 03:21:31'),
(2, 'Kapil Babu Dahal', '2023-12-30 09:32:25', NULL),
(3, 'Dr. M.L Sharma', '2023-12-30 09:36:59', NULL),
(4, 'Alex Dhita', '2023-12-30 09:37:19', '2024-01-11 02:42:22'),
(5, 'Laxmi Prasad Devkota', '2023-12-30 09:37:27', NULL),
(6, 'Dr. Dilip Parajuli', '2023-12-30 09:38:08', NULL),
(7, 'HC Verma', '2023-12-30 09:39:52', NULL),
(8, 'Herbert Schildt', '2023-12-30 09:43:39', NULL),
(9, 'Anita Desai', '2023-12-30 09:44:28', NULL),
(10, 'Richard Feynman', '2023-12-30 09:45:41', NULL),
(11, 'Bonnie Garmus', '2023-12-30 09:46:32', NULL),
(14, 'Utsav Prasad Sah', '2024-01-17 03:22:11', '2024-01-17 03:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Programming', 1, '2023-12-30 09:21:46', '0000-00-00 00:00:00'),
(2, 'Health', 1, '2023-12-30 09:22:27', '0000-00-00 00:00:00'),
(3, 'Science', 1, '2023-12-30 09:22:39', '2024-01-18 03:03:02'),
(4, 'Hacking', 0, '2023-12-30 09:22:47', '2024-01-16 15:15:42'),
(5, 'Stories Book', 1, '2023-12-30 09:23:13', '0000-00-00 00:00:00'),
(6, 'Management ', 1, '2023-12-30 09:23:48', '0000-00-00 00:00:00'),
(7, 'General', 1, '2023-12-30 09:23:58', '0000-00-00 00:00:00'),
(8, 'Technology ', 1, '2023-12-30 09:24:23', '0000-00-00 00:00:00'),
(10, 'Romantic ', 0, '2023-12-30 09:25:10', '2024-01-16 15:15:50'),
(12, 'Physiology ', 1, '2023-12-30 09:26:50', '0000-00-00 00:00:00'),
(13, 'chemist', 1, '2023-12-30 09:28:03', '0000-00-00 00:00:00'),
(14, 'Astronomer', 1, '2023-12-30 09:28:25', '0000-00-00 00:00:00'),
(15, 'Other..', 1, '2023-12-30 09:29:11', '0000-00-00 00:00:00'),
(16, 'Hinduism ', 1, '2024-01-13 04:13:21', '0000-00-00 00:00:00'),
(17, 'Christian ', 0, '2024-01-13 04:14:05', '0000-00-00 00:00:00'),
(19, 'Ramayan', 1, '2024-01-16 16:35:06', '0000-00-00 00:00:00'),
(20, 'Mahabhara', 1, '2024-01-16 16:35:46', '0000-00-00 00:00:00'),
(21, 'Politics', 1, '2024-01-21 14:11:30', '0000-00-00 00:00:00'),
(22, 'Electrical', 1, '2024-01-21 14:29:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `isbnno` varchar(25) DEFAULT NULL,
  `quantity` int(225) NOT NULL,
  `bookprice` decimal(10,2) DEFAULT NULL,
  `issued` int(1) DEFAULT NULL,
  `bookimg` varchar(250) DEFAULT NULL,
  `regdate` timestamp NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `BookName`, `catid`, `author`, `isbnno`, `quantity`, `bookprice`, `issued`, `bookimg`, `regdate`, `updationdate`) VALUES
(1, 'Chemistry Volume-II', 13, 10, 'CH002', 2, 230.00, NULL, 'Chemistry2.jpg', '2024-01-18 10:06:37', '2024-01-21 14:47:27'),
(2, 'Physic part-3', 12, 9, 'PH003', 3, 123.00, NULL, 'physic3.jpg', '2024-01-18 10:07:29', '2024-01-21 04:03:10'),
(3, 'Mathematic', 1, 7, 'MTH004', 3, 280.00, NULL, 'Math1.jpg', '2024-01-18 10:08:46', '2024-01-21 14:46:18'),
(4, 'C++', 1, 1, 'C++0014', 2, 152.00, NULL, 'c++.jpg', '2024-01-19 01:11:59', '2024-01-21 04:02:34'),
(5, 'Computer Architecture', 8, 2, 'COB003', 3, 125.00, NULL, 'architeck.jpg', '2024-01-20 00:55:39', '2024-01-21 04:06:22'),
(6, 'Computer Fundamental', 8, 3, 'CFB210', 5, 260.00, NULL, 'computer_fun1.jpg', '2024-01-21 02:34:01', NULL),
(7, 'Physic part-II', 12, 9, 'PH002', 5, 420.00, NULL, 'physic2.jpg', '2024-01-21 02:36:35', NULL),
(8, 'Cloud storageComputing', 8, 7, 'CC002', 3, 450.00, NULL, 'clouds.jpg', '2024-01-21 04:33:05', '2024-01-21 14:44:27'),
(9, 'cloud computing-II', 8, 7, 'CCB102', 5, 125.00, NULL, 'cloud.jpg', '2024-01-21 04:37:57', NULL),
(10, 'Poor Dad And Rich Dad', 5, 10, 'RDPD789', 7, 230.00, NULL, 'RDPD.jpg', '2024-01-21 14:04:55', NULL),
(11, 'Data Base Management System', 1, 9, 'DBMS456', 7, 365.00, NULL, 'dbms.jpg', '2024-01-21 14:07:47', NULL),
(12, 'MultiMedia Book', 8, 10, 'MM123', 9, 265.00, NULL, 'MM.jpg', '2024-01-21 14:10:15', NULL),
(13, 'The Price of politics ', 21, 14, 'POLI20', 8, 350.00, NULL, 'political.jpg', '2024-01-21 14:12:53', NULL),
(14, 'Soli Ecology', 15, 4, 'SOIL', 10, 200.00, NULL, 'soileco.jpg', '2024-01-21 14:14:20', NULL),
(15, 'The Life of Water ', 7, 3, 'Water', 8, 195.00, NULL, 'water.jpg', '2024-01-21 14:16:31', NULL),
(16, 'PHP And MySqli', 1, 2, 'php0001', 12, 452.00, NULL, 'phpmysqli.jpg', '2024-01-21 14:23:15', NULL),
(17, 'Core Java', 1, 7, 'java', 12, 300.00, NULL, 'java.jpg', '2024-01-21 14:24:08', NULL),
(18, 'Muna Mada', 5, 5, 'Muna100', 8, 125.00, NULL, 'munamadan.jpg', '2024-01-21 14:26:58', NULL),
(19, 'Basic Engineering Electrical Book', 22, 8, 'EEB3003', 9, 300.00, NULL, 'electric.jpg', '2024-01-21 14:33:54', NULL),
(20, 'Business Management', 6, 8, 'BMB159', 18, 235.00, NULL, 'management.jpg', '2024-01-21 14:35:00', NULL),
(21, 'Fundamental Of Computer', 8, 1, 'FOC236', 13, 560.00, NULL, 'computer1.jpg', '2024-01-21 14:52:38', NULL),
(22, 'Human Resource Management', 6, 11, 'HRM789', 12, 285.00, NULL, 'manage.jpg', '2024-01-21 14:54:36', NULL),
(23, 'Fundamental of Programing ', 1, 1, 'FOC159', 5, 456.00, NULL, 'c++.jpg', '2024-01-21 14:55:49', '2024-01-21 15:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `books_with_id`
--

CREATE TABLE `books_with_id` (
  `book` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `is_issued` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(11) NOT NULL,
  `studentcode` varchar(100) NOT NULL,
  `std_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` timestamp NULL DEFAULT current_timestamp(),
  `returndate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `retrunstatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentcode` varchar(100) NOT NULL,
  `std_name` varchar(255) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verification_code` varchar(200) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT 0,
  `regdate` timestamp NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentcode`, `std_name`, `address`, `phone`, `gender`, `photo`, `email`, `password`, `verification_code`, `verified`, `regdate`, `updationdate`) VALUES
(1, 'SID001', 'Raushan shah', 'Sisautiya Sarlahi', '97626980249', 'male', 'utsav.jpg', 'utsavsah75@outlook.com', '12345', '9d3109d5', 0, '2024-01-24 12:33:54', NULL),
(2, 'SID002', 'Utsav Prasad shah', 'Malangwa', '9801219843', 'male', '_MG_3496.jpg', 'utsavsah75@gmail.com', '123', '927e67e0', 0, '2024-01-24 12:37:34', NULL),
(3, 'SID003', 'ranjit sah', 'banepa', '8012345678', 'male', 'ranjit.jpg', 'ranjit@gmail.com', '123', '8629ef77', 0, '2024-01-24 12:39:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `catid` (`catid`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `std_id_2` (`std_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `std_code_fk` (`studentcode`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_code_sdfk` (`studentcode`),
  ADD KEY `studentcode` (`studentcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookauthor`
--
ALTER TABLE `bookauthor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author`) REFERENCES `bookauthor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`catid`) REFERENCES `bookcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD CONSTRAINT `issue_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_book_ibfk_3` FOREIGN KEY (`studentcode`) REFERENCES `students` (`studentcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `std_code_fk3` FOREIGN KEY (`std_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
