-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 05:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ExpenseID` int(11) NOT NULL,
  `ExpenseType` varchar(255) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `AddedByFK` int(11) DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  `LastUserFK` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`ExpenseID`, `ExpenseType`, `DateAdded`, `AddedByFK`, `DateModified`, `LastUserFK`) VALUES
(1, 'Advances', '2008-10-02 22:37:17', 1, '2008-10-05 12:54:32', 1),
(2, 'Distribution & transmission mat\'l inventory', '2008-10-02 22:37:27', 1, '2008-10-05 12:55:59', 1),
(3, 'Distribution & transmission equipment', '2008-10-02 22:37:51', 1, '2008-10-05 12:56:37', 1),
(4, 'Headend & studio equipment', '2008-10-05 12:56:49', 1, NULL, NULL),
(5, 'Salaries, wages & allowances', '2008-10-05 12:57:03', 1, NULL, NULL),
(6, 'SSS, Medicare and EC Contribution', '2008-10-05 12:57:17', 1, NULL, NULL),
(7, 'Rental Expense', '2008-10-05 12:57:27', 1, NULL, NULL),
(8, 'Light & water', '2008-10-05 12:57:39', 1, NULL, NULL),
(9, 'Taxes & licenses', '2008-10-05 12:57:48', 1, NULL, NULL),
(10, 'Freight & handling', '2008-10-05 12:57:53', 1, NULL, NULL),
(11, 'Postage, telephone & telegraph', '2008-10-05 12:58:09', 1, NULL, NULL),
(12, 'Transportation & travel', '2008-10-05 12:58:17', 1, NULL, NULL),
(13, 'Fuel, oil and lubricants', '2008-10-05 12:58:28', 1, NULL, NULL),
(14, 'Repairs & maintenance', '2008-10-05 12:58:37', 1, NULL, NULL),
(15, 'Representation & entertainment', '2008-10-05 12:58:54', 1, NULL, NULL),
(16, 'Advertisements & promotions', '2008-10-05 12:59:12', 1, NULL, NULL),
(17, 'Trainings & seminars', '2008-10-05 12:59:21', 1, NULL, NULL),
(18, 'Stationery & office supplies', '2008-10-05 12:59:35', 1, NULL, NULL),
(19, 'Program Subscription Fee', '2008-10-05 12:59:45', 1, NULL, NULL),
(20, 'Depreciation', '2008-10-05 12:59:54', 1, NULL, NULL),
(21, 'Amortization', '2008-10-05 12:59:59', 1, NULL, NULL),
(22, 'Interest & bank charges', '2008-10-05 13:00:11', 1, NULL, NULL),
(23, 'Miscellaneous expenses', '2008-10-05 13:00:19', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `labhematology`
--

CREATE TABLE `labhematology` (
  `ID` int(11) NOT NULL,
  `LABREQID` int(11) NOT NULL,
  `HEMOGLOBIN` int(11) NOT NULL,
  `HEMATOCRIT` int(11) NOT NULL,
  `RBC` int(11) NOT NULL,
  `WBC` int(11) NOT NULL,
  `DC_ANC` int(11) NOT NULL,
  `DC_STAB` int(11) NOT NULL,
  `DC_LYMPHS` int(11) NOT NULL,
  `DC_MNC` int(11) NOT NULL,
  `DC_EOS` int(11) NOT NULL,
  `DC_BASO` int(11) NOT NULL,
  `DC_AC` int(11) NOT NULL,
  `DC_TOTAL` int(11) NOT NULL,
  `CELL_MORPH` int(11) NOT NULL,
  `MACROCYTS` int(11) NOT NULL,
  `MICROCYTS` int(11) NOT NULL,
  `ANISOCTYS` int(11) NOT NULL,
  `POIKILOCYTS` int(11) NOT NULL,
  `HYPHOCHROMIA` int(11) NOT NULL,
  `POLYCHROMATOPHILIA` int(11) NOT NULL,
  `ESR` int(11) NOT NULL,
  `RETICULOCYTE` int(11) NOT NULL,
  `BLEEDTIME` int(11) NOT NULL,
  `CLOTTIME` int(11) NOT NULL,
  `BT_ABO` int(11) NOT NULL,
  `BT_RH` int(11) NOT NULL,
  `NUCLEATED_RBC` int(11) NOT NULL,
  `PLT` int(11) NOT NULL,
  `REMARKS` int(11) NOT NULL,
  `DATE_TAKEN` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `LABID` int(11) NOT NULL,
  `LABNAME` varchar(255) NOT NULL,
  `LABDESC` text NOT NULL,
  `LABFORM` varchar(100) NOT NULL,
  `LABPRICE` double NOT NULL,
  `DATECREATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`LABID`, `LABNAME`, `LABDESC`, `LABFORM`, `LABPRICE`, `DATECREATE`) VALUES
(1, 'ANTI-HAV (IgM ONLY)', 'Hepatitis A', 'anti-hav-igm', 300, '2020-09-14 14:31:10'),
(2, 'ASOT', 'Antistreptolysin O Titer', 'asot', 185, '2020-09-14 14:33:25'),
(3, 'CHEM', 'Clinical Chemistry', '', 0, '2020-09-14 14:33:25'),
(4, 'DENGUE NS1 AB', 'DENGUE NS1 ANTIBODY', '', 0, '2020-09-14 14:35:46'),
(5, 'DENGUE NS1 AG', 'DENGUE NS1 ANTIGEN', '', 0, '2020-09-14 14:35:46'),
(6, 'HBA1c', 'glycated haemoglobin', '', 0, '2020-09-14 14:37:36'),
(7, 'HBSAg', 'Australia antigen', '', 0, '2020-09-14 14:37:36'),
(8, 'HEMA', 'HEMATOLOGY', 'hematology', 0, '2020-09-14 14:39:22'),
(9, 'MISC', 'Miscellaneous', '', 0, '2020-09-14 14:39:22'),
(10, 'PT', 'Pregnancy Test', '', 0, '2020-09-14 14:40:11'),
(11, 'SE', 'Stool Examination', '', 0, '2020-09-14 14:40:11'),
(12, 'TYPHIDOT', 'Salmonella Typhi antibody test', 'statest', 200, '2020-09-14 14:41:36'),
(13, 'UA', 'Urinalysis', 'urinalysis', 100, '2020-09-14 14:41:36'),
(14, 'ANTI-HAV', 'Hepatitis A', 'anti-hav', 100, '2020-09-21 09:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `labrequest`
--

CREATE TABLE `labrequest` (
  `REQID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `REQBY` int(11) DEFAULT NULL,
  `REQDATE` datetime NOT NULL DEFAULT current_timestamp(),
  `LABSTATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labrequest`
--

INSERT INTO `labrequest` (`REQID`, `PID`, `REQBY`, `REQDATE`, `LABSTATUS`) VALUES
(1, 45, 1, '2020-09-19 11:24:16', 0),
(2, 34, 1, '2020-09-19 11:24:36', 0),
(3, 1272, 1, '2020-09-19 11:27:07', 0),
(4, 1007, 1, '2020-09-19 13:51:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `TESTID` int(11) NOT NULL,
  `REQID` int(11) NOT NULL,
  `LABID` int(11) NOT NULL,
  `TESTSTATUS` int(11) NOT NULL,
  `DATE_START` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`TESTID`, `REQID`, `LABID`, `TESTSTATUS`, `DATE_START`) VALUES
(1, 1, 1, 0, '0000-00-00 00:00:00'),
(2, 1, 2, 0, '0000-00-00 00:00:00'),
(3, 1, 3, 0, '0000-00-00 00:00:00'),
(4, 1, 4, 0, '0000-00-00 00:00:00'),
(5, 2, 8, 0, '0000-00-00 00:00:00'),
(6, 2, 10, 0, '0000-00-00 00:00:00'),
(7, 2, 13, 0, '0000-00-00 00:00:00'),
(8, 3, 2, 0, '0000-00-00 00:00:00'),
(9, 3, 3, 0, '0000-00-00 00:00:00'),
(10, 3, 4, 0, '0000-00-00 00:00:00'),
(11, 3, 8, 0, '0000-00-00 00:00:00'),
(12, 4, 1, 0, '0000-00-00 00:00:00'),
(13, 4, 2, 0, '0000-00-00 00:00:00'),
(14, 4, 3, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pharmedicine`
--

CREATE TABLE `pharmedicine` (
  `MEDID` int(11) NOT NULL,
  `MEDCODE` varchar(30) NOT NULL,
  `GENERICNAME` varchar(50) NOT NULL,
  `BRANDNAME` varchar(50) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `QTYADD` int(11) NOT NULL,
  `QTYSOLD` int(11) NOT NULL,
  `SELLPRICE` double NOT NULL,
  `SUPPLIERPRICE` double NOT NULL,
  `EXPIRYDATE` date NOT NULL,
  `DATEADDED` date NOT NULL,
  `ADDEDBY` int(3) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmedicine`
--

INSERT INTO `pharmedicine` (`MEDID`, `MEDCODE`, `GENERICNAME`, `BRANDNAME`, `DESCRIPTION`, `QTYADD`, `QTYSOLD`, `SELLPRICE`, `SUPPLIERPRICE`, `EXPIRYDATE`, `DATEADDED`, `ADDEDBY`, `DATEMODIFIED`, `MODIFIEDBY`) VALUES
(4, '110015', 'Biogesic ', 'Paracetamol', 'For Head Ache', 10, 0, 15, 9, '2020-09-30', '2020-09-03', 1, '2020-09-19', 0),
(5, '110016', 'Loperamide ', 'Diatabs', 'For Lbm', 10, 0, 15, 10, '2020-10-09', '2020-09-03', 1, '2020-09-03', 1),
(6, '110017', 'Alaxan Fr', 'None', 'For Body Pain', 10, 0, 15, 10, '2020-09-30', '2020-09-05', 1, '2020-09-05', 1),
(7, '110018', 'Syrup', 'Celin Plus', 'For young and adult  ', 10, 0, 10, 6, '2020-09-30', '2020-09-13', 1, '2020-09-13', 1),
(15, '110026', 'Bioflu', 'None', 'None', 10, 0, 10, 8, '2020-09-19', '2020-09-19', 1, '2020-09-19', 1),
(16, '110027', 'Decycloverine', 'None', 'None', 10, 0, 12, 10, '2020-09-19', '2020-09-19', 1, '2020-09-19', 1),
(20, '110029', 'Amoxicillin', 'Nonej', 'None', 10, 0, 30, 20, '2020-09-30', '2020-09-19', 1, '2020-09-19', 1),
(21, '110015', 'Biogesic ', 'Paracetamol', 'For Head Ache', 10, 0, 15, 9, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(22, '110015', 'Biogesic ', 'Paracetamol', 'For Head Ache', 10, 0, 15, 9, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(23, '110015', 'Biogesic ', 'Paracetamol', 'For Head Ache', 2, 0, 15, 9, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(24, '110016', 'Loperamide ', 'Diatabs', 'For Lbm', 3, 0, 15, 10, '2020-10-09', '2020-09-19', 1, '2020-09-19', 1),
(25, '110017', 'Alaxan Fr', 'None', 'For Body Pain', 5, 0, 15, 10, '2020-09-30', '2020-09-19', 1, '2020-09-19', 1),
(26, '110015', 'Biogesic ', 'Paracetamol', 'For Head Ache', 10, 0, 15, 9, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(27, '110015', 'Biogesic ', 'Paracetamol', 'For Head Ache', 10, 0, 15, 9, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(28, '110015', 'Biogesic ', 'Paracetamol', 'For Head Ache', 10, 0, 15, 9, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(29, '110018', 'Syrup', 'Celin Plus', 'For young and adult  ', 10, 0, 10, 6, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(30, '110018', 'Syrup', 'Celin Plus', 'For young and adult  ', 10, 0, 10, 6, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(31, '110026', 'Bioflu', 'None', 'None', 2, 0, 10, 8, '1970-01-01', '2020-09-19', 1, '2020-09-19', 1),
(32, '110026', 'Bioflu', 'None', 'None', 2, 0, 10, 8, '1970-01-01', '2020-09-19', 1, '2020-09-19', 1),
(33, '110018', 'Syrup', 'Celin Plus', 'For young and adult  ', 2, 0, 10, 6, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(34, '110018', 'Syrup', 'Celin Plus', 'For young and adult  ', 2, 0, 10, 6, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1),
(35, '110027', 'Decycloverine', 'None', 'None', 10, 0, 12, 10, '0000-00-00', '2020-09-19', 1, '2020-09-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phartransaction`
--

CREATE TABLE `phartransaction` (
  `TRANSID` int(11) NOT NULL,
  `INVOICENO` varchar(30) NOT NULL,
  `TRANSDATE` date NOT NULL,
  `TRANSTIME` time NOT NULL,
  `TOTALAMOUNT` double NOT NULL,
  `DISCOUNT` double NOT NULL,
  `TOTALDUE` double NOT NULL,
  `CASENO` varchar(20) NOT NULL,
  `TYPEOFTRANSACTION` varchar(30) NOT NULL,
  `STATUSOFTRANSACTION` varchar(30) NOT NULL,
  `DATEADDED` date NOT NULL,
  `ADDEDBY` int(3) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phartransdetails`
--

CREATE TABLE `phartransdetails` (
  `DETAILSID` int(11) NOT NULL,
  `INVOICENO` varchar(30) NOT NULL,
  `MEDCODE` varchar(30) NOT NULL,
  `GENERICNAME` text NOT NULL,
  `QTY` int(10) NOT NULL,
  `SELLPRICE` double NOT NULL,
  `SUPPLIERPRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmission`
--

CREATE TABLE `tbladmission` (
  `CASENO` varchar(30) NOT NULL,
  `PID` int(11) NOT NULL,
  `ADMISSIONTYPE` varchar(5) NOT NULL DEFAULT 'NEW',
  `DATEADMITTED` date NOT NULL DEFAULT current_timestamp(),
  `TIMEADMITTED` time NOT NULL DEFAULT current_timestamp(),
  `DOCID` int(11) NOT NULL,
  `DATEDISCHARGED` date NOT NULL,
  `TIMEDISCHARGED` time NOT NULL,
  `MEMBERSHIP` text NOT NULL,
  `PHILHEALTHMEMBERSHIP` text NOT NULL,
  `PHILHEALTHCATEGORY` text NOT NULL,
  `ICDCODE` varchar(50) NOT NULL,
  `SOCIALSERVICECLASS` varchar(30) NOT NULL,
  `DISPOSITION` varchar(50) NOT NULL,
  `RESULTS` text NOT NULL,
  `INFORMANTNAME` text NOT NULL,
  `INFORMANTADDRESS` text NOT NULL,
  `RELATIONTOPATIENT` varchar(50) NOT NULL,
  `TYPEOFPATIENT` varchar(30) NOT NULL,
  `ADMISSIONDIAGNOSIS` text NOT NULL,
  `PRINCIPALDIAGNOSIS` text NOT NULL,
  `DATEADDED` date NOT NULL,
  `ADDEDBY` int(3) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `EMPID` varchar(11) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LICENSESNO` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(10) NOT NULL,
  `ADRESS` text NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `CONTACT` varchar(15) NOT NULL,
  `PICTURE` text NOT NULL,
  `ADDEDBY` int(3) NOT NULL,
  `DATEADDED` date NOT NULL,
  `MODIFIEDBY` int(3) NOT NULL,
  `DATEMODIFIED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`EMPID`, `LNAME`, `MNAME`, `FNAME`, `LICENSESNO`, `DOB`, `AGE`, `SEX`, `ADRESS`, `EMAIL`, `CONTACT`, `PICTURE`, `ADDEDBY`, `DATEADDED`, `MODIFIEDBY`, `DATEMODIFIED`) VALUES
('101', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', 1, '2020-08-27', 0, '0000-00-00'),
('102', 'Jimenea', 'ff', 'fgh', '456', '0000-00-00', 0, 'Female', 'dfghdfghgfh', 'joken000189561@gmail.com', '56546', '', 1, '2020-08-27', 1, '2020-09-20'),
('103', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', 1, '2020-08-29', 0, '0000-00-00'),
('104', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', 1, '2020-09-03', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblguarantors`
--

CREATE TABLE `tblguarantors` (
  `GID` int(11) NOT NULL,
  `GUARANTOR` text NOT NULL,
  `ADDEDBY` int(11) NOT NULL,
  `DATEADDED` date NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblguarantors`
--

INSERT INTO `tblguarantors` (`GID`, `GUARANTOR`, `ADDEDBY`, `DATEADDED`, `DATEMODIFIED`, `MODIFIEDBY`) VALUES
(1, 'Intelicare', 1, '2020-09-19', '2020-09-19', 1),
(2, 'cocolife', 1, '2020-09-19', '2020-09-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblicdcodes`
--

CREATE TABLE `tblicdcodes` (
  `ICDID` int(11) NOT NULL,
  `ICDCODE` varchar(20) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `FIRSTCASERATE` double(13,2) NOT NULL,
  `PROFEE` double(13,2) NOT NULL,
  `INSTFEE` double(13,2) NOT NULL,
  `DATEADDED` date NOT NULL,
  `ADDEDBY` int(11) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblicdcodes`
--

INSERT INTO `tblicdcodes` (`ICDID`, `ICDCODE`, `DESCRIPTION`, `FIRSTCASERATE`, `PROFEE`, `INSTFEE`, `DATEADDED`, `ADDEDBY`, `DATEMODIFIED`, `MODIFIEDBY`) VALUES
(1, 'P91.3 ', 'Neonatal cerebral irritability                                    ', 12000.00, 3600.00, 8400.00, '2020-09-01', 1, '2020-09-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblkeygen`
--

CREATE TABLE `tblkeygen` (
  `TABLENAME` varchar(30) NOT NULL,
  `NEXTNO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblkeygen`
--

INSERT INTO `tblkeygen` (`TABLENAME`, `NEXTNO`) VALUES
('EMPLOYEE', 105),
('PATIENT', 1002),
('MEDICINE', 501);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `PID` int(11) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `ADDRESS` text NOT NULL,
  `NICKNAME` varchar(30) NOT NULL,
  `CONTACT` varchar(15) NOT NULL,
  `BIRTHPLACE` text NOT NULL,
  `DOB` date NOT NULL,
  `AGE` int(3) NOT NULL,
  `SEX` varchar(10) NOT NULL,
  `BLOODTYPE` varchar(30) NOT NULL,
  `BODYMARKS` text NOT NULL,
  `OCCUPATION` varchar(100) NOT NULL,
  `NATIONALITY` varchar(30) NOT NULL,
  `CIVILSTATUS` varchar(20) NOT NULL,
  `RELIGION` varchar(20) NOT NULL,
  `FATHERNAME` varchar(50) NOT NULL,
  `FATHERADDRESS` text NOT NULL,
  `MOTHERNAME` varchar(50) NOT NULL,
  `MOTHERADDRESS` text NOT NULL,
  `SPOUSENAME` varchar(50) NOT NULL,
  `SPOUSEADDRESS` text NOT NULL,
  `PHOTO` text NOT NULL,
  `DATEADDED` date NOT NULL,
  `ADDEDBY` int(3) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`PID`, `FNAME`, `MNAME`, `LNAME`, `ADDRESS`, `NICKNAME`, `CONTACT`, `BIRTHPLACE`, `DOB`, `AGE`, `SEX`, `BLOODTYPE`, `BODYMARKS`, `OCCUPATION`, `NATIONALITY`, `CIVILSTATUS`, `RELIGION`, `FATHERNAME`, `FATHERADDRESS`, `MOTHERNAME`, `MOTHERADDRESS`, `SPOUSENAME`, `SPOUSEADDRESS`, `PHOTO`, `DATEADDED`, `ADDEDBY`, `DATEMODIFIED`, `MODIFIEDBY`) VALUES
(1001, 'Jude', 'Entor', 'Suarez', 'Binalbagan', 'judy', '345345345', 'Suay him.', '2020-09-13', 24, 'Male', '1', 'na', 'NA', 'Filipino', 'Single', 'Catholic', '', '', '', '', '', '', 'images/20200913artificialintelligenceaivirtualassistantrobotchatbotthinkstock856909876100749925large.jpg', '2020-09-13', 1, '2020-09-13', 1),
(1002, 'fn', 'asd', 'testlname', 'D', 'DS', 'D', 'D', '2020-09-20', 3, 'Male', 'a', 'nA', '', 'D', 'Single', 'D', '', '', '', '', '', '', '../user/images/default.png', '2020-09-20', 1, '2020-09-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatledger`
--

CREATE TABLE `tblpatledger` (
  `LEDGERID` int(11) NOT NULL,
  `PAYID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `CASENO` varchar(30) NOT NULL,
  `PAYTYPEID` int(11) NOT NULL,
  `ADDEDBY` int(11) NOT NULL,
  `DATEADDED` date NOT NULL,
  `MODIFIEDBY` int(11) NOT NULL,
  `DATEMODIFIED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `PAYID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `PAYMENTDATE` datetime NOT NULL,
  `INVOICENO` varchar(30) NOT NULL,
  `NOTE` text NOT NULL,
  `DATEADDED` date NOT NULL,
  `ADDEDBY` int(11) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaytype`
--

CREATE TABLE `tblpaytype` (
  `PAYTYPEID` int(11) NOT NULL,
  `PAYTYPE` text NOT NULL,
  `ADDEDBY` int(11) NOT NULL,
  `DATEADDED` date NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `MODIFIEDBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblrooms`
--

CREATE TABLE `tblrooms` (
  `RMID` int(11) NOT NULL,
  `RMNAME` varchar(30) NOT NULL,
  `BEDNO` varchar(30) NOT NULL,
  `RATE` double(13,2) NOT NULL,
  `ADDEDBY` int(11) NOT NULL,
  `DATEADDED` date NOT NULL,
  `MODIFIEDBY` int(11) NOT NULL,
  `DATEMODIFIED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrooms`
--

INSERT INTO `tblrooms` (`RMID`, `RMNAME`, `BEDNO`, `RATE`, `ADDEDBY`, `DATEADDED`, `MODIFIEDBY`, `DATEMODIFIED`) VALUES
(1, 'suite', '12', 500.00, 1, '2020-09-03', 1, '2020-09-04'),
(2, 'suited', '12', 490.00, 1, '2020-09-04', 1, '2020-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `SERVID` int(11) NOT NULL,
  `SERVICES` varchar(40) NOT NULL,
  `RATE` double(12,2) NOT NULL,
  `ADDEDBY` int(11) NOT NULL,
  `DATEADDED` date NOT NULL,
  `MODIFIEDBY` int(11) NOT NULL,
  `DATEMODIFIED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`SERVID`, `SERVICES`, `RATE`, `ADDEDBY`, `DATEADDED`, `MODIFIEDBY`, `DATEMODIFIED`) VALUES
(1, 'Urine', 600.00, 1, '2020-09-04', 1, '2020-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlog`
--

CREATE TABLE `tbluserlog` (
  `logid` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `DATELOG` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `UID` int(11) NOT NULL,
  `DISPLAYNAME` varchar(30) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` text NOT NULL,
  `EMPID` varchar(11) NOT NULL,
  `TYPE` varchar(15) NOT NULL,
  `ADDEDBY` int(3) NOT NULL,
  `DATEADDED` date NOT NULL,
  `MODIFIEDBY` int(3) NOT NULL,
  `DATEMODIFIED` date NOT NULL,
  `STATUSACTIVE` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`UID`, `DISPLAYNAME`, `USERNAME`, `PASSWORD`, `EMPID`, `TYPE`, `ADDEDBY`, `DATEADDED`, `MODIFIEDBY`, `DATEMODIFIED`, `STATUSACTIVE`) VALUES
(1, 'Joken Villanueva', 'admin', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', '101', 'Administrator', 1, '2020-08-27', 1, '2020-08-27', 1),
(2, 'test', 'doc', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', '102', 'Doctor', 1, '2020-08-27', 1, '2020-08-27', 1),
(3, 'fdg', 'gfh', 'eab0a38835eba59230ef98d8879dc2c198df96af', '103', 'Administrator', 1, '2020-08-29', 1, '2020-08-29', 1),
(4, 'TY', 'GHJ', '44ac618409e12d2e277eb528ec4c62a3428d2be0', '104', 'Administrator', 1, '2020-09-03', 1, '2020-09-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE `tblusertype` (
  `TYPEID` int(11) NOT NULL,
  `USERTYPE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`TYPEID`, `USERTYPE`) VALUES
(1, 'Administrator'),
(2, 'Doctor'),
(3, 'Encoder'),
(4, 'MedTech');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`LABID`);

--
-- Indexes for table `labrequest`
--
ALTER TABLE `labrequest`
  ADD PRIMARY KEY (`REQID`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
  ADD PRIMARY KEY (`TESTID`);

--
-- Indexes for table `pharmedicine`
--
ALTER TABLE `pharmedicine`
  ADD PRIMARY KEY (`MEDID`);

--
-- Indexes for table `phartransaction`
--
ALTER TABLE `phartransaction`
  ADD PRIMARY KEY (`TRANSID`);

--
-- Indexes for table `phartransdetails`
--
ALTER TABLE `phartransdetails`
  ADD PRIMARY KEY (`DETAILSID`);

--
-- Indexes for table `tbladmission`
--
ALTER TABLE `tbladmission`
  ADD PRIMARY KEY (`CASENO`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`EMPID`);

--
-- Indexes for table `tblguarantors`
--
ALTER TABLE `tblguarantors`
  ADD PRIMARY KEY (`GID`);

--
-- Indexes for table `tblicdcodes`
--
ALTER TABLE `tblicdcodes`
  ADD PRIMARY KEY (`ICDID`),
  ADD UNIQUE KEY `ICDCODE` (`ICDCODE`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `tblpatledger`
--
ALTER TABLE `tblpatledger`
  ADD PRIMARY KEY (`LEDGERID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`PAYID`);

--
-- Indexes for table `tblpaytype`
--
ALTER TABLE `tblpaytype`
  ADD PRIMARY KEY (`PAYTYPEID`);

--
-- Indexes for table `tblrooms`
--
ALTER TABLE `tblrooms`
  ADD PRIMARY KEY (`RMID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`SERVID`);

--
-- Indexes for table `tbluserlog`
--
ALTER TABLE `tbluserlog`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `EMPID` (`EMPID`);

--
-- Indexes for table `tblusertype`
--
ALTER TABLE `tblusertype`
  ADD PRIMARY KEY (`TYPEID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `LABID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `labrequest`
--
ALTER TABLE `labrequest`
  MODIFY `REQID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `TESTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pharmedicine`
--
ALTER TABLE `pharmedicine`
  MODIFY `MEDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `phartransaction`
--
ALTER TABLE `phartransaction`
  MODIFY `TRANSID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phartransdetails`
--
ALTER TABLE `phartransdetails`
  MODIFY `DETAILSID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblguarantors`
--
ALTER TABLE `tblguarantors`
  MODIFY `GID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblicdcodes`
--
ALTER TABLE `tblicdcodes`
  MODIFY `ICDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `tblpatledger`
--
ALTER TABLE `tblpatledger`
  MODIFY `LEDGERID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpaytype`
--
ALTER TABLE `tblpaytype`
  MODIFY `PAYTYPEID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrooms`
--
ALTER TABLE `tblrooms`
  MODIFY `RMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `SERVID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluserlog`
--
ALTER TABLE `tbluserlog`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblusertype`
--
ALTER TABLE `tblusertype`
  MODIFY `TYPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
