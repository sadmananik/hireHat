-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 10:43 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hirehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccounts`
--

CREATE TABLE `adminaccounts` (
  `ACCID` int(255) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `GENDER` varchar(500) NOT NULL,
  `DOB` varchar(500) NOT NULL,
  `EMAIL` varchar(500) NOT NULL,
  `PHONE` varchar(500) NOT NULL,
  `NID` varchar(500) NOT NULL,
  `ADDRESS` varchar(500) NOT NULL,
  `PHOTO` varchar(500) NOT NULL,
  `JOINDATE` varchar(500) NOT NULL,
  `VALIDITY` varchar(500) NOT NULL,
  `CONFIRMBYACCID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminaccounts`
--

INSERT INTO `adminaccounts` (`ACCID`, `USERNAME`, `NAME`, `STATUS`, `GENDER`, `DOB`, `EMAIL`, `PHONE`, `NID`, `ADDRESS`, `PHOTO`, `JOINDATE`, `VALIDITY`, `CONFIRMBYACCID`) VALUES
(2000, 'ssss', 'Shafiul Sededed', 'Admin', 'Male', '1996-01-31', 'example@mail.com', '01521210000', '', '', '/HireHAT/data/assets/uploadFile/profilePicture/2000.jpg', '2018-01-31', 'VALID', 0),
(2006, 'ssShaon', 'Shafiul Shaon', 'Admin', '', '1995-07-19', 'shafiulshaon@gmail.com', '', '', '', '', '2018-05-04', 'VALID', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `BIDID` int(255) NOT NULL,
  `ACCID` int(255) NOT NULL,
  `BIDBYACCID` int(255) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `SALARY_TYPE` varchar(500) NOT NULL,
  `SALARY` float NOT NULL,
  `AGREEMENT_DETAILS` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chiefaccounts`
--

CREATE TABLE `chiefaccounts` (
  `ACCID` int(255) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `GENDER` varchar(500) NOT NULL,
  `DOB` varchar(500) NOT NULL,
  `EMAIL` varchar(500) NOT NULL,
  `PHONE` varchar(500) NOT NULL,
  `NID` varchar(500) NOT NULL,
  `ADDRESS` varchar(500) NOT NULL,
  `PHOTO` varchar(500) NOT NULL,
  `MARITALSTATUS` varchar(500) NOT NULL,
  `PROFESSIONID` int(255) DEFAULT NULL,
  `JOINDATE` varchar(500) NOT NULL,
  `VALIDITY` varchar(500) NOT NULL,
  `CONFIRMBYACCID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chiefaccounts`
--

INSERT INTO `chiefaccounts` (`ACCID`, `USERNAME`, `NAME`, `STATUS`, `GENDER`, `DOB`, `EMAIL`, `PHONE`, `NID`, `ADDRESS`, `PHOTO`, `MARITALSTATUS`, `PROFESSIONID`, `JOINDATE`, `VALIDITY`, `CONFIRMBYACCID`) VALUES
(1001, 'sadmanik', 'Sadman Anik', 'Chief', 'Male', '1996-01-31', 'example@mail.com', '01521210000', '', 'Dhaka, BD.', '/HireHAT/data/assets/uploadFile/profilePicture/1001.jpg', 'Married', NULL, '', 'VALID', NULL),
(1002, 'ss_khan', 'Nam nai', 'Chief', 'Male', '2013-01-31', 'example@mail.com', '01521213000', '', 'Dhaka, Bangladesh, 1200', '', 'Married', NULL, '', 'VALID', NULL),
(1004, 'ad', 'Sadman Anik', 'Chief', 'Male', '2013-01-31', 'example@mail.com', '', '', '', '', '', NULL, '', 'VALID', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `HIREID` int(255) NOT NULL,
  `JOBID` int(255) NOT NULL,
  `ACCID` int(255) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `HIERDBYACCID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`HIREID`, `JOBID`, `ACCID`, `DATE`, `HIERDBYACCID`) VALUES
(5, 5001, 1003, '2018-05-04', 1001),
(6, 5001, 2004, '2018-05-04', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOBID` int(255) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `DETAILS` varchar(5000) NOT NULL,
  `DESIGNATION` varchar(500) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `TYPE` varchar(500) NOT NULL,
  `DEPARTMENT` varchar(100) NOT NULL,
  `VACANCY` varchar(500) NOT NULL,
  `EXPERIENCE` varchar(5000) NOT NULL,
  `EDUCATION` varchar(5000) NOT NULL,
  `GENDER` varchar(500) NOT NULL,
  `AGE` varchar(500) NOT NULL,
  `LOCATION` varchar(500) NOT NULL,
  `PUBLISHED_DATE` varchar(500) NOT NULL,
  `LAST_APPLY_DATE` varchar(500) NOT NULL,
  `SALARY_TYPE` varchar(500) NOT NULL,
  `SALARY` float NOT NULL,
  `PUBLISHED_BY_ACCID` int(255) NOT NULL,
  `LAST_EDITED_DATE` varchar(5000) NOT NULL,
  `APPLIED_COUNTER` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOBID`, `TITLE`, `DETAILS`, `DESIGNATION`, `STATUS`, `TYPE`, `DEPARTMENT`, `VACANCY`, `EXPERIENCE`, `EDUCATION`, `GENDER`, `AGE`, `LOCATION`, `PUBLISHED_DATE`, `LAST_APPLY_DATE`, `SALARY_TYPE`, `SALARY`, `PUBLISHED_BY_ACCID`, `LAST_EDITED_DATE`, `APPLIED_COUNTER`) VALUES
(5001, 'Designer', 'Need Part - Time Designer for my company logo art.', 'Employee', 'ACTIVE', 'Freelancer', 'Computer Science', '10', 'Bsc in CSE from any reputed university', 'Bsc in CSE from any reputed university', 'Both', '18', 'Online', '2018-04-28', '2018-05-16', 'Daily', 5000, 1001, '2018-05-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `job_applied`
--

CREATE TABLE `job_applied` (
  `APPLIEDID` int(255) NOT NULL,
  `JOBID` int(255) NOT NULL,
  `APPLIED_BY_STATUS` varchar(5000) NOT NULL,
  `ACCID` int(255) NOT NULL,
  `APPLIED_DATE` varchar(500) NOT NULL,
  `CONFIRMATION` varchar(500) NOT NULL,
  `CONFIRMBYACCID` int(255) NOT NULL,
  `CONFIRMBY_ACC_STATUS` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applied`
--

INSERT INTO `job_applied` (`APPLIEDID`, `JOBID`, `APPLIED_BY_STATUS`, `ACCID`, `APPLIED_DATE`, `CONFIRMATION`, `CONFIRMBYACCID`, `CONFIRMBY_ACC_STATUS`) VALUES
(27, 5001, 'Staff', 1003, '04/05/18', 'Confirmed', 1001, 'Chief'),
(29, 5001, 'Chief', 2004, '2018-05-04', 'Confirmed', 1001, 'Chief');

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `ACCID` int(255) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `SECRETQUEANS` varchar(500) NOT NULL,
  `VALIDITY` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`ACCID`, `USERNAME`, `PASSWORD`, `STATUS`, `SECRETQUEANS`, `VALIDITY`) VALUES
(1001, 'sadmanik', '11111111', 'Chief', '12', 'VALID'),
(1002, 'ss_khan', '22222222', 'Chief', '12', 'VALID'),
(1003, 'shaif', '55555555', 'Staff', '', 'VALID'),
(1004, 'ad', 'vvvvvvvv', 'Chief', '', 'VALID'),
(2000, 'shaonShafiul', '1234', 'Admin', 'ok', 'VALID'),
(2003, 'S M', '12345678', 'Staff', '', 'VALID'),
(2004, 'ssa', 'aaaaaaaa', 'Staff', '', 'VALID'),
(2005, 'asasas', '11111111', 'Staff', '', 'INVALID'),
(2006, 'ssShaon', '52581963', 'Admin', '', 'VALID');

-- --------------------------------------------------------

--
-- Table structure for table `loginrecord`
--

CREATE TABLE `loginrecord` (
  `LOGINRECID` int(255) NOT NULL,
  `ACCID` int(255) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `GENDER` varchar(500) NOT NULL,
  `EMAIL` varchar(500) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `TIME` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginrecord`
--

INSERT INTO `loginrecord` (`LOGINRECID`, `ACCID`, `STATUS`, `USERNAME`, `NAME`, `GENDER`, `EMAIL`, `DATE`, `TIME`) VALUES
(1001, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '1-1-2018', '6:12 PM'),
(9000, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-02', '11:33:11pm'),
(9001, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-02', '11:36:42pm'),
(9002, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-02', '11:38:06pm'),
(9003, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-02', '11:48:03pm'),
(9004, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '03:36:21am'),
(9005, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '04:07:31am'),
(9006, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '05:21:51am'),
(9007, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '06:05:32am'),
(9008, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '06:18:41am'),
(9009, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '06:24:26am'),
(9010, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '06:24:57am'),
(9011, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '06:34:31am'),
(9012, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '06:49:53am'),
(9013, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:05:51am'),
(9014, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '07:08:42am'),
(9015, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:13:22am'),
(9016, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:14:46am'),
(9017, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:15:36am'),
(9018, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:21:50am'),
(9019, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:23:04am'),
(9020, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:26:06am'),
(9021, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:26:45am'),
(9022, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '07:46:06am'),
(9023, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '08:45:40am'),
(9024, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '08:47:13am'),
(9025, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '08:49:09am'),
(9026, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '08:49:37am'),
(9027, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '08:50:13am'),
(9028, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '08:51:12am'),
(9029, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '08:55:28am'),
(9030, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:04:47am'),
(9031, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:05:50am'),
(9032, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:07:05am'),
(9033, 2000, 'Chief', 'shaonShafiul', 'Shafiul Shaon', 'Male', 'example@mail.com', '2018-05-03', '09:09:05am'),
(9034, 2000, 'Chief', 'shaonShafiul', 'Shafiul Shaon', 'Male', 'example@mail.com', '2018-05-03', '09:19:09am'),
(9035, 2000, 'Chief', 'shaonShafiul', 'Shafiul Shaon', 'Male', 'example@mail.com', '2018-05-03', '09:28:26am'),
(9036, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:32:54am'),
(9037, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:37:14am'),
(9038, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:41:09am'),
(9039, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:53:58am'),
(9040, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:55:34am'),
(9041, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:56:12am'),
(9042, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:59:12am'),
(9043, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:59:26am'),
(9044, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:25:37pm'),
(9045, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:27:08pm'),
(9046, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:27:48pm'),
(9047, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:28:11pm'),
(9048, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:28:47pm'),
(9049, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '09:28:54pm'),
(9050, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-03', '09:32:29pm'),
(9051, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '10:10:15pm'),
(9052, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '11:05:58pm'),
(9053, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-03', '11:30:44pm'),
(9054, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '12:02:01am'),
(9055, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '12:05:59am'),
(9056, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '02:27:05pm'),
(9057, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '02:44:08pm'),
(9058, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '02:45:23pm'),
(9059, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '02:46:24pm'),
(9060, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '02:52:47pm'),
(9061, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '02:53:30pm'),
(9062, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '02:54:06pm'),
(9063, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '03:05:25pm'),
(9064, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:07:02pm'),
(9065, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:07:50pm'),
(9066, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '03:08:42pm'),
(9067, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '03:09:33pm'),
(9068, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:10:15pm'),
(9069, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '03:11:07pm'),
(9070, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:26:21pm'),
(9071, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:31:12pm'),
(9072, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:35:51pm'),
(9073, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:39:00pm'),
(9074, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:43:13pm'),
(9075, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:49:24pm'),
(9076, 2004, 'Staff', 'ssa', 'name full', '', 'example@mail.com', '2018-05-04', '03:52:40pm'),
(9077, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '03:54:23pm'),
(9078, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '04:02:25pm'),
(9079, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '04:18:33pm'),
(9080, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '04:18:51pm'),
(9081, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '04:19:26pm'),
(9082, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '04:22:00pm'),
(9083, 2000, 'Admin', '', '', '', '', '2018-05-04', '04:45:40pm'),
(9084, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '05:01:06pm'),
(9085, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-04', '05:01:31pm'),
(9086, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '05:03:44pm'),
(9087, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '05:53:54pm'),
(9088, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-04', '05:54:04pm'),
(9089, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-04', '06:13:34pm'),
(9090, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '06:34:57pm'),
(9091, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-04', '06:57:11pm'),
(9092, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '07:10:18pm'),
(9093, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-04', '07:19:32pm'),
(9094, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-04', '07:27:56pm'),
(9095, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-04', '08:36:26pm'),
(9096, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-04', '09:22:28pm'),
(9097, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-04', '09:55:19pm'),
(9098, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-05', '08:39:08am'),
(9099, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-05', '08:45:35am'),
(9100, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-05', '08:46:03am'),
(9101, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-05', '10:34:20am'),
(9102, 1001, 'Chief', 'sadmanik', 'Sadman Anik', 'Male', 'example@mail.com', '2018-05-05', '10:36:27am'),
(9103, 2000, 'Admin', 'shaonShafiul', 'Shafiul Sededed', 'Male', 'example@mail.com', '2018-05-05', '10:42:04am'),
(9104, 1003, 'Staff', 'shaif', 'Shaif Hasan', 'Male', 'sk1@gmail.com', '2018-05-05', '10:42:18am');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `NOTICEID` int(255) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `NOTICE` varchar(5000) NOT NULL,
  `FROM_ACCID` int(255) NOT NULL,
  `TO_ACCID` int(255) NOT NULL,
  `TO_TYPE` varchar(500) NOT NULL,
  `DATE` varchar(500) NOT NULL,
  `TIME` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`NOTICEID`, `TITLE`, `NOTICE`, `FROM_ACCID`, `TO_ACCID`, `TO_TYPE`, `DATE`, `TIME`) VALUES
(50, 'New Notice', 'Website is under construction. Sorry For Problem.', 1000, 0, 'to_public', '2018/05/04', '06:58:29pm'),
(52, 'New Team Created', 'Meeting @12PM. Do n0t Miss', 1001, 2, 'to_team', '2018-05-04', '07:20:32pm'),
(53, 'Test', 'Hi', 1001, 2000, 'to_Admin', '2018-05-05', '10:41:38am');

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `PROFESSIONID` int(255) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `INSTITUTION` varchar(500) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `ACCID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `RATEID` int(255) NOT NULL,
  `ACCID` int(255) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `RATEDBYACCID` int(255) NOT NULL,
  `RATE` int(255) NOT NULL,
  `COMMENT` varchar(500) NOT NULL,
  `DATE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratting`
--

INSERT INTO `ratting` (`RATEID`, `ACCID`, `STATUS`, `RATEDBYACCID`, `RATE`, `COMMENT`, `DATE`) VALUES
(500, 1003, 'Staff', 1001, 4, 'blank', '2018-05-02'),
(501, 2005, 'Staff', 0, 0, 'blank', '2018-05-03'),
(502, 2003, 'Staff', 1001, 4, '', '2018-05-03'),
(503, 2004, 'Staff', 1001, 1, '', '2018-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `staffaccounts`
--

CREATE TABLE `staffaccounts` (
  `ACCID` int(255) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `STATUS` varchar(500) NOT NULL,
  `GENDER` varchar(500) NOT NULL,
  `DOB` varchar(500) NOT NULL,
  `EMAIL` varchar(500) NOT NULL,
  `PHONE` varchar(500) NOT NULL,
  `NID` varchar(500) DEFAULT NULL,
  `ADDRESS` varchar(500) NOT NULL,
  `PHOTO` varchar(500) NOT NULL,
  `MARITALSTATUS` varchar(500) NOT NULL,
  `PROFESSIONID` int(255) NOT NULL,
  `TEAMID` int(255) NOT NULL,
  `CURRENTHIREID` int(255) DEFAULT NULL,
  `CURRENTCLANID` int(255) DEFAULT NULL,
  `CURRENTJOBID` int(255) DEFAULT NULL,
  `MODE` varchar(500) NOT NULL,
  `JOINDATE` varchar(500) NOT NULL,
  `VALIDITY` varchar(500) NOT NULL,
  `CONFIRMBYACCID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffaccounts`
--

INSERT INTO `staffaccounts` (`ACCID`, `USERNAME`, `NAME`, `STATUS`, `GENDER`, `DOB`, `EMAIL`, `PHONE`, `NID`, `ADDRESS`, `PHOTO`, `MARITALSTATUS`, `PROFESSIONID`, `TEAMID`, `CURRENTHIREID`, `CURRENTCLANID`, `CURRENTJOBID`, `MODE`, `JOINDATE`, `VALIDITY`, `CONFIRMBYACCID`) VALUES
(1003, 'sadmanik', 'Shaif Hasan', 'Staff', 'Male', '1996-01-31', 'sk1@gmail.com', '', '', 'Kuril, Bissho-Road', '/HireHAT/data/assets/uploadFile/profilePicture/1003.jpg', 'Single', 0, 0, 0, 0, NULL, 'Hired', '2018-04-29', 'VALID', 0),
(2003, 'S M', 'S M', 'Staff', '', '1999-2-2', 'example@mail.com', '', '', '', '', '', 0, 0, 0, 0, NULL, 'Free', '2018-04-29', 'VALID', 0),
(2004, 'ssa', 'name full', 'Staff', '', '2000-2-2', 'example@mail.com', '', NULL, '', '/HireHAT/data/assets/uploadFile/profilePicture/2004.jpg', 'Single', 0, 0, NULL, NULL, NULL, 'Hired', '2018-05-02', 'VALID', 0),
(2005, 'asasas', 's s', 'Staff', '', '2000-1-1', 'example@mail.com', '', NULL, '', '', '', 0, 0, NULL, NULL, NULL, 'Free', '2018-05-03', 'VALID', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffeducation`
--

CREATE TABLE `staffeducation` (
  `QUALIFICATIONID` int(255) NOT NULL,
  `COLLAGE` varchar(500) NOT NULL,
  `C_GRADE` varchar(500) NOT NULL,
  `C_PERIOD` varchar(500) NOT NULL,
  `UNDERGRADUATE` varchar(500) NOT NULL,
  `U_GRADE` varchar(500) NOT NULL,
  `U_PERIOD` varchar(500) NOT NULL,
  `POSTGRADUATE` varchar(500) NOT NULL,
  `P_GRADE` varchar(500) NOT NULL,
  `P_PERIOD` varchar(500) NOT NULL,
  `PHD` varchar(500) NOT NULL,
  `PHP_TITLE` varchar(500) NOT NULL,
  `PHP_PERIOD` varchar(500) NOT NULL,
  `ACCID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffexperience`
--

CREATE TABLE `staffexperience` (
  `EXPERIENCEID` int(255) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `COMPANY` varchar(500) NOT NULL,
  `PERIOD` varchar(500) NOT NULL,
  `DESIGNATION` varchar(500) NOT NULL,
  `ACCID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffskill`
--

CREATE TABLE `staffskill` (
  `STAFF_SKILLID` int(255) NOT NULL,
  `TITLE` varchar(500) NOT NULL,
  `SKILLS` varchar(5000) NOT NULL,
  `ACCID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TEAMID` int(255) NOT NULL,
  `T_NAME` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `CREATED_DATE` varchar(500) NOT NULL,
  `CREATED_BY_ACCID` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TEAMID`, `T_NAME`, `DESCRIPTION`, `CREATED_DATE`, `CREATED_BY_ACCID`) VALUES
(2, 'Team 360', 'Computer Design', '2018-04-30', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `TEAMID` int(255) NOT NULL,
  `ACCID` int(255) NOT NULL,
  `JOINDATE` varchar(500) NOT NULL,
  `VALIDITY` varchar(500) NOT NULL,
  `STATUS` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`TEAMID`, `ACCID`, `JOINDATE`, `VALIDITY`, `STATUS`) VALUES
(2, 1003, '2018-05-04', 'VALID', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANSACTIONID` int(255) NOT NULL,
  `ACCID` int(255) NOT NULL,
  `U_RECIEVE` float NOT NULL,
  `U_PAY` float NOT NULL,
  `EXTRA_BONUS` float NOT NULL,
  `JOBID` int(255) NOT NULL,
  `PAIEDBYACCID` int(255) NOT NULL,
  `DATE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccounts`
--
ALTER TABLE `adminaccounts`
  ADD PRIMARY KEY (`ACCID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`BIDID`);

--
-- Indexes for table `chiefaccounts`
--
ALTER TABLE `chiefaccounts`
  ADD PRIMARY KEY (`ACCID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`HIREID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOBID`);

--
-- Indexes for table `job_applied`
--
ALTER TABLE `job_applied`
  ADD PRIMARY KEY (`APPLIEDID`);

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`ACCID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `loginrecord`
--
ALTER TABLE `loginrecord`
  ADD PRIMARY KEY (`LOGINRECID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`NOTICEID`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`PROFESSIONID`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`RATEID`);

--
-- Indexes for table `staffaccounts`
--
ALTER TABLE `staffaccounts`
  ADD PRIMARY KEY (`ACCID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `staffeducation`
--
ALTER TABLE `staffeducation`
  ADD PRIMARY KEY (`QUALIFICATIONID`);

--
-- Indexes for table `staffexperience`
--
ALTER TABLE `staffexperience`
  ADD PRIMARY KEY (`EXPERIENCEID`);

--
-- Indexes for table `staffskill`
--
ALTER TABLE `staffskill`
  ADD PRIMARY KEY (`STAFF_SKILLID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TEAMID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANSACTIONID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminaccounts`
--
ALTER TABLE `adminaccounts`
  MODIFY `ACCID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `BIDID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chiefaccounts`
--
ALTER TABLE `chiefaccounts`
  MODIFY `ACCID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `HIREID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JOBID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;

--
-- AUTO_INCREMENT for table `job_applied`
--
ALTER TABLE `job_applied`
  MODIFY `APPLIEDID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `logininfo`
--
ALTER TABLE `logininfo`
  MODIFY `ACCID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT for table `loginrecord`
--
ALTER TABLE `loginrecord`
  MODIFY `LOGINRECID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9105;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `NOTICEID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `PROFESSIONID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratting`
--
ALTER TABLE `ratting`
  MODIFY `RATEID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT for table `staffaccounts`
--
ALTER TABLE `staffaccounts`
  MODIFY `ACCID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2006;

--
-- AUTO_INCREMENT for table `staffeducation`
--
ALTER TABLE `staffeducation`
  MODIFY `QUALIFICATIONID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffexperience`
--
ALTER TABLE `staffexperience`
  MODIFY `EXPERIENCEID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffskill`
--
ALTER TABLE `staffskill`
  MODIFY `STAFF_SKILLID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TEAMID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANSACTIONID` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
