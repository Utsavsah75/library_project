-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 06:50 AM
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
(1, 'Utsav Prasad Sah', 'Malangwa', 9801219843, 'male', 'utsavsah75@gmail.com', '123');

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
(1, 'Bjarne Stroustrupm', '2023-12-30 09:31:49', '2024-02-25 20:10:45'),
(2, 'Kapil Babu Dahal', '2023-12-30 09:32:25', NULL),
(3, 'Dr. M.L Sharma', '2023-12-30 09:36:59', NULL),
(4, 'Alex Dhita', '2023-12-30 09:37:19', '2024-01-11 02:42:22'),
(5, 'Laxmi Prasad Devkota.', '2023-12-30 09:37:27', '2024-02-25 20:11:01'),
(6, 'Dr. Dilip Parajuli', '2023-12-30 09:38:08', NULL),
(7, 'HC Vermas', '2023-12-30 09:39:52', '2024-02-24 08:21:42'),
(8, 'Herbert Schildt', '2023-12-30 09:43:39', NULL),
(9, 'Anita Desai', '2023-12-30 09:44:28', NULL),
(10, 'Richard Feynman', '2023-12-30 09:45:41', NULL),
(11, 'Bonnie Garmus', '2023-12-30 09:46:32', NULL),
(20, 'Hemant Jha', '2024-02-25 19:59:33', NULL);

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
(1, 'Programming', 1, '2023-12-30 09:21:46', '2024-02-25 19:56:03'),
(2, 'Health', 1, '2023-12-30 09:22:27', '0000-00-00 00:00:00'),
(3, 'science', 1, '2023-12-30 09:22:39', '2024-02-25 19:21:17'),
(4, 'Hacking', 1, '2023-12-30 09:22:47', '2024-02-23 04:41:09'),
(5, 'Stories Book', 1, '2023-12-30 09:23:13', '0000-00-00 00:00:00'),
(6, 'Management ', 1, '2023-12-30 09:23:48', '2024-02-23 04:41:38'),
(7, 'General', 1, '2023-12-30 09:23:58', '0000-00-00 00:00:00'),
(8, 'Technology ', 1, '2023-12-30 09:24:23', '2024-02-25 19:36:42'),
(12, 'Physiology ', 1, '2023-12-30 09:26:50', '0000-00-00 00:00:00'),
(13, 'chemist', 1, '2023-12-30 09:28:03', '0000-00-00 00:00:00'),
(14, 'Astronomer', 1, '2023-12-30 09:28:25', '0000-00-00 00:00:00'),
(15, 'Other..', 1, '2023-12-30 09:29:11', '0000-00-00 00:00:00'),
(16, 'Hinduism ', 1, '2024-01-13 04:13:21', '2024-02-25 19:34:08'),
(19, 'Ramayan', 1, '2024-01-16 16:35:06', '0000-00-00 00:00:00'),
(20, 'Mahabhara', 1, '2024-01-16 16:35:46', '0000-00-00 00:00:00'),
(21, 'Politics', 1, '2024-01-21 14:11:30', '0000-00-00 00:00:00'),
(22, 'Electrical', 1, '2024-01-21 14:29:47', '0000-00-00 00:00:00'),
(25, 'Marketing', 1, '2024-02-25 17:11:18', '0000-00-00 00:00:00'),
(28, 'hotel', 1, '2024-02-26 05:29:00', '0000-00-00 00:00:00');

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
(1, 'Chemistry Volume-II', 13, 10, 'CH002', 2, 230.00, 0, 'Chemistry2.jpg', '2024-01-17 22:36:37', '2024-02-22 23:38:58'),
(2, 'Physic part-3', 12, 9, 'PH003', 3, 123.00, 0, 'physic3.jpg', '2024-01-17 22:37:29', '2024-02-22 23:52:44'),
(4, 'Cloud storageComputing', 8, 7, 'CC002', 3, 450.00, 0, 'clouds.jpg', '2024-01-20 17:03:05', '2024-02-25 21:12:20'),
(5, 'cloud computing-II', 8, 7, 'CCB102', 5, 125.00, 0, 'cloud.jpg', '2024-01-20 17:07:57', '2024-02-25 21:07:46'),
(6, 'Computer Architecture', 1, 2, 'COB003', 3, 125.00, 0, 'architeck.jpg', '2024-01-19 13:25:39', '2024-02-25 06:02:13'),
(7, 'Computer Fundamental', 8, 3, 'CFB210', 5, 260.00, 0, 'computer_fun1.jpg', '2024-01-20 15:04:01', '2024-02-25 21:34:06'),
(8, 'Physic part-II', 12, 9, 'PH002', 5, 420.00, 0, 'physic2.jpg', '2024-01-20 15:06:35', '2024-02-25 21:13:39'),
(9, 'Poor Dad And Rich Dad', 5, 10, 'RDPD789', 7, 230.00, 0, 'RDPD.jpg', '2024-01-21 02:34:55', '2024-02-25 21:13:48'),
(10, 'Data Base Management System', 1, 9, 'DBMS456', 7, 365.00, 0, 'dbms.jpg', '2024-01-21 02:37:47', '2024-02-25 21:23:01'),
(11, 'Soli Ecology', 15, 4, 'SOIL', 10, 200.00, 0, 'soileco.jpg', '2024-01-21 02:44:20', '2024-02-25 21:29:26'),
(13, 'MultiMedia Book', 8, 10, 'MM123', 9, 265.00, NULL, 'MM.jpg', '2024-01-21 02:40:15', NULL),
(15, 'The Life of Water.', 15, 4, 'Water', 8, 165.00, NULL, 'water.jpg', '2024-01-21 02:46:31', '2024-02-25 06:03:04'),
(16, 'PHP And MySqli', 4, 7, 'php0001', 12, 250.00, NULL, 'e3401f9e0449e8320635afb2d7aeb29b.jpg', '2024-01-21 02:53:15', '2024-02-25 06:09:17'),
(17, 'Core Java', 1, 7, 'java', 12, 300.00, NULL, 'java.jpg', '2024-01-21 02:54:08', NULL),
(18, 'Muna Mada', 5, 5, 'Muna100', 8, 125.00, NULL, 'munamadan.jpg', '2024-01-21 02:56:58', NULL),
(19, 'Basic Engineering Electrical Book', 22, 8, 'EEB3003', 9, 300.00, NULL, 'electric.jpg', '2024-01-21 03:03:54', NULL),
(20, 'Business Management', 6, 8, 'BMB159', 18, 235.00, NULL, 'management.jpg', '2024-01-21 03:05:00', NULL),
(21, 'Fundamental Of Computer', 7, 10, 'FOC236', 13, 560.00, NULL, 'fecac6d16799509dca934938b4930026.jpg', '2024-01-21 03:22:38', '2024-02-25 20:56:18'),
(22, 'Human Resource Management', 6, 11, 'HRM789', 12, 285.00, NULL, 'manage.jpg', '2024-01-21 03:24:36', NULL),
(23, 'Fundamental of Programming ', 1, 1, 'FOC159', 5, 455.00, NULL, 'aab6184a92c169f8fda410c39cac06b1.jpg', '2024-01-21 03:25:49', '2024-02-25 06:09:43'),
(26, 'social', 6, 8, 'sss', 1, 12.00, NULL, 'manage.jpg', '2024-02-01 22:43:22', '2024-02-01 22:44:40'),
(27, 'E-commerce', 25, 20, 'Eomm123', 10, 123.00, NULL, 'architek2.jpg', '2024-02-25 20:03:25', NULL),
(28, 'Computer Repaired And Maintenance ', 8, 7, 'CRM123', 20, 123.00, NULL, 'architeck.jpg', '2024-02-25 20:36:13', NULL),
(29, 'Social stuies', 22, 3, 'SOC123', 22, 123.00, NULL, 'architek2.jpg', '2024-02-25 20:42:59', NULL),
(31, 'Computer Architecture', 1, 9, 'csdf', 2, 340.00, NULL, 'architeck.jpg', '2024-02-25 20:50:02', '2024-02-25 20:58:14'),
(32, 'Utsav sah123', 8, 11, 'fweaff', 34, 4.00, NULL, '_MG_3556.jpg', '2024-02-25 20:51:19', '2024-02-25 20:59:36'),
(33, 'data base', 1, 1, 'data123', 20, 125.00, NULL, 'architek2.jpg', '2024-02-26 05:37:48', NULL);

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
  `book_id` varchar(11) NOT NULL,
  `issue_date` timestamp NULL DEFAULT current_timestamp(),
  `returndate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `retrunstatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `studentcode`, `book_id`, `issue_date`, `returndate`, `retrunstatus`, `fine`) VALUES
(1, 'SID001', 'CH002', '2024-02-26 03:55:42', NULL, NULL, NULL),
(2, 'SID015', 'PH003', '2023-02-24 03:56:11', '2024-02-26 05:32:57', 1, 20),
(3, 'SID008', 'CC002', '2024-02-24 03:56:38', '2024-02-26 05:33:05', 1, 80),
(4, 'SID019', 'CFB210', '2024-02-26 03:56:56', NULL, NULL, NULL),
(5, 'SID010', 'CFB210', '2023-02-28 03:57:22', '2024-02-26 05:32:26', 1, 55),
(6, 'SID034', 'PH002', '2024-02-26 03:57:54', NULL, NULL, NULL),
(7, 'SID014', 'PH003', '2024-02-26 03:58:08', NULL, NULL, NULL),
(8, 'SID019', 'SOIL', '2024-02-26 03:58:30', '2023-02-26 03:59:25', 1, 20);

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
(1, 'SID001', 'Utsav Prasad Sah', 'Malangwa', '9801219843', 'male', 'PPutsav.jpg', 'utsavsah75@gmail.com', '12345', '343cbe1a', 1, '2024-02-22 17:53:12', '2024-02-22 18:17:51'),
(2, 'SID002', 'Bhawana Sharma', 'banepa', '9818987645', 'Female', 'bhawana.jpg', '2bhawana2@gmail.com', 'sharma123', '74a3e414', 1, '2024-02-23 01:23:55', '2024-02-23 01:28:55'),
(3, 'SID003', 'Prabha Tamnag', 'temal', '9853426728', 'Female', 'pravha.jpg', 'prabhalama@gmail.com', 'lama123', 'c8786739', 1, '2024-02-23 01:31:47', '2024-02-26 03:46:58'),
(4, 'SID004', 'Ranjit Kumar Shah', 'banepa', '9854362726', 'male', 'kamalll.jpg', 'ramjit@gmail.com', 'lama123', 'b461d70e', 1, '2024-02-23 07:22:14', '2024-02-23 08:24:35'),
(5, 'SID005', 'Utsav Prasad Sah', 'Malangwa', '9745828431', 'male', '_MG_3496.jpg', 'utsavpdsah75@gmail.com', '123', '6b789a52', 1, '2024-02-25 11:40:45', '2024-02-26 05:22:03'),
(6, 'SID006', 'Kamal Kishor Thakur', 'Siraha', '9811773648', 'male', 'kamalll.jpg', 'kamall@gmail.com', '123', '77e31ac7', 1, '2024-02-25 21:42:57', '2024-02-26 05:22:08'),
(7, 'SID007', 'Abhijeet Prasad sah', 'Malangwa', '9827631585', 'male', 'utsav1.jpg', 'shahraajabhijeet@gmail.com', '123', '09ab4526', 1, '2024-02-25 21:44:23', '2024-02-26 05:22:12'),
(8, 'SID008', 'Sony Khadka', 'panauti', '9808754352', 'Female', '_MG_3556.jpg', 'sony@gmail.com', 'lama123', 'ec60f2be', 1, '2024-02-23 01:33:20', '2024-02-23 02:37:05'),
(9, 'SID009', 'Raushan shah', 'Sisautiya Sarlahi', '97626980249', 'male', 'utsav.jpg', 'utsavsah75@outlook.com', '12345', '9d3109d5', 1, '2024-01-24 06:48:54', '2024-01-27 09:36:14'),
(10, 'SID010', 'Bhabish Sharma', 'rukum', '9876354210', 'male', 'architek2.jpg', 'bhabish2@gmail.com', 'lama123', 'fb202e50', 1, '2024-02-23 07:20:27', '2024-02-23 08:24:32'),
(11, 'SID011', 'Bishwajeet Prasad sah', 'Malangwa', '9827631589', 'male', 'DSCB_0386 .JPG', 'bishwajeetprasadsah@gmail.com', '123', '316de129', 0, '2024-02-25 10:25:44', NULL),
(12, 'SID012', 'Moon Tamang', 'kavre', '9834526276', 'Female', 'architeck.jpg', 'moon@gmail.com', 'lama12345', '73bd6248', 0, '2024-02-23 01:38:26', '2024-02-25 17:46:48'),
(13, 'SID013', 'Kiran Oli', 'ktm', '9834252676', 'male', 'architek2.jpg', 'kiran@gmail.com', 'lama123', '458ff780', 1, '2024-02-23 01:39:42', '2024-02-23 02:39:45'),
(14, 'SID014', 'Sarita Tamang', 'kavre', '9807654345', 'Female', 'bbbkk.jpg', 'sarita@gmail.com', 'lama123', '1a1aba6a', 1, '2024-02-23 01:40:46', '2024-02-23 02:39:52'),
(15, 'SID015', 'Manisha Pandey', 'rukum', '9824356476', 'Female', 'bbbkk.jpg', 'manisha@gmail.com', 'lama123', '8c777faa', 1, '2024-02-23 01:42:06', '2024-02-23 02:39:58'),
(16, 'SID016', 'Rekha Thapa', 'pokhara', '9825364786', 'Female', 'architeck.jpg', 'rekha@gmail.com', 'lama123', 'c21901f2', 1, '2024-02-23 01:43:26', '2024-02-23 02:40:06'),
(17, 'SID017', 'Rajesh Hamal ', 'Jajarkot', '9874235815', 'male', 'chemistry3.jpg', 'rajesh@gmail.com', 'rajesh2', '2e79e1de', 1, '2024-02-23 01:45:04', '2024-02-23 02:40:13'),
(18, 'SID018', 'Krishna Basnet', 'pokhara', '9875342539', 'Female', 'chemistry1.jpg', 'krishna@gmail.com', 'lama123', 'b9699dbe', 1, '2024-02-23 02:08:56', '2024-02-23 02:40:21'),
(19, 'SID019', 'Karishma Oli', 'Salyan', '9768234561', 'Female', 'architeck.jpg', 'karina@gmail.com', 'karina2', 'ffe127eb', 1, '2024-02-23 02:10:54', '2024-02-23 02:40:30'),
(20, 'SID020', 'Sandeep Giri', 'Rolpa', '9825367128', 'male', 'c++.jpg', 'sandeep@gmail.com', 'sandeep', 'ebb5b1d2', 1, '2024-02-23 02:12:28', '2024-02-23 02:40:37'),
(21, 'SID021', 'Sandesh Pun ', 'Baglung', '9785123467', 'male', 'clouds.jpg', 'sandesh@gmail.com', 'sandesh2', 'ee77f915', 1, '2024-02-23 02:14:53', '2024-02-23 02:40:45'),
(22, 'SID022', 'Prem Prakash', 'Mustang', '9756123497', 'male', 'cloud.jpg', 'prem@gmail.com', 'prem2', '3db40330', 1, '2024-02-23 02:16:18', '2024-02-23 02:40:54'),
(23, 'SID023', 'Kabita Tamang', 'Jhapa', '9758132458', 'male', 'c++.jpg', 'kabita@gmail.com', 'kabita2', '60246b1a', 1, '2024-02-23 02:17:17', '2024-02-23 02:41:02'),
(24, 'SID024', 'Nabina Shahi', 'Surkhet', '9876543212', 'Female', 'bbbkk.jpg', 'nabina@gmail.com', 'nabina3', '78ce334f', 1, '2024-02-23 02:18:44', '2024-02-23 02:41:09'),
(25, 'SID025', 'Pooja Sharma', 'Morang', '9875461234', 'Female', 'dbms.jpg', 'pooja@gmail.com', 'pooja2', '2a270527', 1, '2024-02-23 02:19:50', '2024-02-23 02:41:19'),
(26, 'SID026', 'Paul Shah', 'Dang', '9768541231', 'male', 'computer3.jpg', 'paul@gmail.com', 'pooja2', '1289cfa2', 1, '2024-02-23 02:21:19', '2024-02-23 02:41:29'),
(27, 'SID027', 'Samiksya Adhikari', 'Ghorahi', '9876542317', 'Female', 'computer3.jpg', 'samiksya@gmail.com', 'samir32', '961b9598', 1, '2024-02-23 02:23:41', '2024-02-23 02:41:37'),
(28, 'SID028', 'Rakesh Nath', 'Rolpa', '9865432617', 'male', 'Chemistry2.jpg', 'Rakesh@gmail.com', 'rakesh', '7335e45a', 1, '2024-02-23 02:26:10', '2024-02-23 02:41:43'),
(29, 'SID029', 'Kopila Tamang', 'Jumla ', '9734251672', 'Female', 'java1.jpg', 'kopila@gmail.com', 'kopila', '20312e44', 1, '2024-02-23 02:28:23', '2024-02-23 02:41:51'),
(30, 'SID030', 'Sujan Khadka', 'dhulikhel', '9863542536', 'male', '_MG_3556.jpg', 'sujan@gmail.com', 'lama123', 'a2ecf0f9', 1, '2024-02-23 02:30:20', '2024-02-23 02:42:00'),
(31, 'SID031', 'Dhiraj Mainali', 'ktm', '9876435265', 'male', 'architeck.jpg', 'dhiraj@gmail.com', 'lama123', '86e776b1', 1, '2024-02-23 02:31:27', '2024-02-23 02:42:08'),
(32, 'SID032', 'Suman Tamang', 'banepa', '9853647658', 'male', '_MG_3496.jpg', 'suman@gmail.com', 'lama123', '944983b4', 1, '2024-02-23 02:32:25', '2024-02-23 02:42:17'),
(33, 'SID033', 'Prinsa Tharu', 'banepa', '9856435243', 'Female', '_MG_3556.jpg', 'prinsa@gmail.com', 'lama123', '6147823f', 1, '2024-02-23 02:33:37', '2024-02-23 02:42:26'),
(34, 'SID034', 'Prerana Gautam', 'Dhading', '9876523413', 'Female', 'IMG_20220216_150506_994.jpg', 'prerana@gmail.com', 'prema', '273ff743', 1, '2024-02-23 02:35:04', '2024-02-23 02:42:34'),
(35, 'SID035', 'Sunita Bhattrai', 'Salyan', '9765342814', 'Female', 'IMG_20231022_141054_308.jpg', 'sunita@gmail.com', 'sunita2', 'd38910d8', 1, '2024-02-23 02:36:32', '2024-02-23 02:39:28');

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
  ADD KEY `catid` (`catid`),
  ADD KEY `isbnno` (`isbnno`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `issue_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`isbnno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_book_ibfk_3` FOREIGN KEY (`studentcode`) REFERENCES `students` (`studentcode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
