-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 20, 2020 at 10:12 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'admin1', 'admin1', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

DROP TABLE IF EXISTS `tbldepartment`;
CREATE TABLE IF NOT EXISTS `tbldepartment` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `facultyId` varchar(10) NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`Id`, `facultyId`, `departmentName`) VALUES
(1, '1', 'Computer Science'),
(2, '1', 'Science and Laboratory Technology'),
(3, '2', 'Public Administration'),
(7, '2', 'Business Administration'),
(6, '1', 'Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocuments`
--

DROP TABLE IF EXISTS `tbldocuments`;
CREATE TABLE IF NOT EXISTS `tbldocuments` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `originCert` varchar(255) NOT NULL,
  `birthCert` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldocuments`
--

INSERT INTO `tbldocuments` (`Id`, `regNo`, `originCert`, `birthCert`) VALUES
(5, 'LNDPOLY/2019/2020/000001', '29ea77d2009a5d54a0fff47a6d996507.jpg', '2aa8f5a08b848564bd37551dbcaeecc8.jpg'),
(6, 'LNDPOLY/2019/2020/000002', 'a8887cbcfb0ee78d8351afcaaf31dcd3.jpg', '2f5c92fc67f6ab05b0fb8f8a6e2d581f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbleducation`
--

DROP TABLE IF EXISTS `tbleducation`;
CREATE TABLE IF NOT EXISTS `tbleducation` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `instituteName` varchar(255) NOT NULL,
  `fromDate` varchar(255) NOT NULL,
  `toDate` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbleducation`
--

INSERT INTO `tbleducation` (`Id`, `regNo`, `instituteName`, `fromDate`, `toDate`, `qualification`) VALUES
(7, 'LNDPOLY/2019/2020/000001', 'snfnskf', 'njksnfkjs', 'jsnfkjs', 'nnnvnn'),
(6, 'LNDPOLY/2019/2020/000001', 'uwuiouro', 'jdfkn', 'nkjnskn', 'jknfjkn'),
(5, 'LNDPOLY/2019/2020/000001', 'tahajd', 'kjdhfajd', 'ljlsldk', 'mklms;f'),
(8, 'LNDPOLY/2019/2020/000001', 'uiwowowowoppppp', 'jjrj', 'jsj', 'jhjhgkkg'),
(9, 'LNDPOLY/2019/2020/000002', 'Ajib-George Nur/Pry School', '1999', '2007', 'JSSCE'),
(10, 'LNDPOLY/2019/2020/000002', 'S-Triumph International School', '2008', '2014', 'WASSCE'),
(11, 'LNDPOLY/2019/2020/000002', 'Ogun State Institute of Technology', '2015', '2017', 'National Diploma'),
(12, 'LNDPOLY/2019/2020/000002', 'Ogun State Institute of Technology', '2018', '2020', 'Higher National Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

DROP TABLE IF EXISTS `tblfaculty`;
CREATE TABLE IF NOT EXISTS `tblfaculty` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `facultyName` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`Id`, `facultyName`) VALUES
(1, 'Pure and Applied Science'),
(2, 'Business and Management Studies'),
(4, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `tblguardian`
--

DROP TABLE IF EXISTS `tblguardian`;
CREATE TABLE IF NOT EXISTS `tblguardian` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `guardianName` varchar(255) NOT NULL,
  `guardianAddress` varchar(255) NOT NULL,
  `guardianPhoneNo` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguardian`
--

INSERT INTO `tblguardian` (`Id`, `regNo`, `guardianName`, `guardianAddress`, `guardianPhoneNo`) VALUES
(1, 'LNDPOLY/2019/2020/000001', 'Sadiq', 'Address', '090890009'),
(2, 'LNDPOLY/2019/2020/000002', 'Adeyemo', 'Adeyemo Street', '09087765544');

-- --------------------------------------------------------

--
-- Table structure for table `tblinitialreg`
--

DROP TABLE IF EXISTS `tblinitialreg`;
CREATE TABLE IF NOT EXISTS `tblinitialreg` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNo` varchar(50) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `isRegComplete` varchar(5) NOT NULL,
  `dateCreated` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinitialreg`
--

INSERT INTO `tblinitialreg` (`Id`, `firstName`, `lastName`, `otherName`, `sex`, `emailAddress`, `phoneNo`, `regNo`, `isRegComplete`, `dateCreated`) VALUES
(3, 'Sodiq', 'Ahmed', 'Olanrewaju', 'Male', 'Ahmedsodiq7@gmail.com', '07065903222', 'LNDPOLY/2019/2020/000001', '1', '2020-10-25'),
(5, 'Samuel', 'Adeyemi', 'Ola', 'Male', 'Ahmedsodiq7@gmail.com', '09089898877', 'LNDPOLY/2019/2020/000002', '1', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblnextofkin`
--

DROP TABLE IF EXISTS `tblnextofkin`;
CREATE TABLE IF NOT EXISTS `tblnextofkin` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `nextofkinName` varchar(255) NOT NULL,
  `nextofkinAddress` varchar(255) NOT NULL,
  `nextofkinPhoneNo` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnextofkin`
--

INSERT INTO `tblnextofkin` (`Id`, `regNo`, `nextofkinName`, `nextofkinAddress`, `nextofkinPhoneNo`) VALUES
(1, 'LNDPOLY/2019/2020/000001', 'Ahmad', 'Banana Island', '0999000888'),
(2, 'LNDPOLY/2019/2020/000002', 'Bamidele Adeyemi', 'Adeyemo Street', '090877788833');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

DROP TABLE IF EXISTS `tblpayments`;
CREATE TABLE IF NOT EXISTS `tblpayments` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `transactionId` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `dateCreated` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`Id`, `regNo`, `transactionId`, `amount`, `dateCreated`) VALUES
(1, 'LNDPOLY/2019/2020/000001', 'T197522404079738', '15000', '2020-10-27'),
(7, 'LNDPOLY/2019/2020/000002', 'T403297824656617', '25000', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblpersonaldata`
--

DROP TABLE IF EXISTS `tblpersonaldata`;
CREATE TABLE IF NOT EXISTS `tblpersonaldata` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `surName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `dateCreated` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpersonaldata`
--

INSERT INTO `tblpersonaldata` (`Id`, `regNo`, `surName`, `firstName`, `middleName`, `sex`, `phoneNo`, `dob`, `address`, `nationality`, `state`, `lga`, `dateCreated`) VALUES
(2, 'LNDPOLY/2019/2020/000001', 'Ahmed', 'Sodiq', 'Olanrewaju', 'Male', '07065903222', '2020-10-08', 'MyAddress', 'Nigerian', 'Abuja', 'Mushin', '2020-10-25'),
(3, 'LNDPOLY/2019/2020/000002', 'Adeyemi', 'Samuel', 'Ola', 'Male', '09089898877', '15/01/1997', '4, Agunlejika street, cele bustop surulere lagos state', 'Nigerian', 'Ogun', 'Ifo LGA', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogramme`
--

DROP TABLE IF EXISTS `tblprogramme`;
CREATE TABLE IF NOT EXISTS `tblprogramme` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `programmeTypeId` varchar(10) NOT NULL,
  `programmeModeId` varchar(10) NOT NULL,
  `facultyId` varchar(10) NOT NULL,
  `departmentId` varchar(10) NOT NULL,
  `sessionId` varchar(10) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `dateCreated` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogramme`
--

INSERT INTO `tblprogramme` (`Id`, `regNo`, `programmeTypeId`, `programmeModeId`, `facultyId`, `departmentId`, `sessionId`, `passport`, `dateCreated`) VALUES
(8, 'LNDPOLY/2019/2020/000001', '2', '2', '2', '7', '1', '9fffca456ab68c999d228add9fd9094c.jpg', '2020-10-25'),
(9, 'LNDPOLY/2019/2020/000002', '2', '1', '2', '3', '1', '1f5c01e0cb39bd7c5598c3b29bcdec5c.jpg', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogrammefees`
--

DROP TABLE IF EXISTS `tblprogrammefees`;
CREATE TABLE IF NOT EXISTS `tblprogrammefees` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `programmeTypeId` varchar(255) NOT NULL,
  `programmeModeId` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogrammefees`
--

INSERT INTO `tblprogrammefees` (`Id`, `programmeTypeId`, `programmeModeId`, `amount`) VALUES
(1, '2', '2', '15000'),
(2, '2', '1', '25000'),
(3, '1', '2', '16000'),
(5, '1', '1', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogrammemode`
--

DROP TABLE IF EXISTS `tblprogrammemode`;
CREATE TABLE IF NOT EXISTS `tblprogrammemode` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `modeName` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogrammemode`
--

INSERT INTO `tblprogrammemode` (`Id`, `modeName`) VALUES
(1, 'Full-Time'),
(2, 'Part-Time');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogrammetype`
--

DROP TABLE IF EXISTS `tblprogrammetype`;
CREATE TABLE IF NOT EXISTS `tblprogrammetype` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogrammetype`
--

INSERT INTO `tblprogrammetype` (`Id`, `typeName`) VALUES
(1, 'National Diploma'),
(2, 'Higher National Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

DROP TABLE IF EXISTS `tblresult`;
CREATE TABLE IF NOT EXISTS `tblresult` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `candidateExamName` varchar(255) NOT NULL,
  `examNo` varchar(255) NOT NULL,
  `examDate` varchar(50) NOT NULL,
  `examType` varchar(255) NOT NULL,
  `sitting` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`Id`, `regNo`, `candidateExamName`, `examNo`, `examDate`, `examType`, `sitting`) VALUES
(3, 'LNDPOLY/2019/2020/000001', 'Ahmed Sodiq', 'ADHABDK0901', '10-11-2012', 'WAEC', 'First'),
(4, 'LNDPOLY/2019/2020/000001', 'Ahmed Sodiq', 'GFDH9930NNF', '10-21-2012', 'NECO', 'Second'),
(5, 'LNDPOLY/2019/2020/000002', 'Samuel Adeyemi', 'ASHJLL90D99', '10-11-2012', 'WAEC', 'First'),
(6, 'LNDPOLY/2019/2020/000002', 'Adeyemi Samuel', 'GFDH9930NNF', '10-21-2012', 'GCE', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblresultdetails`
--

DROP TABLE IF EXISTS `tblresultdetails`;
CREATE TABLE IF NOT EXISTS `tblresultdetails` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `sitting` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresultdetails`
--

INSERT INTO `tblresultdetails` (`Id`, `regNo`, `subject`, `grade`, `sitting`) VALUES
(29, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'B2', 'Second'),
(27, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'C5', 'First'),
(28, 'LNDPOLY/2019/2020/000001', 'Mathematics', 'A1', 'Second'),
(26, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'B3', 'First'),
(24, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'B2', 'First'),
(25, 'LNDPOLY/2019/2020/000001', 'Biology', 'C5', 'First'),
(23, 'LNDPOLY/2019/2020/000001', 'Government', 'B3', 'First'),
(22, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'F9', 'First'),
(21, 'LNDPOLY/2019/2020/000001', 'Physics', 'C4', 'First'),
(19, 'LNDPOLY/2019/2020/000001', 'Mathematics', 'A1', 'First'),
(20, 'LNDPOLY/2019/2020/000001', 'English', 'B2', 'First'),
(30, 'LNDPOLY/2019/2020/000001', 'Biology', 'C4', 'Second'),
(31, 'LNDPOLY/2019/2020/000001', 'English', 'B2', 'Second'),
(32, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'B3', 'Second'),
(33, 'LNDPOLY/2019/2020/000001', 'Physics', 'B3', 'Second'),
(34, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'C4', 'Second'),
(35, 'LNDPOLY/2019/2020/000001', 'Government', 'B2', 'Second'),
(36, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'C6', 'Second'),
(37, 'LNDPOLY/2019/2020/000002', 'Mathematics', 'B2', 'First'),
(38, 'LNDPOLY/2019/2020/000002', 'English', 'C5', 'First'),
(39, 'LNDPOLY/2019/2020/000002', 'Chemistry', 'C4', 'First'),
(40, 'LNDPOLY/2019/2020/000002', 'Physics', 'C4', 'First'),
(41, 'LNDPOLY/2019/2020/000002', 'Government', 'B3', 'First'),
(42, 'LNDPOLY/2019/2020/000002', 'Home Economics', 'C5', 'First'),
(43, 'LNDPOLY/2019/2020/000002', 'Biology', 'B2', 'First'),
(44, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'F9', 'First'),
(45, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'F9', 'First'),
(46, 'LNDPOLY/2019/2020/000002', 'Mathematics', 'C4', 'Second'),
(47, 'LNDPOLY/2019/2020/000002', 'English', 'B2', 'Second'),
(48, 'LNDPOLY/2019/2020/000002', 'Chemistry', 'C4', 'Second'),
(49, 'LNDPOLY/2019/2020/000002', 'Physics', 'C4', 'Second'),
(50, 'LNDPOLY/2019/2020/000002', 'Government', 'C4', 'Second'),
(51, 'LNDPOLY/2019/2020/000002', 'Home Economics', 'B2', 'Second'),
(52, 'LNDPOLY/2019/2020/000002', 'Biology', 'B2', 'Second'),
(53, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'C6', 'Second'),
(54, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'C6', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblsession`
--

DROP TABLE IF EXISTS `tblsession`;
CREATE TABLE IF NOT EXISTS `tblsession` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `sessionName` varchar(50) NOT NULL,
  `isActive` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`Id`, `sessionName`, `isActive`) VALUES
(1, '2019/2020', '1'),
(3, '2020/2021', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

DROP TABLE IF EXISTS `tblsubjects`;
CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`Id`, `subjectName`) VALUES
(1, 'Mathematics'),
(2, 'English'),
(3, 'Chemistry'),
(4, 'Physics'),
(5, 'Government'),
(6, 'Home Economics'),
(7, 'Biology'),
(9, 'Yoruba Language');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
