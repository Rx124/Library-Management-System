-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 08:54 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ISBN` char(14) NOT NULL,
  `Author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ISBN`, `Author`) VALUES
('0123704901', 'David A. Patterson'),
('0123704901', 'John L. Hennessy'),
('0123944244', 'David Harris'),
('0123944244', 'Sarah Harris'),
('0124077269', 'David A. Patterson'),
('0124077269', 'John L. Hennessy'),
('0205973361', 'J. Noland White'),
('0205973361', 'Saundra K. Ciccarelli'),
('0321696867', 'Hugh D. Young'),
('0321696867', 'Roger A. Freedman'),
('0321740904', 'Randall D. Knight'),
('0321884078', 'George B. Thomas Jr'),
('0321884078', 'Joel R. Hass'),
('0321884078', 'Maurice D. Weir'),
('0470879521', 'John D. Cutnell'),
('0470879521', 'Kenneth W. Johnson'),
('0596802358', 'Philipp K. Janert'),
('099040207X', 'Mr. Martin Holzke'),
('099040207X', 'Mr. Tom Stachowitz'),
('1285057090', 'Bruce H. Edwards'),
('1285057090', 'Ron Larson'),
('1429237198', 'Daniel L. Schacter'),
('1429237198', 'Daniel T. Gilbert'),
('1429261781', 'David G. Myers'),
('1449600069', 'Julia Lobur'),
('1449600069', 'Linda Null'),
('1452257876', 'A. Michael Huberman'),
('1452257876', 'Matthew B. Miles'),
('1590597699', 'Clare Churcher');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` char(14) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Cost` decimal(5,2) NOT NULL,
  `IsReserved` tinyint(1) NOT NULL,
  `Edition` int(11) NOT NULL,
  `PubliPlace` varchar(30) DEFAULT NULL,
  `Publisher` varchar(30) NOT NULL,
  `CopyYr` decimal(4,0) NOT NULL,
  `ShelfID` int(11) DEFAULT NULL,
  `SubName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `Cost`, `IsReserved`, `Edition`, `PubliPlace`, `Publisher`, `CopyYr`, `ShelfID`, `SubName`) VALUES
('0123704901', 'Computer Architecture: A Quantitative Approach', '24.95', 0, 4, 'US', 'Morgan Kaufmann', '2006', 321, 'Computer Architecture'),
('0123944244', 'Digital Design and Computer Architecture', '52.57', 0, 2, 'US', 'Morgan Kaufmann', '2012', 311, 'Computer Architecture'),
('0124077269', 'Computer Organization and Design', '75.74', 0, 5, 'US', 'Morgan Kaufmann', '2013', 312, 'Computer Architecture'),
('0205973361', 'Psychology', '158.53', 0, 4, '', 'Pearson', '2014', 232, 'Psychology'),
('0321696867', 'University Physics with Modern Physics', '225.76', 0, 13, 'UK', 'Addison-Wesley', '2011', 211, 'Physics'),
('0321740904', 'Physics for Scientists and Engineers: A Strategic Approach with Modern Physics', '228.16', 1, 3, 'US', 'Addison-Wesley', '2012', 212, 'Physics'),
('0321884078', 'Thomas\' Calculus: Early Transcendentals', '198.89', 0, 13, '', 'Pearson', '2013', 111, 'Calculus'),
('0470879521', 'Physics', '209.38', 0, 9, '', 'John Wiley and Sons', '2012', 212, 'Physics'),
('0596802358', 'Data Analysis with Open Source Tools', '26.69', 0, 1, 'US', 'O\'Reilly Media', '2010', 131, 'Data Science'),
('099040207X', 'SQL Database for Beginners', '22.49', 0, 1, '', 'LearnToProgram, Incorporated ', '2014', 121, 'Data Science'),
('1285057090', 'Calculus', '245.84', 1, 10, 'US', 'Cengage Learning', '2013', 112, 'Calculus'),
('1429237198', 'Psychology ', '159.48', 1, 2, '', 'Worth Publishers', '2010', 231, 'Psychology'),
('1429261781', 'Psychology', '152.54', 0, 10, '', 'Worth Publishers', '2011', 222, 'Psychology'),
('1449600069', 'The Essentials of Computer Organization and Architecture', '215.95', 0, 3, '', 'Jones & Bartlett Learning', '2010', 322, 'Computer Architecture'),
('1452257876', 'Qualitative Data Analysis: A Methods Sourcebook', '72.42', 0, 3, 'US', 'SAGE Publications, Inc', '2013', 132, 'Data Science'),
('1590597699', 'Beginning Database Design: From Novice to Professional ', '25.82', 0, 1, 'US', 'Apress', '2007', 122, 'Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `bookcopy`
--

CREATE TABLE `bookcopy` (
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IsChecked` tinyint(1) NOT NULL DEFAULT 0,
  `IsHold` tinyint(1) NOT NULL DEFAULT 0,
  `IsDamaged` tinyint(1) NOT NULL DEFAULT 0,
  `FuRequester` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcopy`
--

INSERT INTO `bookcopy` (`ISBN`, `CopyID`, `IsChecked`, `IsHold`, `IsDamaged`, `FuRequester`) VALUES
('0123704901', 1, 0, 0, 0, NULL),
('0123704901', 2, 1, 0, 0, NULL),
('0123704901', 3, 0, 0, 0, NULL),
('0123944244', 1, 0, 0, 0, NULL),
('0123944244', 2, 0, 0, 0, NULL),
('0124077269', 1, 0, 0, 0, NULL),
('0124077269', 2, 0, 0, 0, NULL),
('0124077269', 3, 0, 0, 0, NULL),
('0124077269', 4, 0, 0, 0, NULL),
('0124077269', 5, 0, 0, 0, NULL),
('0124077269', 6, 0, 0, 0, NULL),
('0124077269', 7, 0, 0, 0, NULL),
('0205973361', 1, 0, 0, 0, NULL),
('0205973361', 2, 0, 0, 0, NULL),
('0205973361', 3, 0, 0, 0, NULL),
('0321696867', 1, 0, 0, 0, NULL),
('0321696867', 2, 0, 0, 0, NULL),
('0321696867', 3, 0, 0, 0, NULL),
('0321696867', 4, 0, 0, 0, NULL),
('0321740904', 1, 0, 0, 0, NULL),
('0321740904', 2, 0, 0, 0, NULL),
('0321740904', 3, 0, 0, 0, NULL),
('0321740904', 4, 0, 0, 0, NULL),
('0321740904', 5, 0, 0, 0, NULL),
('0321740904', 6, 0, 0, 0, NULL),
('0321740904', 7, 0, 0, 0, NULL),
('0321884078', 1, 0, 0, 0, NULL),
('0470879521', 1, 0, 0, 0, NULL),
('0470879521', 2, 0, 0, 0, NULL),
('0470879521', 3, 0, 0, 0, NULL),
('0470879521', 4, 0, 0, 0, NULL),
('0470879521', 5, 0, 0, 0, NULL),
('0470879521', 6, 0, 0, 0, NULL),
('0470879521', 7, 0, 0, 0, NULL),
('0596802358', 1, 0, 0, 0, NULL),
('0596802358', 2, 0, 0, 0, NULL),
('099040207X', 1, 0, 0, 0, NULL),
('099040207X', 2, 0, 0, 0, NULL),
('099040207X', 3, 0, 0, 0, NULL),
('1285057090', 1, 0, 0, 0, NULL),
('1429237198', 1, 0, 0, 0, NULL),
('1429237198', 2, 0, 0, 0, NULL),
('1429237198', 3, 0, 0, 0, NULL),
('1429261781', 1, 0, 0, 0, NULL),
('1429261781', 2, 0, 0, 0, NULL),
('1449600069', 1, 0, 0, 0, NULL),
('1449600069', 2, 0, 0, 0, NULL),
('1449600069', 3, 0, 0, 0, NULL),
('1452257876', 1, 0, 0, 0, NULL),
('1452257876', 2, 0, 0, 0, NULL),
('1452257876', 3, 0, 0, 0, NULL),
('1452257876', 4, 0, 0, 0, NULL),
('1590597699', 1, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `FloorID` int(11) NOT NULL,
  `NumAssistant` int(11) NOT NULL,
  `NumCopier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`FloorID`, `NumAssistant`, `NumCopier`) VALUES
(1, 2, 2),
(2, 3, 3),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `Username` varchar(15) NOT NULL,
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IssueID` int(4) NOT NULL,
  `ExtenDate` date DEFAULT NULL,
  `IssueDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `NumExten` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`Username`, `ISBN`, `CopyID`, `IssueID`, `ExtenDate`, `IssueDate`, `ReturnDate`, `NumExten`) VALUES
('akshat', '0123704901', 2, 200, '2020-10-02', '2020-10-02', '2020-10-16', 1),
('akshat', '0123704901', 3, 193, '2020-10-02', '2020-10-02', '2020-10-16', 0),
('akshat', '0124077269', 4, 197, '2020-09-27', '2020-09-13', '2020-09-27', 0),
('akshat', '0124077269', 5, 196, '2020-09-17', '2020-09-03', '2020-09-17', 0),
('akshat', '0124077269', 7, 194, '2020-10-16', '2020-10-02', '2020-10-16', 0),
('akshat', '0470879521', 2, 201, '2020-07-24', '2020-07-10', '2020-07-24', 0),
('jayakumar', '0123704901', 2, 211, '2020-02-21', '2020-02-07', '2020-02-21', 0),
('jayakumar', '0321740904', 3, 202, '2020-02-25', '2020-02-11', '2020-02-25', 0),
('saksham', '0123704901', 1, 210, '2020-02-21', '2020-02-07', '2020-02-21', 0),
('saksham', '0124077269', 6, 195, '2020-10-26', '2020-10-12', '2020-10-26', 0),
('saksham', '0470879521', 7, 198, '2020-01-16', '2020-01-02', '2020-01-16', 0),
('swetank', '0123944244', 1, 199, '2020-08-20', '2020-08-06', '2020-08-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `SName` varchar(30) NOT NULL,
  `Keyword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`SName`, `Keyword`) VALUES
('Calculus', 'Convergent'),
('Calculus', 'Derivative'),
('Calculus', 'Differential Equation'),
('Calculus', 'Integral'),
('Computer Architecture', 'Assembly'),
('Computer Architecture', 'Cache'),
('Computer Architecture', 'Instruction Set'),
('Computer Architecture', 'Memory'),
('Data Science', 'Cloud Computing'),
('Data Science', 'Computer Vision'),
('Data Science', 'Database'),
('Data Science', 'Statistics'),
('Physics', 'Electron'),
('Physics', 'Photoelectric Effect'),
('Physics', 'Quantum Physics'),
('Physics', 'Relativity'),
('Psychology', 'Cognitive'),
('Psychology', 'Neuropsychology');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `ShelfID` int(11) NOT NULL,
  `FloorID` int(11) NOT NULL,
  `AisleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`ShelfID`, `FloorID`, `AisleID`) VALUES
(111, 1, 11),
(112, 1, 11),
(121, 1, 12),
(122, 1, 12),
(131, 1, 13),
(132, 1, 13),
(211, 2, 21),
(212, 2, 21),
(221, 2, 22),
(222, 2, 22),
(231, 2, 23),
(232, 2, 23),
(311, 3, 31),
(312, 3, 31),
(321, 3, 32),
(322, 3, 32),
(331, 3, 33),
(332, 3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Username`) VALUES
('jayakumar');

-- --------------------------------------------------------

--
-- Table structure for table `student_faculty`
--

CREATE TABLE `student_faculty` (
  `Username` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `IsDebarred` tinyint(1) NOT NULL DEFAULT 0,
  `Gender` char(1) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `IsFaculty` tinyint(1) NOT NULL,
  `Penalty` decimal(5,2) NOT NULL DEFAULT 0.00,
  `Dept` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_faculty`
--

INSERT INTO `student_faculty` (`Username`, `Name`, `DOB`, `Email`, `IsDebarred`, `Gender`, `Address`, `IsFaculty`, `Penalty`, `Dept`) VALUES
('akshat', 'Akshat Mishra', '2001-11-28', 'akshat@email.com', 0, 'M', 'VIT', 0, '9.00', NULL),
('jayakumar', 'Jayakumar Sadhasivam', NULL, 'jayakumar@email.com', 0, 'M', 'VIT', 0, '0.00', NULL),
('saksham', 'Saksham Arora', '2001-09-05', 'saksham@email.com', 0, 'M', 'VIT', 0, '0.00', NULL),
('swetank', 'Swetank Kaushik', '2001-07-11', 'swetank@email.com', 0, 'M', 'VIT', 0, '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubName` varchar(30) NOT NULL,
  `FloorID` int(11) NOT NULL,
  `NumJournal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubName`, `FloorID`, `NumJournal`) VALUES
('Calculus', 1, 23),
('Computer Architecture', 3, 20),
('Data Science', 1, 32),
('Physics', 2, 14),
('Psychology', 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`) VALUES
('akshat', 'akshat123'),
('jayakumar', 'jayakumar123'),
('saksham', 'saksham123'),
('swetank', 'swetank123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ISBN`,`Author`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `ShelfID` (`ShelfID`),
  ADD KEY `SubName` (`SubName`);

--
-- Indexes for table `bookcopy`
--
ALTER TABLE `bookcopy`
  ADD PRIMARY KEY (`ISBN`,`CopyID`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`FloorID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`Username`,`ISBN`,`CopyID`),
  ADD UNIQUE KEY `IssueID` (`IssueID`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `issue_ibfk_2` (`ISBN`,`CopyID`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`SName`,`Keyword`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`ShelfID`),
  ADD KEY `FloorID` (`FloorID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `student_faculty`
--
ALTER TABLE `student_faculty`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubName`),
  ADD KEY `FloorID` (`FloorID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`ShelfID`) REFERENCES `shelf` (`ShelfID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`SubName`) REFERENCES `subject` (`SubName`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `bookcopy`
--
ALTER TABLE `bookcopy`
  ADD CONSTRAINT `bookcopy_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `student_faculty` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`ISBN`,`CopyID`) REFERENCES `bookcopy` (`ISBN`, `CopyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`SName`) REFERENCES `subject` (`SubName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`FloorID`) REFERENCES `floor` (`FloorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_faculty`
--
ALTER TABLE `student_faculty`
  ADD CONSTRAINT `student_faculty_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`FloorID`) REFERENCES `floor` (`FloorID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
