-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 05:17 AM
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
(1, 'Utsav Prasad Sah', 'Malangwa', 9801219695, 'male', 'utsavsah80@gmail.com', '1');

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
(20, 'Mahabhara', 1, '2024-01-16 16:35:46', '0000-00-00 00:00:00');

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
(1, 'Chemistry Volume-II', 13, 10, 'CH002', 2, 230.00, NULL, 'Management1.jpg', '2024-01-18 10:06:37', NULL),
(2, 'Physic part-3', 12, 9, 'PH003', 3, 123.00, NULL, 'pric of physice.jpg', '2024-01-18 10:07:29', NULL),
(3, 'Mathematic', 1, 7, 'PH004', 3, 280.00, NULL, 'Management1.jpg', '2024-01-18 10:08:46', '2024-01-18 10:09:02'),
(4, 'C++', 1, 1, 'C++0014', 2, 152.00, NULL, 'WhatsApp Image 2023-06-17 at 6.27.41 PM.jpeg', '2024-01-19 01:11:59', NULL),
(5, 'Computer Architecture', 8, 2, 'COB003', 3, 125.00, NULL, 'utsav.jpg', '2024-01-20 00:55:39', NULL);

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

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `studentcode`, `std_id`, `book_id`, `issue_date`, `returndate`, `retrunstatus`, `fine`) VALUES
(1, 'SID003', 1, 2, '2024-01-18 10:12:52', NULL, NULL, NULL);

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
  `verified` int(1) NOT NULL DEFAULT 0,
  `regdate` timestamp NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentcode`, `std_name`, `address`, `phone`, `gender`, `photo`, `email`, `password`, `verified`, `regdate`, `updationdate`) VALUES
(1, 'SID003', 'utsav', 'Malangwa', '9801219843', 'male', 'IMG_20220216_150506_994.jpg', 'utsav@gmail.com', '123', 1, '2024-01-18 10:10:25', '2024-01-19 02:20:12'),
(2, 'SID004', 'ranjit', 'banepa', '8012345678', 'male', 'ranjit.jpg', 'ranjit@gmail.com', '$2y$10$LWapzybiQVNMyRMaEq9Kx.NpafgAzbOZ3bAsTSm8DrejnsYfcNKbC', 1, '2024-01-18 10:10:48', NULL),
(3, 'SID005', 'Kamal Kishor Thakur', 'Siraha', '9811773648', 'male', 'kamalll.jpg', 'kamal@gmail.com', '$2y$10$Wl72hXtshB8aUgohuCt3Luq/aQyaXZXoXqfllgds7khLu61mvCLTy', 0, '2024-01-18 10:11:11', '2024-01-19 15:39:04'),
(4, 'SID007', 'bhawana', 'Dhulikhel', '8765234567', 'Female', 'bhawana.jpg', 'bhawana@gmail.com', '123', 1, '2024-01-19 02:17:38', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookauthor`
--
ALTER TABLE `bookauthor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
