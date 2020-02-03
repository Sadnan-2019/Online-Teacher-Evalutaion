-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: ফেব 05, 2019 at 07:04 PM
-- সার্ভার সংস্করন: 10.1.32-MariaDB
-- পিএইছপির সংস্করন: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `evaluation`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminid` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `adminname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `password`, `adminname`) VALUES
(1, 'admin1', '123', NULL);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `closesurvay`
--

CREATE TABLE `closesurvay` (
  `crid` int(11) NOT NULL,
  `qset` int(1) DEFAULT NULL,
  `qid` varchar(2) DEFAULT NULL,
  `qresponse` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `course`
--

CREATE TABLE `course` (
  `courseid` varchar(10) NOT NULL,
  `deptcode` int(11) NOT NULL,
  `coursetitle` varchar(50) DEFAULT NULL,
  `coursecredit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `course`
--

INSERT INTO `course` (`courseid`, `deptcode`, `coursetitle`, `coursecredit`) VALUES
('cse-100', 17, 'data', 2),
('cse-222', 17, 'image processinh', 1),
('cse-400', 17, 'image processinh', 1),
('cse-500', 17, 'data', 2),
('LAW-202', 18, 'Crime part2', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `coursereg`
--

CREATE TABLE `coursereg` (
  `crid` int(11) NOT NULL,
  `evaluationstatus` tinyint(1) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `stdid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `courseteacher`
--

CREATE TABLE `courseteacher` (
  `cid` int(11) NOT NULL,
  `coursepart` varchar(10) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `semester` varchar(7) DEFAULT NULL,
  `enablestatus` tinyint(1) DEFAULT NULL,
  `deptct_id` int(11) DEFAULT NULL,
  `teacherID` varchar(10) DEFAULT NULL,
  `subjectid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `courseteacher`
--

INSERT INTO `courseteacher` (`cid`, `coursepart`, `year`, `semester`, `enablestatus`, `deptct_id`, `teacherID`, `subjectid`) VALUES
(59, NULL, 2018, 'summer', NULL, 17, 'CT-1002', 'cse-222'),
(60, NULL, 2018, 'spring', NULL, 17, 'CT-1002', 'cse-400');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptcode` varchar(10) DEFAULT NULL,
  `deptname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `department`
--

INSERT INTO `department` (`id`, `deptcode`, `deptname`) VALUES
(17, 'CSE', 'Computer Science and engineering '),
(18, 'LLB', 'LAW');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `opensurvay`
--

CREATE TABLE `opensurvay` (
  `crid` int(11) NOT NULL,
  `qset` int(1) DEFAULT NULL,
  `qid` varchar(2) DEFAULT NULL,
  `openanswer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `questiontable`
--

CREATE TABLE `questiontable` (
  `id` int(11) NOT NULL,
  `qset` int(1) DEFAULT NULL,
  `qid` varchar(2) DEFAULT NULL,
  `qdescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `student`
--

CREATE TABLE `student` (
  `studentid` varchar(15) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `studentstatus` tinyint(1) DEFAULT NULL,
  `programcode` varchar(10) DEFAULT NULL,
  `deptcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `student`
--

INSERT INTO `student` (`studentid`, `password`, `studentname`, `email`, `studentstatus`, `programcode`, `deptcode`) VALUES
('LG02-38-15-001', NULL, 'NIRBAN', 'nirban@gmail.com', NULL, 'LG02', 18),
('UG02-38-15-01', NULL, 'NIR', 'nir@gmail.com', NULL, 'UG02', 17);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `teacher`
--

CREATE TABLE `teacher` (
  `teacherid` varchar(10) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `teachername` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `teacherstatus` tinyint(1) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `teacher`
--

INSERT INTO `teacher` (`teacherid`, `password`, `teachername`, `email`, `teacherstatus`, `dept`) VALUES
('CT-1000', NULL, 'Mamunur rashid', 'mamun873@gmail.com', NULL, 18),
('CT-1002', NULL, 'Partharaj Deb', 'partho@gmail.com', NULL, 17);

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `closesurvay`
--
ALTER TABLE `closesurvay`
  ADD PRIMARY KEY (`crid`);

--
-- টেবিলের ইনডেক্সসমুহ `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD UNIQUE KEY `course_courseid_uindex` (`courseid`),
  ADD KEY `deptcode` (`deptcode`);

--
-- টেবিলের ইনডেক্সসমুহ `coursereg`
--
ALTER TABLE `coursereg`
  ADD PRIMARY KEY (`crid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `stdid` (`stdid`);

--
-- টেবিলের ইনডেক্সসমুহ `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `deptct_id` (`deptct_id`),
  ADD KEY `teacherID` (`teacherID`),
  ADD KEY `subjectid` (`subjectid`);

--
-- টেবিলের ইনডেক্সসমুহ `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_deptcode_uindex` (`deptcode`);

--
-- টেবিলের ইনডেক্সসমুহ `opensurvay`
--
ALTER TABLE `opensurvay`
  ADD PRIMARY KEY (`crid`);

--
-- টেবিলের ইনডেক্সসমুহ `questiontable`
--
ALTER TABLE `questiontable`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `deptID` (`deptcode`);

--
-- টেবিলের ইনডেক্সসমুহ `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherid`),
  ADD KEY `dept` (`dept`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `closesurvay`
--
ALTER TABLE `closesurvay`
  MODIFY `crid` int(11) NOT NULL AUTO_INCREMENT;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `coursereg`
--
ALTER TABLE `coursereg`
  MODIFY `crid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `courseteacher`
--
ALTER TABLE `courseteacher`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `opensurvay`
--
ALTER TABLE `opensurvay`
  MODIFY `crid` int(11) NOT NULL AUTO_INCREMENT;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `questiontable`
--
ALTER TABLE `questiontable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- স্তুপকৃত টেবলের সীমবদ্ধতা
--

--
-- টেবলের সীমবদ্ধতা `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`deptcode`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`deptcode`) REFERENCES `department` (`id`);

--
-- টেবলের সীমবদ্ধতা `coursereg`
--
ALTER TABLE `coursereg`
  ADD CONSTRAINT `coursereg_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courseteacher` (`cid`),
  ADD CONSTRAINT `coursereg_ibfk_2` FOREIGN KEY (`stdid`) REFERENCES `student` (`studentid`);

--
-- টেবলের সীমবদ্ধতা `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD CONSTRAINT `courseteacher_ibfk_1` FOREIGN KEY (`deptct_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `courseteacher_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherid`),
  ADD CONSTRAINT `courseteacher_ibfk_3` FOREIGN KEY (`subjectid`) REFERENCES `course` (`courseid`);

--
-- টেবলের সীমবদ্ধতা `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`deptcode`) REFERENCES `department` (`id`);

--
-- টেবলের সীমবদ্ধতা `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`dept`) REFERENCES `department` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
