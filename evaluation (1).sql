-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 06:50 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminid` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `adminname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `password`, `adminname`) VALUES
(1, 'admin1', '321', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `closesurvay`
--

CREATE TABLE `closesurvay` (
  `Id` int(11) NOT NULL,
  `crid` int(1) DEFAULT NULL,
  `qid` varchar(2) DEFAULT NULL,
  `qresponse` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closesurvay`
--

INSERT INTO `closesurvay` (`Id`, `crid`, `qid`, `qresponse`) VALUES
(43, 25, '1', 5),
(44, 25, '2', 4),
(45, 1, '1', 3),
(46, 1, '2', 3),
(47, 2, '1', 3),
(48, 2, '2', 3),
(49, 12, '1', 5),
(50, 12, '2', 5),
(51, 1, '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` varchar(10) NOT NULL,
  `coursetitle` varchar(50) DEFAULT NULL,
  `coursecredit` double DEFAULT NULL,
  `deptcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursetitle`, `coursecredit`, `deptcode`) VALUES
('cse111', 'database', 1, 'CSE'),
('pharma--22', 'pharmalab', 2, 'Pharma');

-- --------------------------------------------------------

--
-- Table structure for table `coursereg`
--

CREATE TABLE `coursereg` (
  `crid` int(11) NOT NULL,
  `evaluationstatus` tinyint(1) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `stdid` varchar(15) DEFAULT NULL,
  `deptcode` varchar(10) DEFAULT NULL,
  `qSetId` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursereg`
--

INSERT INTO `coursereg` (`crid`, `evaluationstatus`, `cid`, `stdid`, `deptcode`, `qSetId`, `status`) VALUES
(1, 1, 1, 'ug02-38-15-033', 'CSE', 1, 1),
(2, NULL, 2, 'pg-38-15-033', 'Pharma', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseteacher`
--

CREATE TABLE `courseteacher` (
  `cid` int(11) NOT NULL,
  `coursepart` varchar(10) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `semester` varchar(7) DEFAULT NULL,
  `enablestatus` tinyint(1) DEFAULT NULL,
  `teacherID` varchar(10) DEFAULT NULL,
  `courseid` varchar(10) DEFAULT NULL,
  `deptcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseteacher`
--

INSERT INTO `courseteacher` (`cid`, `coursepart`, `year`, `semester`, `enablestatus`, `teacherID`, `courseid`, `deptcode`) VALUES
(1, NULL, 2019, 'Spring', 0, 'CT-123', 'cse111', 'CSE'),
(2, NULL, 2019, 'Summer', 0, 'ph-111', 'pharma--22', 'Pharma'),
(3, NULL, 2019, 'Summer', 0, 'ph-111', 'pharma--22', 'Pharma');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptcode` varchar(10) NOT NULL,
  `deptname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptcode`, `deptname`) VALUES
('CSE', 'Computer Science &amp; Engineering'),
('Pharma', 'Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `opensurvay`
--

CREATE TABLE `opensurvay` (
  `crid` int(11) NOT NULL,
  `qset` int(1) DEFAULT NULL,
  `qid` varchar(2) DEFAULT NULL,
  `openanswer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionId` int(11) NOT NULL,
  `questionDescription` varchar(255) NOT NULL,
  `qSet` int(10) DEFAULT NULL,
  `option1` varchar(20) DEFAULT NULL,
  `option2` varchar(20) DEFAULT NULL,
  `option3` varchar(20) DEFAULT NULL,
  `option4` varchar(20) DEFAULT NULL,
  `option5` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionId`, `questionDescription`, `qSet`, `option1`, `option2`, `option3`, `option4`, `option5`) VALUES
(1, 'The Teacher&#039;s preparation for classes was', 1, 'Excellent', ' Good', ' Very good', 'Average', 'Poor');

-- --------------------------------------------------------

--
-- Table structure for table `questionset`
--

CREATE TABLE `questionset` (
  `quesSetId` int(10) NOT NULL,
  `details` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionset`
--

INSERT INTO `questionset` (`quesSetId`, `details`) VALUES
(1, 'acevf'),
(2, 'dvsedv'),
(3, 'loko');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(15) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `studentstatus` tinyint(1) DEFAULT NULL,
  `programcode` varchar(10) DEFAULT NULL,
  `deptcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `password`, `studentname`, `email`, `studentstatus`, `programcode`, `deptcode`) VALUES
('pg-38-15-033', '123', 'rashid', 'rashid.k13b@gmail.com', NULL, 'pg', 'Pharma'),
('ug02-38-15-033', '123', 'Md Sadnan Hossain', 'sadnan.wow@gmail.com', NULL, 'ug', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherid` varchar(10) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `teachername` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `teacherstatus` tinyint(1) DEFAULT NULL,
  `deptcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherid`, `password`, `teachername`, `email`, `teacherstatus`, `deptcode`) VALUES
('CT-123', NULL, 'Masud tareq', 'masood.k13b@gmail.com', NULL, 'CSE'),
('ph-111', NULL, 'shakil', 'juju@gmail.com', NULL, 'Pharma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closesurvay`
--
ALTER TABLE `closesurvay`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD UNIQUE KEY `course_courseid_uindex` (`courseid`),
  ADD KEY `course_department_deptcode_fk` (`deptcode`);

--
-- Indexes for table `coursereg`
--
ALTER TABLE `coursereg`
  ADD PRIMARY KEY (`crid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `stdid` (`stdid`),
  ADD KEY `coursereg_department_deptcode_fk` (`deptcode`),
  ADD KEY `qSetId` (`qSetId`);

--
-- Indexes for table `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `teacherID` (`teacherID`),
  ADD KEY `subjectid` (`courseid`),
  ADD KEY `courseteacher_department_deptcode_fk` (`deptcode`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptcode`);

--
-- Indexes for table `opensurvay`
--
ALTER TABLE `opensurvay`
  ADD PRIMARY KEY (`crid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionId`),
  ADD KEY `qSet` (`qSet`);

--
-- Indexes for table `questionset`
--
ALTER TABLE `questionset`
  ADD PRIMARY KEY (`quesSetId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `student_department_deptcode_fk` (`deptcode`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherid`),
  ADD KEY `teacher_department_deptcode_fk` (`deptcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `closesurvay`
--
ALTER TABLE `closesurvay`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `coursereg`
--
ALTER TABLE `coursereg`
  MODIFY `crid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courseteacher`
--
ALTER TABLE `courseteacher`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opensurvay`
--
ALTER TABLE `opensurvay`
  MODIFY `crid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questionset`
--
ALTER TABLE `questionset`
  MODIFY `quesSetId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_department_deptcode_fk` FOREIGN KEY (`deptcode`) REFERENCES `department` (`deptcode`);

--
-- Constraints for table `coursereg`
--
ALTER TABLE `coursereg`
  ADD CONSTRAINT `coursereg_department_deptcode_fk` FOREIGN KEY (`deptcode`) REFERENCES `department` (`deptcode`),
  ADD CONSTRAINT `coursereg_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courseteacher` (`cid`),
  ADD CONSTRAINT `coursereg_ibfk_2` FOREIGN KEY (`stdid`) REFERENCES `student` (`studentid`),
  ADD CONSTRAINT `coursereg_ibfk_3` FOREIGN KEY (`qSetId`) REFERENCES `questionset` (`quesSetId`);

--
-- Constraints for table `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD CONSTRAINT `courseteacher_department_deptcode_fk` FOREIGN KEY (`deptcode`) REFERENCES `department` (`deptcode`),
  ADD CONSTRAINT `courseteacher_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherid`),
  ADD CONSTRAINT `courseteacher_ibfk_3` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`qSet`) REFERENCES `questionset` (`quesSetId`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_department_deptcode_fk` FOREIGN KEY (`deptcode`) REFERENCES `department` (`deptcode`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_department_deptcode_fk` FOREIGN KEY (`deptcode`) REFERENCES `department` (`deptcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
